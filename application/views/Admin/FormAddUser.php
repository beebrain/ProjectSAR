<div id="page-wrapper">
    <div class="row">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">เพิ่มผู้ใช้</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="panel-body">
            <div class="row" >
                <div class="col-md-6 col-md-offset-3">
                    <div id='message' class="alert alert-success alert-dismissable" >
                        <button class="close" onclick="$('.alert').hide()" type="button">×</button>
                        <p id="info_insert">asdfasdfafd</p>
                    </div>  
                </div>

            </div>
            <div class="row" >

                <div class="col-md-6 col-md-offset-3">

                    <div class="panel panel-green">

                        <div class="panel-heading"> เพิ่มผู้ใช้งาน </div>
                        <div class="panel-body">
                            <form role="form" id = "Adduser" action="<?php echo base_url('index.php/AdminControl/AddUser'); ?>" method="post">
                                <div class="form-group">
                                    <label>รายละเอียดผู้ใช้งาน</label>
                                    <input class="form-control" name="detail" required>
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="form-control" name="username" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="form-control" type="password" name = "password" required>
                                </div>
                                <div class="form-group">
                                    <label>ระดับการเข้าใช้งาน</label>
                                    <select class="form-control" name="level"  id="level" required>
                                        <option >กรุณาเลือกระดับการเข้าใช้งาน</option>
                                        <option value="1">ระดับมหาวิทยาลัย</option>
                                        <option value="2">ระดับคณะ</option>
                                        <option value="3">ระดับหลักสูตร</option>
                                    </select>
                                </div>
                                <div class="form-group" id="user_ref_div">
                                    <label>สังกัด</label>
                                    <select class="form-control" name="user_ref" id="user_ref" >
                                        <option value="x">กรุณาเลือกระดับการเข้าใช้งาน</option>

                                    </select>
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
<!-- /.row -->
<div class="row">

</div>

</div>
<!-- /#page-wrapper -->

<?php echo js_asset("jquery.min.js"); ?>
<?php echo js_asset("jquery.validate.js"); ?>

<script>

    $("document").ready(function () {
        $("#Adduser").validate({
            rules: {
                detail: "required",
                username: "required",
                password: "required",
                level: {
                    required: true,
                    number: true
                },
                user_ref: {
                    required: true,
                    number: true
                }
            },
            messages: {
                detail: "<p class='text-danger'>กรุณากรอกรายละเอียดผู้ใช้</p>",
                username: "<p class='text-danger'>กรุณากรอก Username</p>",
                password: "<p class='text-danger'>กรุณากรอก password</p>",
                level: "<p class='text-danger'>กรุณาเลือกระดับการเข้าใช้งาน</p>",
                user_ref: "<p class='text-danger'>กรุณาเลือกสังกัด</p>"
            }
        });
    });
    $("#message").hide();
    $("#user_ref_div").hide();
    function sendData() {
        if (!$("#Adduser").valid()) {
            return false;
        }

        var formData = $("#Adduser").serializeArray();
        var URL = $("#Adduser").attr("action");
        $.post(URL,
                    formData,
                    function (data, textStatus, jqXHR)
                    {
                    var data_json = jQuery.parseJSON(data);
                    console.log(data_json);
                    if (data_json['message'] == "TRUE") {
                        $('#info_insert').html("บันทึกข้อมูลเรียบร้อยแล้ว");

                        $('#message').removeClass("alert-danger").addClass("alert-success");

                    } else {
                        $('#info_insert').html("username นี้มีในระบบแล้ว");

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
        $("#Adduser")[0].reset();
    }



    $("#level").change(function () {
        if ($("#level").val() == 2 || $("#level").val() == 3) {
            var URL = "<?php echo base_url("index.php/AdminControl/getListLevel") ?>";
            $.post(URL, {"level": $("#level").val() - 1}, function (data, textStatus, jqXHR)
                {
                $("#user_ref_div").show();
                var obj = JSON.parse(data);
                var i = 0
                var len = obj.length;
                console.log(obj);
                $("select[name=user_ref]").html("");
                for (; i < len; i++) {
                    $("select[name=user_ref]").append("<option value='" + obj[i].user_id + "'>" + obj[i].detail + "</option>");
                }
                }).fail(function (data) {
                alert("ไม่พบข้อมูล กรุณาติดต่อผู้พัฒนา");
            });
        } else if ($("#level").val() == 1) {
            $("select[name=user_ref]").html("<option value='1'>มหาวิทยาลัยราชภัฏอุตรดิตถ์</option>");
            $("#user_ref_div").show();
            // $("#user_ref_div").hide();
        } else {
            $("#user_ref_div").hide();
        }


    });

</script>



