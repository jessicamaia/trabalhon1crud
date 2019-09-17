<?php
    require __DIR__.'/App/autoload.php';
    use DB\Conexao;

    $id = null;
    if(!empty($_GET['cidade_id']))
    {
        $id = $_REQUEST['cidade_id'];
    }

    if(null==$id)
    {
        header("Location: CidadeIndex.php");
    }
    else
    {
       $pdo = Conexao::getInstance();
       $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       $sql = "SELECT * FROM cidade where cidade_id = ?";
       $q = $pdo->prepare($sql);
       $q->execute(array($id));
       $data = $q->fetch(PDO::FETCH_ASSOC);
       Conexao::disconnect();
    }
?>

    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <title>Informações da Cidade</title>
    </head>

    <body>
        <div class="container">
            <div class="span10 offset1">
                  <div class="card">
    								<div class="card-header">
                    <h3 class="well">Informações da Cidade</h3>
                </div>
                <div class="container">
                <div class="form-horizontal">
                    <div class="control-group">
                        <label class="control-label">Id da cidade</label>
                        <div class="controls">
                            <label class="carousel-inner">
                                <?php echo $data['cidade_id'];?>
                            </label>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Cidade</label>
                        <div class="controls">
                            <label class="carousel-inner">
                                <?php echo $data['cidade'];?>
                            </label>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">País id</label>
                        <div class="controls">
                            <label class="carousel-inner">
                                <?php echo $data['pais_id'];?>
                            </label>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Ultima Atualização</label>
                        <div class="controls">
                            <label class="carousel-inner">
                                <?php echo $data['ultima_atualizacao'];?>
                            </label>
                        </div>
                    </div>

                    <br/>
                    <div class="form-actions">
                        <a href="CidadeIndex.php" type="btn" class="btn btn-default">Voltar</a>
                    </div>
                  </div>
                  </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="assets/js/bootstrap.min.js"></script>
    </body>

    </html>