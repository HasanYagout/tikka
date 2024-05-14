<?php $__currentLoopData = $home_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <section>
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="border-bottom gap-3 d-flex align-items-start justify-content-between mb-30">
                        <h3 class="styled-title"><?php echo e(Str::limit($category['name'],18)); ?></h3>
                        <?php if(count($category['products']) > 0): ?>
                            <a href="<?php echo e(route('products',['id'=> $category['id'],'data_from'=>'category','page'=>1])); ?>" class="btn-link"><?php echo e(translate('view_all')); ?>

                                <i class="bi bi-chevron-right text-primary"></i></a>
                        <?php endif; ?>
                    </div>
                    <!-- Swiper -->
                    <div class="swiper-container auto-item-width position-relative">
                        <div class="<?php echo e($category['products']->count() > 0 ? 'swiper':''); ?>" data-swiper-loop="true" data-swiper-items="auto" data-swiper-margin="20"  data-swiper-pagination-el="null" data-swiper-navigation-next="#next<?php echo e($category->id); ?>" data-swiper-navigation-prev="#prev<?php echo e($category->id); ?>" data-swiper-delay="4000">
                            <div class="swiper-wrapper text-center">
                                <?php $__currentLoopData = $category['products']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php echo $__env->make('theme-views.partials._product-category-card', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        <div class="swiper-button-next cleaning-nav-next" id="next<?php echo e($category->id); ?>"></div>
                        <div class="swiper-button-prev cleaning-nav-prev" id="prev<?php echo e($category->id); ?>"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\xampp\htdocs\tikka\resources\themes\theme_aster/theme-views/partials/_home-categories.blade.php ENDPATH**/ ?>