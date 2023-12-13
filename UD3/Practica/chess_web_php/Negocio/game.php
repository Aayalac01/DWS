<?php

require ('../Infraestructura/gameInfo.php');

class Game
{
    private $_name;

    private $_j1;

    private $_j2;

    private $_startDate;

    private $_startTime;

    private $_endTime;

    private $_endDate;

    private $_ID;

    private $_winner;

    private $_state;

    function init($name,$j1,$j2){
        $this->_name = $name;
        $this->_j1 = $j1;
        $this->_j2 = $j2;
    }

    function init2($ID,$name,$j1,$j2,$startDate,$endDate,$winner,$state)
    {
        $this->_ID = $ID;
        $this->_name = $name;
        $this->_j1 = $j1;
        $this->_j2 = $j2;
        $this->_startDate = $startDate;
        $this->_endDate = $endDate;
        $this->_winner = $winner;
        $this->_state = $state;
    }
    function init3($id,$title,$j1,$j2,$start,$state)
    {
        $this->_ID = $id;
        $this->_j1 = $j1;
        $this->_j2 = $j2;
        $this->_name = $title;
        $this->_startDate = $start;
        $this->_state = $state;
    }
    function getName()
    {
        return $this->_name;
    }

    function getWhite()
    {
        return $this->_j1;
    }

    function getBlack()
    {
        return $this->_j2;
    }

    function getId()
    {
        return $this->_ID;
    }

    function getStartDate()
    {
        return $this->getDate($this->_startDate);
    }

    function getStartTime()
    {
        return $this->getTime($this->_startDate);
    }

    function getEndDate()
    {
        return $this->getDate($this->_endDate);
    }

    function getEndTime()
    {
        return $this->getTime($this->_endDate);
    }
    function getWinner()
    {
        return $this->_winner;
    }

    function getState()
    {
        return $this->_state;
    }

    function getDate($date)
    {
        return substr($date,0,10);
    }

    function getTime($time)
    {
        return substr($time,11);
    }
    function insert()
    {
        $game = new GameInfo();
        $game->insert($this->_name,$this->_j1,$this->_j2);
    }

    function getGame($orden,$estado)
    {
        $gameDAL = new GameInfo();
        $rs = $gameDAL->gInfo($orden,$estado);
        $listGames = array();

        foreach ($rs as $game) {
            $gameRL = new Game();
            $gameRL->init2($game['ID'],$game['title'],$game['white'],$game['black'],
                $game['startDate'],$game['endDate'],$game['winner'],$game['state']);
            array_push($listGames, $gameRL);
        }
        return $listGames;
    }

    function getGInfo($game)
    {
        $gameDAL = new GameInfo();
        $rs = $gameDAL->gInfo2($game);
        $listGames = array();

        foreach ($rs as $game) {
            $gameRL = new Game();
            $gameRL->init3($game['ID'],$game['title'],$game['white'],$game['black'],$game['startDate'],$game['state']);
            array_push($listGames,$gameRL);
        }
        return $listGames;
    }
    
}
