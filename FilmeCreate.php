<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <title>Adicionar Filme</title>
</head>

<body>
    <div class="container">
        <div clas="span10 offset1">
          <div class="card">
            <div class="card-header">
                <h3 class="well"> Adicionar Filme </h3>
            </div>
            <div class="card-body">
            <form class="form-horizontal" action="FilmeCreate.php" method="post">

                <div class="control-group <?php echo !empty($TituloFilmeErro)?'error ' : '';?>">
                    <label class="control-label">filme</label>
                    <div class="controls">
                        <input size="50" class="form-control" name="titulo" type="text" placeholder="titulo" required="" value="<?php echo !empty($titulo)?$titulo: '';?>">
                        <?php if(!empty($TituloFilmeErro)): ?>
                            <span class="help-inline"><?php echo $TituloFilmeErro;?></span>
                            <?php endif;?>
                    </div>
                </div>

                <div class="control-group <?php echo !empty($DescricaoErro)?'error ': '';?>">
                    <label class="control-label">Descrição</label>
                    <div class="controls">
                        <input size="80" class="form-control" name="descricao" type="text" placeholder="descricao" required="" value="<?php echo !empty($descricao)?$descricao: '';?>">
                        <?php if(!empty($DescricaoErro)): ?>
                            <span class="help-inline"><?php echo $DescricaoErro;?></span>
                            <?php endif;?>
                    </div>
                </div>

                <div class="control-group <?php echo !empty($AnoLancamentoErro)?'error ': '';?>">
                    <label class="control-label">Ano De Lançamento</label>
                    <div class="controls">
                        <input size="80" class="form-control" name="ano_de_lancamento" type="text" placeholder="ano_de_lancamento" required="" value="<?php echo !empty($ano_de_lancamento)?$ano_de_lancamento: '';?>">
                        <?php if(!empty($AnoLancamentoErro)): ?>
                            <span class="help-inline"><?php echo $AnoLancamentoErro;?></span>
                            <?php endif;?>
                    </div>
                </div>

                <div class="control-group <?php echo !empty($IdiomaIdErro)?'error ': '';?>">
                    <label class="control-label">Idioma Id</label>
                    <div class="controls">
                        <input size="80" class="form-control" name="idioma_id" type="text" placeholder="idioma_id" required="" value="<?php echo !empty($idioma_id)?$idioma_id: '';?>">
                        <?php if(!empty($IdiomaIdErro)): ?>
                            <span class="help-inline"><?php echo $IdiomaIdErro;?></span>
                            <?php endif;?>
                    </div>
                </div>

                <div class="control-group <?php echo !empty($IdiomaOriginalIdErro)?'error ': '';?>">
                    <label class="control-label">Idioma Original Id</label>
                    <div class="controls">
                        <input size="80" class="form-control" name="idioma_original_id" type="text" placeholder="idioma_original_id" required="" value="<?php echo !empty($idioma_original_id)?$idioma_original_id: '';?>">
                        <?php if(!empty($IdiomaOriginalIdErro)): ?>
                            <span class="help-inline"><?php echo $IdiomaOriginalIdErro;?></span>
                            <?php endif;?>
                    </div>
                </div>

                <div class="control-group <?php echo !empty($DuracaoLocacaoErro)?'error ': '';?>">
                    <label class="control-label"> Duração Locação</label>
                    <div class="controls">
                        <input size="80" class="form-control" name="duracao_da_locacao" type="text" placeholder="duracao_da_locacao" required="" value="<?php echo !empty($duracao_da_locacao)?$duracao_da_locacao: '';?>">
                        <?php if(!empty($DuracaoLocacaoErro)): ?>
                            <span class="help-inline"><?php echo $DuracaoLocacaoErro;?></span>
                            <?php endif;?>
                    </div>
                </div>


                <div class="control-group <?php echo !empty($PrecoLocacaoErro)?'error ': '';?>">
                    <label class="control-label"> Preço da Locação</label>
                    <div class="controls">
                        <input size="80" class="form-control" name="preco_da_locacao" type="text" placeholder="preco_da_locacao" required="" value="<?php echo !empty($preco_da_locacao)?$preco_da_locacao: '';?>">
                        <?php if(!empty($PrecoLocacaoErro)): ?>
                            <span class="help-inline"><?php echo $PrecoLocacaoErro;?></span>
                            <?php endif;?>
                    </div>
                </div>

                <div class="control-group <?php echo !empty($DuracaoFilmeErro)?'error ': '';?>">
                    <label class="control-label">Duração do filme</label>
                    <div class="controls">
                        <input size="80" class="form-control" name="duracao_do_filme" type="text" placeholder="duracao_do_filme" required="" value="<?php echo !empty($duracao_do_filme)?$duracao_do_filme: '';?>">
                        <?php if(!empty($DuracaoFilmeErro)): ?>
                            <span class="help-inline"><?php echo $DuracaoFilmeErro;?></span>
                            <?php endif;?>
                    </div>
                </div>

                <div class="control-group <?php echo !empty($CustoSubstituicaoErro)?'error ': '';?>">
                    <label class="control-label">Custo de Substituição</label>
                    <div class="controls">
                        <input size="80" class="form-control" name="custo_de_substituicao" type="text" placeholder="custo_de_substituicao" required="" value="<?php echo !empty($custo_de_substituicao)?$custo_de_substituicao: '';?>">
                        <?php if(!empty($CustoSubstituicaoErro)): ?>
                            <span class="help-inline"><?php echo $CustoSubstituicaoErro;?></span>
                            <?php endif;?>
                    </div>
                </div>

                <div class="control-group <?php echo !empty($ClassificacaoErro)?'error ': '';?>">
                    <label class="control-label">Classificação</label>
                    <div class="controls">
                        <input size="80" class="form-control" name="classificacao" type="text" placeholder="classificacao" required="" value="<?php echo !empty($classificacao)?$classificacao: '';?>">
                        <?php if(!empty($ClassificacaoErro)): ?>
                            <span class="help-inline"><?php echo $ClassificacaoErro;?></span>
                            <?php endif;?>
                    </div>
                </div>

                <div class="control-group <?php echo !empty($RecursosEspeciaisErro)?'error ': '';?>">
                    <label class="control-label">Recursos Especiais</label>
                    <div class="controls">
                        <input size="80" class="form-control" name="recursos_especiais" type="text" placeholder="recursos_especiais" required="" value="<?php echo !empty($recursos_especiais)?$recursos_especiais: '';?>">
                        <?php if(!empty($RecursosEspeciaisErro)): ?>
                            <span class="help-inline"><?php echo $RecursosEspeciaisErro;?></span>
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
        $TituloErro = null;
        $DescricaoErro = null;
        $AnoDeLancamentoErro = null;
        $IdiomaIdErro = null;
        $IdiomaOriginalIdErro = null;
        $DuracaoLocacaoErro = null;
        $PrecoLocacaoErro = null;
        $DuracaoFilmeErro = null;
        $CustoSubstituicaoErro = null;
        $ClassificacaoErro = null;
        $RecursosEspeciaisErro = null;
        $UltimaAtualizacaoErro = null;

        $titulo = $_POST['titulo'];
        $descricao = $_POST['descricao'];
        $ano_de_lancamento = $_POST['ano_de_lancamento'];
        $idioma_id = $_POST['idioma_id'];
        $idioma_original_id = $_POST['idioma_original_id'];
        $duracao_da_locacao = $_POST['duracao_da_locacao'];
        $preco_da_locacao = $_POST['preco_da_locacao'];
        $duracao_do_filme = $_POST['duracao_do_filme'];
        $custo_de_substituicao = $_POST['custo_de_substituicao'];
        $classificacao = $_POST['classificacao'];
        $recursos_especiais = $_POST['recursos_especiais'];
        $ultima_atualizacao = $_POST['ultima_atualizacao'];

        //Validaçao dos campos:
        $validacao = true;
        if(empty($titulo))
        {
            $TituloErro = 'Por favor digite titulo!';
            $validacao = false;
        }

        if(empty($descricao))
        {
            $DescricaoErro = 'Por favor digite a descrição!';
            $validacao = false;
        }

        if(empty($ano_de_lancamento))
        {
            $AnoDeLancamentoErro = 'Por favor digite o ano de lançamento!';
            $validacao = false;
        }


        if(empty($idioma_id))
        {
            $IdiomaIdErro = 'Por favor digite o id do idioma!';
            $validacao = false;
        }

        if(empty($idioma_original_id))
        {
            $IdiomaOriginalIdErro = 'Por favor digite o id do idioma original!';
            $validacao = false;
        }

        if(empty($duracao_da_locacao))
        {
            $DuracaoLocacaoErro = 'Por favor digite a duração da locação!';
            $validacao = false;
        }

        if(empty($preco_da_locacao))
        {
            $PrecoLocacaoErro = 'Por favor digite o preço da locação!';
            $validacao = false;
        }

        if(empty($duracao_do_filme))
        {
            $DuracaoFilmeErro = 'Por favor digite a duração do filme!';
            $validacao = false;
        }

        if(empty($custo_de_substituicao))
        {
            $CustoSubstituicaoErro = 'Por favor digite o custo da substituição!';
            $validacao = false;
        }

        if(empty($classificacao))
        {
            $ClassificacaoErro = 'Por favor digite a classificação!';
            $validacao = false;
        }

        if(empty($recursos_especiais))
        {
            $RecursosEspeciaisErro = 'Por favor digite os recursos especiais!';
            $validacao = false;
        }

        if(empty($ultima_atualizacao))
        {
            $UltimaAtualizacaoErro = 'Por favor digite a ultima atualização!';
            $validacao = false;
        }
        //Inserindo no Banco:
        if($validacao)
        {
            
            $pdo = Conexao::getInstance();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO filme (titulo, descricao, ano_de_lancamento, idioma_id, idioma_original_id, duracao_da_locacao, preco_da_locacao, duracao_do_filme, custo_de_substituicao, classificacao, recursos_especiais, ultima_atualizacao) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
            $q = $pdo->prepare($sql);
            $resultado=$q->execute(array($titulo,$descricao, $ano_de_lancamento, $idioma_id, $idioma_original_id,$duracao_da_locacao,$preco_da_locacao,$duracao_do_filme,$custo_de_substituicao,$classificacao,$recursos_especiais, $ultima_atualizacao));
            Conexao::disconnect();

            // if($resultado){
            //     echo "alert('Cadastrado com sucesso')";
            // }else{
            //     echo "alert('erro ao cadastrar')";
            // }
            // $teste = 1;
            header("Location: index.php");
        } 
    } 
?>