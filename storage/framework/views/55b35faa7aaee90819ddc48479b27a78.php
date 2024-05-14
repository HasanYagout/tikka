<?php $__env->startSection('title', \App\CPU\translate('shipping_method')); ?>

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

        <div class="row gy-3">
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-header">
                        <h5 class="text-capitalize mb-0">
                            <!-- <i class="tio-settings-outlined"></i> -->
                            <?php echo e(\App\CPU\translate('shipping_responsibility')); ?>

                        </h5>
                    </div>
                    <?php ($shippingMethod=\App\CPU\Helpers::get_business_settings('shipping_method')); ?>
                    <div class="card-body">
                        <div class="d-flex gap-10 align-items-center mb-2">
                            <input onclick="shipping_responsibility(this.value);" type="radio" name="shipping_res"
                                   value="inhouse_shipping"
                                   id="inhouse_shipping" <?php echo e($shippingMethod=='inhouse_shipping'?'checked':''); ?>>
                            <label class="title-color mb-0" for="inhouse_shipping">
                                <?php echo e(\App\CPU\translate('inhouse_shipping')); ?>

                            </label>
                        </div>
                        <div class="d-flex gap-10 align-items-center">
                            <input onclick="shipping_responsibility(this.value);" type="radio" name="shipping_res"
                                   value="sellerwise_shipping"
                                   id="sellerwise_shipping" <?php echo e($shippingMethod=='sellerwise_shipping'?'checked':''); ?>>
                            <label class="title-color mb-0" for="sellerwise_shipping">
                                <?php echo e(\App\CPU\translate('seller_wise_shipping')); ?>

                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <?php ($admin_shipping = \App\Models\ShippingType::where('seller_id',0)->first()); ?>
            <?php ($shippingType =isset($admin_shipping)==true?$admin_shipping->shipping_type:'order_wise'); ?>
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-header">
                        <h5 class="text-capitalize mb-0"><?php echo e(\App\CPU\translate('choose_shipping_method')); ?></h5>
                    </div>
                    <div class="card-body"
                         style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
                        <div class="mb-2">
                            <label class="title-color"
                                   id="for_inhouse_deliver"><?php echo e(\App\CPU\translate('for_inhouse_deliver')); ?></label>
                            <select class="form-control text-capitalize w-100" name="shippingCategory"
                                    onchange="shipping_type(this.value);">
                                <option value="0" selected disabled>---<?php echo e(\App\CPU\translate('select')); ?>---</option>
                                <option
                                    value="order_wise" <?php echo e($shippingType=='order_wise'?'selected':''); ?> ><?php echo e(\App\CPU\translate('order_wise')); ?> </option>
                                <option
                                    value="category_wise" <?php echo e($shippingType=='category_wise'?'selected':''); ?> ><?php echo e(\App\CPU\translate('category_wise')); ?></option>
                                <option
                                    value="product_wise" <?php echo e($shippingType=='product_wise'?'selected':''); ?>><?php echo e(\App\CPU\translate('product_wise')); ?></option>
                            </select>
                        </div>
                        <div id="product_wise_note">
                            <p class="text-danger"><?php echo e(\App\CPU\translate('note')); ?>

                                : <?php echo e(\App\CPU\translate("Please_make_sure_all_the product's_delivery_charges_are_up_to_date.")); ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12" id="update_category_shipping_cost">
                <?php ($categories = App\Models\Category::where(['position' => 0])->get()); ?>
                <div class="card h-100">
                    <div class="px-3 pt-4">
                        <h4 class="mb-0 text-capitalize"><?php echo e(\App\CPU\translate('update_category_shipping_cost')); ?></h4>
                    </div>
                    <div class="card-body px-0">
                        <div class="table-responsive">
                            <table
                                class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table w-100"
                                cellspacing="0"
                                style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
                                <thead class="thead-light thead-50 text-capitalize">
                                <tr>
                                    <th><?php echo e(\App\CPU\translate('SL')); ?></th>
                                    <th><?php echo e(\App\CPU\translate('category_name')); ?></th>
                                    <th><?php echo e(\App\CPU\translate('cost_per_product')); ?></th>
                                    <th class="text-center"><?php echo e(\App\CPU\translate('multiply_with_QTY')); ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <form action="<?php echo e(route('admin.business-settings.category-shipping-cost.store')); ?>"
                                      method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php $__currentLoopData = $all_category_shipping_cost; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($item->category): ?>
                                            <tr>
                                                <td>
                                                    <?php echo e($key+1); ?>

                                                </td>
                                                <td>
                                                    <?php echo e($item->category!=null?$item->category->name:\App\CPU\translate('not_found')); ?>

                                                </td>
                                                <td>
                                                    <input type="hidden" class="form-control w-auto" name="ids[]"
                                                           value="<?php echo e($item->id); ?>">
                                                    <input type="number" class="form-control w-auto" min="0" step="0.01"
                                                           name="cost[]"
                                                           value="<?php echo e(\App\CPU\BackEndHelper::usd_to_currency($item->cost)); ?>">
                                                </td>
                                                <td>
                                                    <label class="mx-auto switcher">
                                                        <input type="checkbox" class="status switcher_input"
                                                               name="multiplyQTY[]"
                                                               id=""
                                                               value="<?php echo e($item->id); ?>" <?php echo e($item->multiply_qty == 1?'checked':''); ?>>
                                                        <span class="switcher_control"></span>
                                                    </label>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td colspan="4">
                                            <div class="d-flex flex-wrap justify-content-end gap-10">
                                                <button type="submit"
                                                        class="btn btn--primary"><?php echo e(\App\CPU\translate('Update')); ?></button>
                                            </div>
                                        </td>
                                    </tr>
                                </form>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12" id="order_wise_shipping">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="mb-0 text-capitalize"><?php echo e(\App\CPU\translate('add_order_wise_shipping')); ?></h4>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo e(route('admin.business-settings.shipping-method.add')); ?>"
                                      style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;"
                                      method="post">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group">
                                        <div class="row justify-content-center">
                                            <div class="col-md-12">
                                                <label class="title-color"
                                                       for="title"><?php echo e(\App\CPU\translate('title')); ?></label>
                                                <input type="text" name="title" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row justify-content-center">
                                            <div class="col-md-12">
                                                <label class="title-color"
                                                       for="duration"><?php echo e(\App\CPU\translate('duration')); ?></label>
                                                <input type="text" name="duration" class="form-control"
                                                       placeholder="<?php echo e(\App\CPU\translate('Ex')); ?> : <?php echo e(\App\CPU\translate('4 to 6 days')); ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row justify-content-center">
                                            <div class="col-md-12">
                                                <label class="title-color"
                                                       for="cost"><?php echo e(\App\CPU\translate('cost')); ?></label>
                                                <input type="number" min="0" step="0.01" max="1000000" name="cost"
                                                       class="form-control"
                                                       placeholder="<?php echo e(\App\CPU\translate('Ex')); ?> :">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-wrap justify-content-end gap-10">
                                        <button type="submit"
                                                class="btn btn--primary px-4"><?php echo e(\App\CPU\translate('Submit')); ?></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="px-3 py-4">
                                <div class="row justify-content-between align-items-center flex-grow-1">
                                    <div class="col-sm-4 col-md-6 col-lg-8 mb-2 mb-sm-0">
                                        <h5 class="mb-0 text-capitalize d-flex align-items-center gap-2">
                                            <?php echo e(\App\CPU\translate('order_wise_shipping_method')); ?>

                                            <span
                                                class="badge badge-soft-dark radius-50 fz-12"><?php echo e($shipping_methods->count()); ?></span>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive pb-3">
                                <table
                                    class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
                                    cellspacing="0"
                                    style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
                                    <thead class="thead-light thead-50 text-capitalize">
                                    <tr>
                                        <th><?php echo e(\App\CPU\translate('ID')); ?></th>
                                        <th><?php echo e(\App\CPU\translate('title')); ?></th>
                                        <th><?php echo e(\App\CPU\translate('duration')); ?></th>
                                        <th><?php echo e(\App\CPU\translate('cost')); ?></th>
                                        <th class="text-center"><?php echo e(\App\CPU\translate('status')); ?></th>
                                        <th class="text-center"><?php echo e(\App\CPU\translate('action')); ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $shipping_methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <th><?php echo e($k+1); ?></th>
                                            <td><?php echo e($method['title']); ?></td>
                                            <td>
                                                <?php echo e($method['duration']); ?>

                                            </td>
                                            <td>
                                                <?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($method['cost']))); ?>

                                            </td>

                                            <td>
                                                <label class="switcher mx-auto">
                                                    <input type="checkbox" class="status switcher_input"
                                                           id="<?php echo e($method['id']); ?>" <?php echo e($method->status == 1?'checked':''); ?>>
                                                    <span class="switcher_control"></span>
                                                </label>
                                            </td>

                                            <td>
                                                <div class="d-flex flex-wrap justify-content-center gap-10">
                                                    <a class="btn btn-outline--primary btn-sm edit"
                                                       title="<?php echo e(\App\CPU\translate('Edit')); ?>"
                                                       href="<?php echo e(route('admin.business-settings.shipping-method.edit',[$method['id']])); ?>">
                                                        <i class="tio-edit"></i>
                                                    </a>
                                                    <a title="<?php echo e(\App\CPU\translate('delete')); ?>"
                                                       class="btn btn-outline-danger btn-sm delete"
                                                       id="<?php echo e($method['id']); ?>">
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
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        $(document).ready(function () {
            let shipping_responsibility = '<?php echo e($shippingMethod); ?>';
            console.log(shipping_responsibility);
            if (shipping_responsibility === 'sellerwise_shipping') {
                $("#for_inhouse_deliver").show();
            } else {
                $("#for_inhouse_deliver").hide();
            }
            let shipping_type = '<?php echo e($shippingType); ?>';

            if (shipping_type === 'category_wise') {
                $('#product_wise_note').hide();
                $('#order_wise_shipping').hide();
                $('#update_category_shipping_cost').show();

            } else if (shipping_type === 'order_wise') {
                $('#product_wise_note').hide();
                $('#update_category_shipping_cost').hide();
                $('#order_wise_shipping').show();
            } else {

                $('#update_category_shipping_cost').hide();
                $('#order_wise_shipping').hide();
                $('#product_wise_note').show();
            }
        });
    </script>
    <script>
        function shipping_responsibility(val) {
            if (val === 'inhouse_shipping') {
                $("#sellerwise_shipping").prop("checked", false);
                $("#for_inhouse_deliver").hide();
            } else {
                $("#inhouse_shipping").prop("checked", false);
                $("#for_inhouse_deliver").show();
            }
            console.log(val);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                url: "<?php echo e(route('admin.business-settings.shipping-method.shipping-store')); ?>",
                method: 'POST',
                data: {
                    shippingMethod: val
                },
                success: function (data) {


                    //window.location.reload();
                    toastr.success("<?php echo e(\App\CPU\translate('shipping_responsibility_updated_successfully!!')); ?>");

                }
            });
        }
    </script>
    <script>
        function shipping_type(val) {
            console.log(val);
            if (val === 'category_wise') {
                $('#product_wise_note').hide();
                $('#order_wise_shipping').hide();
                $('#update_category_shipping_cost').show();
            } else if (val === 'order_wise') {
                $('#product_wise_note').hide();
                $('#update_category_shipping_cost').hide();
                $('#order_wise_shipping').show();
            } else {
                $('#update_category_shipping_cost').hide();
                $('#order_wise_shipping').hide();
                $('#product_wise_note').show();
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                url: "<?php echo e(route('admin.business-settings.shipping-type.store')); ?>",
                method: 'POST',
                data: {
                    shippingType: val
                },
                success: function (data) {
                    toastr.success("<?php echo e(\App\CPU\translate('shipping_method_updated_successfully!!')); ?>");
                }
            });
        }
    </script>
    <script>
        // Call the dataTables jQuery plugin
        /*$(document).on('change', '.status', function () {
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
                url: "<?php echo e(route('admin.business-settings.shipping-method.status-update')); ?>",
                method: 'POST',
                data: {
                    id: id,
                    status: status
                },
                success: function () {
                    toastr.success('<?php echo e(\App\CPU\translate('order wise shipping method Status updated successfully')); ?>');
                }
            });
        });*/
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
                        url: "<?php echo e(route('admin.business-settings.shipping-method.delete')); ?>",
                        method: 'POST',
                        data: {id: id},
                        success: function () {
                            toastr.success('<?php echo e(\App\CPU\translate('Order Wise Shipping Method deleted successfully')); ?>');
                            location.reload();
                        }
                    });
                }
            })
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tikka\resources\views/admin/shipping-method/setting.blade.php ENDPATH**/ ?>