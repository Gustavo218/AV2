<?php
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $nomeBanco = "av2";
    $conn = mysqli_connect ($servidor, $usuario, $senha, $nomeBanco);

    if (isset($_POST["submit"]))
    {
        $nome = $_POST["nome"];

        $nomea = rand(0,1000).$_FILES["file"]["name"];

        $tnome = $_FILES["files"]["temp_file"];

        $uploads_arq = '/images';
        move_uploaded_file($tnome, $uploads_arq.'/'.$nomea);

        $sql = "INSERT into produtos ()";

        if (mysqli_query($conn,$sql)){
            echo "Arquivo carregado";
        }
        else{
            echo "Erro de arquivo";
        }
    }
    
    
?>