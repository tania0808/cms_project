<?php

try {

    $database_connection = new PDO('mysql:host=localhost;dbname=cms;charset=utf8',
        'root',
        'root',
        [
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    echo "Connected ! 🥰";
}
catch (PDOException $e) {
    print 'Erreur !: ' . $e->getMessage() . '<br/>';
}
