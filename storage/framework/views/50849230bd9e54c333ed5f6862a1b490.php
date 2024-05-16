<?php $__env->startSection('title', \App\CPU\translate('Generate Sitemap')); ?>
<?php $__env->startPush('css_or_js'); ?>
    <link href="<?php echo e(asset('public/assets/back-end')); ?>/css/select2.min.css" rel="stylesheet"/>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="content container-fluid">
    <!-- Page Title -->
    <div class="mb-4 pb-2">
        <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
            <img src="<?php echo e(asset('public/assets/back-end/img/system-setting.png')); ?>" alt="">
            <?php echo e(\App\CPU\translate('System_Setup')); ?>

        </h2>
    </div>
    <!-- End Page Title -->

    <!-- Inlile Menu -->
    <?php echo $__env->make('admin.business-settings.system-settings-inline-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- End Inlile Menu -->

    <!-- Content Row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="border-bottom px-4 py-3">
                    <h5 class="mb-0 text-capitalize d-flex align-items-center gap-2">
                        <img width="20" src="<?php echo e(asset('public/assets/back-end/img/sitemap.png')); ?>" alt="">
                        <?php echo e(\App\CPU\translate('Generate_Sitemap')); ?>

                    </h5>
                </div>
                <div class="card-body text-center">
                    <a href="<?php echo e(route('admin.business-settings.web-config.mysitemap-download')); ?>" class="btn btn--primary px-4">
                        <?php echo e(\App\CPU\translate('Download Generate Sitemap')); ?>

                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tikka\resources\views/admin/site-map/view.blade.php ENDPATH**/ ?>