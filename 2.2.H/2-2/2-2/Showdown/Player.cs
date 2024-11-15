using _2_2.Framework;

namespace _2_2.Showdown;

public abstract class Player : Player<Card>
{
    public int Point { get; private set; }

    public Card Turn()
    {
        Console.WriteLine("輪到" + Name + "了");
        Show();
        return SelectCard();
    }
    

    protected abstract Card SelectCard();

    protected abstract void Show();

    public void GainPoint()
    {
        Point++;
    }
}