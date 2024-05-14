<!-- Footer -->
<footer class="footer">
    <div class="footer-bg-img" data-bg-img="<?php echo e(theme_asset('assets/img/background/footer-bg.png')); ?>">

    </div>
    <div class="footer-top">
        <div class="container">
            <div class="row gy-3 align-items-center">
                <div class="col-lg-9 col-sm-6 d-flex justify-content-center justify-content-sm-start justify-content-lg-center">

                    <ul class="list-socials list-socials--white gap-4 fs-18">
                        <?php if($web_config['social_media']): ?>
                            <?php $__currentLoopData = $web_config['social_media']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <a href="<?php echo e($item->link); ?>" target="_blank">
                                        <i class="bi bi-<?php echo e(($item->name == 'google-plus'?'google':$item->name)); ?>"></i>
                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="col-lg-3 col-sm-6 d-flex justify-content-center justify-content-sm-start">
                    <div class="media gap-3 absolute-white">
                        <i class="bi bi-telephone-forward fs-28"></i>
                        <div class="media-body">
                            <h6 class="absolute-white mb-1"><?php echo e(translate('Hotline')); ?></h6>
                            <a href="tel:<?php echo e($web_config['phone']->value); ?>" class="absolute-white"><?php echo e($web_config['phone']->value); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-main px-2  px-lg-0">
        <div class="container">
            <div class="row gy-5">
                <div class="col-lg-4">
                    <div class="widget widget--about text-center text-lg-start absolute-white">
                        <img class="mb-3" width="180" src="<?php echo e(asset("public/storage/company/")); ?>/<?php echo e($web_config['footer_logo']->value); ?>"
                        onerror="this.src='<?php echo e(theme_asset('assets/img/logo-white.png')); ?>'"
                        loading="lazy" alt="">
                        <p><?php echo e(\App\CPU\Helpers::get_business_settings('shop_address')); ?></p>
                        <a href="mailto:<?php echo e($web_config['email']->value); ?>"><?php echo e($web_config['email']->value); ?></a>

                        <div class="d-flex gap-3 justify-content-center justify-content-lg-start flex-wrap mt-4">
                            <?php if($web_config['android']['status']): ?>
                                <a href="<?php echo e($web_config['android']['link']); ?>"><img src="<?php echo e(theme_asset('assets/img/media/google-play.png')); ?>" loading="lazy" alt=""></a>
                            <?php endif; ?>
                            <?php if($web_config['ios']['status']): ?>
                                <a href="<?php echo e($web_config['ios']['link']); ?>"><img src="<?php echo e(theme_asset('assets/img/media/app-store.png')); ?>" loading="lazy" alt=""></a>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row gy-5">
                        <div class="col-sm-4 col-6">
                            <div class="widget widget--nav absolute-white">
                                <h4 class="widget__title"><?php echo e(translate('Accounts')); ?></h4>
                                <ul class="d-flex flex-column gap-3">
                                    <?php if($web_config['seller_registration']): ?>
                                        <li>
                                            <a href="<?php echo e(route('shop.apply')); ?>"><?php echo e(translate('Open_Your_Store')); ?></a>
                                        </li>
                                    <?php endif; ?>
                                    <li>
                                        <?php if(auth('customer')->check()): ?>
                                            <a href="<?php echo e(route('user-profile')); ?>"><?php echo e(translate('Profile')); ?></a>
                                        <?php else: ?>
                                            <button class="bg-transparent border-0 p-0" data-bs-toggle="modal" data-bs-target="#loginModal"><?php echo e(translate('Profile')); ?></button>
                                        <?php endif; ?>
                                    </li>
                                    <li>
                                        <?php if(auth('customer')->check()): ?>
                                            <a href="<?php echo e(route('track-order.index')); ?>"><?php echo e(translate('track_order')); ?></a>
                                        <?php else: ?>
                                            <button class="bg-transparent border-0 p-0" data-bs-toggle="modal" data-bs-target="#loginModal"><?php echo e(translate('track_order')); ?></button>
                                        <?php endif; ?>
                                    </li>
                                    <li><a href="<?php echo e(route('contacts')); ?>"><?php echo e(translate('Help_&_Support')); ?></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-4 col-6">
                            <div class="widget widget--nav absolute-white">
                                <h4 class="widget__title"><?php echo e(translate('Quick_Links')); ?></h4>
                                <ul class="d-flex flex-column gap-3">
                                    <?php if($web_config['flash_deals']): ?>
                                        <li><a href="<?php echo e(route('flash-deals',[$web_config['flash_deals']['id']])); ?>"><?php echo e(translate('Flash_Deals')); ?></a></li>
                                    <?php endif; ?>
                                    <li><a href="<?php echo e(route('products',['data_from'=>'featured','page'=>1])); ?>"><?php echo e(translate('Featured_Products')); ?></a></li>
                                    <li><a href="<?php echo e(route('sellers')); ?>"><?php echo e(translate('Top_Stores')); ?></a></li>
                                    <li><a href="<?php echo e(route('products',['data_from'=>'latest'])); ?>"><?php echo e(translate('Latest_Products')); ?></a></li>
                                    <li><a href="<?php echo e(route('helpTopic')); ?>"><?php echo e(translate('FAQ')); ?></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-4 col-6">
                            <div class="widget widget--nav absolute-white">
                                <h4 class="widget__title"><?php echo e(translate('Other')); ?></h4>
                                <ul class="d-flex flex-column gap-3">
                                    <li><a href="<?php echo e(route('about-us')); ?>"><?php echo e(translate('About_Company')); ?></a></li>
                                    <li><a href="<?php echo e(route('privacy-policy')); ?>"><?php echo e(translate('Privacy_Policy')); ?></a></li>
                                    <li><a href="<?php echo e(route('terms')); ?>"><?php echo e(translate('Terms_&_Conditions')); ?></a></li>

                                    <?php if(isset($web_config['refund_policy']['status']) && $web_config['refund_policy']['status'] == 1): ?>
                                        <li>
                                            <a href="<?php echo e(route('refund-policy')); ?>"><?php echo e(translate('refund_policy')); ?></a>
                                        </li>
                                    <?php endif; ?>

                                    <?php if(isset($web_config['return_policy']['status']) && $web_config['return_policy']['status'] == 1): ?>
                                        <li>
                                            <a href="<?php echo e(route('return-policy')); ?>"><?php echo e(translate('return_policy')); ?></a>
                                        </li>
                                    <?php endif; ?>

                                    <?php if(isset($web_config['cancellation_policy']['status']) && $web_config['cancellation_policy']['status'] == 1): ?>
                                        <li>
                                            <a href="<?php echo e(route('cancellation-policy')); ?>"><?php echo e(translate('cancellation_policy')); ?></a>
                                        </li>
                                    <?php endif; ?>

                                    <li>
                                        <?php if(auth('customer')->check()): ?>
                                            <a href="<?php echo e(route('account-tickets')); ?>"><?php echo e(translate('Support_Ticket')); ?></a>
                                        <?php else: ?>
                                            <button class="bg-transparent border-0 p-0" data-bs-toggle="modal" data-bs-target="#loginModal"><?php echo e(translate('Support_Ticket')); ?></button>
                                        <?php endif; ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom absolute-white">
        <div class="container">
            <div class="text-center copyright-text">
                <?php echo e($web_config['copyright_text']->value); ?>

            </div>
        </div>
    </div>
</footer>
<?php /**PATH C:\xampp\htdocs\tikka\resources\themes\theme_aster/theme-views/layouts/partials/_footer.blade.php ENDPATH**/ ?>