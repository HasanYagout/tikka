<?php $__env->startSection('title',\App\CPU\translate('My Order List')); ?>


<?php $__env->startSection('content'); ?>

    <div class="container text-center">
        <h3 class="headerTitle my-3"><?php echo e(\App\CPU\translate('my_order')); ?></h3>
    </div>

    <!-- Page Content-->
    <div class="container pb-5 mb-2 mb-md-4 mt-3 rtl"
         style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
        <div class="row">
            <!-- Sidebar-->
        <?php echo $__env->make('web-views.partials._profile-aside', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Content  -->
            <section class="col-lg-9 col-md-9">
                <div class="card __card shadow-0">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table __table text-center">
                                <thead class="thead-light">
                                <tr>
                                    <td class="tdBorder">
                                        <div class="py-2"><span
                                                class="d-block spandHeadO "><?php echo e(\App\CPU\translate('Order ID')); ?></span></div>
                                    </td>

                                    <td class="tdBorder orderDate">
                                        <div class="py-2"><span
                                                class="d-block spandHeadO"><?php echo e(\App\CPU\translate('Order')); ?> <?php echo e(\App\CPU\translate('Date')); ?></span>
                                        </div>
                                    </td>
                                    <td class="tdBorder">
                                        <div class="py-2"><span
                                                class="d-block spandHeadO"> <?php echo e(\App\CPU\translate('Status')); ?></span></div>
                                    </td>
                                    <td class="tdBorder">
                                        <div class="py-2"><span
                                                class="d-block spandHeadO"> <?php echo e(\App\CPU\translate('Total')); ?></span></div>
                                    </td>
                                    <td class="tdBorder">
                                        <div class="py-2"><span
                                                class="d-block spandHeadO"> <?php echo e(\App\CPU\translate('action')); ?></span></div>
                                    </td>
                                </tr>
                                </thead>

                                <tbody>
                                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="bodytr font-weight-bold">
                                            <?php echo e(\App\CPU\translate('ID')); ?>: <?php echo e($order['id']); ?>

                                        </td>
                                        <td class="bodytr orderDate"><span class=""><?php echo e($order['created_at']); ?></span></td>
                                        <td class="bodytr">
                                            <?php if($order['order_status']=='failed' || $order['order_status']=='canceled'): ?>
                                                <span class="badge badge-danger text-capitalize">
                                                    <?php echo e(\App\CPU\translate($order['order_status'] =='failed' ? 'Failed To Deliver' : $order['order_status'])); ?>

                                                </span>
                                            <?php elseif($order['order_status']=='confirmed' || $order['order_status']=='processing' || $order['order_status']=='delivered'): ?>
                                                <span class="badge badge-success text-capitalize">
                                                    <?php echo e(\App\CPU\translate($order['order_status']=='processing' ? 'packaging' : $order['order_status'])); ?>

                                                </span>
                                            <?php else: ?>
                                                <span class="badge badge-info text-capitalize">
                                                    <?php echo e(\App\CPU\translate($order['order_status'])); ?>

                                                </span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="bodytr">
                                            <?php echo e(\App\CPU\Helpers::currency_converter($order['order_amount'])); ?>

                                        </td>
                                        <td class="bodytr">
                                            <div class="__btn-grp-sm flex-nowrap">
                                                <a href="<?php echo e(route('account-order-details', ['id'=>$order->id])); ?>"
                                                class="btn btn--primary __action-btn" title="<?php echo e(\App\CPU\translate('View')); ?>">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <?php if($order['payment_method']=='cash_on_delivery' && $order['order_status']=='pending'): ?>
                                                    <a href="javascript:" title="<?php echo e(\App\CPU\translate('Cancel')); ?>"
                                                    onclick="route_alert('<?php echo e(route('order-cancel',[$order->id])); ?>','<?php echo e(\App\CPU\translate('want_to_cancel_this_order?')); ?>')"
                                                    class="btn btn-danger __action-btn">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                <?php else: ?>
                                                    <button class="btn btn-danger __action-btn" title="<?php echo e(\App\CPU\translate('Cancel')); ?>" onclick="cancel_message()">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <?php if($orders->count()==0): ?>
                                <center class="mb-2 mt-3"><?php echo e(\App\CPU\translate('no_order_found')); ?></center>
                            <?php endif; ?>

                            <div class="card-footer border-0">
                                <?php echo e($orders->links()); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        function cancel_message() {
            toastr.info('<?php echo e(\App\CPU\translate('order_can_be_canceled_only_when_pending.')); ?>', {
                CloseButton: true,
                ProgressBar: true
            });
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.front-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tikka\resources\themes\default/web-views/users-profile/account-orders.blade.php ENDPATH**/ ?>