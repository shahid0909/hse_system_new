@extends('layouts.app')

@section('style')
    <style type="text/css">
        .select2-selection__rendered {
            line-height: 31px !important;
        }
        .select2-container .select2-selection--single {
            height: 35px !important;
        }
        .select2-selection__arrow {
            height: 34px !important;
        }
    </style>
@endsection

@section('content')
    <!-- sidebar -->
    @include('dashboards.users.partial.sidebar')

    <!-- main body area -->
    <div class="main px-lg-4 px-md-4">
        <!-- Body: Header -->
    @include('dashboards.users.partial.header')

    <!-- Body: Body -->
        <div class="body d-flex py-3">
            <div class="container-xxl">
                <div class="row align-items-center">
                    <div class="border-0 mb-4">
                        <div
                            class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap"
                        >
                            <h3 class="fw-bold mb-0">Company Profile</h3>
                        </div>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-xl-4 col-lg-5 col-md-12">
                        <div class="card profile-card flex-column mb-3">
                            <div
                                class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0"
                            >
                                <h6 class="mb-0 fw-bold">Profile</h6>
                            </div>
                            <div class="card-body d-flex profile-fulldeatil flex-column">
                                <div class="profile-block text-center w220 mx-auto">
                                    <a href="#">
                                        <img
                                            src="assets/images/com_logo.png"
                                            alt=""
                                            class="avatar xl rounded img-thumbnail shadow-sm"
                                        />
                                    </a>
                                    <button
                                        class="btn btn-primary"
                                        style="position: absolute; top: 15px; right: 15px"
                                        data-bs-toggle="modal"
                                        data-bs-target="#editprofile"
                                    >
                                        <i class="icofont-edit"></i>
                                    </button>
                                    <div
                                        class="about-info d-flex align-items-center mt-3 justify-content-center flex-column"
                                    >
                                        <span class="text-muted small">USER ID : PXL-0001</span>
                                    </div>
                                </div>
                                <div class="profile-info w-100">
                                    <h6 class="mb-0 mt-2 fw-bold d-block fs-6 text-center">
                                        Company Name
                                    </h6>
                                    <span
                                        class="py-1 fw-bold small-11 mb-0 mt-1 text-muted text-center mx-auto d-block"
                                    >Industry Type</span
                                    >
                                    <div class="row g-2 pt-2">
                                        <div class="col-xl-12">
                                            <div class="d-flex align-items-center">
                                                <i class="icofont-ui-touch-phone"></i>
                                                <span class="ms-2">202-555-0174 </span>
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="d-flex align-items-center">
                                                <i class="icofont-email"></i>
                                                <span class="ms-2">adrianallan@gmail.com</span>
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="d-flex align-items-center">
                                                <i class="icofont-birthday-cake"></i>
                                                <span class="ms-2">19/03/1980</span>
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="d-flex align-items-center">
                                                <i class="icofont-address-book"></i>
                                                <span class="ms-2"
                                                >2734 West Fork Street,EASTON 02334.</span
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div
                                class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0"
                            >
                                <h6 class="mb-0 fw-bold">Payment Method</h6>
                            </div>
                            <div class="card-body">
                                <div class="payment-info">
                                    <h5 class="payment-name text-muted">
                                        <i class="icofont-visa-alt fs-3"></i> Visa *******7548
                                    </h5>
                                    <span>Next billing charged $48</span>
                                    <br />
                                    <em class="text-muted">Autopay on July 20, 2021</em>
                                    <a
                                        href="javascript:void(0);"
                                        class="edit-payment-info text-secondary"
                                    >Edit Payment Info</a
                                    >
                                </div>
                                <p class="mt-3">
                                    <a href="javascript:void(0);" class="btn btn-primary">
                                        Add Payment Info</a
                                    >
                                </p>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h5>Notification preferences</h5>
                                <span class="text-muted"
                                >Control all our newsletter and email related
                      notifications to your email</span
                                >
                                <div class="mt-4">
                                    <div class="form-check form-switch mt-2">
                                        <input
                                            class="form-check-input"
                                            type="checkbox"
                                            id="np-Newsletter"
                                        />
                                        <label class="form-check-label" for="np-Newsletter"
                                        >Activity Notifications</label
                                        >
                                    </div>
                                    <div class="form-check form-switch mt-2">
                                        <input
                                            class="form-check-input"
                                            type="checkbox"
                                            id="np-Notifications"
                                        />
                                        <label class="form-check-label" for="np-Notifications"
                                        >Comment Notifications</label
                                        >
                                    </div>
                                    <div class="form-check form-switch mt-2">
                                        <input
                                            class="form-check-input"
                                            type="checkbox"
                                            id="np-Preferences"
                                            checked=""
                                        />
                                        <label class="form-check-label" for="np-Preferences"
                                        >Email Preferences</label
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-7 col-md-12">
                        <div class="card mb-3">
                            <div
                                class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0"
                            >
                                <h6 class="mb-0 fw-bold">Profile Settings</h6>
                            </div>
                            <div class="card-body">
                                <form class="row g-4">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">User Name</label>
                                            <input class="form-control" type="text" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Password</label>
                                            <input class="form-control" type="Password" />
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label"
                                            >Company Name
                                                <span class="text-danger">*</span></label
                                            >
                                            <input class="form-control" type="text" value="" />
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Contact Person</label>
                                            <input class="form-control" type="text" />
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label"
                                            >Mobile Number
                                                <span class="text-danger">*</span></label
                                            >
                                            <input class="form-control" type="text"
                                                   onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))"/>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label">Address</label>
                                            <textarea
                                                class="form-control"
                                                aria-label="With textarea"
                                            ></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label class="form-label"
                                        >Email <span class="text-danger">*</span></label
                                        >
                                        <div class="input-group">
                                            <span class="input-group-text">@</span>
                                            <input type="text" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label class="form-label">Website Url</label>
                                        <div class="input-group">
                                            <span class="input-group-text">http://</span>
                                            <input type="text" class="form-control" value="" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label class="form-label">Country</label>
                                            <select class="form-control select2">
                                                <option value="">-- Select Country --</option>
                                                @foreach($country as $list)
                                                    <option value="{{$list->id}}">{{$list->country}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label class="form-label">State/Province</label>
                                            <select class="form-control">
                                                <option>California</option>
                                                <option>Alaska</option>
                                                <option>Alabama</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label class="form-label">City</label>
                                            <input class="form-control" type="text" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label class="form-label">Postal Code</label>
                                            <input class="form-control" type="text" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" />
                                        </div>
                                    </div>

                                    <div class="col-12 mt-4">
                                        <button
                                            type="button"
                                            class="btn btn-primary text-uppercase px-5"
                                        >
                                            SAVE
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card auth-detailblock">
                            <div
                                class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0"
                            >
                                <h6 class="mb-0 fw-bold">Authentication Details</h6>
                                <button
                                    class="btn btn-primary"
                                    data-bs-toggle="modal"
                                    data-bs-target="#authchange"
                                >
                                    <i class="icofont-edit"></i>
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label class="form-label col-6 col-sm-5"
                                        >User Name :</label
                                        >
                                        <span><strong>Adrian007</strong></span>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label col-6 col-sm-5"
                                        >Login Password :</label
                                        >
                                        <span><strong>Abc*******</strong></span>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label col-6 col-sm-5"
                                        >Last Login:</label
                                        >
                                        <span><strong>128.456.89 (Apple) safari</strong></span>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label col-6 col-sm-5"
                                        >Last Password change:</label
                                        >
                                        <span><strong>3 Month Ago</strong></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    {{--<div class="container">--}}
    {{--    <div class="row justify-content-center">--}}
    {{--        <div class="col-md-8">--}}
    {{--            <div class="card">--}}
    {{--                <div class="card-header">{{ __('Dashboard') }}</div>--}}

    {{--                <div class="card-body">--}}
    {{--                    @if (session('status'))--}}
    {{--                        <div class="alert alert-success" role="alert">--}}
    {{--                            {{ session('status') }}--}}
    {{--                        </div>--}}
    {{--                    @endif--}}

    {{--                    {{ __('You are logged in!') }}--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    {{--</div>--}}
@endsection
