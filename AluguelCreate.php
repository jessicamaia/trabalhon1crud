<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <title>Adicionar Aluguel</title>
</head>

<body>
    <div class="container">
        <div clas="span10 offset1">
          <div class="card">
            <div class="card-header">
                <h3 class="well"> Adicionar Aluguel </h3>
            </div>
            <div class="card-body">
            <form class="form-horizontal" action="AluguelCreate.php" method="post">

                <div class="control-group <?php echo !empty($DataAluguelErro)?'error ' : '';?>">
                    <label class="control-label">Data do aluguel</label>
                    <div class="controls">
                        <input size="50" class="form-control" name="data_de_aluguel" type="text" placeholder="data_de_aluguel" required="" value="<?php echo !empty($data_de_aluguel)?$data_de_aluguel: '';?>">
                        <?php if(!empty($DataAluguelErro)): ?>
                            <span class="help-inline"><?php echo $DataAluguelErro;?></span>
                            <?php endif;?>
                    </div>
                </div>

                <div class="control-group <?php echo !empty($InventarioIdErro)?'error ': '';?>">
                    <label class="control-label">Inventário Id</label>
                    <div class="controls">
                        <input size="80" class="form-control" name="inventario_id" type="text" placeholder="inventario_id" required="" value="<?php echo !empty($inventario_id)?$inventario_id: '';?>">
                        <?php if(!empty($InventarioIdErro)): ?>
                            <span class="help-inline"><?php echo $InventarioIdErro;?></span>
                            <?php endif;?>
                    </div>
                </div>

                <div class="control-group <?php echo !empty($ClienteIdErro)?'error ': '';?>">
                    <label class="control-label">Cliente Id</label>
                    <div class="controls">
                        <input size="35" class="form-control" name="cliente_id" type="text" placeholder="cliente_id" required="" value="<?php echo !empty($cliente_id)?$cliente_id: '';?>">
                        <?php if(!empty($ClienteIdErro)): ?>
                            <span class="help-inline"><?php echo $ClienteIdErro;?></span>
                            <?php endif;?>
                    </div>
                </div>

                <div class="control-group <?php echo !empty($DataDevolucaoErro)?'error ': '';?>">
                    <label class="control-label">Data de devolução</label>
                    <div class="controls">
                        <input size="35" class="form-control" name="data_de_devolucao" type="text" placeholder="data_de_devolucao" required="" value="<?php echo !empty($data_de_devolucao)?$data_de_devolucao: '';?>">
                        <?php if(!empty($DataDevolucaoErro)): ?>
                            <span class="help-inline"><?php echo $DataDevolucaoErro;?></span>
                            <?php endif;?>
                    </div>
                </div>

                <div class="control-group <?php echo !empty($FuncionarioIdErro)?'error ': '';?>">
                    <label class="control-label">Funcionário id</label>
                    <div class="controls">
                        <input size="35" class="form-control" name="funcionario_id" type="text" placeholder="funcionario_id" required="" value="<?php echo !empty($funcionario_id)?$funcionario_id: '';?>">
                        <?php if(!empty($FuncionarioIdErro)): ?>
                            <span class="help-inline"><?php echo $FuncionarioIdErro;?></span>
                            <?php endif;?>
                    </div>
                </div>

                <div class="control-group <?php echo !empty($UltimaAtualizacaoErro)?'error ': '';?>">
                    <label class="control-label">Última Atualização</label>
                    <div class="controls">
                        <input size="35" class="form-control" name="ultima_atualizacao" type="text" placeholder="ultima_atualizacao" required="" value="<?php echo !empty($ultima_atualizacao)?$ultima_atualizacao: '';?>">
                        <?php if(!empty($UltimaAtualizacaoErro)): ?>
                            <span class="help-inline"><?php echo $UltimaAtualizacaoErro;?></span>
                            <?php endif;?>
                    </div>
                </div>

                <div class="form-actions">
                    <br/>

                    <button type="submit" class="btn btn-success">Adicionar</button>
                    <a href="index.php" type="btn" class="btn btn-default">Voltar</a>

                </div>
            </form>
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

<?php
    require __DIR__.'/App/autoload.php';
    use DB\Conexao;

    if(!empty($_POST))
    {   
        //Acompanha os erros de validação
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
        //Validaçao dos campos:
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

        //Inserindo no Banco:
        if($validacao)
        {
            $pdo = Conexao::getInstance();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO aluguel (data_de_aluguel, inventario_id, cliente_id, data_de_devolucao, funcionario_id, ultima_atualizacao) VALUES(?,?,?,?,?,?)";
            $q = $pdo->prepare($sql);
            echo $data_de_aluguel;
            $resultado=$q->execute(array($data_de_aluguel, $inventario_id, $cliente_id, $data_de_devolucao, $funcionario_id, $ultima_atualizacao));
            Conexao::disconnect();

            if($resultado){
                echo "alert('Cadastrado com sucesso')";
            }else{
                echo "alert('erro ao cadastrar')";
            }
            header("Location: AluguelRead.php");
        } 
    } 
?>