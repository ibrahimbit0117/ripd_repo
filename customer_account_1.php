<?php
include_once 'includes/MiscFunctions.php';
include 'includes/db.php';
include 'includes/ConnectDB.inc';
?>
<style type="text/css">
    @import "css/bush.css";
</style>
<script type="text/javascript" src="javascripts/division_district_thana.js"></script>
<script type="text/javascript" src="javascripts/jquery-1.4.3.min.js"></script>
<script type="text/javascript"> 
    $('.del').live('click',function(){
        $(this).parent().parent().remove();
    });
    $('.add').live('click',function()
    {var count1 = 2;
        if(count1<4){            
            var appendTxt= "<tr><td > <select class='box2' name='m_children_age[]' style ='font-size: 11px'><option>একটি নির্বাচন করুন</option> \n\
<?php
for ($i = 4; $i <= 30; $i++) {
    //echo "$count1";
    $age = english2bangla($i);
    echo "<option value='$age'>" . $age . "</option>";
}
?></select> </td> \n\
                <td style= 'padding-left: 62px;' >  <select class='box2' name='m_children_class[]' style ='font-size: 11px'><option>একটি নির্বাচন করুন</option> \n\
<?php
for ($i = 0; $i <= 18; $i++) {
    $class = number($i);
    echo "<option value='$class'>" . $class . "</option>";
}
?></select> </td><td style= 'padding-left: 23px;'><input type='button' class='del' /></td><td>&nbsp;<input type='button' class='add' /></td>"+count1
            "</tr>";
            $("#container_others30:last").after(appendTxt);
            
        }  
        count1 = count1 + 1;     
    })
            
    $('.del1').live('click',function(){
        $(this).parent().parent().remove();
    });
    $('.add1').live('click',function()
    {var count2 = 2;
        if(count2<6){
            var appendTxt= "<tr><td > <select class='box2' name='f_children_age[]' style ='font-size: 11px'><option>একটি নির্বাচন করুন</option> \n\
<?php
for ($i = 4; $i <= 30; $i++) {
    $age = english2bangla($i);
    echo "<option value='$age'>" . $age . "</option>";
}
?></select> </td> \n\
                <td style= 'padding-left: 62px;'>  <select class='box2' name='f_children_class[]' style ='font-size: 11px'><option>একটি নির্বাচন করুন</option> \n\
<?php
for ($i = 0; $i <= 18; $i++) {
    $class = number($i);
    echo "<option value='$class'>" . $class . "</option>";
}
?></select> </td><td style= 'padding-left: 23px;'><input type='button' class='del1' /></td><td>&nbsp;<input type='button' class='add1' /></td></tr>";
            $("#container_others31:last").after(appendTxt);           
        }  
        count2 = count2 + 1;        
    })
    
    $('.del2').live('click',function(){
        $(this).parent().parent().remove();
    });
    $('.add2').live('click',function()
    {var count3 = 2;
        if(count3<6){
            var appendTxt= "<tr> <td><input class='textfield'  name='c_ex_name[]' type='text' /></td><td><input class='box5'  name='c_pass_year[]' type='text' /></td><td><input class='textfield'  name='c_institute[]' type='text' /></td><td><input class='textfield'  name='c_board[]' type='text' /></td><td><input class='box5' name='c_gpa[]' type='text' /></td><td style='padding-right: 3px;'><input type='button' class='del2' /></td><td>&nbsp;<input type='button' class='add2' /></td></tr>";
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
<?php
if (isset($_POST['submit1'])) {
    $cust_father_name = $_POST['cust_father_name'];
    $cust_mother_name = $_POST['cust_mother_name'];
    $cust_spouse_name = $_POST['cust_spouse_name'];
    $cust_family_member = $_POST['cust_family_member'];
    $cust_son_no = $_POST['cust_son_no'];
    $cust_daughter_no = $_POST['cust_daughter_no'];
    $cust_son_student_no = $_POST['cust_son_student_no'];
    $cust_daughter_student_no = $_POST['cust_daughter_student_no'];
    $cust_occupation = $_POST['cust_occupation'];
    $cust_religion = $_POST['cust_religion'];
    $cust_nationality = $_POST['cust_nationality'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $cust_nationalID_no = $_POST['cust_nationalID_no'];
    $cust_passportID_no = $_POST['cust_passportID_no'];
    $birth_certificate_no = $_POST['birth_certificate_no'];
    $cust_gurdian_name = $_POST['cust_gurdian_name'];
    $cust_gurdian_relation = $_POST['cust_gurdian_relation'];
    $cust_gurdian_mobile = $_POST['cust_gurdian_mobile'];
    $cust_gurdian_email = $_POST['cust_gurdian_email'];
    $cust_gurdian_education = $_POST['cust_gurdian_education'];
    $cust_gurdian_nationalID_no = $_POST['cust_gurdian_nationalID_no'];
    $cust_gurdian_passportID_no = $_POST['cust_gurdian_passportID_no'];
    $dob_day = $_POST['date'];
    $dob_month = $_POST['month'];
    $dob_year = $_POST['year'];
    $dob = $dob_year . "-" . $dob_month . "-" . $dob_day;
    // picture, sign, sign
    $allowedExts = array("gif", "jpeg", "jpg", "png", "JPG", "JPEG", "GIF", "PNG");
    $extension = end(explode(".", $_FILES["image"]["name"]));
    $image_name = "picture" . "_" . $_FILES["image"]["name"];
    $image_path = "pic/" . $image_name;
    if (($_FILES["image"]["size"] < 999999999999) && in_array($extension, $allowedExts)) {
        move_uploaded_file($_FILES["image"]["tmp_name"], "pic/" . $image_name);
    } else {
        echo "Invalid file format.";
    }

    $allowedExts = array("gif", "jpeg", "jpg", "png", "JPG", "JPEG", "GIF", "PNG");
    $extension = end(explode(".", $_FILES["scanDoc_signature"]["name"]));
    $sign_name = "signature" . "_" . $_FILES["scanDoc_signature"]["name"];
    $sing_path = "sign/" . $sign_name;
    if (($_FILES["scanDoc_signature"]["size"] < 999999999999) && in_array($extension, $allowedExts)) {
        move_uploaded_file($_FILES["scanDoc_signature"]["tmp_name"], "sign/" . $sign_name);
    } else {
        echo "Invalid file format.";
    }

    $allowedExts = array("gif", "jpeg", "jpg", "png", "JPG", "JPEG", "GIF", "PNG");
    $extension = end(explode(".", $_FILES["scanDoc_finger_print"]["name"]));
    $finger_name = "fingerprint" . "_" . $_FILES["scanDoc_finger_print"]["name"];
    $finger_path = "fingerprints/" . $finger_name;
    if (($_FILES["scanDoc_finger_print"]["size"] < 999999999999) && in_array($extension, $allowedExts)) {
        move_uploaded_file($_FILES["scanDoc_finger_print"]["tmp_name"], "fingerprints/" . $finger_name);
    } else {
        echo "Invalid file format.";
    }

    $allowedExts = array("gif", "jpeg", "jpg", "png", "JPG", "JPEG", "GIF", "PNG");
    $extension = end(explode(".", $_FILES["cust_gurd_scanpic"]["name"]));
    $gimage_name = "gurd_pic" . "_" . $_FILES["cust_gurd_scanpic"]["name"];
    $gimage_path = "pic/" . $gimage_name;
    if (($_FILES["cust_gurd_scanpic"]["size"] < 999999999999) && in_array($extension, $allowedExts)) {
        move_uploaded_file($_FILES["cust_gurd_scanpic"]["tmp_name"], "pic/" . $gimage_name);
    } else {
        echo "Invalid file format.";
    }
    $sql_update_customer = mysql_query("UPDATE $dbname.customer_account SET cust_father_name='$cust_father_name', cust_mother_name='$cust_mother_name', cust_spouse_name='$cust_spouse_name', cust_family_member='$cust_family_member', cust_son_no='$cust_son_no', cust_daughter_no='$cust_daughter_no', 
                                                        cust_son_student_no='$cust_son_student_no', cust_daughter_student_no='$cust_daughter_student_no', cust_occupation='$cust_occupation', cust_religion='$cust_religion', cust_nationality='$cust_nationality', cust_nationalID_no='$cust_nationalID_no', 
                                                        cust_passportID_no='$cust_passportID_no', cust_date_of_birth='$dob', birth_certificate_no='$birth_certificate_no', cust_gurdian_name='$cust_gurdian_name', cust_gurdian_relation='$cust_gurdian_relation', cust_gurdian_mobile='$cust_gurdian_mobile', 
                                                        cust_gurdian_email='$cust_gurdian_email', cust_gurdian_nationalID_no='$cust_gurdian_nationalID_no', cust_gurdian_passportID_no='$cust_gurdian_passportID_no', cust_gurdian_education='$cust_gurdian_education', scanDoc_national_id='$scanDoc_nationalID_no', 
                                                        scanDoc_birth_certificate='$scanDoc_nationalID_no', scanDoc_chairman_certificate='$scanDoc_nationalID_no', scanDoc_picture='$image_path', scanDoc_signature='$sing_path',  scanDoc_finger_print='$finger_path', cust_gurd_scanpic = '$gimage_path'
                                                        WHERE cfs_user_idUser='4'");
    //children
    $result = mysql_query("Select  * from $dbname.customer_account where cfs_user_idUser='4'");
    $customer_id = mysql_fetch_array($result);
    $cust = $customer_id['idCustomer_account'];
    //male child
    $m_children_age = $_POST['m_children_age'];
    $m_children_class = $_POST['m_children_class'];
    $n1 = count($m_children_age);
    for ($i1 = 0; $i1 < $n1; $i1++) {
        $sql_insert_malechild = "INSERT INTO $dbname.`children` ( `children_age` ,`children_class` ,`type`,`Customer_account_idCustomer_account`) VALUES ('$m_children_age[$i1]', '$m_children_class[$i1]','M',$cust)";
        $child_male = mysql_query($sql_insert_malechild) or exit('query failed: ' . mysql_error());
    }
    //female child
    $f_children_age = $_POST['f_children_age'];
    $f_children_class = $_POST['f_children_class'];
    $m = count($f_children_age);
    for ($i = 0; $i < $m; $i++) {
        $sql_insert_femalechild = "INSERT INTO " . $dbname . ".`children` ( `children_age` ,`children_class` ,`type`,`Customer_account_idCustomer_account`) VALUES ('$f_children_age[$i]', '$f_children_class[$i]','F','$cust');";
        $child_female = mysql_query($sql_insert_femalechild) or exit('query failed: ' . mysql_error());
    }
    if ($sql_update_customer && $child_male && $child_female) {
        $msg = "তথ্য সংরক্ষিত হয়েছে";
    } else {
        $msg = "ভুল হয়েছে";
    }
} elseif (isset($_POST['submit2'])) {
    $nominee_name = $_POST['nominee_name'];
    $nominee_age = $_POST['nominee_age'];
    $nominee_relation = $_POST['nominee_relation'];
    $nominee_mobile = $_POST['nominee_mobile'];
    $nominee_email = $_POST['nominee_email'];
    $nominee_national_ID = $_POST['nominee_national_ID'];
    $nominee_passport_ID = $_POST['nominee_passport_ID'];

    $result = mysql_query("Select  * from $dbname.customer_account where cfs_user_idUser='4'");
    $customer_id = mysql_fetch_array($result);
    $cust1 = $customer_id['idCustomer_account'];
    //Insert Into Nominee table
    $allowedExts = array("gif", "jpeg", "jpg", "png", "JPG", "JPEG", "GIF", "PNG");
    $extension = end(explode(".", $_FILES["nominee_picture"]["name"]));
    $image_name = "picture" . "_" . $_FILES["nominee_picture"]["name"];
    $image_path = "pic/" . $image_name;
    if (($_FILES["nominee_picture"]["size"] < 999999999999) && in_array($extension, $allowedExts)) {
        move_uploaded_file($_FILES["nominee_picture"]["tmp_name"], "pic/" . $image_name);
    } else {
        echo "Invalid file format.";
    }

    $sql_nominee = mysql_query("INSERT INTO $dbname.nominee(nominee_name, nominee_relation, nominee_mobile,
                                       nominee_email, nominee_national_ID, nominee_age, nominee_passport_ID, nominee_picture,cep_type, cep_nominee_id) 
                                       VALUES('$nominee_name','$nominee_relation','$nominee_mobile','$nominee_email','$nominee_national_ID',
                                       '$nominee_age','$nominee_passport_ID','$image_path','cust','$cust1')");
    // $nominee_id = mysql_insert_id(); //Contains the last inserted id (nominee_id)

    if ($sql_nominee) {
        $msg1 = "তথ্য সংরক্ষিত হয়েছে";
    } else {
        $msg1 = "ভুল হয়েছে";
    }
} elseif (isset($_POST['submit3'])) {

    $result = mysql_query("Select  * from $dbname.customer_account where cfs_user_idUser='4'");
    $customer_id = mysql_fetch_array($result);
    $cust2 = $customer_id['idCustomer_account'];
    //customer education
    $c_ex_name = $_POST['c_ex_name'];
    $c_pass_year = $_POST['c_pass_year'];
    $c_institute = $_POST['c_institute'];
    $c_board = $_POST['c_board'];
    $c_gpa = $_POST['c_gpa'];
    $a = count($c_ex_name);
    for ($i = 0; $i < $a; $i++) {
        $sql_insert_cus_edu = "INSERT INTO " . $dbname . ".`education` ( `exam_name` ,`passing_year` ,`institute_name`,`board`,`gpa`,`education_type`,`cepn_id`) VALUES ('$c_ex_name[$i]', '$c_pass_year[$i]','$c_institute[$i]','$c_board[$i]','$c_gpa[$i]','cust','$cust2');";
        $cus_edu = mysql_query($sql_insert_cus_edu) or exit('query failed: ' . mysql_error());
    }
    //nominee education
    $n_ex_name = $_POST['n_ex_name'];
    $n_pass_year = $_POST['n_pass_year'];
    $n_institute = $_POST['n_institute'];
    $n_board = $_POST['n_board'];
    $n_gpa = $_POST['n_gpa'];
    $b = count($n_ex_name);
    for ($i = 0; $i < $b; $i++) {
        $sql_insert_nom_edu = "INSERT INTO " . $dbname . ".`education` ( `exam_name` ,`passing_year` ,`institute_name`,`board`,`gpa`,`education_type`,`cepn_id`) VALUES ('$n_ex_name[$i]', '$n_pass_year[$i]','$n_institute[$i]','$n_board[$i]','$n_gpa[$i]','nmn','$cust2');";
        $nom_edu = mysql_query($sql_insert_nom_edu) or exit('query failed: ' . mysql_error());
    }
    if ($cus_edu || $nom_edu) {
        $msg2 = "তথ্য সংরক্ষিত হয়েছে";
    } else {
        $msg2 = "ভুল হয়েছে";
    }
} elseif (isset($_POST['submit4'])) {
    $result = mysql_query("Select  * from $dbname.customer_account where cfs_user_idUser='4'");
    $customer_id = mysql_fetch_array($result);
    $cust3 = $customer_id['idCustomer_account'];                 
    //Current Address Infromation
    $c_Village_idVillage = $_POST['village_id1'];
    $c_Post_idPost = $_POST['post_id1'];
    $c_Thana_idThana = $_POST['thana_id1'];
    $c_house = $_POST['c_house'];
    $c_house_no = $_POST['c_house_no'];
    $c_village = $_POST['c_village'];
    $c_road = $_POST['c_road'];
    $c_post = $_POST['c_post'];
    $c_post_code = $_POST['c_post_code'];
    //Permanent Address information
    $cp_Village_idVillage = $_POST['village_id2'];
    $cp_Post_idPost = $_POST['post_id2'];
    $cp_Thana_idThana = $_POST['thana_id2'];
    $cp_house = $_POST['cp_house'];
    $cp_house_no = $_POST['cp_house_no'];
    $cp_village = $_POST['cp_village'];
    $cp_road = $_POST['cp_road'];
    $cp_post = $_POST['cp_post'];
    $cp_post_code = $_POST['cp_post_code'];
    //Current Address Infromation
    $g_Village_idVillage = $_POST['village_id3'];
    $g_Post_idPost = $_POST['post_id3'];
    $g_Thana_idThana = $_POST['thana_id3'];
    $g_house = $_POST['g_house'];
    $g_house_no = $_POST['g_house_no'];
    $g_village = $_POST['g_village'];
    $g_road = $_POST['g_road'];
    $g_post = $_POST['g_post'];
    $g_post_code = $_POST['g_post_code'];
    //Permanent Address information
    $gp_Village_idVillage = $_POST['village_id4'];
    $gp_Post_idPost = $_POST['post_id4'];
    $gp_Thana_idThana = $_POST['thana_id4'];
    $gp_house = $_POST['gp_house'];
    $gp_house_no = $_POST['gp_house_no'];
    $gp_village = $_POST['gp_village'];
    $gp_road = $_POST['gp_road'];
    $gp_post = $_POST['gp_post'];
    $gp_post_code = $_POST['gp_post_code'];
    //Current Address Infromation
    $n_Village_idVillage = $_POST['village_id5'];
    $n_Post_idPost = $_POST['post_id5'];
    $n_Thana_idThana = $_POST['thana_id5'];
    $n_house = $_POST['n_house'];
    $n_house_no = $_POST['n_house_no'];
    $n_village = $_POST['n_village'];
    $n_road = $_POST['n_road'];
    $n_post = $_POST['n_post'];
    $n_post_code = $_POST['n_post_code'];
    //Permanent Address information
    $np_Village_idVillage = $_POST['village_id6'];
    $np_Post_idPost = $_POST['post_id6'];
    $np_Thana_idThana = $_POST['thana_id6'];
    $np_house = $_POST['np_house'];
    $np_house_no = $_POST['np_house_no'];
    $np_village = $_POST['np_village'];
    $np_road = $_POST['np_road'];
    $np_post = $_POST['np_post'];
    $np_post_code = $_POST['np_post_code'];
    //customer address_type=Present
    $sql_c_insert_current_address = mysql_query("INSERT INTO $dbname.address 
                                    (address_type, house, house_no, road, address_whom, post_code,Thana_idThana, post_idpost, village_idvillage ,adrs_cepng_id)
                                     VALUES ('Present', '$c_house', '$c_house_no', '$c_road', 'cust', '$c_post_code','$c_Thana_idThana','$c_Post_idPost', '$c_Village_idVillage', '$cust3')");
    //customer address_type=Permanent
    $sql_cp_insert_present_address = mysql_query("INSERT INTO $dbname.address 
                                    (address_type, house, house_no, road, address_whom, post_code,Thana_idThana,  post_idpost, village_idvillage ,adrs_cepng_id)
                                     VALUES ('Permanent', '$cp_house', '$cp_house_no', '$cp_road', 'cust', '$cp_post_code','$cp_Thana_idThana', '$cp_Post_idPost', '$cp_Village_idVillage', '$cust3')");
    //gurdian address_type=Present
    $sql_g_insert_current_address = mysql_query("INSERT INTO $dbname.address 
                                    (address_type, house, house_no, road, address_whom, post_code,Thana_idThana,  post_idpost, village_idvillage ,adrs_cepng_id)
                                     VALUES ('Present', '$g_house', '$g_house_no', '$g_road',  'cust_prnt', '$g_post_code', '$g_Thana_idThana', '$g_Post_idPost', '$g_Village_idVillage','$cust3')");
    //gurdian address_type=Permanent
    $sql_gp_insert_present_address = mysql_query("INSERT INTO $dbname.address 
                                    (address_type, house, house_no,road, address_whom,post_code,Thana_idThana,  post_idpost, village_idvillage ,adrs_cepng_id)
                                     VALUES ('Permanent', '$gp_house', '$gp_house_no','$gp_road', 'cust_prnt','$gp_post_code', '$gp_Thana_idThana','$gp_Post_idPost', '$gp_Village_idVillage','$cust3')");
    //nominee address_type=Present
    $sql_n_insert_current_address = mysql_query("INSERT INTO $dbname.address 
                                    (address_type, house, house_no,road, address_whom, post_code,Thana_idThana,  post_idpost, village_idvillage ,adrs_cepng_id)
                                     VALUES ('Present', '$n_house', '$n_house_no', '$n_road', 'nmn', '$n_post_code', '$n_Thana_idThana', '$n_Post_idPost', '$n_Village_idVillage','$cust3')");
    //nominee address_type=Permanent
    $sql_np_insert_present_address = mysql_query("INSERT INTO $dbname.address 
                                    (address_type, house, house_no, road, address_whom,post_code,Thana_idThana,  post_idpost, village_idvillage ,adrs_cepng_id)
                                     VALUES ('Permanent', '$np_house', '$np_house_no','$np_road', 'nmn',  '$np_post_code','$np_Thana_idThana','$np_Post_idPost', '$np_Village_idVillage','$cust3')");

    if ($sql_c_insert_current_address || $sql_cp_insert_present_address || $sql_g_insert_current_address || $sql_gp_insert_present_address || $sql_n_insert_current_address || $sql_np_insert_present_address) {
        $msg3 = "তথ্য সংরক্ষিত হয়েছে";
    } else {
        $msg3 = "ভুল হয়েছে";
    }
}
?>
<div class="column6">
    <div class="main_text_box">
        <div class="domtab">
            <ul class="domtabs">
                <li class="current"><a href="#01">মূল তথ্য</a></li><li class="current"><a href="#02">ব্যাক্তিগত  তথ্য</a></li> <li class="current"><a href="#03">নমিনির তথ্য</a></li><li class="current"><a href="#04">শিক্ষাগত যোগ্যতা</a></li><li class="current"><a href="#05"> যোগাযোগের ঠিকানা</a></li>
            </ul>
        </div>   

        <div>
            <h2><a name="01" id="01"></a></h2><br/>
            <form method="POST" onsubmit="" style=" padding-left: 50px; " >	
                <table class="formstyle" style=" width: 85%; padding-left: 15px; padding-top: 5px;padding-bottom: 8px;" >                           
                    <tr><td colspan="4" ></td></tr>
                    <tr>
                        <td  > পিন নং প্রবেশ</td>
                        <td>:  <input  class="box" type="text" id="cust_name" name="cust_name" /></td>	   
                        <td  >রেফারার নাম</td>
                        <td>:  <input  class="box" type="text" id="cust_name" name="cust_name" /></td>	   
                    </tr>
                    <tr>
                        <td >বার কোড</td>
                        <td>:  <input class="box" type="text" id="cust_occupation" name="cust_occupation" /></td>
                        <td >রেফারার একাউন্ট নং</td>
                        <td>:  <input class="box" type="text" id="cust_occupation" name="cust_occupation" /></td>
                    </tr>
                    <tr>
                        <td >পণ্যর নাম</td>
                        <td>:   <input class="box" type="text" id="nominee_email" name="nominee_email" /></td>			
                    </tr>
                    <tr>
                        <td >পি.ভি.</td>
                        <td>:   <input class="box" type="text" id="nominee_email" name="nominee_email" /></td>			
                    </tr>
                    <tr>
                        <td >পরিমাণ</td>
                        <td>:   <input class="box" type="text" id="nominee_email" name="nominee_email" /></td>			
                    </tr>
                    <tr>
                        <td >প্যাকেজের নাম</td>
                        <td>:   <input class="box" type="text" id="nominee_email" name="nominee_email" /></td>			
                    </tr>
                    <tr>
                        <td >সার্ভিস চার্জ</td>
                        <td>:   <input class="box" type="text" id="nominee_email" name="nominee_email" /></td>
                    </tr>                                              
                    <tr>
                        <td colspan="4" ><hr /></td>
                    </tr> 
                    <tr>	
                        <td  colspan="4" style =" font-size: 14px"><b>স্ক্যানড ডকুমেন্টস </b></td>                            
                    </tr>
                    <tr>	
                        <td style="width: 100px;" font-weight="bold" > জাতীয় পরিচয়পত্র</td>
                        <td >:   <input class="box1" type="file" id="scanDoc_national_id" name="scanDoc_national_id" style="font-size:10px;"/> </td>
                    </tr>
                    <tr>	
                        <td  font-weight="bold" >জন্ম সনদ </td>
                        <td >:   <input class="box1" type="file" id="scanDoc_birth_certificate" name="scanDoc_birth_certificate" style="font-size:10px;"/></td>
                    </tr>
                    <tr>	
                        <td  font-weight="bold" >চারিত্রিক সনদ</td>
                        <td >:   <input class="box1" type="file" id="scanDoc_chairman_certificate" name="scanDoc_chairman_certificate" style="font-size:10px;"/></td>
                    </tr>                        
                    <tr>                    
                        <td colspan="4" style="padding-left: 250px; " ><input class="btn" style =" font-size: 12px; " type="submit" name="submit" value="সেভ করুন" />
                            <input class="btn" style =" font-size: 12px" type="reset" name="reset" value="রিসেট করুন" /></td>                           
                    </tr>     
                </table>
            </form>
        </div> 

        <div>
            <h2><a name="02" id="02"></a></h2><br/>
            <form method="POST" onsubmit="" style=" padding-left: 70px;" enctype="multipart/form-data" action="" id="cust_form" name="cust_form">	
                <table class="formstyle" style=" width: 85%; padding-left: 15px; padding-top: 5px;padding-bottom: 8px;" >            
                    <tr><td colspan="4" ></td></tr>
                    <?php
                    if ($msg != "") {
                        echo '<tr><td ></td><td colspan="4" style="text-allign: center; color: green; font-size: 15px"><b>' . $msg . '</b></td></tr>';
                    }
                    ?>
                    <tr>
                        <td  >নাম </td>
                        <td>:    <input  class="box" type="text" id="cust_name" name="cust_name" /></td>           
                    </tr>        
                    <tr><td colspan="4" ></td></tr>
                    <tr>
                        <td >পেশা</td>
                        <td>:   <input class="box" type="text" id="cust_occupation" name="cust_occupation" /></td>                   
                    </tr>
                    <tr>
                        <td>ধর্ম</td>
                        <td>:   <input  class="box" type="text" id="cust_religion" name="cust_religion" /></td>	      
                    </tr>
                    <tr>
                        <td >জাতীয়তা</td>
                        <td>:   <input class="box" type="text" id="cust_nationality" name="cust_nationality" /> </td>			
                    </tr>
                    <tr>
                        <td>জন্মতারিখ</td>
                        <td >:   <select  class="box1"  name="date" style =" font-size: 11px">
                                <option >দিন</option>
                                <?php
                                for ($i = 1; $i <= 31; $i++) {
                                    $date = english2bangla($i);
                                    echo "<option value=1>" . $date . "</option>";
                                }
                                ?>
                            </select>				

                            <select class="box1" name="month" style =" font-size: 11px">
                                <option >মাস</option>
                            <?php
                            $inc=1; $month_array = array('জানুয়ারি', 'ফেব্রুয়ারি', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'আগষ্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর');
                            while (list ($inc, $val) = each ($month_array)) echo "<option value='$inc'>$val</option>";
                            ?>
                            </select>

                            <select class="box1" id="year" name="year" style =" font-size: 11px" >
                                <option>বছর </option>
                                <?php
                                for ($i = 2020; $i >= 1900; $i--) {
                                    $year = english2bangla($i);
                                    echo "<option value='$i'>" . $year . "</option>";
                                }
                                ?>
                            </select>
                        </td>			
                    </tr> 
                    <tr>
                        <td >জাতীয় পরিচয়পত্র নং</td>
                        <td>:   <input class="box" type="text" id="cust_nationalID_no" name="cust_nationalID_no" /></td>			
                    </tr>
                    <tr>
                        <td >পাসপোর্ট আইডি নং</td>
                        <td>:    <input class="box" type="text" id="cust_passportID_no" name="cust_passportID_no" /> </td>			
                    </tr>
                    <tr>
                        <td >জন্ম সনদ নং</td>
                        <td>:   <input class="box" type="text" id="birth_certificate_no" name="birth_certificate_no" /></td>			
                    </tr>                      
                    <tr>  
                        <td font-weight="bold" >ছবি </td>
                        <td>:   <input class="box5" type="file" id="image" name="image" style="font-size:10px;"/></td>             
                    </tr>
                    <tr>  
                        <td font-weight="bold" >স্বাক্ষর</td>
                        <td >:   <input class="box5" type="file" id="scanDoc_signature" name="scanDoc_signature" style="font-size:10px;"/> </td>                  
                    </tr>
                    <tr>	        
                        <td font-weight="bold" > টিপসই</td>
                        <td >:   <input class="box5" type="file" id="scanDoc_finger_print" name="scanDoc_finger_print" style="font-size:10px;"/> </td>       
                    </tr>
                    <tr>
                        <td colspan="4" ><hr /></td>
                    </tr>
                    <tr>	
                        <td  colspan="2"   style =" font-size: 14px"><b>পারিবারিক তথ্য</b></td>                                                
                    </tr>
                    <tr>
                        <td >বাবার নাম </td>
                        <td>:   <input class="box" type="text" id="cust_father_name" name="cust_father_name" /></td>			
                    </tr>
                    <tr>
                        <td >মায়ের নাম </td>
                        <td>:    <input class="box" type="text" id="cust_mother_name" name="cust_mother_name"/></td>			
                    </tr>
                    <tr>
                        <td >দম্পতির নাম  </td>
                        <td>:   <input class="box" type="text" id="cust_spouse_name" name="cust_spouse_name" /> </td>			
                    </tr>
                    <tr>
                        <td>পরিবারের সদস্য সংখ্যা  </td>
                        <td>:   <input class="textfield" type="text" id="cust_family_member" name="cust_family_member" /> জন</td>			
                    </tr>
                    <tr>
                        <td colspan="4" ><hr /></td>
                    </tr>
                    <tr>	
                        <td  colspan="2"   style =" font-size: 14px"><b>ছেলের সন্তানের তথ্য </b></td>                                                   
                    </tr>
                    <tr>
                        <td >ছেলের সন্তানের সংখ্যা  </td>
                        <td  >:   <input class="textfield" type="text" id="cust_son_no" name="cust_son_no"/> জন</td>                          
                    </tr>                                                                                                 
                    <tr>
                        <td>ছেলে  ষ্টুডেন্ট </td>
                        <td>:    <input class="textfield" type="text" id="cust_son_student_no" name="cust_son_student_no" /> জন</td>
                    </tr>              
                    <tr>
                        <td style="padding-top: 14px;vertical-align: top; width: 25%;" >বয়স ও শ্রেণী</td>
                        <td colspan="2">
                            <table id="container_others30">                     
                                <tr>
                                    <td>সন্তানের বয়স  :</td>
                                    <td>অধ্যয়ণরত শ্রেণী : </td>
                                </tr>
                                <tr>
                                    <td> <select class="box2" id="m_children_age" name="m_children_age[]" style =" font-size: 11px">
                                            <option>একটি নির্বাচন করুন</option>
                                            <?php
                                            for ($i = 4; $i <= 30; $i++) {
                                                $age = english2bangla($i);
                                                echo "<option value='$age'>" . $age . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </td>
                                    <td><select class="box2" id="m_children_class"name="m_children_class[]" style =" font-size: 11px">
                                            <option>একটি নির্বাচন করুন</option>
                                            <?php
                                            for ($i = 0; $i <= 18; $i++) {
                                                $class = number($i);
                                                echo "<option value='$class'>" . $class . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </td>
                                    <td><input type="button" class="add" /></td>
                                </tr>
                            </table>
                        </td>
                    </tr>                  
                    </td>
                    </tr>          
                    <tr>
                        <td colspan="4" ><hr /></td>
                    </tr>
                    <tr>	                                          
                        <td colspan="2" style =" font-size: 14px"><b>মেয়ের সন্তানের তথ্য</b></td>
                    </tr>        
                    <tr>
                        <td >মেয়ের সন্তানের সংখ্যা  </td>
                        <td >:  <input class="textfield" type="text" id="cust_daughter_no" name="cust_daughter_no" /> জন</td>
                    </tr>                                                                                                 
                    <tr>
                        <td >মেয়ে  ষ্টুডেন্ট </td>
                        <td>:  <input class="textfield" type="text" id="cust_daughter_student_no" name="cust_daughter_student_no" /> জন </td>	
                    </tr>                                                                                                
                    <tr>
                        <td colspan="2" >                
                    <tr>
                        <td style="padding-top: 14px;vertical-align: top; width: 25%;">বয়স ও শ্রেণী</td>
                        <td>
                            <table id="container_others31">                                                    
                                <tr>
                                    <td>সন্তানের বয়স  :</td>
                                    <td>অধ্যয়ণরত শ্রেণী : </td>
                                </tr>
                                <tr>
                                    <td ><select class="box2" name="f_children_age[]" style =" font-size: 11px">
                                            <option>একটি নির্বাচন করুন</option>
                                            <?php
                                            for ($i = 4; $i <= 30; $i++) {
                                                $age = english2bangla($i);
                                                echo "<option value='$age'>" . $age . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </td>
                                    <td><select class="box2"  name="f_children_class[]" style =" font-size: 11px">
                                            <option>একটি নির্বাচন করুন</option>
                                            <?php
                                            for ($i = 0; $i <= 18; $i++) {
                                                $class = number($i);
                                                echo "<option value='$class'>" . $class . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </td>
                                    <td><input type="button" class="add1" /></td>
                                </tr>
                            </table>
                        </td>
                    </tr>                     
                    <tr>
                        <td colspan="4" ><hr /></td>
                    </tr>
                    <tr>	
                        <td  colspan="2" style =" font-size: 14px"><b>অভিভাবকের তথ্য </b></td>                                                   
                    </tr>
                    <tr>
                        <td  >অভিভাবকের নাম </td>
                        <td>:    <input  class="box" type="text" id="cust_gurdian_name" name="cust_gurdian_name" /></td>                    
                    </tr>
                    <tr>
                        <td >সম্পর্ক </td>
                        <td>:    <input class="box" type="text" id="cust_gurdian_relation" name="cust_gurdian_relation" /></td>			
                    </tr>
                    <tr>
                        <td >মোবাইল নং</td>
                        <td>:   <input class="box" type="text" id="cust_gurdian_mobile" name="cust_gurdian_mobile" /></td>			
                    </tr>
                    <tr>
                        <td >ইমেইল</td>
                        <td>:   <input class="box" type="text" id="cust_gurdian_email" name="cust_gurdian_email" /></td>			
                    </tr>
                    <tr>
                        <td >জাতীয় পরিচয়পত্র নং</td>
                        <td>:   <input class="box" type="text" id="cust_gurdian_nationalID_no" name="cust_gurdian_nationalID_no" /></td>			
                    </tr>
                    <tr>
                        <td >পাসপোর্ট আইডি নং</td>
                        <td>:   <input class="box" type="text" id="cust_gurdian_passportID_no" name="cust_gurdian_passportID_no" /></td>			
                    </tr>                   
                    <tr>     
                        <td   font-weight="bold" > ছবি </td>
                        <td> :   <input class="box" type="file" id="cust_gurd_scanpic" name="cust_gurd_scanpic" style="font-size:10px;"/>
                        </td>             
                    </tr>
                    <tr>
                        <td >শিক্ষাগত যোগ্যতা</td>
                        <td> <textarea class="box" type="text" id="cust_gurdian_education" name="cust_gurdian_education" ></textarea></td>			
                    </tr>            
                    <tr>                    
                        <td colspan="4" style="padding-left: 250px; " ><input class="btn" style =" font-size: 12px; " type="submit" name="submit1" value="সেভ করুন" />
                            <input class="btn" style =" font-size: 12px" type="reset" name="reset" value="রিসেট করুন" /></td>                           
                    </tr>    
                </table>
                </fieldset>
            </form>
        </div>

        <div>
            <h2><a name="03" id="03"></a></h2><br/>
            <form method="POST" onsubmit="" style=" padding-left: 100px;" enctype="multipart/form-data" action="" id="cust_form1" name="cust_form1">	
                <table class="formstyle" style=" width: 80%; padding-left: 15px; padding-top: 5px; padding-bottom: 8px;" >      
                    <tr><td colspan="4" ></td></tr> 
                    <?php
                    if ($msg1 != "") {
                        echo '<tr><td ></td><td colspan="4" style="text-allign: center; color: green; font-size: 15px"><b>' . $msg1 . '</b></td></tr>';
                    }
                    ?>
                    <tr>
                        <td >নমিনির নাম</td>
                        <td>:   <input class="box" type="text" id="nominee_name" name="nominee_name" /></td>
                    </tr>   
                    <tr>
                        <td >বয়স</td>
                        <td>:   <input class="box" type="text" id="nominee_age" name="nominee_age" /></td>
                    </tr>   
                    <tr>
                        <td >সম্পর্ক </td>
                        <td>:   <input class="box" type="text" id="nominee_relation" name="nominee_relation" /> </td>			
                    </tr>
                    <tr>
                        <td >মোবাইল নং</td>
                        <td>:   <input class="box" type="text" id="nominee_mobile" name="nominee_mobile" /></td>			
                    </tr>
                    <tr>
                        <td >ইমেইল</td>
                        <td>:   <input class="box" type="text" id="nominee_email" name="nominee_email" /></td>			
                    </tr>
                    <tr>
                        <td >জাতীয় পরিচয়পত্র নং</td>
                        <td>:   <input class="box" type="text" id="nominee_national_ID" name="nominee_national_ID" /></td>			
                    </tr>
                    <tr>
                        <td >পাসপোর্ট আইডি নং</td>
                        <td>:   <input class="box" type="text" id="nominee_passport_ID" name="nominee_passport_ID" /></td>			
                    </tr>                     
                    <tr>
                        <td  font-weight="bold" >ছবি </td>
                        <td >:   <input class="box1" type="file" id="nominee_picture" name="nominee_picture" style="font-size:10px;"/></td>
                    </tr>
                    <tr>                    
                        <td colspan="4" style="padding-left: 250px; " ><input class="btn" style =" font-size: 12px; " type="submit" name="submit2" value="সেভ করুন" />
                            <input class="btn" style =" font-size: 12px" type="reset" name="reset" value="রিসেট করুন" /></td>                           
                    </tr>                      
                </table>
                </fieldset>
            </form>
        </div>    

        <div>
            <h2><a name="04" id="04"></a></h2><br/>
            <form method="POST" onsubmit="">
                <table class="formstyle" style=" padding-top: 5px; padding-bottom: 8px;" >                                
                    <tr><td colspan="4" ></td></tr>    
                    <?php
                    if ($msg2 != "") {
                        echo '<tr><td ></td><td colspan="2" style="padding-left:300px; text-allign: center; color: green; font-size: 15px"><b>' . $msg2 . '</b></td></tr>';
                    }
                    ?>
                    <tr>
                        <td colspan="2" >
                            <table width="100%">
                                <tr>	
                                    <td  colspan="2"   style =" font-size: 14px"><b>ব্যক্তির শিক্ষাগত যোগ্যতা</b></td>                                                
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
                                                <td><input class="textfield"  name="c_ex_name[]" type="text" /></td>
                                                <td><input class="box5"  name="c_pass_year[]" type="text" /></td>
                                                <td><input class="textfield" name="c_institute[]" type="text" /></td>
                                                <td><input class="textfield"  name="c_board[]" type="text" /></td>
                                                <td style="padding-right: 45px;"><input class="box5"  name="c_gpa[]" type="text" /></td>                                             
                                                <td  ><input type="button" class="add2" /></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>                                                               
                            </table>
                        </td>
                    </tr>    
                    <tr><td colspan="4" ></td></tr>   
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
                        <td ></td>     
                        <td style="padding-left: 250px; " ><input class="btn" style =" font-size: 12px; " type="submit" name="submit3" value="সেভ করুন" />
                            <input class="btn" style =" font-size: 12px" type="reset" name="reset" value="রিসেট করুন" /></td>                           
                    </tr>    
                </table>
                </fieldset>
            </form>
        </div> 
        <div>
            <h2><a name="05" id="05"></a></h2><br/>
            <form method="POST" onsubmit="" style=" padding-left: 30px; ">	
                <table  class="formstyle" style="padding-bottom: 8px;">   
                    <?php
                    if ($msg3 != "") {
                        echo '<tr><td ></td><td colspan="6" style="text-allign: center; color: green; font-size: 15px"><b>' . $msg3 . '</b></td></tr>';
                    }
                    ?> 
                    <tr><td colspan="4" ></td></tr>
                    <tr>	
                        <td  colspan="2" style =" padding-left: 320px; font-size: 15px"><b>ব্যক্তির </b></td>                            
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
                        <td >:   <input class="box" type="text" id="c_house" name="c_house" /></td>
                        <td  >বাড়ির নাম / ফ্ল্যাট নং</td>
                        <td >:   <input class="box" type="text" id="cp_house" name="cp_house" /></td>
                    </tr>
                    <tr>
                        <td  >বাড়ি নং</td>
                        <td >:   <input class="box" type="text" id="c_house_no" name="c_house_no" /></td>
                        <td >বাড়ি নং</td>
                        <td>:   <input class="box" type="text" id="cp_house_no" name="cp_house_no" /></td>
                    </tr>
                    <tr>
                        <td >রোড নং</td>
                        <td>:   <input class="box" type="text" id="c_road" name="c_road" /> </td>
                        <td >রোড নং</td>
                        <td>:   <input class="box" type="text" id="cp_road" name="cp_road" /></td>
                    </tr>
                    <tr>
                        <td >পোষ্ট কোড</td>
                        <td>:   <input class="box" type="text" id="c_post_code" name="c_post_code" /></td>
                        <td >পোষ্ট কোড</td>
                        <td>:   <input class="box" type="text" id="cp_post_code" name="cp_post_code" /></td>
                    </tr> 
                    <tr>
                        <td >বিভাগ</td>
                        <td>:  <select class="box2" type="text" id="division_id_1" name="c_division_name" onChange="getDistrict1()" />
                            <option value=1>-বিভাগ-</option>
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
                            <option value=1>-বিভাগ-</option>
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
                        <td  colspan="2" style =" padding-left: 300px; font-size: 15px"><b>অভিভাবকের </b></td>                            
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
                        <td >:   <input class="box" type="text" id="g_house" name="g_house" /></td>
                        <td  >বাড়ির নাম / ফ্ল্যাট নং</td>
                        <td >:   <input class="box" type="text" id="gp_house" name="gp_house" /></td>
                    </tr>
                    <tr>
                        <td  >বাড়ি নং</td>
                        <td >:   <input class="box" type="text" id="g_house_no" name="g_house_no" /></td>
                        <td >বাড়ি নং</td>
                        <td>:   <input class="box" type="text" id="gp_house_no" name="gp_house_no" /></td>
                    </tr>
                    <tr>
                        <td >রোড নং</td>
                        <td>:   <input class="box" type="text" id="g_road" name="g_road" /> </td>
                        <td >রোড নং</td>
                        <td>:   <input class="box" type="text" id="gp_road" name="gp_road" /></td>
                    </tr>
                    <tr>
                        <td >পোষ্ট কোড</td>
                        <td>:   <input class="box" type="text" id="g_post_code" name="g_post_code" /></td>
                        <td >পোষ্ট কোড</td>
                        <td>:   <input class="box" type="text" id="gp_post_code" name="gp_post_code" /></td>
                    </tr>
                    <tr>
                        <td >বিভাগ</td>
                        <td>:  <select class="box2" type="text" id="division_id_3" name="g_division_name" onChange="getDistrict3()" />
                            <option value=1>-বিভাগ-</option>
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
                        <td>:  <select class="box2" type="text" id="division_id_4" name="gp_division_name" onChange="getDistrict4()" />
                            <option value=1>-বিভাগ-</option>
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
                        <td  colspan="2" style =" padding-left: 320px; font-size: 15px"><b>নমিনির </b></td>                            
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
                        <td >:   <input class="box" type="text" id="n_house" name="n_house" /></td>
                        <td  >বাড়ির নাম / ফ্ল্যাট নং</td>
                        <td >:   <input class="box" type="text" id="np_house" name="np_house" /></td>
                    </tr>
                    <tr>
                        <td  >বাড়ি নং</td>
                        <td >:   <input class="box" type="text" id="n_house_no" name="n_house_no" /></td>
                        <td >বাড়ি নং</td>
                        <td>:   <input class="box" type="text" id="np_house_no" name="np_house_no" /></td>
                    </tr>
                    <tr>
                        <td >রোড নং</td>
                        <td>:   <input class="box" type="text" id="n_road" name="n_road" /> </td>
                        <td >রোড নং</td>
                        <td>:   <input class="box" type="text" id="np_road" name="np_road" /></td>
                    </tr>
                    <tr>
                        <td >পোষ্ট কোড</td>
                        <td>:   <input class="box" type="text" id="n_post_code" name="n_post_code" /></td>
                        <td >পোষ্ট কোড</td>
                        <td>:   <input class="box" type="text" id="np_post_code" name="np_post_code" /></td>
                    </tr>
                    <tr>
                        <td >বিভাগ</td>
                        <td>:  <select class="box2" type="text" id="division_id_5" name="n_division_name" onChange="getDistrict5()" />
                            <option value=1>-বিভাগ-</option>
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
                        <td>:  <select class="box2" type="text" id="division_id_6" name="np_division_name" onChange="getDistrict6()" />
                            <option value=1>-বিভাগ-</option>
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
                        <td>: <span id="did5"></span></td>
                        <td >জেলা</td>
                        <td>: <span id="did6"></span></td>
                    </tr>                        
                    <tr>
                        <td>উপজেলা / থানা</td>
                        <td>: <span id="tidd5"></span></td>      
                        <td>উপজেলা / থানা</td>
                        <td>: <span id="tidd6"></span></td>
                    </tr>
                    <tr>
                        <td >পোষ্ট অফিস</td>
                        <td>: <span id="pidd5"></span></td> 
                        <td >পোষ্ট অফিস</td>
                        <td>: <span id="pidd6"></span></td> 
                    </tr>
                    <tr>
                        <td  >গ্রাম</td>
                        <td>: <span id="vidd5"></span></td> 
                        <td >গ্রাম </td>
                        <td>: <span id="vidd6"></span></td> 
                    </tr>
                    </tr>
                    <tr>                    
                        <td colspan="4" style="padding-left: 250px; " ><input class="btn" style =" font-size: 12px; " type="submit" name="submit4" value="সেভ করুন" />
                            <input class="btn" style =" font-size: 12px" type="reset" name="reset" value="রিসেট করুন" /></td>                           
                    </tr>      
                </table>
            </form>
        </div>    
    </div>
</div>

