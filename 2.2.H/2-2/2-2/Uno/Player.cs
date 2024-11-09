using _2_2.Framework;

namespace _2_2.Uno;

public abstract class Player: IPlayer
{
    public Hand Hand { get; } = new();
    public string Name { get; set; }
    public abstract void NameHimself();

    public ICard Turn()
    {
        Console.WriteLine("輪到" + Name + "了");
        Show();
        return SelectCard();
    }

    protected Card SelectCard()
    {
        var card = (Card)Hand.Cards[0];
        Console.WriteLine(Name + "選擇了" + card);
        Hand.Cards.RemoveAt(0);
        return card;
    }

    protected abstract void Show();
}