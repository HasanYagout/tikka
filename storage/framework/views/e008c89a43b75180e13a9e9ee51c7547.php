<section>
    <div class="container">
        <div class="row g-3">
            <?php if(isset($deal_of_the_day->product)): ?>
            <div class="col-lg-6">
                <div class="card h-100">
                    <div class="p-30">
                        <?php ($overall_rating = \App\CPU\ProductManager::get_overall_rating($deal_of_the_day->product->reviews)); ?>
                        <div class="today-best-deal d-flex justify-content-between gap-2 gap-sm-3">
                            <div class="d-flex flex-column gap-1">
                                <div class="mb-3 mb-sm-4">
                                    <div class="sub-title text-muted mb-1"><?php echo e(translate('Don’t_Miss_the_Chance')); ?> !</div>
                                    <h2 class="title text-primary fw-extra-bold"><?php echo e(translate('Today’s_Best_Deal')); ?></h2>
                                </div>
                                <div class="mb-3 mb-sm-4 d-flex flex-column gap-1">
                                    <h6 class="text-capitalize"><?php echo e(\Illuminate\Support\Str::limit($deal_of_the_day->product->name,30)); ?></h6>
                                    <div class="d-flex gap-2 align-items-center">
                                        <div class="star-rating text-gold fs-12">
                                            <?php for($i = 1; $i <= 5; $i++): ?>
                                                <?php if($i <= $overall_rating[0]): ?>
                                                    <i class="bi bi-star-fill"></i>
                                                <?php elseif($overall_rating[0] != 0 && $i <= $overall_rating[0] + 1.1): ?>
                                                    <i class="bi bi-star-half"></i>
                                                <?php else: ?>
                                                    <i class="bi bi-star"></i>
                                                <?php endif; ?>
                                            <?php endfor; ?>
                                        </div>
                                        <span>(<?php echo e($deal_of_the_day->product->reviews->count()); ?>)</span>
                                    </div>

                                    <div class="product__price d-flex flex-wrap align-items-end gap-2 mt-2">
                                        <?php if($deal_of_the_day->product->discount > 0): ?>
                                            <del class="product__old-price"><?php echo e(\App\CPU\Helpers::currency_converter($deal_of_the_day->product->unit_price)); ?></del>
                                        <?php endif; ?>
                                        <ins class="product__new-price">
                                            <?php echo e(\App\CPU\Helpers::currency_converter($deal_of_the_day->product->unit_price-\App\CPU\Helpers::get_product_discount($deal_of_the_day->product,$deal_of_the_day->product->unit_price))); ?>

                                        </ins>
                                        <span class="product__save-amount"><?php echo e(translate('save')); ?>

                                            <?php echo e(\App\CPU\Helpers::currency_converter(\App\CPU\Helpers::get_product_discount($deal_of_the_day->product,$deal_of_the_day->product->unit_price))); ?>

                                        </span>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <a href="<?php echo e(route('product',$deal_of_the_day->product->slug)); ?>" class="btn btn-primary"><?php echo e(translate('Buy_Now')); ?></a>
                                </div>
                            </div>

                            <div class="text-center">
                                <img width="309" src="<?php echo e(\App\CPU\ProductManager::product_image_path('thumbnail')); ?>/<?php echo e($deal_of_the_day->product->thumbnail); ?>" alt=""

                                     class="dark-support rounded">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <div class="<?php echo e(isset($deal_of_the_day->product) ? 'col-lg-6':'col-lg-12'); ?>">
                <div class="card h-100">
                    <div class="p-30">
                        <div class="d-flex flex-wrap justify-content-between gap-3 mb-3 align-items-center">
                            <h3 class="mb-1"><span class="text-primary"><?php echo e(translate('just')); ?></span> <?php echo e(translate('for_you')); ?></h3>

                        </div>
                        <div class="auto-col just-for-you gap-3">
                            <?php $__currentLoopData = $just_for_you; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e(route('product',$product->slug)); ?>"
                               class="hover-zoom-in d-flex flex-column gap-2 align-items-center">
                                <div class="position-relative">
                                    <?php if($product->discount > 0): ?>
                                        <span class="product__discount-badge">-
                                        <?php if($product->discount_type == 'percent'): ?>
                                                <?php echo e(round($product->discount,(!empty($decimal_point_settings) ? $decimal_point_settings: 0))); ?>%
                                        <?php elseif($product->discount_type =='flat'): ?>
                                            <?php echo e(\App\CPU\Helpers::currency_converter($product->discount)); ?>

                                        <?php endif; ?>
                                    </span>
                                    <?php endif; ?>

                                    <img width="100" src="<?php echo e(\App\CPU\ProductManager::product_image_path('thumbnail')); ?>/<?php echo e($product['thumbnail']); ?>"
                                         onerror="this.src='<?php echo e(theme_asset('assets/img/image-place-holder.png')); ?>'" alt=""
                                         loading="lazy" class="dark-support rounded">
                                </div>
                                <div class="product__price d-flex flex-wrap justify-content-center column-gap-2">
                                    <?php if($product->discount > 0): ?>
                                        <del class="product__old-price">
                                            <?php echo e(\App\CPU\Helpers::currency_converter($product->unit_price)); ?>

                                        </del>
                                    <?php endif; ?>
                                    <ins class="product__new-price"><?php echo e(\App\CPU\Helpers::currency_converter($product->unit_price-(\App\CPU\Helpers::get_product_discount($product,$product->unit_price)))); ?></ins>
                                </div>
                            </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH C:\xampp\htdocs\tikka\resources\themes\theme_aster/theme-views/partials/_best-deal-just-for-you.blade.php ENDPATH**/ ?>