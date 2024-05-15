<?php $__env->startSection('title', \App\CPU\translate('Order Details')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <!-- Page Title -->
        <div class="mb-4">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img src="<?php echo e(asset('public/assets/back-end/img/all-orders.png')); ?>" alt="">
                <?php echo e(\App\CPU\translate('order_details')); ?>

            </h2>
        </div>
        <!-- End Page Title -->

        <div class="row gy-3" id="printableArea">
            <div class="col-lg-8 col-xl-9">
                <!-- Card -->
                <div class="card h-100">
                    <!-- Body -->
                    <div class="card-body">
                        <div class="d-flex flex-wrap gap-10 justify-content-between mb-4">
                            <div class="d-flex flex-column gap-10">
                                <h4 class="text-capitalize"><?php echo e(\App\CPU\translate('Order_ID')); ?> #<?php echo e($order['id']); ?></h4>
                                <div class="">
                                    <i class="tio-date-range"></i> <?php echo e(date('d M Y H:i:s',strtotime($order['created_at']))); ?>

                                </div>

                                <div class="d-flex flex-wrap gap-10">
                                    <div class="badge-soft-info font-weight-bold d-flex align-items-center rounded py-1 px-2"> <?php echo e(\App\CPU\translate('linked_orders')); ?> (<?php echo e($linked_orders->count()); ?>) : </div>
                                    <?php $__currentLoopData = $linked_orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $linked): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a href="<?php echo e(route('admin.orders.details',[$linked['id']])); ?>"
                                           class="btn btn-info rounded py-1 px-2"><?php echo e($linked['id']); ?></a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                            <div class="text-sm-right">
                                <div class="d-flex flex-wrap gap-10">
                                    <div class="">
                                        <?php if(isset($shipping_address['latitude']) && isset($shipping_address['longitude'])): ?>
                                            <button class="btn btn--primary px-4" data-toggle="modal" data-target="#locationModal"><i
                                                    class="tio-map"></i> <?php echo e(\App\CPU\translate('show_locations_on_map')); ?></button>
                                        <?php else: ?>
                                            <button class="btn btn-warning px-4">
                                                <i class="tio-map"></i> <?php echo e(\App\CPU\translate('shipping_address_has_been_given_below')); ?>

                                            </button>
                                        <?php endif; ?>
                                    </div>
                                    <a class="btn btn--primary px-4" target="_blank"
                                       href=<?php echo e(route('admin.orders.generate-invoice',[$order['id']])); ?>>
                                        <i class="tio-print mr-1"></i> <?php echo e(\App\CPU\translate('Print')); ?> <?php echo e(\App\CPU\translate('invoice')); ?>

                                    </a>
                                </div>
                                <div class="d-flex flex-column gap-2 mt-3">
                                    <!-- Order status -->
                                    <div class="order-status d-flex justify-content-sm-end gap-10 text-capitalize">
                                        <span class="title-color"><?php echo e(\App\CPU\translate('Status')); ?>: </span>
                                        <?php if($order['order_status']=='pending'): ?>
                                            <span class="badge badge-soft-info font-weight-bold radius-50 d-flex align-items-center py-1 px-2"><?php echo e(str_replace('_',' ',$order['order_status'])); ?></span>
                                        <?php elseif($order['order_status']=='failed'): ?>
                                            <span class="badge badge-danger font-weight-bold radius-50 d-flex align-items-center py-1 px-2"><?php echo e(str_replace('_',' ',$order['order_status'] == 'failed' ? 'Failed to Deliver' : '')); ?>

                                            </span>
                                        <?php elseif($order['order_status']=='processing' || $order['order_status']=='out_for_delivery'): ?>
                                            <span class="badge badge-soft-warning font-weight-bold radius-50 d-flex align-items-center py-1 px-2">
                                                <?php echo e(str_replace('_',' ',$order['order_status'] == 'processing' ? 'Packaging' : $order['order_status'])); ?>

                                            </span>
                                        <?php elseif($order['order_status']=='delivered' || $order['order_status']=='confirmed'): ?>
                                            <span class="badge badge-soft-success font-weight-bold radius-50 d-flex align-items-center py-1 px-2">
                                                <?php echo e(str_replace('_',' ',$order['order_status'])); ?>

                                            </span>
                                        <?php else: ?>
                                            <span class="badge badge-soft-danger font-weight-bold radius-50 d-flex align-items-center py-1 px-2">
                                                <?php echo e(str_replace('_',' ',$order['order_status'])); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>

                                    <!-- Payment Method -->
                                    <div class="payment-method d-flex justify-content-sm-end gap-10 text-capitalize">
                                        <span class="title-color"><?php echo e(\App\CPU\translate('Payment')); ?> <?php echo e(\App\CPU\translate('Method')); ?> :</span>
                                        <strong><?php echo e(\App\CPU\translate($order['payment_method'])); ?></strong>
                                    </div>

                                    <!-- reference-code -->
                                    <?php if($order->payment_method != 'cash_on_delivery' && $order->payment_method != 'pay_by_wallet'): ?>
                                        <div class="reference-code d-flex justify-content-sm-end gap-10 text-capitalize">
                                            <span class="title-color"><?php echo e(\App\CPU\translate('Reference')); ?> <?php echo e(\App\CPU\translate('Code')); ?> :</span>
                                            <strong><?php echo e(str_replace('_',' ',$order['transaction_ref'])); ?> <?php echo e($order->payment_method == 'offline_payment' ? '('.$order->payment_by.')':''); ?></strong>
                                        </div>
                                    <?php endif; ?>

                                    <!-- Payment Status -->
                                    <div class="payment-status d-flex justify-content-sm-end gap-10">
                                        <span class="title-color"><?php echo e(\App\CPU\translate('Payment_Status')); ?>:</span>
                                        <?php if($order['payment_status']=='paid'): ?>
                                            <span class="text-success font-weight-bold">
                                                <?php echo e(\App\CPU\translate('Paid')); ?>

                                            </span>
                                        <?php else: ?>
                                            <span class="text-danger font-weight-bold">
                                                <?php echo e(\App\CPU\translate('Unpaid')); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>

                                    <?php if($order->payment_method == 'offline_payment'): ?>
                                        <div class="col-md-12 payment-status d-flex justify-content-sm-end gap-10">
                                            <span class="title-color"><?php echo e(\App\CPU\translate('Payment_Note')); ?>:</span>
                                            <span>
                                                <?php echo e($order->payment_note); ?>

                                            </span>
                                        </div>
                                    <?php endif; ?>

                                    <?php if(\App\CPU\Helpers::get_business_settings('order_verification')): ?>
                                        <span class="ml-2 ml-sm-3">
                                            <b>
                                                <?php echo e(\App\CPU\translate('order_verification_code')); ?> : <?php echo e($order['verification_code']); ?>

                                            </b>
                                        </span>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>

                        <!-- Order Note -->
                        <div class="mb-5">
                            <?php if($order->order_note !=null): ?>
                                <div class="d-flex align-items-center gap-10">
                                    <strong class="c1 bg-soft--primary text-capitalize py-1 px-2">
                                        # <?php echo e(\App\CPU\translate('note')); ?> :
                                    </strong>
                                    <div><?php echo e($order->order_note); ?></div>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="table-responsive datatable-custom">
                            <table class="table fz-12 table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table w-100">
                                <thead class="thead-light thead-50 text-capitalize">
                                <tr>
                                    <th><?php echo e(\App\CPU\translate('SL')); ?></th>
                                    <th><?php echo e(\App\CPU\translate('Item Details')); ?></th>
                                    <th><?php echo e(\App\CPU\translate('Variations')); ?></th>
                                    <th><?php echo e(\App\CPU\translate('Tax')); ?></th>
                                    <th><?php echo e(\App\CPU\translate('Discount')); ?></th>
                                    <th><?php echo e(\App\CPU\translate('Price')); ?></th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php ($subtotal=0); ?>
                                <?php ($total=0); ?>
                                <?php ($shipping=0); ?>
                                <?php ($discount=0); ?>
                                <?php ($tax=0); ?>
                                <?php ($row=0); ?>

                                <?php $__currentLoopData = $order->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($detail->product_all_status): ?>
                                        <tr>
                                            <td><?php echo e(++$row); ?></td>
                                            <td>
                                                <div class="media align-items-center gap-10">
                                                    <img class="avatar avatar-60 rounded"
                                                         onerror="this.src='<?php echo e(asset('public/assets/back-end/img/160x160/img2.jpg')); ?>'"
                                                         src="<?php echo e(\App\CPU\ProductManager::product_image_path('thumbnail')); ?>/<?php echo e($detail->product_all_status['thumbnail']); ?>"
                                                         alt="Image Description">
                                                    <div>
                                                        <h6 class="title-color"><?php echo e(substr($detail->product_all_status['name'],0,30)); ?><?php echo e(strlen($detail->product_all_status['name'])>10?'...':''); ?></h6>
                                                        <div><strong><?php echo e(\App\CPU\translate('Price')); ?> :</strong> <?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($detail['price']))); ?></div>
                                                        <div><strong><?php echo e(\App\CPU\translate('Qty')); ?> :</strong> <?php echo e($detail->qty); ?></div>
                                                    </div>
                                                </div>
                                                <?php if($detail->product_all_status->digital_product_type == 'ready_after_sell'): ?>
                                                    <button type="button" class="btn btn-sm btn--primary mt-2" title="File Upload" data-toggle="modal" data-target="#fileUploadModal-<?php echo e($detail->id); ?>" onclick="modalFocus('fileUploadModal-<?php echo e($detail->id); ?>')">
                                                        <i class="tio-file-outlined"></i> <?php echo e(\App\CPU\translate('File')); ?>

                                                    </button>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($detail['variant']); ?></td>
                                            <td>
                                                <?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($detail['tax']))); ?>

                                                <?php if($detail->product_all_status->tax_model == 'include'): ?>
                                                    <span class="ml-2" data-toggle="tooltip" data-placement="top" title="<?php echo e(\App\CPU\translate('tax_included')); ?>">
                                                        <img class="info-img" src="<?php echo e(asset('public/assets/back-end/img/info-circle.svg')); ?>" alt="img">
                                                    </span>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($detail['discount']))); ?></td>
                                            <?php ($subtotal=$detail['price']*$detail->qty+$detail['tax']-$detail['discount']); ?>
                                            <td><?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($subtotal))); ?></td>
                                        </tr>
                                        <?php ($discount+=$detail['discount']); ?>
                                        <?php ($tax+=$detail['tax']); ?>
                                        <?php ($total+=$subtotal); ?>
                                        <!-- End Media -->
                                    <?php endif; ?>
                                    <?php ($sellerId=$detail->seller_id); ?>

                                    <?php if(isset($detail->product_all_status->digital_product_type) && $detail->product_all_status->digital_product_type == 'ready_after_sell'): ?>
                                        <div class="modal fade" id="fileUploadModal-<?php echo e($detail->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <form action="<?php echo e(route('admin.orders.digital-file-upload-after-sell')); ?>" method="post" enctype="multipart/form-data">
                                                        <?php echo csrf_field(); ?>
                                                        <div class="modal-body">
                                                            <?php if($detail->digital_file_after_sell): ?>
                                                                <div class="mb-4">
                                                                    <?php echo e(\App\CPU\translate('uploaded_file')); ?> :
                                                                    <a href="<?php echo e(asset('public/storage/product/digital-product/'.$detail->digital_file_after_sell)); ?>"
                                                                       class="btn btn-success btn-sm" title="Download" download><i class="tio-download"></i> <?php echo e(\App\CPU\translate('Download')); ?></a>
                                                                </div>
                                                            <?php else: ?>
                                                                <h4 class="text-center">File not found!</h4>
                                                            <?php endif; ?>
                                                            <?php if($detail->seller_id == 1): ?>
                                                                <input type="file" name="digital_file_after_sell" class="form-control">
                                                                <div class="mt-1 text-info"><?php echo e(\App\CPU\translate('File type: jpg, jpeg, png, gif, zip, pdf')); ?></div>
                                                                <input type="hidden" value="<?php echo e($detail->id); ?>" name="order_id">
                                                            <?php endif; ?>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(\App\CPU\translate('Close')); ?></button>
                                                            <?php if($detail->seller_id == 1): ?>
                                                                <button type="submit" class="btn btn--primary"><?php echo e(\App\CPU\translate('Upload')); ?></button>
                                                            <?php endif; ?>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>

                        <?php ($shipping=$order['shipping_cost']); ?>
                        <?php ($coupon_discount=$order['discount_amount']); ?>
                        <hr />
                        <div class="row justify-content-md-end mb-3">
                            <div class="col-md-9 col-lg-8">
                                <dl class="row gy-1 text-sm-right">
                                    <dt class="col-5"><?php echo e(\App\CPU\translate('Shipping')); ?></dt>
                                    <dd class="col-6 title-color">
                                        <strong><?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($shipping))); ?></strong>
                                    </dd>

                                    <dt class="col-5"><?php echo e(\App\CPU\translate('coupon_discount')); ?></dt>
                                    <dd class="col-6 title-color">
                                        - <?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($coupon_discount))); ?>

                                    </dd>

                                    <?php if($order['coupon_discount_bearer'] == 'inhouse' && !in_array($order['coupon_code'], [0, NULL])): ?>
                                        <dt class="col-5"><?php echo e(\App\CPU\translate('coupon_discount')); ?> (<?php echo e(\App\CPU\translate('admin_bearer')); ?>)</dt>
                                        <dd class="col-6 title-color">
                                            + <?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($coupon_discount))); ?>

                                        </dd>
                                        <?php ($total += $coupon_discount); ?>
                                    <?php endif; ?>

                                    <dt class="col-5"><strong><?php echo e(\App\CPU\translate('Total')); ?></strong></dt>
                                    <dd class="col-6 title-color">
                                        <strong><?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($total+$shipping-$coupon_discount))); ?></strong>
                                    </dd>
                                </dl>
                                <!-- End Row -->
                            </div>
                        </div>
                        <!-- End Row -->
                    </div>
                    <!-- End Body -->
                </div>
                <!-- End Card -->
            </div>

            <div class="col-lg-4 col-xl-3 d-flex flex-column gap-3">
                <div class="card">
                    <div class="card-body text-capitalize d-flex flex-column gap-4">
                        <h4 class="mb-0 text-center"><?php echo e(\App\CPU\translate('Order_&_Shipping_Info')); ?></h4>
                        <div class="">
                            <label class="font-weight-bold title-color fz-14"><?php echo e(\App\CPU\translate('Order Status')); ?></label>
                            <select name="order_status" onchange="order_status(this.value)"
                                    class="status form-control" data-id="<?php echo e($order['id']); ?>">

                                <option
                                    value="pending" <?php echo e($order->order_status == 'pending'?'selected':''); ?> > <?php echo e(\App\CPU\translate('Pending')); ?></option>
                                <option
                                    value="confirmed" <?php echo e($order->order_status == 'confirmed'?'selected':''); ?> > <?php echo e(\App\CPU\translate('Confirmed')); ?></option>
                                <option
                                    value="processing" <?php echo e($order->order_status == 'processing'?'selected':''); ?> ><?php echo e(\App\CPU\translate('Packaging')); ?> </option>
                                <option class="text-capitalize"
                                        value="out_for_delivery" <?php echo e($order->order_status == 'out_for_delivery'?'selected':''); ?> ><?php echo e(\App\CPU\translate('out_for_delivery')); ?> </option>
                                <option
                                    value="delivered" <?php echo e($order->order_status == 'delivered'?'selected':''); ?> ><?php echo e(\App\CPU\translate('Delivered')); ?> </option>
                                <option
                                    value="returned" <?php echo e($order->order_status == 'returned'?'selected':''); ?> > <?php echo e(\App\CPU\translate('Returned')); ?></option>
                                <option
                                    value="failed" <?php echo e($order->order_status == 'failed'?'selected':''); ?> ><?php echo e(\App\CPU\translate('Failed_to_Deliver')); ?> </option>
                                <option
                                    value="canceled" <?php echo e($order->order_status == 'canceled'?'selected':''); ?> ><?php echo e(\App\CPU\translate('Canceled')); ?> </option>
                            </select>
                        </div>


                        <div class="">
                            <label class="font-weight-bold title-color fz-14"><?php echo e(\App\CPU\translate('Payment_Status')); ?></label>
                            <select name="payment_status" class="payment_status form-control" data-id="<?php echo e($order['id']); ?>">
                                <option
                                    onclick="route_alert('<?php echo e(route('admin.orders.payment-status',['id'=>$order['id'],'payment_status'=>'paid'])); ?>','Change status to paid ?')"
                                    href="javascript:"
                                    value="paid" <?php echo e($order->payment_status == 'paid'?'selected':''); ?> >
                                    <?php echo e(\App\CPU\translate('Paid')); ?>

                                </option>
                                <option value="unpaid" <?php echo e($order->payment_status == 'unpaid'?'selected':''); ?> >
                                    <?php echo e(\App\CPU\translate('Unpaid')); ?>

                                </option>
                            </select>
                        </div>

                        <?php if($physical_product): ?>
                        <ul class="list-unstyled list-unstyled-py-4">
                            <li>
                                <label class="font-weight-bold title-color fz-14">
                                    <?php echo e(\App\CPU\translate('shipping_type')); ?>

                                    (<?php echo e(\App\CPU\translate(str_replace('_',' ',$order->shipping_type))); ?>)
                                </label>
                                <?php if($order->shipping_type == 'order_wise'): ?>
                                    <label class="font-weight-bold title-color fz-14">
                                        <?php echo e(\App\CPU\translate('shipping')); ?> <?php echo e(\App\CPU\translate('method')); ?>

                                        (<?php echo e($order->shipping ? \App\CPU\translate(str_replace('_',' ',$order->shipping->title)) :\App\CPU\translate('no_shipping_method_selected')); ?>)
                                    </label>
                                <?php endif; ?>

                                <select class="form-control text-capitalize" name="delivery_type" onchange="choose_delivery_type(this.value)">
                                    <option value="0">
                                        <?php echo e(\App\CPU\translate('choose_delivery_type')); ?>

                                    </option>

                                    <option value="self_delivery" <?php echo e($order->delivery_type=='self_delivery'?'selected':''); ?>>
                                        <?php echo e(\App\CPU\translate('by_self_delivery_man')); ?>

                                    </option>
                                    <option value="third_party_delivery" <?php echo e($order->delivery_type=='third_party_delivery'?'selected':''); ?> >
                                        <?php echo e(\App\CPU\translate('by_third_party_delivery_service')); ?>

                                    </option>
                                </select>
                            </li>
                            <li class="choose_delivery_man">
                                <label class="font-weight-bold title-color fz-14">
                                    <?php echo e(\App\CPU\translate('choose_delivery_man')); ?>

                                </label>
                                <select class="form-control text-capitalize js-select2-custom" name="delivery_man_id" onchange="addDeliveryMan(this.value)">
                                    <option
                                        value="0"><?php echo e(\App\CPU\translate('select')); ?></option>
                                    <?php $__currentLoopData = $delivery_men; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deliveryMan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option
                                            value="<?php echo e($deliveryMan['id']); ?>" <?php echo e($order['delivery_man_id']==$deliveryMan['id']?'selected':''); ?>>
                                            <?php echo e($deliveryMan['f_name'].' '.$deliveryMan['l_name'].' ('.$deliveryMan['phone'].' )'); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </li>
                            <li class="choose_delivery_man">
                                <label class="font-weight-bold title-color fz-14">
                                    <?php echo e(\App\CPU\translate('deliveryman_will_get')); ?> (<?php echo e(session('currency_symbol')); ?>)
                                </label>
                                <input type="number" id="deliveryman_charge" onkeyup="amountDateUpdate(this, event)" value="<?php echo e($order->deliveryman_charge); ?>" name="deliveryman_charge" class="form-control" placeholder="Ex: 20" required>
                            </li>
                            <li class="choose_delivery_man">
                                <label class="font-weight-bold title-color fz-14">
                                    <?php echo e(\App\CPU\translate('expected_delivery_date')); ?>

                                </label>
                                <input type="date" onchange="amountDateUpdate(this, event)" value="<?php echo e($order->expected_delivery_date); ?>" name="expected_delivery_date" id="expected_delivery_date" class="form-control" required>
                            </li>
                            <li class=" mt-2" id="by_third_party_delivery_service_info">
                                <span>
                                    <?php echo e(\App\CPU\translate('delivery_service_name')); ?> : <?php echo e($order->delivery_service_name); ?>

                                </span>
                                <span class="float-right">
                                    <a href="javascript:" onclick="choose_delivery_type('third_party_delivery')">
                                        <i class="tio-edit"></i>
                                    </a>
                                </span>
                                <br>
                                <span>
                                    <?php echo e(\App\CPU\translate('tracking_id')); ?> : <?php echo e($order->third_party_delivery_tracking_id); ?>

                                </span>
                            </li>
                        </ul>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Card -->
                <div class="card">
                    <!-- Body -->
                    <?php if($order->customer): ?>
                        <div class="card-body">
                            <h4 class="mb-4 d-flex gap-2">
                                <img src="<?php echo e(asset('public/assets/back-end/img/seller-information.png')); ?>" alt="">
                                <?php echo e(\App\CPU\translate('Customer_information')); ?>

                            </h4>
                            <div class="media flex-wrap gap-3">
                                <div class="">
                                    <img class="avatar rounded-circle avatar-70"
                                         onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                         src="<?php echo e(asset('storage/profile/'.$order->customer->image)); ?>"
                                         alt="Image">
                                </div>
                                <div class="media-body d-flex flex-column gap-1">
                                    <span class="title-color"><strong><?php echo e($order->customer['f_name'].' '.$order->customer['l_name']); ?> </strong></span>
                                    <span class="title-color"> <strong><?php echo e(\App\Models\Order::where('customer_id',$order['customer_id'])->count()); ?></strong> <?php echo e(\App\CPU\translate('orders')); ?></span>
                                    <span class="title-color break-all"><strong><?php echo e($order->customer['phone']); ?></strong></span>
                                    <span class="title-color break-all"><?php echo e($order->customer['email']); ?></span>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="card-body">
                            <div class="media">
                                <span><?php echo e(\App\CPU\translate('no_customer_found')); ?></span>
                            </div>
                        </div>
                    <?php endif; ?>
                    <!-- End Body -->
                </div>
                <!-- End Card -->

                <!-- Card -->
                <?php if($physical_product): ?>
                <div class="card">
                    <!-- Body -->
                    <?php if($order->customer): ?>
                        <div class="card-body">
                            <h4 class="mb-4 d-flex gap-2">
                                <img src="<?php echo e(asset('public/assets/back-end/img/seller-information.png')); ?>" alt="">
                                <?php echo e(\App\CPU\translate('shipping_address')); ?>

                            </h4>

                            <?php if($order->shippingAddress): ?>
                                <?php ($shipping_address=$order->shippingAddress); ?>
                            <?php else: ?>
                                <?php ($shipping_address=json_decode($order['shipping_address_data'])); ?>
                            <?php endif; ?>

                            <div class="d-flex flex-column gap-2">
                                <div>
                                    <span><?php echo e(\App\CPU\translate('Name')); ?> :</span>
                                    <strong><?php echo e($shipping_address? $shipping_address->contact_person_name : ''); ?></strong>
                                </div>
                                <div>
                                    <span><?php echo e(\App\CPU\translate('Contact')); ?>:</span>
                                    <strong><?php echo e($shipping_address ? $shipping_address->phone  : ''); ?></strong>
                                </div>
                                <div>
                                    <span><?php echo e(\App\CPU\translate('City')); ?>:</span>
                                    <strong><?php echo e($shipping_address ? $shipping_address->city : ''); ?></strong>
                                </div>
                                <div>
                                    <span><?php echo e(\App\CPU\translate('zip_code')); ?> :</span>
                                    <strong><?php echo e($shipping_address ? $shipping_address->zip  : ''); ?></strong>
                                </div>
                                <div class="d-flex align-items-start gap-2">
                                    <!-- <span><?php echo e(\App\CPU\translate('address')); ?> :</span> -->
                                    <img src="<?php echo e(asset('public/assets/back-end/img/location.png')); ?>" alt="">
                                    <?php echo e($shipping_address ? $shipping_address->city  : \App\CPU\translate('empty')); ?>

                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="card-body">
                            <div class="media align-items-center">
                                <span><?php echo e(\App\CPU\translate('no_shipping_address_found')); ?></span>
                            </div>
                        </div>
                    <?php endif; ?>
                    <!-- End Body -->
                </div>
                <?php endif; ?>
                <!-- End Card -->

                <!-- Card -->
                <div class="card">
                    <!-- Body -->
                    <?php if($order->customer): ?>
                        <div class="card-body">
                            <h4 class="mb-4 d-flex gap-2">
                                <img src="<?php echo e(asset('public/assets/back-end/img/seller-information.png')); ?>" alt="">
                                <?php echo e(\App\CPU\translate('billing_address')); ?>

                            </h4>

                            <?php if($order->billingAddress): ?>
                                <?php ($billing=$order->billingAddress); ?>
                            <?php else: ?>
                                <?php ($billing=json_decode($order['billing_address_data'])); ?>
                            <?php endif; ?>

                            <div class="d-flex flex-column gap-2">
                                <div>
                                    <span><?php echo e(\App\CPU\translate('Name')); ?> :</span>
                                    <strong><?php echo e($billing ? $billing->contact_person_name : ''); ?></strong>
                                </div>
                                <div>
                                    <span><?php echo e(\App\CPU\translate('Contact')); ?>:</span>
                                    <strong><?php echo e($billing ? $billing->phone  : ''); ?></strong>
                                </div>
                                <div>
                                    <span><?php echo e(\App\CPU\translate('City')); ?>:</span>
                                    <strong><?php echo e($billing ? $billing->city : ''); ?></strong>
                                </div>
                                <div>
                                    <span><?php echo e(\App\CPU\translate('zip_code')); ?> :</span>
                                    <strong><?php echo e($billing ? $billing->zip  : ''); ?></strong>
                                </div>
                                <div class="d-flex align-items-start gap-2">
                                    <!-- <span><?php echo e(\App\CPU\translate('address')); ?> :</span> -->
                                    <img src="<?php echo e(asset('public/assets/back-end/img/location.png')); ?>" alt="">
                                    <?php echo e($billing ? $billing->city  : ''); ?>

                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="card-body">
                            <div class="media align-items-center">
                                <span><?php echo e(\App\CPU\translate('no_billing_address_found')); ?></span>
                            </div>
                        </div>
                    <?php endif; ?>
                    <!-- End Body -->
                </div>
                <!-- End Card -->

                <!-- Card -->
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-4 d-flex gap-2">
                            <img src="<?php echo e(asset('public/assets/back-end/img/shop-information.png')); ?>" alt="">
                            <?php echo e(\App\CPU\translate('Shop_Information')); ?>

                        </h4>


                        <div class="media">
                            <?php if($order->seller_is == 'admin'): ?>
                                <div class="mr-3">
                                    <img class="avatar rounded avatar-70" onerror="this.src='https://6valley.6amtech.com/public/assets/front-end/img/image-place-holder.png'"
                                         src="<?php echo e(asset("public/storage/company/$company_web_logo")); ?>" alt="">
                                </div>

                                <div class="media-body d-flex flex-column gap-2">
                                    <h5><?php echo e($company_name); ?></h5>
                                    <span class="title-color"><strong><?php echo e($total_delivered); ?></strong> <?php echo e(\App\CPU\translate('Orders Served')); ?></span>
                                </div>
                            <?php else: ?>
                                <?php if(!empty($order->seller->shop)): ?>
                                    <div class="mr-3">
                                        <img class="avatar rounded avatar-70" onerror="this.src='https://6valley.6amtech.com/public/assets/front-end/img/image-place-holder.png'"
                                             src="<?php echo e(asset('storage/shop')); ?>/<?php echo e($order->seller->shop->image); ?>" alt="">
                                    </div>
                                    <div class="media-body d-flex flex-column gap-2">
                                        <h5><?php echo e($order->seller->shop->name); ?></h5>
                                        <span class="title-color"><strong><?php echo e($total_delivered); ?></strong> <?php echo e(\App\CPU\translate('Orders Served')); ?></span>
                                        <span class="title-color"> <strong><?php echo e($order->seller->shop->contact); ?></strong></span>
                                        <div class="d-flex align-items-start gap-2">
                                            <img src="<?php echo e(asset('public/assets/back-end/img/location.png')); ?>" class="mt-1" alt="">
                                            <?php echo e($order->seller->shop->address); ?>

                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div class="card-body">
                                        <div class="media align-items-center">
                                            <span><?php echo e(\App\CPU\translate('no_data_found')); ?></span>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <!-- End Card -->
            </div>
        </div>
        <!-- End Row -->
    </div>

    <!--Show locations on map Modal -->
    <div class="modal fade" id="locationModal" tabindex="-1" role="dialog" aria-labelledby="locationModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"
                        id="locationModalLabel"><?php echo e(\App\CPU\translate('location')); ?> <?php echo e(\App\CPU\translate('data')); ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 modal_body_map">
                            <div class="location-map" id="location-map">
                                <div class="w-100 __h-400px" id="location_map_canvas"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->

    <!--Show delivery info Modal -->
    <div class="modal" id="shipping_chose" role="dialog" tabindex="-1" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(\App\CPU\translate('update_third_party_delivery_info')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <form action="<?php echo e(route('admin.orders.update-deliver-info')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="order_id" value="<?php echo e($order['id']); ?>">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for=""><?php echo e(\App\CPU\translate('delivery_service_name')); ?></label>
                                        <input class="form-control" type="text" name="delivery_service_name" value="<?php echo e($order['delivery_service_name']); ?>" id="" required>
                                    </div>
                                    <div class="form-group">
                                        <label for=""><?php echo e(\App\CPU\translate('tracking_id')); ?> (<?php echo e(\App\CPU\translate('optional')); ?>)</label>
                                        <input class="form-control" type="text" name="third_party_delivery_tracking_id" value="<?php echo e($order['third_party_delivery_tracking_id']); ?>" id="">
                                    </div>
                                    <button class="btn btn--primary" type="submit"><?php echo e(\App\CPU\translate('update')); ?></button>
                                </div>
                            </form>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script_2'); ?>
    <script>
        $(document).on('change', '.payment_status', function () {
            var id = $(this).attr("data-id");
            var value = $(this).val();
            Swal.fire({
                title: '<?php echo e(\App\CPU\translate('Are you sure Change this')); ?>?',
                text: "<?php echo e(\App\CPU\translate('You will not be able to revert this')); ?>!",
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
                        url: "<?php echo e(route('admin.orders.payment-status')); ?>",
                        method: 'POST',
                        data: {
                            "id": id,
                            "payment_status": value
                        },
                        success: function (data) {
                            if(data.customer_status==0)
                            {
                                toastr.warning('<?php echo e(\App\CPU\translate('Account has been deleted, you can not change the status!')); ?>!');
                                // location.reload();
                            }else
                            {
                                toastr.success('<?php echo e(\App\CPU\translate('Status Change successfully')); ?>');
                                // location.reload();
                            }
                        }
                    });
                }
            })
        });

        function order_status(status) {
            <?php if($order['order_status']=='delivered'): ?>
            Swal.fire({
                title: '<?php echo e(\App\CPU\translate('Order is already delivered, and transaction amount has been disbursed, changing status can be the reason of miscalculation')); ?>!',
                text: "<?php echo e(\App\CPU\translate('Think before you proceed')); ?>.",
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
                        url: "<?php echo e(route('admin.orders.status')); ?>",
                        method: 'POST',
                        data: {
                            "id": '<?php echo e($order['id']); ?>',
                            "order_status": status
                        },
                        success: function (data) {

                            if (data.success == 0) {
                                toastr.success('<?php echo e(\App\CPU\translate('Order is already delivered, You can not change it')); ?> !!');
                                // location.reload();
                            } else {

                                if(data.payment_status == 0){
                                    toastr.warning('<?php echo e(\App\CPU\translate('Before delivered you need to make payment status paid!')); ?>!');
                                    // location.reload();
                                }else if(data.customer_status==0)
                                {
                                    toastr.warning('<?php echo e(\App\CPU\translate('Account has been deleted, you can not change the status!')); ?>!');
                                    // location.reload();
                                }
                                else{
                                    toastr.success('<?php echo e(\App\CPU\translate('Status Change successfully')); ?>!');
                                    // location.reload();
                                }
                            }

                        }
                    });
                }
            })
            <?php else: ?>
            Swal.fire({
                title: '<?php echo e(\App\CPU\translate('Are you sure Change this')); ?>?',
                text: "<?php echo e(\App\CPU\translate('You will not be able to revert this')); ?>!",
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
                        url: "<?php echo e(route('admin.orders.status')); ?>",
                        method: 'POST',
                        data: {
                            "id": '<?php echo e($order['id']); ?>',
                            "order_status": status
                        },
                        success: function (data) {
                            if (data.success == 0) {
                                toastr.success('<?php echo e(\App\CPU\translate('Order is already delivered, You can not change it')); ?> !!');
                                // location.reload();
                            } else {
                                if(data.payment_status == 0){
                                    toastr.warning('<?php echo e(\App\CPU\translate('Before delivered you need to make payment status paid!')); ?>!');
                                    // location.reload();
                                }else if(data.customer_status==0)
                                {
                                    toastr.warning('<?php echo e(\App\CPU\translate('Account has been deleted, you can not change the status!')); ?>!');
                                    // location.reload();
                                }else{
                                    toastr.success('<?php echo e(\App\CPU\translate('Status Change successfully')); ?>!');
                                    // location.reload();
                                }
                            }

                        }
                    });
                }
            })
            <?php endif; ?>
        }
    </script>
    <script>
        $( document ).ready(function() {
            let delivery_type = '<?php echo e($order->delivery_type); ?>';


            if(delivery_type === 'self_delivery'){
                $('.choose_delivery_man').show();
                $('#by_third_party_delivery_service_info').hide();
            }else if(delivery_type === 'third_party_delivery')
            {
                $('.choose_delivery_man').hide();
                $('#by_third_party_delivery_service_info').show();
            }else{
                $('.choose_delivery_man').hide();
                $('#by_third_party_delivery_service_info').hide();
            }
        });
    </script>
    <script>
        function choose_delivery_type(val)
        {

            if(val==='self_delivery')
            {
                $('.choose_delivery_man').show();
                $('#by_third_party_delivery_service_info').hide();
            }else if(val==='third_party_delivery'){
                $('.choose_delivery_man').hide();
                $('#deliveryman_charge').val(null);
                $('#expected_delivery_date').val(null);
                $('#by_third_party_delivery_service_info').show();
                $('#shipping_chose').modal("show");
            }else{
                $('.choose_delivery_man').hide();
                $('#by_third_party_delivery_service_info').hide();
            }

        }
    </script>
    <script>
        function addDeliveryMan(id) {
            $.ajax({
                type: "GET",
                url: '<?php echo e(url('/')); ?>/admin/orders/add-delivery-man/<?php echo e($order['id']); ?>/' + id,
                data: {
                    'order_id': '<?php echo e($order['id']); ?>',
                    'delivery_man_id': id
                },
                success: function (data) {
                    if (data.status == true) {
                        toastr.success('Delivery man successfully assigned/changed', {
                            CloseButton: true,
                            ProgressBar: true
                        });
                    } else {
                        toastr.error('Deliveryman man can not assign/change in that status', {
                            CloseButton: true,
                            ProgressBar: true
                        });
                    }
                },
                error: function () {
                    toastr.error('Add valid data', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                }
            });
        }

        function last_location_view() {
            toastr.warning('Only available when order is out for delivery!', {
                CloseButton: true,
                ProgressBar: true
            });
        }

        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })

        function waiting_for_location() {
            toastr.warning('<?php echo e(\App\CPU\translate('waiting_for_location')); ?>', {
                CloseButton: true,
                ProgressBar: true
            });
        }

        function amountDateUpdate(t, e){
            let field_name = $(t).attr('name');
            let field_val = $(t).val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                url: "<?php echo e(route('admin.orders.amount-date-update')); ?>",
                method: 'POST',
                data: {
                    'order_id': '<?php echo e($order['id']); ?>',
                    'field_name': field_name,
                    'field_val': field_val
                },
                success: function (data) {
                    if (data.status == true) {
                        toastr.success('Deliveryman charge add successfully', {
                            CloseButton: true,
                            ProgressBar: true
                        });
                    } else {
                        toastr.error('Failed to add deliveryman charge', {
                            CloseButton: true,
                            ProgressBar: true
                        });
                    }
                },
                error: function () {
                    toastr.error('Add valid data', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                }
            });
        }
    </script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=<?php echo e(\App\CPU\Helpers::get_business_settings('map_api_key')); ?>&v=3.49"></script>
    <script>

        function initializegLocationMap() {
            var map = null;
            var myLatlng = new google.maps.LatLng(<?php echo e($shipping_address->latitude ?? null); ?>, <?php echo e($shipping_address->longitude ?? null); ?>);
            var dmbounds = new google.maps.LatLngBounds(null);
            var locationbounds = new google.maps.LatLngBounds(null);
            var dmMarkers = [];
            dmbounds.extend(myLatlng);
            locationbounds.extend(myLatlng);

            var myOptions = {
                center: myLatlng,
                zoom: 13,
                mapTypeId: google.maps.MapTypeId.ROADMAP,

                panControl: true,
                mapTypeControl: false,
                panControlOptions: {
                    position: google.maps.ControlPosition.RIGHT_CENTER
                },
                zoomControl: true,
                zoomControlOptions: {
                    style: google.maps.ZoomControlStyle.LARGE,
                    position: google.maps.ControlPosition.RIGHT_CENTER
                },
                scaleControl: false,
                streetViewControl: false,
                streetViewControlOptions: {
                    position: google.maps.ControlPosition.RIGHT_CENTER
                }
            };
            map = new google.maps.Map(document.getElementById("location_map_canvas"), myOptions);
            console.log(map);
            var infowindow = new google.maps.InfoWindow();

            <?php if($shipping_address && isset($shipping_address)): ?>
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(<?php echo e($shipping_address->latitude); ?>, <?php echo e($shipping_address->longitude); ?>),
                map: map,
                title: "<?php echo e($order->customer['f_name']??""); ?> <?php echo e($order->customer['l_name']??""); ?>",
                icon: "<?php echo e(asset('front-end/img/customer_location.png')); ?>"
            });

            google.maps.event.addListener(marker, 'click', (function (marker) {
                return function () {
                    infowindow.setContent("<div class='float-left'><img class='__inline-5' src='<?php echo e(asset('storage/profile/')); ?><?php echo e($order->customer->image??""); ?>'></div><div class='float-right __p-10'><b><?php echo e($order->customer->f_name??""); ?> <?php echo e($order->customer->l_name??""); ?></b><br/><?php echo e($shipping_address->address??""); ?></div>");
                    infowindow.open(map, marker);
                }
            })(marker));
            locationbounds.extend(marker.getPosition());
            <?php endif; ?>

            google.maps.event.addListenerOnce(map, 'idle', function () {
                map.fitBounds(locationbounds);
            });
        }

        // Re-init map before show modal
        $('#locationModal').on('shown.bs.modal', function (event) {
            initializegLocationMap();
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tikka\resources\views/admin/order/order-details.blade.php ENDPATH**/ ?>