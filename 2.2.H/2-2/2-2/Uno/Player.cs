using _2_2.Framework;

namespace _2_2.Uno;

public class Player: _2_2.Framework.Player
{
    public override void NameHimself()
    {
        Console.WriteLine("命名");
    }

    public override ICard Turn()
    {
        Console.WriteLine("出牌");
        return null;
    }
}