<?php $__env->startSection('title', \App\CPU\translate('order_settings')); ?>

<?php $__env->startPush('css_or_js'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="content container-fluid">

        <!-- Page Title -->
        <div class="mb-4 pb-2">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img width="20" src="<?php echo e(asset('public/assets/back-end/img/business-setup.png')); ?>" alt="">
                <?php echo e(\App\CPU\translate('order_settings')); ?>

            </h2>
        </div>
        <!-- End Page Title -->

        <!-- Inlile Menu -->
        <?php echo $__env->make('admin.business-settings.business-setup-inline-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- End Inlile Menu -->

        <div class="card">
            <div class="border-bottom px-4 py-3">
                <h5 class="mb-0 text-capitalize d-flex align-items-center gap-2">
                    <img src="<?php echo e(asset('public/assets/back-end/img/header-logo.png')); ?>" alt="">
                    <?php echo e(\App\CPU\translate('Order_Settings')); ?>

                </h5>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('admin.business-settings.order-settings.update-order-settings')); ?>" method="post" enctype="multipart/form-data" id="add_fund">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-sm-6">
                            <?php ($billing_input_by_customer=\App\CPU\Helpers::get_business_settings('billing_input_by_customer')); ?>
                            <div class="form-group">
                                <div class="d-flex gap-1 mb-2">
                                    <label class="title-color mb-0"><?php echo e(\App\CPU\translate('Show_Billing_Address_In_Checkout')); ?></label>
                                    <span class="text-danger">*</span>
                                </div>
                                <div class="input-group input-group-md-down-break">
                                    <!-- Custom Radio -->
                                    <div class="form-control">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="1"
                                                name="billing_input_by_customer"
                                                id="billing_input_by_customer1" <?php echo e($billing_input_by_customer==1?'checked':''); ?>>
                                            <label class="custom-control-label"
                                                for="billing_input_by_customer1"><?php echo e(\App\CPU\translate('active')); ?></label>
                                        </div>
                                    </div>
                                    <!-- End Custom Radio -->

                                    <!-- Custom Radio -->
                                    <div class="form-control">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="0"
                                                name="billing_input_by_customer"
                                                id="billing_input_by_customer2" <?php echo e($billing_input_by_customer==0?'checked':''); ?>>
                                            <label class="custom-control-label"
                                                for="billing_input_by_customer2"><?php echo e(\App\CPU\translate('deactive')); ?></label>
                                        </div>
                                    </div>
                                    <!-- End Custom Radio -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" id="submit" class="btn btn--primary px-4"><?php echo e(\App\CPU\translate('submit')); ?></button>
                    </div>
                </form>
            </div>
            <!-- End Table -->
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script_2'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tikka\resources\views/admin/business-settings/order-settings/index.blade.php ENDPATH**/ ?>