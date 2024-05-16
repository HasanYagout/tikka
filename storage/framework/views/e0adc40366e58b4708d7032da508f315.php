<div class="swiper-slide">
    <!-- Single Product -->
    <a href="javascript:"
       class="store-product d-flex flex-column gap-2 align-items-center ov-hidden">
        <div class="store-product__top border rounded mb-2">

            <?php if(isset($product->flash_deal_status) && $product->flash_deal_status == 1): ?>
            <div class="product__power-badge">
                <img src="<?php echo e(theme_asset('assets/img/svg/power.svg')); ?>" alt="" class="svg text-white">
            </div>
            <?php endif; ?>
            <?php if($product->discount > 0): ?>
                <span class="product__discount-badge">-
                     <?php if($product->discount_type == 'percent'): ?>
                        <?php echo e(round($product->discount,(!empty($decimal_point_settings) ? $decimal_point_settings: 0))); ?>%
                    <?php elseif($product->discount_type =='flat'): ?>
                        <?php echo e(\App\CPU\Helpers::currency_converter($product->discount)); ?>

                    <?php endif; ?>
                </span>
            <?php else: ?>
            <?php endif; ?>

            <span class="store-product__action preventDefault" onclick="quickView('<?php echo e($product->id); ?>', '<?php echo e(route('quick-view')); ?>')">
                <i class="bi bi-eye fs-12"></i>
            </span>

            <img width="155"
                 src="<?php echo e(asset('public/storage/product/thumbnail').'/'.$product['thumbnail']); ?>"
                 onerror="this.src='<?php echo e(theme_asset('assets/img/image-place-holder.png')); ?>'" alt=""
                 loading="lazy" class="dark-support rounded">
        </div>
        <a class="fs-16 text-truncate text-muted text-capitalize" href="<?php echo e(route('product',$product->slug)); ?>" style="--width: 9rem">
            <?php echo e(Str::limit($product['name'], 18)); ?>

            <div class="product__price d-flex justify-content-center align-items-center flex-wrap column-gap-2 mt-1">
                <?php if($product->discount > 0): ?>
                    <del class="product__old-price">
                        <?php echo e(\App\CPU\Helpers::currency_converter($product->unit_price)); ?>

                    </del>
                <?php endif; ?>
                <ins class="product__new-price fs-14">
                    <?php echo e(\App\CPU\Helpers::currency_converter($product->unit_price-(\App\CPU\Helpers::get_product_discount($product,$product->unit_price)))); ?>

                </ins>
            </div>
        </a>
    </a>
</div>

<?php /**PATH C:\xampp\htdocs\tikka\resources\themes\theme_aster/theme-views/partials/_product-category-card.blade.php ENDPATH**/ ?>