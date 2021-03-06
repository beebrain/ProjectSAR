<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">ชุดการประเมิน <?php echo $data_master[0]->desc ?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class=" panel-body panel-green ">
                <?php
                foreach ($data_all as $value) {
                    ?>
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><?php echo $value["composit"]->maintitle . " - " . $value["composit"]->title; ?></a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th style="width: 10%">ตัวชี้ที่</th>
                                                <th>ชื่อตัวชี้วัด</th>
                                                <th style="width: 10%">ตนเอง</th>
                                                <th style="width: 10%">กรรมการ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($value["indicator"] as $value2) {
                                                ?>

                                                <tr>
                                                    <td><?php echo $value2->indicator_num ?></td>
                                                    <td><a href="<?php echo base_url("index.php/UserPanel/ShowIndicator/") . "/" . $value2->indicator_id ?>"><?php echo $value2->indicator_title ?></a></td>
                                                    <td><?php
                                                        if ($value2->score == NULL)
                                                            echo "Not scoring";
                                                        else
                                                            echo $value2->score->score_user
                                                            ?>
                                                    </td>
                                                    <td><?php
                                                        if ($value2->score == NULL)
                                                            echo "Not scoring";
                                                        else
                                                            echo $value2->score->score_ref
                                                            ?>
                                                    </td>

                                                </tr>

                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                }
                ?>
            </div>

            <!-- /.panel -->
        </div>
    </div>

</div>
<!-- /#page-wrapper -->


<?php echo js_asset("jquery.min.js"); ?>


