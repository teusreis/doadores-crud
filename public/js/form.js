import Doador from './doadorClass.js';

const form = document.querySelector("form");
const doadorId = form.doadorId;
const nome = form.nome;
const cpf = document.querySelector("#cpf");
const email = document.querySelector("#email");
const endereco = document.querySelector("#endereco");
const telefone = document.querySelector("#telefone");
const nasc = document.querySelector("#nasc");
const valorDoacao = document.querySelector("#valorDoacao");
const formaPagamento = document.querySelector("#formaPagamento");
const intervaloDoacao = document.querySelector("#intervaloDoacao");
const newDoador = new Doador();
let error = [];

form.addEventListener("submit", event => {
    event.preventDefault();
    error = [];

    error.push(nomeValidate());
    error.push(cpfValidate());
    error.push(emailValidate());
    error.push(enderecoValidate());
    error.push(telefoneValidate());
    error.push(nascValidate());
    error.push(valorDoacaoValidate());

    if (!error.includes(true)) {
        form.submit();
    }
    console.log(error);
})

nome.addEventListener("blur", () => {
    nomeValidate();
});

cpf.addEventListener("blur", () => {
    cpfValidate();
});

email.addEventListener("blur", () => {
    emailValidate();
});

endereco.addEventListener("blur", () => {
    enderecoValidate();
});

telefone.addEventListener("blur", () => {
    telefoneValidate();
});

nasc.addEventListener("blur", () => {
    nascValidate();
});

valorDoacao.addEventListener("blur", () => {
    valorDoacaoValidate();
})

function nomeValidate() {
    if (nome.value == "") {
        nome.parentNode.classList.remove("valid");
        nome.parentNode.classList.add("invalid");
        nome.parentNode.querySelector(".invalid-message").textContent = "Nome é obrigatorio";
        return true;
    } else if (nome.length > 50) {
        nome.parentNode.classList.remove("valid");
        nome.parentNode.classList.add("invalid");
        nome.parentNode.querySelector(".invalid-message").textContent = "Nome não pode ser maior do que 50 caracteres!";
        return true;
    } else {
        nome.parentNode.classList.remove("invalid");
        nome.parentNode.classList.add("valid");
        nome.parentNode.querySelector(".invalid-message").textContent = "";
        return false;
    }
}

function cpfValidate() {
    let error = false;
    if (cpf.value == "") {
        cpf.parentNode.classList.remove("valid");
        cpf.parentNode.classList.add("invalid");
        cpf.parentNode.querySelector(".invalid-message").textContent = "CPF é obrigatorio";
        return true;
    } else {
        cpf.parentNode.classList.remove("invalid");
        cpf.parentNode.classList.add("valid");
        cpf.parentNode.querySelector(".invalid-message").textContent = "";
    }

    newDoador.cpfExist(cpf.value, doadorId.value)
        .then((data) => {
            if (data.body == true) {
                cpf.parentNode.classList.remove("valid");
                cpf.parentNode.classList.add("invalid");
                cpf.parentNode.querySelector(".invalid-message").textContent = "Esse cpf já está sendo usado por outro doador!";
                error = true;
            } else {
                cpf.parentNode.classList.remove("invalid");
                cpf.parentNode.classList.add("valid");
                cpf.parentNode.querySelector(".invalid-message").textContent = "";
                error = false;
            }
        }).catch((error) => {
            console.log(error)
        });
    return error;
}

function emailValidate() {
    let valid = "/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i";

    if (email.value == "") {
        email.parentNode.classList.remove("valid");
        email.parentNode.classList.add("invalid");
        email.parentNode.querySelector(".invalid-message").textContent = "Email é obrigatorio";
        return true;
    } else if (email.value.match(valid)) {
        email.parentNode.classList.remove("valid");
        email.parentNode.classList.add("invalid");
        email.parentNode.querySelector(".invalid-message").textContent = "Email invalido";
        return true;
    }

    newDoador.emailExist(email.value, doadorId.value)
        .then((data) => {
            if (data.body == true) {
                email.parentNode.classList.remove("valid");
                email.parentNode.classList.add("invalid");
                email.parentNode.querySelector(".invalid-message").textContent = "Esse email já está sendo usado por outro duador!";
            } else {
                email.parentNode.classList.remove("invalid");
                email.parentNode.classList.add("valid");
                email.parentNode.querySelector(".invalid-message").textContent = "";
            }
        }).catch((error) => {
            console.log(error)
        });
}

function enderecoValidate() {
    if (endereco.value == "") {
        endereco.parentNode.classList.remove("valid");
        endereco.parentNode.classList.add("invalid");
        endereco.parentNode.querySelector(".invalid-message").textContent = "Endereço é obrigatorio";
        return true;
    } else {
        endereco.parentNode.classList.remove("invalid");
        endereco.parentNode.classList.add("valid");
        endereco.parentNode.querySelector(".invalid-message").textContent = "";
        return false;
    }
}

function telefoneValidate() {
    if (telefone.value == "") {
        telefone.parentNode.classList.remove("valid");
        telefone.parentNode.classList.add("invalid");
        telefone.parentNode.querySelector(".invalid-message").textContent = "Telefone é obrigatorio";
        return true;
    } else {
        telefone.parentNode.classList.remove("invalid");
        telefone.parentNode.classList.add("valid");
        telefone.parentNode.querySelector(".invalid-message").textContent = "";
        return false;
    }
}

function nascValidate() {
    if (nasc.value == "") {
        nasc.parentNode.classList.remove("valid");
        nasc.parentNode.classList.add("invalid");
        nasc.parentNode.querySelector(".invalid-message").textContent = "Data de nacimento é obrigatorio";
        return true;
    } else {
        nasc.parentNode.classList.remove("invalid");
        nasc.parentNode.classList.add("valid");
        nasc.parentNode.querySelector(".invalid-message").textContent = "";
        return false;
    }
}

function valorDoacaoValidate() {
    if (valorDoacao.value == "") {
        valorDoacao.parentNode.classList.remove("valid");
        valorDoacao.parentNode.classList.add("invalid");
        valorDoacao.parentNode.querySelector(".invalid-message").textContent = "Valor da doação é obrigatorio";
        return true;
    } else {
        valorDoacao.parentNode.classList.remove("invalid");
        valorDoacao.parentNode.classList.add("valid");
        valorDoacao.parentNode.querySelector(".invalid-message").textContent = "";
        return false;
    }
}