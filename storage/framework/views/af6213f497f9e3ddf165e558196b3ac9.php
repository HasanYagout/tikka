<?php $__env->startSection('title',\App\CPU\translate('refund_settings')); ?>

<?php $__env->startSection('content'); ?>
<div class="content container-fluid">

    <!-- Page Title -->
    <div class="mb-4 pb-2">
        <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
            <img src="<?php echo e(asset('public/assets/back-end/img/business-setup.png')); ?>" alt="">
            <?php echo e(\App\CPU\translate('Business_Setup')); ?>

        </h2>
    </div>
    <!-- End Page Title -->

    <!-- Inlile Menu -->
    <?php echo $__env->make('admin.business-settings.business-setup-inline-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- End Inlile Menu -->


    <div class="card">
        <div class="card-header">
            <h5 class="text-center"><i class="tio-settings-outlined"></i>
                 <?php echo e(\App\CPU\translate('refund_request_after_order_within')); ?>

            </h5>

        </div>
        <div class="card-body">
             <?php ($refund_day_limit=\App\CPU\Helpers::get_business_settings('refund_day_limit')); ?>

            <form action="<?php echo e(route('admin.refund-section.refund-update')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label class="input-label d-flex" for="name"><?php echo e(\App\CPU\translate('days')); ?></label>
                            <input class="form-control col-12" type="number" name="refund_day_limit" value="<?php echo e($refund_day_limit); ?>" required>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn--primary"><?php echo e(\App\CPU\translate('submit')); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tikka\resources\views/admin/refund/index.blade.php ENDPATH**/ ?>