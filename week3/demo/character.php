<?php

class Character{

    private $playerName;

    private static $playerCount;
    private $playerHealth;

    public function __construct($p){

        echo "New player has entered the game!";
        $this->playerName = $p;
        $this->health = 100;

        self::$playerCount++;

    }
    public function setPlayerName($p){
        $this->playerName = $p;
    }
    public function getPlayerName(){
        return $this->playerName;
    }

    public static function getPlayerCount(){
        return self::$playerCount;

    }
    public static function setPlayerHealth($h){
        $this->playerHealth = $h;
    }
    public static function getPlayerHealth(){
        return $this->playerHealth;
    }


}


class wizard extends Character{
    private $attack;
    private $defense;
    private $magic;



    public function __construct($p, $a, $d, $m){
        $this->attack = $a;
        $this->defense = $d;
        $this->magic = $m;

        parent::__construct($p);




    }
    public function setAttack($a){
        $this->attack = $a;
    }
    public function getAttack(){
        return $this->attack;
    }
    public function setDefense($d){
        $this->defense = $d;
    }
    public function getDefense(){
        return $this->defense;
    }
    public function setMagic($m){
        $this->magic = $m;
    }
    public function getMagic(){
        return $this->magic;
    }

}




$player1 = new Character("Doug401");
echo "<hr>";
echo $player1->getPlayerName();

echo "<hr>";
$player1->setPlayerName("NoobSlayer6969420");

echo "<hr>";
echo $player1->getPlayerName();
echo "<br>";

echo "Player count is: ", Character::getPlayerCount();

echo "<hr>";
$player2 = new Character("Chad");
echo "<br>";

echo "Player count is ", Character::getPlayerCount();

echo "<hr>";

$player = new Wizard("Harry Potter", 45, 40, 90);

echo "<br>";
echo "Magic: ", $player->getMagic();
echo "<br>";
$player->setMagic(99);
echo "Magic: ", $player->getMagic();



?>
<?php $file = basename($_SERVER['PHP_SELF']);
        $mod_date=date("F d Y h:i:s A", filemtime($file));
        echo "File last updated $mod_date ";
        ?>
