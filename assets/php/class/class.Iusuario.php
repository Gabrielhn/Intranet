<?php


interface IUsuario
{
    public function setEmail($email);
    public function getSenha();
    public function setSenha($senha);
    public function getNome();
    public function setNome($nome);
    public function getSetor();
    public function setSetor($setor);
    public function getCargo();
    public function setCargo($cargo);
    public function getRamal();
    public function setRamal($ramal);
    public function getIm();
    public function setIm($im);
    public function getLocal();
    public function setLocal($local);
    public function getAdmissao();
    public function setAdmissao($admissao);


}