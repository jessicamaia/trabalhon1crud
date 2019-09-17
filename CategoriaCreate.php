<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <title>Adicionar Categoria</title>
</head>

<body>
    <div class="container">
        <div clas="span10 offset1">
          <div class="card">
            <div class="card-header">
                <h3 class="well"> Adicionar Categoria </h3>
            </div>
            <div class="card-body">
            <form class="form-horizontal" action="CategoriaCreate.php" method="post">

                <div class="control-group <?php echo !empty($NomeErro)?'error ': '';?>">
                    <label class="control-label">Nome</label>
                    <div class="controls">
                        <input size="80" class="form-control" name="nome" type="text" placeholder="nome" required="" value="<?php echo !empty($nome)?$nome: '';?>">
                        <?php if(!empty($NomeErro)): ?>
                            <span class="help-inline"><?php echo $NomeErro;?></span>
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
        $NomeErro = null;
        $UltimaAtualizacaoErro = null;

        $nome = $_POST['nome'];
        $UltimaAtualizacao = $_POST['ultima_atualizacao'];

        echo $categoria_id;
        //Validaçao dos campos:
        $validacao = true;

        if(empty($nome))
        {
            $NomeErro = 'Por favor digite o seu nome!';
            $validacao = false;
        }

        if(empty($UltimaAtualizacao))
        {
            $UltimaAtualizacaoErro = 'Por favor digite a sua ultima atualização!';
            $validacao = false;
        }

        //Inserindo no Banco:
        if($validacao)
        {
            $pdo = Conexao::getInstance();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO categoria (nome, ultima_atualizacao) VALUES(?,?)";
            $q = $pdo->prepare($sql);
            $resultado=$q->execute(array($nome,$UltimaAtualizacao));
            Conexao::disconnect();

            if($resultado){
                echo "alert('Cadastrada com sucesso')";
            }else{
                echo "alert('erro ao cadastrar')";
            }
            header("Location: CategoriaRead.php");
        } else {
            echo "Erro";
        }
    } 
?>
