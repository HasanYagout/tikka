<?php $__env->startSection('title', \App\CPU\translate('Sub Sub Category')); ?>

<?php $__env->startPush('css_or_js'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <!-- Page Title -->
        <div class="mb-3">
            <h2 class="h1 mb-0 d-flex gap-2">
                <img src="<?php echo e(asset('public/assets/back-end/img/brand-setup.png')); ?>" alt="">
                <?php echo e(\App\CPU\translate('Sub')); ?> <?php echo e(\App\CPU\translate('Sub')); ?> <?php echo e(\App\CPU\translate('Category')); ?> <?php echo e(\App\CPU\translate('Setup')); ?>

            </h2>
        </div>
        <!-- End Page Title -->

        <!-- Content Row -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body" style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
                        <form action="<?php echo e(route('admin.sub-sub-category.store')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php ($language=\App\Models\BusinessSetting::where('type','pnc_language')->first()); ?>
                            <?php ($language = $language->value ?? null); ?>
                            <?php ($default_lang = 'en'); ?>
                            <?php if($language): ?>
                                <?php ($default_lang = json_decode($language)[0]); ?>
                                <ul class="nav nav-tabs w-fit-content mb-4">
                                    <?php $__currentLoopData = json_decode($language); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="nav-item text-capitalize">
                                            <a class="nav-link lang_link <?php echo e($lang == $default_lang? 'active':''); ?>" href="#"
                                               id="<?php echo e($lang); ?>-link"><?php echo e(ucfirst(\App\CPU\Helpers::get_language_name($lang)).'('.strtoupper($lang).')'); ?></a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                                <div class="row">
                                    <?php $__currentLoopData = json_decode($language); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div
                                            class="col-12 form-group <?php echo e($lang != $default_lang ? 'd-none':''); ?> lang_form"
                                            id="<?php echo e($lang); ?>-form">
                                            <label class="title-color"
                                                   for="exampleFormControlInput1"><?php echo e(\App\CPU\translate('Sub_sub_category')); ?> <?php echo e(\App\CPU\translate('name')); ?><span class="text-danger">*</span>
                                                (<?php echo e(strtoupper($lang)); ?>)</label>
                                            <input type="text" name="name[]" class="form-control"
                                                   placeholder="<?php echo e(\App\CPU\translate('New_Sub_Sub_Category')); ?>" <?php echo e($lang == $default_lang? 'required':''); ?>>
                                        </div>
                                        <input type="hidden" name="lang[]" value="<?php echo e($lang); ?>">
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <div class="col-12">
                                            <div class="form-group lang_form" id="<?php echo e($default_lang); ?>-form">
                                                <label
                                                    class="title-color"><?php echo e(\App\CPU\translate('Sub_sub_category')); ?> <?php echo e(\App\CPU\translate('name')); ?><span class="text-danger">*</span>
                                                    (<?php echo e(strtoupper($lang)); ?>)</label>
                                                <input type="text" name="name[]" class="form-control"
                                                       placeholder="<?php echo e(\App\CPU\translate('New_Sub_Category')); ?>" required>
                                            </div>
                                            <input type="hidden" name="lang[]" value="<?php echo e($default_lang); ?>">
                                        </div>
                                    <?php endif; ?>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label
                                                class="title-color"><?php echo e(\App\CPU\translate('main')); ?> <?php echo e(\App\CPU\translate('category')); ?>

                                                <span class="text-danger">*</span></label>
                                            <select class="form-control" id="cat_id" required>
                                                <option value="" disabled selected><?php echo e(\App\CPU\translate('Select_main_category')); ?></option>
                                                <?php $__currentLoopData = \App\Models\Category::where(['position'=>0])->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($category['id']); ?>"><?php echo e($category['name']); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="title-color text-capitalize"
                                                for="name"><?php echo e(\App\CPU\translate('sub_category')); ?> <?php echo e(\App\CPU\translate('name')); ?><span class="text-danger">*</span></label>
                                            <select name="parent_id" id="parent_id" class="form-control">

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="title-color text-capitalize" for="priority"><?php echo e(\App\CPU\translate('priority')); ?>

                                                <span>
                                                    <i class="tio-info-outined" title="<?php echo e(\App\CPU\translate('the_lowest_number_will_get_the_highest_priority')); ?>"></i>
                                                </span>
                                            </label>
                                            <select class="form-control" name="priority" id="" required>
                                                <option disabled selected><?php echo e(\App\CPU\translate('Set_Priority')); ?></option>
                                                <?php for($i = 0; $i <= 10; $i++): ?>
                                                <option
                                                value="<?php echo e($i); ?>" ><?php echo e($i); ?></option>
                                                <?php endfor; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-flex flex-wrap gap-2 justify-content-end">
                                            <button type="reset" class="btn btn-secondary"><?php echo e(\App\CPU\translate('reset')); ?></button>
                                            <button type="submit" class="btn btn--primary"><?php echo e(\App\CPU\translate('submit')); ?></button>
                                        </div>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-20" id="cate-table">
            <div class="col-md-12">
                <div class="card">
                    <div class="px-3 py-4">
                        <div class="row align-items-center">
                            <div class="col-sm-5 col-md-6 col-lg-8 mb-2 mb-sm-0">
                                <h5 class="text-capitalize d-flex gap-2">
                                    <?php echo e(\App\CPU\translate('sub_sub_category_list')); ?>

                                    <span class="badge badge-soft-dark radius-50 fz-12"><?php echo e($categories->total()); ?></span>
                                </h5>
                            </div>
                            <div class="col-sm-7 col-md-6 col-lg-4">
                                <!-- Search -->
                                <form action="<?php echo e(url()->current()); ?>" method="GET">
                                    <div class="input-group input-group-custom input-group-merge">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="tio-search"></i>
                                            </div>
                                        </div>
                                        <input id="datatableSearch_" type="search" name="search" class="form-control"
                                            placeholder="<?php echo e(\App\CPU\translate('Search_by_Sub_Sub_Category')); ?>" aria-label="Search orders" value="<?php echo e($search); ?>" required>
                                        <button type="submit" class="btn btn--primary"><?php echo e(\App\CPU\translate('search')); ?></button>
                                    </div>
                                </form>
                                <!-- End Search -->
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;"
                            class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table w-100">
                            <thead class="thead-light thead-50 text-capitalize">
                            <tr>
                                <th><?php echo e(\App\CPU\translate('ID')); ?></th>
                                <th><?php echo e(\App\CPU\translate('sub_sub_category_name')); ?></th>
                                <th><?php echo e(\App\CPU\translate('priority')); ?></th>
                                <th class="text-center"><?php echo e(\App\CPU\translate('action')); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($category['id']); ?></td>
                                    <td><?php echo e($category['name']); ?></td>
                                    <td><?php echo e($category['priority']); ?></td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-2">
                                            <a class="btn btn-outline-info btn-sm square-btn"
                                                title="<?php echo e(\App\CPU\translate('Edit')); ?>"
                                                href="<?php echo e(route('admin.category.edit',[$category['id']])); ?>">
                                                <i class="tio-edit"></i>
                                            </a>
                                            <a class="btn btn-outline-danger btn-sm delete square-btn"
                                                title="<?php echo e(\App\CPU\translate('Delete')); ?>"
                                                id="<?php echo e($category['id']); ?>">
                                                <i class="tio-delete"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="table-responsive mt-4">
                        <div class="d-flex justify-content-lg-end">
                            <!-- Pagination -->
                            <?php echo e($categories->links()); ?>

                        </div>
                    </div>

                    <?php if(count($categories)==0): ?>
                        <div class="text-center p-4">
                            <img class="mb-3 w-160" src="<?php echo e(asset('public/assets/back-end')); ?>/svg/illustrations/sorry.svg" alt="Image Description">
                            <p class="mb-0"><?php echo e(\App\CPU\translate('No_data_to_show')); ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <!-- Page level plugins -->
    <script src="<?php echo e(asset('public/assets/back-end/vendor/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/back-end')); ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
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
                $(".from_part_2").removeClass('d-none');
            } else {
                $(".from_part_2").addClass('d-none');
            }
        });

        $(document).ready(function () {
            $('#dataTable').DataTable();
        });
    </script>

    <script>
        $( document ).ready(function() {

            var id = $("#cat_id").val();
            if (id) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: '<?php echo e(route('admin.sub-sub-category.getSubCategory')); ?>',
                    data: {
                        id: id
                    },
                    success: function (result) {
                        $("#parent_id").html(result);
                    }
                });
            }
        });
    </script>
    <script>
        $('#cat_id').on('change', function () {
            var id = $(this).val();
            if (id) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: '<?php echo e(route('admin.sub-sub-category.getSubCategory')); ?>',
                    data: {
                        id: id
                    },
                    success: function (result) {
                        $("#parent_id").html(result);
                    }
                });
            }
        });

        $(document).on('click', '.delete', function () {
            var id = $(this).attr("id");
            Swal.fire({
                title: '<?php echo e(\App\CPU\translate('Are_you_sure_to_delete_this?')); ?>',
                text: "<?php echo e(\App\CPU\translate('You_wont_be_able_to_revert_this!')); ?>",
                showCancelButton: true,
                type: 'warning',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '<?php echo e(\App\CPU\translate('Yes')); ?>, <?php echo e(\App\CPU\translate('delete_it')); ?>!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "<?php echo e(route('admin.sub-sub-category.delete')); ?>",
                        method: 'POST',
                        data: {id: id},
                        success: function () {
                            toastr.success('<?php echo e(\App\CPU\translate('Sub_Sub_Category_Deleted_Successfully')); ?>.');
                            location.reload();
                        }
                    });
                }
            })
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tikka\resources\views/admin/category/sub-sub-category-view.blade.php ENDPATH**/ ?>