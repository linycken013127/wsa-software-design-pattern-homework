namespace _2_2.Uno;

public class Card(Rank rank, Color color) : Framework.ICard
{

    public override string ToString()
    {
        var rankSymbol = rank switch
        {
            Rank.Zero => "0",
            Rank.One => "1",
            Rank.Two => "2",
            Rank.Three => "3",
            Rank.Four => "4",
            Rank.Five => "5",
            Rank.Six => "6",
            Rank.Seven => "7",
            Rank.Eight => "8",
            Rank.Nine => "9",
            _ => rank.ToString()
        };
        
        var colorSymbol = color switch
        {
            Color.Red => "R",
            Color.Yellow => "Y",
            Color.Green => "G",
            Color.Blue => "B",
            _ => color.ToString()
        };

        return rankSymbol + colorSymbol;
    }
}