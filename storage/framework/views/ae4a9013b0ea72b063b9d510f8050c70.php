<!-- Initial Modal -->
<?php if($web_config['popup_banner']): ?>
<div class="modal fade" id="initialModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered justify-content-center">
        <div class="modal-content border-0" style="max-width: 600px;">
            <div class="modal-body p-0">
                <button type="button" class="btn-close outside" data-bs-dismiss="modal" aria-label="Close"></button>
                <div onclick="location.href='<?php echo e($web_config['popup_banner']['url']); ?>'">
                    <img src="<?php echo e(asset('public/storage/app/public/banner')); ?>/<?php echo e($web_config['popup_banner']['photo']); ?>"
                         onerror="this.src='<?php echo e(theme_asset('assets/img/image-place-holder.png')); ?>'"
                         class="dark-support rounded img-fit" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\tikka\resources\themes\theme_aster/theme-views/layouts/partials/modal/_initial.blade.php ENDPATH**/ ?>
