<?php
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
                                    <a href="#" onclick="selectValue('<?php echo $value_subindicator->subindicator_id ?>')"><i class="fa fa-plus-circle"></i></a>
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


<?php echo js_asset("jquery.js"); ?>
<?php echo js_asset("jquery-migrate-1.1.1.js"); ?>
<?php echo js_asset("bootstrap.js"); ?>
<?php echo js_asset("bootstrap-editable.min.js"); ?>
<?php echo js_asset("blurbox.js"); ?>
<script>

    function selectValue(id)
    {
        // open popup window and pass field id
        /*window.open('sku.php?id=' + encodeURIComponent(id), 'popuppage',
         'width=400,toolbar=1,resizable=1,scrollbars=yes,height=400,top=100,left=100');
         */
        alert(id);
        window.open('<?php echo base_url('index.php/UserPanel/callUploadPage/') ?>'+"/"+id, 'popuppage',
                'width=800,toolbar=0,resizable=0,scrollbars=yes,height=500,top=100,left=100');
    }

    function updateValue(id, value)
    {
        // this gets called from the popup window and updates the field with a new value
       // document.getElementById(id).value = value;
       alert(id);
       alert(value);
    }

    $.fn.editable.defaults.mode = 'inline';
    $(document).ready(function () {
        $("#message").hide();
        $('.username').editable({
            title: 'Enter username',
            showbuttons: "bottom",
        });
    });
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
                $('#info').html("กำลังบันทึกข้อมูล....");
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
