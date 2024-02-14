

namespace ChessAPI.Model
{
    public class Pawn : Piece
    {
        public Pawn(ColorEnum color) : base(color)
        {

        }

        public override int GetScore()
        {
            return Config.PawnPieceValue;
        }

        public override MovementType ValidateSpecificRulesForMovement(Movement movement, Piece[,] board)
        {
            // if ((movement.fromRow==movement.toRow) & (movement.fromColumn==movement.toColumn))
            //     return MovementType.InvalidNormalMovement; 
            return MovementType.ValidNormalMovement;
        }

    }
}