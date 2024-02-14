using ChessAPI.Model;

namespace ChessAPI
{
    public class Bishop : Piece
    {
        public Bishop(ColorEnum color) : base(color)
        {

        }

        public override int GetScore()
        {
            return Config.BishopPieceValue;
        }
    }
}