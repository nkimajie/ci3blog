<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Users</title>
</head>
<body>
<?php foreach($users as $object): ?>
    <h1><?= $object->username . "<br>"; ?></h1>
<?php endforeach; ?>
    
</body>
</html>