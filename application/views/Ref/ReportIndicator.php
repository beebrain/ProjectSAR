<?php
//print_r($Score_indicator);
$Score_indicator = $Score_indicator[0];
$indicator = $indicator[0];
//$user_data = $this->session->userdata('user_data');
//print_r($user_data);
$user_id = $user_data['user_id'];
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">ผลการประเมิน</h1>
            <h2><?php echo $detail_sar->desc." :: "; 
                    echo $user_data['detail'] ?> </h2>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <button type="button" class="btn btn-warning btn-xs" onclick="history.back();">back</button>
        </div>
    </div>
    <div class="row">
        <p></p>
        <div class="col-lg-12">
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

    <div class="row">
        <div class="col-lg-12">
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

                                                    echo "<div> <a href='$doc_sync->link_path' style='color:blue' >$index " . $doc_sync->docname . "</a>  <a href='#' onclick=deleteDoc('$doc_sync->doc_syn_id','$value_subindicator->subindicator_id') style='color:red'><i class='fa fa-trash'></i></a></div>";
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
                        <form name="scoreform" id="scoreform" >
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 60%">
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
                                        </td>
                                    </tr>
                                </tbody>

                            </table>
                        </form>
                    </div >
                </div>
                <!-- .panel-body -->
            </div>
            <!-- /.panel -->
        </div>
    </div>
</div>

<?php echo js_asset("jquery.js"); ?>
<?php echo js_asset("jquery-migrate-1.1.1.js"); ?>
<?php echo js_asset("bootstrap.js"); ?>
<?php echo js_asset("bootstrap-editable.min.js"); ?>
<?php echo js_asset("autoNumeric.js"); ?>
<script>

</script>
