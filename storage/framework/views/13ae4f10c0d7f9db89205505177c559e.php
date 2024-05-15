<!-- Login Modal -->
<div
    class="modal fade"
    id="loginModal"
    tabindex="-1"
    aria-hidden="true"
>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0 pb-0">
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body px-4 px-sm-5">
                <div class="mb-4 text-center">
                    <img
                        width="200"
                        src="<?php echo e(asset("public/storage/company")."/".$web_config['web_logo']->value); ?>"

                        alt=""
                        class="dark-support"
                    />
                </div>
                <div class="mb-4">
                    <h2 class="mb-2"><?php echo e(translate('login')); ?></h2>
                    <p class="text-muted">
                        <?php echo e(translate('login_to_your_account')); ?>. <?php echo e(translate('Don’t_have_account')); ?>?
                        <span
                            class="text-primary fw-bold"
                            data-bs-toggle="modal"
                            data-bs-target="#registerModal">
                            <?php echo e(translate('Sign_Up')); ?>

                        </span>
                    </p>
                </div>

                <form action="<?php echo e(route('customer.auth.login')); ?>" method="post" id="customer_login_modal" autocomplete="off">
                    <?php echo csrf_field(); ?>
                    <div class="form-group mb-4">
                        <label for="email"><?php echo e(translate('email')); ?> / <?php echo e(translate('phone')); ?></label>
                        <input
                            name="user_id" id="si-email"
                            class="form-control" value="<?php echo e(old('user_id')); ?>"
                            placeholder="<?php echo e(translate('Enter_email_or_phone_number')); ?>" required
                        />
                    </div>

                    <div class="mb-4">
                        <label for="password"><?php echo e(translate('password')); ?></label>
                        <div class="input-inner-end-ele">
                            <input
                                name="password" type="password" id="si-password"
                                class="form-control"
                                placeholder="<?php echo e(translate('Ex:_6+_character')); ?>"
                                required
                            />
                            <i class="bi bi-eye-slash-fill togglePassword"></i>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between gap-3 align-items-center">
                        <label
                            for="remember_me"
                            class="d-flex gap-1 align-items-center mb-0">
                            <input type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>/>
                            <?php echo e(translate('remember_me')); ?>

                        </label>

                        <a href="<?php echo e(route('customer.auth.recover-password')); ?>"><?php echo e(translate('Forgot_Password')); ?> ?</a>
                    </div>

                    <?php if($web_config['recaptcha']['status'] == 1): ?>
                        <div class="d-flex justify-content-center mb-3">
                            <div id="recaptcha_element_customer_login" class="w-100 mt-4" data-type="image"></div>
                        </div>
                    <?php else: ?>
                        <div class="d-flex justify-content-center align-items-center gap-3 py-2 mt-4 mb-3">
                            <div>
                                <input type="text" class="form-control border __h-40" name="default_recaptcha_id_customer_login" value=""
                                       placeholder="<?php echo e(\App\CPU\translate('Enter captcha value')); ?>" autocomplete="off">
                            </div>
                            <div class="input-icons rounded bg-white">
                                <a onclick="re_captcha_customer_login();" class="d-flex align-items-center align-items-center">
                                    <img src="<?php echo e(URL('/customer/auth/code/captcha/1?captcha_session_id=default_recaptcha_id_customer_login')); ?>" class="input-field rounded __h-40" id="customer_login_recaptcha_id">
                                    <i class="bi bi-arrow-repeat icon cursor-pointer p-2"></i>
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="d-flex justify-content-center mb-3">
                        <button type="submit" class="fs-16 btn btn-primary px-5"><?php echo e(translate('login')); ?></button>
                    </div>
                </form>

                <?php if($web_config['social_login_text']): ?>
                    <p class="text-center text-muted"><?php echo e(translate('or_continue_with')); ?></p>
                <?php endif; ?>

                <div class="d-flex justify-content-center gap-3 align-items-center flex-wrap pb-3">
                    <?php $__currentLoopData = $web_config['socials_login']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $socialLoginService): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(isset($socialLoginService) && $socialLoginService['status']==true): ?>
                            <a href="<?php echo e(route('customer.auth.service-login', $socialLoginService['login_medium'])); ?>">
                                <img
                                    width="35"
                                    src="<?php echo e(theme_asset('assets/img/svg/'.$socialLoginService['login_medium'].'.svg')); ?>"
                                    alt=""
                                    class="dark-support"/>
                            </a>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->startPush('script'); ?>

    
    <?php if($web_config['recaptcha']['status'] == 1): ?>
        <script type="text/javascript">
            var onloadCallbackCustomerLogin = function () {
                let login_id = grecaptcha.render('recaptcha_element_customer_login', {
                    'sitekey': '<?php echo e(\App\CPU\Helpers::get_business_settings('recaptcha')['site_key']); ?>'
                });
                $('#recaptcha_element_customer_login').attr('data-login-id', login_id);
            };
        </script>
        <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallbackCustomerLogin&render=explicit" async
                defer></script>

    <?php else: ?>
        <script type="text/javascript">
            function re_captcha_customer_login() {
                $url = "<?php echo e(URL('/customer/auth/code/captcha')); ?>";
                $url = $url + "/" + Math.random()+'?captcha_session_id=default_recaptcha_id_customer_login';
                document.getElementById('customer_login_recaptcha_id').src = $url;
                console.log('url: '+ $url);
            }
        </script>
    <?php endif; ?>
    

    <script>
        $("#customer_login_modal").submit(function (e) {
            e.preventDefault();
            var customer_recaptcha = true;

            <?php if($web_config['recaptcha']['status'] == 1): ?>
                var response_customer_login = grecaptcha.getResponse($('#recaptcha_element_customer_login').attr('data-login-id'));

                if (response_customer_login.length === 0) {
                    e.preventDefault();
                    toastr.error("<?php echo e(\App\CPU\translate('Please check the recaptcha')); ?>");
                    customer_recaptcha = false;
                }
            <?php endif; ?>

            if(customer_recaptcha === true) {
                let form = $(this);
                $.ajax({
                    type: 'POST',
                    url:`<?php echo e(route('customer.auth.login')); ?>`,
                    data: form.serialize(),
                    success: function (data) {
                        if (data.status === 'success') {
                            toastr.success(`<?php echo e(translate('Login_successful')); ?>`);
                            location.reload();
                        } else if (data.status === 'error') {
                            data.redirect_url !== '' ? window.location.href = data.redirect_url : toastr.error(data.message);
                        }
                    }
                });
            }
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\xampp\htdocs\tikka\resources\themes\theme_aster/theme-views/layouts/partials/modal/_login.blade.php ENDPATH**/ ?>