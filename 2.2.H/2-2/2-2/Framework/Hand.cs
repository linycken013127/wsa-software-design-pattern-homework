namespace _2_2.Framework;

public class Hand<TCard>
{
    public List<TCard> Cards { get; } = new();

    public void AddCard(TCard card)
    {
        Cards.Add(card);
    }
}