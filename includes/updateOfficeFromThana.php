<?php
            include 'getSelectedThana.php';
?>

    <span id="office">
        <br /><br />
        <div>
            <table id="office_info_filter" border="1" align="center" width= 100%" cellpadding="5px" cellspacing="0px">
                <thead>
                    <tr align="left" id="table_row_odd">
                        <th><?php echo "অফিসের নাম"; ?></th>
                        <th><?php echo "অফিসের নাম্বার"; ?></th>
                        <th><?php echo "অফিসের অ্যাকাউন্ট নাম্বার"; ?></th>
                        <th><?php echo "অফিসের ঠিকানা"; ?></th>
                        <th><?php echo "করনীয়"; ?></th>
                    </tr>
                </thead>
                <tbody>                    
                    <?php
                    $joinArray = implode(',', $arr_thanaID);
                    $sql_officeTable = "SELECT * from ".$dbname.".office WHERE Thana_idThana IN ($joinArray) ORDER BY office_name ASC";
                    $rs = mysql_query($sql_officeTable);

                    //echo mysql_num_rows($rs);
                    while ($row_officeNcontact = mysql_fetch_array($rs)) {
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