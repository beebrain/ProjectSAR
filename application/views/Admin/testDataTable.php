<html>
    <head>

    </head>
    <body>
        <table id="example">
            <thead>
                <tr><th>Sites</th></tr>
            </thead>
            <tbody>
                <tr><td>SitePoint</td></tr>
                <tr><td>Learnable</td></tr>
                <tr><td>Flippa</td></tr>
            </tbody>
        </table>

        <script src="<?php echo base_url("/assets/js/jquery.js"); ?>"></script>
        <script src="<?php echo base_url("/assets/js/jquery.dataTables.js"); ?>"></script>
        <script>
            $(function () {
                $("#example").dataTable();
            })
        </script>
        
        <!-- Bootstrap Core JavaScript 
        <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script> -->
        <script src="<?php echo other_asset_url("bower_components/bootstrap/dist/js/bootstrap.min.js"); ?>"></script>

        <!-- Metis Menu Plugin JavaScript 
        <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script> -->
        <script src="<?php echo other_asset_url("bower_components/metisMenu/dist/metisMenu.min.js"); ?>"></script>



        <!-- Custom Theme JavaScript 
        <script src="../dist/js/sb-admin-2.js"></script>-->
        <script src="<?php echo other_asset_url("dist/js/sb-admin-2.js"); ?>"></script>

    </body>

</html>