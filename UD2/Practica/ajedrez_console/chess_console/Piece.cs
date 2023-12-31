namespace EjemploAjedrez
{
    public abstract class Piece
    {   

        public enum ColorEnum { WHITE, BLACK }

        public readonly ColorEnum _color;

        public virtual String GetCode()
        {
            String code = this.GetType().Name.Substring(0, 2).ToUpper();
            String color = this._color.ToString().Substring(0, 2).ToUpper();
            return $"|{code}{color}|";
        }
        public abstract int GetScore();
        

        public virtual String GetSt(){
            String piece = this.GetType().Name.Substring(0,1).ToUpper();
            String color = this._color.ToString().Substring(0,1).ToUpper();
            if (color == "B")
            {
                piece = piece.Substring(0,1).ToLower();
                return piece;
            }
            return piece+color;
            
        }
        public Piece(ColorEnum color)
        {
            _color = color;
        }
    }
}
