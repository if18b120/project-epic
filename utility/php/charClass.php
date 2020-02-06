<?php
    //function to select char somewhere else, create new char class -> $_SESSION, header -> char.php with char id
    include_once 'sql.php';    

    class character
    {
        public $charid;
        public $name = "Unnamed Char";
        public $level = 0;
        public $xp = 0;
        public $lp = 10;
        public $race = "";
        public $sex = "";
        public $hp = 5;
        public $mp = 5;
        public $wealth = 0;
        public $ini = 1;
        public $def = 1;
        public $stk = 1;
        public $koe = 1;
        public $int = 1;
        public $magic = array("fire" => 0, "water" => 0, "wind" => 0, "earth" => 0, "light" => 0, "dark" => 0, "neutral" => 0);
        //1048575 -> bit encoding 101 101 101 101 101 101 11
        public $encMagic = 0;

        public function encodeMagic()
        {
            $this->encMagic = $this->magic['fire'];
            $this->encMagic = $this->encMagic << 3;

            $this->encMagic += $this->magic['water'];
            $this->encMagic = $this->encMagic << 3;

            $this->encMagic += $this->magic['wind'];
            $this->encMagic = $this->encMagic << 3;

            $this->encMagic += $this->magic['earth'];
            $this->encMagic = $this->encMagic << 3;

            $this->encMagic += $this->magic['light'];
            $this->encMagic = $this->encMagic << 3;

            $this->encMagic += $this->magic['dark'];
            $this->encMagic = $this->encMagic << 2;

            $this->encMagic += $this->magic['neutral'];
        }

        public function decodeMagic()
        {
            $this->magic['neutral'] = $this->encMagic & 0b11;
            $this->encMagic = $this->encMagic >> 2;

            $this->magic['dark'] = $this->encMagic & 0b111;
            $this->encMagic = $this->encMagic >> 3;

            $this->magic['light'] = $this->encMagic & 0b111;
            $this->encMagic = $this->encMagic >> 3;

            $this->magic['earth'] = $this->encMagic & 0b111;
            $this->encMagic = $this->encMagic >> 3;

            $this->magic['wind'] = $this->encMagic & 0b111;
            $this->encMagic = $this->encMagic >> 3;

            $this->magic['water'] = $this->encMagic & 0b111;
            $this->encMagic = $this->encMagic >> 3;

            $this->magic['fire'] = $this->encMagic & 0b111;
        }

        function create()
        {
            if($GLOBALS['createCharStmt']->bind_param("isiiissiiiiiiii", $_SESSION['uid'], $this->name, $this->level, $this->xp, $this->lp, $this->race, $this->sex, $this->hp, $this->mp, $this->wealth, $this->ini, $this->def, $this->stk, $this->koe, $this->int))
            {
                echo("<script>console.log('createChar bound');</script>");
            }
            else
            {
                echo("<script>console.log('createChar not bound');</script>");
                exit();
            }

            if($GLOBALS['createCharStmt']->execute())
            {
                echo("<script>console.log('createChar executed');</script>");
            }
            else
            {
                echo("<script>console.log('createChar not executed');</script>");
                exit();
            }
            $this->charid = $GLOBALS['createCharStmt']->insert_id;
        }

        public function load()
        {
            if($GLOBALS['loadCharStmt']->bind_param("i", $this->charid))
            {
                echo("<script>console.log('loadChar bound');</script>");
                if($GLOBALS['loadCharStmt']->execute())
                {
                    echo("<script>console.log('loadChar executed');</script>");
                    if($GLOBALS['loadCharStmt']->bind_result($this->name, $this->level, $this->xp, $this->lp, $this->race, $this->sex, $this->hp, $this->mp, $this->wealth, $this->ini, $this->def, $this->stk, $this->koe, $this->int, $this->encMagic))
                    {
                        echo("<script>console.log('loadChar bound result');</script>");
                        if($GLOBALS['loadCharStmt']->fetch())
                        {
                            echo("<script>console.log('loadChar fetched');</script>");
                            $this->decodeMagic();
                        }
                        else
                        {
                            echo("<script>console.log('loadChar not fetched');</script>");
                            exit();
                        }
                    }
                    else
                    {
                        echo("<script>console.log('loadChar not bound result');</script>");
                        exit();
                    }
                }
                else
                {
                    echo("<script>console.log('loadChar not executed');</script>");
                    exit();
                }
            }
            else
            {
                echo("<script>console.log('loadChar not bound');</script>");
                exit();
            }
        }

        public function save()
        {
            $this->encodeMagic();
            $GLOBALS['saveCharStmt']->bind_param("siiissiiiiiiii", $this->name, $this->level, $this->xp, $this->lp, $this->race, $this->sex, $this->hp, $this->mp, $this->wealth, $this->ini, $this->def, $this->stk, $this->koe, $this->int, $this->encMagic);
            $GLOBALS['saveCharStmt']->execute();
        }
    }
?>