window.addEventListener('load', carregaEstados);

const editarUsuario = window.location.href.includes('editar_usuario.php');
const cadastroUsuario = window.location.href.includes('cadastro_usuario.php');

function isFormUsuario() {
    return editarUsuario || cadastroUsuario;
}

function carregaEstados() {
    if (!isFormUsuario()) return;

    buscaEstados();
    document.getElementById('select-estado').addEventListener('change', buscaCidade);
}

async function buscaEstados() {
    var url = 'https://servicodados.ibge.gov.br/api/v1/localidades/estados';
    try {
        let res = await fetch(url);
        const data = await res.json();
        setValues('select-estado', data);
        verificaEdicaoCadastro('select-estado', 'value-estado', () => buscaCidade(true));
    } catch (error) {
        console.error(error);
    }
}

function verificaEdicaoCadastro(element, value, callback) {

    if (!editarUsuario) return;

    const elementEdit = document.getElementById(element);

    if (!elementEdit) return;

    const valueEdit = document.getElementById(value).value;

    if (!valueEdit) return;

    elementEdit.value = valueEdit;

    if (callback) callback();
}

async function buscaCidade(editCidade) {
    removeCidades();

    const idEstado = document.getElementById('select-estado').value;

    if (!idEstado) return;

    var url = `https://servicodados.ibge.gov.br/api/v1/localidades/estados/${idEstado}/municipios?oderBy=nome`;
    try {
        let res = await fetch(url);
        const data = await res.json();
        setValues('select-cidade', data);
        if (editCidade) verificaEdicaoCadastro('select-cidade', 'value-cidade');
    } catch (error) {
        console.error(error);
    }

}

function removeCidades() {
    const select = document.getElementById('select-cidade');

    while (select.length > 1) {
        select.remove(1);
    }
}

function setValues(itemId, data) {
    const select = document.getElementById(itemId);

    for (let i = 0; i < data.length; i++) {
        option = document.createElement('option');
        option.setAttribute('value', data[i].id);
        option.appendChild(document.createTextNode(`${data[i].nome} ${data[i].sigla ? ' - ' + data[i].sigla : ''}`));
        select.appendChild(option);
    }
}