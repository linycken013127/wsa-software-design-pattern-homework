namespace _2_2.Uno;

public class Deck: _2_2.Framework.Deck
{
    public override int StartDrawCount => 5;
    
    public override void Init()
    {
        foreach (var rank in Enum.GetValues(typeof(Rank)))
        {
            foreach (var suit in Enum.GetValues(typeof(Color)))
            {
                AddCard(new Card((Rank)rank, (Color)suit));
            }
        }
        
        // debug
        Console.WriteLine("牌庫已初始化");
        foreach (var card in Cards)
        {
            Console.WriteLine(card);
        }
    }
}