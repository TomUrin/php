<?php
namespace front;

use front\game;



$game = new Game(
    new Player('Joe', 10000),
    new Player('Jane', 100)
);

Game::start();