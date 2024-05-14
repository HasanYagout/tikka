<!-- Header -->
<div class="card-header">
    <h4 class="d-flex align-items-center text-capitalize gap-10 mb-0">
        <img src="<?php echo e(asset('public/assets/back-end/img/top-customers.png')); ?>" alt="">
        <?php echo e(\App\CPU\translate('Top_Delivery_Man')); ?>

    </h4>
</div>
<!-- End Header -->

<!-- Body -->
<div class="card-body">
    <?php if($top_deliveryman): ?>
        <div class="grid-card-wrap">
            <?php $__currentLoopData = $top_deliveryman; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(isset($item->delivery_man)): ?>
                    <div class="cursor-pointer">
                        <div class="grid-card">
                            <div class="text-center">
                                <img class="avatar rounded-circle avatar-lg"
                                     onclick="location.href='<?php echo e(route('admin.delivery-man.earning-statement-overview',[$item['delivery_man_id']])); ?>'"
                                     onerror="this.src='<?php echo e(asset('public/assets/back-end/img/160x160/img1.jpg')); ?>'"
                                     src="<?php echo e(asset('storage/delivery-man/'.$item->delivery_man->image??'')); ?>">
                            </div>

                            <h5 class="mb-0">
                                <?php echo e(Str::limit($item->delivery_man['f_name'], 15)); ?>

                            </h5>

                            <div class="orders-count d-flex gap-1">
                                <div><?php echo e(\App\CPU\translate('delivered')); ?> : </div>
                                <div><?php echo e($item['count']); ?></div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php else: ?>
        <div class="text-center">
            <p class="text-muted"><?php echo e(\App\CPU\translate('No_Top_Selling_Products')); ?></p>
            <img class="w-75" src="<?php echo e(asset('public/assets/back-end/img/no-data.png')); ?>" alt="">
        </div>
    <?php endif; ?>
</div>
<!-- End Body -->
<?php /**PATH C:\xampp\htdocs\tikka\resources\views/admin/partials/_top-delivery-man.blade.php ENDPATH**/ ?>