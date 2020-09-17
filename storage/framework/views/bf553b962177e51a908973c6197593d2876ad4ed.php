
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
                    <li class="breadcrumb-item"><a href="<?php echo e(route('adminProfile')); ?>">Profile</a></li>
                    <li class="breadcrumb-item active">Update Profile</li>
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
            <div class="col-lg-6 col-6">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Update Profile</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="<?php echo e(route('editAdminProfile')); ?>" method="POST"
                        name="updateAdminPasswordForm" id="updateAdminPassword" autocomplete="off">
                        <?php echo csrf_field(); ?>

                        <div class="card-body">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="<?php echo e(asset('admin/img/user2-160x160.jpg')); ?>"
                                    alt="User profile picture">
                            </div>
                            <div class="form-group">
                                <label for="Name">Name</label>
                                <input type="text" name="name" class="form-control" id="adminName"
                                    value="<?php echo e($adminData->name); ?>">
                            </div>
                            <div class="form-group">
                                <label for="Email Address">Email address</label>
                                <input type="email" name="email" class="form-control" id="adminEmail"
                                    value="<?php echo e($adminData->email); ?>">
                            </div>
                            <div class="form-group">
                                <label for="Admin Type">Admin Type</label>
                                <input type="text" name="type" class="form-control" id="adminType" value="<?php echo e($adminData->type); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="Phone Number">Phone Number</label>
                                <input type="tel" name="mobile" class="form-control" id="adminPhoneNumber" value="<?php echo e($adminData->mobile); ?>">

                            </div>
                            <div class="form-group">
                                <span id="profileUpdateGlobalMsg" class="pt-4"></span>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="reset" class="btn btn-warning">Reset</button>
                            <button type="submit" id="changePassSubmitBtn"
                                class="btn btn-primary float-right">Update</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\My Projects\ecommerce\resources\views/admin/profile/edit_profile.blade.php ENDPATH**/ ?>