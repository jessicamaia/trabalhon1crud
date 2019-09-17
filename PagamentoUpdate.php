<?php

    require __DIR__.'/App/autoload.php';
    use DB\Conexao;

	$id = null;
    if ( !empty($_GET['pagamento_id']))
    {
        $id = $_REQUEST['pagamento_id'];          
    }
    
	if ( null==$id ) {
		header("Location: PagamentoIndex.php");
            }

    if ( !empty($_POST)){

        $ClienteIdErro = null;
        $FuncionarioIdErro = null;
        $AluguelIdErro = null;
        $ValorErro = null;
        $DataPagamentoErro = null;
        $UltimaAtualizacaoErro = null;
               
        $cliente_id = $_POST['cliente_id'];
        $funcionario_id = $_POST['funcionario_id'];
        $aluguel_id = $_POST['aluguel_id'];
        $valor = $_POST['valor'];
        $data_de_pagamento = $_POST['data_de_pagamento'];
        $ultima_atualizacao = $_POST['ultima_atualizacao'];

		//Validação
		$validacao = true;
        if(empty($cliente_id))
        {
            $ClienteIdErro = 'Por favor digite o id do cliente!';
            $validacao = false;
        }

        if(empty($funcionario_id))
        {
            $FuncionarioIdErro = 'Por favor digite o id do funcionário!';
            $validacao = false;
        }

        if(empty($aluguel_id))
        {
            $AluguelIdErro = 'Por favor digite o aluguel!';
            $validacao = false;
        }


        if(empty($valor))
        {
            $ValorErro = 'Por favor digite o valor!';
            $validacao = false;
        }

        if(empty($data_de_pagamento))
        {
            $DataPagamentoErro = 'Por favor digite a data de pagamento!';
            $validacao = false;
        }

        if(empty($ultima_atualizacao))
        {
            $UltimaAtualizacaoErro = 'Por favor digite a sua última atualização!';
            $validacao = false;
        }

		// update 
		if ($validacao){
                    $pdo = Conexao::getInstance();
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "UPDATE pagamento  set cliente_id = ?, funcionario_id = ?, aluguel_id =?, valor=?, data_de_pagamento=?, ultima_atualizacao = ? WHERE pagamento_id =?";
                    $q = $pdo->prepare($sql);
                    $q->execute(array($cliente_id,$funcionario_id, $aluguel_id, $valor, $data_de_pagamento, $ultima_atualizacao, $id));
                    Conexao::disconnect();
                    header("Location: PagamentoIndex.php");
		}
	}
        else {
                $pdo = Conexao::getInstance ();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT * FROM pagamento where pagamento_id = ?";
                $q = $pdo->prepare($sql);
                $q->execute(array($id));
                $data = $q->fetch(PDO::FETCH_ASSOC);
                $cliente_id = $data['cliente_id'];
                $funcionario_id = $data['funcionario_id'];
                $aluguel_id = $data['aluguel_id'];
                $valor = $data['valor'];
                $data_de_pagamento = $data['data_de_pagamento'];
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
				<title>Atualizar Pagamento </title>
    </head>

    <body>
        <div class="container">

            <div class="span10 offset1">
							<div class="card">
								<div class="card-header">
                    <h3 class="well"> Atualizar Pagamento </h3>
                </div>
					<div class="card-body">
                <form class="form-horizontal" action="PagamentoUpdate.php?pagamento_id=<?php echo $id;?>" method="post">


                    <div class="control-group <?php echo !empty($ClienteIdErro)?'error':'';?>">
                        <label class="control-label">Cliente id</label>
                        <div class="controls">
                            <input name="cliente_id" class="form-control" size="80" type="text" placeholder="cliente_id" value="<?php echo !empty($cliente_id)?$cliente_id:'';?>">
                             <?php if (!empty($ClienteIdErro)): ?>
                                <span class="help-inline"><?php echo $ClienteIdErro;?></span>
                                <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php echo !empty($FuncionarioIdErro)?'error ': '';?>">
                    <label class="control-label">Funcionário Id</label>
                    <div class="controls">
                        <input size="80" class="form-control" name="funcionario_id" type="text" placeholder="funcionario_id" required="" value="<?php echo !empty($funcionario_id)?$funcionario_id: '';?>">
                        <?php if(!empty($FuncionarioIdErro)): ?>
                            <span class="help-inline"><?php echo $FuncionarioIdErro;?></span>
                            <?php endif;?>
                    </div>
                </div>

                <div class="control-group <?php echo !empty($AluguelIdErro)?'error ': '';?>">
                    <label class="control-label">Aluguel Id</label>
                    <div class="controls">
                        <input size="80" class="form-control" name="aluguel_id" type="text" placeholder="aluguel_id" required="" value="<?php echo !empty($aluguel_id)?$aluguel_id: '';?>">
                        <?php if(!empty($aluguelIdErro)): ?>
                            <span class="help-inline"><?php echo $aluguelIdErro;?></span>
                            <?php endif;?>
                    </div>
                </div>

                <div class="control-group <?php echo !empty($ValorErro)?'error ': '';?>">
                    <label class="control-label">Valor</label>
                    <div class="controls">
                        <input size="80" class="form-control" name="valor" type="text" placeholder="valor" required="" value="<?php echo !empty($valor)?$valor: '';?>">
                        <?php if(!empty($ValorErro)): ?>
                            <span class="help-inline"><?php echo $ValorErro;?></span>
                            <?php endif;?>
                    </div>
                </div>

                <div class="control-group <?php echo !empty($DataPagamentoErro)?'error ': '';?>">
                    <label class="control-label">Data De Pagamento</label>
                    <div class="controls">
                        <input size="80" class="form-control" name="data_de_pagamento" type="text" placeholder="data_de_pagamento" required="" value="<?php echo !empty($data_de_pagamento)?$data_de_pagamento: '';?>">
                        <?php if(!empty($DataPagamentoErro)): ?>
                            <span class="help-inline"><?php echo $data_de_pagamento;?></span>
                            <?php endif;?>
                    </div>
                </div>

                <div class="control-group <?php echo !empty($UltimaAtualizacaoErro)?'error ': '';?>">
                    <label class="control-label">Ultima Atualização</label>
                    <div class="controls">
                        <input size="35" class="form-control" name="ultima_atualizacao" type="text" placeholder="ultima_atualizacao" required="" value="<?php echo !empty($ultima_atualizacao)?$ultima_atualizacao: '';?>">
                        <?php if(!empty($UltimaAtualizacaoErro)): ?>
                            <span class="help-inline"><?php echo $UltimaAtualizacaoErro;?></span>
                            <?php endif;?>
                    </div>
                </div>

                    <br/>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-warning">Atualizar</button>
                        <a href="PagamentoIndex.php" type="btn" class="btn btn-default">Voltar</a>
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