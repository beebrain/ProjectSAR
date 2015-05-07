<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">หัวข้อการประเมิณ</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <?php
        $index = 2;
        $composit_result = $composit->result_array();
        foreach ($composit_result as $row) {
            $index++;
            ?>
            <div class="col-md-6">
                <div class="panel <?php echo randomstyle($index); ?>">
                    <a href="<?php echo base_url().'/PanelUser/indicatorAll/'.$row['id']; ?>"> <!-- insert Link -->
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-3">
                                <i class="fa <?php echo randomIcon($index); ?> fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">

                                <div class="lage"><?php echo $row['maintitle']; ?></div> <!-- ชื่อห้วข้อ -->
                            </div>
                        </div>
                    </div>
                    
                        <div class="panel-footer">
                            <span class="pull-left"><?php echo $row['title']; ?></span>
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
<!-- /#page-wrapper -->


