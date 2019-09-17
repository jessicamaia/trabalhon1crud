<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <title>Adicionar Funcionário</title>
</head>

<body>
    <div class="container">
        <div clas="span10 offset1">
          <div class="card">
            <div class="card-header">
                <h3 class="well"> Adicionar Funcionário </h3>
            </div>
            <div class="card-body">
            <form class="form-horizontal" action="FuncionarioCreate.php" method="post">

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

                <div class="control-group <?php echo !empty($EnderecoIdErro)?'error ': '';?>">
                    <label class="control-label">Endereço Id</label>
                    <div class="controls">
                        <input size="80" class="form-control" name="endereco_id" type="text" placeholder="endereco_id" required="" value="<?php echo !empty($endereco_id)?$endereco_id: '';?>">
                        <?php if(!empty($EnderecoIdErro)): ?>
                            <span class="help-inline"><?php echo $EnderecoIdErro;?></span>
                            <?php endif;?>
                    </div>
                </div>

                <div class="control-group <?php echo !empty($ativoErro)?'error ': '';?>">
                    <label class="control-label">Email</label>
                    <div class="controls">
                        <input size="80" class="form-control" name="email" type="text" placeholder="email" required="" value="<?php echo !empty($email)?$email: '';?>">
                        <?php if(!empty($EmailErro)): ?>
                            <span class="help-inline"><?php echo $EmailErro;?></span>
                            <?php endif;?>
                    </div>
                </div>

                <div class="control-group <?php echo !empty($LojaIdErro)?'error ': '';?>">
                    <label class="control-label">Loja id</label>
                    <div class="controls">
                        <input size="80" class="form-control" name="loja_id" type="text" placeholder="loja_id" required="" value="<?php echo !empty($loja_id)?$loja_id: '';?>">
                        <?php if(!empty($LojaIdErro)): ?>
                            <span class="help-inline"><?php echo $LojaIdErro;?></span>
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

                <div class="control-group <?php echo !empty($senhaErro)?'error ': '';?>">
                    <label class="control-label">Usuário</label>
                    <div class="controls">
                        <input size="80" class="form-control" name="usuario" type="text" placeholder="usuario" required="" value="<?php echo !empty($usuario)?$usuario: '';?>">
                        <?php if(!empty($UsuarioErro)): ?>
                            <span class="help-inline"><?php echo $UsuarioErro;?></span>
                            <?php endif;?>
                    </div>
                </div>

                <div class="control-group <?php echo !empty($SenhaErro)?'error ': '';?>">
                    <label class="control-label">Senha</label>
                    <div class="controls">
                        <input size="80" class="form-control" name="senha" type="text" placeholder="senha" required="" value="<?php echo !empty($senha)?$senha: '';?>">
                        <?php if(!empty($SenhaErro)): ?>
                            <span class="help-inline"><?php echo $SenhaErro;?></span>
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
        $PrimeiroNomeErro = null;
        $UltimoNomeErro = null;
        $EnderecoIdErro = null;
        $EmailErro = null;
        $LojaIdErro = null;
        $AtivoErro = null;
        $UsuarioErro = null;
        $SenhaErro = null;
        $UltimaAtualizacaoErro = null;

        $primeiro_nome = $_POST['primeiro_nome'];
        $ultimo_nome = $_POST['ultimo_nome'];
        $endereco_id = $_POST ['endereco_id'];
        $email = $_POST ['email'];
        $loja_id = $_POST ['loja_id'];
        $ativo = $_POST ['ativo'];
        $usuario = $_POST ['usuario'];
        $senha = $_POST ['senha'];
        $ultima_atualizacao = $_POST['ultima_atualizacao'];

        //Validaçao dos campos:
        $validacao = true;
        
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

        if(empty($loja_id))
        {
            $LojaIdErro = 'Por favor digite o id da loja!';
            $validacao = false;
        }

        if(empty($ativo))
        {
            $ativoErro = 'Por favor digite o ativo!';
            $validacao = false;
        }

        if(empty($usuario))
        {
            $UsuarioErro = 'Por favor digite o nome de usuário!';
            $validacao = false;
        }

        if(empty($senha))
        {
            $senhaErro = 'Por favor digite a senha do usuário!';
            $validacao = false;
        }

        if(empty($ultima_atualizacao))
        {
            $UltimaAtualizacaoErro = 'Por favor digite a sua ultima atualização!';
            $validacao = false;
        }
        
        //Inserindo no Banco:

        if($validacao)
        { 
            $pdo = Conexao::getInstance();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO funcionario (primeiro_nome, ultimo_nome, endereco_id, email, loja_id, ativo, usuario,
             senha, ultima_atualizacao) VALUES(?,?,?,?,?,?,?,?,?)";
            $q = $pdo->prepare($sql);
            $resultado=$q->execute(array($primeiro_nome,$ultimo_nome,$endereco_id,$email,$loja_id,$ativo, $usuario,$senha, $ultima_atualizacao));
            Conexao::disconnect();
            header("Location: FuncionarioRead.php");
            if($resultado){
                echo "alert('Cadastrado com sucesso')";
            }else{
                echo "alert('erro ao cadastrar')";
            }
        } 
    } 
?>