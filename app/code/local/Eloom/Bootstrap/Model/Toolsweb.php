<?php

##eloom.licenca##

class Eloom_Bootstrap_Model_Toolsweb extends Mage_Core_Model_Abstract {

  const TIME_OUT = 60;

  public function getAddress($cep) {
    $cep = preg_replace('/[\s\W]+/', '', $cep);
    $data = array('cep' => $cep);

    $params = '';
    if (is_array($data)) {
      foreach ($data as $name => $value) {
        $params = $params . urlencode($name) . '=' . urlencode($value) . '&';
      }
    }
    $url = Mage::getModel('eloombootstrap/config')->getUrlRepVirtual();

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url . $params);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, self::TIME_OUT);
    curl_setopt($ch, CURLOPT_FAILONERROR, true);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    $httpResponse = Mage::getModel('eloombootstrap/httpResponse', array('httpCode' => $httpCode, 'message' => $response));

    if ($httpResponse->isError()) {
      Mage::log('Erro na chamada post: ' . curl_error($ch));
    }
    curl_close($ch);

    $xml = $httpResponse->getMessage();
    $xml = trim($xml);
    if ($xml == null) {
      return null;
    }
    $obj = new SimpleXMLElement($xml);

    if ($obj == null || $obj->dados->codigo != '0') {
      return null;
    }

    $endereco = Eloom_Bootstrap_Endereco::getInstance();
    $endereco->setEndereco((string) $obj->dados->tipoLogradouro . ' ' . $obj->dados->logradouro);
    $endereco->setBairro((string) $obj->dados->bairro);
    $endereco->setCep((string) $obj->dados->cep);
    $endereco->setCidade((string) $obj->dados->cidade);

    $region = Mage::getSingleton('directory/region')->loadByCode((string) $obj->dados->estado, 'BR');
    $endereco->setEstado($region->getId());

    return $endereco;
  }

}
