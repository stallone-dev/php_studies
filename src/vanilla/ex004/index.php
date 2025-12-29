<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EX004 - Variaveis</title>
</head>
<body>
    <header>
        <h1>EX004 - Variaveis</h1>
    </header>
    <main>
        <?php
            //Atribuição
            $name = "User";
            $sourname = "name";

            echo "<p>Hello $name$sourname!</p>";

            // Reatribuição
            $name = "Super";
            echo "<p>Hello $name$sourname!</p>";

            // Constante
            const VERSION = "1.0";
            echo "<p>Sua versão é: " . VERSION . "</p>";
            // Constantes não podem ser reatribuidas

            // Regras de nomenclaturas
            // 1. Variáveis começam com $
            $regraAtendida = true;
            // 2. Variáveis devem começar por ser letras "_"
            $_ = "Default";
            echo "$_ is $regraAtendida";

            // 3. Case sensitive
            $caseSensitiveMin = true;
            $CaseSensitiveMin = false; // Outra variável
            echo "minúsculas = $caseSensitiveMin\nMaiúsculas = $CaseSensitiveMin";

            // 4. Existem palavras reservadas pela linguagem
            # $this = null;

            // Recomendações da comunidade PHP
            // Baseado no https://www.php-fig.org/psr/psr-1/
            // E https://br.phptherightway.com/#guia_de_estilo_de_codigo
            // 1. Variáveis devem ter nomes claros e lógicos
            // 2. Seguir o padrão:
            //      Variáveis = camelCase = $myName
            //      Constantes = SNAKE_UPPERCASE = cosnt MAGIC_NUM
            $isMyName = true;
            $userProductsCart = ["apple", "cookie", "banana"];
            $userActualAge = 25;
            const MIN_AGE_TO_ENTRY = 18;
            $isUserAllowed = $userActualAge >= MIN_AGE_TO_ENTRY;

        ?>
    </main>
</body>
</html>
