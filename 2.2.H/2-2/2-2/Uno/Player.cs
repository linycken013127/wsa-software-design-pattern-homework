using _2_2.Framework;

namespace _2_2.Uno;

public abstract class Player: IPlayer
{
    public Hand Hand { get; }
    public string Name { get; set; }
    public abstract void NameHimself();

    public ICard Turn()
    {
        Console.WriteLine("出牌");
        return null;
    }

    protected Card SelectCard()
    {
        Console.WriteLine("請選擇一張牌");
        return null;
    }

    protected void Show()
    {
        Console.WriteLine("顯示手牌");
    }
    
    
}