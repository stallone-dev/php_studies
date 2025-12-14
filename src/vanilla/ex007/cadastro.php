<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Estilização semântica rápida -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css"
    >
    <title>EX007/2 - Resultado da requisição</title>
</head>
<body>
    <header class="container">
        <h1>EX007/2 - Resultado da requisição</h1>
    </header>

    <main class="container">
        <?php
            // Lidando com UTF-8 conforme recomendações do https://br.phptherightway.com/#php_e_utf8
            mb_internal_encoding('UTF-8');
        mb_http_output('UTF-8');

        // Sobre HTTP, existem supervariáveis definidas pelo próprio PHP
        // $_GET = supervariável para capturar elementos da requisição via GET
        // $_POST = supervariável para capturar elementos da requisição via POST
        // $_COOKIE = supervariável para capturar os COOKIES o navegador
        // $_REQUET = supervariável que compila os 3 anteriores
        $dataSendedByGET = $_GET;
        $dataSendedByPOST = $_POST;
        $dataSendedByCOOKIE = $_COOKIE;
        $allDataSensed = $_REQUEST;

        $userName = $_POST["nome"] ?? "Guest";
        $userSourname = $_POST["sobrenome"] ?? "Ventura";
        echo "<h3>Mensagem de retorno</h3>";
        echo "<p>Bem-vindo, <strong>$userName $userSourname</strong>!<br>É um prazer lhe receber.</p>";

        echo "<h3>Dados enviados pela requisição: </h3>";
        echo "<p>GET " . var_dump($dataSendedByGET) . "</p>";
        echo "<p>POST " . var_dump($dataSendedByPOST) . "</p>";
        echo "<p>COOKIE " . var_dump($dataSendedByCOOKIE) . "</p>";
        echo "<p>ALL " . var_dump($allDataSensed) . "</p>";
        ?>

        <!--Retorno à última página visitada-->
        <p><a href="javascript:history.go(-1)">Voltar</a></p>
    </main>

</body>
</html>
