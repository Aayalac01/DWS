<?php

require ('../Infraestructura/playerInfo.php');
class Player
{
    private $_ID;

    private $_name;

    function init($id,$name)
    {
        $this->_ID = $id;
        $this->_name = $name;
    }

    function getId()
    {
        return $this->_ID;
    }

    function getName()
    {
        return $this->_name;
    }

    function getPlayer()
    {
        $playerDAL = new PlayerInfo();
        $rs = $playerDAL->data();
        $listPlayers = array();

        foreach ($rs as $player) {
            $playerRL = new Player();
            $playerRL->init($player['ID'],$player['name']);
            array_push($listPlayers, $playerRL);
        }

        return $listPlayers;
    }

}