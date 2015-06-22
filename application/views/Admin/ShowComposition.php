
<div id="page-wrapper">
    <div class="row">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">องค์ประเมิน <?php echo $master[0]->desc ?></h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">หัวข้อองค์ประเมิน
                                <span class="pull-right" data-toggle="modal" data-target="#myModal">
                                    <a href ="#" >
                                        <i class="fa fa-plus-square fa-lg" title="เพิ่มหัวข้อ"></i>
                                    </a>
                                </span>
                            </h4>
                        </div>

                        <div class="panel-body">
                            <div class="panel-group" id="accordion">
                                <?php
                                foreach ($allData as &$value) {
                                    $composit = $value[0];
                                    $indicator = $value[1];
                                    ?>

                                    <div class="panel panel-default">

                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a id = 'title<?php echo $composit->id ?>' aria-expanded="false" class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $composit->id ?>"><?php echo $composit->maintitle . " - " . $composit->title; ?></a>
                                                <span class="pull-right">
                                                    <a  href ="<?php echo base_url('index.php/AdminPanel/showFormAddIndicator/' . $composit->id); ?>" ><i class="fa fa-plus-square fa-lg"></i></a>

                                                    <a  href ="#" data-toggle="modal" data-target="#confirmDelete"
                                                        onclick="DeleteFunction(<?php echo "'" . $composit->id . "','" . $composit->maintitle . "','" . $composit->title . "'"; ?>)">
                                                        <i class="pull-right fa fa-trash-o  fa-lg"></i>
                                                    </a>
                                                    <a  href ="#" data-target="#myModalEdit" data-toggle="modal" 
                                                        onclick="EditFunction(<?php echo "'" . $composit->id . "','" . $composit->maintitle . "','" . $composit->title . "'"; ?>)">
                                                        <i class="pull-right fa fa-pencil-square-o fa-lg"></i>
                                                    </a>
                                                </span>


                                            </h4>
                                        </div>

                                        <div style="height: 0px;" aria-expanded="false" id="<?php echo $composit->id ?>" class="panel-collapse collapse">
                                            <div class="panel-body">

                                                <?php
                                                foreach ($indicator as &$value_in) {
                                                    ?>
                                                    <div class="list-group-item" href="#">
                                                        <a  href ="<?php echo base_url('index.php/AdminPanel/showDetailIndicator/' . $value_in->indicator_id); ?>">
                                                            <i class="fa fa-money fa-fw"></i>  <?php echo $value_in->indicator_title; ?>
                                                        </a>
                                                        <a  href ="#" data-toggle="modal" data-target="#confirmDelete"
                                                            onclick="DeleteindicatorFunction(<?php echo "'" . $value_in->indicator_id . "','" . $value_in->indicator_title . "'"; ?>)">
                                                            <i class="pull-right fa fa-trash-o fa-lg"></i>
                                                        </a>
                                                        <a  href ="<?php echo base_url('index.php/AdminPanel/showFormEditIndicator/' . $value_in->indicator_id); ?>" ><i class="pull-right fa fa-pencil-square-o fa-lg"></i></a>
                                                    </div>


                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
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


        <!-- Modal PopUP-->
        <div class="modal fade" id="myModal" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">เพิ่มหัวข้อองค์ประเมิน</h4>
                    </div>
                    <form role="form" id="form_addcomposit" action="<?php echo base_url('index.php/AdminPanel/AddComposition'); ?>" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>องค์ประเมินที่</label>
                                <input class="form-control" name="maintitle">
                            </div>
                            <div class="form-group">
                                <label>ชื่อองค์ประเมิน</label>
                                <input class="form-control" name = "title">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal PopUP-->
        <div class="modal fade" id="myModalEdit" role="dialog"  aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">แก้ไขหัวข้อการประเมิณ</h4>
                    </div>

                    <form id="updateform" role="form" action="<?php echo base_url('index.php/AdminPanel/UpdateComposition'); ?>" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>องค์ประเมินที่</label>
                                <input id="maintitleEdit" class="form-control" name="maintitle" value="">
                            </div>
                            <div class="form-group">
                                <label>ชื่อองค์ประเมิน</label>
                                <input id="titleEdit" class="form-control" name = "title" value="" >
                                <input type="hidden" class="form-control" id="composit_id" name="composit_id" value="">
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
                $("#form_addcomposit").validate({
                    rules: {
                        maintitle: "required",
                        title: "required",
                    },
                    messages: {
                        maintitle: "<p class='text-danger'>กรุณากรอกเลขที่องค์ประเมิน</p>",
                        title: "<p class='text-danger'>กรุณากรอกชื่อองค์ประเมิน</p>",
                    }
                });

                $("#updateform").validate({
                    rules: {
                        maintitle: "required",
                        title: "required",
                    },
                    messages: {
                        maintitle: "<p class='text-danger'>กรุณากรอกเลขที่องค์ประเมิน</p>",
                        title: "<p class='text-danger'>กรุณากรอกชื่อองค์ประเมิน</p>",
                    }
                });
            });
            function sendData() {

                if (!$("#updateform").valid()) {
                    return false;
                }
                $('#info_data').removeClass();
                var formData = $("#updateform").serializeArray();
                var URL = $("#updateform").attr("action");
                $.post(URL,
                            formData,
                            function (data, textStatus, jqXHR)
                            {

                            location.reload();

                            }).fail(function (jqXHR, textStatus, errorThrown)
                    {
                     $('.modal').modal('hide');
                    $('#info_data').addClass("alert alert-danger");
                    $('#info_data').html("Update Fail");
                    $('#info').modal('show');
                    });


            }

            function DeleteFunction(vid, main, title) {
                $('#confirmDelete .modal-body').html(main + " - " + title);
                $('#confirmDelete').find('.modal-footer #confirm').on('click', function () {
                    $.post("<?php echo base_url('index.php/AdminPanel/DeleteComposition'); ?>",
                                                        {id: vid, check: "true"},
                                        function (data, textStatus, jqXHR)
                                            {
                        location.reload();
                                            }).fail(function (jqXHR, textStatus, errorThrown)
                        {
                         $('.modal').modal('hide');
                        $('#info_data').addClass("alert alert-danger");
                        $('#info_data').html("Delete Fail");
                        $('#info').modal('show');
                    });
                });

            }

            function DeleteindicatorFunction(vid, title) {
                $('#confirmDelete .modal-body').html("หัวข้อ - " + title);
                $('#confirmDelete').find('.modal-footer #confirm').on('click', function () {
                    $.post("<?php echo base_url('index.php/AdminPanel/DeleteIndicator'); ?>",
                                                        {id: vid, check: "true"},
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
                });

            }

            function EditFunction(id, main, title) {

                $('#maintitleEdit').val(main);
                $('#composit_id').val(id);
                $('#titleEdit').val(title);
            }
        </script>
