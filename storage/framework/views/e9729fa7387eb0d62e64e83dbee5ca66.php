<?php $__env->startSection('title', translate('Payment_Details').' | '.$web_config['name']->value.' '.translate(' Ecommerce')); ?>
<?php $__env->startPush('css_or_js'); ?>
    <style>
        .stripe-button-el {
            display: none !important;
        }

        .razorpay-payment-button {
            display: none !important;
        }
    </style>

    
    <script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
    <script src="https://js.stripe.com/v3/"></script>
    
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Main Content -->
    <main class="main-content d-flex flex-column gap-3 py-3 mb-5">
        <div class="container">
            <h4 class="text-center mb-3"><?php echo e(translate('Payment_Details')); ?></h4>

            <div class="row">
                <div class="col-lg-8 mb-3 mb-lg-0">
                    <div class="card h-100">
                        <div class="card-body  px-sm-4">
                            <div class="d-flex justify-content-center mb-30">
                                <ul class="cart-step-list">
                                    <li class="done"><span><i class="bi bi-check2"></i></span> <?php echo e(translate('cart')); ?></li>
                                    <li class="done"><span><i class="bi bi-check2"></i></span> <?php echo e(translate('Shipping_Details')); ?></li>
                                    <li class="current"><span><i class="bi bi-check2"></i></span> <?php echo e(translate('payment')); ?></li>
                                </ul>
                            </div>

                            <h5 class="mb-4"><?php echo e(translate('Payment_Information')); ?></h5>

                            <div class="mb-30">
                                <ul class="option-select-btn flex-wrap gap-3">
                                    <?php if(!$cod_not_show && $cash_on_delivery['status']): ?>
                                    <li>
                                        <form action="<?php echo e(route('checkout-complete')); ?>" method="get">
                                            <label>
                                                <input type="hidden" name="payment_method" value="cash_on_delivery">
                                                <button type="submit" class="payment-method d-flex border-0 align-iems-center gap-3">
                                                    <img width="32" src="<?php echo e(theme_asset('assets/img/icons/cash-on.png')); ?>" class="dark-support" alt="">
                                                    <span class=""><?php echo e(translate('Cash_on_Delivery')); ?></span>
                                                </button>
                                            </label>
                                        </form>
                                    </li>
                                    <?php endif; ?>

                                    <!--Digital payment start-->
                                    <?php if($digital_payment['status']==1): ?>
                                            <li>
                                                <label id="digital_payment_btn">
                                                    <input type="hidden">
                                                    <span class="payment-method d-flex align-iems-center gap-3">
                                                    <img width="30" src="<?php echo e(theme_asset('assets/img/icons/degital-payment.png')); ?>" class="dark-support" alt="">
                                                    <span class=""><?php echo e(translate('Digital_Payment')); ?></span>
                                                </span>
                                                </label>
                                            </li>

                                        <?php if($wallet_status==1): ?>
                                        <li>
                                            <label class="digital_payment d--none">
                                                <button class="payment-method d-flex align-iems-center border-0 gap-3" type="submit" data-bs-toggle="modal" data-bs-target="#wallet_submit_button">
                                                    <img width="30" src="<?php echo e(theme_asset('assets/img/icons/wallet.png')); ?>" class="dark-support" alt="">
                                                    <span class=""><?php echo e(translate('wallet')); ?></span>
                                                </button>
                                            </label>
                                        </li>
                                        <?php endif; ?>

                                        <?php if(isset($offline_payment) && $offline_payment['status']): ?>
                                        <li>
                                            <form action="<?php echo e(route('offline-payment-checkout-complete')); ?>" method="get" class="digital_payment d--none">
                                                <label>
                                                    <input type="hidden" name="weight" >
                                                    <span class="payment-method d-flex align-iems-center gap-3" data-bs-toggle="modal" data-bs-target="#offline_payment_submit_button">
                                                        <img width="100" src="<?php echo e(theme_asset('assets/img/payment/pay-offline.png')); ?>" class="dark-support" alt="">
                                                    </span>
                                                </label>
                                            </form>
                                        </li>
                                        <?php endif; ?>

                                        <?php if($ssl_commerz_payment['status']): ?>
                                        <li>
                                            <form action="<?php echo e(url('/pay-ssl')); ?>" method="post" class="digital_payment d--none">
                                                <?php echo csrf_field(); ?>
                                                <label>
                                                    <button class="payment-method border-0 d-flex align-iems-center gap-3">
                                                        <img width="100" src="<?php echo e(theme_asset('assets/img/payment/sslcomz.png')); ?>" class="dark-support" alt="">
                                                    </button>
                                                </label>
                                            </form>
                                        </li>
                                        <?php endif; ?>

                                        <?php if($paypal['status']): ?>
                                        <li>
                                            <form action="<?php echo e(route('pay-paypal')); ?>" method="post" id="payment-form" class="digital_payment d--none">
                                                <?php echo csrf_field(); ?>
                                                <label>
                                                    <button class="payment-method border-0 d-flex align-iems-center gap-3">
                                                        <img width="90" src="<?php echo e(theme_asset('assets/img/payment/paypal.png')); ?>" class="dark-support" alt="">
                                                    </button>
                                                </label>
                                            </form>
                                        </li>
                                        <?php endif; ?>

                                        <?php if($stripe['status']): ?>
                                        <li>
                                            <label class="digital_payment d--none">
                                                <button class="payment-method border-0 d-flex align-iems-center gap-3" type="button" id="checkout-button">
                                                    <img width="70" src="<?php echo e(theme_asset('assets/img/payment/stripe.png')); ?>" class="dark-support" alt="">
                                                </button>
                                            </label>
                                        </li>
                                        <?php endif; ?>

                                        <?php if(isset($inr) && isset($usd) && $razor_pay['status']): ?>
                                        <li>
                                            <form action="<?php echo route('payment-razor'); ?>" method="post" id="payment-form" class="digital_payment d--none">
                                                <?php echo csrf_field(); ?>
                                                <script src="https://checkout.razorpay.com/v1/checkout.js"
                                                    data-key="<?php echo e(\Illuminate\Support\Facades\Config::get('razor.razor_key')); ?>"
                                                    data-amount="<?php echo e((round(\App\CPU\Convert::usdToinr($amount)))*100); ?>"
                                                    data-buttontext="Pay <?php echo e((\App\CPU\Convert::usdToinr($amount))*100); ?> INR"
                                                    data-name="<?php echo e(\App\Models\BusinessSetting::where(['type'=>'company_name'])->first()->value); ?>"
                                                    data-description=""
                                                    data-image="<?php echo e(asset('public/storage/app/public/company/'.\App\Models\BusinessSetting::where(['type'=>'company_web_logo'])->first()->value)); ?>"
                                                    data-prefill.name="<?php echo e(auth('customer')->user()->f_name); ?>"
                                                    data-prefill.email="<?php echo e(auth('customer')->user()->email); ?>"
                                                    data-theme.color="#ff7529">
                                                </script>
                                                <label>
                                                    <button class="payment-method border-0 d-flex align-iems-center gap-3" type="button" onclick="$('.razorpay-payment-button').click()">
                                                        <img width="100" src="<?php echo e(theme_asset('assets/img/payment/razor.png')); ?>" class="dark-support" alt="">
                                                    </button>
                                                </label>
                                            </form>
                                        </li>
                                        <?php endif; ?>

                                        <?php if($paystack['status']): ?>
                                        <li>
                                            <form method="POST" action="<?php echo e(route('paystack-pay')); ?>" accept-charset="UTF-8" role="form" class="digital_payment d--none">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="email"
                                                       value="<?php echo e(auth('customer')->user()->email); ?>"> 
                                                <input type="hidden" name="orderID"
                                                       value="<?php echo e(session('cart_group_id')); ?>">
                                                <input type="hidden" name="amount"
                                                       value="<?php echo e(\App\CPU\Convert::usdTozar($amount*100)); ?>"> 
                                                <input type="hidden" name="quantity" value="1">
                                                <input type="hidden" name="currency"
                                                       value="<?php echo e(\App\CPU\Helpers::currency_code()); ?>">
                                                <input type="hidden" name="metadata"
                                                       value="<?php echo e(json_encode($array = ['key_name' => 'value',])); ?>"> 
                                                <input type="hidden" name="reference"
                                                       value="<?php echo e(Paystack::genTranxRef()); ?>"> 

                                                <label>
                                                    <button class="payment-method border-0 d-flex align-iems-center gap-3" type="submit">
                                                        <img width="100" src="<?php echo e(theme_asset('assets/img/payment/paystack.png')); ?>" class="dark-support" alt="">
                                                    </button>
                                                </label>
                                            </form>
                                        </li>
                                        <?php endif; ?>

                                        <?php if(isset($myr) && isset($usd) && $senang_pay['status']): ?>
                                                <?php ($user=auth('customer')->user()); ?>
                                                <?php ($secretkey = $senang_pay['secret_key']); ?>
                                                <?php ($data = new \stdClass()); ?>
                                                <?php ($data->merchantId = $senang_pay['merchant_id']); ?>
                                                <?php ($data->detail = 'payment'); ?>
                                                <?php ($data->order_id = session('cart_group_id')); ?>
                                                <?php ($data->amount = \App\CPU\Convert::usdTomyr($amount)); ?>
                                                <?php ($data->name = $user->f_name.' '.$user->l_name); ?>
                                                <?php ($data->email = $user->email); ?>
                                                <?php ($data->phone = $user->phone); ?>
                                                <?php ($data->hashed_string = md5($secretkey . urldecode($data->detail) . urldecode($data->amount) . urldecode($data->order_id))); ?>
                                            <li>
                                                <form name="order" method="post" class="digital_payment d--none" action="https://<?php echo e(env('APP_MODE')=='live'?'app.senangpay.my':'sandbox.senangpay.my'); ?>/payment/<?php echo e($senang_pay['merchant_id']); ?>">
                                                    <input type="hidden" name="detail" value="<?php echo e($data->detail); ?>">
                                                    <input type="hidden" name="amount" value="<?php echo e($data->amount); ?>">
                                                    <input type="hidden" name="order_id" value="<?php echo e($data->order_id); ?>">
                                                    <input type="hidden" name="name" value="<?php echo e($data->name); ?>">
                                                    <input type="hidden" name="email" value="<?php echo e($data->email); ?>">
                                                    <input type="hidden" name="phone" value="<?php echo e($data->phone); ?>">
                                                    <input type="hidden" name="hash" value="<?php echo e($data->hashed_string); ?>">

                                                    <label>
                                                        <button class="payment-method border-0 d-flex align-iems-center gap-3" type="submit" id="checkout-button">
                                                            <img width="100" src="<?php echo e(theme_asset('assets/img/payment/senangpay.png')); ?>" class="dark-support" alt="">
                                                        </button>
                                                    </label>
                                                </form>
                                            </li>
                                        <?php endif; ?>

                                        <?php if($paymob_accept['status']): ?>
                                            <li>
                                                <form method="POST" id="payment-form-paymob" class="digital_payment d--none" action="<?php echo e(route('paymob-credit')); ?>">
                                                    <?php echo csrf_field(); ?>
                                                    <label>
                                                        <button class="payment-method border-0 d-flex align-iems-center gap-3" type="submit" id="checkout-button">
                                                            <img width="100" src="<?php echo e(theme_asset('assets/img/payment/paymob.png')); ?>" class="dark-support" alt="">
                                                        </button>
                                                    </label>
                                                </form>
                                            </li>
                                        <?php endif; ?>

                                        <?php if(isset($bkash)  && $bkash['status']): ?>
                                            <li>
                                                <form method="POST" id="payment-form-paymob" action="<?php echo e(route('paymob-credit')); ?>" class="digital_payment d--none">
                                                    <?php echo csrf_field(); ?>
                                                    <label>
                                                        <a class="payment-method border-0 d-flex align-iems-center gap-3" href="<?php echo e(route('bkash-make-payment')); ?>">
                                                            <img width="70" src="<?php echo e(theme_asset('assets/img/payment/bkash.png')); ?>" class="dark-support" alt="">
                                                        </a>
                                                    </label>
                                                </form>
                                            </li>
                                        <?php endif; ?>

                                        <?php if(isset($paytabs)  && $paytabs['status']): ?>
                                            <li>
                                                <label class="digital_payment d--none">
                                                    <a class="payment-method border-0 d-flex align-iems-center gap-3" onclick="location.href='<?php echo e(route('paytabs-payment')); ?>'">
                                                        <img width="90" src="<?php echo e(theme_asset('assets/img/payment/paytabs.png')); ?>" class="dark-support" alt="">
                                                    </a>
                                                </label>
                                            </li>
                                        <?php endif; ?>

                                        <?php if(isset($mercadopago) && $mercadopago['status']): ?>
                                            <li>
                                                <label class="digital_payment d--none">
                                                    <a class="payment-method border-0 d-flex align-iems-center gap-3" onclick="location.href='<?php echo e(route('mercadopago.index')); ?>'">
                                                        <img width="100" src="<?php echo e(theme_asset('assets/img/payment/MercadoPago_(Horizontal).svg')); ?>" class="dark-support" alt="">
                                                    </a>
                                                </label>
                                            </li>
                                        <?php endif; ?>

                                        <?php if(isset($flutterwave) && $flutterwave['status']): ?>
                                            <li>
                                                <form method="POST" action="<?php echo e(route('flutterwave_pay')); ?>" class="digital_payment d--none">
                                                    <?php echo csrf_field(); ?>
                                                    <label>
                                                        <button type="submit" class="payment-method border-0 d-flex align-iems-center gap-3">
                                                            <img width="100" src="<?php echo e(theme_asset('assets/img/payment/fluterwave.png')); ?>" class="dark-support" alt="">
                                                        </button>
                                                    </label>
                                                </form>
                                            </li>
                                        <?php endif; ?>

                                        <?php if(isset($paytm) && $paytm['status']): ?>
                                            <li>
                                                <label class="digital_payment d--none">
                                                    <a class="payment-method border-0 d-flex align-iems-center gap-3" onclick="location.href='<?php echo e(route('paytm-payment')); ?>'">
                                                        <img width="100" src="<?php echo e(theme_asset('assets/img/payment/paytm.png')); ?>" class="dark-support" alt="">
                                                    </a>
                                                </label>
                                            </li>
                                        <?php endif; ?>

                                        <?php if(isset($liqpay) && $liqpay['status']): ?>
                                            <li>
                                                <label class="digital_payment d--none">
                                                    <a class="payment-method border-0 d-flex align-iems-center gap-3" onclick="location.href='<?php echo e(route('liqpay-payment')); ?>'">
                                                        <img width="100" src="<?php echo e(theme_asset('assets/img/payment/liqpay4.png')); ?>" class="dark-support" alt="">
                                                    </a>
                                                </label>
                                            </li>
                                        <?php endif; ?>

                                    <?php endif; ?>
                                    <!--Digital payment end-->
                                </ul>



                            <!--Modal payment start-->

                            <?php if($digital_payment['status']==1): ?>
                                <?php if($wallet_status==1): ?>
                                    <!-- wallet modal -->
                                    <div class="modal fade" id="wallet_submit_button">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle"><?php echo e(\App\CPU\translate('wallet_payment')); ?></h5>
                                                    <button type="button" class="btn-close outside" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <?php ($customer_balance = auth('customer')->user()->wallet_balance); ?>
                                                <?php ($remain_balance = $customer_balance - $amount); ?>
                                                <form action="<?php echo e(route('checkout-complete-wallet')); ?>" method="get" class="needs-validation">
                                                    <?php echo csrf_field(); ?>
                                                    <div class="modal-body">
                                                        <div class="form-row">
                                                            <div class="form-group col-12">
                                                                <label for=""><?php echo e(\App\CPU\translate('your_current_balance')); ?></label>
                                                                <input class="form-control" type="text" value="<?php echo e(\App\CPU\Helpers::currency_converter($customer_balance)); ?>" readonly>
                                                            </div>
                                                        </div>

                                                        <div class="form-row">
                                                            <div class="form-group col-12">
                                                                <label for=""><?php echo e(\App\CPU\translate('order_amount')); ?></label>
                                                                <input class="form-control" type="text" value="<?php echo e(\App\CPU\Helpers::currency_converter($amount)); ?>" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-12">
                                                                <label for=""><?php echo e(\App\CPU\translate('remaining_balance')); ?></label>
                                                                <input class="form-control" type="text" value="<?php echo e(\App\CPU\Helpers::currency_converter($remain_balance)); ?>" readonly>
                                                                <?php if($remain_balance<0): ?>
                                                                    <label class="__color-crimson"><?php echo e(\App\CPU\translate('you do not have sufficient balance for pay this order!!')); ?></label>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="update_cart_button fs-16 btn btn-secondary" data-dismiss="modal"><?php echo e(\App\CPU\translate('close')); ?></button>
                                                        <button type="submit" class="update_cart_button fs-16 btn btn-primary" <?php echo e($remain_balance>0? '':'disabled'); ?>><?php echo e(\App\CPU\translate('submit')); ?></button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <!-- offline payment modal -->
                                <?php if(isset($offline_payment) && $offline_payment['status']): ?>
                                    <div class="modal fade" id="offline_payment_submit_button">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle"><?php echo e(\App\CPU\translate('offline_payment')); ?></h5>
                                                    <button type="button" class="btn-close outside" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="<?php echo e(route('offline-payment-checkout-complete')); ?>" method="post" class="needs-validation">
                                                    <?php echo csrf_field(); ?>
                                                    <div class="modal-body">
                                                        <div class="form-row">
                                                            <div class="form-group col-12">
                                                                <label for=""><?php echo e(\App\CPU\translate('payment_by')); ?></label>
                                                                <input class="form-control" type="text" name="payment_by" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-12">
                                                                <label for=""><?php echo e(\App\CPU\translate('transaction_ID')); ?></label>
                                                                <input class="form-control" type="text" name="transaction_ref" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-12">
                                                                <label for=""><?php echo e(\App\CPU\translate('payment_note')); ?></label>
                                                                <textarea name="payment_note" id="" class="form-control"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="hidden" value="offline_payment" name="payment_method">
                                                        <button type="button" class="update_cart_button fs-16 btn btn-secondary" data-dismiss="modal"><?php echo e(\App\CPU\translate('close')); ?></button>
                                                        <button type="submit" class="update_cart_button fs-16 btn btn-primary"><?php echo e(\App\CPU\translate('submit')); ?></button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                            <!--Modal payment end-->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order summery Content -->
                <?php echo $__env->make('theme-views.partials._order-summery', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            </div>
        </div>
    </main>
    <!-- End Main Content -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>

    <script type="text/javascript">
        // Create an instance of the Stripe object with your publishable API key
        var stripe = Stripe('<?php echo e($stripe['published_key']); ?>');
        var checkoutButton = document.getElementById("checkout-button");
        checkoutButton.addEventListener("click", function () {
            fetch("<?php echo e(route('pay-stripe')); ?>", {
                method: "GET",
            }).then(function (response) {
                console.log(response)
                return response.text();
            }).then(function (session) {
                /*console.log(JSON.parse(session).id)*/
                return stripe.redirectToCheckout({sessionId: JSON.parse(session).id});
            }).then(function (result) {
                if (result.error) {
                    alert(result.error.message);
                }
            }).catch(function (error) {
                console.error("<?php echo e(\App\CPU\translate('Error')); ?>:", error);
            });
        });
    </script>

    <script>
        setTimeout(function () {
            $('.stripe-button-el').hide();
            $('.razorpay-payment-button').hide();
        }, 10)
    </script>

    <script type="text/javascript">
        function click_if_alone() {
            let total = $('.checkout_details .click-if-alone').length;
            if (Number.parseInt(total) < 2) {
                $('.click-if-alone').click()
                $('.checkout_details').html('<h1><?php echo e(\App\CPU\translate('Redirecting_to_the_payment')); ?>......</h1>');
            }
        }
        click_if_alone();

        $('#digital_payment_btn').on('click', function (){
            $('.digital_payment').slideToggle('slow');
            // $(this).toggleClass('arrow-up');
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('theme-views.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tikka\resources\themes\theme_aster/theme-views/checkout/payment.blade.php ENDPATH**/ ?>