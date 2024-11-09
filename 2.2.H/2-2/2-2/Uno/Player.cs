using _2_2.Framework;

namespace _2_2.Uno;

public abstract class Player: IPlayer
{
    public Hand Hand { get; } = new();
    public string Name { get; set; }
    public abstract void NameHimself();

    // force 重複
    public ICard Turn()
    {
        Console.WriteLine("輪到" + Name + "了");
        Show();
        var card = SelectCard();
        Console.WriteLine(Name + "出了" + card);
        return card;
    }

    protected abstract Card SelectCard();

    protected abstract void Show();
}