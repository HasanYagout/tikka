<!-- Register Modal -->
<div class="modal fade"
     id="registerModal"
     tabindex="-1"
     aria-hidden="true"
>
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0 pb-0">
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body px-4 px-lg-5">
                <div class="mb-4 text-center">
                    <img
                        width="200"
                        src="<?php echo e(asset("public/storage/company")."/".$web_config['web_logo']->value); ?>"

                        alt=""
                        class="dark-support"
                    />
                </div>
                <div class="mb-4">
                    <h2 class="mb-2"><?php echo e(translate('sign_up')); ?></h2>
                    <p class="text-muted">
                        <?php echo e(translate('login_to_your_account')); ?>. <?php echo e(translate('Don’t_have_account')); ?>?
                        <span
                            class="text-primary fw-bold"
                            data-bs-toggle="modal"
                            data-bs-target="#loginModal">
                            <?php echo e(translate('login')); ?>

                        </span>
                    </p>
                </div>

                <form action="<?php echo e(route('customer.auth.sign-up')); ?>" method="POST" id="customer_form" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="custom-scrollbar">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group mb-4">
                                    <label for="f_name"> <?php echo e(translate('First_Name')); ?></label>
                                    <input
                                        type="text"
                                        id="f_name"
                                        name="f_name"
                                        class="form-control"
                                        placeholder="Ex: Jhone"
                                        value="<?php echo e(old('f_name')); ?>"
                                        required
                                    />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group mb-4">
                                    <label for="l_name"><?php echo e(translate('Last_Name')); ?></label>
                                    <input
                                        type="text"
                                        id="l_name"
                                        name="l_name"
                                        value="<?php echo e(old('l_name')); ?>"
                                        class="form-control"
                                        placeholder="Ex: Doe"
                                        required
                                    />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group mb-4">
                                    <label for="r_email"><?php echo e(translate('email')); ?></label>
                                    <input
                                        type="text"
                                        id="r_email"
                                        value="<?php echo e(old('email')); ?>"
                                        name="email"
                                        class="form-control"
                                        placeholder="<?php echo e(translate('enter_email_or_phone_number')); ?>"
                                        autocomplete="off"
                                        required
                                    />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group mb-4">
                                    <label for="phone"><?php echo e(translate('phone')); ?></label>
                                    <input
                                        type="number"
                                        id="phone"
                                        value="<?php echo e(old('phone')); ?>"
                                        name="phone"
                                        class="form-control"
                                        placeholder="<?php echo e(translate('enter_phone_number')); ?>"
                                        required
                                    />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label for="password"><?php echo e(translate('password')); ?></label>
                                    <div class="input-inner-end-ele">
                                        <input
                                            type="password"
                                            id="password"
                                            name="password"
                                            class="form-control"
                                            placeholder="<?php echo e(translate('minimum_8_characters_long')); ?>"
                                            autocomplete="off"
                                            required
                                        />
                                        <i class="bi bi-eye-slash-fill togglePassword"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label for="confirm_password"><?php echo e(translate('Confirm_Password')); ?></label>
                                    <div class="input-inner-end-ele">
                                        <input
                                            type="password"
                                            id="confirm_password"
                                            class="form-control"
                                            name="con_password"
                                            placeholder="<?php echo e(translate('minimum_8_characters_long')); ?>"
                                            autocomplete="off"
                                            required
                                        />
                                        <i class="bi bi-eye-slash-fill togglePassword"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php if($web_config['recaptcha']['status'] == 1): ?>
                            <div class="d-flex justify-content-center">
                                <div id="recaptcha_element_customer_regi" class="w-100 mt-2" data-type="image"></div>
                            </div>
                        <?php else: ?>
                            <div class="d-flex gap-3 justify-content-center py-2 mt-4 mb-3">
                                <div class="">
                                    <input type="text" class="form-control border __h-40" name="default_recaptcha_value_customer_regi" value=""
                                        placeholder="<?php echo e(\App\CPU\translate('Enter captcha value')); ?>" autocomplete="off">
                                </div>
                                <div class="input-icons rounded bg-white">
                                    <a onclick="re_captcha_customer_regi();" class="d-flex align-items-center align-items-center">
                                        <img src="<?php echo e(URL('/customer/auth/code/captcha/1?captcha_session_id=default_recaptcha_id_customer_regi')); ?>" class="input-field rounded __h-40" id="customer_regi_recaptcha_id">
                                        <i class="bi bi-arrow-repeat icon cursor-pointer p-2"></i>
                                    </a>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="d-flex justify-content-center mt-4">
                            <label for="agree" class="d-flex gap-1 align-items-center mb-0">
                                <input type="checkbox" id="inputCheckd" required/>
                                <?php echo e(translate('i_agree_with_the')); ?> <a href="<?php echo e(route('terms')); ?>" class="text-info"><?php echo e(translate('Terms_&_Conditions')); ?></a>
                            </label>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center mt-4 mb-3">
                        <button type="submit" id="sign-up" class="btn btn-primary px-5" disabled><?php echo e(translate('Sign_Up')); ?></button>
                    </div>
                </form>

                <?php if($web_config['social_login_text']): ?>
                    <p class="text-center text-muted"><?php echo e(translate('or_continue_with')); ?></p>
                <?php endif; ?>
                <div class="d-flex justify-content-center gap-3 align-items-center flex-wrap pb-3" >
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
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallbackCustomerRegi&render=explicit" async defer></script>

    <script>
        $('#inputCheckd').change(function () {
            if ($(this).is(':checked')) {
                $('#sign-up').removeAttr('disabled');
            } else {
                $('#sign-up').attr('disabled', 'disabled');
            }

        });

        <?php if($web_config['recaptcha']['status'] == '1'): ?>
            var onloadCallbackCustomerRegi = function () {
                let reg_id = grecaptcha.render('recaptcha_element_customer_regi', {
                    'sitekey': '<?php echo e(\App\CPU\Helpers::get_business_settings('recaptcha')['site_key']); ?>'
                });
                $('#recaptcha_element_customer_regi').attr('data-reg-id', reg_id);
            };

            function recaptcha_f(){
                let response = grecaptcha.getResponse($('#recaptcha_element_customer_regi').attr('data-reg-id'));
                if (response.length === 0) {
                    return false;
                }else{
                    return true;
                }
            }
        <?php else: ?>
            function re_captcha_customer_regi() {
                $url = "<?php echo e(URL('/customer/auth/code/captcha')); ?>";
                $url = $url + "/" + Math.random()+'?captcha_session_id=default_recaptcha_id_customer_regi';
                document.getElementById('customer_regi_recaptcha_id').src = $url;
            }
        <?php endif; ?>

        $('#customer_form').submit(function(event) {
            event.preventDefault();
            let formData = $(this).serialize()
            let recaptcha = true;

            <?php if($web_config['recaptcha']['status'] == '1'): ?>
                recaptcha = recaptcha_f();
            <?php endif; ?>

            if(recaptcha === true) {
                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: formData,
                    beforeSend: function () {
                        $("#loading").addClass("d-grid");
                    },
                    success: function (data) {
                        // return false;
                        if (data.errors) {
                            for (var i = 0; i < data.errors.length; i++) {
                                toastr.error(data.errors[i], {
                                    CloseButton: true,
                                    ProgressBar: true
                                });
                            }
                            <?php if($web_config['recaptcha']['status'] != '1'): ?>
                                re_captcha_customer_regi()
                            <?php endif; ?>
                        } else {
                            toastr.success(
                                '<?php echo e(translate('Customeer_Added_Successfully')); ?>!', {
                                    CloseButton: true,
                                    ProgressBar: true
                            });
                            if (data.redirect_url !== '') {
                                window.location.href = data.redirect_url;
                            } else {
                                $('#registerModal').modal('hide');
                                $('#loginModal').modal('show');
                            }
                        }
                    },
                    complete: function () {
                        $("#loading").removeClass("d-grid");
                    },
                });
            } else{
                toastr.error("<?php echo e(translate('Please check the recaptcha')); ?>");
            }
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\xampp\htdocs\tikka\resources\themes\theme_aster/theme-views/layouts/partials/modal/_register.blade.php ENDPATH**/ ?>
