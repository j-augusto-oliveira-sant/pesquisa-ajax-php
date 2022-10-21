<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicio-Jose</title>
    <link rel="stylesheet" href="myscss.css">
    <script type="text/javascript" src="myscript.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
<?php

define('JSON','contatos.json');

function contatosVetor(){
    $filename = 'contatos.json';
    $dados = json_decode(file_get_contents($filename), true);
    return $dados;
}

function salvaDadosNoArquivo($dados){
    file_put_contents(JSON,json_encode($dados));    
}

function excluir($id){
    $dados = contatosVetor();
    $i = 0;
    foreach($dados as $contato){
        if ($contato['id'] == $id)
            break;
        else
        $i++;
    }
    array_splice($dados,$i,1);
    salvaDadosNoArquivo($dados);
}



function buscaContato($id){
    $dados = contatosVetor();
    foreach($dados as $contato){
        if ($contato['id'] == $id)
            return $contato;
    }
}


function tabela(){
    $dadosAtuais = contatosVetor();

    //search
    echo '<form class="d-flex" action="">
    <input class="form-control me-2" type="text" placeholder="Pesquise Contato" onkeyup="mostrarContatosSearch(this.value)" 
    aria-label="Search">
    </form>';

    $tabela = "
    <table class='table' id='table'>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Numero</th>
            <th>Email</th>
            <th>Data</th>
            <th>Idade</th>
            <th></th>
            <th></th>
        </tr>
    ";
    $new_id = 0;
    if  (is_countable($dadosAtuais) && count($dadosAtuais) > 0){
        foreach($dadosAtuais as $row){
            $tabela .= "
            <tr name='tr_rows'>
            <td>{$row["id"]}</td>
            <td name='td_name'>{$row["nome"]}</td>
            <td>{$row["numero"]}</td>
            <td>{$row["email"]}</td>
            <td>{$row["data"]}</td>
            <td>{$row["idade"]}</td>
            <td><a class='btn btn-outline-info' href='./alterar_form.php?id={$row["id"]}'>Alterar</a></td>
            <td><a class='btn btn-outline-danger' href='?acao=excluir&id={$row["id"]}'>Excluir</a></td>
            </tr>";
            $new_id += 1;
        }
    }
    $new_id += 1;
    echo "<a href='./alterar_form.php?id={$new_id}' class='btn btn-outline-info'>Criar Novo Contato</a>";
    echo "<br>";
    echo $tabela;
}
tabela();

$acao = isset($_GET['acao'])?$_GET['acao']:'';
$id = isset($_GET['id'])?$_GET['id']:'';

if ($acao == 'excluir'){
    excluir($id);
}

?>

</body>