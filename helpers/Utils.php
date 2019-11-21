<?php

namespace Helpers;

use Models\ModelBase;

Class Utils {

    /**
     * It fills a select-type input on app.php
     *
     * @return object
     *
     */
    public static function fillSelectList() {

        $modelBase = new ModelBase();

        $all_list = $modelBase -> getAll('conceptos');

        return $all_list;
    }

    /**
     * Unsets given SESSION variable
     *
     * @param string $name
     * @return void
     *
     */
    public static function deleteSession($name): void {

        unset($GLOBALS[@_SESSION][$name]);

    }

    /**
     * Checks for present user session
     *
     * @return void
     *
     */
    public static function authenticationExists() {
        isset($_SESSION['user']) ? header('Location: Concepto/presupuesto') : false;
    }

    /**
     * Checks whether User Agent is mobile
     *
     * @return void
     *
     */
     public static function isMobile() {
       return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i",
       $_SERVER["HTTP_USER_AGENT"]);
     }

}
