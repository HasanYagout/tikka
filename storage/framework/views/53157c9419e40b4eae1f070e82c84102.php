<section>
    <div class="container">
        <div class="flexible-grid lg-down-1 gap-3">
            <!-- for mobile start -->
            <?php if(isset($footer_banner[0])): ?>
                <div class="col-12 d-sm-none">
                    <a href="<?php echo e($footer_banner[0]['url']); ?>" class="ad-hover">
                        <img src="<?php echo e(asset('public/storage/banner')); ?>/<?php echo e($footer_banner[0]['photo']); ?>" loading="lazy" alt=""

                                class="dark-support rounded w-100">
                    </a>
                </div>
            <?php endif; ?>
            <!-- for mobile end -->

            <?php if(auth('customer')->check() && count($order_again)>0): ?>
                <div class="bg-primary-light rounded p-3 d-none d-sm-block">
                    <h3 class="text-primary mb-3 mt-2"><?php echo e(translate('Order_Again')); ?></h3>
                    <p><?php echo e(translate('Want_to_order_your_usuals')); ?>? <?php echo e(translate('Just_reorder_from_your_previous_orders')); ?>.</p>

                    <div class="d-flex flex-wrap gap-3 custom-scrollbar" style="--height: 26.5rem">
                        <?php $__currentLoopData = $order_again; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="card rounded-10 flex-grow-1">
                                <div class="p-3">
                                    <h6 class="fs-12 text-primary mb-1">
                                        <?php if($order['order_status'] =='processing'): ?>
                                            <?php echo e(translate('packaging')); ?>

                                        <?php elseif($order['order_status'] =='failed'): ?>
                                            <?php echo e(translate('Failed_to_Deliver')); ?>

                                        <?php elseif($order['order_status'] == 'all'): ?>
                                            <?php echo e(translate('all')); ?>

                                        <?php else: ?>
                                            <?php echo e(translate(str_replace('_',' ',$order['order_status']))); ?>

                                        <?php endif; ?>
                                    </h6>
                                    <div class="fs-10"><?php echo e(translate('on')); ?> <?php echo e(date('d M Y',strtotime($order['updated_at']))); ?></div>

                                    <div class="bg-light my-2 rounded-10 p-4">
                                        <div class="d-flex align-items-center justify-content-between gap-3">
                                            <?php $__currentLoopData = $order['details']->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div>
                                                    <img width="42" src="<?php echo e(\App\CPU\ProductManager::product_image_path('thumbnail')); ?>/<?php echo e($detail['product']['thumbnail'] ?? ''); ?>" loading="lazy"
                                                         onerror="this.src='<?php echo e(theme_asset('assets/img/image-place-holder.png')); ?>'"
                                                         alt="" class="dark-support rounded">
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            <?php if(count($order['details']) > 3): ?>
                                                <h6 class="fw-medium fs-12 text-center">+<?php echo e(count($order['details'])-3); ?> <br>
                                                    <a href="<?php echo e(route('account-order-details', ['order_id'=>$order['id']])); ?>"><?php echo e(translate('more')); ?></a>
                                                </h6>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                                        <div class="">
                                            <h6 class="fs-10 mb-2"><?php echo e(translate('Order_ID')); ?>: #<?php echo e($order['id']); ?></h6>
                                            <h6><?php echo e(translate('Final_Total')); ?> : <?php echo e(\App\CPU\Helpers::currency_converter($order['order_amount'])); ?></h6>
                                        </div>
                                        <a href="javascript:" onclick="order_again(<?php echo e($order['id']); ?>)" class="btn btn-primary"><?php echo e(translate('order_again')); ?></a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php else: ?>
                <div class="d-none d-sm-block">
                    <?php if($sidebar_banner): ?>
                        <a href="<?php echo e($sidebar_banner['url']); ?>">
                            <img src="<?php echo e(asset('public/storage/banner')); ?>/<?php echo e($sidebar_banner ? $sidebar_banner['photo'] : ''); ?>"
                                 onerror="this.src='<?php echo e(theme_asset('assets/img/top-side-banner-placeholder.png')); ?>'"alt="" class="dark-support rounded w-100">
                        </a>
                    <?php else: ?>
                        <img src="<?php echo e(theme_asset('assets/img/top-side-banner-placeholder.png')); ?>" class="dark-support rounded w-100">
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <div class="card">
                <div class="p-3 p-sm-4">
                    <div class="d-flex flex-wrap justify-content-between gap-3 mb-3 mb-sm-4">
                        <h2><span class="text-primary"><?php echo e(translate('Find')); ?></span> <?php echo e(translate('what_you_need')); ?></h2>
                        <div class="swiper-nav d-flex gap-2 align-items-center">
                            <div
                                class="swiper-button-prev find-what-you-need-nav-prev position-static rounded-10"></div>
                            <div
                                class="swiper-button-next find-what-you-need-nav-next position-static rounded-10"></div>
                        </div>
                    </div>
                    <div class="swiper-container">
                        <!-- Swiper -->
                        <div class="position-relative d-none d-md-block">
                            <div class="swiper" data-swiper-loop="true" data-swiper-margin="16"
                                 data-swiper-speed="2000" data-swiper-pagination-el="null"
                                 data-swiper-navigation-next=".find-what-you-need-nav-next"
                                 data-swiper-navigation-prev=".find-what-you-need-nav-prev">
                                <div class="swiper-wrapper">
                                    <?php $__currentLoopData = $category_slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ke=>$all_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <div class="swiper-slide align-items-start">
                                        <div class="flexible-grid md-down-1 gap-3 w-100" style="--width: 1fr">
                                            <!-- Category Wrap -->
                                            <?php $__currentLoopData = $all_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <div class="bg-light rounded p-4">
                                                    <div
                                                        class="d-flex flex-wrap justify-content-between gap-3 mb-3 align-items-start">
                                                        <div class="">
                                                            <h5 class="mb-1 text-truncate" style="--width: 16ch">
                                                                <?php echo e($category['name']); ?></h5>
                                                            <div class="text-muted"><?php echo e($category['product_count']); ?> <?php echo e(translate('products')); ?></div>
                                                        </div>

                                                        <a href="<?php echo e(route('products',['id'=> $category['id'],'data_from'=>'category','page'=>1])); ?>" class="btn-link"><?php echo e(translate('view_all')); ?><i
                                                                class="bi bi-chevron-right text-primary"></i></a>
                                                    </div>

                                                    <div class="find-what-you-need-items">
                                                        <?php $__currentLoopData = $category['childes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$sub_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <a href="<?php echo e(route('products',['id'=> $sub_category['id'],'data_from'=>'category','page'=>1])); ?>"
                                                               class="d-flex flex-column gap-2 mb-3 align-items-center">
                                                                <div class="img-wrap bg-white w-100 rounded justify-content-center d-flex">
                                                                    <div class="floting-text">
                                                                        <span class="truncate text-center">
                                                                            <span class="">
                                                                                <?php echo e(count($category['childes'])<4 && in_array($key, [0,1,2]) && !array_key_exists(++$key, $category['childes']) ?
                                                                                            ($sub_category['sub_category_product_count'] > 1 ? ($sub_category['sub_category_product_count']-1).'+' : $sub_category['sub_category_product_count'])
                                                                                    : $sub_category['sub_category_product_count']); ?>

                                                                            </span>
                                                                            <?php echo e(translate('products')); ?>

                                                                        </span>
                                                                    </div>
                                                                    <div
                                                                        class="ov-hidden rounded w-100" style="height: 5rem;">
                                                                        <img onerror="this.src='<?php echo e(theme_asset('assets/img/image-place-holder.png')); ?>'"
                                                                             src="<?php echo e(asset('public/storage/category')); ?>/<?php echo e($sub_category['icon']); ?>" alt=""
                                                                             loading="lazy" class="dark-support img-fit " >
                                                                    </div>
                                                                </div>
                                                                <div class="truncate text-center"><?php echo e($sub_category['name']); ?></div>
                                                            </a>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>

                        <!-- Swiper -->
                        <div class="position-relative d-md-none">
                            <div class="swiper" data-swiper-loop="true"
                                 data-swiper-speed="2000" data-swiper-margin="10" data-swiper-pagination-el="null"
                                 data-swiper-navigation-next=".find-what-you-need-nav-next"
                                 data-swiper-navigation-prev=".find-what-you-need-nav-prev">
                                <div class="swiper-wrapper">
                                    <?php $__currentLoopData = $final_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="swiper-slide align-items-start d-block bg-light rounded p-3 p-sm-4 align-items-stretch">
                                        <div>
                                            <div
                                                class="d-flex flex-wrap justify-content-between gap-3 mb-3 align-items-start">
                                                <div class="">
                                                    <h5 class="mb-1 text-truncate" style="--width: 16ch">
                                                        <?php echo e($category['name']); ?></h5>
                                                    <div class="text-muted"><?php echo e($category['product_count']); ?> <?php echo e(translate('products')); ?></div>
                                                </div>

                                                <a href="<?php echo e(route('products',['id'=> $category['id'],'data_from'=>'category','page'=>1])); ?>" class="btn-link"><?php echo e(translate('view_all')); ?><i
                                                        class="bi bi-chevron-right text-primary"></i></a>
                                            </div>

                                            <div class="auto-col gap-3" style="--minWidth: 3.75rem; --maxWidth: 5rem">
                                                <?php $__currentLoopData = $category['childes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$sub_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <a href="<?php echo e(route('products',['id'=> $sub_category['id'],'data_from'=>'category','page'=>1])); ?>"
                                                        class="d-flex flex-column gap-2 mb-3 align-items-start">
                                                        <div
                                                            class="avatar avatar-xxl ov-hidden hover-zoom-in rounded">
                                                            <img onerror="this.src='<?php echo e(theme_asset('assets/img/image-place-holder.png')); ?>'"
                                                                    src="<?php echo e(asset('public/storage/category')); ?>/<?php echo e($sub_category['icon']); ?>" alt=""
                                                                    loading="lazy" class="dark-support img-fit " >
                                                        </div>
                                                        <div class="text-truncate"><?php echo e($sub_category['name']); ?></div>
                                                    </a>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- for mobile start -->
            <?php if(count($random_coupon)>0): ?>
                <div class="col-12 d-sm-none">
                    <div class="bg-primary-light rounded p-3 mt-lg-3">
                        <div class="d-flex justify-content-between align-items-center gap-2">
                            <h3 class="text-primary my-3"><?php echo e(translate('Happy_Club')); ?></h3>
                        </div>
                        <p><?php echo e(translate('collect_coupons_from_stores_and_apply_to_get_special_discount_from_stores')); ?></p>

                        <div class="d-flex flex-wrap gap-3">
                            <?php $__currentLoopData = $random_coupon; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="club-card card custom-border-color hover-shadow flex-grow-1" onclick="coupon_copy('<?php echo e($coupon->code); ?>')">
                                <div class="d-flex flex-column gap-2 p-3">
                                    <h5 class="d-flex gap-2 align-items-center">
                                        <?php if($coupon->coupon_type == 'free_delivery'): ?>
                                            <?php echo e(translate($coupon->coupon_type)); ?>

                                            <img src="<?php echo e(theme_asset('assets/img/svg/delivery-car.svg')); ?>" alt="" class="svg">
                                        <?php else: ?>
                                            <?php echo e($coupon->discount_type == 'amount' ? \App\CPU\Helpers::currency_converter($coupon->discount) : $coupon->discount.'%'); ?> OFF
                                            <img src="<?php echo e(theme_asset('assets/img/svg/dollar.svg')); ?>" alt="" class="svg">
                                        <?php endif; ?>
                                    </h5>
                                    <h6 class="fs-12">
                                        <span class="text-muted"><?php echo e(translate('for')); ?></span>
                                        <span class="text-uppercase ">
                                            <?php if($coupon->seller_id == '0'): ?>
                                                <?php echo e(translate('All_Shops')); ?>

                                            <?php elseif($coupon->seller_id == NULL): ?>
                                                <?php echo e($web_config['name']->value); ?>

                                            <?php else: ?>
                                                <a class="shop-name" onclick="location.href='<?php echo e(route('shopView',['id'=>$coupon->seller->shop['id']])); ?>'">
                                                    <?php echo e(isset($coupon->seller->shop) ? $coupon->seller->shop->name : ''); ?>

                                                </a>
                                            <?php endif; ?>
                                        </span>
                                    </h6>
                                    <h6 class="text-primary fs-12"><?php echo e(translate('code')); ?>: <?php echo e($coupon->code); ?></h6>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="col-12 d-sm-none">
                    <?php if($top_side_banner): ?>
                        <a href="<?php echo e($top_side_banner['url']); ?>">
                            <img src="<?php echo e(asset('public/storage/banner')); ?>/<?php echo e($top_side_banner ? $top_side_banner['photo'] : ''); ?>"
                                    onerror="this.src='<?php echo e(theme_asset('assets/img/top-side-banner-placeholder.png')); ?>'"
                                    alt="" class="dark-support rounded w-100">
                        </a>
                    <?php else: ?>
                        <img src="<?php echo e(theme_asset('assets/img/top-side-banner-placeholder.png')); ?>" class="dark-support rounded w-100">
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <!-- for mobile end -->
        </div>
    </div>
</section>
<?php /**PATH C:\xampp\htdocs\tikka\resources\themes\theme_aster/theme-views/partials/_find-what-you-need.blade.php ENDPATH**/ ?>