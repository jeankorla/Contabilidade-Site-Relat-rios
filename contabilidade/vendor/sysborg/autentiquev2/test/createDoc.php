<?php
    require_once __DIR__. '/../src/autoloader.php';
    use sysborg\autentiquev2\createDoc;
    use sysborg\autentiquev2\autentique;
    
    $token = ''; //en-US: put your autentique's token here https://www.autentique.com.br/ | pt-BR: coloque seu token da autentique aqui https://www.autentique.com.br/
    $sandboxMode = false; //en-US: change the sandbox mode to create test documents, if wanted | pt-BR: mude o modo sandbox para criar documentos teste, se desejado

    /**
     * en-US: Calling the desired layout and passing the variables expecteds and disred. At this case the document creation and upload
     * pt-BR: Invoca o layout desejado e passa as variáveis esperadas e desejadas. Nesse caso a criação e upload do documento
     */
    $l = new createDoc();
    $l->name = 'Test with one signer';
    $l->file = __DIR__. '/examples/doc1.pdf';
    $signer = $l->addSigners('example@gmail.com');

    /**
     * en-US: Invokes the autentique api to transmit data by curl and recive the response
     * pt-BR: Invoca a api do autentique e transmite os dados por curl e recebe a resposta
     */

    $t = new autentique($l);
    $t->debug=true;
    $t->token=$token;
    $t->devMode=$sandboxMode;
    $r = $t->transmit();
    echo '//en-US: Clean response | pt-BR: Resposta limpa<br><pre>';
    var_dump($r); //en-US: Clean response | pt-BR: Resposta limpa
    echo '</pre>';

    echo '<br><br>//en-US: Response decoded | pt-BR: Resposta decodificada<br><pre>';
    var_dump(json_decode($r, true)); //en-US: Response decoded | pt-BR: Resposta decodificada
    echo '</pre><br><br>';

    var_dump($t);
?>
