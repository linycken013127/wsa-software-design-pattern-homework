namespace _2_2.Showdown;

public class HumanPlayer: Player
{
    // force 兩個遊戲重複
    public override void NameHimself()
    {
        Console.WriteLine("請輸入名稱：");
        Name = Console.ReadLine() ?? throw new InvalidOperationException();
    }

    public override void Turn()
    {
        // 將所以有手牌 print 到 cli
        
    } 

    protected override void Show()
    {
        
    }
}