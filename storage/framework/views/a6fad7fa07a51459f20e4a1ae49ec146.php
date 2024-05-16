<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo e(\App\CPU\translate('invoice')); ?></title>
    <meta http-equiv="Content-Type" content="text/html;"/>
    <meta charset="UTF-8">
    <style media="all">
        * {
            margin: 0;
            padding: 0;
            line-height: 1.3;
            font-family: sans-serif;
            color: #333542;
        }


        /* IE 6 */
        * html .footer {
            position: absolute;
            top: expression((0-(footer.offsetHeight)+(document.documentElement.clientHeight ? document.documentElement.clientHeight : document.body.clientHeight)+(ignoreMe = document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop))+'px');
        }

        body {
            font-size: .75rem;
        }

        img {
            max-width: 100%;
        }

        .customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        table {
            width: 100%;
        }

        table thead th {
            padding: 8px;
            font-size: 11px;
            text-align: left;
        }
        span{
            margin-right: 2px;
            color: #F7A41C;
        }
        table tbody th,
        table tbody td {
            padding: 8px;
            font-size: 11px;
        }

        table.fz-12 thead th {
            font-size: 12px;
        }

        table.fz-12 tbody th,
        table.fz-12 tbody td {
            font-size: 12px;
        }
        .container{
            display: flex;
            margin: 4px;
            flex-direction: row;
        }
        table.customers thead th {
            background-color: #F7A41C;
            color: #fff;
        }

        table.customers tbody th,
        table.customers tbody td {
            background-color: #FAFCFF;
        }

        table.calc-table th {
            text-align: left;
        }

        table.calc-table td {
            text-align: right;
        }
        table.calc-table td.text-left {
            text-align: left;
        }

        .table-total {
            font-family: Arial, Helvetica, sans-serif;
        }


        .text-left {
            text-align: left !important;
        }

        .pb-2 {
            padding-bottom: 8px !important;
        }

        .pb-3 {
            padding-bottom: 16px !important;
        }

        .text-right {
            text-align: right;
        }

        table th.text-right {
            text-align: right !important;
        }

        .content-position {
            padding: 15px 40px;
        }

        .content-position-y {
            padding: 0px 40px;
        }

        .text-white {
            color: white !important;
        }

        .bs-0 {
            border-spacing: 0;
        }
        .text-center {
            text-align: center;
        }
        .mb-1 {
            margin-bottom: 4px !important;
        }
        .mb-2 {
            margin-bottom: 8px !important;
        }
        .mb-4 {
            margin-bottom: 24px !important;
        }
        .mb-30 {
            margin-bottom: 30px !important;
        }
        .px-10 {
            padding-left: 10px;
            padding-right: 10px;
        }
        .fz-14 {
            font-size: 14px;
        }
        .fz-12 {
            font-size: 12px;
        }
        .fz-10 {
            font-size: 10px;
        }
        .font-normal {
            font-weight: 400;
        }
        .border-dashed-top {
            border-top: 1px dashed #ddd;
        }
        .font-weight-bold {
            font-weight: 700;
        }
        .bg-light {
            background-color: #F7F7F7;
        }
        .py-30 {
            padding-top: 30px;
            padding-bottom: 30px;
        }
        .py-4 {
            padding-top: 24px;
            padding-bottom: 24px;
        }
        .d-flex {
            display: flex;
        }
        .gap-2 {
            gap: 8px;
        }
        .flex-wrap {
            flex-wrap: wrap;
        }
        .align-items-center {
            align-items: center;
        }
        .justify-content-center {
            justify-content: center;
        }
        a {
            color: rgba(0, 128, 245, 1);
        }
        .p-1 {
            padding: 4px !important;
        }
        .h2 {
            font-size: 1.5em;
            margin-block-start: 0.83em;
            margin-block-end: 0.83em;
            margin-inline-start: 0px;
            margin-inline-end: 0px;
            font-weight: bold;
        }

        .h4 {
            margin-block-start: 1.33em;
            margin-block-end: 1.33em;
            margin-inline-start: 0px;
            margin-inline-end: 0px;
            font-weight: bold;
        }

    </style>
