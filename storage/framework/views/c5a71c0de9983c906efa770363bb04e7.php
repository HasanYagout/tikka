<?php $__env->startSection('title', translate($product['name'])); ?>


<?php $__env->startPush('css_or_js'); ?>
    <meta name="description" content="<?php echo e($product->slug); ?>">
    <meta name="keywords" content="<?php $__currentLoopData = explode(' ',$product['name']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyword): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($keyword.' , '); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>">
    <?php if($product->added_by=='seller'): ?>
        <meta name="author" content="<?php echo e($product->seller->shop?$product->seller->shop->name:$product->seller->f_name); ?>">
    <?php elseif($product->added_by=='admin'): ?>
        <meta name="author" content="<?php echo e($web_config['name']->value); ?>">
    <?php endif; ?>
    <!-- Viewport-->

    <?php if($product['meta_image']): ?>
        <meta property="og:image" content="<?php echo e(asset("public/storage/product/meta")); ?>/<?php echo e($product->meta_image); ?>"/>
        <meta property="twitter:card"
              content="<?php echo e(asset("public/storage/product/meta")); ?>/<?php echo e($product->meta_image); ?>"/>
    <?php else: ?>
        <meta property="og:image" content="<?php echo e(asset("public/storage/product/thumbnail")); ?>/<?php echo e($product->thumbnail); ?>"/>
        <meta property="twitter:card"
              content="<?php echo e(asset("public/storage/product/thumbnail/")); ?>/<?php echo e($product->thumbnail); ?>"/>
    <?php endif; ?>

    <?php if($product['meta_title']): ?>
        <meta property="og:title" content="<?php echo e($product->meta_title); ?>"/>
        <meta property="twitter:title" content="<?php echo e($product->meta_title); ?>"/>
    <?php else: ?>
        <meta property="og:title" content="<?php echo e($product->name); ?>"/>
        <meta property="twitter:title" content="<?php echo e($product->name); ?>"/>
    <?php endif; ?>
    <meta property="og:url" content="<?php echo e(route('product',[$product->slug])); ?>">

    <?php if($product['meta_description']): ?>
        <meta property="twitter:description" content="<?php echo $product['meta_description']; ?>">
        <meta property="og:description" content="<?php echo $product['meta_description']; ?>">
    <?php else: ?>
        <meta property="og:description"
              content="<?php $__currentLoopData = explode(' ',$product['name']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyword): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($keyword.' , '); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>">
        <meta property="twitter:description"
              content="<?php $__currentLoopData = explode(' ',$product['name']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyword): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($keyword.' , '); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>">
    <?php endif; ?>
    <meta property="twitter:url" content="<?php echo e(route('product',[$product->slug])); ?>">
    <link rel="stylesheet" href="<?php echo e(theme_asset('assets/css/lightbox.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <!-- Main Content -->
    <main class="main-content d-flex flex-column gap-3 pt-3 mb-sm-5">
        <div class="container">
            <div class="row gx-3 gy-4">
                <div class="col-lg-8 col-xl-9">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="quickview-content">
                                <div class="row gy-4">
                                    <div class="col-lg-5">
                                        <!-- Product Details Image Wrap -->
                                        <div class="pd-img-wrap position-relative h-100">
                                            <div class="swiper-container quickviewSlider2 border rounded"
                                                 style="--bs-border-color: #d6d6d6">
                                                <div class="product__actions d-flex flex-column gap-2">
                                                    <a onclick="addWishlist('<?php echo e($product['id']); ?>','<?php echo e(route('store-wishlist')); ?>')"
                                                       id="wishlist-<?php echo e($product['id']); ?>"
                                                       class="btn-wishlist add_to_wishlist cursor-pointer wishlist-<?php echo e($product['id']); ?> <?php echo e(($wishlist_status == 1?'wishlist_icon_active':'')); ?>"
                                                       title="<?php echo e(translate('add_to_wishlist')); ?>">
                                                        <i class="bi bi-heart"></i>
                                                    </a>
                                                    <div class="product-share-icons">
                                                        <a href="javascript:" title="Share">
                                                            <i class="bi bi-share-fill"></i>
                                                        </a>

                                                        <ul>
                                                            <li>
                                                                <a href="javascript:"
                                                                   onclick="shareOnFacebook('<?php echo e(route('product',$product->slug)); ?>', 'facebook.com/sharer/sharer.php?u='); return false;">
                                                                    <i class="bi bi-facebook"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:"
                                                                   onclick="shareOnFacebook('<?php echo e(route('product',$product->slug)); ?>', 'twitter.com/intent/tweet?text='); return false;">
                                                                    <i class="bi bi-twitter"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:"
                                                                   onclick="shareOnFacebook('<?php echo e(route('product',$product->slug)); ?>', 'linkedin.com/shareArticle?mini=true&url='); return false;">
                                                                    <i class="bi bi-linkedin"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:"
                                                                   onclick="shareOnFacebook('<?php echo e(route('product',$product->slug)); ?>', 'api.whatsapp.com/send?text='); return false;">
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
                                                                        <img
                                                                            src="<?php echo e(asset("public/storage/product/$photo->image_name")); ?>"
                                                                            class="dark-support rounded" alt=""

                                                                    </div>
                                                                <?php else: ?>
                                                                    <div class="swiper-slide position-relative">
                                                                        <?php if($product->discount > 0 && $product->discount_type === "percent"): ?>
                                                                            <span class="product__discount-badge">-<?php echo e($product->discount); ?>%</span>
                                                                        <?php elseif($product->discount > 0): ?>
                                                                            <span class="product__discount-badge">-<?php echo e(\App\CPU\Helpers::currency_converter($product->discount)); ?></span>
                                                                        <?php endif; ?>
                                                                        <img
                                                                            src="<?php echo e(asset("public/storage/product/$photo->image_name")); ?>"
                                                                            class="dark-support rounded" alt=""
                                                                            onerror="this.src='<?php echo e(theme_asset('assets/img/image-place-holder.png')); ?>'">
                                                                    </div>
                                                                <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php else: ?>
                                                            <?php $__currentLoopData = json_decode($product->images); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <div class="swiper-slide position-relative">
                                                                    <?php if($product->discount > 0 && $product->discount_type === "percent"): ?>
                                                                        <span class="product__discount-badge">-<?php echo e($product->discount); ?>%</span>
                                                                    <?php elseif($product->discount > 0): ?>
                                                                        <span class="product__discount-badge">-<?php echo e(\App\CPU\Helpers::currency_converter($product->discount)); ?></span>
                                                                    <?php endif; ?>
                                                                    <img
                                                                        src="<?php echo e(asset("public/storage/product/$photo")); ?>"
                                                                        class="dark-support rounded" alt=""
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
                                                        <div
                                                            class="swiper-wrapper auto-item-width justify-content-center"
                                                            style="--width: 4rem; --bs-border-color: #d6d6d6">
                                                            <?php if(json_decode($product->colors) && $product->color_image): ?>
                                                                <?php $__currentLoopData = json_decode($product->color_image); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php if($photo->color != null): ?>
                                                                        <div class="swiper-slide"
                                                                             id="preview-img<?php echo e($key); ?>">
                                                                            <img
                                                                                src="<?php echo e(asset("public/storage/product/$photo->image_name")); ?>"
                                                                                class="dark-support rounded border"
                                                                                alt="Product thumb"
                                                                                onerror="this.src='<?php echo e(theme_asset('assets/img/image-place-holder.png')); ?>'">
                                                                        </div>
                                                                    <?php else: ?>
                                                                        <div class="swiper-slide">
                                                                            <img
                                                                                src="<?php echo e(asset("public/storage/product/$photo->image_name")); ?>"
                                                                                class="dark-support rounded border"
                                                                                alt="Product thumb"
                                                                                onerror="this.src='<?php echo e(theme_asset('assets/img/image-place-holder.png')); ?>'">
                                                                        </div>
                                                                    <?php endif; ?>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php else: ?>
                                                                <?php $__currentLoopData = json_decode($product->images); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <div class="swiper-slide" id="preview-img<?php echo e($key); ?>">
                                                                        <img
                                                                            src="<?php echo e(asset("public/storage/product/$photo")); ?>"
                                                                            class="dark-support rounded border"
                                                                            alt="Product thumb"
                                                                            onerror="this.src='<?php echo e(theme_asset('assets/img/image-place-holder.png')); ?>'">
                                                                    </div>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php endif; ?>
                                                        </div>
                                                    <?php endif; ?>

                                                    <div class="swiper-button-next swiper-quickview-button-next"
                                                         style="--size: 1.5rem"></div>
                                                    <div class="swiper-button-prev swiper-quickview-button-prev"
                                                         style="--size: 1.5rem"></div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- End Product Details Image Wrap -->
                                    </div>

                                    <div class="col-lg-7">
                                        <!-- Product Details Content -->
                                        <div class="product-details-content position-relative">

                                            <div class="d-flex flex-wrap align-items-center gap-2 mb-3">
                                                <h2 class="product_title"><?php echo e($product->name); ?></h2>

                                                <?php if($product->discount > 0 && $product->discount_type === "percent"): ?>
                                                    <span
                                                        class="product__save-amount"><?php echo e(translate('save')); ?> <?php echo e($product->discount); ?>%</span>
                                                <?php elseif($product->discount > 0): ?>
                                                    <span
                                                        class="product__save-amount"><?php echo e(translate('save')); ?> <?php echo e(\App\CPU\Helpers::currency_converter($product->discount)); ?></span>
                                                <?php endif; ?>

                                            </div>

                                            <div class="d-flex gap-2 align-items-center mb-2">
                                                <div class="star-rating text-gold fs-12">
                                                    <?php for($i = 1; $i <= 5; $i++): ?>
                                                        <?php if($i <= (int)$overallRating[0]): ?>
                                                            <i class="bi bi-star-fill"></i>
                                                        <?php elseif($overallRating[0] != 0 && $i <= (int)$overallRating[0] + 1.1 && $overallRating[0] > ((int)$overallRating[0])): ?>
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
                                                    <p class="fw-semibold text-muted"><span
                                                            class="in_stock_status"><?php echo e($product->current_stock); ?></span> <?php echo e(translate('in_Stock')); ?>

                                                    </p>
                                                <?php endif; ?>
                                            <?php endif; ?>

                                            <div class="product__price d-flex flex-wrap align-items-end gap-2 mb-4">




                                                <ins class="product__new-price"><?php echo e(\App\CPU\Helpers::currency_converter($product->unit_price)); ?></ins>
                                            </div>

                                            <!-- Add to Cart Form -->
                                            <form class="cart add_to_cart_form" action="<?php echo e(route('cart.add')); ?>"
                                                  id="add-to-cart-form" data-redirecturl="<?php echo e(route('checkout-details')); ?>"
                                                  data-varianturl="<?php echo e(route('cart.variant_price')); ?>"
                                                  data-errormessage="<?php echo e(translate('please_choose_all_the_options')); ?>"
                                                  data-outofstock="<?php echo e(translate('Sorry').', '.translate('Out_of_stock')); ?>.">
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
                                                                            <span
                                                                                class="color_variants rounded-circle p-0 <?php echo e($key == 0 ? 'color_variant_active':''); ?>"
                                                                                style="background: <?php echo e($color); ?>;"
                                                                                for="<?php echo e($product->id); ?>-color-<?php echo e(str_replace('#','',$color)); ?>"
                                                                                onclick="focus_preview_image_by_color('<?php echo e($key); ?>')"
                                                                                id="color_variants_<?php echo e($key); ?>"
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
                                                                                   name="<?php echo e($choice->name); ?>"
                                                                                   value="<?php echo e($option); ?>"
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
                                                            <input type="text"
                                                                   class="quantity__qty product_quantity__qty"
                                                                   name="quantity"
                                                                   value="<?php echo e($product->minimum_order_qty ?? 1); ?>"
                                                                   min="<?php echo e($product->minimum_order_qty ?? 1); ?>"
                                                                   max="<?php echo e($product['product_type'] == 'physical' ? $product->current_stock : 100); ?>">
                                                            <span class="quantity__plus single_quantity__plus" <?php echo e(($product->current_stock == 1?'disabled':'')); ?>>
                                                                <i class="bi bi-plus"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="mx-w" style="--width: 24rem">
                                                        <div class="bg-light w-100 rounded p-4">
                                                            <div class="flex-between-gap-3">
                                                                <div class="">
                                                                    <h6 class="flex-middle-gap-2 mb-2">
                                                                        <span class="text-muted"><?php echo e(translate('total_price')); ?>:</span>
                                                                        <span
                                                                            class="total_price"><?php echo e(\App\CPU\Helpers::currency_converter($product->unit_price)); ?></span>
                                                                    </h6>
                                                                    <h6 class="flex-middle-gap-2">
                                                                        <span
                                                                            class="text-muted"><?php echo e(translate('Tax')); ?>:</span>
                                                                        <span
                                                                            class="product_vat"><?php echo e($product->tax_model == 'include' ? 'incl.' : \App\CPU\Helpers::currency_converter($product->tax)); ?></span>
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mx-w d-flex flex-wrap gap-3 mt-4"
                                                         style="--width: 24rem">
                                                        <?php if(($product->added_by == 'seller' && ($seller_temporary_close || (isset($product->seller->shop) && $product->seller->shop->vacation_status && $current_date >= $seller_vacation_start_date && $current_date <= $seller_vacation_end_date))) ||
                                                        ($product->added_by == 'admin' && ($inhouse_temporary_close || ($inhouse_vacation_status && $current_date >= $inhouse_vacation_start_date && $current_date <= $inhouse_vacation_end_date)))): ?>
                                                            <button type="button"
                                                                    class="buy_now_button btn btn-secondary fs-16 flex-grow-1"
                                                                    disabled><?php echo e(translate('buy_now')); ?></span></button>
                                                            <button type="button"
                                                                    class="update_cart_button btn btn-primary fs-16 flex-grow-1"
                                                                    disabled><?php echo e(translate('add_to_Cart')); ?></button>
                                                        <?php else: ?>
                                                            <button type="button"
                                                                    class="buy_now_button btn btn-secondary fs-16"
                                                                    onclick="buy_now('add-to-cart-form', <?php echo e((Auth::guard('customer')->check()?'true':'false')); ?>, '<?php echo e(route('checkout-details')); ?>')"><?php echo e(translate('buy_now')); ?></span></button>

                                                            <button type="button"
                                                                    class="update_cart_button btn btn-primary fs-16"
                                                                    onclick="addToCart('add-to-cart-form')"><?php echo e(translate('add_to_Cart')); ?></button>
                                                        <?php endif; ?>
                                                    </div>
                                                    <?php if(($product->added_by == 'seller' && ($seller_temporary_close || (isset($product->seller->shop) && $product->seller->shop->vacation_status && $current_date >= $seller_vacation_start_date && $current_date <= $seller_vacation_end_date))) ||
                                                    ($product->added_by == 'admin' && ($inhouse_temporary_close || ($inhouse_vacation_status && $current_date >= $inhouse_vacation_start_date && $current_date <= $inhouse_vacation_end_date)))): ?>
                                                        <div class="alert alert-danger mt-3" role="alert">
                                                            <?php echo e(translate('this_shop_is_temporary_closed_or_on_vacation')); ?>

                                                            .
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
                    <div class="card">
                        <div class="card-body">
                            <nav>
                                <div class="nav justify-content-center gap-4 nav--tabs" id="nav-tab" role="tablist">
                                    <button class="active" id="product-details-tab" data-bs-toggle="tab"
                                            data-bs-target="#product-details" type="button" role="tab"
                                            aria-controls="product-details"
                                            aria-selected="true"><?php echo e(translate('Product_Details')); ?></button>
                                    <button id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews"
                                            type="button" role="tab" aria-controls="reviews"
                                            aria-selected="false"><?php echo e(translate("reviews")); ?></button>
                                </div>
                            </nav>
                            <div class="tab-content mt-3" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="product-details" role="tabpanel"
                                     aria-labelledby="product-details-tab" tabindex="0">
                                    <div class="details-content-wrap custom-height ov-hidden show-more--content active">
                                        <div class="table-responsive">
                                            <table class="table mb-0">
                                                <thead class="table-light">
                                                <tr>
                                                    <th class="border-0"><?php echo e(translate('details_Description')); ?></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        <?php if($product->video_url!=null): ?>
                                                            <div class="col-12 mb-4 text-center">
                                                                <iframe width="560" height="315"
                                                                        src="<?php echo e($product->video_url); ?>">
                                                                </iframe>
                                                            </div>
                                                        <?php endif; ?>
                                                        <?php echo $product->details; ?>

                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center mt-2">
                                        <button
                                            class="btn btn-outline-primary see-more-details"><?php echo e(translate('See_More')); ?></button>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab"
                                     tabindex="0">
                                    <div class="details-content-wrap custom-height ov-hidden show-more--content active">
                                        <div class="row gy-4">
                                            <div class="col-lg-5">
                                                <div class="rating-review mx-auto text-center mb-30">
                                                    <h2 class="rating-review__title"><span
                                                            class="rating-review__out-of"><?php echo e(round($overallRating[0], 1)); ?></span>/5
                                                    </h2>
                                                    <div class="rating text-gold mb-2">
                                                        <?php for($i = 1; $i <= 5; $i++): ?>
                                                            <?php if($i <= (int)$overallRating[0]): ?>
                                                                <i class="bi bi-star-fill"></i>
                                                            <?php elseif($overallRating[0] != 0 && $i <= (int)$overallRating[0] + 1.1 && $overallRating[0] > ((int)$overallRating[0])): ?>
                                                                <i class="bi bi-star-half"></i>
                                                            <?php else: ?>
                                                                <i class="bi bi-star"></i>
                                                            <?php endif; ?>
                                                        <?php endfor; ?>
                                                    </div>
                                                    <div class="rating-review__info">
                                                        <span><?php echo e($reviews_of_product->total()); ?> <?php echo e(translate('ratings')); ?></span>
                                                    </div>
                                                </div>


                                                <ul class="list-rating gap-10">
                                                    <li>
                                                        <span class="review-name">5 <?php echo e(translate('star')); ?></span>

                                                        <div class="progress">
                                                            <div class="progress-bar" role="progressbar"
                                                                 style="width: <?php echo e(($rating[0] != 0?number_format($rating[0]*100 / array_sum($rating)):0)); ?>%"
                                                                 aria-valuenow="95" aria-valuemin="0"
                                                                 aria-valuemax="100">
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <span class="review-name">4 <?php echo e(translate('star')); ?></span>

                                                        <div class="progress">
                                                            <div class="progress-bar" role="progressbar"
                                                                 style="width: <?php echo e(($rating[1] != 0?number_format($rating[1]*100 / array_sum($rating)):0)); ?>%"
                                                                 aria-valuenow="35" aria-valuemin="0"
                                                                 aria-valuemax="100">
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <span class="review-name">3 <?php echo e(translate('star')); ?></span>

                                                        <div class="progress">
                                                            <div class="progress-bar" role="progressbar"
                                                                 style="width: <?php echo e(($rating[2] != 0?number_format($rating[2]*100 / array_sum($rating)):0)); ?>%"
                                                                 aria-valuenow="35" aria-valuemin="0"
                                                                 aria-valuemax="100">
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <span class="review-name">2 <?php echo e(translate('star')); ?></span>

                                                        <div class="progress">
                                                            <div class="progress-bar" role="progressbar"
                                                                 style="width: <?php echo e(($rating[3] != 0?number_format($rating[3]*100 / array_sum($rating)):0)); ?>%"
                                                                 aria-valuenow="20" aria-valuemin="0"
                                                                 aria-valuemax="100">
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <span class="review-name">1 <?php echo e(translate('star')); ?></span>

                                                        <div class="progress">
                                                            <div class="progress-bar" role="progressbar"
                                                                 style="width: <?php echo e(($rating[4] != 0?number_format($rating[4]*100 / array_sum($rating)):0)); ?>%"
                                                                 aria-valuenow="10" aria-valuemin="0"
                                                                 aria-valuemax="100">
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="d-flex flex-wrap gap-3" id="product-review-list">
                                                    <?php $__currentLoopData = $reviews_of_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="card border-primary-light flex-grow-1">
                                                            <div class="media flex-wrap align-items-centr gap-3 p-3">
                                                                <div class="avatar overflow-hidden border rounded-circle"
                                                                     style="--size: 3.437rem">
                                                                    <img
                                                                        src="<?php echo e(asset("public/storage/profile")); ?>/<?php echo e((isset($item->user)?$item->user->image:'')); ?>"
                                                                        alt=""
                                                                        class="img-fit dark-support"
                                                                        onerror="this.src='<?php echo e(theme_asset('assets/img/image-place-holder.png')); ?>'">
                                                                </div>
                                                                <div class="media-body d-flex flex-column gap-2">
                                                                    <div
                                                                        class="d-flex flex-wrap gap-2 align-items-center justify-content-between">
                                                                        <div>
                                                                            <h6 class="mb-1"><?php echo e(isset($item->user)?$item->user->f_name:translate('User_Not_Exist')); ?></h6>
                                                                            <div
                                                                                class="d-flex gap-2 align-items-center">
                                                                                <div
                                                                                    class="star-rating text-gold fs-12">
                                                                                    <?php for($inc=0; $inc < 5; $inc++): ?>
                                                                                        <?php if($inc < $item->rating): ?>
                                                                                            <i class="bi bi-star-fill"></i>
                                                                                        <?php else: ?>
                                                                                            <i class="bi bi-star"></i>
                                                                                        <?php endif; ?>
                                                                                    <?php endfor; ?>
                                                                                </div>
                                                                                <span>(<?php echo e($item->rating); ?>/5)</span>
                                                                            </div>
                                                                        </div>
                                                                        <div><?php echo e($item->updated_at->format("d M Y h:i:s A")); ?></div>
                                                                    </div>
                                                                    <p><?php echo e($item->comment); ?></p>

                                                                    <div class="d-flex flex-wrap gap-2 products-comments-img">
                                                                        <?php $__currentLoopData = json_decode($item->attachment); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <?php if(file_exists(base_path("storage/app/public/review/".$img))): ?>
                                                                                <a href="<?php echo e(asset("public/storage/review/".$img)); ?>" data-lightbox="">
                                                                                    <img src="<?php echo e(asset("public/storage/review/".$img)); ?>" class="remove-mask-img"
                                                                                         onerror="this.src='<?php echo e(theme_asset('assets/img/image-place-holder.png')); ?>'">
                                                                                </a>
                                                                            <?php endif; ?>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                    <?php if(count($product->reviews)==0): ?>
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <h6 class="text-danger text-center m-0"><?php echo e(translate('product_review_not_available')); ?></h6>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center mt-2">
                                        <?php if(count($product->reviews) > 2): ?>
                                            <button
                                                class="btn btn-outline-primary see-more-details-review m-1 view_text"
                                                onclick="seemore()"
                                                data-productid="<?php echo e($product->id); ?>"
                                                data-routename="<?php echo e(route('review-list-product')); ?>"
                                                data-afterextend="<?php echo e(translate('See_Less')); ?>"
                                                data-seemore="<?php echo e(translate('See_More')); ?>"
                                                data-onerror="<?php echo e(translate('no_more_review_remain_to_load')); ?>"><?php echo e(translate('See_More')); ?></button>
                                        <?php else: ?>
                                            <button
                                                class="btn btn-outline-primary see-more-details m-1"><?php echo e(translate('see_More')); ?></button>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-3 d-flex flex-column gap-3">
                    <div class="card order-1 order-sm-0">
                        <div class="card-body">
                            <h5 class="mb-3"><?php echo e(translate('More_from_the_Store')); ?></h5>

                            <div class="d-flex flex-wrap gap-3">
                                <?php if(count($more_product_from_seller)>0): ?>
                                    <?php $__currentLoopData = $more_product_from_seller; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="card border-primary-light flex-grow-1">
                                            <a href="<?php echo e(route('product',$item->slug)); ?>"
                                               class="media align-items-centr gap-3 p-3">
                                                <div class="avatar" style="--size: 4.375rem">
                                                    <img
                                                        src="<?php echo e(\App\CPU\ProductManager::product_image_path('thumbnail')); ?>/<?php echo e($item['thumbnail']); ?>"
                                                        alt=""
                                                        class="img-fit dark-support rounded img-fluid overflow-hidden"
                                                        onerror="this.src='<?php echo e(theme_asset('assets/img/image-place-holder.png')); ?>'">
                                                </div>
                                                <?php ($item_review = \App\CPU\ProductManager::get_overall_rating($item->reviews)); ?>

                                                <div class="media-body d-flex flex-column gap-2">
                                                    <h6 class="text-capitalize"><?php echo e(Str::limit($item['name'], 18)); ?></h6>
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <div class="star-rating text-gold fs-12">
                                                            <?php for($i = 1; $i <= 5; $i++): ?>
                                                                <?php if($i <= (int)$item_review[0]): ?>
                                                                    <i class="bi bi-star-fill"></i>
                                                                <?php elseif($item_review[0] != 0 && $i <= (int)$item_review[0] + 1.1 && $item_review[0] > ((int)$item_review[0])): ?>
                                                                    <i class="bi bi-star-half"></i>
                                                                <?php else: ?>
                                                                    <i class="bi bi-star"></i>
                                                                <?php endif; ?>
                                                            <?php endfor; ?>
                                                        </div>
                                                        <span>(<?php echo e($item->reviews_count); ?>)</span>
                                                    </div>
                                                    <div class="product__price">
                                                        <ins class="product__new-price">
                                                            <?php echo e(\App\CPU\Helpers::currency_converter(
                                                                $item->unit_price-(\App\CPU\Helpers::get_product_discount($item,$item->unit_price))
                                                            )); ?>

                                                        </ins>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <div class="card border-primary-light flex-grow-1">
                                        <a href="javaScript:void(0)" class="media align-items-centr gap-3 p-3">
                                            <div class="media-body d-flex flex-column gap-2">
                                                <h6><?php echo e(translate('similar_product_not_available')); ?></h6>
                                            </div>
                                        </a>
                                    </div>

                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php if($product->added_by=='seller'): ?>
                        <?php if(isset($product->seller->shop)): ?>
                            <div class="card order-0 order-sm-1">
                                <div class="card-body">
                                    <div class="p-2 overlay shop-bg-card"
                                         data-bg-img="<?php echo e(asset('public/storage/shop/banner')); ?>/<?php echo e($product->seller->shop->banner); ?>">
                                        <div class="media flex-wrap gap-3 p-2">
                                            <div class="avatar border rounded-circle" style="--size: 3.437rem">
                                                <img
                                                    src="<?php echo e(asset('public/storage/shop')); ?>/<?php echo e($product->seller->shop->image); ?>"
                                                    alt="" class="img-fit dark-support rounded-circle"
                                                    onerror="this.src='<?php echo e(theme_asset('assets/img/image-place-holder.png')); ?>'">
                                            </div>
                                            <div class="media-body d-flex flex-column gap-2 text-absolute-whtie">
                                                <div class="d-flex flex-column gap-1 justify-content-start">
                                                    <h5 class=""><?php echo e($product->seller->shop->name); ?></h5>
                                                    <div class="d-flex gap-2 align-items-center ">
                                                        <div class="star-rating text-gold fs-12">
                                                            <?php for($i = 1; $i <= 5; $i++): ?>
                                                                <?php if($i <= (int)$avg_rating): ?>
                                                                    <i class="bi bi-star-fill"></i>
                                                                <?php elseif($avg_rating != 0 && $i <= (int)$avg_rating + 1.1 && $avg_rating > ((int)$avg_rating)): ?>
                                                                    <i class="bi bi-star-half"></i>
                                                                <?php else: ?>
                                                                    <i class="bi bi-star"></i>
                                                                <?php endif; ?>
                                                            <?php endfor; ?>
                                                        </div>
                                                        <span class="">(<?php echo e($total_reviews); ?>)</span>
                                                    </div>
                                                    <h6 class="fw-semibold"><?php echo e($products_for_review->count()); ?> <?php echo e(translate('products')); ?></h6>
                                                </div>

                                                <div class="mb-3">
                                                    <div class="text-center d-inline-block">
                                                        <h3 class="mb-1"><?php echo e(round($rating_percentage)); ?>%</h3>
                                                        <div class="fs-12"><?php echo e(translate('positive_review')); ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php if(auth('customer')->id() == ''): ?>
                                                <div class="btn-circle chat-btn" style="--size: 2.5rem"
                                                     data-bs-toggle="modal" data-bs-target="#loginModal">
                                                    <i class="bi bi-chat-square-dots"></i>
                                                </div>
                                            <?php else: ?>
                                                <div class="btn-circle chat-btn" style="--size: 2.5rem"
                                                     data-bs-toggle="modal" data-bs-target="#contact_sellerModal">
                                                    <i class="bi bi-chat-square-dots"></i>
                                                </div>
                                            <?php endif; ?>
                                        </div>

                                        <a href="<?php echo e(route('shopView',[$product->seller->id])); ?>"
                                           class="btn btn-primary btn-block"><?php echo e(translate('Visit_Store')); ?></a>
                                    </div>
                                </div>
                            </div>

                            <?php echo $__env->make('theme-views.layouts.partials.modal._chat-with-seller',['seller_id'=>$product->seller->id,'shop_id'=>$product->seller->shop->id], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <?php endif; ?>
                    <?php else: ?>
                        <div class="card  order-0 order-sm-1">
                            <div class="card-body">
                                <div class="p-2 overlay shop-bg-card"
                                     data-bg-img="<?php echo e(asset("public/storage/shop/")); ?>/<?php echo e(\App\CPU\Helpers::get_business_settings('shop_banner')); ?>">
                                    <div class="media flex-wrap gap-3 p-2">
                                        <div class="avatar border rounded-circle" style="--size: 3.437rem">
                                            <img
                                                src="<?php echo e(asset("public/storage/company")); ?>/<?php echo e($web_config['fav_icon']->value); ?>"
                                                alt="" class="img-fit dark-support rounded-circle"
                                                onerror="this.src='<?php echo e(theme_asset('assets/img/image-place-holder.png')); ?>'">
                                        </div>

                                        <div class="media-body d-flex flex-column gap-2 text-absolute-whtie">
                                            <div class="d-flex flex-column gap-1 justify-content-start">
                                                <h5 class=""><?php echo e($web_config['name']->value); ?></h5>
                                                <div class="d-flex gap-2 align-items-center ">
                                                    <div class="star-rating text-gold fs-12">
                                                        <?php for($i = 1; $i <= 5; $i++): ?>
                                                            <?php if($i <= (int)$avg_rating): ?>
                                                                <i class="bi bi-star-fill"></i>
                                                            <?php elseif($avg_rating != 0 && $i <= (int)$avg_rating + 1.1 && $avg_rating > ((int)$avg_rating)): ?>
                                                                <i class="bi bi-star-half"></i>
                                                            <?php else: ?>
                                                                <i class="bi bi-star"></i>
                                                            <?php endif; ?>
                                                        <?php endfor; ?>
                                                    </div>

                                                    <span>(<?php echo e($total_reviews); ?>)</span>
                                                </div>
                                                <h6 class="fw-semibold"><?php echo e($products_for_review->count()); ?> <?php echo e(translate('Products')); ?></h6>

                                                <div class="mb-3">
                                                    <div class="text-center d-inline-block">
                                                        <h3 class="mb-1"><?php echo e(round($rating_percentage)); ?>

                                                            %</h3>
                                                        <div
                                                            class="fs-12"><?php echo e(translate('positive_review')); ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="<?php echo e(route('shopView',[0])); ?>"
                                       class="btn btn-primary btn-block"><?php echo e(translate('Visit_Store')); ?></a>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Similar Products From Other Stores -->
            <div class="py-4 mt-3">
                <div class="d-flex justify-content-between gap-3 mb-4">
                    <h2><?php echo e(translate('similar_Products_From_Other_Stores')); ?></h2>
                    <div class="swiper-nav d-flex gap-2 align-items-center">
                        <div class="swiper-button-prev top-rated-nav-prev position-static rounded-10"></div>
                        <div class="swiper-button-next top-rated-nav-next position-static rounded-10"></div>
                    </div>
                </div>
                <div class="swiper-container">
                    <!-- Swiper -->
                    <div class="position-relative">
                        <div class="swiper" data-swiper-loop="false" data-swiper-margin="20" data-swiper-autoplay="true"
                             data-swiper-pagination-el="null" data-swiper-navigation-next=".top-rated-nav-next"
                             data-swiper-navigation-prev=".top-rated-nav-prev"
                             data-swiper-breakpoints='{"0": {"slidesPerView": "1"}, "320": {"slidesPerView": "2"}, "992": {"slidesPerView": "3"}, "1200": {"slidesPerView": "4"}, "1400": {"slidesPerView": "5"}}'>
                            <div class="swiper-wrapper">
                                <?php if(count($relatedProducts)>0): ?>
                                    <?php $__currentLoopData = $relatedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="swiper-slide">
                                            <?php echo $__env->make('theme-views.partials._similar-product-large-card',['product'=>$product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <div class="card w-100 px-3 py-4">
                                        <h5 class="text-muted"><?php echo e(translate('no_similar_products_found')); ?>.</h5>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- End Main Content -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>

    <script>
        $('.remove-mask-img').on('click', function(){
            $('.show-more--content').removeClass('active')
        })
    </script>

    <script>
        getVariantPrice();
    </script>

    <script src="<?php echo e(theme_asset('assets/js/lightbox.min.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('theme-views.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tikka\resources\themes\theme_aster/theme-views/product/details.blade.php ENDPATH**/ ?>