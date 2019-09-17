<?php

    require __DIR__.'/App/autoload.php';
    use DB\Conexao;

	$id = null;
	if ( !empty($_GET['cidade_id']))
            {
		$id = $_REQUEST['cidade_id'];
            }

	if ( null==$id )
            {
		header("Location: CidadeIndex.php");
            }

    if ( !empty($_POST)){

		$CidadeErro = null;
		$PaisIdErro = null;
		$UltimaAtualizacaoErro = null;
               
        $cidade = $_POST['cidade'];
        $pais_id = $_POST ['pais_id'];
		$ultima_atualizacao = $_POST['ultima_atualizacao'];
                
		//Validação
		$validacao = true;
		if (empty($cidade)){
                    $CidadeErro = 'Por favor digite a cidade!';
                    $validacao = false;
        }
        
        if (empty($pais_id))
                {
                    $PaisIdErro = 'Por favor digite o id do país!';
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
                    $sql = "UPDATE cidade  set cidade = ?, pais_id = ?, ultima_atualizacao = ? WHERE cidade_id = ?";
                    $q = $pdo->prepare($sql);
                    $q->execute(array($cidade,$pais_id,$ultima_atualizacao, $id));
                    Conexao::disconnect();
                    header("Location: CidadeIndex.php");
		}
	}
        else {
                $pdo = Conexao::getInstance ();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT * FROM cidade where cidade_id = ?";
                $q = $pdo->prepare($sql);
                $q->execute(array($id));
                $data = $q->fetch(PDO::FETCH_ASSOC);
                //$cidade_id = $data['cidade_id'];
                $cidade = $data['cidade'];
                $pais_id = $data['pais_id'];
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
				<title>Atualizar Cidade </title>
    </head>

    <body>
        <div class="container">

            <div class="span10 offset1">
							<div class="card">
								<div class="card-header">
                    <h3 class="well"> Atualizar Cidade </h3>
                </div>
					<div class="card-body">
                <form class="form-horizontal" action="CidadeUpdate.php?cidade_id=<?php echo $id?>" method="post">


                    <div class="control-group <?php echo !empty($CidadeErro)?'error':'';?>">
                        <label class="control-label"> cidade</label>
                        <div class="controls">
                            <input name="cidade" class="form-control" size="80" type="text" placeholder="cidade" value="<?php echo !empty($cidade)?$cidade:'';?>">
                             <?php if (!empty($CidadeErro)): ?>
                                <span class="help-inline"><?php echo $CidadeErro;?></span>
                                <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php echo !empty($PaisIdErro)?'error':'';?>">
                        <label class="control-label"> País Id</label>
                        <div class="controls">
                            <input name="pais_id" class="form-control" size="80" type="text" placeholder="pais_id" value="<?php echo !empty($pais_id)?$pais_id:'';?>">
                             <?php if (!empty($PaisIdErro)): ?>
                                <span class="help-inline"><?php echo $PaisIdErro;?></span>
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
                        <a href="CidadeIndex.php" type="btn" class="btn btn-default">Voltar</a>
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
