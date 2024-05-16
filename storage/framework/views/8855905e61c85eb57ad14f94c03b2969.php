<?php ($overallRating = $product->reviews ? \App\CPU\ProductManager::get_overall_rating($product->reviews) : 0); ?>
<div class="product border rounded text-center d-flex flex-column gap-10 ov-hidden cursor-pointer"
     onclick="location.href='<?php echo e(route('product',$product->slug)); ?>'">
    <!-- Product top -->
    <div class="product__top" style="--width: 100%;">
        <?php if($product->discount > 0): ?>
            <span class="product__discount-badge">
                -<?php if($product->discount_type == 'percent'): ?>
                    <?php echo e(round($product->discount, $web_config['decimal_point_settings'])); ?>%
                <?php elseif($product->discount_type =='flat'): ?>
                    <?php echo e(\App\CPU\Helpers::currency_converter($product->discount)); ?>

                <?php endif; ?>
            </span>
        <?php endif; ?>

        <?php if(isset($product->flash_deal_status) && $product->flash_deal_status): ?>
            <div class="product__power-badge">
                <img src="<?php echo e(theme_asset('assets/img/svg/power.svg')); ?>" alt=""
                     class="svg text-white">
            </div>
        <?php endif; ?>
        <?php ($wishlist = count($product->wish_list)>0 ? 1 : 0); ?>
        <?php ($compare_list = count($product->compare_list)>0 ? 1 : 0); ?>
        <div class="product__actions d-flex flex-column gap-2">
            <a href="javascript:" onclick="addWishlist('<?php echo e($product['id']); ?>','<?php echo e(route('store-wishlist')); ?>')"
               id="wishlist-<?php echo e($product['id']); ?>"
               class="btn-wishlist stopPropagation add_to_wishlist wishlist-<?php echo e($product['id']); ?> <?php echo e(($wishlist == 1?'wishlist_icon_active':'')); ?>"
               title="Add to wishlist">
                <i class="bi bi-heart"></i>
            </a>
            <a href="javascript:"
               class="btn-compare stopPropagation add_to_compare compare_list-<?php echo e($product['id']); ?> <?php echo e(($compare_list == 1?'compare_list_icon_active':'')); ?>"
               onclick="addCompareList('<?php echo e($product['id']); ?>','<?php echo e(route('store-compare-list')); ?>')"
               id="compare_list-<?php echo e($product['id']); ?>" title="Add to compare">
                <i class="bi bi-repeat"></i>
            </a>
            <a href="javascript:" class="btn-quickview stopPropagation"
               onclick="quickView('<?php echo e($product->id); ?>', '<?php echo e(route('quick-view')); ?>')" title="<?php echo e(translate('quick_view')); ?>">
                <i class="bi bi-eye"></i>
            </a>
        </div>

        <div class="product__thumbnail">
            <img src="<?php echo e(asset('public/storage/product/thumbnail').'/'.$product['thumbnail']); ?>"
                 onerror="this.src='<?php echo e(theme_asset('assets/img/image-place-holder.png')); ?>'" loading="lazy"
                 class="img-fit dark-support rounded" alt="">
        </div>
        <?php if(($product['product_type'] == 'physical') && ($product['current_stock'] < 1)): ?>
            <div class="product__notify">
                <?php echo e(translate('sorry')); ?>, <?php echo e(translate('this_item_is_currently_sold_out')); ?>

            </div>
        <?php endif; ?>

        <?php if(isset($product->flash_deal_status) && $product->flash_deal_status): ?>
            <div class="product__countdown d-flex gap-2 gap-sm-3 justify-content-center"
                 data-date="<?php echo e($product->flash_deal_end_date); ?>">
                <div class="days d-flex flex-column gap-2"></div>
                <div class="hours d-flex flex-column gap-2"></div>
                <div class="minutes d-flex flex-column gap-2"></div>
                <div class="seconds d-flex flex-column gap-2"></div>
            </div>
        <?php endif; ?>
    </div>

    <!-- Product Summery -->
    <div class="product__summary d-flex flex-column align-items-center gap-1 pb-3 cursor-pointer">
        <div class="d-flex gap-2 align-items-center">
            <div class="star-rating text-gold fs-12">
                <?php for($i = 1; $i <= 5; $i++): ?>
                    <?php if($i <= (int)$overallRating[0]): ?>
                        <i class="bi bi-star-fill"></i>
                    <?php elseif($overallRating[0] != 0 && $i <= (int)$overallRating[0] + 1.1 && $overallRating[0] > ((int)$overallRating[0])): ?>
                        <i class="bi bi-star-half"></i>
                    <?php else: ?>
                        <i class="bi bi-star"></i>
                    <?php endif; ?>
                <?php endfor; ?>
            </div>
            <span>( <?php echo e(count($product->reviews)); ?> )</span>
        </div>

        <div class="text-muted fs-12">
            <?php if($product->added_by=='seller'): ?>
                <?php echo e(isset($product->seller->shop->name) ? \Illuminate\Support\Str::limit($product->seller->shop->name, 20) : ''); ?>

            <?php elseif($product->added_by=='admin'): ?>
                <?php echo e($web_config['name']->value); ?>

            <?php endif; ?>
        </div>

        <h6 class="product__title text-truncate">
            <?php echo e(\Illuminate\Support\Str::limit($product['name'], 25)); ?>

        </h6>

        <div class="product__price d-flex justify-content-center flex-wrap column-gap-2">
            <?php if($product->discount > 0): ?>
                <del class="product__old-price"><?php echo e(\App\CPU\Helpers::currency_converter($product->unit_price)); ?></del>
            <?php endif; ?>
            <ins class="product__new-price">
                <?php echo e(\App\CPU\Helpers::currency_converter($product->unit_price-\App\CPU\Helpers::get_product_discount($product,$product->unit_price))); ?>

            </ins>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\tikka\resources\themes\theme_aster/theme-views/partials/_product-large-card.blade.php ENDPATH**/ ?>