<div class="modal-body">
    <div class="product-quickview">
        <button type="button" class="btn-close outside" data-bs-dismiss="modal" aria-label="Close"></button>

        <div class="quickview-content">
            <div class="row align-items-center gy-4">
                <div class="col-lg-5">
                    <!-- Product Details Image Wrap -->
                    <div class="pd-img-wrap position-relative h-100">
                        <div class="swiper-container quickviewSlider2 border rounded" style="--bs-border-color: #d6d6d6">
                            <div class="product__actions d-flex flex-column gap-2">
                                <a onclick="addWishlist('<?php echo e($product['id']); ?>','<?php echo e(route('store-wishlist')); ?>')"
                                class="btn-wishlist add_to_wishlist cursor-pointer wishlist-<?php echo e($product['id']); ?> <?php echo e(($wishlist_status == 1?'wishlist_icon_active':'')); ?>" title="<?php echo e(translate('add_to_wishlist')); ?>">
                                    <i class="bi bi-heart"></i>
                                </a>
                                <div class="product-share-icons">
                                    <a href="javascript:" title="Share">
                                        <i class="bi bi-share-fill"></i>
                                    </a>

                                    <ul>
                                        <li>
                                            <a href="javascript:" onclick="shareOnFacebook('<?php echo e(route('product',$product->slug)); ?>', 'facebook.com/sharer/sharer.php?u='); return false;">
                                                <i class="bi bi-facebook"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:" onclick="shareOnFacebook('<?php echo e(route('product',$product->slug)); ?>', 'twitter.com/intent/tweet?text='); return false;">
                                                <i class="bi bi-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:" onclick="shareOnFacebook('<?php echo e(route('product',$product->slug)); ?>', 'linkedin.com/shareArticle?mini=true&url='); return false;">
                                                <i class="bi bi-linkedin"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:" onclick="shareOnFacebook('<?php echo e(route('product',$product->slug)); ?>', 'api.whatsapp.com/send?text='); return false;">
                                                <i class="bi bi-whatsapp"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <?php if($product->images!=null && json_decode($product->images)>0): ?>
                            <div class="swiper-wrapper">
                                <?php if(json_decode($product->colors) && $product->color_image): ?>
                                    <?php $__currentLoopData = json_decode($product->color_image); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($photo->color != null): ?>
                                        <div class="swiper-slide position-relative">
                                            <?php if($product->discount > 0 && $product->discount_type === "percent"): ?>
                                                <span class="product__discount-badge">-<?php echo e($product->discount); ?>%</span>
                                            <?php elseif($product->discount > 0): ?>
                                                <span class="product__discount-badge">-<?php echo e(\App\CPU\Helpers::currency_converter($product->discount)); ?></span>
                                            <?php endif; ?>
                                            <img src="<?php echo e(asset("public/storage/product/$photo->image_name")); ?>" class="dark-support rounded" alt=""
                                            onerror="this.src='<?php echo e(theme_asset('assets/img/image-place-holder.png')); ?>'">
                                        </div>
                                        <?php else: ?>
                                            <div class="swiper-slide position-relative thumb_<?php echo e($key); ?>" id="thumb_<?php echo e($key); ?>">
                                                <?php if($product->discount > 0 && $product->discount_type === "percent"): ?>
                                                    <span class="product__discount-badge">-<?php echo e($product->discount); ?>%</span>
                                                <?php elseif($product->discount > 0): ?>
                                                    <span class="product__discount-badge">-<?php echo e(\App\CPU\Helpers::currency_converter($product->discount)); ?></span>
                                                <?php endif; ?>
                                                <img src="<?php echo e(asset("public/storage/product/$photo->image_name")); ?>" class="dark-support rounded" alt=""
                                                onerror="this.src='<?php echo e(theme_asset('assets/img/image-place-holder.png')); ?>'">
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <?php $__currentLoopData = json_decode($product->images); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="swiper-slide position-relative thumb_<?php echo e($key); ?>" id="thumb_<?php echo e($key); ?>">
                                            <?php if($product->discount > 0 && $product->discount_type === "percent"): ?>
                                                <span class="product__discount-badge">-<?php echo e($product->discount); ?>%</span>
                                            <?php elseif($product->discount > 0): ?>
                                                <span class="product__discount-badge">-<?php echo e(\App\CPU\Helpers::currency_converter($product->discount)); ?></span>
                                            <?php endif; ?>
                                            <img src="<?php echo e(asset("public/storage/product/$photo")); ?>" class="dark-support rounded" alt=""
                                            onerror="this.src='<?php echo e(theme_asset('assets/img/image-place-holder.png')); ?>'">
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                            <?php endif; ?>
                        </div>

                        <div class="mt-2">
                            <div class="quickviewSliderThumb2 swiper-container position-relative ">
                                <?php if($product->images!=null && json_decode($product->images)>0): ?>
                                <div class="swiper-wrapper auto-item-width justify-content-center" style="--width: 4rem; --bs-border-color: #d6d6d6">
                                    <?php if(json_decode($product->colors) && $product->color_image): ?>
                                        <?php $__currentLoopData = json_decode($product->color_image); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($photo->color != null): ?>
                                            <div class="swiper-slide m-2" id="preview-img<?php echo e($key); ?>" onclick="focus_preview_image_by_color('<?php echo e($key); ?>')">
                                                <img src="<?php echo e(asset("public/storage/product/$photo->image_name")); ?>" class="dark-support rounded border" alt="Product thumb"
                                                onerror="this.src='<?php echo e(theme_asset('assets/img/image-place-holder.png')); ?>'">
                                            </div>
                                            <?php else: ?>
                                            <div class="swiper-slide m-2" onclick="slider_thumb_img_preview('thumb_<?php echo e($key); ?>')">
                                                <img src="<?php echo e(asset("public/storage/product/$photo->image_name")); ?>" class="dark-support rounded border" alt="Product thumb"
                                                onerror="this.src='<?php echo e(theme_asset('assets/img/image-place-holder.png')); ?>'">
                                            </div>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <?php $__currentLoopData = json_decode($product->images); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="swiper-slide m-2" id="preview-img<?php echo e($key); ?>" onclick="slider_thumb_img_preview('thumb_<?php echo e($key); ?>')">
                                            <img src="<?php echo e(asset("public/storage/product/$photo")); ?>" class="dark-support rounded border"
                                                alt="Product thumb"
                                            onerror="this.src='<?php echo e(theme_asset('assets/img/image-place-holder.png')); ?>'">
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </div>
                                <?php endif; ?>

                                <div class="swiper-button-next swiper-quickview-button-next" style="--size: 1.5rem"></div>
                                <div class="swiper-button-prev swiper-quickview-button-prev" style="--size: 1.5rem"></div>
                            </div>
                        </div>

                    </div>
                    <!-- End Product Details Image Wrap -->
                </div>

                <div class="col-lg-7">
                    <!-- Product Details Content -->
                    <div class="product-details-content position-relative">

                        <div class="d-flex flex-wrap align-items-center gap-2 mb-3">
                            <h2 class="product_title"><?php echo e($product['name']); ?></h2>

                            <?php if($product->discount > 0 && $product->discount_type === "percent"): ?>
                                <span class="product__save-amount"><?php echo e(translate('save')); ?> <?php echo e($product->discount); ?>%</span>
                            <?php elseif($product->discount > 0): ?>
                                <span class="product__save-amount"><?php echo e(translate('save')); ?> <?php echo e(\App\CPU\Helpers::currency_converter($product->discount)); ?></span>
                            <?php endif; ?>

                        </div>

                        <div class="d-flex gap-2 align-items-center mb-2">
                            <div class="star-rating text-gold fs-12">
                                <?php for($i = 1; $i <= 5; $i++): ?>
                                    <?php if($i <= (int)$overallRating[0]): ?>
                                        <i class="bi bi-star-fill"></i>
                                    <?php elseif($overallRating[0] != 0 && $i <= (int)$overallRating[0] + 1.1 && $overallRating[0] == ((int)$overallRating[0]+.50)): ?>
                                        <i class="bi bi-star-half"></i>
                                    <?php else: ?>
                                        <i class="bi bi-star"></i>
                                    <?php endif; ?>
                                <?php endfor; ?>
                            </div>
                            <span>(<?php echo e($product->reviews_count); ?>)</span>
                        </div>

                        <?php if(($product['product_type'] == 'physical') && ($product['current_stock']<=0)): ?>
                            <p class="fw-semibold text-muted"><?php echo e(translate('out_of_stock')); ?></p>
                        <?php else: ?>
                            <?php if($product['product_type'] == 'physical'): ?>
                            <p class="fw-semibold text-muted"><span class="in_stock_status"><?php echo e($product->current_stock); ?></span> <?php echo e(translate('in_Stock')); ?></p>
                            <?php endif; ?>
                        <?php endif; ?>

                        <div class="product__price d-flex flex-wrap align-items-end gap-2 mb-4">


                            <ins class="product__new-price fs-28 mb-n1"><?php echo e(\App\CPU\Helpers::currency_converter($product->unit_price)); ?></ins>
                        </div>

                        <!-- Add to Cart Form -->
                        <form class="cart add_to_cart_form" id="add-to-cart-form" action="<?php echo e(route('cart.add')); ?>" data-redirecturl="<?php echo e(route('checkout-details')); ?>" data-varianturl="<?php echo e(route('cart.variant_price')); ?>" data-errormessage="<?php echo e(translate('please_choose_all_the_options')); ?>" data-outofstock="<?php echo e(translate('Sorry').', '.translate('Out_of_stock')); ?>.">
                            <?php echo csrf_field(); ?>
                            <div class="">
                                <input type="hidden" name="id" value="<?php echo e($product->id); ?>">
                                <?php if(count(json_decode($product->colors)) > 0): ?>
                                <div class="d-flex gap-4 flex-wrap align-items-center mb-3">
                                    <h6 class="fw-semibold"><?php echo e(translate('color')); ?></h6>
                                    <ul class="option-select-btn custom_01_option flex-wrap weight-style--two gap-2 pt-2">
                                        <?php $__currentLoopData = json_decode($product->colors); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <label>
                                                <input type="radio" hidden=""
                                                id="<?php echo e($product->id); ?>-color-<?php echo e(str_replace('#','',$color)); ?>"
                                                name="color" value="<?php echo e($color); ?>"
                                                <?php echo e($key == 0 ? 'checked' : ''); ?>

                                                >
                                                <span class="color_variants rounded-circle p-0 <?php echo e($key == 0 ? 'color_variant_active':''); ?>" style="background: <?php echo e($color); ?>;"
                                                for="<?php echo e($product->id); ?>-color-<?php echo e(str_replace('#','',$color)); ?>"
                                                onclick="focus_preview_image_by_color('<?php echo e($key); ?>')" id="color_variants_<?php echo e($key); ?>"
                                                ></span>
                                            </label>
                                        </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                                <?php endif; ?>


                                <!--  -->
                                <?php $__currentLoopData = json_decode($product->choice_options); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $choice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="d-flex gap-4 flex-wrap align-items-center mb-4">
                                    <h6 class="fw-semibold"><?php echo e(translate($choice->title)); ?></h6>
                                    <ul class="option-select-btn custom_01_option flex-wrap weight-style--two gap-2">
                                        <?php $__currentLoopData = $choice->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <label>
                                                <input type="radio" hidden=""
                                                id="<?php echo e($choice->name); ?>-<?php echo e($option); ?>"
                                                name="<?php echo e($choice->name); ?>" value="<?php echo e($option); ?>"
                                                <?php if($key == 0): ?> checked <?php endif; ?> >
                                                <span><?php echo e($option); ?></span>
                                            </label>
                                        </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <div class="d-flex gap-4 flex-wrap align-items-center mb-4">
                                    <h6 class="fw-semibold"><?php echo e(translate('quantity')); ?></h6>

                                    <div class="quantity quantity--style-two">
                                        <span class="quantity__minus single_quantity__minus">
                                            <i class="bi bi-trash3-fill text-danger fs-10"></i>
                                        </span>
                                        <input type="text" class="quantity__qty product_quantity__qty" name="quantity" value="<?php echo e($product->minimum_order_qty ?? 1); ?>" min="<?php echo e($product->minimum_order_qty ?? 1); ?>" max="<?php echo e($product['product_type'] == 'physical' ? $product->current_stock : 100); ?>">
                                        <span class="quantity__plus single_quantity__plus" <?php echo e(($product->current_stock == 1?'disabled':'')); ?>>
                                            <i class="bi bi-plus"></i>
                                        </span>
                                    </div>
                                </div>

                                <div class="bg-light mx-w rounded p-4">
                                    <div class="flex-between-gap-3">
                                        <div class="">
                                            <h6 class="flex-middle-gap-2 mb-2">
                                                <span class="text-muted"><?php echo e(translate('total_price')); ?>:</span>
                                                <span class="total_price"><?php echo e(\App\CPU\Helpers::currency_converter($product->unit_price)); ?></span>
                                            </h6>
                                            <h6 class="flex-middle-gap-2">
                                                <span class="text-muted"><?php echo e(translate('Tax')); ?>:</span>
                                                <span class="product_vat"><?php echo e(\App\CPU\Helpers::currency_converter($product->tax)); ?></span>
                                            </h6>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex gap-2 mt-4">
                                    <?php if(($product->added_by == 'seller' && ($seller_temporary_close || (isset($product->seller->shop) && $product->seller->shop->vacation_status && $current_date >= $seller_vacation_start_date && $current_date <= $seller_vacation_end_date))) ||
                                    ($product->added_by == 'admin' && ($inhouse_temporary_close || ($inhouse_vacation_status && $current_date >= $inhouse_vacation_start_date && $current_date <= $inhouse_vacation_end_date)))): ?>
                                        <button type="button" class="buy_now_button btn btn-secondary fs-16" disabled><?php echo e(translate('buy_now')); ?></span></button>
                                        <button type="button" class="update_cart_button btn btn-primary fs-16" disabled><?php echo e(translate('add_to_Cart')); ?></button>
                                    <?php else: ?>
                                        <button type="button" class="buy_now_button btn btn-secondary fs-16" onclick="buy_now('add-to-cart-form', <?php echo e((Auth::guard('customer')->check()?'true':'false')); ?>, '<?php echo e(route('checkout-details')); ?>')"><?php echo e(translate('buy_now')); ?></span></button>

                                        <button type="button" class="update_cart_button btn btn-primary fs-16" onclick="addToCart('add-to-cart-form')"><?php echo e(translate('add_to_Cart')); ?></button>
                                    <?php endif; ?>
                                </div>
                                <?php if(($product->added_by == 'seller' && ($seller_temporary_close || (isset($product->seller->shop) && $product->seller->shop->vacation_status && $current_date >= $seller_vacation_start_date && $current_date <= $seller_vacation_end_date))) ||
                                ($product->added_by == 'admin' && ($inhouse_temporary_close || ($inhouse_vacation_status && $current_date >= $inhouse_vacation_start_date && $current_date <= $inhouse_vacation_end_date)))): ?>
                                    <div class="alert alert-danger mt-3" role="alert">
                                        <?php echo e(translate('this_shop_is_temporary_closed_or_on_vacation')); ?>.
                                        <?php echo e(translate('You_cannot_add_product_to_cart_from_this_shop_for_now')); ?>

                                    </div>
                                <?php endif; ?>
                            </div>
                        </form>
                    </div>
                    <!-- End Product Details Content -->
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    $(document).ready(function () {
        getVariantPrice();

        function stock_check_quick_view(){
            minValue = parseInt($('.product_quantity__qty').attr('min'));
            maxValue = parseInt($('.product_quantity__qty').attr('max'));
            valueCurrent = parseInt($('.product_quantity__qty').val());
            let product_qty = $('.product_quantity__qty');

            if (minValue >= valueCurrent) {
                $('.product_quantity__qty').val(minValue);
                product_qty.parent().find('.quantity__minus').html('<i class="bi bi-trash3-fill text-danger fs-10"></i>')
            }else{
                product_qty.parent().find('.quantity__minus').html('<i class="bi bi-dash"></i>')
            }

            if (valueCurrent > maxValue) {
                toastr.warning('Sorry, stock limit exceeded');
                $('.product_quantity__qty').val(maxValue);
            }
            getVariantPrice();
        }

        $('#add-to-cart-form input').on('change', function () {
            stock_check_quick_view();
        });


        $('#add-to-cart-form').on('submit', function (e) {
            e.preventDefault();
        });

        /* Increase */
        $('.single_quantity__plus').on('click', function () {
            var $qty = $(this).parent().find('input');
            var currentVal = parseInt($qty.val());
            if (!isNaN(currentVal)) {
                $qty.val(currentVal + 1);
            }
            if(currentVal >= $qty.attr('max') -1){
                $(this).attr('disabled', true);
            }
            stock_check_quick_view();
        });

        /* Decrease */
        $('.single_quantity__minus').on('click', function () {
            var $qty = $(this).parent().find('input');
            var currentVal = parseInt($qty.val());
            if (!isNaN(currentVal) && currentVal > 1) {
                $qty.val(currentVal - 1);
            }
            if (currentVal < $qty.attr('max')) {
                $('.single_quantity__plus').removeAttr('disabled', true);
            }
            stock_check_quick_view();
        });
    });


</script>
<?php /**PATH C:\xampp\htdocs\tikka\resources\themes\theme_aster/theme-views/layouts/partials/modal/_quick-view-data.blade.php ENDPATH**/ ?>