// "API" simulada de sintomas → cuidados
const cuidadosDB = {
  tosse: "Mantenha o animal hidratado, evite friagem e procure um veterinário se persistir.",
  vomito: "Suspenda a alimentação por algumas horas, ofereça água em pequenas quantidades e observe sinais de desidratação.",
  diarreia: "Hidrate bem o pet, ofereça dieta leve e procure atendimento se durar mais de 24 horas.",
  falta_apetite: "Observe possíveis dores, ofereça comida mais palatável e monitore o comportamento.",
  coceira: "Evite que o pet se coce, verifique pulgas/carrapatos e use shampoos indicados por veterinários."
};

// Gera cuidados com base nos sintomas selecionados
function gerarCuidados() {
  const selecionados = [...document.querySelectorAll('.sintomaCheck:checked')].map(c => c.value);
  let cuidadosTexto = "";

  selecionados.forEach(s => {
    if (cuidadosDB[s]) cuidadosTexto += `- ${cuidadosDB[s]}\n`;
  });

  const sintomasExtras = document.getElementById("petSintomas").value.trim();
  if (sintomasExtras) cuidadosTexto += "\n*Observação:* sintomas adicionais descritos exigem avaliação veterinária.\n";

  document.getElementById("petCuidados").value = cuidadosTexto.trim();
}

// Limpa todos os campos do formulário
function limparFormulario() {
  document.getElementById("petNome").value = "";
  document.getElementById("petTipo").value = "";
  document.getElementById("petRaca").value = "";
  document.getElementById("petIdade").value = "";
  document.getElementById("petFoto").value = "";
  document.getElementById("petSintomas").value = "";
  document.getElementById("petCuidados").value = "";
  document.querySelectorAll('.sintomaCheck').forEach(cb => cb.checked = false);
}

// Cadastra o pet na lista
function cadastrarPet() {
  const nome = document.getElementById("petNome").value.trim();
  const tipo = document.getElementById("petTipo").value;
  const raca = document.getElementById("petRaca").value.trim();
  const idade = document.getElementById("petIdade").value;

  if (!nome || !tipo || !raca || !idade) {
    alert("Preencha todos os campos!");
    return;
  }

  const lista = document.getElementById("listaPets");
  const item = document.createElement("div");
  item.className = "pet-item";

  const foto = document.getElementById("petFoto").files[0];
  const fotoURL = foto ? URL.createObjectURL(foto) : "";

  // Pega todos os sintomas selecionados + extras
  const sintomasSelecionados = [...document.querySelectorAll('.sintomaCheck:checked')].map(cb => cb.value);
  const sintomasExtras = document.getElementById("petSintomas").value.trim();
  const todosSintomas = [...sintomasSelecionados];
  if (sintomasExtras) todosSintomas.push(sintomasExtras);

  item.innerHTML = `
    <img src="${fotoURL}" class="pet-foto" alt="Foto de ${nome}" /><br>
    <strong>Nome:</strong> ${nome}<br>
    <strong>Tipo:</strong> ${tipo}<br>
    <strong>Raça:</strong> ${raca}<br>
    <strong>Idade:</strong> ${idade} anos<br>
    <strong>Sintomas:</strong> ${todosSintomas.join(", ")}<br>
    <strong>Cuidados:</strong> ${document.getElementById("petCuidados").value}
  `;

  lista.appendChild(item);
  limparFormulario();
}
