<?php $__env->startSection('title', \App\CPU\translate('cookie_settings')); ?>

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
        <form action="<?php echo e(route('admin.business-settings.cookie-settings-update')); ?>" method="post"
              enctype="multipart/form-data" id="update-settings">
            <?php echo csrf_field(); ?>
            <div class="row gy-2 pb-4">
                <div class="col-md-6">
                    <div class="card">
                        <div class="border-bottom py-3 px-4">
                            <div class="d-flex justify-content-between align-items-center gap-10">
                                <h5 class="mb-0 text-capitalize d-flex align-items-center gap-2">
                                    <i class="tio-award"></i>
                                    <?php echo e(\App\CPU\translate('cookie_settings')); ?>:
                                </h5>
                                <label class="switcher" for="cookie_setting_status">
                                    <input type="checkbox" class="switcher_input"
                                           name="status" id="cookie_setting_status"
                                           data-section="cookie_setting_status"
                                           value="1" <?php echo e(isset($data['cookie_setting'])&&$data['cookie_setting']['status']==1?'checked':''); ?>>
                                    <span class="switcher_control"></span>
                                </label>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="loyalty-point-section" id="cookie_setting_status_section">
                                <div class="form-group">
                                    <label class="title-color d-flex"
                                           for="loyalty_point_exchange_rate"><?php echo e(\App\CPU\translate('cookie_text')); ?></label>
                                    <textarea name="cookie_text" id="" cols="30" rows="6" class="form-control"><?php echo e(isset($data['cookie_setting']) ? $data['cookie_setting']['cookie_text'] : ''); ?></textarea>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="submit" id="submit"
                                            class="btn px-4 btn--primary"><?php echo e(\App\CPU\translate('save')); ?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tikka\resources\views/admin/business-settings/cookie-settings.blade.php ENDPATH**/ ?>