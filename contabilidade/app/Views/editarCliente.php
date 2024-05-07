<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

<style>
.jp1 {
    animation:slide 3s ease-in-out infinite alternate;
    background-image: linear-gradient(-60deg, #024A7F 50%, #0097C4 50%);
    bottom:0;
    left:-50%;
    opacity:.5;
    position:fixed;
    right:-50%;
    top:0;
    z-index:0;
    animation-duration: 5s;
}

.jp2 {
    animation-direction:alternate-reverse;
    animation-duration:6s;
}

.jp3 {
    animation-duration: 7s;
}

 @keyframes slide {
    0% {
        transform:translateX(-25%);
    }
    100% {
        transform:translateX(25%);
    }
}

#input{
    background-color: #eee;
}
</style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark mb-4" style="background-color: #024A7F; z-index: 1;">
  <div class="container-fluid navbar-container">
    <a class="navbar-brand" href="<?= base_url('AdminController') ?>">
        <img class="img-fluid" src="<?php echo base_url('img/logo-nav.svg') ?>" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <!-- Itens de navegação -->
      </ul>

      <!-- Botão de Configurações -->
      <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#configModal">
        Configurações
      </button>
      
      
    </div>
  </div>
</nav>
<!-- Formulário de pesquisa -->
      <div class="modal fade" id="configModal" tabindex="-1" aria-labelledby="configModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="configModalLabel">Configurações</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Formulário para atualizar o nome de usuário -->
        <form action="<?= base_url('LoginController/updateUsername') ?>" method="post">
            <div class="mb-3">
                <label for="newUsername" class="form-label">Novo nome de usuário:</label>
                <input type="text" class="form-control" id="newUsername" name="newUsername" required>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar Nome de Usuário</button>
        </form>

        <!-- Formulário para atualizar a senha -->
        <form action="<?= base_url('LoginController/updatePassword') ?>" method="post" class="mt-3">
            <div class="mb-3">
                <label for="newPassword" class="form-label">Nova senha:</label>
                <input type="password" class="form-control" id="newPassword" name="newPassword" required>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar Senha</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>





