<?php if(count($products) > 0): ?>
    <div class="auto-col gap-3 mobile_two_items <?php echo e((session()->get('product_view_style') == 'list-view'?'product-list-view':'')); ?>" id="filtered-products" style="--minWidth: 12rem;<?php echo e((count($products) > 4?'--maxWidth:1fr':'--maxWidth:14rem')); ?>">
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make('theme-views.partials._product-small-card', ['product'=>$product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php else: ?>
    <div class="text-center pt-5 pb-4">
        <h2><?php echo e(translate('No Product Found')); ?></h2>
    </div>
<?php endif; ?>


<?php if(count($products) > 0): ?>
<div class="my-4" id="paginator-ajax">
    <?php echo $products->links(); ?>

</div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\tikka\resources\themes\theme_aster/theme-views/product/_ajax-products.blade.php ENDPATH**/ ?>