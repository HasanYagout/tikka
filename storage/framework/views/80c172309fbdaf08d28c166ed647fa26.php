<?php $__env->startSection('title',\App\CPU\translate('My Support Tickets')); ?>
<?php $__env->startSection('content'); ?>

    <div class="modal fade rtl" style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;" id="open-ticket" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg  " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="row">
                        <div class="col-md-12"><h5
                                class="modal-title font-nameA "><?php echo e(\App\CPU\translate('submit_new_ticket')); ?></h5></div>
                        <div class="col-md-12 text-black mt-3">
                            <span><?php echo e(\App\CPU\translate('you_will_get_response')); ?>.</span>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <form class="mt-3" method="post" action="<?php echo e(route('ticket-submit')); ?>" id="open-ticket">
                        <?php echo csrf_field(); ?>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="firstName"><?php echo e(\App\CPU\translate('Subject')); ?></label>
                                <input type="text" class="form-control" id="ticket-subject" name=""
                                       required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="">
                                    <label class="" for="inlineFormCustomSelect"><?php echo e(\App\CPU\translate('Type')); ?></label>
                                    <select class="custom-select " id="ticket-type" name="ticket_type" required>
                                        <option
                                            value="Website problem"><?php echo e(\App\CPU\translate('Website')); ?> <?php echo e(\App\CPU\translate('problem')); ?></option>
                                        <option value="Partner request"><?php echo e(\App\CPU\translate('partner_request')); ?></option>
                                        <option value="Complaint"><?php echo e(\App\CPU\translate('Complaint')); ?></option>
                                        <option
                                            value="Info inquiry"><?php echo e(\App\CPU\translate('Info')); ?> <?php echo e(\App\CPU\translate('inquiry')); ?> </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="">
                                    <label class="" for="inlineFormCustomSelect"><?php echo e(\App\CPU\translate('Priority')); ?></label>
                                    <select class="form-control custom-select" id="ticket-priority"
                                            name="ticket_priority" required>
                                        <option value><?php echo e(\App\CPU\translate('choose_priority')); ?></option>
                                        <option value="Urgent"><?php echo e(\App\CPU\translate('Urgent')); ?></option>
                                        <option value="High"><?php echo e(\App\CPU\translate('High')); ?></option>
                                        <option value="Medium"><?php echo e(\App\CPU\translate('Medium')); ?></option>
                                        <option value="Low"><?php echo e(\App\CPU\translate('Low')); ?></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="detaaddressils"><?php echo e(\App\CPU\translate('describe_your_issue')); ?></label>
                                <textarea class="form-control" rows="6" id="ticket-description"
                                          name="ticket_description"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer p-0 border-0">
                            <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal"><?php echo e(\App\CPU\translate('close')); ?></button>
                            <button type="submit" class="btn btn--primary"><?php echo e(\App\CPU\translate('submit_a_ticket')); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Title-->
    <div class="container rtl">
        <h3 class="headerTitle text-center py-3 mb-0"><?php echo e(\App\CPU\translate('support_ticket')); ?></h3>
    </div>
    <!-- Page Content-->
    <div class="container pb-5 mb-2 mb-md-4 mt-3 rtl" style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
        <div class="row">
            <!-- Sidebar-->
        <?php echo $__env->make('web-views.partials._profile-aside', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Content  -->
            <section class="col-lg-9 col-md-9">
                <!-- Toolbar-->
                <!-- Tickets list-->
                <?php ($allTickets =App\Models\SupportTicket::where('customer_id', auth('customer')->id())->get()); ?>
                <div class="card __card">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table mb-0 __ticket-table">
                                <thead class="thead-light">
                                <tr>
                                    <th class="border-t-0">
                                        <div class="py-2"><span
                                                class="d-block spandHeadO "><?php echo e(\App\CPU\translate('Topic')); ?></span></div>
                                    </th>
                                    <th class="border-t-0">
                                        <div class="py-2 <?php echo e(Session::get('direction') === "rtl" ? 'mr-2' : 'ml-2'); ?>"><span
                                                class="d-block spandHeadO "><?php echo e(\App\CPU\translate('submition_date')); ?></span>
                                        </div>
                                    </th>
                                    <th class="border-t-0">
                                        <div class="py-2"><span class="d-block spandHeadO"><?php echo e(\App\CPU\translate('Type')); ?></span>
                                        </div>
                                    </th>
                                    <th class="border-t-0">
                                        <div class="py-2">
                                            <span class="d-block spandHeadO">
                                                <?php echo e(\App\CPU\translate('Status')); ?>

                                            </span>
                                        </div>
                                    </th>
                                    <th class="border-t-0 text-center">
                                        <div class="py-2"><span class="d-block spandHeadO"><?php echo e(\App\CPU\translate('Action')); ?> </span></div>
                                    </th>
                                </tr>
                                </thead>

                                <tbody>

                                <?php $__currentLoopData = $allTickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <span class="marl"><?php echo e($ticket['subject']); ?></span>
                                        </td>
                                        <td>
                                            <span><?php echo e(Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$ticket['created_at'])->format('Y-m-d h:i A')); ?></span>
                                        </td>
                                        <td><span class=""><?php echo e(\App\CPU\translate($ticket['type'])); ?></span></td>
                                        <td><span class=""><?php echo e(\App\CPU\translate($ticket['status'])); ?></span></td>
                                        <td>
                                            <div class="btn--container flex-nowrap justify-content-center">
                                                <a class="action-btn btn--primary"
                                                href="<?php echo e(route('support-ticket.index',$ticket['id'])); ?>">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a class="action-btn btn--danger" href="javascript:"
                                                onclick="Swal.fire({
                                                    title: '<?php echo e(\App\CPU\translate('Do you want to delete this?')); ?>',
                                                    showDenyButton: true,
                                                    showCancelButton: true,
                                                    confirmButtonColor: '<?php echo e($web_config['primary_color']); ?>',
                                                    cancelButtonColor: '<?php echo e($web_config['secondary_color']); ?>',
                                                    confirmButtonText: `<?php echo e(\App\CPU\translate('Yes')); ?>`,
                                                    denyButtonText: `<?php echo e(\App\CPU\translate("Don't Delete")); ?>`,
                                                    }).then((result) => {
                                                    if (result.value) {
                                                    Swal.fire('Deleted!', '', 'success')
                                                    location.href='<?php echo e(route('support-ticket.delete',['id'=>$ticket->id])); ?>';
                                                    } else{
                                                    Swal.fire('Cancelled', '', 'info')
                                                    }
                                                    })"
                                                id="delete" class=" marl">
                                                    <i class="czi-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn--primary float-<?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>" data-toggle="modal"
                            data-target="#open-ticket">
                            <?php echo e(\App\CPU\translate('add_new_ticket')); ?>

                    </button>
                </div>
            </section>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.front-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tikka\resources\themes\default/web-views/users-profile/account-tickets.blade.php ENDPATH**/ ?>