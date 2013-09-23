<?php
error_reporting(0); 
include_once 'includes/ConnectDB.inc';
include_once 'includes/function.php';
include_once 'includes/header.php'; 
?>
<style type="text/css">
    @import "css/style.css";
</style>
<script type="text/javascript" src="javascripts/area.js"></script>
        <script type="text/javascript" src="javascripts/external/mootools.js"></script>
        <script type="text/javascript" src="javascripts/dg-filter.js"></script>

<script type="text/javascript">
    function infoFromThana()
    {
        var xmlhttp;
        if (window.XMLHttpRequest) xmlhttp=new XMLHttpRequest();
        else xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200) 
                document.getElementById('office').innerHTML=xmlhttp.responseText;
        }
        var division_id, district_id, thana_id;
        division_id = document.getElementById('division_id').value;
        district_id = document.getElementById('district_id').value;
        thana_id = document.getElementById('thana_id').value;
        xmlhttp.open("GET","includes/updateOfficeFromThana.php?dsd="+district_id+"&dvd="+division_id+"&ttid="+thana_id,true);
        xmlhttp.send();
    }
</script>
<div class="column6">
    <div class="main_text_box">      
        <div style="padding-left: 110px;"><a href="index.php?apps=OSP"><b>ফিরে যান</b></a></br></br>
        <div style="border: 1px solid grey;">
            <table  style=" width: 100%; margin-bottom: 10px;" > 
                    <tr><th style="text-align: center; background-image: radial-gradient(circle farthest-corner at center top , #FFFFFF 0%, #0883FF 100%);height: 45px;padding-bottom: 5px;padding-top: 5px;" colspan="2" ><h1>আপডেট অফিস ইনফরমেশন</h1></th></tr>
            </table>
            <fieldset id="fieldset_style" style=" width: 90% !important; margin-left: 30px !important;" >
                <?php
                    include_once 'includes/areaSearch.php';
                    getArea("infoFromThana()");
                    ?>

    <input type="hidden" id="method" value="infoFromThana()">

    সার্চ/খুঁজুন:  <input type="text" id="search_box_filter">

    <span id="office">
        <br /><br />
        <div>
            <table id="office_info_filter" border="1" align="center" width= 99%" cellpadding="5px" cellspacing="0px">
                <thead>
                    <tr align="left" id="table_row_odd">
                        <th><?php echo "অফিসের নাম"; ?></th>
                        <th><?php echo " অফিসের নাম্বার"; ?></th>
                        <th><?php echo "অফিসের অ্যাকাউন্ট নাম্বার"; ?></th>
                        <th><?php echo "অফিসের ঠিকানা"; ?></th>
                        <th><?php echo "করনীয়"; ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                    $sql_officeTable = "SELECT * from ".$dbname.".office ORDER BY office_name ASC";
                    $db_slNo = 0;
                    $rs = mysql_query($sql_officeTable);

                    while ($row_officeNcontact = mysql_fetch_assoc($rs)) 
                    {
                        $db_slNo = $db_slNo + 1;
                        $db_offName = $row_officeNcontact['office_name'];
                        $db_offNumber = $row_officeNcontact['office_number'];
                        $db_offAN = $row_officeNcontact['account_number'];
                        $db_offAddress = $row_officeNcontact['office_details_address'];
                        $db_offID = $row_officeNcontact['idOffice'];
                        echo "<tr>";
                        echo "<td>$db_offName</td>";
                        echo "<td>$db_offNumber</td>";
                        echo "<td>$db_offAN</td>";
                        echo "<td>$db_offAddress</td>";
                        $v = base64_encode($db_offID);
                        echo "<td><a href='update_account.php?id=$v'>আপডেট</a></td>";
                        echo "</tr>";
                    }
                    ?>

                </tbody>
            </table>                        
        </div>
    </span>          
</fieldset>
        </div>
            </div>
    </div>
</div>

<script type="text/javascript">
    var filter = new DG.Filter({
        filterField : $('search_box_filter'),
        filterEl : $('office_info_filter')
    });
</script>
<?php include_once 'includes/footer.php'; ?>
