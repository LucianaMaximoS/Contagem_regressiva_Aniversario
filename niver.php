<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contagem regressiva - Aniversário</title>
    <link rel="stylesheet" href="amarelo.style.css">
</head>
<body>
    <main>
        <h1>Faltam para o seu aniversário:</h1>
        <?php 
            if (isset($_GET["data"])) {
                $niver = $_GET["data"]; //peguei a data lá do form do HTML
            
                $dataAtual = date("Y-m-d"); //essa é a data atual altomática

                // Cria objetos DateTime para as duas datas (aniversário e data atual)
                $dataNiver = new DateTime($niver);
                $dataAtualObj = new DateTime($dataAtual);

                // Substitui o ano da data atual pelo ano da data de aniversário
                // Isso é feito para comparar somente o dia e o mês, ignorando o ano
                $dataNiver->setDate($dataAtualObj->format("Y"), $dataNiver->format("m"), $dataNiver->format("d"));

                // Se o aniversário já passou neste ano, ajusta para o próximo ano
                // Isso é feito para calcular o próximo aniversário
                if ($dataNiver < $dataAtualObj) {
                    $dataNiver->modify('+1 year');
                }

                // Calcula a diferença entre as duas datas (data atual e próximo aniversário)
                // O método diff() retorna um objeto DateInterval que contém a diferença
                $intervalo = $dataAtualObj->diff($dataNiver);
                
                // Exibe a contagem regressiva em dias para o próximo aniversário
                // A propriedade days do objeto DateInterval contém o número de dias de diferença
                echo "<h2>Faltam " . $intervalo->days . " dias para o seu aniversário!</h2>";
            } else {
                // Se a data não foi enviada, exibe uma mensagem pedindo para inserir a data
                echo "<p>Por favor, insira sua data de aniversário.</p>";
            }
        ?>
    </main>
</body>
</html>
