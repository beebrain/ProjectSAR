<?php
//print_r($Score_indicator);
if ($Score_indicator != NULL) {
    $Score_indicator = $Score_indicator[0];
}
$indicator = $indicator[0];
$user_id_select = $this->session->userdata('user_id_select');
$ref_data = $this->session->userdata('ref_data');
$ref_id = $ref_data['ref_id'];
?>

<div class="row">
    <p></p>
    <div class="col-lg-10 col-lg-offset-1">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" class=""> รายละเอียดตัวชี้วัด </a>
            </div>
            <!-- .panel-heading -->
            <div class=" panel-body panel-green ">


                <div class="panel-group">
                    <div class="panel panel-default">
                        <div id="collapseOne" class="panel-collapse collapse in" aria-expanded="true">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-2"><p>ตัวชี้วัดที่</p></div>
                                    <?php //print_r($indicator); ?>
                                    <div class="col-lg-9"><p><?php echo $indicator->indicator_num . " - " . $indicator->indicator_title; ?></p></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2"><p>ชนิดตัวบ่งชี้</p></div>
                                    <div class="col-lg-9"><p><?php echo $indicator->indicator_type ?></p></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2"><p>ใช้กับ</p></div>
                                    <div class="col-lg-9"><p><?php echo ($indicator->data_use == '1' ? "ปีการศึกษา" : $indicator->data_use == '2' ? "ปีงบประมาณ" : "ปีปฏิทิน") ?></p></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2"><p>เกณฑ์การประเมิน</p></div>
                                    <div class="col-lg-9"><p><?php echo $indicator->detail ?></p></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2"><p>เกณฑ์มาตรฐาน</p></div>
                                    <div class="col-lg-9"><p><?php echo ($indicator->citeria == '0' ? "จำนวนข้อที่บรรลุ" : "เชิงปริมาณ") ?></p></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .panel-body -->
        </div>
    </div>
</div>
<!-- /.row -->
<div class="row" >
    <div class="col-md-10 col-md-offset-1">
        <div id='message' class="alert alert-success alert-dismissable" >
            <button class="close" onclick="$('.alert').hide()" type="button">×</button>
            <p id="info">กำลังบันทึกข้อมูล...</p>
        </div>  
    </div>
</div>
<div class="row">
    <div class="col-lg-10 col-lg-offset-1">
        <div class="panel panel-green">
            <div class="panel-heading">
                ผลการประเมินคุณภาพการศึกษาภายใน
            </div>
            <!-- .panel-heading -->
            <div class=" panel-body  ">

                <div class="panel-group" >
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 30%">
                                    ตัวชี้วัด
                                </th >
                                <th style="width: 40%">
                                    คำอธิบาย
                                </th>
                                <th style="width: 30%">
                                    หลักฐาน
                                </th>
                            </tr>
                        </thead>
                    </table>

                    <?php
                    foreach ($subindicator as $value) {
                        $value_subindicator = $value["subindicator"];
                        $value_subindicator_doc = $value["subindicator_doc"];
                        $value_subindicator_sync_doc = $value["subindicator_sync_doc"];
                        //print_r($value_subindicator_sync_doc);
                        ?>
                        <table class="table table-bordered" style="margin: 0px">
                            <tr>
                                <td  style="width: 30%"  >
                                    <?php echo $value_subindicator->detail ?>
                                </td>
                                <td  style="width: 40%" >
                                    <?php
                                    if (sizeof($value_subindicator_doc) > 0) {
                                        echo $value_subindicator_doc->document;
                                    }
                                    ?>
                                </td>
                                <td style="width: 30%">
                                    <div id="item<?php echo $value_subindicator->subindicator_id ?>">

                                        <?php
                                        if ($value_subindicator_sync_doc != NULL) {
                                            $index = 1;
                                            foreach ($value_subindicator_sync_doc as $doc_sync) {

                                                echo "<div> <a href='$doc_sync->link_path' style='color:blue' >$index " . $doc_sync->docname . "</a> </div>";
                                                $index++;
                                            }
                                        }
                                        ?>
                                    </div>
                                </td>
                            </tr>
                        </table>

                    <?php }
                    ?>

                </div >
                <div class="panel-group" id="result">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 80%">
                                    ผลดำเนินงาน
                                </th>
                                <th >
                                    คะแนนการประเมินตนเอง
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <?php echo $Score_indicator->comment_user; ?>
                                </td>
                                <td>
                                    <?php echo $Score_indicator->score_user; ?>
                                    <input type="hidden" class="form-control" name="indicator_id" id="indicator_id" value="<?= $indicator->indicator_id ?>">
                                </td>

                            </tr>
                        </tbody>
                    </table>

                </div >


            </div>
            <!-- .panel-body -->
        </div>
        <!-- /.panel -->

    </div>
