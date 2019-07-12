<?php

##eloom.licenca##

class Eloom_Bootstrap_Helper_Data extends Mage_Core_Helper_Abstract {

    /**
     * Verifica se o número de telefone é válido e retorno apenas os números.
     * 
     * @param type $mobile
     * @return boolean
     */
    public function isValidMobilePhone($mobile) {
        $phone = preg_replace("/[^0-9]/", '', $mobile);

        if (strlen($phone) == 10 || strlen($phone) == 11) {
            return $phone;
        }
        return false;
    }

    /**
     * Verifica se o número de telefone é válido e retorno apenas os números.
     * 
     * @param type $phone
     * @return boolean
     */
    public function isValidPhone($phone) {
        $phone = preg_replace("/[^0-9]/", '', $phone);

        if (strlen($phone) == 10) {
            return $phone;
        }
        return false;
    }

    /**
     * Verifica se determinada valor é <strong>null</strong> ou <strong>vazio</strong>.
     * 
     * @param type $str
     * @return type
     */
    public static function isEmpty($str) {
        if ($str == null) {
            return true;
        }
        if (trim($str) == '') {
            return true;
        }
        return false;
    }

    /**
     * Retorna apenas os números.
     * 
     */
    public function getOnlyNumbers($entry) {
        return preg_replace('/\D/', '', $entry);
    }

}
