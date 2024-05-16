<?php $__env->startSection('title', \App\CPU\translate('Currency')); ?>

<?php $__env->startPush('css_or_js'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <?php ($currency_model=\App\CPU\Helpers::get_business_settings('currency_model')); ?>
    <?php ($default=\App\CPU\Helpers::get_business_settings('system_default_currency')); ?>
    <div class="content container-fluid">
        <!-- Page Title -->
        <div class="mb-4 pb-2">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img src="<?php echo e(asset('public/assets/back-end/img/system-setting.png')); ?>" alt="">
                <?php echo e(\App\CPU\translate('System_Setup')); ?>

            </h2>
        </div>
        <!-- End Page Title -->

        <!-- Inline Menu -->
        <?php echo $__env->make('admin.business-settings.system-settings-inline-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- End Inline Menu -->

        <div class="row gy-2">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">
                            <img width="18" src="<?php echo e(asset('public/assets/back-end/img/currency.png')); ?>" alt="">
                            <?php echo e(\App\CPU\translate('Add New Currency')); ?>

                        </h5>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo e(route('admin.currency.store')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <input type="text" name="name" class="form-control"
                                               id="name" placeholder="<?php echo e(\App\CPU\translate('Enter currency Name')); ?>">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" name="symbol" class="form-control"
                                               id="symbol" placeholder="<?php echo e(\App\CPU\translate('Enter currency symbol')); ?>">
                                    </div>
                                </div>

                            </div>
                            <div class="">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <input type="text" name="code" class="form-control"
                                               id="code" placeholder="<?php echo e(\App\CPU\translate('Enter currency code')); ?>">
                                    </div>
                                    <?php if($currency_model=='multi_currency'): ?>
                                        <div class="col-md-6 mb-3">
                                            <input type="number" min="0" max="1000000"
                                                   name="exchange_rate" step="0.00000001"
                                                   class="form-control" id="exchange_rate"
                                                   placeholder="<?php echo e(\App\CPU\translate('Enter currency exchange rate')); ?>">
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group text-center">
                                <button type="submit" id="add" class="btn btn--primary text-capitalize">
                                    <i class="tio-add"></i> <?php echo e(\App\CPU\translate('add')); ?>

                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-header">
                        <h5 class="mb-0">
                            <i class="tio-settings"></i>
                            <?php echo e(\App\CPU\translate('system_default_currency')); ?>

                        </h5>
                    </div>
                    <div class="card-body">
                        <form class="form-inline_" action="<?php echo e(route('admin.currency.system-currency-update')); ?>"
                              method="post">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <?php ($default=\App\Models\BusinessSetting::where('type', 'system_default_currency')->first()); ?>
                                    <div class="form-group mb-2">
                                        <select class="form-control js-select2-custom"
                                                name="currency_id">
                                            <?php $__currentLoopData = App\Models\Currency::where('status', 1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option
                                                    value="<?php echo e($currency->id); ?>" <?php echo e($default->value == $currency->id?'selected':''); ?> >
                                                    <?php echo e($currency->name); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <div class="d-flex justify-content-end flex-wrap gap-10">
                                        <button type="submit"
                                                class="btn btn--primary"><?php echo e(\App\CPU\translate('Save')); ?></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="px-3 py-4">
                        <div class="row align-items-center">
                            <div class="col-sm-4 col-md-6 col-lg-8 mb-2 mb-sm-0">
                                <h5 class="mb-0 d-flex align-items-center gap-10">
                                    <?php echo e(\App\CPU\translate('Currency')); ?> <?php echo e(\App\CPU\translate('table')); ?>

                                    <span class="badge badge-soft-dark radius-50 fz-12 ml-1"><?php echo e($currencies->total()); ?></span>
                                </h5>
                            </div>
                            <div class="col-sm-8 col-md-6 col-lg-4">
                                <!-- Search -->
                                <form action="<?php echo e(url()->current()); ?>" method="GET">
                                    <div class="input-group input-group-merge input-group-custom">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="tio-search"></i>
                                            </div>
                                        </div>
                                        <input id="datatableSearch_" type="search" name="search" class="form-control"
                                               placeholder="<?php echo e(\App\CPU\translate('Search Currency Name or Currency Code')); ?>"
                                               aria-label="Search orders" value="<?php echo e($search); ?>" required>
                                        <button type="submit" class="btn btn--primary"><?php echo e(\App\CPU\translate('search')); ?></button>
                                    </div>
                                </form>
                                <!-- End Search -->
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table
                            class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table <?php echo e(Session::get('direction') === 'rtl' ? 'text-right' : 'text-left'); ?>

">
                            <thead class="thead-light thead-50 text-capitalize">
                                <tr>
                                    <th><?php echo e(\App\CPU\translate('SL')); ?></th>
                                    <th><?php echo e(\App\CPU\translate('currency_name')); ?></th>
                                    <th><?php echo e(\App\CPU\translate('currency_symbol')); ?></th>
                                    <th><?php echo e(\App\CPU\translate('currency_code')); ?></th>
                                    <?php if($currency_model=='multi_currency'): ?>
                                        <th><?php echo e(\App\CPU\translate('exchange_rate')); ?>

                                            (1 <?php echo e(App\Models\Currency::where('id', $default->value)->first()->code); ?>= ?)
                                        </th>
                                    <?php endif; ?>
                                    <th><?php echo e(\App\CPU\translate('status')); ?></th>
                                    <th class="text-center"><?php echo e(\App\CPU\translate('action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($currencies->firstitem()+ $key); ?></td>
                                    <td><?php echo e($data->name); ?></td>
                                    <td><?php echo e($data->symbol); ?></td>
                                    <td><?php echo e($data->code); ?></td>
                                    <?php if($currency_model=='multi_currency'): ?>
                                        <td><?php echo e($data->exchange_rate); ?></td>
                                    <?php endif; ?>
                                    <td>
                                        <?php if($default['value']!=$data->id): ?>
                                            <label class="switcher">
                                                <input type="checkbox" class="switcher_input status"
                                                        id="<?php echo e($data->id); ?>" <?php if ($data->status == 1) echo "checked" ?>>
                                                <span class="switcher_control"></span>
                                            </label>
                                        <?php else: ?>
                                            <label class="badge badge-info"><?php echo e(\App\CPU\translate('Default')); ?></label>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-10 justify-content-center">
                                            <?php if($data->code!='USD'): ?>
                                                <a  title="<?php echo e(\App\CPU\translate('Edit')); ?>"
                                                    type="button" class="btn btn-outline--primary btn-sm btn-xs edit"
                                                    href="<?php echo e(route('admin.currency.edit',[$data->id])); ?>">
                                                    <i class="tio-edit"></i>
                                                </a>
                                                <?php if($default['value']!=$data->id): ?>
                                                <a  title="<?php echo e(\App\CPU\translate('Delete')); ?>"
                                                    type="button" class="btn btn-outline-danger btn-sm btn-xs delete"
                                                    id="<?php echo e($data->id); ?>"
                                                    >
                                                    <i class="tio-delete"></i>
                                                </a>
                                                <?php else: ?>
                                                    <a href="javascript:" title="<?php echo e(\App\CPU\translate('Delete')); ?>"
                                                        type="button" class="btn btn-outline-danger btn-sm btn-xs"
                                                        onclick="default_currency_delete_alert()"
                                                        >
                                                        <i class="tio-delete"></i>
                                                    </a>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <button title="<?php echo e(\App\CPU\translate('Edit')); ?>"
                                                        class="btn btn-outline--primary btn-sm btn-xs edit" disabled>
                                                    <i class="tio-edit"></i>
                                                </button>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="table-responsive mt-4">
                        <div class="px-4 d-flex justify-content-lg-end">
                            <!-- Pagination -->
                            <?php echo e($currencies->links()); ?>

                        </div>
                    </div>

                    <?php if(count($currencies)==0): ?>
                        <div class="text-center p-4">
                            <img class="mb-3 w-160" src="<?php echo e(asset('public/assets/back-end')); ?>/svg/illustrations/sorry.svg"
                                 alt="Image Description">
                            <p class="mb-0"><?php echo e(\App\CPU\translate('No data to show')); ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <!-- Page level custom scripts -->
    <script src="<?php echo e(asset('select2/js/select2.min.js')); ?>"></script>
    <script>
        $(".js-example-theme-single").select2({
            theme: "classic"
        });

        $(".js-example-responsive").select2({
            width: 'resolve'
        });
    </script>

    <script>
        $('#add').on('click', function () {
            var name = $('#name').val();
            var symbol = $('#symbol').val();
            var code = $('#code').val();
            var exchange_rate = $('#exchange_rate').val();
            if (name == "" || symbol == "" || code == "" || exchange_rate == "") {
                alert('<?php echo e(\App\CPU\translate('All input field is required')); ?>');
                return false;
            } else {
                return true;
            }
        });
        $(document).on('change', '.status', function () {
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
                url: "<?php echo e(route('admin.currency.status')); ?>",
                method: 'POST',
                data: {
                    id: id,
                    status: status
                },
                success: function (response) {
                    if (response.status === 1) {
                        toastr.success(response.message);
                    } else {
                        toastr.error(response.message);
                    }
                }
            });
        });
    </script>
    <script>
        $(document).on('click', '.delete', function () {
        var id = $(this).attr("id");
        Swal.fire({
            title: '<?php echo e(\App\CPU\translate('Are you sure delete this')); ?> ?',
            text: "<?php echo e(\App\CPU\translate('You will not be able to revert this')); ?>!",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '<?php echo e(\App\CPU\translate('Yes')); ?>, <?php echo e(\App\CPU\translate('delete it')); ?>!',
            type: 'warning',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "<?php echo e(route('admin.currency.delete')); ?>",
                    method: 'POST',
                    data: {id: id},
                    success: function (data) {

                        if(data.status ==1){
                            toastr.success('<?php echo e(\App\CPU\translate('Currency removed successfully!')); ?>');
                            location.reload();
                        }else{
                            toastr.warning('<?php echo e(\App\CPU\translate('This Currency cannot be removed due to payment gateway dependency!')); ?>');
                            location.reload();
                        }
                    }
                });
            }
        })
    });
    </script>
    <script>
        function default_currency_delete_alert()
        {
            toastr.warning('<?php echo e(\App\CPU\translate('default currency can not be deleted!to delete change the default currency first!')); ?>');
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tikka\resources\views/admin/currency/view.blade.php ENDPATH**/ ?>