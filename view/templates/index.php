<?php include "common_head.php";?>
<body>
    <div id="contain" style="display: none;">
        <div class="container-fluid">
    	<div class="row">
    		<div class="col-md-12">
    			<div class="page-header" style="margin-top: 100px;">
    				<h1>
    					Books-Dev.com <small>Sistema de administración de libros</small>
    				</h1>
    			</div>
    			<nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
    				<div class="navbar-header">
    					 
    					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
    						 <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
    					</button> <a class="navbar-brand" href="/">Books-Dev.com</a>
    				</div>
    				
    				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    					<ul class="nav navbar-nav">
    						<!-- <li class="active">
    							<a href="#">Link</a>
    						</li>
    						<li>
    							<a href="#">Link</a>
    						</li> -->
    						<li class="dropdown">
    							 <a href="#" class="dropdown-toggle" data-toggle="dropdown">Libros<strong class="caret"></strong></a>
    							<ul class="dropdown-menu">
    								<li>
    									<a href="libros/nuevo">Insertar</a>
    								</li>
    								<li>
    									<a href="libros/lista">Lista de libros</a>
    								</li>
    								<!-- <li>
    									<a href="#">Something else here</a>
    								</li>
    								<li class="divider">
    								</li>
    								<li>
    									<a href="#">Separated link</a>
    								</li>
    								<li class="divider">
    								</li>
    								<li>
    									<a href="#">One more separated link</a>
    								</li> -->
    							</ul>
    						</li>
    					
                            <li class="dropdown">
                                 <a href="#" class="dropdown-toggle" data-toggle="dropdown">Autores<strong class="caret"></strong></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#">Insertar</a>
                                    </li>
                                    <li>
                                        <a href="#">Lista de autores</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                 <a href="#" class="dropdown-toggle" data-toggle="dropdown">Editoriales<strong class="caret"></strong></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#">Insertar</a>
                                    </li>
                                    <li>
                                        <a href="#">Lista de editoriales</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>

    					<ul class="nav navbar-nav navbar-right">
    						<li>
    							<a href="#">Login</a>
    						</li>
    						<li class="dropdown">
    							 <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown<strong class="caret"></strong></a>
    							<ul class="dropdown-menu">
    								<li>
    									<a href="#">Sign-up</a>
    								</li>
    								<li>
    									<a href="#">Register</a>
    								</li>
    								<li>
    									<a href="#">Something else here</a>
    								</li>
    								<li class="divider">
    								</li>
    								<li>
    									<a href="#">Separated link</a>
    								</li>
    							</ul>
    						</li>
    					</ul>
    				</div>
    				
    			</nav>
    		</div>
    	</div>
    </div>
    </div>
        <?php include "common_foot.php";?>
</body>
</html>