</head>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<body>
<div class="first">
    <table class="content-position mb-30">
        <tr>
            <th class="p-0 text-left" style="font-size: 26px">
                <?php echo e(\App\CPU\translate('Order_Invoice')); ?>

            </th>
            <th>
                <img height="40" src="<?php echo e(asset("storage/app/public/company/$company_web_logo")); ?>" alt="">
            </th>
        </tr>
    </table>

    <table class="bs-0 mb-30 px-10">
        <tr>
            <th class="content-position-y text-left">
                <h4 class="text-uppercase mb-1 fz-14">
                    <?php echo e(\App\CPU\translate('invoice')); ?> #<?php echo e($order->id); ?>

                </h4><br>
                <h4 class="text-uppercase mb-1 fz-14">
                    <?php echo e(\App\CPU\translate('Shop_Name')); ?>

                    : <?php echo e($order->seller_is == 'admin' ? $company_name : (isset($order->seller->shop) ? $order->seller->shop->name : \App\CPU\translate('not_found'))); ?>

                </h4>
                <?php if($order['seller_is']!='admin' && isset($order['seller']) && $order['seller']->gst != null): ?>
                    <h4 class="text-capitalize fz-12"><?php echo e(\App\CPU\translate('GST')); ?>

                        : <?php echo e($order['seller']->gst); ?></h4>
                <?php endif; ?>
            </th>
            <th class="content-position-y text-right">
                <h4 class="fz-14"><?php echo e(\App\CPU\translate('date')); ?> : <?php echo e(date('d-m-Y h:i:s a',strtotime($order['created_at']))); ?></h4>
            </th>
        </tr>
    </table>
</div>
<div class="">
    <section>
        <table class="content-position-y fz-12">
            <tr>
                <td class="font-weight-bold p-1">
                    <table>
                        <tr>
                            <td>

                                <?php if($order->shippingAddress): ?>
                                    <span class="h2" style="margin: 0px;"><?php echo e(\App\CPU\translate('shipping_to')); ?> </span>
                                    <div class="h4 montserrat-normal-600">
                                        <div class="container">
                                            <span><?php echo e(\App\CPU\translate('Name')); ?>:</span>
                                            <p><?php echo e($order->customer !=null? $order->customer['f_name'].' '.$order->customer['l_name']:\App\CPU\translate('name_not_found')); ?></p>
                                        </div>
                                        <div class="container">
                                            <span><?php echo e(\App\CPU\translate('Email')); ?>:</span>
                                            <p><?php echo e($order->customer !=null? $order->customer['email']:\App\CPU\translate('email_not_found')); ?></p>
                                        </div>
                                        <div class="container">
                                            <span><?php echo e(\App\CPU\translate('Phone')); ?>:</span>

                                            <p><?php echo e($order->customer !=null? $order->customer['phone']:\App\CPU\translate('phone_not_found')); ?></p>
                                        </div>
                                        <div class="container">
                                            <span><?php echo e(\App\CPU\translate('Address')); ?>:</span>

                                            <p><?php echo e($order->shippingAddress ? $order->shippingAddress['address'] : ""); ?></p>
                                        </div>
                                        <div class="container">
                                            <span><?php echo e(\App\CPU\translate('City')); ?>:</span>

                                            <p><?php echo e($order->shippingAddress ? $order->shippingAddress['city'] : ""); ?> <?php echo e($order->shippingAddress ? $order->shippingAddress['zip'] : ""); ?></p>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <span class="h2" style="margin: 0px;"><?php echo e(\App\CPU\translate('customer_info')); ?> </span>
                                    <div class="h4 montserrat-normal-600">
                                        <p style=" margin-top: 6px; margin-bottom:0px;"><?php echo e($order->customer !=null? $order->customer['f_name'].' '.$order->customer['l_name']:\App\CPU\translate('name_not_found')); ?></p>
                                        <?php if(isset($order->customer) && $order->customer['id']!=0): ?>
                                            <p style=" margin-top: 6px; margin-bottom:0px;"><?php echo e($order->customer !=null? $order->customer['email']:\App\CPU\translate('email_not_found')); ?></p>
                                            <p style=" margin-top: 6px; margin-bottom:0px;"><?php echo e($order->customer !=null? $order->customer['phone']:\App\CPU\translate('phone_not_found')); ?></p>
                                        <?php endif; ?>
                                    </div>
                                    <?php endif; ?>
                                    </p>
                            </td>
                        </tr>
                    </table>
                </td>

                <td>
                    <table>
                        <tr>
                            <td>
                                <?php if($order->billingAddress): ?>
                                    <span class="h2" ><?php echo e(\App\CPU\translate('billing_address')); ?> </span>
                                    <div class="h4 montserrat-normal-600">
                                        <div class="container">
                                            <span><?php echo e(\App\CPU\translate('contact_person_name')); ?>:</span>
                                            <p><?php echo e($order->billingAddress ? $order->billingAddress['contact_person_name'] : ""); ?></p>
                                        </div>
                                        <div class="container">
                                            <span><?php echo e(\App\CPU\translate('phone')); ?>:</span>
                                            <p><?php echo e($order->billingAddress ? $order->billingAddress['phone'] : ""); ?></p>
                                        </div>
                                        <div class="container">
                                            <span><?php echo e(\App\CPU\translate('address')); ?>:</span>
                                            <p><?php echo e($order->billingAddress ? $order->billingAddress['address'] : ""); ?></p>
                                        </div>

                                        <div class="container">
                                            <span><?php echo e(\App\CPU\translate('city')); ?>:</span>
                                            <p><?php echo e($order->billingAddress ? $order->billingAddress['city'] : ""); ?> <?php echo e($order->billingAddress ? $order->billingAddress['zip'] : ""); ?></p>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>


    </section>
