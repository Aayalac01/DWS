using ChessAPI.Model;

namespace ChessAPI
{
    public class King : Piece
    {
        public King(ColorEnum color) : base(color)
        {

        }

        public override int GetScore()
        {
            return Config.KnightPieceValue;
        }
    }
}