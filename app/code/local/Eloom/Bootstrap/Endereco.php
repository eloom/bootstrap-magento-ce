<?php

##eloom.licenca##

class Eloom_Bootstrap_Endereco {

  public $endereco;
  public $bairro;
  public $cep;
  public $cidade;
  public $estado;

  public static function getInstance() {
    return new Eloom_Bootstrap_Endereco();
  }

  public function getEndereco() {
    return $this->endereco;
  }

  public function setEndereco($endereco) {
    $this->endereco = $endereco;
  }

  public function getBairro() {
    return $this->bairro;
  }

  public function setBairro($bairro) {
    $this->bairro = $bairro;
  }

  public function getCep() {
    return $this->cep;
  }

  public function setCep($cep) {
    $this->cep = $cep;
  }

  public function getCidade() {
    return $this->cidade;
  }

  public function setCidade($cidade) {
    $this->cidade = $cidade;
  }

  public function getEstado() {
    return $this->estado;
  }

  public function setEstado($estado) {
    $this->estado = $estado;
  }

}
