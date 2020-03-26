aplicarRegra();
desfiliacaoRegra();

function aplicarRegra() {
    var comunicacao = document.getElementById('check-comunicacao');
    var transferencia = document.getElementById('check-transferencia');
    var elementosComunicacao= document.querySelectorAll('.comunicacao');
    var elementosTranferencia = document.querySelectorAll('.transferencia');

    empedirTerCheckedEmBranco(comunicacao, transferencia);

    if (comunicacao.checked) {
        elementosComunicacao.forEach(elemento => {
            elemento.style.display = ''
        });
    } else {
        elementosComunicacao.forEach(elemento => {
            elemento.style.display = 'none'
        });
    }

    if (transferencia.checked) {
        elementosTranferencia.forEach(elemento => {
            elemento.style.display = ''
        });
    } else {
        elementosTranferencia.forEach(elemento => {
            elemento.style.display = 'none'
        });
    }
}

function desfiliacaoRegra() {
    var radioDesfiliacao1 = document.getElementById('radio-desfiliacao1');
    var comprovanteDesfiliacao = document.querySelectorAll('.desfiliacao');

    if (radioDesfiliacao1.checked) {
        comprovanteDesfiliacao.forEach(elemento => {
            elemento.style.display = ''
        });
    } else {
        comprovanteDesfiliacao.forEach(elemento => {
            elemento.style.display = 'none'
        });
    }
}

function empedirTerCheckedEmBranco(comunicacao, transferencia) {
    if (!comunicacao.checked && !transferencia.checked) {
        comunicacao.checked = true;
    }
}

function validar() {
    var formulario = document.getElementById('formulario');
    var comunicacao = document.getElementById('check-comunicacao');
    var transferencia = document.getElementById('check-transferencia');
    var buttonSubmit = document.getElementById('button-submit');
    var alerta = document.getElementById('alerta');

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

    if (formulario.comprovanteTitulo.value === '') {
        falseLoader();
        document.getElementById('erro-comprante-titulo').innerHTML = 'Campo obrigatório';
        formulario.comprovanteTitulo.focus();
        return false
    } else {
        document.getElementById('erro-comprante-titulo').innerHTML = '';
    }

    if (formulario.comprovanteSelfie.value === '') {
        falseLoader();
        document.getElementById('erro-comprante-selfie').innerHTML = 'Campo obrigatório';
        formulario.comprovanteSelfie.focus();
        return false
    } else {
        document.getElementById('erro-comprante-selfie').innerHTML = '';
    }

    if (comunicacao.checked) {
        if (formulario.partido.value === '') {
            falseLoader();
            document.getElementById('erro-partido').innerHTML = 'Campo obrigatório';
            formulario.partido.focus();
            return false
        } else {
            document.getElementById('erro-partido').innerHTML = '';
        }

        if (formulario.comprovanteDesfiliacao.value === '' && formulario.desfiliacao.value === 'sim') {
            falseLoader();
            document.getElementById('erro-comprante-desfiliacao').innerHTML = 'Campo obrigatório';
            formulario.comprovanteDesfiliacao.focus();
            return false
        } else {
            document.getElementById('erro-comprante-desfiliacao').innerHTML = '';
        }
    }

    if (transferencia.checked) {
        if (formulario.localVotacao.value === '') {
            falseLoader();
            document.getElementById('erro-local-votacao').innerHTML = 'Campo obrigatório';
            formulario.localVotacao.focus();
            return false
        } else {
            document.getElementById('erro-local-votacao').innerHTML = '';
        }

        if (formulario.comprovanteEndereco.value === '') {
            falseLoader();
            document.getElementById('erro-comprante-endereco').innerHTML = 'Campo obrigatório';
            formulario.comprovanteEndereco.focus();
            return false
        } else {
            document.getElementById('erro-comprante-endereco').innerHTML = '';
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

        if (formulario.cep.value === '') {
            falseLoader();
            document.getElementById('erro-cep').innerHTML = 'Campo obrigatório';
            formulario.cep.focus();
            return false
        } else {
            document.getElementById('erro-cep').innerHTML = '';
        }

        if (formulario.cep.value === '') {
            falseLoader();
            document.getElementById('erro-cep').innerHTML = 'Campo obrigatório';
            formulario.cep.focus();
            return false
        } else {
            document.getElementById('erro-cep').innerHTML = '';
        }
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
