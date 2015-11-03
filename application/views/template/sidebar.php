<nav class="navbar-default navbar-side" role="navigation">
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                    <div class="input-group custom-search-form">
                        <p style="text-align: center"><image  src=" <?php echo base_url("assets/img/logouru2011.png"); ?>"/>มหาวิทยาลัยราชภัฏอุตรดิตถ์</p> 
                    </div>
                    <!-- /input-group -->
                </li>

                <li>
                    <a href="<?php echo base_url("index.php/AdminPanel/ShowMaster"); ?>"> <i class="fa fa-calendar-o fa-fw"></i> สร้างหัวข้อองค์ประเมิณ</a>
                </li>
                <li>
                    <a href="<?php echo base_url("index.php/AdminPanel/MasToLevel"); ?>"> <i class="fa fa-list-alt fa-fw"></i> ควบคุมองค์ประเมิณ</a>
                </li> 


                <li>
                    <a href="<?php echo base_url("index.php/AdminControl/ShowAllUser"); ?>"><i class="fa fa-file-text-o fa-fw"></i> จัดการรายชื่อผู้รับการประเมิณ</a>
                </li>
                <li>
                    <a href="<?php echo base_url("index.php/AdminControl/ShowAllRef"); ?>"><i class="fa fa-file-text-o fa-fw"></i> จัดการรายชื่อผู้ประเมิณ</a>
                </li>
                <li>
                    <a href="<?php echo base_url("index.php/AdminControl/logoutProcess"); ?>"><i class="fa fa-sign-out fa-fw"></i> ออกจากระบบ</a>
                </li>

            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->

</nav>  