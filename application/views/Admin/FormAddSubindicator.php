<div id="page-wrapper">
    <div class="row">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">เกณฑ์การประเมิน</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">                  
                    <div class="panel-heading">
                     
                        <form role="form" action="<?php echo base_url(); ?>AdminPanel/AddSubindicator" method="post">
                            <div class="form-group">
                                <label>เกณฑ์การประเมิน</label>
                                <textarea  class="ckeditor form-control" name = "detail" rows="3">
                                
                                </textarea>
                                <div id="txtEditor"></div>

                            </div>
                            <div class="form-group">
                                <input type="hidden" name="indicator_id" value ="<?php echo $indicator->indicator_id; ?>"> 
                                
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
<script type="text/javascript" src="<?php echo base_url("assets/ckeditor/ckeditor.js"); ?>"></script></div>
