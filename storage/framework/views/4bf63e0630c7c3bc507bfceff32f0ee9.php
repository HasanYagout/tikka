<?php $__env->startSection('title', \App\CPU\translate('Edit Role')); ?>
<?php $__env->startPush('css_or_js'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <!-- Page Title -->
        <div class="mb-3">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img src="<?php echo e(asset('public/assets/back-end/img/add-new-seller.png')); ?>" alt="">
                <?php echo e(\App\CPU\translate('Role_Update')); ?>

            </h2>
        </div>
        <!-- End Page Title -->

        <!-- Content Row -->
        <div class="card">
            <div class="card-body">
                <form id="submit-create-role" action="<?php echo e(route('admin.custom-role.update',[$role['id']])); ?>" method="post"
                      style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group mb-4">
                                <label for="name" class="title-color"><?php echo e(\App\CPU\translate('role_name')); ?></label>
                                <input type="text" name="name" value="<?php echo e($role['name']); ?>" class="form-control" id="name"
                                       aria-describedby="emailHelp"
                                       placeholder="<?php echo e(\App\CPU\translate('Ex')); ?> : <?php echo e(\App\CPU\translate('Store')); ?>">
                            </div>
                        </div>
                    </div>

                    <div class="d-flex gap-4 flex-wrap">
                        <label for="module" class="title-color mb-0"><?php echo e(\App\CPU\translate('module_permission')); ?>

                            : </label>
                        <div class="form-group d-flex gap-2">
                            <input type="checkbox" id="select_all">
                            <label class="title-color mb-0"
                                   for="select_all"><?php echo e(\App\CPU\translate('Select_All')); ?></label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-sm-6">
                            <div class="form-group form-check">
                                <input type="checkbox" name="modules[]" value="dashboard"
                                       class="form-check-input module-permission"
                                       id="dashboard" <?php echo e(in_array('dashboard',(array)json_decode($role['module_access']))?'checked':''); ?>>
                                <label class="form-check-label"
                                       style="<?php echo e(Session::get('direction') === "rtl" ? 'margin-right: 1.25rem;' : ''); ?>;"
                                       for="order"><?php echo e(\App\CPU\translate('Dashboard')); ?></label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input module-permission" name="modules[]"
                                       <?php echo e(in_array('pos_management',(array)json_decode($role['module_access']))?'checked':''); ?> value="pos_management"
                                       id="pos_management">
                                <label class="title-color mb-0"
                                       style="<?php echo e(Session::get('direction') === "rtl" ? 'margin-right: 1.25rem;' : ''); ?>;"
                                       for="pos_management"><?php echo e(\App\CPU\translate('pos_management')); ?></label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="form-group form-check">
                                <input type="checkbox" name="modules[]" value="order_management"
                                       class="form-check-input module-permission"
                                       id="order" <?php echo e(in_array('order_management',(array)json_decode($role['module_access']))?'checked':''); ?>>
                                <label class="form-check-label"
                                       style="<?php echo e(Session::get('direction') === "rtl" ? 'margin-right: 1.25rem;' : ''); ?>;"
                                       style="<?php echo e(Session::get('direction') === "rtl" ? 'margin-right: 1.25rem;' : ''); ?>;"
                                       for="order"><?php echo e(\App\CPU\translate('Order_Management')); ?></label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="form-group form-check">
                                <input type="checkbox" name="modules[]" value="product_management"
                                       class="form-check-input module-permission"
                                       id="product" <?php echo e(in_array('product_management',(array)json_decode($role['module_access']))?'checked':''); ?>>
                                <label class="form-check-label"
                                       style="<?php echo e(Session::get('direction') === "rtl" ? 'margin-right: 1.25rem;' : ''); ?>;"
                                       for="product"><?php echo e(\App\CPU\translate('Product_Management')); ?></label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="form-group form-check">
                                <input type="checkbox" name="modules[]" value="promotion_management"
                                       class="form-check-input module-permission"
                                       id="promotion_management" <?php echo e(in_array('promotion_management',(array)json_decode($role['module_access']))?'checked':''); ?>>
                                <label class="form-check-label"
                                       style="<?php echo e(Session::get('direction') === "rtl" ? 'margin-right: 1.25rem;' : ''); ?>;"
                                       for="promotion_management"><?php echo e(\App\CPU\translate('Promotion_Management')); ?></label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="form-group form-check">
                                <input type="checkbox" name="modules[]" value="support_section"
                                       class="form-check-input module-permission"
                                       id="support_section" <?php echo e(in_array('support_section',(array)json_decode($role['module_access']))?'checked':''); ?>>
                                <label class="form-check-label"
                                       style="<?php echo e(Session::get('direction') === "rtl" ? 'margin-right: 1.25rem;' : ''); ?>;"
                                       for="support_section"><?php echo e(\App\CPU\translate('Help_&_Support_Section')); ?></label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="form-group form-check">
                                <input type="checkbox" name="modules[]" value="report"
                                       class="form-check-input module-permission"
                                       id="report" <?php echo e(in_array('report',(array)json_decode($role['module_access']))?'checked':''); ?>>
                                <label class="form-check-label"
                                       style="<?php echo e(Session::get('direction') === "rtl" ? 'margin-right: 1.25rem;' : ''); ?>;"
                                       for="report"><?php echo e(\App\CPU\translate('reports_and_analytics')); ?></label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="form-group form-check">
                                <input type="checkbox" name="modules[]" value="user_section"
                                       class="form-check-input module-permission"
                                       id="user_section" <?php echo e(in_array('user_section',(array)json_decode($role['module_access']))?'checked':''); ?>>
                                <label class="form-check-label"
                                       style="<?php echo e(Session::get('direction') === "rtl" ? 'margin-right: 1.25rem;' : ''); ?>;"
                                       for="user_section"><?php echo e(\App\CPU\translate('user_management')); ?></label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="form-group form-check">
                                <input type="checkbox" name="modules[]" value="system_settings"
                                       class="form-check-input module-permission"
                                       id="system_settings" <?php echo e(in_array('system_settings',(array)json_decode($role['module_access']))?'checked':''); ?>>
                                <label class="form-check-label"
                                       style="<?php echo e(Session::get('direction') === "rtl" ? 'margin-right: 1.25rem;' : ''); ?>;"
                                       for="system_settings"><?php echo e(\App\CPU\translate('System_Settings')); ?></label>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-3">
                        <button type="reset" class="btn btn-secondary"><?php echo e(\App\CPU\translate('reset')); ?></button>
                        <button type="submit" class="btn btn--primary"><?php echo e(\App\CPU\translate('update')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>

        $('#submit-create-role').on('submit', function (e) {

            var fields = $("input[name='modules[]']").serializeArray();
            if (fields.length === 0) {
                toastr.warning('<?php echo e(\App\CPU\translate('select_minimum_one_selection_box')); ?>', {
                    CloseButton: true,
                    ProgressBar: true
                });
                return false;
            } else {
                $('#submit-create-role').submit();
            }
        });
    </script>

    <script>
        $("#select_all").on('change', function () {
            if ($("#select_all").is(":checked") === true) {
                console.log($("#select_all").is(":checked"));
                $(".module-permission").prop("checked", true);
            } else {
                $(".module-permission").removeAttr("checked");
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tikka\resources\views/admin/custom-role/edit.blade.php ENDPATH**/ ?>