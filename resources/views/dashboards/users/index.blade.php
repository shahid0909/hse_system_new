@extends('layouts.app')

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
                <div
                    class="row g-3 mb-3 row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-2 row-cols-xl-4"
                >
                    <div class="col">
                        <div class="alert-success alert mb-0">
                            <div class="d-flex align-items-center">
                                <div
                                    class="avatar rounded no-thumbnail bg-success text-light"
                                >
                                    <i class="fa fa-user fa-lg"></i>
                                </div>
                                <div class="flex-fill ms-3 text-truncate">
                                    <div class="h6 mb-0">Registered Clients</div>
                                    <span class="small">18,925</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="alert-danger alert mb-0">
                            <div class="d-flex align-items-center">
                                <div
                                    class="avatar rounded no-thumbnail bg-danger text-light"
                                >
                                    <i class="fa fa-credit-card fa-lg"></i>
                                </div>
                                <div class="flex-fill ms-3 text-truncate">
                                    <div class="h6 mb-0">Pending Clients</div>
                                    <span class="small">$11,024</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="alert-warning alert mb-0">
                            <div class="d-flex align-items-center">
                                <div
                                    class="avatar rounded no-thumbnail bg-warning text-light"
                                >
                                    <i class="fa fa-smile-o fa-lg"></i>
                                </div>
                                <div class="flex-fill ms-3 text-truncate">
                                    <div class="h6 mb-0">Total Chemical</div>
                                    <span class="small">8,925</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="alert-info alert mb-0">
                            <div class="d-flex align-items-center">
                                <div class="avatar rounded no-thumbnail bg-info text-light">
                                    <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                </div>
                                <div class="flex-fill ms-3 text-truncate">
                                    <div class="h6 mb-0">Total Training</div>
                                    <span class="small">8,925</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row end  -->
                <div class="row g-3 mb-3">
                    <div class="col-md-12">
                        <div class="card">
                            <div
                                class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0"
                            >
                                <h6 class="m-0 fw-bold">Recent Applications</h6>
                            </div>
                            <div class="card-body">
                                <table
                                    id="myDataTable"
                                    class="table table-hover align-middle mb-0"
                                    style="width: 100%"
                                >
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Lavel</th>
                                        <th>Customer Name</th>
                                        <th>Industry Type</th>
                                        <th>COMPANY ROC</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><strong>#78414</strong></td>
                                        <td><span> 01 </span></td>
                                        <td>La Meridian</td>
                                        <td>Resturent</td>
                                        <td>420</td>
                                        <td>
                                            <span class="badge bg-warning">Progress</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>#58414</strong></td>
                                        <td><span>02 </span></td>
                                        <td>Brian</td>
                                        <td>industry</td>
                                        <td>220</td>
                                        <td>
                                            <span class="badge bg-success">Complited</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>#78414</strong></td>
                                        <td><span> 01 </span></td>
                                        <td>La Meridian</td>
                                        <td>Resturent</td>
                                        <td>420</td>
                                        <td>
                                            <span class="badge bg-warning">Progress</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>#58414</strong></td>
                                        <td><span>02 </span></td>
                                        <td>Brian</td>
                                        <td>industry</td>
                                        <td>220</td>
                                        <td>
                                            <span class="badge bg-success">Complited</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>#78414</strong></td>
                                        <td><span> 01 </span></td>
                                        <td>La Meridian</td>
                                        <td>Resturent</td>
                                        <td>420</td>
                                        <td>
                                            <span class="badge bg-warning">Progress</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>#58414</strong></td>
                                        <td><span>02 </span></td>
                                        <td>Brian</td>
                                        <td>industry</td>
                                        <td>220</td>
                                        <td>
                                            <span class="badge bg-success">Complited</span>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row end  -->
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
