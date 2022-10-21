<?php
function salve_pr_txt($array){
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
        $new_data['id'] = $new_id;

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
function imprima_contatos(){
    $filename = 'contatos.json';
    $data_now = json_decode(file_get_contents($filename),true);
    var_dump($data_now);
}

$contato_array = $_POST;

//print nome do array post
salve_pr_txt($contato_array);
?>
<a href="./tabela.php/">Tabela</a>