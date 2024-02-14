

namespace ChessAPI.Model
{
    public class Knight : Piece
    {
        public Knight(ColorEnum color) : base(color)
        {

        }

        public override int GetScore()
        {
            return Config.KnightPieceValue;
        }

        public override string GetSt(){
            String piece = this.GetType().Name.Substring(1,1);
            String color = this._color.ToString();
            if (color == "WHITE")
            {
                return piece.ToUpper();
            }
            return piece;
        }

        public override MovementType ValidateSpecificRulesForMovement(Movement movement, Piece[,] board)
        {
            return MovementType.InvalidNormalMovement;
        }

    }
}