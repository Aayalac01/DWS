namespace ChessAPI.Model
{
    public class ValidMovement
    {
        public Boolean Status { get; set; }

        public enum OperationResult {OK,ERROR,NOT_IMPLEMENTED}
        public string Board { get; set; }

        public ValidMovement(string board, int fromRow, int fromColumn, int toRow, int toColumn)
        {
            Board b = new Board(board);
            Movement movement = new Movement(fromColumn,fromRow,toColumn,toRow);

            bool inTable = movement.IsValid();
            bool canMove = b.canMove(movement,b.boardPieces);
            bool eatPiece = b.canEat(movement,b.boardPieces);
            if (inTable & eatPiece & canMove)
            {
                b.MovePiece(fromRow,fromColumn,toRow,toColumn);
                this.Status=true;
                this.Board = b.GetBoardState();
            }
            else
            {
                this.Status = false;
                this.Board = board;
            }

        }

    }   
}

