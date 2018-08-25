<?php include "common_head.php";?>
<body>
<div id="contain" style="display: none;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron well">
                    <h2 style="text-align: center;">
                        Error!
                    </h2>
                    <p style="text-align: center;">
                        <?php echo $mensaje;?>
                    </p>
                    <p style="text-align: center;">
                        <a class="btn btn-primary btn-large" href="javascript:window.history.back();">Volver</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
    <?php include "common_foot.tpl";?>
</body>