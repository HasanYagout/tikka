<?php $__env->startSection('title', translate('cart_list').' | '.$web_config['name']->value.' '.translate(' Ecommerce')); ?>

<?php $__env->startSection('content'); ?>
    <!-- Main Content -->
    <main class="main-content d-flex flex-column gap-3 py-3 mb-5" id="cart-summary">
        <?php echo $__env->make(VIEW_FILE_NAMES['products_cart_details_partials'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </main>
    <!-- End Main Content -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        cartQuantityInitialize();
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('theme-views.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tikka\resources\themes\theme_aster/theme-views/order/cart-list.blade.php ENDPATH**/ ?>