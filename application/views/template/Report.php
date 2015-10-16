<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">รายงานการประเมิน</h1>
            <blockquote>
                <p><?php
                    //print_r($data_all);
                    ?> </p>
            </blockquote>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    
    <div class="row">
        <div class="col-lg-12">

            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        คะแนนประเมิน
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in">
                     
                                <table class="table table-bordered" style="margin: 0px">
                                    <thead>
                                        <tr>
                                            <th>asdfasdf</th>
                                            <th>asdfasdf</th>
                                            <th>asdfasdf</th>
                                        </tr>

                                    </thead>
                                    <tr>
                                        <td >
                                            sdfasdf
                                        </td>
                                        <td >
                                            asdfasdf
                                        </td>
                                        <td >
                                            asdfasdf

                                        </td>
                                    </tr>
                                </table>
                          
                    </div>
                </div>
            </div>



            <!-- /.panel -->
        </div>
    </div>

</div>
<!-- /#page-wrapper -->
<?php echo js_asset("jquery-2.0.2.min.js"); ?>
<script language="javascript" type="text/javascript" src="<?php echo base_url('assets/flot/jquery.flot.js') ?>"></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url('assets/flot/jquery.flot.categories.js') ?>"></script>

<script type="text/javascript">

    $(function () {

        var data = [["January", 4], ["February", 2], ["March", 1], ["April", 3], ["May", 0], ["June", 1.2]];

        $.plot("#graph_plot", [data], {
            series: {
                bars: {
                    show: true,
                    barWidth: 0.1,
                    align: "center",
                    fill: true,
                    fillColor: {colors: [{opacity: 0.8}, {opacity: 0.1}]}
                }
            },
            xaxis: {
                mode: "categories",
                tickLength: 0
            }
        });
    });

</script>


