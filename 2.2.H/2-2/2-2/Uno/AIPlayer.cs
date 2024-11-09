namespace _2_2.Uno;

public class AIPlayer: Player
{
    public override void NameHimself()
    {
        // force 重複
        Name = "AI" + new Random().Next(10, 99);
    }
}