<div class="pos-product-item card" onclick="quickView('<?php echo e($product->id); ?>')">
    <div class="pos-product-item_thumb">
        <img class="img-fit" src="<?php echo e(asset('storage/product/thumbnail')); ?>/<?php echo e($product->thumbnail); ?>"
                 onerror="this.src='<?php echo e(asset('public/assets/back-end/img/160x160/img2.jpg')); ?>'">
    </div>

    <div class="pos-product-item_content clickable">
        <div class="pos-product-item_title">
            <!-- <?php echo e(Str::limit($product['name'], 26)); ?> -->
            <?php echo e($product['name']); ?>

        </div>
        <div class="pos-product-item_price">
            <?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($product['unit_price']- \App\CPU\Helpers::get_product_discount($product, $product['unit_price'])))); ?>

            <!--  -->
        </div>






    </div>
</div>
<?php /**PATH C:\xampp\htdocs\tikka\resources\views/admin/pos/_single_product.blade.php ENDPATH**/ ?>