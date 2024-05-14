<!-- Footer -->
<style>
    .social-media :hover {
        color: <?php echo e($web_config['secondary_color']); ?> !important;
    }
    .start_address_under_line{
        <?php echo e(Session::get('direction') === "rtl" ? 'width: 344px;' : 'width: 331px;'); ?>

    }
</style>
<div class="__inline-9 rtl">
    <div class="d-flex justify-content-center text-center <?php echo e(Session::get('direction') === "rtl" ? 'text-md-right' : 'text-md-left'); ?> mt-3"
            style="background: <?php echo e($web_config['primary_color']); ?>10;padding:20px;">
        <div class="col-md-3 d-flex justify-content-center">
            <div >
                <a href="<?php echo e(route('about-us')); ?>">
                    <div class="text-center">
                        <img class="size-60" src="<?php echo e(asset("public/assets/front-end/png/about company.png")); ?>"
                                alt="">
                    </div>
                    <div class="text-center">

                            <p class="m-0">
                                <?php echo e(\App\CPU\translate('About Company')); ?>

                            </p>

                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-3 d-flex justify-content-center">
            <div >
                <a href="<?php echo e(route('contacts')); ?>">
                    <div class="text-center">
                        <img class="size-60" src="<?php echo e(asset("public/assets/front-end/png/contact us.png")); ?>"
                                alt="">
                    </div>
                    <div class="text-center">
                        <p class="m-0">
                        <?php echo e(\App\CPU\translate('Contact Us')); ?>

                    </p>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-3 d-flex justify-content-center">
            <div >
                <a href="<?php echo e(route('helpTopic')); ?>">
                    <div class="text-center">
                        <img class="size-60" src="<?php echo e(asset("public/assets/front-end/png/faq.png")); ?>"
                                alt="">
                    </div>
                    <div class="text-center">
                        <p class="m-0">
                        <?php echo e(\App\CPU\translate('FAQ')); ?>

                    </p>
                    </div>
                </a>
            </div>
        </div>
        
    </div>

    <footer class="page-footer font-small mdb-color rtl">
        <!-- Footer Links -->
        <div class="pt-4" style="background:<?php echo e($web_config['primary_color']); ?>20;">
            <div class="container text-center __pb-13px">

                <!-- Footer links -->
                <div
                    class="row text-center <?php echo e(Session::get('direction') === "rtl" ? 'text-md-right' : 'text-md-left'); ?> mt-3 pb-3 ">
                    <!-- Grid column -->
                    <div class="col-md-3 footer-web-logo" >
                        <a class="d-block" href="<?php echo e(route('home')); ?>">
                            <img class="<?php echo e(Session::get('direction') === "rtl" ? 'rightalign' : ''); ?>" src="<?php echo e(asset("public/storage/company/")); ?>/<?php echo e($web_config['footer_logo']->value); ?>"
                                onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                alt="<?php echo e($web_config['name']->value); ?>"/>
                        </a>

                        <?php if($web_config['ios']['status'] || $web_config['android']['status']): ?>
                            <div class="mt-4 pt-lg-4">
                                <h6 class="text-uppercase font-weight-bold footer-heder align-items-center">
                                    <?php echo e(\App\CPU\translate('download_our_app')); ?>

                                </h6>
                            </div>
                        <?php endif; ?>


                        <div class="store-contents d-flex justify-content-center pr-lg-4" >
                            <?php if($web_config['ios']['status']): ?>
                                <div class="<?php echo e(Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'); ?> mb-2">
                                    <a class="" href="<?php echo e($web_config['ios']['link']); ?>" role="button">
                                        <img class="w-100" src="<?php echo e(asset("public/assets/front-end/png/apple_app.png")); ?>"
                                            alt="">
                                    </a>
                                </div>
                            <?php endif; ?>

                            <?php if($web_config['android']['status']): ?>
                                <div class="<?php echo e(Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'); ?> mb-2">
                                    <a href="<?php echo e($web_config['android']['link']); ?>" role="button">
                                        <img class="w-100" src="<?php echo e(asset("public/assets/front-end/png/google_app.png")); ?>" alt="">
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-9" >
                        <div class="row">

                            <div class="col-md-3 footer-padding-bottom" >
                                <h6 class="text-uppercase mb-4 font-weight-bold footer-heder"><?php echo e(\App\CPU\translate('special')); ?></h6>
                                <ul class="widget-list __pb-10px">
                                    <?php ($flash_deals=\App\Models\FlashDeal::where(['status'=>1,'deal_type'=>'flash_deal'])->whereDate('start_date','<=',date('Y-m-d'))->whereDate('end_date','>=',date('Y-m-d'))->first()); ?>
                                    <?php if(isset($flash_deals)): ?>
                                        <li class="widget-list-item">
                                            <a class="widget-list-link"
                                            href="<?php echo e(route('flash-deals',[$flash_deals['id']])); ?>">
                                                <?php echo e(\App\CPU\translate('flash_deal')); ?>

                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <li class="widget-list-item"><a class="widget-list-link"
                                                                    href="<?php echo e(route('products',['data_from'=>'featured','page'=>1])); ?>"><?php echo e(\App\CPU\translate('featured_products')); ?></a>
                                    </li>
                                    <li class="widget-list-item"><a class="widget-list-link"
                                                                    href="<?php echo e(route('products',['data_from'=>'latest','page'=>1])); ?>"><?php echo e(\App\CPU\translate('latest_products')); ?></a>
                                    </li>
                                    <li class="widget-list-item"><a class="widget-list-link"
                                                                    href="<?php echo e(route('products',['data_from'=>'best-selling','page'=>1])); ?>"><?php echo e(\App\CPU\translate('best_selling_product')); ?></a>
                                    </li>
                                    <li class="widget-list-item"><a class="widget-list-link"
                                                                    href="<?php echo e(route('products',['data_from'=>'top-rated','page'=>1])); ?>"><?php echo e(\App\CPU\translate('top_rated_product')); ?></a>
                                    </li>

                                </ul>
                            </div>
                            <div class="col-md-4 footer-padding-bottom" style="<?php echo e(Session::get('direction') === "rtl" ? 'padding-right:20px;' : ''); ?>">
                                <h6 class="text-uppercase mb-4 font-weight-bold footer-heder"><?php echo e(\App\CPU\translate('account_&_shipping_info')); ?></h6>
                                <?php ($refund_policy = \App\CPU\Helpers::get_business_settings('refund-policy')); ?>
                                <?php ($return_policy = \App\CPU\Helpers::get_business_settings('return-policy')); ?>
                                <?php ($cancellation_policy = \App\CPU\Helpers::get_business_settings('cancellation-policy')); ?>
                                <?php if(auth('customer')->check()): ?>
                                    <ul class="widget-list __pb-10px">
                                        <li class="widget-list-item">
                                            <a class="widget-list-link" href="<?php echo e(route('user-account')); ?>"><?php echo e(\App\CPU\translate('profile_info')); ?></a>
                                        </li>

                                        <li class="widget-list-item">
                                            <a class="widget-list-link" href="<?php echo e(route('track-order.index')); ?>"><?php echo e(\App\CPU\translate('track_order')); ?></a>
                                        </li>

                                        <?php if(isset($refund_policy['status']) && $refund_policy['status'] == 1): ?>
                                        <li class="widget-list-item">
                                            <a class="widget-list-link" href="<?php echo e(route('refund-policy')); ?>"><?php echo e(\App\CPU\translate('refund_policy')); ?></a>
                                        </li>
                                        <?php endif; ?>

                                        <?php if(isset($return_policy['status']) && $return_policy['status'] == 1): ?>
                                        <li class="widget-list-item">
                                            <a class="widget-list-link" href="<?php echo e(route('return-policy')); ?>"><?php echo e(\App\CPU\translate('return_policy')); ?></a>
                                        </li>
                                        <?php endif; ?>

                                        <?php if(isset($cancellation_policy['status']) && $cancellation_policy['status'] == 1): ?>
                                        <li class="widget-list-item">
                                            <a class="widget-list-link" href="<?php echo e(route('cancellation-policy')); ?>"><?php echo e(\App\CPU\translate('cancellation_policy')); ?></a>
                                        </li>
                                        <?php endif; ?>

                                    </ul>
                                <?php else: ?>
                                    <ul class="widget-list __pb-10px">
                                        <li class="widget-list-item">
                                            <a class="widget-list-link" href="<?php echo e(route('customer.auth.login')); ?>"><?php echo e(\App\CPU\translate('profile_info')); ?></a>
                                        </li>
                                        <li class="widget-list-item">
                                            <a class="widget-list-link" href="<?php echo e(route('customer.auth.login')); ?>"><?php echo e(\App\CPU\translate('wish_list')); ?></a>
                                        </li>

                                        <li class="widget-list-item">
                                            <a class="widget-list-link" href="<?php echo e(route('track-order.index')); ?>"><?php echo e(\App\CPU\translate('track_order')); ?></a>
                                        </li>

                                        <?php if(isset($refund_policy['status']) && $refund_policy['status'] == 1): ?>
                                        <li class="widget-list-item">
                                            <a class="widget-list-link" href="<?php echo e(route('refund-policy')); ?>"><?php echo e(\App\CPU\translate('refund_policy')); ?></a>
                                        </li>
                                        <?php endif; ?>

                                        <?php if(isset($return_policy['status']) && $return_policy['status'] == 1): ?>
                                        <li class="widget-list-item">
                                            <a class="widget-list-link" href="<?php echo e(route('return-policy')); ?>"><?php echo e(\App\CPU\translate('return_policy')); ?></a>
                                        </li>
                                        <?php endif; ?>

                                        <?php if(isset($cancellation_policy['status']) && $cancellation_policy['status'] == 1): ?>
                                        <li class="widget-list-item">
                                            <a class="widget-list-link" href="<?php echo e(route('cancellation-policy')); ?>"><?php echo e(\App\CPU\translate('cancellation_policy')); ?></a>
                                        </li>
                                        <?php endif; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-5 footer-padding-bottom" >
                                    <div class="mb-2">
                                        <h6 class="text-uppercase mb-4 font-weight-bold footer-heder"><?php echo e(\App\CPU\translate('NEWS LETTER')); ?></h6>
                                        <span><?php echo e(\App\CPU\translate('subscribe to our new channel to get latest updates')); ?></span>
                                    </div>
                                    <div class="text-nowrap mb-4 position-relative">
                                        <form action="<?php echo e(route('subscription')); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                            <input type="email" name="subscription_email" class="form-control subscribe-border"
                                                placeholder="<?php echo e(\App\CPU\translate('Your Email Address')); ?>" required style="padding: 11px;text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
                                            <button class="subscribe-button btn--primary" type="submit">
                                                <?php echo e(\App\CPU\translate('subscribe')); ?>

                                            </button>
                                        </form>
                                    </div>
                            </div>
                        </div>
                        <div class="row mt-4 <?php echo e(Session::get('direction') === "rtl" ? ' flex-row-reverse' : ''); ?>">
                            <div class="col-md-7">
                                <div class="row d-flex align-items-center mobile-view-center-align  justify-content-center justify-content-md-startr">
                                    <div style="<?php echo e(Session::get('direction') === "rtl" ? 'margin-right:23px;' : ''); ?>">
                                        <span class="mb-4 font-weight-bold footer-heder"><?php echo e(\App\CPU\translate('Start a conversation')); ?></span>
                                    </div>
                                    <div class="flex-grow-1 d-none d-md-block <?php echo e(Session::get('direction') === "rtl" ? 'mr-4 mx-sm-4' : 'mx-sm-4'); ?>">
                                        <hr class="start_address_under_line"/>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-11 start_address ">
                                        <div class="">
                                            <a class="widget-list-link" href="tel: <?php echo e($web_config['phone']->value); ?>">
                                                <span ><i class="fa fa-phone m-2"></i><?php echo e(\App\CPU\Helpers::get_business_settings('company_phone')); ?> </span>
                                            </a>

                                        </div>
                                        <div>
                                            <a class="widget-list-link" href="mailto: <?php echo e(\App\CPU\Helpers::get_business_settings('company_email')); ?>">
                                                <span ><i class="fa fa-envelope m-2"></i> <?php echo e(\App\CPU\Helpers::get_business_settings('company_email')); ?> </span>
                                            </a>
                                        </div>
                                        <div>
                                            <?php if(auth('customer')->check()): ?>
                                                <a class="widget-list-link" href="<?php echo e(route('account-tickets')); ?>">
                                                    <span ><i class="fa fa-user-o m-2"></i> <?php echo e(\App\CPU\translate('Support Ticket')); ?> </span>
                                                </a><br>
                                            <?php else: ?>
                                                <a class="widget-list-link" href="<?php echo e(route('customer.auth.login')); ?>">
                                                    <span ><i class="fa fa-user-o m-2"></i> <?php echo e(\App\CPU\translate('Support Ticket')); ?> </span>
                                                </a><br>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 ">
                                <div class="row pl-2 d-flex align-items-center mobile-view-center-align justify-content-center justify-content-md-start">
                                    <div>
                                        <span class="mb-4 font-weight-bold footer-heder"><?php echo e(\App\CPU\translate('address')); ?></span>
                                    </div>
                                    <div class="flex-grow-1 d-none d-md-block <?php echo e(Session::get('direction') === "rtl" ? 'mr-3 ' : 'ml-3'); ?>">
                                        <hr class="address_under_line"/>
                                    </div>
                                </div>
                                <div class="pl-2">
                                    <span class="__text-14px"><i class="fa fa-map-marker m-2"></i> <?php echo e(\App\CPU\Helpers::get_business_settings('shop_address')); ?> </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer links -->
            </div>
        </div>


        <!-- Grid row -->
        <div style="background: <?php echo e($web_config['primary_color']); ?>10;">
            <div class="container">
                <div class="d-flex flex-wrap end-footer footer-end last-footer-content-align">
                    <div class="mt-3">
                        <p class="<?php echo e(Session::get('direction') === "rtl" ? 'text-right ' : 'text-left'); ?> __text-16px"><?php echo e($web_config['copyright_text']->value); ?></p>
                    </div>
                    <div class="max-sm-100 justify-content-center d-flex flex-wrap mt-md-3 mt-0 mb-md-3 <?php echo e(Session::get('direction') === "rtl" ? 'text-right' : 'text-left'); ?>">
                        <?php if($web_config['social_media']): ?>
                            <?php $__currentLoopData = $web_config['social_media']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span class="social-media ">
                                        <a class="social-btn text-white sb-light sb-<?php echo e($item->name); ?> <?php echo e(Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'); ?> mb-2"
                                        target="_blank" href="<?php echo e($item->link); ?>">
                                            <i class="<?php echo e($item->icon); ?>" aria-hidden="true"></i>
                                        </a>
                                    </span>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                    <div class="d-flex __text-14px">
                        <div class="<?php echo e(Session::get('direction') === "rtl" ? 'ml-3' : 'mr-3'); ?>" >
                            <a class="widget-list-link"
                            href="<?php echo e(route('terms')); ?>"><?php echo e(\App\CPU\translate('terms_&_conditions')); ?></a>
                        </div>
                        <div>
                            <a class="widget-list-link" href="<?php echo e(route('privacy-policy')); ?>">
                                <?php echo e(\App\CPU\translate('privacy_policy')); ?>

                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Grid row -->
        </div>
        <!-- Footer Links -->

        <!-- Cookie Settings -->
        <?php ($cookie = $web_config['cookie_setting'] ? json_decode($web_config['cookie_setting']['value'], true):null); ?>
        <?php if($cookie && $cookie['status']==1): ?>
        <section id="cookie-section"></section>
        <?php endif; ?>
    </footer>
</div>
<?php /**PATH C:\xampp\htdocs\tikka\resources\themes\default/layouts/front-end/partials/_footer.blade.php ENDPATH**/ ?>