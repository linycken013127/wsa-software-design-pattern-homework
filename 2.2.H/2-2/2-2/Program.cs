using _2_2.Showdown;
using Game = _2_2.Showdown.Game;
using Player = _2_2.Showdown.Player;

var p1 = new HumanPlayer();
var p2 = new AIPlayer();
var p3 = new AIPlayer();
var p4 = new AIPlayer();
List<Player> players = [p1, p2, p3, p4];
var deck = new Deck();
var game = new Game(players, deck);
game.Start();

