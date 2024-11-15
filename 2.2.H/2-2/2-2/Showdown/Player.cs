using _2_2.Framework;

namespace _2_2.Showdown;

public abstract class Player : Player<Card>
{
    public int Point { get; private set; }
    
    public void GainPoint()
    {
        Point++;
    }

    public abstract Card SelectCard();
}