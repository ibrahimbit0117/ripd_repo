<?php
error_reporting(0);
include_once 'includes/MiscFunctions.php';
include 'includes/db.php';
include 'includes/ConnectDB.inc';
include 'includes/header.php';

if (isset($_POST['submit'])) {

    $pro_typeid = $_POST['product_type'];
    $pro_classification = $_POST['pro_classification'];
    $pro_productname = $_POST['pro_productname'];
    $pro_article = $_POST['pro_article'];
    $pro_guarantee = $_POST['pro_guarantee'];
    $pro_warantee = $_POST['pro_warantee'];
    $pro_companyname = $_POST['pro_companyname'];
    $pro_madein = $_POST['pro_madein'];
    $prounit_name = $_POST['prounit_name'];

    $allowedExts = array("gif", "jpeg", "jpg", "png", "JPG", "JPEG", "GIF", "PNG");
    $extension = end(explode(".", $_FILES["image"]["name"]));
    $image_name = "picture" . "_" . $_FILES["image"]["name"];
    $image_path = "pic/" . $image_name;
    if (($_FILES["image"]["size"] < 999999999999) && in_array($extension, $allowedExts)) {
        move_uploaded_file($_FILES["image"]["tmp_name"], "pic/" . $image_name);
    }
    $product_cat_sql = mysql_query("SELECT pro_cat_code FROM $dbname.product_catagory where idproduct_catagory='$pro_typeid'");
    $product_cat_row = mysql_fetch_assoc($product_cat_sql);
    $pro_cat_code = $product_cat_row['pro_cat_code'];

    $product_type_sql = mysql_query("SELECT pro_type_code FROM $dbname.product_catagory where idproduct_catagory='$pro_typeid'");
    $product_type_row = mysql_fetch_assoc($product_type_sql);
    $pro_type_code = $product_type_row['pro_type_code'];

    $product_chart_sql = mysql_query("SELECT idproductchart FROM $dbname.product_chart where product_catagory_idproduct_catagory='$pro_typeid'");
    $pchart_id = mysql_fetch_array($product_chart_sql);
    $prounit_userid = $pchart_id['idproductchart'];
    $brand_name = $_POST['product_brand_name'];
    $brand_input = $_POST['new_brand'];

    $_POST['product_brand_name'];
    if ($brand_name == '0') {
        $sql_brand_code = mysql_query("SELECT max( pro_brnd_or_grp_code ) FROM product_chart");
        $brand_code_row = mysql_fetch_assoc($sql_brand_code);
        if ($brand_code_row['max( pro_brnd_or_grp_code )'] >= 100 && $brand_code_row['max( pro_brnd_or_grp_code )'] < 999) {
            $brand_code = $brand_code_row['max( pro_brnd_or_grp_code )'] + 1;
        } else {
            $brand_code = '100';
        }
        $classification_code = '100';
        $pro_code = $pro_cat_code . '-' . $pro_type_code . '-' . $brand_code . '-' . $classification_code;
        $pro_brand_or_grp = $_POST['new_brand'];
        if ($_POST['pro_unit'] == '0') {
            $pro_unit = $_POST['new_unit'];
            $sql_product_insert = mysql_query("INSERT INTO $dbname.product_chart 
                                    (pro_brand_or_grp, pro_classification, pro_unit, pro_brnd_or_grp_code,pro_classification_code, pro_code, pro_productname, pro_article, pro_guarantee, pro_warantee, pro_companyname, pro_madein, pro_picture, product_catagory_idproduct_catagory)
                                     VALUES  ('$pro_brand_or_grp', '$pro_classification', '$pro_unit', '$brand_code', '$classification_code', '$pro_code', '$pro_productname', '$pro_article','$pro_guarantee', '$pro_warantee', '$pro_companyname', '$pro_madein','$image_path', '$pro_typeid')") or exit('query failed: ' . mysql_error());
            $sql_product_unit = mysql_query("INSERT INTO $dbname.product_unit 
                                    (prounit_name, prounit_insertdate, prounit_userid)
                                     VALUES  ('$pro_unit', NOW(),'$prounit_userid')") or exit('query failed: ' . mysql_error());
        } else {
            $pro_unit = $_POST['pro_unit'];
            $sql_product_insert = mysql_query("INSERT INTO $dbname.product_chart (pro_brand_or_grp, pro_classification, pro_unit,pro_brnd_or_grp_code, pro_classification_code, pro_code,pro_productname, pro_article, pro_guarantee, pro_warantee, pro_companyname, pro_madein, pro_picture,product_catagory_idproduct_catagory)
                                     VALUES  ('$pro_brand_or_grp', '$pro_classification', '$pro_unit', '$brand_code','$classification_code', '$pro_code','$pro_productname', '$pro_article','$pro_guarantee', '$pro_warantee', '$pro_companyname', '$pro_madein','$image_path',  '$pro_typeid')");
        }
    } else {
        $pro_brand_or_grp = $_POST['product_brand_name'];
        $sql_select = mysql_query("Select pro_brnd_or_grp_code  from $dbname.product_chart where pro_brand_or_grp ='$pro_brand_or_grp' ") or exit('query failed: ' . mysql_error());
        $product_result = mysql_fetch_assoc($sql_select);
        $pro_brand_code = $product_result['pro_brnd_or_grp_code'];

        $sql_classification_code = mysql_query("SELECT max( pro_classification_code ) FROM product_chart where pro_brnd_or_grp_code = '$pro_brand_code' ");
        $classification_code_row = mysql_fetch_assoc($sql_classification_code);
        if ($classification_code_row['max( pro_classification_code )'] >= 100 && $classification_code_row['max( pro_classification_code )'] < 999) {
            $classification_code = $classification_code_row['max( pro_classification_code )'] + 1;
        }
        $pro_code = $pro_cat_code . '-' . $pro_type_code . '-' . $pro_brand_code . '-' . $classification_code;
        if ($_POST['pro_unit'] == '0') {
            $pro_unit = $_POST['new_unit'];
            $sql_product_insert = mysql_query("INSERT INTO $dbname.product_chart 
                                    (pro_brand_or_grp, pro_classification, pro_unit,pro_brnd_or_grp_code,pro_classification_code, pro_code,pro_productname, pro_article, pro_guarantee, pro_warantee, pro_companyname, pro_madein, pro_picture,product_catagory_idproduct_catagory)
                                     VALUES  ('$pro_brand_or_grp', '$pro_classification', '$pro_unit','$pro_brand_code','$classification_code', '$pro_code','$pro_productname', '$pro_article','$pro_guarantee', '$pro_warantee', '$pro_companyname', '$pro_madein','$image_path',  '$pro_typeid');") or exit('query failed: ' . mysql_error());

            $sql_product_unit = mysql_query("INSERT INTO $dbname.product_unit 
                                    (prounit_name, prounit_insertdate, prounit_userid)
                                     VALUES  ('$pro_unit', NOW(),'$prounit_userid')") or exit('query failed: ' . mysql_error());
        } else {
            $pro_unit = $_POST['pro_unit'];
            $sql_product_insert = mysql_query("INSERT INTO $dbname.product_chart 
                                    (pro_brand_or_grp, pro_classification, pro_unit,pro_brnd_or_grp_code, pro_classification_code, pro_code,pro_productname, pro_article, pro_guarantee, pro_warantee, pro_companyname, pro_madein,pro_picture, product_catagory_idproduct_catagory)
                                     VALUES  ('$pro_brand_or_grp', '$pro_classification', '$pro_unit', '$pro_brand_code','$classification_code', '$pro_code','$pro_productname', '$pro_article','$pro_guarantee', '$pro_warantee', '$pro_companyname', '$pro_madein','$image_path',  '$pro_typeid')");
        }
    }

    if ($sql_product_insert || $sql_product_unit) {
        $msg = "তথ্য সংরক্ষিত হয়েছে";
    } else {
        $msg = "ভুল হয়েছে";
    }
}
?>
<style type="text/css">
    @import "css/bush.css";
</style>
<script type="text/javascript">
    function isfillinput()
    {
        $('#pro_unit').blur(function(){
            if($(this).val().length != 0){
                $('#new_unit').attr('disabled', 'disabled');
            }       
        });
    }
</script>
<script type="text/javascript" src="javascripts/product.js"></script>
<div class="columnSld" style=" padding-left: 50px;">
    <div class="main_text_box">
        <div style="padding-left: 162px;"><a href="index.php?apps=PROD"><b>ফিরে যান</b></a><a style="padding-left: 252px;" href="make_product_introduce.php"><b>মেইক প্রোডাক্ট ক্যাটাগরি এন্ড টাইপ</b></a></div>
        <div>           
            <form method="POST" onsubmit ="" style=" padding-left: 50px;"enctype="multipart/form-data" action="" id="product_form" name="product_form">	
                <table class="formstyle"  style=" width:520px; ">          
                    <tr><th style="text-align: center" colspan="3"><h1>প্রোডাক্ট ইন</h1>
                    </th>
                    </tr>
                    <tr><td colspan="6"></td>
                    </tr>  
                    <?php
                    if ($msg != "") {
                        echo '<tr><td ></td><td colspan="4" style="text-allign: center; color: green; font-size: 15px;padding-left: 65px;"><b>' . $msg . '</b></td></tr>';
                    }
                    ?>                   
                    <tr>
                        <td>প্রোডাক্ট ক্যাটাগরি</td>
                        <td>: <select class="box2" type="text" id="product_id" name="product" style="width: 150px;" onchange="getproduct_type() " />
                    <option value='' selected="selected">- প্রোডাক্ট ক্যাটাগরি -</option>
                    <?php
                    $product_cat_sql = mysql_query("SELECT DISTINCT pro_catagory, pro_cat_code FROM $dbname.product_catagory");
                    while ($product_cat_rows = mysql_fetch_array($product_cat_sql)) {
                        $db_product_cat_code = $product_cat_rows['pro_cat_code'];
                        $db_product_cat_name = $product_cat_rows['pro_catagory'];
                        echo "<option style='width: 96%' value='$db_product_cat_code'>$db_product_cat_name</option>";
                    }
                    ?>
                    </select></td> 
                    </tr>                  
                    <tr>
                        <td>প্রোডাক্ট টাইপ</td>
                        <td>: <span id="pcid"></span></td>
                    </tr>
                    <tr>
                        <td>ব্র্যান্ড/গ্রুপ</td>
                        <td id="pttid"></td>
                    </tr>
                    <tr>
                        <td>প্রকার</td>
                        <td id="pttid2"></td>
                    </tr>

                    <tr>
                        <td>একক</td>
                        <td>: 
                            <?php
                            $product_unit_sql = mysql_query("SELECT DISTINCT prounit_name FROM  $dbname.product_unit");
                            echo "<select  class='box2' style = 'border: 1px gray inset;width: 150px;' name='pro_unit' id='pro_unit'>
                    <option value= '0'>- একক -</option>";
                            while ($product_unit_rows = mysql_fetch_array($product_unit_sql)) {
                                $db_product_unit_name = $product_unit_rows['prounit_name'];
                                echo "<option style='width: 96%' value='$db_product_unit_name'>$db_product_unit_name</option>";
                            }
                            echo '</select>
                            অথবা <input class="box" type="text" id="new_unit" name="new_unit" />';
                            ?>      
                        </td>
                    </tr>           
                    <tr>
                        <td>প্রোডাক্ট নেইম</td>
                        <td>:   <input class="box" type="text" id="pro_productname" name="pro_productname" /></td>
                    </tr>
                    <tr>
                        <td >আটিকেল</td>
                        <td>:   <input class="box" type="text" id="pro_article" name="pro_article" /> </td>                          
                    </tr>
                    <tr>
                        <td>গ্যারান্টি</td>
                        <td>:    <input  class="box" type="text" id="pro_guarantee" name="pro_guarantee" /></td>            
                    </tr>
                    <tr>
                        <td>ওয়ারেন্টি</td>
                        <td>:    <input  class="box" type="text" id="pro_warantee" name="pro_warantee" /></td>            
                    </tr>
                    <tr>
                        <td>তৈরীকৃত প্রতিষ্ঠানের নাম </td>
                        <td>:    <input  class="box" type="text" id="pro_companyname" name="pro_companyname" /></td>            
                    </tr>
                    <tr>
                        <td> মেড ইন</td>
                        <td>:    <input  class="box" type="text" id="pro_madein" name="pro_madein" /></td>            
                    </tr>        
                    <tr>
                        <td >প্রোডাক্টের ছবি </td> 
                        <td>:<input class="filefield" type="file" id="image" name="image" /></td>
                    </tr>
                    <tr>                    
                        <td colspan="4" style="padding-top: 10px; padding-left: 160px;padding-bottom: 5px; " ><input class="btn" style =" font-size: 12px; " type="submit" name="submit" value="সেভ করুন" />
                            <input class="btn" style =" font-size: 12px" type="reset" name="reset" value="রিসেট করুন" />
                        </td>                           
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>   
<?php
include 'includes/footer.php';
?>