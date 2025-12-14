<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EX005 - Tipos primitivos</title>
</head>
<body>
    <header>
        <h1>EX005 - Tipos primitivos</h1>
    </header>
    <main>
        <?php
            // Tipos primitivos = tipos de dados básicos usados pela linguagem
            $isString = "RJ";
            $isFloat = 3.1415;
            $isInteger = 17;
            $isBoolean = true;
            $isEmptyString = "";
            $isNegativeInteger = -19;
            $isBooleanString = "false";
            $isIntHex = 0x1A;
            $isScientificFloat = 3e2;
            $isNumberString = "1024";
            $isObject = (object)['prop' => 'foo'];
            $isArray = ["num", "int", "real"];

            $results = (object) [
                'isString' => is_string($isString),
                'isFloat' => is_float($isFloat),
                'isInteger' => is_int($isInteger),
                'isBoolean' => is_bool($isBoolean),
                'isEmptyString' => is_string($isEmptyString),
                'isNegativeInteger' => is_int($isNegativeInteger),
                'isBooleanString' => is_string($isBooleanString),
                'isIntHex' => is_int($isIntHex),
                'isScientificFloat' => is_float($isScientificFloat ),
                'isNumberString' => is_string($isNumberString),
                'isObject' => is_object($isObject),
                'isArray' => is_array($isArray),
            ];

            var_dump($results);

        ?>
    </main>
</body>
</html>
