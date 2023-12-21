//Mascarando o CPF
const obj_inputCpf = document.querySelector('#CPFtutor, #CPFfunc')
const obj_inputFone = document.querySelector('#Fonetutor')

//const obj_inputCpftutor = document.querySelector('#CPFfunc')


obj_inputCpf.addEventListener('input', mascara_cpf)
obj_inputFone.addEventListener('input', mascara_fone)



function mascara_cpf(){
    obj_inputCpf.value = obj_inputCpf.value.replace(/[^\d.-]/g, ''); //não permite inserção de caracteres

    if(obj_inputCpf.value.length == 3 || obj_inputCpf.value.length == 7){
        obj_inputCpf.value += "."
    }else if(obj_inputCpf.value.length == 11){
        obj_inputCpf.value += "-"
    }
}

function mascara_fone() {
    obj_inputFone.value = obj_inputFone.value.replace(/[^\d() -]/g, '');

    // Adiciona os parênteses após o primeiro dígito
    if (obj_inputFone.value.length === 1) {
        obj_inputFone.value = '(' + obj_inputFone.value;
    }

    // Adiciona o espaço após o segundo dígito
    if (obj_inputFone.value.length === 3) {
        obj_inputFone.value += ') ';
    }
    // Adiciona o hífen após o nono dígito
    if (obj_inputFone.value.length === 10) {
        obj_inputFone.value += '-';
    }
}
