<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Abrir;

class AbrirController extends BaseController
{


    public function store()
    {
        $nome = $this->request->getPost('nome');
        $email = $this->request->getPost('email');
        $tel = $this->request->getPost('tel');
        $cpf = $this->request->getPost('cpf');
        $nfe = $this->request->getPost('nfe');
        $lancamento = $this->request->getPost('lancamento');
        $estado = $this->request-> getPost('estado');

        $abrirModel = new Abrir;

        $nfe = $this->request->getPost('nfe');
        $lancamento = $this->request->getPost('lancamento');

        $data = [
            'nome' => $nome,
            'email' => $email,
            'tel' => $tel,
            'cpf' => $cpf,
            'estado' => $estado,
            'nfe' => null, // Definindo como NULL
            'lancamento' => null, // Definindo como NULL
        ];

        $abrirModel->insert($data);

        $this->sendEmail($data);
        $this->notifyManagement($data);
        

        return redirect()->back()->with('success', 'Formulario enviado com sucesso.')->withInput();

    }

     public function sendEmail($data)
{
    $email = \Config\Services::email();

    $email->setFrom('controladoria@sccontab.com.br', 'Spolaor Contabilidade');
    $email->setTo($data['email']);

    $email->setSubject('Bem vindo a Spolaor ' . $data['nome']);

    // Definir o tipo de e-mail como HTML
    $email->setMailType('html');

    // Corpo do e-mail em HTML
    $htmlContent = '
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html dir="ltr" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office" lang="pt">
        <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1" name="viewport">
        <meta name="x-apple-disable-message-reformatting">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="telephone=no" name="format-detection">
        <title>Nova mensagem</title>
        <!--[if (mso 16)]>
        <style type="text/css">
        a {text-decoration: none;}
        </style>
        <![endif]-->
        <!--[if gte mso 9]><style>sup { font-size: 100% !important; }</style><![endif]-->
        <!--[if gte mso 9]>
        <xml>
            <o:OfficeDocumentSettings>
            <o:AllowPNG></o:AllowPNG>
            <o:PixelsPerInch>96</o:PixelsPerInch>
            </o:OfficeDocumentSettings>
        </xml>
        <![endif]-->
        <style type="text/css">
        #outlook a { padding:0; }
        .es-button { mso-style-priority:100!important; text-decoration:none!important; }
        a[x-apple-data-detectors] { color:inherit!important; text-decoration:none!important; font-size:inherit!important; font-family:inherit!important; font-weight:inherit!important; line-height:inherit!important; }
        .es-desk-hidden { display:none; float:left; overflow:hidden; width:0; max-height:0; line-height:0; mso-hide:all; }
        @media only screen and (max-width:600px) {
            p, ul li, ol li, a { line-height:150%!important }
            h1, h2, h3, h1 a, h2 a, h3 a { line-height:120% }
            h1 { font-size:36px!important; text-align:left }
            h2 { font-size:26px!important; text-align:left }
            h3 { font-size:20px!important; text-align:left }
            .es-header-body h1 a, .es-content-body h1 a, .es-footer-body h1 a { font-size:36px!important; text-align:left }
            .es-header-body h2 a, .es-content-body h2 a, .es-footer-body h2 a { font-size:26px!important; text-align:left }
            .es-header-body h3 a, .es-content-body h3 a, .es-footer-body h3 a { font-size:20px!important; text-align:left }
            .es-menu td a { font-size:12px!important }
            .es-header-body p, .es-header-body ul li, .es-header-body ol li, .es-header-body a { font-size:14px!important }
            .es-content-body p, .es-content-body ul li, .es-content-body ol li, .es-content-body a { font-size:16px!important }
            .es-footer-body p, .es-footer-body ul li, .es-footer-body ol li, .es-footer-body a { font-size:14px!important }
            .es-infoblock p, .es-infoblock ul li, .es-infoblock ol li, .es-infoblock a { font-size:12px!important }
            *[class="gmail-fix"] { display:none!important }
            .es-m-txt-c, .es-m-txt-c h1, .es-m-txt-c h2, .es-m-txt-c h3 { text-align:center!important }
            .es-m-txt-r, .es-m-txt-r h1, .es-m-txt-r h2, .es-m-txt-r h3 { text-align:right!important }
            .es-m-txt-l, .es-m-txt-l h1, .es-m-txt-l h2, .es-m-txt-l h3 { text-align:left!important }
            .es-m-txt-r img, .es-m-txt-c img, .es-m-txt-l img { display:inline!important }
            .es-button-border { display:inline-block!important }
            a.es-button, button.es-button { font-size:20px!important; display:inline-block!important }
            .es-adaptive table, .es-left, .es-right { width:100%!important }
            .es-content table, .es-header table, .es-footer table, .es-content, .es-footer, .es-header { width:100%!important; max-width:600px!important }
            .es-adapt-td { display:block!important; width:100%!important }
            .adapt-img { width:100%!important; height:auto!important }
            .es-m-p0 { padding:0!important }
            .es-m-p0r { padding-right:0!important }
            .es-m-p0l { padding-left:0!important }
            .es-m-p0t { padding-top:0!important }
            .es-m-p0b { padding-bottom:0!important }
            .es-m-p20b { padding-bottom:20px!important }
            .es-mobile-hidden, .es-hidden { display:none!important }
            tr.es-desk-hidden, td.es-desk-hidden, table.es-desk-hidden { width:auto!important; overflow:visible!important; float:none!important; max-height:inherit!important; line-height:inherit!important }
            tr.es-desk-hidden { display:table-row!important }
            table.es-desk-hidden { display:table!important }
            td.es-desk-menu-hidden { display:table-cell!important }
            .es-menu td { width:1%!important }
            table.es-table-not-adapt, .esd-block-html table { width:auto!important }
            table.es-social { display:inline-block!important }
            table.es-social td { display:inline-block!important }
            .es-m-p5 { padding:5px!important }
            .es-m-p5t { padding-top:5px!important }
            .es-m-p5b { padding-bottom:5px!important }
            .es-m-p5r { padding-right:5px!important }
            .es-m-p5l { padding-left:5px!important }
            .es-m-p10 { padding:10px!important }
            .es-m-p10t { padding-top:10px!important }
            .es-m-p10b { padding-bottom:10px!important }
            .es-m-p10r { padding-right:10px!important }
            .es-m-p10l { padding-left:10px!important }
            .es-m-p15 { padding:15px!important }
            .es-m-p15t { padding-top:15px!important }
            .es-m-p15b { padding-bottom:15px!important }
            .es-m-p15r { padding-right:15px!important }
            .es-m-p15l { padding-left:15px!important }
            .es-m-p20 { padding:20px!important }
            .es-m-p20t { padding-top:20px!important }
            .es-m-p20r { padding-right:20px!important }
            .es-m-p20l { padding-left:20px!important }
            .es-m-p25 { padding:25px!important }
            .es-m-p25t { padding-top:25px!important }
            .es-m-p25b { padding-bottom:25px!important }
            .es-m-p25r { padding-right:25px!important }
            .es-m-p25l { padding-left:25px!important }
            .es-m-p30 { padding:30px!important }
            .es-m-p30t { padding-top:30px!important }
            .es-m-p30b { padding-bottom:30px!important }
            .es-m-p30r { padding-right:30px!important }
            .es-m-p30l { padding-left:30px!important }
            .es-m-p35 { padding:35px!important }
            .es-m-p35t { padding-top:35px!important }
            .es-m-p35b { padding-bottom:35px!important }
            .es-m-p35r { padding-right:35px!important }
            .es-m-p35l { padding-left:35px!important }
            .es-m-p40 { padding:40px!important }
            .es-m-p40t { padding-top:40px!important }
            .es-m-p40b { padding-bottom:40px!important }
            .es-m-p40r { padding-right:40px!important }
            .es-m-p40l { padding-left:40px!important }
            .es-desk-hidden { display:table-row!important; width:auto!important; overflow:visible!important; max-height:inherit!important }
        }
        </style>
        </head>
        <body style="width:100%;font-family:arial, , helvetica, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0">
        <div dir="ltr" class="es-wrapper-color" lang="pt" style="background-color:#FAFAFA">
            <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;padding:0;Margin:0;width:100%;height:100%;background-repeat:repeat;background-position:center top;background-color:#FAFAFA">
            <tr>
                <td valign="top" style="padding:0;Margin:0">
                <table cellpadding="0" cellspacing="0" class="es-header" align="center" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top">
                    <tr>
                    <td align="center" style="padding:0;Margin:0">
                        <table bgcolor="#ffffff" class="es-header-body" align="center" cellpadding="0" cellspacing="0" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px">
                        <tr>
                            <td align="left" style="Margin:0;padding-top:10px;padding-bottom:10px;padding-left:20px;padding-right:20px">
                            <table cellpadding="0" cellspacing="0" width="100%" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                <tr>
                                <td class="es-m-p0r" valign="top" align="center" style="padding:0;Margin:0;width:560px">
                                    <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                    <tr>
                                        <td align="center" style="padding:0;Margin:0;font-size:0px"><img class="adapt-img" src="https://eihdwwg.stripocdn.email/content/guids/CABINET_e0d282ff953091d0719f5ba0c48eb3ddc3b084d2afaa71d82540dc0cba1d575c/images/design_sem_nome_38.png" alt style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic" width="560" height="315"></td>
                                    </tr>
                                    </table></td>
                                </tr>
                            </table></td>
                        </tr>
                        </table></td>
                    </tr>
                </table>
                <table cellpadding="0" cellspacing="0" class="es-content" align="center" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
                    <tr>
                    <td align="center" style="padding:0;Margin:0">
                        <table bgcolor="#ffffff" class="es-content-body" align="center" cellpadding="0" cellspacing="0" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:600px">
                        <tr>
                            <td class="es-m-p20t" align="left" style="Margin:0;padding-bottom:20px;padding-left:20px;padding-right:20px;padding-top:30px">
                            <table cellpadding="0" cellspacing="0" width="100%" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                <tr>
                                <td align="center" valign="top" style="padding:0;Margin:0;width:560px">
                                    <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                    <tr>
                                        <td align="left" class="es-m-p0r es-m-p0l" style="Margin:0;padding-top:5px;padding-bottom:5px;padding-left:40px;padding-right:40px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, , helvetica, sans-serif;line-height:24px;color:#333333;font-size:16px"><span style="font-size:15px">Olá <strong> ' . $data['nome'] . '</strong>,<br><br>É um imenso prazer dar as boas-vindas a você como nosso futuro cliente na Spolaor Contabilidade.<br><br>Estamos entusiasmados com a parceria promissora que se inicia!🎉</span>&nbsp;<br><br><span style="font-size:15px">A seguir, apresentamos os serviços que oferecemos para alavancar o sucesso da sua empresa.<br>&nbsp;<br><a target="_blank" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#5C68E2;font-size:15px" href="https://sccontab.com.br/apresentacao">Clique aqui para acessar a nossa apresentação</a></span></p><p></p><br><br>
                                        <ul>
                                            <li style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, , helvetica, sans-serif;line-height:24px;Margin-bottom:15px;margin-left:0;color:#333333;font-size:16px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, , helvetica, sans-serif;line-height:23px;color:#333333;font-size:15px">Em breve um dos nosso consultores entrará em contato com você 👨‍💻</p></li>
                                            <li style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, , helvetica, sans-serif;line-height:24px;Margin-bottom:15px;margin-left:0;color:#333333;font-size:16px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, , helvetica, sans-serif;line-height:23px;color:#333333;font-size:15px">Fique à vontade para vir tomar um café com a gente! ☕</p></li>
                                            <li style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, , helvetica, sans-serif;line-height:24px;Margin-bottom:15px;margin-left:0;color:#333333;font-size:16px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, , helvetica, sans-serif;line-height:23px;color:#333333;font-size:15px">Você está convidado a conhecer o nosso escritório contábil, estamos ansiosos por sua visita 😁</p></li>
                                        </ul><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, , helvetica, sans-serif;line-height:23px;color:#333333;font-size:15px"><br>Agradecemos pela atenção!<br>Equipe gestora</p></td>
                                    </tr>
                                    </table></td>
                                </tr>
                            </table></td>
                        </tr>
                        <tr>
                            <td align="left" style="padding:0;Margin:0;padding-top:20px;padding-left:20px;padding-right:20px">
                            <table cellpadding="0" cellspacing="0" width="100%" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                <tr>
                                <td align="center" valign="top" style="padding:0;Margin:0;width:560px">
                                    <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                    <tr>
                                        <td align="center" style="padding:0;Margin:0;font-size:0px"><img class="adapt-img" src="https://eihdwwg.stripocdn.email/content/guids/CABINET_e0d282ff953091d0719f5ba0c48eb3ddc3b084d2afaa71d82540dc0cba1d575c/images/design_sem_nome_41.png" alt style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic" width="200" height="200"></td>
                                    </tr>
                                    </table></td>
                                </tr>
                            </table></td>
                        </tr>
                        </table></td>
                    </tr>
                </table>
                <table cellpadding="0" cellspacing="0" class="es-footer" align="center" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top">
                    <tr>
                    <td align="center" style="padding:0;Margin:0">
                        <table class="es-footer-body" align="center" cellpadding="0" cellspacing="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:640px" role="none">
                        <tr>
                            <td align="left" style="Margin:0;padding-top:20px;padding-bottom:20px;padding-left:20px;padding-right:20px">
                            <table cellpadding="0" cellspacing="0" width="100%" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                <tr>
                                <td align="left" style="padding:0;Margin:0;width:600px">
                                    <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                    <tr>
                                        <td align="center" style="padding:0;Margin:0;padding-top:15px;padding-bottom:15px;font-size:0">
                                        <table cellpadding="0" cellspacing="0" class="es-table-not-adapt es-social" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                            <tr>
                                            <td align="center" valign="top" style="padding:0;Margin:0;padding-right:40px"><a target="_blank" href="https://www.facebook.com/SCspolaorCompany/?paipv=0&eav=AfaHiF84IwzZKZd44XmR5BnzCHYhkdVU6NeSOLKLY7HUNr-JIzpwBq7dd9yq2ag7q10&_rdr" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#333333;font-size:12px"><img title="Facebook" src="https://eihdwwg.stripocdn.email/content/assets/img/social-icons/logo-black/facebook-logo-black.png" alt="Fb" width="32" height="32" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic"></a></td>
                                            <td align="center" valign="top" style="padding:0;Margin:0;padding-right:40px"><a target="_blank" href="https://www.instagram.com/spolaorcompany/?igshid=NzZhOTFlYzFmZQ%3D%3D" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#333333;font-size:12px"><img title="Instagram" src="https://eihdwwg.stripocdn.email/content/assets/img/social-icons/logo-black/instagram-logo-black.png" alt="Inst" width="32" height="32" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic"></a></td>
                                            <td align="center" valign="top" style="padding:0;Margin:0;padding-right:40px"><a target="_blank" href="https://www.linkedin.com/company/spolaor-contabilidade/" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#333333;font-size:12px"><img title="LinkedIn" src="https://eihdwwg.stripocdn.email/content/assets/img/social-icons/logo-black/linkedin-logo-black.png" alt="In" width="32" height="32" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic"></a></td>
                                            <td align="center" valign="top" style="padding:0;Margin:0"><a target="_blank" href="https://spolaorcompany.com.br/" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#333333;font-size:12px"><img title="Website" src="https://eihdwwg.stripocdn.email/content/assets/img/other-icons/logo-black/link-logo-black.png" alt="Website" width="32" height="32" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic"></a></td>
                                            </tr>
                                        </table></td>
                                    </tr>
                                    <tr>
                                        <td align="center" style="padding:0;Margin:0;padding-bottom:35px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, , helvetica, sans-serif;line-height:18px;color:#333333;font-size:12px">Copyright © 2024 Spolaor Company - All Rights Reserved.</p><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, , helvetica, sans-serif;line-height:18px;color:#333333;font-size:12px"><a href="https://www.google.com/search?sca_esv=619c697d276fe56b&sca_upv=1&sxsrf=ACQVn0_VqNObkvh2TaY7pO3fnHoDQRzc_w:1713983736549&q=spolaor+contabilidade+endere%C3%A7o&ludocid=4434712105378123203&sa=X&ved=2ahUKEwjz3ZH-vtuFAxVupJUCHS6nC4gQ6BN6BAhZEAI" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#333333;font-size:12px">Endereço</a>: Alameda Armênio Mendes, 66 - sala 915 e 916 - Aparecida, Santos - SP, 11035-260</p></td>
                                    </tr>
                                    </table></td>
                                </tr>
                            </table></td>
                        </tr>
                        </table></td>
                    </tr>
                </table>
                </td>
            </tr>
            </table>
        </div>
        </body>
        </html>
        ';

    $email->setMessage($htmlContent);

    // Anexando o arquivo
    // $pathToAttachment = WRITEPATH . 'uploads/proposta_trocar.pdf';

    // if (!file_exists($pathToAttachment)) {
    //     echo "Erro: O arquivo 'proposta_trocar.pdf' não foi encontrado no caminho especificado.";
    //     return; // Encerra a execução do método aqui
    // }

    // $email->attach($pathToAttachment);

    if ($email->send()) {
        echo "E-mail enviado com sucesso!";
    } else {
        $data = $email->printDebugger(['headers', 'subject', 'body']);
        print_r($data); // Mostra informações sobre possíveis erros
    }
}

public function notifyManagement($data)
{
    $email = \Config\Services::email();

    $email->setFrom('controladoria@sccontab.com.br', 'Spolaor Contabilidade');
    $email->setTo('ti@sccontab.com.br');

    $email->setSubject('Novo Registro de Cliente - ABERTURA DE EMPRESA');

    $email->setMailType('html');

    $htmlContent = "
    <html>
    <head>
        <title>Novo Cliente Registrado</title>
    </head>
    <body>
        <h1>Notificação de Novo Cliente - ABERTURA DE EMPRESA</h1>
        <p>Prezada Diretoria,</p>
        <p>Informamos que um novo cliente se registrou em nosso site de ABERTURA DE EMPRESA com os seguintes detalhes:</p>
        <ul>
            <li>Nome: {$data['nome']}</li>
            <li>Email: {$data['email']}</li>
            <li>Telefone: {$data['tel']}</li>
            <li>CPF: {$data['cpf']}</li>
            <li>Estado: {$data['estado']}
        <p>Para mais detalhes ou para tomar os próximos passos, por favor, acesse nossa plataforma de gestão:</p>
        <p><a href='https://sccontab.com.br/LoginController'>Clique aqui para acessar a plataforma</a></p>
        <p>Atenciosamente,</p>
        <p>Equipe Spolaor Contabilidade</p>
    </body>
    </html>";

    $email->setMessage($htmlContent);

    if (!$email->send()) {
        $data = $email->printDebugger(['headers', 'subject', 'body']);
        log_message('error', "Falha ao enviar email de notificação para a diretoria: " . print_r($data, true));
    }
}


   
}
