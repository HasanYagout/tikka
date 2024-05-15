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
                            <?php if(count($footer_banner)==1): ?>
                                <div class="col-6 d-none d-sm-block">
                                    <span class="ad-hover">
                                        <img src="<?php echo e(theme_asset('assets/img/image-place-holder-2_1.png')); ?>" loading="lazy" alt=""
                                             class="dark-support rounded w-100">
                                    </span>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
























































                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH C:\xampp\htdocs\tikka\resources\themes\theme_aster/theme-views/partials/_main-banner.blade.php ENDPATH**/ ?>