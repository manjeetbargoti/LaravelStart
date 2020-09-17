
<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Account</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('adminDashboard')); ?>">Home</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </div>
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-6 col-6 m-auto">
                <!-- General form elements -->
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Admin Profile</h3>
                        <span><a class="btn btn-default text-success btn-xs float-right"
                                href="<?php echo e(route('editAdminProfile')); ?>">Edit</a></span>
                    </div>
                    <!-- /. Card Header -->

                    <!-- Card Body -->
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle"
                                src="<?php echo e(asset('admin/img/user2-160x160.jpg')); ?>" alt="User profile picture">
                        </div>
                        <h3 class="profile-username text-center"><?php echo e($adminData->name); ?></h3>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <strong>Email</strong> <a class="float-right"><?php echo e($adminData->email); ?></a>
                            </li>
                            <li class="list-group-item">
                                <strong>Phone</strong> <a class="float-right"><?php echo e($adminData->mobile); ?></a>
                            </li>
                            <li class="list-group-item">
                                <strong>Type</strong> <a class="float-right"><?php echo e($adminData->type); ?></a>
                            </li>
                            <li class="list-group-item">
                                <strong>Created at</strong> <a class="float-right"><?php echo e(date('M d, Y H:i A', strtotime($adminData->created_at))); ?></a>
                            </li>
                            <li class="list-group-item">
                                <strong>Last Modified at</strong> <a class="float-right"><?php echo e(date('M d, Y h:i A', strtotime($adminData->updated_at))); ?></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /. Card -->
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PROJECTS\BitBucket\NEW\VaultsPay\resources\views/admin/profile/profile.blade.php ENDPATH**/ ?>