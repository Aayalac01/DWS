
namespace ChessAPI.Model
{
    public class Board
    {
        private Piece[,] _boardPieces ;
        public Piece[,] boardPieces{get {return _boardPieces;} set{}}

        public Board(string board)
        {
            
            
            string [] table = board.Split(",");
            _boardPieces = new Piece[8,8] ;

            Dictionary<string,Piece> pieces = new Dictionary<string, Piece>
            {
                { "RW", new Rook(Piece.ColorEnum.WHITE) },
                { "NW", new Knight(Piece.ColorEnum.WHITE) },
                { "BW", new Bishop(Piece.ColorEnum.WHITE) },
                { "QW", new Queen(Piece.ColorEnum.WHITE) },
                { "KW", new King(Piece.ColorEnum.WHITE) },
                { "PW", new Pawn(Piece.ColorEnum.WHITE) },
                { "r", new Rook(Piece.ColorEnum.BLACK) },
                { "n", new Knight(Piece.ColorEnum.BLACK) },
                { "b", new Bishop(Piece.ColorEnum.BLACK) },
                { "q", new Queen(Piece.ColorEnum.BLACK) },
                { "k", new King(Piece.ColorEnum.BLACK) },
                { "p", new Pawn(Piece.ColorEnum.BLACK) }
            };
            
            int count = 0;

            for (int i = 0; i < 8; i++)
            {
                for (int f = 0; f < 8; f++)
                {
                    if (pieces.ContainsKey(table[count] ))
                    {
                        _boardPieces[i,f] = pieces[table[count]];
                    }
                    else
                    {
                        _boardPieces[i,f] = null;
                    }
                    count++;
                }
            }

        } 

        public string GetBoardState()
        {
            string result = string.Empty;

            for (int i = 0; i < _boardPieces.GetLength(0); i++)
            {
                for (int f = 0; f < _boardPieces.GetLength(1); f++)
                {
                    if (_boardPieces[i, f]?.GetCode() != null)
                    {
                        if (_boardPieces[i,f].GetCode().Substring(3,2) == "WH")
                        {
                            result += _boardPieces[i, f].GetSt() + "W,";
                        }
                        else
                        {
                            result += _boardPieces[i, f].GetSt() + ",";
                        }
                    }
                    else
                    {
                        result += "NP,";
                    }
                }
            }

            return result;

        }
        public BoardScore GetScore()
        {
            return new BoardScore(this._boardPieces);
        }

        public void MovePiece(int fromRow, int fromColumn, int toRow, int toColumn)
        {
            
            _boardPieces[toRow,toColumn] = _boardPieces[fromRow,fromColumn];
            _boardPieces[fromRow,fromColumn] = null;
        }

        public bool canEat(Movement move, Piece[,] board)
        {
            return _boardPieces[move.fromRow,move.fromColumn].ValidateBasicRulesForMovement(move,board);
        }

        public bool canMove(Movement move, Piece[,] board)
        {
            int valid = (int)_boardPieces[move.fromRow,move.fromColumn].ValidateSpecificRulesForMovement(move,board);
            if (valid == 0)
            {
                return true;
            }
            return false;
        }
    }
}