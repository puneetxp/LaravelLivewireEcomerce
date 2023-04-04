<?php

namespace App\Http\Controllers;

use App\Models\{
  Payment,
  Order
};
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

class PaymentController extends Controller {


  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index() {
    //
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create() {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request) {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Payment  $payment
   * @return \Illuminate\Http\Response
   */
  public function show(Payment $payment) {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Payment  $payment
   * @return \Illuminate\Http\Response
   */
  public function edit(Payment $payment) {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Payment  $payment
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Payment $payment) {
    $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
    try {
      $attributes = array(
          'razorpay_order_id' => $payment->payment_id,
          'razorpay_payment_id' => $request->razorpay_payment_id,
          'razorpay_signature' => $request->razorpay_signature,
      );
      $api->utility->verifyPaymentSignature($attributes);
      Order::find($request->order_id)->update([
          'status' => 2,
          'ok' => 1,
      ]);
      $payment->update(['status' => $request->razorpay_payment_id]);
      return redirect(route('user.order.show', $payment->order_id));
    } catch (SignatureVerificationError $e) {
      return redirect()->back();
    }
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Payment  $payment
   * @return \Illuminate\Http\Response
   */
  public function destroy(Payment $payment) {
    //
  }

}
