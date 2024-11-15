namespace _2_2.Uno;

public class Game: Framework.Game<Player, Card>
{
    public Card TopCard { get; set; } 
        
    public Game(List<Player> players)
    {
        Players = players.ToList();
        foreach (var player in Players.Cast<Player>())
        {
            player.Game = this;
        }
        Deck = new Deck();
    }

    protected override bool GameOver()
    {
        var winner = Players.Cast<Player>().FirstOrDefault(player => player.Hand.Cards.Count == 0);
        if (winner == null) return false;
        
        Console.WriteLine("贏家: " + winner.Name);
        return true;
    }

    protected override void Play(Player player)
    {
        var card = player.Turn();
        TopCard = card;
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

    public Card PlayerDraw()
    {
        // 檢查牌堆是否還有牌
        if (Deck.Cards.Count == 0)
        {
            Deck.Init(); // todo 要重置牌面
            Deck.Shuffle();
        }
        var card = Deck.Draw();
        Console.WriteLine("抽了一張牌: " + card);
        return card;
    }
}