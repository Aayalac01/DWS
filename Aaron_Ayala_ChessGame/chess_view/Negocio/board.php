<?php

require ('../Infraestructura/boardInfo.php');

class Board
{
    private $_ID;

    private $_IDGame;

    private $_board;

    function init($move,$game,$board)
    {
        $this->_ID = $move;
        $this->_IDGame = $game;
        $this->_board = $board;
    }

    function getBoard()
    {
        return $this->_board;
    }
    function insertSartingBoard($game)
    {
        $defaultStartBoard = "RW,NW,BW,QW,KW,BW,NW,RW,PW,PW,PW,PW,PW,PW,PW,PW,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,p,p,p,p,p,p,p,p,r,n,b,q,k,b,n,r";
        $insertDefault = new BoardInfo();
        $insertDefault->insertStartingBoard($game,$defaultStartBoard);
    }

    function insertNewBoardState($game,$state)
    {
        $newBoardState = new BoardInfo();
        $newBoardState->insertBoardState($game,$state);
    }
    function getBoardStat($game)
    {
        $boardDAL = new BoardInfo();
        $rs = $boardDAL->boardStates($game);
        $listMoves = array();

        foreach ($rs as $board) {
            $boardRL = new Board();
            $boardRL->init($board['ID'],$board['IDGame'],$board['board']);
            array_push($listMoves, $boardRL);
        }

        return $listMoves;
    }

    function getCurBoardState($game)
    {
        $boardDAL = new BoardInfo();
        $rs = $boardDAL->getCurBoardState( $game );

        return $rs;
    }
}