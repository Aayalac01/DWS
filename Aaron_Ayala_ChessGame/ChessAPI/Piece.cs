
namespace ChessAPI
{
    public abstract class Piece
    {
        public enum ColorEnum { WHITE, BLACK }
        public readonly ColorEnum _color;

        public virtual String GetCode()
        {
            string code = this.GetType().Name.Substring(0,2).ToUpper();
            string color = this._color.ToString().Substring(0,2).ToUpper();
            return $"|{code}{color}|";
        }

        public virtual String GetSt(){
            String piece = this.GetType().Name.Substring(0,1);
            String color = this._color.ToString();
            if (color == "BLACK")
            {
                return piece.ToLower();
            }
            return piece;
        }
        public abstract int GetScore();

        public Piece(ColorEnum color)
        {
            _color = color;
        }
    }
}



