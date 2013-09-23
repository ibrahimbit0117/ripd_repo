<?php
error_reporting(0);
include_once 'includes/MiscFunctions.php';
include 'includes/db.php';
include 'includes/ConnectDB.inc';
include 'includes/header.php';
if(isset($_POST['submit_ticket']))
{
    $msg = " টিকেটটি সফলভাবে তৈরি হয়েছে " ;
}

if(isset($_POST['submit']))
{
    $place=$_POST['place'];
    $t_prize=$_POST['ticket_prize'];
    $m_prize=$_POST['making_prize'];
    $seat=$_POST['number_of_seat'];
    $xtra_seat=$_POST['extra_seat'];
    $programID=$_POST['programID'];
    $programname=$_POST['programName'];
    $date=$_POST['programDate'];
    $time=$_POST['programTime'];
    $employee_name=$_POST['emp_name'];
    $employee_mail = $_POST['emp_mail'];
    $type = $_POST['type'];
    
    $pupsql = "UPDATE `program` SET `program_location` = '$place',`total_seat` = '$seat',`extra_seat` = '$xtra_seat', `ticket_prize` = '$t_prize', `making_charge`=$m_prize WHERE `program`.`idprogram` = '$programID' ;";
    $pusresult=mysql_query($pupsql) or exit('query failed: '.mysql_error());
}
?>
<style type="text/css">
    @import "css/bush.css";
</style>
<script  type="text/javascript">
    function getname(type)
    {
        var xmlhttp;
        if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        }
        else
        {// code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById('p_name').innerHTML=xmlhttp.responseText;
                
            }
        }
        xmlhttp.open("GET","includes/getPresentations.php?t="+type,true);
        xmlhttp.send();
    }
    
    function getall(val)
    {
        var xmlhttp;
        if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        }
        else
        {// code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById('pall').innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","includes/getPresentations.php?v="+val,true);
        xmlhttp.send();
    }
     
