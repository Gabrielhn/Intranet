<?php


class Usuario implements IUsuario
{
    private $email;
    private $senha;
    private $nome;
    private $setor;
    private $cargo;
    private $ramal;
    private $im;
    private $local;
    private $admissao;

    // EMAIL
    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    // SENHA
    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
        return $this;
    }

    // NOME
    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    // SETOR
    public function getSetor()
    {
        return $this->setor;
    }

    public function setSetor($setor)
    {
        $this->setor = $setor;
        return $this;
    }

    // CARGO
    public function getCargo()
    {
        return $this->cargo;
    }

    public function setCargo($cargo)
    {
        $this->cargo = $cargo;
        return $this;
    }

    // RAMAL
    public function getRamal()
    {
        return $this->ramal;
    }

    public function setRamal($ramal)
    {
        $this->ramal = $ramal;
        return $this;
    }

    // IM
    public function getIm()
    {
        return $this->im;
    }

    public function setIm($im)
    {
        $this->im = $im;
        return $this;
    }

    // LOCAL
    public function getLocal()
    {
        return $this->local;
    }

    public function setLocal($local)
    {
        $this->local = $local;
        return $this;
    }

    // ADMISSAO
    public function getAdmissao()
    {
        return $this->admissao;
    }

    public function setAdmissao($admissao)
    {
        $this->admissao = $admissao;
        return $this;
    }
}