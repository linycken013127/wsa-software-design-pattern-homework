namespace _2_2.Showdown;

public class AIPlayer: Player
{
    public override void NameHimself()
    {
        Name = "AI" + new Random().Next(10, 99);
    }

    protected override Card SelectCard()
    {
        return null;
    }

    protected override void Show()
    {
        
    }
}