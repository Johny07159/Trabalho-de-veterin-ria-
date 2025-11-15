  let usuario = {};

    function showCadastro() {
      document.getElementById("loginForm").style.display = "none";
      document.getElementById("cadastroForm").style.display = "block";
      document.getElementById("title").textContent = "Cadastro";
    }

    function showLogin() {
      document.getElementById("cadastroForm").style.display = "none";
      document.getElementById("loginForm").style.display = "block";
      document.getElementById("title").textContent = "Login";
    }

    function cadastrar() {
      let nome = document.getElementById("cadNome").value;
      let email = document.getElementById("cadEmail").value;
      let senha = document.getElementById("cadSenha").value;

      if (!nome || !email || !senha) {
        alert("Preencha todos os campos!");
        return;
      }

      usuario = { nome, email, senha };
      alert("Cadastro realizado com sucesso!");
      showLogin();
    }

    function login() {
      let email = document.getElementById("loginEmail").value;
      let senha = document.getElementById("loginSenha").value;

      if (!email || !senha) {
        alert("Preencha todos os campos!");
        return;
      }

      if (email === usuario.email && senha === usuario.senha) {
        document.getElementById("authBox").style.display = "none";
        window.location.href = "home.html"; // redireciona para página home
      } else {
        alert("Email ou senha incorretos!");
      }
    }