<style>
    .for-count-value {
        color: <?php echo e($web_config['primary_color']); ?>;
    }

    .count-value {
        color: <?php echo e($web_config['primary_color']); ?>;
    }

    @media (min-width: 768px) {
        .navbar-stuck-menu {
            background-color: <?php echo e($web_config['primary_color']); ?>;
        }

    }

    @media (max-width: 767px) {
        .search_button .input-group-text i {
            color: <?php echo e($web_config['primary_color']); ?>                              !important;
        }
        .navbar-expand-md .dropdown-menu > .dropdown > .dropdown-toggle {
            padding- <?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>: 1.95rem;
        }

        .mega-nav1 {
            color: <?php echo e($web_config['primary_color']); ?>                              !important;
        }

        .mega-nav1 .nav-link {
            color: <?php echo e($web_config['primary_color']); ?>                              !important;
        }
    }

    @media (max-width: 471px) {
        .mega-nav1 {
            color: <?php echo e($web_config['primary_color']); ?>                              !important;
        }
        .mega-nav1 .nav-link {
            color: <?php echo e($web_config['primary_color']); ?> !important;
        }
    }
</style>
<?php ($announcement=\App\CPU\Helpers::get_business_settings('announcement')); ?>
<?php if(isset($announcement) && $announcement['status']==1): ?>
    <div class="text-center position-relative px-4 py-1" id="anouncement" style="background-color: <?php echo e($announcement['color']); ?>;color:<?php echo e($announcement['text_color']); ?>">
        <span><?php echo e($announcement['announcement']); ?> </span>
        <span class="__close-anouncement" onclick="myFunction()">X</span>
    </div>
<?php endif; ?>


