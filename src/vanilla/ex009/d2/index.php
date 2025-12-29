<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css"
    >
    <title>D02 - Numero aleatório</title>
</head>
<body>
    <header class="container">
        <h1>D02 - Numero aleatório</h1>
    </header>

    <main class="container">
        <?php
            // Lidando com UTF-8 conforme recomendações do https://br.phptherightway.com/#php_e_utf8
            mb_internal_encoding('UTF-8');
            mb_http_output('UTF-8');

            $randomNumber = mb_rand(10, 1000);

            echo <<< RESULTADO
                    <h2>Número aleatório</h2>
                    <p>
                        Gerador de número aleatório entre <strong>1 e 1000</strong><br>
                        Resultado: <strong>$randomNumber</strong> <br>
                    </p>
                RESULTADO;
        ?>

        <!--Retorno à última página visitada-->
        <button class="outline" type="button"><a href="javascript:history.go(0)">Gerar novo número</a></button>
    </main>

</body>
</html>
