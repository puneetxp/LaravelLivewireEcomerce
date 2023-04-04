<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl leading-tight">
            <?php if($order->status == 1): ?>
            <?php echo e(__('Please Complete Pending Order')); ?>

            <?php else: ?>
            <?php echo e(__('Review Your Order')); ?>

            <?php endif; ?>
        </h2>
     <?php $__env->endSlot(); ?>
    <div  x-data='{orderwithdetails : <?php echo e($order); ?>,
          total:  <?php echo e($razorpayOrder->amount_due/100); ?> , addresses :  <?php echo e(Auth::user()->addresses); ?> , add : false,
          order : {user_id: "<?php echo e(Auth::user()->id); ?>",id:"<?php echo e($order->id); ?>",payment:false,address:false,_token:"<?php echo e(csrf_token()); ?>"}
          }' class="py-3 md:py-12 max-w-7xl mx-auto sm:px-6 lg:px-8" >
        <div class="md:grid md:grid-cols-3 md:gap-6 ">
            <div class="col-span-2 mt-5 md:mt-0 col-span-2 bg-gray-200/90 shadow-xl rounded-md">
                <div class="p-6 border-t border-gray-200">
                    <div class="flex items-center">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M20.5 3l-.16.03L15 5.1 9 3 3.36 4.9c-.21.07-.36.25-.36.48V20.5c0 .28.22.5.5.5l.16-.03L9 18.9l6 2.1 5.64-1.9c.21-.07.36-.25.36-.48V3.5c0-.28-.22-.5-.5-.5zM15 19l-6-2.11V5l6 2.11V19z"/></svg>
                        <div class="ml-4 text-lg leading-7 font-semibold"><a class="text-gray-900">Select Address</a></div>
                    </div>
                    <div class="md:ml-12"  @click="(addresses.length == 0) ? document.querySelector('#addaddress').click() : '' ; ">
                        <div class="mt-2  text-gray-600 text-sm flex flex-wrap items-center">
                            <template x-for='address in addresses'>
                                <div  class="relative">
                                    <div @click="order.address = address.id" :class="(order.address == address.id)? 'bg-gray-700 text-white' : ' '" class="flex flex-wrap justify-center border border-gray-900 text-center rounded-md md:p-5 p-2 m-2 transition duration-150 ease-in-out transform hover:bg-gray-700 hover:text-white">
                                        <div class="mr-1" x-text='address.line'></div>,
                                        <div class="mr-1" x-text='address.district'></div>,
                                        <div class="mr-1" x-text='address.state'></div>,
                                        <div class="mr-1" x-text='address.pincode'></div>,
                                        <div class="mr-1" x-text='address.email'></div>,
                                        <div class="mr-1" x-text='address.phone'></div>
                                        <div class="mr-1" x-text='address.alternate'></div>
                                    </div>
                                </div>
                            </template>
                        </div>
                        <template x-if="addresses.length == 0">
                            <div class="mt-2 text-2xl font-bold text-gray-600 flex flex-wrap items-center">
                                Please Add New 
                            </div>
                        </template>
                        <span class="flex justify-center">
                            <div class="relative w-full p-2">
                                <button id='addaddress' @click="add=true" class="w-full border border-gray-900 h-14 mt-5 p-2 rounded-md bg-gray-200">+</button>
                            </div>
                        </span>
                    </div>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.user.address','data' => []] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('user.address'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                </div>
                <div x-show="order.address" class="p-6 border-t border-gray-200">
                    <div class="flex items-center">
                        <i class="fa-solid fa-money-check"></i>
                        <div class="ml-4 text-lg leading-7 font-semibold"><a class="text-gray-900">Payment</a></div>
                    </div>

                    <div class="md:ml-12">
                        <div class="mt-2 text-gray-600 text-sm grid grid-cols-2 items-center">
                            <div  class="relative">
                                <div @click="order.payment = 9" :class="(order.payment == 9)? 'bg-gray-700 text-white' : ''" class="border text-center rounded-md md:p-5 p-2 m-2 transition duration-150 ease-in-out transform border-gray-900 hover:bg-gray-700 hover:text-white">

                                    <div class="text-lg font-semibold">C O D</div>
                                    <div>₹&ensp;<span x-text="total"></span></div>
                                </div>
                            </div>
                            <div  class="relative">
                                <div @click="order.payment = 1" :class="(order.payment == 1)? 'bg-gray-700 text-white' : ''" class="border text-center rounded-md md:p-5 p-2 m-2 transition duration-150 ease-in-out transform border-gray-900 hover:bg-gray-700 hover:text-white">
                                    <div class="text-lg font-semibold">Prepaid</div>
                                    <div>₹&ensp;<span x-text="total"></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-2 sm:p-4"
                     <h3> Order Items </h3>
                    <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="py-6 flex">
                        <div x-data='{photo:<?php echo e($i->product->photos->first()); ?>}' class="flex-shrink-0 w-14 h-14 border border-gray-200 rounded-md overflow-hidden">
                            <img :src="'/'+photo.photo.dir+photo.photo.name"  alt="" class="w-full h-full object-center object-cover">
                        </div>
                        <div class="flex justify-between w-full">
                            <div class="flex ml-2">
                                <span class="relative flex items-center" x-text="item.price*1"></span>&ensp;
                                <div class="relative flex items-center">&#215;&ensp;</div>
                                <div class="relative flex items-center">
                                    <?php echo e($i->qty); ?>

                                </div>
                            </div>
                            <div class="flex" >
                                <div class="relative flex items-center">₹&ensp;</div>
                                <div class="relative flex items-center flex-row-reverse">
                                    <?php echo e($i->qty*$i->price); ?>

                                </div>
                            </div>
                        </div>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="relative col-span-1 p-6 md:p-0">
                <div class="sticky top-20 ">
                    <div class="flex justify-between text-base font-medium ">
                        <p>Subtotal</p>
                        <p>₹ <span x-text="orderwithdetails.price"></span> </p>
                    </div>
                    <div class="flex justify-between text-base font-medium ">
                        <p>Shipping</p>
                        <p>₹ <span x-text="orderwithdetails.shipping"></span> </p>
                    </div>
                    <div class="flex justify-between text-base font-medium ">
                        <p>Total</p>
                        <p>₹ <span x-text="total"></span> </p>
                    </div>
                    <template x-if="order.payment == 9" >
                        <form class="flex flex-wrap justify-center" action="<?php echo e(route('user.order.update',$order->id)); ?>" method="POST" >
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <input type="hidden" name="id" :value="order.id">
                            <input type="hidden" name="user_id" :value="order.user_id">
                            <input type="hidden" name="payment" :value="order.payment">
                            <input type="hidden" name="address" :value="order.address">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'jetstream::components.input','data' => ['class' => 'p-2 w-full mt-2','name' => 'note','xModel' => 'order.note','placeholder' => 'Any Note']] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('jet-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'p-2 w-full mt-2','name' => 'note','x-model' => 'order.note','placeholder' => 'Any Note']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            <button type='submit' class="mt-6 w-full">
                                <div class="w-full flex flex-col justify-center items-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-red-600 hover:bg-red-700">
                                    <div class="text-center" x-html="'Cash On Delivery<br>₹ '+total">
                                    </div>
                                </div>
                            </button>
                        </form>

                    </template>
                    <div class="flex justify-center" :class="(order.payment == 1) ? 'block': 'hidden'">
                        <div class="mt-2 w-full">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'jetstream::components.input','data' => ['class' => 'p-2 mt-0 my-6 w-full','name' => 'note','xModel' => 'order.note','placeholder' => 'Any Note']] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('jet-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'p-2 mt-0 my-6 w-full','name' => 'note','x-model' => 'order.note','placeholder' => 'Any Note']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            <div @click=" fetch('<?php echo e(route('user.order.update',$order->id)); ?>', {method: 'PUT',headers:{'Content-Type': 'application/json'},body: JSON.stringify(order)}).then(document.querySelector('#rzp-button1').click())" 
                                  class="w-full flex flex-col justify-center items-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-red-600 hover:bg-red-700">
                                <div class="text-center">
                                    Proceed to RazorPay
                                </div>
                                <div class="flex justify-center">
                                    <button id="rzp-button1" x-text="'₹ '+total"></button>
                                    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
                                    <form name='razorpayform' action="<?php echo e(route('user.payment.update', $order->payment->id)); ?>" method="POST" >
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('PUT'); ?>  
                                        <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
                                        <input type="hidden" name="razorpay_signature"  id="razorpay_signature" >
                                        <input type="hidden" name="order_id" :value="order.id">
                                    </form>
                                    <script> var options = {
    "key": '<?php echo e(env('RAZORPAY_KEY')); ?>',
    "amount": '<?php echo e($razorpayOrder->amount_due*100); ?>',
    "name": '<?php echo e($order->id); ?>',
    "image": "/storage/logok.png",
    "prefill": {
        "name": '<?php echo e(Auth::user()->name); ?>',
        "email": '<?php echo e(Auth::user()->email); ?>',
        "contact": '<?php echo e(Auth::user()->phone); ?>',
    },
    "notes": [],
    "theme": {
        "color": "rgb(67 56 202)"
    },
    "order_id": '<?php echo e($razorpayOrder->id); ?>',
};
options.handler = function (response) {
    document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
    document.getElementById('razorpay_signature').value = response.razorpay_signature;
    document.razorpayform.submit();
};
options.theme.image_padding = false;
options.modal = {
    ondismiss: function () {
        console.log("This code runs when the popup is closed");
    },
    escape: true,
    backdropclose: false
};
var rzp = new Razorpay(options);
document.getElementById('rzp-button1').onclick = function (e) {
    rzp.open();
    e.preventDefault();
}
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?><?php /**PATH /home/u305151613/domains/supremepure.in/public_html/resources/views/order/checkout.blade.php ENDPATH**/ ?>