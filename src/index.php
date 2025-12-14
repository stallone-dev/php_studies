<?php

declare(strict_types=1);

$host = 'db';
$db = 'phpstudiesdb';
$user = 'tux';
$pass = 'studies123';
$port = "5432";

try {
    $dsn = "pgsql:host=$host;port=$port;dbname=$db;";
    $pdo = new PDO($dsn, $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

    $version = $pdo->query("SELECT version()")->fetchColumn();
    $sql = "SELECT name, setting FROM pg_settings";
    $config = $pdo->query($sql)->fetchAll(PDO::FETCH_KEY_PAIR);

    echo "<h3>Versão do PostgreSQL:</h3>";
    echo "<pre>$version</pre>";

    echo "<h3>Configurações Importantes:</h3>";
    echo "<ul>";
    echo "<li><strong>Max Connections:</strong> " . $config['max_connections'] . "</li>";
    echo "<li><strong>Timezone:</strong> " . $config['TimeZone'] . "</li>";
    echo "<li><strong>Data Directory:</strong> " . $config['data_directory'] . "</li>";
    echo "</ul>";

} catch (PDOException $e) {
    echo $e->getMessage();
}
