namespace _2_2.Uno;

public class AIPlayer: Player
{
    public override void NameHimself()
    {
        Name = "AI" + new Random().Next(10, 99);
    }

    public override Card SelectCard(Card? topCard, Game game)
    {
        foreach (var card in Hand.Cards)
        {
            if (game.RuleCheck(card))
            {
                Hand.Cards.Remove(card);
                return card;
            }
        }

        throw new Exception("AIPlayer: No card can be played");
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