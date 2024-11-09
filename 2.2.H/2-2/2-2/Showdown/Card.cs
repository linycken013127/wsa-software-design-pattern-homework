using _2_2.Framework;

namespace _2_2.Showdown;

public record Card(Rank Rank, Suit Suit) : ICard, IComparable<Card>
{

    public int CompareTo(Card? other)
    {
        if (other == null)
        {
            return 1;
        }
        
        var rankCompare = Rank.CompareTo(other.Rank);
        if (rankCompare != 0)
        {
            return rankCompare;
        }
        return Suit.CompareTo(other.Suit);
    }

    public override string ToString()
    {
        var rankSymbol = Rank switch
        {
            Rank.Two => "2",
            Rank.Three => "3",
            Rank.Four => "4",
            Rank.Five => "5",
            Rank.Six => "6",
            Rank.Seven => "7",
            Rank.Eight => "8",
            Rank.Nine => "9",
            Rank.Ten => "10",
            Rank.Jack => "J",
            Rank.Queen => "Q",
            Rank.King => "K",
            Rank.Ace => "A",
            _ => Rank.ToString()
        };
        
        var suitSymbol = Suit switch
        {
            Suit.Club => "♣",
            Suit.Diamond => "♦",
            Suit.Heart => "♥",
            Suit.Spade => "♠",
            _ => Suit.ToString()
        };

        return rankSymbol + suitSymbol;
    }
}
