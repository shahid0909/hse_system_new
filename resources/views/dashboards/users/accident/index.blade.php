@extends('layouts.app')
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/tables/datatable/datatables.min.css')}}">
    <style>
        .inpcol {

            outline: 1px solid #5b998d;
        }

        .span {
            content: '*';
            color: red;
        }

        .toast-top-center {
            top: 2rem;
            left: 0%;
            margin: 0 0 0 0;
        }

    </style>
    <!-- Body: Body -->
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
<div class="row">
    <div class="col-md-6">
        <h3 class="text-center bg bg-success text-white">Enter Accident Analyzee All Data</h3>
        <form action="{{ route('accident.store') }}"  method="post" enctype="multipart/form-data">
            @csrf

            <div class="col-md-6">
                <label  class="form-label">Name of Department</label>
                <select class="form-select" aria-label="Default select example" name="department">
                    <option selected>--Select--</option>
                    @foreach ($departments as  $department)
                    <option value="{{ $department->id }}">{{ $department->depertment_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <label  class="form-label">Injured Person</label>
                <select class="form-select" aria-label="Default select example" name="person">
                    @foreach ($employes as $employe)
                    <option selected>--select--</option>
                    <option value="{{ $employe->id }}">{{  $employe->em_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <label for="postcode" class="form-label">Date of Incident</label>
                <input type="date" class="form-control" name="i_date" required>
            </div>
      
            <div class="col-md-6">
                <label for="postcode" class="form-label">Time of Incident</label>
                <input type="time" class="form-control" name="i_time" required>
            </div>

            <div class="col-md-6">
                <label for="postcode" class="form-label">Location of Incident</label>
                <input type="text" class="form-control" name="l_incident"  placeholder="Enter location" required>
            </div>

            <div class="col-md-12">
                <div class="steps-form-btn">
                  <button type="submit" >Submit</button>
                </div>
            </div>
        </form>
    </div>

    <div class="col-md-6">
        <table class="table">
            <h3 class="text-center bg bg-success text-white">Accident Analyzee All Data</h3>
            <thead>
              <tr>
                <th scope="col">Employee Department</th>
                <th scope="col">Employee Name</th>
                <th scope="col">Accident Date</th>
                <th scope="col">Accident Time</th>
                <th scope="col">Accident Location</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($analysis as $analys)
                <tr>
                <td>{{ $analys->department->depertment_name }}</td>
                <td>{{ $analys->employee->em_name }}</td>
                <td>{{ $analys->date }}</td>
                <td>{{ $analys->time }}</td>
                <td>{{ $analys->location }}</td>
                <td>
                 
                    <a href="{{ route('accident.destroy',['id'=>$analys->id])}}">
                        <button class="bg bg-danger">
                        Delete
                        </button>
                    </a>
                </td>
            </tr>
                @endforeach
            </tbody>
          </table>
    </div>
</div>     
@endsection

