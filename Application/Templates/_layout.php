<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buszok - <?= $title ?></title>
    <link rel="stylesheet" href="<?=APPPATH?>Style/style.css" type="text/css">
</head>
<body>
    <?php require_once APPPATH. "Templates/headerView.php"?>
    <?php require_once APPPATH. "Templates/{$view}View.php"?>
</body>
</html>