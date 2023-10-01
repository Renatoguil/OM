const form = document.getElementById("interesseForm");

form.addEventListener("submit", (e) => {
  e.preventDefault();

  const nome = document.getElementById("nome").value.trim();
  const email = document.getElementById("email").value.trim();
  const nivel = document.getElementById("nivel").value.trim();
  const mensagem = document.getElementById("mensagem").value.trim();

  if (!nome || !email || !nivel) {
    alert("Por favor, preencha todos os campos obrigatórios.");
    return;
  }

  const formData = new FormData(form);

  fetch("ConexaoForm.php", {
    method: "POST",
    body: formData,
  })
    .then((response) => response.text())
    .then((data) => {
      alert(data);
      form.reset();
    })
    .catch((error) => {
      console.error("Erro:", error);
    });
});