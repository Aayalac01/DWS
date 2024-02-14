using ChessAPI.Model;

public interface IMovementService
{
    public ValidMovement getValidation(string board, int fromRow, int fromColumn, int toRow, int toColumn);
}