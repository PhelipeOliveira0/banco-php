const cpf = document.getElementById("fCpf");
cpf.addEventListener("input",function(event){
    event.target.value = cpfMasc(event.target.value);
});

function cpfMasc(cpf){
    return cpf.replace(/\D/g,"").replace(/(\d{3})(\d)/,"$1.$2").replace(/(\d{3})(\d)/,"$1.$2").replace(/(\d{3})(\d{1,2})/, '$1-$2').replace(/(-\d{2})\d+?$/, '$1');
}