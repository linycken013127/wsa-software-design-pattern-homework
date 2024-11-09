namespace _2_2.Uno;

public class HumanPlayer: Player
{
    public override void NameHimself()
    {
        Console.WriteLine("請輸入你的名字");
        Name = Console.ReadLine();
    }
}