namespace _2_2.Showdown;

public abstract class Player : _2_2.Framework.Player
{
    public abstract override void NameHimself();

    public override void Turn()
    {
        Console.WriteLine("輪到" + Name + "了");
        Show();
        SelectCard();
    }

    protected abstract Card SelectCard();

    protected abstract void Show();
}