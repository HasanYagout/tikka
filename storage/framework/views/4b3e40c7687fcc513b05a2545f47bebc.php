<?php $__env->startSection('title', $web_config['name']->value.' '.translate('Online Shopping').' | '.$web_config['name']->value.' '.translate(' Ecommerce')); ?>
<?php $__env->startPush('css_or_js'); ?>
    <meta property="og:image" content="<?php echo e(asset('public/storage/company')); ?>/<?php echo e($web_config['web_logo']->value); ?>"/>
    <meta property="og:title" content="Welcome To <?php echo e($web_config['name']->value); ?> Home"/>
    <meta property="og:url" content="<?php echo e(env('APP_URL')); ?>">
    <meta property="og:description" content="<?php echo substr($web_config['about']->value,0,100); ?>">

    <meta property="twitter:card" content="<?php echo e(asset('public/storage/company')); ?>/<?php echo e($web_config['web_logo']->value); ?>"/>
    <meta property="twitter:title" content="Welcome To <?php echo e($web_config['name']->value); ?> Home"/>
    <meta property="twitter:url" content="<?php echo e(env('APP_URL')); ?>">
    <meta property="twitter:description" content="<?php echo substr($web_config['about']->value,0,100); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <main class="main-content d-flex flex-column gap-3 py-3">
        <!-- Main Banner -->
        <?php echo $__env->make('theme-views.partials._main-banner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Flash Deal -->
        <?php if($web_config['flash_deals']): ?>
            <?php echo $__env->make('theme-views.partials._flash-deals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        <!-- Find What You Need -->


        <!-- Top Stores -->




        <!-- Featured Deals -->
        <?php if($web_config['featured_deals']->count()>0): ?>
            <?php echo $__env->make('theme-views.partials._featured-deals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        <!-- Recommended For You -->
        <?php echo $__env->make('theme-views.partials._recommended-product', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- More Stores -->
        <?php if($web_config['business_mode'] == 'multi'): ?>
            <?php echo $__env->make('theme-views.partials._more-stores', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        <!-- Top Rated Products -->
        <?php echo $__env->make('theme-views.partials._top-rated-products', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Today’s Best Deal an Just for you -->
        <?php echo $__env->make('theme-views.partials._best-deal-just-for-you', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Home Categories -->
        <?php echo $__env->make('theme-views.partials._home-categories', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Call To Action -->
        <?php if(isset($main_section_banner)): ?>
        <section class="">
            <div class="container">
                <div class="py-5 rounded position-relative">
                    <img src="<?php echo e(asset('public/storage/banner')); ?>/<?php echo e($main_section_banner ? $main_section_banner['photo'] : ''); ?>"
                         onerror="this.src='<?php echo e(theme_asset('assets/img/main-section-banner-placeholder.png')); ?>'"
                         alt="" class="rounded position-absolute dark-support img-fit start-0 top-0 index-n1 flipX-in-rtl">
                    <div class="row justify-content-center">
                        <div class="col-10 py-4">
                            <h6 class="text-primary mb-2"><?php echo e(translate('Don’t_Miss_Todays_Deal')); ?>!</h6>
                            <h2 class="fs-2 mb-4 absolute-dark"><?php echo e(translate('Let’s_Shopping_Today')); ?></h2>
                            <div class="d-flex">
                                <a href="<?php echo e($main_section_banner ? $main_section_banner->url:''); ?>" class="btn btn-primary fs-16"><?php echo e(translate('Shop_Now')); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php endif; ?>
    </main>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('theme-views.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tikka\resources\themes\theme_aster/theme-views/home.blade.php ENDPATH**/ ?>