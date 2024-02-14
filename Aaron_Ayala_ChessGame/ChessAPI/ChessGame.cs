

namespace ChessAPI
{
    internal class ChessGame
    {
        private Board board;

        private ScoreTbl scoreTbl;

        public ChessGame()
        {
            board = new Board();

            scoreTbl = new ScoreTbl();
        }

        public void DrawBoard()
        {
            this.board.Draw();
        }

        public void TryToMove()
        {

            Movement movement = new(new BoardPosition(1, 2), new BoardPosition(3, 5));

            this.board.Move(movement);
        }

        public string GetBoardAsStringToChessWeb()
        {
            return board.GetBoardState();
        }



        public void playerScore()
        {
            this.scoreTbl.WPMaterialValue = board.getWhiteScore();
            this.scoreTbl.BPMaterialValue = board.getBlackScore();
        }

        public void tableScore()
        {
            this.scoreTbl.DistanceMsg = scoreTbl.getScoreMsg(this.scoreTbl.WPMaterialValue, this.scoreTbl.BPMaterialValue);
        }

        public string scoreDistance()
        {
            return this.scoreTbl.DistanceMsg;
        }
    }
}
