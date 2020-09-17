
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
                    <li class="breadcrumb-item active">Change Password</li>
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
                        <h3 class="card-title">Update Password</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="<?php echo e(route('adminUpdatePassword')); ?>" method="POST"
                        name="updateAdminPasswordForm" id="updateAdminPassword" autocomplete="off">
                        <?php echo csrf_field(); ?>

                        <div class="card-body">
                            <div class="form-group">
                                <label for="Name">Name</label>
                                <input type="text" name="name" class="form-control" id="adminName"
                                    value="<?php echo e(Auth::guard('admin')->user()->name); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="Email Address">Email address</label>
                                <input type="email" name="email" class="form-control" id="adminEmail"
                                    value="<?php echo e(Auth::guard('admin')->user()->email); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="Current Password">Current Password</label>
                                <input type="password" name="currentPassword" class="form-control" id="currentPassword"
                                    placeholder="Current Password" autocomplete="new-password">
                                <span id="currentPasswordMsg"></span>
                            </div>
                            <div class="form-group">
                                <label for="New Password">New Password</label>
                                <input type="password" name="newPassword" class="form-control" id="newAdminPassword"
                                    placeholder="New Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                    title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                                <span id="adminPassValidation" class="d-none"><small id="lowercaseValidation"
                                        class="text-danger"><i id="lowercaseIcon" class="fa fa-exclamation-circle"></i>
                                        Must have 1 Lowercase letter</small><br>
                                    <small id="uppercaseValidation" class="text-danger"><i id="uppercaseIcon"
                                            class="fa fa-exclamation-circle"></i> Must have 1 Uppercase (capital)
                                        letter</small><br>
                                    <small id="numberValidation" class="text-danger"><i id="numbersIcon"
                                            class="fa fa-exclamation-circle"></i> Must contain at least one
                                        number</small><br>
                                    <small id="lengthValidation" class="text-danger"><i id="lengthIcon"
                                            class="fa fa-exclamation-circle"></i> At least 8 or more
                                        characters</small></span>
                            </div>
                            <div class="form-group">
                                <label for="Confirm Password">Confirm Password</label>
                                <input type="password" name="confirmPassword" class="form-control"
                                    id="confirmAdminPassword" placeholder="Confirm Password">
                                <span id="confirmPasswordMsg"></span>
                            </div>
                            <div class="form-group">
                                <span id="currentPasswordGlobalMsg" class="pt-4"></span>
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
<?php echo $__env->make('layouts.admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PROJECTS\BitBucket\NEW\VaultsPay\resources\views/admin/profile/update_password.blade.php ENDPATH**/ ?>