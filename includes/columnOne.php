<div class="column1">
    <div class="left_box">
        <div class="top_left_box">
        </div>
        <div class="center_left_box">
            <div class="box_title"><span> হট</span> লিংকস</div>
                    <div class="navbox">
                        <ul class="nav">
                            
                              <?php
                        //$i=0;
                        foreach ($quickLinkList as $key => $value) {
                            if (!isset($_SESSION['Module']) OR $_SESSION['Module'] == '') {
                                $_SESSION['Module'] = $key;
                            }
                            if ($key == $_SESSION['Module']) {
                                echo '<li><a href="' . htmlspecialchars($_SERVER['PHP_SELF']) . '?apps=' . $key . '" class="current">' . $value . '</a></li>';
                                //if($key == 'PK') tourPackages ();
                            } else {
                                echo '<li><a href="' . htmlspecialchars($_SERVER['PHP_SELF']) . '?apps=' . $key . '">' . $value . '</a></li>';
                                //if($key == 'PK') tourPackages ();
                            }
                            //$i++;
                        }
                        ?>
                            
                            		
                        </ul>
                    </div>
        </div>
        <div class="bottom_left_box">
        </div>
    </div> 



    <div class="left_box">
        <div class="top_left_box">
        </div>
        <div class="center_left_box">
            <div class="box_title"><span>সংস্পর্শে </span>থাকুন</div>


            <div class="form">
                <div class="form_row"><label class="left">ইমেইলঃ </label><input type="text" class="form_input"/></div>                    
                <div style="float:right; padding:10px 25px 0 0;">
                    <input type="image" src="images/join.gif"/>
                </div>

            </div>


        </div>
        <div class="bottom_left_box">
        </div>
    </div> 


    <div class="left_box">
        <div class="top_left_box">
        </div>
        <div class="center_left_box">
            <div class="box_title"><span> যোগাযোগের </span>ঠিকানা</div>
            <div class="form">
                <div class="form_row">
                    <img src="images/contact_envelope.gif" width="50" height="47" border="0" class="img_right" alt="" title="" />
                    <div class="contact_information">
                        ইমেইলঃ info@ripduniversal.com<br />
                        টেলিফোনঃ ৯৯৯ ৮৮৮ ২৩<br />
                        মোবাইলঃ +৮৮ ০১৯১৩ ৪৪০ ১৮৫<br />
                        ফ্যাক্সঃ ২৩ ২৩ ২৩<br /><br />
                        <span>www.ripduniversal.com</span>
                    </div>
                </div>                    
            </div>
        </div>
        <div class="bottom_left_box">
        </div>
    </div>  

    <div class="left_box">
        <div class="top_left_box">
        </div>
        <div class="center_left_box">
            <div class="box_title"><span>সাইটটি </span>দেখা হয়েছে</div>


            <div class="form">
                <div class="form_row">

                    <div class="visitor_information">
                        <span>
                            <?php
                            include ("counter.php");
                            ?>   
                        </span>
                        <span>বার</span>
                    </div>
                </div>                    
            </div>


        </div>
        <div class="bottom_left_box">


        </div>
    </div> 

    <div class="left_box">
        <div class="top_left_box">
        </div>
        <div class="center_left_box">
            <div class="box_title"><span> সাইট </span>ভিজিটর</div>


            <div class="form">
                <div class="form_row">
                    <div class="flag_information">
                        <!-- BEGIN: Powered by Supercounters.com -->
                        <center><script type="text/javascript" src="http://widget.supercounters.com/flag.js"></script><script type="text/javascript">sc_flag(508483,"FFFFFF","000000","cccccc",2,10,0,0)</script><br><noscript><a href="http://www.comfosys.com/">Flag Counter</a></noscript>
                        </center>
                        <!-- END: Powered by Supercounters.com -->
                    </div>
                </div>                    
            </div>
        </div>
        <div class="bottom_left_box">
        </div>
    </div>  
</div>