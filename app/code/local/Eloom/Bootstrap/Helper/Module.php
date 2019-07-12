<?php

##eloom.licenca##

final class Eloom_Bootstrap_Helper_Module extends Mage_Core_Helper_Abstract {

    /**
     * Verifica se o módulo Correios SRO existe.
     * 
     * @return type
     */
    public static function isCorreiosSroExists() {
        error_reporting(0);
        $exists = class_exists('Eloom_CorreiosSro_Helper_Data');
        error_reporting(1);

        return $exists;
    }

    /**
     * Verifica se o módulo Correios existe.
     * 
     * @return type
     */
    public static function isCorreiosExists() {
        error_reporting(0);
        $exists = class_exists('Eloom_Correios_Helper_Data');
        error_reporting(1);

        return $exists;
    }

    /**
     * Verifica se o módulo Store existe.
     *
     * @return type
     */
    public static function isStoreExists() {
        error_reporting(0);
        $exists = class_exists('Eloom_Store_Helper_Data');
        error_reporting(1);

        return $exists;
    }

}
