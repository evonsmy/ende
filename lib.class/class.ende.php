<?php
// namespace ende;

/*
#############################################

ende Encryption Type
--------------------
*** Version     : v1.0.1-ende
*** Code By     : zeo
*** Date        : 16/01/2021 11:32PM
*** Team        : evonsmy

#############################################
*/

abstract class Rules{
    abstract public function encode($word,$key);
    abstract public function decode($word,$key);
}

class ENDE extends Rules{

    # Constant
    private const BASEKEY = "ENDE";

    # Methods
    /*
    *** None Use Function 
    */

    private function generateKey($key=""){
        $key .= self::BASEKEY;
        $newKey = "";
        for ( $char=0; $char < strlen($key); $char ++ ) {
            $byte = substr($key, $char);
            $newKey .= ord($byte);
        }
        return $newKey;
    }

    private function finalKey($key=""){
        $sumKey = 0;
        for ( $at=0; $at < strlen($key); $at ++ ) {
            $sumKey += $key[$at];
        }
        return $sumKey;
    }


    /*
    Use Function
    ------------
    *** encode(word,key)
    *** decode(word,key)
    */

    public function encode($word="",$key=""){
        $keygen = $this->finalKey($this->generateKey($key));
        $finalText = "";
        for ( $char=0; $char < strlen($word); $char ++ ) {
            $byte = substr($word, $char);
            $C = ord($byte);
            $en = $C + $keygen;
            $finalText .= $en . " ";
        }
        return $finalText;
    }

    public function decode($word="",$key=""){
        $keygen = $this->finalKey($this->generateKey($key));
        $words = explode(" ",$word);
        $finalText = "";
        for ( $char=0; $char < count($words)-1; $char ++ ) {
            $C = $words[$char];
            $en = $C - $keygen;
            $finalText .= chr($en);
        }
        return $finalText;
    }
}