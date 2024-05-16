<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <title>
        <?php echo $__env->yieldContent('title'); ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="180x180"
          href="<?php echo e(asset('public/storage/company')); ?>/<?php echo e($web_config['fav_icon']->value); ?>">
    <link rel="icon" type="image/png" sizes="32x32"
          href="<?php echo e(asset('public/storage/company')); ?>/<?php echo e($web_config['fav_icon']->value); ?>">

    <link rel="stylesheet" media="screen"
          href="<?php echo e(asset('public/assets/front-end')); ?>/vendor/simplebar/dist/simplebar.min.css"/>
    <link rel="stylesheet" media="screen"
          href="<?php echo e(asset('public/assets/front-end')); ?>/vendor/tiny-slider/dist/tiny-slider.css"/>
    <link rel="stylesheet" media="screen"
          href="<?php echo e(asset('public/assets/front-end')); ?>/vendor/drift-zoom/dist/drift-basic.min.css"/>
    <link rel="stylesheet" media="screen"
          href="<?php echo e(asset('public/assets/front-end')); ?>/vendor/lightgallery.js/dist/css/lightgallery.min.css"/>
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/back-end')); ?>/css/toastr.css"/>
    <!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet" media="screen" href="<?php echo e(asset('public/assets/front-end')); ?>/css/theme.min.css">
    <link rel="stylesheet" media="screen" href="<?php echo e(asset('public/assets/front-end')); ?>/css/slick.css">
    <link rel="stylesheet" media="screen" href="<?php echo e(asset('public/assets/front-end')); ?>/css/font-awesome.min.css">
    <!--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">-->
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/back-end')); ?>/css/toastr.css"/>
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/front-end')); ?>/css/master.css"/>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Titillium+Web:wght@400;600;700&display=swap"
        rel="stylesheet">
    
    <link rel="stylesheet" href="<?php echo e(asset('public/css/lightbox.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/back-end')); ?>/vendor/icon-set/style.css">
    <?php echo $__env->yieldPushContent('css_or_js'); ?>

    <link rel="stylesheet" href="<?php echo e(asset('public/assets/front-end')); ?>/css/home.css"/>
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/front-end')); ?>/css/responsive1.css"/>


    <link rel="stylesheet" href="<?php echo e(asset('public/assets/front-end')); ?>/css/style.css">
    
    <meta name="_token" content="<?php echo e(csrf_token()); ?>">
    
    <!--to make http ajax request to https-->
    <!--<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">-->
    <style>
        .rtl {
            direction: <?php echo e(Session::get('direction')); ?>;
        }

        .password-toggle-btn .password-toggle-indicator:hover {
            color: <?php echo e($web_config['primary_color']); ?>;
        }

        .password-toggle-btn .custom-control-input:checked ~ .password-toggle-indicator {
            color: <?php echo e($web_config['secondary_color']); ?>;
        }

        .dropdown-item:hover, .dropdown-item:focus {
            color: <?php echo e($web_config['primary_color']); ?>;
        }

        .dropdown-item.active, .dropdown-item:active {
            color: <?php echo e($web_config['secondary_color']); ?>;
        }

        .navbar-light .navbar-tool-icon-box {
            color: <?php echo e($web_config['primary_color']); ?>;
        }

        .search_button {
            background-color: <?php echo e($web_config['primary_color']); ?>;
        }


        .navbar-stuck-menu {
            background-color: <?php echo e($web_config['primary_color']); ?>;
        }

        .mega-nav .nav-item .nav-link {
            color: <?php echo e($web_config['primary_color']); ?>                           !important;
        }
        .checkbox-alphanumeric label:hover {
            border-color: <?php echo e($web_config['primary_color']); ?>;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: <?php echo e($web_config['secondary_color']); ?>        !important;
        }

        [type="radio"] {
            border: 0;
            clip: rect(0 0 0 0);
            height: 1px;
            margin: -1px;
            overflow: hidden;
            padding: 0;
            position: absolute;
            width: 1px;
        }

        [type="radio"] + span:after {
            box-shadow: 0 0 0 0.10em<?php echo e($web_config['secondary_color']); ?>;
        }

        [type="radio"]:checked + span:after {
            background: <?php echo e($web_config['secondary_color']); ?>;
            box-shadow: 0 0 0 0.10em<?php echo e($web_config['secondary_color']); ?>;
        }
        .navbar-tool .navbar-tool-label {
            background-color: <?php echo e($web_config['secondary_color']); ?>!important;
        }

        .btn--primary {
            color: #fff;
            background-color: <?php echo e($web_config['primary_color']); ?>!important;
            border-color: <?php echo e($web_config['primary_color']); ?>!important;
        }

        .btn--primary:hover {
            color: #fff;
            background-color: <?php echo e($web_config['primary_color']); ?>!important;
            border-color: <?php echo e($web_config['primary_color']); ?>!important;
        }

        .btn-secondary {
            background-color: <?php echo e($web_config['secondary_color']); ?>!important;
            border-color: <?php echo e($web_config['secondary_color']); ?>!important;
        }

        .btn-outline-accent:hover {
            color: #fff;
            background-color: <?php echo e($web_config['primary_color']); ?>;
            border-color: <?php echo e($web_config['primary_color']); ?>;
        }

        .btn-outline-accent {
            color: <?php echo e($web_config['primary_color']); ?>;
            border-color: <?php echo e($web_config['primary_color']); ?>;
        }

        .text-accent {
            color: <?php echo e($web_config['primary_color']); ?>;
        }

        a:hover {
            color: <?php echo e($web_config['secondary_color']); ?>;
        }

        .active-menu {
            color: <?php echo e($web_config['secondary_color']); ?>!important;
        }

        .page-item.active > .page-link {
            box-shadow: 0 0.5rem 1.125rem -0.425rem<?php echo e($web_config['primary_color']); ?>



        }

        .page-item.active .page-link {
            background-color: <?php echo e($web_config['primary_color']); ?>;
        }

        .btn-outline-accent:not(:disabled):not(.disabled):active, .btn-outline-accent:not(:disabled):not(.disabled).active, .show > .btn-outline-accent.dropdown-toggle {
            background-color: <?php echo e($web_config['secondary_color']); ?>;
            border-color: <?php echo e($web_config['secondary_color']); ?>;
        }

        .btn-outline-primary {
            color: <?php echo e($web_config['primary_color']); ?>;
            border-color: <?php echo e($web_config['primary_color']); ?>;
        }

        .btn-outline-primary:hover {
            background-color: <?php echo e($web_config['secondary_color']); ?>;
            border-color: <?php echo e($web_config['secondary_color']); ?>;
        }

        .btn-outline-primary:focus, .btn-outline-primary.focus {
            box-shadow: 0 0 0 0<?php echo e($web_config['secondary_color']); ?>;
        }

        .btn-outline-primary:not(:disabled):not(.disabled):active, .btn-outline-primary:not(:disabled):not(.disabled).active, .show > .btn-outline-primary.dropdown-toggle {
            background-color: <?php echo e($web_config['primary_color']); ?>;
            border-color: <?php echo e($web_config['primary_color']); ?>;
        }

        .btn-outline-primary:not(:disabled):not(.disabled):active:focus, .btn-outline-primary:not(:disabled):not(.disabled).active:focus, .show > .btn-outline-primary.dropdown-toggle:focus {
            box-shadow: 0 0 0 0<?php echo e($web_config['primary_color']); ?>;
        }
        .for-discoutn-value {
            background: <?php echo e($web_config['primary_color']); ?>;
        }
        .dropdown-menu {
            margin-<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>: -8px !important;
        }
    </style>

    <?php ($google_tag_manager_id = \App\CPU\Helpers::get_business_settings('google_tag_manager_id')); ?>
    <?php if($google_tag_manager_id ): ?>
    <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','<?php echo e($google_tag_manager_id); ?>');</script>
    <!-- End Google Tag Manager -->

    <?php endif; ?>

    <?php ($pixel_analytices_user_code =\App\CPU\Helpers::get_business_settings('pixel_analytics')); ?>
    <?php if($pixel_analytices_user_code): ?>
        <!-- Facebook Pixel Code -->
            <script>
            !function(f,b,e,v,n,t,s)
            {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '{your-pixel-id-goes-here}');
            fbq('track', 'PageView');
            </script>
            <noscript>
            <img height="1" width="1" style="display:none"
                src="https://www.facebook.com/tr?id={your-pixel-id-goes-here}&ev=PageView&noscript=1"/>
            </noscript>
        <!-- End Facebook Pixel Code -->
    <?php endif; ?>
