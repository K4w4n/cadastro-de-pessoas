const addPessoas = document.querySelector('#add-pessoas');
if (addPessoas) addPessoas.addEventListener('click', () => {
    window.location.assign('./criar-usuario.php');
});

const voltar = document.querySelector('#voltar');
if (voltar) voltar.addEventListener('click', () => {
    window.location.assign('/aprendendo php/');
});

const statusConexao = document.querySelector('#status-conexao');
if (statusConexao) setTimeout(() => statusConexao.classList.add('invisivel'), 5000)