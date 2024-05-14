<?php $__env->startSection('title',auth('customer')->user()->f_name.' '.auth('customer')->user()->l_name); ?>


<?php $__env->startSection('content'); ?>
    <!-- Page Title-->
    <div class="container rtl">
        <h3 class="py-3 m-0 text-center headerTitle"><?php echo e(\App\CPU\translate('profile_Info')); ?></h3>
    </div>
    <!-- Page Content-->
    <div class="container pb-5 mb-2 mb-md-4 rtl">
        <div class="row">
        <!-- Sidebar-->
        <?php echo $__env->make('web-views.partials._profile-aside', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Content  -->
            <section class="col-lg-9 col-md-9 __customer-profile">
                <div class="card box-shadow-sm">
                    <div class="card-header">
                        <form class="mt-3 px-sm-2 pb-2" action="<?php echo e(route('user-update')); ?>" method="post"
                              enctype="multipart/form-data">
                            <div class="row photoHeader g-3">
                                <?php echo csrf_field(); ?>
                                <div class="d-flex mb-3 mb-md-0 align-items-center">
                                    <img id="blah"
                                        class="rounded-circle border __inline-48"
                                        onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                        src="<?php echo e(asset('storage/profile')); ?>/<?php echo e($customerDetail['image']); ?>">

                                    <div class="<?php echo e(Session::get('direction') === "rtl" ? 'pr-2' : 'pl-2'); ?>">
                                        <h5 class="font-name"><?php echo e($customerDetail->f_name. ' '.$customerDetail->l_name); ?></h5>
                                        <label for="files"
                                            style="cursor: pointer; color:<?php echo e($web_config['primary_color']); ?>;"
                                            class="spandHeadO m-0">
                                            <?php echo e(\App\CPU\translate('change_your_profile')); ?>

                                        </label>
                                        <span class="text-danger __text-10px">( * <?php echo e(\App\CPU\translate('Image ratio should be 1:1')); ?>  )</span>
                                        <input id="files" name="image" hidden type="file">
                                    </div>
                                </div>


                                <div class="card-body mt-md-3 p-0">
                                    <h3 class="font-nameA"><?php echo e(\App\CPU\translate('account_information')); ?> </h3>


                                    <div class="form-row">
                                        <div class="form-group col-md-6 mb-0">
                                            <label for="firstName"><?php echo e(\App\CPU\translate('first_name')); ?> </label>
                                            <input type="text" class="form-control" id="f_name" name="f_name"
                                                   value="<?php echo e($customerDetail['f_name']); ?>" required>
                                        </div>
                                        <div class="form-group col-md-6 mb-0">
                                            <label for="lastName"> <?php echo e(\App\CPU\translate('last_name')); ?> </label>
                                            <input type="text" class="form-control" id="l_name" name="l_name"
                                                   value="<?php echo e($customerDetail['l_name']); ?>">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6 mb-0">
                                            <label for="inputEmail4"><?php echo e(\App\CPU\translate('Email')); ?> </label>
                                            <input type="email" class="form-control" type="email" id="account-email"
                                                   value="<?php echo e($customerDetail['email']); ?>" disabled>
                                        </div>
                                        <div class="form-group col-md-6 mb-0">
                                            <label for="phone"><?php echo e(\App\CPU\translate('phone_number')); ?> </label>
                                            <small class="text-primary">(
                                                * <?php echo e(\App\CPU\translate('country_code_is_must')); ?> <?php echo e(\App\CPU\translate('like_for_BD_880')); ?>

                                                )</small></label>
                                            <input type="number" class="form-control" type="text" id="phone"
                                                   name="phone"
                                                   value="<?php echo e($customerDetail['phone']); ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6 mb-0">
                                            <label for="si-password"><?php echo e(\App\CPU\translate('new_password')); ?></label>
                                            <div class="password-toggle">
                                                <input class="form-control" name="password" type="password"
                                                       placeholder="<?php echo e(translate('minimum_8_characters_long')); ?>" id="password"
                                                >
                                                <label class="password-toggle-btn">
                                                    <input class="custom-control-input" type="checkbox"
                                                           style="display: none">
                                                    <i class="czi-eye password-toggle-indicator"
                                                       onChange="checkPasswordMatch()"></i>
                                                    <span
                                                        class="sr-only"><?php echo e(\App\CPU\translate('Show')); ?> <?php echo e(\App\CPU\translate('password')); ?> </span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6 mb-0">
                                            <label for="newPass"><?php echo e(\App\CPU\translate('confirm_password')); ?> </label>
                                            <div class="password-toggle">
                                                <input class="form-control" name="confirm_password" type="password"
                                                       placeholder="<?php echo e(translate('minimum_8_characters_long')); ?>" id="confirm_password">
                                                <div>
                                                    <label class="password-toggle-btn">
                                                        <input class="custom-control-input" type="checkbox"
                                                               style="display: none">
                                                        <i class="czi-eye password-toggle-indicator"
                                                           onChange="checkPasswordMatch()"></i><span
                                                            class="sr-only"><?php echo e(\App\CPU\translate('Show')); ?> <?php echo e(\App\CPU\translate('password')); ?> </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div id='message'></div>
                                        </div>
                                        <div class="col-12 d-flex flex-wrap justify-content-between __gap-15 __profile-btns">
                                             <a class="btn btn-danger"
                                                 href="javascript:"
                                                 onclick="route_alert('<?php echo e(route('account-delete',[$customerDetail['id']])); ?>','<?php echo e(\App\CPU\translate('want_to_delete_this_account?')); ?>')">
                                                 <?php echo e(\App\CPU\translate('delete_account')); ?>

                                             </a>
                                             <button type="submit" class="btn btn--primary"><?php echo e(\App\CPU\translate('update')); ?>   </button>
                                         </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(asset('public/assets/front-end')); ?>/vendor/nouislider/distribute/nouislider.min.js"></script>
    <script src="<?php echo e(asset('public/assets/back-end/js/croppie.js')); ?>"></script>
    <script>
        function checkPasswordMatch() {
            var password = $("#password").val();
            var confirmPassword = $("#confirm_password").val();
            $("#message").removeAttr("style");
            $("#message").html("");
            if (confirmPassword == "") {
                $("#message").attr("style", "color:black");
                $("#message").html("<?php echo e(\App\CPU\translate('Please ReType Password')); ?>");

            } else if (password == "") {
                $("#message").removeAttr("style");
                $("#message").html("");

            } else if (password != confirmPassword) {
                $("#message").html("<?php echo e(\App\CPU\translate('Passwords do not match')); ?>!");
                $("#message").attr("style", "color:red");
            } else if (confirmPassword.length <= 6) {
                $("#message").html("<?php echo e(\App\CPU\translate('password Must Be 6 Character')); ?>");
                $("#message").attr("style", "color:red");
            } else {

                $("#message").html("<?php echo e(\App\CPU\translate('Passwords match')); ?>.");
                $("#message").attr("style", "color:green");
            }

        }

        $(document).ready(function () {
            $("#confirm_password").keyup(checkPasswordMatch);

        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $("#files").change(function () {
            readURL(this);
        });

    </script>
    <script>
        function form_alert(id, message) {
            Swal.fire({
                title: '<?php echo e(\App\CPU\translate('Are you sure')); ?>?',
                text: message,
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'No',
                confirmButtonText: 'Yes',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    $('#' + id).submit()
                }
            })
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.front-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tikka\resources\themes\default/web-views/users-profile/user-account.blade.php ENDPATH**/ ?>