<?php

include_once 'includes/header.php';
?>

<style type="text/css">
    @import "css/bush.css";

    /*System Tree Style*/
    * {margin: 0; padding: 0;}

    .tree ul {
        padding-top: 20px; position: relative;

        transition: all 0.5s;
        -webkit-transition: all 0.5s;
        -moz-transition: all 0.5s;
    }

    .tree li {
        float: left; text-align: center;
        list-style-type: none;
        position: relative;
        padding: 20px 5px 0 5px;
        margin: 0px;	
        transition: all 0.5s;
        -webkit-transition: all 0.5s;
        -moz-transition: all 0.5s;
    }

    /*We will use ::before and ::after to draw the connectors*/

    .tree li::before, .tree li::after{
        content: '';
        position: absolute; top: 0; right: 50%;
        border-top: 1px solid #0D0D0C;
        width: 50%; height: 20px;
    }
    .tree li::after{
        right: auto; left: 50%;
        border-left: 1px solid #0D0D0C;
    }

    /*We need to remove left-right connectors from elements without 
    any siblings*/
    .tree li:only-child::after, .tree li:only-child::before {
        display: none;
    }

    /*Remove space from the top of single children*/
    .tree li:only-child{padding-top: 0;}

    /*Remove left connector from first child and 
    right connector from last child*/
    .tree li:first-child::before, .tree li:last-child::after{
        border: 0 none;
    }
    /*Adding back the vertical connector to the last nodes*/
    .tree li:last-child::before{
        border-right: 1px solid #0D0D0C;
        border-radius: 0 5px 0 0;
        -webkit-border-radius: 0 5px 0 0;
        -moz-border-radius: 0 5px 0 0;
    }
    .tree li:first-child::after{
        border-radius: 5px 0 0 0;
        -webkit-border-radius: 5px 0 0 0;
        -moz-border-radius: 5px 0 0 0;
    }

    /*Time to add downward connectors from parents*/
    .tree ul ul::before{
        content: '';
        position: absolute; top: 0; left: 50%;
        border-left: 1px solid #0D0D0C;
        width: 0; height: 20px;
    }

    .tree li a{
        border: 1px solid #0D0D0C;
        padding: 5px 10px;
        text-decoration: none;
        color: #666;
        font-family: arial, verdana, tahoma;
        font-size: 11px;
        display: inline-block;

        border-radius: 5px;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;

        transition: all 0.5s;
        -webkit-transition: all 0.5s;
        -moz-transition: all 0.5s;
    }

    /*Time for some hover effects*/
    /*We will apply the hover effect the the lineage of the element also*/
    .tree li a:hover, .tree li a:hover+ul li a {
        background: #c8e4f8; color: #000; border: 1px solid #EB81B3;
    }
    /*Connector styles on hover*/
    .tree li a:hover+ul li::after, 
    .tree li a:hover+ul li::before, 
    .tree li a:hover+ul::before, 
    .tree li a:hover+ul ul::before{
        border-color:  #EB81B3;
    }

    /*Thats all. I hope you enjoyed it.
    Thanks :)*/
    .formstyle td{
        padding-left: 5px;
    }    
    .small_table{
        border: 1px solid #666;
    }
    .small_table th{
        background-color: #c8e4f8;
    }
    .small_table td{
        text-align: center;
    }
</style>

<div class="columnSld" style="padding-left: 20px; width: 94%">
    <div class="main_text_box">
        <div style="padding-left: 10px;"><a href="index.php?apps=CA"><b>ফিরে যান</b></a></div>
        <div>           
            <form method="POST" onsubmit="">	
                <table class="formstyle"  style=" width: 100%; margin-left: 10px; margin-right: 10px;">          
                    <tr><th style="text-align: center" colspan="2"><h1>সিস্টেম ট্রী</h1></th></tr>
                    <tr>
                        <td>
                            <table class="small_table" style="width: 20%">
                                <tr>
                                    <td style="background-color: #c8e4f8"><b>রেফারেন্স</b></td>
                                    <td style="background-color: #c8e4f8"><b>একাউন্টের সংখ্যা</b></td>
                                </tr>
                                <tr>
                                    <td>১</td>
                                    <td>২০</td>
                                </tr>
                                <tr>
                                    <td>২</td>
                                    <td>৩০</td>
                                </tr>
                                <tr>
                                    <td>৩</td>
                                    <td>৪০</td>
                                </tr>
                                <tr>
                                    <td>৪</td>
                                    <td>৫০</td>
                                </tr>
                                <tr>
                                    <td>৫</td>
                                    <td>৬০</td>
                                </tr>
                            </table>
                        </td>
                    </tr>    
                    <tr>
                        <td>
                            <div style="width: 900px; overflow-x: auto">
                                <div class="tree" style="width: 2000px">                                
                                    <ul>
                                        <li>
                                            <a href="#">আলিম উল গিয়াস</a>
                                            <ul>
                                                <li>
                                                    <a href="#">রায়হানুর রহমান</a>
                                                </li>
                                                <li>
                                                    <a href="#">রায়হানুর রহমান</a>
                                                    <ul>
                                                        <li>
                                                            <a href="#">রায়হানুর রহমান</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">রায়হানুর রহমান</a>
                                                            <ul>
                                                                <li>
                                                                    <a href="#">রায়হানুর রহমান</a>
                                                                </li>
                                                                <li>
                                                                    <a href="#">রায়হানুর রহমান</a>
                                                                </li>
                                                                <li>
                                                                    <a href="#">রায়হানুর রহমান</a>
                                                                </li>
                                                                <li>
                                                                    <a href="#">রায়হানুর রহমান</a>
                                                                </li>
                                                                <li>
                                                                    <a href="#">রায়হানুর রহমান</a>
                                                                </li>
                                                                <li>
                                                                    <a href="#">রায়হানুর রহমান</a>
                                                                </li>
                                                                <li>
                                                                    <a href="#">রায়হানুর রহমান</a>
                                                                </li>
                                                                <li>
                                                                    <a href="#">রায়হানুর রহমান</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="#">রায়হানুর রহমান</a>
                                                </li>
                                                <li>
                                                    <a href="#">রায়হানুর রহমান</a>
                                                </li>
                                                <li>
                                                    <a href="#">রায়হানুর রহমান</a>
                                                    <ul>
                                                        <li>
                                                            <a href="#">রায়হানুর রহমান</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">রায়হানুর রহমান</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="#">রায়হানুর রহমান</a>
                                                </li>
                                                <li>
                                                    <a href="#">রায়হানুর রহমান</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<?php include_once 'includes/footer.php'; ?>



