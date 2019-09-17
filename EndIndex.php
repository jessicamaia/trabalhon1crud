<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <title>Página Inicial</title>
</head>

<body>
        <div class="container">
          <div class="jumbotron">
            <div class="row">
                <h3>CRUD em PHP <span class="badge badge-secondary"></span></h3>
            </div>
          </div>
            </br>
            <div class="row">
                <p>
                    <a href="EndCreate.php" class="btn btn-success">Adicionar</a>
                </p>
                <table border= 1 class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Endereço Id</th>
                            <th scope="col"> Endereço</th>
                            <th scope="col"> Endereço 2</th>
                            <th scope="col"> Bairro</th>
                            <th scope="col"> Cidade ID</th>
                            <th scope="col"> CEP </th>
                            <th scope="col"> Telefone</th>
                            <th scope="col">Última Atualização</th>
                            <th scope="col">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require __DIR__.'/App/autoload.php';
                        use DB\Conexao;

                        $pdo = Conexao::getInstance();
                        $sql = 'SELECT * FROM endereco ORDER BY endereco_id DESC';

                        foreach($pdo->query($sql)as $row)
                        {
                            echo '<tr>';
			                echo '<th scope="row">'. $row['endereco_id'] . '</th>';
                            echo '<td>'. $row['endereco'] . '</td>';
                            echo '<td>'. $row['endereco2'] . '</td>';
                            echo '<td>'. $row['bairro'] . '</td>';
                            echo '<td>'. $row['cidade_id'] . '</td>';
                            echo '<td>'. $row['cep'] . '</td>';
                            echo '<td>'. $row['telefone'] . '</td>';
                            echo '<td>'. $row['ultima_atualizacao'] . '</td>';
                            echo '<td width=250>';
                            echo '<a class="btn btn-primary" href="EndRead.php?endereco_id='.$row['endereco_id'].'">Info</a>';
                            echo ' ';
                            echo '<a class="btn btn-warning" href="EndUpdate.php?endereco_id='.$row['endereco_id'].'">Atualizar</a>';
                            echo ' ';
                            echo '<a class="btn btn-danger" href="EndDelete.php?endereco_id='.$row['endereco_id'].'">Excluir</a>';
                            echo '</td>';
                            echo '</tr>';
                        }
                        Conexao::disconnect();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>