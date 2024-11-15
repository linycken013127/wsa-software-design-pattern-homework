namespace _2_2.Showdown;

public class Deck: Framework.Deck<Card>
{
    public override int StartDrawCount => 13;

    public override void Init()
    {
        foreach (var rank in Enum.GetValues<Rank>())
        {
            foreach (var suit in Enum.GetValues<Suit>())
            {
                AddCard(new Card(rank, suit));
            }
        }
    }
}