<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo base_url('index.php/UserPanel') ?>">ESAR Version 2.0</a>
    </div>
    <!-- /.navbar-header -->
    <ul class="nav navbar-top-links navbar-right">

        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="true">
                <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li>


                    <a href="<?php echo base_url("index.php/UserPanel/master_sar_All"); ?>"> <i class="fa fa-calendar-o fa-fw"></i>เลือกชุดการประเมิน</a>


                </li>
                <li class="divider"></li>
                <li>
                    <a href="<?php echo base_url("index.php/UserManageDoc/ShowManageDoc"); ?>"> <i class="fa fa-list-alt fa-fw"></i>จัดการเอกสารหลักฐานการประเมิน</a>
                </li>
                <li class="divider"></li>
                <li>
                     <a href="<?php echo base_url("index.php/UserPanel/report"); ?>"> <i class="fa fa-file-text-o fa-fw"></i>รายงานการประเมิน</a>
                </li>
                <li class="divider"></li>
                <li>
                     <a href="<?php echo base_url("index.php/UserControl/logoutProcess"); ?>"> <i class="fa fa-sign-out fa-fw"></i>ออกจากระบบ</a>
                </li>

            </ul>
            <!-- /.dropdown-tasks -->
        </li>
        <!-- /.dropdown -->

    </ul>
    <!-- /.navbar-top-links -->
</nav>