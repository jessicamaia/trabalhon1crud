<?php

    require __DIR__.'/App/autoload.php';
    use DB\Conexao;

	$id = null;
	if ( !empty($_GET['aluguel_id']))
            {
		$id = $_REQUEST['aluguel_id'];
            }

	if ( null==$id )
            {
		header("Location: AluguelIndex.php");
            }

	if ( !empty($_POST))
            {

         $DataAluguelErro = null;
         $InventarioIdErro = null;
         $ClienteIdErro = null;
         $DataDevolucaoErro = null;
         $FuncionarioIdErro = null;
         $UltimaAtualizacaoErro = null;
               
         $data_de_aluguel = $_POST['data_de_aluguel'];
         $inventario_id = $_POST['inventario_id'];
         $cliente_id = $_POST['cliente_id'];
         $data_de_devolucao = $_POST['data_de_devolucao'];
         $funcionario_id = $_POST['funcionario_id'];
         $ultima_atualizacao = $_POST['ultima_atualizacao'];
                
        echo $data_de_aluguel;

		//Validação
		$validacao = true;
		if(empty($data_de_aluguel))
        {
            $DataAluguelErro = 'Por favor digite a data do aluguel!';
            $validacao = false;
        }

        if(empty($inventario_id))
        {
            $InventarioIdErro = 'Por favor digite o número do inventário!';
            $validacao = false;
        }

        if(empty($cliente_id))
        {
            $ClienteIdErro = 'Por favor digite o id do usuário!';
            $validacao = false;
        }

        if(empty($data_de_devolucao))
        {
            $DataDevolucaoErro = 'Por favor digite a data de devolução!';
            $validacao = false;
        }

        if(empty($funcionario_id))
        {
            $FuncionarioIdErro = 'Por favor digite o id do funcionário!';
            $validacao = false;
        }

        if(empty($ultima_atualizacao))
        {
            $UltimaAtualizacaoErro = 'Por favor digite a última atualização!';
            $validacao = false;
        }
		// update data
		if ($validacao)
                {
                    $pdo = Conexao::getInstance();
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "INSERT INTO aluguel (data_de_aluguel, inventario_id, cliente_id, data_de_devolucao, funcionario_id, ultima_atualizacao) VALUES(?,?,?,?,?,?)";
                    $q = $pdo->prepare($sql);
                    $resultado=$q->execute(array($data_de_aluguel, $inventario_id, $cliente_id, $data_de_devolucao, $funcionario_id, $ultima_atualizacao));
                    Conexao::disconnect();
                    header("Location: AluguelIndex.php");
		}
	}
        else
            {
                $pdo = Conexao::getInstance ();
		    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    $sql = "SELECT * FROM aluguel where aluguel_id = ?";
		    $q = $pdo->prepare($sql);
		    $q->execute(array($id));
            $data = $q->fetch(PDO::FETCH_ASSOC);
            $data_de_aluguel = $data['data_de_aluguel'];
            $inventario_id = $data['inventario_id'];
            $cliente_id = $data['cliente_id'];
            $data_de_devolucao = $data['data_de_devolucao'];
            $funcionario_id = $data['funcionario_id'];
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
				<title>Atualizar Aluguel </title>
    </head>

    <body>
        <div class="container">

            <div class="span10 offset1">
							<div class="card">
								<div class="card-header">
                    <h3 class="well"> Atualizar Aluguel </h3>
                </div>
								<div class="card-body">
                <form class="form-horizontal" action="AluguelUpdate.php?aluguel_id=<?php echo $id;?>" method="post">

                    <div class="control-group <?php echo !empty($DataAluguelErro)?'error':'';?>">
                        <label class="control-label">Data do Aluguel</label>
                        <div class="controls">
                            <input name="data_de_aluguel" class="form-control" size="50" type="text" placeholder="data_de_aluguel" value="<?php echo !empty($data_de_aluguel)?$data_de_aluguel:'';?>">
                            <?php if (!empty($DataAluguelErro)): ?>
                                <span class="help-inline"><?php echo $DataAluguelErro;?></span>
                                <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php echo !empty($InventarioIdErro)?'error':'';?>">
                        <label class="control-label">Inventário Id</label>
                        <div class="controls">
                            <input name="inventario_id" class="form-control" size="80" type="text" placeholder="inventario_id" value="<?php echo !empty($inventario_id)?$inventario_id:'';?>">
                            <?php if (!empty($InventarioIdErro)): ?>
                                <span class="help-inline"><?php echo $InventarioIdErro;?></span>
                                <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php echo !empty($ClienteIdErro)?'error':'';?>">
                        <label class="control-label">Cliente Id</label>
                        <div class="controls">
                            <input name="cliente_id" class="form-control" size="80" type="text" placeholder="cliente_id" value="<?php echo !empty($cliente_id)?$cliente_id:'';?>">
                            <?php if (!empty($ClienteIdErro)): ?>
                                <span class="help-inline"><?php echo $ClienteIdErro;?></span>
                                <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php echo !empty($DataDevolucaoErro)?'error':'';?>">
                        <label class="control-label">Data de Devolução Id</label>
                        <div class="controls">
                            <input name="data_de_devolucao" class="form-control" size="80" type="text" placeholder="data_de_devolucao" value="<?php echo !empty($data_de_devolucao)?$data_de_devolucao:'';?>">
                            <?php if (!empty($DataDevolucaoErro)): ?>
                                <span class="help-inline"><?php echo $DataDevolucaoErro;?></span>
                                <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php echo !empty($FuncionarioIdErro)?'error':'';?>">
                        <label class="control-label">Funcionário Id</label>
                        <div class="controls">
                            <input name="funcionario_id" class="form-control" size="80" type="text" placeholder="funcionario_id" value="<?php echo !empty($funcionario_id)?$funcionario_id:'';?>">
                            <?php if (!empty($FuncionarioIdErro)): ?>
                                <span class="help-inline"><?php echo $FuncionarioIdErro;?></span>
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