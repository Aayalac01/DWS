<?php
require("../Infraestructura/movementInfo.php");
class Movement
{
    private bool $status;

    private string $board;

    function __construct()
    {

    }
    function getBoard()
    {
        return $this->board;
    }

    function getStatus()
    {
        return $this->status;
    }
    function init($status,$board)
    {
        $this->status = $status;
        $this->board = $board;
    }

    function movePieceValidation($board,$fromRow,$fromCol,$toRow,$toCol)
    {
        $movementDAL = new movementInfo();
        $rs = $movementDAL->getMarcador($board,$fromRow,$fromCol,$toRow,$toCol);

        $movement = new Movement();
        $movement->init($rs["status"],$rs["board"]);

        return $movement;
    }
}