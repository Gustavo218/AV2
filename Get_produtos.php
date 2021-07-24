<?php
        $conn= new mysqli("localhost","root","","av2");
        if ($conn->connect_error){
            die('erro de conexão');
        }
        $banco = mysqli_select_db($conn,'av2');

        if (isset($_GET['busca']))
        {
            $cod_bar = $_GET ['cod_barras'];

            $sql = "SELECT * FROM `produtos` where cod_barras ='$cod_bar' ";
            $result = mysqli_query($conn,$sql);
            
            echo "<table border='1'>";
            echo "<th>id</th><th>nome</th><th>fabricante</th><th>categoria</th><th>tipo de produto</th><th>preco de venda</th><th>quantidade no estoque</th>
            <th>peso(g)</th><th>descrição</th><th>data de inclusão</th><th>ativo?</th>";
    
            while ($linha = mysqli_fetch_array($result)){
                echo "<tr>";
                echo "<td>" . $linha["id"]. "</td>";
                echo "<br>";
                echo "<td>" . $linha ["nome"]. "</td>";
                echo "<br>";
                echo "<td>". $linha ["fabricante"]. "</td>";
                echo "<br>";
                echo "<td>".$linha ["categoria"]. "</td>";
                echo "<br>";
                echo "<td>" . $linha ["tipo_produto"]. "</td>";
                echo "<br>";
                echo "<td>" . $linha ["preco_venda"]. "</td>";
                echo "<br>";
                echo "<td>" . $linha ["qtd_estoque"]. "</td>";
                echo "<br>";
                echo "<td>" . $linha ["peso_gramas"]. "</td>";
                echo "<br>";
                echo "<td>" . $linha ["descricao"]. "</td>";
                echo "<br>";
                echo "<td>" . $linha ["data_inclusao"]. "</td>";
                echo "<br>";
                echo "<td>" . $linha ["ativo"]. "</td>";
                echo "<br>";
            }
            if ($sql){
                echo "Código $cod_bar encontrado";
            }
            else
            {
                echo "$cod_bar não encontrado";
            }
        }
?>