<?php declare(strict_types=1);

// Lidando com UTF-8 conforme recomendações do https://br.phptherightway.com/#php_e_utf8
mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');

$userInput = $_POST["num"];
$userNumber = (float) str_replace(',', '.', $userInput) ?? 1.0;

$parteInteira = (int) $userNumber;
$parteDecimal = round($userNumber - $parteInteira, 3);

?>

<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css"
    >
    <title>D04/R - Analisador de numero real</title>
</head>
<body>
    <header class="container">
        <h1>D04/R - Analisador de numero real</h1>
    </header>

    <main class="container">
        <?php
            echo <<< RESULTADO
                <h2>Analisador de número real</h2>
                <p>
                    Seu número <strong>$userInput</strong> equivale a:</br>
                    <table>
                    <tboby>
                        <tr>
                        <td>Parte intera: $parteInteira</td>
                        </tr>
                        <tr>
                        <td>Parte decimal: $parteDecimal</td>
                        </tr>
                    </tbody>
                    </table>
                </p>
            RESULTADO;
        ?>

        <!--Retorno à última página visitada-->
        <button class="outline" type="button"><a href="javascript:history.go(-1)">voltar</a></button>
    </main>

</body>
</html>
