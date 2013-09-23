<?php
include_once 'includes/MiscFunctions.php';
include 'includes/db.php';
include 'includes/ConnectDB.inc';
include 'includes/header.php';
error_reporting(0);
?>
<style type="text/css">
    @import "css/bush.css";
</style>
<script type="text/javascript">   
    $('.del2').live('click',function(){
        $(this).parent().parent().remove();
    });
    $('.add2').live('click',function()
    {var count3 = 2;
        if(count3<6){
            var appendTxt= "<tr> <td><input class='textfield'  name='e_ex_name[]' type='text' /></td><td><input class='box5'  name='e_pass_year[]' type='text' /></td><td><input class='textfield'  name='e_institute[]' type='text' /></td><td><input class='textfield'  name='e_board[]' type='text' /></td><td><input class='box5' name='e_gpa[]' type='text' /></td><td style='padding-right: 3px;'><input type='button' class='del2' /></td><td>&nbsp;<input type='button' class='add2' /></td></tr>";
            $("#container_others32:last").after(appendTxt);          
        }  
        count3 = count3 + 1;        
    })
          
    $('.del3').live('click',function(){
        $(this).parent().parent().remove();
    });
    $('.add3').live('click',function()
    {var count4 = 2;
        if(count4<6){
            var appendTxt= "<tr> <td><input class='textfield'  name='n_ex_name[]' type='text' /></td><td><input class='box5'  name='n_pass_year[]' type='text' /></td><td><input class='textfield'  name='n_institute[]' type='text' /></td><td><input class='textfield'  name='n_board[]' type='text' /></td><td><input class='box5' name='n_gpa[]' type='text' /></td><td style='padding-right: 3px;'><input type='button' class='del3' /></td><td>&nbsp;<input type='button' class='add3' /></td></tr>";
            $("#container_others33:last").after(appendTxt);           
        }  
        count4 = count4 + 1;        
    })
</script>
<!--*************************Javascript for Selecting Division, District, Thana************************-->
<script type="text/javascript" src="javascripts/division_district_thana.js"></script>

<?php
$emplo_informationID = $_GET['001i10d01'];
$sql_employee_id = mysql_query("SELECT * FROM $dbname.employee_information WHERE idEmployee_information='$emplo_informationID'");
$result_employee_id = mysql_fetch_array($sql_employee_id);
$employee_id = $result_employee_id['Employee_idEmployee'];
$sql_cfs_user_id = mysql_query("SELECT * FROM $dbname. employee WHERE idEmployee='$employee_id'");
$result_cfs_user_id = mysql_fetch_array($sql_cfs_user_id);
$cfs_user_id = $result_cfs_user_id['cfs_user_idUser'];
$sql_account_number = mysql_query("SELECT * FROM $dbname.cfs_user WHERE idUser='$cfs_user_id'");
$result_account_number = mysql_fetch_array($sql_account_number);
$account_number = $result_account_number['account_number'];


