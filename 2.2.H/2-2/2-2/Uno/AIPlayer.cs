namespace _2_2.Uno;

public class AIPlayer: Player
{
    public override void NameHimself()
    {
        // force 重複
        Name = "AI" + new Random().Next(10, 99);
    }

    // force 重複
    protected override Card SelectCard()
    {
        var card = (Card)Hand.Cards[0];
        Console.WriteLine(Name + "選擇了" + card);
        Hand.Cards.RemoveAt(0);
        return card;
    }
    
    // debug 可清空
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