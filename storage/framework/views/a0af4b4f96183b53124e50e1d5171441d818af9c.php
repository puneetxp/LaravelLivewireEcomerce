<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div class="flex justify-between">
        <img class="h-8 w-8 rounded-full object-cover" src="<?php echo e(Auth::user()->profile_photo_url); ?>" alt="<?php echo e(Auth::user()->name); ?>" />
        <form action="/user/profile">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'jetstream::components.button','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('jet-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                Profile Setting
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        </form>
    </div>

    <div class="mt-8 text-2xl">
        Hello, <?php echo e(Auth::user()->name); ?>

    </div>

    <div class="mt-6 text-gray-500">
    </div>
</div>

<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
    <div class="p-6">
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
            </svg>
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="#">Address</a></div>
        </div>
        <div  x-data='{
              add:false,
              addresses : <?php echo e(Auth::user()->addresslimits); ?>}' class="ml-12">
            <div class="mt-2 text-sm text-gray-500">
                <template x-for='address in addresses'>
                    <div  class="relative">
                        <div class="flex flex-wrap justify-center border border-gray-900 text-center rounded-md md:p-5 p-2 m-2 transition duration-150 ease-in-out transform hover:hover:hover:bg-gray-700 hover:text-white">
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
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.user.address','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('user.address'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
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
            <div @click="add = ! add" class="cursor-pointer">
                <div class="mt-3 flex items-center text-sm font-semibold text-red-700">
                    <div>Add Address</div>
                    <div class="ml-1 text-red-500">
                        <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </div>
                </div>
            </div>

            <a href="/user/myaddress  ">
                <div class="mt-3 flex items-center text-sm font-semibold text-red-700">
                    Check All
                    <div class="ml-1 text-red-500">
                        <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box2" viewBox="0 0 16 16">
                <path d="M2.95.4a1 1 0 0 1 .8-.4h8.5a1 1 0 0 1 .8.4l2.85 3.8a.5.5 0 0 1 .1.3V15a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4.5a.5.5 0 0 1 .1-.3L2.95.4ZM7.5 1H3.75L1.5 4h6V1Zm1 0v3h6l-2.25-3H8.5ZM15 5H1v10h14V5Z"/>
            </svg>
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="#">Orders</a></div>
        </div>
        <div  x-data='{
              add:false,
              orders : <?php echo e(Auth::user()->orderlimits); ?>}' class="ml-12">
            <div class="mt-2 text-sm text-gray-500">
                <template x-for='order in orders'>
                    <a :href="'/user/order/'+order.id">
                        <div  class="relative">
                            <div class="flex flex-wrap justify-center border border-gray-900 text-center rounded-md md:p-5 p-2 m-2 transition duration-150 ease-in-out transform hover:hover:hover:bg-gray-700 hover:text-white">
                                <div class="mr-1" x-text='order.id'></div> 
                                <div class="mr-1" x-text='order.status = 0 ? "pending" : ""'></div>
                                (
                                <div class="mr-1" x-text='order.shipping'></div>+
                                <div class="mr-1" x-text='order.price'></div>)
                            </div>
                        </div>
                    </a>
                </template>
            </div>
            <a href="/user/myorders">
                <div class="mt-3 flex items-center text-sm font-semibold text-red-700">
                    <div>Check All Orders</div>
                    <div class="ml-1 text-red-500">
                        <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
            </svg>
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="#">Favorites</a></div>
        </div>
        <div  x-data='{
              favorites : <?php echo e(Auth::user()->fav); ?>}' x-init="console.log(favorites.length)" class="ml-12">
            <div class="mt-2 text-sm text-gray-500">
                <template x-for='fav in favorites'>
                    <a :href="'/'+fav.product.name">
                        <div  class="relative flex flex-wrap justify-center border border-gray-900 text-center rounded-md md:p-5 p-2 m-2 transition duration-150 ease-in-out transform hover:hover:hover:bg-gray-700 hover:text-white">
                            <div class="mx-4">
                                <img class='w-20' :src="'/'+fav.product.photos[0].photo.dir+fav.product.photos[0].photo.name" :alt="fav.product.name"/>
                            </div>
                            <div x-text="fav.product.name">
                            </div>
                        </div>
                    </a>
                </template>
                <template x-if='favorites.length == 0'>
                    <div>
                        There is no product in Favorites
                    </div>
                </template>
            </div>
            <a href="/user/myfav">
                <div class="mt-3 flex items-center text-sm font-semibold text-red-700">
                    Check All
                    <div class="ml-1 text-red-500">
                        <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </div>
                </div>
            </a>
        </div>
    </div>


</div>
<?php /**PATH /home/puneetxp/Downloads/Telegram Desktop/SupremePure/resources/views/vendor/jetstream/components/welcome.blade.php ENDPATH**/ ?>