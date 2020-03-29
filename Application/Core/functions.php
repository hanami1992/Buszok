<?php


function view($datas)
{
    extract($datas);
    unset($datas);
    require_once APPPATH. 'Templates/_layout.php';
}

function getConfig($configPath)
{
    return json_decode(file_get_contents($configPath), true);
}

function getConnection($config)
{
    try 
    {
        $pdo = new PDO(
            "mysql:host={$config['hostName']};dbname={$config['database']};charset=utf8",
            $config['userName'],
            $config['password']
        );

        return $pdo;
    }
    catch (PDOException $e)
    {
        return false;
    }
}

?>