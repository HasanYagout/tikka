<?php $__env->startSection('title', $web_config['name']->value.' '.\App\CPU\translate('Online Shopping').' | '.$web_config['name']->value.' '.\App\CPU\translate(' Ecommerce')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <meta property="og:image" content="<?php echo e(asset('public/storage/company')); ?>/<?php echo e($web_config['web_logo']->value); ?>"/>
    <meta property="og:title" content="Welcome To <?php echo e($web_config['name']->value); ?> Home"/>
    <meta property="og:url" content="<?php echo e(env('APP_URL')); ?>">
    <meta property="og:description" content="<?php echo substr($web_config['about']->value,0,100); ?>">

    <meta property="twitter:card" content="<?php echo e(asset('public/storage/company')); ?>/<?php echo e($web_config['web_logo']->value); ?>"/>
    <meta property="twitter:title" content="Welcome To <?php echo e($web_config['name']->value); ?> Home"/>
    <meta property="twitter:url" content="<?php echo e(env('APP_URL')); ?>">
    <meta property="twitter:description" content="<?php echo substr($web_config['about']->value,0,100); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('public/assets/front-end')); ?>/css/home.css"/>
    <style>
        .cz-countdown-days {
            border: .5px solid<?php echo e($web_config['primary_color']); ?>;
        }

        .btn-scroll-top {
            background: <?php echo e($web_config['primary_color']); ?>;
        }

        .__best-selling:hover .ptr,
        .flash_deal_product:hover .flash-product-title {
            color: <?php echo e($web_config['primary_color']); ?>;
        }

        .cz-countdown-hours {
            border: .5px solid<?php echo e($web_config['primary_color']); ?>;
        }

        .cz-countdown-minutes {
            border: .5px solid<?php echo e($web_config['primary_color']); ?>;
        }

        .cz-countdown-seconds {
            border: .5px solid<?php echo e($web_config['primary_color']); ?>;
        }

        .flash_deal_product_details .flash-product-price {
            color: <?php echo e($web_config['primary_color']); ?>;
        }

        .featured_deal_left {
            background: <?php echo e($web_config['primary_color']); ?> 0% 0% no-repeat padding-box;
        }

        .category_div:hover {
            color: <?php echo e($web_config['secondary_color']); ?>;
        }

        .deal_of_the_day {
            background: <?php echo e($web_config['secondary_color']); ?>;
        }

        .best-selleing-image {
            background: <?php echo e($web_config['primary_color']); ?>10;
        }

        .top-rated-image {
            background: <?php echo e($web_config['primary_color']); ?>10;
        }

        @media (max-width: 800px) {
            .categories-view-all {
            <?php echo e(session('direction') === "rtl" ? 'margin-left: 10px;' : 'margin-right: 6px;'); ?>


            }

            .categories-title {
            <?php echo e(Session::get('direction') === "rtl" ? 'margin-right: 0px;' : 'margin-left: 6px;'); ?>


            }

            .seller-list-title {
            <?php echo e(Session::get('direction') === "rtl" ? 'margin-right: 0px;' : 'margin-left: 10px;'); ?>


            }

            .seller-list-view-all {
            <?php echo e(Session::get('direction') === "rtl" ? 'margin-left: 20px;' : 'margin-right: 10px;'); ?>


            }

            .category-product-view-title {
            <?php echo e(Session::get('direction') === "rtl" ? 'margin-right: 16px;' : 'margin-left: -8px;'); ?>


            }

            .category-product-view-all {
            <?php echo e(Session::get('direction') === "rtl" ? 'margin-left: -7px;' : 'margin-right: 5px;'); ?>


            }
        }

        @media (min-width: 801px) {
            .categories-view-all {
            <?php echo e(session('direction') === "rtl" ? 'margin-left: 30px;' : 'margin-right: 27px;'); ?>


            }

            .categories-title {
            <?php echo e(Session::get('direction') === "rtl" ? 'margin-right: 25px;' : 'margin-left: 25px;'); ?>


            }

            .seller-list-title {
            <?php echo e(Session::get('direction') === "rtl" ? 'margin-right: 6px;' : 'margin-left: 10px;'); ?>


            }

            .seller-list-view-all {
            <?php echo e(Session::get('direction') === "rtl" ? 'margin-left: 12px;' : 'margin-right: 10px;'); ?>


            }

            .seller-card {
            <?php echo e(Session::get('direction') === "rtl" ? 'padding-left:0px !important;' : 'padding-right:0px !important;'); ?>


            }

            .category-product-view-title {
            <?php echo e(Session::get('direction') === "rtl" ? 'margin-right: 10px;' : 'margin-left: -12px;'); ?>


            }

            .category-product-view-all {
            <?php echo e(Session::get('direction') === "rtl" ? 'margin-left: -20px;' : 'margin-right: 0px;'); ?>


            }
        }

        .countdown-card {
            background: <?php echo e($web_config['primary_color']); ?>10;

        }

        .flash-deal-text {
            color: <?php echo e($web_config['primary_color']); ?>;
        }

        .countdown-background {
            background: <?php echo e($web_config['primary_color']); ?>;
        }

        }
        .czi-arrow-left {
            color: <?php echo e($web_config['primary_color']); ?>;
            background: <?php echo e($web_config['primary_color']); ?>10;
        }

        .czi-arrow-right {
            color: <?php echo e($web_config['primary_color']); ?>;
            background: <?php echo e($web_config['primary_color']); ?>10;
        }

        .flash-deals-background-image {
            background: <?php echo e($web_config['primary_color']); ?>10;
        }

        .view-all-text {
            color: <?php echo e($web_config['secondary_color']); ?>  !important;
        }

        .feature-product .czi-arrow-left {
            color: <?php echo e($web_config['primary_color']); ?>;
            background: <?php echo e($web_config['primary_color']); ?>10
        }

        .feature-product .czi-arrow-right {
            color: <?php echo e($web_config['primary_color']); ?>;
            background: <?php echo e($web_config['primary_color']); ?>10;
            font-size: 12px;
        }

        /*  */
    </style>

    <link rel="stylesheet" href="<?php echo e(asset('public/assets/front-end')); ?>/css/owl.carousel.min.css"/>
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/front-end')); ?>/css/owl.theme.default.min.css"/>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <?php ($categories = \App\Models\Category::with('childes.childes')->where(['position' => 0])->priority()->take(11)->get()); ?>
    <?php ($brands = \App\Models\Brand::active()->take(15)->get()); ?>
    <div class="__inline-61">
        <?php ($decimal_point_settings = !empty(\App\CPU\Helpers::get_business_settings('decimal_point_settings')) ? \App\CPU\Helpers::get_business_settings('decimal_point_settings') : 0); ?>
        <!-- Hero (Banners + Slider)-->
        <section class="bg-transparent mb-3">
            <div class="container">
                <div class="row ">
                    <div class="col-12">
                        <?php echo $__env->make('web-views.partials._home-top-slider',['main_banner'=>$main_banner], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
        </section>

        
        <?php if($web_config['flash_deals']): ?>
            <section class="overflow-hidden">
                <div class="container">
                    <div
                        class="flash-deal-view-all-web row d-none d-lg-flex justify-content-<?php echo e(Session::get('direction') === "rtl" ? 'start' : 'end'); ?>"
                        style="<?php echo e(Session::get('direction') === "rtl" ? 'margin-left: 2px;' : 'margin-right:2px;'); ?>">
                        <?php if(count($web_config['flash_deals']->products)>0): ?>
                            <a class="text-capitalize view-all-text"
                               href="<?php echo e(route('flash-deals',[$web_config['flash_deals']?$web_config['flash_deals']['id']:0])); ?>">
                                <?php echo e(\App\CPU\translate('view_all')); ?>

                                <i class="czi-arrow-<?php echo e(Session::get('direction') === "rtl" ? 'left mr-1 ml-n1 mt-1 float-left' : 'right ml-1 mr-n1'); ?>"></i>
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="row d-flex <?php echo e(Session::get('direction') === "rtl" ? 'flex-row-reverse' : 'flex-row'); ?>">


                        <div class="col-xl-3 col-lg-4 mt-2 countdown-card">
                            <div class="m-2">
                                <div class="flash-deal-text">
                                    <span><?php echo e(\App\CPU\translate('flash deal')); ?></span>
                                </div>
                                <div class="text-center text-white">
                                    <div class="countdown-background">
                                <span class="cz-countdown d-flex justify-content-center align-items-center"
                                      data-countdown="<?php echo e($web_config['flash_deals']?date('m/d/Y',strtotime($web_config['flash_deals']['end_date'])):''); ?> 11:59:00 PM">
                                    <span class="cz-countdown-days">
                                        <span class="cz-countdown-value"></span>
                                        <span><?php echo e(\App\CPU\translate('day')); ?></span>
                                    </span>
                                    <span class="cz-countdown-value p-1">:</span>
                                    <span class="cz-countdown-hours">
                                        <span class="cz-countdown-value"></span>
                                        <span><?php echo e(\App\CPU\translate('hrs')); ?></span>
                                    </span>
                                    <span class="cz-countdown-value p-1">:</span>
                                    <span class="cz-countdown-minutes">
                                        <span class="cz-countdown-value"></span>
                                        <span><?php echo e(\App\CPU\translate('min')); ?></span>
                                    </span>
                                    <span class="cz-countdown-value p-1">:</span>
                                    <span class="cz-countdown-seconds">
                                        <span class="cz-countdown-value"></span>
                                        <span><?php echo e(\App\CPU\translate('sec')); ?></span>
                                    </span>
                                </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flash-deal-view-all-mobile col-lg-12 d-block d-xl-none"
                             style="<?php echo e(Session::get('direction') === "rtl" ? 'margin-left: 2px;' : 'margin-right:2px;'); ?>">
                        </div>
                        <div class="col-xl-9 col-lg-8 <?php echo e(Session::get('direction') === "rtl" ? 'pr-md-4' : 'pl-md-4'); ?>">
                            <div class="d-lg-none <?php echo e(Session::get('direction') === "rtl" ? 'text-left' : 'text-right'); ?>">
                                <a class="mt-2 text-capitalize view-all-text"
                                   href="<?php echo e(route('flash-deals',[$web_config['flash_deals']?$web_config['flash_deals']['id']:0])); ?>">
                                    <?php echo e(\App\CPU\translate('view_all')); ?>

                                    <i class="czi-arrow-<?php echo e(Session::get('direction') === "rtl" ? 'left mr-1 ml-n1 mt-1 float-left' : 'right ml-1 mr-n1'); ?>"></i>
                                </a>
                            </div>
                            <div class="carousel-wrap">
                                <div class="owl-carousel owl-theme mt-2" id="flash-deal-slider">
                                    <?php $__currentLoopData = $web_config['flash_deals']->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$deal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if( $deal->product): ?>
                                            <?php echo $__env->make('web-views.partials._product-card-1',['product'=>$deal->product,'decimal_point_settings'=>$decimal_point_settings], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        
        <?php if($web_config['brand_setting']): ?>
            <section class="container rtl mt-3">
                <!-- Heading-->
                <div class="section-header">
                    <div class="text-black font-bold __text-22px">
                        <span> <?php echo e(\App\CPU\translate('brands')); ?></span>
                    </div>
                    <div class="__mr-2px">
                        <a class="text-capitalize view-all-text" href="<?php echo e(route('brands')); ?>">
                            <?php echo e(\App\CPU\translate('view_all')); ?>

                            <i class="czi-arrow-<?php echo e(Session::get('direction') === "rtl" ? 'left mr-1 ml-n1 mt-1 float-left' : 'right ml-1 mr-n1'); ?>"></i>
                        </a>
                    </div>
                </div>
                <!-- Grid-->

                <div class="mt-sm-3 mb-3 brand-slider">
                    <div class="owl-carousel owl-theme p-2" id="brands-slider">
                        <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="text-center">
                                <a href="<?php echo e(route('products',['id'=> $brand['id'],'data_from'=>'brand','page'=>1])); ?>"
                                   class="__brand-item">
                                    <img
                                        onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                        src="<?php echo e(asset("storage/brand/$brand->image")); ?>"
                                        alt="<?php echo e($brand->name); ?>">
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <!-- Products grid (featured products)-->
        <?php if($featured_products->count() > 0 ): ?>
            <div class="container mb-4">
                <div class="row __inline-62">
                    <div class="col-md-12">
                        <div class="feature-product-title">
                            <?php echo e(\App\CPU\translate('featured_products')); ?>

                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="feature-product">
                            <div class="carousel-wrap p-1">
                                <div class="owl-carousel owl-theme " id="featured_products_list">
                                    <?php $__currentLoopData = $featured_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div>
                                            <?php echo $__env->make('web-views.partials._feature-product',['product'=>$product, 'decimal_point_settings'=>$decimal_point_settings], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        

        <?php if($web_config['featured_deals']): ?>
            <section class="featured_deal rtl">
                <div class="container">
                    <div class="row __featured-deal-wrap" style="background: <?php echo e($web_config['primary_color']); ?>;">
                        <div class="col-12 pb-2">
                            <?php if(count($web_config['featured_deals'])>0): ?>
                                <div
                                    class="<?php echo e(Session::get('direction') === "rtl" ? 'text-left ml-lg-3' : 'text-right mr-lg-3'); ?>">
                                    <a class="text-capitalize text-white"
                                       href="<?php echo e(route('products',['data_from'=>'featured_deal'])); ?>">
                                        <?php echo e(\App\CPU\translate('view_all')); ?>

                                        <i class="czi-arrow-<?php echo e(Session::get('direction') === "rtl" ? 'left mr-1 ml-n1 mt-1' : 'right ml-1'); ?> text-white"></i>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-xl-3 col-lg-4">
                            <div class="m-lg-4 mb-4">
                                <span
                                    class="featured_deal_title __pt-12"><?php echo e(\App\CPU\translate('featured_deal')); ?></span>
                                <br>

                                <span class="text-white text-left"><?php echo e(\App\CPU\translate('See the latest deals and exciting new offers')); ?>!</span>

                            </div>

                        </div>

                        <div
                            class="col-xl-9 col-lg-8 d-flex align-items-center justify-content-center <?php echo e(Session::get('direction') === "rtl" ? 'pl-md-4' : 'pr-md-4'); ?>">
                            <div class="owl-carousel owl-theme" id="web-feature-deal-slider">
                                <?php $__currentLoopData = $web_config['featured_deals']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo $__env->make('web-views.partials._feature-deal-product',['product'=>$product, 'decimal_point_settings'=>$decimal_point_settings], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
        
        <div class="container rtl">
            <div class="row g-4 pt-2 mt-0 mb-4 pb-2 __deal-of">
                
                <div class="col-xl-3 col-md-4">
                    <div class="deal_of_the_day h-100" style="background: <?php echo e($web_config['primary_color']); ?>">
                        <?php if(isset($deal_of_the_day) && isset($deal_of_the_day->product)): ?>
                            <div class="d-flex justify-content-center align-items-center __w-70p mx-auto">
                                <h1 class="align-items-center text-white"> <?php echo e(\App\CPU\translate('deal_of_the_day')); ?></h1>
                            </div>
                            <div class="recomanded-product-card">

                                <div class="d-flex justify-content-center align-items-center __pt-20 __m-20-r">
                                    <img class="__rounded-top"
                                         src="<?php echo e(\App\CPU\ProductManager::product_image_path('thumbnail')); ?>/<?php echo e($deal_of_the_day->product['thumbnail']); ?>"
                                         onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                         alt="">
                                </div>
                                <div class="__i-1">
                                    <div class="text-left __p-20px">

                                        <?php ($overallRating = \App\CPU\ProductManager::get_overall_rating($deal_of_the_day->product['reviews'])); ?>
                                        <div class="rating-show">
                                            <h5 class="font-semibold" style="color: <?php echo e($web_config['primary_color']); ?>">
                                                <?php echo e(\Illuminate\Support\Str::limit($deal_of_the_day->product['name'],30)); ?>

                                            </h5>
                                            <span class="d-inline-block font-size-sm text-body">
                                            <?php for($inc=0;$inc<5;$inc++): ?>
                                                    <?php if($inc<$overallRating[0]): ?>
                                                        <i class="p-0 sr-star czi-star-filled active"></i>
                                                    <?php else: ?>
                                                        <i class="p-0 sr-star czi-star __color-fea569"></i>
                                                    <?php endif; ?>
                                                <?php endfor; ?>
                                            <label
                                                class="badge-style">( <?php echo e($deal_of_the_day->product->reviews_count); ?> )</label>
                                        </span>
                                        </div>
                                        <div class="">

                                            <?php if($deal_of_the_day->product->discount > 0): ?>
                                                <strike class="__text-12px __color-E96A6A __pl-2">
                                                    <?php echo e(\App\CPU\Helpers::currency_converter($deal_of_the_day->product->unit_price)); ?>

                                                </strike>
                                            <?php endif; ?>
                                            <span class="text-accent __text-22px __m-10px">
                                            <?php echo e(\App\CPU\Helpers::currency_converter(
                                                $deal_of_the_day->product->unit_price-(\App\CPU\Helpers::get_product_discount($deal_of_the_day->product,$deal_of_the_day->product->unit_price))
                                            )); ?>

                                        </span>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="recomanded-buy-button">
                                <button class="buy_btn" style="color:<?php echo e($web_config['primary_color']); ?>"
                                        onclick="location.href='<?php echo e(route('product',$deal_of_the_day->product->slug)); ?>'"><?php echo e(\App\CPU\translate('buy_now')); ?>

                                </button>
                            </div>
                        <?php else: ?>
                            <?php ($product=\App\Models\Product::active()->inRandomOrder()->first()); ?>
                            <?php if(isset($product)): ?>
                                <div class="d-flex justify-content-center align-items-center">
                                    <h1 class="text-white"> <?php echo e(\App\CPU\translate('recommended_product')); ?></h1>
                                </div>
                                <div class="recomanded-product-card">

                                    <div class="d-flex justify-content-center align-items-center  __pt-20 __m-20-r">
                                        <img
                                            src="<?php echo e(\App\CPU\ProductManager::product_image_path('thumbnail')); ?>/<?php echo e($product['thumbnail']); ?>"
                                            onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                            alt="">
                                    </div>
                                    <div class="__i-1">
                                        <div class="text-left __p-20px">

                                            <?php ($overallRating = \App\CPU\ProductManager::get_overall_rating($product['reviews'])); ?>
                                            <div class="rating-show">
                                                <h5 class="font-semibold"
                                                    style="color: <?php echo e($web_config['primary_color']); ?>">
                                                    <?php echo e(\Illuminate\Support\Str::limit($product['name'],40)); ?>

                                                </h5>
                                                <span class="d-inline-block font-size-sm text-body">
                                                <?php for($inc=0;$inc<5;$inc++): ?>
                                                        <?php if($inc<$overallRating[0]): ?>
                                                            <i class="p-0 sr-star czi-star-filled active"></i>
                                                        <?php else: ?>
                                                            <i class="p-0 sr-star czi-star __color-fea569"></i>
                                                        <?php endif; ?>
                                                    <?php endfor; ?>
                                                <label class="badge-style">( <?php echo e($product->reviews_count); ?> )</label>
                                            </span>
                                            </div>
                                            <div class="float-right">

                                                <?php if($product->discount > 0): ?>
                                                    <strike class="__text-12px __color-E96A6A">
                                                        <?php echo e(\App\CPU\Helpers::currency_converter($product->unit_price)); ?>

                                                    </strike>
                                                <?php endif; ?>
                                                <span class="text-accent __text-22px __m-10px">
                                                <?php echo e(\App\CPU\Helpers::currency_converter(
                                                    $product->unit_price-(\App\CPU\Helpers::get_product_discount($product,$product->unit_price))
                                                )); ?>

                                            </span>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="recomanded-buy-button">
                                    <button class="buy_btn" style="color:<?php echo e($web_config['primary_color']); ?>"
                                            onclick="location.href='<?php echo e(route('product',$product->slug)); ?>'"><?php echo e(\App\CPU\translate('buy_now')); ?>

                                    </button>
                                </div>

                            <?php endif; ?>
                        <?php endif; ?>
                    </div>

                </div>
                
                <div class="col-xl-9 col-md-8 mt-2">
                    <div class="latest-product-margin">
                        <div class="d-flex justify-content-between">
                            <div class="text-center">
                                <span
                                    class="for-feature-title __text-22px font-bold text-center"><?php echo e(\App\CPU\translate('latest_products')); ?></span>
                            </div>
                            <div class="mr-1">
                                <a class="text-capitalize view-all-text"
                                   href="<?php echo e(route('products',['data_from'=>'latest'])); ?>">
                                    <?php echo e(\App\CPU\translate('view_all')); ?>

                                    <i class="czi-arrow-<?php echo e(Session::get('direction') === "rtl" ? 'left mr-1 ml-n1 mt-1 float-left' : 'right ml-1 mr-n1'); ?>"></i>
                                </a>
                            </div>
                        </div>

                        <div class="row mt-0 g-3">
                            <?php ($latest_products = $latest_products->take(8)); ?>
                            <?php $__currentLoopData = $latest_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-xl-3 col-sm-4 col-md-6 col-lg-4 col-6">
                                    <div>
                                        <?php echo $__env->make('web-views.partials._single-product',['product'=>$product,'decimal_point_settings'=>$decimal_point_settings], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <?php if(isset($main_section_banner)): ?>
            <div class="container rtl mb-3">
                <div class="row">
                    <div class="col-12 pl-0 pr-0">
                        <a href="<?php echo e($main_section_banner->url); ?>"
                           class="cursor-pointer">
                            <img class="d-block footer_banner_img __inline-63"
                                 onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                 src="<?php echo e(asset('public/storage/banner')); ?>/<?php echo e($main_section_banner['photo']); ?>">
                        </a>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php ($business_mode=\App\CPU\Helpers::get_business_settings('business_mode')); ?>
        
        <div class="container rtl">
            <div class="row">
                <?php if($business_mode == 'multi'): ?>
                    <div class="col-md-6">
                        <div class="card __shadow h-100">
                            <div class="card-body">
                                <div class="row d-flex justify-content-between">
                                    <div class="categories-title">
                                        <span class="font-semibold"><?php echo e(\App\CPU\translate('categories')); ?></span>
                                    </div>
                                    <div class="categories-view-all">
                                        <a class="text-capitalize view-all-text"
                                           href="<?php echo e(route('categories')); ?>"><?php echo e(\App\CPU\translate('view_all')); ?>

                                            <i class="czi-arrow-<?php echo e(Session::get('direction') === "rtl" ? 'left mr-1 ml-n1 mt-1 float-left' : 'right ml-1 mr-n1'); ?>"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <?php if($key<10): ?>
                                            <div class="text-center __m-5px __cate-item">
                                                <a href="<?php echo e(route('products',['id'=> $category['id'],'data_from'=>'category','page'=>1])); ?>">
                                                    <div class="__img">
                                                        <img
                                                            onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                                            src="<?php echo e(asset("storage/app/public/category/$category->icon")); ?>"
                                                            alt="<?php echo e($category->name); ?>">
                                                    </div>
                                                    <p class="text-center small mt-2"><?php echo e(Str::limit($category->name, 12)); ?></p>
                                                </a>
                                            </div>
                                        <?php endif; ?>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="col-md-12">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="row d-flex justify-content-between">
                                    <div
                                        style="<?php echo e(Session::get('direction') === "rtl" ? 'margin-right: 20px;' : 'margin-left: 22px;'); ?>">
                                        <span class="font-semibold"><?php echo e(\App\CPU\translate('categories')); ?></span>
                                    </div>
                                    <div
                                        style="<?php echo e(Session::get('direction') === "rtl" ? 'margin-left: 15px;' : 'margin-right: 13px;'); ?>">
                                        <a class="text-capitalize view-all-text"
                                           href="<?php echo e(route('categories')); ?>"><?php echo e(\App\CPU\translate('view_all')); ?>

                                            <i class="czi-arrow-<?php echo e(Session::get('direction') === "rtl" ? 'left mr-1 ml-n1 mt-1 float-left' : 'right ml-1 mr-n1'); ?>"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($key<11): ?>
                                            <div class="text-center __m-5px __cate-item">
                                                <a href="<?php echo e(route('products',['id'=> $category['id'],'data_from'=>'category','page'=>1])); ?>">
                                                    <div class="__img">
                                                        <img
                                                            onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                                            src="<?php echo e(asset("storage/app/public/category/$category->icon")); ?>"
                                                            alt="<?php echo e($category->name); ?>">
                                                        <p class="text-center small mt-1"><?php echo e(Str::limit($category->name, 12)); ?></p>
                                                    </div>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <!-- top sellers -->

                <?php if($business_mode == 'multi'): ?>
                    <?php if(count($top_sellers) > 0): ?>
                        <div class="col-md-6 mt-2 mt-md-0 seller-card">
                            <div class="card __shadow h-100">
                                <div class="card-body">
                                    <div class="row d-flex justify-content-between">
                                        <div class="seller-list-title">
                                            <span class="font-semibold"><?php echo e(\App\CPU\translate('sellers')); ?></span>
                                        </div>
                                        <div class="seller-list-view-all">
                                            <a class="text-capitalize view-all-text"
                                               href="<?php echo e(route('sellers')); ?>"><?php echo e(\App\CPU\translate('view_all')); ?>

                                                <i class="czi-arrow-<?php echo e(Session::get('direction') === "rtl" ? 'left mr-1 ml-n1 mt-1 float-left' : 'right ml-1 mr-n1'); ?>"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <?php $__currentLoopData = $top_sellers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$seller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($key<10): ?>

                                                <?php if($seller->shop): ?>
                                                    <div class="__m-5px __cate-item">
                                                        <a href="<?php echo e(route('shopView',['id'=>$seller['id']])); ?>">
                                                            <div class="__img circle position-relative">
                                                                <?php ($shop=$seller->shop); ?>
                                                                <?php ($current_date = date('Y-m-d')); ?>
                                                                <?php ($start_date = date('Y-m-d', strtotime($shop['vacation_start_date']))); ?>
                                                                <?php ($end_date = date('Y-m-d', strtotime($shop['vacation_end_date']))); ?>
                                                                <?php if($shop->vacation_status && ($current_date >= $start_date) && ($current_date <= $end_date)): ?>
                                                                    <span class="temporary-closed">
                                                                        <small><?php echo e(\App\CPU\translate('closed_now')); ?></small>
                                                                    </span>
                                                                <?php elseif($shop->temporary_close): ?>
                                                                    <span class="temporary-closed">
                                                                        <small><?php echo e(\App\CPU\translate('closed_now')); ?></small>
                                                                    </span>
                                                                <?php endif; ?>
                                                                <img
                                                                    onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                                                    src="<?php echo e(asset("storage/app/public/shop")); ?>/<?php echo e($seller->shop->image); ?>">
                                                            </div>
                                                            <p class="text-center small mt-2"><?php echo e(Str::limit($seller->shop->name, 14)); ?></p>
                                                        </a>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>


        <div class="container rtl mt-4">
            <div class="arrival-title">
                <div>
                    <img src="<?php echo e(asset("public/assets/front-end/png/new-arrivals.png")); ?>" alt="">

                </div>
                <div class="pl-2">
                    <?php echo e(\App\CPU\translate('ARRIVALS')); ?>

                </div>
            </div>
        </div>
        <div class="container rtl mb-3 overflow-hidden">
            <div class="py-2">
                <div class="new_arrival_product">
                    <div class="carousel-wrap">
                        <div class="owl-carousel owl-theme" id="new-arrivals-product">
                            <?php $__currentLoopData = $latest_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <?php echo $__env->make('web-views.partials._product-card-1',['product'=>$product,'decimal_point_settings'=>$decimal_point_settings], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container rtl">
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="card card __shadow h-100">
                        <div class="card-body p-xl-35">
                            <div class="row d-flex justify-content-between mx-1 mb-3">
                                <div>
                                    <img class="size-30"
                                         src="<?php echo e(asset("public/assets/front-end/png/best sellings.png")); ?>"
                                         alt="">
                                    <span class="font-bold pl-1"><?php echo e(\App\CPU\translate('best sellings')); ?></span>
                                </div>
                                <div>
                                    <a class="text-capitalize view-all-text"
                                       href="<?php echo e(route('products',['data_from'=>'best-selling','page'=>1])); ?>"><?php echo e(\App\CPU\translate('view_all')); ?>

                                        <i class="czi-arrow-<?php echo e(Session::get('direction') === "rtl" ? 'left mr-1 ml-n1 mt-1 float-left' : 'right ml-1 mr-n1'); ?>"></i>
                                    </a>
                                </div>
                            </div>
                            <div>
                                <?php $__currentLoopData = $bestSellProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$bestSell): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($bestSell->product && $key<3): ?>
                                        <a class="__best-selling" href="<?php echo e(route('product',$bestSell->product->slug)); ?>">
                                            <?php if($bestSell->product->discount > 0): ?>
                                                <div class="d-flex"
                                                     style="top:0;position:absolute;<?php echo e(Session::get('direction') === "rtl" ? 'right:0;' : 'left:0;'); ?>">
                                                    <span class="for-discoutn-value p-1 pl-2 pr-2"
                                                          style="<?php echo e(Session::get('direction') === "rtl" ? 'border-radius:0px 5px' : 'border-radius:5px 0px'); ?>;">
                                                        <?php if($bestSell->product->discount_type == 'percent'): ?>
                                                            <?php echo e(round($bestSell->product->discount)); ?>%
                                                        <?php elseif($bestSell->product->discount_type =='flat'): ?>
                                                            <?php echo e(\App\CPU\Helpers::currency_converter($bestSell->product->discount)); ?>

                                                        <?php endif; ?> <?php echo e(\App\CPU\translate('off')); ?>

                                                    </span>
                                                </div>
                                            <?php endif; ?>
                                            <div class="d-flex flex-wrap p-2">
                                                <div class="best-selleing-image">
                                                    <img class="rounded"
                                                         onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                                         src="<?php echo e(\App\CPU\ProductManager::product_image_path('thumbnail')); ?>/<?php echo e($bestSell->product['thumbnail']); ?>"
                                                         alt="Product"/>
                                                </div>
                                                <div class="best-selling-details">
                                                    <h6 class="widget-product-title">
                                                    <span class="ptr">
                                                        <?php echo e(\Illuminate\Support\Str::limit($bestSell->product['name'],100)); ?>

                                                    </span>
                                                    </h6>
                                                    <?php ($bestSell_overallRating = \App\CPU\ProductManager::get_overall_rating($bestSell->product['reviews'])); ?>
                                                    <div class="rating-show">
                                                    <span class="d-inline-block font-size-sm text-body">
                                                        <?php for($inc=0;$inc<5;$inc++): ?>
                                                            <?php if($inc<$bestSell_overallRating[0]): ?>
                                                                <i class="p-0 sr-star czi-star-filled active"></i>
                                                            <?php else: ?>
                                                                <i class="p-0 sr-star czi-star __color-fea569"></i>
                                                            <?php endif; ?>
                                                        <?php endfor; ?>
                                                        <label class="badge-style">( <?php echo e($bestSell->product->reviews_count); ?> )</label>
                                                    </span>
                                                    </div>
                                                    <div>
                                                        <?php if($bestSell->product->discount > 0): ?>
                                                            <strike class="__color-E96A6A __text-12px">
                                                                <?php echo e(\App\CPU\Helpers::currency_converter($bestSell->product->unit_price)); ?>

                                                            </strike>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="widget-product-meta">
                                                    <span class="text-accent">
                                                        <?php echo e(\App\CPU\Helpers::currency_converter(
                                                        $bestSell->product->unit_price-(\App\CPU\Helpers::get_product_discount($bestSell->product,$bestSell->product->unit_price))
                                                        )); ?>

                                                    </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-2 mt-md-0">
                    <div class="card card __shadow h-100">
                        <div class="card-body p-xl-35">
                            <div class="row d-flex justify-content-between mx-1 mb-3">
                                <div>
                                    <img class="size-30" src="<?php echo e(asset("public/assets/front-end/png/top-rated.png")); ?>"
                                         alt="">
                                    <span class="font-bold pl-1"><?php echo e(\App\CPU\translate('top rated')); ?></span>
                                </div>
                                <div>
                                    <a class="text-capitalize view-all-text"
                                       href="<?php echo e(route('products',['data_from'=>'top-rated','page'=>1])); ?>"><?php echo e(\App\CPU\translate('view_all')); ?>

                                        <i class="czi-arrow-<?php echo e(Session::get('direction') === "rtl" ? 'left mr-1 ml-n1 mt-1 float-left' : 'right ml-1 mr-n1'); ?>"></i>
                                    </a>
                                </div>
                            </div>
                            <div>
                                <?php $__currentLoopData = $topRated; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$top): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($top->product && $key<3): ?>
                                        <a class="__best-selling" href="<?php echo e(route('product',$top->product->slug)); ?>">
                                            <?php if($top->product->discount > 0): ?>
                                                <div class="d-flex"
                                                     style="top:0;position:absolute;<?php echo e(Session::get('direction') === "rtl" ? 'right:0;' : 'left:0;'); ?>">
                                                    <span class="for-discoutn-value p-1 pl-2 pr-2"
                                                          style="<?php echo e(Session::get('direction') === "rtl" ? 'border-radius:0px 5px' : 'border-radius:5px 0px'); ?>;">
                                                        <?php if($top->product->discount_type == 'percent'): ?>
                                                            <?php echo e(round($top->product->discount)); ?>%
                                                        <?php elseif($top->product->discount_type =='flat'): ?>
                                                            <?php echo e(\App\CPU\Helpers::currency_converter($top->product->discount)); ?>

                                                        <?php endif; ?> <?php echo e(\App\CPU\translate('off')); ?>

                                                    </span>
                                                </div>
                                            <?php endif; ?>
                                            <div class="d-flex flex-wrap p-2">
                                                <div class="top-rated-image">
                                                    <img class="rounded"
                                                         onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                                         src="<?php echo e(\App\CPU\ProductManager::product_image_path('thumbnail')); ?>/<?php echo e($top->product['thumbnail']); ?>"
                                                         alt="Product"/>
                                                </div>
                                                <div class="top-rated-details">
                                                    <h6 class="widget-product-title">
                                                    <span class="ptr">
                                                        <?php echo e(\Illuminate\Support\Str::limit($top->product['name'],100)); ?>

                                                    </span>
                                                    </h6>
                                                    <?php ($top_overallRating = \App\CPU\ProductManager::get_overall_rating($top->product['reviews'])); ?>
                                                    <div class="rating-show">
                                                    <span class="d-inline-block font-size-sm text-body">
                                                        <?php for($inc=0;$inc<5;$inc++): ?>
                                                            <?php if($inc<$top_overallRating[0]): ?>
                                                                <i class="p-0 sr-star czi-star-filled active"></i>
                                                            <?php else: ?>
                                                                <i class="p-0 sr-star czi-star __color-fea569"></i>
                                                            <?php endif; ?>
                                                        <?php endfor; ?>
                                                        <label
                                                            class="badge-style">( <?php echo e($top->product->reviews_count); ?> )</label>
                                                    </span>
                                                    </div>
                                                    <div>
                                                        <?php if($top->product->discount > 0): ?>
                                                            <strike class="__text-12px __color-E96A6A">
                                                                <?php echo e(\App\CPU\Helpers::currency_converter($top->product->unit_price)); ?>

                                                            </strike>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="widget-product-meta">
                                                    <span class="text-accent">
                                                        <?php echo e(\App\CPU\Helpers::currency_converter(
                                                        $top->product->unit_price-(\App\CPU\Helpers::get_product_discount($top->product,$top->product->unit_price))
                                                        )); ?>

                                                    </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="container rtl py-4 ">
            <div class="row g-3">
                <?php $__currentLoopData = \App\Models\Banner::where('banner_type','Footer Banner')->where('published',1)->orderBy('id','desc')->take(2)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-6">
                        <a href="<?php echo e($banner->url); ?>" class="d-block">
                            <img class="footer_banner_img"
                                 onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                 src="<?php echo e(asset('public/storage/app/public/banner')); ?>/<?php echo e($banner['photo']); ?>">
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        
        <?php $__currentLoopData = $home_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <section class="container rtl pb-4">
                <!-- Heading-->
                <div class="__p-20px rounded bg-white">
                    <div class="flex-wrap __gap-6px flex-between pl-xl-4">
                        <div class="category-product-view-title">
                        <span
                            class="for-feature-title <?php echo e(Session::get('direction') === "rtl" ? 'float-right' : 'float-left'); ?> font-bold __text-20px text-uppercase"
                            style="<?php echo e(Session::get('direction') === "rtl" ? 'text-align:right;' : 'text-align:left;'); ?>">
                                <?php echo e(Str::limit($category['name'],18)); ?>

                        </span>
                        </div>
                        <div class="category-product-view-all">
                            <a class="text-capitalize view-all-text "
                               href="<?php echo e(route('products',['id'=> $category['id'],'data_from'=>'category','page'=>1])); ?>"><?php echo e(\App\CPU\translate('view_all')); ?>

                                <i class="czi-arrow-<?php echo e(Session::get('direction') === "rtl" ? 'left mr-1 ml-n1 mt-1 float-left' : 'right ml-1 mr-n1'); ?>"></i>
                            </a>

                        </div>
                    </div>

                    <div class="row mt-2 justify-content-between g-3">
                        <div class="col-md-3 col-12">
                            <a href="<?php echo e(route('products',['id'=> $category['id'],'data_from'=>'category','page'=>1])); ?>"
                               class="cursor-pointer d-block h-100 __cate-product-side-img">
                                <img class="h-100"
                                     onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                     src="<?php echo e(asset('public/storage/app/public/category')); ?>/<?php echo e($category['icon']); ?>">
                            </a>
                        </div>
                        <div class="col-md-9 col-12 ">
                            <div class="row g-2">
                                <?php $__currentLoopData = $category['products']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($key<4): ?>
                                        <div class="col-md-3 col-sm-4 col-6">
                                            <?php echo $__env->make('web-views.partials._category-single-product',['product'=>$product,'decimal_point_settings'=>$decimal_point_settings], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>


                    </div>
                </div>
            </section>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        

        <div class="container rtl pb-4 pt-3">
            <div class="shipping-policy-web">
                <div class="row g-3">
                    <div class="col-md-3 d-flex justify-content-center">
                        <div class="shipping-method-system">
                            <div class="text-center">
                                <img class="size-60" src="<?php echo e(asset("public/assets/front-end/png/delivery.png")); ?>"
                                     alt="">
                            </div>
                            <div class="text-center">
                                <p class="m-0">
                                    <?php echo e(\App\CPU\translate('Fast Delivery all accross the country')); ?>

                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex justify-content-center">
                        <div class="shipping-method-system">
                            <div class="text-center">
                                <img class="size-60" src="<?php echo e(asset("public/assets/front-end/png/Payment.png")); ?>"
                                     alt="">
                            </div>
                            <div class="text-center">
                                <p class="m-0">
                                    <?php echo e(\App\CPU\translate('Safe Payment')); ?>

                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex justify-content-center">
                        <div class="shipping-method-system">
                            <div class="text-center">
                                <img class="size-60" src="<?php echo e(asset("public/assets/front-end/png/money.png")); ?>"
                                     alt="">
                            </div>
                            <div class="text-center">
                                <p class="m-0">
                                    <?php echo e(\App\CPU\translate('7 Days Return Policy')); ?>

                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex justify-content-center">
                        <div class="shipping-method-system">
                            <div class="text-center">
                                <img class="size-60" src="<?php echo e(asset("public/assets/front-end/png/Genuine.png")); ?>"
                                     alt="">
                            </div>
                            <div class="text-center">
                                <p class="m-0">
                                    <?php echo e(\App\CPU\translate('100% Authentic Products')); ?>

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    
    <script src="<?php echo e(asset('public/assets/front-end')); ?>/js/owl.carousel.min.js"></script>

    <script>
        $('#flash-deal-slider').owlCarousel({
            loop: false,
            autoplay: false,
            margin: 20,
            nav: true,
            navText: ["<i class='czi-arrow-left'></i>", "<i class='czi-arrow-right'></i>"],
            dots: false,
            autoplayHoverPause: true,
            '<?php echo e(session('direction')); ?>': false,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 1
                },
                360: {
                    items: 1
                },
                375: {
                    items: 1
                },
                540: {
                    items: 2
                },
                //Small
                576: {
                    items: 2
                },
                //Medium
                768: {
                    items: 2
                },
                //Large
                992: {
                    items: 2
                },
                //Extra large
                1200: {
                    items: 2
                },
                //Extra extra large
                1400: {
                    items: 3
                }
            }
        })

        $('#web-feature-deal-slider').owlCarousel({
            loop: false,
            autoplay: true,
            margin: 20,
            nav: false,
            //navText: ["<i class='czi-arrow-left'></i>", "<i class='czi-arrow-right'></i>"],
            dots: false,
            autoplayHoverPause: true,
            '<?php echo e(session('direction')); ?>': true,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 1
                },
                360: {
                    items: 1
                },
                375: {
                    items: 1
                },
                540: {
                    items: 2
                },
                //Small
                576: {
                    items: 2
                },
                //Medium
                768: {
                    items: 2
                },
                //Large
                992: {
                    items: 2
                },
                //Extra large
                1200: {
                    items: 2
                },
                //Extra extra large
                1400: {
                    items: 2
                }
            }
        })

        $('#new-arrivals-product').owlCarousel({
            loop: true,
            autoplay: false,
            margin: 20,
            nav: true,
            navText: ["<i class='czi-arrow-<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>'></i>", "<i class='czi-arrow-<?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>'></i>"],
            dots: false,
            autoplayHoverPause: true,
            '<?php echo e(session('direction')); ?>': true,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 1
                },
                360: {
                    items: 1
                },
                375: {
                    items: 1
                },
                540: {
                    items: 2
                },
                //Small
                576: {
                    items: 2
                },
                //Medium
                768: {
                    items: 2
                },
                //Large
                992: {
                    items: 2
                },
                //Extra large
                1200: {
                    items: 4
                },
                //Extra extra large
                1400: {
                    items: 4
                }
            }
        })
    </script>
    <script>
        $('#featured_products_list').owlCarousel({
            loop: true,
            autoplay: false,
            margin: 20,
            nav: true,
            navText: ["<i class='czi-arrow-left'></i>", "<i class='czi-arrow-right'></i>"],
            dots: false,
            autoplayHoverPause: true,
            '<?php echo e(session('direction')); ?>': false,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 1
                },
                360: {
                    items: 1
                },
                375: {
                    items: 1
                },
                540: {
                    items: 2
                },
                //Small
                576: {
                    items: 2
                },
                //Medium
                768: {
                    items: 3
                },
                //Large
                992: {
                    items: 4
                },
                //Extra large
                1200: {
                    items: 5
                },
                //Extra extra large
                1400: {
                    items: 5
                }
            }
        });
    </script>
    <script>
        $('#brands-slider').owlCarousel({
            loop: false,
            autoplay: false,
            margin: 10,
            nav: false,
            '<?php echo e(session('direction')); ?>': true,
            dots: true,
            autoplayHoverPause: true,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 4
                },
                360: {
                    items: 5
                },
                375: {
                    items: 5
                },
                540: {
                    items: 5
                },
                //Small
                576: {
                    items: 6
                },
                //Medium
                768: {
                    items: 7
                },
                //Large
                992: {
                    items: 9
                },
                //Extra large
                1200: {
                    items: 11
                },
                //Extra extra large
                1400: {
                    items: 12
                }
            }
        })
    </script>

    <script>
        $('#category-slider, #top-seller-slider').owlCarousel({
            loop: false,
            autoplay: false,
            margin: 20,
            nav: false,
            // navText: ["<i class='czi-arrow-left'></i>","<i class='czi-arrow-right'></i>"],
            dots: true,
            autoplayHoverPause: true,
            '<?php echo e(session('direction')); ?>': true,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 2
                },
                360: {
                    items: 3
                },
                375: {
                    items: 3
                },
                540: {
                    items: 4
                },
                //Small
                576: {
                    items: 5
                },
                //Medium
                768: {
                    items: 6
                },
                //Large
                992: {
                    items: 8
                },
                //Extra large
                1200: {
                    items: 10
                },
                //Extra extra large
                1400: {
                    items: 11
                }
            }
        })
    </script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.front-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tikka\resources\themes\default/web-views/home.blade.php ENDPATH**/ ?>