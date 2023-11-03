using System.Runtime.CompilerServices;
using ChessAPI;

namespace EjemploAjedrez
{
    public class Rook : Piece
    {
        public Rook(ColorEnum color) : base(color)
        {

        }

        public override int GetScore()
        {
            return Config.RookPieceValue;
        }
    }

    
}