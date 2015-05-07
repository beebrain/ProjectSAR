<div id="page-wrapper">
    <div class="row">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">เพิ่มองค์ประเมิน</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="panel-body">
            <div class="row">
  
                <div class="col-md-6 col-md-offset-3">
                    <form role="form" action="<?php echo base_url('/AdminController/AddComposition'); ?>" method="post">
                        <div class="form-group">
                            <label>องค์ประกอบที่</label>
                            <input class="form-control" name="maintitle">
                        </div>
                        <div class="form-group">
                            <label>ชื่อองค์ประกอบ</label>
                            <input class="form-control" name = "title">
                        </div>
                        <button type="submit" class="btn btn-default right">Submit Button</button>
                        <button type="reset" class="btn btn-default right">Reset Button</button>
                    </form>
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


