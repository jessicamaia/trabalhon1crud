<?php

    require __DIR__.'/App/autoload.php';
    use DB\Conexao;

	$id = null;
	if ( !empty($_GET['ator_id']))
            {
		$id = $_REQUEST['ator_id'];
            }

	if ( null==$id )
            {
		header("Location: AtorIndex.php");
            }

	if ( !empty($_POST))
            {

		$PrimeiroNomeErro = null;
		$UltimoNomeErro = null;
		$UltimaAtualizacaoErro = null;
               
		$PrimeiroNome = $_POST['primeiro_nome'];
		$UltimoNome = $_POST['ultimo_nome'];
		$UltimaAtualizacao = $_POST['ultima_atualizacao'];
                
		//Validação
		$validacao = true;
		if (empty($PrimeiroNome))
                {
                    $PrimeiroNomeErro = 'Por favor digite o seu Primeiro nome!';
                    $validacao = false;
                }

		if (empty($UltimoNome))
                {
                    $UltimoNomeErro = 'Por favor digite o seu último nome!';
                    $validacao = false;
		}

		if (empty($UltimaAtualizacao))
                {
                    $UltimaAtualizacaoErro = 'Por favor digite sua última atualização!';
                    $validacao = false;
		}

		// update data
		if ($validacao)
                {
                    $pdo = Conexao::getInstance();
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "UPDATE ator  set primeiro_nome = ?, ultimo_nome = ?, ultima_atualizacao = ? WHERE ator_id = ?";
                    $q = $pdo->prepare($sql);
                    $q->execute(array($PrimeiroNome,$UltimoNome,$UltimaAtualizacao,$id));
                    Conexao::disconnect();
                    header("Location: AtorIndex.php");
		}
	}
        else
            {
                $pdo = Conexao::getInstance ();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM ator where ator_id = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		$PrimeiroNome = $data['primeiro_nome'];
        $UltimoNome = $data['ultimo_nome'];
        $UltimaAtualizacao = $data['ultima_atualizacao'];
		
		Conexao::disconnect();
	}
?>

    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
				<title>Atualizar Ator </title>
    </head>

    <body>
        <div class="container">

            <div class="span10 offset1">
							<div class="card">
								<div class="card-header">
                    <h3 class="well"> Atualizar Ator </h3>
                </div>
								<div class="card-body">
                <form class="form-horizontal" action="AtorUpdate.php?ator_id=<?php echo $id?>" method="post">

                    <div class="control-group <?php echo !empty($PrimeiroNomeErro)?'error':'';?>">
                        <label class="control-label">Primeiro Nome</label>
                        <div class="controls">
                            <input name="primeiro_nome" class="form-control" size="50" type="text" placeholder="PrimeiroNome" value="<?php echo !empty($PrimeiroNome)?$PrimeiroNome:'';?>">
                            <?php if (!empty($PrimeiroNomeErro)): ?>
                                <span class="help-inline"><?php echo $PrimeiroNomeErro;?></span>
                                <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php echo !empty($UltimoNomeErro)?'error':'';?>">
                        <label class="control-label">Último Nome</label>
                        <div class="controls">
                            <input name="ultimo_nome" class="form-control" size="80" type="text" placeholder="UltimoNome" value="<?php echo !empty($UltimoNome)?$UltimoNome:'';?>">
                            <?php if (!empty($UltimoNomeErro)): ?>
                                <span class="help-inline"><?php echo $UltimoNomeErro;?></span>
                                <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php echo !empty($UltimaAtualizacaoErro)?'error':'';?>">
                        <label class="control-label">Última Atualização</label>
                        <div class="controls">
                            <input name="ultima_atualizacao" class="form-control" size="30" type="text" placeholder="UltimaAtualizacao" value="<?php echo !empty($UltimaAtualizacao)?$UltimaAtualizacao:'';?>">
                            <?php if (!empty($UltimaAtualizacaoErro)): ?>
                                <span class="help-inline"><?php echo $UltimaAtualizacaoErro;?></span>
                                <?php endif; ?>
                        </div>
                    </div>

                    <br/>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-warning">Atualizar</button>
                        <a href="AtorIndex.php" type="btn" class="btn btn-default">Voltar</a>
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
