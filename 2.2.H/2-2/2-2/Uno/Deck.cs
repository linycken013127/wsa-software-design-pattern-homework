namespace _2_2.Uno;

public class Deck: _2_2.Framework.Deck<Card>
{
    public override int StartDrawCount => 5;
    
    public override void Init()
    {
        foreach (var rank in Enum.GetValues(typeof(Rank)))
        {
            foreach (var suit in Enum.GetValues(typeof(Color)))
            {
                AddCard(new Card((Rank)rank, (Color)suit));
            }
        }
    }
}