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
        <div class="card">
            <div class="card-header">Name Of Incidence</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <label for="name" class="form-label">Name</label>
                        <select name="name" id="name" class="form-control">
                            <option value="">--Select One--</option>
                            <option value="1">name01</option>
                            <option value="2">name02</option>
                            <option value="3">name03</option>
                            <option value="4">name04</option>
                            <option value="5">name05</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-2" id="inv-table-card" style="display: none">
            <div class="card-header">
                <storng><h5>ACCIDENT INVESTIGATION ANALYSIS LISTS</h5></storng>
            </div>
            <div class="card-body">
                <table id="example" class="display table table-bordered table-striped" style="width:100%">
                    <thead>
                    <tr>
                        <th>Injured Person (IP)</th>
                        <th>Department</th>
                        <th>Date of Incident</th>
                        <th>Time of Incident</th>
                        <th>Location of Incident</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>2011/04/25</td>
                        <td>
                            <a href="javascript:void(0)">
                                <i class="icofont-edit"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Garrett Winters</td>
                        <td>Accountant</td>
                        <td>Tokyo</td>
                        <td>63</td>
                        <td>2011/07/25</td>
                        <td>
                            <a href="javascript:void(0)">
                                <i class="icofont-edit"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Ashton Cox</td>
                        <td>Junior Technical Author</td>
                        <td>San Francisco</td>
                        <td>66</td>
                        <td>2009/01/12</td>
                        <td>
                            <a href="javascript:void(0)">
                                <i class="icofont-edit"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Cedric Kelly</td>
                        <td>Senior Javascript Developer</td>
                        <td>Edinburgh</td>
                        <td>22</td>
                        <td>2012/03/29</td>
                        <td>
                            <a href="javascript:void(0)">
                                <i class="icofont-edit"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Airi Satou</td>
                        <td>Accountant</td>
                        <td>Tokyo</td>
                        <td>33</td>
                        <td>2008/11/28</td>
                        <td>
                            <a href="javascript:void(0)">
                                <i class="icofont-edit"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Brielle Williamson</td>
                        <td>Integration Specialist</td>
                        <td>New York</td>
                        <td>61</td>
                        <td>2012/12/02</td>
                        <td>
                            <a href="javascript:void(0)">
                                <i class="icofont-edit"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Herrod Chandler</td>
                        <td>Sales Assistant</td>
                        <td>San Francisco</td>
                        <td>59</td>
                        <td>2012/08/06</td>
                        <td>
                            <a href="javascript:void(0)">
                                <i class="icofont-edit"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Rhona Davidson</td>
                        <td>Integration Specialist</td>
                        <td>Tokyo</td>
                        <td>55</td>
                        <td>2010/10/14</td>
                        <td>
                            <a href="javascript:void(0)">
                                <i class="icofont-edit"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Colleen Hurst</td>
                        <td>Javascript Developer</td>
                        <td>San Francisco</td>
                        <td>39</td>
                        <td>2009/09/15</td>
                        <td>
                            <a href="javascript:void(0)">
                                <i class="icofont-edit"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Sonya Frost</td>
                        <td>Software Engineer</td>
                        <td>Edinburgh</td>
                        <td>23</td>
                        <td>2008/12/13</td>
                        <td>
                            <a href="javascript:void(0)">
                                <i class="icofont-edit"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Jena Gaines</td>
                        <td>Office Manager</td>
                        <td>London</td>
                        <td>30</td>
                        <td>2008/12/19</td>
                        <td>
                            <a href="javascript:void(0)">
                                <i class="icofont-edit"></i>
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="row mt-2">
                    <div class="col-lg-12 d-flex justify-content-end">
                        <div class="btn-block next-button">

                        </div>
                    </div>
                </div>
            </div>
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
