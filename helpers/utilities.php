<?php
/**
 * Created by PhpStorm.
 * User: Festus
 * Date: 18/09/2016
 * Time: 20.04
 */

trait Utility{

    /**
     * @param $string
     */
    public static function manageSlashes(&$string)
    {
        if (get_magic_quotes_gpc())
            $string = stripslashes($string);
    }


    /**
     * @param $string
     */
    public static function removeSpaces(&$string)
    {
         $string = trim($string);
    }

    /**
     * @param $date_to_convert
     * @return string
     * 2016-09-16
     */
    private function convertDateUtil($date_to_convert)
    {

        $date = explode('/', $date_to_convert);

        return  $date[2].'-'.$date[1].'-'.$date[0];

    }

}