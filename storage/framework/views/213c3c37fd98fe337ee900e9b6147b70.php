<!-- Header -->
<div class="card-header gap-10">
    <h4 class="d-flex align-items-center text-capitalize gap-10 mb-0">
        <img width="20" src="<?php echo e(asset('public/assets/back-end/img/top-selling-product.png')); ?>" alt="">
        <?php echo e(\App\CPU\translate('top_selling_products')); ?>

    </h4>
</div>
<!-- End Header -->

<!-- Body -->
<div class="card-body">
    <div class="grid-item-wrap">
        <?php if($top_sell): ?>
            <?php $__currentLoopData = $top_sell; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(isset($item->product)): ?>
                    <div class="cursor-pointer"
                         onclick="location.href='<?php echo e(route('admin.product.view',[$item['product_id']])); ?>'">
                        <div class="grid-item px-0 bg-transparent">
                            <div class="d-flex gap-10">
                                <img src="<?php echo e(\App\CPU\ProductManager::product_image_path('thumbnail')); ?>/<?php echo e($item->product['thumbnail']); ?>" class="avatar avatar-lg rounded avatar-bordered" onerror="this.src='<?php echo e(asset('public/assets/back-end/img/160x160/img2.jpg')); ?>'" alt="<?php echo e($item->product->name); ?> image">
                                <div class="title-color"><?php echo e(substr($item->product['name'],0,20)); ?> <?php echo e(strlen($item->product['name'])>20?'...':''); ?></div>
                            </div>

                            <div class="orders-count py-2 px-3 d-flex gap-1">
                                <div><?php echo e(\App\CPU\translate('sold')); ?> : </div>
                                <div class="sold-count"><?php echo e($item['count']); ?></div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <div class="text-center">
                <p class="text-muted"><?php echo e(\App\CPU\translate('No_Top_Selling_Products')); ?></p>
                <img class="w-75" src="<?php echo e(asset('public/assets/back-end/img/no-data.png')); ?>" alt="">
            </div>
        <?php endif; ?>
    </div>
</div>
<!-- End Body -->
<?php /**PATH C:\xampp\htdocs\tikka\resources\views/admin/partials/_top-selling-products.blade.php ENDPATH**/ ?>