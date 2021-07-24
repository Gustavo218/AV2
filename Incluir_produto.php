<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$nomeBanco = "AV2";

$conn = new mysqli($servidor, $usuario, $senha, $nomeBanco);
if ($conn->connect_error) {
    die("Conexão com erro: " . $conn->connect_error);
}

function ValidarCpfBanco($pCpf, $conn) {
    $sqlCpf = "SELECT CPF FROM ALUNOS WHERE CPF = " . pCpf;
    $result = $conn->query($sqlCpf);

    if ($result->num_rows > 0) {
        return 1;
    }
    return 0;

function ValidarCodigoBarras($pcod_barras,$conn){
    $sqlcod_barras = "SELECT COD_BARRAS FROM PRODUTOS WHERE COD_BARRAS = " . $pcod_barras;
    if (ctype_digit($cod_barras)){
        return 1;
    } else {
        return 0;
}
}
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $cod_barras = $_GET["cod_barras"];
    $nome = $_GET["nome"];
    $fabricante = $_GET["fabricante"];
    $categoria = $_GET["categoria"];
    $tipo = $_GET["tipo_produto"];
    $preco = $_GET["preco_venda"];
    $qtd = $_GET["qtd_estoque"];
    $peso = $_GET["peso_gramas"];
    $descricao = $_GET["descricao"];
    $data = $_GET["data_inclusao"];
    $ativo = $_GET["ativo"];
    $erro = 0;

    $erro = Validar($nome);
    $erro = ValidarCpfBanco($cpf, $conn);

    $sql = "Insert into produtos (cod_barras, nome, fabricante, categoria, tipo_produto, preco_venda, qtd_estoque, peso_gramas, descricao, data_inclusao, ativo) 
    VALUES ( '$cod_barras', '$nome', '$fabricante', '$categoria', '$tipo_produto', '$preco_venda', '$qtd_estoque', '$peso_gramas', '$descricao', '$data_inclusao', '$ativo')";
    if ($conn->query($sql) == TRUE) {
        echo json_encode("Produto $nome Inserido com Sucesso");
    } else {
        echo json_encode("Erro de inserção");
    }


}

?>