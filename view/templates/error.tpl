{include file="common_head.tpl"}
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
                        {$mensaje}
                    </p>
                    <p style="text-align: center;">
                        <a class="btn btn-primary btn-large" href="javascript:window.history.back();">Volver</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
    {include file="common_foot.tpl"}
</body>