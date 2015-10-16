<?php //print_r($master_sar)          ?>
<?php //print_r($user_all)         ?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">เลือกผู้รับการประเมิน สำหรับชุดการประเมิน <?php echo $master_sar[0]->desc; ?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="panel-body">
            <div class="dataTable_wrapper">
                <table class="table table-striped table-bordered table-hover" id="example">
                    <thead>
                        <tr>

                            <th>#</th>
                            <th style="width: 50%">ชื่อผู้รับการประเมิณ</th>
                            <th>ระดับ</th>
                            <th>สังกัด</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($user_all as $key => $value) {
                            ?>
                            <tr>
                                <td><?php echo $key + 1 ?></td>
                                <td style="width: 50%"><a href="<?php echo base_url('index.php/RefPanel/Composit') . "/" . $value->user_id ?>"><?php echo $value->detail ?></a></td>
                                <td><?php
                                    if ($value->level == 1)
                                        echo "มหาวิทยาลัย";
                                    if ($value->level == 2)
                                        echo "คณะ";
                                    if ($value->level == 3)
                                        echo "ภาควิชา";
                                    ?></td>
                                <td><?php echo $value->parrent_detail ?></td>
                            </tr>
                            <?php
                        }
                        ?>     
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
    </div>

</div>
<script src="<?php echo base_url("/assets/js/jquery.js"); ?>"></script>
<script>



    $(document).ready(function () {
        $('#example').DataTable({
            "ordering": false
        });
    });

</script>





