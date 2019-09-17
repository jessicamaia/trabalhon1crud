<!DOCTYPE html>
<html lang="pt-br">


<head>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <title>Adicionar </title>
</head>

<body>
    <div class="container">
        <div clas="span10 offset1">
          <div class="card">
            <div class="card-header">
                <h3 class="well"> Adicionar  </h3>
            </div>
            <div class="card-body">
            <form class="form-horizontal" action="ClienteCreate.php" method="post">

                <div class="control-group <?php echo !empty($LojaIdErro)?'error ' : '';?>">
                    <label class="control-label">Loja Id</label>
                    <div class="controls">
                        <input size="50" class="form-control" name="loja_id" type="text" placeholder="loja_id" required="" value="<?php echo !empty($loja_id)?$loja_id: '';?>">
                        <?php if(!empty($LojaIdErro)): ?>
                            <span class="help-inline"><?php echo $LojaIdErro;?></span>
                            <?php endif;?>
                    </div>
                </div>

                <div class="control-group <?php echo !empty($PrimeiroNomeErro)?'error ' : '';?>">
                    <label class="control-label">Primeiro Nome</label>
                    <div class="controls">
                        <input size="50" class="form-control" name="primeiro_nome" type="text" placeholder="primeiro_nome" required="" value="<?php echo !empty($primeiro_nome)?$primeiro_nome: '';?>">
                        <?php if(!empty($PrimeiroNomeErro)): ?>
                            <span class="help-inline"><?php echo $PrimeiroNomeErro;?></span>
                            <?php endif;?>
                    </div>
                </div>

                <div class="control-group <?php echo !empty($UltimoNomeErro)?'error ': '';?>">
                    <label class="control-label">Ultimo Nome</label>
                    <div class="controls">
                        <input size="80" class="form-control" name="ultimo_nome" type="text" placeholder="ultimo_nome" required="" value="<?php echo !empty($ultimo_nome)?$ultimo_nome: '';?>">
                        <?php if(!empty($UltimoNomeErro)): ?>
                            <span class="help-inline"><?php echo $UltimoNomeErro;?></span>
                            <?php endif;?>
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
        $ultima_atualizacao = $_POST['ultima_atualizacao'];

       
        //Validaçao dos campos:
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

        if(empty($UltimaAtuaizacao))
        {
            $UltimaAtualizacaoErro = 'Por favor digite a sua ultima atualização!';
            $validacao = false;
        }

        //Inserindo no Banco:
        if($validacao)
        {
            $pdo = Conexao::getInstance();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO  (loja_id, primeiro_nome, ultimo_nome, email, endereco_id, ativo, data_criacao, ultima_atualizacao) VALUES(?,?,?,?,?,?,?,?)";
            $q = $pdo->prepare($sql);
            $resultado=$q->execute(array($loja_id, $primeiro_nome,$ultimo_nome,$email,$endereco_id, $ativo, $data_criacao, $ultima_atualizacao));
            Conexao::disconnect();

            if($resultado){
                echo "alert('Cadastrado com sucesso')";
            }else{
                echo "alert('erro ao cadastrar')";
            }
            header("Location: Read.php");
        } 
    } 
?>