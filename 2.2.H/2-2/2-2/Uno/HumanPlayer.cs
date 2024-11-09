namespace _2_2.Uno;

public class HumanPlayer: Player
{
    public override void NameHimself()
    {
        Console.WriteLine("請輸入你的名字");
        Name = Console.ReadLine() ?? throw new InvalidOperationException();
    }
    
    protected override Card SelectCard()
    {
        Console.WriteLine("請選擇一張牌或按D抽牌");

        // force func 內重複
        var action = InputSelectIndex();
        if (action == "D" || action == "d")
        {
            return AutoDraw();
        }
        var index = int.Parse(action);
        while (CheckHandCardRange(index) || !Game.RuleCheck((Card)Hand.Cards[index]))
        {
            Console.WriteLine("請輸入正確的數字");
            action = InputSelectIndex();
            if (action == "D" || action == "d")
            {
                return AutoDraw();
            }
        }
        
        var card = (Card)Hand.Cards[index];
        Hand.Cards.RemoveAt(index); // 移除該卡片以避免重複抽取
        return card;
    }

    private bool CheckHandCardRange(int index)
    {
        return index < 0 || index >= Hand.Cards.Count;
    }

    private string InputSelectIndex()
    {
        return Console.ReadLine() ?? throw new InvalidOperationException();
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