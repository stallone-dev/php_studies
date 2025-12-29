<?php declare(strict_types=1);

// Regularizando autoload do Guzzle
require_once __DIR__ . '/../../vendor/autoload.php';
use GuzzleHttp\Client;

// Lidando com UTF-8 conforme recomendações do https://br.phptherightway.com/#php_e_utf8
mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');

// DTO simples
final readonly class Cotacao
{
    public function __construct(
        public float $cotacaoCompra,
        public float $cotacaoVenda,
        public DateTimeImmutable $dataHoraCotacao
    ) {
    }

    public static function fromArray(array $data): self
    {
        foreach (['cotacaoCompra', 'cotacaoVenda', 'dataHoraCotacao'] as $campo) {
            if (!array_key_exists($campo, $data)) {
                throw new InvalidArgumentException(
                    "Campo obrigatório ausente: {$campo}"
                );
            }
        }

        return new self(
            (float) $data['cotacaoCompra'],
            (float) $data['cotacaoVenda'],
            new DateTimeImmutable($data['dataHoraCotacao'])
        );
    }
}

// Service simples para consumo da API do banco central
final class CotacaoService
{
    private ?Cotacao $cotacaoCache = null;

    public function getCotacao(): Cotacao
    {
        if ($this->cotacaoCache === null) {
            $this->cotacaoCache = $this->buscarCotacao();
        }

        return $this->cotacaoCache;
    }

    private function buscarCotacao(): Cotacao
    {
        $client = new Client([
            'timeout' => 5,
            'headers' => ['Accept' => 'application/json'],
        ]);

        $response = $client->request('GET', $this->generateUrl());

        $data = json_decode(
            (string) $response->getBody(),
            true,
            flags: JSON_THROW_ON_ERROR
        );

        return Cotacao::fromArray($data['value'][0]);
    }

    private function generateUrl(): string
    {
        $final = new DateTimeImmutable('today');
        $inicial = $final->sub(new DateInterval('P7D'));

        return sprintf(
            "https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/CotacaoDolarPeriodo(dataInicial=@dataInicial,dataFinalCotacao=@dataFinalCotacao)?@dataInicial='%s'&@dataFinalCotacao='%s'&\$orderby=dataHoraCotacao desc&\$format=json",
            $inicial->format('m-d-Y'),
            $final->format('m-d-Y')
        );
    }
}

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
    <title>D03/R - Conversor de moeda</title>
</head>
<body>
    <header class="container">
        <h1>D03/R - Conversor de moeda</h1>
    </header>

    <main class="container">
        <?php
            $userNumber = (float) str_replace(',', '.', $_POST["num"]) ?? 1.0;
            $service = new CotacaoService();
            $cotacao = $service->getCotacao();

            $numFormatPattern = numfmt_create("pt_BR", NumberFormatter::CURRENCY);
            $entryNum = numfmt_format_currency($numFormatPattern, $userNumber, "BRL");
            $result = numfmt_format_currency($numFormatPattern, round($userNumber / $cotacao->cotacaoCompra, 2), "USD");

            $formatter = new IntlDateFormatter(
                locale: 'pt_BR',
                dateType: IntlDateFormatter::FULL,
                timeType: IntlDateFormatter::MEDIUM,
                timezone: 'America/Sao_Paulo'
            );

            echo <<< RESULTADO
                    <h2>Conversor de moedas</h2>
                    <p>
                        Seus <strong>$entryNum</strong> equivalem a <strong>$result</strong></br>
                        Baseado na cotação de {$formatter->format($cotacao->dataHoraCotacao)}
                    </p>
                RESULTADO;
        ?>

        <!--Retorno à última página visitada-->
        <button class="outline" type="button"><a href="javascript:history.go(-1)">voltar</a></button>
    </main>

</body>
</html>
