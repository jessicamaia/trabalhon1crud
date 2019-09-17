<?php

    require __DIR__.'/App/autoload.php';
    use DB\Conexao;

	$id = null;
	if ( !empty($_GET['pais_id']))
            {
		$id = $_REQUEST['pais_id'];
            }

	if ( null==$id )
            {
		header("Location: PaisIndex.php");
            }

    if ( !empty($_POST)){

		$PaisErro = null;
        $UltimaAtualizacaoErro = null;

        $pais = $_POST['pais'];
        $ultima_atualizacao = $_POST['ultima_atualizacao'];

                
		//Validação
		$validacao = true;
		if(empty($pais)){

            $PaisErro = 'Por favor digite o nome do país!';
            $validacao = false;
        }


        if(empty($ultima_atualizacao)){

            $UltimaAtualizacaoErro = 'Por favor digite a sua última atualização!';
            $validacao = false;
        }
		// update 
		if ($validacao){
                    $pdo = Conexao::getInstance();
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "UPDATE pais  set pais = ?, ultima_atualizacao = ? WHERE pais_id = ?";
                    $q = $pdo->prepare($sql);
                    $q->execute(array($pais, $ultima_atualizacao, $id));
                    Conexao::disconnect();
                    header("Location: PaisIndex.php");
		}
	}
        else {
                $pdo = Conexao::getInstance ();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT * FROM pais where pais_id = ?";
                $q = $pdo->prepare($sql);
                $q->execute(array($id));
                $data = $q->fetch(PDO::FETCH_ASSOC);;
                $pais = $data['pais'];
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
				<title>Atualizar País </title>
    </head>

    <body>
        <div class="container">

            <div class="span10 offset1">
							<div class="card">
								<div class="card-header">
                    <h3 class="well"> Atualizar País </h3>
                </div>
					<div class="card-body">
                <form class="form-horizontal" action="PaisUpdate.php?pais_id=<?php echo $id?>" method="post">


                    <div class="control-group <?php echo !empty($CidadeErro)?'error':'';?>">
                        <label class="control-label">País</label>
                        <div class="controls">
                            <input name="pais" class="form-control" size="80" type="text" placeholder="pais" value="<?php echo !empty($pais)?$pais:'';?>">
                             <?php if (!empty($PaisErro)): ?>
                                <span class="help-inline"><?php echo $PaisErro;?></span>
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
                        <a href="paisIndex.php" type="btn" class="btn btn-default">Voltar</a>
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