</div>

<br>

<div class="">
    <div class="content-position-y">
        <table class="customers bs-0">
            <thead>
            <tr>
                <th><?php echo e(\App\CPU\translate('SL')); ?></th>
                <th><?php echo e(\App\CPU\translate('item_description')); ?></th>
                <th>
                    <?php echo e(\App\CPU\translate('unit_price')); ?>

                </th>
                <th>
                    <?php echo e(\App\CPU\translate('qty')); ?>

                </th>
                <th class="text-right">
                    <?php echo e(\App\CPU\translate('total')); ?>

                </th>
            </tr>
            </thead>
            <?php
                $subtotal=0;
                $total=0;
                $sub_total=0;
                $total_tax=0;
                $total_shipping_cost=0;
                $total_discount_on_product=0;
                $ext_discount=0;
            ?>
            <tbody>
            <?php $__currentLoopData = $order->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $subtotal=($details['price'])*$details->qty ?>
                <tr>
                    <td><?php echo e($key+1); ?></td>
                    <td>
                        <?php echo e($details['product']?$details['product']->name:''); ?>

                        <?php if($details['variant']): ?>
                            <br>
                            <?php echo e(\App\CPU\translate('variation')); ?> : <?php echo e($details['variant']); ?>

                        <?php endif; ?>
                    </td>
                    <td><?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($details['price']))); ?></td>
                    <td><?php echo e($details->qty); ?></td>
                    <td class="text-right"><?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($subtotal))); ?></td>
                </tr>

                <?php
                    $sub_total+=$details['price']*$details['qty'];
                    $total_tax+=$details['tax'];
                    $total_shipping_cost+=$details->shipping ? $details->shipping->cost :0;
                    $total_discount_on_product+=$details['discount'];
                    $total+=$subtotal;
                ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>
    <?php
    if ($order['extra_discount_type'] == 'percent') {
        $ext_discount = ($sub_total / 100) * $order['extra_discount'];
    } else {
        $ext_discount = $order['extra_discount'];
    }
    ?>
