<?php


class movementInfo{
    public function __construct(){}

    public function getMarcador($board,$fromRow,$fromCol,$toRow,$toCol){
        $url = "https://localhost:7246/MovementValidation?board=".$board."&fromRow=".$fromRow."&fromColumn=".$fromCol."&toRow=".$toRow."&toColumn=".$toCol;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,4);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $json = curl_exec($ch);
        //var_dump($response);
        if (!$json)
        {
	        echo curl_error($ch);
        }
        curl_close($ch);
        $x = json_decode($json,true);

        return $x;
    }
}



