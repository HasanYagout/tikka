<?php $__env->startSection('title',\App\CPU\translate('gallery')); ?>
<?php $__env->startPush('css_or_js'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">

        <!-- Page Title -->
        <div class="mb-3">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img src="<?php echo e(asset('public/assets/back-end/img/file-manager.png')); ?>" width="20" alt="">
                <?php echo e(\App\CPU\translate('file_manager')); ?>

            </h2>
        </div>
        <!-- End Page Title -->

        <!-- Page Heading -->
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h5 class="mb-0"><?php echo e(\App\CPU\translate('file_manager')); ?></h5>
            <button type="button" class="btn btn--primary modalTrigger" data-toggle="modal" data-target="#exampleModal">
                <i class="tio-add"></i>
                <span class="text"><?php echo e(\App\CPU\translate('add')); ?> <?php echo e(\App\CPU\translate('new')); ?></span>
            </button>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <?php
                            $pwd = explode('/',base64_decode($folder_path));
                        ?>
                        <h5 class="mb-0 text-capitalize d-flex align-items-center gap-2">
                            <?php echo e(\App\CPU\translate(end($pwd))); ?>

                            <span class="badge badge-soft-dark radius-50" id="itemCount"><?php echo e(count($data)); ?></span>
                        </h5>
                        <a class="btn btn--primary" href="<?php echo e(url()->previous()); ?>">
                            <i class="tio-chevron-left"></i>
                            <?php echo e(\App\CPU\translate('back')); ?>

                        </a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                                    <?php if($file['type']=='folder'): ?>
                                        <a class="btn p-0"
                                           href="<?php echo e(route('admin.file-manager.index', base64_encode($file['path']))); ?>">
                                            <img class="img-thumbnail mb-2"
                                                 src="<?php echo e(asset('public/assets/back-end/img/folder.png')); ?>" alt="">
                                            <p class="title-color"><?php echo e(Str::limit($file['name'],10)); ?></p>
                                        </a>
                                    <?php elseif($file['type']=='file'): ?>
                                    <!-- <a class="btn" href="<?php echo e(asset('public/storage/app/'.$file['path'])); ?>" download> -->
                                        <button class="btn p-0 w-100" data-toggle="modal"
                                                data-target="#imagemodal<?php echo e($key); ?>" title="<?php echo e($file['name']); ?>">
                                            <div class="gallary-card">
                                                <img src="<?php echo e(asset('public/storage/app/'.$file['path'])); ?>"
                                                     alt="<?php echo e($file['name']); ?>" class="h-auto w-100 mb-2">
                                            </div>
                                            <p class="overflow-hidden"><?php echo e(Str::limit($file['name'],10)); ?></p>
                                        </button>
                                        <div class="modal fade" id="imagemodal<?php echo e($key); ?>" tabindex="-1" role="dialog"
                                             aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel"><?php echo e($file['name']); ?></h4>
                                                        <button type="button" class="close" data-dismiss="modal"><span
                                                                aria-hidden="true">&times;</span><span
                                                                class="sr-only"><?php echo e(\App\CPU\translate('close')); ?></span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img src="<?php echo e(asset('public/storage/app/'.$file['path'])); ?>"
                                                             class="w-100 h-auto">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a class="btn btn--primary"
                                                           href="<?php echo e(route('admin.file-manager.download', base64_encode($file['path']))); ?>"><i
                                                                class="tio-download"></i> <?php echo e(\App\CPU\translate('download')); ?>

                                                        </a>
                                                        <button class="btn btn-info"
                                                                onclick="copy_test('<?php echo e($file['db_path']); ?>')"><i
                                                                class="tio-copy"></i> <?php echo e(\App\CPU\translate('copy_path')); ?>

                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="indicator"></div>
                    <div class="modal-header">
                        <h5 class="modal-title"
                            id="exampleModalLabel"><?php echo e(\App\CPU\translate('upload')); ?> <?php echo e(\App\CPU\translate('file')); ?> </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo e(route('admin.file-manager.image-upload')); ?>" method="post"
                              enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <input type="text" name="path" value="<?php echo e(base64_decode($folder_path)); ?>" hidden>
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" name="images[]" id="customFileUpload" class="custom-file-input"
                                           accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*" multiple>
                                    <label class="custom-file-label"
                                           for="customFileUpload"><?php echo e(\App\CPU\translate('choose')); ?> <?php echo e(\App\CPU\translate('images')); ?></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" name="file" id="customZipFileUpload" class="custom-file-input"
                                           accept=".zip">
                                    <label class="custom-file-label" id="zipFileLabel"
                                           for="customZipFileUpload"><?php echo e(\App\CPU\translate('upload_zip_file')); ?></label>
                                </div>
                            </div>

                            <div class="row" id="files"></div>
                            <div class="form-group">
                                <input class="btn btn--primary" type="<?php echo e(env('APP_MODE')!='demo'?'submit':'button'); ?>"
                                       onclick="<?php echo e(env('APP_MODE')!='demo'?'':'call_demo()'); ?>"
                                       value="<?php echo e(\App\CPU\translate('upload')); ?>">
                            </div>
                        </form>

                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script_2'); ?>
    <script>
        function readURL(input) {
            $('#files').html("");
            for (var i = 0; i < input.files.length; i++) {
                if (input.files && input.files[i]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#files').append('<div class="col-md-2 col-sm-4 m-1"><img class="__empty-img" id="viewer" src="' + e.target.result + '"/></div>');
                    }
                    reader.readAsDataURL(input.files[i]);
                }
            }

        }

        $("#customFileUpload").change(function () {
            readURL(this);
        });

        $('#customZipFileUpload').change(function (e) {
            var fileName = e.target.files[0].name;
            $('#zipFileLabel').html(fileName);
        });

        function copy_test(copyText) {
            /* Copy the text inside the text field */
            navigator.clipboard.writeText(copyText);

            toastr.success('<?php echo e(\App\CPU\translate('file_path_copied_successfully!')); ?>', {
                CloseButton: true,
                ProgressBar: true
            });
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tikka\resources\views/admin/file-manager/index.blade.php ENDPATH**/ ?>