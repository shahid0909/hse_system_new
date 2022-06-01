@extends('layouts.app')
@section('title')
    Meeting
@endsection
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
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
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

        <h3 class="bg bg-success text-center text-white p-3">Meeting Minutes</h3>
        <form method="post"  enctype="multipart/form-data"

            @if(isset($data1->id))
            action="{{ route('meeting.meeting-update', ['id' => $data1->id]) }}">
          <input name="_method" type="hidden" value="PUT">
          @else
          action="{{ route('meeting.store') }}">
          @endif
            @csrf
            <input type="hidden" name="meeting_id">
            <div class="row g-3 mb-3">
                <div class="col-sm-4">
                    <label class="form-label">Enter Meeting Date</label>
                  <input type="date"  name="meeting_date" class="form-control" value="{{isset($data1->meeting_date) ? $data1->meeting_date:''}}">
                </div>

                <div class="col-sm-4">
                    <label class="form-label">Enter Meeting Time</label>
                  <input type="time"  name="time" class="form-control"  value="{{isset($data1->time) ? $data1->time:''}}">
                </div>

                <div class="col-sm-4">
                    <label class="form-label">Enter Meeting Venue</label>
                  <input type="text" placeholder="Enter Meeting Venue" name="venue" class="form-control" value="{{isset($data1->venue) ? $data1->venue:''}}">
                </div>


                {{-- <option value="{{ $list->id }}" {{ ($list->id == $data->job_activity_id) ? 'selected': ''}} >{{ $list->job_activity }}</option> --}}

                
                <div class="multiselect">
                    <h5>Check Present Member</h5>
                    <div id="checkboxes">
                        @foreach ($values as $value)
                        <label>
                            <input type="checkbox" name="p_member[]" value="{{ $value-> em_name }}"

                            @if (isset($data1->id))

                            @foreach ($data2 as $data)
                          
                            {{ $data->p_member==$data->p_member ? 'checked' : '' }}
                       
                                    
                              
                                
                            @endforeach
            
                        @endif


                             /><span style="margin:0px 10px;font-size:17px;font-weight:700">
                                {{ $value->em_name }}--{{ $value->designation}}</span></label>
                        @endforeach
                    </div>
                  </div> 
        
                  {{-- <div class="multiselect">
                    <h5>Check Present Member</h5>
                    <div id="checkboxes">
                        @foreach ($values as $value)
                        <label>
                            <input type="checkbox" name="p_member[]" value="{{ $value-> em_name }}"/><span style="margin:0px 10px;font-size:17px;font-weight:700">
                                {{ $value->em_name }}--{{ $value->designation}}</span></label>
                        @endforeach
                    </div>
                  </div>  --}}
                    
         
         
          

                {{-- @else
                <div class="multiselect">
                    <h5>Check Present Member</h5>
                    <div id="checkboxes">
                        @foreach ($values as $value)
                        <label>
                            <input type="checkbox" name="p_member" value="{{ $value->id  }}" /><span style="margin:0px 10px;font-size:17px;font-weight:700">
                                {{ $value->em_name }}--{{ $value->designation}}</span></label>
                        @endforeach
                    </div>
                  </div> 
                @endif --}}
                <div class="col-sm-12">
                    <label class="form-label"> Meeting introduction</label>
                   <textarea name="introduction"  cols="80"  id="summernote"  class="form-control">{{isset($data1->introduction) ? $data1->introduction:''}}</textarea>
                </div>

                <div class="col-sm-12">
                    <label class="form-label">ENDORSEMENT OF THE PREVIOUS MEETING MINUTES </label>
                   <textarea name="endorsement" id="summernote1" cols="80" class="form-control">{{isset($data1->endorsement) ? $data1->endorsement:''}}</textarea>
                </div>
                <table class="table table-bordered" id="dynamicAddRemove">
                    <thead>
                     <tr>
                         <th>Agenda</th>
                         <th>Pic</th>
                         <th>Remarks</th>

                     </tr>
                    </thead>
                    <tbody>
                        @if (isset($data1->id))
                        @foreach ($data2 as $data)
                        <tr id="tr">
                            <td><input type="text" name="agenda[]" placeholder="Enter agenda" class="form-control"  value="{{ isset($data->agenda) ? $data->agenda:''}}">
                            </td>
                            <td><input type="text" name="pic[]" placeholder="Enter pic" class="form-control"  value="{{ isset($data->pic) ? $data->pic:''}}"  />
                            </td>
                            <td><input type="text" name="remarks[]" placeholder="Enter Remarks" class="form-control"  value="{{ isset($data->remarks) ? $data->remarks:''}}"  />
                            </td>
                            <td><button type="button" name="add" id="add_btn" class="btn btn-outline-primary">Add More</button></td>
                        </tr>
                        @endforeach
                        @else
                        <tr id="tr">
                            <td><input type="text" name="agenda[]" placeholder="Enter agenda" class="form-control"  >
                            </td>
                            <td><input type="text" name="pic[]" placeholder="Enter pic" class="form-control"  />
                            </td>
                            <td><input type="text" name="remarks[]" placeholder="Enter Remarks" class="form-control"   />
                            </td>
                            <td><button type="button" name="add" id="add_btn" class="btn btn-outline-primary">Add More</button></td>
                        </tr>
                            
                        @endif
                

                    </tbody>

                 </table>
           

                <div class="col-sm-12">
                    <label class="form-label">CLOSING</label>
                   <textarea name="closing" id="summernote2">{{ isset($data1->closing) ? $data1->closing:''}}</textarea>
                </div>

               
                @if (isset($data1->id))
                <div class="col-sm-12">
                    <button type="submit" >Update</button>
                </div>
                @else
                <div class="col-sm-12">
                    <button type="submit" >Submit</button>
                </div>
                @endif
            </div>
        </form>

        @if (isset($data1->id))
        @else
        <div class="container">
            <h1 class=" text-center">Meeting Report</h1>
            <div class="row ">
                <div class="col-md-12">
                   <div class="row "  style="border-bottom: 2px solid black;border-top: 2px solid black">
                       <div class="col-md-3  bg bg-info  text-center  p-2">
                          Date
                       </div>
                       <div class="col-md-3  bg bg-info text-center  p-2">
                        Time
                       </div>
                       <div class="col-md-3  bg bg-info text-center p-2">
                         Venue
                       </div>
                       <div class="col-md-3  bg bg-info text-center p-2">
                         Action
                       </div>

                   </div>
                </div>

            </div>
         
      
          <div class="row">
            <div class="col-md-12">
                <div class="row">
                    @foreach ($s_values as $v)
                <div class="col-md-3  text-center  p-2">
                    {{ $v->meeting_date }}
                 </div>
                 <div class="col-md-3  text-center  p-2">
                 {{ $v->time}}
                 </div>
                 <div class="col-md-3  text-center p-2">
                  {{ $v->venue }}
                 </div>
                 <div class="col-md-3  text-center  p-2">
                    <a href="{{ route('meeting.report', $v->id )}}">
                        <button class="bg bg-info">view Details</button>
                    </a>
                    <a href="{{ route('meeting.meeting-edit', $v->id )}}">
                        <button class="bg bg-info">Edit</button>
                    </a>
                    <a href="{{ route('meeting.delete',$v->id) }}">
                        <button class="bg bg-danger">Delete</button>
                    </a>

                 </div>
                @endforeach

                </div>

            </div>

            <!-- Row End -->
        </div>
              
          @endif
        </div>


    </div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
        $(document).ready(function() {
            $('#summernote1').summernote();
        });
        $(document).ready(function() {
            $('#summernote2').summernote();
        });
    </script>
   <script type="text/javascript">
   $(document).ready(function(){
    $("#add_btn").on('click',function () {
        var html=' ';
        html+=''
        html+='<tr>';
        html+='<td><input type="text" name="agenda[]" class="form-control"</td>';
        html+='<td><input type="text" name="pic[]" class="form-control"</td>';
        html+='<td><input type="text" name="remarks[]" class="form-control"</td>';
        html+='<td><button type="button" class="btn btn-primary" id="remove" >Remove</button></td>';
        html+='</tr>';
        $('tbody').append(html);
    })
   });
   $(document).on('click','#remove',function(){
      $(this).closest('tr').remove();
   });
</script>
        <!-- Row End -->
    </div>
@endsection