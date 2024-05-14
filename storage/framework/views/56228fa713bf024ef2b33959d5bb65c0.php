<?php
    $shippingMethod = \App\CPU\Helpers::get_business_settings('shipping_method');
    $cart = \App\Models\Cart::where(['customer_id' => auth('customer')->id()])->get()->groupBy('cart_group_id');
?>
<div class="container">
    <h4 class="text-center mb-3"><?php echo e(translate('Cart_List')); ?></h4>
    <form action="#">
        <div class="row gy-3">
            <div class="col-lg-8">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-center mb-30">
                            <ul class="cart-step-list">
                                <li class="current"><span><i class="bi bi-check2"></i></span> <?php echo e(translate('cart')); ?></li>
                                <li><span><i class="bi bi-check2"></i></span> <?php echo e(translate('Shopping_Details')); ?></li>
                                <li><span><i class="bi bi-check2"></i></span> <?php echo e(translate('payment')); ?></li>
                            </ul>
                        </div>
                        <?php if(count($cart)==0): ?>
                            <?php $physical_product = false; ?>
                        <?php endif; ?>

                        <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group_key=>$group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $physical_product = false;
                                foreach ($group as $row) {
                                    if ($row->product_type == 'physical') {
                                        $physical_product = true;
                                    }
                                }
                            ?>

                            <?php $__currentLoopData = $group; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart_key=>$cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($shippingMethod=='inhouse_shipping'): ?>
                                        <?php

                                        $admin_shipping = \App\Models\ShippingType::where('seller_id', 0)->first();
                                        $shipping_type = isset($admin_shipping) == true ? $admin_shipping->shipping_type : 'order_wise';

                                        ?>
                                <?php else: ?>
                                        <?php
                                        if ($cartItem->seller_is == 'admin') {
                                            $admin_shipping = \App\Models\ShippingType::where('seller_id', 0)->first();
                                            $shipping_type = isset($admin_shipping) == true ? $admin_shipping->shipping_type : 'order_wise';
                                        } else {
                                            $seller_shipping = \App\Models\ShippingType::where('seller_id', $cartItem->seller_id)->first();
                                            $shipping_type = isset($seller_shipping) == true ? $seller_shipping->shipping_type : 'order_wise';
                                        }
                                        ?>
                                <?php endif; ?>

                                <?php if($cart_key==0): ?>
                                    <div class="bg-primary-light py-2 px-2 px-sm-3 mb-3 mb-sm-4">
                                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                                            <?php if($cartItem->seller_is=='admin'): ?>
                                                <a href="<?php echo e(route('shopView',['id'=>0])); ?>">
                                                    <h5 class=""><?php echo e(\App\CPU\Helpers::get_business_settings('company_name')); ?></h5>
                                                </a>
                                            <?php else: ?>
                                                <a href="<?php echo e(route('shopView',['id'=>$cartItem->seller_id])); ?>">
                                                    <h5 class=""><?php echo e(\App\CPU\get_shop_name($cartItem['seller_id'])); ?></h5>
                                                </a>
                                            <?php endif; ?>

                                            <?php if($physical_product && $shippingMethod=='sellerwise_shipping' && $shipping_type == 'order_wise'): ?>
                                                <?php
                                                    $choosen_shipping=\App\Models\CartShipping::where(['cart_group_id'=>$cartItem['cart_group_id']])->first()
                                                ?>

                                                <?php if(isset($choosen_shipping)==false): ?>
                                                    <?php $choosen_shipping['shipping_method_id']=0 ?>
                                                <?php endif; ?>

                                                <?php
                                                    $shippings=\App\CPU\Helpers::get_shipping_methods($cartItem['seller_id'],$cartItem['seller_is'])
                                                ?>

                                                <?php if($physical_product && $shippingMethod=='sellerwise_shipping' && $shipping_type == 'order_wise'): ?>
                                                <div class="border bg-white rounded custom-ps-3">
                                                    <div class="shiiping-method-btn d-flex gap-2">
                                                        <div class="flex-middle flex-nowrap fw-semibold text-dark gap-2">
                                                            <i class="bi bi-truck"></i>
                                                            <?php echo e(translate('Shipping_Method')); ?>:
                                                        </div>
                                                        <div class="dropdown">
                                                            <select class="button border-0 form-control text-dark p-0"
                                                                    onchange="set_shipping_id(this.value,'<?php echo e($cartItem['cart_group_id']); ?>')">
                                                                <option><?php echo e(translate('choose_shipping_method')); ?></option>
                                                                <?php $__currentLoopData = $shippings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shipping): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($shipping['id']); ?>" <?php echo e($choosen_shipping['shipping_method_id']==$shipping['id']?'selected':''); ?>>
                                                                        <?php echo e($shipping['title'].' ( '.$shipping['duration'].' ) '.\App\CPU\Helpers::currency_converter($shipping['cost'])); ?>

                                                                    </option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <div class="table-responsive d-none d-sm-block">
                                <?php
                                    $physical_product = false;
                                    foreach ($group as $row) {
                                        if ($row->product_type == 'physical') {
                                            $physical_product = true;
                                        }
                                    }
                                ?>
                                <table class="table align-middle">
                                    <thead class="table-light">
                                    <tr>
                                        <th class="border-0"><?php echo e(translate('product_details')); ?></th>
                                        <th class="border-0 text-center"><?php echo e(translate('qty')); ?></th>
                                        <th class="border-0 text-end"><?php echo e(translate('unit_price')); ?></th>
                                        <th class="border-0 text-end"><?php echo e(translate('discount')); ?></th>
                                        <th class="border-0 text-end"><?php echo e(translate('total')); ?></th>
                                        <?php if( $shipping_type != 'order_wise'): ?>
                                        <th class="border-0 text-end"><?php echo e(translate('shipping_cost')); ?> </th>
                                        <?php endif; ?>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $group; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart_key=>$cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <div class="media align-items-center gap-3">
                                                    <div class="avatar avatar-xxl rounded border">
                                                        <img onerror="this.src='<?php echo e(theme_asset('assets/img/image-place-holder.png')); ?>'"
                                                             src="<?php echo e(\App\CPU\ProductManager::product_image_path('thumbnail')); ?>/<?php echo e($cartItem['thumbnail']); ?>"
                                                             class="dark-support img-fit rounded img-fluid overflow-hidden" alt="">
                                                    </div>
                                                    <div class="media-body d-flex gap-1 flex-column">
                                                        <h6 class="text-truncate text-capitalize" style="--width: 20ch">
                                                            <a href="<?php echo e(route('product',$cartItem['slug'])); ?>"><?php echo e($cartItem['name']); ?></a>
                                                        </h6>
                                                        <?php $__currentLoopData = json_decode($cartItem['variations'],true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key1 =>$variation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="fs-12"><?php echo e($key1); ?> : <?php echo e($variation); ?></div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="fs-12"><?php echo e(translate('Unit_Price')); ?> : <?php echo e(\App\CPU\Helpers::currency_converter($cartItem['price'])); ?></div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <?php ($minimum_order=\App\CPU\ProductManager::get_product($cartItem['product_id'])); ?>
                                                <div class="quantity quantity--style-two d-inline-flex">
                                                    <span class="quantity__minus " onclick="updateCartQuantityList('<?php echo e($minimum_order->minimum_order_qty); ?>', '<?php echo e($cartItem['id']); ?>', '-1', '<?php echo e($cartItem['quantity'] == $minimum_order->minimum_order_qty ? 'delete':'minus'); ?>')">
                                                        <i class="<?php echo e($cartItem['quantity'] == (isset($cartItem->product->minimum_order_qty) ? $cartItem->product->minimum_order_qty : 1) ? 'bi bi-trash3-fill text-danger fs-10' : 'bi bi-dash'); ?>"></i>
                                                    </span>
                                                    <input type="text" class="quantity__qty" value="<?php echo e($cartItem['quantity']); ?>" name="quantity[<?php echo e($cartItem['id']); ?>]" id="cartQuantity<?php echo e($cartItem['id']); ?>"
                                                           onchange="updateCartQuantityList('<?php echo e($minimum_order->minimum_order_qty); ?>', '<?php echo e($cartItem['id']); ?>', '0')" data-min="<?php echo e(isset($cartItem->product->minimum_order_qty) ? $cartItem->product->minimum_order_qty : 1); ?>">
                                                    <span class="quantity__plus" onclick="updateCartQuantityList('<?php echo e($minimum_order->minimum_order_qty); ?>', '<?php echo e($cartItem['id']); ?>', '1')">
                                                        <i class="bi bi-plus"></i>
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="text-end"><?php echo e(\App\CPU\Helpers::currency_converter($cartItem['price']*$cartItem['quantity'])); ?></td>
                                            <td class="text-end"><?php echo e(\App\CPU\Helpers::currency_converter($cartItem['discount']*$cartItem['quantity'])); ?></td>
                                            <td class="text-end"><?php echo e(\App\CPU\Helpers::currency_converter(($cartItem['price']-$cartItem['discount'])*$cartItem['quantity'])); ?></td>
                                            <td>
                                                <?php if( $shipping_type != 'order_wise'): ?>
                                                    <?php echo e(\App\CPU\Helpers::currency_converter($cartItem['shipping_cost'])); ?>

                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Static Markup -->
                            <div class="d-flex flex-column d-sm-none">
                                <?php $__currentLoopData = $group; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart_key=>$cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="border-bottom d-flex align-items-start justify-content-between gap-2 py-2">
                                    <div class="media gap-2">
                                        <div class="avatar avatar-lg rounded border">
                                            <img onerror="this.src='<?php echo e(theme_asset('assets/img/image-place-holder.png')); ?>'"
                                                    src="<?php echo e(\App\CPU\ProductManager::product_image_path('thumbnail')); ?>/<?php echo e($cartItem['thumbnail']); ?>"
                                                    class="dark-support img-fit rounded img-fluid overflow-hidden" alt="">
                                        </div>
                                        <div class="media-body d-flex gap-1 flex-column">
                                            <h6 class="text-truncate text-capitalize" style="--width: 20ch">
                                                <a href="<?php echo e(route('product',$cartItem['slug'])); ?>"><?php echo e($cartItem['name']); ?></a>
                                            </h6>
                                            <?php $__currentLoopData = json_decode($cartItem['variations'],true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key1 =>$variation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="fs-12"><?php echo e($key1); ?> : <?php echo e($variation); ?></div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <div class="fs-12"><?php echo e(translate('Unit_Price')); ?> : <?php echo e(\App\CPU\Helpers::currency_converter($cartItem['price']*$cartItem['quantity'])); ?></div>
                                            <div class="fs-12"><?php echo e(translate('discount')); ?> : <?php echo e(\App\CPU\Helpers::currency_converter($cartItem['discount']*$cartItem['quantity'])); ?></div>
                                            <div class="fs-12"><?php echo e(translate('total')); ?> : <?php echo e(\App\CPU\Helpers::currency_converter(($cartItem['price']-$cartItem['discount'])*$cartItem['quantity'])); ?></div>
                                            <?php if( $shipping_type != 'order_wise'): ?>
                                            <div class="fs-12"><?php echo e(translate('shipping_cost')); ?> : <?php echo e(\App\CPU\Helpers::currency_converter($cartItem['shipping_cost'])); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <?php ($minimum_order=\App\CPU\ProductManager::get_product($cartItem['product_id'])); ?>
                                    <div class="quantity quantity--style-two flex-column d-inline-flex">
                                        <span class="quantity__minus " onclick="updateCartQuantityList('<?php echo e($minimum_order->minimum_order_qty); ?>', '<?php echo e($cartItem['id']); ?>', '-1', '<?php echo e($cartItem['quantity'] == $minimum_order->minimum_order_qty ? 'delete':'minus'); ?>')">
                                            <i class="<?php echo e($cartItem['quantity'] == (isset($cartItem->product->minimum_order_qty) ? $cartItem->product->minimum_order_qty : 1) ? 'bi bi-trash3-fill text-danger fs-10' : 'bi bi-dash'); ?>"></i>
                                        </span>
                                        <input type="text" class="quantity__qty" value="<?php echo e($cartItem['quantity']); ?>" name="quantity[<?php echo e($cartItem['id']); ?>]" id="cartQuantity<?php echo e($cartItem['id']); ?>"
                                                onchange="updateCartQuantityList('<?php echo e($minimum_order->minimum_order_qty); ?>', '<?php echo e($cartItem['id']); ?>', '0')" data-min="<?php echo e(isset($cartItem->product->minimum_order_qty) ? $cartItem->product->minimum_order_qty : 1); ?>">
                                        <span class="quantity__plus" onclick="updateCartQuantityList('<?php echo e($minimum_order->minimum_order_qty); ?>', '<?php echo e($cartItem['id']); ?>', '1')">
                                            <i class="bi bi-plus"></i>
                                        </span>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php if($shippingMethod=='inhouse_shipping'): ?>
                                <?php
                                $admin_shipping = \App\Models\ShippingType::where('seller_id', 0)->first();
                                $shipping_type = isset($admin_shipping) == true ? $admin_shipping->shipping_type : 'order_wise';
                                ?>
                            <?php if($shipping_type == 'order_wise' && $physical_product): ?>
                                <?php ($shippings=\App\CPU\Helpers::get_shipping_methods(1,'admin')); ?>
                                <?php ($choosen_shipping=\App\Models\CartShipping::where(['cart_group_id'=>$cartItem['cart_group_id']])->first()); ?>

                                <?php if(isset($choosen_shipping)==false): ?>
                                    <?php ($choosen_shipping['shipping_method_id']=0); ?>
                                <?php endif; ?>
                                <div class="row">
                                    <div class="col-12">
                                        <select class="form-control text-dark" onchange="set_shipping_id(this.value,'all_cart_group')">
                                            <option><?php echo e(\App\CPU\translate('choose_shipping_method')); ?></option>
                                            <?php $__currentLoopData = $shippings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shipping): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option
                                                    value="<?php echo e($shipping['id']); ?>" <?php echo e($choosen_shipping['shipping_method_id']==$shipping['id']?'selected':''); ?>>
                                                    <?php echo e($shipping['title'].' ( '.$shipping['duration'].' ) '.\App\CPU\Helpers::currency_converter($shipping['cost'])); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>

                        <?php if( $cart->count() == 0): ?>
                            <div class="d-flex justify-content-center align-items-center">
                                <h4 class="text-danger text-capitalize"><?php echo e(translate('cart_empty')); ?></h4>
                            </div>
                        <?php endif; ?>

                        <form  method="get">
                            <div class="form-group mt-3">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="phoneLabel" class="form-label input-label"><?php echo e(translate('order_note')); ?> <span
                                                class="input-label-secondary">(<?php echo e(translate('Optional')); ?>)</span></label>
                                        <textarea class="form-control w-100" rows="5" id="order_note" name="order_note"><?php echo e(session('order_note')); ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Order summery Content -->
            <?php echo $__env->make('theme-views.partials._order-summery', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </form>
</div>

<?php $__env->startPush('script'); ?>
<script>
    cartQuantityInitialize();

    function set_shipping_id(id, cart_group_id) {
        $.get({
            url: '<?php echo e(url('/')); ?>/customer/set-shipping-method',
            dataType: 'json',
            data: {
                id: id,
                cart_group_id: cart_group_id
            },
            beforeSend: function () {
                $('#loading').addClass('d-grid');
            },
            success: function (data) {
                location.reload();
            },
            complete: function () {
                $('#loading').removeClass('d-grid');
            },
        });
    }

    function updateCartQuantityList(minimum_order_qty, key, incr, e) {
        let quantity = parseInt($("#cartQuantity" + key).val())+parseInt(incr);
        let ex_quantity = $("#cartQuantity" + key);
        if(minimum_order_qty > quantity && e != 'delete' ) {
            toastr.error('<?php echo e(translate("minimum_order_quantity_cannot_be_less_than_")); ?>' + minimum_order_qty);
            $("#cartQuantity" + key).val(minimum_order_qty);
            return false;
        }

        if (ex_quantity.val() == ex_quantity.data('min') && e == 'delete') {
            $.post("<?php echo e(route('cart.remove')); ?>", {
                _token: '<?php echo e(csrf_token()); ?>',
                key: key
            },
            function (response) {
                updateNavCart();
                toastr.info("<?php echo e(translate('Item has been removed from cart ')); ?>", {
                    CloseButton: true,
                    ProgressBar: true
                });
                let segment_array = window.location.pathname.split('/');
                let segment = segment_array[segment_array.length - 1];
                if (segment === 'checkout-payment' || segment === 'checkout-details') {
                    location.reload();
                }
                $('#cart-summary').empty().html(response.data);
            });
        }else{
            $.post('<?php echo e(route('cart.updateQuantity')); ?>', {
                _token: '<?php echo e(csrf_token()); ?>',
                key,
                quantity
            }, function (response) {
                if (response.status == 0) {
                    toastr.error(response.message, {
                        CloseButton: true,
                        ProgressBar: true
                    });
                    $("#cartQuantity" + key).val(response['qty']);
                } else {
                    if (response['qty'] == ex_quantity.data('min')) {
                        ex_quantity.parent().find('.quantity__minus').html('<i class="bi bi-trash3-fill text-danger fs-10"></i>')
                    } else {
                        ex_quantity.parent().find('.quantity__minus').html('<i class="bi bi-dash"></i>')
                    }
                    updateNavCart();
                    $('#cart-summary').empty().html(response);
                }
            });
        }
    }

    function checkout() {
        let order_note = $('#order_note').val();
        //console.log(order_note);
        $.post({
            url: "<?php echo e(route('order_note')); ?>",
            data: {
                _token: '<?php echo e(csrf_token()); ?>',
                order_note: order_note,

            },
            beforeSend: function () {
                $('#loading').addClass('d-grid');
            },
            success: function (data) {
                let url = "<?php echo e(route('checkout-details')); ?>";
                location.href = url;

            },
            complete: function () {
                $('#loading').removeClass('d-grid');
            },
        });
    }
</script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\xampp\htdocs\tikka\resources\themes\theme_aster/theme-views/layouts/partials/cart_details.blade.php ENDPATH**/ ?>