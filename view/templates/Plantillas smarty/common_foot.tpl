    <div id="loadingMessage">
        <!-- <p><b>Cargando...</b></p> -->
        <div class="message">        
            <img src="/img/loading.gif" style="width: 100px;">   
        </div>
    </div>
    
    {foreach $scripts as $script}
        <script src="{$script}"></script>
    {/foreach}
    {if isset($scripts_extra)}
        {foreach $scripts_extra as $script}
            <script src="{$script}"></script>
        {/foreach}
    {/if}
    