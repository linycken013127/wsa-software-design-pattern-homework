namespace _2_2.Framework;

public abstract class Game
{
    public List<IPlayer> Players { get; set; }
    public Deck Deck { get; set; }
    
    public Dictionary<IPlayer, ICard> TurnCards { get; set; } = new();

    public void Start()
    {
        Deck.Init();
        NameHimself();
        Deck.Shuffle();
        Draw();
        TakeTurn();
    }

    protected abstract bool GameOver();

    private void NameHimself()
    {
        foreach (var player in Players)
        {
            player.NameHimself();
            Console.WriteLine("Player: " + player.Name + " 加入遊戲");
        }
    }

    private void Draw()
    {
        for (var i = 0; i < Deck.StartDrawCount; i++)
        {
            // force
            foreach (var player in Players)
            {
                player.Hand.AddCard(Deck.Draw());
            }
        }
    }

    // 主要流程
    private void TakeTurn()
    {
        FirstTurn();
        while (!GameOver())
        {
            StartTurn();
            // force
            foreach (var player in Players)
            {
                Play(player);
            }
            EndTurn();
        }
    }

    protected abstract void Play(IPlayer player);

    protected abstract void FirstTurn();

    protected abstract void StartTurn();

    protected abstract void EndTurn();
}