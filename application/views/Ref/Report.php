<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">รายงานการประเมิน <?php echo $master_sar->desc; ?></h1>
            <div class="col-lg-6">
                <p>เลือกชุดการประเมิน
                    <select class="form-control" name="master_select" id="master_select">
                        <option value="">กรุณาเลือก</option>
                        <?php
                        foreach ($master_sar_all as $key => $value) {
                            echo "<option value='$value->id'" . ($master_sar->id == $value->id ? "selected" : "") . ">" . $value->desc . "</option>";
                        }
                        ?>
                    </select></p>
            </div>
            <div class="col-lg-6">

                <p>ผู้รับการประเมิน
                    <select class="form-control" name="user_select" id="user_select">
                        <?php
                        //echo "<option value='$user_data[user_id]' " . ($user_select->user_id == $user_data[user_id] ? "selected" : "") . ">$user_data[detail]</option>";
                        foreach ($user_all as $key => $value) {
                            echo "<option value='$value->user_id'" . ($user_select->user_id == $value->user_id ? "selected" : "") . ">&nbsp;&nbsp;-$value->detail</option>";
                            if ($value->child != null) {
                                foreach ($value->child as $key2 => $value2) {
                                    echo "<option value='$value2->user_id'" . ($user_select->user_id == $value2->user_id ? "selected" : "") . ">&nbsp;&nbsp;&nbsp;&nbsp;-$value2->detail</option>";
                                }
                            }
                        }
                        ?>
                    </select>

                </p>
            </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">

            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        คะแนนประเมิน
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in">

                        <table class="table table-bordered" style="margin: 0px">

                            <thead>
                                <tr>
                                    <th>หัวข้อประเมิน</th>
                                    <th style="width: 10%">ตนเอง</th>
                                    <th style="width: 10%">กรรมการ</th>
                                </tr>
                            </thead>
                            <?php
                            foreach ($data_all as $key => $value) {
                                $indicator = $value->indicator;
                                //  print_r($indicator);
                                ?>
                                <tbody>
                                    <tr class="warning">
                                        <th colspan="3"><?= $value->title ?></th>
                                    </tr>
                                    <?php
                                    foreach ($indicator as $value_indicator) {
                                        $score = $value_indicator->score[0];
                                         //print_r($score);
                                        ?>
                                        <tr class="success">
                                            <td  style="padding-left: 50px">
                                                
                                                 <?= "<a href='".  base_url('index.php/RefPanel/ShowIndicator/')."/".$value_indicator->indicator_id."/Report/".$user_select->user_id."/".$master_sar->id."'>".$value_indicator->indicator_title."</a>"; ?>
                                            </td>
                                            <td >
                                                <?= $score->score_user; ?>
                                            </td>
                                            <td >
                                                <?= $score->score_ref; ?>

                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                                <?php
                            }
                            ?>
                        </table>

                    </div>
                </div>
            </div>



            <!-- /.panel -->
        </div>
    </div>

</div>
<!-- /#page-wrapper -->
<?php echo js_asset("jquery-2.0.2.min.js"); ?>
<script language="javascript" type="text/javascript" src="<?php echo base_url('assets/flot/jquery.flot.js') ?>"></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url('assets/flot/jquery.flot.categories.js') ?>"></script>

<script type="text/javascript">
    $('#master_select,#user_select').change(function () {
        if ($('#master_select').val() != "") {
            url = "<?php echo base_url('index.php/RefPanel/report'); ?>";
            url += "/" + $('#master_select').val();
            url += "/" + $('#user_select').val();
            window.location.replace(url);
            //$('#master_select').val();
        }
    });

    /*
     $(function () {
     
     var data = [["January", 4], ["February", 2], ["March", 1], ["April", 3], ["May", 0], ["June", 1.2]];
     
     $.plot("#graph_plot", [data], {
     series: {
     bars: {
     show: true,
     barWidth: 0.1,
     align: "center",
     fill: true,
     fillColor: {colors: [{opacity: 0.8}, {opacity: 0.1}]}
     }
     },
     xaxis: {
     mode: "categories",
     tickLength: 0
     }
     });
     });
     */
</script>