<?php ($shipping=$order['shipping_cost']); ?>
    <div class="content-position-y">
        <table class="fz-12">
            <tr>
                <th class="text-left">
                    <h4 class="fz-12 mb-1"><?php echo e(\App\CPU\translate('payment_details')); ?></h4>
                    <p class="fz-12 font-normal">
                        <?php echo e($order->payment_status); ?>

                        , <?php echo e(date('y-m-d',strtotime($order['created_at']))); ?>

                    </p>

                    <?php if($order->delivery_type !=null): ?>
                        <h4 class="fz-12 mb-1"><?php echo e(\App\CPU\translate('delivery_info')); ?> </h4>
                        <?php if($order->delivery_type == 'self_delivery'): ?>
                            <p class="fz-12 font-normal">
                            <span>
                                <?php echo e(\App\CPU\translate('self_delivery')); ?>

                            </span>
                                <br>
                                <span>
                                <?php echo e(\App\CPU\translate('delivery_man_name')); ?> : <?php echo e($order->delivery_man['f_name'].' '.$order->delivery_man['l_name']); ?>

                            </span>
                                <br>
                                <span>
                                <?php echo e(\App\CPU\translate('delivery_man_phone')); ?> : <?php echo e($order->delivery_man['phone']); ?>

                            </span>
                            </p>
                        <?php else: ?>
                            <p>
                        <span>
                            <?php echo e($order->delivery_service_name); ?>

                        </span>
                                <br>
                                <span>
                            <?php echo e(\App\CPU\translate('tracking_id')); ?> : <?php echo e($order->third_party_delivery_tracking_id); ?>

                        </span>
                            </p>
                        <?php endif; ?>
                    <?php endif; ?>

                </th>

                <th>
                    <table class="calc-table">
                        <tbody>
                        <tr>
                            <td class="p-1 text-left"><?php echo e(\App\CPU\translate('sub_total')); ?></td>
                            <td class="p-1"><?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($sub_total))); ?></td>
                        </tr>
                        <tr>
                            <td class="p-1 text-left"><?php echo e(\App\CPU\translate('tax')); ?></td>
                            <td class="p-1"><?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($total_tax))); ?></td>
                        </tr>
                        <?php if($order->order_type=='default_type'): ?>
                            <tr>
                                <td class="p-1 text-left"><?php echo e(\App\CPU\translate('shipping')); ?></td>
                                <td class="p-1"><?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($shipping))); ?></td>
                            </tr>
                        <?php endif; ?>
                        <tr>
                            <td class="p-1 text-left"><?php echo e(\App\CPU\translate('coupon_discount')); ?></td>
                            <td class="p-1">
                                - <?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($order->discount_amount))); ?> </td>
                        </tr>
                        <?php if($order->order_type=='POS'): ?>
                            <tr>
                                <td class="p-1 text-left"><?php echo e(\App\CPU\translate('extra_discount')); ?></td>
                                <td class="p-1">
                                    - <?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($ext_discount))); ?> </td>
                            </tr>
                        <?php endif; ?>
                        <tr>
                            <td class="p-1 text-left"><?php echo e(\App\CPU\translate('discount_on_product')); ?></td>
                            <td class="p-1">
                                - <?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($total_discount_on_product))); ?> </td>
                        </tr>
                        <tr>
                            <td class="border-dashed-top font-weight-bold text-left"><b><?php echo e(\App\CPU\translate('total')); ?></b></td>
                            <td class="border-dashed-top font-weight-bold">
                                <?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($order->order_amount))); ?>

                            </td>
                        </tr>
                        </tbody>
                    </table>
                </th>
            </tr>
        </table>
    </div>
    <br>
    <br><br><br>

    <div class="row">
        <section>
            <table class="">
                <tr>
                    <th class="fz-12 font-normal pb-3">
                        <?php echo e(\App\CPU\translate('If_you_require_any_assistance_or_have_feedback_or_suggestions_about_our_site,_you')); ?> <br /> <?php echo e(\App\CPU\translate('can_email_us_at')); ?> <a href="mail::to(<?php echo e($company_email); ?>)"><?php echo e($company_email); ?></a>
                    </th>
                </tr>
                <tr>
                    <th class="content-position-y bg-light py-4">
                        <div class="d-flex justify-content-center gap-2">
                            <div class="mb-2">
                                <i class="fa fa-phone"></i>
                                <?php echo e(\App\CPU\translate('phone')); ?>

                                : <?php echo e($company_phone); ?>

                            </div>
                            <div class="mb-2">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                <?php echo e(\App\CPU\translate('email')); ?>

                                : <?php echo e($company_email); ?>

                            </div>
                        </div>
                        <div class="mb-2">
                            <?php echo e(url('/')); ?>

                        </div>
                        <div>
                            <?php echo e(\App\CPU\translate('All_copy_right_reserved_©_'.date('Y').'_').$company_name); ?>

                        </div>
                    </th>
                </tr>
            </table>
        </section>
    </div>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\tikka\resources\views/admin/order/invoice.blade.php ENDPATH**/ ?>