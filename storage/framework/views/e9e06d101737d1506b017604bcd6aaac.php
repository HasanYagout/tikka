<?php $__env->startSection('title', \App\CPU\translate('analytics_script')); ?>

<?php $__env->startPush('css_or_js'); ?>

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

        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <?php ($pixel_analytics=\App\CPU\Helpers::get_business_settings('pixel_analytics')); ?>
                            <div class="col-12 mb-3">
                                <form action="<?php echo e(env('APP_MODE')!='demo'?route('admin.business-settings.analytics-update'):'javascript:'); ?>" method="post"
                                    enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group">
                                        <label class="title-color d-flex"><?php echo e(\App\CPU\translate('pixel_analytics_your_pixel_id')); ?></label>
                                        <textarea type="text" placeholder="<?php echo e(\App\CPU\translate('pixel_analytics_your_pixel_id_from_facebook')); ?>" class="form-control" name="pixel_analytics"><?php echo e(env('APP_MODE')!='demo'?$pixel_analytics??'':''); ?></textarea>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="<?php echo e(env('APP_MODE')!='demo'?'submit':'button'); ?>" onclick="<?php echo e(env('APP_MODE')!='demo'?'':'call_demo()'); ?>" class="btn btn--primary px-4"><?php echo e(\App\CPU\translate('save')); ?></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <?php ($google_tag_manager_id=\App\CPU\Helpers::get_business_settings('google_tag_manager_id')); ?>
                                <div class="col-12">
                                    <form action="<?php echo e(env('APP_MODE')!='demo'?route('admin.business-settings.analytics-update-google-tag'):'javascript:'); ?>" method="post"
                                        enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <div class="form-group">
                                            <label class="title-color d-flex"><?php echo e(\App\CPU\translate('google_tag_manager_id')); ?></label>
                                            <textarea type="text" placeholder="<?php echo e(\App\CPU\translate('google_tag_manager_script_id_from_google')); ?>" class="form-control" name="google_tag_manager_id"><?php echo e(env('APP_MODE')!='demo'?$google_tag_manager_id??'':''); ?></textarea>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <button type="<?php echo e(env('APP_MODE')!='demo'?'submit':'button'); ?>" onclick="<?php echo e(env('APP_MODE')!='demo'?'':'call_demo()'); ?>" class="btn btn--primary px-4"><?php echo e(\App\CPU\translate('save')); ?></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script_2'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tikka\resources\views/admin/business-settings/analytics/index.blade.php ENDPATH**/ ?>