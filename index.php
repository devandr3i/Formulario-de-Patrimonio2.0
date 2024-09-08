<?php 

    include_once('conexao.php');

    if(isset($_POST['botao']) && isset($_FILES['img']) && !empty($_FILES['img'])){

        $arquivo = $_FILES['img'];
        
        $pasta = 'imagens/';
        $nomearquivo = $arquivo['name'];
        $novonome = uniqid();
        $extensao = strtolower(pathinfo($nomearquivo, PATHINFO_EXTENSION));
    
        if($extensao != 'jpg' && $extensao != 'png')
            die('arquivo não aceito!');
        
        $dados = $pasta . $novonome . '.' . $extensao;
        $deu_certo = move_uploaded_file($arquivo['tmp_name'],$dados);

        

        
        $descricaoBem = $_POST['descricaoBem'];
        $dataAquisicao = $_POST['dataAquisicao'];
        $valorBem = $_POST['valorBem'];
        $localizacao = $_POST['localizacao'];
        $estadoConservacao = $_POST['estadoConservacao'];
        $responsavel = $_POST['responsavel'];
        $observacoes = $_POST['observacoes'];

        $result = mysqli_query($conexao, "INSERT INTO usuarios(img,desc_bem,data_aquisicao,valor_bem,localizacao,estado_conservacao,responsavel,observacao) VALUES('$dados', ' $descricaoBem', '$dataAquisicao', '$valorBem', '$localizacao', '$estadoConservacao', '$responsavel', '$observacoes') ");
    }    
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Patrimônio</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form action="index.php" method="POST" enctype="multipart/form-data" id="form-patrimonio" >

        <h2>Formulário de Patrimônio</h2>

        <div class="posicaoImagem">
            <label class="imagem" tabindex="0">
                <span class="inserirImagem">Inserir Imagem</span>
                <input type="file" name="img" accept="image/*" id="imagem" class="removerfundo" required>
            </label>
        </div>

        <label for="descricaoBem">Descrição do Bem:</label>
        <input type="text" id="descricaoBem" class="blocos" name="descricaoBem" required>

        <label for="dataAquisicao">Data de Aquisição:</label>
        <input type="date" id="dataAquisicao" class="blocos" name="dataAquisicao" required>

        <label for="valorBem">Valor do Bem:</label>
        <input type="number" id="valorBem" class="blocos" name="valorBem" step="0.01" required>

        <label for="localizacao">Localização:</label>
        <input type="text" id="localizacao" class="blocos" name="localizacao" required>

        <label for="estadoConservacao">Estado de Conservação:</label>
        <select class="blocos" id="estadoConservacao" name="estadoConservacao" required>
            <option value="Novo">Novo</option>
            <option value="Bom">Bom</option>
            <option value="Usado">Usado</option>
            <option value="Danificado">Danificado</option>
        </select>

        <label for="responsavel">Responsável:</label>
        <input type="text" id="responsavel" class="blocos" name="responsavel" required>

        <label for="observacoes">Observações:</label>
        <textarea class="blocos" id="observacoes" name="observacoes"></textarea>


        <div class="botao">
            <input type="submit" name="botao" id="botao">
        </div>

    </form>

    <script src="script.js"></script>
    
</body>
</html>