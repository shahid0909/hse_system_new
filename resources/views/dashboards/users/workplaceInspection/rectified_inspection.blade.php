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

   <div class="body d-flex py-3">
          <div class="container-xxl">
            <!-- Row end  -->
            <div class="col-lg-12">
              <div class="card mb-3">
                  <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0">Rectified Workplace Inspection</h3>
                  </div>
                  <div class="card-body">
                    <div class="row align-item-center">
                      <div class="col-md-12">
                           <form id="basic-form" method="post" enctype="multipart/form-data"
                          @if(isset($data->id))
                              action="{{ route('rectified_inspection.update', ['id' => $data->id]) }}">
                              <input name="_method" type="hidden" value="PUT">
                               @else
                                       action="{{ route('rectified_inspection.store') }}" novalidate>
                               @endif


                             @csrf

                                <div class="row g-3 col-md-8 align-items-center" style="margin: 0 auto;">
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label class="form-label">Find Inspection</label>
                                          <!-- <input type="text" class="form-control" required> -->
                                          <select 
                                          name="find_inspection" 
                                          id="find_inspection" 
                                          class="col-md-12" 
                                          style="padding: 10px; border-radius: 3px; border-color: var(--border-color);">

                                           <option value="" >choose</option>
                                            @foreach($cri as $list)

                                          <option value="{{isset($list->id)}}">{{$list->inspection_title}}


                                          </option>

                                          @endforeach
                                          </select>
                                        
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                    <label for="date_rectified" class="form-label">DATE RECTIFIED </label>
                                    <input
                                      type="date"
                                      class="form-control w-100"
                                      id="date_rectified"
                                      name="date_rectified"
                                      value="{{isset($data->date_rectified) ? $data->date_rectified:''}}"
                                      required
                                    />
                                  </div>
                                <div class="col-md-12">
                                  <label for="formFileMultiple" class="form-label">
                                    TASK RECTIFIED WITH PICTURE</label
                                  >
                                  <input
                                    class="form-control"
                                    type="file"
                                    id="r_image"
                                    name="r_image"
                                    accept="image/*"
                                    value="{{isset($data->r_image) ? $data->r_image:''}}"
                                    multiple
                                    required
                                  />
                                   @if(isset($data->id))
                                                <img src="/image/rec_inspection/{{ $data->r_image }}" width="10%">@endif
                                </div>
                                  <button type="submit" class="btn btn-primary">Submit</button>
                              </div>
                          </form>
                      </div>
                  </div>
                  </div>


              </div>

                    <div class="col-lg-12">
                        <div class="card mb-3">
                            <div class="card-body">
                                <table
                                    id="myProjectTable"
                                    class="table table-hover datatable align-middle mb-0"
                                    style="width: 100%"
                                >
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th>Sl</th>
                                        <th>Find_inspection</th>
                                        <th>Image</th>
                                        <th>date_rectified</th>
                                        
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            </div>
          </div>
        </div>



   
@endsection

@section('script')

  <!-- Jquery Core Js -->
    <script src="{{asset('assets/bundles/libscripts.bundle.js')}}"></script>

    <!-- Plugin Js-->
    <script src="{{asset('assets/bundles/dataTables.bundle.js')}}"></script>

    <script src="{{asset('assets/plugin/parsleyjs/js/parsley.js')}}"></script>



    <!-- Jquery Page Js -->
    <script src="../js/template.js"></script>

         <script>

             function format ( d ) {
            // `d` is the original data object for the row
            return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
                '<tr>'+
                '<td>Full name:</td>'+
                '<td>'+d.find_insp.inspection_title+'</td>'+
                '</tr>'+
                '<tr>'+
                '<td>Extension number:</td>'+
                '<td>'+d.find_insp.inspection_title+'</td>'+
                '</tr>'+
                '<tr>'+
                '<td>Extra info:</td>'+
                '<td>And any further details here (images etc)...</td>'+
                '</tr>'+
                '</table>';
        }


                // project data table
                $(document).ready(function () {
                    setTimeout(function () {
                        $('.message').fadeOut('fast');
                    }, 500);

                     var table = $('.datatable').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: {
                            url: "{{ route('rectified_inspection.datatable') }}",
                            type: 'GET',
                            'headers': {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            }
                        },
                        "columns": [
                         {
                                "className":      'dt-control',
                                "orderable":      false,
                                "data":           null,
                                "defaultContent": ''
                            },
                            {"data": 'DT_RowIndex', "name": 'DT_RowIndex'},
                            {"data": "find_insp.inspection_title"},
                            {"data": "r_image"},

                            {"data": "date_rectified"},
                            
                                                        // {"data": "status"},
                            {data: 'action', name: 'action', orderable: false, searchable: false}
                        ],
                        language: {
                            paginate: {
                                next: '<i class="bx bx-chevron-right">',
                                previous: '<i class="bx bx-chevron-left">'
                            }
                        }
                    });



                    $('.datatable tbody').on('click', 'td.dt-control', function () {
                var tr = $(this).closest('tr');
                var row = table.row( tr );

                if ( row.child.isShown() ) {
                    // This row is already open - close it
                    row.child.hide();
                    tr.removeClass('shown');
                }
                else {
                    // Open this row
                    row.child( format(row.data()) ).show();
                    tr.addClass('shown');
                }
            } );

                });
            </script>


    

@endsection
