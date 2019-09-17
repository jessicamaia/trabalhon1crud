<?php

    require __DIR__.'/App/autoload.php';
    use DB\Conexao;

	$id = null;
	if ( !empty($_GET['idioma_id']))
            {
		$id = $_REQUEST['idioma_id'];
            }

	if ( null==$id )
            {
		header("Location: IdiomaIndex.php");
            }

    if ( !empty($_POST)){

		$NomeErro = null;
		$UltimaAtualizacaoErro = null;
               
        $nome = $_POST['nome'];
		$ultima_atualizacao = $_POST['ultima_atualizacao'];
                
		//Validação
		$validacao = true;
		if (empty($nome)){
                    $NomeErro = 'Por favor digite o nome do Idioma!';
                    $validacao = false;
        }

		if (empty($ultima_atualizacao))
                {
                    $UltimaAtualizacaoErro = 'Por favor digite sua última atualização!';
                    $validacao = false;
		}

		// update 
		if ($validacao){
                    $pdo = Conexao::getInstance();
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "UPDATE idioma  set nome = ?, ultima_atualizacao = ? WHERE idioma_id = ?";
                    $q = $pdo->prepare($sql);
                    $q->execute(array($nome,$ultima_atualizacao, $id));
                    Conexao::disconnect();
                    header("Location: IdiomaIndex.php");
		}
	}
        else {
                $pdo = Conexao::getInstance ();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT * FROM idioma where idioma_id = ?";
                $q = $pdo->prepare($sql);
                $q->execute(array($id));
                $data = $q->fetch(PDO::FETCH_ASSOC);
                //$idioma_id = $data['idioma_id'];
                $nome = $data['nome'];
                $ultima_atualizacao = $data['ultima_atualizacao'];
		
		Conexao::disconnect();
	}
?>

    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
				<title>Atualizar Idioma </title>
    </head>

    <body>
        <div class="container">

            <div class="span10 offset1">
							<div class="card">
								<div class="card-header">
                    <h3 class="well"> Atualizar idioma </h3>
                </div>
					<div class="card-body">
                <form class="form-horizontal" action="idiomaUpdate.php?idioma_id=<?php echo $id?>" method="post">


                    <div class="control-group <?php echo !empty($NomeErro)?'error':'';?>">
                        <label class="control-label"> Nome do Idioma</label>
                        <div class="controls">
                            <input name="nome" class="form-control" size="80" type="text" placeholder="nome" value="<?php echo !empty($nome)?$nome:'';?>">
                             <?php if (!empty($NomeErro)): ?>
                                <span class="help-inline"><?php echo $NomeErro;?></span>
                                <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php echo !empty($UltimaAtualizacaoErro)?'error':'';?>">
                        <label class="control-label">Última Atualização</label>
                        <div class="controls">
                            <input name="ultima_atualizacao" class="form-control" size="30" type="text" placeholder="ultima_atualizacao" value="<?php echo !empty($ultima_atualizacao)?$ultima_atualizacao:'';?>">
                            <?php if (!empty($UltimaAtualizacaoErro)): ?>
                                <span class="help-inline"><?php echo $UltimaAtualizacaoErro;?></span>
                                <?php endif; ?>
                        </div>
                    </div>

                    <br/>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-warning">Atualizar</button>
                        <a href="IdiomaIndex.php" type="btn" class="btn btn-default">Voltar</a>
                    </div>
                </form>
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