<section >

    <div class="jp1"></div>
    <div class="jp1 jp2"></div>
    <div class="jp1 jp3"></div>

    <div class="container">
    <div class="card mt-5 mb-5 p-5 shadow-lg">
        <div class="col-12 mb-5">
            <a class="btn btn-danger" href="<?= base_url('AdminController/index') ?>">Voltar</a>
        </div>
        <h1 class="mb-5">Editar Cliente</h1>

        <div class="alert alert-danger" style="display: none;"> 
            <ul>
                <li>Erro exemplo</li>
            </ul>
        </div>
        
        <form class="row g-3" action="" method="post" >

            <div class="col-md-6">
                <label for="nome_contato" class="form-label">Nome de Contato:</label>
                <input id="input" type="text" class="form-control" id="nome_contato" name="nome_contato" value="<?= $data['cliente']['nome'] ?>">
            </div>

            <div class="col-md-6">
                <label for="email_contato" class="form-label">Email de Contato:</label>
                <input id="input" type="email" class="form-control" id="email_contato" name="email_contato" value="<?= $data['cliente']['email'] ?>">
            </div>
            <div class="col-md-4">
                <label for="tel" class="form-label">Telefone do Contato:</label>
                <input id="input" type="text" class="form-control" id="tel" name="tel" value="<?= $data['cliente']['tel'] ?>" oninput= "mascaraTelefone(event);" maxlength="15">
            </div>
            <div class="col-md-4">
                <label for="cpf_contato" class="form-label">CPF do Contato:</label>
                <input id="input" type="text" id="cpf_contato" class="form-control" name="cpf_contato" oninput= "aplicarMascaraCPF(this)" value="<?= $data['cliente']['cpf'] ?>" maxlength="14">
            </div>


            <br>
                <div class="col-md-12">
                <h2 class="mb-5">Empresa Informações</h2>
                </div>


            <div class="col-4">
                <label for="cnpj" class="form-label">CNPJ:</label>
               <input id="input" type="text" id="cnpj" class="form-control" name="cnpj" value="<?= $data['empresa']['cnpj'] ?>" oninput= "aplicarMascaraCNPJ(this)" maxlength="18">
            </div>
            <div class="col-4">
                <label for="nome_empresa" class="form-label">Nome da Empresa:</label>
                <input id="input" type="text" id="nome_empresa" class="form-control" name="nome_empresa" value="<?= $data['empresa']['nome'] ?>">
            </div>
            <div class="col-4">
                <label for="fantasia" class="form-label">Nome Fantasia:</label>
                <input id="input" type="text" id="fantasia" class="form-control" name="fantasia" value="<?= $data['empresa']['fantasia'] ?>" onkeyup="formatarMoeda();" maxlength="18">
            </div>



            <div class="col-3">
                <label for="tel" class="form-label">Telefone da Empresa:</label>
                <input id="input" type="text" id="tel" class="form-control" name="tel" value="<?= $data['empresa']['tel'] ?>" onkeyup="formatarMoeda();" maxlength="18">
            </div>
            <div class="col-3">
                <label for="faturamento" class="form-label">Faturamento:</label>
                <input id="input" type="text" id="faturamento" class="form-control" name="faturamento" value="<?= $data['empresa']['faturamento'] ?>" onkeyup="formatarMoeda();" maxlength="18">
            </div>
            <div class="col-3">
                <label for="funcionarios" class="form-label">Funcionários:</label>
                <input id="input" type="number" id="funcionarios" class="form-control" name="funcionarios" value="<?= $data['empresa']['funcionarios'] ?>">
            </div>
            <div class="col-3">
                <label for="tributacao" class="form-label">Tributação:</label>
                <input id="input" type="text" id="tributacao" class="form-control" name="tributacao" value="<?= $data['empresa']['tributacao'] ?>">
            </div>



            <div class="col-3">
                <label for="nfe" class="form-label">Quantidade de Notas-Fiscais:</label>
                <input id="input" type="number" id="nfe" class="form-control" name="nfe" value="<?= $data['empresa']['nfe'] ?>">
            </div>
            <div class="col-md-3">
                <label for="atividade_principal_codigo" class="form-label">Côdigo Atividade:</label>
                <input id="input" type="text" id="atividade_principal_codigo" class="form-control" name="atividade_principal_codigo" value="<?= $data['empresa']['atividade_principal_codigo'] ?>">
            </div>
            <div class="col-md-6">
                <label for="atividade_principal_texto" class="form-label">Atividade Principal:</label>
                <input id="input" type="text" id="atividade_principal_texto" class="form-control" name="atividade_principal_texto" value="<?= $data['empresa']['atividade_principal_texto'] ?>">
            </div>



            <div class="col-md-3">
                <label for="lancamento" class="form-label">Lançamentos:</label>
                <input id="input" type="number" id="lancamento" class="form-control" name="lancamento" value="<?= $data['empresa']['lancamento'] ?>">
            </div>
            <div class="col-md-5">
                <label for="natureza_juridica" class="form-label">Natureza Jurdica:</label>
                <input id="input" type="text" id="natureza_juridica" class="form-control" name="natureza_juridica" value="<?= $data['empresa']['natureza_juridica'] ?>">
            </div>
            <div class="col-md-2">
                <label for="capital_social" class="form-label">Capital Social:</label>
                <input id="input" type="text" id="capital_social" class="form-control" name="capital_social" value="<?= $data['empresa']['capital_social'] ?>">
            </div>
            <div class="col-md-2">
                <label for="abertura" class="form-label">Abertura:</label>
                <input id="input" type="text" id="abertura" class="form-control" name="abertura" value="<?= $data['empresa']['abertura'] ?>">
            </div>

            <div class="col-md-3">
                <label for="tipo" class="form-label">Tipo:</label>
                <input id="input" type="text" id="tipo" class="form-control" name="tipo" value="<?= $data['empresa']['tipo'] ?>">
            </div>



                <br>
                <div class="col-md-12">
                    <h2 class="mb-5">Atividades Secundárias</h2>
                </div>

                <?php foreach ($data['atividades'] as $index => $atividade): ?>
                    <div class="col-md-3">
                        <label for="atividade_secundaria_<?= $index ?>_codigo" class="form-label">Código Atividade:</label>
                        <input id="input" type="text" id="atividade_secundaria_<?= $index ?>_codigo" class="form-control" name="atividades[<?= $index ?>][codigo]" value="<?= $atividade['codigo'] ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="atividade_secundaria_<?= $index ?>_texto" class="form-label">Atividade Secundária:</label>
                        <input id="input" type="text" id="atividade_secundaria_<?= $index ?>_texto" class="form-control" name="atividades[<?= $index ?>][texto]" value="<?= $atividade['texto'] ?>">
                    </div>
                    <hr>
                <?php endforeach; ?>



    
                <br>
                <div class="col-md-12">
                <h2 class="mb-5">Empresa Endereço</h2>
                </div>









            <div class="col-2">
                <label for="endereco_empresa_cep" class="form-label">Empresa Cep:</label>
                <input id="input" type="text" id="endereco_empresa_cep" class="form-control" name="endereco_empresa_cep" value="<?= $data['empresa']['endereco_cep'] ?>">
            </div>
            <div class="col-md-4">
                <label for="endereco_empresa_rua" class="form-label">Empresa Rua:</label>
                <input id="input" type="text" id="endereco_empresa_rua" class="form-control" name="endereco_empresa_rua" value="<?= $data['empresa']['endereco_rua'] ?>">
            </div>
            <div class="col-md-2">
                <label for="endereco_empresa_numero" class="form-label">Empresa Numero:</label>
                <input id="input" type="text" id="endereco_empresa_numero" class="form-control" name="endereco_empresa_numero" value="<?= $data['empresa']['endereco_numero'] ?>">
            </div>
            <div class="col-md-4">
                <label for="endereco_empresa_complemento" class="form-label">Complemento:</label>
                <input id="input" type="text" id="endereco_empresa_complemento" class="form-control" name="endereco_empresa_complemento" value="<?= $data['empresa']['endereco_complemento'] ?>">
            </div>

            <div class="col-md-5">
                <label for="endereco_empresa_bairro" class="form-label">Empresa Bairro:</label>
                <input id="input" type="text" id="endereco_empresa_bairro" class="form-control" name="endereco_empresa_bairro" value="<?= $data['empresa']['endereco_bairro'] ?>">
            </div>
            <div class="col-md-5">
                <label for="endereco_empresa_cidade" class="form-label">Empresa Cidade:</label>
                <input id="input" type="text" id="endereco_empresa_cidade" class="form-control" name="endereco_empresa_cidade" value="<?= $data['empresa']['endereco_cidade'] ?>">
            </div>
                <div class="col-md-2">
                <label for="endereco_empresa_estado" class="form-label">Empresa Estado:</label>
                <input id="input" type="text" id="endereco_empresa_estado" class="form-control" name="endereco_empresa_estado" value="<?= $data['empresa']['endereco_estado'] ?>">
            </div>
            
            
                <br>
            <div class="col-md-12">
                <h2 class="mb-5">Sócios da Empresa</h2>
            </div>

            <?php foreach ($data['socios'] as $index => $socio): ?>
                <div class="col-md-7">
                    <label for="socio_<?= $index ?>_nome" class="form-label">Nome do Sócio:</label>
                    <input id="input" type="text" id="socio_<?= $index ?>_nome" class="form-control" name="socios[<?= $index ?>][nome]" value="<?= $socio['nome'] ?>">
                </div>
                <div class="col-3">
                    <label for="socio_<?= $index ?>_qualifica" class="form-label">Qualificação:</label>
                    <input id="input" type="text" id="socio_<?= $index ?>_qualifica" class="form-control" name="socios[<?= $index ?>][qualifica]" value="<?= $socio['qualifica'] ?>">
                </div>
                <hr>
            <?php endforeach; ?>


            <div class="col-md-12">
                <h2 class="mb-5">Sócio Assinante</h2>
            </div>

            <div class="col-md-7">
                <label for="socio_asses_nome" class="form-label">Nome do Sócio:</label>
                <input id="input" type="text" id="socio_asses_nome" class="form-control" name="socio_asses_nome" value="<?= $data['socio_asses']['nome'] ?? 'N/A' ?>">
            </div>
            <div class="col-3">
                <label for="socio_asses_nacional" class="form-label">Nacionalidade do Sócio:</label>
                <input id="input" type="text" id="socio_asses_nacional" class="form-control" name="socio_asses_nacional" value="<?= $data['socio_asses']['nacionalidade'] ?? 'N/A' ?>">
            </div>
            <div class="col-2">
                <label for="socio_asses_idade" class="form-label">Idade do Sócio:</label>
                <input id="input" type="text" id="socio_asses_idade" class="form-control" name="socio_asses_idade" value="<?= $data['socio_asses']['idade'] ?? 'N/A' ?>">
            </div>
            <div class="col-6">
                <label for="socio_asses_rg" class="form-label">RG do Sócio:</label>
                <input id="input" type="text" id="socio_asses_rg" class="form-control" name="socio_asses_rg" value="<?= $data['socio_asses']['rg'] ?? 'N/A' ?>">
            </div>
            <div class="col-6">
                <label for="socio_asses_cpf" class="form-label">CPF do Sócio:</label>
                <input id="input" type="text" id="socio_asses_cpf" class="form-control" name="socio_asses_cpf" value="<?= $data['socio_asses']['cpf']  ?? 'N/A' ?>">
            </div>

            

            <div class="col-3">
                <label for="socio_asses_endereco_cep" class="form-label">CEP do Sócio:</label>
                <input id="input" type="text" id="socio_asses_endereco_cep" class="form-control" name="socio_asses_endereco_cep" value="<?= $data['socio_asses']['endereco_cep'] ?? 'N/A' ?>">
            </div>
            <div class="col-md-6">
                <label for="socio_asses_endereco_cidade" class="form-label">Cidade do Sócio:</label>
                <input id="input" type="text" id="socio_asses_endereco_cidade" class="form-control" name="socio_asses_endereco_cidade" value="<?= $data['socio_asses']['endereco_cidade'] ?? 'N/A' ?>">
            </div>
            <div class="col-md-5">
                <label for="socio_asses_endereco_bairro" class="form-label">Bairro do Sócio:</label>
                <input id="input" type="text" id="socio_asses_endereco_bairro" class="form-control" name="socio_asses_endereco_bairro" value="<?= $data['socio_asses']['endereco_bairro'] ?? 'N/A' ?>">
            </div>
            <div class="col-5">
                <label for="socio_asses_endereco_rua" class="form-label">Rua do Sócio:</label>
                <input id="input" type="text" id="socio_asses_endereco_rua" class="form-control" name="socio_asses_endereco_rua" value="<?= $data['socio_asses']['endereco_rua'] ?? 'N/A' ?>">
            </div>
            <div class="col-5">
                <label for="socio_asses_endereco_complemento" class="form-label">Complemento do Sócio:</label>
                <input id="input" type="text" id="socio_asses_endereco_complemento" class="form-control" name="socio_asses_endereco_complemento" value="<?= $data['socio_asses']['endereco_complemento'] ?? 'N/A' ?>">
            </div>
            <div class="col-md-2">
                <label for="socio_asses_endereco_numero" class="form-label">Número do Sócio:</label>
                <input id="input" type="text" id="socio_asses_endereco_numero" class="form-control" name="socio_asses_endereco_numero" value="<?= $data['socio_asses']['endereco_numero'] ?? 'N/A' ?>">
            </div>
            <div class="col-3">
                <label for="socio_asses_endereco_estado" class="form-label">Estado do Sócio:</label>
                <input id="input" type="text" id="socio_asses_endereco_estado" class="form-control" name="socio_asses_endereco_estado" value="<?= $data['socio_asses']['endereco_estado'] ?? 'N/A' ?>">
            </div>

            <br>
            <div class="col-md-12">
                <h2 class="mb-5">Contabilidade</h2>
            </div>
            

            <div class="col-4">
                <label for="inicio_contabilidade" class="form-label">Início na Contabilidade:</label>
                <input id="input" type="text" id="inicio_contabilidade" class="form-control" name="inicio_contabilidade" value="<?= $data['contabilidade']['inicio_contabilidade'] ?? 'N/A' ?>">
            </div>
            <div class="col-4">
                <label for="competencia" class="form-label">Competência:</label>
                <input id="input" type="text" id="competencia" class="form-control" name="competencia" value="<?= $data['contabilidade']['competencia'] ?? 'N/A' ?>">
            </div>

            <div class="col-4">
                <label for="honorario" class="form-label">Honorário:</label>
                <input id="input" type="text" id="honorario" class="form-control" name="honorario" value="<?= $data['contabilidade']['honorario'] ?? 'N/A' ?>">
            </div>
           <div class="col-12">
                <label for="honorario_texto" class="form-label">Honorário Texto:</label>
                <textarea id="honorario_texto" class="form-control" name="honorario_texto" rows="4"><?= $data['contabilidade']['honorario_texto'] ?? 'N/A' ?></textarea>
            </div>

            
           

            <div class="col-12">
                <a class="btn btn-danger" href="<?= base_url('AdminController/index') ?>">Cancelar</a>
                <button type="submit" class="btn btn-primary">Atualizar</button>
            </div>
        </form>
    </div>
    </div>

    


