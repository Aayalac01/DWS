namespace ChessAPI
{
    internal class ChessGame
    {
        private Board board;


        public ChessGame()
        {
            board = new Board();
        }

        public void DrawBoard()
        {
            this.board.Draw();
        }

        public void TryToMove()
        {

            Movement movement = new(new BoardPosition(1,2),new BoardPosition(3,5));
            // DONE Practica 02_6
            //Instancia un movimiento dentro del tablero, desde una posición
            //en la que haya una pieza hasta otro. De momento no se realizan
            //validaciones salvo que sea una posición que esté dentro del tablero.

            this.board.Move(movement);
        }

        public string GetBoardAsStringToChessWeb()
        {
            return board.GetBoardState();
        }

    }
}
