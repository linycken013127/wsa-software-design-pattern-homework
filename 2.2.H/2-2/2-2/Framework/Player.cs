namespace _2_2.Framework;


public abstract class Player
{

    public Hand Hand { get; set; } = new();
    public string Name { get; set; }

    public abstract void NameHimself();

    public abstract void Turn();
}