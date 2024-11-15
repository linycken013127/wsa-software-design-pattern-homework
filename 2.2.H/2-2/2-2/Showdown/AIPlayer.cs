namespace _2_2.Showdown;

public class AIPlayer: Player
{
    public override void NameHimself()
    {
        Name = "AI" + new Random().Next(10, 99);
    }

    public override Card SelectCard()
    {
        var card = Hand.Cards[0];
        Console.WriteLine(Name + "選擇了" + card);
        Hand.Cards.RemoveAt(0);
        return card;
    }

    public override void Show()
    {
    }
}