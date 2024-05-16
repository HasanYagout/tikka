<?php $__env->startSection('title', \App\CPU\translate('Category')); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <!-- Page Title -->
        <div class="d-flex flex-wrap gap-2 align-items-center mb-3">
            <h2 class="h1 mb-0">
                <img src="<?php echo e(asset('public/assets/back-end/img/brand-setup.png')); ?>" class="mb-1 mr-1" alt="">
                <?php if($category['position'] == 1): ?>
                    <?php echo e(\App\CPU\translate('Sub')); ?>

                <?php elseif($category['position'] == 2): ?>
                    <?php echo e(\App\CPU\translate('Sub Sub')); ?>

                <?php endif; ?>
                <?php echo e(\App\CPU\translate('Category')); ?>

                <?php echo e(\App\CPU\translate('Update')); ?>

            </h2>
        </div>
        <!-- End Page Title -->

        <!-- Content Row -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <!-- <div class="card-header">
                        <?php echo e(\App\CPU\translate('category_form')); ?>

                    </div> -->
                    <div class="card-body" style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
                        <form action="<?php echo e(route('admin.category.update',[$category['id']])); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php ($language=\App\Models\BusinessSetting::where('type','pnc_language')->first()); ?>
                            <?php ($language = $language->value ?? null); ?>
                            <?php ($default_lang = 'en'); ?>

                            <?php ($default_lang = json_decode($language)[0]); ?>
                            <ul class="nav nav-tabs w-fit-content mb-4">
                                <?php $__currentLoopData = json_decode($language); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="nav-item text-capitalize">
                                        <a class="nav-link lang_link <?php echo e($lang == $default_lang? 'active':''); ?>"
                                           href="#"
                                           id="<?php echo e($lang); ?>-link"><?php echo e(\App\CPU\Helpers::get_language_name($lang).'('.strtoupper($lang).')'); ?></a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            <div class="row">
                                <div class="<?php echo e($category['parent_id']==0 || $category['position'] == 1 ? 'col-lg-6':'col-12'); ?>">
                                    <?php $__currentLoopData = json_decode($language); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div>
                                        <?php
                                        if (count($category['translations'])) {
                                            $translate = [];
                                            foreach ($category['translations'] as $t) {
                                                if ($t->locale == $lang && $t->key == "name") {
                                                    $translate[$lang]['name'] = $t->value;
                                                }
                                            }
                                        }
                                        ?>
                                        <div class="form-group <?php echo e($lang != $default_lang ? 'd-none':''); ?> lang_form"
                                            id="<?php echo e($lang); ?>-form">
                                            <label class="title-color"><?php echo e(\App\CPU\translate('Category_Name')); ?>

                                                (<?php echo e(strtoupper($lang)); ?>)</label>
                                            <input type="text" name="name[]"
                                                value="<?php echo e($lang==$default_lang?$category['name']:($translate[$lang]['name']??'')); ?>"
                                                class="form-control"
                                                placeholder="<?php echo e(\App\CPU\translate('New')); ?> <?php echo e(\App\CPU\translate('Category')); ?>" <?php echo e($lang == $default_lang? 'required':''); ?>>
                                        </div>
                                        <input type="hidden" name="lang[]" value="<?php echo e($lang); ?>">
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    <div class="form-group">
                                        <label class="title-color" for="priority"><?php echo e(\App\CPU\translate('priority')); ?></label>
                                        <select class="form-control" name="priority" id="" required>
                                            <?php for($i = 0; $i <= 10; $i++): ?>
                                            <option
                                            value="<?php echo e($i); ?>" <?php echo e($category['priority']==$i?'selected':''); ?>><?php echo e($i); ?></option>
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                <!--image upload only for main category-->
                                <?php if($category['parent_id']==0 || $category['position'] == 1): ?>
                                    <div class="from_part_2">
                                        <label class="title-color"><?php echo e(\App\CPU\translate('Category Logo')); ?></label>
                                        <span class="text-info">(<?php echo e(\App\CPU\translate('ratio')); ?> 1:1)</span>
                                        <div class="custom-file text-left">
                                            <input type="file" name="image" id="customFileEg1"
                                                   class="custom-file-input"
                                                   accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                            <label class="custom-file-label"
                                                   for="customFileEg1"><?php echo e(\App\CPU\translate('choose')); ?> <?php echo e(\App\CPU\translate('file')); ?></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-5 mt-lg-0 from_part_2">
                                    <div class="form-group">
                                        <center>
                                            <img class="upload-img-view"
                                                    id="viewer"
                                                    onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                                    src="<?php echo e(asset('storage/category')); ?>/<?php echo e($category['icon']); ?>"
                                                    alt=""/>
                                        </center>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <?php if($category['position'] == 2): ?>
                                        <div class="d-flex justify-content-end gap-3">
                                            <button type="reset" id="reset" class="btn btn-secondary px-4"><?php echo e(\App\CPU\translate('reset')); ?></button>
                                            <button type="submit" class="btn btn--primary px-4"><?php echo e(\App\CPU\translate('update')); ?></button>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <?php if($category['parent_id']==0 || $category['position'] == 1): ?>
                                <div class="d-flex justify-content-end gap-3">
                                    <button type="reset" id="reset" class="btn btn-secondary px-4"><?php echo e(\App\CPU\translate('reset')); ?></button>
                                    <button type="submit" class="btn btn--primary px-4"><?php echo e(\App\CPU\translate('update')); ?></button>
                                </div>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>

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
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#viewer').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#customFileEg1").change(function () {
            readURL(this);
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tikka\resources\views/admin/category/category-edit.blade.php ENDPATH**/ ?>