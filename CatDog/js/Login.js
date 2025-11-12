document.addEventListener('DOMContentLoaded', () => {
    const container = document.getElementById('container');
    const registerBtn = document.getElementById('register');
    const loginBtn = document.getElementById('login');
    const liveMessage = document.getElementById('live-message'); // elemento <div id="live-message" aria-live="polite"></div>

    if (!container) return; // aborta se não houver container

    if (registerBtn) {
        registerBtn.addEventListener('click', () => {
            container.classList.add('active');
            if (liveMessage) liveMessage.textContent = 'Modo cadastro ativado';
        });
    }

    if (!email || !senha) {
        mensagem.textContent = "Por favor, preencha todos os campos.";
        mensagem.className = "mensagem alert alert-warning mt-3 text-center";
        return;
    }

    if (loginBtn) {
        loginBtn.addEventListener('click', () => {
            container.classList.remove('active');
            if (liveMessage) liveMessage.textContent = 'Modo login ativado';
        });
    }

    // Captura os formulários
    const signUpForm = document.querySelector('.sign-up form');
    const signInForm = document.querySelector('.sign-in form');

    // Função de validação para o formulário de cadastro
    signUpForm.addEventListener('submit', (e) => {
        e.preventDefault(); // Impede o envio padrão do formulário
        
        const nome = signUpForm.querySelector('input[type="text"]').value.trim();
        const email = signUpForm.querySelector('input[type="email"]').value.trim();
        const senha = signUpForm.querySelector('input[type="password"]').value.trim();
        
        if (!nome || !email || !senha) {
            alert('Por favor, preencha todos os campos do cadastro!');
            return;
        }

        // Se todos os campos estiverem preenchidos, permite o envio
        window.location.href = signUpForm.action;
    });

    // Função de validação para o formulário de login
    signInForm.addEventListener('submit', (e) => {
        e.preventDefault(); // Impede o envio padrão do formulário
        
        const email = signInForm.querySelector('input[type="email"]').value.trim();
        const senha = signInForm.querySelector('input[type="senha"]').value.trim();
        
        if (!email || !senha) {
            alert('Por favor, preencha todos os campos do login!');
            return;
        }

        // Se todos os campos estiverem preenchidos, permite o envio
        window.location.href = signInForm.action;
    });
});