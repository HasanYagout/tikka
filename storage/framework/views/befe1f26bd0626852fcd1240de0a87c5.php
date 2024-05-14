<style>
    .list-group-item li, a {
        color: <?php echo e($web_config['primary_color']); ?>;
    }

    .list-group-item li, a:hover {
        color: <?php echo e($web_config['secondary_color']); ?>;
    }
</style>
<ul class="list-group list-group-flush">
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="list-group-item">
            <a href="<?php echo e(route('product',$product->slug)); ?>" onmouseover="$('.search-bar-input-mobile').val('<?php echo e($product['name']); ?>');$('.search-bar-input').val('<?php echo e($product['name']); ?>');">
                <?php echo e($product['name']); ?>

            </a>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<?php /**PATH C:\xampp\htdocs\tikka\resources\themes\default/web-views/partials/_search-result.blade.php ENDPATH**/ ?>