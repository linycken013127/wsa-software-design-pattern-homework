namespace _2_2.Uno;

public class HumanPlayer: Player
{
    public override void NameHimself()
    {
        Console.WriteLine("請輸入你的名字");
        Name = Console.ReadLine() ?? throw new InvalidOperationException();
    }
    
    public override Card SelectCard(Card topCard, Game game)
    {
        Console.WriteLine("請選擇一張牌");

        var index = int.Parse(InputSelectIndex());
        var card = Hand.Cards[index];
        Hand.Cards.RemoveAt(index);

        if (!game.RuleCheck(card))
        {
            Console.WriteLine("不符合規則，重新出牌");
            return SelectCard(topCard, game);
        }
        return card;
    }

    private string InputSelectIndex()
    {
        return Console.ReadLine() ?? throw new InvalidOperationException();
    }

    public override void Show()
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