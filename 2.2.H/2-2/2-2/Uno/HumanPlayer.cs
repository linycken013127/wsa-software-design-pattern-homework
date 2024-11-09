namespace _2_2.Uno;

public class HumanPlayer: Player
{
    public override void NameHimself()
    {
        Console.WriteLine("請輸入你的名字");
        Name = Console.ReadLine() ?? throw new InvalidOperationException();
    }
    
    // todo 查合法
    protected override Card SelectCard()
    {
        Console.WriteLine("請選擇一張牌");

        var index = int.Parse(Console.ReadLine() ?? throw new InvalidOperationException());
        while (index < 0 || index >= Hand.Cards.Count)
        {
            Console.WriteLine("請輸入正確的數字");
            index = int.Parse(Console.ReadLine() ?? throw new InvalidOperationException()); // 醜
        }
        
        var card = (Card)Hand.Cards[index];
        Hand.Cards.RemoveAt(index); // 移除該卡片以避免重複抽取
        return card;
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