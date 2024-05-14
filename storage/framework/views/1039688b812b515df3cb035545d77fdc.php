<?php $__env->startSection('title',\App\CPU\translate('Order Details')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <style>
        .page-item.active .page-link {
            background-color: <?php echo e($web_config['primary_color']); ?>              !important;
        }

        .amount {
            margin- <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>: 60px;

        }

        .w-49{
            width: 49% !important
        }

        a {
            color: <?php echo e($web_config['primary_color']); ?>;
        }

        @media (max-width: 360px) {
            .for-glaxy-mobile {
                margin- <?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>: 6px;
            }

        }

        @media (max-width: 600px) {

            .for-glaxy-mobile {
                margin- <?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>: 6px;
            }

            .order_table_info_div_2 {
                text-align: <?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>          !important;
            }

            .spandHeadO {
                margin- <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>: 16px;
            }

            .spanTr {
                margin- <?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>: 16px;
            }

            .amount {
                margin- <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>: 0px;
            }

        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <!-- Page Content-->
    <div class="container pb-5 mb-2 mb-md-4 mt-3 rtl __inline-47"
         style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
        <div class="row">
            <!-- Sidebar-->
            <?php echo $__env->make('web-views.partials._profile-aside', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            
            <section class="col-lg-9 col-md-9">
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <a class="page-link" href="<?php echo e(route('account-oder')); ?>">
                            <i class="czi-arrow-<?php echo e(Session::get('direction') === "rtl" ? 'right ml-2' : 'left mr-2'); ?>"></i><?php echo e(\App\CPU\translate('back')); ?>

                        </a>
                    </div>
                </div>


                <div class="card box-shadow-sm">
                    <?php if(\App\CPU\Helpers::get_business_settings('order_verification')): ?>
                        <div class="card-header">
                            <h4><?php echo e(\App\CPU\translate('order_verification_code')); ?> : <?php echo e($order['verification_code']); ?></h4>
                        </div>
                    <?php endif; ?>
                    <div class="payment mb-3 table-responsive">
                        <?php if(isset($order['seller_id']) != 0): ?>
                            <?php ($shopName=\App\Models\Shop::where('seller_id', $order['seller_id'])->first()); ?>
                        <?php endif; ?>
                        <table class="table table-borderless">
                            <thead>
                            <tr class="order_table_tr" style="background: <?php echo e($web_config['primary_color']); ?>">
                                <td class="order_table_td">
                                    <div class="order_table_info_div">
                                        <div class="order_table_info_div_1 py-2">
                                            <span class="d-block spandHeadO"><?php echo e(\App\CPU\translate('order_no')); ?>: </span>
                                        </div>
                                        <div class="order_table_info_div_2">
                                            <span class="spanTr"> <?php echo e($order->id); ?> </span>
                                        </div>
                                    </div>
                                </td>
                                <td class="order_table_td">
                                    <div class="order_table_info_div">
                                        <div class="order_table_info_div_1 py-2">
                                            <span
                                                class="d-block spandHeadO"><?php echo e(\App\CPU\translate('order_date')); ?>: </span>
                                        </div>
                                        <div class="order_table_info_div_2">
                                            <span
                                                class="spanTr"> <?php echo e(date('d M, Y',strtotime($order->created_at))); ?> </span>
                                        </div>

                                    </div>
                                </td>
                                <?php if( $order->order_type == 'default_type'): ?>
                                    <td class="order_table_td">
                                        <div class="order_table_info_div">
                                            <div class="order_table_info_div_1 py-2">
                                            <span
                                                class="d-block spandHeadO"><?php echo e(\App\CPU\translate('shipping_address')); ?>: </span>
                                            </div>

                                            <?php if($order->shippingAddress): ?>
                                                <?php ($shipping=$order->shippingAddress); ?>
                                            <?php else: ?>
                                                <?php ($shipping=json_decode($order['shipping_address_data'])); ?>
                                            <?php endif; ?>

                                            <div class="order_table_info_div_2">
                                            <span class="spanTr">
                                                <?php if($shipping): ?>
                                                    <?php echo e($shipping->address); ?>,<br>
                                                    <?php echo e($shipping->city); ?>

                                                    , <?php echo e($shipping->zip); ?>


                                                <?php endif; ?>
                                            </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="order_table_td">
                                        <div class="order_table_info_div">
                                            <div class="order_table_info_div_1 py-2">
                                            <span
                                                class="d-block spandHeadO"><?php echo e(\App\CPU\translate('billing_address')); ?>: </span>
                                            </div>

                                            <?php if($order->billingAddress): ?>
                                                <?php ($billing=$order->billingAddress); ?>
                                            <?php else: ?>
                                                <?php ($billing=json_decode($order['billing_address_data'])); ?>
                                            <?php endif; ?>

                                            <div class="order_table_info_div_2">
                                            <span class="spanTr">
                                                <?php if($billing): ?>
                                                    <?php echo e($billing->address); ?>, <br>
                                                    <?php echo e($billing->city); ?>

                                                    , <?php echo e($billing->zip); ?>

                                                <?php else: ?>
                                                    <?php echo e($shipping->address); ?>,<br>
                                                    <?php echo e($shipping->city); ?>

                                                    , <?php echo e($shipping->zip); ?>

                                                <?php endif; ?>
                                            </span>
                                            </div>
                                        </div>
                                    </td>
                                <?php endif; ?>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="payment mb-3 table-responsive">
                        <table class="table table-borderless" style="min-width:720px">
                            <tbody>
                            <?php $__currentLoopData = $order->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php ($product=json_decode($detail->product_details,true)); ?>
                                <?php if($product): ?>
                                    <tr>
                                        <div class="row">
                                            <div class="col-md-4"
                                                 onclick="location.href='<?php echo e(route('product',$product['slug'])); ?>'">
                                                <td class="col-2 for-tab-img">
                                                    <img class="d-block"
                                                         onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                                         src="<?php echo e(\App\CPU\ProductManager::product_image_path('thumbnail')); ?>/<?php echo e($product['thumbnail']); ?>"
                                                         alt="VR Collection" width="60">
                                                </td>
                                                <td class="col-10 for-glaxy-name __vertical-middle">
                                                    <a href="<?php echo e(route('product',[$product['slug']])); ?>">
                                                        <?php echo e(isset($product['name']) ? Str::limit($product['name'],40) : ''); ?>

                                                    </a>
                                                    <?php if($detail->refund_request == 1): ?>
                                                        <small> (<?php echo e(\App\CPU\translate('refund_pending')); ?>) </small> <br>
                                                    <?php elseif($detail->refund_request == 2): ?>
                                                        <small> (<?php echo e(\App\CPU\translate('refund_approved')); ?>) </small> <br>
                                                    <?php elseif($detail->refund_request == 3): ?>
                                                        <small> (<?php echo e(\App\CPU\translate('refund_rejected')); ?>) </small> <br>
                                                    <?php elseif($detail->refund_request == 4): ?>
                                                        <small> (<?php echo e(\App\CPU\translate('refund_refunded')); ?>) </small> <br>
                                                    <?php endif; ?><br>
                                                    <?php if($detail->variant): ?>
                                                        <span><?php echo e(\App\CPU\translate('variant')); ?> : </span>
                                                        <?php echo e($detail->variant); ?>

                                                    <?php endif; ?>
                                                </td>
                                            </div>
                                            <div class="col-md-4">
                                                <td width="100%">
                                                    <div
                                                        class="text-<?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>">
                                                        <span
                                                            class="font-weight-bold amount"><?php echo e(\App\CPU\Helpers::currency_converter($detail->price)); ?> </span>
                                                        <br>
                                                        <span class="word-nobreak"><?php echo e(\App\CPU\translate('qty')); ?>: <?php echo e($detail->qty); ?></span>

                                                    </div>
                                                </td>
                                            </div>
                                                <?php
                                                $refund_day_limit = \App\CPU\Helpers::get_business_settings('refund_day_limit');
                                                $order_details_date = $detail->created_at;
                                                $current = \Carbon\Carbon::now();
                                                $length = $order_details_date->diffInDays($current);

                                                ?>
                                            <div class="col-md-2">
                                                <td>
                                                    <?php if($detail->product && $order->payment_status == 'paid' && $detail->product->digital_product_type == 'ready_product'): ?>
                                                        <a href="<?php echo e(route('digital-product-download', $detail->id)); ?>" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="bottom" title="<?php echo e(\App\CPU\translate('Download')); ?>">
                                                            <i class="fa fa-download"></i>
                                                        </a>
                                                    <?php elseif($detail->product && $order->payment_status == 'paid' && $detail->product->digital_product_type == 'ready_after_sell'): ?>
                                                        <?php if($detail->digital_file_after_sell): ?>
                                                            <a href="<?php echo e(route('digital-product-download', $detail->id)); ?>" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="bottom" title="<?php echo e(\App\CPU\translate('Download')); ?>">
                                                                <i class="fa fa-download"></i>
                                                            </a>
                                                        <?php else: ?>
                                                            <span class="btn btn-success disabled" data-toggle="tooltip" data-placement="top" title="<?php echo e(\App\CPU\translate('Product_not_uploaded_yet')); ?>">
                                                                <i class="fa fa-download"></i>
                                                            </span>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                </td>
                                            </div>

                                            <div class="col-md-2">
                                                <td>
                                                    <?php if($order->order_type == 'default_type'): ?>
                                                        <?php if($order->order_status=='delivered'): ?>
                                                            <a href="<?php echo e(route('submit-review',[$detail->id])); ?>"
                                                               class="btn btn--primary btn-sm d-inline-block w-100 mb-2"><?php echo e(\App\CPU\translate('review')); ?></a>

                                                            <?php if($detail->refund_request !=0): ?>
                                                                <a href="<?php echo e(route('refund-details',[$detail->id])); ?>"
                                                                   class="btn btn--primary btn-sm d-inline-block w-100 mb-2">
                                                                    <?php echo e(\App\CPU\translate('refund_details')); ?>

                                                                </a>
                                                            <?php endif; ?>
                                                            <?php if( $length <= $refund_day_limit && $detail->refund_request == 0): ?>
                                                                <a href="<?php echo e(route('refund-request',[$detail->id])); ?>"
                                                                   class="btn btn--primary btn-sm d-inline-block"><?php echo e(\App\CPU\translate('refund_request')); ?></a>
                                                            <?php endif; ?>
                                                            
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        <label class="badge badge-secondary">
                                                            <a
                                                                class="btn btn--primary btn-sm"><?php echo e(\App\CPU\translate('pos_order')); ?></a>
                                                        </label>
                                                    <?php endif; ?>
                                                </td>
                                            </div>
                                        </div>

                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php ($summary=\App\CPU\OrderManager::order_summary($order)); ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="payment mb-3 table-responsive">
                        <?php ($extra_discount=0); ?>
                        <?php
                        if ($order['extra_discount_type'] == 'percent') {
                            $extra_discount = ($summary['subtotal'] / 100) * $order['extra_discount'];
                        } else {
                            $extra_discount = $order['extra_discount'];
                        }
                        ?>
                        <?php if($order->delivery_type !=null): ?>

                            <div class="p-2">

                                <h5 class="text-black mt-0 mb-2 text-capitalize"><?php echo e(\App\CPU\translate('delivery_info')); ?> </h5>
                                <hr>
                            </div>
                            <div class="row m-2 justify-content-between">
                            <div class="col-sm-12">
                                <?php if($order->delivery_type == 'self_delivery' && $order->delivery_man_id  && isset($order->delivery_man)): ?>
                                    <p class="__text-414141">
                                    <span class="text-capitalize">
                                        <?php echo e(\App\CPU\translate('delivery_man_name')); ?> : <?php echo e($order->delivery_man['f_name'].' '.$order->delivery_man['l_name']); ?>

                                    </span>
                                    </p>
                                <?php else: ?>
                                    <p class="__text-414141">
                                <span>
                                    <?php echo e(\App\CPU\translate('delivery_service_name')); ?> : <?php echo e($order->delivery_service_name); ?>

                                </span>
                                        <br>
                                        <span>
                                    <?php echo e(\App\CPU\translate('tracking_id')); ?> : <?php echo e($order->third_party_delivery_tracking_id); ?>

                                </span>
                                    </p>
                                <?php endif; ?>
                            </div>
                                <div class="col-sm-auto">
                                    <?php if($order->delivery_type == 'self_delivery' && $order->delivery_man_id  && isset($order->delivery_man)): ?>
                                        <?php if($order->order_type == 'default_type'): ?>
                                            <button class="btn btn-outline--info btn-sm" data-toggle="modal" data-target="#exampleModal">
                                                <i class="fa fa-envelope"></i>
                                                <?php echo e(\App\CPU\translate('Chat_with_deliveryman')); ?>

                                            </button>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                                <div class="col-sm-auto">
                                    <?php if($order->order_type == 'default_type' && $order->order_status=='delivered' && $order->delivery_man_id): ?>
                                        <a href="<?php echo e(route('deliveryman-review',[$order->id])); ?>"
                                           class="btn btn-outline--info btn-sm">
                                            <i class="czi-star mr-1 font-size-md"></i>
                                            <?php echo e($order->delivery_man_review ? \App\CPU\translate('update') : ''); ?>

                                            <?php echo e(\App\CPU\translate('Deliveryman_Review')); ?>

                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if($order->order_note !=null): ?>
                            <div class="p-2">

                                <h4><?php echo e(\App\CPU\translate('order_note')); ?></h4>
                                <hr>
                                <div class="m-2">
                                    <p>
                                        <?php echo e($order->order_note); ?>

                                    </p>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="card-header">
                                <?php echo e(\App\CPU\translate('write_something')); ?>

                            </div>
                            <div class="modal-body">
                                <form action="<?php echo e(route('messages_store')); ?>" method="post" id="chat-form">
                                    <?php echo csrf_field(); ?>
                                    <input value="<?php echo e($order->delivery_man_id); ?>" name="delivery_man_id" hidden>

                                    <textarea name="message" class="form-control" required></textarea>
                                    <br>
                                    <button class="btn btn--primary" style="color: white;"><?php echo e(\App\CPU\translate('send')); ?></button>
                                </form>
                            </div>
                            <div class="card-footer">
                                <a href="<?php echo e(route('chat', ['type' => 'delivery-man'])); ?>" class="btn btn--primary mx-1">
                                    <?php echo e(\App\CPU\translate('go_to')); ?> <?php echo e(\App\CPU\translate('chatbox')); ?>

                                </a>
                                <button type="button" class="btn btn-secondary pull-right" data-dismiss="modal"><?php echo e(\App\CPU\translate('close')); ?>

                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="row d-flex justify-content-end">
                    <div class="col-md-8 col-lg-5">
                        <table class="table table-borderless">
                            <tbody class="totals">
                            <tr>
                                <td>
                                    <div class="text-<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>"><span
                                            class="product-qty "><?php echo e(\App\CPU\translate('Item')); ?></span></div>
                                </td>
                                <td>
                                    <div class="text-<?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>">
                                        <span><?php echo e($order->details->count()); ?></span>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="text-<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>"><span
                                            class="product-qty "><?php echo e(\App\CPU\translate('Subtotal')); ?></span>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-<?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>">
                                        <span><?php echo e(\App\CPU\Helpers::currency_converter($summary['subtotal'])); ?></span>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="text-<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>"><span
                                            class="product-qty "><?php echo e(\App\CPU\translate('tax_fee')); ?></span>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-<?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>">
                                        <span><?php echo e(\App\CPU\Helpers::currency_converter($summary['total_tax'])); ?></span>
                                    </div>
                                </td>
                            </tr>
                            <?php if($order->order_type == 'default_type'): ?>
                                <tr>
                                    <td>
                                        <div
                                            class="text-<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>"><span
                                                class="product-qty "><?php echo e(\App\CPU\translate('Shipping')); ?> <?php echo e(\App\CPU\translate('Fee')); ?></span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-<?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>">
                                            <span><?php echo e(\App\CPU\Helpers::currency_converter($summary['total_shipping_cost'])); ?></span>
                                        </div>
                                    </td>
                                </tr>
                            <?php endif; ?>

                            <tr>
                                <td>
                                    <div class="text-<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>"><span
                                            class="product-qty "><?php echo e(\App\CPU\translate('Discount')); ?> <?php echo e(\App\CPU\translate('on_product')); ?></span>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-<?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>">
                                        <span>- <?php echo e(\App\CPU\Helpers::currency_converter($summary['total_discount_on_product'])); ?></span>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="text-<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>"><span
                                            class="product-qty "><?php echo e(\App\CPU\translate('Coupon')); ?> <?php echo e(\App\CPU\translate('Discount')); ?></span>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-<?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>">
                                        <span>- <?php echo e(\App\CPU\Helpers::currency_converter($order->discount_amount)); ?></span>
                                    </div>
                                </td>
                            </tr>

                            <?php if($order->order_type != 'default_type'): ?>
                                <tr>
                                    <td>
                                        <div
                                            class="text-<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>"><span
                                                class="product-qty "><?php echo e(\App\CPU\translate('extra')); ?> <?php echo e(\App\CPU\translate('Discount')); ?></span>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="text-<?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>">
                                            <span>- <?php echo e(\App\CPU\Helpers::currency_converter($extra_discount)); ?></span>
                                        </div>
                                    </td>
                                </tr>
                            <?php endif; ?>

                            <tr class="border-top border-bottom">
                                <td>
                                    <div class="text-<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>"><span
                                            class="font-weight-bold"><?php echo e(\App\CPU\translate('Total')); ?></span>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-<?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>"><span
                                            class="font-weight-bold amount "><?php echo e(\App\CPU\Helpers::currency_converter($order->order_amount)); ?></span>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="justify-content mt-4 for-mobile-glaxy __gap-6px flex-nowrap">
                    <a href="<?php echo e(route('generate-invoice',[$order->id])); ?>" class="btn btn--primary for-glaxy-mobile w-50">
                        <?php echo e(\App\CPU\translate('generate_invoice')); ?>

                    </a>
                    <a class="btn btn-secondary text-white w-49" type="button"
                       href="<?php echo e(route('track-order.result',['order_id'=>$order['id'],'from_order_details'=>1])); ?>">
                        <?php echo e(\App\CPU\translate('Track')); ?> <?php echo e(\App\CPU\translate('Order')); ?>

                    </a>
                </div>
            </section>
        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php $__env->startPush('script'); ?>
    <script>
        function review_message() {
            toastr.info('<?php echo e(\App\CPU\translate('you_can_review_after_the_product_is_delivered!')); ?>', {
                CloseButton: true,
                ProgressBar: true
            });
        }

        function refund_message() {
            toastr.info('<?php echo e(\App\CPU\translate('you_can_refund_request_after_the_product_is_delivered!')); ?>', {
                CloseButton: true,
                ProgressBar: true
            });
        }
    </script>
    <script>
        $('#chat-form').on('submit', function (e) {
            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });

            $.ajax({
                type: "post",
                url: '<?php echo e(route('messages_store')); ?>',
                data: $('#chat-form').serialize(),
                success: function (respons) {

                    toastr.success('<?php echo e(\App\CPU\translate('send successfully')); ?>', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                    $('#chat-form').trigger('reset');
                }
            });

        });
    </script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.front-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tikka\resources\themes\default/web-views/users-profile/account-order-details.blade.php ENDPATH**/ ?>