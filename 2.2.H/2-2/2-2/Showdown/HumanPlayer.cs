namespace _2_2.Showdown;

public class HumanPlayer : Player
{
    // force 兩個遊戲重複
    public override void NameHimself()
    {
        Console.WriteLine("請輸入名稱：");
        Name = Console.ReadLine() ?? throw new InvalidOperationException();
    }

    protected override void Show()
    {
        var showLine = "";
        for (var index = 0; index < Hand.Cards.Count; index++)
        {
            var card = Hand.Cards[index].ToString();
            showLine += card + "[" + index + "]" + " ";
        }

        Console.WriteLine(showLine);
    }
}