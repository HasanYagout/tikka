<?php $__env->startSection('title', trans('messages.third_party_apis')); ?>

<?php $__env->startPush('css_or_js'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <!-- Page Title -->
        <div class="mb-4 pb-2">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img src="<?php echo e(asset('public/assets/back-end/img/3rd-party.png')); ?>" alt="">
                <?php echo e(\App\CPU\translate('3rd_party')); ?>

            </h2>
        </div>
        <!-- End Page Title -->

        <!-- Inlile Menu -->
        <?php echo $__env->make('admin.business-settings.third-party-inline-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- End Inlile Menu -->

        <!-- End Page Header -->
        <div class="row gx-2 gx-lg-3 mt-2">
        <?php ($map_api_key=\App\CPU\Helpers::get_business_settings('map_api_key')); ?>
        <?php ($map_api_key_server=\App\CPU\Helpers::get_business_settings('map_api_key_server')); ?>

            <div class="col-sm-12 col-lg-12 mb-3 mb-lg-2">
                <div class="card">
                    <div class="card-body">
                        <form action="<?php echo e(env('APP_MODE')!='demo'?route('admin.business-settings.map-api-update'):'javascript:'); ?>" method="post"
                          enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="title-color d-flex"><?php echo e(\App\CPU\translate('map_api_key')); ?> (<?php echo e(\App\CPU\translate('client')); ?>)</label>
                                        <input type="text" placeholder="<?php echo e(\App\CPU\translate('map_api_key')); ?> (<?php echo e(\App\CPU\translate('client')); ?>)" class="form-control" name="map_api_key" value="<?php echo e(env('APP_MODE')!='demo'?$map_api_key??'':''); ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="title-color d-flex"><?php echo e(\App\CPU\translate('map_api_key')); ?> (<?php echo e(\App\CPU\translate('server')); ?>)</label>
                                        <input type="text" placeholder="<?php echo e(\App\CPU\translate('map_api_key')); ?> (<?php echo e(\App\CPU\translate('server')); ?>)" class="form-control" name="map_api_key_server"
                                            value="<?php echo e(env('APP_MODE')!='demo'?$map_api_key_server??'':''); ?>" required>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="<?php echo e(env('APP_MODE')!='demo'?'submit':'button'); ?>"
                                    onclick="<?php echo e(env('APP_MODE')!='demo'?'':'call_demo()'); ?>"
                                    class="btn btn--primary px-4"><?php echo e(\App\CPU\translate('save')); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script_2'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tikka\resources\views/admin/business-settings/map-api/index.blade.php ENDPATH**/ ?>