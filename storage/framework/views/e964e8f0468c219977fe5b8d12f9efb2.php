<div class="col-lg-4">
    <div class="card text-dark h-100">
        <div class="card-body px-sm-4 d-flex flex-column gap-2">
            <?php ($current_url=request()->segment(count(request()->segments()))); ?>
            <?php ($shippingMethod=\App\CPU\Helpers::get_business_settings('shipping_method')); ?>
            <?php ($product_price_total=0); ?>
            <?php ($total_tax=0); ?>
            <?php ($total_shipping_cost=0); ?>
            <?php ($order_wise_shipping_discount=\App\CPU\CartManager::order_wise_shipping_discount()); ?>
            <?php ($total_discount_on_product=0); ?>
            <?php ($cart=\App\CPU\CartManager::get_cart()); ?>
            <?php ($cart_group_ids=\App\CPU\CartManager::get_cart_group_ids()); ?>
            <?php ($shipping_cost=\App\CPU\CartManager::get_shipping_cost()); ?>
            <?php if($cart->count() > 0): ?>
                <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php ($product_price_total+=$cartItem['price']*$cartItem['quantity']); ?>
                    <?php ($total_tax+=$cartItem['tax_model']=='exclude' ? ($cartItem['tax']*$cartItem['quantity']):0); ?>
                    <?php ($total_discount_on_product+=$cartItem['discount']*$cartItem['quantity']); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php ($total_shipping_cost=$shipping_cost); ?>
            <?php else: ?>
                <span><?php echo e(translate('empty_cart')); ?></span>
            <?php endif; ?>

            <div class="d-flex mb-3">
                <h5><?php echo e(translate('Order_Summary')); ?></h5>
            </div>
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">
                <div><?php echo e(translate('Item_Price')); ?></div>
                <div><?php echo e(\App\CPU\Helpers::currency_converter($product_price_total)); ?></div>
            </div>
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">
                <div><?php echo e(translate('Product_Discount')); ?></div>
                <div><?php echo e(\App\CPU\Helpers::currency_converter($total_discount_on_product)); ?></div>
            </div>

            <?php if(!session()->has('coupon_discount')): ?>
                <?php ($coupon_discount = 0); ?>
                <form class="needs-validation" action="javascript:" method="post" novalidate id="coupon-code-ajax">
                    <div class="form-group my-3">
                        <label for="promo-code" class="fw-semibold"><?php echo e(translate('Promo_Code')); ?></label>
                        <div class="form-control focus-border pe-1 rounded d-flex align-items-center">
                            <input type="text" name="code" id="promo-code" class="w-100 text-dark bg-transparent border-0 focus-input" placeholder="<?php echo e(translate('write_coupon_code_here')); ?>" required>
                            <button class="btn btn-primary" onclick="couponCode()"><?php echo e(translate('apply')); ?></button>
                        </div>
                    </div>
                    <span id="coupon-apply" data-url="<?php echo e(route('coupon.apply')); ?>"></span>
                </form>
                <?php ($coupon_dis=0); ?>
            <?php endif; ?>

            <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">
                <div><?php echo e(translate('Sub_total')); ?></div>
                <div><?php echo e(\App\CPU\Helpers::currency_converter($product_price_total - $total_discount_on_product)); ?></div>
            </div>
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">
                <div><?php echo e(translate('tax')); ?></div>
                <div><?php echo e(\App\CPU\Helpers::currency_converter($total_tax)); ?></div>
            </div>
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">
                <div><?php echo e(translate('shipping')); ?></div>
                <div class="text-primary"><?php echo e(\App\CPU\Helpers::currency_converter($total_shipping_cost)); ?></div>
            </div>

            <?php if(session()->has('coupon_discount')): ?>
                <?php ($coupon_discount = session()->has('coupon_discount')?session('coupon_discount'):0); ?>
                <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">
                    <div><?php echo e(translate('coupon_discount')); ?></div>
                    <div class="text-primary">- <?php echo e(\App\CPU\Helpers::currency_converter($coupon_discount+$order_wise_shipping_discount)); ?></div>
                </div>
                <?php ($coupon_dis=session('coupon_discount')); ?>
            <?php endif; ?>


            <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">
                <h4><?php echo e(translate('total')); ?></h4>
                <h2 class="text-primary"><?php echo e(\App\CPU\Helpers::currency_converter($product_price_total+$total_tax+$total_shipping_cost-$coupon_dis-$total_discount_on_product-$order_wise_shipping_discount)); ?></h2>
            </div>
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mt-4">
                <a href="<?php echo e(route('home')); ?>" class="btn-link text-primary"><i class="bi bi-chevron-double-left fs-10"></i> <?php echo e(translate('Continue_Shopping')); ?></a>
                <?php if(!Request::is('checkout-payment')): ?>
                <a <?php echo e(Request::is('shop-cart')?"onclick=checkout()":""); ?> <?php echo e(Request::is('checkout-details')?"onclick=proceed_to_next()":""); ?> <?php echo e(in_array($current_url, ["updateQuantity", "remove"]) ? "onclick=checkout()":""); ?> class="btn btn-primary"><?php echo e(translate('Proceed_to_Next')); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\tikka\resources\themes\theme_aster/theme-views/partials/_order-summery.blade.php ENDPATH**/ ?>