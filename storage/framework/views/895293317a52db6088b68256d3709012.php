<?php $__env->startSection('title', \App\CPU\translate('Social Media')); ?>
<?php $__env->startPush('css_or_js'); ?>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <!-- Page Title -->
        <div class="mb-3">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img src="<?php echo e(asset('public/assets/back-end/img/social media.png')); ?>" width="20" alt="">
                <?php echo e(\App\CPU\translate('social_media')); ?>

            </h2>
        </div>
        <!-- End Page Title -->

        <!-- Content Row -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0"><?php echo e(\App\CPU\translate('social_media_form')); ?></h5>
                    </div>
                    <div class="card-body">
                        <form style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="name" class="title-color"><?php echo e(\App\CPU\translate('name')); ?></label>
                                        <select class="form-control w-100" name="name" id="name">
                                            <option>---<?php echo e(\App\CPU\translate('select')); ?>---</option>
                                            <option value="instagram"><?php echo e(\App\CPU\translate('Instagram')); ?></option>
                                            <option value="facebook"><?php echo e(\App\CPU\translate('Facebook')); ?></option>
                                            <option value="twitter"><?php echo e(\App\CPU\translate('Twitter')); ?></option>
                                            <option value="linkedin"><?php echo e(\App\CPU\translate('LinkedIn')); ?></option>
                                            <option value="pinterest"><?php echo e(\App\CPU\translate('Pinterest')); ?></option>
                                            <option value="google-plus"><?php echo e(\App\CPU\translate('Google plus')); ?></option>
                                        </select>
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <input type="hidden" id="id">
                                        <label for="link" class="title-color"><?php echo e(\App\CPU\translate('social_media_link')); ?></label>
                                        <input type="text" name="link" class="form-control" id="link"
                                               placeholder="<?php echo e(\App\CPU\translate('Enter Social Media Link')); ?>" required>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="hidden" id="id">
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex gap-10 justify-content-end flex-wrap">
                                <a id="add" class="btn btn--primary px-4"><?php echo e(\App\CPU\translate('save')); ?></a>
                                <a id="update" class="btn btn--primary px-4 d--none"><?php echo e(\App\CPU\translate('update')); ?></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="px-3 py-4">
                        <h5 class="mb-0 d-flex"><?php echo e(\App\CPU\translate('social_media_table')); ?></h5>
                    </div>
                    <div class="pb-3">
                        <div class="table-responsive">
                            <table class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table w-100" id="dataTable" cellspacing="0"
                                   style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
                                <thead class="thead-light thead-50 text-capitalize">
                                    <tr>
                                        <th><?php echo e(\App\CPU\translate('sl')); ?></th>
                                        <th><?php echo e(\App\CPU\translate('name')); ?></th>
                                        <th><?php echo e(\App\CPU\translate('link')); ?></th>
                                        <th><?php echo e(\App\CPU\translate('status')); ?></th>
                                        
                                        <th><?php echo e(\App\CPU\translate('action')); ?></th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        fetch_social_media();

        function fetch_social_media() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                url: "<?php echo e(route('admin.business-settings.fetch')); ?>",
                method: 'GET',
                success: function (data) {

                    if (data.length != 0) {
                        var html = '';
                        for (var count = 0; count < data.length; count++) {
                            html += '<tr>';
                            html += '<td class="column_name" data-column_name="sl" data-id="' + data[count].id + '">' + (count + 1) + '</td>';
                            html += '<td class="column_name" data-column_name="name" data-id="' + data[count].id + '">' + data[count].name + '</td>';
                            html += '<td class="column_name" data-column_name="slug" data-id="' + data[count].id + '">' + data[count].link + '</td>';
                            html += `<td class="column_name" data-column_name="status" data-id="${data[count].id}">
                                <label class="switcher">
                                    <input type="checkbox" class="switcher_input status" id="${data[count].id}" ${data[count].active_status == 1 ? "checked" : ""} >
                                    <span class="switcher_control"></span>
                                </label>
                            </td>`;
                            // html += '<td><a type="button" class="btn btn--primary btn-xs edit" id="' + data[count].id + '"><i class="fa fa-edit text-white"></i></a> <a type="button" class="btn btn-danger btn-xs delete" id="' + data[count].id + '"><i class="fa fa-trash text-white"></i></a></td></tr>';
                            html += '<td><a type="button" class="btn btn-outline--primary btn-xs edit square-btn" id="' + data[count].id + '"><i class="tio-edit"></i></a> </td></tr>';
                        }
                        $('tbody').html(html);
                    }
                }
            });
        }

        $('#add').on('click', function () {
            $('#add').attr("disabled", true);
            var name = $('#name').val();
            var link = $('#link').val();
            if (name == "") {
                toastr.error('<?php echo e(\App\CPU\translate('Social Name Is Requeired')); ?>.');
                return false;
            }
            if (link == "") {
                toastr.error('<?php echo e(\App\CPU\translate('Social Link Is Requeired')); ?>.');
                return false;
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                url: "<?php echo e(route('admin.business-settings.social-media-store')); ?>",
                method: 'POST',
                data: {
                    name: name,
                    link: link
                },
                success: function (response) {
                    if (response.error == 1) {
                        toastr.error('<?php echo e(\App\CPU\translate('Social Media Already taken')); ?>');
                    } else {
                        toastr.success('<?php echo e(\App\CPU\translate('Social Media inserted Successfully')); ?>.');
                    }
                    $('#name').val('');
                    $('#link').val('');
                    fetch_social_media();
                }
            });
        });
        $('#update').on('click', function () {
            $('#update').attr("disabled", true);
            var id = $('#id').val();
            var name = $('#name').val();
            var link = $('#link').val();
            var icon = $('#icon').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                url: "<?php echo e(route('admin.business-settings.social-media-update')); ?>",
                method: 'POST',
                data: {
                    id: id,
                    name: name,
                    link: link,
                    icon: icon,
                },
                success: function (data) {
                    $('#name').val('');
                    $('#link').val('');
                    $('#icon').val('');

                    toastr.success('<?php echo e(\App\CPU\translate('Social info updated Successfully')); ?>.');
                    $('#update').hide();
                    $('#add').show();
                    fetch_social_media();

                }
            });
            $('#save').hide();
        });
        $(document).on('click', '.delete', function () {
            var id = $(this).attr("id");
            if (confirm("<?php echo e(\App\CPU\translate('Are you sure delete this social media')); ?>?")) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "<?php echo e(route('admin.business-settings.social-media-delete')); ?>",
                    method: 'POST',
                    data: {id: id},
                    success: function (data) {
                        fetch_social_media();
                        toastr.success('<?php echo e(\App\CPU\translate('Social media deleted Successfully')); ?>.');
                    }
                });
            }
        });
        $(document).on('click', '.edit', function () {
            $('#update').show();
            $('#add').hide();
            var id = $(this).attr("id");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                url: "<?php echo e(route('admin.business-settings.social-media-edit')); ?>",
                method: 'POST',
                data: {id: id},
                success: function (data) {
                    $(window).scrollTop(0);
                    $('#id').val(data.id);
                    $('#name').val(data.name);
                    $('#link').val(data.link);
                    $('#icon').val(data.icon);
                    fetch_social_media()
                }
            });
        });
        $(document).on('change', '.status', function () {
            var id = $(this).attr("id");
            if ($(this).prop("checked") == true) {
                var status = 1;
            } else if ($(this).prop("checked") == false) {
                var status = 0;
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                url: "<?php echo e(route('admin.business-settings.social-media-status-update')); ?>",
                method: 'POST',
                data: {
                    id: id,
                    status: status
                },
                success: function () {
                    toastr.success('<?php echo e(\App\CPU\translate('Status updated successfully')); ?>');
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tikka\resources\views/admin/business-settings/social-media.blade.php ENDPATH**/ ?>