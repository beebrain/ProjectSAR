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
                    <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>จัดการองค์ประเมิณ<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php echo base_url("index.php/AdminPanel/ShowMaster");?>"> สร้างหัวข้อองค์ประเมิณ</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url("index.php/AdminPanel/MasToLevel");?>"> กำหนดองค์ประเมิณ</a>
                        </li> 
                   </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> จัดการผู้ใช้<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php echo base_url("index.php/AdminControl/ShowAllUser"); ?>">รายชื่อผู้ถูกประเมิณ</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url("index.php/AdminControl/ShowAllRef"); ?>">รายชื่อผู้ประเมิณ</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
               
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->

</nav>  