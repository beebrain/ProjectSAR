<nav class="navbar-default navbar-side" role="navigation">
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li >
                    <div >
                        <?php
                        $user_data = $this->session->userdata('user_data');
                        ?>
                        <p style="text-align: center"><image  src=" <?php echo base_url("assets/img/logouru2011.png"); ?>"/><br><?php echo "ผู้รับการประเมิน<br>" . $user_data["detail"] ?></p> 
                    </div>
                    <!-- /input-group -->
                </li>

                <li>
                    <a href="<?php echo base_url("index.php/UserPanel/master_sar_All"); ?>"> <i class="fa fa-calendar-o fa-fw"></i>เลือกชุดการประเมิน</a>
                </li>
                <li>
                    <a href="<?php echo base_url("index.php/UserManageDoc/ShowManageDoc"); ?>"> <i class="fa fa-list-alt fa-fw"></i>จัดการเอกสารหลักฐานการประเมิน</a>
                </li> 
                <li>
                    <a href="<?php echo base_url("index.php/UserPanel/report"); ?>"> <i class="fa fa-file-text-o fa-fw"></i>รายงานการประเมิน</a>
                </li> 
                <li>
                    <a href="<?php echo base_url("index.php/UserPanel/changePass"); ?>"> <i class="fa fa-barcode fa-fw"></i>เปลี่ยนรหัสผ่าน</a>
                </li>
                <li>
                    <a href="<?php echo base_url("index.php/UserControl/logoutProcess"); ?>"> <i class="fa fa-sign-out fa-fw"></i>ออกจากระบบ</a>
                </li> 

            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->

</nav>  