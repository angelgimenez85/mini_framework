   
    {foreach $scripts as $script}
        <script src="{$script}"></script>
    {/foreach}
    {if isset($scripts_extra)}
        {foreach $scripts_extra as $script}
            <script src="{$script}"></script>
        {/foreach}
    {/if}
    