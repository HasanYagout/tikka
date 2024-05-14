<?php $__env->startSection('title', \App\CPU\translate('customer_settings')); ?>

<?php $__env->startPush('css_or_js'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">

        <!-- Page Title -->
        <div class="mb-4 pb-2">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img src="<?php echo e(asset('public/assets/back-end/img/business-setup.png')); ?>" alt="">
                <?php echo e(\App\CPU\translate('Business_Setup')); ?>

            </h2>
        </div>
        <!-- End Page Title -->

        <!-- Inlile Menu -->
    <?php echo $__env->make('admin.business-settings.business-setup-inline-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- End Inlile Menu -->
        <form action="<?php echo e(route('admin.customer.customer-settings-update')); ?>" method="post"
              enctype="multipart/form-data" id="update-settings">
            <?php echo csrf_field(); ?>
            <div class="row gy-2 pb-4">
                <div class="col-md-6">
                    <div class="card">
                        <div class="border-bottom py-3 px-4">
                            <div class="d-flex justify-content-between align-items-center gap-10">
                                <h5 class="mb-0 text-capitalize d-flex align-items-center gap-2">
                                    <i class="tio-wallet"></i>
                                    <?php echo e(\App\CPU\translate('customer_wallet_settings')); ?> :
                                </h5>

                                <label class="switcher" for="customer_wallet">
                                    <input type="checkbox" class="switcher_input"
                                           onclick="section_visibility('customer_wallet')" name="customer_wallet"
                                           id="customer_wallet" value="1"
                                           data-section="wallet-section" <?php echo e(isset($data['wallet_status'])&&$data['wallet_status']==1?'checked':''); ?>>
                                    <span class="switcher_control"></span>
                                </label>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center gap-10 form-control mt-4" id="customer_wallet_section">
                                <span class="title-color"><?php echo e(\App\CPU\translate('refund_to_wallet')); ?><span
                                        class="input-label-secondary"
                                        title="<?php echo e(\App\CPU\translate('refund_to_wallet_hint')); ?>"><img
                                            src="<?php echo e(asset('public/assets/back-end/img/info-circle.svg')); ?>"
                                            alt="<?php echo e(\App\CPU\translate('show_hide_food_menu')); ?>"></span> :</span>

                                <label class="switcher" for="refund_to_wallet">
                                    <input type="checkbox" class="switcher_input" name="refund_to_wallet"
                                           id="refund_to_wallet"
                                           value="1" <?php echo e(isset($data['wallet_add_refund'])&&$data['wallet_add_refund']==1?'checked':''); ?>>
                                    <span class="switcher_control"></span>
                                </label>
                            </div>

                            <div class="d-flex justify-content-end mt-3">
                                <button class="btn btn--primary px-4"><?php echo e(\App\CPU\translate('Save')); ?></button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="border-bottom py-3 px-4">
                            <div class="d-flex justify-content-between align-items-center gap-10">
                                <h5 class="mb-0 text-capitalize d-flex align-items-center gap-2">
                                    <i class="tio-award"></i>
                                    <?php echo e(\App\CPU\translate('loyalty_point')); ?>:
                                </h5>
                                <label class="switcher" for="customer_loyalty_point">
                                    <input type="checkbox" class="switcher_input"
                                           onclick="section_visibility('customer_loyalty_point')"
                                           name="customer_loyalty_point" id="customer_loyalty_point"
                                           data-section="loyalty-point-section"
                                           value="1" <?php echo e(isset($data['loyalty_point_status'])&&$data['loyalty_point_status']==1?'checked':''); ?>>
                                    <span class="switcher_control"></span>
                                </label>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="loyalty-point-section" id="customer_loyalty_point_section">
                                <div class="form-group">
                                    <label class="title-color d-flex"
                                           for="loyalty_point_exchange_rate">1 <?php echo e(\App\CPU\Helpers::currency_code()); ?>

                                        = <?php echo e(\App\CPU\translate('how_much_point')); ?></label>
                                    <input type="number" class="form-control" name="loyalty_point_exchange_rate"
                                           step="1" value="<?php echo e($data['loyalty_point_exchange_rate']??'0'); ?>">
                                </div>
                                <div class="form-group">
                                    <label class="title-color d-flex"
                                           for="intem_purchase_point"><?php echo e(\App\CPU\translate('percentage_of_loyalty_point_on_order_amount')); ?></label>
                                    <input type="number" class="form-control" name="item_purchase_point" step=".01"
                                           value="<?php echo e($data['loyalty_point_item_purchase_point']??'0'); ?>">
                                </div>
                                <div class="form-group">
                                    <label class="title-color d-flex"
                                           for="intem_purchase_point"><?php echo e(\App\CPU\translate('minimum_point_to_transfer')); ?></label>
                                    <input type="number" class="form-control" name="minimun_transfer_point" min="0"
                                           step="1" value="<?php echo e($data['loyalty_point_minimum_point']??'0'); ?>">
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" id="submit"
                                        class="btn px-4 btn--primary"><?php echo e(\App\CPU\translate('save')); ?></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script_2'); ?>
    <script>
        $(document).on('ready', function () {
            <?php if(isset($data['wallet_status'])&&$data['wallet_status']!=1): ?>
            $('#customer_wallet_section').attr('style', 'display: none !important');
            <?php endif; ?>

            <?php if(isset($data['loyalty_point_status'])&&$data['loyalty_point_status']!=1): ?>
            $('.loyalty-point-section').attr('style', 'display: none !important');
            <?php endif; ?>
        });
    </script>

    <script>
        function section_visibility(id) {
            if ($('#' + id).is(':checked')) {
                $('#' + id + '_section').attr('style', 'display: block');
            } else {
                $('#' + id + '_section').attr('style', 'display: none !important');
            }
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tikka\resources\views/admin/customer/customer-settings.blade.php ENDPATH**/ ?>