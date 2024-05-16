<?php $__env->startSection('title', \App\CPU\translate('reCaptcha Setup')); ?>

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

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <?php ($config=\App\CPU\Helpers::get_business_settings('recaptcha')); ?>
                    <form
                        action="<?php echo e(env('APP_MODE')!='demo'?route('admin.business-settings.recaptcha_update',['recaptcha']):'javascript:'); ?>"
                        method="post">
                        <?php echo csrf_field(); ?>
                        <div class="card-header flex-wrap gap-3">
                            <div class="d-flex align-items-center gap-3">
                                <h5 class="mb-0"><?php echo e(\App\CPU\translate('Google_Recapcha_Information')); ?></h5>
                                <label class="switcher">
                                    <input class="switcher_input" type="checkbox" name="status" <?php echo e(isset($config) && $config['status']==1?'checked':''); ?> value="1">
                                    <span class="switcher_control"></span>
                                </label>
                            </div>
                            <a href="https://www.google.com/recaptcha/admin/create" type="button"
                               class="btn btn-sm btn-outline--primary p-2">
                                <i class="tio-info-outined"></i> <?php echo e(\App\CPU\translate('Credentials_SetUp_page')); ?>

                            </a>
                        </div>
                        <div class="card-body">
                            <div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="title-color font-weight-bold d-flex"><?php echo e(\App\CPU\translate('Site Key')); ?></label>
                                            <input type="text" class="form-control" name="site_key"
                                                   value="<?php echo e(env('APP_MODE')!='demo'?$config['site_key']??"":''); ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="title-color font-weight-bold d-flex"><?php echo e(\App\CPU\translate('Secret Key')); ?></label>
                                            <input type="text" class="form-control" name="secret_key"
                                                   value="<?php echo e(env('APP_MODE')!='demo'?$config['secret_key']??"":''); ?>">
                                        </div>
                                    </div>
                                </div>

                                <h5 class="mb-3 d-flex"><?php echo e(\App\CPU\translate('Instructions')); ?></h5>
                                <ol class="pl-3 instructions-list">
                                    <li>
                                        <?php echo e(\App\CPU\translate('To  get site key and secret keyGo to the Credentials page')); ?>

                                        (<a href="https://www.google.com/recaptcha/admin/create"
                                            target="_blank"><?php echo e(\App\CPU\translate('Click_here')); ?></a>)
                                    </li>
                                    <li><?php echo e(\App\CPU\translate('Add_a _abel_(Ex:_abc_company)')); ?></li>
                                    <li><?php echo e(\App\CPU\translate('Select_reCAPTCHA_v2_as_ReCAPTCHA_Type')); ?></li>
                                    <li><?php echo e(\App\CPU\translate('select_sub_type')); ?>: <?php echo e(\App\CPU\translate('im_not_a_robot_checkbox ')); ?></li>
                                    <li><?php echo e(\App\CPU\translate('Add_Domain_(For_ex:_demo.6amtech.com)')); ?></li>
                                    <li><?php echo e(\App\CPU\translate('Check_in_“Accept_the_reCAPTCHA_Terms_of_Service”')); ?></li>
                                    <li><?php echo e(\App\CPU\translate('Press_Submit')); ?></li>
                                    <li><?php echo e(\App\CPU\translate('Copy_Site_Key_and_Secret_Key,_Paste_in_the_input_filed_below_and_Save.')); ?></li>
                                </ol>

                                <div class="d-flex justify-content-end">
                                    <button type="<?php echo e(env('APP_MODE')!='demo'?'submit':'button'); ?>"
                                            onclick="<?php echo e(env('APP_MODE')!='demo'?'':'call_demo()'); ?>"
                                            class="btn btn--primary px-4"><?php echo e(\App\CPU\translate('save')); ?></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script_2'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tikka\resources\views/admin/business-settings/recaptcha-index.blade.php ENDPATH**/ ?>