<!-- Settings Sidebar -->
<div class="settings-sidebar d-none d-xl-flex">
    <div class="theme-bar">
        <div class="active-theme-wrap">
            <div class="active-theme">
                <img src="<?php echo e(theme_asset('assets/img/svg/light.svg')); ?>" alt="" class="svg light-icon">
                <img src="<?php echo e(theme_asset('assets/img/svg/dark.svg')); ?>" alt="" class="svg dark-icon">
            </div>
            <button class="light_button active">
                <img src="<?php echo e(theme_asset('assets/img/svg/light.svg')); ?>" alt="" class="svg">
                <span><?php echo e(translate('light')); ?></span>
            </button>
        </div>
        <button class="dark_button">
            <img src="<?php echo e(theme_asset('assets/img/svg/dark.svg')); ?>" alt="" class="svg">
            <span><?php echo e(translate('dark')); ?></span>
        </button>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\tikka\resources\themes\theme_aster/theme-views/layouts/partials/_settings-sidebar.blade.php ENDPATH**/ ?>