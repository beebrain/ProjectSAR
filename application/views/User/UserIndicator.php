<?php
$indicator = $indicator[0];
$user_data = $this->session->userdata('user_data');
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
                                    <div class="col-lg-2">ตัวชี้วัดที่</div>
                                    <div class="col-lg-9"><?php echo $indicator->indicator_num . " - " . $indicator->indicator_title; ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2">ชนิดตัวบ่งชี้</div>
                                    <div class="col-lg-9"><?php echo $indicator->indicator_type ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2">ใช้กับ</div>
                                    <div class="col-lg-9"><?php echo ($indicator->data_use == '1' ? "ปีการศึกษา" : $indicator->data_use == '2' ? "ปีงบประมาณ" : "ปีปฏิทิน") ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2">เกณฑ์การประเมิน</div>
                                    <div class="col-lg-9"><?php echo $indicator->detail ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2">เกณฑ์มาตรฐาน</div>
                                    <div class="col-lg-9"><?php echo ($indicator->citeria == '0' ? "จำนวนข้อ" : "เชิงปริมาณ") ?></div>
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
                                <th style="width: 20%">
                                    ตัวชี้วัด
                                </th >
                                <th style="width: 60%">
                                    คำอธิบาย
                                </th>
                                <th style="width: 20%">
                                    หลักฐาน
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($subindicator as $value) {
                                ?>
                                <tr>
                                    <td  style="width: 20%"  >
                                        <?php echo $value->detail ?>
                                    </td>
                                    <td  style="width: 60%" >
                                        <a href="#" class="username" data-type="textarea" id="<?php echo $value->subindicator_id ?>"></a>
                                    </td>
                                    <td>
                                        <a href="#" id="username" data-type="text" data-pk="1">awesome</a>
                                    </td>

                                </tr>
                            <?php }
                            ?>
                        </tbody>
                    </table>
                </div >
                <div class="panel-group" id="result">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 20%">
                                    เป้าหมาย
                                </th >
                                <th style="width: 60%">
                                    ผลดำเนินงาน
                                </th>
                                <th style="width: 20%">
                                    คะแนนการประเมินตนเอง
                                </th>

                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>

                                </td>
                                <td>
                                </td>
                                <td>
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

<!-- /#page-wrapper -->


<?php echo js_asset("jquery.js"); ?>
<?php echo js_asset("jquery-migrate-1.1.1.js"); ?>
<?php echo js_asset("bootstrap.js"); ?>
<?php echo js_asset("bootstrap-editable.min.js"); ?>
<script>

    $.fn.editable.defaults.mode = 'inline';
    $(document).ready(function () {
        $('.username').editable({
            title: 'Enter username',
            showbuttons: "bottom"
        });
    });

    $('.username').on('save', function (e, params) {
        url: '<?php echo base_url('index.php/UserPanel/addDocumentSubindicator') ?>'


        console.log($(this).attr('id'));

    });
</script>
