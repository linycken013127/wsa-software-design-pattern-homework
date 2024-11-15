namespace _2_2.Uno;

public abstract class Player: Framework.Player<Card>
{
    public Game Game { get; set; }

    // force 重複
    public override Card Turn()
    {
        Console.WriteLine("輪到" + Name + "了");
        Show();
        var card = SelectCard();
        Console.WriteLine(Name + "出了" + card);
        return card;
    }

    protected abstract Card SelectCard();

    protected abstract void Show();
    
    protected Card AutoDraw()
    {
        while (true)
        {
            var drawCard = Game.PlayerDraw();
            Console.WriteLine("抽到了" + drawCard);
            if (Game.RuleCheck(drawCard))
            {
                return drawCard;
            }
            Hand.AddCard(drawCard);
        }
    } 
}