@extends('layout.app')
@section('title')
    Sabah Al-Salem | Membership Freezing
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <div class="section-heading">
                <h2>MEMBERSHIP FREEZING <em>(SABAH AL-SALEM)</em></h2>
                <p>ملاحظة
                    أقل مدة لإيقاف الإشتراك هى سبعة أيام
                    Minimum freezing period is 7 days
                </p>
            </div>
        </div>
        <div class="col-lg-6 offset-lg-3">
            <div class="contact-form">
                <form id="contact" action="{{ route('form.store') }}" method="post" autocomplete="off" onsubmit="return validate();">
                    @csrf
                    <input type="hidden" name="branchid" value="2">
                    <div class="row">
                        <div class="col-md-12">
                            <fieldset style="">
                                <label>Name / الإسم</label>
                                <input name="name" type="text" id="name" value="{{ old('name') }}" placeholder="Your Name*">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </fieldset>
                        </div>
                        <div class="col-md-12">
                            <fieldset>
                                <label>Telephone / التلفون</label>
                                <input name="phone" type="text" id="phone" value="{{ old('phone') }}" placeholder="Phone*">
                                @error('phone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </fieldset>
                        </div>
                        <div class="col-md-12">
                            <fieldset>
                                <label>Email / الإيميل</label>
                                <input name="email" type="text" id="email" value="{{ old('email') }}" placeholder="Your Email*">
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                                <label>Freezing Starting Date / تاريخ بداية الإيقاف</label>
                                <input type="text" class="datepicker form-control" placeholder="yyyy-mm-dd" name="date_from" value="{{ old('date_from') }}" id="date_from">
                                @error('date_from')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                                <label>Freezing End Date / تاريخ نهاية الإيقاف </label>&nbsp;&nbsp;<label style="color: red;font-size: 12px;">(Note: Freezing start & end date must be in blocks of 7 days.)</label>
                                <input type="text" class="datepicker form-control" placeholder="yyyy-mm-dd" name="date_to" value="{{ old('date_to') }}" id="date_to" disabled>
                                @error('date_to')
                                    <p id="error" class="alert alert-danger">{{ $message }}</p>
                                @enderror
                                <p id="date_to_error" class="alert alert-danger" style="display: none;"></p>
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                                <button type="submit" id="form-submit" class="main-button">Submit/إرسال</button>
                            </fieldset>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

    function validate()
    {
        var x = document.getElementById("date_to_error").style.display;
        if(x == 'block') {
            return false;
        } else {
            return true;
        }
    }

    $(function() {
        $('#date_from').change(function(){

            if ($("#date_from").val() !==  '') {
                $("#date_to").prop("disabled", false);
            } else {
                $("#date_to").prop("disabled", true);
            }
        });
        // Initialize the datepicker for the calendarDate field
        $("#date_from").datepicker({
            dateFormat: "yy-mm-dd",
            todayHighlight:true,
            autoclose: true,
        });
        $("#date_to").datepicker({
            dateFormat: "yy-mm-dd",
            todayHighlight:true,
            autoclose: true,
        });

        // Add event listeners to the startDate and endDate fields
        $("#date_from").on("change", function() {
            updateCalendarDates();
        });

        // Function to update the enabled dates in the calendar
        function updateCalendarDates() {
            var startDateStr = $("#date_from").val();

            if (startDateStr) {
                var startDate = new Date(startDateStr);

                // Calculate the three specific dates based on the start and end date
                var date1 = new Date(startDate);
                var date2 = new Date(startDate);
                var date3 = new Date(startDate);
                var date4 = new Date(startDate);
                var date5 = new Date(startDate);
                var date6 = new Date(startDate);

                // Add or subtract days as needed
                date1.setDate(date1.getDate() + 6);
                date2.setDate(date2.getDate() + 13);
                date3.setDate(date3.getDate() + 20);
                date4.setDate(date4.getDate() + 27);
                date5.setDate(date5.getDate() + 34);
                date6.setDate(date6.getDate() + 41);

                // Enable only the specific dates
                $("#date_to").datepicker("option", "beforeShowDay", function(date) {
                    var dateString = $.datepicker.formatDate("yy-mm-dd", date);
                    return [
                        dateString === $.datepicker.formatDate("yy-mm-dd", date1) ||
                        dateString === $.datepicker.formatDate("yy-mm-dd", date2) ||
                        dateString === $.datepicker.formatDate("yy-mm-dd", date3) ||
                        dateString === $.datepicker.formatDate("yy-mm-dd", date4) ||
                        dateString === $.datepicker.formatDate("yy-mm-dd", date5) ||
                        dateString === $.datepicker.formatDate("yy-mm-dd", date6),
                        ''
                    ];
                });
            } else {
                // Disable all dates if the start or end date is not selected
                $("#date_to").datepicker("option", "beforeShowDay", function() {
                    return [false, ''];
                });
            }
        }
    });
    /*
    function validate()
    {
        var x = document.getElementById("date_to_error").style.display;
        if(x == 'block') {
            return false;
        } else {
            return true;
        }
    }
    $(document).ready(function() {

        $('#date_from').change(function(){

            if ($("#date_from").val() !==  '') {
                $("#date_to").prop("disabled", false);
            } else {
                $("#date_to").prop("disabled", true);
            }
        });

        $('.datepicker').datepicker({
            format: "yyyy-mm-dd",
            todayHighlight:true,
            autoclose: true,
        });

        $('.datepicker').change(function(){
            $(".datepicker").datepicker('hide');
        });

        $('#date_to').change(function(){

            var endDate = new Date($('#date_to').val());
            var endDate = endDate.toISOString().substr(0,10);

            var startDate1 = new Date($('#date_from').val());
            startDate1.setDate(startDate1.getDate() + 6);

            var startDate2 = new Date($('#date_from').val());
            startDate2.setDate(startDate2.getDate() + 13);

            var startDate3 = new Date($('#date_from').val());
            startDate3.setDate(startDate3.getDate() + 20);

            var dateFormated1 = startDate1.toISOString().substr(0,10);
            var dateFormated2 = startDate2.toISOString().substr(0,10);
            var dateFormated3 = startDate3.toISOString().substr(0,10);


            if(endDate < dateFormated1)
            {
                var message = `Please complete end date to be one weak. (suggest: ${dateFormated1} ).`;
                document.getElementById("date_to_error").style.display = 'block';
                document.getElementById("date_to_error").innerHTML = message;
                document.getElementById("error").style.display = 'none';
            }
            else if(endDate > dateFormated1 && endDate < dateFormated2)
            {
                // var message = `The Freezing End Date should be ( ${dateFormated1} ) or ( ${dateFormated2} ) or ( ${dateFormated3} ).`;
                var message = `Please complete end date to be two weaks. (suggest: ${dateFormated2} ).`;
                document.getElementById("date_to_error").style.display = 'block';
                document.getElementById("date_to_error").innerHTML = message;
                document.getElementById("error").style.display = 'none';
            }
            else if(endDate > dateFormated2 && endDate < dateFormated3)
            {
                var message = `Please complete end date to be three weaks. (suggest: ${dateFormated3} ).`;
                document.getElementById("date_to_error").style.display = 'block';
                document.getElementById("date_to_error").innerHTML = message;
                document.getElementById("error").style.display = 'none';
            }
            else
            {
                document.getElementById("date_to_error").style.display = 'none';
            }
        });

    } );
    */
</script>
@endsection
