namespace _2_2.Uno;

public record Card(Rank Rank, Color Color)
{
    public Rank Rank { get; } = Rank;
    public Color Color { get; } = Color;

    public override string ToString()
    {
        var rankSymbol = Rank switch
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
            _ => Rank.ToString()
        };
        
        var colorSymbol = Color switch
        {
            Color.Red => "R",
            Color.Yellow => "Y",
            Color.Green => "G",
            Color.Blue => "B",
            _ => Color.ToString()
        };

        return rankSymbol + colorSymbol;
    }
}