<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">ESAR Version 2.0</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-messages">
                <li>
                    <a href="<?php echo base_url("index.php/AdminPanel/ShowMaster"); ?>"> <i class="fa fa-calendar-o fa-fw"></i> สร้างหัวข้อองค์ประเมิณ</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="<?php echo base_url("index.php/AdminPanel/MasToLevel"); ?>"> <i class="fa fa-list-alt fa-fw"></i> ควบคุมองค์ประเมิณ</a>
                </li> 
                <li class="divider"></li>

                <li>
                    <a href="<?php echo base_url("index.php/AdminControl/ShowAllUser"); ?>"><i class="fa fa-file-text-o fa-fw"></i> จัดการรายชื่อผู้รับการประเมิณ</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="<?php echo base_url("index.php/AdminControl/ShowAllRef"); ?>"><i class="fa fa-file-text-o fa-fw"></i> จัดการรายชื่อผู้ประเมิณ</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="<?php echo base_url("index.php/AdminControl/logoutProcess"); ?>"><i class="fa fa-sign-out fa-fw"></i> ออกจากระบบ</a>
                </li>
            </ul>
            <!-- /.dropdown-messages -->
        </li>
        <!-- /.dropdown -->
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->
</nav>