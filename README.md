1.Incluir projeto na pastas de opt/clientes no SEI.

2.Inclus�o de linha no arquivo etc/httpd/conf.d/03_sei.conf - Alias "/solicitacao-candidato" "/opt/clientes/solicitacao-candidato"

3.Criar Sistema no SEI - Sigla: Regular - Nome: Formul�rio de Regulariza��o

4.Dentro de sistema criar servi�o - Identifica��o: formRegularizacaoExterno - Descri��o: Formul�rio de Regulariza��o - Servidores: atribuir ip do servidor

5.Dentro de servi�o Incluir opera��es
Tipo da Opera��o: Gerar Procedimento 
Unidade: todas
Tipo do Processo: Tecnologia da informa��o - Sistema Corporativos

Tipo da Opera��o: Incluir Documento
Unidade: todas
Tipo do Processo: Tecnologia da informa��o - Sistema Corporativos
Tipo do Documento: Formul�rio Comunica��o de Desfilia��o Partid�ria

Tipo da Opera��o: Incluir Documento
Unidade: todas
Tipo do Processo: Tecnologia da informa��o - Sistema Corporativos
Tipo do Documento: Formul�rio Transfer�ncia de Domicilio Eleitoral

Tipo da Opera��o: Incluir Documento
Unidade: todas
Tipo do Processo: Tecnologia da informa��o - Sistema Corporativos
Tipo do Documento: Comprovante

6.Criar Tipos Documentos

Grupo: Geral
Nome: Formul�rio Comunica��o de Desfilia��o Partid�ria
Aplicabilidade: Documentos internos
Modelo: Geral sem Unid sem Num
Tilo de Numera��o: sem Numera��o

Grupo: Geral
Nome: Formul�rio Transfer�ncia de Domicilio Eleitoral
Aplicabilidade: Documentos internos
Modelo: Geral sem Unid sem Num
Tilo de Numera��o: sem Numera��o

7.Atribuir as configura��es no metodo getAmbiente() no documento ws_formul�rio

"idTipoProcedimento"=>id(Tecnologia da Informa��o - Sistemas corporativos),
"idSerie"=> id(Formul�rio Comunica��o de Desfilia��o Partid�ria),
"idSerie2"=>id(Formul�rio Transfer�ncia de Domicilio Eleitoral),
"idSerie3"=>id(Comprovante),