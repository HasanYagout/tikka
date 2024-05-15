<?php $__env->startSection('title', translate('Shopping_Details').' | '.$web_config['name']->value.' '.translate(' Ecommerce')); ?>
<?php $__env->startPush('css_or_js'); ?>
    <link rel="stylesheet" href="<?php echo e(theme_asset('assets/plugins/select2/css/select2.min.css')); ?>">
    <style>
        .select2-container--default{
            width: 100% !important;
            border-radius: 0.375rem;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Main Content -->
    <main class="main-content d-flex flex-column gap-3 py-3 mb-5">
        <div class="container">
            <h4 class="text-center mb-3"><?php echo e(translate('Shipping_Details')); ?></h4>

            <div class="row">
                <div class="col-lg-8 mb-3 mb-lg-0">
                    <div class="card h-100">
                        <div class="card-body  px-sm-4">
                            <div class="d-flex justify-content-center mb-30">
                                <ul class="cart-step-list">
                                    <li class="done"><span><i class="bi bi-check2"></i></span> <?php echo e(translate('cart')); ?></li>
                                    <li class="current"><span><i class="bi bi-check2"></i></span> <?php echo e(translate('Shipping_Details')); ?></li>
                                    <li><span><i class="bi bi-check2"></i></span> <?php echo e(translate('payment')); ?></li>
                                </ul>
                            </div>
                            <input type="hidden" id="physical_product" name="physical_product" value="<?php echo e($physical_product_view ? 'yes':'no'); ?>">
                            <input type="hidden" id="billing_input_enable" name="billing_input_enable" value="<?php echo e($billing_input_by_customer); ?>">

                            <?php if($physical_product_view): ?>
                                <form method="post" id="address-form">
                                    <h5 class="mb-3"><?php echo e(translate('Delivery_Information_Details')); ?></h5>

                                    <div class="d-flex flex-wrap justify-content-between gap-3 mb-3">
                                        <div class="d-flex flex-wrap gap-3 align-items-center">
                                            <h6><?php echo e(translate('Delivery_Address')); ?></h6>
                                        </div>
                                        <div class="d-flex flex-wrap gap-3 align-items-center">
                                            <a href="javascript:" type="button" data-bs-toggle="modal" data-bs-target="#shippingMapModal" class="btn-link text-primary"><?php echo e(translate('Set_Form_Map')); ?> <i class="bi bi-geo-alt-fill"></i></a>
                                            <a href="javascript:" type="button" data-bs-toggle="modal" data-bs-target="#shippingSavedAddressModal" class="btn-link text-primary"><?php echo e(translate('Select_From_Saved')); ?></a>
                                            <!-- shipping map modal -->
                                            <div class="modal fade" id="shippingMapModal" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <div class="product-quickview">
                                                                <button type="button" class="btn-close outside" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                <input id="pac-input" class="controls rounded __inline-46" title="<?php echo e(translate('search_your_location_here')); ?>" type="text" placeholder="<?php echo e(translate('search_here')); ?>"/>
                                                                <div class="dark-support rounded w-100 __h-14rem" id="location_map_canvas"></div>
                                                                <input type="hidden" id="latitude"
                                                                       name="latitude" class="form-control d-inline"
                                                                       placeholder="Ex : -94.22213" value="<?php echo e($default_location?$default_location['lat']:0); ?>" required readonly>
                                                                <input type="hidden"
                                                                       name="longitude" class="form-control"
                                                                       placeholder="Ex : 103.344322" id="longitude" value="<?php echo e($default_location?$default_location['lng']:0); ?>" required >
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="modal fade" id="shippingSavedAddressModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered justify-content-center">
                                            <div class="modal-content border-0">
                                                <div class="modal-header">
                                                    <h5 class="" id="contact_sellerModalLabel"><?php echo e(translate('Saved Addresses')); ?></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>

                                                <div class="modal-body custom-scrollbar">
                                                    <div class="product-quickview">
                                                        <div class="shipping-saved-addresses <?php echo e($shipping_addresses->count()<1 ? 'd--none':''); ?>">
                                                            <div class="row gy-3 text-dark py-4">
                                                                <?php $__currentLoopData = $shipping_addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <div class="col-md-12">
                                                                        <div class="card border-0">
                                                                            <div class="card-header bg-transparent gap-2 align-items-center d-flex flex-wrap justify-content-between">
                                                                                <label class="d-flex align-items-center gap-3 cursor-pointer mb-0">
                                                                                    <input type="radio" name="shipping_method_id" value="<?php echo e($address['id']); ?>" <?php echo e($key==0?'checked':''); ?>>
                                                                                    <h6><?php echo e($address['address_type']); ?></h6>
                                                                                </label>
                                                                                <div class="d-flex align-items-center gap-3">
                                                                                    <button type="button" onclick="location.href='<?php echo e(route('address-edit', ['id' => $address->id])); ?>'" class="p-0 bg-transparent border-0">
                                                                                        <img src="<?php echo e(theme_asset('assets/img/svg/location-edit.svg')); ?>" alt="" class="svg">
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="card-body">
                                                                                <address>
                                                                                    <dl class="mb-0 flexible-grid sm-down-1" style="--width: 5rem">
                                                                                        <dt><?php echo e(translate('name')); ?></dt>
                                                                                        <dd class="shipping-contact-person"><?php echo e($address['contact_person_name']); ?></dd>

                                                                                        <dt><?php echo e(translate('phone')); ?></dt>
                                                                                        <dd class="shipping-contact-phone"><a href="tel:<?php echo e($address['phone']); ?>" class="text-dark"><?php echo e($address['phone']); ?></a></dd>

                                                                                        <dt><?php echo e(translate('address')); ?></dt>
                                                                                        <dd><?php echo e($address['address']); ?>, <?php echo e($address['city']); ?>, <?php echo e($address['zip']); ?></dd>
                                                                                        <span class="shipping-contact-address d-none"><?php echo e($address['address']); ?></span>
                                                                                        <span class="shipping-contact-city d-none"><?php echo e($address['city']); ?></span>
                                                                                        <span class="shipping-contact-zip d-none"><?php echo e($address['zip']); ?></span>
                                                                                        <span class="shipping-contact-country d-none"><?php echo e($address['country']); ?></span>
                                                                                        <span class="shipping-contact-address_type d-none"><?php echo e($address['address_type']); ?></span>
                                                                                    </dl>
                                                                                </address>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo e(translate('close')); ?></button>
                                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal"><?php echo e(translate('save')); ?></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-body" id="collapseThree">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row mb-30">
                                                        <div class="col-sm-6">
                                                            <div class="form-group mb-3">
                                                                <label for="name"><?php echo e(translate('Contact_Person_Name')); ?></label>
                                                                <input type="text" name="contact_person_name" id="name" class="form-control" placeholder="Ex: Jhon Doe" <?php echo e($shipping_addresses->count()==0?'required':''); ?>>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group mb-3">
                                                                <label for="phone"><?php echo e(translate('phone')); ?></label>
                                                                <input type="tel" name="phone" id="phone" class="form-control" placeholder="Ex: +88 01000000000" <?php echo e($shipping_addresses->count()==0?'required':''); ?>>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group mb-3">
                                                                <label for="address_type"><?php echo e(translate('address')); ?> <?php echo e(translate('Type')); ?></label>
                                                                <select name="address_type" id="address_type" class="form-select">
                                                                    <option value="permanent"><?php echo e(translate('Permanent')); ?></option>
                                                                    <option value="home"><?php echo e(translate('Home')); ?></option>
                                                                    <option value="others"><?php echo e(translate('Others')); ?></option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group mb-3">
                                                                <label for="country"><?php echo e(translate('Country')); ?></label>
                                                                <select name="country" id="country" class="form-control select_picker select2">
                                                                    <?php $__empty_1 = true; $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                                        <option value="<?php echo e($country['name']); ?>"><?php echo e($country['name']); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                                        <option value=""><?php echo e(\App\CPU\translate('No_country_to_deliver')); ?></option>
                                                                    <?php endif; ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group mb-3">
                                                                <label for="city"><?php echo e(translate('city')); ?></label>
                                                                <input type="tel" name="city" id="city" placeholder="Ex: Dhaka" class="form-control"  <?php echo e($shipping_addresses->count()==0?'required':''); ?>>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group mb-3">
                                                                <label for="city"><?php echo e(translate('Zip_Code')); ?></label>
                                                                <?php if($zip_restrict_status == 1): ?>
                                                                    <select name="zip" id="zip" class="form-control select2 select_picker" data-live-search="true" required>
                                                                        <?php $__empty_1 = true; $__currentLoopData = $zip_codes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                                            <option value="<?php echo e($code->zipcode); ?>"><?php echo e($code->zipcode); ?></option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                                            <option value=""><?php echo e(\App\CPU\translate('No_zip_to_deliver')); ?></option>
                                                                        <?php endif; ?>
                                                                    </select>
                                                                <?php else: ?>
                                                                    <input type="text" class="form-control" id="zip" name="zip" placeholder="Ex: 1216" <?php echo e($shipping_addresses->count()==0?'required':''); ?>>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="form-group mb-3">
                                                                <label for="address"><?php echo e(translate('address')); ?></label>
                                                                <div class="form-control focus-border rounded d-flex align-items-center">
                                                                    <input type="text" name="address" id="address" class="flex-grow-1 text-dark bg-transparent border-0 focus-input" placeholder="<?php echo e(translate('your_address')); ?>" <?php echo e($shipping_addresses->count()==0?'required':''); ?>>

                                                                    <div class="border-start ps-3 pe-1" data-bs-toggle="modal" data-bs-target="#shippingMapModal">
                                                                        <i class="bi bi-compass-fill"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <label class="custom-checkbox align-items-center" id="save_address_label">
                                                                <input type="hidden" name="shipping_method_id" id="shipping_method_id" value="0">
                                                                <input type="checkbox" name="save_address" id="save_address">
                                                                <?php echo e(translate('Save_this_Address')); ?>

                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </form>
                            <?php endif; ?>

                            <?php if($billing_input_by_customer): ?>
                            <div class="mt-5 <?php echo e($billing_input_by_customer ? '':'d-none'); ?>">
                                <div class="bg-light rounded p-3 mt-20">
                                    <div class="d-flex flex-wrap justify-content-between gap-3">
                                        <div class="d-flex gap-3 align-items-center">
                                            <h6><?php echo e(translate('Billing_Address')); ?></h6>
                                        </div>

                                        <?php if($physical_product_view): ?>
                                            <label class="custom-checkbox">
                                                <?php echo e(translate('Same_as_Delivery_Address')); ?>

                                                <input type="checkbox" id="same_as_shipping_address" onclick="hide_billingAddress()"
                                                       name="same_as_shipping_address" class="billing-address-checkbox" <?php echo e($billing_input_by_customer==1?'':'checked'); ?>>
                                            </label>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <form method="post" id="billing-address-form">
                                    <div class="toggle-billing-address mt-3" id="hide_billing_address">
                                        <div class="d-flex flex-wrap justify-content-between gap-3 mb-3">
                                            <div class="d-flex flex-wrap gap-3 align-items-center">
                                            </div>
                                            <div class="d-flex flex-wrap gap-3 align-items-center">
                                                <a href="javascript:" data-bs-toggle="modal" data-bs-target="#billingMapModal" class="btn-link text-primary"><?php echo e(translate('Set_Form_Map')); ?> <i class="bi bi-geo-alt-fill"></i></a>
                                                <!-- billing map modal -->
                                                <div class="modal fade" id="billingMapModal" tabindex="-1" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <div class="product-quickview">
                                                                    <button type="button" class="btn-close outside" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    <input id="pac-input-billing" class="controls rounded __inline-46" title="<?php echo e(translate('search_your_location_here')); ?>" type="text" placeholder="<?php echo e(translate('search_here')); ?>"/>
                                                                    <div class="dark-support rounded w-100 __h-14rem" id="billing_location_map_canvas"></div>
                                                                    <input type="hidden" id="billing_latitude"
                                                                           name="billing_latitude" class="form-control d-inline"
                                                                           placeholder="Ex : -94.22213" value="<?php echo e($default_location?$default_location['lat']:0); ?>" required readonly>
                                                                    <input type="hidden"
                                                                           name="billing_longitude" class="form-control"
                                                                           placeholder="Ex : 103.344322" id="billing_longitude" value="<?php echo e($default_location?$default_location['lng']:0); ?>" required >
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <a href="javascript:" type="button" data-bs-toggle="modal" data-bs-target="#billingSavedAddressModal" class="btn-link text-primary"><?php echo e(translate('Select_From_Saved')); ?></a>
                                            </div>
                                        </div>

                                        <div class="modal fade" id="billingSavedAddressModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-dialog-centered justify-content-center">
                                                <div class="modal-content border-0" style="max-width: 500px;">
                                                    <div class="modal-header">
                                                        <h5 class="" id="contact_sellerModalLabel"><?php echo e(translate('Saved_Addresses')); ?></h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>

                                                    <div class="modal-body custom-scrollbar">
                                                        <div class="product-quickview">
                                                            <div class="billing-saved-addresses <?php echo e($billing_addresses->count()<1 ? 'd--none':''); ?>">
                                                                <div class="row gy-3 text-dark py-4">
                                                                    <?php $__currentLoopData = $billing_addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <div class="col-md-12">
                                                                            <div class="card border-0 ">
                                                                                <div class="card-header bg-transparent gap-2 align-items-center d-flex flex-wrap justify-content-between">
                                                                                    <label class="d-flex align-items-center gap-3 cursor-pointer mb-0">
                                                                                        <input type="radio" value="<?php echo e($address['id']); ?>" name="billing_method_id" <?php echo e($key==0?'checked':''); ?>>
                                                                                        <h6><?php echo e($address['address_type']); ?></h6>
                                                                                    </label>
                                                                                    <div class="d-flex align-items-center gap-3">
                                                                                        <button type="button" onclick="location.href='<?php echo e(route('address-edit', ['id' => $address->id])); ?>'" class="p-0 bg-transparent border-0">
                                                                                            <img src="<?php echo e(theme_asset('assets/img/svg/location-edit.svg')); ?>" alt="" class="svg">
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="card-body pb-0">
                                                                                    <address>
                                                                                        <dl class="mb-0 flexible-grid sm-down-1" style="--width: 5rem">
                                                                                            <dt><?php echo e(translate('name')); ?></dt>
                                                                                            <dd class="billing-contact-name"><?php echo e($address['contact_person_name']); ?></dd>

                                                                                            <dt><?php echo e(translate('phone')); ?></dt>
                                                                                            <dd class="billing-contact-phone"><a href="tel:<?php echo e($address['phone']); ?>" class="text-dark"><?php echo e($address['phone']); ?></a></dd>

                                                                                            <dt><?php echo e(translate('address')); ?></dt>
                                                                                            <dd><?php echo e($address['address']); ?>, <?php echo e($address['city']); ?>, <?php echo e($address['zip']); ?></dd>
                                                                                            <span class="billing-contact-address d-none"><?php echo e($address['address']); ?></span>
                                                                                            <span class="billing-contact-city d-none"><?php echo e($address['city']); ?></span>
                                                                                            <span class="billing-contact-zip d-none"><?php echo e($address['zip']); ?></span>
                                                                                            <span class="billing-contact-country d-none"><?php echo e($address['country']); ?></span>
                                                                                            <span class="billing-contact-address_type d-none"><?php echo e($address['address_type']); ?></span>
                                                                                        </dl>
                                                                                    </address>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo e(translate('close')); ?></button>
                                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal"><?php echo e(translate('save')); ?></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="row mb-30">
                                                            <div class="col-sm-6">
                                                                <div class="form-group mb-3">
                                                                    <label for="billing_contact_person_name"><?php echo e(translate('Contact_Person_Name')); ?></label>
                                                                    <input type="text" name="billing_contact_person_name" id="billing_contact_person_name" class="form-control" placeholder="Ex: Jhon Doe" <?php echo e($billing_addresses->count()==0?'required':''); ?>>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group mb-3">
                                                                    <label for="billing_phone"><?php echo e(translate('phone')); ?></label>
                                                                    <input type="tel" name="billing_phone" id="billing_phone" class="form-control" placeholder="Ex: +88 01000000000" <?php echo e($billing_addresses->count()==0?'required':''); ?>>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group mb-3">
                                                                    <label for="billing_address_type"><?php echo e(translate('address')); ?> <?php echo e(translate('Type')); ?></label>
                                                                    <select name="billing_address_type" id="billing_address_type" class="form-select">
                                                                        <option value="permanent"><?php echo e(translate('Permanent')); ?></option>
                                                                        <option value="home"><?php echo e(translate('Home')); ?></option>
                                                                        <option value="others"><?php echo e(translate('Others')); ?></option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group mb-3">
                                                                    <label for="billing_country"><?php echo e(translate('Country')); ?></label>
                                                                    <select name="billing_country" id="billing_country" class="form-control select_picker select2">
                                                                        <?php $__empty_1 = true; $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                                            <option value="<?php echo e($country['name']); ?>"><?php echo e($country['name']); ?></option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                                            <option value=""><?php echo e(translate('No_country_to_deliver')); ?></option>
                                                                        <?php endif; ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group mb-3">
                                                                    <label for="billing_city"><?php echo e(translate('city')); ?></label>
                                                                    <input type="text" name="billing_city" id="billing_city" placeholder="Ex: Dhaka" class="form-control"  <?php echo e($billing_addresses->count()==0?'required':''); ?>>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group mb-3">
                                                                    <label for="billing_zip"><?php echo e(translate('Zip_Code')); ?></label>
                                                                    <?php if($zip_restrict_status == 1): ?>
                                                                        <select name="billing_zip" id="billing_zip" class="form-control select2 select_picker" data-live-search="true" required>
                                                                            <?php $__empty_1 = true; $__currentLoopData = $zip_codes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                                                <option value="<?php echo e($code->zipcode); ?>"><?php echo e($code->zipcode); ?></option>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                                                <option value=""><?php echo e(translate('No_zip_to_deliver')); ?></option>
                                                                            <?php endif; ?>
                                                                        </select>
                                                                    <?php else: ?>
                                                                        <input type="text" class="form-control" id="billing_zip" name="billing_zip" placeholder="Ex: 1216" <?php echo e($billing_addresses->count()==0?'required':''); ?>>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="form-group mb-3">
                                                                    <label for="billing_address"><?php echo e(translate('address')); ?></label>
                                                                    <div class="form-control focus-border rounded d-flex align-items-center">
                                                                        <input type="text" name="billing_address" id="billing_address" class="flex-grow-1 text-dark bg-transparent border-0 focus-input" placeholder="<?php echo e(translate('your_address')); ?>" <?php echo e($shipping_addresses->count()==0?'required':''); ?>>

                                                                        <div class="border-start ps-3 pe-1" data-bs-toggle="modal" data-bs-target="#billingMapModal">
                                                                            <i class="bi bi-compass-fill"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-12">
                                                                <label class="custom-checkbox save-billing-address" id="save-billing-address-label">
                                                                    <input type="hidden" name="billing_method_id" id="billing_method_id" value="0">
                                                                    <input type="checkbox" name="save_address_billing" id="save_address_billing">
                                                                    <?php echo e(translate('Save_this_Address')); ?>

                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- Order summery Content -->
                <?php echo $__env->make('theme-views.partials._order-summery', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            </div>
        </div>
    </main>
    <!-- End Main Content -->
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(theme_asset('assets/plugins/select2/js/select2.min.js')); ?>"></script>

    <script>
        $(document).ready(function() {
            $('.select_picker').select2();

            if($('[name="shipping_method_id"]').prop('checked')){
                let cardBody = $('[name="shipping_method_id"]:checked').parents('.card-header').siblings('.card-body')
                shipping_method_select(cardBody);
            }

            if($('[name="billing_method_id"]').prop('checked')){
                let cardBody = $('[name="billing_method_id"]:checked').parents('.card-header').siblings('.card-body')
                billing_method_select(cardBody);
            }
        });

        /*
        * shipping address saved form to general form start
        */
        $('[name="shipping_method_id"]').on('change', function(){
            let cardBody = $(this).parents('.card-header').siblings('.card-body')
            shipping_method_select(cardBody);
        })

        function shipping_method_select(cardBody){
            let shipping_method_id = $('[name="shipping_method_id"]:checked').val();
            let shipping_person = cardBody.find('.shipping-contact-person').text();
            let shipping_phone = cardBody.find('.shipping-contact-phone').text();
            let shipping_address = cardBody.find('.shipping-contact-address').text();
            let shipping_city = cardBody.find('.shipping-contact-city').text();
            let shipping_zip = cardBody.find('.shipping-contact-zip').text();
            let shipping_country = cardBody.find('.shipping-contact-country').text();
            let shipping_contact_address_type = cardBody.find('.shipping-contact-address_type').text();
            let update_address = `
                <input type="hidden" name="shipping_method_id" id="shipping_method_id" value="${shipping_method_id}">
                <input type="checkbox" name="update_address" id="update_address">
                <?php echo e(translate('Update_this_Address')); ?>

            `;

            $('#name').val(shipping_person);
            $('#phone').val(shipping_phone);
            $('#address').val(shipping_address);
            $('#city').val(shipping_city);
            $('#zip').val(shipping_zip);
            $('#select2-zip-container').text(shipping_zip);
            $('#country').val(shipping_country);
            $('#select2-country-container').text(shipping_country);
            $('#address_type').val(shipping_contact_address_type);
            $('#save_address_label').html(update_address);


        }
        /*
        * shipping address saved form to general form end
        */

        /*
        * billing address saved form to general form start
        */
        $('[name="billing_method_id"]').on('change', function(){
            let cardBody = $(this).parents('.card-header').siblings('.card-body')
            billing_method_select(cardBody);
        })

        function billing_method_select(cardBody){
            let billing_method_id = $('[name="billing_method_id"]:checked').val();
            let billing_person = cardBody.find('.billing-contact-name').text();
            let billing_phone = cardBody.find('.billing-contact-phone').text();
            let billing_address = cardBody.find('.billing-contact-address').text();
            let billing_city = cardBody.find('.billing-contact-city').text();
            let billing_zip = cardBody.find('.billing-contact-zip').text();
            let billing_country = cardBody.find('.billing-contact-country').text();
            let billing_contact_address_type = cardBody.find('.billing-contact-address_type').text();
            let update_address_billing = `
                <input type="hidden" name="billing_method_id" id="billing_method_id" value="${billing_method_id}">
                <input type="checkbox" name="update_billing_address" id="update_billing_address">
                <?php echo e(translate('Update_this_Address')); ?>

            `;

            $('#billing_contact_person_name').val(billing_person);
            $('#billing_phone').val(billing_phone);
            $('#billing_address').val(billing_address);
            $('#billing_city').val(billing_city);
            $('#billing_zip').val(billing_zip);
            $('#select2-billing_zip-container').text(billing_zip);
            $('#billing_country').val(billing_country);
            $('#select2-billing_country-container').text(billing_country);
            $('#billing_address_type').val(billing_contact_address_type);
            $('#save-billing-address-label').html(update_address_billing);
        }
        /*
        * billing address saved form to general form end
        */

        function hide_billingAddress() {
            let check_same_as_shippping = $('#same_as_shipping_address').is(":checked");
            if (check_same_as_shippping) {
                $('#hide_billing_address').slideUp();
            } else {
                $('#hide_billing_address').slideDown();
            }
        }
    </script>

    <script>

        function initAutocomplete() {
            let myLatLng = {
                lat: <?php echo e($default_location?$default_location['lat']:'-33.8688'); ?>,
                lng: <?php echo e($default_location?$default_location['lng']:'151.2195'); ?>

            };

            const map = new google.maps.Map(document.getElementById("location_map_canvas"), {
                center: {
                    lat: <?php echo e($default_location?$default_location['lat']:'-33.8688'); ?>,
                    lng: <?php echo e($default_location?$default_location['lng']:'151.2195'); ?>

                },
                zoom: 13,
                mapTypeId: "roadmap",
            });

            let marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
            });

            marker.setMap( map );
            var geocoder = geocoder = new google.maps.Geocoder();
            google.maps.event.addListener(map, 'click', function (mapsMouseEvent) {
                var coordinate = JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2);
                var coordinates = JSON.parse(coordinate);
                var latlng = new google.maps.LatLng( coordinates['lat'], coordinates['lng'] ) ;
                marker.setPosition( latlng );
                map.panTo( latlng );

                document.getElementById('latitude').value = coordinates['lat'];
                document.getElementById('longitude').value = coordinates['lng'];

                geocoder.geocode({ 'latLng': latlng }, function (results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[1]) {
                            document.getElementById('address').value = results[1].formatted_address;
                            console.log(results[1].formatted_address);
                        }
                    }
                });
            });

            // Create the search box and link it to the UI element.
            const input = document.getElementById("pac-input");

            const searchBox = new google.maps.places.SearchBox(input);

            map.controls[google.maps.ControlPosition.TOP_CENTER].push(input);
            // Bias the SearchBox results towards current map's viewport.
            map.addListener("bounds_changed", () => {
                searchBox.setBounds(map.getBounds());
            });
            let markers = [];
            // Listen for the event fired when the user selects a prediction and retrieve
            // more details for that place.
            searchBox.addListener("places_changed", () => {
                const places = searchBox.getPlaces();

                if (places.length == 0) {
                    return;
                }
                // Clear out the old markers.
                markers.forEach((marker) => {
                    marker.setMap(null);
                });
                markers = [];
                // For each place, get the icon, name and location.
                const bounds = new google.maps.LatLngBounds();
                places.forEach((place) => {
                    if (!place.geometry || !place.geometry.location) {
                        console.log("Returned place contains no geometry");
                        return;
                    }
                    var mrkr = new google.maps.Marker({
                        map,
                        title: place.name,
                        position: place.geometry.location,
                    });

                    google.maps.event.addListener(mrkr, "click", function (event) {
                        document.getElementById('latitude').value = this.position.lat();
                        document.getElementById('longitude').value = this.position.lng();

                    });

                    markers.push(mrkr);

                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });
                map.fitBounds(bounds);
            });
        };

        $(document).on('ready', function () {
            initAutocomplete();
        });
        $(document).on("keydown", "input", function(e) {
            if (e.which==13) e.preventDefault();
        });
    </script>

    <script>
        function billingMap() {
            let myLatLng = { lat: <?php echo e($default_location?$default_location['lat']:'-33.8688'); ?>, lng: <?php echo e($default_location?$default_location['lng']:'151.2195'); ?> };
            const map = new google.maps.Map(document.getElementById("billing_location_map_canvas"), {
                center: { lat: <?php echo e($default_location?$default_location['lat']:'-33.8688'); ?>, lng: <?php echo e($default_location?$default_location['lng']:'151.2195'); ?> },
                zoom: 13,
                mapTypeId: "roadmap",
            });

            let marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
            });

            marker.setMap( map );
            var geocoder = geocoder = new google.maps.Geocoder();
            google.maps.event.addListener(map, 'click', function (mapsMouseEvent) {
                var coordinate = JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2);
                var coordinates = JSON.parse(coordinate);
                var latlng = new google.maps.LatLng( coordinates['lat'], coordinates['lng'] ) ;
                marker.setPosition( latlng );
                map.panTo( latlng );

                document.getElementById('billing_latitude').value = coordinates['lat'];
                document.getElementById('billing_longitude').value = coordinates['lng'];

                geocoder.geocode({ 'latLng': latlng }, function (results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[1]) {
                            document.getElementById('billing_address').value = results[1].formatted_address;
                            console.log(results[1].formatted_address);
                        }
                    }
                });
            });

            // Create the search box and link it to the UI element.
            const input = document.getElementById("pac-input-billing");

            const searchBox = new google.maps.places.SearchBox(input);

            map.controls[google.maps.ControlPosition.TOP_CENTER].push(input);
            // Bias the SearchBox results towards current map's viewport.
            map.addListener("bounds_changed", () => {
                searchBox.setBounds(map.getBounds());
            });
            let markers = [];
            // Listen for the event fired when the user selects a prediction and retrieve
            // more details for that place.
            searchBox.addListener("places_changed", () => {
                const places = searchBox.getPlaces();

                if (places.length == 0) {
                    return;
                }
                // Clear out the old markers.
                markers.forEach((marker) => {
                    marker.setMap(null);
                });
                markers = [];
                // For each place, get the icon, name and location.
                const bounds = new google.maps.LatLngBounds();
                places.forEach((place) => {
                    if (!place.geometry || !place.geometry.location) {
                        console.log("Returned place contains no geometry");
                        return;
                    }
                    var mrkr = new google.maps.Marker({
                        map,
                        title: place.name,
                        position: place.geometry.location,
                    });

                    google.maps.event.addListener(mrkr, "click", function (event) {
                        document.getElementById('billing_latitude').value = this.position.lat();
                        document.getElementById('billing_longitude').value = this.position.lng();

                    });

                    markers.push(mrkr);

                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });
                map.fitBounds(bounds);
            });
        };
        $(document).on('ready', function () {
            billingMap();
        });
        $(document).on("keydown", "input", function(e) {
            if (e.which==13) e.preventDefault();
        });

        function mapsShopping(){
            initAutocomplete();
            billingMap();
        }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo e(\App\CPU\Helpers::get_business_settings('map_api_key')); ?>&callback=mapsShopping&libraries=places&v=3.49" defer></script>

    <script>
        function proceed_to_next() {
            let physical_product = $('#physical_product').val();

            if(physical_product === 'yes') {
                var billing_addresss_same_shipping = $('#same_as_shipping_address').is(":checked");

                let allAreFilled = true;
                document.getElementById("address-form").querySelectorAll("[required]").forEach(function (i) {
                    if (!allAreFilled) return;
                    if (!i.value) allAreFilled = false;
                    if (i.type === "radio") {
                        let radioValueCheck = false;
                        document.getElementById("address-form").querySelectorAll(`[name=${i.name}]`).forEach(function (r) {
                            if (r.checked) radioValueCheck = true;
                        });
                        allAreFilled = radioValueCheck;
                    }
                });

                //billing address saved
                let allAreFilled_shipping = true;

                if (billing_addresss_same_shipping != true && $('#billing_input_enable').val() == 1) {

                    document.getElementById("billing-address-form").querySelectorAll("[required]").forEach(function (i) {
                        if (!allAreFilled_shipping) return;
                        if (!i.value) allAreFilled_shipping = false;
                        if (i.type === "radio") {
                            let radioValueCheck = false;
                            document.getElementById("billing-address-form").querySelectorAll(`[name=${i.name}]`).forEach(function (r) {
                                if (r.checked) radioValueCheck = true;
                            });
                            allAreFilled_shipping = radioValueCheck;
                        }
                    });
                }
            }else {
                var billing_addresss_same_shipping = false;
            }

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="_token"]').attr("content"),
                },
            });
            $.post({
                url: '<?php echo e(route('customer.choose-shipping-address-other')); ?>',
                data: {
                    physical_product: physical_product,
                    shipping: physical_product === 'yes' ? $('#address-form').serialize() : null,
                    billing: $('#billing-address-form').serialize(),
                    billing_addresss_same_shipping: billing_addresss_same_shipping
                },

                beforeSend: function () {
                    $('#loading').addClass('d-grid');
                },
                success: function (data) {
                    console.log(data)
                    if (data.errors) {
                        for (var i = 0; i < data.errors.length; i++) {
                            toastr.error(data.errors[i].message, {
                                CloseButton: true,
                                ProgressBar: true
                            });
                        }
                    } else {
                        location.href = '<?php echo e(route('checkout-payment')); ?>';
                    }
                },
                complete: function () {
                    $('#loading').removeClass('d-grid');
                },
                error: function (data) {
                    let error_msg = data.responseJSON.errors;
                    toastr.error(error_msg, {
                        CloseButton: true,
                        ProgressBar: true
                    });
                }
            });


        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('theme-views.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tikka\resources\themes\theme_aster/theme-views/checkout/shipping.blade.php ENDPATH**/ ?>