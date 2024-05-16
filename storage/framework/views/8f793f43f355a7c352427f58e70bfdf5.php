<?php $__env->startSection('title', \App\CPU\translate('OTP_setup')); ?>

<?php $__env->startPush('css_or_js'); ?>

<?php $__env->stopPush(); ?>

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
        <form action="<?php echo e(route('admin.business-settings.otp-setup-update')); ?>" method="post"
              enctype="multipart/form-data" id="update-settings">
            <?php echo csrf_field(); ?>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <div class="form-group">
                                <label class="input-label" for="maximum_otp_hit"><?php echo e(translate('maximum OTP hit')); ?>

                                    <i class="tio-info-outined"
                                       data-toggle="tooltip"
                                       data-placement="top"
                                       title="<?php echo e(translate('The maximum OTP hit is a measure of how many times a specific one-time password has been generated and used within a time.')); ?>">
                                    </i>
                                </label>
                                <input type="number" min="0" value="<?php echo e($maximum_otp_hit); ?>"
                                       name="maximum_otp_hit" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="form-group">
                                <label class="input-label" for="otp_resend_time"><?php echo e(translate('OTP resend time')); ?>

                                    <i class="tio-info-outined"
                                       data-toggle="tooltip"
                                       data-placement="top"
                                       title="<?php echo e(translate('If the user fails to get the OTP within a certain time, user can request a resend')); ?>">
                                    </i>
                                    <span class="text-danger">( <?php echo e(translate('in_seconds')); ?> )</span>
                                </label>
                                <input type="number" min="0" step="0.01" value="<?php echo e($otp_resend_time); ?>"
                                       name="otp_resend_time" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="form-group">
                                <label class="input-label" for="temporary_block_time"><?php echo e(translate('temporary_block_time')); ?>

                                    <i class="tio-info-outined"
                                       data-toggle="tooltip"
                                       data-placement="top"
                                       title="<?php echo e(translate('Temporary OTP block time refers to a security measure implemented by systems to restrict access to OTP service for a specified period of time for wrong OTP submission.')); ?>">
                                    </i>
                                    <span class="text-danger">( <?php echo e(translate('in_seconds')); ?> )</span>
                                </label>
                                <input type="number" min="0" value="<?php echo e($temporary_block_time); ?>" step="0.01"
                                       name="temporary_block_time" class="form-control" placeholder="" required>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-4">
                            <div class="form-group">
                                <label class="input-label" for="maximum_otp_hit"><?php echo e(translate('maximum Login hit')); ?>

                                    <i class="tio-info-outined"
                                       data-toggle="tooltip"
                                       data-placement="top"
                                       title="<?php echo e(translate('The maximum login hit is a measure of how many times a user can submit password within a time.')); ?>">
                                    </i>
                                </label>
                                <input type="number" min="0" value="<?php echo e($maximum_login_hit); ?>"
                                       name="maximum_login_hit" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="form-group">
                                <label class="input-label" for="temporary_block_time"><?php echo e(translate('temporary_login_block_time')); ?>

                                    <i class="tio-info-outined"
                                       data-toggle="tooltip"
                                       data-placement="top"
                                       title="<?php echo e(translate('Temporary login block time refers to a security measure implemented by systems to restrict access for a specified period of time for wrong Password submission')); ?>">
                                    </i>
                                    <span class="text-danger">( <?php echo e(translate('in_seconds')); ?> )</span>
                                </label>
                                <input type="number" min="0" step="0.01" value="<?php echo e($temporary_login_block_time); ?>"
                                       name="temporary_login_block_time" class="form-control" placeholder="" required>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex gap-3 justify-content-end">
                        <button type="reset" class="btn btn-secondary px-4"><?php echo e(translate('reset')); ?></button>
                        <button type="<?php echo e(env('APP_MODE')!='demo'?'submit':'button'); ?>" onclick="<?php echo e(env('APP_MODE')!='demo'?'':'call_demo()'); ?>" class="btn btn--primary px-4">
                            <?php echo e(translate('save')); ?>

                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tikka\resources\views/admin/business-settings/otp-setup.blade.php ENDPATH**/ ?>