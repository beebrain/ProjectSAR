<div id="page-wrapper">
    <div class="row">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">เอกสารในระบบ</h1>

            </div>

        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-8">
                <form role="form" id ="selectMaster" action="<?php echo base_url('index.php/UserDoc/selectMaster'); ?>" method="post">
                    <div class="form-group">
                        <label>ชุดการประเมิน </label>
                        <select class="form-control" id="master_id">
                            <option value="">แสดงทั้งหมด</option>
                            <?php
                            foreach ($data_master_sar as $key => $value) {
                                ?>
                                <option value="<?php echo $value->id ?>" <?php if ($value->id == $master_id) echo "selected" ?> > <?php echo $value->desc ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </form>

            </div>

        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        เอกสารในระบบ
                        <span class="pull-right" >
                            <a href="<?= base_url("index.php/AdminControl/ShowFormAdduser") ?> ">
                                <i class="fa fa-plus-square fa-2x"></i>
                            </a>

                        </span>
                    </div>

                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="example">
                                <thead>
                                    <tr>

                                        <th>#</th>
                                        <th style="width: 15%">ชื่อเอกสาร</th>
                                        <th>ที่อยู่เอกสาร</th>
                                        <th>ประเภทเอกสาร</th>
                                        <th style="width: 15%">สมาชิก</th>
                                        <th style="width:5%">ลบ</th>
                                    </tr>
                                </thead>

                            </table>
                        </div>
                        <!-- /.table-responsive -->
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

<div class="modal fade" id="EditModal" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">คำเตือน คุณกำลังพยายามลบ</h4>

            </div>

            <div class="modal-body">
                <p>ต้องการจะลบเอกสารนี้ ใช่หรือไม่</p>
            </div>
            <div class="modal-footer">
                <a href="#" id="confirm" class="btn confirm">ใช่</a>
                <a href="#" data-dismiss="modal" aria-hidden="true" class="btn secondary">ไม่</a>
            </div>


        </div>
    </div>
</div>
</div>

<script src="<?php echo base_url("/assets/js/jquery.js"); ?>"></script>
<script>
    $('#master_id').change(function () {
        value_select = $('#master_id').val();
        var initialPage = "UserManageDoc/ShowManageDoc/";
        location.replace("<?php echo base_url(); ?>" + initialPage + value_select);
    });


    $(document).ready(function () {
        drawTable('<?php echo $master_id ?>'); // send Null data
    });
    function drawTable(master_id) {
        var table = $('#example').DataTable({
            "ordering": false,
            "sAjaxSource": "<?php echo base_url('index.php/UserManageDoc/getAllDocMember'); ?>/" + master_id, //datasource
            "sAjaxDataProp": "data",
            "columns": [
                {"data": "doc_id"},
                {"data": "docname"},
                {"data": "link_path"},
                {"data": "type"},
                {"data": "username"}
            ],
            "columnDefs": [
                {
                    "targets": [5],
                    "defaultContent": "<button class='btn btn-info btn-circle' type='button' id='delete'><i class='fa fa-trash'></i></button> "
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
                    "targets": 2
                }
            ]
        });
        // Draw index


        table.on('click', '#delete', function () {
            /* get data onclick */
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            var data = row.data();
            console.log(data);

            $('#EditModal').find('.modal-footer #confirm').on('click', function () {
                $.post("<?php echo base_url('index.php/UserManageDoc/deletedoc'); ?>",
                        {"doc_id": data.doc_id,"filename":data.filename, check: "true"},
                function (data, textStatus, jqXHR) {
                    console.log(data);
                }).fail(function (jqXHR, textStatus, errorThrown) {

                    /* $('.modal').modal('hide');
                     $('#info_data').addClass("alert alert-danger");
                     $('#info_data').html("Delete Fail".textStatis);
                     $('#info').modal('show');
                     */
                });
            });

            $('#EditModal').modal('show');


        });


        table.on('order.dt search.dt', function () {
            table.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
                cell.innerHTML = i + 1;
            });
            table.column(5, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
                //console.log(cell);
                if (cell.innerHTML == 0) {
                    cell.innerHTML = "<button class='btn btn-success btn-circle' type='button' id='status'><i class='fa fa-check'></i></button>";
                } else if (cell.innerHTML == 1) {
                    cell.innerHTML = "<button class='btn btn-danger btn-circle' type='button' id='status'><i class='fa fa-ban'></i></button>";
                }
            });
        }).draw();
    }

    function updateData() {
        var formData = $("#formUpdateUser").serializeArray();
        var URL = $("#formUpdateUser").attr("action");
        //console.log(formData);
        $.post(URL, formData,
                function (data, textStatus, jqXHR) {
                    //console.log(data);
                    location.reload();
                        }).fail(function (jqXHR, textStatus, errorThrown) {
            alert("พบข้อผิดพลาด");
        });
    }

</script>


