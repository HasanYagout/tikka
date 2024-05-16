<?php $__env->startSection('title', \App\CPU\translate('Product Edit')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <link href="<?php echo e(asset('public/assets/back-end/css/tags-input.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('select2/css/select2.min.css')); ?>" rel="stylesheet">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Page Heading -->
    <div class="content container-fluid">
        <!-- Page Title -->
        <div class="d-flex flex-wrap gap-2 align-items-center mb-3">
            <h2 class="h1 mb-0 d-flex gap-2">
                <img src="<?php echo e(asset('public/assets/back-end/img/inhouse-product-list.png')); ?>" alt="">
                <?php echo e(\App\CPU\translate('Product')); ?> <?php echo e(\App\CPU\translate('Edit')); ?>

            </h2>
        </div>
        <!-- End Page Title -->

        <!-- Content Row -->
        <div class="row">
            <div class="col-md-12">
                <form class="product-form" action="<?php echo e(route('admin.product.update',$product->id)); ?>" method="post"
                      style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;"
                      enctype="multipart/form-data"
                      id="product_form">
                    <?php echo csrf_field(); ?>

                    <div class="card">
                        <div class="px-4 pt-3">
                            <?php ($language=\App\Models\BusinessSetting::where('type','pnc_language')->first()); ?>
                            <?php ($language = $language->value ?? null); ?>
                            <?php ($default_lang = 'en'); ?>

                            <?php ($default_lang = json_decode($language)[0]); ?>
                            <ul class="nav nav-tabs w-fit-content mb-4">
                                <?php $__currentLoopData = json_decode($language); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="nav-item text-capitalize">
                                        <a class="nav-link lang_link <?php echo e($lang == $default_lang? 'active':''); ?>" href="#"
                                           id="<?php echo e($lang); ?>-link"><?php echo e(\App\CPU\Helpers::get_language_name($lang).'('.strtoupper($lang).')'); ?></a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>

                        <div class="card-body">
                            <?php $__currentLoopData = json_decode($language); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                if (count($product['translations'])) {
                                    $translate = [];
                                    foreach ($product['translations'] as $t) {

                                        if ($t->locale == $lang && $t->key == "name") {
                                            $translate[$lang]['name'] = $t->value;
                                        }
                                        if ($t->locale == $lang && $t->key == "description") {
                                            $translate[$lang]['description'] = $t->value;
                                        }

                                    }
                                }
                                ?>
                                <div class="<?php echo e($lang != 'en'? 'd-none':''); ?> lang_form" id="<?php echo e($lang); ?>-form">
                                    <div class="form-group">
                                        <label class="title-color" for="<?php echo e($lang); ?>_name"><?php echo e(\App\CPU\translate('name')); ?><span class="text-danger">*</span>
                                            (<?php echo e(strtoupper($lang)); ?>)</label>
                                        <input type="text" <?php echo e($lang == 'en'? 'required':''); ?> name="name[]"
                                               id="<?php echo e($lang); ?>_name"
                                               value="<?php echo e($translate[$lang]['name']??$product['name']); ?>"
                                               class="form-control" placeholder="<?php echo e(\App\CPU\translate('New Product')); ?>" required>
                                    </div>
                                    <input type="hidden" name="lang[]" value="<?php echo e($lang); ?>">
                                    <div class="form-group pt-4">
                                        <label class="title-color"><?php echo e(\App\CPU\translate('description')); ?>

                                            (<?php echo e(strtoupper($lang)); ?>)</label>
                                        <textarea name="description[]" class="textarea editor-textarea"
                                                  ><?php echo $translate[$lang]['description']??$product['details']; ?></textarea>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>

                    <div class="card mt-2 rest-part">
                        <div class="card-header">
                            <h4 class="mb-0"><?php echo e(\App\CPU\translate('General Info')); ?></h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 form-group">
                                    <label for="name" class="title-color"><?php echo e(\App\CPU\translate('product_type')); ?></label>
                                    <select name="product_type" id="product_type" class="form-control" required>
                                        <option value="physical" <?php echo e($product->product_type=='physical' ? 'selected' : ''); ?>><?php echo e(\App\CPU\translate('physical')); ?></option>
                                        <?php if($digital_product_setting): ?>
                                        <option value="digital" <?php echo e($product->product_type=='digital' ? 'selected' : ''); ?>><?php echo e(\App\CPU\translate('digital')); ?></option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                                <div class="col-md-4" id="digital_product_type_show">
                                    <label for="digital_product_type" class="title-color"><?php echo e(\App\CPU\translate("digital_product_type")); ?></label>
                                    <select name="digital_product_type" id="digital_product_type" class="form-control" required>
                                        <option value="<?php echo e(old('category_id')); ?>" <?php echo e(!$product->digital_product_type ? 'selected' : ''); ?> disabled>---Select---</option>
                                        <option value="ready_after_sell" <?php echo e($product->digital_product_type=='ready_after_sell' ? 'selected' : ''); ?>><?php echo e(\App\CPU\translate("Ready After Sell")); ?></option>
                                        <option value="ready_product" <?php echo e($product->digital_product_type=='ready_product' ? 'selected' : ''); ?>><?php echo e(\App\CPU\translate("Ready Product")); ?></option>
                                    </select>
                                </div>
                                <div class="col-md-4" id="digital_file_ready_show">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="digital_file_ready" class="title-color"><?php echo e(\App\CPU\translate("ready_product_upload")); ?></label>
                                            <input type="file" name="digital_file_ready" id="digital_file_ready" class="form-control">
                                            <div class="mt-1 text-info">File type: jpg, jpeg, png, gif, zip, pdf</div>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="h-100 mt-5">
                                                <a href="<?php echo e(asset("public/storage/product/digital-product/$product->digital_file_ready")); ?>" target="_blank"><?php echo e($product->digital_file_ready); ?></a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 form-group">
                                    <label for="name" class="title-color"><?php echo e(\App\CPU\translate('Category')); ?></label>
                                    <select
                                        class="js-example-basic-multiple js-states js-example-responsive form-control"
                                        name="category_id"
                                        id="category_id"
                                        onchange="getRequest('<?php echo e(url('/')); ?>/admin/product/get-categories?parent_id='+this.value,'sub-category-select','select')">
                                        <option value="0" selected disabled>---<?php echo e(\App\CPU\translate('Select')); ?>---</option>
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option
                                                value="<?php echo e($category['id']); ?>" <?php echo e($category->id==$product_category[0]->id ? 'selected' : ''); ?> ><?php echo e($category['name']); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="name" class="title-color"><?php echo e(\App\CPU\translate('Sub Category')); ?></label>
                                    <select
                                        class="js-example-basic-multiple js-states js-example-responsive form-control"
                                        name="sub_category_id" id="sub-category-select"
                                        data-id="<?php echo e(count($product_category)>=2?$product_category[1]->id:''); ?>"
                                        onchange="getRequest('<?php echo e(url('/')); ?>/admin/product/get-categories?parent_id='+this.value,'sub-sub-category-select','select')">
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="name" class="title-color"><?php echo e(\App\CPU\translate('Sub Sub Category')); ?></label>

                                    <select
                                        class="js-example-basic-multiple js-states js-example-responsive form-control"
                                        data-id="<?php echo e(count($product_category)>=3?$product_category[2]->id:''); ?>"
                                        name="sub_sub_category_id" id="sub-sub-category-select">

                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="title-color"
                                               for="exampleFormControlInput1"><?php echo e(\App\CPU\translate('product_code_sku')); ?>

                                            <span class="text-danger">*</span>
                                            <a class="style-one-pro cursor-pointer" onclick="document.getElementById('generate_number').value = getRndInteger()"><?php echo e(\App\CPU\translate('generate')); ?>

                                                <?php echo e(\App\CPU\translate('code')); ?></a></label>
                                        <input type="text" id="generate_number" name="code"
                                               class="form-control"  value="<?php echo e($product->code); ?>" required>
                                    </div>
                                </div>
                                <?php if($brand_setting): ?>
                                    <div class="col-md-4">
                                        <label for="name" class="title-color"><?php echo e(\App\CPU\translate('Brand')); ?></label>
                                        <select
                                            class="js-example-basic-multiple js-states js-example-responsive form-control"
                                            name="brand_id">
                                            <option value="<?php echo e(null); ?>" selected disabled>---<?php echo e(\App\CPU\translate('Select')); ?>---</option>
                                            <?php $__currentLoopData = $br; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option
                                                    value="<?php echo e($b['id']); ?>" <?php echo e($b->id==$product->brand_id ? 'selected' : ''); ?> ><?php echo e($b['name']); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                <?php endif; ?>

                                <div class="col-md-4 physical_product_show">
                                    <div class="form-group">
                                        <label for="name" class="title-color"><?php echo e(\App\CPU\translate('Unit')); ?></label>
                                        <select
                                            class="js-example-basic-multiple js-states js-example-responsive form-control"
                                            name="unit">
                                            <?php $__currentLoopData = \App\CPU\Helpers::units(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $x): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option
                                                    value=<?php echo e($x); ?> <?php echo e($product->unit==$x ? 'selected' : ''); ?>><?php echo e($x); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-2 rest-part physical_product_show">
                        <div class="card-header">
                            <h4 class="mb-0"><?php echo e(\App\CPU\translate('Variation')); ?></h4>
                        </div>
                        <div class="card-body">
                            <div class="row align-items-end">
                                <div class="col-md-6">
                                    <div class="mb-3 d-flex align-items-center gap-2">
                                        <label class="mb-0 title-color" for="switcher">
                                            <?php echo e(\App\CPU\translate('Colors')); ?> :
                                        </label>
                                        <label class="switcher title-color">
                                            <input type="checkbox" class="switcher_input" id="color_switcher"
                                                name="colors_active" <?php echo e(count($product['colors'])>0?'checked':''); ?>>
                                            <span class="switcher_control"></span>
                                        </label>
                                    </div>

                                    <div class="form-group">
                                        <select
                                            class="js-example-basic-multiple js-states js-example-responsive form-control color-var-select"
                                            name="colors[]" multiple="multiple"
                                            id="colors-selector" <?php echo e(count($product['colors'])>0?'':'disabled'); ?>>
                                            <?php $__currentLoopData = \App\Models\Color::orderBy('name', 'asc')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option
                                                    value=<?php echo e($color->code); ?> <?php echo e(in_array($color->code,$product['colors'])?'selected':''); ?>>
                                                    <?php echo e($color['name']); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 form-group">
                                    <label for="attributes" class="pb-1 title-color">
                                        <?php echo e(\App\CPU\translate('Attributes')); ?> :
                                    </label>
                                    <select
                                        class="js-example-basic-multiple js-states js-example-responsive form-control"
                                        name="choice_attributes[]" id="choice_attributes" multiple="multiple">
                                        <?php $__currentLoopData = \App\Models\Attribute::orderBy('name', 'asc')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($product['attributes']!='null'): ?>
                                                <option
                                                    value="<?php echo e($a['id']); ?>" <?php echo e(in_array($a->id,json_decode($product['attributes'],true))?'selected':''); ?>>
                                                    <?php echo e($a['name']); ?>

                                                </option>
                                            <?php else: ?>
                                                <option value="<?php echo e($a['id']); ?>"><?php echo e($a['name']); ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                                <div class="col-md-12 mt-2 mb-2">
                                    <div class="customer_choice_options" id="customer_choice_options">
                                        <?php echo $__env->make('admin.product.partials._choices',['choice_no'=>json_decode($product['attributes']),'choice_options'=>json_decode($product['choice_options'],true)], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-2 rest-part">
                        <div class="card-header">
                            <h4 class="mb-0"><?php echo e(\App\CPU\translate('Product price & stock')); ?></h4>
                        </div>
                        <div class="card-body">
                            <div class="row align-items-end">
                                <div class="col-md-6 form-group">
                                    <label class="title-color"><?php echo e(\App\CPU\translate('Unit price')); ?></label>
                                    <input type="number" min="0" step="0.01"
                                            placeholder="<?php echo e(\App\CPU\translate('Unit price')); ?>"
                                            name="unit_price" class="form-control"
                                            value=<?php echo e(\App\CPU\Convert::default($product->unit_price)); ?> required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label class="title-color"><?php echo e(\App\CPU\translate('Purchese price')); ?></label>
                                    <input type="number" min="0" step="0.01"
                                            placeholder="<?php echo e(\App\CPU\translate('Purchase price')); ?>"
                                            name="purchase_price" class="form-control"
                                            value=<?php echo e(\App\CPU\Convert::default($product->purchase_price)); ?> required>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label class="title-color"><?php echo e(\App\CPU\translate('Tax')); ?></label>
                                    <label class="text-info title-color"><?php echo e(\App\CPU\translate('Percent')); ?> ( % )</label>
                                    <input type="number" min="0" value=<?php echo e($product->tax); ?> step="0.01"
                                            placeholder="<?php echo e(\App\CPU\translate('Tax')); ?>" name="tax"
                                            class="form-control" required>
                                    <input name="tax_type" value="percent" class="d-none">
                                </div>

                                <div class="col-md-2 form-group">
                                    <label class="title-color"><?php echo e(\App\CPU\translate('Tax_Model')); ?></label>
                                    <select name="tax_model" class="form-control" required>
                                        <option value="include" <?php echo e($product->tax_model == 'include' ? 'selected':''); ?>><?php echo e(\App\CPU\translate("include")); ?></option>
                                        <option value="exclude" <?php echo e($product->tax_model == 'exclude' ? 'selected':''); ?>><?php echo e(\App\CPU\translate("exclude")); ?></option>
                                    </select>
                                </div>

                                <div class="col-md-4 form-group">
                                    <label class="title-color"><?php echo e(\App\CPU\translate('Discount')); ?></label>
                                    <input type="number" min="0"
                                            value=<?php echo e($product->discount_type=='flat'?\App\CPU\Convert::default($product->discount): $product->discount); ?> step="0.01"
                                            placeholder="<?php echo e(\App\CPU\translate('Discount')); ?>" name="discount"
                                            class="form-control" required>
                                </div>
                                <div class="col-md-2 form-group">
                                    <label class="title-color"><?php echo e(\App\CPU\translate('discount_type')); ?> </label>
                                    <select
                                        class="form-control"
                                        name="discount_type">
                                        <option
                                            value="percent" <?php echo e($product['discount_type']=='percent'?'selected':''); ?>><?php echo e(\App\CPU\translate('Percent')); ?></option>
                                        <option
                                            value="flat" <?php echo e($product['discount_type']=='flat'?'selected':''); ?>><?php echo e(\App\CPU\translate('Flat')); ?></option>

                                    </select>
                                </div>
                                <div class="col-12 sku_combination table-responsive form-group" id="sku_combination">
                                    <?php echo $__env->make('admin.product.partials._edit_sku_combinations',['combinations'=>json_decode($product['variation'],true)], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="col-md-3 form-group physical_product_show" id="quantity">
                                    <label class="title-color"><?php echo e(\App\CPU\translate('total')); ?> <?php echo e(\App\CPU\translate('Quantity')); ?></label>
                                    <input type="number" min="0" value=<?php echo e($product->current_stock); ?> step="1"
                                            placeholder="<?php echo e(\App\CPU\translate('Quantity')); ?>"
                                            name="current_stock" class="form-control" required>
                                </div>
                                <div class="col-md-3 form-group" id="minimum_order_qty">
                                    <label class="title-color"><?php echo e(\App\CPU\translate('minimum_order_quantity')); ?></label>
                                    <input type="number" min="1" value=<?php echo e($product->minimum_order_qty); ?> step="1"
                                            placeholder="<?php echo e(\App\CPU\translate('minimum_order_quantity')); ?>"
                                            name="minimum_order_qty" class="form-control" required>
                                </div>
                                <div class="col-md-3 form-group physical_product_show" id="shipping_cost">
                                    <label class="title-color"><?php echo e(\App\CPU\translate('shipping_cost')); ?> </label>
                                    <input type="number" min="0" value="<?php echo e(\App\CPU\Convert::default($product->shipping_cost)); ?>" step="1"
                                            placeholder="<?php echo e(\App\CPU\translate('shipping_cost')); ?>"
                                            name="shipping_cost" class="form-control" required>
                                </div>
                                <div class="col-md-3 form-group physical_product_show" id="shipping_cost">
                                    <label class="title-color"><?php echo e(\App\CPU\translate('shipping_cost_multiply_with_quantity')); ?> </label>
                                    <label class="switcher title-color">
                                        <input class="switcher_input" type="checkbox" name="multiplyQTY"
                                               id="" <?php echo e($product->multiply_qty == 1?'checked':''); ?>>
                                        <span class="switcher_control"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-2 mb-2 rest-part">
                        <div class="card-header">
                            <h5 class="card-title">
                                <span class="card-header-icon"><i class="tio-label"></i></span>
                                <span><?php echo e(\App\CPU\translate('tags')); ?></span>
                            </h5>
                        </div>
                        <div class="card-body pb-0">
                            <div class="row g-2">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="title-color"><?php echo e(\App\CPU\translate('search_tags')); ?></label>
                                        <input type="text" class="form-control" name="tags" value="<?php $__currentLoopData = $product->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($c->tag.','); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>" data-role="tagsinput">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-2 mb-2 rest-part">
                        <div class="card-header">
                            <h4 class="mb-0"><?php echo e(\App\CPU\translate('seo_section')); ?></h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label class="title-color"><?php echo e(\App\CPU\translate('Meta Title')); ?></label>
                                    <input type="text" name="meta_title" value="<?php echo e($product['meta_title']); ?>" placeholder="" class="form-control">
                                </div>

                                <div class="col-md-8 form-group">
                                    <label class="title-color"><?php echo e(\App\CPU\translate('Meta Description')); ?></label>
                                    <textarea rows="10" type="text" name="meta_description" class="form-control"><?php echo e($product['meta_description']); ?></textarea>
                                </div>

                                <div class="col-md-4 form-group">
                                    <div class="">
                                        <label class="title-color"><?php echo e(\App\CPU\translate('Meta Image')); ?></label>
                                    </div>
                                    <div class="__coba-aspect">
                                        <div class="row g-2" id="meta_img">
                                            <div class="col-sm-6 col-md-12 col-lg-6">
                                                <img class="w-100" height="auto" onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                                        src="<?php echo e(asset("public/storage/product/meta")); ?>/<?php echo e($product['meta_image']); ?>" alt="Meta image">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-2 rest-part __coba-aspect">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 mb-4">
                                    <div class="mb-2">
                                        <label class="title-color mb-0"><?php echo e(\App\CPU\translate('Youtube video link')); ?></label>
                                        <span class="text-info"> ( <?php echo e(\App\CPU\translate('optional, please provide embed link not direct link')); ?>. )</span>
                                    </div>
                                    <input type="text" value="<?php echo e($product['video_url']); ?>" name="video_link"
                                           placeholder="<?php echo e(\App\CPU\translate('EX')); ?> : https://www.youtube.com/embed/5R06LRdUCSE"
                                           class="form-control" required>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label class="title-color"><?php echo e(\App\CPU\translate('Upload product images')); ?></label>
                                        <span class="text-info"><span class="text-danger">*</span> ( <?php echo e(\App\CPU\translate('ratio')); ?> 1:1 )</span>
                                    </div>
                                    <div id="color_wise_image" class="row g-2 mb-4">
                                        <div class="col-12">
                                            <div class="row g-2" id="color_wise_existing_image"></div>
                                        </div>
                                        <div class="col-12">
                                            <div class="row" id="color_wise_image_field"></div>
                                        </div>
                                    </div>
                                    <div class="coba-area">
                                        <div class="row g-2" id="coba">
                                            <?php if(count($product->colors) == 0): ?>
                                                <?php $__currentLoopData = json_decode($product->images); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="col-6 col-lg-6 col-xl-6">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <img class="w-100" height="auto"
                                                                     onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                                                     src="<?php echo e(asset("public/storage/product/$photo")); ?>"
                                                                     alt="Product image">
                                                                <a href="<?php echo e(route('admin.product.remove-image',['id'=>$product['id'],'name'=>$photo])); ?>"
                                                                   class="btn btn-danger btn-block"><?php echo e(\App\CPU\translate('Remove')); ?></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                                <?php if($product->color_image): ?>
                                                    <?php $__currentLoopData = json_decode($product->color_image); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($photo->color == null): ?>
                                                        <div class="col-6 col-lg-6 col-xl-6">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <img class="w-100" height="auto"
                                                                         onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                                                         src="<?php echo e(asset("public/storage/product/$photo->image_name")); ?>"
                                                                         alt="Product image">
                                                                    <a href="<?php echo e(route('admin.product.remove-image',['id'=>$product['id'],'name'=>$photo->image_name,'color'=>'null'])); ?>"
                                                                       class="btn btn-danger btn-block"><?php echo e(\App\CPU\translate('Remove')); ?></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php else: ?>
                                                    <?php $__currentLoopData = json_decode($product->images); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="col-6 col-lg-6 col-xl-6">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <img class="w-100" height="auto"
                                                                         onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                                                         src="<?php echo e(asset("public/storage/product/$photo")); ?>"
                                                                         alt="Product image">
                                                                    <a href="<?php echo e(route('admin.product.remove-image',['id'=>$product['id'],'name'=>$photo])); ?>"
                                                                       class="btn btn-danger btn-block"><?php echo e(\App\CPU\translate('Remove')); ?></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label for="name" class="title-color"><?php echo e(\App\CPU\translate('Upload thumbnail')); ?></label>
                                        <span class="text-info"><span class="text-danger">*</span> ( <?php echo e(\App\CPU\translate('ratio')); ?> 1:1 )</span>
                                    </div>

                                    <div class="row gy-3" id="thumbnail">
                                        <div class="col-sm-6 col-md-12 col-lg-6">
                                            <img class="w-100" height="auto" onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                                    src="<?php echo e(asset("public/storage/product/thumbnail")); ?>/<?php echo e($product['thumbnail']); ?>" alt="Product image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end pt-3">
                                <?php if($product->request_status == 2): ?>
                                    <button type="button" onclick="check()" class="btn btn--primary"><?php echo e(\App\CPU\translate('Update & Publish')); ?></button>
                                <?php else: ?>
                                    <button type="button" onclick="check()" class="btn btn--primary"><?php echo e(\App\CPU\translate('Update')); ?></button>
                                <?php endif; ?>
                            </div>

                            <input type="hidden" id="color_image" value="<?php echo e($product->color_image); ?>">
                            <input type="hidden" id="images" value="<?php echo e($product->images); ?>">
                            <input type="hidden" id="product_id" value="<?php echo e($product->id); ?>">
                            <input type="hidden" id="remove_url" value="<?php echo e(route('admin.product.remove-image')); ?>">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script_2'); ?>
    <script src="<?php echo e(asset('public/assets/back-end')); ?>/js/tags-input.min.js"></script>
    <script src="<?php echo e(asset('public/assets/back-end/js/spartan-multi-image-picker.js')); ?>"></script>
    <script>
        var colors = <?php echo e(count($product->colors)); ?>;
        var imageCount = <?php echo e(10-count(json_decode($product->images))); ?>;
        var thumbnail = '<?php echo e(\App\CPU\ProductManager::product_image_path('thumbnail').'/'.$product->thumbnail??asset('public/assets/back-end/img/400x400/img2.jpg')); ?>';
        $(function () {
            if ( imageCount > 0) {
                $("#coba").spartanMultiImagePicker({
                    fieldName: 'images[]',
                    maxCount: colors===0 ? 10:imageCount,
                    rowHeight: 'auto',
                    groupClassName: 'col-6 col-lg-6 col-xl-6',
                    maxFileSize: '',
                    placeholderImage: {
                        image: '<?php echo e(asset('public/assets/back-end/img/400x400/img2.jpg')); ?>',
                        width: '100%',
                    },
                    dropFileLabel: "Drop Here",
                    onAddRow: function (index, file) {

                    },
                    onRenderedPreview: function (index) {

                    },
                    onRemoveRow: function (index) {

                    },
                    onExtensionErr: function (index, file) {
                        toastr.error('<?php echo e(\App\CPU\translate('Please only input png or jpg type file')); ?>', {
                            CloseButton: true,
                            ProgressBar: true
                        });
                    },
                    onSizeErr: function (index, file) {
                        toastr.error('<?php echo e(\App\CPU\translate('File size too big')); ?>', {
                            CloseButton: true,
                            ProgressBar: true
                        });
                    }
                });
            }

            $("#thumbnail").spartanMultiImagePicker({
                fieldName: 'image',
                maxCount: 1,
                rowHeight: 'auto',
                groupClassName: 'col-6',
                maxFileSize: '',
                placeholderImage: {
                    image: '<?php echo e(asset('public/assets/back-end/img/400x400/img2.jpg')); ?>',
                    width: '100%',
                },
                dropFileLabel: "Drop Here",
                onAddRow: function (index, file) {

                },
                onRenderedPreview: function (index) {

                },
                onRemoveRow: function (index) {

                },
                onExtensionErr: function (index, file) {
                    toastr.error('<?php echo e(\App\CPU\translate('Please only input png or jpg type file')); ?>', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                },
                onSizeErr: function (index, file) {
                    toastr.error('<?php echo e(\App\CPU\translate('File size too big')); ?>', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                }
            });

            $("#meta_img").spartanMultiImagePicker({
                fieldName: 'meta_image',
                maxCount: 1,
                rowHeight: 'auto',
                groupClassName: 'col-6',
                maxFileSize: '',
                placeholderImage: {
                    image: '<?php echo e(asset('public/assets/back-end/img/400x400/img2.jpg')); ?>',
                    width: '100%',
                },
                dropFileLabel: "Drop Here",
                onAddRow: function (index, file) {

                },
                onRenderedPreview: function (index) {

                },
                onRemoveRow: function (index) {

                },
                onExtensionErr: function (index, file) {
                    toastr.error('<?php echo e(\App\CPU\translate('Please only input png or jpg type file')); ?>', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                },
                onSizeErr: function (index, file) {
                    toastr.error('<?php echo e(\App\CPU\translate('File size too big')); ?>', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                }
            });
        });

        $('#color_switcher').click(function(){
            let checkBoxes = $("#color_switcher");
            if ($('#color_switcher').prop('checked')) {
                $('#color_wise_image').show();
            } else {
                $('#color_wise_image').hide();
            }
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#viewer').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#customFileUpload").change(function () {
            readURL(this);
        });

        $(".js-example-theme-single").select2({
            theme: "classic"
        });

        $(".js-example-responsive").select2({
            width: 'resolve'
        });
    </script>

    <script>
        function getRequest(route, id, type) {
            $.get({
                url: route,
                dataType: 'json',
                success: function (data) {
                    if (type == 'select') {
                        $('#' + id).empty().append(data.select_tag);
                    }
                },
            });
        }

        $('input[name="colors_active"]').on('change', function () {
            if (!$('input[name="colors_active"]').is(':checked')) {
                $('#colors-selector').prop('disabled', true);
            } else {
                $('#colors-selector').prop('disabled', false);
            }
        });

        $('#choice_attributes').on('change', function () {
            $('#customer_choice_options').html(null);
            $.each($("#choice_attributes option:selected"), function () {
                //console.log($(this).val());
                add_more_customer_choice_option($(this).val(), $(this).text());
            });
        });

        function add_more_customer_choice_option(i, name) {
            let n = name.split(' ').join('');
            $('#customer_choice_options').append('<div class="row"><div class="col-md-3"><input type="hidden" name="choice_no[]" value="' + i + '"><input type="text" class="form-control" name="choice[]" value="' + n + '" placeholder="<?php echo e(\App\CPU\translate('Choice Title')); ?>" readonly></div><div class="col-lg-9"><input type="text" class="form-control" name="choice_options_' + i + '[]" placeholder="<?php echo e(\App\CPU\translate('Enter choice values')); ?>" data-role="tagsinput" onchange="update_sku()"></div></div>');
            $("input[data-role=tagsinput], select[multiple][data-role=tagsinput]").tagsinput();
        }

        setTimeout(function () {
            $('.call-update-sku').on('change', function () {
                update_sku();
            });
        }, 2000)

        $('#colors-selector').on('change', function () {
            update_sku();
            let checkBoxes = $("#color_switcher");
            if ($('#color_switcher').prop('checked')) {
                $('#color_wise_image').show();
                color_wise_image($('#colors-selector'));
            }else{
                $('#color_wise_image').hide();
            }
        });

        $('input[name="unit_price"]').on('keyup', function () {
            let product_type = $('#product_type').val();
            if(product_type === 'physical') {
                update_sku();
            }
        });

        function update_sku() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: '<?php echo e(route('admin.product.sku-combination')); ?>',
                data: $('#product_form').serialize(),
                success: function (data) {
                    $('#sku_combination').html(data.view);
                    update_qty();
                    if (data.length > 1) {
                        $('#quantity').hide();
                    } else {
                        $('#quantity').show();
                    }
                }
            });
        }

        function color_wise_image(t){
            let colors = t.val();
            let color_image = $('#color_image').val() ? $.parseJSON($('#color_image').val()):[];
            let images = $.parseJSON($('#images').val());
            var product_id = $('#product_id').val();
            let remove_url = $('#remove_url').val();

            let color_image_value = $.map(color_image, function(item) {
                return item.color;
            });

            $('#color_wise_existing_image').html('')
            $('#color_wise_image_field').html('')

            $.each(colors, function(key, value){
                let value_id = value.replace('#','');
                let in_array_image = $.inArray(value_id, color_image_value);
                let input_image_name = "color_image_"+value_id;

                $.each(color_image, function (color_key, color_value){
                    if((in_array_image !== -1) && (color_value['color'] === value_id) ){
                        let image_name = color_value['image_name'];
                        let exist_image_html = `
                            <div class="col-6 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                    <span class="upload--icon" style="background: #${color_value['color']} ">
                                    <i class="tio-done"></i>
                                    </span>
                                        <img class="w-100" height="auto"
                                             onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                             src="<?php echo e(asset('storage/product/`+image_name+`')); ?>"
                                             alt="Product image">
                                        <a href="`+remove_url+`?id=`+product_id+`&name=`+image_name+`&color=`+color_value['color']+`"
                                           class="btn btn-danger btn-block"><?php echo e(\App\CPU\translate('Remove')); ?></a>
                                    </div>
                                </div>
                            </div>`;
                        $('#color_wise_existing_image').append(exist_image_html)
                    }
                });
            });

            $.each(colors, function(key, value){
                let value_id = value.replace('#','');
                let in_array_image = $.inArray(value_id, color_image_value);
                let input_image_name = "color_image_"+value_id;

                if(in_array_image === -1) {
                    let html = ` <div class='col-6 col-md-6'> <label style='border: 2px dashed #ddd; border-radius: 3px; cursor: pointer; text-align: center; overflow: hidden; padding: 5px; margin-top: 5px; margin-bottom : 5px; position : relative; display: flex; align-items: center; margin: auto; justify-content: center; flex-direction: column;'>
                            <span class="upload--icon" style="background: ${value}">
                            <i class="tio-edit"></i>
                                <input type="file" name="` + input_image_name + `" id="` + value_id + `" class="d-none" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*" required="">
                            </span>
                            <img src="<?php echo e(asset('public/assets/back-end/img/400x400/img2.jpg')); ?>" style="object-fit: cover;aspect-ratio:1"  alt="public/img">
                          </label> </div>`;
                    $('#color_wise_image_field').append(html)

                    $("#color_wise_image input[type='file']").each(function () {

                        var $this = $(this).closest('label');

                        function proPicURL(input) {
                            if (input.files && input.files[0]) {
                                var uploadedFile = new FileReader();
                                uploadedFile.onload = function (e) {
                                    $this.find('img').attr('src', e.target.result);
                                    $this.fadeIn(300);
                                };
                                uploadedFile.readAsDataURL(input.files[0]);
                            }
                        }

                        $(this)
                            .on("change", function () {
                                proPicURL(this);
                            });
                    });
                }
            });
        }

        $(document).ready(function () {
            setTimeout(function () {
                let category = $("#category_id").val();
                let sub_category = $("#sub-category-select").attr("data-id");
                let sub_sub_category = $("#sub-sub-category-select").attr("data-id");
                getRequest('<?php echo e(url('/')); ?>/admin/product/get-categories?parent_id=' + category + '&sub_category=' + sub_category, 'sub-category-select', 'select');
                getRequest('<?php echo e(url('/')); ?>/admin/product/get-categories?parent_id=' + sub_category + '&sub_category=' + sub_sub_category, 'sub-sub-category-select', 'select');
            }, 100)
            // color select select2
            $('.color-var-select').select2({
                templateResult: colorCodeSelect,
                templateSelection: colorCodeSelect,
                escapeMarkup: function (m) {
                    return m;
                }
            });


            let checkBoxes = $("#color_switcher");
            if ($('#color_switcher').prop('checked')) {
                $('#color_wise_image').show();
                color_wise_image($('#colors-selector'));
            } else {
                $('#color_wise_image').hide();
            }

            function colorCodeSelect(state) {
                var colorCode = $(state.element).val();
                if (!colorCode) return state.text;
                return "<span class='color-preview' style='background-color:" + colorCode + ";'></span>" + state.text;
            }
        });
    </script>

    <script>
        function check() {
            for (instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].updateElement();
            }
            var formData = new FormData(document.getElementById('product_form'));
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.post({
                url: '<?php echo e(route('admin.product.update',$product->id)); ?>',
                data: formData,
                contentType: false,
                processData: false,
                success: function (data) {
                    if (data.errors) {
                        for (var i = 0; i < data.errors.length; i++) {
                            toastr.error(data.errors[i].message, {
                                CloseButton: true,
                                ProgressBar: true
                            });
                        }
                    } else {
                        toastr.success('product updated successfully!', {
                            CloseButton: true,
                            ProgressBar: true
                        });
                        $('#product_form').submit();
                    }
                }
            });
        };
    </script>

    <script>
        update_qty();

        function update_qty() {
            var total_qty = 0;
            var qty_elements = $('input[name^="qty_"]');
            for (var i = 0; i < qty_elements.length; i++) {
                total_qty += parseInt(qty_elements.eq(i).val());
            }
            if (qty_elements.length > 0) {

                $('input[name="current_stock"]').attr("readonly", true);
                $('input[name="current_stock"]').val(total_qty);
            } else {
                $('input[name="current_stock"]').attr("readonly", false);
            }
        }

        $('input[name^="qty_"]').on('keyup', function () {
            var total_qty = 0;
            var qty_elements = $('input[name^="qty_"]');
            for (var i = 0; i < qty_elements.length; i++) {
                total_qty += parseInt(qty_elements.eq(i).val());
            }
            $('input[name="current_stock"]').val(total_qty);
        });
    </script>

    <script>
        $(".lang_link").click(function (e) {
            e.preventDefault();
            $(".lang_link").removeClass('active');
            $(".lang_form").addClass('d-none');
            $(this).addClass('active');

            let form_id = this.id;
            let lang = form_id.split("-")[0];
            console.log(lang);
            $("#" + lang + "-form").removeClass('d-none');
            if (lang == '<?php echo e($default_lang); ?>') {
                $(".rest-part").removeClass('d-none');
            } else {
                $(".rest-part").addClass('d-none');
            }
        })

        $(document).ready(function(){
            product_type();
            digital_product_type();

            $('#product_type').change(function(){
                product_type();
            });

            $('#digital_product_type').change(function(){
                digital_product_type();
            });
        });

        function product_type(){
            let product_type = $('#product_type').val();

            if(product_type === 'physical'){
                $('#digital_product_type_show').hide();
                $('#digital_file_ready_show').hide();
                $('.physical_product_show').show();
                $("#digital_product_type").val($("#digital_product_type option:first").val());
                $("#digital_file_ready").val('');
            }else if(product_type === 'digital'){
                $('#digital_product_type_show').show();
                $('.physical_product_show').hide();

            }
        }

        function digital_product_type(){
            let digital_product_type = $('#digital_product_type').val();
            if (digital_product_type === 'ready_product') {
                $('#digital_file_ready_show').show();
            } else if (digital_product_type === 'ready_after_sell') {
                $('#digital_file_ready_show').hide();
                $("#digital_file_ready").val('');
            }
        }
    </script>

    
    <script src="<?php echo e(asset('/')); ?>vendor/ckeditor/ckeditor/ckeditor.js"></script>
    <script src="<?php echo e(asset('/')); ?>vendor/ckeditor/ckeditor/adapters/jquery.js"></script>
    <script>
        $('.textarea').ckeditor({
            contentsLangDirection : '<?php echo e(Session::get('direction')); ?>',
        });
    </script>
    
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tikka\resources\views/admin/product/edit.blade.php ENDPATH**/ ?>