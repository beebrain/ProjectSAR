<?php
//print_r($Score_indicator);
$Score_indicator = $Score_indicator[0];
$indicator = $indicator[0];
$user_data = $this->session->userdata('user_data');
//print_r($user_data);
$user_id = $user_data['user_id'];
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
                                    <a href="#" class="username" data-type="textarea" id="<?php echo $value_subindicator->subindicator_id ?>"><?php
                                        if (sizeof($value_subindicator_doc) > 0) {
                                            echo $value_subindicator_doc->document;
                                        }
                                        ?></a>
                                </td>
                                <td style="width: 30%">
                                    <a href="#" onclick="selectValue('<?php echo $value_subindicator->subindicator_id ?>')">เพิ่มหลักฐาน</a>
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
                                        <textarea name="comment_user" id="comment_user" class="form-control" rows="3"><?php echo $Score_indicator->comment_user; ?></textarea>
                                    </td>
                                    <td>
                                        <input class="form-control" name="score_user" id="score_user" placeholder="คะแนนประเมิน" value="<?php echo $Score_indicator->score_user; ?>">
                                        <input type="hidden" class="form-control" name="indicator_id" id="indicator_id" value="<?= $indicator->indicator_id ?>">
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>

                                <tr >

                                    <td colspan="2">
                                        <div id='message2' class=" alert alert-success alert-dismissable" >
                                            <button class="close" onclick="$('.alert').hide()" type="button">×</button>
                                            <p id="info2">กำลังบันทึกข้อมูล...</p>
                                        </div>  
                                        <button type="button" name="saveScore" id="saveScore" class="btn btn-primary pull-right">บันทึกคะแนน</button>
                                    </td>

                                </tr>
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
    function deleteDoc(id_syn, id) {
        var confirmdelete = confirm("คุณต้องการลบหลักฐานใช่หรือไม่");

        if (confirmdelete == true) {
            $.post("<?php echo base_url('index.php/UserPanel/deleteDoc_syn/') ?>",
                    {"subindicator_id": id, "id_syn": id_syn},
            function (data) {
                console.log(data);
            });


            $.post("<?php echo base_url('index.php/UserPanel/getItemInsubindicator/') ?>",
                    {"subindicator_id": id},
            function (data) {
                $("#item" + id).html("");
                var obj = jQuery.parseJSON(data);
                for (var i = 0; i < obj.length; i++) {
                    $("#item" + id).append("<div><a href='" + obj[i].link_path + "' style='color:blue '>  " + (i + 1) + " " + obj[i].docname + "</a><a href='#' onclick=deleteDoc('" + obj[i].doc_syn_id + "','" + id + "') style='color:red'> <i class='fa fa-trash'></i></a></div>");
                }
                console.log(obj);
            });
        }
    }


    function selectValue(id)
    {
        // open popup window and pass field id
        /*window.open('sku.php?id=' + encodeURIComponent(id), 'popuppage',
         'width=400,toolbar=1,resizable=1,scrollbars=yes,height=400,top=100,left=100');
         */
        window.open('<?php echo base_url('index.php/UserPanel/callUploadPage/') ?>' + "/" + id, 'popuppage',
                'width=800,toolbar=0,resizable=0,scrollbars=yes,height=500,top=100,left=100');
    }

    function updateItem(id)
    {
        $.post("<?php echo base_url('index.php/UserPanel/getItemInsubindicator/') ?>",
                {"subindicator_id": id},
        function (data) {
            $("#item" + id).html("");
            var obj = jQuery.parseJSON(data);
            for (var i = 0; i < obj.length; i++) {
                $("#item" + id).append("<div><a href='" + obj[i].link_path + "' style='color:blue '>  " + (i + 1) + " " + obj[i].docname + "</a></a><a href='#' onclick=deleteDoc('" + obj[i].doc_syn_id + "','" + id + "') style='color:red'> <i class='fa fa-trash'></i></a></div>");
            }
            console.log(obj);
        });
    }


    $(document).ready(function () {
        $("#message").hide();
        $("#message2").hide();
        $('.username').editable({
            title: 'Enter username',
            showbuttons: "bottom",
        });
        // set inital Score
        $('#score_user').autoNumeric('init', {"vMin": "0.00", "vMax": "5.00"});
    });

    $('#saveScore').on('click', function () {
        var formData = $("#scoreform").serializeArray();

        var url = '<?php echo base_url('index.php/UserPanel/saveScore') ?>'
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
            window.location.replace("<?php echo base_url('index.php/UserPanel/ShowComposit/') ?>");
        }).fail(function () {
            alert("พบข้อผิดพลาด กรุณาทดลองอีกครั้ง");
        })


    });

    $.fn.editable.defaults.mode = 'inline';

    $('.username').on('save', function (e, params) {

        var currentid = $(this).closest('a');
        var subindicator_id = currentid.attr('id');
        var indicator_id = "<?= $indicator->indicator_id ?>";
        var user_id = "<?= $user_id ?>";
        var detail = params.newValue;

        var url = '<?php echo base_url('index.php/UserPanel/addDocumentSubindicator') ?>'
        $.ajax({
            url: url,
            data: {'user_id': user_id,
                'subindicator_id': subindicator_id,
                'indicator_id': indicator_id,
                'document': detail
            },
            types: "text",
            method: "POST",
            beforeSend: function (xhr) {
                $('#info2').html("กำลังบันทึกข้อมูล....");
                $('#message').removeClass().addClass("alert alert-info alert-dismissable");
                $("#message").show();
                $("#message").fadeOut(3000);
            }
        }).done(function (data) {
            $('#info').html("บันทึกข้อมูลเรียบร้อยแล้ว....");
            $('#message').removeClass().addClass("alert alert-success alert-dismissable");
            $("#message").show();
            $("#message").fadeOut(3000);
        }).fail(function () {
            alert("พบข้อผิดพลาด กรุณาทดลองอีกครั้ง");
        })

    });
</script>
