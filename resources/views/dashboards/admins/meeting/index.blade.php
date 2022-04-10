@extends('layouts.app')

@section('title')
    Meeting
@endsection

@section('style')
@endsection



@section('content')

    <!-- sidebar -->
    @include('dashboards.users.partial.sidebar')

    <!-- main body area -->
    <div class="main px-lg-4 px-md-4">
        <!-- Body: Header -->
        @include('dashboards.users.partial.header')

        @if ($message = Session::get('success'))
            <div class="alert alert-success message">
                <p>{{ $message }}</p>
            </div>
        @endif
        <h3 class="bg bg-success text-center text-white">Generate Meeting</h3>
        <form method="post" action="{{ route('meeting.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row g-3 mb-3">
                <div class="col-sm-6">
                    <label for="item" class="form-label">Meeting Title</label>
                    <input type="text" name="title" class="form-control col-md-12" placeholder="Enter  Title">
                </div>

                <div class="col-sm-6">
                    <label for="item" class="form-label">Meeting Date</label>
                    <input type="Date" name="date" class="form-control col-md-12" placeholder="Enter Meeting Date">
                </div>

                <div class="col-sm-6">
                    <label for="item" class="form-label">Meeting Time</label>
                    <input type="time" name="time" class="form-control col-md-12" placeholder="Enter Meeting Date">
                </div>

                <div class="col-sm-6">
                    <label for="item" class="form-label">Meeting Venue</label>
                    <input type="text" name="venue" class="form-control col-md-12" placeholder="Enter Venue Name">
                </div>

                <div class="col-sm-6">
                    <label class="form-label">Meeting Attendance</label>
                    <select name="m_attend_id"
                            class="form-control col-md-12">
                        <option value="">Select Designation</option>
                        @foreach ($values as $value)
                            <option value="{{  $value->id  }}">{{ $value->em_name }}</option>
                        @endforeach

                    </select>
                </div>

                <div class="col-sm-12">
                    <button type="submit">Submit</button>
                </div>

            </div>

        </form>
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <table
                        id="myProjectTable"
                        class="table table-hover datatable align-middle mb-0"
                        style="width: 100%"
                    >
                        <thead>
                        <tr>
                            <th>Sl.</th>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Venue</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <!-- Row End -->
    </div>


@endsection

@section('script')
    <script src="{{asset('assets/bundles/libscripts.bundle.js')}}"></script>
    <!-- Plugin Js-->
    <script src="{{asset('assets/bundles/dataTables.bundle.js')}}"></script>
    <!-- Jquery Page Js -->
    <script src="{{asset('../js/template.js')}}"></script>

    <script>
        // project data table
        $(document).ready(function () {
            setTimeout(function () {
                $('.message').fadeOut('fast');
            }, 500);

            $('.datatable').DataTable({

                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('meeting.datatable') }}",
                    type: 'GET',
                    'headers': {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                },
                "columns": [
                    {"data": 'DT_RowIndex', "name": 'DT_RowIndex'},
                    {"data": "title"},
                    {"data": "date"},
                    {"data": "time"},
                    {"data": "venue"},
                    //
                    // {data: 'action', name: 'action', orderable: false, searchable: false}
                ],
                language: {
                    paginate: {
                        next: '<i class="bx bx-chevron-right">',
                        previous: '<i class="bx bx-chevron-left">'
                    }
                }
            });
        });
    </script>
@endsection
