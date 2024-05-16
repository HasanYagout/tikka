<?php $__env->startSection('title', \App\CPU\translate('Coupon Edit')); ?>
<?php $__env->startPush('css_or_js'); ?>
    <link href="<?php echo e(asset('select2/css/select2.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('public/assets/back-end/css/custom.css')); ?>" rel="stylesheet">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="content container-fluid">
    <!-- Page Title -->
    <div class="mb-3">
        <h2 class="h1 mb-0 text-capitalize">
            <img src="<?php echo e(asset('public/assets/back-end/img/coupon_setup.png')); ?>" class="mb-1 mr-1" alt="">
            <?php echo e(\App\CPU\translate('coupon_update')); ?>

        </h2>
    </div>
    <!-- End Page Title -->

    <!-- Content Row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    <form action="<?php echo e(route('admin.coupon.update',[$c['id']])); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-6 col-lg-4 form-group">
                                <label for="name" class="title-color text-capitalize"><?php echo e(\App\CPU\translate('coupon_type')); ?></label>
                                <select class="form-control" id="coupon_type" name="coupon_type" required>
                                    <option disabled selected><?php echo e(\App\CPU\translate('Select Coupon Type')); ?></option>
                                    <option value="discount_on_purchase" <?php echo e($c['coupon_type']=='discount_on_purchase'?'selected':''); ?>><?php echo e(\App\CPU\translate('Discount on Purchase')); ?></option>
                                    <option value="free_delivery" <?php echo e($c['coupon_type']=='free_delivery'?'selected':''); ?>><?php echo e(\App\CPU\translate('Free_Delivery')); ?></option>
                                    <option value="first_order" <?php echo e($c['coupon_type']=='first_order'?'selected':''); ?>><?php echo e(\App\CPU\translate('First_Order')); ?></option>
                                </select>
                            </div>
                            <div class="col-md-6 col-lg-4 form-group">
                                <label for="name" class="title-color text-capitalize"><?php echo e(\App\CPU\translate('coupon_title')); ?></label>
                                <input type="text" name="title" class="form-control" id="title" value="<?php echo e($c['title']); ?>"
                                       placeholder="<?php echo e(\App\CPU\translate('Title')); ?>" required>
                            </div>
                            <div class="col-md-6 col-lg-4 form-group">
                                <label for="name" class="title-color text-capitalize"><?php echo e(\App\CPU\translate('coupon_code')); ?></label>
                                <a href="javascript:void(0)" class="float-right" onclick="generateCode()"><?php echo e(\App\CPU\translate('generate_code')); ?></a>
                                <input type="text" name="code" value="<?php echo e($c['code']); ?>"
                                       class="form-control" id="code"
                                       placeholder="<?php echo e(\App\CPU\translate('Ex')); ?>: EID100" required>
                            </div>
                            <div class="col-md-6 col-lg-4 form-group first_order">
                                <label for="name" class="title-color font-weight-medium d-flex"><?php echo e(\App\CPU\translate('coupon_bearer')); ?></label>
                                <select class="form-control" name="coupon_bearer" id="coupon_bearer" >
                                    <option disabled selected><?php echo e(\App\CPU\translate('Select_coupon_bearer')); ?></option>
                                    <option value="seller" <?php echo e($c['coupon_bearer']=='seller'?'selected':''); ?>><?php echo e(\App\CPU\translate('seller')); ?></option>
                                    <option value="inhouse" <?php echo e($c['coupon_bearer']=='inhouse'?'selected':''); ?>><?php echo e(\App\CPU\translate('admin')); ?></option>
                                </select>
                            </div>
                            <div class="col-md-6 col-lg-4 form-group coupon_by first_order">
                                <label for="name" class="title-color font-weight-medium d-flex"><?php echo e(\App\CPU\translate('seller')); ?></label>
                                <select class="js-example-basic-multiple js-states js-example-responsive form-control" name="seller_id" id="seller_wise_coupon">
                                    <option disabled selected><?php echo e(\App\CPU\translate('select_seller')); ?></option>
                                    <option value="0" <?php echo e($c['seller_id']=='0'?'selected':''); ?>><?php echo e(\App\CPU\translate('all_seller')); ?></option>
                                    <?php if($c['coupon_bearer'] == 'inhouse'): ?>
                                    <option value="inhouse" <?php echo e(is_null($c['seller_id'])?'selected':''); ?>><?php echo e(\App\CPU\translate('inhouse')); ?></option>
                                    <?php endif; ?>
                                    <?php $__currentLoopData = $sellers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($seller->id); ?>" <?php echo e($c['seller_id']==$seller->id?'selected':''); ?>><?php echo e($seller->shop->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-6 col-lg-4 form-group coupon_type first_order">
                                <label for="name" class="title-color font-weight-medium d-flex"><?php echo e(\App\CPU\translate('customer')); ?></label>
                                <select class="js-example-basic-multiple js-states js-example-responsive form-control" name="customer_id" >
                                    <option disabled selected><?php echo e(\App\CPU\translate('Select_customer')); ?></option>
                                    <option value="0" <?php echo e($c['customer_id']=='0'?'selected':''); ?>><?php echo e(\App\CPU\translate('all_customer')); ?></option>
                                    <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($customer->id); ?>" <?php echo e($c['customer_id']==$customer->id ? 'selected':''); ?>><?php echo e($customer->f_name. ' '. $customer->l_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-6 col-lg-4 form-group first_order">
                                <label  for="exampleFormControlInput1" class="title-color text-capitalize"><?php echo e(\App\CPU\translate('limit')); ?> <?php echo e(\App\CPU\translate('for')); ?> <?php echo e(\App\CPU\translate('same')); ?> <?php echo e(\App\CPU\translate('user')); ?></label>
                                <input type="number" name="limit" min="0" value="<?php echo e($c['limit']); ?>" id="coupon_limit" class="form-control" placeholder="<?php echo e(\App\CPU\translate('EX')); ?>: 10">
                            </div>
                            <div class="col-md-6 col-lg-4 form-group free_delivery">
                                <label  for="name" class="title-color text-capitalize"><?php echo e(\App\CPU\translate('discount_type')); ?></label>
                                <select id="discount_type" class="form-control" name="discount_type"
                                        onchange="checkDiscountType(this.value)">
                                    <option value="amount" <?php echo e($c['discount_type']=='amount'?'selected':''); ?>><?php echo e(\App\CPU\translate('Amount')); ?></option>
                                    <option value="percentage" <?php echo e($c['discount_type']=='percentage'?'selected':''); ?>><?php echo e(\App\CPU\translate('percentage')); ?></option>
                                </select>
                            </div>
                            <div class="col-md-6 col-lg-4 form-group free_delivery">
                                <label for="name" class="title-color text-capitalize"><?php echo e(\App\CPU\translate('Discount_Amount')); ?> <span id="discount_percent"> (%)</span></label>
                                <input type="number" min="0" max="1000000" step=".01" name="discount" class="form-control" id="discount" value="<?php echo e($c['discount_type']=='amount'?\App\CPU\Convert::default($c['discount']):$c['discount']); ?>"
                                    placeholder="<?php echo e(\App\CPU\translate('Ex: 500')); ?>" required>
                            </div>
                            <div class="col-md-6 col-lg-4 form-group">
                                <label for="name" class="title-color text-capitalize"><?php echo e(\App\CPU\translate('minimum_purchase')); ?></label>
                                <input type="number" min="0" max="1000000" step=".01" name="min_purchase" class="form-control" id="minimum purchase" value="<?php echo e(\App\CPU\Convert::default($c['min_purchase'])); ?>"
                                       placeholder="<?php echo e(\App\CPU\translate('minimum purchase')); ?>" required>
                            </div>
                            <div class="col-md-6 col-lg-4 form-group free_delivery" id="max-discount">
                                <label for="name" class="title-color text-capitalize"><?php echo e(\App\CPU\translate('maximum_discount')); ?></label>
                                <input type="number" min="0" max="1000000" step=".01" name="max_discount" class="form-control" id="maximum discount" value="<?php echo e(\App\CPU\Convert::default($c['max_discount'])); ?>"
                                       placeholder="<?php echo e(\App\CPU\translate('maximum discount')); ?>">
                            </div>
                            <div class="col-md-6 col-lg-4 form-group">
                                <label for="name" class="title-color text-capitalize"><?php echo e(\App\CPU\translate('start_date')); ?></label>
                                <input type="date" name="start_date" class="form-control" id="start_date" value="<?php echo e(date('Y-m-d',strtotime($c['start_date']))); ?>"
                                       placeholder="<?php echo e(\App\CPU\translate('start date')); ?>" required>
                            </div>
                            <div class="col-md-6 col-lg-4 form-group">
                                <label for="name" class="title-color text-capitalize"><?php echo e(\App\CPU\translate('expire_date')); ?></label>
                                <input type="date" name="expire_date" class="form-control" id="expire_date" value="<?php echo e(date('Y-m-d',strtotime($c['expire_date']))); ?>"
                                       placeholder="<?php echo e(\App\CPU\translate('expire date')); ?>" required>
                            </div>
                        </div>

                        <div class="d-flex align-items-center justify-content-end flex-wrap gap-10">
                            <button type="reset" class="btn btn-secondary px-4"><?php echo e(\App\CPU\translate('reset')); ?></button>
                            <button type="submit" class="btn btn--primary px-4"><?php echo e(\App\CPU\translate('Update')); ?></button>
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
        $(document).ready(function() {
            let discount_type = $('#discount_type').val();
            if (discount_type == 'amount') {
                $('#discount_percent').hide();
                $('#max-discount').hide()
            } else if (discount_type == 'percentage') {
                $('#max-discount').show()
            }
            $('#start_date').attr('min',(new Date()).toISOString().split('T')[0]);
            $('#expire_date').attr('min',(new Date()).toISOString().split('T')[0]);

            field_show_hide();
        });

        $("#start_date").on("change", function () {
            $('#expire_date').attr('min',$(this).val());
        });

        $("#expire_date").on("change", function () {
            $('#start_date').attr('max',$(this).val());
        });


        function checkDiscountType(val) {
            if (val == 'amount') {
                $('#max-discount').hide()
            } else if (val == 'percentage') {
                $('#max-discount').show()
            }
        }

        function  generateCode(){
            let code = Math.random().toString(36).substring(2,12);
            $('#code').val(code)
        }

    </script>
    <script src="<?php echo e(asset('public/assets/back-end')); ?>/js/select2.min.js"></script>
    <script>
        $(".js-example-theme-single").select2({
            theme: "classic"
        });

        $(".js-example-responsive").select2({
            width: 'resolve'
        });
    </script>

    <script>
        $('#coupon_bearer').on('change', function (){
            let coupon_bearer = $('#coupon_bearer').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: '<?php echo e(route('admin.coupon.ajax-get-seller')); ?>',
                data: {
                    coupon_bearer: coupon_bearer
                },
                success: function (result) {
                    $("#seller_wise_coupon").html(result);
                }
            });
        });

        $('#discount_type').on('change', function (){
            let type = $('#discount_type').val();
            if(type === 'amount'){
                $('#discount').attr({
                    'placeholder': 'Ex: 500',
                    "max":"1000000"
                });
                $('#discount_percent').hide();
            }else if(type === 'percentage'){
                $('#discount').attr({
                    "max":"100",
                    "placeholder":"Ex: 10%"
                });
                $('#discount_percent').show();
            }
        });

        $('#coupon_type').on('change', function (){
            field_show_hide();
        });

        function field_show_hide(){
            let discount_type = $('#discount_type').val();
            let type = $('#coupon_type').val();

            if(type === 'free_delivery'){
                if (discount_type === 'amount') {
                    $('.first_order').show();
                    $('.free_delivery').hide();
                } else if (discount_type === 'percentage') {
                    $('.first_order').show();
                    $('.free_delivery').hide();
                }
            }else if(type === 'first_order'){
                if (discount_type === 'amount') {
                    $('.free_delivery').show();
                    $('.first_order').hide();
                    $('#max-discount').hide()
                } else if (discount_type === 'percentage') {
                    $('.free_delivery').show();
                    $('.first_order').hide();
                    $('#max-discount').show()
                }
            }else{
                if (discount_type === 'amount') {
                    $('.first_order').show();
                    $('.free_delivery').show();
                    $('#max-discount').hide()
                } else if (discount_type === 'percentage') {
                    $('.first_order').show();
                    $('.free_delivery').show();
                    $('#max-discount').show()
                }
            }
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tikka\resources\views/admin/coupon/edit.blade.php ENDPATH**/ ?>