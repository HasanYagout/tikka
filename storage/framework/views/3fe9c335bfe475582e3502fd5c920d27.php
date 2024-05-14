<!-- Header -->
<div class="card-header">
    <h4 class="d-flex align-items-center text-capitalize gap-10 mb-0">
        <img src="<?php echo e(asset('public/assets/back-end/img/most-popular-product.png')); ?>" alt="">
        <?php echo e(\App\CPU\translate('most_popular_products')); ?>

    </h4>
</div>
<!-- End Header -->

<!-- Body -->
<div class="card-body">
    <?php if($most_rated_products): ?>
        <div class="row">
            <div class="col-12">
                <div class="grid-card-wrap">
                    <?php $__currentLoopData = $most_rated_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php ($product=\App\Models\Product::find($item['product_id'])); ?>
                        <?php if(isset($product)): ?>
                            <div class="cursor-pointer grid-card" onclick="location.href='<?php echo e(route('admin.product.view',[$item['product_id']])); ?>'">
                                <div class="">
                                    <img class="avatar avatar-bordered border-gold avatar-60 rounded" src="<?php echo e(asset('storage/product/thumbnail')); ?>/<?php echo e($product['thumbnail']); ?>"
                                        onerror="this.src='<?php echo e(asset('public/assets/back-end/img/160x160/img2.jpg')); ?>'"
                                        alt="<?php echo e($product->name); ?> image">
                                </div>
                                <div class="fz-12 title-color text-center">
                                    <?php echo e(isset($product)?substr($product->name,0,30) . (strlen($product->name)>20?'...':''):'not exists'); ?>

                                </div>
                                <div class="d-flex align-items-center gap-1 fz-10">
                                    <span class="rating-color d-flex align-items-center font-weight-bold gap-1">
                                        <i class="tio-star"></i>
                                        <?php echo e(round($item['ratings_average'],2)); ?>

                                    </span>
                                    <span class="d-flex align-items-center gap-10">
                                        (<?php echo e($item['total']); ?> <?php echo e(\App\CPU\translate('Reviews')); ?>)
                                    </span>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="text-center">
            <p class="text-muted"><?php echo e(\App\CPU\translate('No_Top_Selling_Products')); ?></p>
            <img class="w-75" src="<?php echo e(asset('public/assets/back-end/img/no-data.png')); ?>" alt="">
        </div>
    <?php endif; ?>
</div>
<!-- End Body -->
<?php /**PATH C:\xampp\htdocs\tikka\resources\views/admin/partials/_most-rated-products.blade.php ENDPATH**/ ?>