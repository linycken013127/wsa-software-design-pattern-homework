namespace _2_2.Showdown;

public class Deck: _2_2.Framework.Deck
{
    public override int StartDrawCount => 13;

    public override void Init()
    {
        foreach (var rank in Enum.GetValues(typeof(Rank)))
        {
            foreach (var suit in Enum.GetValues(typeof(Suit)))
            {
                AddCard(new Card((Rank)rank, (Suit)suit));
            }
        }
    }
}