<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EX008 - Operações aritméticas</title>
</head>
<body>
    <header class="container">
        <h1>EX008 - Operações aritméticas</h1>
    </header>

    <main class="container">
        <?php
            // No PHP as expressões aritmética são separadas de outros tipos de operação, como concatenação de strings.
            $adicaoSimples = 5 + 5; // => int(10)
            $adicaoDeStrings = "5" + "5"; // => int(10) por ser strings numéricas puras
            $concatDeStrings = "5" . "5"; // => string("55")

            echo <<< OPERACOES
                    <h3>Cenários de adição</h3>
                    <p>
                    Adição Simples (5+5)=> $adicaoSimples <br>
                    Adição de Strings ("5"+"5")=> $adicaoDeStrings <br>
                    Concatenação de Strings ("5"."5")=> $concatDeStrings <br>
                    </p>
                OPERACOES;

            // Outras funções aritméticas básicas
            $subtracao = 5 - 5;
            $divisaoReal = 5 / 2;
            $modulo = 5 % 2;
            $expoente = 5 ** 2;

            echo <<< OUTRAS_OPERACOES
                    <h3>Outras operações aritméticas</h3>
                    <p>
                    Subtração (5-5) => $subtracao <br>
                    Divisão Real (5/5) => $divisaoReal <br>
                    Módulo (5%5) => $modulo <br>
                    Expoente (5**2) => $expoente <br>
                    </p>
                OUTRAS_OPERACOES;

            // Funções matemáticas padrões do PHP
            $valorAbsoluto = abs(-10);
            $baseConvertida = base_convert(254, 10, 2);
            $arredondamentoParaCima = ceil(5.5);
            $arredondamentoParaBaixo = floor(5.5);
            $arredondamentoAritmetico = round(5.5);
            $divisaoInteira = intdiv(5, 2);
            $minimo = min(5, 2, 10, 15);
            $maximo = max(5, 2, 10, 15);
            $valorPi = M_PI;
            $raizQuadrada = sqrt(81);

            echo <<< FUNCOES_MATEMATICAS
                    <h3>Funções matemáticas PHP</h3>
                    <p>
                    Valor absoluto abs(-10) => $valorAbsoluto <br>
                    Conversão de base 10 para 2 base_convert(254, 10, 2) => $baseConvertida <br>
                    Arredondamento para cima ceil(5.5) => $arredondamentoParaCima <br>
                    Arredodnamento para baixo floor(5.5) => $arredondamentoParaBaixo <br>
                    Arredondamento aritmético round(5.5) => $arredondamentoAritmetico <br>
                    Divisão inteira (resultado da divisão) intdiv(5,2) => $divisaoInteira <br>
                    Minimo entre números min(5,2,10,15) => $minimo <br>
                    Máximo entre números max(5,2,10,15) => $maximo <br>
                    Constante PI => $valorPi <br>
                    Raiz quadrada sqrt(81) => $raizQuadrada <br>
                    </p>
                FUNCOES_MATEMATICAS;
        ?>
    </main>

</body>
</html>
