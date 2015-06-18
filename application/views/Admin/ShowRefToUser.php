
<div id="page-wrapper">


    <div class="row">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">กำหนดผู้ถูกประเมิน</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-5 col-lg-offset-1">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        รายละเอียดผู้ประเมิน
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4 class="timeline-title">ชื่อผู้ประเมิน</h4>
                            </div>
                            <div class="timeline-body">
                                <h4><p><?php echo $ref[0]->detail; ?></p></h4>
                            </div>
                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>

        <!-- message -->


        <div class="row" >
            <div class="col-md-6 col-md-offset-3">
                <div id='message' class="alert alert-success alert-dismissable" >
                    <button class="close" onclick="$('.alert').hide()" type="button">×</button>
                    <p id="info">กำลังบันทึกข้อมูล...</p>
                </div>  
            </div>
        </div>

        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        กำหนดผู้ถูกประเมิณ 
                        <span class="pull-right" ><button class="btn btn-info btn-xs" id="saveuser">บันทึก</button></span>
                    </div>

                    <!-- /.panel-heading -->
                    <div class="panel-body">

                        <!-- .panel-heading -->
                        <div class="panel-body">


                            <div class="panel-group" id="accordion">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">ระดับมหาวิทยาลัย</a>
                                            <span class="pull-right" >
                                                <button class="btn btn-info btn-xs" id ='selectAllLV1' value="check">เลือกทั้งหมด</button>
                                            </span>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse ">
                                        <div class="panel-body">
                                            <table class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>ชื่อผู้ถูกประเมิน</th>
                                                        <th>รับผิดชอบการประเมิน</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    foreach ($user_all as $key => $value) {
                                                        if ($value->level == 0) {
                                                            ?>
                                                            <tr>
                                                                <td><?= $value->detail; ?></td>
                                                                <td>
                                                                    <input type="checkbox" 
                                                                           value="<?= $value->user_id ?>" 
                                                                           <?php
                                                                           if (in_array($value->user_id, $user_check)) {
                                                                               echo "checked";
                                                                           }
                                                                           ?> 
                                                                           name="lv1" > 
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </tbody>
                                            </table> 
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">ระดับคณะ</a>
                                            <span class="pull-right" >
                                                <button class="btn btn-info btn-xs" id ='selectAllLV2' value="check">เลือกทั้งหมด</button>

                                            </span>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <table class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>ชื่อผู้ถูกประเมิน</th>
                                                        <th>รับผิดชอบการประเมิน</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    foreach ($user_all as $key => $value) {
                                                        if ($value->level == 1) {
                                                            ?>
                                                            <tr>
                                                                <td><?= $value->detail; ?></td>
                                                                <td> 
                                                                    <input type="checkbox" 
                                                                           value="<?= $value->user_id ?>" 
                                                                           <?php
                                                                           if (in_array($value->user_id, $user_check)) {
                                                                               echo "checked";
                                                                           }
                                                                           ?> 
                                                                           name="lv2" >
                                                            </tr>

                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </tbody>
                                            </table> 
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">ระดับหลักสูตร</a>
                                            <span class="pull-right" >
                                                <button class="btn btn-info btn-xs" id ='selectAllLV3' value="check">เลือกทั้งหมด</button>

                                            </span>
                                        </h4>
                                    </div>
                                    <div id="collapseThree" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <table class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>ชื่อผู้ถูกประเมิน</th>
                                                        <th>รับผิดชอบการประเมิน</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    foreach ($user_all as $key => $value) {
                                                        if ($value->level == 2) {
                                                            ?>
                                                            <tr>
                                                                <td><?= $value->detail; ?></td>
                                                                <td> 
                                                                    <input type="checkbox" 
                                                                           value="<?= $value->user_id ?>" 
                                                                           <?php
                                                                           if (in_array($value->user_id, $user_check)) {
                                                                               echo "checked";
                                                                           }
                                                                           ?> 
                                                                           name="lv3" > 
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </tbody>
                                            </table> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.col-lg-6 (nested) -->
    </div>
    <!-- /.panel-body -->


</div>



</div>

<script src="<?php echo base_url("/assets/js/jquery.js"); ?>"></script>
<script src="<?php echo base_url("/assets/js/jquery-ui.js"); ?>"></script>

<script>
                        $(document).ready(function () {
                            $('#message').hide();
                        });


                        $('#saveuser').click(function () {
                            $('#info').html("กำลังบันทึกข้อมูล...");
                            $('#message').removeClass().addClass("alert alert-info alert-dismissable");
                            $('#message').show();
                            var searchIDs = $(':checkbox:checked').map(function () {
                                return $(this).val();
                            }).get();
                            var URL = "<?php echo base_url('index.php/AdminControl/AddRefToUser/') ?> ";
                            var DATA = {"user_id": searchIDs, "ref_id": <?= $ref[0]->ref_id ?>};
                            $.post(URL, DATA, function (data, textStatus, jqXHR) {
                                console.log(data);
                                $('#info').html("บันทึกข้อมูลเรียบร้อยแล้ว");
                                $('#message').removeClass().addClass("alert alert-success alert-dismissable");
                                //$('#message').removeClass("alert-danger").addClass("alert-success");
                                $("#message").show();
                                $("#message").fadeOut(3000);

                            }).fail(function (data, textStatus, jqXHR) {
                                console.log(data);
                                $('#info').html("พบข้อผิดพลาดกรุณาติดต่อ ผู้พัฒนา");
                                $('#message').removeClass().addClass("alert alert-danger alert-dismissable");
                                //$('#message').removeClass("alert-success").addClass("alert-danger");
                                $("#message").show();
                                $("#message").fadeOut(3000);
                            });
                        });
                        $('#selectAllLV3').click(function () {
                            $value = $('#selectAllLV3');
                            if ($value.val() == 'check') {
                                $("input[name='lv3']").prop('checked', true);
                                $('#selectAllLV3').val("uncheck");
                                $('#selectAllLV3').text("ยกเลิกทั้งหมด");
                            } else {
                                $("input[name='lv3']").prop('checked', false);
                                $('#selectAllLV3').val("check");
                                $('#selectAllLV3').text("เลือกทั้งหมด");
                            }
                        });
                        $('#selectAllLV2').click(function () {
                            $value = $('#selectAllLV2').val();
                            if ($value == 'check') {
                                $("input[name='lv2']").prop('checked', true);
                                $('#selectAllLV2').val("uncheck");
                                $('#selectAllLV2').text("ยกเลิกทั้งหมด");
                            } else {
                                $("input[name='lv2']").prop('checked', false);
                                $('#selectAllLV2').val("check");
                                $('#selectAllLV2').text("เลือกทั้งหมด");
                            }
                        });
                        $('#selectAllLV1').click(function () {
                            $value = $('#selectAllLV1').val();
                            if ($value == 'check') {
                                $("input[name='lv1']").prop('checked', true);
                                $('#selectAllLV1').val("uncheck");
                                $('#selectAllLV1').text("ยกเลิกทั้งหมด");
                            } else {
                                $("input[name='lv1']").prop('checked', false);
                                $('#selectAllLV1').val("check");
                                $('#selectAllLV1').text("เลือกทั้งหมด");
                            }
                        });
</script>