if (isset($_POST['submit1'])) {
    $employee_fatherName = $_POST['employee_fatherName'];
    $employee_motherName = $_POST['employee_motherName'];
    $employee_spouseName = $_POST['employee_spouseName'];
    $employee_occupation = $_POST['employee_occupation'];
    $employee_religion = $_POST['employee_religion'];
    $employee_natonality = $_POST['employee_natonality'];
    $dob_day1 = $_POST['date'];
    $dob_month1 = $_POST['month'];
    $dob_year1 = $_POST['year'];
    $dob1 = $dob_year1 . "-" . $dob_month1 . "-" . $dob_day1; //Concating different strings of date written in php function
    $employee_national_ID = $_POST['employee_national_ID'];
    $employee_passport = $_POST['employee_passport'];
    $employee_birth_certificate_No = $_POST['employee_birth_certificate_No'];

    //Current Address Infromation
    $Thana_idThana = $_POST['thana_id1'];
    $address_house = $_POST['c_house'];
    $address_village = $_POST['c_village'];
    $adresss_post_road = $_POST['c_road'];
    $adress_post_code = $_POST['c_post_code'];
    //Permanent Address information
    $p_Thana_idThana = $_POST['thana_id2'];
    $p_address_house = $_POST['p_house'];
    $p_address_village = $_POST['p_village'];
    $p_adresss_post_road = $_POST['p_road'];
    $p_adress_post_code = $_POST['p_post_code'];

    if (!empty($employee_fatherName)) {
        //Update infromaiton on the employee_information table
        $sql_update_employee = mysql_query("UPDATE $dbname.employee_information SET employee_fatherName='$employee_fatherName', 
                                     employee_motherName='$employee_motherName', employee_spouseName='$employee_spouseName', 
                                     employee_occupation='$employee_occupation', employee_religion='$employee_religion', employee_natonality='$employee_natonality',
                                     employee_national_ID='$employee_national_ID', employee_passport='$employee_passport', employee_date_of_birth='$dob1',
                                     employee_birth_certificate_No='$employee_birth_certificate_No' WHERE idEmployee_information='$emplo_informationID'");

        //Insert into address table where address_type=Present
        $sql_insert_current_address = mysql_query("INSERT INTO $dbname.address 
                                    (address_type, house, village, post_office, road, address_whom, Thana_idThana, post_code, adrs_cepng_id)
                                     VALUES ('Present', '$address_house', '$address_village', '$adresss_post_road', '$adresss_post_road', 'emp', '$Thana_idThana', '$adress_post_code', '$emplo_informationID')");
        //Insert into address table where address_type=Permanent
        $sql_insert_present_address = mysql_query("INSERT INTO $dbname.address 
                                    (address_type, house, village, post_office, road, address_whom, Thana_idThana, post_code, adrs_cepng_id)
                                     VALUES ('Permanent', '$p_address_house', '$p_address_village', '$p_adresss_post_road', '$p_adresss_post_road', 'emp', '$p_Thana_idThana', '$p_adress_post_code', '$emplo_informationID')");
    }
    //Success ful Input Condition
    if ($sql_update_employee && $sql_insert_current_address && $sql_insert_present_address) {
        $msg = "***************সাক্‌ সেস*************** ";
    } else {
        $msg = "এরর";
    }
}
//For Form 2
elseif (isset($_POST['submitnominee'])) {
    $nominee_name = $_POST['nominee_name'];
    $nominee_age = $_POST['nominee_age'];
    $nominee_relation = $_POST['nominee_relation'];
    $nominee_mobile = $_POST['nominee_mobile'];
    $nominee_email = $_POST['nominee_email'];
    $nominee_national_ID = $_POST['nominee_national_ID'];
    $nominee_passport_ID = $_POST['nominee_passport_ID'];
    //Current Address Information
    $n_Thana_idThana = $_POST['thana_id3'];
    $n_address_house = $_POST['n_c_house'];
    $n_address_village = $_POST['n_c_village'];
    $n_adresss_post_road = $_POST['n_c_road'];
    $n_adress_post_code = $_POST['n_c_post_code'];
    //Permanent Address Information
    $n_p_Thana_idThana = $_POST['thana_id4'];
    $n_p_address_house = $_POST['n_p_house'];
    $n_p_address_village = $_POST['n_p_village'];
    $n_p_adresss_post_road = $_POST['n_p_road'];
    $n_p_adress_post_code = $_POST['n_p_post_code'];
//Insert Into Nominee table
    if (!empty($nominee_name)) {
        $sql_nominee = mysql_query("INSERT INTO $dbname.nominee(nominee_name, nominee_picture, nominee_relation, nominee_mobile,
                                       nominee_email, nominee_national_ID, nominee_age, nominee_passport_ID, cep_type, cep_nominee_id) 
                                       VALUES('$nominee_name','nominee picture','$nominee_relation','$nominee_mobile','$nominee_email','$nominee_national_ID',
                                       '$nominee_age','$nominee_passport_ID','pwr','$emplo_informationID')");
        $nominee_id = mysql_insert_id(); //Contains the last inserted id (nominee_id)
        echo "Nominee ID:" . $nominee_id;
        //Insert into Addrees table where addresstype=Present 
        $n_sql_insert_current_address = mysql_query("INSERT INTO $dbname.address(address_type, house, village, post_office, road, address_whom, Thana_idThana, post_code,adrs_cepng_id) 
                                                         VALUES('Present','$n_address_house','$n_address_village', '$n_adresss_post_road','$n_adresss_post_road',
                                                         'nmn','$n_Thana_idThana','$n_adress_post_code','$nominee_id')");
        //Insert Into Address table where addresstype=Permanent
        $n_p_sql_insert_current_address = mysql_query("INSERT INTO $dbname.address(address_type, house, village, post_office, road, address_whom, Thana_idThana, post_code,adrs_cepng_id) 
                                                         VALUES('Permanent','$n_p_address_house','$n_p_address_village', '$n_p_adresss_post_road','$n_p_adresss_post_road',
                                                         'nmn','$n_p_Thana_idThana','$n_p_adress_post_code','$nominee_id')");
    }
    if ($sql_nominee && $n_sql_insert_current_address && $n_p_sql_insert_current_address) {
        $msgn = "***************সাক্‌ সেস***************";
    } else {
        $msgn = "এরর";
    }
} elseif (isset($_POST['submit3'])) {
    //Employer
    $e_ex_name = $_POST['e_ex_name'];
    $e_pass_year = $_POST['e_pass_year'];
    $e_institute = $_POST['e_institute'];
    $e_board = $_POST['e_board'];
    $e_gpa = $_POST['e_gpa'];
    $a = count($e_ex_name);
    for ($i = 0; $i < $a; $i++) {
        //Insert into educaiton table where educaiton type='emp'          
        $sql_pwr_edu_insert = mysql_query("INSERT INTO $dbname.education (exam_name, passing_year, institute_name, board, gpa, education_type, cepn_id) 
                                                      VALUES('$e_ex_name','$e_pass_year','$e_institute','$e_board','$e_gpa', 'emp','$emplo_informationID')");
    }
    //Nominee
    $n_ex_name = $_POST['n_ex_name'];
    $n_pass_year = $_POST['n_pass_year'];
    $n_institute = $_POST['n_institute'];
    $n_board = $_POST['n_board'];
    $n_gpa = $_POST['n_gpa'];
    $b = count($n_ex_name);
    for ($i = 0; $i < $b; $i++) {
        //Insert into educaiton table where educaiton type=nmn
        $sql_nmn_edu_insert = mysql_query("INSERT INTO $dbname.education (exam_name, passing_year, institute_name, board, gpa, education_type, cepn_id) 
                                                VALUES('$n_ex_name','$n_pass_year','$n_institute','$n_board','$n_gpa', 'nmn','$emplo_informationID')");
    }
    if ($sql_pwr_edu_insert && $sql_nmn_edu_insert) {
        $msg2 = "তথ্য সংরক্ষিত হয়েছে";
    } else {
        $msg2 = "ভুল হয়েছে";
    }
} elseif (isset($_POST['submit4'])) {
    $pathArray = array();
    for ($i = 1; $i < 12; $i++) {
        $scan_document = "";
        $allowedExts = array("gif", "jpeg", "jpg", "png", "JPG", "JPEG", "GIF", "PNG", "pdf"); //File Type
        $scanDoc = "scanDoc" . $i;
        $files_sequence = array(1 => "ssc", "nationalID", "hsc", "birth_certificate", "onars", "chairman_cert", "masters", "other");
        $file_name = $files_sequence[$i];
        $t = time();
        $extension = end(explode(".", $_FILES[$scanDoc]['name']));
        $scan_doc_name = $account_number . "_" . $file_name . "_" . $t . "_" . $_FILES[$scanDoc]['name'];
        $scan_doc_path_temp = "images/scan_documents/" . $scan_doc_name;
        if (($_FILES[$scanDoc]['size'] < 999999999999) && in_array($extension, $allowedExts)) {
            move_uploaded_file($_FILES[$scanDoc]['tmp_name'], $scan_doc_path_temp);
            $scan_document = $scan_doc_path_temp;
            $pathArray[$i] = $scan_document;
        } elseif ($_FILES[$scanDoc]['size'] == 0) {
            $pathArray[$i] = NULL;
        } else {
            echo "Invalid file format.</br>";
        }
    }

    $sql_images_scan_doc = mysql_query("INSERT INTO $dbname.ep_certificate_scandoc_extra
                                 (emplo_scanDoc_national_id, emplo_scanDoc_birth_certificate, emplo_scanDoc_chairman_certificate, scanDoc_ssc, scanDoc_hsc, scanDoc_onars, scanDoc_masters, scanDoc_other, emp_type, emp_id)
                                 VALUES('$pathArray[2]', '$pathArray[4]', '$pathArray[6]', '$pathArray[1]', '$pathArray[3]', 
                                 '$pathArray[5]',  '$pathArray[7]', '$pathArray[8]', 'emp','$emplo_informationID')");
    if ($sql_images_scan_doc) {
        $msg_scan_doc = "***************সাক্‌ সেস***************";
    } else {
        $msg_scan_doc = "এরর";
    }
}
?>
<!-- *****************************Form Number 1********************************-->
<div class="column6">
    <div class="main_text_box">
        <div style="padding-left: 110px;"><a href="index.php?apps=HRM"><b>ফিরে যান</b></a></div>
        <div class="domtab">
            <ul class="domtabs">


                <li class="current"><a href="#01">মূল তথ্য</a></li><li class="current"><a href="#02">নমিনির তথ্য</a></li><li class="current"><a href="#03">শিক্ষাগত যোগ্যতা</a></li><li class="current"><a href="#04">প্রয়োজনীয় ডকুমেন্টস</a></li>
            </ul>
        </div>  

        <div>
            <h2><a name="01" id="01"></a></h2><br/>
            <form method="POST" onsubmit="">	
                <table  class="formstyle">   

                    <tr><th colspan="4" style="text-align: center" colspan="2"><h1>কর্মচারীর একাউন্ট তৈরির ফর্ম</h1></th></tr>
                    <tr>
                        <td colspan="4" ><hr /></td>
                    </tr>
                    <?php
                    if ($msg != "") {
                        echo '<tr><td colspan="4" style="text-allign: center; color: green; font-size: 15px"><b>' . $msg . '</b></td></tr>';
                    }
                    ?>
                    <tr>	
                        <td  colspan="4" style =" font-size: 14px"><b>ব্যাক্তিগত  তথ্য</b></td>                            
                    </tr>
                 <!--   <tr>
                        <td  >নাম </td>
                        <td>:  <input  class="box" type="text" id="employee_name" name="employee_name" /></td>                                      
                    </tr> -->
                    <tr>
                        <td >বাবার নাম </td>
                        <td>:  <input class="box" type="text" id="employee_fatherName" name="employee_fatherName" /></td>
                        <td   font-weight="bold" >পাসপোর্ট ছবি </td>
                        <td >:   <input class="box" type="file" id="scanDoc_picture" name="scanDoc_picture" style="font-size:10px;"/></td>    
                    </tr>
                    <tr>
                        <td >মার নাম </td>
                        <td>:  <input class="box" type="text" id="employee_motherName" name="employee_motherName"/></td>
                        <td  font-weight="bold" >স্বাক্ষর</td>
                        <td >:  <input class="box1" type="file" id="scanDoc_signature" name="scanDoc_signature" style="font-size:10px;"/> </td>
                    </tr>
                    <tr>
                        <td >দম্পতির নাম  </td>
                        <td>:  <input class="box" type="text" id="employee_spouseName" name="employee_spouseName" /> </td>			
                    </tr>
                    <tr>
                        <td >পেশা</td>
                        <td>:  <input class="box" type="text" id="employee_occupation" name="employee_occupation" /></td>                         
                    </tr>
                    <tr>
                        <td>ধর্ম </td>
                        <td>:  <input  class="box" type="text" id="employee_religion" name="employee_religion" /></td>	                             
                    </tr>
                    <tr>
                        <td >জাতীয়তা</td>
                        <td>:  <input class="box" type="text" id="employee_natonality" name="employee_natonality" /> </td>			
                    </tr>
                    <td>জন্মতারিখ</td>
                    <td >:   <select  class="box1"  name="date" style =" font-size: 11px">
                            <option >দিন</option>
                            <?php
                            for ($i = 1; $i <= 31; $i++) {
                                $date = english2bangla($i);
                                echo "<option value=$i>" . $date . "</option>";
                            }
                            ?>
                        </select>				

                        <select class="box1" name="month" style =" font-size: 11px">
                            <option >মাস</option>
                            <option value="1">জানুয়ারি</option>
                            <option value="2">ফেব্রুয়ারী</option>
                            <option value="3">মার্চ</option>
                            <option value="4">এপ্রিল </option>
                            <option value="5">মে</option>
                            <option value="6">জুন</option>
                            <option value="7">জুলাই</option>
                            <option value="8">আগষ্ট</option>
                            <option value="9">সেপ্টেম্বর</option>
                            <option value="10">অক্টোবর </option>
                            <option value="11">নভেম্বর</option>
                            <option value="12">ডিসেম্বর</option> 
                        </select>

                        <select class="box1" id="year" name="year" style =" font-size: 11px" >
                            <option>বছর </option>
                            <?php
                            for ($i = 2020; $i >= 1900; $i--) {
                                $year = english2bangla($i);
                                echo "<option value=$i>" . $year . "</option>";
                            }
                            ?>
                        </select>
                    </td>			
                    </tr>                     
                    <td >জাতীয় পরিচয়পত্র নং</td>
                    <td>:  <input class="box" type="text" id="employee_national_ID" name="employee_national_ID" /></td>			
                    </tr>
                    <tr>
                        <td >পাসপোর্ট আইডি নং</td>
                        <td>:  <input class="box" type="text" id="employee_passport" name="employee_passport" /></td>			
                    </tr>
                    <tr>
                        <td >জন্ম সনদ নং</td>
                        <td>:  <input class="box" type="text" id="employee_birth_certificate_No" name="employee_birth_certificate_No" /></td>			
                    </tr>
                    <tr>
                        <td colspan="4" ><hr /></td>
                    </tr>	
                    <td  colspan="2" style =" font-size: 14px"><b>বর্তমান ঠিকানা </b></td>                            
                    <td colspan="2" style =" font-size: 14px"><b> স্থায়ী ঠিকানা   </b></td>
                    </tr>
                    <tr>
                        <td  >বাড়ির নাম / ফ্ল্যাট নং</td>
                        <td >:  <input class="box" type="text" id="house" name="c_house" /></td>
                        <td  >বাড়ির নাম / ফ্ল্যাট নং</td>
                        <td >:  <input class="box" type="text" id="house" name="p_house" /></td>
                    </tr>
                    <tr>
                        <td  >গ্রাম / বাড়ি নং</td>
                        <td >:  <input class="box" type="text" id="village" name="c_village" /></td>
                        <td >গ্রাম / বাড়ি নং</td>
                        <td>:  <input class="box" type="text" id="village" name="p_village" /></td>
                    </tr>
                    <tr>
                        <td >পোষ্ট / রোড নং</td>
                        <td>:  <input class="box" type="text" id="road" name="c_road" /> </td>
                        <td >পোষ্ট / রোড নং</td>
                        <td>:  <input class="box" type="text" id="road" name="p_road" /></td>
                    </tr>
                    <tr>
                        <td >পোষ্ট কোড</td>
                        <td>:  <input class="box" type="text" id="post_code" name="c-post_code" /></td>
                        <td >পোষ্ট কোড</td>
                        <td>:  <input class="box" type="text" id="post_code" name="p_post_code" /></td>
                    </tr> 
                    <tr>
                        <td >বিভাগ</td>
                        <td>:  <select class="box2" type="text" id="division_id_1" name="c_division_name" onChange="getDistrict1()" />
                            <?php
                            $division_sql = mysql_query("SELECT * FROM " . $dbname . ".division ORDER BY division_name ASC");
                            while ($division_rows = mysql_fetch_array($division_sql)) {
                                $db_division_id = $division_rows['idDivision'];
                                $db_division_name = $division_rows['division_name'];
                                echo'<option style="width: 96%" value=' . $db_division_id . '>' . $db_division_name . '</option>';
                            }
                            ?>
                            </select></td>                                
                        <td >বিভাগ</td>
                        <td>:  <select class="box2" type="text" id="division_id_2" name="p_division_name" onChange="getDistrict2()" />
                            <?php
                            $division_sql = mysql_query("SELECT * FROM " . $dbname . ".division ORDER BY division_name ASC");
                            while ($division_rows = mysql_fetch_array($division_sql)) {
                                $db_division_id = $division_rows['idDivision'];
                                $db_division_name = $division_rows['division_name'];
                                echo'<option style="width: 96%" value=' . $db_division_id . '>' . $db_division_name . '</option>';
                            }
                            ?>
                            </select></td>
                    </tr>
                    <tr>
                        <td >জেলা</td>
                        <td>: <span id="did"></span></td>
                        <td >জেলা</td>
                        <td>: <span id="did2"></span></td>
                    </tr>                        
                    <tr>
                        <td>উপজেলা / থানা</td>
                        <td>: <span id="tidd"></span></td>      
                        <td>উপজেলা / থানা</td>
                        <td>: <span id="tidd2"></span></td>
                    </tr>
                    <tr>
                        <td >পোষ্ট অফিস</td>
                        <td>: <span id="pidd"></span></td> 
                        <td >পোষ্ট অফিস</td>
                        <td>: <span id="pidd2"></span></td> 
                    </tr>
                    <tr>
                        <td  >গ্রাম</td>
                        <td>: <span id="vidd"></span></td> 
                        <td >গ্রাম </td>
                        <td>: <span id="vidd2"></span></td> 
                    </tr>
                    <tr>                    
                        <td colspan="4" style="padding-top: 10px; padding-left: 250px;padding-bottom: 5px; " ><input class="btn" style =" font-size: 12px; " type="submit" name="submit1" value="সেভ করুন" />
                            <input class="btn" style =" font-size: 12px" type="reset" name="reset" value="রিসেট করুন" />
                        </td>                           
                    </tr> 
                </table>
                </fieldset>
            </form>
        </div>

        <!--******************Form Number 2********************************* -->
        <div>
            <h2><a name="02" id="02"></a></h2><br/>
            <form method="POST" onsubmit="">	
                <table  class="formstyle">     
                    <tr><th colspan="4" style="text-align: center" colspan="2"><h1>কর্মচারীর একাউন্ট তৈরির ফর্ম</h1></th></tr>
                    <tr><td colspan="4" ></td>
                        <?php
                        if ($msgn != "") {
                            echo '<tr> <td colspan="2" style="text-allign: center; color: green; font-size: 15px"><b>' . $msgn . '</b></td></tr>';
                        }
                        ?>
                    </tr>
                    <tr>
                        <td >নমিনির নাম</td>
                        <td>:  <input class="box" type="text" id="nominee_name" name="nominee_name" /></td>	
                        <td  font-weight="bold" >পাসপোর্ট ছবি </td>
                        <td >:  <input class="box1" type="file" id="scanDoc_picture" name="nominee_scanDoc_picture" style="font-size:10px;"/></td>
                    </tr>     
                    <tr>
                        <td >বয়স</td>
                        <td>:  <input class="box" type="text" id="nominee_age" name="nominee_age" /></td>
                    </tr>     
                    <tr>
                        <td >সম্পর্ক </td>
                        <td>:  <input class="box" type="text" id="nominee_relation" name="nominee_relation" /> </td>			
                    </tr>
                    <tr>
                        <td >মোবাইল নং</td>
                        <td>:  <input class="box" type="text" id="nominee_mobile" name="nominee_mobile" /></td>			
                    </tr>
                    <tr>
                        <td >ইমেইল</td>
                        <td>:  <input class="box" type="text" id="nominee_email" name="nominee_email" /></td>			
                    </tr>
                    <tr>
                        <td >জাতীয় পরিচয়পত্র নং</td>
                        <td>:  <input class="box" type="text" id="nominee_national_ID" name="nominee_national_ID" /></td>			
                    </tr>
                    <tr>
                        <td >পাসপোর্ট আইডি নং</td>
                        <td>:  <input class="box" type="text" id="nominee_passport_ID" name="nominee_passport_ID" /></td>			
                    </tr> 
                    <tr>
                        <td colspan="4" ><hr /></td>
                    </tr>
                    <tr>	
                        <td  colspan="2" style =" font-size: 14px"><b>বর্তমান ঠিকানা </b></td>                            
                        <td colspan="2" style =" font-size: 14px"><b> স্থায়ী ঠিকানা   </b></td>
                    </tr>
                    <tr>
                        <td  >বাড়ির নাম / ফ্ল্যাট নং</td>
                        <td >:  <input class="box" type="text" id="house" name="n_c_house" /></td>
                        <td  >বাড়ির নাম / ফ্ল্যাট নং</td>
                        <td >:  <input class="box" type="text" id="house" name="n_p_house" /></td>
                    </tr>
                    <tr>
                        <td  >গ্রাম / বাড়ি নং</td>
                        <td >:  <input class="box" type="text" id="village" name="n_c_village" /></td>
                        <td >গ্রাম / বাড়ি নং</td>
                        <td>:  <input class="box" type="text" id="village" name="n_p_village" /></td>
                    </tr>
                    <tr>
                        <td >পোষ্ট / রোড নং</td>
                        <td>:  <input class="box" type="text" id="road" name="n_c_road" /> </td>
                        <td >পোষ্ট / রোড নং</td>
                        <td>:  <input class="box" type="text" id="road" name="n_p_road" /></td>
                    </tr>
                    <tr>
                        <td >পোষ্ট কোড</td>
                        <td>:  <input class="box" type="text" id="post_code" name="n_c_post_code" /></td>
                        <td >পোষ্ট কোড</td>
                        <td>:  <input class="box" type="text" id="post_code" name="n_p_post_code" /></td>
                    </tr>
                    <tr>
                        <td >বিভাগ</td>
                        <td>:  <select class="box2" type="text" id="division_id_3" name="n_c_division_name" onChange="getDistrict3()" />
                            <?php
                            $division_sql = mysql_query("SELECT * FROM " . $dbname . ".division ORDER BY division_name ASC");
                            while ($division_rows = mysql_fetch_array($division_sql)) {
                                $db_division_id = $division_rows['idDivision'];
                                $db_division_name = $division_rows['division_name'];
                                echo'<option style="width: 96%" value=' . $db_division_id . '>' . $db_division_name . '</option>';
                            }
                            ?>
                            </select></td>                                
                        <td >বিভাগ</td>
                        <td>:  <select class="box2" type="text" id="division_id_4" name="n_p_division_name" onChange="getDistrict4()" />
                            <?php
                            $division_sql = mysql_query("SELECT * FROM " . $dbname . ".division ORDER BY division_name ASC");
                            while ($division_rows = mysql_fetch_array($division_sql)) {
                                $db_division_id = $division_rows['idDivision'];
                                $db_division_name = $division_rows['division_name'];
                                echo'<option style="width: 96%" value=' . $db_division_id . '>' . $db_division_name . '</option>';
                            }
                            ?>
                            </select></td>
                    </tr>
                    <tr>
                        <td >জেলা</td>
                        <td>: <span id="did3"></span></td>
                        <td >জেলা</td>
                        <td>: <span id="did4"></span></td>
                    </tr>                        
                    <tr>
                        <td>উপজেলা / থানা</td>
                        <td>: <span id="tidd3"></span></td>      
                        <td>উপজেলা / থানা</td>
                        <td>: <span id="tidd4"></span></td>
                    </tr> 
                    <tr>
                        <td >পোষ্ট অফিস</td>
                        <td>: <span id="pidd3"></span></td> 
                        <td >পোষ্ট অফিস</td>
                        <td>: <span id="pidd4"></span></td> 
                    </tr>
                    <tr>
                        <td  >গ্রাম</td>
                        <td>: <span id="vidd3"></span></td> 
                        <td >গ্রাম </td>
                        <td>: <span id="vidd4"></span></td> 
                    </tr>  
                    <tr>                    
                        <td colspan="4" style="padding-top: 10px; padding-left: 250px;padding-bottom: 5px; " ><input class="btn" style =" font-size: 12px; " type="submit" name="submitnominee" value="সেভ করুন" />
                            <input class="btn" style =" font-size: 12px" type="reset" name="reset" value="রিসেট করুন" />
                        </td>                           
                    </tr>
                </table>
                </fieldset>
            </form>
        </div>
        <!--********************Form number 3****************** -->

        <div>
            <h2><a name="03" id="03"></a></h2><br/>
            <form method="POST" onsubmit="">	
                <table  class="formstyle">          
                    <tr><th colspan="4" style="text-align: center" colspan="2"><h1>কর্মচারীর একাউন্ট তৈরির ফর্ম</h1></th></tr>
                    <tr><td colspan="4" ></td>
                        <?php
                        if ($msg2 != "") {
                             echo '<tr> <td colspan="2" style="text-allign: center; color: green; font-size: 15px"><b>' . $msg2 . '</b></td></tr>';
                        }
                        ?>
                    </tr>   
                    <tr>
                        <td colspan="2" > 
                    </tr>
                    <tr>
                        <td colspan="2" >
                            <table width="100%">
                                <tr>	
                                    <td  colspan="2"   style =" font-size: 14px"><b>কর্মচারীর শিক্ষাগত যোগ্যতা</b></td>                                                
                                </tr>
                                <tr>                      
                                    <td>
                                        <table id="container_others32">
                                            <tr>
                                                <td>পরীক্ষার নাম / ডিগ্রী</td>
                                                <td>পাশের সাল</td>
                                                <td>প্রতিষ্ঠানের নাম </td>
                                                <td>বোর্ড / বিশ্ববিদ্যালয়</td>
                                                <td>জি.পি.এ / বিভাগ</td>      
                                            </tr>
                                            <tr>
                                                <td><input class="textfield"  name="e_ex_name[]" type="text" /></td>
                                                <td><input class="box5"  name="e_pass_year[]" type="text" /></td>
                                                <td><input class="textfield" name="e_institute[]" type="text" /></td>
                                                <td><input class="textfield"  name="e_board[]" type="text" /></td>
                                                <td style="padding-right: 45px;"><input class="box5"  name="e_gpa[]" type="text" /></td>                                             
                                                <td  ><input type="button" class="add2" /></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>         
                <tr>
                    <td colspan="4" ><hr /></td>
                </tr>
                    <tr>
                        <td colspan="2" >
                            <table width="100%">
                                <tr>	
                                    <td  colspan="2"   style =" font-size: 14px"><b>নমিনির শিক্ষাগত যোগ্যতা</b></td>                                                
                                </tr>
                                <tr>                         
                                    <td>
                                        <table id="container_others33">
                                            <tr>
                                                <td>পরীক্ষার নাম / ডিগ্রী</td>
                                                <td>পাশের সাল</td>
                                                <td>প্রতিষ্ঠানের নাম </td>
                                                <td>বোর্ড / বিশ্ববিদ্যালয়</td>
                                                <td>জি.পি.এ / বিভাগ</td>      
                                            </tr>
                                            <tr>
                                                <td><input class="textfield"  name="n_ex_name[]" type="text" /></td>
                                                <td><input class="box5"  name="n_pass_year[]" type="text" /></td>
                                                <td><input class="textfield"  name="n_institute[]" type="text" /></td>
                                                <td><input class="textfield"  name="n_board[]" type="text" /></td>
                                                <td style="padding-right: 45px;"><input class="box5"  name="n_gpa[]" type="text" /></td>                                             
                                                <td ><input type="button" class="add3" /></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                        </table>
                    </td>
                </tr>
                    <tr>                    
                        <td colspan="4" style="padding-top: 10px; padding-left: 250px;padding-bottom: 5px; " ><input class="btn" style =" font-size: 12px; " type="submit" name="submit3" value="সেভ করুন" />
                            <input class="btn" style =" font-size: 12px" type="reset" name="reset" value="রিসেট করুন" />
                        </td>                           
                    </tr>
                </table>
            </form>
        </div>
        <!-- **********************Form Number 4***************************-->

        <div>
            <h2><a name="04" id="04"></a></h2><br/>
            <form name="scanDoc_form" method="POST" enctype="multipart/form-data" onsubmit="">	
                <table  class="formstyle">     
                    <tr><th colspan="4" style="text-align: center" colspan="2"><h1>কর্মচারীর একাউন্ট তৈরির ফর্ম</h1></th></tr>
                    <tr><td colspan="4" ></td>
                        <?php
                        if ($msg_scan_doc != "") {
                              echo '<tr> <td colspan="2" style="text-allign: center; color: green; font-size: 15px"><b>' . $msg_scan_doc . '</b></td></tr>';
                        }
                        ?>
                    </tr>                  
                    <tr>	
                        <td  style="width: 110px;" font-weight="bold" > এস.এস.সির সার্টিফিকেট</td>
                        <td>:  <input class="box" type="file" id="scanDoc1" name="scanDoc1" style="font-size:10px;"/></td>
                        <td  font-weight="bold" > জাতীয় পরিচয়পত্র</td>
                        <td>:  <input class="box" type="file" id="scanDoc2" name="scanDoc2" style="font-size:10px;"/></td>
                    </tr>
                    <tr>	
                        <td  font-weight="bold"  style="width: 112px;">এইচ.এস.সির সার্টিফিকেট</td>
                        <td>:  <input class="box" type="file" id="scanDoc3" name="scanDoc3" style="font-size:10px;"/></td>
                        <td  font-weight="bold" >জন্ম সনদ</td>
                        <td>:  <input class="box" type="file" id="scanDoc4" name="scanDoc4" style="font-size:10px;"/></td>
                    </tr>
                    <tr>	
                        <td  font-weight="bold" >অনার্সের সার্টিফিকেট</td>
                        <td>:  <input class="box" type="file" id="scanDoc5" name="scanDoc5" style="font-size:10px;"/></td>
                        <td  font-weight="bold" >চারিত্রিক সনদ</td>
                        <td>:  <input class="box" type="file" id="scanDoc6" name="scanDoc6" style="font-size:10px;"/></td>
                    </tr>
                    <tr>	
                        <td  font-weight="bold" >মাস্টার্সের  সার্টিফিকেট</td>
                        <td>:  <input class="box" type="file" id="scanDoc7" name="scanDoc7" style="font-size:10px;"/></td>
                        <td  font-weight="bold" >অন্যান্য </td>
                        <td>:  <input class="box" type="file" id="scanDoc8" name="scanDoc8" style="font-size:10px;"/></td>
                    </tr>
                    <tr>                    
                        <td colspan="4" style="padding-top: 10px; padding-left: 250px;padding-bottom: 5px; " ><input class="btn" style =" font-size: 12px; " type="submit" name="submit4" value="সেভ করুন" />
                            <input class="btn" style =" font-size: 12px" type="reset" name="reset" value="রিসেট করুন" />
                        </td>                           
                    </tr>
                </table>
                </fieldset>
            </form>
        </div>
    </div>         
    <?php include_once 'includes/footer.php'; ?>

