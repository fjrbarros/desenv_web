window.onload = (event) => {
    buscaEstados();
}

async function buscaEstados() {
    var url = 'https://servicodados.ibge.gov.br/api/v1/localidades/estados';
    try {
        let res = await fetch(url);
        const data = await res.json();
        setValues(data);
    } catch (error) {
        console.error(error);
    }
}

function setValues(data) {
    const selectEstado = document.getElementById('select-stado');

    for (let i = 0; i < data.length; i++) {
        option = document.createElement('option');
        option.setAttribute('value', data[i].sigla);
        option.appendChild(document.createTextNode(data[i].nome));
        selectEstado.appendChild(option);
    }
}