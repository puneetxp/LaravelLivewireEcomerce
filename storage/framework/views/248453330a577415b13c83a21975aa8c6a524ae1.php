<div class="w-full mx-auto ">
    <?php echo \Livewire\Livewire::styles(); ?>

    <div class="w-full flex flex-col justify-center text-center shadow-lg bg-gray-200">
        <input class="bg-white  shadow-xl border-0 rounded-lg my-4 w-4/5 px-6 sm:w-1/2  text-center mx-auto p-4" wire:model="query" placeholder="search">
        <table border="1">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                </tr>
            </thead>

            <tbody>

                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <form>
                    <tr id="<?php echo e($user->id); ?>}">
                        <td><?php echo e($user->name); ?></td>
                        <td><?php echo e($user->email); ?></td>
                        <td>
                            <button class=" <?php if($user->role==0): ?> bg-blue-500 <?php endif; ?> " wire:click="updates(<?php echo e($user->id); ?>, 0)"> User</button>
                            <button class=" <?php if($user->role==1): ?> bg-blue-500 <?php endif; ?> " wire:click="updates(<?php echo e($user->id); ?>, 1)"> Store</button>
                            <button class=" <?php if($user->role==2): ?> bg-blue-500 <?php endif; ?> " wire:click="updates(<?php echo e($user->id); ?>, 2)"> Admin</button>
                        </td>
                    </tr>
                </form>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <?php echo \Livewire\Livewire::scripts(); ?>

        <script type="text/javascript">
            window.onscroll = function(ev) {
                if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
                    window.livewire.emit('load-more');
                }
            };
            window.onload = function(ev) {
                if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
                    window.livewire.emit('load-more');
                }
            };
        </script>
    </div>
</div><?php /**PATH C:\Users\Puneet\server\laravel\ecomerce\ecomerce-kunal\resources\views/livewire/admin/useradmin.blade.php ENDPATH**/ ?>