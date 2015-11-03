<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">ชุดการประเมิน</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <?php
        $index = 4;
        $userdata = $this->session->userdata('user_data');
        //print_r($userdata);
        foreach ($master_sar as $row) {
           // print_r($row);
            if ($userdata["level"] == 3) {
                $enable = $row->department;
            } else if ($userdata["level"] == 2) {
                $enable = $row->faculty;
            } else {
                $enable = $row->institution;
            }
            $index++;
            ?>
            <div class="col-md-4">
                <div class="panel <?php echo randomstyle($index); ?>">
                    <a href="<?php if($enable){echo base_url("index.php/UserPanel/ShowComposit/") . "/" . $row->id; }else{ echo "#";}?>"> <!-- insert Link -->
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-3">
                                    <i class="fa <?php echo randomIcon($index); ?> fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="lage"><?php echo $row->desc; ?></div> <!-- ชื่อห้วข้อ -->
                                </div>
                            </div>
                        </div>

                        <div class="panel-footer">
                            <span class="pull-left"><?php if(!$enable){echo "ระบบปิดรับการประเมินแล้ว";} ?></span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <?php
        }
        ?>
    </div>

</div>
<?php echo js_asset("jquery.js"); ?>
<!-- /#page-wrapper -->


