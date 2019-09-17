<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <title>Adicionar País</title>
</head>

<body>
    <div class="container">
        <div clas="span10 offset1">
          <div class="card">
            <div class="card-header">
                <h3 class="well"> Adicionar País </h3>
            </div>
            <div class="card-body">
            <form class="form-horizontal" action="PaisCreate.php" method="post">

                <div class="control-group <?php echo !empty($PaisErro)?'error ' : '';?>">
                    <label class="control-label">Nome do País</label>
                    <div class="controls">
                        <input size="50" class="form-control" name="pais" type="text" placeholder="pais" required="" value="<?php echo !empty($pais)?$pais: '';?>">
                        <?php if(!empty($PaisErro)): ?>
                            <span class="help-inline"><?php echo $PaisErro;?></span>
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
        $PaisErro = null;
        $UltimaAtualizacaoErro = null;

        $pais = $_POST['pais'];
        $ultima_atualizacao = $_POST['ultima_atualizacao'];

        //Validaçao dos campos:
        $validacao = true;
        if(empty($pais))
        {
            $PaisErro = 'Por favor digite o nome do país!';
            $validacao = false;
        }


        if(empty($ultima_atualizacao))
        {
            $UltimaAtualizacaoErro = 'Por favor digite a sua última atualização!';
            $validacao = false;
        }

        //Inserindo no Banco:
        if($validacao) {
            
            $pdo = Conexao::getInstance();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO pais (pais, ultima_atualizacao) VALUES(?,?)";
            $q = $pdo->prepare($sql);
            $resultado=$q->execute(array($pais, $ultima_atualizacao));
            Conexao::disconnect();

            if($resultado){
                echo "alert('Cadastrada com sucesso')";
            }else{
                echo "alert('erro ao cadastrar')";
            }
            header("Location: PaisRead.php");
        }
    }
?>