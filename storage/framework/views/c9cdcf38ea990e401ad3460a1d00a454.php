<div class="inline-page-menu my-4">
    <ul class="list-unstyled">
        <li class="<?php echo e(Request::is('admin/business-settings/web-config') ?'active':''); ?>"><a href="<?php echo e(route('admin.business-settings.web-config.index')); ?>"><?php echo e(\App\CPU\translate('general')); ?></a></li>
        <li class="<?php echo e(Request::is('admin/business-settings/web-config/app-settings') ?'active':''); ?>"><a href="<?php echo e(route('admin.business-settings.web-config.app-settings')); ?>"><?php echo e(\App\CPU\translate('App_Settings')); ?></a></li>
        <li class="<?php echo e(Request::is('admin/product-settings/inhouse-shop') ?'active':''); ?>"><a href="<?php echo e(route('admin.product-settings.inhouse-shop')); ?>"><?php echo e(\App\CPU\translate('In-House_Shop')); ?></a></li>
        <li class="<?php echo e(Request::is('admin/business-settings/seller-settings') ?'active':''); ?>"><a href="<?php echo e(route('admin.business-settings.seller-settings.index')); ?>"><?php echo e(\App\CPU\translate('Seller')); ?></a></li>
        <li class="<?php echo e(Request::is('admin/customer/customer-settings') ?'active':''); ?>"><a href="<?php echo e(route('admin.customer.customer-settings')); ?>"><?php echo e(\App\CPU\translate('Customer')); ?></a></li>
        <li class="<?php echo e(Request::is('admin/refund-section/refund-index') ?'active':''); ?>"><a href="<?php echo e(route('admin.refund-section.refund-index')); ?>"><?php echo e(\App\CPU\translate('refund')); ?></a></li>
        <li class="<?php echo e(Request::is('admin/business-settings/shipping-method/setting') ?'active':''); ?>"><a href="<?php echo e(route('admin.business-settings.shipping-method.setting')); ?>"><?php echo e(\App\CPU\translate('Shipping_Method')); ?></a></li>
        <li class="<?php echo e(Request::is('admin/business-settings/order-settings/index') ?'active':''); ?>"><a href="<?php echo e(route('admin.business-settings.order-settings.index')); ?>"><?php echo e(\App\CPU\translate('Order')); ?></a></li>
        <li class="<?php echo e(Request::is('admin/product-settings') ?'active':''); ?>"><a href="<?php echo e(route('admin.product-settings.index')); ?>"><?php echo e(\App\CPU\translate('Product')); ?></a></li>
        <li class="<?php echo e(Request::is('admin/business-settings/delivery-restriction') ? 'active':''); ?>"><a href="<?php echo e(route('admin.business-settings.delivery-restriction.index')); ?>"><?php echo e(\App\CPU\translate('Delivery_Restriction')); ?></a></li>
        <li class="<?php echo e(Request::is('admin/business-settings/cookie-settings') ? 'active':''); ?>"><a href="<?php echo e(route('admin.business-settings.cookie-settings')); ?>"><?php echo e(\App\CPU\translate('Cookie_Settings')); ?></a></li>
        <?php if(theme_root_path() == 'theme_fashion'): ?>
        <li class="<?php echo e(Request::is('admin/business-settings/all-pages-banner') ? 'active':''); ?>"><a href="<?php echo e(route('admin.business-settings.all-pages-banner')); ?>"><?php echo e(translate('All_Pages_Banner')); ?></a></li>
        <?php endif; ?>
        <li class="<?php echo e(Request::is('admin/business-settings/otp-setup') ? 'active':''); ?>"><a href="<?php echo e(route('admin.business-settings.otp-setup')); ?>"><?php echo e(translate('OTP_and_Login_Setup')); ?></a></li>
    </ul>
</div>
<?php /**PATH C:\xampp\htdocs\tikka\resources\views/admin/business-settings/business-setup-inline-menu.blade.php ENDPATH**/ ?>