<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <title>Adicionar Ator</title>
</head>

<body>
    <div class="container">
        <div clas="span10 offset1">
          <div class="card">
            <div class="card-header">
                <h3 class="well"> Adicionar Ator </h3>
            </div>
            <div class="card-body">
            <form class="form-horizontal" action="AtorCreate.php" method="post">

                <div class="control-group <?php echo !empty($PrimeiroNomeErro)?'error ' : '';?>">
                    <label class="control-label">Primeiro Nome</label>
                    <div class="controls">
                        <input size="50" class="form-control" name="PrimeiroNome" type="text" placeholder="PrimeiroNome" required="" value="<?php echo !empty($PrimeiroNome)?$PrimeiroNome: '';?>">
                        <?php if(!empty($PrimeiroNomeErro)): ?>
                            <span class="help-inline"><?php echo $PrimeiroNomeErro;?></span>
                            <?php endif;?>
                    </div>
                </div>

                <div class="control-group <?php echo !empty($UltimoNomeErro)?'error ': '';?>">
                    <label class="control-label">Ultimo Nome</label>
                    <div class="controls">
                        <input size="80" class="form-control" name="UltimoNome" type="text" placeholder="UltimoNome" required="" value="<?php echo !empty($UltimoNome)?$UltimoNome: '';?>">
                        <?php if(!empty($UltimoNomeErro)): ?>
                            <span class="help-inline"><?php echo $UltimoNomeErro;?></span>
                            <?php endif;?>
                    </div>
                </div>

                <div class="control-group <?php echo !empty($UltimaAtualizacaoErro)?'error ': '';?>">
                    <label class="control-label">Ultima Atualização</label>
                    <div class="controls">
                        <input size="35" class="form-control" name="UltimaAtualizacao" type="text" placeholder="UltimaAtualizacao" required="" value="<?php echo !empty($UltimaAtualizacao)?$UltimaAtualizacao: '';?>">
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
        $PrimeiroNomeErro = null;
        $UltimoNomeErro = null;
        $UltimaAtualizacaoErro = null;

        $PrimeiroNome = $_POST['PrimeiroNome'];
        $UltimoNome = $_POST['UltimoNome'];
        $UltimaAtuaizacao = $_POST['UltimaAtualizacao'];

        echo $PrimeiroNome;
        //Validaçao dos campos:
        $validacao = true;
        if(empty($PrimeiroNome))
        {
            $PrimeiroNomeErro = 'Por favor digite o seu primeiro nome!';
            $validacao = false;
        }

        if(empty($UltimoNome))
        {
            $UltimoNomeErro = 'Por favor digite o seu último nome!';
            $validacao = false;
        }

        if(empty($UltimaAtuaizacao))
        {
            $UltimaAtualizacaoErro = 'Por favor digite a sua ultima atualização!';
            $validacao = false;
        }

        //Inserindo no Banco:
        if($validacao)
        {
            echo "<script>alert('passou aqui')</script>";
            $pdo = Conexao::getInstance();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO ator (primeiro_nome, ultimo_nome, ultima_atualizacao) VALUES(?,?,?)";
            $q = $pdo->prepare($sql);
            $resultado=$q->execute(array($PrimeiroNome,$UltimoNome,$UltimaAtualizacao));
            Conexao::disconnect();

            if($resultado){
                echo "alert('Cadastrado com sucesso')";
            }else{
                echo "alert('erro ao cadastrar')";
            }
            header("Location: AtorRead.php");
        } else {
            echo "Erro";
        }
    } 
?>
