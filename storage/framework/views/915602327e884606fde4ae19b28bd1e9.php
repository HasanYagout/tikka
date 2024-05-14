
<?php if($wishlists->count()>0): ?>
    <?php $__currentLoopData = $wishlists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wishlist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php ($product = $wishlist->product_full_info); ?>
        <?php if( $wishlist->product_full_info): ?>
            <div class="card __card __card-mobile-340 mb-3">
                <div class="product">
                    <div class="card">
                        <div class="row g-2">
                            <div class="wishlist_product_img col-md-4 col-xl-2 col-lg-3 col-sm-4">
                                <a href="<?php echo e(route('product',$product->slug)); ?>" class="d-block h-100">
                                    <img class="__img-full" src="<?php echo e(\App\CPU\ProductManager::product_image_path('thumbnail')); ?>/<?php echo e($product['thumbnail']); ?>"
                                    onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'" alt="wishlist"
                                        >
                                </a>
                            </div>
                            <div class="wishlist_product_desc align-self-center col-sm-8 col-md-8 col-xl-10 col-lg-9 py-3 px-sm-4">
                                <div class="font-name">
                                    <a href="<?php echo e(route('product',$product['slug'])); ?>"><?php echo e($product['name']); ?></a>
                                </div>
                                <?php if($brand_setting): ?>
                                <span class="sellerName"> <?php echo e(\App\CPU\translate('Brand')); ?> :<?php echo e($product->brand?$product->brand['name']:''); ?> </span>
                                <?php endif; ?>

                                <div class="">
                                    <?php if($product->discount > 0): ?>
                                    <strike style="color: #E96A6A;" class="<?php echo e(Session::get('direction') === "rtl" ? 'ml-1' : 'mr-3'); ?>">
                                        <?php echo e(\App\CPU\Helpers::currency_converter($product->unit_price)); ?>

                                    </strike>
                                <?php endif; ?>
                                <span
                                    class="font-weight-bold amount"><?php echo e(\App\CPU\Helpers::get_price_range($product)); ?></span>
                                </div>
                            </div>
                            <a href="javascript:" class="wishlist_product_icon">
                                <i class="czi-close-circle" onclick="removeWishlist('<?php echo e($product['id']); ?>')"
                                    style="color: red"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <span class="badge badge-danger"><?php echo e(\App\CPU\translate('item_removed')); ?></span>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
    <center>
        <h6 class="text-muted">
            <?php echo e(\App\CPU\translate('No data found')); ?>.
        </h6>
    </center>
<?php endif; ?>

<div class="card-footer border-0">
    <?php echo e($wishlists->links()); ?>

</div>
<?php /**PATH C:\xampp\htdocs\tikka\resources\themes\default/web-views/partials/_wish-list-data.blade.php ENDPATH**/ ?>