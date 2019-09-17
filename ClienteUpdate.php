<?php

    require __DIR__.'/App/autoload.php';
    use DB\Conexao;

	$id = null;
	if ( !empty($_GET['cliente_id']))
            {
		$id = $_REQUEST['cliente_id'];
            }

	if ( null==$id )
            {
		header("Location: ClienteIndex.php");
            }

	if ( !empty($_POST))
            {

                $LojaIdErro = null;
                $PrimeiroNomeErro = null;
                $UltimoNomeErro = null;
                $EmailErro = null;
                $EnderecoIdErro = null;
                $AtivoErro = null;
                $DataErro = null;
                $UltimaAtualizacaoErro = null;
        
                $loja_id = $_POST ['loja_id'];
                $primeiro_nome = $_POST['primeiro_nome'];
                $ultimo_nome = $_POST['ultimo_nome'];
                $email = $_POST['email'];
                $endereco_id = $_POST['endereco_id'];
                $ativo = $_POST['ativo'];
                $data_criacao = $_POST['data_criacao'];
                $UltimaAtualizacao = $_POST['ultima_atualizacao'];
                
		//Validação
		$validacao = true;

        if(empty($loja_id))
        {
            $LojaIdErro = 'Por favor digite o id da loja!';
            $validacao = false;
        }

        if(empty($primeiro_nome))
        {
            $PrimeiroNomeErro = 'Por favor digite o seu primeiro nome!';
            $validacao = false;
        }

        if(empty($ultimo_nome))
        {
            $UltimoNomeErro = 'Por favor digite o seu último nome!';
            $validacao = false;
        }

        if(empty($email))
        {
            $EmailErro = 'Por favor digite o seu email!';
            $validacao = false;
        }

        if(empty($endereco_id))
        {
            $EnderecoIdErro = 'Por favor digite o seu endereço!';
            $validacao = false;
        }

        if(empty($ativo))
        {
            $AtivoErro = 'Por favor digite o ativo!';
            $validacao = false;
        }

        if(empty($data_criacao))
        {
            $DataErro = 'Por favor digite a data de criação!';
            $validacao = false;
        }

        if(empty($UltimaAtualizacao))
        {
            $UltimaAtualizacaoErro = 'Por favor digite a sua ultima atualização!';
            $validacao = false;
        }

		// update data
		if ($validacao)
                {
                    $pdo = Conexao::getInstance();
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "UPDATE cliente  set loja_id = ?, primeiro_nome = ?, ultimo_nome = ?, email = ?, endereco_id=?, ativo=?, data_criacao=?, ultima_atualizacao =?  WHERE cliente_id = ?";
                    $q = $pdo->prepare($sql);
                    $resultado=$q->execute(array($loja_id, $primeiro_nome,$ultimo_nome,$email,$endereco_id, $ativo, $data_criacao, $UltimaAtualizacao, $id));
                    Conexao::disconnect();
                    echo "passou aqui";
                    header("Location: ClienteIndex.php");
		}
	}
        else
            {
                $pdo = Conexao::getInstance ();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT * FROM cliente where cliente_id = ?";
                $q = $pdo->prepare($sql);
                $q->execute(array($id));
                $data = $q->fetch(PDO::FETCH_ASSOC);
                $loja_id = $data['loja_id'];
                $primeiro_nome = $data['primeiro_nome'];
                $ultimo_nome = $data['ultimo_nome'];
                $email = $data['email'];
                $endereco_id = $data['endereco_id'];
                $ativo = $data['ativo'];
                $data_criacao = $data['data_criacao'];
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
				<title>Atualizar Cliente </title>
    </head>

    <body>
        <div class="container">

            <div class="span10 offset1">
							<div class="card">
								<div class="card-header">
                    <h3 class="well"> Atualizar Cliente </h3>
                </div>
								<div class="card-body">
                <form class="form-horizontal" action="ClienteUpdate.php?cliente_id=<?php echo $id?>" method="post">

                 <div class="control-group <?php echo !empty($LojaIdErro)?'error ' : '';?>">
                     <label class="control-label">Loja Id</label>
                        <div class="controls">
                        <input size="50" class="form-control" name="loja_id" type="text" placeholder="loja_id" required="" value="<?php echo !empty($loja_id)?$loja_id: '';?>">
                        <?php if(!empty($LojaIdErro)): ?>
                            <span class="help-inline"><?php echo $LojaIdErro;?></span>
                            <?php endif;?>
                    </div>
                </div>

                    <div class="control-group <?php echo !empty($PrimeiroNomeErro)?'error':'';?>">
                        <label class="control-label">Primeiro Nome</label>
                        <div class="controls">
                            <input name="primeiro_nome" class="form-control" size="50" type="text" placeholder="primeiro_nome" value="<?php echo !empty($primeiro_nome)?$primeiro_nome:'';?>">
                            <?php if (!empty($PrimeiroNomeErro)): ?>
                                <span class="help-inline"><?php echo $PrimeiroNomeErro;?></span>
                                <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php echo !empty($UltimoNomeErro)?'error':'';?>">
                        <label class="control-label">Último Nome</label>
                        <div class="controls">
                            <input name="ultimo_nome" class="form-control" size="80" type="text" placeholder="ultimo_nome" value="<?php echo !empty($ultimo_nome)?$ultimo_nome:'';?>">
                            <?php if (!empty($UltimoNomeErro)): ?>
                                <span class="help-inline"><?php echo $UltimoNomeErro;?></span>
                                <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php echo !empty($EmailErro)?'error ': '';?>">
                    <label class="control-label">Email</label>
                    <div class="controls">
                        <input size="80" class="form-control" name="email" type="text" placeholder="email" required="" value="<?php echo !empty($email)?$email: '';?>">
                        <?php if(!empty($EmailErro)): ?>
                            <span class="help-inline"><?php echo $EmailErro;?></span>
                            <?php endif;?>
                    </div>
                </div>

                <div class="control-group <?php echo !empty($EnderecoIdErro)?'error ': '';?>">
                    <label class="control-label">Endereço id</label>
                    <div class="controls">
                        <input size="80" class="form-control" name="endereco_id" type="text" placeholder="endereco_id" required="" value="<?php echo !empty($endereco_id)?$endereco_id: '';?>">
                        <?php if(!empty($EnderecoIdErro)): ?>
                            <span class="help-inline"><?php echo $EnderecoIdErro;?></span>
                            <?php endif;?>
                    </div>
                </div>

                <div class="control-group <?php echo !empty($AtivoErro)?'error ': '';?>">
                    <label class="control-label">Ativo</label>
                    <div class="controls">
                        <input size="80" class="form-control" name="ativo" type="text" placeholder="ativo" required="" value="<?php echo !empty($ativo)?$ativo: '';?>">
                        <?php if(!empty($AtivoErro)): ?>
                            <span class="help-inline"><?php echo $AtivoErro;?></span>
                            <?php endif;?>
                    </div>
                </div>

                <div class="control-group <?php echo !empty($DataErro)?'error ': '';?>">
                    <label class="control-label">Data de Criação</label>
                    <div class="controls">
                        <input size="80" class="form-control" name="data_criacao" type="text" placeholder="data_criacao" required="" value="<?php echo !empty($data_criacao)?$data_criacao: '';?>">
                        <?php if(!empty($DataErro)): ?>
                            <span class="help-inline"><?php echo $DataErro;?></span>
                            <?php endif;?>
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
                        <a href="ClienteIndex.php" type="btn" class="btn btn-default">Voltar</a>
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
