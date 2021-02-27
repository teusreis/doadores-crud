import Doador from "./doadorClass.js";

const newDoador = new Doador();
const doadores = document.querySelectorAll(".deleteDoardor");
const modalMessage = document.querySelector(".modalMessage");
const btnDelete = document.querySelector(".btnDelete");
const modalVisualizar = document.querySelector("#modelVisualizarDoador");

//Visualiza dados

const btnVisualizar = document.querySelectorAll(".visualizaDoador");
const nome = document.querySelector("#nome");
const cpf = document.querySelector("#cpf");
const email = document.querySelector("#email");
const endereco = document.querySelector("#endereco");
const telefone = document.querySelector("#telefone");
const nasc = document.querySelector("#nasc");
const valorDoacao = document.querySelector("#valorDoacao");
const formaPagamento = document.querySelector("#formaPagamento");
const intervaloDoacao = document.querySelector("#intervaloDoacao");

const linkEditar = document.querySelector(".linkEditar");
let urlEditar = linkEditar.href;


let doadorId = null;
let visualizaId = null;
let element = null;

doadores.forEach(doador => {
    doador.addEventListener("click", () => {
        doadorId = doador.dataset.id;
        element = doador;
        modalMessage.textContent = `Você realmente quer deletar o seguinte doador: ${doador.dataset.nome}?`;
    });
});

btnDelete.addEventListener("click", () => {
    newDoador.delete(doadorId)
        .then(data => {
            if (data.body == true) {
                alert("Doador deletado com successo!");
                $("#modalDeleteDoador").modal('hide');
                element.parentNode.parentNode.remove();
            }
        }).catch(error => console.log(error));
});

btnVisualizar.forEach(visu => {
    visu.addEventListener("click", e => {
        let id = visu.dataset.id;
        newDoador.get(id)
            .then(data => {
                updateUi(data.body);
            })
            .catch(error => console.log(error))
    });
});

function updateUi(data) {
    nome.value = data.nome;
    cpf.value = data.cpf;
    email.value = data.email;
    endereco.value = data.endereco;
    telefone.value = data.telefone;
    nasc.value = data.nasc;
    valorDoacao.value = data.valorDoacao;
    formaPagamento.value = data.formaPagamento;
    intervaloDoacao.value = data.intervaloDoacao;

    linkEditar.href = urlEditar + `/${data.id}`;
}