</head>
<!-- Body-->
<body class="toolbar-enabled">
    <?php if($google_tag_manager_id): ?>
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo e($google_tag_manager_id); ?>"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
    <?php endif; ?>
<!-- Sign in / sign up modal-->
<?php echo $__env->make('layouts.front-end.partials._modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Navbar-->
<!-- Quick View Modal-->
<?php echo $__env->make('layouts.front-end.partials._quick-view-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Navbar Electronics Store-->
<?php echo $__env->make('layouts.front-end.partials._header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Page title-->


    <div class="row">
        <div class="col-12" style="margin-top:10rem;position: fixed;z-index: 9999;">
            <div id="loading" style="display: none;">
               <center>
                <img width="200"
                     src="<?php echo e(asset('public/storage/company')); ?>/<?php echo e(\App\CPU\Helpers::get_business_settings('loader_gif')); ?>"
                     onerror="this.src='<?php echo e(asset('public/assets/front-end/img/loader.gif')); ?>'">
               </center>
            </div>
        </div>
    </div>


<!-- Page Content-->
<?php echo $__env->yieldContent('content'); ?>

<!-- Footer-->
<!-- Footer-->
<?php echo $__env->make('layouts.front-end.partials._footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Toolbar for handheld devices-->

<!-- Back To Top Button-->
<a class="btn-scroll-top btn--primary" href="#top" data-scroll>
    <span class="btn-scroll-top-tooltip text-muted font-size-sm mr-2">Top</span><i
        class="btn-scroll-top-icon czi-arrow-up"> </i>
</a>
<div class="__floating-btn">
    <?php ($whatsapp = \App\CPU\Helpers::get_business_settings('whatsapp')); ?>
    <?php if(isset($whatsapp['status']) && $whatsapp['status'] == 1 ): ?>
        <div class="wa-widget-send-button">
            <a href="https://wa.me/<?php echo e($whatsapp['phone']); ?>?text=Hello%20there!" target="_blank">
                <img src="<?php echo e(asset('public/assets/front-end/img/whatsapp.svg')); ?>" class="wa-messenger-svg-whatsapp wh-svg-icon" alt="Chat with us on WhatsApp">
            </a>
        </div>
    <?php endif; ?>






    <!-- Vendor scrits: js libraries and plugins-->
</div>


<script src="<?php echo e(asset('public/assets/front-end')); ?>/vendor/jquery/dist/jquery-2.2.4.min.js"></script>
<script src="<?php echo e(asset('public/assets/front-end')); ?>/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script
    src="<?php echo e(asset('public/assets/front-end')); ?>/vendor/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
<script src="<?php echo e(asset('public/assets/front-end')); ?>/vendor/simplebar/dist/simplebar.min.js"></script>
<script src="<?php echo e(asset('public/assets/front-end')); ?>/vendor/tiny-slider/dist/min/tiny-slider.js"></script>
<script src="<?php echo e(asset('public/assets/front-end')); ?>/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>


<script src="<?php echo e(asset('public/js/lightbox.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/assets/front-end')); ?>/vendor/drift-zoom/dist/Drift.min.js"></script>
<script src="<?php echo e(asset('public/assets/front-end')); ?>/vendor/lightgallery.js/dist/js/lightgallery.min.js"></script>
<script src="<?php echo e(asset('public/assets/front-end')); ?>/vendor/lg-video.js/dist/lg-video.min.js"></script>

<script src=<?php echo e(asset("public/assets/back-end/js/toastr.js")); ?>></script>
<!-- Main theme script-->
<script src="<?php echo e(asset('public/assets/front-end')); ?>/js/theme.min.js"></script>
<script src="<?php echo e(asset('public/assets/front-end')); ?>/js/slick.min.js"></script>

<script src="<?php echo e(asset('public/assets/front-end')); ?>/js/sweet_alert.js"></script>

<script src=<?php echo e(asset("public/assets/back-end/js/toastr.js")); ?>></script>
<?php echo Toastr::message(); ?>


<script>
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-bottom-left",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
</script>

<script>
    function addWishlist(product_id) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $.ajax({
            url: "<?php echo e(route('store-wishlist')); ?>",
            method: 'POST',
            data: {
                product_id: product_id
            },
            success: function (data) {
                if (data.value == 1) {
                    Swal.fire({
                        position: 'top-end',
                        type: 'success',
                        title: data.success,
                        showConfirmButton: false,
                        timer: 1500
                    });
                    $('.countWishlist').html(data.count);
                    $('.countWishlist-' + product_id).text(data.product_count);
                    $('.tooltip').html('');
                    $(`#wishlist_icon_${product_id}`).attr('class','fa fa-heart');
                } else if (data.value == 2) {
                    Swal.fire({
                        type: 'info',
                        title: 'WishList',
                        text: data.error
                    });
                    $('.countWishlist').html(data.count);
                    $('.countWishlist-' + product_id).text(data.product_count);
                    $(`#wishlist_icon_${product_id}`).attr('class','fa fa-heart-o');
                } else {
                    Swal.fire({
                        type: 'error',
                        title: 'WishList',
                        text: data.error
                    });
                }
            }
        });
    }

    function removeWishlist(product_id) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $.ajax({
            url: "<?php echo e(route('delete-wishlist')); ?>",
            method: 'POST',
            data: {
                id: product_id
            },
            beforeSend: function () {
                $('#loading').show();
            },
            success: function (data) {
                Swal.fire({
                    type: 'success',
                    title: 'WishList',
                    text: data.success
                });
                $('.countWishlist').html(data.count);
                $('#set-wish-list').html(data.wishlist);
                $('.tooltip').html('');
            },
            complete: function () {
                $('#loading').hide();
            },
        });
    }

    function quickView(product_id) {
        $.get({
            url: '<?php echo e(route('quick-view')); ?>',
            dataType: 'json',
            data: {
                product_id: product_id
            },
            beforeSend: function () {
                $('#loading').show();
            },
            success: function (data) {
                console.log("success...")
                $('#quick-view').modal('show');
                $('#quick-view-modal').empty().html(data.view);
            },
            complete: function () {
                $('#loading').hide();
            },
        });
    }

    function addToCart(form_id = 'add-to-cart-form', redirect_to_checkout=false) {
        if (checkAddToCartValidity()) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.post({
                url: '<?php echo e(route('cart.add')); ?>',
                data: $('#' + form_id).serializeArray(),
                beforeSend: function () {
                    $('#loading').show();
                },
                success: function (response) {
                    console.log(response);
                    if (response.status == 1) {
                        updateNavCart();
                        toastr.success(response.message, {
                            CloseButton: true,
                            ProgressBar: true
                        });
                        $('.call-when-done').click();
                        if(redirect_to_checkout)
                        {
                            location.href = "<?php echo e(route('checkout-details')); ?>";
                        }
                        return false;
                    } else if (response.status == 0) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Cart',
                            text: response.message
                        });
                        return false;
                    }
                },
                complete: function () {
                    $('#loading').hide();

                }
            });
        } else {
            Swal.fire({
                type: 'info',
                title: 'Cart',
                text: '<?php echo e(\App\CPU\translate('please_choose_all_the_options')); ?>'
            });
        }
    }

    function buy_now() {
        addToCart('add-to-cart-form',true);
        /* location.href = "<?php echo e(route('checkout-details')); ?>"; */
    }

    function currency_change(currency_code) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: '<?php echo e(route('currency.change')); ?>',
            data: {
                currency_code: currency_code
            },
            success: function (data) {
                toastr.success('<?php echo e(\App\CPU\translate('Currency changed to')); ?>' + data.name);
                location.reload();
            }
        });
    }

    function removeFromCart(key) {
        $.post('<?php echo e(route('cart.remove')); ?>', {_token: '<?php echo e(csrf_token()); ?>', key: key}, function (response) {
            $('#cod-for-cart').hide();
            updateNavCart();
            $('#cart-summary').empty().html(response.data);
            toastr.info('<?php echo e(\App\CPU\translate('Item has been removed from cart')); ?>', {
                CloseButton: true,
                ProgressBar: true
            });
            let segment_array = window.location.pathname.split('/');
            let segment = segment_array[segment_array.length - 1];
            if(segment === 'checkout-payment' || segment === 'checkout-details'){
                location.reload();
            }
        });
    }

    function updateNavCart() {
        $.post('<?php echo e(route('cart.nav-cart')); ?>', {_token: '<?php echo e(csrf_token()); ?>'}, function (response) {
            $('#cart_items').html(response.data);
        });
    }

    function cartQuantityInitialize() {
        $('.btn-number').click(function (e) {
            e.preventDefault();

            fieldName = $(this).attr('data-field');
            type = $(this).attr('data-type');
            productType = $(this).attr('product-type');
            var input = $("input[name='" + fieldName + "']");
            var currentVal = parseInt(input.val());

            if (!isNaN(currentVal)) {
                console.log(productType)
                if (type == 'minus') {

                    if (currentVal > input.attr('min')) {
                        input.val(currentVal - 1).change();
                    }
                    if (parseInt(input.val()) == input.attr('min')) {
                        $(this).attr('disabled', true);
                    }

                } else if (type == 'plus') {

                    if (currentVal < input.attr('max') || (productType === 'digital')) {
                        input.val(currentVal + 1).change();
                    }

                    if ((parseInt(input.val()) == input.attr('max')) && (productType === 'physical')) {
                        $(this).attr('disabled', true);
                    }

                }
            } else {
                input.val(0);
            }
        });

        $('.input-number').focusin(function () {
            $(this).data('oldValue', $(this).val());
        });

        $('.input-number').change(function () {
            productType = $(this).attr('product-type');
            minValue = parseInt($(this).attr('min'));
            maxValue = parseInt($(this).attr('max'));
            valueCurrent = parseInt($(this).val());

            var name = $(this).attr('name');
            if (valueCurrent >= minValue) {
                $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Cart',
                    text: '<?php echo e(\App\CPU\translate('Sorry, the minimum order quantity does not match')); ?>'
                });
                $(this).val($(this).data('oldValue'));
            }
            if (productType === 'digital' || valueCurrent <= maxValue) {
                $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Cart',
                    text: '<?php echo e(\App\CPU\translate('Sorry, stock limit exceeded')); ?>.'
                });
                $(this).val($(this).data('oldValue'));
            }


        });
        $(".input-number").keydown(function (e) {
            // Allow: backspace, delete, tab, escape, enter and .
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
                // Allow: Ctrl+A
                (e.keyCode == 65 && e.ctrlKey === true) ||
                // Allow: home, end, left, right
                (e.keyCode >= 35 && e.keyCode <= 39)) {
                // let it happen, don't do anything
                return;
            }
            // Ensure that it is a number and stop the keypress
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        });
    }

    function updateQuantity(key, element) {
        $.post('<?php echo e(route('cart.updateQuantity')); ?>', {
            _token: '<?php echo e(csrf_token()); ?>',
            key: key,
            quantity: element.value
        }, function (data) {
            updateNavCart();
            $('#cart-summary').empty().html(data);
        });
    }

    function updateCartQuantity(minimum_order_qty, key) {
        /* var quantity = $("#cartQuantity" + key).children("option:selected").val(); */
        var quantity = $("#cartQuantity" + key).val();
        if(minimum_order_qty > quantity ) {
            toastr.error('<?php echo e(\App\CPU\translate("minimum_order_quantity_cannot_be_less_than_")); ?>' + minimum_order_qty);
            $("#cartQuantity" + key).val(minimum_order_qty);
            return false;
        }

        $.post('<?php echo e(route('cart.updateQuantity')); ?>', {
            _token: '<?php echo e(csrf_token()); ?>',
            key: key,
            quantity: quantity
        }, function (response) {
            if (response.status == 0) {
                toastr.error(response.message, {
                    CloseButton: true,
                    ProgressBar: true
                });
                $("#cartQuantity" + key).val(response['qty']);
            } else {
                updateNavCart();
                $('#cart-summary').empty().html(response);
            }
        });
    }

    $('#add-to-cart-form input').on('change', function () {
        getVariantPrice();
    });

    function getVariantPrice() {
        if ($('#add-to-cart-form input[name=quantity]').val() > 0 && checkAddToCartValidity()) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: '<?php echo e(route('cart.variant_price')); ?>',
                data: $('#add-to-cart-form').serializeArray(),
                success: function (data) {
                    $('#add-to-cart-form #chosen_price_div').removeClass('d-none');
                    $('#add-to-cart-form #chosen_price_div #chosen_price').html(data.price);
                    $('#set-tax-amount').html(data.tax);
                    $('#set-discount-amount').html(data.discount);
                    $('#available-quantity').html(data.quantity);
                    $('.cart-qty-field').attr('max', data.quantity);
                }
            });
        }
    }

    function checkAddToCartValidity() {
        var names = {};
        $('#add-to-cart-form input:radio').each(function () { // find unique names
            names[$(this).attr('name')] = true;
        });
        var count = 0;
        $.each(names, function () { // then count them
            count++;
        });
        if ($('input:radio:checked').length == count) {
            return true;
        }
        return false;
    }

    <?php if(Request::is('/') &&  \Illuminate\Support\Facades\Cookie::has('popup_banner')==false): ?>
    $(document).ready(function () {
        $('#popup-modal').appendTo("body").modal('show');
    });
    <?php (\Illuminate\Support\Facades\Cookie::queue('popup_banner', 'off', 1)); ?>
    <?php endif; ?>

    $(".clickable").click(function () {
        window.location = $(this).find("a").attr("href");
        return false;
    });
