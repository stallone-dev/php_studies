<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EX006 - Strings</title>
</head>
<body>
    <header>
        <h1>EX006 - Strings</h1>
    </header>
    <main>
        <?php
            // Em PHP, há 4 tipos de declarações de Strings:
            echo "<h2>1. Double Quoted = String terpretada</h2>";

        // 1. Double Quoted = String interpretada/interpolável
        $userName = "Elephant";
        echo "<p>Bem vindo $userName</p>"; // Interpolação de variável em string

        $userLevel = 15;
        echo "<p>Seu nível atual é: " . $userLevel . "!\n</p>"; // Concatenação

        $emoji = "\u{1F418}";
        echo "<p>Bem vindo ao PHP $emoji\n</p>";

        echo "<h2>2. Single Quoted = String Pura</h2>";

        // 2. Single quoted = String pura sem interpretação e interpolação
        echo '<p>Bem vindo $userName</p>' ;
        echo '<p>Seu nível atual é: " . $userLevel . "!\n</p>';
        echo '<p>Bem vindo ao PHP $emoji\n</p>';

        // Concatenando uma constante em uma string
        echo "<h3>Concatenando constante em string</h3>";
        const STATE = "PB";
        echo 'Seu estado atual é: ' . STATE;

        // Interpolando uma string com aspas duplas
        echo "<h3>Concatenando string com aspas duplas usando escape</h3>";
        $nom = "Rodrigo";
        $sNom = "Nogueira";
        echo "<p>$nom \"Minotauro\" $sNom</p>";

        // Sequências de scape, caracteres especiais para strings com aspas duplas
        echo "<h3>Caracteres de escape</h3>";
        $newLin = "\n";
        $tabulation = "\t";
        $visualBar = "\\";
        $visualDollarSign = "\$";
        $visualUnicodeChar = "\u{1F384}";

        echo "<p>"
            . "Nova Linha = $newLin <br>"
            . "Tabulação = $tabulation\n <br>"
            . "Barra visível = $visualBar\n <br>"
            . "Cifrão visível = $visualDoolarSign\n <br>"
            . "Caractere Unicode = $visualUnicodeChar\n <br>"
            . "</p>";

        // 3. Heredoc
        // Um tipo mais puro de manipulação de strings de múltiplas linhas, que permite interpolações, similar às double quotes
        echo "<h3>Heredoc</h3>";
        $nameProject = "PHP Study";
        $year = date('y');
        $status = "In progress";

        echo <<< IDENTIFICADOR_PROPRIO
                <p>
                Olá Mundo! <br>
                Este é o meu $nameProject de $year <br>
                Status atual: $status <br>
                </p>
            IDENTIFICADOR_PROPRIO;

        // 4. Nowdoc
        // Um tipo mais puro de manipulação de strings de múltiplas linhas, similar às single quotes, SEM interpolação
        echo "<h3>Nowdoc</h3>";
        echo <<< 'IDENTIFICADOR_PROPRIO'
                <p>
                Olá Mundo! <br>
                Este é o meu $nameProject de $year <br>
                Status atual: $status <br>
                </p>
            IDENTIFICADOR_PROPRIO;

        ?>
    </main>
</body>
</html>
