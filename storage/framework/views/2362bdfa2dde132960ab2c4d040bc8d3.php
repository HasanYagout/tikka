<?php $__currentLoopData = $productReviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="card border-primary-light flex-grow-1">
    <div class="media flex-wrap align-items-centr gap-3 p-3">
        <div class="avatar border rounded-circle" style="--size: 3.437rem">
            <img src="<?php echo e(asset("storage/app/public/profile")); ?>/<?php echo e((isset($item->user)?$item->user->image:'')); ?>" alt=""
            class="img-fit dark-support rounded-circle" onerror="this.src='<?php echo e(theme_asset('assets/img/image-place-holder.png')); ?>'">
        </div>
        <div class="media-body d-flex flex-column gap-2">
            <div class="d-flex flex-wrap gap-2 align-items-center justify-content-between">
                <div>
                    <h6 class="mb-1"><?php echo e(isset($item->user)?$item->user->f_name:translate('User_Not_Exist')); ?></h6>
                    <div class="d-flex gap-2 align-items-center">
                        <div class="star-rating text-gold fs-12">
                            <?php for($inc=0; $inc < 5; $inc++): ?>
                                <?php if($inc < $item->rating): ?>
                                    <i class="bi bi-star-fill"></i>
                                <?php else: ?>
                                    <i class="bi bi-star"></i>
                                <?php endif; ?>
                            <?php endfor; ?>
                        </div>
                        <span>(<?php echo e($item->rating); ?>/5)</span>
                    </div>
                </div>
                <div><?php echo e($item->created_at->format("d M Y h:i:s A")); ?></div>
            </div>
            <p><?php echo e($item->comment); ?></p>
        </div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\xampp\htdocs\tikka\resources\themes\theme_aster/theme-views/layouts/partials/_product-reviews.blade.php ENDPATH**/ ?>