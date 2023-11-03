using ChessAPI.Model;

namespace ChessAPI
{
    public class Knight : Piece
    {
        public Knight(ColorEnum color) : base(color)
        {

        }

        public override String GetSt(){
            String piece = this.GetType().Name.Substring(1,1).ToUpper();
            String color = this._color.ToString().Substring(0,1).ToUpper();
            if (color == "B")
            {
                piece = piece.ToLower();
                return piece;
            }
            return piece+color;
        }
        public override int GetScore()
        {
            return Config.KnightPieceValue;
        }
    }
}