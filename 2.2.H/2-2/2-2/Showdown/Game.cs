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
        
        foreach (var player in Players)
        {
            Console.WriteLine(player.Name + "得分: " + player.Point);
        }
        
        Console.WriteLine("贏家：" + Winner.Name);
        return true;
    }

    protected override void Play(Player player)
    {
        Console.WriteLine("輪到" + player.Name + "了");
        player.Show();
        TurnCards.Add(player, player.SelectCard());
    }

    protected override void FirstTurn()
    {
        
    }

    protected override void StartTurn()
    {
        Console.WriteLine("第" + Turn + "回合");
    }

    protected override void EndTurn()
    {
        var topCard = null as Card;
        var turnWinner = null as Player;
        foreach (var playerCard in TurnCards)
        {
            var card = playerCard.Value;
            if (topCard == null || card.CompareTo(topCard) > 0)
            {
                topCard = card;
                turnWinner = playerCard.Key;
            }
        }
        Console.WriteLine("當局贏家: " + turnWinner.Name);
        turnWinner.GainPoint();

        Winner = Players.OrderByDescending(player => player.Point).First();
        
        TurnCards.Clear();
        Turn++;
    }
}
