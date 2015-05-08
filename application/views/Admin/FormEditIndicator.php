<div id="page-wrapper">
    <div class="row">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">แก้ตัวบ่งชี้</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">                  
                    <div class="panel-heading">  <?php echo $composition->maintitle . " " . $composition->title; ?> </div>
                    <div class="panel-body">
                        <form role="form" action="<?php echo base_url("index.php/AdminPanel/EditIndicator"); ?>" method="post">
                            <div class="form-group">
                                <label>ใช้กับ</label>
                                <select class="form-control" name = "used">
                                    <option value="1" <?php if ($indicator->data_use=="1"){echo "selected";} ?> > ปีการศึกษา</option>
                                    <option value="2" <?php if ($indicator->data_use=="2"){echo "selected";} ?> > ปีงบประมาณ</option>
                                    <option value="3" <?php if ($indicator->data_use=="3"){echo "selected";} ?> > ปีปฏิทิน</option>                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label>ข้อที่ :</label>
                                <input class="form-control" name = "number" value="<?php echo $indicator->indicator_num; ?>">
                            </div>
                            <div class="form-group">
                                <label>ชื่อตัวบ่งชี้ :</label>
                                <input class="form-control" name = "title" value="<?php echo $indicator->indicator_title;?>">
                            </div>
                            <div class="form-group">
                                <label>ชนิดของตัวบ่งชี้ :</label>
                                <input class="form-control" name = "type" value="<?php  echo $indicator->indicator_type;?>">
                            </div>
                            <div class="form-group">
                                <label>เกณฑ์การประเมิน</label>
                                <textarea  class="ckeditor form-control" name = "detail" rows="3">
                                <?php echo $indicator->detail;?>
                                </textarea>
                                <div id="txtEditor"></div>

                            </div>
                            <div class="form-group">
                                <label>เกณฑ์มาตรฐาน :</label>
                                <select class="form-control" id="citeria" name="citeria">
                                    <option value="1" <?php if ($indicator->citeria=="1"){echo "selected";} ?> >  ข้อ</option>
                                    <option value="2" <?php if ($indicator->citeria=="2"){echo "selected";} ?> >  เชิงปริมาณ</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="composition_id" value ="<?php echo $composition->id; ?>"> 
                                <input type="hidden" name="year" value ="2558"> 
                                <input type="hidden" name="indicator_id" value="<?php echo $indicator->indicator_id; ?>">
                            </div>
                            <button type="submit" class="btn btn-default right">Submit Button</button>
                            <button type="reset" class="btn btn-default right">Reset Button</button>
                        </form>
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
<div class="row">
</div>
</div>
<script type="text/javascript" src="<?php echo base_url("assets/CKeditor/ckeditor.js"); ?>"></script></div>
