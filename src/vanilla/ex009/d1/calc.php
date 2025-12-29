<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css"
    >
    <title>D01/R - Sucessor e antecessor</title>
</head>
<body>
    <header class="container">
        <h1>D01/R - Sucessor e antecessor</h1>
    </header>

    <main class="container">
        <?php
            // Lidando com UTF-8 conforme recomendações do https://br.phptherightway.com/#php_e_utf8
            mb_internal_encoding('UTF-8');
            mb_http_output('UTF-8');

            $userNumber = (int) $_POST["num"] ?? 0;
            $numAntecessor = $userNumber - 1;
            $numSucessor = $userNumber + 1;

        echo <<< RESULTADO
                <h2>Resultado</h2>
                <p>
                    Número escolhido: <strong>$userNumber</strong> <br>
                    Número antecessor: <strong>$numAntecessor</strong> <br>
                    Número sucessor: <strong>$numSucessor</strong> <br>
                </p>
            RESULTADO;
        ?>

        <!--Retorno à última página visitada-->
        <button class="outline"><a href="javascript:history.go(-1)">Voltar</a></button>
    </main>

</body>
</html>
