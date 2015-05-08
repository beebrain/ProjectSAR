<?php
/* print_r($composition);
  print_r($indicator);
  print_r($subindicator); */
?>
<div id="page-wrapper">
    <div class="row">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">รายละเอียดตัวบ่งชี้</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">                  
                    <div class="panel-heading">  <?php echo $composition->maintitle . " " . $composition->title; ?> </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-2"><p>ตัวบ่งชี้<?php echo " " . $indicator->indicator_num; ?></p></div>
                            <div class="col-lg-10"><p><?php echo $indicator->indicator_title; ?></p></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2"><p>ชนิดตัวบ่งชี้ </p></div>
                            <div class="col-lg-10"><p><?php echo $indicator->indicator_type; ?></p></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2"><p>ใช้กับ</p></div>
                            <div class="col-lg-10"><p><?php
                                    if ($indicator->data_use == "1") {
                                        echo "ปีการศึกษา";
                                    } else if ($indicator->data_use == "2") {
                                        echo "ปีงบประมาณ";
                                    } else {
                                        echo "ปีปฏิทิน";
                                    }
                                    ?></p></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2"><p>เกณฑ์การประเมิน</p></div>
                            <div class="col-lg-10"><p><?php echo $indicator->detail; ?></p></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2"><p>เกณฑ์มาตรฐาน</p></div>
                            <div class="col-lg-10"><p><?php
                                    if ($indicator->citeria == "1") {
                                        echo "ข้อ";
                                    } else {
                                        echo "เชิงปริมาณ";
                                    }
                                    ?></p></div>
                        </div>



                    </div>
                </div>
            </div>
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">                  
                    <div class="panel-heading">เกณฑ์การประเมิน 
                        <span class="pull-right">
                            <a  href ="#" data-target="#myModal" data-toggle="modal" ><i class="fa fa-plus-square fa-lg"></i></a>
                        </span>

                    </div>

                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th width="10%">#</th>
                                        <th>รายละเอียด</th>
                                        <th width="5%">แก้ไข</th>
                                        <th width="5%">ลบ</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach ($subindicator as $value) {
                                        $i++;
                                        ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $value->detail; ?></td>
                                            <td><i  class="fa fa-pencil fa-lg"></i></td>
                                            <td><i class="fa fa-plus-square fa-lg"></i></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
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

<!-- Modal PopUP-->
<div id="myModal" class="modal fade" aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" aria-hidden="true" data-dismiss="modal" type="button">×</button>
                <h4 class="modal-title" id="myModalLabel">แก้ไขหัวข้อการประเมิณ</h4>
            </div>
            <form role="form" action="<?php echo base_url("index.php/AdminPanel/AddSubindicator"); ?>" method="post">
                <div class="modal-body">


                    <div class="form-group">
                        <label>เกณฑ์การประเมิน</label>
                        <textarea  class="ckeditor form-control" name = "detail" rows="3">
                        </textarea>
                        <div id="txtEditor"></div>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="indicator_id" value ="<?php echo $indicator->indicator_id; ?>"> 

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-default right">Submit Button</button>
                        <button class="btn btn-default" data-dismiss="modal" type="button">Close</button>

                    </div>
            </form>

        </div>
    </div>
</div>

<script type="text/javascript" src="<?php echo base_url("assets/CKeditor/ckeditor.js"); ?>"></script></div>
