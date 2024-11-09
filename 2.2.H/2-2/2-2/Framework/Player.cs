namespace _2_2.Framework;


public interface IPlayer
{

    Hand Hand { get; }
    string Name { get; set; }

    void NameHimself();

    public ICard Turn();
}