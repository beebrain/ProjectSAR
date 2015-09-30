<div id="page-wrapper">
    <div class="row">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">เพิ่มตัวบ่งชี้</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>

        <div class="row">

            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"> องค์ประกอบที่ <?php echo $result->maintitle . " " . $result->title; ?> </div>
                    <div class="panel-body">
                        <form id="addindicator" role="form" action="<?php echo base_url('index.php/AdminPanel/AddIndicator'); ?>" method="post">
                            <div class="form-group">
                                <label>ใช้กับ</label>
                                <select class="form-control" name = "used">
                                    <option value="1"> ปีการศึกษา</option>
                                    <option value="2"> ปีงบประมาณ</option>
                                    <option value="3"> ปีปฏิทิน</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>ข้อที่ :</label>
                                <input class="form-control" name = "number">
                            </div>
                            <div class="form-group">
                                <label>ชื่อตัวบ่งชี้ :</label>
                                <input class="form-control" name = "title">
                            </div>
                            <div class="form-group">
                                <label>ชนิดของตัวบ่งชี้ :</label>
                                <input class="form-control" name = "type">
                            </div>

                            <div class="form-group">
                                <label>เกณฑ์การประเมิน</label>
                                <textarea  class="ckeditor form-control" name = "detail" rows="3">
                                
                                </textarea>
                                <div id="txtEditor"></div>

                            </div>
                            <div class="form-group">
                                <label>เกณฑ์มาตรฐาน :</label>
                                <select class="form-control" name="citeria">
                                    <option value="1">ข้อ</option>
                                    <option value="2">เชิงปริมาณ</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <input type="hidden" name="composition_id" value ="<?php echo $result->id; ?>"> 
                                <input type="hidden" name="year" value ="2558"> 
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
<script src="<?php echo base_url("/assets/js/jquery.js"); ?>"></script>
<script src="<?php echo base_url("/assets/js/jquery-ui.js"); ?>"></script>
<?php echo js_asset("jquery.validate.js"); ?>
<script>

    $("document").ready(function () {
        $("#addindicator").validate({
            rules: {
                number: "required",
                title: "required",
                type: "required",
            },
            messages: {
                number: "<p class='text-danger'>กรุณากรอกเลขที่ตัวชี้วัด</p>",
                title: "<p class='text-danger'>กรุณากรอกชื่อตัวชี้วัด</p>",
                type: "<p class='text-danger'>กรุณากรอกชนิดตัวชี้วัด</p>"
            }
        });


    });</script>
