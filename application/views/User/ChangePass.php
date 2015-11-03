<div id="page-wrapper">
    <div class="row">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">เปลี่ยนรหัสผ่าน</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="panel-body">
            <div class="row" >
                <div class="col-md-6 col-md-offset-3">
                    <div id='message' class="alert alert-success alert-dismissable" >
                        <button class="close" onclick="$('.alert').hide()" type="button">×</button>
                        <p id="info_insert"></p>
                    </div>  
                </div>

            </div>
            <div class="row" >

                <div class="col-md-6 col-md-offset-3">

                    <div class="panel panel-green">

                        <div class="panel-heading"> เปลี่ยนรหัสผ่าน </div>
                        <div class="panel-body">
                            <form role="form" id = "changePass" action="<?php echo base_url('index.php/UserControl/changePass'); ?>" method="post">
                                <div class="form-group">
                                    <label>รหัสผ่านเก่า</label>
                                    <input class="form-control" type="password" name="password" id="password" required>
                                </div>
                                <div class="form-group">
                                    <label>รหัสผ่านใหม่</label>
                                    <input class="form-control" type="password" name = "newpassword" id = "newpassword" required>
                                </div>
                                <div class="form-group">
                                    <label>ยืนยัน รหัสผ่านใหม่</label>
                                    <input class="form-control" type="password" name = "repassword"  id = "repassword" required>
                                </div>
                                <span style="alignment-adjust: central">
                                    <button type="button" onclick="sendData()" class="btn btn-default ">บันทึก</button>
                                    <button type="reset" class="btn btn-default" style="alignment-adjust: central">ยกเลิก</button>
                                </span>

                            </form>
                        </div>
                        <div class="panel-footer">  </div>
                    </div>

                </div>
            </div>
            <!-- /.col-lg-6 (nested) -->
        </div>
        <!-- /.row (nested) -->
    </div>
    <!-- /.panel-body -->


</div>


</div>
<!-- /#page-wrapper -->

<?php echo js_asset("jquery.min.js"); ?>
<?php echo js_asset("jquery.validate.js"); ?>

<script>

    $("document").ready(function () {
        $("#changePass").validate({
            rules: {
                password: "required",
                newpassword: {
                    required: true,
                    minlength: 5
                },
                repassword: {
                    required: true,
                    minlength: 5,
                    equalTo: "#newpassword"
                }
            },
            messages: {
                password: "<p class='text-danger'>กรุณากรอกรหัสผ่าน</p>",
                newpassword: {
                    required: "<p class='text-danger'>กรุณาระบุรหัสผ่าน</p>",
                    minlength: "<p class='text-danger'>กรุณาใส่ตัวอักษรมากกว่า 5 ตัว</p>"
                },
                repassword: {
                    required: "<p class='text-danger'>กรุณาระบุรหัสผ่าน</p>",
                    minlength: "<p class='text-danger'>กรุณาใส่ตัวอักษรมากกว่า 5 ตัว</p>",
                    equalTo: "<p class='text-danger'>รหัสผ่านไม่ตรงกัน</p>"
                }
            }
        });
    });
    $("#message").hide();

    function sendData() {
        if (!$("#changePass").valid()) {
            return false;
        }

        var formData = $("#changePass").serializeArray();
        var URL = $("#changePass").attr("action");
        console.log(formData);

        $.post(URL, formData, function (data) {
            var data_json = jQuery.parseJSON(data);
            console.log(data_json);

            if (data_json['message'] == "True") {
                $('#info_insert').html("เปลี่ยนรหัสเรียบร้อยแล้ว");

                $('#message').removeClass("alert-danger").addClass("alert-success");

            } else {
                $('#info_insert').html("รหัสผ่านไม่ถูกต้อง");

                $('#message').removeClass("alert-success").addClass("alert-danger");
            }
            $("#message").show();
            $("#message").fadeOut(3000);
            }).fail(function (jqXHR, textStatus, errorThrown)
            {
            $('#info_insert').html("พบข้อผิดพลาดกรุณาติดต่อ ผู้พัฒนา");
            $('#message').removeClass("alert-success").addClass("alert-danger");
            $("#message").show();
            $("#message").fadeOut(3000);

            });
        $("#changePass")[0].reset();

    }



</script>



