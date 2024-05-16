<section>
    <div class="container">
        <div class="card px-3 px-lg-0 py-4">
            <div class="flexible-grid lg-down-1 gap-30 gap-lg-0">
                <div class="">
                    <div class="flash-deal-countdown text-center">
                        <div class="mb-2 text-primary">
                            <img width="122" src="<?php echo e(theme_asset('assets/img/media/flash-deal.svg')); ?>" loading="lazy" alt="" class="dark-support svg">
                        </div>
                        <div class="d-flex justify-content-center align-items-end gap-2 mb-4">
                            <h2 class="text-primary fw-medium"><?php echo e(translate('Hurry_up')); ?> !</h2>
                            <div class="text-muted"><?php echo e(translate('offer_ends_in')); ?>:</div>
                        </div>

                        <div class="countdown-timer d-flex gap-3 gap-sm-4 flex-wrap justify-content-center" data-date="<?php echo e($flash_deals?$flash_deals['end_date']:''); ?>">
                            <div class="days d-flex flex-column gap-2 gap-sm-3"></div>
                            <div class="hours d-flex flex-column gap-2 gap-sm-3"></div>
                            <div class="minutes d-flex flex-column gap-2 gap-sm-3"></div>
                            <div class="seconds d-flex flex-column gap-2 gap-sm-3"></div>
                        </div>
                    </div>
                </div>
                <div class="swiper-container">
                    <div class="mb-2 d-flex justify-content-end px-lg-4">
                        <a  href="<?php echo e(route('flash-deals',[$flash_deals ? $flash_deals['id']:0])); ?>" class="btn-link text-primary"><?php echo e(translate('View_All')); ?></a>
                    </div>
                    <!-- Swiper -->
                    <div class="auto-item-width position-relative">
                        <div class="swiper" data-swiper-loop="false" data-swiper-items="auto" data-swiper-margin="20" data-swiper-pagination-el="null" data-swiper-navigation-next=".swiper-button-next--flash-deal" data-swiper-navigation-prev=".swiper-button-prev--flash-deal">
                            <div class="swiper-wrapper">
                                <?php $__currentLoopData = $flash_deals->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$deal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if( $deal->product): ?>
                                    <div class="swiper-slide">
                                        <?php echo $__env->make('theme-views.partials._product-medium-card',['product'=>$deal->product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </div>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>

                        <?php if($flash_deals->products): ?>
                            <div class="swiper-button-next swiper-button-next--flash-deal"></div>
                            <div class="swiper-button-prev swiper-button-prev--flash-deal"></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH C:\xampp\htdocs\tikka\resources\themes\theme_aster/theme-views/partials/_flash-deals.blade.php ENDPATH**/ ?>