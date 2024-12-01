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
}
