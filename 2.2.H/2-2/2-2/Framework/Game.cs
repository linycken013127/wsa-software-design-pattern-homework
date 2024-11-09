namespace _2_2.Framework;

public abstract class Game
{
    public List<Player> Players { get; set; }
    public Deck Deck { get; set; }
    const int DrawCount = 13;
    public Dictionary<Player, ICard> TurnCards { get; set; } = new();

    public void Start()
    {
        InitDeck();
        Deck.Shuffle();
        Console.WriteLine("Showdown started");
        NameHimself();
        Draw();
        TakeTurn();
    }

    protected abstract void InitDeck();

    protected abstract bool GameOver();

    // TODO 樣板
    private void Turn()
    {
        // param: action
        foreach (var player in Players)
        {
            // action(player);
        }
    }

    private void Draw()
    {
        for (var i = 0; i < DrawCount; i++)
        {
            // force
            foreach (var player in Players)
            {
                player.Hand.AddCard(Deck.Draw());
            }
        }
    }

    private void NameHimself()
    {
        foreach (var player in Players)
        {
            player.NameHimself();
            Console.WriteLine("Player: " + player.Name + " 加入遊戲");
        }
    }

    // 主要流程
    private void TakeTurn()
    {
        StartTurn();
        while (!GameOver())
        {
            // force
            foreach (var player in Players)
            {
                TurnCards.Add(player, player.Turn());
            }
            EndTurn();
        }
    }

    protected abstract void StartTurn();

    protected abstract void EndTurn();
}