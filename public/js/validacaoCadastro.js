const botao = document.querySelector(".cadastro__itens__botao__cadastrar");

botao.addEventListener("click", function(event){
    const senha = document.querySelector("#fSenha").value;
    const confirmar = document.querySelector("#fSenhaConfirme").value;
    if(senha != confirmar){
        alert("as senhas devem ser idênticas");
        event.preventDefault();
    }
});


