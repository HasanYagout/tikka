<?php $__env->startSection('title',$product['name']); ?>

<?php $__env->startPush('css_or_js'); ?>
    <meta name="description" content="<?php echo e($product->slug); ?>">
    <meta name="keywords" content="<?php $__currentLoopData = explode(' ',$product['name']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyword): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($keyword.' , '); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>">
    <?php if($product->added_by=='seller'): ?>
        <meta name="author" content="<?php echo e($product->seller->shop?$product->seller->shop->name:$product->seller->f_name); ?>">
    <?php elseif($product->added_by=='admin'): ?>
        <meta name="author" content="<?php echo e($web_config['name']->value); ?>">
    <?php endif; ?>
    <!-- Viewport-->

    <?php if($product['meta_image']!=null): ?>
        <meta property="og:image" content="<?php echo e(asset("public/storage/product/meta")); ?>/<?php echo e($product->meta_image); ?>"/>
        <meta property="twitter:card"
              content="<?php echo e(asset("public/storage/product/meta")); ?>/<?php echo e($product->meta_image); ?>"/>
    <?php else: ?>
        <meta property="og:image" content="<?php echo e(asset("public/storage/product/thumbnail")); ?>/<?php echo e($product->thumbnail); ?>"/>
        <meta property="twitter:card"
              content="<?php echo e(asset("public/storage/product/thumbnail/")); ?>/<?php echo e($product->thumbnail); ?>"/>
    <?php endif; ?>

    <?php if($product['meta_title']!=null): ?>
        <meta property="og:title" content="<?php echo e($product->meta_title); ?>"/>
        <meta property="twitter:title" content="<?php echo e($product->meta_title); ?>"/>
    <?php else: ?>
        <meta property="og:title" content="<?php echo e($product->name); ?>"/>
        <meta property="twitter:title" content="<?php echo e($product->name); ?>"/>
    <?php endif; ?>
    <meta property="og:url" content="<?php echo e(route('product',[$product->slug])); ?>">

    <?php if($product['meta_description']!=null): ?>
        <meta property="twitter:description" content="<?php echo $product['meta_description']; ?>">
        <meta property="og:description" content="<?php echo $product['meta_description']; ?>">
    <?php else: ?>
        <meta property="og:description"
              content="<?php $__currentLoopData = explode(' ',$product['name']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyword): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($keyword.' , '); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>">
        <meta property="twitter:description"
              content="<?php $__currentLoopData = explode(' ',$product['name']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyword): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($keyword.' , '); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>">
    <?php endif; ?>
    <meta property="twitter:url" content="<?php echo e(route('product',[$product->slug])); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('public/assets/front-end/css/product-details.css')); ?>"/>
    <style>
        .btn-number:hover {
            color: <?php echo e($web_config['secondary_color']); ?>;

        }

        .for-total-price {
            margin- <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>: -30%;
        }

        .feature_header span {
            padding- <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>: 15px;
        }

        .flash-deals-background-image{
            background: <?php echo e($web_config['primary_color']); ?>10;
        }

        @media (max-width: 768px) {
            .for-total-price {
                padding- <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>: 30%;
            }

            .product-quantity {
                padding- <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>: 4%;
            }

            .for-margin-bnt-mobile {
                margin- <?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>: 7px;
            }

        }

        @media (max-width: 375px) {
            .for-margin-bnt-mobile {
                margin- <?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>: 3px;
            }

            .for-discount {
                margin- <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>: 10% !important;
            }

            .for-dicount-div {
                margin-top: -5%;
                margin- <?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>: -7%;
            }

            .product-quantity {
                margin- <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>: 4%;
            }

        }

        @media (max-width: 500px) {
            .for-dicount-div {
                margin- <?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>: -5%;
            }

            .for-total-price {
                margin- <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>: -20%;
            }

            .view-btn-div {
                float: <?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>;
            }

            .for-discount {
                margin- <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>: 7%;
            }
            .for-mobile-capacity {
                margin- <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>: 7%;
            }
        }
    </style>
    <style>
        thead {
            background: <?php echo e($web_config['primary_color']); ?> !important;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <div class="__inline-23">
        <!-- Page Content-->
        <div class="container mt-4 rtl" style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
            <!-- General info tab-->
            <div class="row <?php echo e(Session::get('direction') === "rtl" ? '__dir-rtl' : ''); ?>">
                <!-- Product gallery-->
                <div class="col-lg-9 col-12">
                    <div class="row">
                        <div class="col-lg-5 col-md-4 col-12">
                            <div class="cz-product-gallery">
                                <div class="cz-preview">
                                    <?php if($product->images!=null && json_decode($product->images)>0): ?>
                                        <?php if(json_decode($product->colors) && $product->color_image): ?>
                                            <?php $__currentLoopData = json_decode($product->color_image); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($photo->color != null): ?>
                                                    <div class="cz-preview-item d-flex align-items-center justify-content-center <?php echo e($key==0?'active':''); ?>"
                                                         id="image<?php echo e($photo->color); ?>">
                                                        <img class="cz-image-zoom img-responsive w-100 __max-h-323px"
                                                             onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                                             src="<?php echo e(asset("public/storage/product/$photo->image_name")); ?>"
                                                             data-zoom="<?php echo e(asset("public/storage/product/$photo->image_name")); ?>"
                                                             alt="Product image" width="">
                                                        <div class="cz-image-zoom-pane"></div>
                                                    </div>
                                                <?php else: ?>
                                                    <div class="cz-preview-item d-flex align-items-center justify-content-center <?php echo e($key==0?'active':''); ?>"
                                                         id="image<?php echo e($key); ?>">
                                                        <img class="cz-image-zoom img-responsive w-100 __max-h-323px"
                                                             onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                                             src="<?php echo e(asset("public/storage/product/$photo->image_name")); ?>"
                                                             data-zoom="<?php echo e(asset("public/storage/product/$photo->image_name")); ?>"
                                                             alt="Product image" width="">
                                                        <div class="cz-image-zoom-pane"></div>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                            <?php $__currentLoopData = json_decode($product->images); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="cz-preview-item d-flex align-items-center justify-content-center <?php echo e($key==0?'active':''); ?>"
                                                     id="image<?php echo e($key); ?>">
                                                    <img class="cz-image-zoom img-responsive w-100 __max-h-323px"
                                                         onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                                         src="<?php echo e(asset("public/storage/product/$photo")); ?>"
                                                         data-zoom="<?php echo e(asset("public/storage/product/$photo")); ?>"
                                                         alt="Product image" width="">
                                                    <div class="cz-image-zoom-pane"></div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                                <div class="cz">
                                    <div class="table-responsive __max-h-515px" data-simplebar>
                                        <div class="d-flex">
                                            <?php if($product->images!=null && json_decode($product->images)>0): ?>
                                                <?php if(json_decode($product->colors) && $product->color_image): ?>
                                                    <?php $__currentLoopData = json_decode($product->color_image); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($photo->color != null): ?>
                                                            <div class="cz-thumblist">
                                                                <a class="cz-thumblist-item  <?php echo e($key==0?'active':''); ?> d-flex align-items-center justify-content-center"
                                                                   id="preview-img<?php echo e($photo->color); ?>" href="#image<?php echo e($photo->color); ?>">
                                                                    <img
                                                                        onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                                                        src="<?php echo e(asset("public/storage/product/$photo->image_name")); ?>"
                                                                        alt="Product thumb">
                                                                </a>
                                                            </div>
                                                        <?php else: ?>
                                                            <div class="cz-thumblist">
                                                                <a class="cz-thumblist-item  <?php echo e($key==0?'active':''); ?> d-flex align-items-center justify-content-center"
                                                                   id="preview-img<?php echo e($key); ?>" href="#image<?php echo e($key); ?>">
                                                                    <img
                                                                        onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                                                        src="<?php echo e(asset("public/storage/product/$photo->image_name")); ?>"
                                                                        alt="Product thumb">
                                                                </a>
                                                            </div>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php else: ?>
                                                    <?php $__currentLoopData = json_decode($product->images); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="cz-thumblist">
                                                            <a class="cz-thumblist-item  <?php echo e($key==0?'active':''); ?> d-flex align-items-center justify-content-center"
                                                               id="preview-img<?php echo e($key); ?>" href="#image<?php echo e($key); ?>">
                                                                <img
                                                                    onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                                                    src="<?php echo e(asset("public/storage/product/$photo")); ?>"
                                                                    alt="Product thumb">
                                                            </a>
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Product details-->
                        <div class="col-lg-7 col-md-8 col-12 mt-md-0 mt-sm-3" style="direction: <?php echo e(Session::get('direction')); ?>">
                            <div class="details __h-100">
                                <span class="mb-2 __inline-24"><?php echo e($product->name); ?></span>
                                <div class="d-flex flex-wrap align-items-center mb-2 pro">
                                    <span
                                        class="d-inline-block  align-middle mt-1 <?php echo e(Session::get('direction') === "rtl" ? 'ml-md-2 ml-sm-0 pl-2' : 'mr-md-2 mr-sm-0 pr-2'); ?> __color-FE961C"><?php echo e($overallRating[0]); ?></span>
                                    <div class="star-rating" style="<?php echo e(Session::get('direction') === "rtl" ? 'margin-left: 25px;' : 'margin-right: 25px;'); ?>">
                                        <?php for($inc=0;$inc<5;$inc++): ?>
                                            <?php if($inc<$overallRating[0]): ?>
                                                <i class="sr-star czi-star-filled active"></i>
                                            <?php else: ?>
                                                <i class="sr-star czi-star"></i>
                                            <?php endif; ?>
                                        <?php endfor; ?>
                                    </div>
                                    <span class="font-regular font-for-tab d-inline-block font-size-sm text-body align-middle mt-1 <?php echo e(Session::get('direction') === "rtl" ? 'mr-1 ml-md-2 ml-1 pr-md-2 pr-sm-1 pl-md-2 pl-sm-1' : 'ml-1 mr-md-2 mr-1 pl-md-2 pl-sm-1 pr-md-2 pr-sm-1'); ?>"><?php echo e($overallRating[1]); ?> <?php echo e(\App\CPU\translate('Reviews')); ?></span>
                                    <span class="__inline-25"></span>
                                    <span class="font-regular font-for-tab d-inline-block font-size-sm text-body align-middle mt-1 <?php echo e(Session::get('direction') === "rtl" ? 'mr-1 ml-md-2 ml-1 pr-md-2 pr-sm-1 pl-md-2 pl-sm-1' : 'ml-1 mr-md-2 mr-1 pl-md-2 pl-sm-1 pr-md-2 pr-sm-1'); ?>"><?php echo e($countOrder); ?> <?php echo e(\App\CPU\translate('orders')); ?>   </span>
                                    <span class="__inline-25">    </span>
                                    <span class="font-regular font-for-tab d-inline-block font-size-sm text-body align-middle mt-1 <?php echo e(Session::get('direction') === "rtl" ? 'mr-1 ml-md-2 ml-0 pr-md-2 pr-sm-1 pl-md-2 pl-sm-1' : 'ml-1 mr-md-2 mr-0 pl-md-2 pl-sm-1 pr-md-2 pr-sm-1'); ?> text-capitalize">  <?php echo e($countWishlist); ?> <?php echo e(\App\CPU\translate('wish_listed')); ?> </span>

                                </div>
                                <div class="mb-3">
                                    <?php if($product->discount > 0): ?>
                                        <strike style="color: #E96A6A;" class="<?php echo e(Session::get('direction') === "rtl" ? 'ml-1' : 'mr-3'); ?>">
                                            <?php echo e(\App\CPU\Helpers::currency_converter($product->unit_price)); ?>

                                        </strike>
                                    <?php endif; ?>
                                    <span class="h3 font-weight-normal text-accent ">
                                        <?php echo e(\App\CPU\Helpers::get_price_range($product)); ?>

                                    </span>
                                    <span class="<?php echo e(Session::get('direction') === "rtl" ? 'mr-2' : 'ml-2'); ?> __text-12px font-regular">
                                        (<span><?php echo e(\App\CPU\translate('tax')); ?> : </span>
                                        <span id="set-tax-amount"></span>)
                                    </span>
                                </div>

                                <form id="add-to-cart-form" class="mb-2">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="id" value="<?php echo e($product->id); ?>">
                                    <div class="position-relative <?php echo e(Session::get('direction') === "rtl" ? 'ml-n4' : 'mr-n4'); ?> mb-2">
                                        <?php if(count(json_decode($product->colors)) > 0): ?>
                                            <div class="flex-start">
                                                <div class="product-description-label mt-2 text-body"><?php echo e(\App\CPU\translate('color')); ?>:
                                                </div>
                                                <div>
                                                    <ul class="list-inline checkbox-color mb-1 flex-start <?php echo e(Session::get('direction') === "rtl" ? 'mr-2' : 'ml-2'); ?>"
                                                        style="padding-<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>: 0;">
                                                        <?php $__currentLoopData = json_decode($product->colors); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div>
                                                                <li>
                                                                    <input type="radio"
                                                                        id="<?php echo e($product->id); ?>-color-<?php echo e(str_replace('#','',$color)); ?>"
                                                                        name="color" value="<?php echo e($color); ?>"
                                                                        <?php if($key == 0): ?> checked <?php endif; ?>>
                                                                    <label style="background: <?php echo e($color); ?>;"
                                                                        for="<?php echo e($product->id); ?>-color-<?php echo e(str_replace('#','',$color)); ?>"
                                                                        data-toggle="tooltip" onclick="focus_preview_image_by_color('<?php echo e(str_replace('#','',$color)); ?>')">
                                                                    <span class="outline"></span></label>
                                                                </li>
                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <?php
                                            $qty = 0;
                                            if(!empty($product->variation)){
                                            foreach (json_decode($product->variation) as $key => $variation) {
                                                    $qty += $variation->qty;
                                                }
                                            }
                                        ?>
                                    </div>
                                    <?php $__currentLoopData = json_decode($product->choice_options); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $choice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="row flex-start mx-0">
                                            <div
                                                class="product-description-label text-body mt-2 <?php echo e(Session::get('direction') === "rtl" ? 'pl-2' : 'pr-2'); ?>"><?php echo e($choice->title); ?>

                                                :
                                            </div>
                                            <div>
                                                <ul class="list-inline checkbox-alphanumeric checkbox-alphanumeric--style-1 mb-2 mx-1 flex-start row"
                                                    style="padding-<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>: 0;">
                                                    <?php $__currentLoopData = $choice->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div>
                                                            <li class="for-mobile-capacity">
                                                                <input type="radio"
                                                                    id="<?php echo e($choice->name); ?>-<?php echo e($option); ?>"
                                                                    name="<?php echo e($choice->name); ?>" value="<?php echo e($option); ?>"
                                                                    <?php if($key == 0): ?> checked <?php endif; ?> >
                                                                <label class="__text-12px"
                                                                    for="<?php echo e($choice->name); ?>-<?php echo e($option); ?>"><?php echo e($option); ?></label>
                                                            </li>
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                            </div>
                                        </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <!-- Quantity + Add to cart -->
                                    <div class="mt-2">
                                        <div class="product-quantity d-flex flex-wrap align-items-center __gap-15">
                                            <div class="d-flex align-items-center">
                                                <div class="product-description-label text-body mt-2"><?php echo e(\App\CPU\translate('Quantity')); ?>:</div>
                                                <div
                                                    class="d-flex justify-content-center align-items-center __w-160px"
                                                    style="color: <?php echo e($web_config['primary_color']); ?>">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-number __p-10" type="button"
                                                                data-type="minus" data-field="quantity"
                                                                disabled="disabled" style="color: <?php echo e($web_config['primary_color']); ?>">
                                                            -
                                                        </button>
                                                    </span>
                                                    <input type="text" name="quantity"
                                                        class="form-control input-number text-center cart-qty-field __inline-29"
                                                        placeholder="1" value="<?php echo e($product->minimum_order_qty ?? 1); ?>" product-type="<?php echo e($product->product_type); ?>" min="<?php echo e($product->minimum_order_qty ?? 1); ?>" max="100">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-number __p-10" type="button" product-type="<?php echo e($product->product_type); ?>" data-type="plus"
                                                                data-field="quantity" style="color: <?php echo e($web_config['primary_color']); ?>">
                                                        +
                                                        </button>
                                                    </span>
                                                </div>
                                            </div>
                                            <div id="chosen_price_div">
                                                <div class="d-flex justify-content-center align-items-center <?php echo e(Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'); ?>">
                                                    <div class="product-description-label"><strong><?php echo e(\App\CPU\translate('total_price')); ?></strong> : </div>
                                                    &nbsp; <strong id="chosen_price"></strong>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row no-gutters d-none mt-2 flex-start d-flex">
                                        <div class="col-12">
                                            <?php if(($product['product_type'] == 'physical') && ($product['current_stock']<=0)): ?>
                                                <h5 class="mt-3 text-danger"><?php echo e(\App\CPU\translate('out_of_stock')); ?></h5>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="__btn-grp mt-2 mb-3">
                                        <?php if(($product->added_by == 'seller' && ($seller_temporary_close || (isset($product->seller->shop) && $product->seller->shop->vacation_status && $current_date >= $seller_vacation_start_date && $current_date <= $seller_vacation_end_date))) ||
                                         ($product->added_by == 'admin' && ($inhouse_temporary_close || ($inhouse_vacation_status && $current_date >= $inhouse_vacation_start_date && $current_date <= $inhouse_vacation_end_date)))): ?>
                                            <button class="btn btn-secondary" type="button" disabled>
                                                <?php echo e(\App\CPU\translate('buy_now')); ?>

                                            </button>
                                            <button class="btn btn--primary string-limit" type="button" disabled>
                                                <?php echo e(\App\CPU\translate('add_to_cart')); ?>

                                            </button>
                                        <?php else: ?>
                                            <button class="btn btn-secondary element-center __iniline-26 btn-gap-<?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>" onclick="buy_now()" type="button">
                                                <span class="string-limit"><?php echo e(\App\CPU\translate('buy_now')); ?></span>
                                            </button>
                                            <button
                                                class="btn btn--primary element-center btn-gap-<?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>"
                                                onclick="addToCart()" type="button">
                                                <span class="string-limit"><?php echo e(\App\CPU\translate('add_to_cart')); ?></span>
                                            </button>
                                        <?php endif; ?>
                                        <button type="button" onclick="addWishlist('<?php echo e($product['id']); ?>')"
                                                class="btn __text-18px text-danger">
                                            <i class="fa <?php echo e(($wishlist_status == 1?'fa-heart':'fa-heart-o')); ?>" id="wishlist_icon_<?php echo e($product['id']); ?>"
                                            aria-hidden="true"></i>
                                            <span class="countWishlist-<?php echo e($product['id']); ?>"><?php echo e($countWishlist); ?></span>
                                        </button>
                                        <?php if(($product->added_by == 'seller' && ($seller_temporary_close || (isset($product->seller->shop) && $product->seller->shop->vacation_status && $current_date >= $seller_vacation_start_date && $current_date <= $seller_vacation_end_date))) ||
                                         ($product->added_by == 'admin' && ($inhouse_temporary_close || ($inhouse_vacation_status && $current_date >= $inhouse_vacation_start_date && $current_date <= $inhouse_vacation_end_date)))): ?>
                                            <div class="alert alert-danger" role="alert">
                                                <?php echo e(\App\CPU\translate('this_shop_is_temporary_closed_or_on_vacation._You_cannot_add_product_to_cart_from_this_shop_for_now')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </form>

                                <div style="text-align:<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;"
                                    class="sharethis-inline-share-buttons"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mt-4 rtl col-12" style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
                            <div class="row" >
                                <div class="col-12">
                                    <div class=" mt-1">
                                        <!-- Tabs-->
                                        <ul class="nav nav-tabs d-flex justify-content-center __mt-35" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link __inline-27 active " href="#overview" data-toggle="tab" role="tab">
                                                    <?php echo e(\App\CPU\translate('overview')); ?>

                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link __inline-27" href="#reviews" data-toggle="tab" role="tab">
                                                    <?php echo e(\App\CPU\translate('reviews')); ?>

                                                </a>
                                            </li>
                                        </ul>
                                        <div class="px-4 pt-lg-3 pb-3 mb-3 mr-0 mr-md-2 bg-white __review-overview __rounded-10">
                                            <div class="tab-content px-lg-3">
                                                <!-- Tech specs tab-->
                                                <div class="tab-pane fade show active" id="overview" role="tabpanel">
                                                    <div class="row pt-2 specification">
                                                        <?php if($product->video_url!=null): ?>
                                                            <div class="col-12 mb-4">
                                                                <iframe width="420" height="315"
                                                                        src="<?php echo e($product->video_url); ?>">
                                                                </iframe>
                                                            </div>
                                                        <?php endif; ?>

                                                        <div class="text-body col-lg-12 col-md-12 overflow-scroll">
                                                            <?php echo $product['details']; ?>

                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Reviews tab-->
                                                <div class="tab-pane fade" id="reviews" role="tabpanel">
                                                    <div class="row pt-2 pb-3">
                                                        <div class="col-lg-4 col-md-5 ">
                                                            <div class=" row d-flex justify-content-center align-items-center">
                                                                <div class="col-12 d-flex justify-content-center align-items-center">
                                                                    <h2 class="overall_review mb-2 __inline-28">
                                                                        <?php echo e($overallRating[0]); ?>

                                                                    </h2>
                                                                </div>
                                                                <div
                                                                    class="d-flex justify-content-center align-items-center star-rating ">
                                                                    <?php if(round($overallRating[0])==5): ?>
                                                                        <?php for($i = 0; $i < 5; $i++): ?>
                                                                            <i class="czi-star-filled font-size-sm text-accent <?php echo e(Session::get('direction') === "rtl" ? 'ml-1' : 'mr-1'); ?>"></i>
                                                                        <?php endfor; ?>
                                                                    <?php endif; ?>
                                                                    <?php if(round($overallRating[0])==4): ?>
                                                                        <?php for($i = 0; $i < 4; $i++): ?>
                                                                            <i class="czi-star-filled font-size-sm text-accent <?php echo e(Session::get('direction') === "rtl" ? 'ml-1' : 'mr-1'); ?>"></i>
                                                                        <?php endfor; ?>
                                                                        <i class="czi-star font-size-sm text-muted <?php echo e(Session::get('direction') === "rtl" ? 'ml-1' : 'mr-1'); ?>"></i>
                                                                    <?php endif; ?>
                                                                    <?php if(round($overallRating[0])==3): ?>
                                                                        <?php for($i = 0; $i < 3; $i++): ?>
                                                                            <i class="czi-star-filled font-size-sm text-accent <?php echo e(Session::get('direction') === "rtl" ? 'ml-1' : 'mr-1'); ?>"></i>
                                                                        <?php endfor; ?>
                                                                        <?php for($j = 0; $j < 2; $j++): ?>
                                                                            <i class="czi-star font-size-sm text-accent <?php echo e(Session::get('direction') === "rtl" ? 'ml-1' : 'mr-1'); ?>"></i>
                                                                        <?php endfor; ?>
                                                                    <?php endif; ?>
                                                                    <?php if(round($overallRating[0])==2): ?>
                                                                        <?php for($i = 0; $i < 2; $i++): ?>
                                                                            <i class="czi-star-filled font-size-sm text-accent <?php echo e(Session::get('direction') === "rtl" ? 'ml-1' : 'mr-1'); ?>"></i>
                                                                        <?php endfor; ?>
                                                                        <?php for($j = 0; $j < 3; $j++): ?>
                                                                            <i class="czi-star font-size-sm text-accent <?php echo e(Session::get('direction') === "rtl" ? 'ml-1' : 'mr-1'); ?>"></i>
                                                                        <?php endfor; ?>
                                                                    <?php endif; ?>
                                                                    <?php if(round($overallRating[0])==1): ?>
                                                                        <?php for($i = 0; $i < 4; $i++): ?>
                                                                            <i class="czi-star font-size-sm text-accent <?php echo e(Session::get('direction') === "rtl" ? 'ml-1' : 'mr-1'); ?>"></i>
                                                                        <?php endfor; ?>
                                                                        <i class="czi-star-filled font-size-sm text-accent <?php echo e(Session::get('direction') === "rtl" ? 'ml-1' : 'mr-1'); ?>"></i>
                                                                    <?php endif; ?>
                                                                    <?php if(round($overallRating[0])==0): ?>
                                                                        <?php for($i = 0; $i < 5; $i++): ?>
                                                                            <i class="czi-star font-size-sm text-muted <?php echo e(Session::get('direction') === "rtl" ? 'ml-1' : 'mr-1'); ?>"></i>
                                                                        <?php endfor; ?>
                                                                    <?php endif; ?>
                                                                </div>
                                                                <div class="col-12 d-flex justify-content-center align-items-center mt-2">
                                                                    <span class="text-center">
                                                                        <?php echo e($reviews_of_product->total()); ?> <?php echo e(\App\CPU\translate('ratings')); ?>

                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-8 col-md-7 pt-sm-3 pt-md-0" >
                                                            <div class="d-flex align-items-center mb-2 font-size-sm">
                                                                <div
                                                                    class="__rev-txt"><span
                                                                        class="d-inline-block align-middle text-body"><?php echo e(\App\CPU\translate('Excellent')); ?></span>
                                                                </div>
                                                                <div class="w-0 flex-grow">
                                                                    <div class="progress text-body __h-5px">
                                                                        <div class="progress-bar " role="progressbar"
                                                                            style="background-color: <?php echo e($web_config['primary_color']); ?> !important;width: <?php echo $widthRating = ($rating[0] != 0) ? ($rating[0] / $overallRating[1]) * 100 : (0); ?>%;"
                                                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-1 text-body">
                                                                    <span
                                                                        class=" <?php echo e(Session::get('direction') === "rtl" ? 'mr-3 float-left' : 'ml-3 float-right'); ?> ">
                                                                        <?php echo e($rating[0]); ?>

                                                                    </span>
                                                                </div>
                                                            </div>

                                                            <div class="d-flex align-items-center mb-2 text-body font-size-sm">
                                                                <div
                                                                    class="__rev-txt"><span
                                                                        class="d-inline-block align-middle "><?php echo e(\App\CPU\translate('Good')); ?></span>
                                                                </div>
                                                                <div class="w-0 flex-grow">
                                                                    <div class="progress __h-5px">
                                                                        <div class="progress-bar" role="progressbar"
                                                                            style="background-color: <?php echo e($web_config['primary_color']); ?> !important;width: <?php echo $widthRating = ($rating[1] != 0) ? ($rating[1] / $overallRating[1]) * 100 : (0); ?>%; background-color: #a7e453;"
                                                                            aria-valuenow="27" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-1">
                                                                    <span
                                                                        class="<?php echo e(Session::get('direction') === "rtl" ? 'mr-3 float-left' : 'ml-3 float-right'); ?>">
                                                                            <?php echo e($rating[1]); ?>

                                                                    </span>
                                                                </div>
                                                            </div>

                                                            <div class="d-flex align-items-center mb-2 text-body font-size-sm">
                                                                <div
                                                                    class="__rev-txt"><span
                                                                        class="d-inline-block align-middle "><?php echo e(\App\CPU\translate('Average')); ?></span>
                                                                </div>
                                                                <div class="w-0 flex-grow">
                                                                    <div class="progress __h-5px">
                                                                        <div class="progress-bar" role="progressbar"
                                                                            style="background-color: <?php echo e($web_config['primary_color']); ?> !important;width: <?php echo $widthRating = ($rating[2] != 0) ? ($rating[2] / $overallRating[1]) * 100 : (0); ?>%; background-color: #ffda75;"
                                                                            aria-valuenow="17" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-1">
                                                                    <span
                                                                        class="<?php echo e(Session::get('direction') === "rtl" ? 'mr-3 float-left' : 'ml-3 float-right'); ?>">
                                                                        <?php echo e($rating[2]); ?>

                                                                    </span>
                                                                </div>
                                                            </div>

                                                            <div class="d-flex align-items-center mb-2 text-body font-size-sm">
                                                                <div
                                                                    class="__rev-txt "><span
                                                                        class="d-inline-block align-middle"><?php echo e(\App\CPU\translate('Below Average')); ?></span>
                                                                </div>
                                                                <div class="w-0 flex-grow">
                                                                    <div class="progress __h-5px">
                                                                        <div class="progress-bar" role="progressbar"
                                                                            style="background-color: <?php echo e($web_config['primary_color']); ?> !important;width: <?php echo $widthRating = ($rating[3] != 0) ? ($rating[3] / $overallRating[1]) * 100 : (0); ?>%; background-color: #fea569;"
                                                                            aria-valuenow="9" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-1">
                                                                    <span
                                                                            class="<?php echo e(Session::get('direction') === "rtl" ? 'mr-3 float-left' : 'ml-3 float-right'); ?>">
                                                                        <?php echo e($rating[3]); ?>

                                                                    </span>
                                                                </div>
                                                            </div>

                                                            <div class="d-flex align-items-center text-body font-size-sm">
                                                                <div
                                                                    class="__rev-txt"><span
                                                                        class="d-inline-block align-middle "><?php echo e(\App\CPU\translate('Poor')); ?></span>
                                                                </div>
                                                                <div class="w-0 flex-grow">
                                                                    <div class="progress __h-5px">
                                                                        <div class="progress-bar" role="progressbar"
                                                                            style="background-color: <?php echo e($web_config['primary_color']); ?> !important;backbround-color:<?php echo e($web_config['primary_color']); ?>;width: <?php echo $widthRating = ($rating[4] != 0) ? ($rating[4] / $overallRating[1]) * 100 : (0); ?>%;"
                                                                            aria-valuenow="4" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-1">
                                                                    <span
                                                                        class="<?php echo e(Session::get('direction') === "rtl" ? 'mr-3 float-left' : 'ml-3 float-right'); ?>">
                                                                            <?php echo e($rating[4]); ?>

                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row pb-4 mb-3">
                                                        <div class="__inline-30">
                                                            <span class="text-capitalize"><?php echo e(\App\CPU\translate('Product Review')); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="row pb-4">
                                                        <div class="col-12" id="product-review-list">



                                                            <?php if(count($product->reviews)==0): ?>
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <h6 class="text-danger text-center m-0"><?php echo e(\App\CPU\translate('product_review_not_available')); ?></h6>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>

                                                        </div>
                                                        <?php if(count($product->reviews) > 2): ?>
                                                        <div class="col-12">
                                                            <div class="card-footer d-flex justify-content-center align-items-center">
                                                                <button class="btn text-white" style="background: <?php echo e($web_config['primary_color']); ?>;" onclick="load_review()"><?php echo e(\App\CPU\translate('view more')); ?></button>
                                                            </div>
                                                        </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-3 ">
                    <div class="product-details-shipping-details">
                        <div class="shipping-details-bottom-border">
                            <div class="px-3 py-3">
                                <img class="<?php echo e(Session::get('direction') === "rtl" ? 'float-right ml-2' : 'mr-2'); ?> __img-20"  src="<?php echo e(asset("public/assets/front-end/png/Payment.png")); ?>"
                                        alt="">
                                <span><?php echo e(\App\CPU\translate('Safe Payment')); ?></span>
                            </div>
                        </div>
                        <div  class="shipping-details-bottom-border">
                            <div class="px-3 py-3">
                                <img class="<?php echo e(Session::get('direction') === "rtl" ? 'float-right ml-2' : 'mr-2'); ?> __img-20"
                                    src="<?php echo e(asset("public/assets/front-end/png/money.png")); ?>"
                                        alt="">
                                <span><?php echo e(\App\CPU\translate('7 Days Return Policy')); ?></span>
                            </div>
                        </div>
                        <div class="shipping-details-bottom-border">
                        <div class="px-3 py-3">
                                <img class="<?php echo e(Session::get('direction') === "rtl" ? 'float-right ml-2' : 'mr-2'); ?> __img-20"
                                    src="<?php echo e(asset("public/assets/front-end/png/Genuine.png")); ?>"
                                    alt="">
                                <span><?php echo e(\App\CPU\translate('100% Authentic Products')); ?></span>
                        </div>
                        </div>
                    </div>
                    <div class="__inline-31">

                        <?php if($product->added_by=='seller'): ?>
                            <?php if(isset($product->seller->shop)): ?>
                                <div class="row">
                                    <div class="col-12 position-relative">
                                        <div class="d-flex __seller-author align-items-center">
                                            <div>
                                                <img class="__img-60 img-circle" src="<?php echo e(asset('public/storage/shop')); ?>/<?php echo e($product->seller->shop->image); ?>"
                                                    onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                                    alt="">
                                            </div>
                                            <div class="<?php echo e(Session::get('direction') === "rtl" ? 'mr-2' : 'ml-2'); ?> w-0 flex-grow">
                                                <h6>
                                                    <?php echo e($product->seller->shop->name); ?>

                                                </h6>
                                                <span><?php echo e(\App\CPU\translate('Seller_info')); ?></span>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <?php if(auth('customer')->id() == ''): ?>
                                            <a href="<?php echo e(route('customer.auth.login')); ?>">
                                                <div class="__chat-seller-btn" style="color:<?php echo e($web_config['primary_color']); ?>;">
                                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M12.25 0.875C12.4821 0.875 12.7046 0.967187 12.8687 1.13128C13.0328 1.29538 13.125 1.51794 13.125 1.75V8.75C13.125 8.98206 13.0328 9.20462 12.8687 9.36872C12.7046 9.53281 12.4821 9.625 12.25 9.625H3.86225C3.39816 9.6251 2.95311 9.80954 2.625 10.1378L0.875 11.8878V1.75C0.875 1.51794 0.967187 1.29538 1.13128 1.13128C1.29538 0.967187 1.51794 0.875 1.75 0.875H12.25ZM1.75 0C1.28587 0 0.840752 0.184374 0.512563 0.512563C0.184374 0.840752 0 1.28587 0 1.75L0 12.9439C1.8388e-05 13.0304 0.0257185 13.1151 0.0738476 13.187C0.121977 13.259 0.190371 13.315 0.270374 13.3481C0.350378 13.3812 0.438393 13.3898 0.523282 13.3728C0.60817 13.3558 0.686114 13.314 0.74725 13.2528L3.24362 10.7564C3.40768 10.5923 3.6302 10.5 3.86225 10.5H12.25C12.7141 10.5 13.1592 10.3156 13.4874 9.98744C13.8156 9.65925 14 9.21413 14 8.75V1.75C14 1.28587 13.8156 0.840752 13.4874 0.512563C13.1592 0.184374 12.7141 0 12.25 0L1.75 0Z" fill="<?php echo e($web_config['primary_color']); ?>"/>
                                                        <path d="M4.375 5.25C4.375 5.48206 4.28281 5.70462 4.11872 5.86872C3.95462 6.03281 3.73206 6.125 3.5 6.125C3.26794 6.125 3.04538 6.03281 2.88128 5.86872C2.71719 5.70462 2.625 5.48206 2.625 5.25C2.625 5.01794 2.71719 4.79538 2.88128 4.63128C3.04538 4.46719 3.26794 4.375 3.5 4.375C3.73206 4.375 3.95462 4.46719 4.11872 4.63128C4.28281 4.79538 4.375 5.01794 4.375 5.25ZM7.875 5.25C7.875 5.48206 7.78281 5.70462 7.61872 5.86872C7.45462 6.03281 7.23206 6.125 7 6.125C6.76794 6.125 6.54538 6.03281 6.38128 5.86872C6.21719 5.70462 6.125 5.48206 6.125 5.25C6.125 5.01794 6.21719 4.79538 6.38128 4.63128C6.54538 4.46719 6.76794 4.375 7 4.375C7.23206 4.375 7.45462 4.46719 7.61872 4.63128C7.78281 4.79538 7.875 5.01794 7.875 5.25ZM11.375 5.25C11.375 5.48206 11.2828 5.70462 11.1187 5.86872C10.9546 6.03281 10.7321 6.125 10.5 6.125C10.2679 6.125 10.0454 6.03281 9.88128 5.86872C9.71719 5.70462 9.625 5.48206 9.625 5.25C9.625 5.01794 9.71719 4.79538 9.88128 4.63128C10.0454 4.46719 10.2679 4.375 10.5 4.375C10.7321 4.375 10.9546 4.46719 11.1187 4.63128C11.2828 4.79538 11.375 5.01794 11.375 5.25Z" fill="<?php echo e($web_config['primary_color']); ?>"/>
                                                    </svg>
                                                    <span><?php echo e(\App\CPU\translate('chat')); ?></span>
                                                </div>
                                            </a>
                                            <?php else: ?>
                                                <div class="__chat-seller-btn cursor-pointer" id="<?php echo e(($product->added_by == 'seller' && ($seller_temporary_close || ($product->seller->shop->vacation_status && $current_date >= $seller_vacation_start_date && $current_date <= $seller_vacation_end_date))) ? '' : 'contact-seller'); ?>" style="color:<?php echo e($web_config['primary_color']); ?>;">
                                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M12.25 0.875C12.4821 0.875 12.7046 0.967187 12.8687 1.13128C13.0328 1.29538 13.125 1.51794 13.125 1.75V8.75C13.125 8.98206 13.0328 9.20462 12.8687 9.36872C12.7046 9.53281 12.4821 9.625 12.25 9.625H3.86225C3.39816 9.6251 2.95311 9.80954 2.625 10.1378L0.875 11.8878V1.75C0.875 1.51794 0.967187 1.29538 1.13128 1.13128C1.29538 0.967187 1.51794 0.875 1.75 0.875H12.25ZM1.75 0C1.28587 0 0.840752 0.184374 0.512563 0.512563C0.184374 0.840752 0 1.28587 0 1.75L0 12.9439C1.8388e-05 13.0304 0.0257185 13.1151 0.0738476 13.187C0.121977 13.259 0.190371 13.315 0.270374 13.3481C0.350378 13.3812 0.438393 13.3898 0.523282 13.3728C0.60817 13.3558 0.686114 13.314 0.74725 13.2528L3.24362 10.7564C3.40768 10.5923 3.6302 10.5 3.86225 10.5H12.25C12.7141 10.5 13.1592 10.3156 13.4874 9.98744C13.8156 9.65925 14 9.21413 14 8.75V1.75C14 1.28587 13.8156 0.840752 13.4874 0.512563C13.1592 0.184374 12.7141 0 12.25 0L1.75 0Z" fill="<?php echo e($web_config['primary_color']); ?>"/>
                                                        <path d="M4.375 5.25C4.375 5.48206 4.28281 5.70462 4.11872 5.86872C3.95462 6.03281 3.73206 6.125 3.5 6.125C3.26794 6.125 3.04538 6.03281 2.88128 5.86872C2.71719 5.70462 2.625 5.48206 2.625 5.25C2.625 5.01794 2.71719 4.79538 2.88128 4.63128C3.04538 4.46719 3.26794 4.375 3.5 4.375C3.73206 4.375 3.95462 4.46719 4.11872 4.63128C4.28281 4.79538 4.375 5.01794 4.375 5.25ZM7.875 5.25C7.875 5.48206 7.78281 5.70462 7.61872 5.86872C7.45462 6.03281 7.23206 6.125 7 6.125C6.76794 6.125 6.54538 6.03281 6.38128 5.86872C6.21719 5.70462 6.125 5.48206 6.125 5.25C6.125 5.01794 6.21719 4.79538 6.38128 4.63128C6.54538 4.46719 6.76794 4.375 7 4.375C7.23206 4.375 7.45462 4.46719 7.61872 4.63128C7.78281 4.79538 7.875 5.01794 7.875 5.25ZM11.375 5.25C11.375 5.48206 11.2828 5.70462 11.1187 5.86872C10.9546 6.03281 10.7321 6.125 10.5 6.125C10.2679 6.125 10.0454 6.03281 9.88128 5.86872C9.71719 5.70462 9.625 5.48206 9.625 5.25C9.625 5.01794 9.71719 4.79538 9.88128 4.63128C10.0454 4.46719 10.2679 4.375 10.5 4.375C10.7321 4.375 10.9546 4.46719 11.1187 4.63128C11.2828 4.79538 11.375 5.01794 11.375 5.25Z" fill="<?php echo e($web_config['primary_color']); ?>"/>
                                                    </svg>
                                                    <span><?php echo e(\App\CPU\translate('chat')); ?></span>
                                                </div>
                                            <?php endif; ?>

                                            <?php if(($product->added_by == 'seller' && ($seller_temporary_close || ($product->seller->shop->vacation_status && $current_date >= $seller_vacation_start_date && $current_date <= $seller_vacation_end_date)))): ?>
                                                <span class="chat-seller-info" style="position: absolute; inset-inline-end: 24px; inset-block-start: -4px" data-toggle="tooltip" title="<?php echo e(\App\CPU\translate('this_shop_is_temporary_closed_or_on_vacation._You_cannot_add_product_to_cart_from_this_shop_for_now')); ?>">
                                                    <img src="<?php echo e(asset('/public/assets/front-end/img/info.png')); ?>" alt="i">
                                                </span>
                                            <?php endif; ?>
                                        </div>

                                    </div>
                                    <div class="col-12 msg-option mt-2" id="msg-option">

                                            <form action="">
                                            <input type="text" class="seller_id" hidden seller-id="<?php echo e($product->seller->id); ?>">
                                            <textarea shop-id="<?php echo e($product->seller->shop->id); ?>" class="chatInputBox form-control"
                                                    id="chatInputBox" rows="5"> </textarea>

                                            <div class="d-flex mt-2 __gap-15">
                                                <button class="btn btn-secondary text-white d-block w-47" id="cancelBtn"><?php echo e(\App\CPU\translate('cancel')); ?>

                                                </button>
                                                <button class="btn btn-success text-white d-block w-47" id="sendBtn"><?php echo e(\App\CPU\translate('send')); ?></button>
                                            </div>

                                        </form>

                                    </div>

                                    <div class="col-12 mt-2">
                                        <div class="row d-flex justify-content-between">
                                            <div class="col-6 ">
                                                <div class="d-flex justify-content-center align-items-center rounded __h-79px" style="background:<?php echo e($web_config['primary_color']); ?>10;">
                                                    <div class="text-center">
                                                        <span style="color: <?php echo e($web_config['primary_color']); ?>;font-weight: 700;
                                                        font-size: 26px;">
                                                        <?php echo e($total_reviews); ?>

                                                        </span><br>
                                                        <span class="__text-12px">
                                                            <?php echo e(\App\CPU\translate('reviews')); ?>

                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="d-flex justify-content-center align-items-center rounded __h-79px" style="background:<?php echo e($web_config['primary_color']); ?>10;">
                                                    <div class="text-center">
                                                        <span style="color: <?php echo e($web_config['primary_color']); ?>;font-weight: 700;
                                                        font-size: 26px;">
                                                            <?php echo e($products_for_review->count()); ?>

                                                        </span><br>
                                                        <span class="__text-12px">
                                                            <?php echo e(\App\CPU\translate('products')); ?>

                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-3">
                                        <div>
                                            <a href="<?php echo e(route('shopView',[$product->seller->id])); ?>" class="w-100 d-block text-center">
                                                <button class="btn w-100 d-block text-center" style="background: <?php echo e($web_config['primary_color']); ?>;color:#ffffff">
                                                    <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                                    <?php echo e(\App\CPU\translate('Visit Store')); ?>

                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php else: ?>
                            <div class="row d-flex justify-content-between">
                                <div class="col-9 ">
                                    <div class="row d-flex ">
                                        <div>
                                            <img class="__inline-32"
                                                src="<?php echo e(asset("public/storage/company")); ?>/<?php echo e($web_config['fav_icon']->value); ?>"
                                                onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                                alt="">
                                        </div>
                                        <div class="<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'ml-3'); ?>">
                                            <span class="font-bold __text-16px">
                                                <?php echo e($web_config['name']->value); ?>

                                            </span><br>
                                        </div>

                                        <?php if($product->added_by == 'admin' && ($inhouse_temporary_close || ($inhouse_vacation_status && $current_date >= $inhouse_vacation_start_date && $current_date <= $inhouse_vacation_end_date))): ?>
                                            <div class="<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'ml-3'); ?>">
                                                <span class="chat-seller-info" data-toggle="tooltip" title="<?php echo e(\App\CPU\translate('this_shop_is_temporary_closed_or_on_vacation._You_cannot_add_product_to_cart_from_this_shop_for_now')); ?>">
                                                    <img src="<?php echo e(asset('/public/assets/front-end/img/info.png')); ?>" alt="i">
                                                </span>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                </div>

                                <div class="col-12 mt-2">
                                    <div class="row d-flex justify-content-between">
                                        <div class="col-6 ">
                                            <div class="d-flex justify-content-center align-items-center rounded __h-79px" style="background:<?php echo e($web_config['primary_color']); ?>10;">
                                                <div class="text-center">
                                                    <span class="font-bold __text-26px" style="color: <?php echo e($web_config['primary_color']); ?>;">
                                                        <?php echo e($total_reviews); ?>

                                                    </span><br>
                                                    <span class="__text-12px">
                                                        <?php echo e(\App\CPU\translate('reviews')); ?>

                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="d-flex justify-content-center align-items-center rounded __h-79px" style="background:<?php echo e($web_config['primary_color']); ?>10;">
                                                <div class="text-center">
                                                    <span class="font-bold __text-26px" style="color: <?php echo e($web_config['primary_color']); ?>;">
                                                        <?php echo e($products_for_review->count()); ?>

                                                    </span><br>
                                                    <span class="__text-12px">
                                                        <?php echo e(\App\CPU\translate('products')); ?>

                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mt-2">
                                    <div class="row">
                                        <a href="<?php echo e(route('shopView',[0])); ?>" class="text-center d-block w-100">
                                        <button class="btn text-center d-block w-100" style="background: <?php echo e($web_config['primary_color']); ?>;color:#ffffff">
                                            <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                            <?php echo e(\App\CPU\translate('Visit Store')); ?>

                                        </button>
                                    </a>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="px-3 py-3">
                        <div class="row d-flex justify-content-center">
                            <span class="text-center __text-16px font-bold">
                                <?php echo e(\App\CPU\translate('More From The Store')); ?>

                            </span>
                        </div>
                    </div>
                    <div>
                        <?php $__currentLoopData = $more_product_from_seller; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo $__env->make('web-views.partials.seller-products-product-details',['product'=>$item,'decimal_point_settings'=>$decimal_point_settings], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product carousel (You may also like)-->
        <div class="container  mb-3 rtl" style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
            <div class="row flex-between">
                <div class="text-capitalize font-bold __text-30px" style="<?php echo e(Session::get('direction') === "rtl" ? 'margin-right: 5px;' : 'margin-left: 5px;'); ?>">
                    <span><?php echo e(\App\CPU\translate('similar_products')); ?></span>
                </div>

                <div class="view_all d-flex justify-content-center align-items-center">
                    <div>
                        <?php ($category=json_decode($product['category_ids'])); ?>
                        <?php if($category): ?>
                            <a class="text-capitalize view-all-text" style="color:<?php echo e($web_config['primary_color']); ?> !important;<?php echo e(Session::get('direction') === "rtl" ? 'margin-left:10px;' : 'margin-right: 8px;'); ?>"
                            href="<?php echo e(route('products',['id'=> $category[0]->id,'data_from'=>'category','page'=>1])); ?>"><?php echo e(\App\CPU\translate('view_all')); ?>

                            <i class="czi-arrow-<?php echo e(Session::get('direction') === "rtl" ? 'left mr-1 ml-n1 mt-1 ' : 'right ml-1 mr-n1'); ?>"></i>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <!-- Grid-->

            <!-- Product-->
            <div class="row mt-4">
                <?php if(count($relatedProducts)>0): ?>
                    <?php $__currentLoopData = $relatedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $relatedProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-xl-2 col-sm-3 col-6 mb-4">
                            <?php echo $__env->make('web-views.partials._single-product',['product'=>$relatedProduct,'decimal_point_settings'=>$decimal_point_settings], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h6 ><?php echo e(\App\CPU\translate('similar')); ?> <?php echo e(\App\CPU\translate('product_not_available')); ?></h6>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="modal fade rtl" id="show-modal-view" tabindex="-1" role="dialog" aria-labelledby="show-modal-image"
            aria-hidden="true" style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body flex justify-content-center">
                        <button class="btn btn-default __inline-33" style="<?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>: -7px;"
                                data-dismiss="modal">
                            <i class="fa fa-close"></i>
                        </button>
                        <img class="element-center" id="attachment-view" src="">
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>

    <script type="text/javascript">
        cartQuantityInitialize();
        getVariantPrice();
        $('#add-to-cart-form input').on('change', function () {
            getVariantPrice();
        });

        function showInstaImage(link) {
            $("#attachment-view").attr("src", link);
            $('#show-modal-view').modal('toggle')
        }

        function focus_preview_image_by_color(key){
            $('a[href="#image'+key+'"]')[0].click();
        }
    </script>
    <script>
        $( document ).ready(function() {
            load_review();
        });
        let load_review_count = 1;
        function load_review()
        {

            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
            $.ajax({
                    type: "post",
                    url: '<?php echo e(route('review-list-product')); ?>',
                    data:{
                        product_id:<?php echo e($product->id); ?>,
                        offset:load_review_count
                    },
                    success: function (data) {
                        $('#product-review-list').append(data.productReview)
                        if(data.not_empty == 0 && load_review_count>2){
                            toastr.info('<?php echo e(\App\CPU\translate('no more review remain to load')); ?>', {
                                CloseButton: true,
                                ProgressBar: true
                            });
                            console.log('iff');
                        }
                    }
                });
                load_review_count++
        }
    </script>


    <script>
        $('#contact-seller').on('click', function (e) {
            // $('#seller_details').css('height', '200px');
            $('#seller_details').animate({'height': '276px'});
            $('#msg-option').css('display', 'block');
        });
        $('#sendBtn').on('click', function (e) {
            e.preventDefault();
            let msgValue = $('#msg-option').find('textarea').val();
            let data = {
                message: msgValue,
                shop_id: $('#msg-option').find('textarea').attr('shop-id'),
                seller_id: $('.msg-option').find('.seller_id').attr('seller-id'),
            }
            if (msgValue != '') {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "post",
                    url: '<?php echo e(route('messages_store')); ?>',
                    data: data,
                    success: function (respons) {
                        /* console.log('send successfully'); */
                        toastr.success("<?php echo e(translate('send_successfully')); ?>", {
                        CloseButton: true,
                        ProgressBar: true
                    });
                    }
                });
                $('#chatInputBox').val('');
                $('#msg-option').css('display', 'none');
                $('#contact-seller').find('.contact').attr('disabled', '');
                $('#seller_details').animate({'height': '125px'});
                $('#go_to_chatbox').css('display', 'block');
            } else {
                console.log('say something');
            }
        });
        $('#cancelBtn').on('click', function (e) {
            e.preventDefault();
            $('#seller_details').animate({'height': '114px'});
            $('#msg-option').css('display', 'none');
        });
    </script>

    <script type="text/javascript"
            src="https://platform-api.sharethis.com/js/sharethis.js#property=5f55f75bde227f0012147049&product=sticky-share-buttons"
            async="async"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.front-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tikka\resources\themes\default/web-views/products/details.blade.php ENDPATH**/ ?>
