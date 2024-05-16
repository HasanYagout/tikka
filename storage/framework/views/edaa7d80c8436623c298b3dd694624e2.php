<?php $__env->startSection('title', \App\CPU\translate('FCM Settings')); ?>

<?php $__env->startPush('css_or_js'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">

        <!-- Page Title -->
        <div class="mb-3">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img width="20" src="<?php echo e(asset('public/assets/back-end/img/3rd-party.png')); ?>" alt="">
                <?php echo e(\App\CPU\translate('Push_Notification_Setup')); ?>

            </h2>
        </div>
        <!-- End Page Title -->

        <!-- Inlile Menu -->
    <?php echo $__env->make('admin.business-settings.third-party-inline-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- End Inlile Menu -->

        <!-- End Page Header -->
        <div class="row gx-2 gx-lg-3">
            <div class="col-12 mb-3">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0"><?php echo e(\App\CPU\translate('Firebase Push Notification Setup')); ?></h5>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo e(route('admin.business-settings.update-fcm')); ?>" method="post"
                              style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;"
                              enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php ($key=\App\Models\BusinessSetting::where('type','push_notification_key')->first()->value); ?>
                            <div class="form-group">
                                <label class="title-color"
                                       for="exampleFormControlInput1"><?php echo e(\App\CPU\translate('Server Key')); ?></label>
                                <textarea name="push_notification_key" class="form-control"
                                          required><?php echo e(env('APP_MODE')=='demo'?'':$key); ?></textarea>
                            </div>

                            <div class="row d--none">
                                <?php ($project_id=\App\Models\BusinessSetting::where('type','fcm_project_id')->first()->value); ?>
                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label class="input-label"
                                               for="exampleFormControlInput1"><?php echo e(\App\CPU\translate('FCM Project ID')); ?></label>
                                        <input type="text" value="<?php echo e($project_id); ?>"
                                               name="fcm_project_id" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="<?php echo e(env('APP_MODE')!='demo'?'submit':'button'); ?>"
                                        onclick="<?php echo e(env('APP_MODE')!='demo'?'':'call_demo()'); ?>"
                                        class="btn btn--primary px-4"><?php echo e(\App\CPU\translate('save')); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 mb-3">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0"><?php echo e(\App\CPU\translate('Push Messages')); ?></h5>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo e(route('admin.business-settings.update-fcm-messages')); ?>" method="post"
                              style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;"
                              enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <?php ($opm=\App\Models\BusinessSetting::where('type','order_pending_message')->first()->value); ?>
                                <?php ($data=json_decode($opm,true)); ?>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="d-flex align-items-center mb-3 flex-wrap gap-10">
                                            <label class="switcher" for="pending_status">
                                                <input type="checkbox" name="pending_status" class="switcher_input"
                                                       value="1"
                                                       id="pending_status" <?php echo e($data['status']==1?'checked':''); ?>>
                                                <span class="switcher_control"></span>
                                            </label>
                                            <label for="pending_status"
                                                   class="switcher_content"><?php echo e(\App\CPU\translate('Order Pending Message')); ?></label>
                                        </div>
                                        <textarea name="pending_message"
                                                  class="form-control"><?php echo e($data['message']); ?></textarea>
                                    </div>
                                </div>

                                <?php ($ocm=\App\Models\BusinessSetting::where('type','order_confirmation_msg')->first()->value); ?>
                                <?php ($data=json_decode($ocm,true)); ?>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="d-flex align-items-center mb-3 flex-wrap gap-10">
                                            <label class="switcher" for="confirm_status">
                                                <input type="checkbox" name="confirm_status" class="switcher_input"
                                                       value="1"
                                                       id="confirm_status" <?php echo e($data['status']==1?'checked':''); ?>>
                                                <span class="switcher_control"></span>
                                            </label>
                                            <label for="confirm_status"
                                                   class="switcher_content"><?php echo e(\App\CPU\translate('Order Confirmation Message')); ?></label>
                                        </div>

                                        <textarea name="confirm_message"
                                                  class="form-control"><?php echo e($data['message']); ?></textarea>
                                    </div>
                                </div>

                                <?php ($oprm=\App\Models\BusinessSetting::where('type','order_processing_message')->first()->value); ?>
                                <?php ($data=json_decode($oprm,true)); ?>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="d-flex align-items-center mb-3 flex-wrap gap-10">
                                            <label class="switcher" for="processing_status">
                                                <input type="checkbox" name="processing_status"
                                                       class="switcher_input"
                                                       value="1"
                                                       id="processing_status" <?php echo e($data['status']==1?'checked':''); ?>>
                                                <span class="switcher_control"></span>
                                            </label>
                                            <label for="processing_status"
                                                   class="switcher_content"><?php echo e(\App\CPU\translate('Order Processing Message')); ?></label>
                                        </div>

                                        <textarea name="processing_message"
                                                  class="form-control"><?php echo e($data['message']); ?></textarea>
                                    </div>
                                </div>

                                <?php ($ofdm=\App\Models\BusinessSetting::where('type','out_for_delivery_message')->first()->value); ?>
                                <?php ($data=json_decode($ofdm,true)); ?>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="d-flex align-items-center mb-3 flex-wrap gap-10">
                                            <label class="switcher" for="out_for_delivery">
                                                <input type="checkbox" name="out_for_delivery_status"
                                                       class="switcher_input"
                                                       value="1"
                                                       id="out_for_delivery" <?php echo e($data['status']==1?'checked':''); ?>>
                                                <span class="switcher_control"></span>
                                            </label>
                                            <label for="out_for_delivery"
                                                   class="switcher_content"><?php echo e(\App\CPU\translate('Order out for delivery Message')); ?></label>
                                        </div>

                                        <textarea name="out_for_delivery_message"
                                                  class="form-control"><?php echo e($data['message']); ?></textarea>
                                    </div>
                                </div>

                                <?php ($odm=\App\Models\BusinessSetting::where('type','order_delivered_message')->first()->value); ?>
                                <?php ($data=json_decode($odm,true)); ?>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="d-flex align-items-center mb-3 flex-wrap gap-10">
                                            <label class="switcher" for="delivered_status">
                                                <input type="checkbox" name="delivered_status"
                                                       class="switcher_input"
                                                       value="1"
                                                       id="delivered_status" <?php echo e($data['status']==1?'checked':''); ?>>
                                                <span class="switcher_control"></span>
                                            </label>
                                            <label for="delivered_status"
                                                   class="switcher_content"><?php echo e(\App\CPU\translate('Order Delivered Message')); ?></label>
                                        </div>

                                        <textarea name="delivered_message"
                                                  class="form-control"><?php echo e($data['message']); ?></textarea>
                                    </div>
                                </div>


                                <?php ($odm=\App\Models\BusinessSetting::where('type','order_returned_message')->first()->value); ?>
                                <?php ($data=json_decode($odm,true)); ?>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="d-flex align-items-center mb-3 flex-wrap gap-10">
                                            <label class="switcher" for="returned_status">
                                                <input type="checkbox" name="returned_status"
                                                       class="switcher_input"
                                                       value="1"
                                                       id="returned_status" <?php echo e($data['status']==1?'checked':''); ?>>
                                                <span class="switcher_control"></span>
                                            </label>
                                            <label for="returned_status"
                                                   class="switcher_content"><?php echo e(\App\CPU\translate('Order Returned Message')); ?></label>
                                        </div>

                                        <textarea name="returned_message"
                                                  class="form-control"><?php echo e($data['message']); ?></textarea>
                                    </div>
                                </div>


                                <?php ($odm=\App\Models\BusinessSetting::where('type','order_failed_message')->first()->value); ?>
                                <?php ($data=json_decode($odm,true)); ?>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="d-flex align-items-center mb-3 flex-wrap gap-10">
                                            <label class="switcher" for="failed_status">
                                                <input type="checkbox" name="failed_status"
                                                       class="switcher_input"
                                                       value="1" id="failed_status" <?php echo e($data['status']==1?'checked':''); ?>>
                                                <span class="switcher_control"></span>
                                            </label>
                                            <label for="failed_status"
                                                   class="switcher_content"><?php echo e(\App\CPU\translate('Order Failed Message')); ?></label>
                                        </div>

                                        <textarea name="failed_message"
                                                  class="form-control"><?php echo e($data['message']); ?></textarea>
                                    </div>
                                </div>

                                <?php ($dba=\App\Models\BusinessSetting::where('type','delivery_boy_assign_message')->first()->value); ?>
                                <?php ($data=json_decode($dba,true)); ?>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="d-flex align-items-center mb-3 flex-wrap gap-10">
                                            <label class="switcher" for="delivery_boy_assign">
                                                <input type="checkbox" name="delivery_boy_assign_status"
                                                       class="switcher_input"
                                                       value="1"
                                                       id="delivery_boy_assign" <?php echo e($data['status']==1?'checked':''); ?>>
                                                <span class="switcher_control"></span>
                                            </label>
                                            <label for="delivery_boy_assign"
                                                   class="switcher_content"><?php echo e(\App\CPU\translate('deliveryman')); ?> <?php echo e(\App\CPU\translate('assign')); ?> <?php echo e(\App\CPU\translate('message')); ?></label>
                                        </div>

                                        <textarea name="delivery_boy_assign_message"
                                                  class="form-control"><?php echo e($data['message']); ?></textarea>
                                    </div>
                                </div>

                                <?php ($dbs=\App\Models\BusinessSetting::where('type','delivery_boy_start_message')->first()->value); ?>
                                <?php ($data=json_decode($dbs,true)); ?>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="d-flex align-items-center mb-3 flex-wrap gap-10">
                                            <label class="switcher" for="delivery_boy_start_status">
                                                <input type="checkbox" name="delivery_boy_start_status"
                                                       class="switcher_input"
                                                       value="1"
                                                       id="delivery_boy_start_status" <?php echo e($data['status']==1?'checked':''); ?>>
                                                <span class="switcher_control"></span>
                                            </label>
                                            <label for="delivery_boy_start_status"
                                                   class="switcher_content"><?php echo e(\App\CPU\translate('deliveryman')); ?> <?php echo e(\App\CPU\translate('start')); ?> <?php echo e(\App\CPU\translate('message')); ?></label>
                                        </div>

                                        <textarea name="delivery_boy_start_message"
                                                  class="form-control"><?php echo e($data['message']); ?></textarea>
                                    </div>
                                </div>

                                <?php ($dbc=\App\Models\BusinessSetting::where('type','delivery_boy_delivered_message')->first()->value); ?>
                                <?php ($data=json_decode($dbc,true)); ?>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="d-flex align-items-center mb-3 flex-wrap gap-10">
                                            <label class="switcher" for="delivery_boy_delivered">
                                                <input type="checkbox" name="delivery_boy_delivered_status"
                                                       class="switcher_input"
                                                       value="1"
                                                       id="delivery_boy_delivered" <?php echo e($data['status']==1?'checked':''); ?>>
                                                <span class="switcher_control"></span>
                                            </label>
                                            <label for="delivery_boy_delivered"
                                                   class="switcher_content"><?php echo e(\App\CPU\translate('deliveryman')); ?> <?php echo e(\App\CPU\translate('delivered')); ?> <?php echo e(\App\CPU\translate('message')); ?></label>
                                        </div>

                                        <textarea name="delivery_boy_delivered_message" class="form-control"><?php echo e($data['message']); ?></textarea>
                                    </div>
                                </div>

                                <?php ($dbc=\App\Models\BusinessSetting::where('type','delivery_boy_expected_delivery_date_message')->first()); ?>
                                <?php if($dbc): ?>
                                    <?php ($dbc = $dbc->value); ?>
                                    <?php ($data=json_decode($dbc,true)); ?>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="d-flex align-items-center mb-3 flex-wrap gap-10">
                                                <label class="switcher" for="delivery_boy_expected_delivery_date_status">
                                                    <input type="checkbox" name="delivery_boy_expected_delivery_date_status"
                                                           class="switcher_input"
                                                           value="1"
                                                           id="delivery_boy_expected_delivery_date_status" <?php echo e($data['status']==1?'checked':''); ?>>
                                                    <span class="switcher_control"></span>
                                                </label>
                                                <label for="delivery_boy_expected_delivery_date_status"
                                                       class="switcher_content"><?php echo e(\App\CPU\translate('deliveryman')); ?> <?php echo e(\App\CPU\translate('reschedule')); ?> <?php echo e(\App\CPU\translate('message')); ?></label>
                                            </div>

                                            <textarea namelease="delivery_boy_expected_delivery_date_message" class="form-control"><?php echo e($data['message']); ?></textarea>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="d-flex align-items-center mb-3 flex-wrap gap-10">
                                                <label class="switcher" for="delivery_boy_expected_delivery_date_status">
                                                    <input type="checkbox" name="delivery_boy_expected_delivery_date_status"
                                                           class="switcher_input"
                                                           value="1"
                                                           id="delivery_boy_expected_delivery_date_status">
                                                    <span class="switcher_control"></span>
                                                </label>
                                                <label for="delivery_boy_expected_delivery_date_status"
                                                       class="switcher_content"><?php echo e(\App\CPU\translate('deliveryman')); ?> <?php echo e(\App\CPU\translate('reschedule')); ?> <?php echo e(\App\CPU\translate('message')); ?></label>
                                            </div>

                                            <textarea namelease="delivery_boy_expected_delivery_date_message" class="form-control"></textarea>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php ($dbc=\App\Models\BusinessSetting::where('type','order_canceled')->first()); ?>
                                <?php if($dbc): ?>
                                <?php ($dbc = $dbc->value); ?>
                                <?php ($data=json_decode($dbc,true)); ?>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="d-flex align-items-center mb-3 flex-wrap gap-10">
                                            <label class="switcher" for="order_canceled_status">
                                                <input type="checkbox" name="order_canceled_status"
                                                       class="switcher_input"
                                                       value="1"
                                                       id="order_canceled_status" <?php echo e($data['status']==1?'checked':''); ?>>
                                                <span class="switcher_control"></span>
                                            </label>
                                            <label for="order_canceled_status"
                                                   class="switcher_content"><?php echo e(\App\CPU\translate('order')); ?> <?php echo e(\App\CPU\translate('canceled')); ?> <?php echo e(\App\CPU\translate('message')); ?></label>
                                        </div>

                                        <textarea name="order_canceled_message" class="form-control"><?php echo e($data['message']); ?></textarea>
                                    </div>
                                </div>
                            <?php else: ?>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="d-flex align-items-center mb-3 flex-wrap gap-10">
                                                <label class="switcher" for="order_canceled_status">
                                                    <input type="checkbox" name="order_canceled_status"
                                                           class="switcher_input"
                                                           value="1"
                                                           id="order_canceled_status" >
                                                    <span class="switcher_control"></span>
                                                </label>
                                                <label for="order_canceled_status"
                                                       class="switcher_content"><?php echo e(\App\CPU\translate('order')); ?> <?php echo e(\App\CPU\translate('canceled')); ?> <?php echo e(\App\CPU\translate('message')); ?></label>
                                            </div>

                                            <textarea name="order_canceled_message" class="form-control"></textarea>
                                        </div>
                                    </div>
                            <?php endif; ?>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="<?php echo e(env('APP_MODE')!='demo'?'submit':'button'); ?>"
                                        onclick="<?php echo e(env('APP_MODE')!='demo'?'':'call_demo()'); ?>"
                                        class="btn btn--primary px-4"><?php echo e(\App\CPU\translate('save')); ?>

                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script_2'); ?>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#viewer').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#customFileEg1").change(function () {
            readURL(this);
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tikka\resources\views/admin/business-settings/fcm-index.blade.php ENDPATH**/ ?>