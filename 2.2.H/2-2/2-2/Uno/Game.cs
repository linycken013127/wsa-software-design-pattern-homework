namespace _2_2.Uno;

public class Game: _2_2.Framework.Game
{
    public Card TopCard { get; set; } 
        
    public Game(List<Player> players)
    {
        Players = players.Cast<Framework.IPlayer>().ToList();
        Deck = new Deck();
    }

    protected override bool GameOver()
    {
        return Players.Any(player => player.Hand.Cards.Count == 0);
    }

    protected override void FirstTurn()
    {
        TopCard = (Card)Deck.Draw();
    }

    protected override void StartTurn()
    {
        Console.WriteLine("Top card: " + TopCard);
    }

    protected override void EndTurn()
    {
        TurnCards.Clear();
        Console.WriteLine("結束回合");
    }
}