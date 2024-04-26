<?php
    require_once __DIR__. '/../src/autoloader.php';
    use sysborg\autentiquev2\deleteDir;
    use sysborg\autentiquev2\autentique;
    
    $token = ''; //en-US: put your autentique's token here https://www.autentique.com.br/ | pt-BR: coloque seu token da autentique aqui https://www.autentique.com.br/

    /**
     * en-US: Calling the desired layout and passing the variables expecteds and disred. At this case deleting a directory
     * pt-BR: Invoca o layout desejado e passa as variáveis esperadas e desejadas. Nesse caso deletando um diretório
     */
    $l = new deleteDir();
    $l->id = 'id'; //en-US: fill with the correctly id for you directory. | pt-BR: Preencha com o id correto para o seu diretório.

    /**
     * en-US: Invokes the autentique api to transmit data by curl and recive the response
     * pt-BR: Invoca a api do autentique e transmite os dados por curl e recebe a resposta
     */

    $t = new autentique($l);
    $t->token=$token;
    $t->debug=true; //en-US: set debug on this show all returned properties from curl_getinfo | pt-BR: seta o debug como true isso mostra todas as propriedades retornadas por curl_getinfo
    $r = $t->transmit();
    echo '//en-US: Clean response | pt-BR: Resposta limpa<br><pre>';
    var_dump($r); //en-US: Clean response | pt-BR: Resposta limpa
    echo '</pre>';

    echo '<br><br>//en-US: Response decoded | pt-BR: Resposta decodificada<br><pre>';
    var_dump(json_decode($r, true)); //en-US: Response decoded | pt-BR: Resposta decodificada
    echo '</pre>';
?>
