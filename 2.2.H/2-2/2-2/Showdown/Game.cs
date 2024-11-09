using _2_2.Framework;

namespace _2_2.Showdown;

public class Game : _2_2.Framework.Game
{
    public int Turn { get; set; } = 1;
    const int END_TURN = 13;

    public Player? Winner { get; set; } = null;
    
    public Game(List<Player> players, Deck deck)
    {
        Players = players.Cast<_2_2.Framework.Player>().ToList();
        Deck = deck;
    }

    protected override void InitDeck()
    {
        foreach (var rank in Enum.GetValues(typeof(Rank)))
        {
            foreach (var suit in Enum.GetValues(typeof(Suit)))
            {
                Deck.AddCard(new Card((Rank)rank, (Suit)suit));
            }
        }
    }

    protected override bool GameOver()
    {
        if (Turn == END_TURN)
        {
            Console.WriteLine("贏家：" + Winner.Name);
            return true;
        }
        Console.WriteLine("遊戲還沒結束");
        return false;
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
            var card = (Card)playerCard.Value;
            Console.WriteLine("計算當局贏家: Player: " + playerCard.Key.Name + " played " + card);
            if (topCard == null || card.CompareTo(topCard) > 0)
            {
                topCard = card;
                turnWinner = (Player)playerCard.Key;
            }
        }
        Console.WriteLine("當局贏家: " + turnWinner.Name);
        turnWinner.GainPoint();
        
        TurnCards.Clear();
        Turn++;
    }
}
