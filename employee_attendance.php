<?php
error_reporting(0);
include_once 'includes/MiscFunctions.php';
include 'includes/db.php';
include 'includes/ConnectDB.inc';
include 'includes/header.php';
session_start();
?>

<!-- TIME PICKER JAVA SCRIPT
<script type="text/javascript" src="javascripts/ng_all.js"></script>
<script type="text/javascript" src="javascripts/timepicker.js"></script>
<script type="text/javascript">

    ng.ready(function() {
        var tp = new ng.TimePicker({
            input: 'timepicker_input', // the input field id
            start: '9:00 am', // what's the first available hour
            end: '7:00 pm', // what's the last avaliable hour
            top_hour: 12  // what's the top hour (in the clock face, 0 = midnight)
        });
    }); -->
</script>
<style type="text/css">
    @import "css/bush.css";
</style>
<?php
// For submitting current date
$date_array = getdate();
////foreach ($date_array as $key => $val) {
//print "$key = $val<br />";
//}
// $formated_date = "Today's date: ";
$formated_date .= $date_array[mday] . "/";
$formated_date .= $date_array[mon] . "/";
$formated_date .= $date_array[year];

////Converting hours into minutes
function hourstominute($input_time) {
    if (strstr($input_time, ':')) {
        $separatedData = split(':', $input_time);
        $minutesInHours = $separatedData[0] * 60;
        $minutesInDecimals = $separatedData[1];
        $totalMinutes = $minutesInHours + $minutesInDecimals;
    } else {
        $totalMinutes = $input_time * 60;
    }
    return $totalMinutes;
}

//Converting minutes into hours
function minutesToHours($minutes) {
    $hours = floor($minutes / 60);
    $decimalMinutes = $minutes - floor($minutes / 60) * 60;
    $hoursMinutes = sprintf("%d:%02.0f", $hours, $decimalMinutes);
    return $hoursMinutes;
}

/* PRINTING SESSION FOR GETTING THE NAME OF UESRNAME AND PASSWORD
  echo "<pre>";
  print_r($_SESSION);
  echo "</pre>"; */

$user_id = $_SESSION['UserID']; //Stores the username from SESSION array
$sql_user_name = mysql_query("SELECT * FROM " . $dbname . ".cfs_user WHERE cfs_user.user_name='$user_id'");
$row_user_name = mysql_fetch_array($sql_user_name);
$cfs_user_id = $row_user_name['idUser'];
$sql_employee = mysql_query("SELECT * FROM " . $dbname . ".employee WHERE employee.User_idUser='$cfs_user_id'");
$row_employee = mysql_fetch_array($sql_employee);
$row_employee_office_id = $row_employee['Office_idOffice']; 
if (isset($_POST['submit'])) {
    $sql_employee_office = mysql_query("SELECT * FROM " . $dbname . ".employee, " . $dbbname . ".employee_information 
                                                 WHERE  employee.Office_idOffice='$row_employee_office_id' AND employee.idEmployee=employee_information.Employee_idEmployee");
    $row_numbers = mysql_numrows($sql_employee_office);
    echo $row_numbers;
    for ($loop = 1; $loop <= $row_numbers; $loop++) {
        $intime_loop = "employee_intime_" . $loop;
        $employee_id = $_POST[$loop];
        $outtime_loop = "employee_outtime_" . $loop;
        $intime_value = $_POST[$intime_loop];
        $outtime_value = $_POST[$outtime_loop];

        $intime_calc = hourstominute($intime_value);
        $outtime_calc = hourstominute($outtime_value);
        $worktime = $outtime_calc - $intime_calc; //Calcultaes Worktime
        $worktime_calc = minutesToHours($worktime); // Converts minutes to hours 
        echo "employee_id" . $employee_id . " intime_value" . $intime_value . "outtime_value" . $outtime_value . "GAP" . $worktime_calc . "<br />";

        if ($intime_value != 0 && $outtime_value != 0) {
            $sql_insert = "INSERT INTO " . $dbname . ".employee_attendance (employee_intime,employee_outtime,attendance_date,attendance_date,employee_worktime,Employee_information_idEmployee_information,Employee_information_Employee_idEmployee)
                             VALUES ('$intime_value', '$outtime_value','$formated_date','$worktime_calc', '$employee_id', '$employee_id')";
            if (mysql_query($sql_insert)) {
                $msg = "তথ্য সংরক্ষিত হয়েছে ";
            } else {
                $msg = "ভুল হয়েছে";
            }
        } else {
            "";
        }
    }
}
?>

<div class="column6">
    <div class="main_text_box">
        <div style="padding-left: 110px;"><a href="index.php?apps=HRE"><b>ফিরে যান</b></a></div> 
        <div>         
            <form method="POST" onsubmit="">
                <table  class="formstyle"> 


                    <tr><th colspan="4" style="text-align: center;">কর্মচারী এটেন্ডেন্স<br /><?php echo "Today's Date:". $formated_date; ?></th></tr> 
                    <tr align="left" id="table_row_odd">
                        <td style="width: 52px;"> &nbsp;ক্রম</td>
                        <td >নাম</td>
                        <td style="width: 20%; text-align: center">ইন টাইম</td>
                        <td style="width: 20%; text-align: center">আউট টাইম</td>
                    </tr> 
                    <!-- SELECT QUERY STARTS HERE-->
                    <?php
                    $sql_atndc_name = "SELECT * FROM " . $dbname . ".employee, " . $dbbname . ".employee_information 
                                       WHERE  employee.Office_idOffice='$row_employee_office_id' AND employee.idEmployee=employee_information.Employee_idEmployee";
                    $i = 0;
                    $result_atndc = mysql_query($sql_atndc_name);
                    while ($row_atndc = mysql_fetch_array($result_atndc)) {
                        $i = $i + 1;
                        $row_emp_name = $row_atndc['employee_name'];
                        $row_emp_id = $row_atndc['idEmployee_information'];

                        echo '<tr><td><input type="hidden" name=' . $i . ' value=' . $row_emp_id . '/>' . $i . '</td>';
                        echo '<td>' . $row_emp_name . '</td>';
                        echo'<td><input  class="box" type="time"  value="" name="employee_intime_' . $i . '"/></td>';
                        echo'<td><input  class="box" type="time"  value="" name="employee_outtime_' . $i . '"/></td></tr>';
                    }
                    ?> 
                    <tr>
                        <td colspan="4" style="text-align: center">এটেন্ডেন্স স্ক্যান কপিঃ <input class="filefield" type="file" name="attendance"></td>
                    </tr>
                    <?php
                    if ($msg != "") {
                        echo "<tr>
                            <td colspan=\"2\" style=\"text-allign: center\"> <font color='green'>$msg</td></font> 
                            </tr>";
                    }
                    ?>
                    <tr>
                        <td colspan="4" style="text-align: center"><input type="submit" name="submit" class="btn" value="সেভ করুন">&nbsp;<input type="reset" class="btn" value="রিসেট করুন"></td>
                    </tr>                
                </table>
            </form>
        </div>
    </div>
</div>
<?php
include 'includes/footer.php';
?>