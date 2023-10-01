// Aguarda o evento "DOMContentLoaded" para garantir que o DOM (Document Object Model) esteja totalmente carregado antes de executar o código.
document.addEventListener("DOMContentLoaded", function () {
  // Obtém uma referência ao formulário com o ID "interesseForm" no DOM.
  const form = document.getElementById("interesseForm");

  // Adiciona um ouvinte de evento para o evento de envio do formulário.
  form.addEventListener("submit", function (e) {
    // Impede o comportamento padrão de envio do formulário, que atualizaria a página.
    e.preventDefault();

    // Cria um objeto FormData para coletar os dados do formulário.
    const formData = new FormData(form);

    // Faz uma solicitação HTTP POST para o arquivo "processar_formulario.php" usando a função fetch.
    fetch("processar_formulario.php", {
      method: "POST",
      body: formData, // Define o corpo da solicitação como os dados do formulário.
    })
    .then(response => response.text()) // Converte a resposta em texto.
    .then(data => {
      // Exibe um alerta com a resposta do servidor (pode personalizar isso para mostrar uma mensagem de sucesso).
      alert(data);

      // Limpa o formulário após o envio bem-sucedido.
      form.reset();
    })
    .catch(error => {
      // Lida com erros, exibindo-os no console do navegador.
      console.error("Erro:", error);
    });
  });
});