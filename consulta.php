<?php

$server = "localhost";
$user = "user";
$pass = "pass";
$db = "database";

// Iniciar conexão
$conn = new mysqli($server, $user, $pass, $db);


// Validar conexão
if ($conn->connect_error) { die("Erro na conexão: " . $conn->connect_error); }

// Declarar query
$query = "select convenio.verba as verba, contrato.codigo as cod_contrato, contrato.data_inclusao as data_inclusao, contrato.valor as valor_contrato, contrato.prazo as prazo_contrato from contrato join convenio_servico on convenio_servico = convenio_servico join convenio on convenio = convenio_servico.convenio";

// Resultado da query
$result = $conn->query($query);

// Validar consulta vazia
if ($result->num_rows > 0) {
    // Imprimir saída
    echo '<table><thead><tr><th>cod_contrato</th><th>verba</th>><th>data_inclusao</th><th>valor_contrato</th><th>prazo_contrato</th></tr></thead><tbody>'; 
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>{$row['cod_contrato']}</td><td>{$row['verba']}</td><td>{$row['data_inclusao']}</td><td>{$row['valor_contrato']}</td><td>{$row['prazo_contrato']}</td></tr>"; 
    }
    echo '</tbody></table>'; 
} else {
    echo "Sem resultados";
}

// Fechando a conexão

$conn->close();

?> 




