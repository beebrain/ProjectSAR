<style>

/* Overlays */
.ui-widget-overlay {
	position: fixed;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
}

.ui-autocomplete {
	position: absolute;
	top: 0;
	left: 0;
	cursor: default;
}

.ui-menu {
	list-style: none;
	padding: 0;
	margin: 0;
	display: block;
	outline: none;
}
.ui-menu .ui-menu {
	position: absolute;
}
.ui-menu .ui-menu-item {
	position: relative;
	margin: 0;
	padding: 3px 1em 3px .4em;
	cursor: pointer;
	min-height: 0; /* support: IE7 */
	/* support: IE10, see #8844 */
	list-style-image: url("data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7");
}
.ui-menu .ui-menu-divider {
	margin: 5px 0;
	height: 0;
	font-size: 0;
	line-height: 0;
	border-width: 1px 0 0 0;
}
.ui-menu .ui-state-focus,
.ui-menu .ui-state-active {
	margin: -1px;
}

/* icon support */
.ui-menu-icons {
	position: relative;
}
.ui-menu-icons .ui-menu-item {
	padding-left: 2em;
}

/* left-aligned */
.ui-menu .ui-icon {
	position: absolute;
	top: 0;
	bottom: 0;
	left: .2em;
	margin: auto 0;
}

/* right-aligned */
.ui-menu .ui-menu-icon {
	left: auto;
	right: 0;
}

/* Component containers
----------------------------------*/
.ui-widget {
	font-family: Verdana,Arial,sans-serif;
	font-size: 1.1em;
}
.ui-widget .ui-widget {
	font-size: 1em;
}
.ui-widget-content {
	border: 1px solid #aaaaaa;
	background: #ffffff  50% 50% repeat-x;
	color: #222222;
}


.ui-state-hover,
.ui-widget-content .ui-state-hover,
.ui-widget-header .ui-state-hover,
.ui-state-focus,
.ui-widget-content .ui-state-focus,
.ui-widget-header .ui-state-focus {
	border: 1px solid #999999;
	background: #dadada 50% 50% repeat-x;
	font-weight: normal;
	color: #212121;
}

.ui-state-active,
.ui-widget-content .ui-state-active,
.ui-widget-header .ui-state-active {
	border: 1px solid #aaaaaa;
	background: #ffffff 50% 50% repeat-x;
	font-weight: normal;
	color: #212121;
}



</style>

<div id="page-wrapper">
    
    
    <div class="row">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">จัดการผู้รับผิดชอบผู้ถูกประเมิน</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        ค้นหาผู้ประเมิน
                    </div>

                    <!-- /.panel-heading -->
                    <div class="panel-body">

                        <div class="form-group">
                            <label>ค้นหาผู้ประเมิน</label>
                            <div class="form-group input-group">
                                <input type="text" class="form-control" id="tags">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button"><i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        เลือกผู้ถูกประเมิณ

                    </div>

                    <!-- /.panel-heading -->
                    <div class="panel-body">



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



</div>

<script src="<?php echo base_url("/assets/js/jquery.js"); ?>"></script>
<script src="<?php echo base_url("/assets/js/jquery-ui.js"); ?>"></script>
  
<script>
    $(document).ready(function () {
        var availableTags = [
            "ActionScript",
            "AppleScript",
            "Asp",
            "BASIC",
            "C",
            "C++",
            "Clojure",
            "COBOL",
            "ColdFusion",
            "Erlang",
            "Fortran",
            "Groovy",
            "Haskell",
            "Java",
            "JavaScript",
            "Lisp",
            "Perl",
            "PHP",
            "Python",
            "Ruby",
            "Scala",
            "Scheme"
        ];
        var $searchBox = $('#tags');
        $searchBox.autocomplete({
            source: availableTags
        });
    });


</script>


