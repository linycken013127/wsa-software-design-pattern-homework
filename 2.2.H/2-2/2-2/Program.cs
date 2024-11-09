using _2_2.Showdown;
using Game = _2_2.Showdown.Game;
using Player = _2_2.Showdown.Player;

Console.WriteLine("選擇遊戲：1. showdown 2. uno");
var selectGame = Console.ReadLine();

if (selectGame == "1")
{
    var p1 = new HumanPlayer();
    var p2 = new AIPlayer();
    var p3 = new AIPlayer();
    var p4 = new AIPlayer();
    List<Player> players = [p1, p2, p3, p4];
    var deck = new Deck();
    var game = new Game(players, deck);
    game.Start();
} else if (selectGame == "2")
{
    Console.WriteLine("尚未實作");
} else
{
    Console.WriteLine("輸入錯誤");
}

