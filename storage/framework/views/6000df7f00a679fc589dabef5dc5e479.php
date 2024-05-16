<?php $__env->startSection('title', \App\CPU\translate('Payment Method')); ?>

<?php $__env->startPush('css_or_js'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <!-- Page Title -->
        <div class="mb-4 pb-2">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img src="<?php echo e(asset('public/assets/back-end/img/3rd-party.png')); ?>" alt="">
                <?php echo e(\App\CPU\translate('3rd_party')); ?>

            </h2>
        </div>
        <!-- End Page Title -->

        <!-- Inlile Menu -->
    <?php echo $__env->make('admin.business-settings.third-party-inline-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- End Inlile Menu -->

        <div class="row gy-3">
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="mb-4 text-uppercase d-flex"><?php echo e(\App\CPU\translate('PAYMENT_METHOD')); ?></h5>

                        <?php ($config=\App\CPU\Helpers::get_business_settings('cash_on_delivery')); ?>
                        <form action="<?php echo e(route('admin.business-settings.payment-method.update',['cash_on_delivery'])); ?>"
                              style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;"
                              method="post">
                            <?php echo csrf_field(); ?>
                            <?php if(isset($config)): ?>
                                <label
                                    class="mb-3 d-block font-weight-bold title-color"><?php echo e(\App\CPU\translate('cash_on_delivery')); ?></label>

                                <div class="d-flex flex-wrap gap-5">
                                    <div class="d-flex gap-10 align-items-center mb-2">
                                        <input id="system-default-payment-method-active" type="radio" name="status"
                                               value="1" <?php echo e($config['status']==1?'checked':''); ?>>
                                        <label for="system-default-payment-method-active"
                                               class="title-color mb-0"><?php echo e(\App\CPU\translate('Active')); ?></label>
                                    </div>
                                    <div class="d-flex gap-10 align-items-center mb-2">
                                        <input id="system-default-payment-method-inactive" type="radio" name="status"
                                               value="0" <?php echo e($config['status']==0?'checked':''); ?>>
                                        <label for="system-default-payment-method-inactive"
                                               class="title-color mb-0"><?php echo e(\App\CPU\translate('Inactive')); ?></label>
                                    </div>
                                </div>

                                <div class="mt-3 d-flex flex-wrap justify-content-end gap-10">
                                    <button type="<?php echo e(env('APP_MODE')!='demo'?'submit':'button'); ?>"
                                            onclick="<?php echo e(env('APP_MODE')!='demo'?'':'call_demo()'); ?>"
                                            class="btn btn--primary px-4 text-uppercase"><?php echo e(\App\CPU\translate('submit')); ?></button>
                                    <?php else: ?>
                                        <button type="submit"
                                                class="btn btn--primary px-4 text-uppercase"><?php echo e(\App\CPU\translate('Configure')); ?></button>
                                    <?php endif; ?>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="mb-4 text-uppercase d-flex"><?php echo e(\App\CPU\translate('PAYMENT_METHOD')); ?></h5>

                        <?php ($config=\App\CPU\Helpers::get_business_settings('digital_payment')); ?>
                        <form action="<?php echo e(route('admin.business-settings.payment-method.update',['digital_payment'])); ?>"
                              style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;"
                              method="post">
                            <?php echo csrf_field(); ?>
                            <?php if(isset($config)): ?>
                                <label
                                    class="title-color font-weight-bold d-block mb-3"><?php echo e(\App\CPU\translate('digital_payment')); ?></label>

                                <div class="d-flex flex-wrap gap-5">
                                    <div class="d-flex gap-10 align-items-center mb-2">
                                        <input id="digital-payment-method-active" type="radio" name="status"
                                               value="1" <?php echo e($config['status']==1?'checked':''); ?>>
                                        <label for="digital-payment-method-active"
                                               class="title-color mb-0"><?php echo e(\App\CPU\translate('Active')); ?></label>
                                    </div>
                                    <div class="d-flex gap-10 align-items-center mb-2">
                                        <input id="digital-payment-method-inactive" type="radio" name="status"
                                               value="0" <?php echo e($config['status']==0?'checked':''); ?>>
                                        <label for="digital-payment-method-inactive"
                                               class="title-color mb-0"><?php echo e(\App\CPU\translate('Inactive')); ?></label>
                                    </div>
                                </div>

                                <div class="mt-3 d-flex flex-wrap justify-content-end gap-10">
                                    <button type="<?php echo e(env('APP_MODE')!='demo'?'submit':'button'); ?>"
                                            onclick="<?php echo e(env('APP_MODE')!='demo'?'':'call_demo()'); ?>"
                                            class="btn btn--primary px-4 text-uppercase"><?php echo e(\App\CPU\translate('submit')); ?></button>
                                    <?php else: ?>
                                        <button type="submit"
                                                class="btn btn--primary px-4 text-uppercase"><?php echo e(\App\CPU\translate('Configure')); ?></button>
                                    <?php endif; ?>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="mb-4 text-uppercase d-flex"><?php echo e(\App\CPU\translate('PAYMENT_METHOD')); ?></h5>
                        <?php ($config=\App\CPU\Helpers::get_business_settings('offline_payment')); ?>
                        <form action="<?php echo e(route('admin.business-settings.payment-method.update',['offline_payment'])); ?>"
                              style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;"
                              method="post">
                            <?php echo csrf_field(); ?>
                            <?php if(isset($config)): ?>
                                <label
                                    class="title-color font-weight-bold d-block mb-3"><?php echo e(\App\CPU\translate('offline_payment')); ?></label>

                                <div class="d-flex flex-wrap gap-5">
                                    <div class="d-flex gap-10 align-items-center mb-2">
                                        <input id="offline_payment-method-active" type="radio" name="status"
                                               value="1" <?php echo e($config['status']==1?'checked':''); ?>>
                                        <label for="offline_payment-method-active"
                                               class="title-color mb-0"><?php echo e(\App\CPU\translate('Active')); ?></label>
                                    </div>
                                    <div class="d-flex gap-10 align-items-center mb-2">
                                        <input id="offline_payment-method-inactive" type="radio" name="status"
                                               value="0" <?php echo e($config['status']==0?'checked':''); ?>>
                                        <label for="offline_payment-method-inactive"
                                               class="title-color mb-0"><?php echo e(\App\CPU\translate('Inactive')); ?></label>
                                    </div>
                                </div>

                                <div class="mt-3 d-flex flex-wrap justify-content-end gap-10">
                                    <button type="<?php echo e(env('APP_MODE')!='demo'?'submit':'button'); ?>"
                                            onclick="<?php echo e(env('APP_MODE')!='demo'?'':'call_demo()'); ?>"
                                            class="btn btn--primary px-4 text-uppercase"><?php echo e(\App\CPU\translate('submit')); ?></button>
                                </div>
                            <?php else: ?>
                                <div>
                                    <button type="submit"
                                            class="btn btn--primary px-4 text-uppercase"><?php echo e(\App\CPU\translate('Configure')); ?></button>
                                </div>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <?php ($config=\App\CPU\Helpers::get_business_settings('ssl_commerz_payment')); ?>
                        <form
                            action="<?php echo e(route('admin.business-settings.payment-method.update',['ssl_commerz_payment'])); ?>"
                            method="post">
                            <?php echo csrf_field(); ?>
                            <?php if(isset($config)): ?>
                                <div class="d-flex flex-wrap gap-2 justify-content-between mb-3">
                                    <h5 class="text-uppercase"><?php echo e(\App\CPU\translate('SSLCOMMERZ')); ?></h5>

                                    <label class="switcher show-status-text">
                                        <input class="switcher_input" type="checkbox"
                                               name="status" value="1" <?php echo e($config['status']==1?'checked':''); ?>>
                                        <span class="switcher_control"></span>
                                    </label>
                                </div>

                                <center class="mb-3">
                                    <img src="<?php echo e(asset('public/assets/back-end/img/ssl-commerz.png')); ?>" alt="">
                                </center>

                                <div class="form-group">
                                    <label
                                        class="d-flex title-color"><?php echo e(\App\CPU\translate('choose_environment')); ?></label>
                                    <select class="js-example-responsive form-control" name="environment">
                                        <option
                                            value="sandbox" <?php echo e($config['environment']=='sandbox'?'selected':''); ?>><?php echo e(\App\CPU\translate('sandbox')); ?></option>
                                        <option
                                            value="live" <?php echo e($config['environment']=='live'?'selected':''); ?>><?php echo e(\App\CPU\translate('live')); ?></option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label
                                        class="d-flex title-color"><?php echo e(\App\CPU\translate('Store')); ?> <?php echo e(\App\CPU\translate('ID')); ?> </label>
                                    <input type="text" class="form-control" name="store_id"
                                           value="<?php echo e(env('APP_MODE')=='demo'?'':$config['store_id']); ?>">
                                </div>
                                <div class="form-group">
                                    <label
                                        class="d-flex title-color"><?php echo e(\App\CPU\translate('Store')); ?> <?php echo e(\App\CPU\translate('password')); ?></label>
                                    <input type="text" class="form-control" name="store_password"
                                           value="<?php echo e(env('APP_MODE')=='demo'?'':$config['store_password']); ?>">
                                </div>

                                <div class="mt-3 d-flex flex-wrap justify-content-end gap-10">
                                    <button type="<?php echo e(env('APP_MODE')!='demo'?'submit':'button'); ?>"
                                            onclick="<?php echo e(env('APP_MODE')!='demo'?'':'call_demo()'); ?>"
                                            class="btn btn--primary px-4 text-uppercase"><?php echo e(\App\CPU\translate('save')); ?></button>
                                    <?php else: ?>
                                        <button type="submit"
                                                class="btn btn--primary px-4 text-uppercase"><?php echo e(\App\CPU\translate('Configure')); ?></button>
                                    <?php endif; ?>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">

                        <?php ($config=\App\CPU\Helpers::get_business_settings('paypal')); ?>
                        <form action="<?php echo e(route('admin.business-settings.payment-method.update',['paypal'])); ?>"
                              method="post">
                            <?php echo csrf_field(); ?>
                            <?php if(isset($config)): ?>
                                <center class="mb-3">
                                    <img src="<?php echo e(asset('public/assets/back-end/img/paypal.png')); ?>" alt="">
                                </center>

                                <div class="d-flex flex-wrap gap-2 justify-content-between mb-3">
                                    <h5 class="text-uppercase"><?php echo e(\App\CPU\translate('Paypal')); ?></h5>

                                    <label class="switcher show-status-text">
                                        <input class="switcher_input" type="checkbox"
                                               name="status" value="1" <?php echo e($config['status']==1?'checked':''); ?>>
                                        <span class="switcher_control"></span>
                                    </label>
                                </div>

                                <div class="form-group">
                                    <label
                                        class="d-flex title-color"><?php echo e(\App\CPU\translate('choose_environment')); ?></label>
                                    <select class="js-example-responsive form-control w-100"
                                            name="environment">

                                        <option
                                            value="sandbox" <?php echo e(isset($config['environment'])==true?$config['environment']=='sandbox'?'selected':'':''); ?>><?php echo e(\App\CPU\translate('sandbox')); ?></option>
                                        <option
                                            value="live" <?php echo e(isset($config['environment'])==true?$config['environment']=='live'?'selected':'':''); ?>><?php echo e(\App\CPU\translate('live')); ?></option>

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="title-color d-flex"><?php echo e(\App\CPU\translate('Paypal')); ?> <?php echo e(\App\CPU\translate('Client')); ?><?php echo e(\App\CPU\translate('ID')); ?></label>
                                    <input type="text" class="form-control" name="paypal_client_id"
                                           value="<?php echo e(env('APP_MODE')=='demo'?'':$config['paypal_client_id']); ?>">
                                </div>
                                <div class="form-group">
                                    <label class="title-color d-flex"><?php echo e(\App\CPU\translate('Paypal')); ?> <?php echo e(\App\CPU\translate('Secret')); ?> </label>
                                    <input type="text" class="form-control" name="paypal_secret"
                                           value="<?php echo e(env('APP_MODE')=='demo'?'':$config['paypal_secret']); ?>">
                                </div>
                                <div class="mt-3 d-flex flex-wrap justify-content-end gap-10">
                                    <button type="<?php echo e(env('APP_MODE')!='demo'?'submit':'button'); ?>"
                                            onclick="<?php echo e(env('APP_MODE')!='demo'?'':'call_demo()'); ?>"
                                            class="btn btn--primary px-4 text-uppercase"><?php echo e(\App\CPU\translate('save')); ?></button>
                                    <?php else: ?>
                                        <button type="submit"
                                                class="btn btn--primary px-4 text-uppercase"><?php echo e(\App\CPU\translate('Configure')); ?></button>
                                    <?php endif; ?>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <?php ($config=\App\CPU\Helpers::get_business_settings('stripe')); ?>
                        <form action="<?php echo e(route('admin.business-settings.payment-method.update',['stripe'])); ?>"
                              method="post">
                            <?php echo csrf_field(); ?>
                            <?php if(isset($config)): ?>
                                <?php ($config['environment'] = $config['environment']??'sandbox'); ?>
                                <div class="d-flex flex-wrap gap-2 justify-content-between mb-3">
                                    <h5 class="text-uppercase"><?php echo e(\App\CPU\translate('Stripe')); ?></h5>

                                    <label class="switcher show-status-text">
                                        <input class="switcher_input" type="checkbox"
                                               name="status" value="1" <?php echo e($config['status']==1?'checked':''); ?>>
                                        <span class="switcher_control"></span>
                                    </label>
                                </div>

                                <center class="mb-3">
                                    <img src="<?php echo e(asset('public/assets/back-end/img/stripe.png')); ?>" alt="">
                                </center>

                                <div class="form-group">
                                    <label
                                        class="d-flex title-color"><?php echo e(\App\CPU\translate('choose_environment')); ?></label>
                                    <select class="js-example-responsive form-control" name="environment">
                                        <option
                                            value="sandbox" <?php echo e($config['environment']=='sandbox'?'selected':''); ?>><?php echo e(\App\CPU\translate('sandbox')); ?></option>
                                        <option
                                            value="live" <?php echo e($config['environment']=='live'?'selected':''); ?>><?php echo e(\App\CPU\translate('live')); ?></option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="d-flex title-color"><?php echo e(\App\CPU\translate('published_key')); ?></label>
                                    <input type="text" class="form-control" name="published_key"
                                           value="<?php echo e(env('APP_MODE')=='demo'?'':$config['published_key']); ?>">
                                </div>

                                <div class="form-group">
                                    <label class="d-flex title-color"><?php echo e(\App\CPU\translate('api_key')); ?></label>
                                    <input type="text" class="form-control" name="api_key"
                                           value="<?php echo e(env('APP_MODE')=='demo'?'':$config['api_key']); ?>">
                                </div>
                                <div class="mt-3 d-flex flex-wrap justify-content-end gap-10">
                                    <button type="<?php echo e(env('APP_MODE')!='demo'?'submit':'button'); ?>"
                                            onclick="<?php echo e(env('APP_MODE')!='demo'?'':'call_demo()'); ?>"
                                            class="btn btn--primary px-4 text-uppercase"><?php echo e(\App\CPU\translate('save')); ?></button>
                                    <?php else: ?>
                                        <button type="submit"
                                                class="btn btn--primary px-4 text-uppercase"><?php echo e(\App\CPU\translate('Configure')); ?></button>
                                    <?php endif; ?>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <?php ($config=\App\CPU\Helpers::get_business_settings('razor_pay')); ?>
                        <form action="<?php echo e(route('admin.business-settings.payment-method.update',['razor_pay'])); ?>"
                              method="post">
                            <?php echo csrf_field(); ?>
                            <?php if(isset($config)): ?>
                                <?php ($config['environment'] = $config['environment']??'sandbox'); ?>
                                <div class="d-flex flex-wrap gap-2 justify-content-between mb-3">
                                    <h5 class="text-uppercase"><?php echo e(\App\CPU\translate('razor_pay')); ?></h5>

                                    <label class="switcher show-status-text">
                                        <input class="switcher_input" type="checkbox"
                                               name="status" value="1" <?php echo e($config['status']==1?'checked':''); ?>>
                                        <span class="switcher_control"></span>
                                    </label>
                                </div>

                                <center class="mb-3">
                                    <img src="<?php echo e(asset('public/assets/back-end/img/razorpay.png')); ?>" alt="">
                                </center>

                                <div class="form-group">
                                    <label
                                        class="d-flex title-color"><?php echo e(\App\CPU\translate('choose_environment')); ?></label>
                                    <select class="js-example-responsive form-control" name="environment">
                                        <option
                                            value="sandbox" <?php echo e($config['environment']=='sandbox'?'selected':''); ?>><?php echo e(\App\CPU\translate('sandbox')); ?></option>
                                        <option
                                            value="live" <?php echo e($config['environment']=='live'?'selected':''); ?>><?php echo e(\App\CPU\translate('live')); ?></option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="d-flex title-color"><?php echo e(\App\CPU\translate('Key')); ?>  </label>
                                    <input type="text" class="form-control" name="razor_key"
                                           value="<?php echo e(env('APP_MODE')=='demo'?'':$config['razor_key']); ?>">
                                </div>

                                <div class="form-group">
                                    <label class="d-flex title-color"><?php echo e(\App\CPU\translate('secret')); ?></label>
                                    <input type="text" class="form-control" name="razor_secret"
                                           value="<?php echo e(env('APP_MODE')=='demo'?'':$config['razor_secret']); ?>">
                                </div>
                                <div class="mt-3 d-flex flex-wrap justify-content-end gap-10">
                                    <button type="<?php echo e(env('APP_MODE')!='demo'?'submit':'button'); ?>"
                                            onclick="<?php echo e(env('APP_MODE')!='demo'?'':'call_demo()'); ?>"
                                            class="btn btn--primary px-4 text-uppercase"><?php echo e(\App\CPU\translate('save')); ?></button>
                                    <?php else: ?>
                                        <button type="submit"
                                                class="btn btn--primary px-4 text-uppercase"><?php echo e(\App\CPU\translate('Configure')); ?></button>
                                    <?php endif; ?>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <?php ($config=\App\CPU\Helpers::get_business_settings('senang_pay')); ?>
                        <form
                            action="<?php echo e(env('APP_MODE')!='demo'?route('admin.business-settings.payment-method.update',['senang_pay']):'javascript:'); ?>"
                            method="post">
                            <?php echo csrf_field(); ?>
                            <?php if(isset($config)): ?>
                                <?php ($config['environment'] = $config['environment']??'sandbox'); ?>
                                <div class="d-flex flex-wrap gap-2 justify-content-between mb-3">
                                    <h5 class="text-uppercase"><?php echo e(\App\CPU\translate('senang_pay')); ?></h5>

                                    <label class="switcher show-status-text">
                                        <input class="switcher_input" type="checkbox"
                                               name="status" value="1" <?php echo e($config['status']==1?'checked':''); ?>>
                                        <span class="switcher_control"></span>
                                    </label>
                                </div>

                                <center class="mb-3">
                                    <img height="60" src="<?php echo e(asset('public/assets/back-end/img/senangpay.png')); ?>"
                                         alt="">
                                </center>

                                <div class="form-group">
                                    <label
                                        class="d-flex title-color"><?php echo e(\App\CPU\translate('choose_environment')); ?></label>
                                    <select class="js-example-responsive form-control" name="environment">
                                        <option
                                            value="sandbox" <?php echo e($config['environment']=='sandbox'?'selected':''); ?>><?php echo e(\App\CPU\translate('sandbox')); ?></option>
                                        <option
                                            value="live" <?php echo e($config['environment']=='live'?'selected':''); ?>><?php echo e(\App\CPU\translate('live')); ?></option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="d-flex title-color"><?php echo e(\App\CPU\translate('Callback_URI')); ?></label>
                                    <div
                                        class="form-control d-flex align-items-center justify-content-between py-1 pl-3 pr-2">
                                        <span class="form-ellipsis <?php echo e(Session::get('direction') === 'rtl' ? 'text-right' : 'text-left'); ?>"
                                              id="id_senang_pay"><?php echo e(url('/')); ?>/return-senang-pay</span>
                                        <span class="btn btn--primary text-nowrap btn-xs"
                                              onclick="copyToClipboard('#id_senang_pay')">
                                        <i class="tio-copy"></i>
                                        <?php echo e(\App\CPU\translate('Copy URI')); ?>

                                    </span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label
                                        class="d-flex title-color"><?php echo e(\App\CPU\translate('secret')); ?> <?php echo e(\App\CPU\translate('key')); ?></label>
                                    <input type="text" class="form-control" name="secret_key"
                                           value="<?php echo e(env('APP_MODE')!='demo'?$config['secret_key']:''); ?>">
                                </div>

                                <div class="form-group">
                                    <label
                                        class="d-flex title-color"><?php echo e(\App\CPU\translate('Merchant')); ?> <?php echo e(\App\CPU\translate('ID')); ?></label>
                                    <input type="text" class="form-control" name="merchant_id"
                                           value="<?php echo e(env('APP_MODE')!='demo'?$config['merchant_id']:''); ?>">
                                </div>
                                <div class="mt-3 d-flex flex-wrap justify-content-end gap-10">
                                    <button type="<?php echo e(env('APP_MODE')!='demo'?'submit':'button'); ?>"
                                            onclick="<?php echo e(env('APP_MODE')!='demo'?'':'call_demo()'); ?>"
                                            class="btn btn--primary px-4 text-uppercase"><?php echo e(\App\CPU\translate('save')); ?></button>
                                    <?php else: ?>
                                        <button type="submit"
                                                class="btn btn--primary px-4 text-uppercase"><?php echo e(\App\CPU\translate('configure')); ?></button>
                                    <?php endif; ?>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <?php ($config=\App\CPU\Helpers::get_business_settings('paytabs')); ?>
                        <form
                            action="<?php echo e(env('APP_MODE')!='demo'?route('admin.business-settings.payment-method.update',['paytabs']):'javascript:'); ?>"
                            method="post">
                            <?php echo csrf_field(); ?>
                            <?php if(isset($config)): ?>
                                <?php ($config['environment'] = $config['environment']??'sandbox'); ?>
                                <div class="d-flex flex-wrap gap-2 justify-content-between mb-3">
                                    <h5 class="text-uppercase"><?php echo e(\App\CPU\translate('paytabs')); ?></h5>

                                    <label class="switcher show-status-text">
                                        <input class="switcher_input" type="checkbox"
                                               name="status" value="1" <?php echo e($config['status']==1?'checked':''); ?>>
                                        <span class="switcher_control"></span>
                                    </label>
                                </div>

                                <center class="mb-3">
                                    <img height="60" src="<?php echo e(asset('public/assets/back-end/img/paytabs.png')); ?>" alt="">
                                </center>


                                <div class="form-group">
                                    <label
                                        class="d-flex title-color"><?php echo e(\App\CPU\translate('choose_environment')); ?></label>
                                    <select class="js-example-responsive form-control" name="environment">
                                        <option
                                            value="sandbox" <?php echo e($config['environment']=='sandbox'?'selected':''); ?>><?php echo e(\App\CPU\translate('sandbox')); ?></option>
                                        <option
                                            value="live" <?php echo e($config['environment']=='live'?'selected':''); ?>><?php echo e(\App\CPU\translate('live')); ?></option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="d-flex title-color"><?php echo e(\App\CPU\translate('profile_id')); ?></label>
                                    <input type="text" class="form-control" name="profile_id"
                                           value="<?php echo e(env('APP_MODE')!='demo'?$config['profile_id']:''); ?>">
                                </div>

                                <div class="form-group">
                                    <label class="d-flex title-color"><?php echo e(\App\CPU\translate('server_key')); ?></label>
                                    <input type="text" class="form-control" name="server_key"
                                           value="<?php echo e(env('APP_MODE')!='demo'?$config['server_key']:''); ?>">
                                </div>

                                <div class="form-group">
                                    <label class="d-flex title-color"><?php echo e(\App\CPU\translate('base_url_by_region')); ?></label>
                                    <input type="text" class="form-control" name="base_url"
                                           value="<?php echo e(env('APP_MODE')!='demo'?$config['base_url']:''); ?>">
                                </div>


                                <div class="mt-3 d-flex flex-wrap justify-content-end gap-10">
                                    <button type="<?php echo e(env('APP_MODE')!='demo'?'submit':'button'); ?>"
                                            onclick="<?php echo e(env('APP_MODE')!='demo'?'':'call_demo()'); ?>"
                                            class="btn btn--primary px-4 text-uppercase"><?php echo e(\App\CPU\translate('save')); ?></button>
                                    <?php else: ?>
                                        <button type="submit"
                                                class="btn btn--primary px-4 text-uppercase"><?php echo e(\App\CPU\translate('configure')); ?></button>
                                    <?php endif; ?>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">

                        <?php ($config=\App\CPU\Helpers::get_business_settings('paystack')); ?>
                        <form
                            action="<?php echo e(env('APP_MODE')!='demo'?route('admin.business-settings.payment-method.update',['paystack']):'javascript:'); ?>"
                            method="post">
                            <?php echo csrf_field(); ?>
                            <?php if(isset($config)): ?>
                                <?php ($config['environment'] = $config['environment']??'sandbox'); ?>
                                <div class="d-flex flex-wrap gap-2 justify-content-between mb-3">
                                    <h5 class="text-uppercase"><?php echo e(\App\CPU\translate('paystack')); ?></h5>

                                    <label class="switcher show-status-text">
                                        <input class="switcher_input" type="checkbox"
                                               name="status" value="1" <?php echo e($config['status']==1?'checked':''); ?>>
                                        <span class="switcher_control"></span>
                                    </label>
                                </div>

                                <center class="mb-3">
                                    <img height="60" src="<?php echo e(asset('public/assets/back-end/img/paystack.png')); ?>" alt="">
                                </center>

                                <div class="form-group">
                                    <label class="d-flex title-color">
                                        <?php echo e(\App\CPU\translate('choose_environment')); ?>

                                    </label>
                                    <select class="js-example-responsive form-control" name="environment">
                                        <option value="sandbox" <?php echo e($config['environment']=='sandbox'?'selected':''); ?>>
                                            <?php echo e(\App\CPU\translate('sandbox')); ?>

                                        </option>
                                        <option value="live" <?php echo e($config['environment']=='live'?'selected':''); ?>>
                                            <?php echo e(\App\CPU\translate('live')); ?>

                                        </option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="d-flex title-color"><?php echo e(\App\CPU\translate('Callback_URI')); ?></label>

                                    <div
                                        class="form-control d-flex align-items-center justify-content-between py-1 pl-3 pr-2">
                                        <span class="form-ellipsis <?php echo e(Session::get('direction') === 'rtl' ? 'text-right' : 'text-left'); ?>"
                                              id="id_paystack"><?php echo e(url('/')); ?>/paystack-callback</span>
                                        <span class="btn btn--primary text-nowrap btn-xs"
                                              onclick="copyToClipboard('#id_paystack')"><i
                                                class="tio-copy"></i> <?php echo e(\App\CPU\translate('Copy URI')); ?></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="d-flex title-color"><?php echo e(\App\CPU\translate('publicKey')); ?></label>
                                    <input type="text" class="form-control" name="publicKey"
                                           value="<?php echo e(env('APP_MODE')!='demo'?$config['publicKey']:''); ?>">
                                </div>
                                <div class="form-group">
                                    <label class="d-flex title-color"><?php echo e(\App\CPU\translate('secretKey')); ?> </label>
                                    <input type="text" class="form-control" name="secretKey"
                                           value="<?php echo e(env('APP_MODE')!='demo'?$config['secretKey']:''); ?>">
                                </div>
                                <div class="form-group">
                                    <label class="d-flex title-color"><?php echo e(\App\CPU\translate('paymentUrl')); ?> </label>
                                    <input type="text" class="form-control" name="paymentUrl"
                                           value="<?php echo e(env('APP_MODE')!='demo'?$config['paymentUrl']:''); ?>">
                                </div>
                                <div class="form-group">
                                    <label class="d-flex title-color"><?php echo e(\App\CPU\translate('merchantEmail')); ?> </label>
                                    <input type="text" class="form-control" name="merchantEmail"
                                           value="<?php echo e(env('APP_MODE')!='demo'?$config['merchantEmail']:''); ?>">
                                </div>
                                <div class="mt-3 d-flex flex-wrap justify-content-end gap-10">
                                    <button type="<?php echo e(env('APP_MODE')!='demo'?'submit':'button'); ?>"
                                            onclick="<?php echo e(env('APP_MODE')!='demo'?'':'call_demo()'); ?>"
                                            class="btn btn--primary px-4 text-uppercase"><?php echo e(\App\CPU\translate('save')); ?></button>
                                    <?php else: ?>
                                        <button type="submit"
                                                class="btn btn--primary px-4 text-uppercase"><?php echo e(\App\CPU\translate('configure')); ?></button>
                                    <?php endif; ?>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <?php ($config=\App\CPU\Helpers::get_business_settings('paymob_accept')); ?>
                        <form
                            action="<?php echo e(env('APP_MODE')!='demo'?route('admin.business-settings.payment-method.update',['paymob_accept']):'javascript:'); ?>"
                            method="post">
                        <?php echo csrf_field(); ?>
                        <?php if(isset($config)): ?>
                                <?php ($config['environment'] = $config['environment']??'sandbox'); ?>
                                <div class="d-flex flex-wrap gap-2 justify-content-between mb-3">
                                    <h5 class="text-uppercase"><?php echo e(\App\CPU\translate('paymob_accept')); ?></h5>

                                    <label class="switcher show-status-text">
                                        <input class="switcher_input" type="checkbox"
                                               name="status" value="1" <?php echo e($config['status']==1?'checked':''); ?>>
                                        <span class="switcher_control"></span>
                                    </label>
                                </div>

                                <center class="mb-3">
                                    <img height="60" src="<?php echo e(asset('public/assets/back-end/img/paymob.png')); ?>" alt="">
                                </center>

                                <div class="form-group">
                                    <label class="d-flex title-color">
                                        <?php echo e(\App\CPU\translate('choose_environment')); ?>

                                    </label>
                                    <select class="js-example-responsive form-control" name="environment">
                                        <option value="sandbox" <?php echo e($config['environment']=='sandbox'?'selected':''); ?>>
                                            <?php echo e(\App\CPU\translate('sandbox')); ?>

                                        </option>
                                        <option value="live" <?php echo e($config['environment']=='live'?'selected':''); ?>>
                                            <?php echo e(\App\CPU\translate('live')); ?>

                                        </option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="d-flex title-color"><?php echo e(\App\CPU\translate('Callback_URI')); ?></label>

                                    <div
                                        class="form-control d-flex align-items-center justify-content-between py-1 pl-3 pr-2">
                                        <span class="form-ellipsis <?php echo e(Session::get('direction') === 'rtl' ? 'text-right' : 'text-left'); ?>"
                                              id="id_paymob_accept"><?php echo e(url('/')); ?>/paymob-callback</span>
                                        <span class="btn btn--primary text-nowrap btn-xs"
                                              onclick="copyToClipboard('#id_paymob_accept')">
                                            <i class="tio-copy"></i>
                                            <?php echo e(\App\CPU\translate('Copy URI')); ?>

                                        </span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="d-flex title-color"><?php echo e(\App\CPU\translate('api_key')); ?></label>
                                    <input type="text" class="form-control" name="api_key"
                                           value="<?php echo e(env('APP_MODE')!='demo'?$config['api_key']:''); ?>">
                                </div>

                                <div class="form-group">
                                    <label class="d-flex title-color"><?php echo e(\App\CPU\translate('iframe_id')); ?></label>
                                    <input type="text" class="form-control" name="iframe_id"
                                           value="<?php echo e(env('APP_MODE')!='demo'?$config['iframe_id']:''); ?>">
                                </div>

                                <div class="form-group">
                                    <label class="d-flex title-color"><?php echo e(\App\CPU\translate('integration_id')); ?></label>
                                    <input type="text" class="form-control" name="integration_id"
                                           value="<?php echo e(env('APP_MODE')!='demo'?$config['integration_id']:''); ?>">
                                </div>

                                <div class="form-group">
                                    <label class="d-flex title-color"><?php echo e(\App\CPU\translate('HMAC')); ?></label>
                                    <input type="text" class="form-control" name="hmac"
                                           value="<?php echo e(env('APP_MODE')!='demo'?$config['hmac']:''); ?>">
                                </div>


                                <div class="mt-3 d-flex flex-wrap justify-content-end gap-10">
                                    <button type="<?php echo e(env('APP_MODE')!='demo'?'submit':'button'); ?>"
                                            onclick="<?php echo e(env('APP_MODE')!='demo'?'':'call_demo()'); ?>"
                                            class="btn btn--primary px-4 text-uppercase"><?php echo e(\App\CPU\translate('save')); ?></button>
                                    <?php else: ?>
                                        <button type="submit"
                                                class="btn btn--primary px-4 text-uppercase"><?php echo e(\App\CPU\translate('configure')); ?></button>
                                    <?php endif; ?>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 d-none">
                <div class="card">
                    <div class="card-body">
                        <?php ($config=\App\CPU\Helpers::get_business_settings('fawry_pay')); ?>
                        <form
                            action="<?php echo e(env('APP_MODE')!='demo'?route('admin.business-settings.payment-method.update',['fawry_pay']):'javascript:'); ?>"
                            method="post">
                        <?php echo csrf_field(); ?>
                        <?php if(isset($config)): ?>
                                <?php ($config['environment'] = $config['environment']??'sandbox'); ?>
                                <div class="d-flex flex-wrap gap-2 justify-content-between mb-3">
                                    <h5 class="text-uppercase"><?php echo e(\App\CPU\translate('fawry_pay')); ?></h5>

                                    <label class="switcher show-status-text">
                                        <input class="switcher_input" type="checkbox"
                                               name="status" value="1" <?php echo e($config['status']==1?'checked':''); ?>>
                                        <span class="switcher_control"></span>
                                    </label>
                                </div>

                                <center class="mb-3">
                                    <img height="60" src="<?php echo e(asset('public/assets/back-end/img/fawry.svg')); ?>" alt="">
                                </center>

                                <div class="form-group">
                                    <label class="d-flex title-color">
                                        <?php echo e(\App\CPU\translate('choose_environment')); ?>

                                    </label>
                                    <select class="js-example-responsive form-control" name="environment">
                                        <option value="sandbox" <?php echo e($config['environment']=='sandbox'?'selected':''); ?>>
                                            <?php echo e(\App\CPU\translate('sandbox')); ?>

                                        </option>
                                        <option value="live" <?php echo e($config['environment']=='live'?'selected':''); ?>>
                                            <?php echo e(\App\CPU\translate('live')); ?>

                                        </option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="d-flex title-color"><?php echo e(\App\CPU\translate('merchant_code')); ?></label>
                                    <input type="text" class="form-control" name="merchant_code"
                                           value="<?php echo e(env('APP_MODE')!='demo'?$config['merchant_code']:''); ?>">
                                </div>

                                <div class="form-group">
                                    <label class="d-flex title-color"><?php echo e(\App\CPU\translate('security_key')); ?></label>
                                    <input type="text" class="form-control" name="security_key"
                                           value="<?php echo e(env('APP_MODE')!='demo'?$config['security_key']:''); ?>">
                                </div>


                                <div class="mt-3 d-flex flex-wrap justify-content-end gap-10">
                                    <button type="<?php echo e(env('APP_MODE')!='demo'?'submit':'button'); ?>"
                                            onclick="<?php echo e(env('APP_MODE')!='demo'?'':'call_demo()'); ?>"
                                            class="btn btn--primary px-4 text-uppercase"><?php echo e(\App\CPU\translate('save')); ?></button>
                                    <?php else: ?>
                                        <button type="submit"
                                                class="btn btn--primary px-4 text-uppercase"><?php echo e(\App\CPU\translate('configure')); ?></button>
                                    <?php endif; ?>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <?php ($config=\App\CPU\Helpers::get_business_settings('mercadopago')); ?>
                        <form
                            action="<?php echo e(env('APP_MODE')!='demo'?route('admin.business-settings.payment-method.update',['mercadopago']):'javascript:'); ?>"
                            method="post">
                            <?php echo csrf_field(); ?>
                            <div class="d-flex flex-wrap gap-2 justify-content-between mb-3">
                                <h5 class="text-uppercase"><?php echo e(\App\CPU\translate('mercadopago')); ?></h5>

                                <label class="switcher show-status-text">
                                    <input class="switcher_input" type="checkbox"
                                           name="status" value="1" <?php echo e($config['status']==1?'checked':''); ?>>
                                    <span class="switcher_control"></span>
                                </label>
                            </div>

                        <?php if(isset($config)): ?>
                                <?php ($config['environment'] = $config['environment']??'sandbox'); ?>

                                <center class="mb-3">
                                    <img height="60" src="<?php echo e(asset('public/assets/back-end/img/mercado.svg')); ?>" alt="">
                                </center>

                                <div class="form-group">
                                    <label class="d-flex title-color">
                                        <?php echo e(\App\CPU\translate('choose_environment')); ?>

                                    </label>
                                    <select class="js-example-responsive form-control" name="environment">
                                        <option value="sandbox" <?php echo e($config['environment']=='sandbox'?'selected':''); ?>>
                                            <?php echo e(\App\CPU\translate('sandbox')); ?>

                                        </option>
                                        <option value="live" <?php echo e($config['environment']=='live'?'selected':''); ?>>
                                            <?php echo e(\App\CPU\translate('live')); ?>

                                        </option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label
                                        class="d-flex title-color"><?php echo e(\App\CPU\translate('publicKey')); ?></label>
                                    <input type="text" class="form-control" name="public_key"
                                           value="<?php echo e(env('APP_MODE')!='demo'?$config['public_key']:''); ?>">
                                </div>
                                <div class="form-group">
                                    <label
                                        class="d-flex title-color"><?php echo e(\App\CPU\translate('access_token')); ?></label>
                                    <input type="text" class="form-control" name="access_token"
                                           value="<?php echo e(env('APP_MODE')!='demo'?$config['access_token']:''); ?>">
                                </div>

                                <div class="mt-3 d-flex flex-wrap justify-content-end gap-10">
                                    <button type="<?php echo e(env('APP_MODE')!='demo'?'submit':'button'); ?>"
                                            onclick="<?php echo e(env('APP_MODE')!='demo'?'':'call_demo()'); ?>"
                                            class="btn btn--primary px-4 text-uppercase"><?php echo e(\App\CPU\translate('save')); ?></button>
                                    <?php else: ?>
                                        <button type="submit"
                                                class="btn btn--primary px-4 text-uppercase"><?php echo e(\App\CPU\translate('configure')); ?></button>
                                    <?php endif; ?>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">

                        <?php ($config=\App\CPU\Helpers::get_business_settings('liqpay')); ?>
                        <form
                            action="<?php echo e(env('APP_MODE')!='demo'?route('admin.business-settings.payment-method.update',['liqpay']):'javascript:'); ?>"
                            method="post">
                        <?php echo csrf_field(); ?>
                        <?php if(isset($config)): ?>

                                <?php ($config['environment'] = $config['environment']??'sandbox'); ?>
                                <div class="d-flex flex-wrap gap-2 justify-content-between mb-3">
                                    <h5 class="text-uppercase"><?php echo e(\App\CPU\translate('liqpay')); ?></h5>

                                    <label class="switcher show-status-text">
                                        <input class="switcher_input" type="checkbox"
                                               name="status" value="1" <?php echo e($config['status']==1?'checked':''); ?>>
                                        <span class="switcher_control"></span>
                                    </label>
                                </div>

                                <center class="mb-3">
                                    <img height="60" src="<?php echo e(asset('public/assets/back-end/img/liqpay4.png')); ?>" alt="">
                                </center>

                                <div class="form-group">
                                    <label class="d-flex title-color">
                                        <?php echo e(\App\CPU\translate('choose_environment')); ?>

                                    </label>
                                    <select class="js-example-responsive form-control" name="environment">
                                        <option value="sandbox" <?php echo e($config['environment']=='sandbox'?'selected':''); ?>>
                                            <?php echo e(\App\CPU\translate('sandbox')); ?>

                                        </option>
                                        <option value="live" <?php echo e($config['environment']=='live'?'selected':''); ?>>
                                            <?php echo e(\App\CPU\translate('live')); ?>

                                        </option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label
                                        class="d-flex title-color"><?php echo e(\App\CPU\translate('publicKey')); ?></label>
                                    <input type="text" class="form-control" name="public_key"
                                           value="<?php echo e(env('APP_MODE')!='demo'?$config['public_key']:''); ?>">
                                </div>
                                <div class="form-group">
                                    <label
                                        class="d-flex title-color"><?php echo e(\App\CPU\translate('privateKey')); ?></label>
                                    <input type="text" class="form-control" name="private_key"
                                           value="<?php echo e(env('APP_MODE')!='demo'?$config['private_key']:''); ?>">
                                </div>

                                <div class="mt-3 d-flex flex-wrap justify-content-end gap-10">
                                    <button type="<?php echo e(env('APP_MODE')!='demo'?'submit':'button'); ?>"
                                            onclick="<?php echo e(env('APP_MODE')!='demo'?'':'call_demo()'); ?>"
                                            class="btn btn--primary px-4 text-uppercase"><?php echo e(\App\CPU\translate('save')); ?></button>
                                    <?php else: ?>
                                        <button type="submit"
                                                class="btn btn--primary px-4 text-uppercase"><?php echo e(\App\CPU\translate('configure')); ?></button>
                                    <?php endif; ?>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">

                        <?php ($config=\App\CPU\Helpers::get_business_settings('flutterwave')); ?>
                        <form
                            action="<?php echo e(env('APP_MODE')!='demo'?route('admin.business-settings.payment-method.update',['flutterwave']):'javascript:'); ?>"
                            method="post">
                        <?php echo csrf_field(); ?>
                        <?php if(isset($config)): ?>
                                <?php ($config['environment'] = $config['environment']??'sandbox'); ?>
                                <div class="d-flex flex-wrap gap-2 justify-content-between mb-3">
                                    <h5 class="text-uppercase"><?php echo e(\App\CPU\translate('flutterwave')); ?></h5>

                                    <label class="switcher show-status-text">
                                        <input class="switcher_input" type="checkbox"
                                               name="status" value="1" <?php echo e($config['status']==1?'checked':''); ?>>
                                        <span class="switcher_control"></span>
                                    </label>
                                </div>

                                <center class="mb-3">
                                    <img height="60" src="<?php echo e(asset('public/assets/back-end/img/fluterwave.png')); ?>"
                                         alt="">
                                </center>

                                <div class="form-group">
                                    <label class="d-flex title-color">
                                        <?php echo e(\App\CPU\translate('choose_environment')); ?>

                                    </label>
                                    <select class="js-example-responsive form-control" name="environment">
                                        <option value="sandbox" <?php echo e($config['environment']=='sandbox'?'selected':''); ?>>
                                            <?php echo e(\App\CPU\translate('sandbox')); ?>

                                        </option>
                                        <option value="live" <?php echo e($config['environment']=='live'?'selected':''); ?>>
                                            <?php echo e(\App\CPU\translate('live')); ?>

                                        </option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label
                                        class="d-flex title-color"><?php echo e(\App\CPU\translate('publicKey')); ?></label>
                                    <input type="text" class="form-control" name="public_key"
                                           value="<?php echo e(env('APP_MODE')!='demo'?$config['public_key']:''); ?>">
                                </div>
                                <div class="form-group">
                                    <label
                                        class="d-flex title-color"><?php echo e(\App\CPU\translate('secret')); ?> <?php echo e(\App\CPU\translate('key')); ?></label>
                                    <input type="text" class="form-control" name="secret_key"
                                           value="<?php echo e(env('APP_MODE')!='demo'?$config['secret_key']:''); ?>">
                                </div>
                                <div class="form-group">
                                    <label class="d-flex title-color"><?php echo e(\App\CPU\translate('hash')); ?></label>
                                    <input type="text" class="form-control" name="hash"
                                           value="<?php echo e(env('APP_MODE')!='demo'?$config['hash']:''); ?>">
                                </div>

                                <div class="mt-3 d-flex flex-wrap justify-content-end gap-10">
                                    <button type="<?php echo e(env('APP_MODE')!='demo'?'submit':'button'); ?>"
                                            onclick="<?php echo e(env('APP_MODE')!='demo'?'':'call_demo()'); ?>"
                                            class="btn btn--primary px-4 text-uppercase"><?php echo e(\App\CPU\translate('save')); ?></button>
                                    <?php else: ?>
                                        <button type="submit"
                                                class="btn btn--primary px-4 text-uppercase"><?php echo e(\App\CPU\translate('configure')); ?></button>
                                    <?php endif; ?>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <?php ($config=\App\CPU\Helpers::get_business_settings('paytm')); ?>
                        <form
                            action="<?php echo e(env('APP_MODE')!='demo'?route('admin.business-settings.payment-method.update',['paytm']):'javascript:'); ?>"
                            method="post">
                        <?php echo csrf_field(); ?>
                        <?php if(isset($config)): ?>
                                <?php ($config['environment'] = $config['environment']??'sandbox'); ?>
                                <div class="d-flex flex-wrap gap-2 justify-content-between mb-3">
                                    <h5 class="text-uppercase"><?php echo e(\App\CPU\translate('paytm')); ?></h5>

                                    <label class="switcher show-status-text">
                                        <input class="switcher_input" type="checkbox"
                                               name="status" value="1" <?php echo e($config['status']==1?'checked':''); ?>>
                                        <span class="switcher_control"></span>
                                    </label>
                                </div>

                                <center class="mb-3">
                                    <img height="60" src="<?php echo e(asset('public/assets/back-end/img/paytm.png')); ?>" alt="">
                                </center>

                                <div class="form-group">
                                    <label class="d-flex title-color">
                                        <?php echo e(\App\CPU\translate('choose_environment')); ?>

                                    </label>
                                    <select class="js-example-responsive form-control" name="environment">
                                        <option value="sandbox" <?php echo e($config['environment']=='sandbox'?'selected':''); ?>>
                                            <?php echo e(\App\CPU\translate('sandbox')); ?>

                                        </option>
                                        <option value="live" <?php echo e($config['environment']=='live'?'selected':''); ?>>
                                            <?php echo e(\App\CPU\translate('live')); ?>

                                        </option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="d-flex title-color"><?php echo e(\App\CPU\translate('paytm_merchant_key')); ?></label>
                                    <input type="text" class="form-control" name="paytm_merchant_key"
                                           value="<?php echo e(env('APP_MODE')!='demo'?$config['paytm_merchant_key']:''); ?>">
                                </div>

                                <div class="form-group">
                                    <label class="d-flex title-color"><?php echo e(\App\CPU\translate('paytm_merchant_mid')); ?></label>
                                    <input type="text" class="form-control" name="paytm_merchant_mid"
                                           value="<?php echo e(env('APP_MODE')!='demo'?$config['paytm_merchant_mid']:''); ?>">
                                </div>

                                <div class="form-group">
                                    <label class="d-flex title-color"><?php echo e(\App\CPU\translate('paytm_merchant_website')); ?></label>
                                    <input type="text" class="form-control" name="paytm_merchant_website"
                                           value="<?php echo e(env('APP_MODE')!='demo'?$config['paytm_merchant_website']:''); ?>">
                                </div>

                                <div class="mt-3 d-flex flex-wrap justify-content-end gap-10">
                                    <button type="<?php echo e(env('APP_MODE')!='demo'?'submit':'button'); ?>"
                                            onclick="<?php echo e(env('APP_MODE')!='demo'?'':'call_demo()'); ?>"
                                            class="btn btn--primary px-4 text-uppercase"><?php echo e(\App\CPU\translate('save')); ?></button>
                                    <?php else: ?>
                                        <button type="submit"
                                                class="btn btn--primary px-4 text-uppercase"><?php echo e(\App\CPU\translate('configure')); ?></button>
                                    <?php endif; ?>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <?php ($config=\App\CPU\Helpers::get_business_settings('bkash')); ?>
                        <form
                            action="<?php echo e(env('APP_MODE')!='demo'?route('admin.business-settings.payment-method.update',['bkash']):'javascript:'); ?>"
                            method="post">
                        <?php echo csrf_field(); ?>
                        <?php if(isset($config)): ?>
                                <?php ($config['environment'] = $config['environment']??'sandbox'); ?>
                                <div class="d-flex flex-wrap gap-2 justify-content-between mb-3">
                                    <h5 class="text-uppercase"><?php echo e(\App\CPU\translate('bkash')); ?></h5>

                                    <label class="switcher show-status-text">
                                        <input class="switcher_input" type="checkbox"
                                               name="status" value="1" <?php echo e($config['status']==1?'checked':''); ?>>
                                        <span class="switcher_control"></span>
                                    </label>
                                </div>

                                <center class="mb-3">
                                    <img height="60" src="<?php echo e(asset('public/assets/back-end/img/bkash.png')); ?>" alt="">
                                </center>

                                <div class="form-group">
                                    <label class="d-flex title-color">
                                        <?php echo e(\App\CPU\translate('choose_environment')); ?>

                                    </label>
                                    <select class="js-example-responsive form-control" name="environment">
                                        <option value="sandbox" <?php echo e($config['environment']=='sandbox'?'selected':''); ?>>
                                            <?php echo e(\App\CPU\translate('sandbox')); ?>

                                        </option>
                                        <option value="live" <?php echo e($config['environment']=='live'?'selected':''); ?>>
                                            <?php echo e(\App\CPU\translate('live')); ?>

                                        </option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="d-flex title-color"><?php echo e(\App\CPU\translate('api_key')); ?></label>
                                    <input type="text" class="form-control" name="api_key"
                                           value="<?php echo e(env('APP_MODE')!='demo'?$config['api_key']:''); ?>">
                                </div>

                                <div class="form-group">
                                    <label class="d-flex title-color"><?php echo e(\App\CPU\translate('api_secret')); ?></label>
                                    <input type="text" class="form-control" name="api_secret"
                                           value="<?php echo e(env('APP_MODE')!='demo'?$config['api_secret']:''); ?>">
                                </div>

                                <div class="form-group">
                                    <label class="d-flex title-color"><?php echo e(\App\CPU\translate('username')); ?></label>
                                    <input type="text" class="form-control" name="username"
                                           value="<?php echo e(env('APP_MODE')!='demo'?$config['username']:''); ?>">
                                </div>

                                <div class="form-group">
                                    <label class="d-flex title-color"><?php echo e(\App\CPU\translate('password')); ?></label>
                                    <input type="text" class="form-control" name="password"
                                           value="<?php echo e(env('APP_MODE')!='demo'?$config['password']:''); ?>">
                                </div>


                                <div class="mt-3 d-flex flex-wrap justify-content-end gap-10">
                                    <button type="<?php echo e(env('APP_MODE')!='demo'?'submit':'button'); ?>"
                                            onclick="<?php echo e(env('APP_MODE')!='demo'?'':'call_demo()'); ?>"
                                            class="btn btn--primary px-4 text-uppercase"><?php echo e(\App\CPU\translate('save')); ?></button>
                                    <?php else: ?>
                                        <button type="submit"
                                                class="btn btn--primary px-4 text-uppercase"><?php echo e(\App\CPU\translate('configure')); ?></button>
                                    <?php endif; ?>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        function copyToClipboard(element) {
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val($(element).text()).select();
            document.execCommand("copy");
            $temp.remove();
            toastr.success("<?php echo e(\App\CPU\translate('Copied to the clipboard')); ?>");
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tikka\resources\views/admin/business-settings/payment-method/index.blade.php ENDPATH**/ ?>