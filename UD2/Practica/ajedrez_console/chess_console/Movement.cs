using System.Reflection.Metadata.Ecma335;

namespace ChessAPI
{
    public class Movement
    {
        private BoardPosition _fromBoardPosition;
        private BoardPosition _toBoardPosition;

        public Movement(BoardPosition fromBoardPosition, BoardPosition toBoardPosition)
        {
            _fromBoardPosition = fromBoardPosition;
            _toBoardPosition = toBoardPosition;
        }


        /// DONE Practica 02_1
        /// Ha de validar el rango de los 2 objetos BoardPosition encapsulados
        /// en esta clase.
        public bool IsValid(BoardPosition FromBP, BoardPosition ToBP)
        {
            return (FromBP.ValidBP(FromBP.Row,FromBP.Column) && ToBP.ValidBP(ToBP.Row,ToBP.Column));
        }

        public BoardPosition From
        {
            get {return _fromBoardPosition;}
        }

        public BoardPosition To
        {
            get {return _toBoardPosition;}
        }
    }
}
