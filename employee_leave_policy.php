<?php
include_once 'includes/MiscFunctions.php';
include 'includes/db.php';
include 'includes/ConnectDB.inc';
include 'includes/header.php';
include_once 'includes/function.php';
error_reporting(0);
?>
<style type="text/css">
    @import "css/bush.css";
</style>
<div class="column6">
    <div class="main_text_box">    
        <div style="padding-top: 10px;padding-left: 110px; "><a href="index.php?apps=HRE"><b>ফিরে যান</b></a></div>
    <div>
        <form method="POST" onsubmit="">	
            <table  class="formstyle" style =" width:78%"id="make_presentation_fillter">                   
                    <tr>
                        <th colspan="8" >সেলিমের ছুটি গণনা</th>                        
                    </tr>          
                    <tr>
                        <td colspan="8" style="text-align: right">খুঁজুন:  <input type="text" class="box"id="search_filter" name="search" /></td>
                    </tr>                  
                    <tr>                
                    </tr>
                    <tr>
                        <td >ছুটির টাইপ</td>
                        <td>:  <select class="textfield" name="month" style =" font-size: 11px">
                                <option >টাইপ</option>
                                <option value="1">সাধারণ ছুটি</option>
                                <option value="2">সরকারী ছুটি</option>
                            </select></td>
                            <td rowspan='4'> <img src="images/iftee.jpg" width="128px" height="128px" alt="bush"></td> 	 
                    </tr>  
                    <tr>
                        <td >ছুটি শুরুর তারিখ</td>
                        <td>:  <input class="box" type="text" id="prop_father_name" name="prop_father_name" /></td>	  
                    </tr>  
                    <tr>
                        <td >ছুটির দিনের সংখ্যা</td>
                        <td>:  <input class="box" type="text" id="prop_father_name" name="prop_father_name" /></td>	  
                    </tr>  
                    <tr>
                        <td >বর্ণনা</td>
                        <td>&nbsp;  <textarea class="box" type="text" id="prop_father_name" name="prop_father_name"></textarea></td>
                    </tr> 
                    <tr>
                        <td >স্ক্যান ডকুমেন্টস</td>
                        <td>:   <input class="box" type="file" id="scanDoc_picture" name="scanDoc_picture" style="font-size:10px;"/></td>	 
                        <td>সেলিম খান</td>
                    </tr>     
                    <tr>
                        <td></td>
                        <td></td>
                        <td >ম্যানেজার</td>
                    </tr>    
                    <tr>
                        <td></td>
                        <td></td>
                        <td >০১৯১১৫৪৯৬৭৭</td>
                    </tr>                 
            </table>
        </form>
    </div>
    </div>
</div>
<?php include_once 'includes/footer.php'; ?>