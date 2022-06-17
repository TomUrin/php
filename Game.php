<?php

namespace game;

class Game {
    protected $player1;
    protected $player2;
    protected $flips = 1;

public function __construct(Player $player1, Player $player2) {
    $this->player1 = $player1;
    $this->player2 = $player2;
    }

    public function flip() {
        return rand(0, 1) ? 'heads' : 'tails';
    }

    public function start() {
        echo <<<EOT
        {$this->player1->name}: odds: {$this->player1->odds($this->player2)}
        <br>
        {$this->player2->name}: odds: {$this->player2->odds($this->player1)}
        <br>
        EOT;

        $this->play();
    }

    public function play() {
        while(true) {
      
       if($this->flip() == 'heads') {
            $this->player1->point($this->player2);
       } else {
            $this->player2->point($this->player1);
       }
       if($this->player1->bankrupt() || $this->player2->bankrupt()) {
            return $this->end();
    }
    $this->flips++;
}
}

    public function winner() : Player {
        return $this->player1->bank() > $this->player2->bank() ? $this->player1 : $this->player2;
}

    public function end() {
        echo <<<EOT
        Game over.
            <br>
            <br>
            Winner: {$this->winner()->name};
           <br>
           <br>
        {$this->player1->name}: {$this->player1->bank()}
        <br>
        <br>
        {$this->player2->name}: {$this->player2->bank()}
        <br>
        <br>
           
           Flips count: {$this->flips};
        EOT;
    }
}