</script>

<?php if($errors->any()): ?>
    <script>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        toastr.error('<?php echo e($error); ?>', Error, {
            CloseButton: true,
            ProgressBar: true
        });
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </script>
<?php endif; ?>

<script>
    function couponCode() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: '<?php echo e(route('coupon.apply')); ?>',
            data: $('#coupon-code-ajax').serializeArray(),
            success: function (data) {
                /* console.log(data);
                return false; */
                if (data.status == 1) {
                    let ms = data.messages;
                    ms.forEach(
                        function (m, index) {
                            toastr.success(m, index, {
                                CloseButton: true,
                                ProgressBar: true
                            });
                        }
                    );
                } else {
                    let ms = data.messages;
                    ms.forEach(
                        function (m, index) {
                            toastr.error(m, index, {
                                CloseButton: true,
                                ProgressBar: true
                            });
                        }
                    );
                }
                setInterval(function () {
                    location.reload();
                }, 2000);
            }
        });
    }

    jQuery(".search-bar-input").keyup(function () {
        $(".search-card").css("display", "block");
        let name = $(".search-bar-input").val();
        if (name.length > 0) {
            $.get({
                url: '<?php echo e(url('/')); ?>/searched-products',
                dataType: 'json',
                data: {
                    name: name
                },
                beforeSend: function () {
                    $('#loading').show();
                },
                success: function (data) {
                    $('.search-result-box').empty().html(data.result)
                },
                complete: function () {
                    $('#loading').hide();
                },
            });
        } else {
            $('.search-result-box').empty();
        }
    });

    jQuery(".search-bar-input-mobile").keyup(function () {
        $(".search-card").css("display", "block");
        let name = $(".search-bar-input-mobile").val();
        if (name.length > 0) {
            $.get({
                url: '<?php echo e(url('/')); ?>/searched-products',
                dataType: 'json',
                data: {
                    name: name
                },
                beforeSend: function () {
                    $('#loading').show();
                },
                success: function (data) {
                    $('.search-result-box').empty().html(data.result)
                },
                complete: function () {
                    $('#loading').hide();
                },
            });
        } else {
            $('.search-result-box').empty();
        }
    });

    jQuery(document).mouseup(function (e) {
        var container = $(".search-card");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            container.hide();
        }
    });

    const img = document.getElementByTagName("img")
    img.addEventListener("error", function (event) {
        event.target.src = '<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>';
        event.onerror = null
    })

    function route_alert(route, message) {
        Swal.fire({
            title: '<?php echo e(\App\CPU\translate('Are you sure')); ?>?',
            text: message,
            type: 'warning',
            showCancelButton: true,
            cancelButtonColor: 'default',
            confirmButtonColor: '<?php echo e($web_config['primary_color']); ?>',
            cancelButtonText: '<?php echo e(\App\CPU\translate('No')); ?>',
            confirmButtonText: '<?php echo e(\App\CPU\translate('Yes')); ?>',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                location.href = route;
            }
        })
    }
