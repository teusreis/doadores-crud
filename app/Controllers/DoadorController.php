<?php

namespace App\Controllers;

use App\models\Doador;
use App\Library\Controller;

class DoadorController extends Controller
{
    private Doador $doador;

    public function __construct()
    {
        $this->doador = new Doador();
        parent::__construct();
    }

    public function index(): void
    {
        $doadores = $this->doador->findAll();

        echo $this->templates->render("index", [
            'doadores' => $doadores,
        ]);
    }

    public function show(array $data): void
    {
        $doador = $this->doador->findById($data["id"]);
        if (is_null($doador)) {
            http_response_code(404);
            $response = [
                "status" => "error",
                "body" => "Nenhum doador entrado com o id"
            ];
        } else {
            $response = [
                "status" => "success",
                "body" => $doador
            ];
        }

        echo json_encode($response);
    }

    public function create(): void
    {
        if (isset($_POST['nome']) && isset($_POST['cpf'])) {

            $this->doador
                ->setNome($_POST["nome"])
                ->setCpf($_POST["cpf"])
                ->setEmail($_POST["email"])
                ->setEndereco($_POST["endereco"])
                ->setTelefone($_POST["telefone"])
                ->setNasc($_POST["nasc"])
                ->setIntervaloDoacao($_POST["intervaloDoacao"])
                ->setValorDoacao($_POST["valorDoacao"])
                ->setFormaPagamento($_POST["formaPagamento"]);

            if ($this->doador->create()) {
                $this->redirect("/");
            };
        }

        echo $this->templates->render("create", [
            "errors" => $this->doador->getErrors()
        ]);
    }

    public function edit(array $data): void
    {
        if (isset($_POST["nome"]) && isset($_POST["nome"])) {

            $this->doador
                ->setNome($_POST["nome"])
                ->setCpf($_POST["cpf"])
                ->setEmail($_POST["email"])
                ->setEndereco($_POST["endereco"])
                ->setTelefone($_POST["telefone"])
                ->setNasc($_POST["nasc"])
                ->setIntervaloDoacao($_POST["intervaloDoacao"])
                ->setValorDoacao($_POST["valorDoacao"])
                ->setFormaPagamento($_POST["formaPagamento"]);

            if ($this->doador->update($data["id"])) {
                $this->redirect("/");
            };
        }
        $doador = $this->doador->findById($data["id"]);
        echo $this->templates->render("edit", [
            "doador" => $doador
        ]);
    }

    public function delete(array $data): void
    {
        if ($this->doador->delete($data["id"])) {
            $response = [
                "status" => "success",
                "body" => true
            ];
        } else {
            http_response_code(400);
            $response = [
                "status" => "success",
                "body" => false
            ];
        }

        echo json_encode($response);
    }

    public function emailExist(array $data): void
    {
        $response = [
            "status" => "success",
            "body" => $this->doador->emailExist($data["email"], $data["id"] ?? null)
        ];

        echo json_encode($response);
    }

    public function cpfExist(array $data): void
    {
        $response = [
            "status" => "success",
            "body" => $this->doador->cpfExist($data["cpf"], $data["id"] ?? null)
        ];

        echo json_encode($response);
    }
}
