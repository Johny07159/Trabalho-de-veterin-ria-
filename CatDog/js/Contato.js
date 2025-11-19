document.addEventListener("DOMContentLoaded", () => {

    const form = document.querySelector("form");

    form.addEventListener("submit", function (event) {
        event.preventDefault(); // Evita recarregamento

        // Campos
        const nome = form.querySelector("input[type='text']");
        const email = form.querySelector("input[type='email']");
        const assunto = form.querySelector("input[placeholder='Sobre o que deseja falar?']");
        const mensagem = form.querySelector("textarea");

        let valid = true;

        // Função para marcar erro
        const marcarErro = (campo) => {
            campo.classList.add("erro");
            setTimeout(() => campo.classList.remove("erro"), 1200);
        };

        // Valida Nome
        if (nome.value.trim().length < 3) {
            marcarErro(nome);
            valid = false;
        }

        // Valida Email
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email.value.trim())) {
            marcarErro(email);
            valid = false;
        }

        // Valida Assunto
        if (assunto.value.trim().length < 3) {
            marcarErro(assunto);
            valid = false;
        }

        // Valida Mensagem
        if (mensagem.value.trim().length < 5) {
            marcarErro(mensagem);
            valid = false;
        }

        // Se algum campo estiver inválido → não envia
        if (!valid) {
            exibirAviso("Preencha todos os campos corretamente!", "erro");
            return;
        }

        // Se tudo ok → envia
        exibirAviso("Mensagem enviada com sucesso!", "sucesso");

        // Limpa o formulário
        form.reset();
    });

});

/* -------------------------------
   Função para exibir mensagens
--------------------------------*/
function exibirAviso(texto, tipo) {

    // Remover mensagens anteriores
    const antigaMsg = document.querySelector(".msg-alerta");
    if (antigaMsg) antigaMsg.remove();

    const msg = document.createElement("div");
    msg.classList.add("msg-alerta", tipo);
    msg.textContent = texto;

    document.querySelector(".contato-box").prepend(msg);

    setTimeout(() => {
        msg.style.opacity = "0";
        msg.style.transform = "translateY(-20px)";
    }, 2500);

    setTimeout(() => msg.remove(), 3200);
}
