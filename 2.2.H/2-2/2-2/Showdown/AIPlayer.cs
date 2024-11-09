namespace _2_2.Showdown;

public class AIPlayer: Player
{
    public override void NameHimself()
    {
        Name = "AI" + new Random().Next(10, 99);
    }

    protected override Card SelectCard()
    {
        // 牌是亂的選第一張也是
        var card = (Card)Hand.Cards[0];
        Console.WriteLine(Name + "選擇了" + card);
        Hand.Cards.RemoveAt(0);
        return card;
    }

    protected override void Show()
    {
        var showLine = "";
        for (var index = 0; index < Hand.Cards.Count; index++)
        {
            var card = Hand.Cards[index].ToString();
            showLine += card + "[" + index + "]" + " ";
        }

        // 這邊暫時寫著因為 AI 不會顯示正常，Debug 用
        Console.WriteLine(Name + "的手牌：" + showLine);
    }
}