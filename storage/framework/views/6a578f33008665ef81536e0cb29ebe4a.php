<?php $__env->startSection('title', \App\CPU\translate('Social-Media-Chatting')); ?>

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

        <?php ($messenger = \App\CPU\Helpers::get_business_settings('messenger')); ?>
        <div class="row gy-3">


































                <?php ($whatsapp = \App\CPU\Helpers::get_business_settings('whatsapp')); ?>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body text-<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>">
                            <form
                                action="<?php echo e(route('admin.social-media-chat.update',['whatsapp'])); ?>"
                                method="post">
                                <?php echo csrf_field(); ?>
                                <div class="d-flex flex-column align-items-center gap-2 mb-3">
                                    <h4 class="text-center"><?php echo e(\App\CPU\translate('WhatsApp')); ?></h4>
                                </div>
                                <?php if($whatsapp): ?>
                                    <label class="switcher position-absolute right-3 top-3">
                                        <input class="switcher_input" type="checkbox" value="1" name="status" <?php echo e($whatsapp['status']==1?'checked':''); ?>>
                                        <span class="switcher_control"></span>
                                    </label>
                                    <div class="form-group">
                                        <label class="title-color font-weight-bold text-capitalize"><?php echo e(\App\CPU\translate('whatsapp_phone_number')); ?></label>
                                        <span class="ml-2" data-toggle="tooltip" data-placement="top" title="<?php echo e(\App\CPU\translate('provide_a_WhatsApp_number_without_country_code')); ?>">
                                            <img class="info-img" src="<?php echo e(asset('public/assets/back-end/img/info-circle.svg')); ?>" alt="img">
                                        </span>
                                        <input type="text" class="form-control form-ellipsis" name="phone" value="<?php echo e($whatsapp['phone']); ?>">
                                    </div>
                                    <div class="d-flex justify-content-end flex-wrap">
                                        <button type="<?php echo e(env('APP_MODE')!='demo'?'submit':'button'); ?>" class="btn btn--primary px-4"><?php echo e(\App\CPU\translate('save')); ?></button>
                                    </div>
                                <?php else: ?>
                                    <div class="mt-3 d-flex flex-wrap justify-content-center gap-10">
                                        <button type="submit" class="btn btn--primary px-4 text-uppercase"><?php echo e(\App\CPU\translate('Configure')); ?></button>
                                    </div>
                                <?php endif; ?>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tikka\resources\views/admin/business-settings/social-media-chat/view.blade.php ENDPATH**/ ?>