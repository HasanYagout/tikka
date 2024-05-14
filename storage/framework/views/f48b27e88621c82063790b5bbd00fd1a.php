<?php $__env->startSection('title', \App\CPU\translate('Product List')); ?>

<?php $__env->startPush('css_or_js'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="content container-fluid">
    <!-- Page Title -->
    <div class="mb-3">
        <h2 class="h1 mb-0 text-capitalize d-flex gap-2">
            <img src="<?php echo e(asset('public/assets/back-end/img/inhouse-product-list.png')); ?>" alt="">
            <?php if($type == 'in_house'): ?>
                <?php echo e(\App\CPU\translate('In-House_Product_List')); ?>

            <?php elseif($type == 'seller'): ?>
                <?php echo e(\App\CPU\translate('Seller_Product_List')); ?>

            <?php endif; ?>
            <span class="badge badge-soft-dark radius-50 fz-14 ml-1"><?php echo e($pro->total()); ?></span>
        </h2>
    </div>
    <!-- End Page Title -->

    <div class="row mt-20">
        <div class="col-md-12">
            <div class="card">
                <div class="px-3 py-4">
                    <div class="row align-items-center">
                        <div class="col-lg-4">
                            <!-- Search -->
                            <form action="<?php echo e(url()->current()); ?>" method="GET">
                                <div class="input-group input-group-custom input-group-merge">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="tio-search"></i>
                                        </div>
                                    </div>
                                    <input id="datatableSearch_" type="search" name="search" class="form-control"
                                           placeholder="<?php echo e(\App\CPU\translate('Search Product Name')); ?>" aria-label="Search orders"
                                           value="<?php echo e($search); ?>" required>
                                    <input type="hidden" value="<?php echo e($request_status); ?>" name="status">
                                    <button type="submit" class="btn btn--primary"><?php echo e(\App\CPU\translate('search')); ?></button>
                                </div>
                            </form>
                            <!-- End Search -->
                        </div>
                        <div class="col-lg-8 mt-3 mt-lg-0 d-flex flex-wrap gap-3 justify-content-lg-end">
                            <?php if($type == 'in_house'): ?>
                            <div>
                                <button type="button" class="btn btn-outline--primary" data-toggle="dropdown">
                                    <i class="tio-download-to"></i>
                                    <?php echo e(\App\CPU\translate('Export')); ?>

                                    <i class="tio-chevron-down"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a class="dropdown-item" href="<?php echo e(route('admin.product.export-excel',['in_house', ''])); ?>"><?php echo e(\App\CPU\translate('Excel')); ?></a></li>
                                    <div class="dropdown-divider"></div>
                                </ul>
                            </div>
                            <a href="<?php echo e(route('admin.product.stock-limit-list',['in_house'])); ?>" class="btn btn-info">
                                <span class="text"><?php echo e(\App\CPU\translate('Limited Sotcks')); ?></span>
                            </a>
                            <?php endif; ?>
                            <?php if(!isset($request_status)): ?>
                                <a href="<?php echo e(route('admin.product.add-new')); ?>" class="btn btn--primary">
                                    <i class="tio-add"></i>
                                    <span class="text"><?php echo e(\App\CPU\translate('Add_New_Product')); ?></span>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="datatable" style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;" class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table w-100">
                        <thead class="thead-light thead-50 text-capitalize">
                            <tr>
                                <th><?php echo e(\App\CPU\translate('SL')); ?></th>
                                <th><?php echo e(\App\CPU\translate('Product Name')); ?></th>
                                <th class="text-right"><?php echo e(\App\CPU\translate('Product Type')); ?></th>
                                <th class="text-right"><?php echo e(\App\CPU\translate('purchase_price')); ?></th>
                                <th class="text-right"><?php echo e(\App\CPU\translate('selling_price')); ?></th>
                                <th class="text-center"><?php echo e(\App\CPU\translate('Show_as_featured')); ?></th>
                                <th class="text-center"><?php echo e(\App\CPU\translate('Active')); ?> <?php echo e(\App\CPU\translate('status')); ?></th>
                                <th class="text-center"><?php echo e(\App\CPU\translate('Action')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $pro; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th scope="row"><?php echo e($pro->firstItem()+$k); ?></th>
                                <td>
                                    <a href="<?php echo e(route('admin.product.view',[$p['id']])); ?>" class="media align-items-center gap-2">
                                        <img src="<?php echo e(\App\CPU\ProductManager::product_image_path('thumbnail')); ?>/<?php echo e($p['thumbnail']); ?>"
                                             onerror="this.src='<?php echo e(asset('public/assets/back-end/img/brand-logo.png')); ?>'"class="avatar border" alt="">
                                        <span class="media-body title-color hover-c1">
                                            <?php echo e(\Illuminate\Support\Str::limit($p['name'],20)); ?>

                                        </span>
                                    </a>
                                </td>
                                <td class="text-right">
                                    <?php echo e(\App\CPU\translate(str_replace('_',' ',$p['product_type']))); ?>

                                </td>
                                <td class="text-right">
                                    <?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($p['purchase_price']))); ?>

                                </td>
                                <td class="text-right">
                                    <?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($p['unit_price']))); ?>

                                </td>
                                <td class="text-center">
                                    <label class="mx-auto switcher">
                                        <input class="switcher_input" type="checkbox"
                                                onclick="featured_status('<?php echo e($p['id']); ?>')" <?php echo e($p->featured == 1?'checked':''); ?>>
                                        <span class="switcher_control"></span>
                                    </label>
                                </td>
                                <td class="text-center">
                                    <label class="mx-auto switcher">
                                        <input type="checkbox" class="status switcher_input"
                                                id="<?php echo e($p['id']); ?>" <?php echo e($p->status == 1?'checked':''); ?>>
                                        <span class="switcher_control"></span>
                                    </label>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <a class="btn btn-outline-info btn-sm square-btn" title="<?php echo e(\App\CPU\translate('barcode')); ?>"
                                            href="<?php echo e(route('admin.product.barcode', [$p['id']])); ?>">
                                            <i class="tio-barcode"></i>
                                        </a>
                                        <a class="btn btn-outline-info btn-sm square-btn" title="View" href="<?php echo e(route('admin.product.view',[$p['id']])); ?>">
                                            <i class="tio-invisible"></i>
                                        </a>
                                        <a class="btn btn-outline--primary btn-sm square-btn"
                                            title="<?php echo e(\App\CPU\translate('Edit')); ?>"
                                            href="<?php echo e(route('admin.product.edit',[$p['id']])); ?>">
                                            <i class="tio-edit"></i>
                                        </a>
                                        <a class="btn btn-outline-danger btn-sm square-btn" href="javascript:"
                                            title="<?php echo e(\App\CPU\translate('Delete')); ?>"
                                            onclick="form_alert('product-<?php echo e($p['id']); ?>','Want to delete this item ?')">
                                            <i class="tio-delete"></i>
                                        </a>
                                    </div>
                                    <form action="<?php echo e(route('admin.product.delete',[$p['id']])); ?>"
                                            method="post" id="product-<?php echo e($p['id']); ?>">
                                        <?php echo csrf_field(); ?> <?php echo method_field('delete'); ?>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>

                <div class="table-responsive mt-4">
                    <div class="px-4 d-flex justify-content-lg-end">
                        <!-- Pagination -->
                        <?php echo e($pro->links()); ?>

                    </div>
                </div>

                <?php if(count($pro)==0): ?>
                    <div class="text-center p-4">
                        <img class="mb-3 w-160" src="<?php echo e(asset('public/assets/back-end')); ?>/svg/illustrations/sorry.svg" alt="Image Description">
                        <p class="mb-0"><?php echo e(\App\CPU\translate('No data to show')); ?></p>
                    </div>
                <?php endif; ?>
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
        // Call the dataTables jQuery plugin
        $(document).ready(function () {
            $('#dataTable').DataTable();
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
                url: "<?php echo e(route('admin.product.status-update')); ?>",
                method: 'POST',
                data: {
                    id: id,
                    status: status
                },
                success: function (data) {
                    if(data.success == true) {
                        toastr.success('<?php echo e(\App\CPU\translate('Status updated successfully')); ?>');
                    }
                    else if(data.success == false) {
                        toastr.error('<?php echo e(\App\CPU\translate('Status updated failed. Product must be approved')); ?>');
                        setTimeout(function(){
                            location.reload();
                        }, 2000);
                    }
                }
            });
        });

        function featured_status(id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                url: "<?php echo e(route('admin.product.featured-status')); ?>",
                method: 'POST',
                data: {
                    id: id
                },
                success: function () {
                    toastr.success('<?php echo e(\App\CPU\translate('Featured status updated successfully')); ?>');
                }
            });
        }

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tikka\resources\views/admin/product/list.blade.php ENDPATH**/ ?>