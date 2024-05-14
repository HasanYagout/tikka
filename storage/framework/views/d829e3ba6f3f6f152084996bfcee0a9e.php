<div class="sidebarR col-lg-3 col-md-3 pr-lg-3 pr-xl-4">
    <!--Price Sidebar-->
    <div class="__customer-sidebar" id="shop-sidebar">
        <div>
            <!-- Filter by price-->
            <div class="widget-title">
                <a class="<?php echo e(Request::is('account-oder*') || Request::is('account-order-details*') ? 'active-menu' :''); ?>" href="<?php echo e(route('account-oder')); ?> "><?php echo e(\App\CPU\translate('my_order')); ?></a>
            </div>
        </div>
        <?php if($web_config['wallet_status'] == 1): ?>
            <div>
                <!-- Filter by price-->
                <div class="widget-title">
                    <a class="<?php echo e(Request::is('wallet')?'active-menu':''); ?>" href="<?php echo e(route('wallet')); ?> "><?php echo e(\App\CPU\translate('my_wallet')); ?> </a>
                </div>
            </div>
        <?php endif; ?>
        <?php if($web_config['loyalty_point_status'] == 1): ?>
            <div>
                <!-- Filter by price-->
                <div class="widget-title">
                    <a class="<?php echo e(Request::is('loyalty')?'active-menu':''); ?>" href="<?php echo e(route('loyalty')); ?> "><?php echo e(\App\CPU\translate('my_loyalty_point')); ?></a>
                </div>
            </div>
        <?php endif; ?>
        <div>
            <!-- Filter by price-->
            <div class="widget-title">
                <a class="<?php echo e(Request::is('track-order*')?'active-menu':''); ?>" href="<?php echo e(route('track-order.index')); ?> "><?php echo e(\App\CPU\translate('track_your_order')); ?></a>
            </div>
        </div>
        <div>
            <!-- Filter by price-->
            <div class="widget-title">
                <a class="<?php echo e(Request::is('wishlists*')?'active-menu':''); ?>" href="<?php echo e(route('wishlists')); ?>"> <?php echo e(\App\CPU\translate('wish_list')); ?>  </a>
            </div>
        </div>

        
        <?php ($business_mode=\App\CPU\Helpers::get_business_settings('business_mode')); ?>
        <?php if($business_mode == 'multi'): ?>
            <div>
                <!-- Filter by price-->
                <div class="widget-title">
                    <a class="<?php echo e(Request::is('chat/seller')?'active-menu':''); ?>" href="<?php echo e(route('chat', ['type' => 'seller'])); ?>"><?php echo e(\App\CPU\translate('chat_with_seller')); ?></a>
                </div>
            </div>
            <div>
                <div class="widget-title">
                    <a class="<?php echo e(Request::is('chat/delivery-man')?'active-menu':''); ?>" href="<?php echo e(route('chat', ['type' => 'delivery-man'])); ?>"><?php echo e(\App\CPU\translate('chat_with_delivery-man')); ?></a>
                </div>
            </div>
        <?php endif; ?>

        <div>
            <!-- Filter by price-->
            <div class="widget-title">
                <a class="<?php echo e(Request::is('user-account*')?'active-menu':''); ?>" href="<?php echo e(route('user-account')); ?>">
                    <?php echo e(\App\CPU\translate('profile_info')); ?>

                </a>
            </div>
        </div>
        <div>
            <!-- Filter by price-->
            <div class="widget-title">
                <a class="<?php echo e(Request::is('account-address*')?'active-menu':''); ?>"
                    href="<?php echo e(route('account-address')); ?>"><?php echo e(\App\CPU\translate('address')); ?> </a>
            </div>
        </div>
        <div>
            <!-- Filter by price-->
            <div class="widget-title">
                <a class="<?php echo e((Request::is('account-ticket*') || Request::is('support-ticket*'))?'active-menu':''); ?>"
                    href="<?php echo e(route('account-tickets')); ?>"><?php echo e(\App\CPU\translate('support_ticket')); ?></a>
            </div>
        </div>

    </div>
</div>


















<?php /**PATH C:\xampp\htdocs\tikka\resources\themes\default/web-views/partials/_profile-aside.blade.php ENDPATH**/ ?>