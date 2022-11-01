<?php

// var_dump($controller); exit; 
// print_r($page); echo "</pre>"; exit; 

// include_once './app/entities/Locatario.php';

// $arr = [
//     'NOME' => 'JOAO',
//     'EMAIL' => 'JOAO@H',
//     'TELEFONE' => '1242'
// ];

// $ob = new Locatario( $arr );

// $ob->Cadastrar();

// print_r($ob); echo "</pre>"; exit; 

/**
 * Nome da view default / home page
 */
$PAGE = 'home';

/**
 * Nome da entidade que o usuario estiver trabalhando
 */
$TITULO_APRESENTACAO = 'Bem vindo';

/**
 * identificar a pagina
 * pegar Get e verificar se tem arquivo
 * -- se sim: pegar dados
 * -- se nao: ir para home page
 */
if(isset($_GET['p']))
{
    include_once './controller/Routes.php';

    $dataPage = (new Routes())->getController($_GET['p']);

    if($dataPage)
    {
        $PAGE = $dataPage->getInclude(); 
        $TITULO_APRESENTACAO = $dataPage->getTitulo();
    }
}

/**
 * Carregar view
 */
include __DIR__.'/views/layout/header.php';
include __DIR__.'\/views/'.$PAGE.'.php';
include __DIR__.'/views/layout/footer.php';
 