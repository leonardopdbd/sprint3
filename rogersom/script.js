document.getElementById('contatoForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Impede o envio padrão do formulário

    // Dados do formulário
    var formData = new FormData(this);

    // Enviar para o process_form.php via AJAX
    fetch('process_form.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        console.log('Resposta do process_form.php:', data);
    })
    .catch(error => {
        console.error('Erro ao enviar para process_form.php:', error);
    });

    // Enviar para o Formspree via POST tradicional
    var formspreeURL = 'https://formspree.io/f/xvggkjnk';
    var formspreeForm = document.createElement('form');
    formspreeForm.method = 'POST';
    formspreeForm.action = formspreeURL;

    // Adiciona os dados do formulário ao novo formulário
    for (var [key, value] of formData.entries()) {
        var input = document.createElement('input');
        input.type = 'hidden';
        input.name = key;
        input.value = value;
        formspreeForm.appendChild(input);
    }

    // Enviar o formulário para o Formspree
    document.body.appendChild(formspreeForm);
    formspreeForm.submit();
});



