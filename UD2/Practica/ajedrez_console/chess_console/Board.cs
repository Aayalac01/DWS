using System.Collections;
using System.Net;
using ChessAPI.Model;

namespace ChessAPI
{
    internal class Board
    {
        public Piece[,] board;

        public Board()
        {
            board = new Piece[8, 8];
            //DONE Practica 02_7
            // Este constructor colocará las piezas en el tablero
            board[0,0] = new Rook(Piece.ColorEnum.WHITE);
            board[0,1] = new Knight(Piece.ColorEnum.WHITE);
            board[0,2] = new Bishop(Piece.ColorEnum.WHITE);
            board[0,3] = new Queen(Piece.ColorEnum.WHITE);
            board[0,4] = new King(Piece.ColorEnum.WHITE);
            board[0,5] = new Bishop(Piece.ColorEnum.WHITE);
            board[0,6] = new Knight(Piece.ColorEnum.WHITE);
            board[0,7] = new Rook(Piece.ColorEnum.WHITE);
            board[1,0] = new Pawn(Piece.ColorEnum.WHITE);
            board[1,1] = new Pawn(Piece.ColorEnum.WHITE);
            board[1,2] = new Pawn(Piece.ColorEnum.WHITE);
            board[1,3] = new Pawn(Piece.ColorEnum.WHITE);
            board[1,4] = new Pawn(Piece.ColorEnum.WHITE);
            board[1,5] = new Pawn(Piece.ColorEnum.WHITE);
            board[1,6] = new Pawn(Piece.ColorEnum.WHITE);
            board[1,7] = new Pawn(Piece.ColorEnum.WHITE);
            board[6,0] = new Pawn(Piece.ColorEnum.BLACK);
            board[6,1] = new Pawn(Piece.ColorEnum.BLACK);
            board[6,2] = new Pawn(Piece.ColorEnum.BLACK);
            board[6,3] = new Pawn(Piece.ColorEnum.BLACK);
            board[6,4] = new Pawn(Piece.ColorEnum.BLACK);
            board[6,5] = new Pawn(Piece.ColorEnum.BLACK);
            board[6,6] = new Pawn(Piece.ColorEnum.BLACK);
            board[6,7] = new Pawn(Piece.ColorEnum.BLACK);
            board[7,0] = new Rook(Piece.ColorEnum.BLACK);
            board[7,1] = new Knight(Piece.ColorEnum.BLACK);
            board[7,2] = new Bishop(Piece.ColorEnum.BLACK);
            board[7,3] = new Queen(Piece.ColorEnum.BLACK);
            board[7,4] = new King(Piece.ColorEnum.BLACK);
            board[7,5] = new Bishop(Piece.ColorEnum.BLACK);
            board[7,6] = new Knight(Piece.ColorEnum.BLACK);
            board[7,7] = new Rook(Piece.ColorEnum.BLACK);
        }
        public Piece GetPiece(int row, int column)
        {
            return board[row, column];
        }

  
        public void Move(Movement movement)
        {
            if (movement.IsValid(movement.From,movement.To))
            {
                _Move(movement);
            }
        }


        // DONE Practica 02_3
        //Implementar el método _move, que no realizará ninguna validación
        //simplemente moverá en la matriz la pieza. Realiza modificaciones
        //en otras clases si lo consideras necesario...
        private void _Move(Movement movement)
        {
            int rowF = movement.From.Row;
            int columnF = movement.From.Column;
            int rowT = movement.To.Row;
            int columnT = movement.To.Column;

            board[rowT,columnT] = board[rowF,columnF];
            board[rowF,columnF] = null;
        }

        // DONE Practica 02_4
        //Este método escribira por consola el tablero,
        //haciendo un salto de línea después de cada fila.
        //Para ver el formato del pintado, leer enunciado de la práctica
        public void Draw()
        {
            for (int i = 0; i < board.GetLength(0); i++)
            {
                for (int f = 0; f < board.GetLength(1); f++)
                {
                    if (board[i,f]?.GetCode() != null)
                    {
                        Console.Write($"{board[i,f].GetCode()} ");
                    }
                    else
                    {
                        if((i+f)%2==0)
                        {
                            Console.Write("|0000| ");
                        }
                        else
                        {
                            Console.Write("|####| ");
                        }
                    }
                }
                Console.WriteLine();
            }
        }
        // DONE Practica 02_5
        //Este método devuelve una cadena con el estado del tablero. Dicha cadena,
        //ha de tener el formato esperado por la parte Web para poder procesarse
        //y pintarse.
        public string GetBoardState()
        {
            string result = string.Empty;
            
            for (int i = 0; i < board.GetLength(0); i++)
            {
                for (int f = 0; f < board.GetLength(1); f++)
                {
                    
                    if (board[i,f]?.GetCode() != null)
                    {
                        result += board[i,f].GetSt() + ",";
                    }
                    else
                    {
                        result += "NP,";
                    }
                }
            }

            return result;

        }


    }
}
