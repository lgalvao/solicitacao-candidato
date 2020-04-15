# Implantação

Os passos a seguir refletem o ambiente de implantação no TRE-TO. Em outros TRE's, a localização de onde hospedar o projeto, poderia ser alterada livremente.

## Colocar projeto no servidor com Apache

Incluir projeto na pasta `/opt/clientes` no servidor do SEI.

## Configurar alias no Apache

Inclusão de linha no arquivo etc/httpd/conf.d/03_sei.confi:
    
    Alias "/solicitacao-candidato" "/opt/clientes/solicitacao-candidato"

Em seguida recarregar ou reiniciar o Apache. Em sistemas como CentOS, seria executar o comando:

    systemctl reload httpd.service 

## Coonfigurar o Web Service no SEI

### Criar sistema no SEI

**Sigla**: Regular  
**Nome**: Formulário de Regularização gerar link acesso externo

### Dentro de sistema, criar serviço

**Identificação**: formRegularizacaoExterno  
**Descrição**: Formulário de Regularização  
**Servidores**: atribuir ip do servidor  

### Dentro de serviço, incluir operações

**Tipo da Operação**: Gerar Procedimento  
**Unidade**: todas  
**Tipo do Processo**: Tecnologia da informação - Sistema Corporativos  

**Tipo da Operação**: Incluir Documento  
**Unidade**: todas  
**Tipo do Processo**: Tecnologia da informação - Sistema Corporativos  
**Tipo do Documento**: Formulário

**Tipo da Operação**: Incluir Documento  
**Unidade**: todas  
**Tipo do Processo**: Tecnologia da informação - Sistema Corporativos  
**Tipo do Documento**: Anexo  

**Tipo da Operação**: Incluir Documento  
**Unidade**: todas  
**Tipo do Processo**: Tecnologia da informação - Sistema Corporativos  
**Tipo do Documento**: Requerimento  

**Tipo da Operação**: Incluir Documento  
**Unidade**: todas  
**Tipo do Processo**: Tecnologia da informação - Sistema Corporativos  
**Tipo do Documento**: Termo  

### Aumentar a quantidade de arquivos que podem ser anexados por Web Services

no SEI: menu Infra -> Parâmetros -> alterar o parâmetro `SEI_WS_NUM_MAX_DOCS` para 9.

## Atribuir as configurações no metodo getAmbiente() no arquivo ws_formulario.php

    "idTipoProcedimento"=>id(Tecnologia da Informação - Sistemas corporativos),  
    "idSerie"=> id(Formulário Transferência de Domicilio Eleitoral),  
    "idSerie2"=>id(Requerimento),  
    "idSerie3"=>id(Anexo),  

