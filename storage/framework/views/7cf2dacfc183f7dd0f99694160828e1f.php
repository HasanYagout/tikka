<!-- App Bar -->
<ul class="list-unstyled d-flex justify-content-around gap-3 mb-0 position-relative bg-white shadow-lg">
    <li>
        <a href="<?php echo e(route('home')); ?>" class="d-flex align-items-center flex-column py-2 <?php echo e((Request::is('/') || Request::is('home')) ? 'active' : ''); ?>">
            <i class="bi bi-house-door fs-16"></i>
            <span class="fs-14"><?php echo e(translate('Home')); ?></span>
        </a>
    </li>
    <li>
        <?php if(auth('customer')->check()): ?>
        <a href="<?php echo e(route('wishlists')); ?>" class="d-flex align-items-center flex-column  py-2 <?php echo e(Request::is('wishlists') ? 'active' : ''); ?>">
            <div class="position-relative">
                <i class="bi bi-heart fs-16"></i>
                <span class="count wishlist_count_status top-0"><?php echo e(session()->has('wish_list')?count(session('wish_list')):0); ?></span>
            </div>
            <span class="fs-14"><?php echo e(translate('wishlist')); ?></span>
        </a>
        <?php else: ?>
        <a href="javascript:" class="d-flex align-items-center flex-column py-2" data-bs-toggle="modal"
        data-bs-target="#loginModal">
            <div class="position-relative">
                <i class="bi bi-heart fs-16"></i>

            </div>
            <span class="fs-14"><?php echo e(translate('wishlist')); ?></span>
        </a>
        <?php endif; ?>

    </li>
    <li>
        <div class="dropup position-static">
            <a
                href="#"
                class="d-flex align-items-center flex-column py-2 <?php echo e(Request::is('shop-cart') ? 'active' : ''); ?>"
                data-toggle="collapse"
                data-target="cart_dropdown"
            >
                <div class="position-relative">
                    <i class="bi bi-bag fs-16"></i>
                    <?php ($cart_mobile=\App\CPU\CartManager::get_cart()); ?>
                    <span class="count top-0"><?php echo e($cart_mobile->count()); ?></span>
                </div>
                <span class="fs-14"><?php echo e(translate('Cart')); ?></span>
            </a>

            <ul class="dropdown-menu scrollY-60 z-n1"
                id="cart_dropdown"
                style="--bs-dropdown-min-width: 100%">
                <?php if($cart_mobile->count() > 0): ?>
                <?php ($sub_total=0); ?>
                <?php ($total_tax=0); ?>
                <?php $__currentLoopData = $cart_mobile; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php ($product=\App\Models\Product::active()->find($cartItem['product_id'])); ?>
                <li>
                    <div class="media gap-3">
                        <div class="avatar avatar-xxl overflow-hidden">
                            <img
                            src="<?php echo e(\App\CPU\ProductManager::product_image_path('thumbnail')); ?>/<?php echo e($cartItem['thumbnail']); ?>"
                            onerror="this.src='<?php echo e(theme_asset('assets/img/image-place-holder.png')); ?>'"
                             loading="lazy" alt="Product" class="img-fit dark-support rounded img-fit overflow-hidden" />
                        </div>
                        <div class="media-body">
                            <h6 class="mb-2">
                                <a href="<?php echo e(route('product',$cartItem['slug'])); ?>"><?php echo e(Str::limit($cartItem['name'],30)); ?></a>
                            </h6>
                            <div class="d-flex gap-3 justify-content-between align-items-end">
                                <div class="d-flex flex-column gap-1">
                                    <div class="fs-12"><span class="cart_quantity_<?php echo e($cartItem['id']); ?>"><?php echo e($cartItem['quantity']); ?></span> × <?php echo e(\App\CPU\Helpers::currency_converter(($cartItem['price']-$cartItem['discount']))); ?></div>
                                    <div class="product__price d-flex flex-wrap gap-2">
                                        <del class="product__old-price quantity_price_of_<?php echo e($cartItem['id']); ?>"><?php echo e(\App\CPU\Helpers::currency_converter($cartItem['price']*$cartItem['quantity'])); ?></del>
                                        <ins class="product__new-price discount_price_of_<?php echo e($cartItem['id']); ?>"><?php echo e(\App\CPU\Helpers::currency_converter(($cartItem['price']-$cartItem['discount'])*(int)$cartItem['quantity'])); ?></ins>
                                    </div>
                                </div>

                                <div class="quantity">
                                    <span class="quantity__minus cart_quantity__minus<?php echo e($cartItem['id']); ?>"  onclick="updateCartQuantity('<?php echo e($cartItem['id']); ?>','<?php echo e($cartItem['product_id']); ?>', '-1', 'minus')">
                                        <i class="<?php echo e($cartItem['quantity'] == ($product ? $product->minimum_order_qty : 1) ? 'bi bi-trash3-fill text-danger fs-10' : 'bi bi-dash'); ?>"></i>
                                    </span>
                                    <input type="text" class="quantity__qty cart_quantity_of_<?php echo e($cartItem['id']); ?>" data-min="<?php echo e($product ? $product->minimum_order_qty : 1); ?>" value="<?php echo e($cartItem['quantity']); ?>"
                                           onchange="updateCartQuantity('<?php echo e($cartItem['id']); ?>','<?php echo e($cartItem['product_id']); ?>', '0')">
                                    <span class="quantity__plus" onclick="updateCartQuantity('<?php echo e($cartItem['id']); ?>','<?php echo e($cartItem['product_id']); ?>', '1')">
                                        <i class="bi bi-plus"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <?php ($sub_total+=($cartItem['price']-$cartItem['discount'])*(int)$cartItem['quantity']); ?>
                <?php ($total_tax+=$cartItem['tax']*(int)$cartItem['quantity']); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <li>
                    <div class="flex-between-gap-3 pt-2 pb-4">
                        <h6><?php echo e(translate('total')); ?></h6>
                        <h3 class="text-primary cart_total_amount"><?php echo e(\App\CPU\Helpers::currency_converter($sub_total)); ?></h3>
                    </div>
                    <div class="d-flex gap-3">
                        <?php if(auth('customer')->check()): ?>
                            <a href="<?php echo e(route('shop-cart')); ?>" class="btn btn-outline-primary btn-block"><?php echo e(translate('view_cart')); ?></a>
                            <a href="<?php echo e(route('checkout-details')); ?>" class="btn btn-primary btn-block"><?php echo e(translate('go_to_checkout')); ?></a>
                        <?php else: ?>
                            <button class="btn btn-outline-primary btn-block" data-bs-toggle="modal" data-bs-target="#loginModal"><?php echo e(translate('view_cart')); ?></button>
                            <button class="btn btn-primary btn-block" data-bs-toggle="modal" data-bs-target="#loginModal"><?php echo e(translate('go_to_checkout')); ?></button>
                        <?php endif; ?>
                    </div>
                </li>
                <?php else: ?>
                    <div class="widget-cart-item">
                        <h6 class="text-danger text-center m-0 p-2"><i
                                class="fa fa-cart-arrow-down"></i> <?php echo e(translate('empty_Cart')); ?>

                        </h6>
                    </div>
                <?php endif; ?>
            </ul>
        </div>
    </li>
    <li>
        <?php if(auth('customer')->check()): ?>
        <a href="<?php echo e(route('compare-list')); ?>" class="d-flex align-items-center flex-column py-2 <?php echo e(Request::is('compare-list') ? 'active' : ''); ?>">
            <div class="position-relative">
                <i class="bi bi-repeat fs-16"></i>
                <span class="count compare_list_count_status top-0"><?php echo e(session()->has('compare_list')?count(session('compare_list')):0); ?></span>
            </div>
            <span class="fs-14"><?php echo e(translate('Compare')); ?></span>
        </a>
        <?php else: ?>
        <a href="javascript:" class="d-flex align-items-center flex-column py-2" data-bs-toggle="modal"
        data-bs-target="#loginModal">
            <div class="position-relative">
                <i class="bi bi-repeat fs-16"></i>

            </div>
            <span class="fs-14"><?php echo e(translate('Compare')); ?></span>
        </a>
        <?php endif; ?>
    </li>
</ul>
<?php /**PATH C:\xampp\htdocs\tikka\resources\themes\theme_aster/theme-views/layouts/partials/_app-bar.blade.php ENDPATH**/ ?>