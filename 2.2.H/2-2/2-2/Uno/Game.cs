namespace _2_2.Uno;

public class Game: Framework.Game<Player, Card>
{
    private Card? TopCard { get; set; } 
    private Deck Discards { get; } = new();
        
    public Game(List<Player> players)
    {
        Players = players;
        Deck = new Deck();
    }

    protected override bool GameOver()
    {
        var winner = Players.FirstOrDefault(player => player.Hand.Cards.Count == 0);
        if (winner == null) return false;
        
        Console.WriteLine("贏家: " + winner.Name);
        return true;
    }

    protected override void TakeTurn(Player player)
    {
        Console.WriteLine("輪到" + player.Name + "了");
        if (CheckCanPlay(player))
        {
            player.Show();
            TopCard = player.SelectCard(TopCard, this);
            Discards.AddCard(TopCard);
        }
        else
        {
            PlayerDraw(player);
            TakeTurn(player);
        }
    }

    private bool CheckCanPlay(Player player)
    {
        return player.Hand.Cards.Any(RuleCheck);
    }

    protected override void FirstTurn()
    {
        TopCard = Deck.Draw();
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

    public bool RuleCheck(Card card)
    {
        return card.Rank == TopCard.Rank || card.Color == TopCard.Color;
    }

    private void PlayerDraw(Player player)
    {
        Console.WriteLine("沒牌抽牌");
        if (Deck.Cards.Count == 0)
        {
            Deck = Discards;
            Deck.Shuffle();
        }
        player.Hand.AddCard(Deck.Draw());
    }
}