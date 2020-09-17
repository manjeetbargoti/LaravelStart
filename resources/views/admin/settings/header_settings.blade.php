@extends('layouts.admin.layout')
@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Settings</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('adminDashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('generalSettings') }}">Settings</a></li>
                    <li class="breadcrumb-item active">Header Settings</li>
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
                        <h3 class="card-title">Header Settings</h3>
                    </div>

                    <div class="card-body">
                        <div class="text-center">
                            <h3>Header Setting Page!</h3>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>


@endsection