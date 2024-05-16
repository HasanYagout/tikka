<?php $__env->startSection('title', \App\CPU\translate('Social Login')); ?>

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

        <?php
        $data = App\Models\BusinessSetting::where(['type' => 'social_login'])->first();
        $socialLoginServices = json_decode($data['value'], true);
        ?>
        <div class="row gy-3">
            <?php if(isset($socialLoginServices)): ?>
                <?php $__currentLoopData = $socialLoginServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $socialLoginService): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body text-<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>">
                                <form
                                    action="<?php echo e(route('admin.social-login.update',[$socialLoginService['login_medium']])); ?>"
                                    method="post">
                                    <?php echo csrf_field(); ?>
                                    <label class="switcher position-absolute right-3 top-3">
                                        <input class="switcher_input" type="checkbox" <?php echo e($socialLoginService['status']==1?'checked':''); ?> value="1" name="status">
                                        <span class="switcher_control"></span>
                                    </label>

                                    <div class="d-flex flex-column align-items-center gap-2 mb-3">
                                        <h4 class="text-center"><?php echo e(\App\CPU\translate($socialLoginService['login_medium'])); ?></h4>
                                    </div>

                                    <div class="form-group">
                                        <label class="title-color font-weight-bold text-capitalize"><?php echo e(\App\CPU\translate('Callback_URI')); ?></label>
                                        <div class="form-control d-flex align-items-center justify-content-between py-1 pl-3 pr-2">
                                            <span class="form-ellipsis" id="id_<?php echo e($socialLoginService['login_medium']); ?>"><?php echo e(url('/')); ?>/customer/auth/login/<?php echo e($socialLoginService['login_medium']); ?>/callback</span>
                                            <span class="btn btn--primary text-nowrap btn-xs" onclick="copyToClipboard('#id_<?php echo e($socialLoginService['login_medium']); ?>')">
                                        <i class="tio-copy"></i>
                                        <?php echo e(\App\CPU\translate('Copy URI')); ?>

                                    </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="title-color font-weight-bold text-capitalize"><?php echo e(\App\CPU\translate('Store_Client_ID')); ?></label><br>
                                        <input type="text" class="form-control form-ellipsis" name="client_id"
                                               value="<?php echo e($socialLoginService['client_id']); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="title-color font-weight-bold text-capitalize"><?php echo e(\App\CPU\translate('Store_Client_Secret_Key')); ?></label>
                                        <input type="text" class="form-control form-ellipsis" name="client_secret"
                                               value="<?php echo e($socialLoginService['client_secret']); ?>">
                                    </div>
                                    <div class="d-flex justify-content-between flex-wrap gap-2">
                                        <button class="btn btn-outline--primary" type="button" data-toggle="modal" data-target="#<?php echo e($socialLoginService['login_medium']); ?>-modal">
                                            <?php echo e(\App\CPU\translate('See_Credential_Setup_Instructions')); ?>

                                        </button>
                                        <button type="<?php echo e(env('APP_MODE')!='demo'?'submit':'button'); ?>" class="btn btn--primary px-4"><?php echo e(\App\CPU\translate('save')); ?></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>

        
        <!-- Google -->
        <div class="modal fade" id="google-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel"><?php echo e(\App\CPU\translate('Google API Set up Instructions')); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <ol>
                            <li><?php echo e(\App\CPU\translate('Go to the Credentials page')); ?> (<?php echo e(\App\CPU\translate('Click')); ?> <a href="https://console.cloud.google.com/apis/credentials" target="_blank"><?php echo e(\App\CPU\translate('here')); ?></a>)</li>
                            <li><?php echo e(\App\CPU\translate('Click')); ?> <b><?php echo e(\App\CPU\translate('Create credentials')); ?></b> > <b><?php echo e(\App\CPU\translate('OAuth client ID')); ?></b>.</li>
                            <li><?php echo e(\App\CPU\translate('Select the')); ?> <b><?php echo e(\App\CPU\translate('Web application')); ?></b> <?php echo e(\App\CPU\translate('type')); ?>.</li>
                            <li><?php echo e(\App\CPU\translate('Name your OAuth 2.0 client')); ?></li>
                            <li><?php echo e(\App\CPU\translate('Click')); ?> <b><?php echo e(\App\CPU\translate('ADD URI')); ?></b> <?php echo e(\App\CPU\translate('from')); ?> <b><?php echo e(\App\CPU\translate('Authorized redirect URIs')); ?></b> , <?php echo e(\App\CPU\translate('provide the')); ?> <code><?php echo e(\App\CPU\translate('Callback URI')); ?></code> <?php echo e(\App\CPU\translate('from below and click')); ?> <b><?php echo e(\App\CPU\translate('Create')); ?></b></li>
                            <li><?php echo e(\App\CPU\translate('Copy')); ?> <b><?php echo e(\App\CPU\translate('Client ID')); ?></b> <?php echo e(\App\CPU\translate('and')); ?> <b><?php echo e(\App\CPU\translate('Client Secret')); ?></b>, <?php echo e(\App\CPU\translate('paste in the input filed below and')); ?> <b><?php echo e(\App\CPU\translate('Save')); ?></b>.</li>
                        </ol>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--primary" data-dismiss="modal"><?php echo e(\App\CPU\translate('Close')); ?></button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Facebook -->
        <div class="modal fade" id="facebook-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel"><?php echo e(\App\CPU\translate('Facebook API Set up Instructions')); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body"><b></b>
                        <ol>
                            <li><?php echo e(\App\CPU\translate('Go to the facebook developer page')); ?> (<a href="https://developers.facebook.com/apps/" target="_blank"><?php echo e(\App\CPU\translate('Click Here')); ?></a>)</li>
                            <li><?php echo e(\App\CPU\translate('Go to')); ?> <b><?php echo e(\App\CPU\translate('Get Started')); ?></b> <?php echo e(\App\CPU\translate('from Navbar')); ?></li>
                            <li><?php echo e(\App\CPU\translate('From Register tab press')); ?> <b><?php echo e(\App\CPU\translate('Continue')); ?></b> <small>(<?php echo e(\App\CPU\translate('If needed')); ?>)</small></li>
                            <li><?php echo e(\App\CPU\translate('Provide Primary Email and press')); ?> <b><?php echo e(\App\CPU\translate('Confirm Email')); ?></b> <small>(<?php echo e(\App\CPU\translate('If needed')); ?>)</small></li>
                            <li><?php echo e(\App\CPU\translate('In about section select')); ?> <b><?php echo e(\App\CPU\translate('Other')); ?></b> <?php echo e(\App\CPU\translate('and press')); ?> <b><?php echo e(\App\CPU\translate('Complete Registration')); ?></b></li>

                            <li><b><?php echo e(\App\CPU\translate('Create App')); ?></b> > <?php echo e(\App\CPU\translate('Select an app type and press')); ?> <b><?php echo e(\App\CPU\translate('Next')); ?></b></li>
                            <li><?php echo e(\App\CPU\translate('Complete the add details form and press')); ?> <b><?php echo e(\App\CPU\translate('Create App')); ?></b></li><br/>

                            <li><?php echo e(\App\CPU\translate('From')); ?> <b><?php echo e(\App\CPU\translate('Facebook Login')); ?></b> <?php echo e(\App\CPU\translate('press')); ?> <b><?php echo e(\App\CPU\translate('Set Up')); ?></b></li>
                            <li><?php echo e(\App\CPU\translate('Select')); ?> <b><?php echo e(\App\CPU\translate('Web')); ?></b></li>
                            <li><?php echo e(\App\CPU\translate('Provide')); ?> <b><?php echo e(\App\CPU\translate('Site URL')); ?></b> <small>(<?php echo e(\App\CPU\translate('Base URL of the site ex:')); ?> https://example.com)</small> > <b><?php echo e(\App\CPU\translate('Save')); ?></b></li><br/>
                            <li><?php echo e(\App\CPU\translate('Now go to')); ?> <b><?php echo e(\App\CPU\translate('Setting')); ?></b> <?php echo e(\App\CPU\translate('from')); ?> <b><?php echo e(\App\CPU\translate('Facebook Login')); ?></b> (<?php echo e(\App\CPU\translate('left sidebar')); ?>)</li>
                            <li><?php echo e(\App\CPU\translate('Make sure to check')); ?> <b><?php echo e(\App\CPU\translate('Client OAuth Login')); ?></b> <small>(<?php echo e(\App\CPU\translate('must on')); ?>)</small></li>
                            <li><?php echo e(\App\CPU\translate('Provide')); ?> <code><?php echo e(\App\CPU\translate('Valid OAuth Redirect URIs')); ?></code> <?php echo e(\App\CPU\translate('from below and click')); ?> <b><?php echo e(\App\CPU\translate('Save Changes')); ?></b></li>

                            <li><?php echo e(\App\CPU\translate('Now go to')); ?> <b><?php echo e(\App\CPU\translate('Setting')); ?></b> (<?php echo e(\App\CPU\translate('from left sidebar')); ?>) > <b><?php echo e(\App\CPU\translate('Basic')); ?></b></li>
                            <li><?php echo e(\App\CPU\translate('Fill the form and press')); ?> <b><?php echo e(\App\CPU\translate('Save Changes')); ?></b></li>
                            <li><?php echo e(\App\CPU\translate('Now, copy')); ?> <b><?php echo e(\App\CPU\translate('Client ID')); ?></b> & <b><?php echo e(\App\CPU\translate('Client Secret')); ?></b>, <?php echo e(\App\CPU\translate('paste in the input filed below and')); ?> <b><?php echo e(\App\CPU\translate('Save')); ?></b>.</li>
                        </ol>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--primary float-right" data-dismiss="modal"><?php echo e(\App\CPU\translate('Close')); ?></button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Twitter -->
        <div class="modal fade" id="twitter-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel"><?php echo e(\App\CPU\translate('Twitter API Set up Instructions')); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body"><b></b>
                        <?php echo e(\App\CPU\translate('Instruction will be available very soon')); ?>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--primary float-right" data-dismiss="modal"><?php echo e(\App\CPU\translate('Close')); ?></button>
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

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tikka\resources\views/admin/business-settings/social-login/view.blade.php ENDPATH**/ ?>