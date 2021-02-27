<?php

namespace App\models;

use App\Library\Model;

class Doador extends Model
{
    private string $cpf;
    private string $nome;
    private string $email;
    private string $endereco;
    private string $telefone;
    private string $nasc;
    private string $intervaloDoacao;
    private float $valorDoacao;
    private string $formaPagamento;


    public function create(): bool
    {
        if ($this->hasErrors()) return false;

        $sql = "INSERT INTO doadores (cpf, nome, email, endereco, telefone, nasc, intervaloDoacao, valorDoacao, formaPagamento) 
            VALUES (:cpf, :nome, :email, :endereco, :telefone, :nasc, :intervaloDoacao, :valorDoacao, :formaPagamento)";

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(":cpf", $this->cpf);
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":endereco", $this->endereco);
        $stmt->bindParam(":telefone", $this->telefone);
        $stmt->bindParam(":nasc", $this->nasc);
        $stmt->bindParam(":intervaloDoacao", $this->intervaloDoacao);
        $stmt->bindParam(":valorDoacao", $this->valorDoacao);
        $stmt->bindParam(":formaPagamento", $this->formaPagamento);

        return $stmt->execute();
    }

    public function update(int $id): bool
    {
        $sql = "UPDATE doadores
                    SET cpf = :cpf,  
                    nome = :nome, 
                    email = :email, 
                    endereco = :endereco, 
                    telefone = :telefone, 
                    nasc = :nasc, 
                    intervaloDoacao = :intervaloDoacao, 
                    valorDoacao = :valorDoacao, 
                    formaPagamento = :formaPagamento
                WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(":cpf", $this->cpf);
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":endereco", $this->endereco);
        $stmt->bindParam(":telefone", $this->telefone);
        $stmt->bindParam(":nasc", $this->nasc);
        $stmt->bindParam(":intervaloDoacao", $this->intervaloDoacao);
        $stmt->bindParam(":valorDoacao", $this->valorDoacao);
        $stmt->bindParam(":formaPagamento", $this->formaPagamento);

        $stmt->bindParam(":id", $id);

        return $stmt->execute();
    }

    public function delete(int $id): bool
    {
        $sql = "DELETE FROM doadores
                WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([":id" => $id]);
    }

    public function findAll()
    {
        $sql = "SELECT * FROM doadores ORDER BY nome";

        $stmt = $this->pdo->query($sql);

        return $stmt->fetchAll();
    }

    public function findById($id)
    {
        $sql = "SELECT * FROM doadores
                WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([":id" => $id]);
        return $stmt->fetch();
    }

    public function cpfExist($cpf, $ignore = null): bool
    {
        $sql = "SELECT id FROM doadores
                WHERE cpf = :cpf";

        $params = [
            "cpf" => $cpf
        ];

        if ($ignore != "null") {
            $sql .= " AND id NOT IN (:ignore) LIMIT 1";
            $params["ignore"] = $ignore;
        }

        $stmt = $this->pdo->prepare($sql);

        if ($stmt->execute($params)) {
            return $stmt->rowCount() > 0;
        }
    }

    public function emailExist($email, $ignore = null): bool
    {
        $sql = "SELECT id FROM doadores
                WHERE email = :email";

        $params = [
            "email" => $email
        ];

        if ($ignore != "null") {
            $sql .= " AND id NOT IN (:ignore) LIMIT 1";
            $params["ignore"] = $ignore;
        } else {
            $sql .= " LIMIT 1";
        }

        $stmt = $this->pdo->prepare($sql);

        if ($stmt->execute($params)) {
            return $stmt->rowCount() > 0;
        }
    }

    /**
     * Get the value of nome
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */
    public function setNome(string $nome)
    {
        if (empty($nome)) {
            $this->error["nome"] = "Nome é obrigatório!";
        } else if (strlen($nome) > 50) {
            $this->error["nome"] = "Nome não pode ser maior do que 50 caracteres!";
        }

        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of cpf
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * Set the value of cpf
     *
     * @return  self
     */
    public function setCpf($cpf)
    {
        if (empty($cpf)) {
            $this->error["cpf"] = "cpf é obrigatório!";
        }

        $this->cpf = $cpf;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail(string $email)
    {
        if (empty($email)) {
            $this->error["email"] = "email é obrigatório!";
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->error["email"] = "Esse email não é um email valido!";
        }

        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of endereco
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * Set the value of endereco
     *
     * @return  self
     */
    public function setEndereco($endereco)
    {
        if (empty($endereco)) {
            $this->errors["endereco"] = "Endereço é obrigatório!";
        }

        $this->endereco = $endereco;

        return $this;
    }

    /**
     * Get the value of telefone
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * Set the value of telefone
     *
     * @return  self
     */
    public function setTelefone($telefone)
    {
        if (empty($telefone)) {
            $this->error["telefone"] = "telefone é obrigatório!";
        }

        $this->telefone = $telefone;

        return $this;
    }

    /**
     * Get the value of nasc
     */
    public function getNasc()
    {
        return $this->nasc;
    }

    /**
     * Set the value of nasc
     *
     * @return  self
     */
    public function setNasc($nasc)
    {
        if (empty($nasc)) {
            $this->error["nasc"] = "Data de nacimento é obrigatório!";
        }

        $this->nasc = $nasc;

        return $this;
    }

    /**
     * Get the value of intervaloDoacao
     */
    public function getIntervaloDoacao()
    {
        return $this->intervaloDoacao;
    }

    /**
     * Set the value of intervaloDoacao
     *
     * @return  self
     */
    public function setIntervaloDoacao(string $intervaloDoacao)
    {
        if (empty($intervaloDoacao)) {
            $this->error["intervaloDoacao"] = "Intervalo da doação é obrigatório!";
        }

        $this->intervaloDoacao = $intervaloDoacao;

        return $this;
    }

    /**
     * Get the value of valorDoacao
     */
    public function getValorDoacao()
    {
        return $this->valorDoacao;
    }

    /**
     * Set the value of valorDoacao
     *
     * @return  self
     */
    public function setValorDoacao(float $valorDoacao)
    {
        if (empty($valorDoacao)) {
            $this->error["valorDoacao"] = "Valor da doaação é obrigatório!";
        }

        $this->valorDoacao = $valorDoacao;

        return $this;
    }

    /**
     * Get the value of formaPagamento
     */
    public function getFormaPagamento()
    {
        return $this->formaPagamento;
    }

    /**
     * Set the value of formaPagamento
     *
     * @return  self
     */
    public function setFormaPagamento(string $formaPagamento)
    {
        if (empty($formaPagamento)) {
            $this->error["formaPagamento"] = "Forma de pagamento é obrigatoria!";
        }

        $this->formaPagamento = $formaPagamento;

        return $this;
    }
}
