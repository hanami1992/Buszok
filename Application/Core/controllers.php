<?php

function homeController()
{
    view([
        'title' => 'Home Page',
        'view' => 'home'
    ]);
}

function notFoundController()
{
    view([
        'title' => '404 Page Not Found',
        'view' => '_404'
    ]);
}

function allBusController()
{
    $config = getConfig(CONF_FILE_PATH);
    $pdo = getConnection($config);

    if(!$pdo)
    {
        echo "Something went wrong while page loaded";
        die;
    }

    $buses = getBuses($pdo);

    $pdo = null;

    view([
        'title' => 'Összes busz',
        'view' => 'allBus',
        'buses' => $buses
    ]);    
}

function testesController()
{
        $config = getConfig(CONF_FILE_PATH);
        $pdo = getConnection($config);
        $id = $_GET['id'];

        if(!$pdo)
        {
            echo "Something went wrong while page loaded";
            die;
        }
        $testes = getTestes($pdo, $id);

        $pdo = null;

        view([
            'title' => 'Összes teszt',
            'view' => 'testes',
            'testes' => $testes,
            'numOfTestes' => count($testes)
        ]);
}

function modifyBusFormController()
{
    $config= getConfig(CONF_FILE_PATH);
    $pdo = getConnection($config);
    $id = $_GET['id'];

    if(!$pdo)
    {
        echo "Something went wrong while page loaded";
        die;
    }

    extract(getBus($pdo, $id));

    $pdo = null;

    view([
        'title' => 'Buszjárat módostása',
        'view' => 'modifyBusForm',
        'indulas' => $indulas,
        'cel' => $cel,
        'menetido' => $menetido,
        'alacsony' => $alacsony,
        'id' => $id
    ]);
}

function modifyBusController()
{
    $config = getConfig(CONF_FILE_PATH);
    $pdo = getConnection($config);
    $datas = $_POST;

    if(!$pdo)
    {
        echo "Something went wrong while page loaded";
        die;
    }

    if(updateBus($pdo, $datas))
    {
        view([
            'title' => 'Sikeres Módosítás',
            'view' => 'successfulUpdate',
        ]);
        header('refresh: 2; url=index.php?p=allBus');
    }
    else
    {
        view([
            'title' => 'Sikertelen módosítás',
            'view' => 'unsuccessUpdate',
        ]);
        header('refresh: 2; url=index.php?p=modifyBusForm');
    }
    $pdo=null;
}

?>