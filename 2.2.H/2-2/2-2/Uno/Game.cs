namespace _2_2.Uno;

public class Game: _2_2.Framework.Game
{
    public Game(List<Player> players)
    {
        Players = players.Cast<Framework.IPlayer>().ToList();
        Deck = new Deck();
    }

    protected override bool GameOver()
    {
        return true;
    }

    protected override void StartTurn()
    {
        Console.WriteLine("開始回合");
    }

    protected override void EndTurn()
    {
        Console.WriteLine("結束回合");
    }
}