</section>

<script>
function aplicarMascaraCPF(input) {
    var valor = input.value;

    valor = valor.replace(/\D/g, ""); // Remove tudo o que não é dígito
    valor = valor.replace(/(\d{3})(\d)/, "$1.$2"); // Coloca ponto após o terceiro dígito
    valor = valor.replace(/(\d{3})(\d)/, "$1.$2"); // Coloca ponto após os seis primeiros dígitos
    valor = valor.replace(/(\d{3})(\d)/, "$1-$2"); // Coloca um hífen após os nove primeiros dígitos

    input.value = valor; // Atualiza o valor do input
}
</script>

  <script>
function aplicarMascaraCNPJ(input) {
    var valor = input.value;

    valor = valor.replace(/\D/g, ""); // Remove tudo o que não é dígito
    valor = valor.replace(/^(\d{2})(\d)/, "$1.$2"); // Coloca ponto entre o segundo e o terceiro dígitos
    valor = valor.replace(/^(\d{2})\.(\d{3})(\d)/, "$1.$2.$3"); // Coloca ponto entre o quinto e o sexto dígitos
    valor = valor.replace(/\.(\d{3})(\d)/, ".$1/$2"); // Coloca uma barra entre o oitavo e o nono dígitos
    valor = valor.replace(/(\d{4})(\d)/, "$1-$2"); // Coloca um hífen depois do bloco de quatro dígitos

    input.value = valor; // Atualiza o valor do input
}
</script>

