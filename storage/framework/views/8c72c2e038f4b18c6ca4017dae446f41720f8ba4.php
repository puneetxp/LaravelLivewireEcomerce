<?php if (isset($component)) { $__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015 = $component; } ?>
<?php $component = App\View\Components\GuestLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('guest-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\GuestLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
  <div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="px-8 py-6 mx-4 mt-4 text-left bg-white shadow-lg md:w-1/3 lg:w-1/3 sm:w-1/3">
      <h3 class="text-2xl font-bold text-center">Reservation
        <?php
        if (isset($_GET['reservation'])) {
          $to = $_GET['email'];
          $subject = "reservation";
          $txt = ' Home' . $_GET['name'] . ' Phone:' . $_GET['phone'] . ' People' . $_GET['number'] . ' Date' . $_GET['date'];
          $headers = "From: noreply@supremepure.in" . "\r\n";

          mail($to, $subject, $txt, $headers);
        }
        ?> 
      </h3>
      <form action="">
        <div class="mt-4">
          <div>
            <label class="block" for="Name">Name<label>
                <input  name="name" required="" <?php if(auth()->guard()->check()): ?> value="<?php echo e(Auth::user()->name); ?>" <?php endif; ?> type="text" placeholder="Name" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" />
                </div>
                <div class="mt-4">
                  <label class="block" for="email">Email<label>
                      <input name="email" required="" <?php if(auth()->guard()->check()): ?> value="<?php echo e(Auth::user()->email); ?>" <?php endif; ?> type="text" placeholder="Email" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" />
                      </div>
                      <div class="mt-4">
                        <label class="block">Phone No.<label>
                            <input name="phone" required="" type="phone" placeholder="Phone" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" />
                            </div>
                            <div class="mt-4">
                              <label class="block">Reservation For(No. of people)<label>
                                  <input  name="number" required="" type="number" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" />
                                  </div>
                                  <div class="mt-4">
                                    <label class="block">Reservation Date<label>
                                        <input  name="date" required="" type="date" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" />
                                        </div>

                                        <div class="flex">
                                          <button name="reservation" class="w-full px-6 py-2 mt-4 text-white bg-red-400 rounded-lg hover:bg-blue-700">Reserve
                                            Table</button>
                                        </div>
                                        </div>
                                        </form>
                                        </div>
                                        </div>
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015)): ?>
<?php $component = $__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015; ?>
<?php unset($__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015); ?>
<?php endif; ?><?php /**PATH /home/puneetxp/Downloads/Telegram Desktop/SupremePure/resources/views/public/reservation.blade.php ENDPATH**/ ?>