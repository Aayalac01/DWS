namespace ChessAPI
{
    public class ScoreTbl{

        private int _WhitePiecesMaterialValue;

        private int _BlackPiecesMaterialValue;

        private string _DistanceMessage;

        public ScoreTbl()
        {
            _WhitePiecesMaterialValue = 0;
            _BlackPiecesMaterialValue = 0;
            _DistanceMessage = string.Empty;
        }

        public int WPMaterialValue
        {
            get{return _WhitePiecesMaterialValue;}
            set
            {
                _WhitePiecesMaterialValue = value;
            }
        }

        public int BPMaterialValue
        {
            get{return _BlackPiecesMaterialValue;}
            set
            {
                _BlackPiecesMaterialValue = value;
            }
        }

        public string DistanceMsg
        {
            get{return _DistanceMessage;}
            set{
                _DistanceMessage = value;
            }
        }

        public string getScoreMsg(int wScore, int bScore)
        {
            string scoreMsg = string.Empty;

            if (wScore > bScore)
            {
                if ((wScore - bScore) > 1)
                {
                    scoreMsg = "Las blancas van ganando por "+(wScore - bScore)+" puntos.";
                }
                else
                {
                    scoreMsg = "Las blancas van ganando por "+(wScore - bScore)+" punto.";
                }
            }
            else if (bScore > wScore)
            {
                if ((bScore - wScore) > 1)
                {
                    scoreMsg = "Las negras van ganando por "+(bScore - wScore)+" puntos.";
                }
                else
                {
                    scoreMsg = "Las negras van ganando por "+(bScore - wScore)+" punto.";
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
    