namespace _2_2.Showdown;

public abstract class Player : _2_2.Framework.Player
{
    public int Point { get; set; } = 0;
    
    // 這個用法怪怪的 Player 應該該 interface
    public abstract override void NameHimself();


    public override Card Turn()
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