const arquivo = document.querySelector('#imagem');
const inserirImagem = document.querySelector('.inserirImagem');
const textoImagem = "Inserir Imagem";

inserirImagem.innerHTML = textoImagem;

arquivo.addEventListener('change', function(e) {
    const inputTarget = e.target;
const file = inputTarget.files[0];

if (file) {
    const reader = new FileReader();

    reader.addEventListener('load', function(e) {
        const readTarget = e.target;

        const img = document.createElement('img');
        img.src = readTarget.result;
        img.classList.add('previewImagem');

        inserirImagem.innerHTML = "";
        inserirImagem.appendChild(img);
    });

    reader.readAsDataURL(file); 
} else {
    inserirImagem.innerHTML = textoImagem;
}
});