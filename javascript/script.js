const addPessoas = document.querySelector('#add-pessoas');
if (addPessoas) addPessoas.addEventListener('click', () => {
    window.location.assign('/pessoa/cadastro');
});

const voltar = document.querySelector('#voltar');
if (voltar) voltar.addEventListener('click', () => {
    window.location.assign('/');
});


const menuItens = document.querySelector('.menu-itens');
const btnFlutuante = document.querySelector('.btn-flutuante');
const btnHamburger = document.querySelector('.btn-hamburger');

window.addEventListener('click', e => {
    /* Evento de click no  botão hamburger*/
    if(e.target == btnHamburger){
        const menuVisivel = menuItens.classList.contains('aparecer-menu');
        const addOrRemove = menuVisivel ? 'remove' : 'add';
    
        menuItens.classList[addOrRemove]('aparecer-menu');
        btnHamburger.classList[addOrRemove]('active');
        document.body.classList[addOrRemove]('parar-scroll');
        btnFlutuante.classList[addOrRemove]('ocultar-botao');
    }
    /* Evento de click fora do menu */
    else if (!menuItens.contains(e.target)) {
        menuItens.classList.remove('aparecer-menu');
        btnHamburger.classList.remove('active');
        document.body.classList.remove('parar-scroll');
        btnFlutuante.classList.remove('ocultar-botao');
    }
});

const statusConexao = document.querySelector('#status-conexao');
if (statusConexao) setTimeout(() => statusConexao.classList.add('invisivel'), 5000);

document.addEventListener('keypress', e => {
    const tecla = e.key;

    const setas = document.querySelectorAll('.item-sumario.seta');
    const setaMenos = setas[0];
    const setaMais = setas[1];

    if (tecla == '-') setaMenos.click();

    if (tecla == '+') setaMais.click()

});