<?php $__env->startSection('title', \App\CPU\translate('Delivery_Restriction')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <link href="<?php echo e(asset('public/assets/back-end/css/tags-input.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('select2/css/select2.min.css')); ?>" rel="stylesheet">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <style>
        .select2-selection__rendered{
            width: 100%;
        }
    </style>
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
        <div class="row gy-2">
            <!-- Delivery to Country -->
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="mb-0 text-capitalize d-flex gap-1">
                            <i class="tio-briefcase"></i>
                            <?php echo e(\App\CPU\translate('delivery_available_country')); ?>

                        </h5>
                        <label class="switcher">
                            <input type="checkbox" onchange="status_change(this)" data-id="country_area" class="status switcher_input" data-url="<?php echo e(route('admin.business-settings.delivery-restriction.country-restriction-status-change')); ?>" <?php echo e(isset($country_restriction_status->value) && $country_restriction_status->value  == 1 ? 'checked' : ''); ?>>
                            <span class="switcher_control"></span>
                        </label>
                    </div>
                    <div class="card-body country-disable">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="<?php echo e(route('admin.business-settings.delivery-restriction.add-delivery-country')); ?>"
                                      method="post">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group">
                                        <label class="title-color d-flex"><?php echo e(\App\CPU\translate('country')); ?> </label>
                                        <select
                                            class="js-example-basic-multiple js-states js-example-responsive form-control"
                                            name="country_code[]" id="choice_attributes" multiple="multiple">
                                            <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($country['code']); ?>" <?php echo e(in_array($country['code'], $stored_country_code) ? 'disabled' : ''); ?>>
                                                    <?php echo e($country['name']); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <div class="mt-3 d-flex justify-content-end">
                                            <button type="submit"
                                                    class="btn btn--primary px-4"><?php echo e(\App\CPU\translate('Submit')); ?></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-12 mt-6">
                                <div class="table-responsive">
                                    <table id="datatable"
                                           class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table w-100">
                                        <thead class="thead-light thead-50 text-capitalize">
                                        <tr>
                                            <th><?php echo e(\App\CPU\translate('sl')); ?></th>
                                            <th class="text-center"><?php echo e(\App\CPU\translate('country_name')); ?></th>
                                            <th class="text-center"><?php echo e(\App\CPU\translate('action')); ?></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__empty_1 = true; $__currentLoopData = $stored_countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$store): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <td class=""><?php echo e($stored_countries->firstItem()+$k); ?></td>
                                            <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($store->country_code == $country['code']): ?>
                                                    <td class="text-center"><?php echo e($country['name']); ?></td>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            <td>
                                                <div class="d-flex justify-content-center gap-2">
                                                    <a class="btn btn-outline-danger btn-sm square-btn"
                                                       href="javascript:"
                                                       title="<?php echo e(\App\CPU\translate('Delete')); ?>"
                                                       onclick="form_alert('product-<?php echo e($store->id); ?>','Want to delete this item ?')">
                                                        <i class="tio-delete"></i>
                                                    </a>
                                                    <form
                                                        action="<?php echo e(route('admin.business-settings.delivery-restriction.delivery-country-delete',['id' => $store->id])); ?>"
                                                        method="post" id="product-<?php echo e($store->id); ?>">
                                                        <?php echo csrf_field(); ?> <?php echo method_field('delete'); ?>
                                                    </form>
                                                </div>
                                            </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <tr>
                                                <td colspan="3">
                                                    <div class="text-center p-4">
                                                        <img class="mb-3 w-160" src="<?php echo e(asset('public/assets/back-end')); ?>/svg/illustrations/sorry.svg" alt="Image Description">
                                                        <p class="mb-0"><?php echo e(\App\CPU\translate('No Country Found')); ?></p>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="table-responsive mt-4">
                                    <div class="d-flex justify-content-lg-end">
                                        <!-- Pagination -->
                                        <?php echo e($stored_countries->links()); ?>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- End Delivery to Country -->
            <!-- Delivery to zipcode area -->
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="mb-0 text-capitalize d-flex gap-1">
                            <i class="tio-briefcase"></i>
                            <?php echo e(\App\CPU\translate('delivery_available_zip_code_area')); ?>

                        </h5>
                        <label class="switcher">
                            <input type="checkbox" onchange="status_change(this)" data-id="zip_area" class="status switcher_input" data-url="<?php echo e(route('admin.business-settings.delivery-restriction.zipcode-restriction-status-change')); ?>" <?php echo e(isset($zip_code_area_restriction_status) && $zip_code_area_restriction_status->value  == 1? 'checked' : ''); ?>>
                            <span class="switcher_control"></span>
                        </label>

                    </div>
                    <div class="card-body zip-disable">
                        <div class="row">
                            <div class="col-lg-12">
                                <form action="<?php echo e(route('admin.business-settings.delivery-restriction.add-zip-code')); ?>"
                                      method="post">
                                    <?php echo csrf_field(); ?>
                                    <label class="title-color d-flex"> <?php echo e(\App\CPU\translate('zip_code')); ?> </label>

                                    <input type="text" class="form-control" name="zipcode"
                                           placeholder="<?php echo e(\App\CPU\translate('enter_zip_code')); ?>"
                                           data-role="tagsinput" required>
                                    <span class="pl-2 text-info">(<?php echo e(\App\CPU\translate('multiple_zip_codes_can_be_inputted_by_comma_separating_or_pressing_enter_button')); ?>)</span>

                                    <div class="mb-3 d-flex justify-content-end">
                                        <button type="submit" class="btn btn--primary px-4"><?php echo e(\App\CPU\translate('Submit')); ?></button>
                                    </div>
                                </form>

                            </div>
                            <div class="col-md-12 mt-6">
                                <div class="table-responsive">
                                    <table id="datatable"
                                           class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table w-100">
                                        <thead class="thead-light thead-50 text-capitalize">
                                        <tr>
                                            <th><?php echo e(\App\CPU\translate('sl')); ?></th>
                                            <th class="text-center"><?php echo e(\App\CPU\translate('zip_code')); ?></th>
                                            <th class="text-center"><?php echo e(\App\CPU\translate('action')); ?></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__empty_1 = true; $__currentLoopData = $stored_zip; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$zip): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <tr>
                                                <td><?php echo e($stored_zip->firstItem()+$k); ?></td>
                                                <td class="text-center"><?php echo e($zip->zipcode); ?></td>
                                                <td>
                                                    <div class="d-flex justify-content-center gap-2">
                                                        <a class="btn btn-outline-danger btn-sm square-btn"
                                                           href="javascript:"
                                                           title="<?php echo e(\App\CPU\translate('Delete')); ?>"
                                                           onclick="form_alert('product-<?php echo e($zip->id); ?>','Want to delete this item ?')">
                                                            <i class="tio-delete"></i>
                                                        </a>
                                                        <form
                                                            action="<?php echo e(route('admin.business-settings.delivery-restriction.zip-code-delete',['id' => $zip->id])); ?>"
                                                            method="post" id="product-<?php echo e($zip->id); ?>">
                                                            <?php echo csrf_field(); ?> <?php echo method_field('delete'); ?>
                                                        </form>
                                                    </div>


                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <tr>
                                                <td colspan="3">
                                                    <div class="text-center p-4">
                                                        <img class="mb-3 w-160" src="<?php echo e(asset('public/assets/back-end')); ?>/svg/illustrations/sorry.svg" alt="Image Description">
                                                        <p class="mb-0"><?php echo e(\App\CPU\translate('No Zip Code Found')); ?></p>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="table-responsive mt-4">
                                    <div class="d-flex justify-content-lg-end">
                                        <!-- Pagination -->
                                        <?php echo e($stored_zip->links()); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- End Delivery to zipcode area -->

        </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(asset('public/assets/back-end/js/tags-input.min.js')); ?>"></script>
    <script>

        $(".js-example-responsive").select2({
            theme: "classic",
            placeholder: "Select Country",
            allowClear: true,

        });
        $('.select2-search__field').css('width', '100%');

        $(".js-example-theme-single").select2({
            theme: "classic"
        });

        $(".js-example-responsive").select2({
            width: 'resolve'
        });


    </script>
    <script>
        let country_status = <?php echo e(isset($country_restriction_status)? $country_restriction_status->value: 0); ?>;
        let zip_status = <?php echo e(isset($zip_code_area_restriction_status)? $zip_code_area_restriction_status->value : 0); ?>;

        if (country_status === 0) {
            $(".country-disable").hide();
        }
        if(zip_status === 0) {
            $(".zip-disable").hide();
        }

        function status_change(t) {
            let url = $(t).data('url');
            let checked = $(t).prop("checked");
            let status = checked === true ? 1 : 0;

            Swal.fire({
                title: 'Are you sure?',
                text: 'Want to change status',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'No',
                confirmButtonText: 'Yes',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: url,
                        method: 'POST',
                        data: {
                            status: status
                        },
                        success: function (data) {
                            if (data.status === true) {
                                toastr.success(data.message);
                                if (status === 0){
                                    $(t).parents('.card-header').siblings('.card-body').hide();
                                } else if (status === 1){
                                    $(t).parents('.card-header').siblings('.card-body').show();
                                }
                            }
                        }
                    });
                }
            }
            )
        }

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tikka\resources\views/admin/business-settings/delivery-restriction.blade.php ENDPATH**/ ?>