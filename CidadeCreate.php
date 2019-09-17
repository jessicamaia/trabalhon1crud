<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <title>Adicionar Cidade</title>
</head>

<body>
    <div class="container">
        <div clas="span10 offset1">
          <div class="card">
            <div class="card-header">
                <h3 class="well"> Adicionar Cidade </h3>
            </div>
            <div class="card-body">
            <form class="form-horizontal" action="CidadeCreate.php" method="post">

                <div class="control-group <?php echo !empty($CidadeErro)?'error ' : '';?>">
                    <label class="control-label">Cidade</label>
                    <div class="controls">
                        <input size="50" class="form-control" name="cidade" type="text" placeholder="cidade" required="" value="<?php echo !empty($cidade)?$cidade: '';?>">
                        <?php if(!empty($CidadeErro)): ?>
                            <span class="help-inline"><?php echo $CidadeErro;?></span>
                            <?php endif;?>
                    </div>
                </div>

                <div class="control-group <?php echo !empty($PaisIdErro)?'error ': '';?>">
                    <label class="control-label">País Id</label>
                    <div class="controls">
                        <input size="80" class="form-control" name="pais_id" type="text" placeholder="pais_id" required="" value="<?php echo !empty($pais_id)?$pais_id: '';?>">
                        <?php if(!empty($PaisIdErro)): ?>
                            <span class="help-inline"><?php echo $PaisIdErro;?></span>
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
        $CidadeErro = null;
        $PaisIdErro = null;
        $UltimaAtualizacaoErro = null;

        $cidade = $_POST['cidade'];
        $pais_id = $_POST['pais_id'];
        $ultima_atualizacao = $_POST['ultima_atualizacao'];

        echo $cidade;
        //Validaçao dos campos:
        $validacao = true;
        if(empty($cidade))
        {
            $CidadeErro = 'Por favor digite o nome da cidade!';
            $validacao = false;
        }

        if(empty($pais_id))
        {
            $PaisIdErro = 'Por favor digite o id do país!';
            $validacao = false;
        }

        if(empty($ultima_atualizacao))
        {
            $UltimaAtualizacaoErro = 'Por favor digite a sua última atualização!';
            $validacao = false;
        }

        //Inserindo no Banco:
        if($validacao)
        {
            echo "<script>alert('passou aqui')</script>";
            $pdo = Conexao::getInstance();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO Cidade (cidade, pais_id, ultima_atualizacao) VALUES(?,?,?)";
            $q = $pdo->prepare($sql);
            $resultado=$q->execute(array($cidade,$pais_id,$ultima_atualizacao));
            Conexao::disconnect();

            if($resultado){
                echo "alert('Cadastrada com sucesso')";
            }else{
                echo "alert('erro ao cadastrar')";
            }
            header("Location: CidadeRead.php");
        } 
    } 
?>
