using _2_2.Showdown;
using pokerGame = _2_2.Showdown.Game;
using pokerPlayer = _2_2.Showdown.Player;
using unoGame = _2_2.Uno.Game;
using unoPlayer = _2_2.Uno.Player;
using unoHumanPlayer = _2_2.Uno.HumanPlayer;
using unoAIPlayer = _2_2.Uno.AIPlayer;


Console.WriteLine("選擇遊戲：1. showdown 2. uno");
var selectGame = Console.ReadLine();

if (selectGame == "1")
{
    var p1 = new HumanPlayer();
    var p2 = new AIPlayer();
    var p3 = new AIPlayer();
    var p4 = new AIPlayer();
    List<pokerPlayer> players = [p1, p2, p3, p4];
    var game = new pokerGame(players);
    game.Start();
} else if (selectGame == "2")
{
    var p1 = new unoHumanPlayer();
    var p2 = new unoAIPlayer();
    var p3 = new unoAIPlayer();
    var p4 = new unoAIPlayer();
    List<unoPlayer> players = [p1, p2, p3, p4];
    var game = new unoGame(players);
    game.Start();
} else
{
    Console.WriteLine("輸入錯誤");
}