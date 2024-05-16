    <div class="table-responsive pos-cart-table border">
        <table class="table table-align-middle">
            <thead class="text-capitalize border">
                <tr>
                    <th class="border-0 min-w-120"><?php echo e(\App\CPU\translate('item')); ?></th>
                    <th class="border-0"><?php echo e(\App\CPU\translate('qty')); ?></th>
                    <th class="border-0"><?php echo e(\App\CPU\translate('price')); ?></th>
                    <th class="border-0 text-center"><?php echo e(\App\CPU\translate('delete')); ?></th>
                </tr>
            </thead>
            <tbody>
            <?php
                $subtotal = 0;
                $addon_price = 0;
                $tax = 0;
                $discount = 0;
                $discount_type = 'amount';
                $discount_on_product = 0;
                $total_tax = 0;
                $total_tax_show = 0;
                $ext_discount = 0;
                $ext_discount_type = 'amount';
                $coupon_discount =0;
            ?>
            <?php if(session()->has($cart_id) && count( session()->get($cart_id)) > 0): ?>
                <?php
                    $cart = session()->get($cart_id);
                    if(isset($cart['tax']))
                    {
                        $tax = $cart['tax'];
                    }
                    if(isset($cart['discount']))
                    {
                        $discount = $cart['discount'];
                        $discount_type = $cart['discount_type'];
                    }
                    if (isset($cart['ext_discount'])) {
                        $ext_discount = $cart['ext_discount'];
                        $ext_discount_type = $cart['ext_discount_type'];
                    }
                    if(isset($cart['coupon_discount']))
                    {
                        $coupon_discount = $cart['coupon_discount'];
                    }
                ?>
                <?php $__currentLoopData = session()->get($cart_id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(is_array($cartItem)): ?>
                    <?php
                        $product = \App\Models\Product::find($cartItem['id']);

                        //tax calculation
                        $tax_calculate = \App\CPU\Helpers::tax_calculation($cartItem['price'], $product['tax'], $product['tax_type'])*$cartItem['quantity'];
                        $total_tax_show += $cartItem['tax_model'] != 'include' ? $tax_calculate : 0;
                        $total_tax += $product['tax_model']=='include' ? 0:$tax_calculate;

                        $product_subtotal = $cartItem['price']*$cartItem['quantity'];
                        $subtotal += $product_subtotal;

                        $discount_on_product += ($cartItem['discount']*$cartItem['quantity']);
                    ?>

                <tr>
                    <td>
                        <div class="media align-items-center gap-10">
                            <img class="avatar avatar-sm" src="<?php echo e(asset('storage/product/thumbnail')); ?>/<?php echo e($cartItem['image']); ?>"
                                    onerror="this.src='<?php echo e(asset('public/assets/back-end/img/160x160/img2.jpg')); ?>'" alt="<?php echo e($cartItem['name']); ?> image">
                            <div class="media-body">
                                <h5 class="text-hover-primary mb-0">
                                    <?php echo e(Str::limit($cartItem['name'], 12)); ?>

                                    <?php if($cartItem['tax_model'] == 'include'): ?>
                                        <span class="ml-2" data-toggle="tooltip" data-placement="top" title="<?php echo e(\App\CPU\translate('tax_included')); ?>">
                                            <img class="info-img" src="<?php echo e(asset('public/assets/back-end/img/info-circle.svg')); ?>" alt="img">
                                        </span>
                                    <?php endif; ?>
                                </h5>
                                <small><?php echo e(Str::limit($cartItem['variant'], 20)); ?></small>
                            </div>
                        </div>
                    </td>
                    <td>
                        <input type="number" data-key="<?php echo e($key); ?>" class="form-control qty" value="<?php echo e($cartItem['quantity']); ?>" min="1" onkeyup="updateQuantity('<?php echo e($cartItem['id']); ?>',this.value,event,'<?php echo e($cartItem['variant']); ?>')">
                    </td>
                    <td>
                        <div>
                            <?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($product_subtotal))); ?>

                        </div> <!-- price-wrap .// -->
                    </td>
                    <td>
                        <div class="d-flex justify-content-center">
                            <a href="javascript:removeFromCart(<?php echo e($key); ?>)" class="btn btn-sm btn-outline-danger square-btn"> <i class="tio-delete"></i></a>
                        </div>
                    </td>
                </tr>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            </tbody>
        </table>
    </div>

    <?php
        $total = $subtotal;
        $discount_amount = $discount_on_product;
        $total -= $discount_amount;

        $extra_discount = $ext_discount;
        $extra_discount_type = $ext_discount_type;
        if($extra_discount_type == 'percent' && $extra_discount > 0){
            $extra_discount =  (($subtotal)*$extra_discount) / 100;
        }
        if($extra_discount) {
            $total -= $extra_discount;
        }

        $total_tax_amount= $total_tax_show;
    ?>
    <div class="pt-4">
        <dl>
            <div class="d-flex gap-2 justify-content-between">
                <dt class="title-color text-capitalize font-weight-normal"><?php echo e(\App\CPU\translate('sub_total')); ?> : </dt>
                <dd><?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($subtotal))); ?></dd>
            </div>

            <div class="d-flex gap-2 justify-content-between">
                <dt class="title-color text-capitalize font-weight-normal"><?php echo e(\App\CPU\translate('product')); ?> <?php echo e(\App\CPU\translate('discount')); ?> :</dt>
                <dd><?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency(round($discount_amount,2)))); ?></dd>
            </div>

            <div class="d-flex gap-2 justify-content-between">
                <dt class="title-color text-capitalize font-weight-normal"><?php echo e(\App\CPU\translate('extra')); ?> <?php echo e(\App\CPU\translate('discount')); ?> :</dt>
                <dd>
                    <button id="extra_discount" class="btn btn-sm" type="button" data-toggle="modal" data-target="#add-discount">
                        <i class="tio-edit"></i>
                    </button>
                    <?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($extra_discount))); ?>

                </dd>
            </div>

            <div class="d-flex justify-content-between">
                <dt class="title-color gap-2 text-capitalize font-weight-normal"><?php echo e(\App\CPU\translate('coupon')); ?> <?php echo e(\App\CPU\translate('discount')); ?> :</dt>
                <dd>
                    <button id="coupon_discount" class="btn btn-sm" type="button" data-toggle="modal" data-target="#add-coupon-discount">
                        <i class="tio-edit"></i>
                    </button>
                    <?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($coupon_discount))); ?>

                </dd>
            </div>

            <div class="d-flex gap-2 justify-content-between">
                <dt class="title-color text-capitalize font-weight-normal"><?php echo e(\App\CPU\translate('tax')); ?> : </dt>
                <dd><?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency(round($total_tax_amount,2)))); ?></dd>
            </div>

            <div class="d-flex gap-2 border-top justify-content-between pt-2">
                <dt class="title-color text-capitalize font-weight-bold title-color"><?php echo e(\App\CPU\translate('total')); ?> : </dt>
                <dd class="font-weight-bold title-color"><?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency(round($total+$total_tax-$coupon_discount, 2)))); ?></dd>
            </div>
        </dl>
        <form action="<?php echo e(route('admin.pos.order')); ?>" id='order_place' method="post" >
            <?php echo csrf_field(); ?>
            <div class="form-group col-12">
                <input type="hidden" class="form-control" name="amount" min="0" step="0.01"
                       value="<?php echo e(\App\CPU\BackEndHelper::usd_to_currency($total+$total_tax-$coupon_discount)); ?>"
                       readonly>
            </div>
            <div class="pt-4 mb-4">
                <div class="title-color d-flex mb-2"><?php echo e(\App\CPU\translate('Paid By')); ?>:</div>
                <ul class="list-unstyled option-buttons">
                    <li>
                        <input type="radio" id="cash" value="cash" name="type" hidden checked>
                        <label for="cash" class="btn btn--bordered btn--bordered-black px-4 mb-0"><?php echo e(\App\CPU\translate('cash')); ?></label>
                    </li>
                    <li>
                        <input type="radio" value="card" id="card" name="type" hidden>
                        <label for="card" class="btn btn--bordered btn--bordered-black px-4 mb-0"><?php echo e(\App\CPU\translate('Card')); ?></label>
                    </li>
                </ul>
            </div>
            <div class="d-flex gap-2 justify-content-between align-items-center pt-3">
                <a href="#" class="btn btn-danger btn-block" onclick="emptyCart()">
                    <i class="fa fa-times-circle"></i>
                    <?php echo e(\App\CPU\translate('Cancel_Order')); ?>

                </a>
                <button id="submit_order" type="button" onclick="form_submit()"  class="btn btn--primary btn-block m-0" data-toggle="modal" data-target="#paymentModal">
                    <i class="fa fa-shopping-bag"></i>
                    <?php echo e(\App\CPU\translate('Place_Order')); ?>

                </button>
            </div>
        </form>
    </div>

    <div class="modal fade" id="add-discount" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(\App\CPU\translate('update_discount')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="title-color"><?php echo e(\App\CPU\translate('type')); ?></label>
                        <select name="type" id="type_ext_dis" class="form-control">
                            <option value="amount" <?php echo e($discount_type=='amount'?'selected':''); ?>><?php echo e(\App\CPU\translate('amount')); ?></option>
                            <option value="percent" <?php echo e($discount_type=='percent'?'selected':''); ?>><?php echo e(\App\CPU\translate('percent')); ?>(%)</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="title-color"><?php echo e(\App\CPU\translate('discount')); ?></label>
                        <input type="number" id="dis_amount" class="form-control" name="discount" placeholder="Ex: 500">
                    </div>
                    <div class="form-group">
                        <button class="btn btn--primary" onclick="extra_discount();" type="submit"><?php echo e(\App\CPU\translate('submit')); ?></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="add-coupon-discount" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(\App\CPU\translate('coupon_discount')); ?></h5>
                    <button id="coupon_close" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="title-color"><?php echo e(\App\CPU\translate('coupon_code')); ?></label>
                        <input type="text" id="coupon_code" class="form-control" name="coupon_code" placeholder="SULTAN200">
                        
                    </div>

                    <div class="form-group">
                        <button class="btn btn--primary" type="submit" onclick="coupon_discount();"><?php echo e(\App\CPU\translate('submit')); ?></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="add-tax" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(\App\CPU\translate('update_tax')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo e(route('admin.pos.tax')); ?>" method="POST" class="row">
                        <?php echo csrf_field(); ?>
                        <div class="form-group col-12">
                            <label for=""><?php echo e(\App\CPU\translate('tax')); ?> (%)</label>
                            <input type="number" class="form-control" name="tax" min="0">
                        </div>

                        <div class="form-group col-sm-12">
                            <button class="btn btn--primary" type="submit"><?php echo e(\App\CPU\translate('submit')); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="short-cut-keys" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(\App\CPU\translate('short_cut_keys')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span><?php echo e(\App\CPU\translate('to_click_order')); ?> : alt + O</span><br>
                    <span><?php echo e(\App\CPU\translate('to_click_payment_submit')); ?> : alt + S</span><br>
                    <span><?php echo e(\App\CPU\translate('to_close_payment_submit')); ?> : alt + Z</span><br>
                    <span><?php echo e(\App\CPU\translate('to_click_cancel_cart_item_all')); ?> : alt + C</span><br>
                    <span><?php echo e(\App\CPU\translate('to_click_add_new_customer')); ?> : alt + A</span> <br>
                    <span><?php echo e(\App\CPU\translate('to_submit_add_new_customer_form')); ?> : alt + N</span><br>
                    <span><?php echo e(\App\CPU\translate('to_click_short_cut_keys')); ?> : alt + K</span><br>
                    <span><?php echo e(\App\CPU\translate('to_print_invoice')); ?> : alt + P</span> <br>
                    <span><?php echo e(\App\CPU\translate('to_cancel_invoice')); ?> : alt + B</span> <br>
                    <span><?php echo e(\App\CPU\translate('to_focus_search_input')); ?> : alt + Q</span> <br>
                    <span><?php echo e(\App\CPU\translate('to_click_extra_discount')); ?> : alt + E</span> <br>
                    <span><?php echo e(\App\CPU\translate('to_click_coupon_discount')); ?> : alt + D</span> <br>
                    <span><?php echo e(\App\CPU\translate('to_click_clear_cart')); ?> : alt + X</span> <br>
                    <span><?php echo e(\App\CPU\translate('to_click_new_order')); ?> : alt + R</span> <br>
                </div>
            </div>
        </div>
    </div>

<script>
    $('#type_ext_dis').on('change', function (){
        let type = $('#type_ext_dis').val();
        if(type === 'amount'){
            $('#dis_amount').attr('placeholder', 'Ex: 500');
        }else if(type === 'percent'){
            $('#dis_amount').attr('placeholder', 'Ex: 10%');
        }
    });
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
<?php /**PATH C:\xampp\htdocs\tikka\resources\views/admin/pos/_cart.blade.php ENDPATH**/ ?>