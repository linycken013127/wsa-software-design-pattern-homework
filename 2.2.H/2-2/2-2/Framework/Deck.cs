namespace _2_2.Framework;

public class Deck
{
    public List<ICard> Cards { get; set; } = new List<ICard>();

    public void Shuffle()
    {
        var rnd = new Random();
        Cards = Cards.OrderBy(x => rnd.Next()).ToList();
    }

    public ICard Draw()
    {
        if (Cards.Count == 0)
        {
            Console.WriteLine("fuck");
            throw new InvalidOperationException("No cards left in the deck to draw.");
        }
        var card = Cards[0];
        Cards.RemoveAt(0);
        return card;
    }

    public void AddCard(ICard card)
    {
        Cards.Add(card);
    }
}