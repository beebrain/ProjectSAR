<nav class="navbar-default navbar-side" role="navigation">
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                    <div class="input-group custom-search-form">
                        <?php
                        $ref_data = $this->session->userdata('ref_data') ;
                        ?>
                        <p style="text-align: center"><image  src=" <?php echo base_url("assets/img/logouru2011.png"); ?>"/><br><?php echo  $ref_data["detail"] ?></p> 
                    </div>
                    <!-- /input-group -->
                </li>

                <li>
                    <a href="<?php echo base_url("index.php/RefPanel/showMaster"); ?>"> <i class="fa fa-bar-chart-o fa-fw"></i>เลือกชุดการประเมิน</a>
                </li>
                <li>
                    <a href="<?php echo base_url("index.php/RefPanel/ShowManageDoc"); ?>"> <i class="fa fa-bar-chart-o fa-fw"></i>จัดการเอกสารหลักฐานการประเมิน</a>
                </li> 
                <li>
                    <a href="<?php echo base_url("index.php/RefPanel/MasToLevel"); ?>"> <i class="fa fa-bar-chart-o fa-fw"></i>แก้ไขข้อมูลส่วนตัว</a>
                </li> 
                <li>
                    <a href="<?php echo base_url("index.php/RefPanel/MasToLevel"); ?>"> <i class="fa fa-bar-chart-o fa-fw"></i>ออกจากระบบ</a>
                </li> 

            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->

</nav>  