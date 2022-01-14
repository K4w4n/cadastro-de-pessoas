const addPessoas = document.querySelector('#add-pessoas');
if (addPessoas) addPessoas.addEventListener('click', () => {
    window.location.assign('./criar-usuario');
});

const voltar = document.querySelector('#voltar');
if (voltar) voltar.addEventListener('click', () => {
    window.location.assign('./');
});

const statusConexao = document.querySelector('#status-conexao');
if (statusConexao) setTimeout(() => statusConexao.classList.add('invisivel'), 5000);