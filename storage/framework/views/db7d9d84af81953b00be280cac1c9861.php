<?php ($overallRating = \App\CPU\ProductManager::get_overall_rating($product->reviews)); ?>


<div class="product-single-hover" >
    <div class="overflow-hidden position-relative">
        <div class="inline_product clickable rtl"
                style="background:<?php echo e($web_config['primary_color']); ?>10;">
            <?php if($product->discount > 0): ?>
                        <span class="for-discoutn-value p-1 pl-2 pr-2">
                        <?php if($product->discount_type == 'percent'): ?>
                                <?php echo e(round($product->discount,(!empty($decimal_point_settings) ? $decimal_point_settings: 0))); ?>%
                            <?php elseif($product->discount_type =='flat'): ?>
                                <?php echo e(\App\CPU\Helpers::currency_converter($product->discount)); ?>

                            <?php endif; ?>
                            <?php echo e(\App\CPU\translate('off')); ?>

                        </span>
            <?php else: ?>
                <span class="for-discoutn-value-null"></span>
            <?php endif; ?>
                <a href="<?php echo e(route('product',$product->slug)); ?>">
                    <img src="<?php echo e(\App\CPU\ProductManager::product_image_path('thumbnail')); ?>/<?php echo e($product['thumbnail']); ?>"
                        onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'">
                </a>
        </div>
        <div class="single-product-details">
            <div class="text-<?php echo e(Session::get('direction') === "rtl" ? 'right pr-3' : 'left pl-3'); ?>">
                <a href="<?php echo e(route('product',$product->slug)); ?>">
                    <?php echo e(Str::limit($product['name'], 23)); ?>

                </a>
            </div>
            <div class="rating-show justify-content-between text-center">
                <span class="d-inline-block font-size-sm text-body">
                    <?php for($inc=0;$inc<5;$inc++): ?>
                        <?php if($inc<$overallRating[0]): ?>
                            <i class="sr-star czi-star-filled active"></i>
                        <?php else: ?>
                            <i class="sr-star czi-star" style="color:#fea569 !important"></i>
                        <?php endif; ?>
                    <?php endfor; ?>
                    <label class="badge-style">( <?php echo e($product->reviews_count); ?> )</label>
                </span>
            </div>
            <div class="justify-content-between text-center">
                <div class="product-price text-center">
                    <?php if($product->discount > 0): ?>
                        <strike style="font-size: 12px!important;color: #E96A6A!important;">
                            <?php echo e(\App\CPU\Helpers::currency_converter($product->unit_price)); ?>

                        </strike><br>
                    <?php endif; ?>
                    <span class="text-accent">
                        <?php echo e(\App\CPU\Helpers::currency_converter(
                            $product->unit_price-(\App\CPU\Helpers::get_product_discount($product,$product->unit_price))
                        )); ?>

                    </span>
                </div>
            </div>

        </div>
        <div class="text-center quick-view" >
            <?php if(Request::is('product/*')): ?>
                <a class="btn btn--primary btn-sm" href="<?php echo e(route('product',$product->slug)); ?>">
                    <i class="czi-forward align-middle <?php echo e(Session::get('direction') === "rtl" ? 'ml-1' : 'mr-1'); ?>"></i>
                    <?php echo e(\App\CPU\translate('View')); ?>

                </a>
            <?php else: ?>
                <a class="btn btn--primary btn-sm" href="javascript:"
                onclick="quickView('<?php echo e($product->id); ?>')">
                    <i class="czi-eye align-middle <?php echo e(Session::get('direction') === "rtl" ? 'ml-1' : 'mr-1'); ?>"></i>
                    <?php echo e(\App\CPU\translate('Quick')); ?>   <?php echo e(\App\CPU\translate('View')); ?>

                </a>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php /**PATH C:\xampp\htdocs\tikka\resources\themes\default/web-views/partials/_feature-product.blade.php ENDPATH**/ ?>