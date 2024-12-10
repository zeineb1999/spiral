<?php

namespace App\Helpers;

class NumberToWordsHelper
{
    // Définitions des tableaux comme constantes
    private static $moins20 = ["", "un", "deux", "trois", "quatre", "cinq", "six", "sept", "huit", "neuf", "dix", "onze", "douze", "treize", "quatorze", "quinze", "seize", "dix-sept", "dix-huit", "dix-neuf"];
    private static $dizaine = ["vingt", "trente", "quarante", "cinquante", "soixante", "soixante-dix", "quatre-vingt", "quatre-vingt-dix"];
    private static $milliers = ["cent", "mille", "million", "milliard", "billion", "billiard"];
    private static $devise = "dinar algérien";
    private static $devises = "dinars algériens";

    public static function chiffreEnLettre($nb)
    {
        $txt = ""; // Initialisation du texte

        // Traitement des cas spécifiques
        if ($nb < 0) {
            $txt = "moins ";
            $nb = abs($nb);
        }

        if ($nb == 0) {
            return "Zéro " . self::$devises . ".";
        }

        if ($nb > 1e15) {
            return "Nombre trop grand!";
        }

        $partieEntiere = (int) $nb;
        $partieFract = round(($nb - $partieEntiere) * 100);

        // Traitement de la partie entière
        if ($partieEntiere == 1) {
            $txt .= "un " . self::$devise;
        } else {
            $m = 1e15; // Maximal pour la décomposition
            for ($i = 5; $i > 0; $i--) {
                $decomp = (int)($partieEntiere / $m);
                $partieEntiere -= $decomp * $m;
                $m /= 1000;

                if ($decomp == 1) {
                    if ($i > 1) $txt .= "un ";
                    $txt .= self::$milliers[$i] . " ";
                } elseif ($decomp > 1) {
                    $txt .= self::troisChiffres($decomp);
                    $txt .= " " . self::$milliers[$i] . " ";
                }
            }
            $txt .= self::troisChiffres($partieEntiere);
            $txt .= " " . self::$devises;
        }

        // Traitement de la partie fractionnaire
        if ($partieFract > 0) {
            $txt .= " et ";
            if ($partieFract == 1) {
                $txt .= "un centime";
            } else {
                $txt .= self::deuxChiffres($partieFract) . " centimes";
            }
        }

        return ucfirst(trim($txt)) . ".";
    }

    private static function deuxChiffres($nb)
    {
        $u = $nb % 10;
        $d = (int)($nb / 10);

        if ($nb < 20) {
            return self::$moins20[$nb];
        }

        $result = self::$dizaine[$d - 2];
        if ($u > 0) {
            $result .= "-" . self::$moins20[$u];
        }

        return $result;
    }

    private static function troisChiffres($nb)
    {
        $c = (int)($nb / 100);
        $d = $nb % 100;

        $result = "";
        if ($c > 0) {
            if ($c > 1) {
                $result .= self::$moins20[$c] . " ";
            }
            $result .= self::$milliers[0];
        }

        if ($d > 0) {
            $result .= " " . self::deuxChiffres($d);
        }

        return trim($result);
    }
}
