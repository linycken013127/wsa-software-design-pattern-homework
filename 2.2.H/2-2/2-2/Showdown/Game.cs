namespace _2_2.Showdown;

public class Game: Framework.Game<Player, Card>
{
    private int Turn { get; set; } = 1;
    private const int TotalTurn = 13;

    private Player? Winner { get; set; }
    
    public Game(List<Player> players)
    {
        Players = players;
        Deck = new Deck();
    }

    protected override bool GameOver()
    {
        if (Turn <= TotalTurn) return false;
        
        Console.WriteLine("贏家：" + Winner.Name);
        return true;
    }

    protected override void Play(Player player)
    {
        TurnCards.Add(player, player.Turn());
    }

    protected override void FirstTurn()
    {
        
    }

    protected override void StartTurn()
    {
        Console.WriteLine("第" + Turn + "回合");
    }

    // todo 要被重構
    protected override void EndTurn()
    {
        var topCard = null as Card;
        var turnWinner = null as Player;
        foreach (var playerCard in TurnCards)
        {
            var card = playerCard.Value;
            Console.WriteLine("計算: Player: " + playerCard.Key.Name + " played " + card);
            if (topCard == null || card.CompareTo(topCard) > 0)
            {
                topCard = card;
                turnWinner = playerCard.Key;
            }
        }
        Console.WriteLine("當局贏家: " + turnWinner.Name);
        turnWinner.GainPoint();

        foreach (var player in Players)
        {
            Console.WriteLine("Player: " + player.Name + " has " + player.Point + " points");
        }
        Winner = Players.OrderByDescending(player => player.Point).First();
        
        TurnCards.Clear();
        Turn++;
    }
}
