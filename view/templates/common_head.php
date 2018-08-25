<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $titulo;?></title>

    <meta name="description" content="{$titulo}">
    <meta name="author" content="Angel Gimenez">
    <?php
        foreach ($styles as $style) {
            echo '<link href="'.$style.'" rel="stylesheet">';
        }
    ?>
  </head>