</script>
<script>
    $('.filter-show-btn').on('click', function(){
        $('#shop-sidebar').toggleClass('show')
    })
</script>

<script>
    <?php ($cookie = $web_config['cookie_setting'] ? json_decode($web_config['cookie_setting']['value'], true):null); ?>
    let cookie_content = `
        <div class="cookie-section">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-between column-gap-4 row-gap-3">
                    <div class="text-wrapper">
                        <h5 class="title"><?php echo e(\App\CPU\translate('Your_Privacy_Matter')); ?></h5>
                        <div><?php echo e($cookie ? $cookie['cookie_text'] : ''); ?></div>
                    </div>
                    <div class="btn-wrapper">
                        <span class="text-white cursor-pointer" id="cookie-reject"><?php echo e(\App\CPU\translate('no')); ?>, <?php echo e(\App\CPU\translate('thanks')); ?></span>
                        <button class="btn btn-success cookie-accept" id="cookie-accept"><?php echo e(\App\CPU\translate('yes')); ?>, <?php echo e(\App\CPU\translate('i_Accept')); ?></button>
                    </div>
                </div>
            </div>
        </div>
    `;
    $(document).on('click','#cookie-accept',function() {
        document.cookie = '6valley_cookie_consent=accepted; max-age=' + 60 * 60 * 24 * 30;
        $('#cookie-section').hide();
    });
    $(document).on('click','#cookie-reject',function() {
        document.cookie = '6valley_cookie_consent=reject; max-age=' + 60 * 60 * 24;
        $('#cookie-section').hide();
    });

    $(document).ready(function() {
        if (document.cookie.indexOf("6valley_cookie_consent=accepted") !== -1) {
            $('#cookie-section').hide();
        }else{
            $('#cookie-section').html(cookie_content).show();
        }
    });
</script>
<?php echo $__env->yieldPushContent('script'); ?>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\tikka\resources\themes\default/layouts/front-end/app.blade.php ENDPATH**/ ?>