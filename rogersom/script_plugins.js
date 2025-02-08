// Seleciona o botão de scroll
const scrollTopBtn = document.getElementById("scrollTopBtn");

// Mostrar o botão ao rolar a página para baixo
window.onscroll = function() {
    if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
        scrollTopBtn.style.display = "block"; // Exibe o botão
    } else {
        scrollTopBtn.style.display = "none"; // Esconde o botão
    }
};

// Rolar a página para o topo ao clicar na seta
scrollTopBtn.onclick = function() {
    window.scrollTo({
        top: 0,
        behavior: "smooth" // Rolagem suave
    });
};


