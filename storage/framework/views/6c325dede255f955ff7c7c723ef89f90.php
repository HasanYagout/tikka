<div class="inline-page-menu my-4">
    <ul class="list-unstyled">
        <li class="<?php echo e(Request::is('admin/business-settings/web-config/environment-setup') ?'active':''); ?>"><a
                href="<?php echo e(route('admin.business-settings.web-config.environment-setup')); ?>"><?php echo e(\App\CPU\translate('Environment_Setup')); ?></a>
        </li>
        <li class="<?php echo e(Request::is('admin/business-settings/web-config/mysitemap') ?'active':''); ?>"><a
                href="<?php echo e(route('admin.business-settings.web-config.mysitemap')); ?>"><?php echo e(\App\CPU\translate('Generate_Site_Map')); ?></a>
        </li>
        <li class="<?php echo e(Request::is('admin/business-settings/analytics-index') ?'active':''); ?>"><a
                href="<?php echo e(route('admin.business-settings.analytics-index')); ?>"><?php echo e(\App\CPU\translate('Analytic_Script')); ?></a>
        </li>
        <li class="<?php echo e(Request::is('admin/currency/view') ?'active':''); ?>"><a
                href="<?php echo e(route('admin.currency.view')); ?>"><?php echo e(\App\CPU\translate('Currency_Setup')); ?></a></li>
        <li class="<?php echo e(Request::is('admin/business-settings/language') ?'active':''); ?>"><a
                href="<?php echo e(route('admin.business-settings.language.index')); ?>"><?php echo e(\App\CPU\translate('Languages')); ?></a></li>
        <li class="<?php echo e(Request::is('admin/business-settings/web-config/db-index') ?'active':''); ?>"><a
                href="<?php echo e(route('admin.business-settings.web-config.db-index')); ?>"><?php echo e(\App\CPU\translate('Clean_Database')); ?></a>
        </li>
        <li class="<?php echo e(Request::is('admin/system-settings/software-update') ?'active':''); ?>"><a
                href="<?php echo e(route('admin.system-settings.software-update')); ?>"><?php echo e(\App\CPU\translate('software_update')); ?></a>
        </li>
        <li class="<?php echo e(Request::is('admin/business-settings/web-config/theme/setup') ?'active':''); ?>"><a
                href="<?php echo e(route('admin.business-settings.web-config.theme.setup')); ?>"><?php echo e(\App\CPU\translate('theme_setup')); ?></a>
        </li>
    </ul>
</div>
<?php /**PATH C:\xampp\htdocs\tikka\resources\views/admin/business-settings/system-settings-inline-menu.blade.php ENDPATH**/ ?>