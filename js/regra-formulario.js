function validar() {
    var formulario = document.getElementById('formulario');

    if (formulario.tituloNet.value === '') {
        falseLoader();
        document.getElementById('erro-titulo-net').innerHTML = 'Campo obrigatório';
        formulario.tituloNet.focus();
        return false
    } else {
        document.getElementById('erro-titulo-net').innerHTML = '';
    }

    if (formulario.titulo.value === '') {
        falseLoader();
        document.getElementById('erro-titulo').innerHTML = 'Campo obrigatório';
        formulario.titulo.focus();
        return false
    } else {
        document.getElementById('erro-titulo').innerHTML = '';
    }

    if (formulario.nome.value === '') {
        falseLoader();
        document.getElementById('erro-nome').innerHTML = 'Campo obrigatório';
        formulario.nome.focus();
        return false
    }
    else {
        document.getElementById('erro-nome').innerHTML = '';
    }

    if (formulario.municipio.value === '') {
        falseLoader();
        document.getElementById('erro-municipio').innerHTML = 'Campo obrigatório';
        formulario.municipio.focus();
        return false
    } else {
        document.getElementById('erro-municipio').innerHTML = '';
    }

    if (formulario.municipioDestino.value === '') {
        falseLoader();
        document.getElementById('erro-municipio-destino').innerHTML = 'Campo obrigatório';
        formulario.municipioDestino.focus();
        return false
    } else {
        document.getElementById('erro-municipio-destino').innerHTML = '';
    }

    if (formulario.municipio.value === formulario.municipioDestino.value) {
        falseLoader();
        alert('Campo Município da Inscrição Eleitoral não pode ser igual ao Município destino');
        formulario.municipioDestino.focus();
        return false
    }

    if (formulario.telefone.value === '') {
        falseLoader();
        document.getElementById('erro-telefone').innerHTML = 'Campo obrigatório';
        formulario.telefone.focus();
        return false
    } else {
        document.getElementById('erro-telefone').innerHTML = '';
    }

    if (formulario.localVotacao.value === '') {
        falseLoader();
        document.getElementById('erro-local-votacao').innerHTML = 'Campo obrigatório';
        formulario.localVotacao.focus();
        return false
    } else {
        document.getElementById('erro-local-votacao').innerHTML = '';
    }

    if (formulario.comprovanteRg.value === '') {
        falseLoader();
        document.getElementById('erro-comprante-rg').innerHTML = 'Campo obrigatório';
        formulario.comprovanteRg.focus();
        return false
    } else {
        document.getElementById('erro-comprante-rg').innerHTML = '';
    }

    if (formulario.comprovanteCpf.value === '') {
        falseLoader();
        document.getElementById('erro-comprante-cpf').innerHTML = 'Campo obrigatório';
        formulario.comprovanteCpf.focus();
        return false
    } else {
        document.getElementById('erro-comprante-cpf').innerHTML = '';
    }

    if (formulario.comprovanteTitulo.value === '') {
        falseLoader();
        document.getElementById('erro-comprante-titulo').innerHTML = 'Campo obrigatório';
        formulario.comprovanteTitulo.focus();
        return false
    } else {
        document.getElementById('erro-comprante-titulo').innerHTML = '';
    }

    if (formulario.comprovanteEndereco.value === '') {
        falseLoader();
        document.getElementById('erro-comprante-endereco').innerHTML = 'Campo obrigatório';
        formulario.comprovanteEndereco.focus();
        return false
    } else {
        document.getElementById('erro-comprante-endereco').innerHTML = '';
    }

    if (formulario.comprovanteSelfie.value === '') {
        falseLoader();
        document.getElementById('erro-comprante-selfie').innerHTML = 'Campo obrigatório';
        formulario.comprovanteSelfie.focus();
        return false
    } else {
        document.getElementById('erro-comprante-selfie').innerHTML = '';
    }

    if (formulario.endereco.value === '') {
        falseLoader();
        document.getElementById('erro-endereco').innerHTML = 'Campo obrigatório';
        formulario.endereco.focus();
        return false
    } else {
        document.getElementById('erro-endereco').innerHTML = '';
    }

    if (formulario.numero.value === '') {
        falseLoader();
        document.getElementById('erro-numero').innerHTML = 'Campo obrigatório';
        formulario.numero.focus();
        return false
    } else {
        document.getElementById('erro-numero').innerHTML = '';
    }

    if (formulario.bairro.value === '') {
        falseLoader();
        document.getElementById('erro-bairro').innerHTML = 'Campo obrigatório';
        formulario.bairro.focus();
        return false
    } else {
        document.getElementById('erro-bairro').innerHTML = '';
    }

    return true
}

function loader() {
    var buttonSubmit = document.getElementById('button-submit');

    setTimeout(function(){
        buttonSubmit.setAttribute('disabled', 'true');
    }, 100);

    buttonSubmit.innerHTML = 'Aguarde... <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>';
}

function falseLoader() {
    var buttonSubmit = document.getElementById('button-submit');

    setTimeout(function(){
        buttonSubmit.removeAttribute('disabled');
    }, 100);
    buttonSubmit.innerHTML = 'Enviar';
}
