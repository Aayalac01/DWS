using ChessAPI.Model;

public class MovementService : IMovementService
{
    public ValidMovement getValidation(string board, int fromRow, int fromColumn, int toRow, int toColumn)
    {
        return new ValidMovement(board,fromRow,fromColumn,toRow,toColumn); 
    }
}