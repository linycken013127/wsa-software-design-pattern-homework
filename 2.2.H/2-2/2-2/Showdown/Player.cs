using _2_2.Framework;

namespace _2_2.Showdown;

public abstract class Player : IPlayer
{
    public Hand Hand { get; set; }= new();
    public string Name { get; set; }
    public int Point { get; private set; }
    
    public abstract void NameHimself();

    public ICard Turn()
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