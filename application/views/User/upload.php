<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>ESAR</title>

        <!-- Bootstrap Core CSS -->
        <link href="<?php echo other_asset_url("bower_components/bootstrap/dist/css/bootstrap.min.css"); ?>" rel="stylesheet">

        <!-- MetisMenu CSS 
        <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet"> -->
        <link href="<?php echo other_asset_url("bower_components/metisMenu/dist/metisMenu.min.css"); ?>" rel="stylesheet">

        <!-- Timeline CSS 
        <link href="../dist/css/timeline.css" rel="stylesheet"> -->
        <link href="<?php echo other_asset_url("dist/css/timeline.css"); ?>" rel="stylesheet">

        <!-- Custom CSS 
        <link href="../dist/css/sb-admin-2.css" rel="stylesheet">-->
        <link href="<?php echo other_asset_url("dist/css/sb-admin-2.css"); ?>" rel="stylesheet">

        <!-- Morris Charts CSS 
        <link href="../bower_components/morrisjs/morris.css" rel="stylesheet">-->
        <link href="<?php echo other_asset_url("bower_components/morrisjs/morris.css"); ?>" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo other_asset_url("bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css"); ?>" >
        <link rel="stylesheet" href="<?php echo other_asset_url("bower_components/datatables-responsive/css/dataTables.responsive.css"); ?>" >

        <!--- bootstrap editable -->
        <link href="<?php echo base_url('assets/css/bootstrap-editable.css') ?>" rel="stylesheet"/>

        <!-- Custom Fonts 
        <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">-->
        <link href="<?php echo other_asset_url("bower_components/font-awesome/css/font-awesome.min.css"); ?>" rel="stylesheet">

        <link href="<?php echo base_url('assets/css/uploadFile.css') ?>" rel="stylesheet">
    </head>
    <body>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1 col-md-10">
                <div class="panel panel-default" >

                    <form id="data_form">
                        <div class="panel-heading">
                            <h2>จัดการเอกสารหลักฐาน</h2>
                        </div>
                        <div class="panel-body ">

                            <div class="form-group col-lg-5">
                                <label>ชื่อเอกสารหลักฐาน</label>
                                <input class="form-control" id="name_doc" name="name_doc" >
                                <div id="message_name_doc"></div>
                            </div>
                            <input class="form-control" type="hidden" id="fileid" name="fileid"  value="">

                        </div>
                        <div class="panel-body"id="mainbody" >
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#fileUpload" data-toggle="tab">เพิ่มข้อมูลใหม่</a>
                                </li>
                                <li><a href="#currentFile" data-toggle="tab">เลือกข้อมูลเดิม</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content panel panel-default" >
                                <div class="tab-pane fade in active" id="fileUpload" >
                                    <div class="panel-body ">

                                        <div >
                                            <table class="table-bordered">
                                                <tr>
                                                <div class="row show-grid">
                                                    <div class="form-group">
                                                        <label>เลือกรูปแบบ</label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="optioninput" id="optioninput1" value="file" checked="" onclick="status_input('file')">อัพโหลดไฟล์
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="optioninput" id="optioninput2" value="url" onclick="status_input('url')">เพิ่ม URL
                                                        </label>
                                                    </div>
                                                </div>            
                                                </tr>
                                            </table>
                                        </div>
                                        <div id = "upload_section">
                                            <div class="form-group">
                                                <label>File Upload</label>
                                                <div id="fileuploader">Upload</div>
                                                <div id="message_fileuploader"></div>
                                            </div>
                                        </div>
                                        <div id="url_section">
                                            <div class="form-group">
                                                <label>ที่อยู่ URL</label>
                                                <input  id="url_file" name="url_file" class="form-control" placeholder="ใส่ URL">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="currentFile">
                                    <p></p>
                                    <div class="dataTable_wrapper" id="tablefile">
                                        <table class="table table-striped table-bordered table-hover" id="example">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th >ชื่อเอกสาร</th>
                                                    <th style="width: 15%">ประเภท</th>
                                                    <th style="width: 15%">เจ้าของ</th>
                                                    <th style="width:5%">เลือก</th>
                                                </tr>
                                            </thead>

                                        </table>
                                    </div>

                                    <div id="selectfile">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="panel-footer ">
                        <div class="clearfix "><button class="pull-right " type="reset" value="ยกเลิก">ยกเลิก </button><button id="save_all" class="pull-right" type="button" value="savefile">บันทึกข้อมูล</button></div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>

        </div>
        <script src="<?php echo base_url("/assets/js/jquery.js"); ?>"></script>
        <script src="<?php echo base_url("/assets/js/jquery.fileupload.js"); ?>"></script>
        <?php echo js_asset("jquery.validate.js"); ?>
        <script>
                                                                $(document).ready(function ()
                                                                {
                                                                    $('a[data-toggle="tab"]').on('click', function (e) {
                                                                        var currenttab = ($(e.target).attr('href'));
                                                                        if (currenttab == '#fileUpload') {
                                                                            status_input("file");
                                                                        } else {
                                                                            status_input("oldfile");
                                                                        }
                                                                    });
                                                                    status_input('file');
                                                                    var uploadObj = $("#fileuploader").uploadFile({
                                                                        url: "<?php echo base_url('index.php/UserPanel/uploadfile/') ?>",
                                                                        multiple: false,
                                                                        autoSubmit: false,
                                                                        fileName: "myfile",
                                                                        allowedTypes: "jpg,png,gif,wbmp,bmp,zip,rar,doc,docx,xls,xlsx,pdf,ppt,pptx,txt",
                                                                        maxFileSize: 2048 * 1000,
                                                                        maxFileCount: 1,
                                                                        onSuccess: function (files, data, xhr) {
                                                                            console.log(jQuery.parseJSON(data));
                                                                            changeBG("success");
                                                                            SetName();
                                                                        },
                                                                        showStatusAfterSuccess: false,
                                                                        dragDropStr: "<span><b>ลากไฟล์เพื่อ Upload</b></span>",
                                                                        abortStr: "ยกเลิกการ Upload",
                                                                        cancelStr: "ยกเลิก",
                                                                        doneStr: "done",
                                                                        multiDragErrorStr: "กรุณาทดลองใหม่ ",
                                                                        extErrorStr: "พบข้อผิดพลาดกรุณาทดลองใหม่",
                                                                        sizeErrorStr: "ขนาดไฟล์เกิดกำหนด ",
                                                                        uploadErrorStr: "ไม่สามารถ Upload ได้กรุณาทดลองใหม่",
                                                                        maxFileCountErrorStr: "จำนวนไฟล์ที่ อนุญาตให้อัพโหลด = ",
                                                                        dragdropWidth: 720,
                                                                        statusBarWidth: 710,
                                                                        dynamicFormData: function ()
                                                                        {
                                                                            var data = {
                                                                                doc_name: $("#name_doc").val(),
                                                                                subindicator_id: "<?php echo $id; ?>",
                                                                                master_id: "<?php echo $this->session->userdata('master_id'); ?>"
                                                                            }
                                                                            return data;
                                                                        }
                                                                    });
                                                                    $("#save_all").click(function ()
                                                                    {

                                                                        if ($("#name_doc").val() == "") {
                                                                            $("#message_name_doc").html("<div class='alert alert-danger'>กรุณากรอกข้อมูล</div>");
                                                                        } else {

                                                                            if ($("#save_all").val() == "savefile") {
                                                                                var myfile = $('input[name=myfile]').val();

                                                                                if (myfile == "") {
                                                                                    alert("กรุณาระบุไฟล์");
                                                                                } else {
                                                                                    changeBG("progress");
                                                                                    if (uploadObj.existingFileNames[0] == "") {
                                                                                        $("#message_fileuploader").html("<div class='alert alert-danger'>กรุณากรอกข้อมูล</div>");
                                                                                    } else {
                                                                                        uploadObj.startUpload();
                                                                                    }
                                                                                }
                                                                            } else if ($("#save_all").val() == "saveURL") {
                                                                                // Upload URL
                                                                                var urls = $("#url_file").val();
                                                                                if (urls == "") {
                                                                                    alert("กรุณาใส่ URL");
                                                                                } else {
                                                                                    changeBG("progress");
                                                                                    $.post("<?php echo base_url('index.php/UserPanel/URLFile/') ?>",
                                                                                            {
                                                                                                doc_name: $("#name_doc").val(),
                                                                                                subindicator_id: "<?php echo $id; ?>",
                                                                                                master_id: "<?php echo $this->session->userdata('master_id'); ?>",
                                                                                                urls: urls
                                                                                            },
                                                                                    function (data) {
                                                                                        changeBG("success");
                                                                                        SetName();
                                                                                    });
                                                                                }
                                                                            } else if ($("#save_all").val() == "oldfile") {
                                                                                var fileID = $("#fileid").val();
                                                                                if (fileID == "") {
                                                                                    alert("กรุณาเลือกข้อมูลไฟล์");
                                                                                } else {
                                                                                    changeBG("progress");
                                                                                    $.post("<?php echo base_url('index.php/UserPanel/SelectFile/') ?>",
                                                                                            {
                                                                                                doc_name: $("#name_doc").val(),
                                                                                                subindicator_id: "<?php echo $id; ?>",
                                                                                                master_id: "<?php echo $this->session->userdata('master_id'); ?>",
                                                                                                file_id: fileID
                                                                                            },
                                                                                    function (data) {
                                                                                        changeBG("success");
                                                                                        SetName();
                                                                                    });
                                                                                }
                                                                            }
                                                                        }
                                                                    });

                                                                    // draw table
                                                                    drawTable('<?php echo $this->session->userdata('master_id'); ?>'); // send Null data
                                                                }
                                                                );

                                                                function drawTable(master_id) {
                                                                    var table = $('#example').DataTable({
                                                                        "ordering": false,
                                                                        "sAjaxSource": "<?php echo base_url('index.php/UserManageDoc/getAllDocMember'); ?>/" + master_id, //datasource
                                                                        "sAjaxDataProp": "data",
                                                                        "columns": [
                                                                            {"data": "doc_id"},
                                                                            {"data": "docname"},
                                                                            {"data": "type"},
                                                                            {"data": "username"}
                                                                        ],
                                                                        "columnDefs": [
                                                                            {
                                                                                "targets": [4],
                                                                                "defaultContent": "<button class='btn btn-info btn-circle' type='button' id='select'><i class='fa fa-check'></i></button> "
                                                                            },
                                                                            {
                                                                                "targets": [0],
                                                                                "width": "5px",
                                                                                "searchable": false,
                                                                                "orderable": false
                                                                            },
                                                                            {
                                                                                "render": function (data, type, row) {
                                                                                    return "<a href='#'>" + data + "</a>";
                                                                                },
                                                                                "targets": 0
                                                                            }
                                                                        ]
                                                                    });
                                                                    // Draw index
                                                                    table.on('click', '#select', function () {
                                                                        /* get data onclick */
                                                                        var tr = $(this).closest('tr');
                                                                        var row = table.row(tr);
                                                                        var data = row.data();
                                                                        select_File(data);

                                                                    });
                                                                    table.on('order.dt search.dt', function () {
                                                                        table.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
                                                                            cell.innerHTML = i + 1;
                                                                        });
                                                                    }).draw();
                                                                }
        </script>

        <script>

            var status_select = 'file';
            function status_input(check_input) {
                status_select = check_input;
                if (status_select == "file") {
                    $("#upload_section").show();
                    $("#url_section").hide();
                    $("#save_all").val("savefile");
                } else if (status_select == "url") {
                    $("#upload_section").hide();
                    $("#url_section").show();
                    $("#save_all").val("saveURL");
                } else if (status_select == "oldfile") {
                    $("#save_all").val("oldfile");
                    $("#tablefile").show();
                    $("#selectfile").hide();
                }
            }
            function changeBG(status) {
                if (status == 'progress') {
                    $("#mainbody").html("<div class='alert alert-info'>กำลังประมวลผล</div>");

                } else if (status == 'success') {
                    $("#mainbody").html("<div class='alert alert-success'>บันทึกข้อมูลเรียบร้อย</div>");
                }
            }
            function SetName() {
                if (window.opener != null && !window.opener.closed) {
                    opener.updateItem(<?php echo $id; ?>);
                }
                window.close();
            }

            function select_File(data) {
                // console.log(data);
                $("#tablefile").hide();
                $("#selectfile").html("<div class='alert alert-info'> ชื่อเอกสาร : " + data.docname + "<span class='pull-right'> <button class='btn btn-danger btn-circle' type='button' id='cancles'><i class='fa fa-times'></i></button></span> </div>");

                $("input[name=fileid]:hidden").val(data.doc_id);


                $("#selectfile").show();
                $("#cancles").on('click', function (e) {
                    $("#tablefile").show();
                    $("#selectfile").hide();
                    $("input[name=fileid]:hidden").val("");

                });
            }

        </script>
        <script src="<?php echo base_url("/assets/js/jquery.dataTables.js"); ?>"></script>

        <!-- Bootstrap Core JavaScript 
        <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script> -->
        <script src="<?php echo other_asset_url("bower_components/bootstrap/dist/js/bootstrap.min.js"); ?>"></script>

        <!-- Metis Menu Plugin JavaScript 
        <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script> -->
        <script src="<?php echo other_asset_url("bower_components/metisMenu/dist/metisMenu.min.js"); ?>"></script>

        <!-- DataTables JavaScript -->
        <script src=<?php echo other_asset_url("bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"); ?> ></script>


        <!-- Custom Theme JavaScript 
        <script src="../dist/js/sb-admin-2.js"></script>-->
        <script src="<?php echo other_asset_url("dist/js/sb-admin-2.js"); ?>"></script>

    </body>

</html>
