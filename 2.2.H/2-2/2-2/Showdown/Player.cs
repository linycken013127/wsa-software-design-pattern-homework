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

    private void SelectCard()
    {
        Console.WriteLine("請選擇一張牌");
        var card = Console.ReadLine();
    }

    protected abstract void Show();
}