<?php $__env->startSection('title', translate('Order Complete').' | '.$web_config['name']->value.' '.translate(' Ecommerce')); ?>

<?php $__env->startSection('content'); ?>
    <main class="main-content d-flex flex-column gap-3 py-3 mb-5">
        <div class="container">
            <div class="card">
                <div class="card-body p-md-5">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-md-10">
                            <div class="text-center d-flex flex-column align-items-center gap-3">
                                <img width="46" src="<?php echo e(theme_asset('assets/img/icons/check.png')); ?>" class="dark-support" alt="">
                                <h3><?php echo e(translate('Your_Order_is_Completed')); ?></h3>
                                <p class="text-muted"><?php echo e(translate('thank_you_for_your_order')); ?>! <?php echo e(translate('your_order_is_being_processed_and_will_be_completed_within_3-6_hours')); ?>. <?php echo e(translate('you_will_receive_an_email_confirmation_when_your_order_is_completed')); ?>.</p>
                                <div class="d-flex flex-wrap justify-content-center gap-3">
                                    <a href="<?php echo e(route('home')); ?>" class="btn btn-outline-primary bg-primary-light border-transparent"><?php echo e(translate('Continue_Shopping')); ?></a>
                                    <a href="<?php echo e(route('account-oder')); ?>" class="btn btn-primary"><?php echo e(translate('Track_Order')); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('theme-views.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tikka\resources\themes\theme_aster/theme-views/checkout/complete.blade.php ENDPATH**/ ?>