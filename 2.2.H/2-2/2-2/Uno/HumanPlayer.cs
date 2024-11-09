namespace _2_2.Uno;

public class HumanPlayer: Player
{
    public override void NameHimself()
    {
        Console.WriteLine("請輸入你的名字");
        Name = Console.ReadLine() ?? throw new InvalidOperationException();
    }
    
    // force 重複
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