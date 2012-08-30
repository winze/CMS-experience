<?php

namespace Winze\PageBuilderBundle\Service;

/**
 * Description of String
 *
 * @author vincent
 */
class String {
    /**
     * Mot de passe contenant uniquement des caractères alpha
     */

    const PWD_TYPE_TEXT = 1;
    /**
     * Mot de passe Alpha numérique
     */
    const PWD_TYPE_TEXT_NUM = 2;
    /**
     * Mot de passe Apla numérique avec majuscule 
     */
    const PWD_TYPE_TEXT_NUM_MAJ = 3;
    /**
     * Mot de passe Alpha numérique avec majuscule et caractères spéciaux 
     */
    const PWD_TYPE_TEXT_NUM_MAJ_CS = 6;

    private static $tabAlphaNoMaj = array(
        'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i'
        , 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's'
        , 't', 'u', 'v', 'w', 'x', 'y', 'z'
    );
    private static $tabAlphaMaj = array(
        'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I'
        , 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S'
        , 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'
    );
    private static $tabNum = array(
        '1', '2', '3', '4', '5', '6', '7', '8', '9'
    );
    private static $tabCS = array(
        '!', '&', '(', ')'
    );

    /**
     * Fonction permettant de retirer l'article d'une string
     * @param string $string Chaîne de caractêre à traiter
     * @return string 
     */
    public static function traiteTri($string) {
        $search = array('le ', 'la ', 'les ', "l'", "Le ", "Les ", "La ", "L'", "LE ", "LES ", "LA ");
        $replace = '';
        $begin = substr($string, 0, 4);
        $end = substr($string, 4);
        return str_replace($search, $replace, $begin) . $end;
    }

    /**
     * Fonction permettant de génére un mots de passe
     * @param type $type
     * @param type $length
     * @return string 
     */
    public static function genPassword($type, $length = 8) {
        $string = '';
        $tabCar = array();
        switch ($type) {
            case self::PWD_TYPE_TEXT:
                $tabCar = array_merge($tabCar, self::$tabAlphaNoMaj);
                break;
            case self::PWD_TYPE_TEXT_NUM:
                $tabCar = array_merge($tabCar, self::$tabAlphaNoMaj);
                $tabCar = array_merge($tabCar, self::$tabNum);
                break;
            case self::PWD_TYPE_TEXT_NUM_MAJ:
                $tabCar = array_merge($tabCar, self::$tabAlphaNoMaj);
                $tabCar = array_merge($tabCar, self::$tabAlphaMaj);
                $tabCar = array_merge($tabCar, self::$tabNum);
                break;
            case self::PWD_TYPE_TEXT_NUM_MAJ_CS:
                $tabCar = array_merge($tabCar, self::$tabAlphaNoMaj);
                $tabCar = array_merge($tabCar, self::$tabAlphaMaj);
                $tabCar = array_merge($tabCar, self::$tabNum);
                $tabCar = array_merge($tabCar, self::$tabCS);
                break;
        }
        $isOk = 0;
        while ($isOk < 1000000) {
            $isOk++;
            $string = self::makeString($tabCar, $length);
            if ($string === false) {
                return false;
            }
            /*
             * On contrôle que le mot de passe a bien la complexité demandé
             */
            $num = false;
            $alpha = false;
            $cs = false;
            $alphaMaj = false;

            /*
             * on vient vérifier que tous les critères sont présent
             */
            for ($i = 0; $i < strlen($string); $i++) {
                if (strpos(implode('', self::$tabAlphaNoMaj), $string[$i]) !== false) {
                    $alpha = true;
                }
                if (strpos(implode('', self::$tabNum), $string[$i]) !== false) {
                    $num = true;
                }
                if (strpos(implode('', self::$tabCS), $string[$i]) !== false) {
                    $cs = true;
                }
                if (strpos(implode('', self::$tabAlphaMaj), $string[$i]) !== false) {
                    $alphaMaj = true;
                }
            }

            switch ($type) {
                case self::PWD_TYPE_TEXT:
                    return $string;
                case self::PWD_TYPE_TEXT_NUM:
                    if ($alpha and $num) {
                        return $string;
                    }
                    break;
                case self::PWD_TYPE_TEXT_NUM_MAJ:
                    if ($alpha and $num and $alphaMaj) {
                        return $string;
                    }
                    break;
                case self::PWD_TYPE_TEXT_NUM_MAJ_CS:
                    if ($alpha and $num and $alphaMaj and $cs) {
                        return $string;
                    }
                    break;
            }
        }
    }

    /**
     * Retourne un string en fonction d'un tableau et d'une taille de string
     * @param array $tab
     * @param int $length
     * @return string/boolean Retourne la chaine désiré
     */
    public static function makeString($tab, $length) {
        $string = '';
        if (!is_array($tab) or count($tab) == 0) {
            return false;
        }

        while (strlen($string) < $length) {
            $string .= $tab[rand(0, count($tab) - 1)];
        }

        return $string;
    }

    public static function slug($text) {
        // Remove all accents.
        $convertedCharacters = array(
            'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A',
            'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a',
            'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ø' => 'O',
            'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ø' => 'o',
            'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E',
            'é' => 'e', 'è' => 'e', 'ê' => 'e', 'ë' => 'e',
            'Ç' => 'C', 'ç' => 'c',
            'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I',
            'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i',
            'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U',
            'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u',
            'ÿ' => 'y',
            'Ñ' => 'N', 'ñ' => 'n', '+' => '-', "'"=>'-'
        );

        $text = strtr($text, $convertedCharacters);

        return $text;
    }

    public static function sluggify($text) {
        return self::slug(urlencode(self::slug($text)));
    }

}