</div>

<div class="row">
    <div class="col-lg-10 col-lg-offset-1">
        <div class="panel panel-green">
            <div class="panel-heading">
                ผลการประเมินจากผู้ประเมิณ
            </div>
            <!-- .panel-heading -->
            <div class=" panel-body  ">

                <div class="panel-group" id="result">
                    <form name="scoreform" id="scoreform" >
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 60%">
                                        ข้อคิดเห็นผู้ประเมิน
                                    </th>
                                    <th >
                                        คะแนนการประเมินจากผู้ประเมิน
                                    </th>
                                    <th >

                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <textarea name="comment_ref" id="comment_ref" class="form-control" rows="3"><?php echo $Score_indicator->comment_ref; ?></textarea>
                                    </td>
                                    <td>
                                        <input class="form-control" name="score_ref" id="score_ref" placeholder="คะแนนประเมิน" value="<?php echo $Score_indicator->score_ref; ?>">
                                    </td>
                                    <td > 
                                        <button type="button" name="saveScore" id="saveScore" class="btn btn-primary">บันทึกคะแนน</button>
                                        <input type="hidden" class="form-control" name="indicator_id" id="indicator_id" value="<?= $indicator->indicator_id ?>">
                                        <input type="hidden" class="form-control" name="user_id_select" id="user_id_select" value="<?= $user_id_select ?>">
                                        <input type="hidden" class="form-control" name="ref_id" id="ref_id" value="<?= $ref_id ?>">
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                            </tfoot>
                        </table>
                    </form>
                </div >


            </div>
            <!-- .panel-body -->
        </div>
        <!-- /.panel -->

    </div>
</div>
<?php echo js_asset("jquery.js"); ?>
<?php echo js_asset("jquery-migrate-1.1.1.js"); ?>
<?php echo js_asset("bootstrap.js"); ?>
<?php echo js_asset("bootstrap-editable.min.js"); ?>
<?php echo js_asset("autoNumeric.js"); ?>
<script>
    $(document).ready(function () {
        $("#message").hide();
        $("#message2").hide();
        // set inital Score
        $('#score_ref').autoNumeric('init', {"vMin": "0.00", "vMax": "5.00"});
    });

    $('#saveScore').on('click', function () {
        var formData = $("#scoreform").serializeArray();
        var url = '<?php echo base_url('index.php/RefPanel/saveScore') ?>'
        $.ajax({
            url: url,
            data: formData,
            types: "text",
            method: "POST",
            beforeSend: function (xhr) {
                $('#saveScore').removeClass("btn btn-primary").addClass("btn btn-primary disabled");
                $("#saveScore").html("กำลังบันทึกข้อมูล....");
            }
        }).done(function (data) {
            //location.reload();
            window.location.replace("<?php echo base_url('index.php/RefPanel/Composit/') . "/" . $user_id_select ?>");
        }).fail(function () {
            alert("พบข้อผิดพลาด กรุณาทดลองอีกครั้ง");
        })
    });


</script>
