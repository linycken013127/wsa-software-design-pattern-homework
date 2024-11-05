namespace _2_2.Framework;

public class Hand
{
    public List<ICard> Cards { get; } = new();

    public void AddCard(ICard card)
    {
        Cards.Add(card);
    }
}