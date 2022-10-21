<?php
function alterar($array){
    //ALTERA UM CONTATO
    $filename = 'contatos.json';
    $data = json_decode(file_get_contents($filename),true);
    foreach ($data as $key => $entry) {
        if ($data[$key]['id'] == $array['id']) {
            $data[$key]['nome'] = $array['nome'];
            $data[$key]['numero'] = $array['numero'];
            $data[$key]['email'] = $array['email'];
            $data[$key]['data'] = $array['data'];
            $data[$key]['idade'] = $array['idade'];
            $data[$key]['sex'] = $array['sex'];
            $data[$key]['origem'] = $array['origem'];
        }
    }

    $newJsonString = json_encode($data);
    file_put_contents($filename, $newJsonString);
}

function salve_pr_json($array){
    //SALVA PARA JSON
    $filename = 'contatos.json';
    $new_id = 0;

    $data_now = json_decode(file_get_contents($filename),true);

    $new_data = $array;
    
    //se dados atuais não forem vazios fazer o if
    if (isset($data_now)){
        
        //add primary key para o objeto
        foreach($data_now as $obj){
            $new_id += 1;
        }
        $new_data['id'] = $new_id+1;

        array_push($data_now,$new_data);
        $xnew_data = json_encode($data_now, JSON_PRETTY_PRINT);
        file_put_contents($filename, $xnew_data);
        return;
    }
    //dados atuais é vazio, mas precisa criar estrutura json
    $aDadosEstrutura = [];
    $new_data['id'] = $new_id;
    
    array_push($aDadosEstrutura, $new_data);

    $xnew_data = json_encode($aDadosEstrutura, JSON_PRETTY_PRINT);

    file_put_contents($filename, $xnew_data);

}

function quanti_contatos(){
    //RETORNA QUANTIDADE DE CONTATOS
    $filename = 'contatos.json';
    $data_now = json_decode(file_get_contents($filename),true);
    $count = 0;
    foreach($data_now as $row){
        $count += 1;
    }
    return $count;
}

$contato_array = $_POST;
if ($contato_array > quanti_contatos()){
    salve_pr_json($contato_array);
} else {
    alterar($contato_array);
}
?>
<a href="./">Tabela</a>