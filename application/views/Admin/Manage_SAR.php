
<div id="page-wrapper">
    <div class="row">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">การประกันคุณภาพ</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">ชุดการประกันคุณภาพ
                                <span class="pull-right" data-toggle="modal" data-target="#myModal">
                                    <a href ="#" >
                                        <i class="fa fa-plus-square fa-lg" title="เพิ่มการประเมิณ"></i>
                                    </a>
                                </span>
                            </h4>
                        </div>

                        <div class="panel-body">


                            <?php
                            $index = 2;
                            foreach ($master_sar as $row) {
                                $index++;
                                ?>
                                <div class="col-md-3 col-lg-3">
                                    <div class="panel <?php echo randomstyle($index); ?>">

                                        <div class="panel-heading">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <i class="fa <?php echo randomIcon($index); ?> fa-2x"></i>
                                                </div>
                                                <div class="col-xs-9 text-right">

                                                    <div ><a href="<?php echo base_url('index.php/AdminPanel/showCompositAll/') . '/' . $row->id ?>"><?php echo $row->desc; ?></a></div> <!-- ชื่อห้วข้อ -->
                                                </div>
                                            </div>
                                        </div>

                                        <div class="panel-footer">
                                            <span class="pull-right"><a href="#" data-toggle="modal" data-target="#confirmDelete" onclick="confirmDelete('<?php echo $row->id; ?>', '<?php echo $row->desc; ?>')"><i class="fa fa-trash"></i></a></span>
                                            <span class="pull-left"><a href="#"   onclick="onedit('<?php echo $row->id; ?>', '<?php echo $row->desc; ?>')"><i class="fa fa-edit"></i></a></span>
                                            <div class="clearfix"></div>
                                        </div>

                                    </div>
                                </div>
                                <?php
                            }
                            ?>
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


        <!-- Modal PopUP-->
        <div class="modal fade" id="myModal" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">เพิ่มชุดการประกันคุณภาพ</h4>
                    </div>
                    <form id="testForm" role="form" action="<?php echo base_url('index.php/AdminPanel/AddMaster_sar'); ?>" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>รายละเอียด (ตัวอย่าง ปีการศึกษา 2557)</label>
                                <input class="form-control" type= "text" name="desc" id="desc">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" onclick="sendData()" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- Modal PopUP-->
        <div class="modal fade" id="EditModal" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">แก้ไขการประกันคุณภาพ</h4>
                    </div>
                    <form id="UpdateForm" role="form" action="<?php echo base_url('index.php/AdminPanel/UpdateMaster_sar'); ?>" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>รายละเอียด (ตัวอย่าง ปีการศึกษา 2557)</label>
                                <input class="form-control" name="updesc" id="updesc">
                                <input type="hidden" class="form-control" name="upid" id="upid" >
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" onclick="sendUpdateData()" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>




        <div class="modal fade" id="info" >
            <div class="modal-dialog">
                <div class="alert alert-info" id="info_data">
                    Data Update.
                </div>
            </div>
        </div>



        <div id="confirmDelete" class="modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <a href="#" data-dismiss="modal" aria-hidden="true" class="close">×</a>
                        <h3>คำเตือน คุณกำลังพยายามลบ</h3>
                    </div>
                    <div class="modal-body">
                        <p>ต้องการจะลบองค์ประเมิณ ใช่หรือไม่</p>
                    </div>
                    <div class="modal-footer">
                        <a href="#" id="confirm" class="btn confirm">ใช่</a>
                        <a href="#" data-dismiss="modal" aria-hidden="true" class="btn secondary">ไม่</a>
                    </div>
                </div>
            </div>
        </div>

        <?php echo js_asset("jquery.min.js"); ?>
        <?php echo js_asset("jquery.validate.js"); ?>
        <script>
            $("document").ready(function () {
                $("#testForm").validate({
                    rules: {
                        desc: "required",
                    },
                    messages: {
                        desc: "<p class='text-danger'>กรุณากรอกข้อมูล</p>",
                    }
                });
            });

            $('form').on("keyup keypress", function (e) {
                var code = e.keyCode || e.which;
                if (code == 13) {
                    e.preventDefault();
                    return false;
                }
            });


            function confirmDelete(vid, title) {
                $('#confirmDelete .modal-body').html("หัวข้อ - " + title);
                $('#confirmDelete').find('.modal-footer #confirm').on('click', function () {
                    $.post(
                            "<?php echo base_url('index.php/AdminPanel/deleteMaster_sar'); ?>",
                            {id: vid, check: "true"},
                    function (data, textStatus, jqXHR) {
                        location.reload();
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        $('.modal').modal('hide');
                        $('#info_data').addClass("alert alert-danger");
                        $('#info_data').html("Delete Fail".textStatis);
                        $('#info').modal('show');
                    });
                });
            }


            function onedit(id, desc) {
                $('#updesc').val(desc);
                $('#upid').val(id);
                $('#EditModal').modal('show');
            }

            function sendUpdateData() {

                var formData = $("#UpdateForm").serializeArray();
                var URL = $("#UpdateForm").attr("action");
                $.post(URL,
                            formData,
                            function (data, textStatus, jqXHR)
                            {

                            location.reload();
                            }).fail(function (jqXHR, textStatus, errorThrown)
                    {
                    $('.modal').modal('hide');
                    $('#info_data').addClass("alert alert-danger");
                    $('#info_data').html("Delete Fail".textStatis);
                    $('#info').modal('show');
                    });
            }


            function sendData() {
                if (!$("#testForm").valid()) {
                    return false;
                }

                var formData = $("#testForm").serializeArray();
                var URL = $("#testForm").attr("action");
                console.log(formData);
                $.post(URL,
                            formData,
                            function (data, textStatus, jqXHR)
                            {

                            location.reload();
                            }).fail(function (jqXHR, textStatus, errorThrown)
                    {
                    $('.modal').modal('hide');
                    $('#info_data').addClass("alert alert-danger");
                    $('#info_data').html("Delete Fail".textStatis);
                    $('#info').modal('show');
                    });
            }
        </script>
