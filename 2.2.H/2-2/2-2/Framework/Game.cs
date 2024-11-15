namespace _2_2.Framework;

public abstract class Game<TPlayer, TCard>
        where TPlayer : Player<TCard>
{
    protected List<TPlayer> Players { get; set; }
    protected Deck<TCard> Deck { get; set; }
    protected Dictionary<TPlayer, TCard> TurnCards { get; } = new();

    public void Start()
    {
        Deck.Init();
        NameHimself();
        Deck.Shuffle();
        Draw();
        ExecuteTurn();
    }

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
            foreach (var player in Players)
            {
                player.Hand.AddCard(Deck.Draw());
            }
        }
    }

    private void ExecuteTurn()
    {
        FirstTurn();
        while (!GameOver())
        {
            StartTurn();
            foreach (var player in Players)
            {
                TakeTurn(player);
            }
            EndTurn();
        }
    }

    protected abstract void TakeTurn(TPlayer player);

    protected abstract void FirstTurn();

    protected abstract void StartTurn();

    protected abstract void EndTurn();
    
    protected abstract bool GameOver();
}