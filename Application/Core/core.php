<?php

$controller = $page.'Controller';

if(function_exists($controller))
{
    $controller();
}
else
{
    notFoundController();
}

?>