<header class="box-shadow-sm rtl __inline-10">
    <!-- Topbar-->
    <div class="topbar">
        <div class="container">

            <div>
                <div class="topbar-text dropdown d-md-none <?php echo e(Session::get('direction') === "rtl" ? 'mr-auto' : 'ml-auto'); ?>">
                    <a class="topbar-link" href="tel: <?php echo e($web_config['phone']->value); ?>">
                        <i class="fa fa-phone"></i> <?php echo e($web_config['phone']->value); ?>

                    </a>
                </div>
                <div class="d-none d-md-block <?php echo e(Session::get('direction') === "rtl" ? 'mr-2' : 'mr-2'); ?> text-nowrap">
                    <a class="topbar-link d-none d-md-inline-block" href="tel:<?php echo e($web_config['phone']->value); ?>">
                        <i class="fa fa-phone"></i> <?php echo e($web_config['phone']->value); ?>

                    </a>
                </div>
            </div>

            <div>
                <?php ($currency_model = \App\CPU\Helpers::get_business_settings('currency_model')); ?>
                <?php if($currency_model=='multi_currency'): ?>
                    <div class="topbar-text dropdown disable-autohide <?php echo e(Session::get('direction') === "rtl" ? 'mr-4' : 'mr-4'); ?>">
                        <a class="topbar-link dropdown-toggle" href="#" data-toggle="dropdown">
                            <span><?php echo e(session('currency_code')); ?> <?php echo e(session('currency_symbol')); ?></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>"
                            style="min-width: 160px!important;text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
                            <?php $__currentLoopData = \App\Models\Currency::where('status', 1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="dropdown-item cursor-pointer"
                                    onclick="currency_change('<?php echo e($currency['code']); ?>')">
                                    <?php echo e($currency->name); ?>

                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <?php ( $local = \App\CPU\Helpers::default_lang()); ?>
                <div
                    class="topbar-text dropdown disable-autohide  __language-bar text-capitalize">
                    <a class="topbar-link dropdown-toggle" href="#" data-toggle="dropdown">
                        <?php $__currentLoopData = json_decode($language['value'],true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($data['code']==$local): ?>
                                <img class="<?php echo e(Session::get('direction') === "rtl" ? 'mr-2' : 'mr-2'); ?>" width="20"
                                     src="<?php echo e(asset('public/assets/front-end')); ?>/img/flags/<?php echo e($data['code']); ?>.png"
                                     alt="Eng">
                                <?php echo e($data['name']); ?>

                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>"
                        style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
                        <?php $__currentLoopData = json_decode($language['value'],true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($data['status']==1): ?>
                                <li>
                                    <a class="dropdown-item pb-1" href="<?php echo e(route('lang',[$data['code']])); ?>">
                                        <img class="<?php echo e(Session::get('direction') === "rtl" ? 'mr-2' : 'mr-2'); ?>"
                                             width="20"
                                             src="<?php echo e(asset('public/assets/front-end')); ?>/img/flags/<?php echo e($data['code']); ?>.png"
                                             alt="<?php echo e($data['name']); ?>"/>
                                        <span style="text-transform: capitalize"><?php echo e($data['name']); ?></span>
                                    </a>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="navbar-sticky bg-light mobile-head">
        <div class="navbar navbar-expand-md navbar-light">
            <div class="container ">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand d-none d-sm-block <?php echo e(Session::get('direction') === "rtl" ? 'mr-3' : 'mr-3'); ?> flex-shrink-0 __min-w-7rem" href="<?php echo e(route('home')); ?>">
                    <img class="__inline-11"
                         src="<?php echo e(asset("storage/app/public/company")."/".$web_config['web_logo']->value); ?>"
                         onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                         alt="<?php echo e($web_config['name']->value); ?>"/>
                </a>
                <a class="navbar-brand d-sm-none <?php echo e(Session::get('direction') === "rtl" ? 'mr-2' : 'mr-2'); ?>"
                   href="<?php echo e(route('home')); ?>">
                    <img class="mobile-logo-img __inline-12"
                         src="<?php echo e(asset("storage/app/public/company")."/".$web_config['mob_logo']->value); ?>"
                         onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                         alt="<?php echo e($web_config['name']->value); ?>"/>
                </a>
                <!-- Search-->
                <div class="input-group-overlay d-none d-md-block mx-4"
                     style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>">
                    <form action="<?php echo e(route('products')); ?>" type="submit" class="search_form">
                        <input class="form-control appended-form-control search-bar-input" type="text"
                               autocomplete="off"
                               placeholder="<?php echo e(\App\CPU\translate('Search here ...')); ?>"
                               name="name">
                        <button class="input-group-append-overlay search_button" type="submit"
                                style="border-radius: <?php echo e(Session::get('direction') === "rtl" ? '7px 0px 0px 7px; right: unset; left: 0' : '0px 7px 7px 0px; left: unset; right: 0'); ?>;top:0">
                                <span class="input-group-text __text-20px">
                                    <i class="czi-search text-white"></i>
                                </span>
                        </button>
                        <input name="data_from" value="search" hidden>
                        <input name="page" value="1" hidden>
                        <diV class="card search-card __inline-13">
                            <div class="card-body search-result-box __h-400px overflow-x-hidden overflow-y-auto"></div>
                        </diV>
                    </form>
                </div>
                <!-- Toolbar-->
                <div class="navbar-toolbar d-flex flex-shrink-0 align-items-center">
                    <a class="navbar-tool navbar-stuck-toggler" href="#">
                        <span class="navbar-tool-tooltip"><?php echo e(\App\CPU\translate('Expand Menu')); ?></span>
                        <div class="navbar-tool-icon-box">
                            <i class="navbar-tool-icon czi-menu open-icon"></i>
                            <i class="navbar-tool-icon czi-close close-icon"></i>
                        </div>
                    </a>
                    <div class="navbar-tool dropdown <?php echo e(Session::get('direction') === "rtl" ? 'mr-md-3' : 'ml-md-3'); ?>">
                        <a class="navbar-tool-icon-box bg-secondary dropdown-toggle" href="<?php echo e(route('wishlists')); ?>">
                            <span class="navbar-tool-label">
                                <span
                                    class="countWishlist"><?php echo e(session()->has('wish_list')?count(session('wish_list')):0); ?></span>
                           </span>
                            <i class="navbar-tool-icon czi-heart"></i>
                        </a>
                    </div>
                    <?php if(auth('customer')->check()): ?>
                        <div class="dropdown">
                            <a class="navbar-tool ml-3" type="button" data-toggle="dropdown" aria-haspopup="true"
                               aria-expanded="false">
                                <div class="navbar-tool-icon-box bg-secondary">
                                    <div class="navbar-tool-icon-box bg-secondary">
                                        <img  src="<?php echo e(asset('public/storage/app/public/profile/'.auth('customer')->user()->image)); ?>"
                                             onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                             class="img-profile rounded-circle __inline-14">
                                    </div>
                                </div>
                                <div class="navbar-tool-text">
                                    <small><?php echo e(\App\CPU\translate('hello')); ?>, <?php echo e(auth('customer')->user()->f_name); ?></small>
                                    <?php echo e(\App\CPU\translate('dashboard')); ?>

                                </div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item"
                                   href="<?php echo e(route('account-oder')); ?>"> <?php echo e(\App\CPU\translate('my_order')); ?> </a>
                                <a class="dropdown-item"
                                   href="<?php echo e(route('user-account')); ?>"> <?php echo e(\App\CPU\translate('my_profile')); ?></a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item"
                                   href="<?php echo e(route('customer.auth.logout')); ?>"><?php echo e(\App\CPU\translate('logout')); ?></a>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="dropdown">
                            <a class="navbar-tool <?php echo e(Session::get('direction') === "rtl" ? 'mr-md-3' : 'ml-md-3'); ?>"
                               type="button" data-toggle="dropdown" aria-haspopup="true"
                               aria-expanded="false">
                                <div class="navbar-tool-icon-box bg-secondary">
                                    <div class="navbar-tool-icon-box bg-secondary">
                                        <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4.25 4.41675C4.25 6.48425 5.9325 8.16675 8 8.16675C10.0675 8.16675 11.75 6.48425 11.75 4.41675C11.75 2.34925 10.0675 0.666748 8 0.666748C5.9325 0.666748 4.25 2.34925 4.25 4.41675ZM14.6667 16.5001H15.5V15.6667C15.5 12.4509 12.8825 9.83341 9.66667 9.83341H6.33333C3.11667 9.83341 0.5 12.4509 0.5 15.6667V16.5001H14.6667Z" fill="#1B7FED"/>
                                        </svg>

                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu __auth-dropdown dropdown-menu-<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>" aria-labelledby="dropdownMenuButton"
                                 style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
                                <a class="dropdown-item" href="<?php echo e(route('customer.auth.login')); ?>">
                                    <i class="fa fa-sign-in <?php echo e(Session::get('direction') === "rtl" ? 'mr-2' : 'mr-2'); ?>"></i> <?php echo e(\App\CPU\translate('sign_in')); ?>

                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo e(route('customer.auth.sign-up')); ?>">
                                    <i class="fa fa-user-circle <?php echo e(Session::get('direction') === "rtl" ? 'mr-2' : 'mr-2'); ?>"></i><?php echo e(\App\CPU\translate('sign_up')); ?>

                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div id="cart_items">
                        <?php echo $__env->make('layouts.front-end.partials.cart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar navbar-expand-md navbar-stuck-menu"  >
            <div class="container px-10px">
                <div class="collapse navbar-collapse" id="navbarCollapse"
                    style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>; ">

                    <!-- Search-->
                    <div class="input-group-overlay d-md-none my-3">
                        <form action="<?php echo e(route('products')); ?>" type="submit" class="search_form">
                            <input class="form-control appended-form-control search-bar-input-mobile" type="text"
                                   autocomplete="off"
                                   placeholder="<?php echo e(\App\CPU\translate('search')); ?>" name="name">
                            <input name="data_from" value="search" hidden>
                            <input name="page" value="1" hidden>
                            <button class="input-group-append-overlay search_button" type="submit"
                                    style="border-radius: <?php echo e(Session::get('direction') === "rtl" ? '7px 0px 0px 7px; right: unset; left: 0' : '0px 7px 7px 0px; left: unset; right: 0'); ?>;">
                            <span class="input-group-text __text-20px">
                                <i class="czi-search text-white"></i>
                            </span>
                            </button>
                            <diV class="card search-card __inline-13">
                                <div class="card-body search-result-box" id=""
                                     style="overflow:scroll; height:400px;overflow-x: hidden"></div>
                            </diV>
                        </form>
                    </div>

                    <?php ($categories=\App\Models\Category::with(['childes.childes'])->where('position', 0)->priority()->paginate(11)); ?>
                    <ul class="navbar-nav mega-nav pr-2 pl-2 <?php echo e(Session::get('direction') === "rtl" ? 'mr-2' : 'mr-2'); ?> d-none d-xl-block __mega-nav">
                        <li class="nav-item <?php echo e(!request()->is('/')?'dropdown':''); ?>">
                            <a class="nav-link dropdown-toggle <?php echo e(Session::get('direction') === "rtl" ? 'pr-0' : 'pl-0'); ?>"
                               href="#" data-toggle="dropdown" style="<?php echo e(request()->is('/')?'pointer-events: none':''); ?>">
                                <i class="czi-menu align-middle mt-n1 <?php echo e(Session::get('direction') === "rtl" ? 'mr-2' : 'mr-2'); ?>"></i>
                                <span
                                    style="margin-<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>: 30px !important;margin-<?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>: 30px">
                                    <?php echo e(\App\CPU\translate('categories')); ?>

                                </span>
                            </a>
                            <?php if(request()->is('/')): ?>
                                <ul class="dropdown-menu __dropdown-menu" style="<?php echo e(Session::get('direction') === "rtl" ? 'margin-right: 1px!important;text-align: right;' : 'margin-left: 1px!important;text-align: left;'); ?>padding-bottom: 0px!important;">
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($key<8): ?>
                                            <li class="dropdown">
                                                <a class="dropdown-item flex-between"
                                                   <?php if ($category->childes->count() > 0) echo "data-toggle='dropdown'"?> href="javascript:"
                                                   onclick="location.href='<?php echo e(route('products',['id'=> $category['id'],'data_from'=>'category','page'=>1])); ?>'">
                                                    <div class="d-flex">
                                                        <img
                                                            src="<?php echo e(asset("storage/app/public/category/$category->icon")); ?>"
                                                            onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                                            class="__img-18">
                                                        <span
                                                            class="w-0 flex-grow-1 <?php echo e(Session::get('direction') === "rtl" ? 'pr-3' : 'pl-3'); ?>"><?php echo e($category['name']); ?></span>
                                                    </div>
                                                    <?php if($category->childes->count() > 0): ?>
                                                        <div>
                                                            <i class="czi-arrow-<?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?> __inline-15"></i>
                                                        </div>
                                                    <?php endif; ?>
                                                </a>
                                                <?php if($category->childes->count()>0): ?>
                                                    <ul class="dropdown-menu"
                                                        style="right: 100%; text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
                                                        <?php $__currentLoopData = $category['childes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li class="dropdown">
                                                                <a class="dropdown-item flex-between"
                                                                   <?php if ($subCategory->childes->count() > 0) echo "data-toggle='dropdown'"?> href="javascript:"
                                                                   onclick="location.href='<?php echo e(route('products',['id'=> $subCategory['id'],'data_from'=>'category','page'=>1])); ?>'">
                                                                    <div>
                                                                        <span
                                                                            class="<?php echo e(Session::get('direction') === "rtl" ? 'pr-3' : 'pl-3'); ?>"><?php echo e($subCategory['name']); ?></span>
                                                                    </div>
                                                                    <?php if($subCategory->childes->count() > 0): ?>
                                                                        <div>
                                                                            <i class="czi-arrow-<?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?> __inline-15"></i>
                                                                        </div>
                                                                    <?php endif; ?>
                                                                </a>
                                                                <?php if($subCategory->childes->count()>0): ?>
                                                                    <ul class="dropdown-menu __r-100"
                                                                        style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
                                                                        <?php $__currentLoopData = $subCategory['childes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subSubCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <li>
                                                                                <a class="dropdown-item"
                                                                                   href="<?php echo e(route('products',['id'=> $subSubCategory['id'],'data_from'=>'category','page'=>1])); ?>"><?php echo e($subSubCategory['name']); ?></a>
                                                                            </li>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </ul>
                                                                <?php endif; ?>
                                                            </li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>
                                                <?php endif; ?>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <li class="dropdown">
                                        <a class="dropdown-item text-capitalize text-center" href="<?php echo e(route('categories')); ?>"
                                        style="color: <?php echo e($web_config['primary_color']); ?> !important;">
                                            <?php echo e(\App\CPU\translate('view_more')); ?>


                                            <i class="czi-arrow-<?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?> __inline-15"></i>
                                        </a>
                                    </li>

                                </ul>
                            <?php else: ?>
                                <ul class="dropdown-menu __dropdown-menu-2"
                                    style="right: 0; text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="dropdown">
                                            <a class="dropdown-item flex-between <?php if ($category->childes->count() > 0) echo "data-toggle='dropdown"?> "
                                               <?php if ($category->childes->count() > 0) echo "data-toggle='dropdown'"?> href="javascript:"
                                               onclick="location.href='<?php echo e(route('products',['id'=> $category['id'],'data_from'=>'category','page'=>1])); ?>'">
                                                <div class="d-flex">
                                                    <img src="<?php echo e(asset("storage/app/public/category/$category->icon")); ?>"
                                                         onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                                         class="__img-18">
                                                    <span
                                                        class="w-0 flex-grow-1 <?php echo e(Session::get('direction') === "rtl" ? 'pr-3' : 'pl-3'); ?>"><?php echo e($category['name']); ?></span>
                                                </div>
                                                <?php if($category->childes->count() > 0): ?>
                                                    <div>
                                                        <i class="czi-arrow-<?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?> __inline-15"></i>
                                                    </div>
                                                <?php endif; ?>
                                            </a>
                                            <?php if($category->childes->count()>0): ?>
                                                <ul class="dropdown-menu __r-100"
                                                    style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
                                                    <?php $__currentLoopData = $category['childes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li class="dropdown">
                                                            <a class="dropdown-item flex-between <?php if ($subCategory->childes->count() > 0) echo "data-toggle='dropdown"?> "
                                                               <?php if ($subCategory->childes->count() > 0) echo "data-toggle='dropdown'"?> href="javascript:"
                                                               onclick="location.href='<?php echo e(route('products',['id'=> $subCategory['id'],'data_from'=>'category','page'=>1])); ?>'">
                                                                <div>
                                                                    <span
                                                                        class="<?php echo e(Session::get('direction') === "rtl" ? 'pr-3' : 'pl-3'); ?>"><?php echo e($subCategory['name']); ?></span>
                                                                </div>
                                                                <?php if($subCategory->childes->count() > 0): ?>
                                                                    <div>
                                                                        <i class="czi-arrow-<?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?> __inline-15"></i>
                                                                    </div>
                                                                <?php endif; ?>
                                                            </a>
                                                            <?php if($subCategory->childes->count()>0): ?>
                                                                <ul class="dropdown-menu __r-100"
                                                                    style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
                                                                    <?php $__currentLoopData = $subCategory['childes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subSubCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <li>
                                                                            <a class="dropdown-item"
                                                                               href="<?php echo e(route('products',['id'=> $subSubCategory['id'],'data_from'=>'category','page'=>1])); ?>"><?php echo e($subSubCategory['name']); ?></a>
                                                                        </li>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </ul>
                                                            <?php endif; ?>
                                                        </li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                            <?php endif; ?>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <li class="dropdown">
                                        <a class="dropdown-item d-block text-center" href="<?php echo e(route('categories')); ?>"
                                        style="color: <?php echo e($web_config['primary_color']); ?> !important;">
                                            <?php echo e(\App\CPU\translate('view_more')); ?>


                                            <i class="czi-arrow-<?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?> __text-8px" style="background:none !important;color:<?php echo e($web_config['primary_color']); ?> !important;"></i>
                                        </a>
                                    </li>
                                </ul>
                            <?php endif; ?>
                        </li>
                    </ul>

                    <ul class="navbar-nav mega-nav1 pr-2 pl-2 d-block d-xl-none"><!--mobile-->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle <?php echo e(Session::get('direction') === "rtl" ? 'pr-0' : 'pl-0'); ?>"
                               href="#" data-toggle="dropdown">
                                <i class="czi-menu align-middle mt-n1 <?php echo e(Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'); ?>"></i>
                                <span
                                    style="margin-<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>: 20px !important;"><?php echo e(\App\CPU\translate('categories')); ?></span>
                            </a>
                            <ul class="dropdown-menu __dropdown-menu-2"
                                style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="dropdown">

                                            <a <?php if ($category->childes->count() > 0) echo ""?>
                                            href="<?php echo e(route('products',['id'=> $category['id'],'data_from'=>'category','page'=>1])); ?>">
                                            <img src="<?php echo e(asset("storage/app/public/category/$category->icon")); ?>"
                                                 onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                                 class="__img-18">
                                            <span
                                                class="<?php echo e(Session::get('direction') === "rtl" ? 'pr-3' : 'pl-3'); ?>"><?php echo e($category['name']); ?></span>

                                        </a>
                                        <?php if($category->childes->count() > 0): ?>
                                            <a  data-toggle='dropdown' class='__ml-50px'>
                                                <i class="czi-arrow-<?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?> __inline-16"></i>
                                            </a>
                                        <?php endif; ?>

                                        <?php if($category->childes->count()>0): ?>
                                            <ul class="dropdown-menu"
                                                style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
                                                <?php $__currentLoopData = $category['childes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li class="dropdown">
                                                        <a  href="<?php echo e(route('products',['id'=> $subCategory['id'],'data_from'=>'category','page'=>1])); ?>">
                                                            <span
                                                                class="<?php echo e(Session::get('direction') === "rtl" ? 'pr-3' : 'pl-3'); ?>"><?php echo e($subCategory['name']); ?></span>
                                                        </a>

                                                        <?php if($subCategory->childes->count()>0): ?>
                                                        <a style="font-family:  sans-serif !important;font-size: 1rem;
                                                            font-weight: 300;line-height: 1.5;margin-left:50px;" data-toggle='dropdown'>
                                                                <i class="czi-arrow-<?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?> __inline-16"></i>
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <?php $__currentLoopData = $subCategory['childes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subSubCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <li>
                                                                        <a class="dropdown-item"
                                                                           href="<?php echo e(route('products',['id'=> $subSubCategory['id'],'data_from'=>'category','page'=>1])); ?>"><?php echo e($subSubCategory['name']); ?></a>
                                                                    </li>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </ul>
                                                        <?php endif; ?>
                                                    </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        <?php endif; ?>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </li>
                    </ul>
                    <!-- Primary menu-->
                    <ul class="navbar-nav" style="<?php echo e(Session::get('direction') === "rtl" ? 'padding-right: 0px' : ''); ?>">
                        <li class="nav-item dropdown <?php echo e(request()->is('/')?'active':''); ?>">
                            <a class="nav-link" href="<?php echo e(route('home')); ?>"><?php echo e(\App\CPU\translate('Home')); ?></a>
                        </li>

                        <?php if(\App\Models\BusinessSetting::where(['type'=>'product_brand'])->first()->value): ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#"
                               data-toggle="dropdown"><?php echo e(\App\CPU\translate('brand')); ?></a>
                            <ul class="dropdown-menu __dropdown-menu-sizing dropdown-menu-<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?> scroll-bar"
                                style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
                                <?php $__currentLoopData = \App\CPU\BrandManager::get_active_brands(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="__inline-17">
                                        <div>
                                            <a class="dropdown-item"
                                               href="<?php echo e(route('products',['id'=> $brand['id'],'data_from'=>'brand','page'=>1])); ?>">
                                                <?php echo e($brand['name']); ?>

                                            </a>
                                        </div>
                                        <div class="align-baseline">
                                            <?php if($brand['brand_products_count'] > 0 ): ?>
                                                <span class="count-value px-2">( <?php echo e($brand['brand_products_count']); ?> )</span>
                                            <?php endif; ?>
                                        </div>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <li class="__inline-17">
                                    <div>
                                        <a class="dropdown-item" href="<?php echo e(route('brands')); ?>"
                                        style="color: <?php echo e($web_config['primary_color']); ?> !important;">
                                            <?php echo e(\App\CPU\translate('View_more')); ?>

                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <?php endif; ?>
                        <?php ($discount_product = App\Models\Product::with(['reviews'])->active()->where('discount', '!=', 0)->count()); ?>
                        <?php if($discount_product>0): ?>
                            <li class="nav-item dropdown <?php echo e(request()->is('/')?'active':''); ?>">
                                <a class="nav-link text-capitalize" href="<?php echo e(route('products',['data_from'=>'discounted','page'=>1])); ?>"><?php echo e(\App\CPU\translate('discounted_products')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php ($business_mode=\App\CPU\Helpers::get_business_settings('business_mode')); ?>
                        <?php if($business_mode == 'multi'): ?>
                            <li class="nav-item dropdown <?php echo e(request()->is('/')?'active':''); ?>">
                                <a class="nav-link" href="<?php echo e(route('sellers')); ?>"><?php echo e(\App\CPU\translate('Sellers')); ?></a>
                            </li>

                            <?php ($seller_registration=\App\Models\BusinessSetting::where(['type'=>'seller_registration'])->first()->value); ?>
                            <?php if($seller_registration): ?>
                                <li class="nav-item">
                                    <div class="dropdown">
                                        <button class="btn dropdown-toggle text-white" type="button" id="dropdownMenuButton"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                                style="padding-<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>: 0">
                                            <?php echo e(\App\CPU\translate('Seller')); ?>  <?php echo e(\App\CPU\translate('zone')); ?>

                                        </button>
                                        <div class="dropdown-menu __dropdown-menu-3 __min-w-165px" aria-labelledby="dropdownMenuButton"
                                            style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
                                            <a class="dropdown-item" href="<?php echo e(route('shop.apply')); ?>">
                                                <?php echo e(\App\CPU\translate('Become a')); ?> <?php echo e(\App\CPU\translate('Seller')); ?>

                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="<?php echo e(route('seller.auth.login')); ?>">
                                                <?php echo e(\App\CPU\translate('Seller')); ?>  <?php echo e(\App\CPU\translate('login')); ?>

                                            </a>
                                        </div>
                                    </div>
                                </li>
                            <?php endif; ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
<?php $__env->startPush('script'); ?>
<script>
    function myFunction() {
    $('#anouncement').slideUp(300)
    }
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\xampp\htdocs\tikka\resources\themes\default/layouts/front-end/partials/_header.blade.php ENDPATH**/ ?>