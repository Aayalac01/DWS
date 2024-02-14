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
        
            board[0, 0] = new Rook(Piece.ColorEnum.WHITE);
            board[0, 1] = new Knight(Piece.ColorEnum.WHITE);
            board[0, 2] = new Bishop(Piece.ColorEnum.WHITE);
            board[0, 3] = new Queen(Piece.ColorEnum.WHITE);
            board[0, 4] = new King(Piece.ColorEnum.WHITE);
            board[0, 5] = new Bishop(Piece.ColorEnum.WHITE);
            board[0, 6] = new Knight(Piece.ColorEnum.WHITE);
            board[0, 7] = new Rook(Piece.ColorEnum.WHITE);
            board[1, 0] = new Pawn(Piece.ColorEnum.WHITE);
            board[1, 1] = new Pawn(Piece.ColorEnum.WHITE);
            board[1, 2] = new Pawn(Piece.ColorEnum.WHITE);
            board[1, 3] = new Pawn(Piece.ColorEnum.WHITE);
            board[1, 4] = new Pawn(Piece.ColorEnum.WHITE);
            board[1, 5] = new Pawn(Piece.ColorEnum.WHITE);
            board[1, 6] = new Pawn(Piece.ColorEnum.WHITE);
            board[1, 7] = new Pawn(Piece.ColorEnum.WHITE);
            board[6, 0] = new Pawn(Piece.ColorEnum.BLACK);
            board[6, 1] = new Pawn(Piece.ColorEnum.BLACK);
            board[6, 2] = new Pawn(Piece.ColorEnum.BLACK);
            board[6, 3] = new Pawn(Piece.ColorEnum.BLACK);
            board[6, 4] = new Pawn(Piece.ColorEnum.BLACK);
            board[6, 5] = new Pawn(Piece.ColorEnum.BLACK);
            board[6, 6] = new Pawn(Piece.ColorEnum.BLACK);
            board[6, 7] = new Pawn(Piece.ColorEnum.BLACK);
            board[7, 0] = new Rook(Piece.ColorEnum.BLACK);
            board[7, 1] = new Knight(Piece.ColorEnum.BLACK);
            board[7, 2] = new Bishop(Piece.ColorEnum.BLACK);
            board[7, 3] = new Queen(Piece.ColorEnum.BLACK);
            board[7, 4] = new King(Piece.ColorEnum.BLACK);
            board[7, 5] = new Bishop(Piece.ColorEnum.BLACK);
            board[7, 6] = new Knight(Piece.ColorEnum.BLACK);
            board[7, 7] = new Rook(Piece.ColorEnum.BLACK);
        }
        public Piece GetPiece(int row, int column)
        {
            return board[row, column];
        }


        public void Move(Movement movement)
        {
            if (movement.IsValid(movement.From, movement.To))
            {
                _Move(movement);
            }
        }


        private void _Move(Movement movement)
        {
            int rowF = movement.From.Row;
            int columnF = movement.From.Column;
            int rowT = movement.To.Row;
            int columnT = movement.To.Column;

            this.board[rowT, columnT] = this.board[rowF, columnF];
            this.board[rowF, columnF] = null;
        }

       
        public void Draw()
        {
            for (int i = 0; i < board.GetLength(0); i++)
            {
                for (int f = 0; f < board.GetLength(1); f++)
                {
                    if (board[i, f]?.GetCode() != null)
                    {
                        Console.Write($"{this.board[i, f].GetCode()} ");
                    }
                    else
                    {
                        if ((i + f) % 2 == 0)
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
        
        public string GetBoardState()
        {
            string result = string.Empty;

            for (int i = 0; i < board.GetLength(0); i++)
            {
                for (int f = 0; f < board.GetLength(1); f++)
                {
                    if (board[i, f]?.GetCode() != null)
                    {
                        result += board[i, f].GetSt() + ",";
                    }
                    else
                    {
                        result += "NP,";
                    }
                }
            }

            return result;

        }

        public int getWhiteScore()
        {
            int wScore = 0;

            for (int i = 0; i < 8; i++)
            {
                for (int f = 0; f < 8; f++)
                {
                    Piece piece = board[i, f];
                    if (piece != null)
                    {
                        if (piece.GetCode().Substring(1, 2) == "WH")
                        {
                            wScore += piece.GetScore();
                        }
                    }

                }
            }

            return wScore;
        }

        public int getBlackScore()
        {
            int bScore = 0;

            for (int i = 0; i < 8; i++)
            {
                for (int f = 0; f < 8; f++)
                {
                    Piece piece = board[i, f];
                    if (piece != null)
                    {
                        if (piece.GetCode().Substring(1, 2) == "BL")
                        {
                            bScore += piece.GetScore();
                        }
                    }

                }
            }

            return bScore;
        }

    }
}
