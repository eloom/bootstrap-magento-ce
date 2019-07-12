<?php

##eloom.licenca##

class Eloom_Bootstrap_Model_HttpResponse extends Mage_Core_Model_Abstract {

  const ERROR = 'error';
  const SUCCESS = 'success';

  private static $_httpErrors = array('400', '401', '402', '403', '404', '405', '406', '407', '408', '409', '410', '411', '412', '413', '414', '415', '416', '417');
  private $status = 'success';
  private $message;
  private $httpCode;

  public function __construct($data = array()) {
    if (in_array($data['httpCode'], self::$_httpErrors)) {
      $this->status = self::ERROR;
      $this->httpCode = $data['httpCode'];
    }
    $this->message = $data['message'];
  }

  public function isError() {
    return $this->status == self::ERROR;
  }

  public function isSuccess() {
    return $this->status == self::SUCCESS;
  }

  public function getHttpCode() {
    return $this->httpCode;
  }

  public function getStatus() {
    return $this->status;
  }

  public function getMessage() {
    return $this->message;
  }

  public function __toString() {
    $buffer = __CLASS__ . '[';
    $buffer = $buffer . 'status = ' . $this->status;
    $buffer = $buffer . ', message = ' . $this->message;
    $buffer = $buffer . ']';

    return $buffer;
  }

}
