<?php
    require ('../Infraestructura/scoreInfo.php');
class scoreTBL
{

    private $leadingPl;
    private $wScore;
    private $bScore;
    function getMsg()
    {
        return $this->leadingPl;
    }
    public function __construct(){}

    public function init($leading, $wScore, $bScore)
    {
        $this->leadingPl = $leading;
        $this->wScore = $wScore;
        $this->bScore = $bScore;
    }
    function infoMarcador($board) {
        $scoreDAL = new scoreInfo();
        $rs = $scoreDAL->getScoreBoard($board);

        $ScoreTBL = new scoreTBL();
        $ScoreTBL->init($rs["leading"],$rs["wScore"],$rs["bScore"]);

        return $ScoreTBL;
    }
}