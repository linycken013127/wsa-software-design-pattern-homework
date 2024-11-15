namespace _2_2.Showdown;

public class HumanPlayer : Player
{
    public override void NameHimself()
    {
        Console.WriteLine("請輸入名稱：");
        Name = Console.ReadLine() ?? throw new InvalidOperationException();
    }

    public override Card SelectCard()
    {
        Console.WriteLine("請選擇一張牌");
        var index = int.Parse(Console.ReadLine() ?? throw new InvalidOperationException());
        if (index < 0 || index >= Hand.Cards.Count)
        {
            throw new ArgumentOutOfRangeException(nameof(index), "索引超出範圍。");
        }
        
        var card = Hand.Cards[index];
        Hand.Cards.RemoveAt(index);
        return card;
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