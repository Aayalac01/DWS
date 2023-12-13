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
}