<script>
function formatarMoeda() {
    var elemento = document.getElementById('faturamento');
    var valor = elemento.value.replace(/\D/g, ''); // Remove tudo o que não é dígito
    valor = parseInt(valor, 10) / 100; // Divide por 100 para mover os dois últimos dígitos para depois da vírgula
    
    // Verifica se o valor é NaN, se for, retorna vazio
    if (isNaN(valor)) {
        elemento.value = '';
        return;
    }

    // Converte para string e usa expressão regular para formatar
    valor = valor.toFixed(2); // Garante duas casas decimais
    valor = valor.replace('.', ','); // Troca ponto por vírgula
    valor = valor.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.'); // Adiciona ponto como separador de milhares

    elemento.value = 'R$ ' + valor;
}
</script>

<script>
function mascaraTelefone(event) {
    var valor = event.target.value.replace(/\D/g, ''); // Remove tudo que não é dígito
    var tamanho = valor.length;

    // Adiciona parênteses ao DDD
    if (tamanho > 2) {
        valor = '(' + valor.substring(0,2) + ') ' + valor.substring(2);
    }

    // Decide a posição do hífen baseado na quantidade de dígitos
    // Telefones fixos possuem o formato (XX) XXXX-XXXX
    // Telefones celulares possuem o formato (XX) XXXXX-XXXX
    if (tamanho > 6) {
        if (tamanho >= 11) {  // Para celulares com 11 dígitos
            valor = valor.replace(/(\d{4})$/, '-$1'); // Coloca o hífen antes dos últimos quatro dígitos
        } else {  // Para telefones fixos com menos de 11 dígitos
            valor = valor.replace(/(\d{4})$/, '-$1'); // Coloca o hífen antes dos últimos quatro dígitos
        }
    }

    // Limita o tamanho do valor para se adequar ao formato de celular com DDD
    if (tamanho > 11) {
        valor = valor.substring(0, valor.length - (tamanho - 11));
    }

    event.target.value = valor; // Atualiza o valor do input
}
</script>

</body>
</html>