<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EX003 - Date</title>
</head>
<body>
    <header>
        <h1>EX003 - Date</h1>
    </header>
    <main>
        <?php
            date_default_timezone_set("America/Sao_Paulo");
            $dataAtual = date("d/m/Y G:i:s");
            echo "<p>$dataAtual</p>";
        ?>
    </main>
</body>
</html>
