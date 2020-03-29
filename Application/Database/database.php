<?php 
function getBuses(PDO $pdo): array
{
    $smt = $pdo->prepare('SELECT * FROM `busz`');

    try {
        if(!$smt->execute())
        {
            throw new RuntimeException($smt->errorInfo() [2]);
        }
        return $smt->fetchAll(PDO::FETCH_NUM);
    } 
    catch (RuntimeException $e) 
    {
        return[];
    }
}

function getTestes(PDO $pdo, $id):array
{
    $smt = $pdo->prepare('SELECT * FROM `szerviz` WHERE buszId = :id');

    $smt->bindParam(':id', $id);

    try {
        if(!$smt->execute())
        {
            throw new RuntimeException($smt->errorInfo()[2]);
        }

        return $smt->fetchAll(PDO::FETCH_NUM);
    }
    catch (RuntimeException $e) 
    {
        return [];
    }
}

function getBus($pdo, $id)
{
    $smt = $pdo->prepare('SELECT * FROM `busz` WHERE id = :id');

    $smt-> bindParam(':id', $id);

    try {
        if(!$smt->execute())
        {
            throw new RuntimeException($smt->errorInfo() [2]);
        }

        return $smt->fetch();
    }
    catch (RuntimeException $e) 
    {
        return false;
    }
}

function updateBus($pdo, $bus)
{
    extract($bus);

    $smt = $pdo->prepare('UPDATE `busz` 
                            SET `indulas`= :indulas, 
                                `cel` = :cel, 
                                `menetido` = :menetido, 
                                `alacsony` = :low 
                            WHERE `id` = :id');
    
    $smt->bindParam(':id', $id);
    $smt->bindParam(':indulas', $indulas);
    $smt->bindParam(':cel', $cel);
    $smt->bindParam(':menetido', $menetido);
    $smt->bindParam(':low', $alacsony);

    try 
    {
        if(!$smt->execute())
        {
            throw new RuntimeException($smt->errorInfo()[2]);
        }

        return true;
    } 
    catch (RuntimeException $e) 
    {
        return false;
    }
}
?>