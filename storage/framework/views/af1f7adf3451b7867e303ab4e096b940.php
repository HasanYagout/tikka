<?php $__env->startSection('title',translate(str_replace(['-', '_', '/'],' ',$data['data_from'])).' '.translate('products')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <meta property="og:image" content="<?php echo e(asset('public/storage/app/public/company')); ?>/<?php echo e($web_config['web_logo']); ?>"/>
    <meta property="og:title" content="Products of <?php echo e($web_config['name']); ?> "/>
    <meta property="og:url" content="<?php echo e(env('APP_URL')); ?>">
    <meta property="og:description" content="<?php echo substr($web_config['about']->value,0,100); ?>">

    <meta property="twitter:card" content="<?php echo e(asset('public/storage/app/public/company')); ?>/<?php echo e($web_config['web_logo']); ?>"/>
    <meta property="twitter:title" content="Products of <?php echo e($web_config['name']); ?>"/>
    <meta property="twitter:url" content="<?php echo e(env('APP_URL')); ?>">
    <meta property="twitter:description" content="<?php echo substr($web_config['about']->value,0,100); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <!-- Main Content -->
    <main class="main-content d-flex flex-column gap-3 pt-3">
        <!-- Product -->
        <section>
            <div class="container">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row gy-2 align-items-center">
                            <div class="col-lg-4">
                                <h3 class="mb-1"><?php echo e(translate(str_replace(['-', '_', '/'],' ',$data['data_from']))); ?> <?php echo e(translate('products')); ?></h3>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb fs-12 mb-0">
                                      <li class="breadcrumb-item"><a href="#"><?php echo e(translate('home')); ?></a></li>
                                      <li class="breadcrumb-item active" aria-current="page"><?php echo e(translate(str_replace(['-', '_', '/'],' ',$data['data_from']))); ?> <?php echo e(translate('products')); ?> <?php echo e(isset($data['brand_name']) ? ' / '.$data['brand_name'] : ''); ?> <?php echo e(request('name') ? '('.request('name').')' : ''); ?></li>
                                    </ol>
                                  </nav>
                            </div>
                            <div class="col-lg-8">
                                <div class="d-flex justify-content-lg-end flex-wrap gap-2">
                                    <div class="border rounded custom-ps-3 py-2">
                                        <div class="d-flex gap-2">
                                            <div class="flex-middle gap-2">
                                                <i class="bi bi-sort-up-alt"></i>
                                                <span class="d-none d-sm-inline-block"><?php echo e(translate('Sort_by')); ?> :</span>
                                            </div>
                                            <div class="dropdown product_view_sort_by">
                                                <button type="button" class="border-0 bg-transparent dropdown-toggle text-dark p-0 custom-pe-3" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <?php echo e(translate('default')); ?>

                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end" id="sort_by_list">
                                                    <li class="sort_by-latest selected" data-value="latest">
                                                        <a class="d-flex" href="javascript:" onclick="filter('latest','<?php echo e(translate('default')); ?>')">
                                                            <?php echo e(translate('default')); ?>

                                                        </a>
                                                    </li>
                                                    <li class="sort_by-high-low" data-value="high-low">
                                                        <a class="d-flex" href="javascript:" onclick="filter('high-low','<?php echo e(translate('High_to_Low_Price')); ?>')">
                                                            <?php echo e(translate('High_to_Low_Price')); ?>

                                                        </a>
                                                    </li>
                                                    <li class="sort_by-low-high" data-value="low-high">
                                                        <a class="d-flex" href="javascript:" onclick="filter('low-high','<?php echo e(translate('Low_to_High_Price')); ?>')">
                                                            <?php echo e(translate('Low_to_High_Price')); ?>

                                                        </a>
                                                    </li>
                                                    <li class="sort_by-a-z" data-value="a-z">
                                                        <a class="d-flex" href="javascript:" onclick="filter('a-z','<?php echo e(translate('A_to_Z_Order')); ?>')">
                                                            <?php echo e(translate('A_to_Z_Order')); ?>

                                                        </a>
                                                    </li>
                                                    <li class="sort_by-z-a" data-value="z-a">
                                                        <a class="d-flex" href="javascript:" onclick="filter('z-a','<?php echo e(translate('Z_to_A_Order')); ?>')">
                                                            <?php echo e(translate('Z_to_A_Order')); ?>

                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="border rounded custom-ps-3 py-2">
                                        <div class="d-flex gap-2">
                                            <div class="flex-middle gap-2">
                                                <i class="bi bi-sort-up-alt"></i>
                                                <span class="d-none d-sm-inline-block"><?php echo e(translate('Show_Product')); ?> :</span>
                                            </div>
                                            <div class="dropdown">
                                                <button type="button" class="border-0 bg-transparent dropdown-toggle p-0 custom-pe-3" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <?php echo e($data['data_from']=="best-selling"||$data['data_from']=="top-rated"||$data['data_from']=="featured_deal"||$data['data_from']=="latest"||$data['data_from']=="most-favorite"?
                                                    str_replace(['-', '_', '/'], ' ', translate($data['data_from'])):translate('Choose Option')); ?>

                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li class="<?php echo e($data['data_from']=='latest'? 'selected':''); ?>">
                                                        <a class="d-flex" href="<?php echo e(route('products',['id'=> $data['id'],'data_from'=>'latest','page'=>1])); ?>">
                                                            <?php echo e(translate('Latest_Products')); ?>

                                                        </a>
                                                    </li>
                                                    <li class="<?php echo e($data['data_from']=='best-selling'? 'selected':''); ?>">
                                                        <a class="d-flex" href="<?php echo e(route('products',['id'=> $data['id'],'data_from'=>'best-selling','page'=>1])); ?>">
                                                            <?php echo e(translate('Best_Selling')); ?>

                                                        </a>
                                                    </li>
                                                    <li class="<?php echo e($data['data_from']=='top-rated'? 'selected':''); ?>">
                                                        <a class="d-flex" href="<?php echo e(route('products',['id'=> $data['id'],'data_from'=>'top-rated','page'=>1])); ?>">
                                                            <?php echo e(translate('Top_Rated')); ?>

                                                        </a>
                                                    </li>
                                                    <li class="<?php echo e($data['data_from']=='most-favorite'? 'selected':''); ?>">
                                                        <a class="d-flex" href="<?php echo e(route('products',['id'=> $data['id'],'data_from'=>'most-favorite','page'=>1])); ?>">
                                                            <?php echo e(translate('Most_Favorite')); ?>

                                                        </a>
                                                    </li>
                                                    <?php if($web_config['featured_deals']): ?>
                                                    <li class="<?php echo e($data['data_from']=='featured_deal'? 'selected':''); ?>">
                                                        <a class="d-flex" href="<?php echo e(route('products',['id'=> $data['id'],'data_from'=>'featured_deal','page'=>1])); ?>">
                                                            <?php echo e(translate('Featured_Deal')); ?>

                                                        </a>
                                                    </li>
                                                    <?php endif; ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flexible-grid lg-down-1 gap-3" style="--width: 16rem">
                    <div class="card filter-toggle-aside">
                        <div class="d-flex d-lg-none pb-0 p-3 justify-content-end">
                            <button class="filter-aside-close border-0 bg-transparent">
                                <i class="bi bi-x-lg"></i>
                            </button>
                        </div>

                        <div class="card-body d-flex flex-column gap-4">
                            <!-- Categories -->
                            <div>
                                <h6 class="mb-3"><?php echo e(translate('Categories')); ?></h6>
                                <?php ($categories=\App\CPU\CategoryManager::parents()); ?>
                                <div class="products_aside_categories">
                                    <ul class="common-nav flex-column nav custom-scrollbar flex-nowrap custom_common_nav">
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <div class="d-flex justify-content-between">
                                                <a href="<?php echo e(route('products',['id'=> $category['id'],'data_from'=>'category','page'=>1])); ?>"><?php echo e($category['name']); ?></a>
                                                <?php if($category->childes->count() > 0): ?>
                                                <span>
                                                    <i class="bi bi-chevron-right"></i>
                                                </span>
                                                <?php endif; ?>
                                            </div>
                                            <!-- Sub Menu -->
                                            <?php if($category->childes->count() > 0): ?>
                                            <ul class="sub_menu">
                                                <?php $__currentLoopData = $category->childes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li>
                                                    <div class="d-flex justify-content-between">
                                                        <a href="<?php echo e(route('products',['id'=> $child['id'],'data_from'=>'category','page'=>1])); ?>"><?php echo e($child['name']); ?></a>
                                                        <?php if($child->childes->count() > 0): ?>
                                                        <span>
                                                            <i class="bi bi-chevron-right"></i>
                                                        </span>
                                                        <?php endif; ?>
                                                    </div>

                                                    <?php if($child->childes->count() > 0): ?>
                                                    <ul class="sub_menu">
                                                        <?php $__currentLoopData = $child->childes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li>
                                                            <label class="custom-checkbox">
                                                                <a href="<?php echo e(route('products',['id'=> $ch['id'],'data_from'=>'category','page'=>1])); ?>"><?php echo e($ch['name']); ?></a>
                                                            </label>
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
                                </div>
                                <?php if($categories->count() > 10): ?>
                                <div class="d-flex justify-content-center">
                                    <button class="btn-link text-primary btn_products_aside_categories"><?php echo e(translate('More_Categories')); ?>...</button>
                                </div>
                                <?php endif; ?>
                            </div>

                            <?php if($web_config['brand_setting']): ?>
                            <!-- Brands -->
                            <div>
                                <?php ($brands = \App\CPU\BrandManager::get_active_brands()); ?>
                                <h6 class="mb-3"><?php echo e(translate('Brands')); ?></h6>
                                <div class="products_aside_brands">
                                    <ul class="common-nav nav flex-column pe-2">
                                        <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <div class="flex-between-gap-3 align-items-center">
                                                <label class="custom-checkbox">
                                                    <a href="<?php echo e(route('products',['id'=> $brand['id'],'data_from'=>'brand','page'=>1])); ?>"><?php echo e($brand['name']); ?></a>
                                                </label>
                                                <span class="badge bg-badge rounded-pill text-dark"><?php echo e($brand['brand_products_count']); ?></span>
                                            </div>
                                        </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>

                                <?php if($brands->count() > 10): ?>
                                <div class="d-flex justify-content-center">
                                    <button class="btn-link text-primary btn_products_aside_brands"><?php echo e(translate('More_Brands')); ?>...</button>
                                </div>
                                <?php endif; ?>
                            </div>
                            <?php endif; ?>

                            <!-- Ratings -->
                            <div id="ajax-review_partials">
                                <?php echo $__env->make('theme-views.partials._products_review_partials', ['ratings'=>$ratings], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>

                            <!-- Price -->
                            <div>
                                <h6 class="mb-3"><?php echo e(translate('Price')); ?></h6>
                                <div class="d-flex align-items-end gap-2">
                                    <div class="form-group">
                                        <label for="min_price" class="mb-1"><?php echo e(translate('Min')); ?></label>
                                        <input type="number" id="min_price" class="form-control form-control--sm" placeholder="$0">
                                    </div>
                                    <div class="mb-2">-</div>
                                    <div class="form-group">
                                        <label for="max_price" class="mb-1"><?php echo e(translate('Max')); ?></label>
                                        <input type="number" id="max_price" class="form-control form-control--sm" placeholder="$1,000">
                                    </div>
                                    <button class="btn btn-primary py-1 px-2 fs-13" onclick="sortByfilterBy()"><i class="bi bi-chevron-right"></i></button>
                                </div>

                                <section class="range-slider">
                                    <span class="full-range"></span>
                                    <span class="incl-range"></span>
                                    <input name="rangeOne" value="0" min="0" max="10000" step="1" type="range" id="price_rangeMin">
                                    <input name="rangeTwo" value="5000" min="0" max="10000" step="1" type="range" id="price_rangeMax">
                                </section>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="d-flex flex-wrap flex-lg-nowrap align-items-start justify-content-between gap-3 mb-2">
                            <div class="flex-middle gap-3"></div>
                            <div class="d-flex align-items-center mb-3 mb-md-0 flex-wrap flex-md-nowrap gap-3">
                                <ul class="product-view-option option-select-btn gap-3">
                                    <li>
                                        <label>
                                            <input type="radio" name="product_view" value="grid-view" hidden=""
                                            <?php echo e((session()->get('product_view_style') == 'grid-view'?'checked':'')); ?> id="grid-view">
                                            <span class="py-2 d-flex align-items-center gap-2"><i class="bi bi-grid-fill"></i> <?php echo e(translate('Grid_View')); ?></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="radio" name="product_view" value="list-view" hidden=""
                                            <?php echo e((session()->get('product_view_style') == 'list-view'?'checked':'')); ?> id="list-view">
                                            <span class="py-2 d-flex align-items-center gap-2"><i class="bi bi-list-ul"></i> <?php echo e(translate('List_View')); ?></span>
                                        </label>
                                    </li>
                                </ul>
                                <button class="toggle-filter square-btn btn btn-outline-primary rounded d-lg-none">
                                    <i class="bi bi-funnel"></i>
                                </button>
                            </div>
                        </div>

                        <?php ($decimal_point_settings = \App\CPU\Helpers::get_business_settings('decimal_point_settings')); ?>

                        <div id="ajax-products-view">
                            <?php echo $__env->make('theme-views.product._ajax-products',['products'=>$products,'decimal_point_settings'=>$decimal_point_settings], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </main>

    <span id="filter_url" data-url="<?php echo e(url('/')); ?>/products"></span>
    <span id="product_view_style_url" data-url="<?php echo e(route('product_view_style')); ?>"></span>
    <input type="hidden" value="<?php echo e($data['id']); ?>" id="data_id">
    <input type="hidden" value="<?php echo e($data['name']); ?>" id="data_name">
    <input type="hidden" value="<?php echo e($data['data_from']); ?>" id="data_from">
    <input type="hidden" value="<?php echo e($data['min_price']); ?>" id="data_min_price">
    <input type="hidden" value="<?php echo e($data['max_price']); ?>" id="data_max_price">

    <!-- End Main Content -->
<?php $__env->stopSection(); ?>


<?php echo $__env->make('theme-views.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tikka\resources\themes\theme_aster/theme-views/product/view.blade.php ENDPATH**/ ?>
