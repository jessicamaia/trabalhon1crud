<?php
require __DIR__.'/App/autoload.php';
use DB\Conexao;

$id = 0;

if(!empty($_GET['endereco_id']))
{
    $id = $_REQUEST['endereco_id'];
}

if(!empty($_POST))
{
    $id = $_POST['endereco_id'];

    //Delete do banco:
    $pdo = Conexao::getInstance();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SET FOREIGN_KEY_CHECKS =0;";
    $sql .= "DELETE FROM endereco where endereco_id = ?";
    $sql .= ";SET FOREIGN_KEY_CHECKS =1;";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    Conexao::disconnect();
    header("Location: EndIndex.php");
}
?>

    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <title>Deletar Endereço</title>
    </head>

    <body>
        <div class="container">
            <div class="span10 offset1">
                <div class="row">
                    <h3 class="well">Excluir Endereço</h3>
                </div>
                <form class="form-horizontal" action="EndDelete.php" method="post">
                    <input type="hidden" name="endereco_id" value="<?php echo $id;?>" />
                    <div class="alert alert-danger"> Deseja excluir o Endereço?
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
