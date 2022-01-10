const addPessoas = document.querySelector('#add-pessoas');
if (addPessoas) addPessoas.addEventListener('click', () => {
    window.location.assign('./criar-usuario.php');
});

const statusConexao = document.querySelector('#status-conexao');
if (statusConexao) setTimeout(() => statusConexao.classList.add('invisivel'), 5000)