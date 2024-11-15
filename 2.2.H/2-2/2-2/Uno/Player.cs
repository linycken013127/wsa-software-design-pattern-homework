namespace _2_2.Uno;

public abstract class Player: Framework.Player<Card>
{
    public abstract void Show();

    public abstract Card SelectCard(Card topCard, Game game);
}