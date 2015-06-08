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
                                    <input class="form-control" name="detail">
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="form-control" name="username">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="form-control" name = "password">
                                </div>
                                <div class="form-group">
                                    <label>ระดับการเข้าใช้งาน</label>
                                    <select class="form-control" name="level">
                                        <option value="0">กรุณาเลือกระดับการเข้าใช้งาน</option>
                                        <option value="1">ระดับมหาวิทยาลัย</option>
                                        <option value="2">ระดับภาควิชา</option>
                                        <option value="3">ระดับคณะ</option>
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

<script>
    $("#message").hide();
    function sendData() {
        var formData = $("#Adduser").serializeArray();
        var URL = $("#Adduser").attr("action");
        $.post(URL,
                    formData,
                    function (data, textStatus, jqXHR)
                    {
                    $('#info_insert').html("บันทึกข้อมูลเรียบร้อยแล้ว");
                    $('#message').removeClass("alert-danger").addClass("alert-success");
                    $("#message").show();

                    }).fail(function (jqXHR, textStatus, errorThrown)
            {
            $('#info_insert').html("พบข้อผิดพลาดกรุณาติดต่อ ผู้พัฒนา");
            $('#message').removeClass("alert-success").addClass("alert-danger");
            $("#message").show();

            });


    }

</script>



