<?php $__env->startSection('title', \App\CPU\translate('app_settings')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <link href="<?php echo e(asset('select2/css/select2.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('public/assets/back-end/css/custom.css')); ?>" rel="stylesheet">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <!-- Page Title -->
        <div class="pb-2">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img src="<?php echo e(asset('public/assets/back-end/img/business-setup.png')); ?>" alt="">
                <?php echo e(\App\CPU\translate('Business_Setup')); ?>

            </h2>
        </div>
        <!-- End Page Title -->

        <!-- Inlile Menu -->
        <?php echo $__env->make('admin.business-settings.business-setup-inline-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- End Inlile Menu -->

        <div class="row">
            <div class="col-12 col-md-6 mb-3">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0"><?php echo e(\App\CPU\translate('apple_store')); ?> <?php echo e(\App\CPU\translate('Status')); ?></h5>
                    </div>
                    <div class="card-body">
                        <?php ($config=\App\CPU\Helpers::get_business_settings('download_app_apple_stroe')); ?>
                        <form style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;"
                              action="<?php echo e(route('admin.business-settings.web-config.app-store-update',['download_app_apple_stroe'])); ?>"
                              method="post">
                            <?php echo csrf_field(); ?>
                            <?php if(isset($config)): ?>

                                <div class="d-flex gap-10 align-items-center mb-2">
                                    <input type="radio" name="status" value="1" <?php echo e($config['status']==1?'checked':''); ?>>
                                    <label class="title-color mb-0"><?php echo e(\App\CPU\translate('Active')); ?></label>
                                    <br>
                                </div>

                                <div class="d-flex gap-10 align-items-center mb-4">
                                    <input type="radio" name="status" value="0" <?php echo e($config['status']==0?'checked':''); ?>>
                                    <label class="title-color mb-0"><?php echo e(\App\CPU\translate('Inactive')); ?></label>
                                    <br>
                                </div>
                                <div class="form-group">
                                    <label class="title-color"><?php echo e(\App\CPU\translate('link')); ?></label><br>
                                    <input type="text" class="form-control" name="link" value="<?php echo e($config['link']); ?>"
                                           required>
                                </div>

                                <div class="mt-3 d-flex flex-wrap justify-content-end gap-10">
                                    <button type="submit"
                                            class="btn btn--primary px-4"><?php echo e(\App\CPU\translate('Save')); ?></button>
                                    <?php else: ?>
                                        <button type="submit"
                                                class="btn btn--primary px-4"><?php echo e(\App\CPU\translate('Configure')); ?></button>
                                    <?php endif; ?>
                                </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0"><?php echo e(\App\CPU\translate('google_play_store')); ?> <?php echo e(\App\CPU\translate('Status')); ?></h5>
                    </div>
                    <div class="card-body">

                        <?php ($config=\App\CPU\Helpers::get_business_settings('download_app_google_stroe')); ?>
                        <form style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;"
                              action="<?php echo e(route('admin.business-settings.web-config.app-store-update',['download_app_google_stroe'])); ?>"
                              method="post">
                            <?php echo csrf_field(); ?>
                            <?php if(isset($config)): ?>

                                <div class="d-flex gap-10 align-items-center mb-2">
                                    <input type="radio" name="status" value="1" <?php echo e($config['status']==1?'checked':''); ?>>
                                    <label class="title-color mb-0"><?php echo e(\App\CPU\translate('Active')); ?></label>
                                    <br>
                                </div>
                                <div class="d-flex gap-10 align-items-center mb-4">
                                    <input type="radio" name="status" value="0" <?php echo e($config['status']==0?'checked':''); ?>>
                                    <label class="title-color mb-0"><?php echo e(\App\CPU\translate('Inactive')); ?></label>
                                    <br>
                                </div>
                                <div class="form-group">
                                    <label class="title-color"><?php echo e(\App\CPU\translate('link')); ?></label><br>
                                    <input type="text" class="form-control" name="link" value="<?php echo e($config['link']); ?>"
                                           required>
                                </div>

                                <div class="mt-3 d-flex flex-wrap justify-content-end gap-10">
                                    <button type="submit"
                                            class="btn btn--primary px-4"><?php echo e(\App\CPU\translate('Save')); ?></button>
                                    <?php else: ?>
                                        <button type="submit"
                                                class="btn btn--primary px-4"><?php echo e(\App\CPU\translate('Configure')); ?></button>
                                    <?php endif; ?>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(asset('public/assets/back-end/js/tags-input.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/select2/js/select2.min.js')); ?>"></script>
    <script>

        $("#customFileUploadShop").change(function () {
            read_image(this, 'viewerShop');
        });

        $("#customFileUploadWL").change(function () {
            read_image(this, 'viewerWL');
        });

        $("#customFileUploadWFL").change(function () {
            read_image(this, 'viewerWFL');
        });

        $("#customFileUploadML").change(function () {
            read_image(this, 'viewerML');
        });

        $("#customFileUploadFI").change(function () {
            read_image(this, 'viewerFI');
        });

        $("#customFileUploadLoader").change(function () {
            read_image(this, 'viewerLoader');
        });

        function read_image(input, id) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#' + id).attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $(".js-example-theme-single").select2({
            theme: "classic"
        });

        $(".js-example-responsive").select2({
            width: 'resolve'
        });

    </script>

    <script>
        <?php ($language=\App\Models\BusinessSetting::where('type','pnc_language')->first()); ?>
        <?php ($language = $language->value ?? null); ?>
        let language = <?php echo e($language); ?>;
        $('#language').val(language);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tikka\resources\views/admin/business-settings/apps-settings.blade.php ENDPATH**/ ?>