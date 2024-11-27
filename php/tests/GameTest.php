<?php


use PHPUnit\Framework\TestCase;
use Trivia\Game;

class GameTest extends TestCase
{
    // A game must have at least 2 players to be playable
    public function testIsPlayable()
    {
        $game = new Game();
        $this->assertFalse($game->isPlayable());
        $game->add('John');
        $this->assertFalse($game->isPlayable());
        $game->add('Jane');
        $this->assertTrue($game->isPlayable());
        $game->add('Oliver');
        $game->add('Steven');
        $game->add('Alice');
        $game->add('Bob');
        $this->assertTrue($game->isPlayable());
        $game->add('Charlie');
        $this->assertFalse($game->isPlayable());
    }

    // A player that get’s into prison always stays there
    public function testPlayerInPenaltyBox()
    {
        $game = new Game();
        $game->add('John');
        $game->add('Jane');
        $game->add('Oliver');
        $game->add('Steven');
        $game->add('Alice');
        $game->add('Bob');
        $game->add('Charlie');
        $game->roll(1);
        $this->assertTrue($game->inPenaltyBox[0]);
        $game->roll(1);
        $this->assertTrue($game->inPenaltyBox[1]);
        $game->roll(1);
        $this->assertTrue($game->inPenaltyBox[2]);
        $game->roll(1);
        $this->assertTrue($game->inPenaltyBox[3]);
        $game->roll(1);
        $this->assertTrue($game->inPenaltyBox[4]);
        $game->roll(1);
        $this->assertTrue($game->inPenaltyBox[5]);
        $game->roll(1);
        $this->assertTrue($game->inPenaltyBox[6]);
    }

    // Check the game does not run out of questions
    public function testQuestions()
    {
        $game = new Game();
        $game->add('John');
        $game->add('Jane');
        $game->add('Oliver');
        $game->add('Steven');
        $game->add('Alice');
        $game->add('Bob');
        $game->add('Charlie');
        $game->roll(1);
        $this->assertNotEmpty($game->currentCategory());
        $game->roll(1);
        $this->assertNotEmpty($game->currentCategory());
    }
}
