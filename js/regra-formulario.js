function validar() {
    var formulario = document.getElementById('formulario');

    if (formulario.tituloNet.value === '' && formulario.tipoServico.value === 'alistamento' || formulario.tituloNet.value === '' && formulario.tipoServico.value === 'transferencia' || formulario.tituloNet.value === '' && formulario.tipoServico.value === 'revisao') {
        falseLoader();
        document.getElementById('erro-titulo-net').innerHTML = 'Campo obrigatório';
        formulario.tituloNet.focus();
        return false
    } else {
        document.getElementById('erro-titulo-net').innerHTML = '';
    }

    if (formulario.titulo.value === '' && formulario.tipoServico.value !== 'alistamento') {
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

    if (formulario.municipioDestino.value === '') {
        falseLoader();
        document.getElementById('erro-municipio-destino').innerHTML = 'Campo obrigatório';
        formulario.municipioDestino.focus();
        return false
    } else {
        document.getElementById('erro-municipio-destino').innerHTML = '';
    }

    if (formulario.telefone.value === '') {
        falseLoader();
        document.getElementById('erro-telefone').innerHTML = 'Campo obrigatório';
        formulario.telefone.focus();
        return false
    } else {
        document.getElementById('erro-telefone').innerHTML = '';
    }

    if (formulario.email.value === '') {
        falseLoader();
        document.getElementById('erro-email').innerHTML = 'Campo obrigatório';
        formulario.email.focus();
        return false
    } else {
        document.getElementById('erro-email').innerHTML = '';
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

    if (formulario.comprovanteTitulo.value === '' && formulario.tipoServico.value !== 'alistamento') {
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

    // if (formulario.comprovanteAlistamento.value === '' && formulario.tipoServico.value === 'alistamento') {
    //     falseLoader();
    //     document.getElementById('erro-comprante-alistamento').innerHTML = 'Campo obrigatório';
    //     formulario.comprovanteAlistamento.focus();
    //     return false
    // } else {
    //     document.getElementById('erro-comprante-alistamento').innerHTML = '';
    // }

    if (formulario.justificativa.value === '') {
        falseLoader();
        document.getElementById('erro-justificativa').innerHTML = 'Campo obrigatório';
        formulario.justificativa.focus();
        return false
    } else {
        document.getElementById('erro-justificativa').innerHTML = '';
    }

    return false
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

function habilitarAlistamento() {
    var divAlistamento = document.getElementById('divAlistamento');
    var formulario = document.getElementById('formulario');
    var divTituloEleitoral = document.getElementById('divTituloEleitoral');
    var divComprovanteTitulo = document.getElementById('divComprovanteTitulo');
    var divNecessidade = document.getElementById('divNecessidade');
    var divTituloNet = document.getElementById('divTituloNet');

    if (formulario.tipoServico.value === 'alistamento') {
        divAlistamento.style.display = '';
        divTituloEleitoral.style.display = 'none';
        divComprovanteTitulo.style.display = 'none';
        formulario.titulo.value = '';
    } else {
        divAlistamento.style.display = 'none';
        divTituloEleitoral.style.display = '';
        divComprovanteTitulo.style.display = '';
    }

    if (formulario.tipoServico.value === 'alistamento' || formulario.tipoServico.value === 'transferencia' || formulario.tipoServico.value === 'revisao') {
        divNecessidade.style.display = '';
        divTituloNet.style.display = '';
    } else {
        formulario.tituloNet.value = '';
        formulario.necessidadeEspecial.checked = false;
        divNecessidade.style.display = 'none';
        divTituloNet.style.display = 'none';
    }
}
