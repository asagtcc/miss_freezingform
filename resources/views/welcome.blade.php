<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
    
	<link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet" />
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	<script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

	<script>
		$(function() {
            // Initialize the datepicker for the calendarDate field
            $("#startDate").datepicker({
                format: "yyyy-mm-dd",
                todayHighlight:true,
                autoclose: true,
            });
            $("#calendarDate").datepicker({
                format: "yyyy-mm-dd",
                todayHighlight:true,
                autoclose: true,
            });
          
            // Add event listeners to the startDate and endDate fields
            $("#startDate").on("change", function() {
              updateCalendarDates();
            });
          
            // Function to update the enabled dates in the calendar
            function updateCalendarDates() {
              var startDateStr = $("#startDate").val();
          
              if (startDateStr) {
                var startDate = new Date(startDateStr);
          
                // Calculate the three specific dates based on the start and end date
                var date1 = new Date(startDate);
                var date2 = new Date(startDate);
                var date3 = new Date(startDate);
          
                // Add or subtract days as needed
                date1.setDate(date1.getDate() + 6);
                date2.setDate(date2.getDate() + 13);
                date3.setDate(date3.getDate() + 20);
          
                // Enable only the specific dates
                $("#calendarDate").datepicker("option", "beforeShowDay", function(date) {
                  var dateString = $.datepicker.formatDate("yy-mm-dd", date);
                  return [
                    dateString === $.datepicker.formatDate("yy-mm-dd", date1) ||
                    dateString === $.datepicker.formatDate("yy-mm-dd", date2) ||
                    dateString === $.datepicker.formatDate("yy-mm-dd", date3),
                    ''
                  ];
                });
              } else {
                // Disable all dates if the start or end date is not selected
                $("#calendarDate").datepicker("option", "beforeShowDay", function() {
                  return [false, ''];
                });
              }
            }
          });
	</script>
</head>

<body>
	<h1>GeeksforGeeks</h1>
	<h3>jQuery UI datepicker onSelect Option</h3>

	<div>
        <input type="text" id="startDate" placeholder="Start Date" />
        <input type="text" id="calendarDate" placeholder="Select Date" />
    </div>
</body>

</html>
