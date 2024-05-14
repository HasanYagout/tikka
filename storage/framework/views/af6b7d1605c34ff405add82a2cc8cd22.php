<section class="py-3">
    <div class="container">
        <h2 class="text-center mb-3"><?php echo e(translate('Recommended_For_You')); ?></h2>
        <nav class="d-flex justify-content-center">
            <div class="nav nav-nowrap gap-3 gap-xl-5 nav--tabs hide-scrollbar" id="nav-tab" role="tablist">
                <button class="active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#featured_product"
                        role="tab" aria-controls="featured_product"><?php echo e(translate('Featured_Products')); ?>

                </button>
                <button data-bs-toggle="tab" data-bs-target="#best_selling" role="tab"
                        aria-controls="best_selling"><?php echo e(translate('Best_Sellings')); ?>

                </button>
                <button data-bs-toggle="tab" data-bs-target="#latest_product" role="tab"
                        aria-controls="latest_product"><?php echo e(translate('Latest_Products')); ?>

                </button>
            </div>
        </nav>
        <div class="card mt-3">
            <div class="p-2 p-sm-3">
                <div class="tab-content" id="nav-tabContent">
                    <!-- Featured Product -->
                    <div class="tab-pane fade show active" id="featured_product" role="tabpanel" tabindex="0">
                        <div class="d-flex flex-wrap justify-content-end gap-3 mb-3">
                            <a href="<?php echo e(route('products',['data_from'=>'featured'])); ?>" class="btn-link"><?php echo e(translate('View_All')); ?>

                                <i class="bi bi-chevron-right text-primary"></i>
                            </a>
                        </div>
                        <div class="auto-col mobile-items-2 gap-2 gap-sm-3 recommended-product-grid" style="--minWidth: 12rem;">
                            <!-- Single Product -->

                            <?php $__currentLoopData = $featured_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($product): ?>
                                    <?php echo $__env->make('theme-views.partials._product-large-card',['product'=>$product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>

                    <!-- Best Selling Product -->
                    <div class="tab-pane fade" id="best_selling" role="tabpanel" tabindex="0">
                        <div class="d-flex flex-wrap justify-content-end gap-3 mb-3">
                            <a href="<?php echo e(route('products',['data_from'=>'best-selling'])); ?>" class="btn-link"><?php echo e(translate('View_All')); ?>

                                <i class="bi bi-chevron-right text-primary"></i>
                            </a>
                        </div>
                        <div class="auto-col mobile-items-2 gap-2 gap-sm-3 recommended-product-grid" style="--minWidth: 12rem;">
                            <!-- Single Product -->
                            <?php $__currentLoopData = $bestSellProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($order->product): ?>
                                    <?php echo $__env->make('theme-views.partials._product-large-card',['product'=>$order->product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>

                    <!-- Latest Product -->
                    <div class="tab-pane fade" id="latest_product" role="tabpanel" tabindex="0">
                        <div class="d-flex flex-wrap justify-content-end gap-3 mb-3">
                            <a href="<?php echo e(route('products',['data_from'=>'latest'])); ?>" class="btn-link"><?php echo e(translate('View_All')); ?>

                                <i class="bi bi-chevron-right text-primary"></i>
                            </a>
                        </div>
                        <div class="auto-col mobile-items-2 gap-2 gap-sm-3 recommended-product-grid" style="--minWidth: 12rem;">
                            <!-- Single Product -->

                            <?php $__currentLoopData = $latest_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($product): ?>
                                    <?php echo $__env->make('theme-views.partials._product-large-card',['product'=>$product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH C:\xampp\htdocs\tikka\resources\themes\theme_aster/theme-views/partials/_recommended-product.blade.php ENDPATH**/ ?>