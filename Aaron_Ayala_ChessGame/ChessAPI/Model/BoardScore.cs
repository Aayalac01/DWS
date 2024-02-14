
namespace ChessAPI.Model
{
    public class BoardScore
    {
        private int _wScore;
        
        private int _bScore;
        private string _leading;

        public BoardScore(Piece[,] tablero)
        {
            this._wScore = BoardScore.getWhiteScore(tablero);
            this._bScore = BoardScore.getBlackScore(tablero);
            this._leading = BoardScore.getScoreMsg(_wScore, _bScore);
        }

        public int WScore
        {
            get{ return _wScore;}
            set{
                _wScore = value;
            }
        }

        public int BScore
        {
            get{ return _bScore;}
            set{
                _bScore = value;
            }
        }

        public string Leading
        {
            get{ return _leading;}
            set{
                _leading = value;
            }
        }
        public static int getWhiteScore(Piece[,] board)
        {
            int wScore = 0;

            for (int i = 0; i < 8; i++)
            {
                for (int f = 0; f < 8; f++)
                {
                    Piece piece = board[i, f];

                    if (piece != null)
                    {
                        if (piece.GetCode().Substring(3, 2) == "WH")
                        {
                            wScore += piece.GetScore();
                        }
                    }

                }
            }

            return wScore;
        }

        public static int getBlackScore(Piece[,] board)
        {
            int bScore = 0;

            for (int i = 0; i < 8; i++)
            {
                for (int f = 0; f < 8; f++)
                {
                    Piece piece = board[i, f];
                    if (piece != null)
                    {
                        if (piece.GetCode().Substring(3, 2) == "BL")
                        {
                            bScore += piece.GetScore();
                        }
                    }

                }
            }

            return bScore;
        }

        public static string getScoreMsg(int wScore, int bScore)
        {
            string scoreMsg = string.Empty;

            if (wScore > bScore)
            {
                if ((wScore - bScore) > 1)
                {
                    scoreMsg = "Las blancas van ganando por " + (wScore - bScore) + " puntos.";
                }
                else
                {
                    scoreMsg = "Las blancas van ganando por " + (wScore - bScore) + " punto.";
                }
            }
            else if (bScore > wScore)
            {
                if ((bScore - wScore) > 1)
                {
                    scoreMsg = "Las negras van ganando por " + (bScore - wScore) + " puntos.";
                }
                else
                {
                    scoreMsg = "Las negras van ganando por " + (bScore - wScore) + " punto.";
                }
            }
            else
            {
                scoreMsg = "Empate";
            }

            return scoreMsg;
        }
    }
}