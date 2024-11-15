namespace _2_2.Framework;

public abstract class Deck<TCard>
{
    public List<TCard> Cards { get; set; } = new();
    public abstract int StartDrawCount { get; }

    public void Shuffle()
    {
        var rnd = new Random();
        Cards = Cards.OrderBy(x => rnd.Next()).ToList();
    }

    public TCard Draw()
    {
        if (Cards.Count == 0)
        {
            throw new Exception("牌已經抽完了");
        }
        var card = Cards[0];
        Cards.RemoveAt(0);
        return card;
    }

    public void AddCard(TCard card)
    {
        Cards.Add(card);
    }

    public abstract void Init();
}