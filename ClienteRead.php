<?php
    require __DIR__.'/App/autoload.php';
    use DB\Conexao;

    $id = null;
    if(!empty($_GET['cliente_id']))
    {
        $id = $_REQUEST['cliente_id'];
    }

    if(null==$id)
    {
        header("Location: ClienteIndex.php");
    }
    else
    {
       $pdo = Conexao::getInstance();
       $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       $sql = "SELECT * FROM cliente where cliente_id = ?";
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
        <title>Informações do Cliente</title>
    </head>

    <body>
        <div class="container">
            <div class="span10 offset1">
                  <div class="card">
    								<div class="card-header">
                    <h3 class="well">Informações do Cliente</h3>
                </div>
                <div class="container">
                <div class="form-horizontal">
                    <div class="control-group">
                        <label class="control-label">Id do Cliente:</label>
                        <div class="controls">
                            <label class="carousel-inner">
                                <?php echo $data['cliente_id'];?>
                            </label>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Primeiro Nome:</label>
                        <div class="controls">
                            <label class="carousel-inner">
                                <?php echo $data['primeiro_nome'];?>
                            </label>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Último Nome:</label>
                        <div class="controls">
                            <label class="carousel-inner">
                                <?php echo $data['ultimo_nome'];?>
                            </label>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Email:</label>
                        <div class="controls">
                            <label class="carousel-inner">
                                <?php echo $data['email'];?>
                            </label>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Endereço id:</label>
                        <div class="controls">
                            <label class="carousel-inner">
                                <?php echo $data['endereco_id'];?>
                            </label>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Ativo:</label>
                        <div class="controls">
                            <label class="carousel-inner">
                                <?php echo $data['ativo'];?>
                            </label>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Data de Criação:</label>
                        <div class="controls">
                            <label class="carousel-inner">
                                <?php echo $data['data_criacao'];?>
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
                        <a href="ClienteIndex.php" type="btn" class="btn btn-default">Voltar</a>
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