1.Incluir projeto na pastas de opt/clientes no SEI.

2.Inclusão de linha no arquivo etc/httpd/conf.d/03_sei.conf - Alias "/solicitacao-candidato" "/opt/clientes/solicitacao-candidato"

3.Criar Sistema no SEI - Sigla: Regular - Nome: Formulário de Regularização

4.Dentro de sistema criar serviço - Identificação: formRegularizacaoExterno - Descrição: Formulário de Regularização - Servidores: atribuir ip do servidor

5.Dentro de serviço Incluir operações
Tipo da Operação: Gerar Procedimento 
Unidade: todas
Tipo do Processo: Tecnologia da informação - Sistema Corporativos

Tipo da Operação: Incluir Documento
Unidade: todas
Tipo do Processo: Tecnologia da informação - Sistema Corporativos
Tipo do Documento: Formulário Comunicação de Desfiliação Partidária

Tipo da Operação: Incluir Documento
Unidade: todas
Tipo do Processo: Tecnologia da informação - Sistema Corporativos
Tipo do Documento: Formulário Transferência de Domicilio Eleitoral

Tipo da Operação: Incluir Documento
Unidade: todas
Tipo do Processo: Tecnologia da informação - Sistema Corporativos
Tipo do Documento: Comprovante

6.Criar Tipos Documentos

Grupo: Geral
Nome: Formulário Comunicação de Desfiliação Partidária
Aplicabilidade: Documentos internos
Modelo: Geral sem Unid sem Num
Tilo de Numeração: sem Numeração

Grupo: Geral
Nome: Formulário Transferência de Domicilio Eleitoral
Aplicabilidade: Documentos internos
Modelo: Geral sem Unid sem Num
Tilo de Numeração: sem Numeração

7.Atribuir as configurações no metodo getAmbiente() no documento ws_formulário

"idTipoProcedimento"=>id(Tecnologia da Informação - Sistemas corporativos),
"idSerie"=> id(Formulário Comunicação de Desfiliação Partidária),
"idSerie2"=>id(Formulário Transferência de Domicilio Eleitoral),
"idSerie3"=>id(Comprovante),