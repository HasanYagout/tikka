<div class="inline-page-menu my-4">
    <ul class="list-unstyled">
        <li class="<?php echo e(Request::is('admin/business-settings/sms-module') ?'active':''); ?>"><a href="<?php echo e(route('admin.business-settings.sms-module')); ?>"><?php echo e(\App\CPU\translate('SMS_Config')); ?></a></li>
        <li class="<?php echo e(Request::is('admin/business-settings/mail') ?'active':''); ?>"><a href="<?php echo e(route('admin.business-settings.mail.index')); ?>"><?php echo e(\App\CPU\translate('Mail_Config')); ?></a></li>
        <li class="<?php echo e(Request::is('admin/business-settings/payment-method') ?'active':''); ?>"><a href="<?php echo e(route('admin.business-settings.payment-method.index')); ?>"><?php echo e(\App\CPU\translate('Payment_Methods')); ?></a></li>
        <li class="<?php echo e(Request::is('admin/business-settings/captcha') ?'active':''); ?>"><a href="<?php echo e(route('admin.business-settings.captcha')); ?>"><?php echo e(\App\CPU\translate('Recaptcha')); ?></a></li>
        <li class="<?php echo e(Request::is('admin/business-settings/map-api') ?'active':''); ?>"><a href="<?php echo e(route('admin.business-settings.map-api')); ?>"><?php echo e(\App\CPU\translate('Google_Map_APIs')); ?></a></li>
        <li class="<?php echo e(Request::is('admin/business-settings/fcm-index') ?'active':''); ?>"><a href="<?php echo e(route('admin.business-settings.fcm-index')); ?>"><?php echo e(\App\CPU\translate('Push_Notification_Setup')); ?></a></li>
        <li class="<?php echo e(Request::is('admin/social-login/view') ?'active':''); ?>"><a href="<?php echo e(route('admin.social-login.view')); ?>"><?php echo e(\App\CPU\translate('Social_Media_Login')); ?></a></li>
        <li class="<?php echo e(Request::is('admin/social-media-chat/view') ?'active':''); ?>"><a href="<?php echo e(route('admin.social-media-chat.view')); ?>"><?php echo e(\App\CPU\translate('Social_Media_Chat')); ?></a></li>
    </ul>
</div>
<?php /**PATH C:\xampp\htdocs\tikka\resources\views/admin/business-settings/third-party-inline-menu.blade.php ENDPATH**/ ?>