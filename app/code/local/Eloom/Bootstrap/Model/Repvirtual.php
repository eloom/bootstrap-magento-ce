<?php

##eloom.licenca##

class Eloom_Bootstrap_Model_Repvirtual extends Mage_Core_Model_Abstract {

  const TIME_OUT = 60;

  protected function _construct() {
    
  }

  public function busca_cep($cep) {
    $resultado = file_get_contents('http://republicavirtual.com.br/web_cep.php?cep=' . urlencode($cep) . '&formato=query_string');
    if (!$resultado) {
      return null;
    }
    parse_str($resultado, $retorno);
    return $retorno;
  }

  public function getAddress($cep) {
    $cep = preg_replace('/[\s\W]+/', '', $cep);
    $busca = $this->busca_cep($cep);
    $endereco = Eloom_Bootstrap_Endereco::getInstance();
    $endereco->setEndereco((string) utf8_encode($busca['tipo_logradouro']) . ' ' . utf8_encode($busca['logradouro']));
    $endereco->setBairro((string) utf8_encode($busca['bairro']));
    $endereco->setCep((string) $cep);
    $endereco->setCidade((string) utf8_encode($busca['cidade']));

    $region = Mage::getSingleton('directory/region')->loadByCode((string) $busca['uf'], 'BR');
    $endereco->setEstado($region->getId());

    return $endereco;
  }

}
