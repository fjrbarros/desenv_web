window.addEventListener('load', carregaEstados);

function carregaEstados() {
    if (!window.location.href.includes('editar_usuario.php') && !window.location.href.includes('cadastro_usuario.php')) return;

    buscaEstados();
    document.getElementById('select-stado').addEventListener('change', buscaCidade);
}

async function buscaEstados() {
    var url = 'https://servicodados.ibge.gov.br/api/v1/localidades/estados';
    try {
        let res = await fetch(url);
        const data = await res.json();
        setValues('select-stado', data);
    } catch (error) {
        console.error(error);
    }
}

async function buscaCidade(event) {
    removeCidades();

    const value = event.target.value;

    if (!value) return;

    var url = `https://servicodados.ibge.gov.br/api/v1/localidades/estados/${value}/municipios?oderBy=nome`;
    try {
        let res = await fetch(url);
        const data = await res.json();
        setValues('select-cidade', data);
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