

<div class="footer">
    <div class="row justify-content-between align-items-center">
        <div class="col-lg-4 mb-3 mb-lg-0">
            <p class="font-size-sm mb-0 title-color text-center text-lg-left">
                &copy; <?php echo e(\App\Models\BusinessSetting::where(['type'=>'company_name'])->first()->value); ?>. <span
                    class="d-none d-sm-inline-block"><?php echo e(\App\Models\BusinessSetting::where(['type'=>'company_copyright_text'])->first()->value); ?></span>
            </p>
        </div>
        <div class="col-lg-8">
            <div class="d-flex justify-content-center justify-content-lg-end">
                <!-- List Dot -->
                <ul class="list-inline list-footer-icon justify-content-center justify-content-lg-start mb-0">
                    <li class="list-inline-item">
                        <a class="list-separator-link" href="<?php echo e(route('admin.business-settings.web-config.index')); ?>">
                            <i class="tio-settings"></i>
                            <?php echo e(\App\CPU\translate('Business Setup')); ?>

                        </a>
                    </li>

                    <li class="list-inline-item">
                        <a class="list-separator-link"href="<?php echo e(route('admin.profile.update',auth('admin')->user()->id)); ?>">
                            <i class="tio-user"></i>
                            <?php echo e(\App\CPU\translate('Profile')); ?>

                        </a>
                    </li>

                    <li class="list-inline-item">
                        <a class="list-separator-link" href="<?php echo e(route('admin.dashboard.index')); ?>">
                            <i class="tio-home-outlined"></i>
                            <?php echo e(\App\CPU\translate('Home')); ?>

                        </a>
                    </li>

                    <li class="list-inline-item">
                        <label class="badge badge-soft-version text-capitalize">
                            <?php echo e(\App\CPU\translate('Software version')); ?> <?php echo e(env('SOFTWARE_VERSION')); ?>

                        </label>
                    </li>
                </ul>
                <!-- End List Dot -->
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\tikka\resources\views/layouts/back-end/partials/_footer.blade.php ENDPATH**/ ?>