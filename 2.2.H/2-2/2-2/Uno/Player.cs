using _2_2.Framework;

namespace _2_2.Uno;

public abstract class Player: _2_2.Framework.Player
{
    public abstract override void NameHimself();

    public override ICard Turn()
    {
        Console.WriteLine("出牌");
        return null;
    }
}