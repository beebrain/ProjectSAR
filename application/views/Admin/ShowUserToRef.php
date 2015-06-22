
<div id="page-wrapper">


    <div class="row">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">กำหนดผู้ประเมิน</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-5 col-lg-offset-1">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        รายละเอียดผู้ถูกประเมิน
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4 class="timeline-title">ชื่อผู้ถูกประเมิน</h4>
                            </div>
                            <div class="timeline-body">
                                <h4><p><?php echo $user[0]->detail; ?></p></h4>
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
                <div class="panel panel-success">
                    <div class="panel-heading">
                        กำหนดผู้ประเมิณ 
                        <span class="pull-right" ><button class="btn  btn-success btn-xs" id="saveuser">บันทึก</button></span>
                    </div>

                    <!-- /.panel-heading -->
                    <div class="panel-body">

                        <table class="table table-striped table-bordered table-hover" id="usertoref">
                            <thead>
                                <tr>
                                    <th>ชื่อผู้ประเมิน</th>
                                    <th>รับผิดชอบการประเมิน</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($ref_all as $key => $value) {
                                    ?>
                                    <tr>
                                        <td><?= $value->detail; ?></td>
                                        <td>
                                            <input type="checkbox" 
                                                   value="<?= $value->ref_id ?>" 
                                                   <?php
                                                   if (in_array($value->ref_id, $ref_check)) {
                                                       echo "checked";
                                                   }
                                                   ?> 
                                                   name="lv1" > 
                                        </td>
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
                            var table = $('#usertoref').DataTable({
                                "ordering": false
                            });
                        });


                        $('#saveuser').click(function () {
                            $('#info').html("กำลังบันทึกข้อมูล...");
                            $('#message').removeClass().addClass("alert alert-info alert-dismissable");
                            $('#message').show();
                            var searchIDs = $(':checkbox:checked').map(function () {
                                return $(this).val();
                            }).get();
                            var URL = "<?php echo base_url('index.php/AdminControl/AddUserToRef/') ?> ";
                            var DATA = {"ref_id": searchIDs, "user_id": <?= $user[0]->user_id ?>};
                            $.post(URL, DATA, function (data, textStatus, jqXHR) {
                               // console.log(data);
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

</script>