</script>
<?php
if($_GET['step']=='02')
    {
?>
<div class="column6">
        <div class="main_text_box">
            <div style="padding-left: 110px;"><a href="making_ticket.php"><b>ফিরে যান</b></a></div> 
            <div>
                <form method="POST" onsubmit="" >	
                    <table  class="formstyle" style="color: #3333CC; font-weight:600;">          
                        <tr><th colspan="4" style="text-align: center;">টিকেট মেইকিং </th></tr>
                        <tr><td style="text-align: center"><span style="color: green;font-size: 15px;"><?php if($msg != '') {echo $msg;}?></span></td></tr>
                        <tr>
                            <td>টিকেট প্রাইজঃ <span style="color: black;"><?php echo $t_prize;?> TK /Ticket</span></td>
                        </tr>
                        <tr>
                            <td>টিকেট মেইকিং চার্জঃ <span style="color: black;"><?php echo $m_prize;?> TK/Ticket</span></td>
                        </tr>
                        <tr>
                            <td>মোট আসন সংখ্যাঃ <span style="color: black;"><?php echo $seat;?></span></td>
                        </tr>
                        <tr>
                            <td>অতিরিক্ত আসন সংখ্যাঃ <span style="color: black;"><?php echo $xtra_seat;?></span></td>
                        </tr>
                        <tr>  
                            <td colspan="2" style="padding-left: 0;">
                                <div id="front" style="width: 768px; height: 384px; border: blue dashed 2px; margin: 0 auto;background-image: url(images/watermark.png);background-repeat: no-repeat;background-size:100% 100%; ">
                                    <div id="front_left" style="width: 192px; height: 384px;border-right:blue dotted 1px; float: left;">
                                         <div style="width: 180px; float: left;padding-left: 4px;text-align: center;"><span style="font-family: SolaimanLipi;color: #3333CC;font-size: 20px;"><span style="color: black;"><?php echo $programname;?></span></span></div>
                                         <div id="entry" style="width: 180px;float:left;padding-top: 5px;text-align: center;"><span style="font-family: SolaimanLipi;color: #3333CC;font-size: 20px;">এন্ট্রি পাস</span></div>
                                          <div id="owner_info" style="width: 180px; float: left;padding-left: 4px;padding-top: 10px;">
                                            <span>স্বত্তাধিকারীর নামঃ </span></br>
                                            <span>স্বত্তাধিকারীর মোবাইল নাম্বারঃ </span></br>
                                            <span style="text-align: right;">আসন নাম্বারঃ ০০</span></br>
                                            <span>তারিখঃ <span style="color: black;"><?php echo $date;?></span></span></br><span>সময়ঃ <span style="color: black;"><?php echo $time;?></span></span>
                                            </div>
                                    </div>
                                    <div id="front_ri8" style="width: 574px; height: 384px; float: left;">
                                       <div id="logo" style="width: 80px;height: 80px;float: left;background-image: url(images/logo.png);background-repeat: no-repeat;background-size:100% 80px;"><image /></div>
                                        <div style="width: 450px;height: 80px;float: left;padding-left: 9px;">
                                            <div><span style="font-family: SolaimanLipi;color: #3333CC;font-size: 35px;">রিপড ইউনিভার্সাল</span><span style="font-family: SolaimanLipi;color: #3333CC;font-size: 20px;"> লিমিটেড</span></div>
                                            <div><span style="font-family: SolaimanLipi;color: #8A8B8C;font-size: 20px;">রিলীভ এন্ড ইমপ্রুভমেন্ট প্ল্যান অব ডেপ্রাইভড</span></div>
                                        </div>
                                       <div style="width: 570px; float: left;padding-left: 4px;text-align: center;"><span style="font-family: SolaimanLipi;color: #3333CC;font-size: 20px;"><span style="color: black;"><?php echo $programname;?></span></span></div>
                                        <div id="front_info" style="width: 570px; float: left;padding-left: 4px;">
                                            <span><?php if ($type==1) echo "প্রেজেন্টারের নামঃ "; elseif ($type==2) echo "প্রোগ্রামারের নামঃ "; elseif($type==3) echo "ট্রেইনারের নামঃ "; else { echo "ট্রাভেলারের নামঃ ";}?> <span style="color: black;"><?php echo $employee_name;?></span></span></br>
                                            <span><?php if ($type==1) echo "প্রেজেন্টারের ই-মেইলঃ "; elseif ($type==2) echo "প্রোগ্রামারের ই-মেইলঃ "; elseif($type==3) echo "ট্রেইনারের ই-মেইলঃ "; else { echo "ট্রাভেলারের ই-মেইলঃ ";}?><span style="color: black;"><?php echo $employee_mail;?></span></span></br>
                                            <span>স্থানঃ <span style="color: black;"><?php echo $place;?></span></span></br>
                                            <span>তারিখঃ <span style="color: black;"><?php echo $date;?></span></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>সময়ঃ <span style="color: black;"><?php echo $time;?></span></span>
                                        </div>
                                        <div id="entry" style="width: 574px;float:left;padding-top: 5px;text-align: center;"><span style="font-family: SolaimanLipi;color: #3333CC;font-size: 20px;">এন্ট্রি পাস</span></div>
                                        <div id="owner_info" style="width: 570px; float: left;padding-left: 4px;">
                                            <span>স্বত্তাধিকারীর নামঃ </span></br>
                                            <span>স্বত্তাধিকারীর মোবাইল নাম্বারঃ </span></br>
                                            <span style="text-align: right;">আসন নাম্বারঃ ০০</span></br>
                                            </div>
                                    </div>
                                </div>
                            </td>
                        </tr>        
                        <tr>  
                            <td colspan="2" style="padding-left: 0;">
                                <div id="back" style="width: 768px; height: 384px;  border: blue dashed 2px;background-color: #fff; margin: 0 auto;">
                                    <div id="back_ri8" style="width: 574px; height: 384px; float: left;border-right: blue dotted 1px;">
                                        <div id="back_head" style="text-align: center;padding-top: 10px;">
                                        <span style="font-family: SolaimanLipi;color: #3333CC;font-size: 20px;"> কার্যবিবরণী</span>
                                        </div>
                                        </div>
                                </div>
                            </td>
                        </tr>        
                        <tr>                    
                            <td colspan="2" style="padding-left: 300px; " ></br><input class="btn" style =" font-size: 12px; " type="submit" name="submit_ticket" value="ঠিক আছে" /></td>                           
                        </tr>    
                    </table>
                </form>
            </div>
        </div>      
    </div>
<?php
} else {
    ?>
<div class="column6">
    <div class="main_text_box">
        <div style="padding-left: 110px;"><a href="index.php?apps=PROGRA"><b>ফিরে যান</b></a></div> 
        <div>
            <form method="POST" onsubmit="" action="making_ticket.php?step=02">	
                <table  class="formstyle">          
                    <tr><th colspan="4" style="text-align: center;">টিকেট মেইকিং</th></tr>
                    <tr>
                        <td colspan="2"><?php if($msg!=""){echo $msg; } ?></td>
                    </tr>
                    <tr>
                        <td style="width: 40%">বিষয়</td>
                        <td>: 
                            <select class="selectOption" name="type" id="type" onchange="getname(this.value)" style="width: 167px !important;">
                                <option value=" ">----টাইপ সিলেক্ট করুন-----</option>
                                <option value="1">প্রেজেন্টেশন</option>
                                <option value="2">প্রোগ্রাম</option>
                                <option value="3">ট্রেইনিং</option>
                                <option value="4">ট্রাভেল</option>
                            </select>  
                        </td>      
                    </tr>         
                    <tr>
                        <td>প্রেজেন্টেশন / প্রোগ্রাম / ট্রেইনিং / ট্রাভেল এর নাম</td>
                        <td>:  <span id="p_name"></span> </td>
                    </tr>
                    <tr>
                        <td colspan="2" id="pall">
                        </td>
                    </tr>
                    <tr>
                        <td>স্থান</td>
                        <td>:    <input  class="box" type="text" id="place" name="place" /></td>            
                    </tr>
                    <tr>
                        <td>টিকেট প্রাইজ</td>
                        <td>:    <input  class="box" type="text" id="ticket_prize" name="ticket_prize" />TK/ Ticket<em> (ইংরেজিতে লিখুন)</em></td>            
                    </tr>
                    <tr>
                        <td>টিকেট মেইকিং চার্জ</td>
                        <td>:    <input  class="box" type="text" id="making_prize" name="making_prize" />TK/ Ticket<em> (ইংরেজিতে লিখুন)</em></td>            
                    </tr>
                    <tr>
                        <td>আসন সংখ্যা </td>
                        <td>:    <input  class="box" type="text" id="number_of_seat" name="number_of_seat" /><em> (ইংরেজিতে লিখুন)</em></td>           
                    </tr>
                    <tr>
                        <td>অতিরিক্ত আসন সংখ্যা </td>
                        <td>:    <input  class="box" type="text" id="extra_seat" name="extra_seat" /><em> (ইংরেজিতে লিখুন)</em></td>
                    </tr>                       
                    <tr>                    
                        <td colspan="2" style="padding-left: 300px; padding-top: 10px; " ><input class="btn" style =" font-size: 12px; " type="submit" name="submit" value="সেভ করুন" /></td>
                    </tr>    
                </table>
            </form>
        </div>
    </div>      
</div>
<?php
}
?>
<?php
include 'includes/footer.php';
?>