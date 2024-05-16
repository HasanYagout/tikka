<?php $__env->startSection('title', \App\CPU\translate('Create Role')); ?>
<?php $__env->startPush('css_or_js'); ?>
    <!-- Custom styles for this page -->
    <link href="<?php echo e(asset('public/assets/back-end')); ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <!-- Page Title -->
        <div class="mb-3">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img src="<?php echo e(asset('public/assets/back-end/img/add-new-seller.png')); ?>" alt="">
                <?php echo e(\App\CPU\translate('Employee_Role_Setup')); ?>

            </h2>
        </div>
        <!-- End Page Title -->

        <!-- Content Row -->
        <div class="card">
            <div class="card-body">
                <form id="submit-create-role" method="post" action="<?php echo e(route('admin.custom-role.store')); ?>"
                        style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group mb-4">
                                <label for="name" class="title-color"><?php echo e(\App\CPU\translate('role_name')); ?></label>
                                <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="emailHelp"
                                    placeholder="<?php echo e(\App\CPU\translate('Ex')); ?> : <?php echo e(\App\CPU\translate('Store')); ?>" required>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex gap-4 flex-wrap">
                        <label for="name" class="title-color font-weight-bold mb-0"><?php echo e(\App\CPU\translate('module_permission')); ?> </label>
                        <div class="form-group d-flex gap-2">
                            <input type="checkbox" id="select_all">
                            <label class="title-color mb-0" for="select_all"><?php echo e(\App\CPU\translate('Select All')); ?></label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 col-lg-3">
                            <div class="form-group d-flex gap-2">
                                <input type="checkbox" name="modules[]" value="dashboard" class="module-permission" id="dashboard">
                                <label class="title-color mb-0" style="<?php echo e(Session::get('direction') === "rtl" ? 'margin-right: 1.25rem;' : ''); ?>;"
                                        for="dashboard"><?php echo e(\App\CPU\translate('Dashboard')); ?></label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="form-group d-flex gap-2">
                                <input type="checkbox" name="modules[]" value="pos_management"
                                       id="pos_management">
                                <label class="title-color mb-0" style="<?php echo e(Session::get('direction') === "rtl" ? 'margin-right: 1.25rem;' : ''); ?>;"
                                       for="pos_management"><?php echo e(\App\CPU\translate('pos_management')); ?></label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="form-group d-flex gap-2">
                                <input type="checkbox" class="module-permission" name="modules[]" value="order_management" id="order">
                                <label class="title-color mb-0" style="<?php echo e(Session::get('direction') === "rtl" ? 'margin-right: 1.25rem;' : ''); ?>;" for="order"><?php echo e(\App\CPU\translate('Order_Management')); ?></label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="form-group d-flex gap-2">
                                <input type="checkbox" class="module-permission" name="modules[]" value="product_management" id="product">
                                <label class="title-color mb-0" style="<?php echo e(Session::get('direction') === "rtl" ? 'margin-right: 1.25rem;' : ''); ?>;"
                                        for="product"><?php echo e(\App\CPU\translate('Product_Management')); ?></label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="form-group d-flex gap-2">
                                <input type="checkbox" class="module-permission" name="modules[]" value="promotion_management" id="promotion_management">
                                <label class="title-color mb-0" style="<?php echo e(Session::get('direction') === "rtl" ? 'margin-right: 1.25rem;' : ''); ?>;"
                                        for="promotion_management"><?php echo e(\App\CPU\translate('Promotion_Management')); ?></label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="form-group d-flex gap-2">
                                <input type="checkbox" name="modules[]" class="module-permission" value="support_section" id="support_section">
                                <label class="title-color mb-0" style="<?php echo e(Session::get('direction') === "rtl" ? 'margin-right: 1.25rem;' : ''); ?>;"
                                        for="support_section"><?php echo e(\App\CPU\translate('Help_&_Support_Section')); ?></label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="form-group d-flex gap-2">
                                <input type="checkbox" class="module-permission" name="modules[]" value="report" id="report">
                                <label class="title-color mb-0" style="<?php echo e(Session::get('direction') === "rtl" ? 'margin-right: 1.25rem;' : ''); ?>;"
                                        for="report"><?php echo e(\App\CPU\translate('Reports_&_Analytics')); ?></label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="form-group d-flex gap-2">
                                <input type="checkbox" class="module-permission" name="modules[]" value="user_section" id="user_section">
                                <label class="title-color mb-0" style="<?php echo e(Session::get('direction') === "rtl" ? 'margin-right: 1.25rem;' : ''); ?>;"
                                        for="user_section"><?php echo e(\App\CPU\translate('User_Management')); ?></label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="form-group d-flex gap-2">
                                <input type="checkbox" class="module-permission" name="modules[]" value="system_settings" id="system_settings">
                                <label class="title-color mb-0" style="<?php echo e(Session::get('direction') === "rtl" ? 'margin-right: 1.25rem;' : ''); ?>;"
                                        for="system_settings"><?php echo e(\App\CPU\translate('System_Settings')); ?></label>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn--primary"><?php echo e(\App\CPU\translate('Submit')); ?></button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card mt-3">
            <div class="px-3 py-4">
                <div class="row justify-content-between align-items-center flex-grow-1">
                    <div class="col-md-4 col-lg-6 mb-2 mb-sm-0">
                        <h5 class="d-flex align-items-center gap-2">
                            <?php echo e(\App\CPU\translate('Employee Roles')); ?>

                            <span class="badge badge-soft-dark radius-50 fz-12 ml-1"><?php echo e(count($rl)); ?></span>
                        </h5>
                    </div>
                    <div class="col-md-8 col-lg-6 d-flex flex-wrap flex-sm-nowrap justify-content-sm-end gap-3">
                        <!-- Search -->
                        <form action="<?php echo e(url()->current()); ?>?search=<?php echo e($search); ?>" method="GET">
                            <div class="input-group input-group-merge input-group-custom">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="tio-search"></i>
                                    </div>
                                </div>
                                <input id="datatableSearch_" type="search" name="search" class="form-control" placeholder="<?php echo e(\App\CPU\translate('search_role')); ?>"
                                        value="<?php echo e($search); ?>">
                                <button type="submit" class="btn btn--primary"><?php echo e(\App\CPU\translate('search')); ?></button>
                            </div>
                        </form>
                        <!-- End Search -->
                        <div class="">
                            <button type="button" class="btn btn-outline--primary text-nowrap" data-toggle="dropdown">
                                <i class="tio-download-to"></i>
                                <?php echo e(\App\CPU\translate('export')); ?>

                                <i class="tio-chevron-down"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a class="dropdown-item" href="<?php echo e(route('admin.custom-role.export')); ?>"><?php echo e(\App\CPU\translate('excel')); ?></a></li>
                                <div class="dropdown-divider"></div>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pb-3">
                <div class="table-responsive">
                    <table class="table table-hover table-borderless table-thead-bordered table-align-middle card-table" cellspacing="0"
                            style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
                        <thead class="thead-light thead-50 text-capitalize table-nowrap">
                            <tr>
                                <th><?php echo e(\App\CPU\translate('SL')); ?></th>
                                <th><?php echo e(\App\CPU\translate('role_name')); ?></th>
                                <th><?php echo e(\App\CPU\translate('modules')); ?></th>
                                <th><?php echo e(\App\CPU\translate('created_at')); ?></th>
                                <th><?php echo e(\App\CPU\translate('status')); ?></th>
                                <th class="text-center"><?php echo e(\App\CPU\translate('action')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $rl; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($k+1); ?></td>
                                <td><?php echo e($r['name']); ?></td>
                                <td class="text-capitalize">
                                    <?php if($r['module_access']!=null): ?>
                                        <?php $__currentLoopData = (array)json_decode($r['module_access']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($m == 'report'): ?>
                                                <?php echo e(\App\CPU\translate('reports_and_analytics')); ?> <br>
                                            <?php elseif($m == 'user_section'): ?>
                                                <?php echo e(\App\CPU\translate('user_management')); ?> <br>
                                            <?php elseif($m == 'support_section'): ?>
                                                <?php echo e(\App\CPU\translate('Help_&_Support_Section')); ?> <br>
                                            <?php else: ?>
                                                <?php echo e(\App\CPU\translate(str_replace('_',' ',$m))); ?> <br>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e(date('d-M-y',strtotime($r['created_at']))); ?></td>
                                <td>
                                    <label class="switcher">
                                        <input type="checkbox" class="switcher_input employee-role-status"
                                                id="<?php echo e($r['id']); ?>" <?php echo e($r['status'] == 1?'checked':''); ?>>
                                        <span class="switcher_control"></span>
                                    </label>
                                </td>
                                <td>
                                    <div class="d-flex gap-2 justify-content-center">
                                        <a href="<?php echo e(route('admin.custom-role.update',[$r['id']])); ?>"
                                            class="btn btn-outline--primary btn-sm square-btn"
                                            title="<?php echo e(\App\CPU\translate('Edit')); ?>">
                                            <i class="tio-edit"></i>
                                        </a>
                                        <a href="#"
                                            class="btn btn-outline-danger btn-sm delete"
                                            title="<?php echo e(\App\CPU\translate('Delete')); ?>" id="<?php echo e($r['id']); ?>">
                                            <i class="tio-delete"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <!-- Page level plugins -->
    <script src="<?php echo e(asset('public/assets/back-end')); ?>/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo e(asset('public/assets/back-end')); ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Page level custom scripts -->
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable();
        });

        $(document).on('click', '.delete', function () {
            var id = $(this).attr("id");
            Swal.fire({
                title: '<?php echo e(\App\CPU\translate('Are_you_sure_delete_this_role')); ?>?',
                text: "<?php echo e(\App\CPU\translate('You_will_not_be_able_to_revert_this')); ?>!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '<?php echo e(\App\CPU\translate('Yes')); ?>, <?php echo e(\App\CPU\translate('delete_it')); ?>!',
                cancelButtonText: "<?php echo e(\App\CPU\translate('cancel')); ?>",
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "<?php echo e(route('admin.custom-role.delete')); ?>",
                        method: 'POST',
                        data: {id: id},
                        success: function () {
                            toastr.success('<?php echo e(\App\CPU\translate('Role_deleted_successfully')); ?>');
                            location.reload();
                        }
                    });
                }
            })
        });
    </script>
    <script>

        $('#submit-create-role').on('submit',function(e){

            var fields = $("input[name='modules[]']").serializeArray();
            if (fields.length === 0)
            {
                toastr.warning('<?php echo e(\App\CPU\translate('select_minimum_one_selection_box')); ?>', {
                            CloseButton: true,
                            ProgressBar: true
                        });
                return false;
            }else{
                $('#submit-create-role').submit();
            }
        });
    </script>
    <script>
        $(document).on('change', '.employee-role-status', function () {
            var id = $(this).attr("id");
            if ($(this).prop("checked") == true) {
                var status = 1;
            } else if ($(this).prop("checked") == false) {
                var status = 0;
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                url: "<?php echo e(route('admin.custom-role.employee-role-status')); ?>",
                method: 'POST',
                data: {
                    id: id,
                    status: status
                },
                success: function (data) {
                    if(data.success == true) {
                        toastr.success('<?php echo e(\App\CPU\translate('Status updated successfully')); ?>');
                    }
                }
            });
        });
    </script>

    <script>
        $("#select_all").on('change', function (){
            if($("#select_all").is(":checked") === true){
                console.log($("#select_all").is(":checked"));
                $(".module-permission").prop("checked", true);
            }else{
                $(".module-permission").removeAttr("checked");
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tikka\resources\views/admin/custom-role/create.blade.php ENDPATH**/ ?>