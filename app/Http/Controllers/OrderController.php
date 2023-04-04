<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\{
  Order,
  OrderDetail,
  StorePrice,
  Payment,
  OrderAddress,
  Address,
  Cart
};
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class OrderController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index() {
    if (request()->accept) {
      $r = Order::where('user_id', Auth::id())->where('status', 0)->get();
      foreach ($r as $value) {
        if ($value->payment) {
          Payment::destroy($value->payment->id);
        }
        OrderDetail::where('order_id', $value->id)->delete();
        Order::destroy($value->id);
      }
      $x = 0;
      $cartitems = Auth::user()->carts;
      $order = Order::create([
                  'user_id' => Auth::id()
      ]);
      $r = 0;
      $totalforship = 0;
      for ($i = 0; $i < count($cartitems); $i++) {
        $totalforship += $cartitems[$i]->qty * $cartitems[$i]->product->price;
        $x += $cartitems[$i]->qty * $cartitems[$i]->product->price;
        $y = [
            'order_id' => $order->id,
            'product_id' => $cartitems[$i]->product_id,
            'store_id' => $cartitems[$i]->store_id,
            'qty' => $cartitems[$i]->qty,
            'price' => $cartitems[$i]->store->product->price
        ];
        OrderDetail::create($y);
      }
      if ($totalforship <= $_ENV['ORDER_MIN']) {
        $order->update(['shipping' => $_ENV['ORDER_SHIP']]);
        $x += $_ENV['ORDER_SHIP'];
      }
      return view('order.checkout', [
          'order' => $order
      ]);
    }
    return redirect(route('home'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create(Request $request) {
    
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request) {

    $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
    if ($request->accept) {
      if (count(Order::where('user_id', Auth::id())->where('status', 1)->get()) > 0) {
        $order = Order::where('user_id', Auth::id())->where('status', 1)->first();
        $razorpayOrder = $api->order->fetch($order->payment->payment_id);
        if ($razorpayOrder->amount_due == 0) {
          $r = $api->order->fetch($razorpayOrder->id)->payments()->items[0];
          if ($r->status !== "captured") {
            $i = $api->payment->fetch($r->id)->capture(array('amount' => $razorpayOrder->amount, 'currency' => 'INR'));
          }
          Payment::find($order->payment->id)->update(['status' => $r->id]);
          Order::find($order->id)->update([
              'status' => 2,
              'ok' => 1,
          ]);
          return redirect(route('user.order.show', $order->id));
        }
      } else {
        $r = Order::where('user_id', Auth::id())->where('status', 0)->get();
        foreach ($r as $value) {
          if ($value->payment) {
            Payment::destroy($value->payment->id);
          }
          OrderDetail::where('order_id', $value->id)->delete();
          Order::destroy($value->id);
        }
        $x = 0;
        $cartitems = Auth::user()->carts;
        $order = Order::create([
                    'user_id' => Auth::id(),
        ]);
        $r = 0;
        $totalforship = 0;
        foreach ($cartitems as $item) {
          $totalforship += $item->qty * $item->price;
          OrderDetail::create([
              'order_id' => $order->id,
              'product_id' => $item->product_id,
              'qty' => $item->qty,
              'store_id' => $item->store_id,
              'price' => $item->price
          ]);
        }
        $order->price = $totalforship;
        if ($totalforship <= $_ENV['ORDER_MIN']) {
          $order->shipping = $_ENV['ORDER_SHIP'];
          $totalforship += $_ENV['ORDER_SHIP'];
        }
        $orderData = [
            'receipt' => $order->id,
            'amount' => $totalforship * 100, // 2000 rupees in paise
            'currency' => 'INR',
            'payment_capture' => 1 // auto capture
        ];
        $order->update();
        $razorpayOrder = $api->order->create($orderData);
        Payment::create(['payment_id' => $razorpayOrder->id, 'order_id' => $order->id]);
      }
      return view('order.checkout', [
          'order' => $order,
          'razorpayOrder' => $razorpayOrder,
      ]);
    } else {
      return redirect('user/cart');
    }
//
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Order  $order
   * @return \Illuminate\Http\Response
   */
  public function show(Order $order) {

    if ($order->user_id === Auth::id()) {
      if ($order->status === 0) {
        return abort(404);
      } else {
        $order = Order::find($order->id);
        return view('order.complete', [
            'order' => $order,
        ]);
      }
    } else {

      return view('order.complete', [
          'order' => $order,
      ]);
      if (Gate::denies('admin')) {
        abort(403);
      }
    }
//
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Order  $order
   * @return \Illuminate\Http\Response
   */
  public function edit(Order $order) {
//
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Order  $order
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Order $order) {
    if ($order->ok === 1) {
      return redirect(route('user.order.show', $order->id));
    } else {
      $a = Address::find($request->address);
      $a['order_id'] = $request->id;
      Payment::where("order_id", $request->id)->update(['status' => $request->payment]);
      OrderAddress::upsert([
          "name" => $a->name,
          "line" => $a->line,
          "district" => $a->district,
          "state" => $a->state,
          "pincode" => $a->pincode,
          "phone" => $a->phone,
          "alternate" => $a->alternate,
          "order_id" => $order->id,
          "email" => $a->email,
              ], ["order_id"], ['line', 'district', 'state', 'pincode', 'phone', 'alternate', 'email']);
      if ($request->note) {
        $order->update([
            'note' => $request->note
        ]);
      }
      if ($request->payment == 9) {
        $order->update([
            'status' => $request->payment,
            'ok' => 1,
        ]);
        $order = Order::find($order->id);
        Cart::where('user_id', Auth::id())->delete();
        return redirect(route('user.order.show', $order->id));
      } else {
        $order->update([
            'status' => $request->payment,
        ]);
        Cart::where('user_id', Auth::id())->delete();
      }
      return redirect(route('user.order.show', $order->id));
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Order  $order
   * @return \Illuminate\Http\Response
   */
  public function destroy(Order $order) {
//
  }

  public function cancel(Order $order, Request $request) {
    $note = $request->reason . " <br>  " . $request->description;
    $order->update([
        'note' => $note,
        'status' => 10]);
    $to = $_ENV['EMAIL_ID'];
    $subject = "Order Mail " . $order->id;
    $message = $note . "<br>";
    $message .= json_encode($order->address) . "<br>";
    foreach ($order->items as $value) {
      $message .= "<br> <strong>" . $value->product->name . "</strong>  " . $value->qty . " qty  *  ₹" . $value->price . " =  Total" . $value->price * $value->qty;
    }
// Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
// More headers
    $headers .= 'From: <webmaster@sirphire.in>' . "\r\n";
//        $headers .= 'Cc: myboss@example.com' . "\r\n";
    mail($to, $subject, $message, $headers);
    return 1;
  }

}
