<!-- Header -->
<div class="card-header">
    <h4 class="d-flex align-items-center text-capitalize gap-10 mb-0">
        <img src="<?php echo e(asset('public/assets/back-end/img/top-customers.png')); ?>" alt="">
        <?php echo e(\App\CPU\translate('top_customer')); ?>

    </h4>
</div>
<!-- End Header -->

<!-- Body -->
<div class="card-body">
    <?php if($top_customer): ?>
        <div class="grid-card-wrap">
            <?php $__currentLoopData = $top_customer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(isset($item->customer)): ?>
                    <div class="cursor-pointer"
                         onclick="location.href='<?php echo e(route('admin.customer.view',[$item['customer_id']])); ?>'">
                        <div class="grid-card">
                            <div class="text-center">
                                <img class="avatar rounded-circle avatar-lg"
                                     onerror="this.src='<?php echo e(asset('public/assets/back-end/img/160x160/img1.jpg')); ?>'"
                                     src="<?php echo e(asset('storage/profile/'.$item->customer->image??'')); ?>">
                            </div>

                            <h5 class="mb-0"><?php echo e($item->customer['f_name']??'Not exist'); ?></h5>

                            <div class="orders-count d-flex gap-1">
                                <div><?php echo e(\App\CPU\translate('orders')); ?> : </div>
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
<?php /**PATH C:\xampp\htdocs\tikka\resources\views/admin/partials/_top-customer.blade.php ENDPATH**/ ?>