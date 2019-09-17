<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <title>Adicionar Endereço</title>
</head>

<body>
    <div class="container">
        <div clas="span10 offset1">
          <div class="card">
            <div class="card-header">
                <h3 class="well"> Adicionar Endereço </h3>
            </div>
            <div class="card-body">
            <form class="form-horizontal" action="EndCreate.php" method="post">

                <div class="control-group <?php echo !empty($EnderecoErro)?'error ' : '';?>">
                    <label class="control-label">Endereço</label>
                    <div class="controls">
                        <input size="50" class="form-control" name="endereco" type="text" placeholder="endereco" required="" value="<?php echo !empty($endereco)?$endereco: '';?>">
                        <?php if(!empty($EnderecoErro)): ?>
                            <span class="help-inline"><?php echo $EnderecoErro;?></span>
                            <?php endif;?>
                    </div>
                </div>

                <div class="control-group <?php echo !empty($BairroErro)?'error ': '';?>">
                    <label class="control-label">Bairro</label>
                    <div class="controls">
                        <input size="80" class="form-control" name="bairro" type="text" placeholder="bairro" required="" value="<?php echo !empty($bairro)?$bairro: '';?>">
                        <?php if(!empty($BairroErro)): ?>
                            <span class="help-inline"><?php echo $BairroErro;?></span>
                            <?php endif;?>
                    </div>
                </div>

                <div class="control-group <?php echo !empty($CidadeIdErro)?'error ': '';?>">
                    <label class="control-label">Cidade Id</label>
                    <div class="controls">
                        <input size="80" class="form-control" name="cidade_id" type="text" placeholder="cidade_id" required="" value="<?php echo !empty($cidade_id)?$cidade_id: '';?>">
                        <?php if(!empty($CidadeIdErro)): ?>
                            <span class="help-inline"><?php echo $CidadeIdErro;?></span>
                            <?php endif;?>
                    </div>
                </div>

                <div class="control-group <?php echo !empty($CepErro)?'error ': '';?>">
                    <label class="control-label">CEP</label>
                    <div class="controls">
                        <input size="80" class="form-control" name="cep" type="text" placeholder="cep" required="" value="<?php echo !empty($cep)?$cep: '';?>">
                        <?php if(!empty($CepErro)): ?>
                            <span class="help-inline"><?php echo $CepErro;?></span>
                            <?php endif;?>
                    </div>
                </div>

                <div class="control-group <?php echo !empty($TelefoneErro)?'error ': '';?>">
                    <label class="control-label">Telefone</label>
                    <div class="controls">
                        <input size="80" class="form-control" name="telefone" type="text" placeholder="telefone" required="" value="<?php echo !empty($telefone)?$telefone: '';?>">
                        <?php if(!empty($TelefoneErro)): ?>
                            <span class="help-inline"><?php echo $TelefoneErro;?></span>
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
        $EnderecoErro = null;
        $BairroErro = null;
        $CidadeIdErro = null;
        $CepErro = null;
        $TelefoneErro = null;
        $UltimaAtualizacaoErro = null;

        $endereco = $_POST['endereco'];
        $bairro = $_POST['bairro'];
        $cidade_id = $_POST['cidade_id'];
        $cep = $_POST['cep'];
        $telefone = $_POST['telefone'];
        $ultima_atualizacao = $_POST['ultima_atualizacao'];

        //Validaçao dos campos:
        $validacao = true;
        if(empty($endereco))
        {
            $EnderecoErro = 'Por favor digite o endereço!';
            $validacao = false;
        }

        if(empty($bairro))
        {
            $BairroErro = 'Por favor digite o nome do bairro!';
            $validacao = false;
        }

        if(empty($cidade_id))
        {
            $CidadeIdErro = 'Por favor digite o id da cidade!';
            $validacao = false;
        }

        if(empty($cep))
        {
            $CepErro = 'Por favor digite o CEP!';
            $validacao = false;
        }

        if(empty($telefone))
        {
            $TelefoneErro = 'Por favor digite o número de telefone!';
            $validacao = false;
        }

        if(empty($ultima_atualizacao))
        {
            $UltimaAtualizacaoErro = 'Por favor digite a sua última atualização!';
            $validacao = false;
        }

        //Inserindo no Banco:
        if($validacao){
            $pdo = Conexao::getInstance();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO endereco (endereco, bairro, cidade_id, cep, telefone, ultima_atualizacao) VALUES(?,?,?,?,?,?)";
            $q = $pdo->prepare($sql);
            $resultado=$q->execute(array($endereco, $bairro, $cidade_id, $cep, $telefone, $ultima_atualizacao));
            Conexao::disconnect();

            if($resultado){
                echo "alert('Cadastrado com sucesso')";
            }else{
                echo "alert('erro ao cadastrar')";
            }
            header("Location: EndRead.php");
        } 
    } 
?>