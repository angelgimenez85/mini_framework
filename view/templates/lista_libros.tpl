{include file="common_head.tpl"}
<body>
    <h1>{$titulo}</h1>
    {foreach $libros as $libro}  
        {$libro->getId()}<br/>
        {$libro->getTitulo()}<br/><br/><br/>
    {/foreach}    
    {include file="common_foot.tpl"}
</body>
</html>