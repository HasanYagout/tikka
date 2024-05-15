<?php $__env->startSection('title', \App\CPU\translate('Order List')); ?>

<?php $__env->startPush('css_or_js'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <!-- Page Header -->
        <div>
            <!-- Page Title -->
            <div class="d-flex flex-wrap gap-2 align-items-center mb-3">
                <h2 class="h1 mb-0">
                    <img src="<?php echo e(asset('public/assets/back-end/img/all-orders.png')); ?>" class="mb-1 mr-1" alt="">
                    <span class="page-header-title">
                        <?php if($status =='processing'): ?>
                            <?php echo e(\App\CPU\translate('packaging')); ?>

                        <?php elseif($status =='failed'): ?>
                            <?php echo e(\App\CPU\translate('Failed_to_Deliver')); ?>

                        <?php elseif($status == 'all'): ?>
                            <?php echo e(\App\CPU\translate('all')); ?>

                        <?php else: ?>
                            <?php echo e(\App\CPU\translate(str_replace('_',' ',$status))); ?>

                        <?php endif; ?>
                    </span>
                    <?php echo e(\App\CPU\translate('Orders')); ?>

                </h2>
                <span class="badge badge-soft-dark radius-50 fz-14"><?php echo e($orders->total()); ?></span>
            </div>
            <!-- End Page Title -->

            <!-- Order States -->
            <div class="card">
                <div class="card">
                    <div class="card-body">
                        <form action="<?php echo e(url()->current()); ?>" id="form-data" method="GET">
                            <div class="row gy-3 gx-2">
                                <div class="col-12 pb-0">
                                    <h4><?php echo e(\App\CPU\translate('select')); ?> <?php echo e(\App\CPU\translate('date')); ?> <?php echo e(\App\CPU\translate('range')); ?></h4>
                                </div>
                                <?php if(request('delivery_man_id')): ?>
                                    <input type="hidden" name="delivery_man_id" value="<?php echo e(request('delivery_man_id')); ?>">
                                <?php endif; ?>

                                <div class="col-sm-6 col-md-3">
                                    <select name="filter" class="form-control">
                                        <option value="all" <?php echo e($filter == 'all' ? 'selected' : ''); ?>><?php echo e(\App\CPU\translate('all')); ?></option>
                                        <option value="admin" <?php echo e($filter == 'admin' ? 'selected' : ''); ?>><?php echo e(\App\CPU\translate('In_House')); ?></option>
                                        <option value="seller" <?php echo e($filter == 'seller' ? 'selected' : ''); ?>><?php echo e(\App\CPU\translate('Seller')); ?></option>
                                        <?php if(($status == 'all' || $status == 'delivered') && !request()->has('delivery_man_id')): ?>
                                        <option value="POS" <?php echo e($filter == 'POS' ? 'selected' : ''); ?>>POS</option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-floating">
                                        <input type="date" name="from" value="<?php echo e($from); ?>" id="from_date"
                                            class="form-control">
                                        <label><?php echo e(\App\CPU\translate('Start_Date')); ?></label>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3 mt-2 mt-sm-0">
                                    <div class="form-floating">
                                        <input type="date" value="<?php echo e($to); ?>" name="to" id="to_date"
                                            class="form-control">
                                        <label><?php echo e(\App\CPU\translate('End_Date')); ?></label>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3 mt-2 mt-sm-0  ">
                                    <button type="submit" class="btn btn--primary btn-block" onclick="formUrlChange(this)" data-action="<?php echo e(url()->current()); ?>">
                                        <?php echo e(\App\CPU\translate('show')); ?> <?php echo e(\App\CPU\translate('data')); ?>

                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card-body">
                    <!-- Order stats -->
                    <?php if($status == 'all' && $filter != 'POS'): ?>
                    <div class="row g-2 mb-20">
                        <div class="col-sm-6 col-lg-3">
                            <!-- Card -->
                            <a class="order-stats order-stats_pending" href="<?php echo e(route('admin.orders.list',['pending'])); ?>">
                                <div class="order-stats__content">
                                    <img width="20" src="<?php echo e(asset('public/assets/back-end/img/pending.png')); ?>" class="svg" alt="">
                                    <h6 class="order-stats__subtitle"><?php echo e(\App\CPU\translate('pending')); ?></h6>
                                </div>
                                <span class="order-stats__title">
                                    <?php echo e($pending_count); ?>

                                </span>
                            </a>
                            <!-- End Card -->
                        </div>

                        <div class="col-sm-6 col-lg-3">
                            <!-- Card -->
                            <a class="order-stats order-stats_confirmed" href="<?php echo e(route('admin.orders.list',['confirmed'])); ?>">
                                <div class="order-stats__content" style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
                                    <img width="20" src="<?php echo e(asset('public/assets/back-end/img/confirmed.png')); ?>" alt="">
                                    <h6 class="order-stats__subtitle"><?php echo e(\App\CPU\translate('confirmed')); ?></h6>
                                </div>
                                <span class="order-stats__title">
                                    <?php echo e($confirmed_count); ?>

                                </span>
                            </a>
                            <!-- End Card -->
                        </div>

                        <div class="col-sm-6 col-lg-3">
                            <!-- Card -->
                            <a class="order-stats order-stats_packaging" href="<?php echo e(route('admin.orders.list',['processing'])); ?>">
                                <div class="order-stats__content" style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
                                    <img width="20" src="<?php echo e(asset('public/assets/back-end/img/packaging.png')); ?>" alt="">
                                    <h6 class="order-stats__subtitle"><?php echo e(\App\CPU\translate('Packaging')); ?></h6>
                                </div>
                                <span class="order-stats__title">
                                    <?php echo e($processing_count); ?>

                                </span>
                            </a>
                            <!-- End Card -->
                        </div>

                        <div class="col-sm-6 col-lg-3">
                            <!-- Card -->
                            <a class="order-stats order-stats_out-for-delivery" href="<?php echo e(route('admin.orders.list',['out_for_delivery'])); ?>">
                                <div class="order-stats__content" style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
                                    <img width="20" src="<?php echo e(asset('public/assets/back-end/img/out-of-delivery.png')); ?>" alt="">
                                    <h6 class="order-stats__subtitle"><?php echo e(\App\CPU\translate('out_for_delivery')); ?></h6>
                                </div>
                                <span class="order-stats__title">
                                    <?php echo e($out_for_delivery_count); ?>

                                </span>
                            </a>
                            <!-- End Card -->
                        </div>

                        <div class="col-sm-6 col-lg-3">
                            <div class="order-stats order-stats_delivered cursor-pointer"
                                onclick="location.href='<?php echo e(route('admin.orders.list',['delivered'])); ?>'">
                                <div class="order-stats__content" style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
                                    <img width="20" src="<?php echo e(asset('public/assets/back-end/img/delivered.png')); ?>" alt="">
                                    <h6 class="order-stats__subtitle"><?php echo e(\App\CPU\translate('delivered')); ?></h6>
                                </div>
                                <span class="order-stats__title">
                                    <?php echo e($delivered_count); ?>

                                </span>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-3">
                            <div class="order-stats order-stats_canceled cursor-pointer"
                                onclick="location.href='<?php echo e(route('admin.orders.list',['canceled'])); ?>'">
                                <div class="order-stats__content" style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
                                    <img width="20" src="<?php echo e(asset('public/assets/back-end/img/canceled.png')); ?>" alt="">
                                    <h6 class="order-stats__subtitle"><?php echo e(\App\CPU\translate('canceled')); ?></h6>
                                </div>
                                <span class="order-stats__title">
                                    <?php echo e($canceled_count); ?>

                                </span>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-3">
                            <div class="order-stats order-stats_returned cursor-pointer"
                                onclick="location.href='<?php echo e(route('admin.orders.list',['returned'])); ?>'">
                                <div class="order-stats__content" style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
                                    <img width="20" src="<?php echo e(asset('public/assets/back-end/img/returned.png')); ?>" alt="">
                                    <h6 class="order-stats__subtitle"><?php echo e(\App\CPU\translate('returned')); ?></h6>
                                </div>
                                <span class="order-stats__title">
                                    <?php echo e($returned_count); ?>

                                </span>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-3">
                            <div class="order-stats order-stats_failed cursor-pointer"
                                onclick="location.href='<?php echo e(route('admin.orders.list',['failed'])); ?>'">
                                <div class="order-stats__content" style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
                                    <img width="20" src="<?php echo e(asset('public/assets/back-end/img/failed-to-deliver.png')); ?>" alt="">
                                    <h6 class="order-stats__subtitle"><?php echo e(\App\CPU\translate('Failed_To_Delivery')); ?></h6>
                                </div>
                                <span class="order-stats__title">
                                    <?php echo e($failed_count); ?>

                                </span>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <!-- End Order stats -->

                    <!-- Data Table Top -->
                    <div class="px-3 py-4 light-bg">
                        <div class="row g-2 flex-grow-1">
                            <div class="col-sm-8 col-md-6 col-lg-4">
                                <form action="" method="GET">
                                    <!-- Search -->
                                    <div class="input-group input-group-custom input-group-merge">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="tio-search"></i>
                                            </div>
                                        </div>
                                        <input id="datatableSearch_" type="search" name="search" class="form-control"
                                            placeholder="<?php echo e(\App\CPU\translate('Search by Order ID')); ?>" aria-label="Search by Order ID" value="<?php echo e($search); ?>"
                                            required>
                                        <button type="submit" class="btn btn--primary input-group-text"><?php echo e(\App\CPU\translate('search')); ?></button>
                                    </div>
                                    <!-- End Search -->
                                </form>
                            </div>
                            <div class="col-sm-4 col-md-6 col-lg-8 d-flex justify-content-sm-end">
                                <button type="button" class="btn btn-outline--primary" data-toggle="dropdown">
                                    <i class="tio-download-to"></i>
                                    <?php echo e(\App\CPU\translate('export')); ?>

                                    <i class="tio-chevron-down"></i>
                                </button>

                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>
                                        <a type="submit" class="dropdown-item d-flex align-items-center gap-2" href="<?php echo e(route('admin.orders.order-bulk-export', ['delivery_man_id' => request('delivery_man_id'), 'status' => $status, 'from' => $from, 'to' => $to, 'filter' => $filter, 'search' => $search])); ?>">
                                            <img width="14" src="<?php echo e(asset('public/assets/back-end/img/excel.png')); ?>" alt="">
                                            <?php echo e(\App\CPU\translate('Excel')); ?>

                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- End Row -->
                    </div>
                    <!-- End Data Table Top -->

                    <!-- Table -->
                    <div class="table-responsive datatable-custom">
                        <table class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table w-100"
                            style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>">
                            <thead class="thead-light thead-50 text-capitalize">
                                <tr>
                                    <th class=""><?php echo e(\App\CPU\translate('SL')); ?></th>
                                    <th><?php echo e(\App\CPU\translate('Order')); ?> <?php echo e(\App\CPU\translate('ID')); ?></th>
                                    <th><?php echo e(\App\CPU\translate('Order')); ?> <?php echo e(\App\CPU\translate('Date')); ?></th>
                                    <th><?php echo e(\App\CPU\translate('customer')); ?> <?php echo e(\App\CPU\translate('info')); ?></th>
                                    <th><?php echo e(\App\CPU\translate('Store')); ?></th>
                                    <th class="text-right"><?php echo e(\App\CPU\translate('Total')); ?> <?php echo e(\App\CPU\translate('Amount')); ?></th>
                                    <th class="text-center"><?php echo e(\App\CPU\translate('Order')); ?> <?php echo e(\App\CPU\translate('Status')); ?> </th>
                                    <th class="text-center"><?php echo e(\App\CPU\translate('Action')); ?></th>
                                </tr>
                            </thead>

                            <tbody>
                            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr class="status-<?php echo e($order['order_status']); ?> class-all">
                                    <td class="">
                                        <?php echo e($orders->firstItem()+$key); ?>

                                    </td>
                                    <td >
                                        <a class="title-color" href="<?php echo e(route('admin.orders.details',['id'=>$order['id']])); ?>"><?php echo e($order['id']); ?></a>
                                    </td>
                                    <td>
                                        <div><?php echo e(date('d M Y',strtotime($order['created_at']))); ?>,</div>
                                        <div><?php echo e(date("h:i A",strtotime($order['created_at']))); ?></div>
                                    </td>
                                    <td>
                                        <?php if($order->customer_id == 0): ?>
                                            <strong class="title-name"><?php echo e(\App\CPU\translate('walking_customer')); ?></strong>
                                        <?php else: ?>
                                            <?php if($order->customer): ?>
                                                <a class="text-body text-capitalize" href="<?php echo e(route('admin.orders.details',['id'=>$order['id']])); ?>">
                                                    <strong class="title-name"><?php echo e($order->customer['f_name'].' '.$order->customer['l_name']); ?></strong>
                                                </a>
                                                <a class="d-block title-color" href="tel:<?php echo e($order->customer['phone']); ?>"><?php echo e($order->customer['phone']); ?></a>
                                            <?php else: ?>
                                                <label class="badge badge-danger fz-12"><?php echo e(\App\CPU\translate('invalid_customer_data')); ?></label>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <span class="store-name font-weight-medium">
                                            <?php if($order->seller_is == 'seller'): ?>
                                                <?php echo e(isset($order->seller->shop) ? $order->seller->shop->name : 'Store not found'); ?>

                                            <?php elseif($order->seller_is == 'admin'): ?>
                                                <?php echo e(\App\CPU\translate('In-House')); ?>

                                            <?php endif; ?>
                                        </span>
                                    </td>
                                    <td class="text-right">
                                        <div>
                                            <?php ($discount = 0); ?>
                                            <?php if($order->coupon_discount_bearer == 'inhouse' && !in_array($order['coupon_code'], [0, NULL])): ?>
                                                <?php ($discount = $order->discount_amount); ?>
                                            <?php endif; ?>
                                            <?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($order->order_amount+$discount))); ?>

                                        </div>

                                        <?php if($order->payment_status=='paid'): ?>
                                            <span class="badge text-success fz-12 px-0">
                                                <?php echo e(\App\CPU\translate('paid')); ?>

                                            </span>
                                        <?php else: ?>
                                            <span class="badge text-danger fz-12 px-0">
                                                <?php echo e(\App\CPU\translate('unpaid')); ?>

                                            </span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center text-capitalize">
                                        <?php if($order['order_status']=='pending'): ?>
                                            <span class="badge badge-soft-info fz-12">
                                                <?php echo e(\App\CPU\translate($order['order_status'])); ?>

                                            </span>

                                        <?php elseif($order['order_status']=='processing' || $order['order_status']=='out_for_delivery'): ?>
                                            <span class="badge badge-soft-warning fz-12">
                                                <?php echo e(str_replace('_',' ',$order['order_status'] == 'processing' ? \App\CPU\translate('packaging'):\App\CPU\translate($order['order_status']))); ?>

                                            </span>
                                        <?php elseif($order['order_status']=='confirmed'): ?>
                                            <span class="badge badge-soft-success fz-12">
                                                <?php echo e(\App\CPU\translate($order['order_status'])); ?>

                                            </span>
                                        <?php elseif($order['order_status']=='failed'): ?>
                                            <span class="badge badge-danger fz-12">
                                                <?php echo e(\App\CPU\translate('failed_to_deliver')); ?>

                                            </span>
                                        <?php elseif($order['order_status']=='delivered'): ?>
                                            <span class="badge badge-soft-success fz-12">
                                                <?php echo e(\App\CPU\translate($order['order_status'])); ?>

                                            </span>
                                        <?php else: ?>
                                            <span class="badge badge-soft-danger fz-12">
                                                <?php echo e(\App\CPU\translate($order['order_status'])); ?>

                                            </span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">
                                            <a class="btn btn-outline--primary square-btn btn-sm mr-1" title="<?php echo e(\App\CPU\translate('view')); ?>"
                                                href="<?php echo e(route('admin.orders.details',['id'=>$order['id']])); ?>">
                                                <img src="<?php echo e(asset('public/assets/back-end/img/eye.svg')); ?>" class="svg" alt="">
                                            </a>
                                            <a class="btn btn-outline-success square-btn btn-sm mr-1" target="_blank" title="<?php echo e(\App\CPU\translate('invoice')); ?>"
                                                href="<?php echo e(route('admin.orders.generate-invoice',[$order['id']])); ?>">
                                                <i class="tio-download-to"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- End Table -->

                    <!-- Pagination -->
                    <div class="table-responsive mt-4">
                        <div class="d-flex justify-content-lg-end">
                            <!-- Pagination -->
                            <?php echo $orders->links(); ?>

                        </div>
                    </div>
                    <!-- End Pagination -->
                </div>
            </div>
            <!-- End Order States -->

            <!-- Nav Scroller -->
            <div class="js-nav-scroller hs-nav-scroller-horizontal d-none">
                <span class="hs-nav-scroller-arrow-prev d-none">
                    <a class="hs-nav-scroller-arrow-link" href="javascript:;">
                        <i class="tio-chevron-left"></i>
                    </a>
                </span>

                <span class="hs-nav-scroller-arrow-next d-none">
                    <a class="hs-nav-scroller-arrow-link" href="javascript:;">
                        <i class="tio-chevron-right"></i>
                    </a>
                </span>

                <!-- Nav -->
                <ul class="nav nav-tabs page-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#"><?php echo e(\App\CPU\translate('order_list')); ?></a>
                    </li>
                </ul>
                <!-- End Nav -->
            </div>
            <!-- End Nav Scroller -->
        </div>
        <!-- End Page Header -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script_2'); ?>
    <script>
        function filter_order() {
            $.get({
                url: '<?php echo e(route('admin.orders.inhouse-order-filter')); ?>',
                contentType: false,
                processData: false,
                beforeSend: function () {
                    $('#loading').show();
                },
                success: function (data) {
                    toastr.success('<?php echo e(\App\CPU\translate('order_filter_success')); ?>');
                    location.reload();
                },
                complete: function () {
                    $('#loading').hide();
                },
            });
        };
    </script>
    <script>
        $('#from_date,#to_date').change(function () {
            let fr = $('#from_date').val();
            let to = $('#to_date').val();
            if(fr != ''){
                $('#to_date').attr('required','required');
            }
            if(to != ''){
                $('#from_date').attr('required','required');
            }
            if (fr != '' && to != '') {
                if (fr > to) {
                    $('#from_date').val('');
                    $('#to_date').val('');
                    toastr.error('<?php echo e(\App\CPU\translate('Invalid date range')); ?>!', Error, {
                        CloseButton: true,
                        ProgressBar: true
                    });
                }
            }

        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tikka\resources\views/admin/order/list.blade.php ENDPATH**/ ?>