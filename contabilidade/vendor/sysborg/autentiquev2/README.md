# autentique-v2

Pt-BR
Documentação sobre a API: https://docs.autentique.com.br/api/sobre-o-graphql

Em breve essa lib em Python também.

Requer PHP 8 ou superior.
Como instalar no composer?
Faça o download do composer pelo site oficial: https://getcomposer.org/download/
Após isso utilize o comando abaixo:
```
composer require sysborg/autentiquev2
```

Ou caso sua instalação seja somente naquela pasta utilize:
```
php composer.phar require sysborg/autentiquev2
```

Preferi trabalhar esse código usando uma idéia de layout para querys do GraphQL.
Dentre os layouts eu disponibilizei cada recurso disponível pelo sistema da Autentique dentre eles:

Diretórios "Pastas":
1. \sysborg\autentiquev2\createDir - Esse layout é utilizado para criar uma nova pasta "diretório"
2. \sysborg\autentiquev2\deleteDir - Esse layout é utilizado para deletar uma pasta "diretório"
3. \sysborg\autentiquev2\listDir   - Esse layout é utilizado para listar todos as pastas "diretórios" existentes
4. \sysborg\autentiquev2\rescueDir - Esse layout é utilizado para resgatar informações sobre a pasta "diretório"

Documentos:
1. \sysborg\autentiquev2\createDoc - Serve para criar e fazer o upload de um documento
2. \sysborg\autentiquev2\deleteDoc - Serve para deletar um documento existente por ID
3. \sysborg\autentiquev2\listDoc   - Serve para listar todos os documentos que não estão dentro de um diretório "pasta"
4. \sysborg\autentiquev2\listDocDir - Serve para listar todos os documentos dentro de um diretório "pasta"
5. \sysborg\autentiquev2\moveDoc    - Serve para mover um documento para algum diretório "pasta".
6. \sysborg\autentiquev2\rescueDoc  - Serve para resgatr informações do documento, assinatura e muito mais.
7. \sysborg\autentiquev2\signDoc    - Serve para assinar um documento.

Autentique webhooks : https://docs.autentique.com.br/api/integracao/webhooks<br>
O Webhook serve para receber um estimulo da autentique assim que alguma coisa mudar no documento por exemplo:<br>
1. Assinar o documento
2. Rejeitar assinar o documento

Para aprimorar isso estamos desenvolvendo algo pure php pra receber esse estímulo e poder converte-lo fácilmente para qualquer programador.<br>

Veja como utilizar na pasta de test em https://github.com/sysborg/autentiquev2/tree/main/test<br>
Veja nosso trabalho em: https://sysborg.com.br<br>
Siga-nos:<br>
1. Facebook: https://facebook.com/sysborg
2. Instagram: https://instagram.com/sysborg_oficial
  
Contribuidores<br>
1. Anderson Arruda<br>
  a. Linkedin:  https://www.linkedin.com/in/anderson-a-sborg/<br>
  b. Instagram: https://instagram.com/andmarruda <br>
  c. Github:    https://github.com/andmarruda <br>
  d. Blog:      https://andersonarruda.com.br<br>
  
En-US
Documentation about API: https://docs.autentique.com.br/api/sobre-o-graphql

Soon this library in Python too.

Required PHP 8 or greater.
How did you install composer?
Make the install by official composer's website: https://getcomposer.org/download/
After utilize the command above:
```
composer require sysborg/autentiquev2
```

Or in case that your installation is just in that directory utilize:
```
php composer.phar require sysborg/autentiquev2
```

I prefer to work this code based on layout's idea to build the GraphQL querys.
There are several available resources of Autentique as follow:

Directory:
1. \sysborg\autentiquev2\createDir - This layout is utilized to create a directory
2. \sysborg\autentiquev2\deleteDir - This layout is utilized to delete a directory
3. \sysborg\autentiquev2\listDir   - This layout is utilized to list all existing directory
4. \sysborg\autentiquev2\rescueDir - This layout is Utilized to rescue informations about directory

Documents:
1. \sysborg\autentiquev2\createDoc - Utilized to create and upload a document
2. \sysborg\autentiquev2\deleteDoc - Utilized to delete a existing document by ID
3. \sysborg\autentiquev2\listDoc   - Utilized to list all documents that are not inside a directory
4. \sysborg\autentiquev2\listDocDir - Utilized to list all documents inside some directory
5. \sysborg\autentiquev2\moveDoc    - Utilized to move documento inside some directory
6. \sysborg\autentiquev2\rescueDoc  - Utilized to rescue document's information, signature and alot more
7. \sysborg\autentiquev2\signDoc    - Utilized to sign some document

Autentique webhooks : https://docs.autentique.com.br/api/integracao/webhooks<br>
The Webhook is utilized to receive a signal from autentique when something change at the document for example::<br>
1. Sign the document
2. Reject to sign the document

To improve this we are developing something with pure php to receive this signal and converted it easily to any developer.<br>

See how to use on test path at https://github.com/sysborg/autentiquev2/tree/main/test<br>
See our work at: https://sysborg.com.br<br>
Follow us:
1. Facebook: https://facebook.com/sysborg
2. Instagram: https://instagram.com/sysborg_oficial
  
Contributors<br>
1. Anderson Arruda<br>
  a. Linkedin:  https://www.linkedin.com/in/anderson-a-sborg/<br>
  b. Instagram: https://instagram.com/andmarruda <br>
  c. Github:    https://github.com/andmarruda <br>
  d. Blog:      https://andersonarruda.com.br<br>
