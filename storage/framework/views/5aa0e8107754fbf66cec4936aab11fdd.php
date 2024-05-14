<?php $__env->startSection('title',\App\CPU\translate('My Wishlists')); ?>

<?php $__env->startSection('content'); ?>
    <!-- Page Content-->
    <div class="container rtl" style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
        <h3 class="headerTitle my-3 text-center"><?php echo e(\App\CPU\translate('wishlist')); ?></h3>

        <div class="row">
            <!-- Sidebar-->
        <?php echo $__env->make('web-views.partials._profile-aside', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Content  -->
            <section class="col-lg-9 col-md-9" id="set-wish-list">
                <!-- Item-->
                <?php echo $__env->make('web-views.partials._wish-list-data',['wishlists'=>$wishlists, 'brand_setting'=>$brand_setting], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </section>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tikka\resources\themes\default/web-views/users-profile/account-wishlist.blade.php ENDPATH**/ ?>