namespace _2_2.Framework;


public abstract class Player<TCard>
{
    public string Name { get; set; }
    public Hand<TCard> Hand { get; } = new();

    public abstract void NameHimself();
}