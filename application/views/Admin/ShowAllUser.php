
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
                <h1 class="page-header">เพิ่มผู้ใช้</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        DataTables Advanced Tables
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="example">
                                <thead>
                                    <tr>

                                        <th>#</th>
                                        <th>ชื่อผู้ใช้</th>
                                        <th>รายละเอียด</th>
                                        <th>ระดับ</th>
                                        <th>สถาณะ</th>
                                        <th>แก้ไข</th>
                                        <th>ลบ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="odd gradeX">
                                        <td>Trident</td>
                                        <td>Internet Explorer 4.0</td>
                                        <td>Win 95+</td>
                                        <td class="center">4</td>
                                        <td class="center">X</td>
                                    </tr>
                                    <tr class="even gradeC">
                                        <td>Trident</td>
                                        <td>Internet Explorer 5.0</td>
                                        <td>Win 95+</td>
                                        <td class="center">5</td>
                                        <td class="center">C</td>
                                    </tr>
                                    <tr class="odd gradeA">
                                        <td>Trident</td>
                                        <td>Internet Explorer 5.5</td>
                                        <td>Win 95+</td>
                                        <td class="center">5.5</td>
                                        <td class="center">A</td>
                                    </tr>
                                    <tr class="even gradeA">
                                        <td>Trident</td>
                                        <td>Internet Explorer 6</td>
                                        <td>Win 98+</td>
                                        <td class="center">6</td>
                                        <td class="center">A</td>
                                    </tr>
                                    <tr class="odd gradeA">
                                        <td>Trident</td>
                                        <td>Internet Explorer 7</td>
                                        <td>Win XP SP2+</td>
                                        <td class="center">7</td>
                                        <td class="center">A</td>
                                    </tr>
                                    <tr class="even gradeA">
                                        <td>Trident</td>
                                        <td>AOL browser (AOL desktop)</td>
                                        <td>Win XP</td>
                                        <td class="center">6</td>
                                        <td class="center">A</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Gecko</td>
                                        <td>Firefox 1.0</td>
                                        <td>Win 98+ / OSX.2+</td>
                                        <td class="center">1.7</td>
                                        <td class="center">A</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Gecko</td>
                                        <td>Firefox 1.5</td>
                                        <td>Win 98+ / OSX.2+</td>
                                        <td class="center">1.8</td>
                                        <td class="center">A</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Gecko</td>
                                        <td>Firefox 2.0</td>
                                        <td>Win 98+ / OSX.2+</td>
                                        <td class="center">1.8</td>
                                        <td class="center">A</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Gecko</td>
                                        <td>Firefox 3.0</td>
                                        <td>Win 2k+ / OSX.3+</td>
                                        <td class="center">1.9</td>
                                        <td class="center">A</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Gecko</td>
                                        <td>Camino 1.0</td>
                                        <td>OSX.2+</td>
                                        <td class="center">1.8</td>
                                        <td class="center">A</td>
                                    </tr>

                                </tbody>
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
                <h4 class="modal-title" id="myModalLabel">แก้ไขการประกันคุณภาพ</h4>
            </div>
            <form role="form" id = "Adduser" action="<?php echo base_url('index.php/AdminControl/AddUser'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Username</label>
                        <input class="form-control "disabled=""  value="aaa"> 
                    </div>
                    <div class="form-group">
                        <label>รายละเอียดผู้ใช้งาน</label>
                        <input class="form-control" id="detail">
                    </div>

                    <div class="form-group">
                        <label>Password (หากไม่ต้องการเปลี่ยน Password ให้เว้นไว้)</label>
                        <input class="form-control" id = "password2">
                        <input type="hidden" class="form-control" id = "password">
                    </div>
                    <div class="form-group">
                        <label>ระดับการเข้าใช้งาน</label>
                        <select class="form-control" id="level">
                            <option value="0">กรุณาเลือกระดับการเข้าใช้งาน</option>
                            <option value="1">ระดับมหาวิทยาลัย</option>
                            <option value="2">ระดับภาควิชา</option>
                            <option value="3">ระดับคณะ</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <span style="alignment-adjust: central">
                        <button type="button" onclick="sendData()" class="btn btn-default ">บันทึก</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>


</div>

<script src="<?php echo base_url("/assets/js/jquery.js"); ?>"></script>
<script src="<?php echo base_url("/assets/js/jquery.dataTables.js"); ?>"></script>
<script>
                            $(document).ready(function () {
                                var table = $('#example').DataTable({
                                    "ordering": false,
                                    "sAjaxSource": "<?php echo base_url('index.php/AdminControl/getAllUser'); ?>", //datasource
                                    "sAjaxDataProp": "Data", //menentukan array/json dibaca dari mana
                                    "columns": [
                                        {"data": "username"},
                                        {"data": "username"},
                                        {"data": "detail"},
                                        {"data": "level"},
                                        {"data": "user_id"}
                                    ],
                                    "columnDefs": [
                                        {
                                            "targets": [5],
                                            "defaultContent": "<button class='btn btn-info' type='button' id='edit'>แก้ไข</button>"
                                        },
                                        {
                                            "targets": [6],
                                            "defaultContent": "<button class='btn btn-danger' type='button' id='delete'>ลบ</button>"
                                        },
                                        {
                                            "targets": [0],
                                            "searchable": false,
                                            "orderable": false
                                        }
                                    ]
                                });
                                table.on('order.dt search.dt', function () {
                                    table.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
                                        cell.innerHTML = i + 1;
                                    });
                                }).draw();

                                table.on('click', '#edit', function () {
                                    var tr = $(this).closest('tr');
                                    var row = table.row(tr);
                                    var data = row.data()

                                    $('#EditModal').modal('show');
                                });


                                table.on('click', '#delete', function () {
                                    var tr = $(this).closest('tr');
                                    var row = table.row(tr);
                                    var data = row.data()
                                    var r = confirm("คุณ ยืนยันที่จะลบ " + data.username);
                                    if (r == true) {
                                        $.post("<?php echo base_url("/index.php/AdminControl/UpdateUser") ?>",
                                                {"user_id": data.user_id, "status": "-1"},
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
</script>


