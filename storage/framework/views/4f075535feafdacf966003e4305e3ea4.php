<section class="banner">
    <div class="container">
        <div class="card moble-border-0">
            <div class="p-0 p-sm-3 m-sm-1">
                <div class="row g-3">
                    <div class="col-xl-3 col-lg-4 d-none d-xl-block">
                        <div class="">
                            <h6 class="mb-2 text-uppercase"><?php echo e(translate('Find_What_You_Need')); ?></h6>
                            <ul class="dropdown-menu dropdown-menu--static"
                                style="--bs-dropdown-min-width: auto">
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="<?php echo e($category->childes->count() > 0 ? 'menu-item-has-children' : ''); ?>">
                                        <a href="javascript:" onclick="location.href='<?php echo e(route('products',['id'=> $category['id'],'data_from'=>'category','page'=>1])); ?>'">
                                            <?php echo e($category['name']); ?>

                                        </a>
                                        <?php if($category->childes->count() > 0): ?>
                                            <ul class="sub-menu">
                                                <?php $__currentLoopData = $category['childes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li class="<?php echo e($subCategory->childes->count()>0 ? 'menu-item-has-children' : ''); ?>">
                                                        <a href="javascript:" onclick="location.href='<?php echo e(route('products',['id'=> $subCategory['id'],'data_from'=>'category','page'=>1])); ?>'">
                                                            <?php echo e($subCategory['name']); ?>

                                                        </a>
                                                        <?php if($subCategory->childes->count()>0): ?>
                                                            <ul class="sub-menu">
                                                                <?php $__currentLoopData = $subCategory['childes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subSubCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <li>
                                                                        <a href="<?php echo e(route('products',['id'=> $subSubCategory['id'],'data_from'=>'category','page'=>1])); ?>">
                                                                            <?php echo e($subSubCategory['name']); ?>

                                                                        </a>
                                                                    </li>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </ul>
                                                        <?php endif; ?>
                                                    </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        <?php endif; ?>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <li class="d-flex justify-content-center mt-3 py-0">
                                    <a href="<?php echo e(route('products',['data_from'=>'latest'])); ?>"class="btn-link text-primary">
                                        <?php echo e(translate('view_all')); ?>

                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="row g-2 g-sm-3 mt-lg-0">
                            <div class="col-12">
                                <div class="swiper-container shadow-sm rounded">
                                    <!-- Swiper -->
                                    <div class="swiper" data-swiper-loop="true"
                                         data-swiper-navigation-next="null" data-swiper-navigation-prev="null">
                                        <div class="swiper-wrapper">
                                            <?php $__currentLoopData = $main_banner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="swiper-slide">
                                                    <a href="<?php echo e($banner['url']); ?>" class="h-100">
                                                        <img src="<?php echo e(asset('public/storage/banner')); ?>/<?php echo e($banner['photo']); ?>" loading="lazy"

                                                             alt="" class="dark-support rounded">
                                                    </a>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(count($main_banner)==0): ?>
                                                <img src="<?php echo e(theme_asset('assets/img/image-place-holder-2_1.png')); ?>" loading="lazy"
                                                     alt="" class="dark-support rounded">
                                            <?php endif; ?>
                                        </div>
                                        <div class="swiper-pagination"></div>
                                    </div>
                                </div>
                            </div>
                            <?php $__currentLoopData = $footer_banner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-6 d-none d-sm-block">
                                    <a href="<?php echo e($banner['url']); ?>" class="ad-hover">
                                        <img src="<?php echo e(asset('public/storage/banner')); ?>/<?php echo e($banner['photo']); ?>" loading="lazy" alt=""
                                             onerror="this.src='<?php echo e(theme_asset('assets/img/image-place-holder-2_1.png')); ?>'"
                                             class="dark-support rounded w-100">
                                    </a>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php if(count($footer_banner)==0): ?>
                                <div class="col-6 d-none d-sm-block">
                                    <span class="ad-hover">
                                        <img src="<?php echo e(theme_asset('assets/img/image-place-holder-2_1.png')); ?>" loading="lazy" alt=""
                                             class="dark-support rounded w-100">
                                    </span>
                                </div>
                                <div class="col-6 d-none d-sm-block">
                                    <span class="ad-hover">
                                        <img src="<?php echo e(theme_asset('assets/img/image-place-holder-2_1.png')); ?>" loading="lazy" alt=""
                                             class="dark-support rounded w-100">
                                    </span>
                                </div>
                            <?php endif; ?>








                        </div>
                    </div>

                    <?php if(count($random_coupon)>0): ?>
                        <div class="col-xl-3 d-none d-sm-block">
                            <div class="bg-primary-light rounded p-3 mt-lg-3">
                                <h3 class="text-primary my-3"><?php echo e(translate('Happy_Club')); ?></h3>
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
                                                        <a class="shop-name" onclick="location.href='<?php echo e(route('shopView',['id'=>0])); ?>'">
                                                            <?php echo e($web_config['name']->value); ?>

                                                        </a>
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
                        <div class="col-xl-3 d-none d-sm-block">

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
                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH C:\xampp\htdocs\tikka\resources\themes\theme_aster/theme-views/partials/_main-banner.blade.php ENDPATH**/ ?>