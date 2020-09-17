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
                    <li class="breadcrumb-item active">General Settings</li>
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
            <div class="col-lg-8 col-8">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">General Settings</h3>
                    </div>
                    <form role="form" class="form-horizontal" action="{{ route('generalSettings') }}" enctype="multipart/form-data" method="POST" name="updateGeneralSettings"
                        id="updateGeneralSettings">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="Website Title" class="col-sm-3 col-form-label">Website Title</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="site_title" id="siteTitle" value="{{ config('app.name') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Website Url" class="col-sm-3 col-form-label">Website Url</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="site_url" id="siteUrl" value="{{ config('app.url') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Administration Email" class="col-sm-3 col-form-label">Administration Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" name="email" id="siteEmail" value="{{ config('app.email') }}">
                                    <span class="text-info"><small><i class="fa fa-info-circle"></i> This email address is used for admin purposes. If you change this, we will send you an email at your new address to confirm it. <strong>The new address will not become active until confirmed.</strong></small></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Administration Phone" class="col-sm-3 col-form-label">Administration Phone</label>
                                <div class="col-sm-9">
                                    <input type="tel" class="form-control" name="phone" id="sitePhone" value="{{ config('app.phone') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Timezone" class="col-sm-3 col-form-label">Timezone</label>
                                <div class="col-sm-9">
                                    <select class="form-control select2" name="site_timezone" id="siteTimezone" style="width: 100%;">
                                        <option @if(config('app.timezone') == 'Alabama') selected @endif>Alabama</option>
                                        <option @if(config('app.timezone') == 'Alaska') selected @endif>Alaska</option>
                                        <option @if(config('app.timezone') == 'California') selected @endif>California</option>
                                        <option @if(config('app.timezone') == 'Delaware') selected @endif>Delaware</option>
                                        <option @if(config('app.timezone') == 'Tennessee') selected @endif>Tennessee</option>
                                        <option @if(config('app.timezone') == 'Texas') selected @endif>Texas</option>
                                        <option @if(config('app.timezone') == 'Washington') selected @endif>Washington</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Date Format" class="col-sm-3 col-form-label">Date Format</label>
                                <div class="col-sm-9">
                                    <div class="icheck-primary">
                                        <input type="radio" id="dateFormat1" name="date_format" value="F j, Y" @if(config('app.date_format') == "F j, Y") checked @endif>
                                        <label for="dateFormat1">{{ date("F j, Y") }}</label> <span class="float-right badge badge-info">F j, Y</span>
                                    </div>

                                    <div class="icheck-primary">
                                        <input type="radio" id="dateFormat2" name="date_format" value="Y-m-d" @if(config('app.date_format') == "Y-m-d") checked @endif>
                                        <label for="dateFormat2">{{ date("Y-m-d") }}</label> <span class="float-right badge badge-info">Y-m-d</span>
                                    </div>
                                    <div class="icheck-primary">
                                        <input type="radio" id="dateFormat3" name="date_format" value="m/d/Y" @if(config('app.date_format') == "m/d/Y") checked @endif>
                                        <label for="dateFormat3">{{ date("m/d/Y") }}</label> <span class="float-right badge badge-info">m/d/Y</span>
                                    </div>
                                    <div class="icheck-primary">
                                        <input type="radio" id="dateFormat4" name="date_format" value="d/m/y" @if(config('app.date_format') == "d/m/y") checked @endif>
                                        <label for="dateFormat4">{{ date("d/m/y") }}</label> <span class="float-right badge badge-info">d/m/Y</span>
                                    </div>
                                    <div class="icheck-primary">
                                        <input type="radio" id="dateFormat5" name="date_format" value="j F, Y" @if(config('app.date_format') == "j F, Y") checked @endif>
                                        <label for="dateFormat5">{{ date("j F, Y") }}</label> <span class="float-right badge badge-info">j F, Y</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Time Format" class="col-sm-3 col-form-label">Time Format</label>
                                <div class="col-sm-9">
                                    <div class="icheck-primary">
                                        <input type="radio" id="timeFormat1" name="time_format" value="h:i A" @if(config('app.time_format') == "h:i A") checked @endif>
                                        <label for="timeFormat1">{{ date("h:i A") }}</label> <span class="float-right badge badge-info">h:i A</span>
                                    </div>

                                    <div class="icheck-primary">
                                        <input type="radio" id="timeFormat2" name="time_format" value="h:i a" @if(config('app.time_format') == "h:i a") checked @endif>
                                        <label for="timeFormat2">{{ date("h:i a") }}</label> <span class="float-right badge badge-info">h:i a</span>
                                    </div>
                                    <div class="icheck-primary">
                                        <input type="radio" id="timeFormat3" name="time_format" value="G:i" @if(config('app.time_format') == "G:i") checked @endif>
                                        <label for="timeFormat3">{{ date("G:i") }}</label> <span class="float-right badge badge-info">G:i</span>
                                    </div>
                                    <div class="icheck-primary">
                                        <input type="radio" id="timeFormat4" name="time_format" value="g:i a" @if(config('app.time_format') == "g:i a") checked @endif>
                                        <label for="timeFormat4">{{ date("g:i a") }}</label> <span class="float-right badge badge-info">g:i a</span>
                                    </div>
                                    <div class="icheck-primary">
                                        <input type="radio" id="timeFormat5" name="time_format" value="g:i A" @if(config('app.time_format') == "g:i A") checked @endif>
                                        <label for="timeFormat5">{{ date("g:i A") }}</label> <span class="float-right badge badge-info">g:i A</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Week Start Day" class="col-sm-3 col-form-label">Week Starts on</label>
                                <div class="col-sm-9">
                                    <select class="form-control select2" id="weekStartDay" name="start_of_week">
                                        <option value="0" @if(config('app.week_start') == 0) selected @endif>Sunday</option>
                                        <option value="1" @if(config('app.week_start') == 1) selected @endif>Monday</option>
                                        <option value="2" @if(config('app.week_start') == 2) selected @endif>Tuesday</option>
                                        <option value="3" @if(config('app.week_start') == 3) selected @endif>Wednesday</option>
                                        <option value="4" @if(config('app.week_start') == 4) selected @endif>Thursday</option>
                                        <option value="5" @if(config('app.week_start') == 5) selected @endif>Friday</option>
                                        <option value="6" @if(config('app.week_start') == 6) selected @endif>Saturday</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Website Logo" class="col-sm-3 col-form-label">Website Logo</label>
                                <div class="col-sm-9">
                                    <div class="col-sm-12 customFile col-12">
                                        <input type="file" name="site_logo" class="custom-file-input" id="siteLogo">
                                        <label class="custom-file-label" for="Site Logo">Choose Logo</label>
                                    </div>
                                    <div class="pt-3 websiteLogoView">
                                        @if(empty(config('app.logo')))
                                        <img class="img-responsive" width="150" src="{{ asset('/admin/img/default/logo.png') }}" alt="Attachment Image">
                                        @else
                                        <img class="img-responsive" width="150" src="{{ asset('/admin/img/common/'.config('app.logo')) }}" alt="Attachment Image">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Favicon" class="col-sm-3 col-form-label">Favicon</label>
                                <div class="col-sm-9">
                                    <div class="col-sm-12 customFile">
                                        <input type="file" name="site_icon" class="custom-file-input" id="siteIcon">
                                        <label class="custom-file-label" for="Site Icon">Choose favicon</label>
                                    </div>
                                    <div class="pt-3 websiteFaviconView">
                                        @if(empty(config('app.favicon')))
                                        <img class="img-responsive" width="64" src="{{ asset('/admin/img/default/favicon.png') }}" alt="Attachment Image">
                                        @else
                                        <img class="img-responsive" width="64" src="{{ asset('/admin/img/common/'.config('app.favicon')) }}" alt="Attachment Image">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Favicon" class="col-sm-3 col-form-label">Small Logo icon<br> <span class="text-info"><small><i class="fa fa-info-circle"></i> This icon for dashboard to show in Sidebar header.</small></span></label>
                                
                                <div class="col-sm-9">
                                    <div class="col-sm-12 customFile">
                                        <input type="file" name="site_logo_icon" class="custom-file-input" id="siteLogoIcon">
                                        <label class="custom-file-label" for="Site Logo Icon">Choose logo icon</label>
                                    </div>
                                    <div class="pt-3 websiteFaviconView">
                                        @if(empty(config('app.logo_icon')))
                                        <img class="img-responsive" width="64" src="{{ asset('/admin/img/default/logo_icon.png') }}" alt="Attachment Image">
                                        @else
                                        <img class="img-responsive" width="64" src="{{ asset('/admin/img/common/'.config('app.logo_icon')) }}" alt="Attachment Image">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <!-- <button type="button" href="{{ route('adminDashboard') }}" class="btn btn-warning">Reset</button> -->
                            <button type="submit" id="settingUpdateSubmitBtn"
                                class="btn btn-primary float-right">Update Settings</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection