
<style>
    td.details-control {
        background: red;
        cursor: pointer;
    }
    tr.shown td.details-control {
        background: black;
    }
</style>
<div id="page-wrapper">
    <div class="row">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">รายชื่อผู้ประเมิณ</h1>

            </div>

        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-blue">
                    <div class="panel-heading">
                        รายชื่อผู้ประเมิณ
                        <span class="pull-right" >
                            <a href="<?= base_url("index.php/AdminControl/ShowFormAddRef") ?> ">
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
                                        <th style="width: 15%">username</th>
                                        <th>รายละเอียด</th>
                                        <th style="width: 7%">ใช้งาน</th>
                                        <th style="width: 10%">แก้ไข/ลบ</th>
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
                <h4 class="modal-title" id="myModalLabel">แก้ไขรายละเอียดผู้ประเมิณ</h4>
            </div>
            <form role="form" id = "formUpdateUser" action="<?php echo base_url('index.php/AdminControl/UpdateRef'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Username</label>
                        <input class="form-control " disabled=""  id = "username" name = "username" value="aaa"> 
                        <input type="hidden" class="form-control" id = "ref_id" name = "ref_id">
                    </div>
                    <div class="form-group">
                        <label>รายละเอียดผู้ใช้งาน</label>
                        <input class="form-control" id="detail" name="detail">
                    </div>

                    <div class="form-group">
                        <label>Password (หากไม่ต้องการเปลี่ยน Password ให้เว้นไว้)</label>
                        <input class="form-control" id = "password2" name = "password2">
                        <input type="hidden" class="form-control" id = "password" name = "password">
                    </div>
                </div>
                <div class="modal-footer">
                    <span style="alignment-adjust: central">
                        <button type="button" onclick="updateData()" class="btn btn-default " data-dismiss="modal">บันทึก</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>


</div>

<script src="<?php echo base_url("/assets/js/jquery.js"); ?>"></script>
<script>
                            $(document).ready(function () {
                                var table = $('#example').DataTable({
                                    "ordering": false,
                                    "sAjaxSource": "<?php echo base_url('index.php/AdminControl/getAllRef'); ?>", //datasource
                                    "sAjaxDataProp": "Data", //menentukan array/json dibaca dari mana
                                    "columns": [
                                        {"data": "ref_id"},
                                        {"data": "username"},
                                        {"data": "detail"},
                                        {"data": "status"}
                                    ],
                                    "columnDefs": [
                                        {
                                            "targets": [4],
                                            "defaultContent": "<button class='btn btn-info btn-circle' type='button' id='edit'><i class='fa fa-edit'></i></button> <button class='btn btn-danger btn-circle pull-right' id='delete'><i class='fa fa-trash'></i></button>"
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

                                table.on('order.dt search.dt', function () {
                                    table.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
                                        cell.innerHTML = i + 1;
                                    });
                                    table.column(3, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
                                        //console.log(cell);
                                        if (cell.innerHTML == 0) {
                                            cell.innerHTML = "<button class='btn btn-success btn-circle' type='button' id='status'><i class='fa fa-check'></i></button>";
                                        } else if (cell.innerHTML == 1) {
                                            cell.innerHTML = "<button class='btn btn-danger btn-circle' type='button' id='status'><i class='fa fa-ban'></i></button>";
                                        }
                                    });
                                }).draw();

                                table.on('click', '#edit', function () {
                                    /* get data onclick */
                                    var tr = $(this).closest('tr');
                                    var row = table.row(tr);
                                    var data = row.data()
                                    //console.log(data);

                                    $("#ref_id").val(data.ref_id);
                                    $("#username").val(data.username);
                                    $("#detail").val(data.detail);
                                    $("#password").val(data.password);
                                    $('#EditModal').modal('show');
                                });

                                table.on('click', 'a', function () {
                                    /* get data onclick */
                                    var tr = $(this).closest('tr');
                                    var row = table.row(tr);
                                    var data = row.data()
                                    console.log(data);
                                    var url = "<?php echo base_url('index.php/AdminControl/ShowRefToUser/') ?>/"+data.ref_id;
                                    $(location).attr('href', url);
                                    return false;
                                });

                                // update status
                                table.on('click', '#status', function () {
                                    var tr = $(this).closest('tr');
                                    var row = table.row(tr);
                                    var data = row.data();
                                    var status = parseInt(data.status);

                                    status = (status + 1) % 2;
                                    console.log(data);
                                    console.log(status);
                                    //console.log(status);
                                    $.post("<?php echo base_url("/index.php/AdminControl/UpdateRef") ?>",
                                            {"ref_id": data.ref_id, "status": status},
                                    function (data, textStatus, jqXHR) {

                                        location.reload();
                                            }).fail(function (jqXHR, textStatus, errorThrown)
                                            {
                                        alert("พบข้อผิดพลาด กรุณาติดต่อผู้พัฒนา");
                                    });

                                });

                                table.on('click', '#delete', function () {
                                    var tr = $(this).closest('tr');
                                    var row = table.row(tr);
                                    var data = row.data()
                                    var r = confirm("คุณ ยืนยันที่จะลบ " + data.username);
                                    if (r == true) {
                                        $.post("<?php echo base_url("/index.php/AdminControl/UpdateRef") ?>",
                                                {"ref_id": data.ref_id, "status": "-1"},
                                        function (data, textStatus, jqXHR) {
                                            //console.log(data);
                                            location.reload();
                                                }).fail(function (jqXHR, textStatus, errorThrown)
                                                {
                                            alert("พบข้อผิดพลาด");
                                        });
                                    }
                                });
                            });

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


