<?php
$selectmas = 0;
if (isset($select_master_sar) && count($select_master_sar) > 0) {
    $selectmas = $select_master_sar[0]->id;
}
?>
<div id = "page-wrapper">


    <div class = "row">
        <div class = "row">
            <div class = "col-lg-12">
                <h1 class = "page-header">กำหนดผู้ประเมิน</h1>
            </div>

        </div>

        <div class = "row">
            <div class = "col-lg-3 col-lg-offset-1">
                <div class = "panel panel-success">
                    <div class = "panel-heading">
                        เลือกชุดการประกันคุณภาพ

                    </div>
                    <!--/.panel-heading -->
                    <div class = "panel-body">
                        <div class = "form-group">
                            <label><h4 class = "timeline-title">ชุดการประกันคุณภาพ</h4></label>
                            <select class = "form-control" id = "selectMaster">
                                <?php if (!(isset($select_master_sar) && count($select_master_sar) > 0)) { ?>
                                    <option value = "0" >กรุณาเลือก</option>
                                <?php } ?>
                                <?php
                                foreach ($All_master_sar as $value) {
                                    ?>
                                    <option value="<?= $value->id ?>" <?php if ($selectmas == $value->id) echo "selected" ?> ><?= $value->desc ?></option>
                                    <?php
                                }
                                ?>

                            </select>
                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>

            <div class="col-lg-8" id="status">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        สถาณะชุดการประเมิน
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table class="table table-responsive table-bordered" id = "status_table">
                            <thead>
                                <tr>
                                    <th style="width: 25%">ระดับมหาวิทยาลัย</th>
                                    <th style="width: 25%">ระดับคณะ</th>
                                    <th style="width: 25%">ระดับหลักสูตร</th>
                                    <th style="width: 25%">กรรมการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($select_master_sar) && count($select_master_sar) > 0) {
                                    ?>
                                    <tr>
                                        <td id='institution'><?= $select_master_sar[0]->institution; ?></td>
                                        <td id='faculty'><?= $select_master_sar[0]->faculty; ?></td>
                                        <td id='department'><?= $select_master_sar[0]->department; ?></td>
                                        <td id='ref'><?= $select_master_sar[0]->ref; ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
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
                <div class="panel panel-success">
                    <div class="panel-heading">
                        กำหนดผู้ประเมิณ 
                        <span class="pull-right" ><button class="btn  btn-success btn-xs" id="saveuser">บันทึก</button></span>
                    </div>

                    <!-- /.panel-heading -->
                    <div class="panel-body" id="detail_indicate">
                        <div class="row ">
                            <span class="pull-right">
                                <ul class="list-inline ">
                                    <li>เลือกทั้งหมด </li>
                                    <li><input type="checkbox"  id="lv1" > : ระดับมหาวิทยาลัย</li>
                                    <li><input type="checkbox"  id="lv2" > : ระดับคณะ</li>
                                    <li><input type="checkbox"  id="lv3" > : ระดับหลักสูตร</li>
                                </ul>
                            </span>
                        </div>
                        <?php
                        foreach ($allData as $value) {
                            $composit = $value[0];
                            $indicatorArray = $value[1];
                            ?>
                            <h3><?= $composit->maintitle ?></h3>

                            <table class="table table-striped table-bordered table-hover" id="usertoref">

                                <thead>
                                    <tr>
                                        <th>ตัวชี้วัด</th>
                                        <th style="width: 20%">ระดับมหาวิทยาลัย</th>
                                        <th style="width: 20%">ระดับคณะ</th>
                                        <th style="width: 20%">ระดับหลักสูตร</th>
                                    </tr>
                                </thead>
                                <?php
                                foreach ($indicatorArray as $value_indicator) {
                                    // print_r($value_indicator);
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td><?= $value_indicator->indicator_num ?></td>
                                            <td> <input type="checkbox" value="<?= $value_indicator->indicator_id ?>" name="lv1" <?php if ($value_indicator->lv1 == "1") echo "checked" ?> > </td>
                                            <td> <input type="checkbox" value="<?= $value_indicator->indicator_id ?>" name="lv2" <?php if ($value_indicator->lv2 == "1") echo "checked" ?> > </td>
                                            <td> <input type="checkbox" value="<?= $value_indicator->indicator_id ?>" name="lv3" <?php if ($value_indicator->lv3 == "1") echo "checked" ?> > </td>
                                        </tr>
                                    </tbody>
                                    <?php
                                }
                                ?>
                            </table> 
                            <?php
                        }
                        ?>
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
                            var selectmas = $("#selectMaster").val();
                            drawButton(selectmas);
                        });

                        $('#lv1').click(function () {
                            $value = $('#lv1');

                            if ($value.prop('checked') == true) {
                                $("input[name='lv1']").prop('checked', true);
                            } else {
                                $("input[name='lv1']").prop('checked', false);
                            }
                        });

                        $('#lv2').click(function () {
                            $value = $('#lv2');
                            if ($value.prop('checked') == true) {
                                $("input[name='lv2']").prop('checked', true);
                            } else {
                                $("input[name='lv2']").prop('checked', false);
                            }
                        });

                        $('#lv3').click(function () {
                            $value = $('#lv3');

                            if ($value.prop('checked') == true) {
                                $("input[name='lv3']").prop('checked', true);
                            } else {
                                $("input[name='lv3']").prop('checked', false);
                            }
                        });


                        $("#saveuser").click(function () {
                            var lv3 = $("input[name='lv3']:checked").map(function () {
                                return $(this).val();
                            }).get();
                            var lv2 = $("input[name='lv2']:checked").map(function () {
                                return $(this).val();
                            }).get();
                            var lv1 = $("input[name='lv1']:checked").map(function () {
                                return $(this).val();
                            }).get();

                            var idMaster = $("#selectMaster").val();
                            var Datalv = {"lv3": lv3, "lv2": lv2, "lv1": lv1, "master_id": idMaster};
                            //console.log(Datalv);
                            var URL = "<?php echo base_url('index.php/AdminPanel/UpdateIndicator_Level') ?>";
                            
                             $('#info').html("กำลังบันทึกข้อมูล...");
                            $('#message').removeClass().addClass("alert alert-info alert-dismissable");
                            $("#message").show();
                            
                            $.post(URL, Datalv, function (data) {
                                if (data == "success") {
                                    $('#info').html("บันทึกข้อมูลเรียบร้อยแล้ว");
                                    $('#message').removeClass().addClass("alert alert-success alert-dismissable");
                                    $("#message").show();
                                    $("#message").fadeOut(3000);

                                } else {
                                    $('#info').html("พบข้อผิดพลาด กรุณาติดต่อผู้พัฒนา");
                                    $('#message').removeClass().addClass("alert alert-danger alert-dismissable");
                                    $("#message").show();
                                    $("#message").fadeOut(3000);
                                }

                            }).fail(function (data) {
                                $('#info').html("Fail : พบข้อผิดพลาด กรุณาติดต่อผู้พัฒนา");
                                $('#message').removeClass().addClass("alert alert-danger alert-dismissable");
                                $("#message").show();
                                $("#message").fadeOut(3000);
                            });

                        });

                        function updatestatus(e) {
                            var value_id = $('#selectMaster').val();
                            var value_status = $(e).val();
                            var colum = $(e)[0].name;
                            var URL = "<?php echo base_url('index.php/AdminPanel/UpdateMaster_status') ?>";
                            var DATA = {'id': value_id, status: value_status, 'column': colum};
                            
                            
                            $('#info').html("กำลังบันทึกข้อมูล...");
                            $('#message').removeClass().addClass("alert alert-info alert-dismissable");
                            $("#message").show();
                            
                            
                            $.post(URL, DATA, function (data) {
                                var value = $('#selectMaster').val();
                                var URL = "<?php echo base_url('index.php/AdminPanel/MasToLevel/') ?>/" + value;
                                $(location).attr('href', URL);
                                return false;
                            }).fail(function (data) {
                                alert("fail");
                            });

                        }


                        function drawButton(data) {
                            // console.log(data);
                            $('#status_table tr td').each(function () {
                                var level = $(this).html();
                                if (level == 1) {
                                    $(this).html("<button class='btn btn-success btn-circle' type='button' name='" + $(this)[0].id + "' value='0' onclick='updatestatus(this)'><i class='fa fa-check'></i></button>");
                                } else {
                                    $(this).html("<button class='btn btn-danger btn-circle' type='button' name='" + $(this)[0].id + "' value ='1' onclick='updatestatus(this)'><i class='fa fa-ban'></i></button>");
                                }

                            });
                        }


                        $('#selectMaster').change(function () {
                            var value = $('#selectMaster').val();
                            var URL = "<?php echo base_url('index.php/AdminPanel/MasToLevel/') ?>/" + value;
                            $(location).attr('href', URL);
                            return false;
                        });

</script>


