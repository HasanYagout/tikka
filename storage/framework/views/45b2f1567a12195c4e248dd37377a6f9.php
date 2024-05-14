<?php if(isset($product)): ?>
    <?php ($overallRating = \App\CPU\ProductManager::get_overall_rating($product->reviews)); ?>
    <div class="flash_deal_product rtl" style="cursor: pointer; height:155px; margin-bottom:10px;"
         onclick="location.href='<?php echo e(route('product',$product->slug)); ?>'">
        <?php if($product->discount > 0): ?>
        <div class="d-flex" style="position:absolute;z-index:2;">
            <span class="for-discoutn-value p-1 pl-2 pr-2" style="<?php echo e(Session::get('direction') === "rtl" ? 'border-radius:0px 5px' : 'border-radius:5px 0px'); ?>;">
                <?php if($product->discount_type == 'percent'): ?>
                    <?php echo e(round($product->discount,(!empty($decimal_point_settings) ? $decimal_point_settings: 0))); ?>%
                <?php elseif($product->discount_type =='flat'): ?>
                    <?php echo e(\App\CPU\Helpers::currency_converter($product->discount)); ?>

                <?php endif; ?> <?php echo e(\App\CPU\translate('off')); ?>

            </span>
        </div>
        <?php endif; ?>
        <div class=" d-flex" style="">
            <div class=" d-flex align-items-center justify-content-center"
                 style="padding-<?php echo e(Session::get('direction') === "rtl" ?'right:14px':'left:14px'); ?>;padding-top:14px;">
                <div class="flash-deals-background-image" style="background: <?php echo e($web_config['primary_color']); ?>10">
                    <img class="__img-125px"
                     src="<?php echo e(\App\CPU\ProductManager::product_image_path('thumbnail')); ?>/<?php echo e($product['thumbnail']); ?>"
                     onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"/>
                </div>
            </div>
            <div class=" flash_deal_product_details pl-3 pr-3 pr-1 d-flex align-items-center">
                <div>
                    <div>
                        <span class="flash-product-title">
                            <?php echo e($product['name']); ?>

                        </span>
                    </div>
                    <div class="flash-product-review">
                        <?php for($inc=0;$inc<5;$inc++): ?>
                            <?php if($inc<$overallRating[0]): ?>
                                <i class="sr-star czi-star-filled active"></i>
                            <?php else: ?>
                                <i class="sr-star czi-star" style="color:#fea569 !important"></i>
                            <?php endif; ?>
                        <?php endfor; ?>
                        <label class="badge-style2">
                            ( <?php echo e($product->reviews->count()); ?> )
                        </label>
                    </div>
                    <div>
                        <?php if($product->discount > 0): ?>
                            <strike
                                style="font-size: 12px!important;color: #E96A6A!important;">
                                <?php echo e(\App\CPU\Helpers::currency_converter($product->unit_price)); ?>

                            </strike>
                        <?php endif; ?>
                    </div>
                    <div class="flash-product-price">
                        <?php echo e(\App\CPU\Helpers::currency_converter($product->unit_price-\App\CPU\Helpers::get_product_discount($product,$product->unit_price))); ?>


                    </div>

                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\tikka\resources\themes\default/web-views/partials/seller-products-product-details.blade.php ENDPATH**/ ?>