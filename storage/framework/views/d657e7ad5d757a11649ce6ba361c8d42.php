<!-- Top Offer Bar -->
<?php if(isset($web_config['announcement']) && $web_config['announcement']['status']==1): ?>
<div class="offer-bar py-3" data-bg-img="<?php echo e(theme_asset('assets/img/media/top-offer-bg.png')); ?>">
    <div class="d-flex gap-2 align-items-center">
        <div class="offer-bar-close">
            <i class="bi bi-x-lg"></i>
        </div>
        <div class="top-offer-text flex-grow-1 d-flex justify-content-center fw-semibold">
            <span style="color: <?php echo e($web_config['announcement']['text_color']); ?>;"><?php echo e($web_config['announcement']['announcement']); ?></span>

        </div>
    </div>
</div>
<?php endif; ?>
<?php ($categories = \App\Models\Category::with('childes.childes')->priority()->take(11)->get()); ?>
<?php ($brands = \App\Models\Brand::active()->take(15)->get()); ?>
<!-- Header -->
<header class="header">
    <div class="header-top py-2">
        <div class="container">
            <div class="d-flex align-items-center flex-wrap justify-content-between gap-2">
                <a href="tel:+<?php echo e($web_config['phone']->value); ?>" class="d-flex gap-2 align-items-center">
                    <i class="bi bi-telephone text-primary"></i>
                    <?php echo e($web_config['phone']->value); ?>

                </a>

                <ul class="nav justify-content-center justify-content-sm-end align-items-center gap-4">
                    <li>
                        <div class="language-dropdown">
                            <?php if($web_config['currency_model']=='multi_currency'): ?>
                                <button
                                    type="button"
                                    class="border-0 bg-transparent d-flex gap-2 align-items-center dropdown-toggle text-dark p-0"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false"
                                >
                                    <?php echo e(session('currency_code')); ?> <?php echo e(session('currency_symbol')); ?>

                                </button>
                                <ul class="dropdown-menu" style="--bs-dropdown-min-width: 10rem">
                                    <?php $__currentLoopData = $web_config['currencies']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li onclick="currency_change('<?php echo e($currency['code']); ?>')"><a href="javascript:"><?php echo e($currency->name); ?></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <span id="currency-route" data-currency-route="<?php echo e(route('currency.change')); ?>"></span>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </li>
                    <li>
                        <div class="language-dropdown">
                            <button
                                type="button"
                                class="border-0 bg-transparent d-flex gap-2 align-items-center dropdown-toggle text-dark p-0"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                            >
                                <?php ( $local = \App\CPU\Helpers::default_lang()); ?>
                                <?php $__currentLoopData = json_decode($language['value'],true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($data['code']==$local): ?>
                                        <img width="20" src="<?php echo e(theme_asset('assets/img/flags')); ?>/<?php echo e($data['code'].'.png'); ?>" class="dark-support" alt="Eng"/>
                                        <?php echo e(ucwords($data['name'])); ?>

                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </button>
                            <ul class="dropdown-menu" style="--bs-dropdown-min-width: 10rem">
                                <?php $__currentLoopData = json_decode($language['value'],true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($data['status']==1): ?>
                                        <li>
                                            <a class="d-flex gap-2 align-items-center" href="<?php echo e(route('lang',[$data['code']])); ?>">
                                                <img width="20" src="<?php echo e(theme_asset('assets/img/flags')); ?>/<?php echo e($data['code'].'.png'); ?>" loading="lazy" class="dark-support" alt="<?php echo e($data['name']); ?>"/>
                                                <?php echo e(ucwords($data['name'])); ?>

                                            </a>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </li>
                    <?php if($web_config['seller_registration']): ?>
                    <li class="d-none d-xl-block">
                        <a href="<?php echo e(route('shop.apply')); ?>" class="d-flex">
                            <div class="fz-16"><?php echo e(translate('Become_a')); ?> <?php echo e(translate('Seller')); ?></div>
                        </a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="header-middle border-bottom py-2 d-none d-xl-block">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between gap-3">
                <a class="logo" href="<?php echo e(route('home')); ?>">
                    <img
                        src="<?php echo e(asset("storage/app/public/company")."/".$web_config['web_logo']->value); ?>"
                        class="dark-support svg h-45"

                        alt="Logo"
                    />
                </a>
                <div class="search-box position-relative">
                    <form action="<?php echo e(route('products')); ?>" type="submit">
                        <div class="d-flex">
                            <div
                                class="select-wrap focus-border border border-end-logical-0 d-flex align-items-center"
                            >
                                <div class="border-end">
                                    <div class="dropdown search_dropdown">
                                        <button type="button" class="border-0 px-3 bg-transparent dropdown-toggle text-dark py-0" data-bs-toggle="dropdown" aria-expanded="false">
                                            <?php echo e(translate('All_Categories')); ?>

                                        </button>
                                        <input type="hidden" name="search_category_value" id="search_category_value" value="all">
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="d-flex" data-value="all" href="javascript:">
                                                    <?php echo e(translate('All_Categories')); ?>

                                                </a>
                                            </li>
                                            <?php if($categories): ?>
                                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li>
                                                        <a class="d-flex" data-value="<?php echo e($category->id); ?>" href="javascript:">
                                                            <?php echo e($category['name']); ?>

                                                        </a>
                                                    </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>

                                <input
                                    type="search"
                                    class="form-control border-0 focus-input search-bar-input" name="name" onkeyup="global_search()"
                                    placeholder="<?php echo e(translate('Search_for_items_or_store')); ?>..."
                                />
                            </div>
                            <input name="data_from" value="search" hidden>
                            <input name="page" value="1" hidden>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </form>
                    <div class="card search-card __inline-13 position-absolute z-99 w-100 bg-white top-100 start-0 search-result-box"></div>
                </div>
                <div class="offer-btn">
                    <?php if($web_config['header_banner']): ?>
                        <a href="<?php echo e($web_config['header_banner']['url']); ?>">
                            <img
                                width="180"
                                src="<?php echo e(asset('public/storage/app/public/banner')); ?>/<?php echo e($web_config['header_banner']['photo']); ?>"
                                onerror="this.src='<?php echo e(theme_asset('assets/img/header-banner-placeholder.png')); ?>'"
                                loading="lazy"
                                class="dark-support"
                                alt=""
                            />
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="header-main love-sticky py-2 py-lg-3 py-xl-0 shadow-sm">
        <div class="container">
            <!-- Aside -->
            <aside class="aside d-flex flex-column d-xl-none">
                <div class="aside-close p-3 pb-2">
                    <i class="bi bi-x-lg"></i>
                </div>
                <!-- Aside Body -->
                <div>
                    <div class="aside-body" data-trigger="scrollbar">
                        <!-- Search -->
                        <form action="<?php echo e(route('products')); ?>" class="mb-3">
                            <div class="search-bar">
                                <input type="search" name="name" class="form-control search-bar-input-mobile" autocomplete="off" placeholder="<?php echo e(translate('Search_for_items')); ?>...">
                                <input name="data_from" value="search" hidden="">
                                <input name="page" value="1" hidden="">
                                <button type="submit">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                            <div class="card search-card __inline-13 position-absolute z-99 w-100 bg-white start-0 search-result-box d--none"></div>
                        </form>

                        <!-- Nav -->
                        <ul class="main-nav nav">
                            <li>
                                <a href="<?php echo e(route('categories')); ?>#"><?php echo e(translate('categories')); ?></a>
                                <!-- Sub Menu -->
                                <ul class="sub_menu">
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <a href="javascript:" onclick="location.href='<?php echo e(route('products',['id'=> $category['id'],'data_from'=>'category','page'=>1])); ?>'">
                                            <?php echo e($category['name']); ?>

                                        </a>
                                        <?php if($category->childes->count() > 0): ?>
                                            <ul class="sub_menu">
                                                <?php $__currentLoopData = $category['childes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li>
                                                    <a href="javascript:" onclick="location.href='<?php echo e(route('products',['id'=> $subCategory['id'],'data_from'=>'category','page'=>1])); ?>'">
                                                        <?php echo e($subCategory['name']); ?>

                                                    </a>
                                                    <?php if($subCategory->childes->count()>0): ?>
                                                    <ul class="sub_menu">
                                                        <?php $__currentLoopData = $subCategory['childes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subSubCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li>
                                                                <a href="<?php echo e(route('products',['id'=> $subSubCategory['id'],'data_from'=>'category','page'=>1])); ?>">
                                                                    <?php echo e($subSubCategory['name']); ?>

                                                                </a>
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
                            <li>
                                <a href="<?php echo e(route('home')); ?>"><?php echo e(translate('Home')); ?></a>
                            </li>
                            <?php if($web_config['featured_deals']->count()>0 || $web_config['flash_deals']): ?>
                            <li>
                                <a href="javascript:"><?php echo e(translate('Offers')); ?></a>
                                <ul class="sub_menu">
                                    <?php if($web_config['featured_deals']->count()>0): ?>
                                    <li><a href="<?php echo e(route('products',['data_from'=>'featured_deal'])); ?>"><?php echo e(translate('Featured_Deal')); ?></a></li>
                                    <?php endif; ?>

                                    <?php if($web_config['flash_deals']): ?>
                                    <li><a href="<?php echo e(route('flash-deals',[$web_config['flash_deals']?$web_config['flash_deals']['id']:0])); ?>"><?php echo e(translate('Flash_Deal')); ?></a></li>
                                    <?php endif; ?>
                                </ul>
                            </li>
                            <?php endif; ?>















                            <?php if($web_config['brand_setting']): ?>
                            <li>
                                <a href="javascript:"><?php echo e(translate('brands')); ?></a>
                                <!-- Sub Menu -->
                                <ul class="sub_menu">
                                    <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <a href="<?php echo e(route('products',['id'=> $brand['id'],'data_from'=>'brand','page'=>1])); ?>"><?php echo e($brand->name); ?></a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </li>
                            <?php endif; ?>

                            <li>
                                <a class="d-flex gap-2 align-items-center" href="<?php echo e(route('products',['data_from'=>'discounted','page'=>1])); ?>">
                                    <?php echo e(translate('Discounted_Products')); ?>

                                    <i class="bi bi-patch-check-fill text-warning"></i>
                                </a>
                            </li>

                            <?php if($web_config['seller_registration']): ?>
                            <li class="d-xl-none">
                                <a href="<?php echo e(route('shop.apply')); ?>" class="d-flex">
                                    <div class="fz-16"><?php echo e(translate('Become_a')); ?> <?php echo e(translate('Seller')); ?></div>
                                </a>
                            </li>
                            <?php endif; ?>
                        </ul>
                        <!-- End Nav -->
                    </div>

                    <div class="d-flex align-items-center gap-2 justify-content-between p-4">
                        <span class="text-dark"><?php echo e(translate('theme_mode')); ?></span>
                        <div class="theme-bar p-1">
                            <button class="light_button active">
                                <img src="<?php echo e(theme_asset('assets/img/svg/light.svg')); ?>" alt="" class="svg">
                            </button>
                            <button class="dark_button">
                                <img src="<?php echo e(theme_asset('assets/img/svg/dark.svg')); ?>" alt="" class="svg">
                            </button>
                        </div>
                    </div>
                </div>

                <?php if(auth('customer')->check()): ?>
                <div class="d-flex justify-content-center mb-5 pb-5 mt-auto px-4">
                    <a href="<?php echo e(route('customer.auth.logout')); ?>" class="btn btn-primary w-100"><?php echo e(translate('logout')); ?></a>
                </div>
                <?php else: ?>
                    <div class="d-flex justify-content-center mb-5 pb-5 mt-auto px-4">
                        <a href="" data-bs-toggle="modal" data-bs-target="#loginModal" class="btn btn-primary w-100">
                            <?php echo e(translate('login')); ?> / <?php echo e(translate('register')); ?>

                        </a>
                    </div>
                <?php endif; ?>
            </aside>

            <div class="d-flex justify-content-between gap-3 align-items-center position-relative">
                <div class="d-flex align-items-center gap-3">
                    <!-- Header Category Dropdown -->
                    <div class="dropdown d-none d-xl-block">
                        <button
                            class="btn btn-primary rounded-0 text-uppercase fw-bold fs-14 dropdown-toggle select-category-button"
                            type="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="bi bi-list fs-4"></i>
                            <?php echo e(translate('Select_Category')); ?>

                        </button>
                        <ul class="dropdown-menu dropdown--menu">
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($key<8): ?>
                                    <li class="<?php echo e($category->childes->count() > 0 ? 'menu-item-has-children':''); ?>">
                                        <a href="javascript:" onclick="location.href='<?php echo e(route('products',['id'=> $category['id'],'data_from'=>'category','page'=>1])); ?>'">
                                            <?php echo e($category['name']); ?>

                                        </a>
                                        <?php if($category->childes->count() > 0): ?>
                                        <ul class="sub-menu">
                                            <?php $__currentLoopData = $category['childes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li class="<?php echo e($subCategory->childes->count()>0 ? 'menu-item-has-children':''); ?>">
                                                <a href="javascript:" onclick="location.href='<?php echo e(route('products',['id'=> $subCategory['id'],'data_from'=>'category','page'=>1])); ?>'">
                                                    <?php echo e($subCategory['name']); ?>

                                                </a>
                                                <?php if($subCategory->childes->count()>0): ?>
                                                <ul class="sub-menu">
                                                    <?php $__currentLoopData = $subCategory['childes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subSubCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li>
                                                            <a href="<?php echo e(route('products',['id'=> $subSubCategory['id'],'data_from'=>'category','page'=>1])); ?>">
                                                                <?php echo e($subSubCategory['name']); ?>

                                                            </a>
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
                            <li>
                                <a href="<?php echo e(route('products',['data_from'=>'latest'])); ?>"class="btn-link text-primary">
                                    <?php echo e(translate('view_all')); ?>

                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Header Category Dropdown -->

                    <!-- Main Nav -->
                    <div class="nav-wrapper">
                        <div class="d-xl-none">
                            <a class="logo" href="<?php echo e(route('home')); ?>">
                                <img
                                    width="123"
                                    src="<?php echo e(asset("storage/app/public/company")."/".$web_config['web_logo']->value); ?>"

                                    class="dark-support"
                                    alt="Logo"
                                />
                            </a>
                        </div>
                        <ul class="nav main-menu align-items-center d-none d-xl-flex flex-nowrap">
                            <li class="<?php echo e(request()->is('/')?'active':''); ?>">
                                <a href="<?php echo e(route('home')); ?>"><?php echo e(translate('Home')); ?></a>
                            </li>
                            <?php if($web_config['featured_deals']->count()>0 || $web_config['flash_deals']): ?>
                            <li>
                                <a class="cursor-pointer"><?php echo e(translate('Offers')); ?></a>
                                <ul class="sub-menu">
                                    <?php if($web_config['featured_deals']->count()>0): ?>
                                        <li>
                                            <a href="<?php echo e(route('products',['data_from'=>'featured_deal'])); ?>"><?php echo e(translate('Featured_Deal')); ?></a>
                                        </li>
                                    <?php endif; ?>

                                    <?php if($web_config['flash_deals']): ?>
                                    <li>
                                        <a href="<?php echo e(route('flash-deals',[$web_config['flash_deals']?$web_config['flash_deals']['id']:0])); ?>"><?php echo e(translate('Flash_Deal')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                </ul>
                            </li>
                            <?php endif; ?>
                            <?php if($web_config['business_mode'] == 'multi'): ?>
                            <li>
                                <a class="cursor-pointer"><?php echo e(translate('stores')); ?></a>
                                <div
                                    class="sub-menu megamenu p-3"
                                    style="--bs-dropdown-min-width: max-content"                                >
                                    <div class="d-flex gap-5">
                                        <div class="column-2 row-gap-3">













                                            <div class="d-flex">
                                                <a href="<?php echo e(route('sellers')); ?>" class="fw-bold text-primary d-flex justify-content-center">
                                                    <?php echo e(translate('view_all')); ?>...
                                                </a>
                                            </div>
                                        </div>
                                        <div>
                                            <a href="#">
                                                <img
                                                    width="277"
                                                    src="<?php echo e(theme_asset('assets/img/media/super-market.png')); ?>"
                                                    class="dark-support"
                                                    alt=""
                                                />
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php endif; ?>

                            <?php if($web_config['brand_setting']): ?>
                            <li>
                                <a class="cursor-pointer"><?php echo e(translate('brands')); ?></a>
                                <div class="sub-menu megamenu p-3"
                                    style="--bs-dropdown-min-width: max-content">
                                    <div class="d-flex gap-4">
                                        <div class="column-2">
                                            <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <a href="<?php echo e(route('products',['id'=> $brand['id'],'data_from'=>'brand','page'=>1])); ?>"
                                                   class="media gap-3 align-items-center border-bottom">
                                                    <div class="avatar rounded-circle"
                                                        style="--size: 1.25rem">
                                                        <img
                                                            onerror="this.src='<?php echo e(theme_asset('assets/img/image-place-holder.png')); ?>'"
                                                            src="<?php echo e(asset("storage/app/public/brand")); ?>/<?php echo e($brand->image); ?>"
                                                            loading="lazy"
                                                            class="img-fit rounded-circle dark-support"
                                                            alt=""/>
                                                    </div>
                                                    <div class="media-body text-truncate"
                                                         style="--width: 7rem"
                                                         title="Bata">
                                                        <?php echo e($brand->name); ?>

                                                    </div>
                                                </a>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <div class="d-flex">
                                                    <a href="<?php echo e(route('brands')); ?>"
                                                       class="fw-bold text-primary d-flex justify-content-center"><?php echo e(translate('view_all')); ?>...
                                                    </a>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php endif; ?>
                            <?php if($web_config['discount_product']>0): ?>
                                <li class="">
                                    <a class="d-flex gap-2 align-items-center discount-product-menu <?php echo e(request()->is('/')?'active':''); ?>" href="<?php echo e(route('products',['data_from'=>'discounted','page'=>1])); ?>">
                                        <?php echo e(translate('discounted_products')); ?>

                                        <i class="bi bi-patch-check-fill text-warning"></i></a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <!-- End Main Nav -->
                </div>
                <ul class="list-unstyled list-separator mb-0 pe-2">
                    <?php if(auth('customer')->check()): ?>
                        <li class="login-register d-flex align-items-center gap-4">
                            <div class="profile-dropdown">
                                <button
                                    type="button"
                                    class="border-0 bg-transparent d-flex gap-2 align-items-center dropdown-toggle text-dark p-0 user"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false"
                                >
                                    <span class="avatar overflow-hidden header-avatar rounded-circle" style="--size: 1.5rem">
                                      <img
                                          loading="lazy"
                                          src="<?php echo e(asset('public/storage/app/public/profile/'.auth('customer')->user()->image)); ?>"
                                          onerror="this.src='<?php echo e(theme_asset('assets/img/image-place-holder.png')); ?>'"
                                          class="img-fit"
                                          alt=""
                                      />
                                    </span>
                                </button>
                                <ul class="dropdown-menu" style="--bs-dropdown-min-width: 10rem">
                                    <li ><a href="<?php echo e(route('account-oder')); ?>"><?php echo e(translate('my_order')); ?></a></li>
                                    <li ><a href="<?php echo e(route('user-profile')); ?>"><?php echo e(translate('my_profile')); ?></a></li>
                                    <li ><a href="<?php echo e(route('customer.auth.logout')); ?>"><?php echo e(translate('logout')); ?></a></li>
                                </ul>
                            </div>
                            <div class="menu-btn d-xl-none">
                                <i class="bi bi-list fs-30"></i>
                            </div>
                        </li>
                    <?php else: ?>
                        <li class="login-register d-flex gap-4">
                            <button
                                class="media gap-2 align-items-center text-uppercase fs-12 bg-transparent border-0 p-0"
                                data-bs-toggle="modal"
                                data-bs-target="#loginModal"
                            >
                                <span class="avatar header-avatar rounded-circle d-xl-none" style="--size: 1.5rem">
                                    <img
                                        loading="lazy"
                                        src="<?php echo e(theme_asset('assets/img/image-place-holder.png')); ?>"
                                        class="img-fit rounded-circle"
                                        alt=""
                                    />
                              </span>
                                <span class="media-body d-none d-xl-block hover-primary"><?php echo e(translate('login')); ?> / <?php echo e(translate('register')); ?></span>
                            </button>
                            <div class="menu-btn d-xl-none">
                                <i class="bi bi-list fs-30"></i>
                            </div>
                        </li>
                    <?php endif; ?>
                    <li class="d-none d-xl-block">
                        <?php if(auth('customer')->check()): ?>
                        <a href="<?php echo e(route('compare-list')); ?>" class="position-relative">
                            <i class="bi bi-repeat fs-18"></i>
                            <span class="count compare_list_count_status"><?php echo e(session()->has('compare_list')?count(session('compare_list')):0); ?></span>
                        </a>
                        <?php else: ?>
                            <a href="javascript:" class="position-relative" data-bs-toggle="modal"
                               data-bs-target="#loginModal">
                                <i class="bi bi-repeat fs-18"></i>
                            </a>
                        <?php endif; ?>
                    </li>
                    <li class="d-none d-xl-block">
                        <?php if(auth('customer')->check()): ?>
                        <a href="<?php echo e(route('wishlists')); ?>" class="position-relative">
                            <i class="bi bi-heart fs-18"></i>
                            <span class="count wishlist_count_status"><?php echo e(session()->has('wish_list')?count(session('wish_list')):0); ?></span>
                        </a>
                        <?php else: ?>
                            <a href="javascript:" class="position-relative" data-bs-toggle="modal"
                               data-bs-target="#loginModal">
                                <i class="bi bi-heart fs-18"></i>
                            </a>
                        <?php endif; ?>

                    </li>
                    <li class="d-none d-xl-block" id="cart_items">
                        <?php echo $__env->make('theme-views.layouts.partials._cart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
<?php /**PATH C:\xampp\htdocs\tikka\resources\themes\theme_aster/theme-views/layouts/partials/_header.blade.php ENDPATH**/ ?>
