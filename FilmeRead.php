<?php
    require __DIR__.'/App/autoload.php';
    use DB\Conexao;

    $id = null;
    if(!empty($_GET['filme_id']))
    {
        $id = $_REQUEST['filme_id'];
    }

    if(null==$id)
    {
        header("Location: FilmeIndex.php");
    }
    else
    {
       $pdo = Conexao::getInstance();
       $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       $sql = "SELECT * FROM filme where filme_id = ?";
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
        <title>Informações do Filme</title>
    </head>

    <body>
        <div class="container">
            <div class="span10 offset1">
                  <div class="card">
    								<div class="card-header">
                    <h3 class="well">Informações do Filme</h3>
                </div>
                <div class="container">
                <div class="form-horizontal">
                    <div class="control-group">
                        <label class="control-label">Id do Filme</label>
                        <div class="controls">
                            <label class="carousel-inner">
                                <?php echo $data['filme_id'];?>
                            </label>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Título</label>
                        <div class="controls">
                            <label class="carousel-inner">
                                <?php echo $data['titulo'];?>
                            </label>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Descrição</label>
                        <div class="controls">
                            <label class="carousel-inner">
                                <?php echo $data['descricao'];?>
                            </label>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Ano De Lançamento</label>
                        <div class="controls">
                            <label class="carousel-inner">
                                <?php echo $data['ano_de_lancamento'];?>
                            </label>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Idioma Id</label>
                        <div class="controls">
                            <label class="carousel-inner">
                                <?php echo $data['idioma_id'];?>
                            </label>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Idioma Original Id</label>
                        <div class="controls">
                            <label class="carousel-inner">
                                <?php echo $data['idioma_original_id'];?>
                            </label>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Duração locação</label>
                        <div class="controls">
                            <label class="carousel-inner">
                                <?php echo $data['duracao_da_locacao'];?>
                            </label>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Preço da Locação</label>
                        <div class="controls">
                            <label class="carousel-inner">
                                <?php echo $data['preco_da_locacao'];?>
                            </label>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Duração do Filme</label>
                        <div class="controls">
                            <label class="carousel-inner">
                                <?php echo $data['duracao_do_filme'];?>
                            </label>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Custo de Substituição</label>
                        <div class="controls">
                            <label class="carousel-inner">
                                <?php echo $data['custo_de_substituicao'];?>
                            </label>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Classificação</label>
                        <div class="controls">
                            <label class="carousel-inner">
                                <?php echo $data['classificacao'];?>
                            </label>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Recursos Especiais</label>
                        <div class="controls">
                            <label class="carousel-inner">
                                <?php echo $data['recursos_especiais'];?>
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
                        <a href="FilmeIndex.php" type="btn" class="btn btn-default">Voltar</a>
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