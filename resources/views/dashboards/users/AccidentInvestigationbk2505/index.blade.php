@extends('layouts.app')
@section('title')
@endsection
@section('css')
@endsection
@section('content')
    <!-- sidebar -->
    @include('dashboards.users.partial.sidebar')

    <!-- main body area -->
    <div class="main px-lg-4 px-md-4">
        <!-- Body: Header -->
    @include('dashboards.users.partial.header')

    <!-- Body: Body -->

            <div class="card-header">Name Of Incidence</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-8">
                        <h3 class="text-center bg bg-info">Choose Search Item</h3>
                        <form action="{{ route('accident_report.search-report') }}"  method="POST">
                          @csrf
                            <div class="input-group">
                                <select   class="form-control input-lg dynamic" name="inc_number">
                                    <option value="">Choose an item</option>
                                 @foreach($data as $value)
                                    <option value="{{ $value->inc_number}}">{{$value->inc_number}} </option>
                                 @endforeach
                                </select>
                              
                                <button class="bg bg-success text-white">Search</button>
                               
                              
                            </div>
                          
                        </form>   
        
            
            </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center">Sample User details</h2>
            <table class="table table-striped text-center">
                <thead>
                    <tr class="bg bg-info">
                     <th>Department Name</th>
                      <th>Employee Name</th>
                        <th>Designation</th>
                        <th>Time of Incident</th>
                        <th>st_of_invesg</th>
                        <th>Sum of Incident</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($s_data as $data)
                  <tr >
                  <td>{{ $data->depertment_name }}</td>
                 <td>{{ $data->em_name }}</td>
                <td>{{ $data->em_des }}</td>
                 <td>{{ $data->tim_of_incident}}</td> 
                 <td>{!!$data->st_of_invesg!!}</td>
                 <td>`{!! $data->summ_of_incident!!}</td>
                 <td>
                    <div>
                        <a class="btn btn-primary" href="{{ route('accident_report.why_incident_happen',$data->inc_number) }}" role="button">
                            <button type="button" class="btn btn-primary">Next</button>
                        </a>
                      </div>
                 </td>
             </tr>

            
                @endforeach
                </tbody>
            </table>
        
        </div>
    </div>
@endsection
@section('script')
    <script src='https://cdnjs.cloudflare.com/ajax/libs/tooltipster/3.3.0/js/jquery.tooltipster.min.js'></script>
    <script src='https://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js'></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();

            //validation
            $('input, select').tooltipster({
                trigger: 'custom',
                onlyOne: false,
                position: 'right',
                theme: 'tooltipster-light'
            });

            $("#form").validate({
                errorPlacement: function (error, element) {
                    var lastError = $(element).data('lastError'),
                        newError = $(error).text();

                    $(element).data('lastError', newError);

                    if(newError !== '' && newError !== lastError){
                        $(element).tooltipster('content', newError);
                        $(element).tooltipster('show');
                    }
                },
                success: function (label, element) {
                    $(element).tooltipster('hide');
                }
            });


            /* This code handles all of the navigation stuff.
            ** Probably leave it. Credit to https://bootsnipp.com/snippets/featured/form-wizard-and-validation
            */
            var navListItems = $('div.setup-panel div a'),
                allWells = $('.setup-content'),
                allNextBtn = $('.nextBtn');

            allWells.hide();

            navListItems.click(function (e) {
                e.preventDefault();
                let $target = $($(this).attr('href')),
                    $item = $(this);
                if (!$item.hasClass('disabled')) {
                    navListItems.removeClass('btn-primary').addClass('btn-default');
                    $item.addClass('btn-primary');
                    $('input, select').tooltipster("hide");
                    allWells.hide();
                    $target.show();
                    $target.find('input:eq(0)').focus();
                }
            });

            /* Handles validating using jQuery validate.
            */
            allNextBtn.click(function(){
                var curStep = $(this).closest(".setup-content"),
                    curStepBtn = curStep.attr("id"),
                    nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                    curInputs = curStep.find("input"),
                    isValid = true;

                //Loop through all inputs in this form group and validate them.
                for(var i=0; i<curInputs.length; i++){
                    if (!$(curInputs[i]).valid()){
                        isValid = false;
                    }
                }

                if (isValid){
                    //Progress to the next page.
                    nextStepWizard.removeClass('disabled').trigger('click');
                    // # # # AJAX REQUEST HERE # # #

                    /*
                    Theoretically, in order to preserve the state of the form should the worst happen, we could use an ajax call that would look something like this:

                    //Prepare the key-val pairs like a normal post request.
                    var fields = {};
                    for(var i= 0; i < curInputs.length; i++){
                      fields[$(curInputs[i]).attr("name")] = $(curInputs[i]).attr("name").val();
                    }

                    $.post(
                        "location.php",
                        fields,
                        function(data){
                          //Silent success handler.
                        }
                    );

                    //The FINAL button on last page should have its own logic to finalize the enrolment.
                    */
                }
            });

            $('div.setup-panel div a.btn-primary').trigger('click');

        } );
        $(document).on('change', '#name', function () {
            let id =  $(this).val();
            let base_url = "{{ url('user/why-wizerd') }}"+'/'+id;
            $('.next-button').html('<a href="'+base_url+'" class="btn btn-outline-info" style="font-weight: bolder">Next <i class="icofont-long-arrow-right"></i></a>');
             $("#inv-table-card").css("display", "block");
        });
    </script>
@endsection
