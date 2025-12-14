<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EX003 - Erros</title>
</head>
<body>
    <header>
        <h1>EX003 - Erros</h1>
    </header>
    <main>
        <?php
            date_default_timezone_set("America/Sao_Paulo");
            $message = date("d/m/Y G:i:s");
            // error
            eco "<p>$message</p>";
        ?>
    </main>
</body>
</html>
