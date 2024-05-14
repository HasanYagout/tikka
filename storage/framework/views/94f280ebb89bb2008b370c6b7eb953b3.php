<?php $__env->startSection('title', \App\CPU\translate('inhouse_shop')); ?>

<?php $__env->startPush('css_or_js'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">

        <!-- Page Title -->
        <div class="mb-3">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img src="<?php echo e(asset('public/assets/back-end/img/business-setup.png')); ?>" alt="">
                <?php echo e(\App\CPU\translate('Business_Setup')); ?>

            </h2>
        </div>
        <!-- End Page Title -->

        <!-- Inlile Menu -->
    <?php echo $__env->make('admin.business-settings.business-setup-inline-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- End Inlile Menu -->

        <div class="card mb-3">
            <div class="card-body">
                <div class="border rounded border-color-c1 px-4 py-3 d-flex justify-content-between mb-1">
                    <h5 class="mb-0 d-flex gap-1 c1">
                        <?php echo e(\App\CPU\translate('temporary_close')); ?>

                    </h5>
                    <div class="position-relative">
                        <label class="switcher">
                            <input type="checkbox" class="switcher_input" id="temporary_close" <?php echo e($temporary_close['status'] == 1?'checked':''); ?>>
                            <span class="switcher_control"></span>
                        </label>
                    </div>
                </div>
                <p>*<?php echo e(\App\CPU\translate('By_turning_on_temporary_close_mode,_your_shop_will_be_shown_as_temporary_off_in_the_website_and_app_for_the_customers._they_cannot_purchase_or_place_order_from_your_shop')); ?></p>
            </div>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 d-flex gap-2 flex-wrap">
                            <img src="<?php echo e(asset('public/assets/back-end/img/footer-logo.png')); ?>" alt="">
                        </h5>
                        <div class="d-inline-flex gap-2">
                            <button class="btn btn-block __inline-70" data-toggle="modal" data-target="#balance-modal">
                                <?php echo e(\App\CPU\translate('go_to_Vacation_Mode')); ?>

                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo e(route('admin.product-settings.inhouse-shop')); ?>" method="POST"
                              enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <center>
                                        <img class="upload-img-view upload-img-view__banner" id="viewerBanner"
                                             onerror="this.src='<?php echo e(asset('public/assets/back-end/img/400x400/img2.jpg')); ?>'"
                                             src="<?php echo e(asset('storage/shop')); ?>/<?php echo e(\App\CPU\Helpers::get_business_settings('shop_banner')); ?>"alt="banner image"/>
                                    </center>
                                    <div class="position-relative mt-4">
                                        <div class="d-flex gap-1 align-items-center title-color mb-2">
                                            <?php echo e(translate('shop_cover_image')); ?>

                                        </div>

                                        <div class="custom-file">
                                            <input type="file" name="shop_banner" id="BannerUpload"
                                                   class="custom-file-input"
                                                   accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                            <label class="custom-file-label" for="customFileUploadShop">
                                                <?php echo e(\App\CPU\translate('choose')); ?> <?php echo e(\App\CPU\translate('file')); ?>

                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <?php if(theme_root_path() == "theme_aster"): ?>
                                    <div class="col-lg-6 form-group">
                                        <center>
                                            <img class="upload-img-view upload-img-view__banner" id="viewerBottomBanner"
                                                 onerror="this.src='<?php echo e(asset('public/assets/back-end/img/400x400/img2.jpg')); ?>'"
                                                 src="<?php echo e(asset('storage/shop')); ?>/<?php echo e(\App\CPU\Helpers::get_business_settings('bottom_banner')); ?>"alt="banner image"/>
                                        </center>

                                        <div class="mt-4">
                                            <div class="d-flex gap-1 align-items-center title-color mb-2">
                                                <?php echo e(translate('secondary_banner')); ?>

                                                <span class="text-info">(<?php echo e(translate('ratio')); ?> <?php echo e(translate('3')); ?>:<?php echo e(translate('1')); ?>)</span>
                                            </div>

                                            <div class="custom-file">
                                                <input type="file" name="bottom_banner" id="BottomBannerUpload" class="custom-file-input"
                                                       accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                                <label class="custom-file-label" for="BottomBannerUpload"><?php echo e(translate('Upload')); ?> <?php echo e(translate('secondary')); ?> <?php echo e(translate('Banner')); ?></label>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="d-flex justify-content-end mt-30">
                                <button type="submit" class="btn btn--primary px-4"><?php echo e(\App\CPU\translate('Upload')); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="balance-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content"
                 style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
                <form action="<?php echo e(route('admin.product-settings.vacation-add')); ?>" method="post">
                    <div class="modal-header border-bottom pb-2">
                        <div>
                            <h5 class="modal-title" id="exampleModalLabel"><?php echo e(\App\CPU\translate('Vacation_Mode')); ?></h5>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="switcher">
                                    <input type="checkbox" name="status" class="switcher_input" id="vacation_close" <?php echo e($vacation['status'] == 1?'checked':''); ?>>
                                    <span class="switcher_control"></span>
                                </label>
                            </div>
                            <div class="col-md-6">
                                <button type="button" class="close pt-0" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="mb-5">*<?php echo e(\App\CPU\translate('set_vacation_mode_for_shop_means_you_will_be_not_available_receive_order_and_provider_products_for_placed_order_at_that_time')); ?></div>

                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-6">
                                <label><?php echo e(\App\CPU\translate('Vacation_Start')); ?></label>
                                <input type="date" name="vacation_start_date" value="<?php echo e($vacation['vacation_start_date']); ?>" id="vacation_start_date" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label><?php echo e(\App\CPU\translate('Vacation_End')); ?></label>
                                <input type="date" name="vacation_end_date" value="<?php echo e($vacation['vacation_end_date']); ?>" id="vacation_end_date" class="form-control" required>
                            </div>
                            <div class="col-md-12 mt-2 ">
                                <label><?php echo e(\App\CPU\translate('Vacation_Note')); ?></label>
                                <textarea class="form-control" name="vacation_note" id="vacation_note"><?php echo e($vacation['vacation_note']); ?></textarea>
                            </div>
                        </div>

                        <div class="text-end gap-5 mt-2">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(\App\CPU\translate('Close')); ?></button>
                            <button type="submit" class="btn btn--primary"><?php echo e(\App\CPU\translate('update')); ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        $('#temporary_close').on('change', function (){
            let status = $(this).prop("checked") === true ? 'checked':'unchecked';
            Swal.fire({
                title: '<?php echo e(\App\CPU\translate('are_you_sure_change_this')); ?>?',
                text: "",
                showCancelButton: true,
                confirmButtonColor: '#377dff',
                cancelButtonColor: 'secondary',
                confirmButtonText: '<?php echo e(\App\CPU\translate('Yes, Change it')); ?>!'
            }).then((result) => {
                if (result.value) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "<?php echo e(route('admin.product-settings.inhouse-shop-temporary-close')); ?>",
                        method: 'POST',
                        data: {
                            status: status
                        },
                        success: function (data) {
                            toastr.success('<?php echo e(\App\CPU\translate('temporary_close_updated_successfully')); ?>!');
                            location.reload();
                        }
                    });
                }
            });
        });

        $('#vacation_start_date,#vacation_end_date').change(function () {
            let fr = $('#vacation_start_date').val();
            let to = $('#vacation_end_date').val();
            if(fr != ''){
                $('#vacation_end_date').attr('required','required');
            }
            if(to != ''){
                $('#vacation_start_date').attr('required','required');
            }
            if (fr != '' && to != '') {
                if (fr > to) {
                    $('#vacation_start_date').val('');
                    $('#vacation_end_date').val('');
                    toastr.error('<?php echo e(\App\CPU\translate('Invalid date range')); ?>!', Error, {
                        CloseButton: true,
                        ProgressBar: true
                    });
                }
            }

        })

        function readBannerURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#viewerBanner').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        function readBottomBannerURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#viewerBottomBanner').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#BannerUpload").change(function () {
            readBannerURL(this);
        });
        $("#BottomBannerUpload").change(function () {
            readBottomBannerURL(this);
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tikka\resources\views/admin/product-settings/inhouse-shop.blade.php ENDPATH**/ ?>