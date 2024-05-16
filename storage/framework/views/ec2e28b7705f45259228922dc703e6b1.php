<?php $__env->startSection('title',\App\CPU\translate('Track Order Result')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <meta property="og:image" content="<?php echo e(asset('public/storage/company')); ?>/<?php echo e($web_config['web_logo']->value); ?>"/>
    <meta property="og:title" content="<?php echo e($web_config['name']->value); ?> "/>
    <meta property="og:url" content="<?php echo e(env('APP_URL')); ?>">
    <meta property="og:description" content="<?php echo substr($web_config['about']->value,0,100); ?>">

    <meta property="twitter:card" content="<?php echo e(asset('public/storage/company')); ?>/<?php echo e($web_config['web_logo']->value); ?>"/>
    <meta property="twitter:title" content="<?php echo e($web_config['name']->value); ?>"/>
    <meta property="twitter:url" content="<?php echo e(env('APP_URL')); ?>">
    <meta property="twitter:description" content="<?php echo substr($web_config['about']->value,0,100); ?>">
    <link rel="stylesheet" media="screen"
          href="<?php echo e(asset('public/assets/front-end')); ?>/vendor/nouislider/distribute/nouislider.min.css"/>
    <style>
       .closet{
            float: <?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Page Content-->
    <div class="container rtl py-5" style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
        <div class="__max-w-620 mx-auto">
            <h3 class="text-center text-capitalize"><?php echo e(\App\CPU\translate('track_order')); ?></h3>
            <div class="card __card">
                <div class="card-body">
                    <form action="<?php echo e(route('track-order.result')); ?>" type="submit" method="post" class="p-3">
                        <?php echo csrf_field(); ?>

                        <?php if(session()->has('Error')): ?>
                            <div class="alert alert-danger alert-block">
                                <span type="" class="closet __closet" data-dismiss="alert">×</span>
                                <strong><?php echo e(session()->get('Error')); ?></strong>
                            </div>
                        <?php endif; ?>

                        <div class="form-group mb-4">
                            <input class="form-control prepended-form-control" type="text" name="order_id"
                                placeholder="<?php echo e(\App\CPU\translate('order_id')); ?>" required>
                        </div>
                        <div class="form-group mb-4">
                            <input class="form-control prepended-form-control" type="text" name="phone_number"
                                placeholder="<?php echo e(\App\CPU\translate('your_phone_number')); ?>" required>
                        </div>
                        <div class="text-right">
                            <button class="btn btn--primary" type="submit" name="trackOrder"><?php echo e(\App\CPU\translate('track_order')); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(asset('public/assets/front-end')); ?>/vendor/nouislider/distribute/nouislider.min.js">
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.front-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tikka\resources\themes\default/web-views/order/tracking-page.blade.php ENDPATH**/ ?>
