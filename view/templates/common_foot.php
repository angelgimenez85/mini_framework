    <div id="loadingMessage">
        <!-- <p><b>Cargando...</b></p> -->
        <div class="message">        
            <img src="/img/loading.gif" style="width: 100px;">   
        </div>
    </div>
    
    <?php 
        foreach ($scripts as $script) {
            echo '<script src="'.$script.'"></script>';
        }
        if (isset($scripts_extra) {
            foreach ($scripts_extra as $script) {
                echo '<script src="'.$script.'"></script>';
            }
        }
    ?>