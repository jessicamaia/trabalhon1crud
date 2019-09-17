<?php
require __DIR__.'/App/autoload.php';
use DB\Conexao;

$id = 0;

if(!empty($_GET['aluguel_id']))
{
    $id = $_REQUEST['aluguel_id'];
}

if(!empty($_POST))
{
    $id = $_POST['aluguel_id'];

    //Delete do banco:
    $pdo = Conexao::getInstance();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SET FOREIGN_KEY_CHECKS =0;";
    $sql .= "DELETE FROM aluguel where aluguel_id= ?";
    $sql .= ";SET FOREIGN_KEY_CHECKS =1;";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    Conexao::disconnect();
    header("Location: AluguelIndex.php");
}
?>

    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <title>Deletar Aluguel</title>
    </head>

    <body>
        <div class="container">
            <div class="span10 offset1">
                <div class="row">
                    <h3 class="well">Excluir Aluguel</h3>
                </div>
                <form class="form-horizontal" action="AluguelDelete.php" method="post">
                    <input type="hidden" name="aluguel_id" value="<?php echo $id;?>" />
                    <div class="alert alert-danger"> Deseja excluir o aluguel?
                    </div>
                    <div class="form actions">
                        <button type="submit" class="btn btn-danger">Sim</button>
                        <a href="index.php" type="btn" class="btn btn-default">Não</a>
                    </div>
                </form>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="assets/js/bootstrap.min.js"></script>
    </body>

    </html>
