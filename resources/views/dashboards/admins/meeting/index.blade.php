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
        <form method="post" action="{{ route('meeting.store') }}"  enctype="multipart/form-data">
            @csrf       
            <div class="row g-3 mb-3">
                <div class="col-sm-4">
                    <label class="form-label">Enter Meeting Date</label>
                  <input type="date"  name="date" class="form-control">
                </div>

                <div class="col-sm-4">
                    <label class="form-label">Enter Meeting Date</label>
                  <input type="time"  name="time" class="form-control">
                </div>

                <div class="col-sm-4">
                    <label class="form-label">Enter Meeting Venue</label>
                  <input type="text" placeholder="Enter Meeting Venue" name="venue" class="form-control">
                </div>

                  <div class="multiselect">
                    <h5>Check Present Member</h5>
                    <div id="checkboxes">
                        @foreach ($values as $value)
                        <label>
                            <input type="checkbox" name="p_member" value="{{ $value->id  }}" />{{ $value->em_name }}</label><br>
                        @endforeach
                    </div>
                  </div>
  
                
                <div class="col-sm-12">
                    <label class="form-label"> Meeting introduction</label>
                   <textarea name="introduction"  cols="80"  id="summernote"  class="form-control"></textarea>  
                </div>

                <div class="col-sm-12">
                    <label class="form-label">ENDORSEMENT OF THE PREVIOUS MEETING MINUTES </label>
                   <textarea name="endorsement" id="summernote1" cols="80" class="form-control"></textarea>
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
                     <tr id="tr">
                         <td><input type="text" name="agenda[]" placeholder="Enter agenda" class="form-control" />
                         </td>
                         <td><input type="text" name="pic[]" placeholder="Enter pic" class="form-control" />
                         </td>
                         <td><input type="text" name="remarks[]" placeholder="Enter Remarks" class="form-control" />
                         </td>
                         <td><button type="button" name="add" id="add_btn" class="btn btn-outline-primary">Add More</button></td>
                     </tr>
 
                    </tbody>

                 </table>
 
                <div class="col-sm-12">
                    <label class="form-label">CLOSING</label>
                   <textarea name="closing" id="summernote2"></textarea>
                </div>

                <div class="col-sm-12">
                    <button type="submit" >Submit</button>
                </div>
            </div>
        </form>
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
                        {{ $v->date }}
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
                        <a href="{{ route('meeting.delete',$v->id) }}">
                            <button class="bg bg-danger">Delete</button>
                        </a>

                     </div>
                    @endforeach

                    </div>
                    
                </div>
               
                <!-- Row End -->
            </div>
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