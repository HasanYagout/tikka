<!-- Login Modal -->
<div
    class="modal fade"
    id="sellerloginModal"
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
            <div class="modal-body px-sm-5">
                <div class="mb-3 text-center">
                    <img
                        width="123"
                        src="<?php echo e(asset("storage/app/public/company")."/".$web_config['web_logo']->value); ?>"
                        alt=""
                        class="dark-support"
                    />
                </div>
                <div class="mb-4">
                    <h2 class="mb-2"><?php echo e(translate('Seller_Login')); ?></h2>
                    <p class="text-muted">
                        <?php echo e(translate('login_to_your_seller_account')); ?>.
                    </p>
                </div>

                <form action="<?php echo e(route('seller.auth.login')); ?>" method="post" id="seller_login_form">
                    <?php echo csrf_field(); ?>
                    <div class="form-group mb-4">
                        <label for="email"><?php echo e(translate('email')); ?></label>
                        <input
                            name="email" id="seller-email"
                            class="form-control" value="<?php echo e(old('email')); ?>"
                            placeholder="Enter email" required
                        />
                    </div>

                    <div class="mb-4">
                        <label for="password"><?php echo e(translate('password')); ?></label>
                        <div class="input-inner-end-ele">
                            <input
                                name="password" type="password" id="seller-password"
                                class="form-control"
                                placeholder="<?php echo e(translate('Ex:_8+_character')); ?>"
                                required
                            />
                            <i class="bi bi-eye-slash-fill togglePassword"></i>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between gap-3 align-items-center">
                        <label
                            for="seller_remember"
                            class="d-flex gap-1 align-items-center mb-0">
                            <input type="checkbox"  name="remember" id="seller_remember" <?php echo e(old('remember') ? 'checked' : ''); ?>/>
                            <?php echo e(translate('remember_me')); ?>

                        </label>

                        <a href="<?php echo e(route('seller.auth.forgot-password')); ?>"><?php echo e(translate('Forgot_Password')); ?> ?</a>
                    </div>

                    <?php if($web_config['recaptcha']['status'] == 1): ?>
                    <div class="col-12">
                        <div id="recaptcha_element_seller_login" class="w-100 mt-4" data-type="image"></div>
                        <br/>
                    </div>
                    <?php else: ?>
                    <div class="col-12">
                        <div class="row py-2 mt-4">
                            <div class="col-6 pr-2">
                                <input type="text" class="form-control border __h-40" name="default_recaptcha_id_seller_login" value=""
                                    placeholder="<?php echo e(translate('Enter_captcha_value')); ?>" autocomplete="off" required>
                            </div>
                            <div class="col-6 input-icons mb-2 rounded bg-white">
                                <a onclick="re_captcha_seller_login()" class="d-flex align-items-center align-items-center">
                                    <img src="<?php echo e(URL('/seller/auth/code/captcha/1?captcha_session_id=default_recaptcha_id_seller_login')); ?>" class="input-field rounded __h-40" id="default_recaptcha_id_login">
                                    <i class="bi bi-arrow-repeat icon cursor-pointer p-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>

                    <div class="d-flex justify-content-center mt-4 mb-3">
                        <button type="submit" class="btn btn-primary"><?php echo e(translate('login')); ?></button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<?php $__env->startPush('script'); ?>


<script>
    <?php if($web_config['recaptcha']['status'] == '1'): ?>
        $("#seller_login_form").on('submit', function (e) {
            var response = grecaptcha.getResponse($('#recaptcha_element_seller_login').attr('data-login-id'));
            if (response.length === 0) {
                e.preventDefault();
                toastr.error("<?php echo e(translate('Please check the recaptcha')); ?>");
            }
        });
    <?php else: ?>
        function re_captcha_seller_login() {
            $url = "<?php echo e(URL('/seller/auth/code/captcha')); ?>";
            $url = $url + "/" + Math.random()+'?captcha_session_id=default_recaptcha_id_seller_login';

            document.getElementById('default_recaptcha_id_login').src = $url;
        }
    <?php endif; ?>
</script>



<script>
    $("#seller_login_form").on('submit', function (e) {
        e.preventDefault();
        let login_form = $(this);

        $.ajax({
            url:login_form.attr('action'),
            method:login_form.attr('method'),
            dataType: "json",
            data:login_form.serialize(),
            success:function(data)
            {
                if (data.errors) {
                    $.each(data.errors, function(index, value){
                        toastr.error(value)
                    });

                    <?php if($web_config['recaptcha']['status'] != '1'): ?>
                        re_captcha_seller_login()
                    <?php endif; ?>
                }else{
                    window.location.href = data.redirect_url;
                }
            }
        });
    });
</script>

<?php $__env->stopPush(); ?>
<?php /**PATH C:\xampp\htdocs\tikka\resources\themes\theme_aster/theme-views/layouts/partials/modal/_seller-login.blade.php ENDPATH**/ ?>