<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicio-Jose</title>
    <link rel="stylesheet" href="myscss.css">
    <script src="myscript.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <!-- Aluno JOSÉ AUGUSTO -->
    <div align="center" class="shadow-sm mb-5 bg-body rounded">
        <img src="https://ifc.edu.br/wp-content/themes/ifc-v2/assets/images/logo-ifc-normal.png" alt="">
    </div>
    <p></p>
    <div id="new_form" class="border-top">
        <h3>Novo Contato:</h3>
        <br>
        <form name="new_form needs-validation" action="alterar_acao.php" method="POST">
            <div id=div_id class="mb-3">
                <label for="id" class="form-label">ID</label>
                <input type="text" class="form-control" id="id" name="id" value=<?=isset($_GET['id'])?$_GET['id']:''?> readonly>
            </div>
            <div id="div_nome" class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value=<?=isset($contato)?$contato['nome']:''?>>
                <p id="erro_nome" class="text-danger"></p>
            </div>
            <br>
            <div id="div_numero" class="mb-3">
                <label for="numero" class="form-label">Número</label>
                <input type="text" class="form-control" id="numero" name="numero" value=<?=isset($contato)?$contato['numero']:''?>>
                <p id="erro_numero" class="text-danger"></p>
            </div>
            <br>
            <div id="div_email" class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" value=<?=isset($contato)?$contato['email']:''?>>
                <p id="erro_email" class="text-danger"></p>
            </div>
            <br>
            <div id="div_data" class="mb-3">
                <label for="data" class="form-label">Data</label>
                <input type="date" class="form-control" id="data" name="data" required onchange="calcularIdade()">
            </div>
            <br>
            <div id="div_idade" class="mb-3">
                <label for="idade" class="form-label">Idade</label>
                <input type="text" class="form-control" id="idade" name="idade" value=<?=isset($contato)?$contato['idade']:''?>>
            </div>
            <br>
            <div class="mb-3">
                <label for="parente" class="form-label">Parente</label>
                <input type="checkbox" class="form-check-input mt-0" id="parente" name="parente">
            </div>
            <br>
            <h4>Sexo:</h4>
            <br>
            <label for="sex">Mulher:</label>
            <input type="radio" name="sex" id="">
            <label for="homem">Homem:</label>
            <input type="radio" name="sex" id="">
            <p></p>
            <label for="origem">Origem:</label>
            <select name="origem" id="origem" class="form-control" name="origem">
            <option value="trabalho">Trabalho</option>
            <option value="escola">Escola</option>
            <option value="faculdade">Faculdade</option>
            </select>
            <br>
            <br>
            <label for="foto">Foto para contato:</label>
            <input type="file" class="form-control" name="foto" id="">
            <br>
            <input class="btn btn-primary" type="submit" value="Enviar">
        </form>
    </div>
    <br>
</body>
<?php
$id = isset($_GET['id'])?$_GET['id']:'';
?>
</html>