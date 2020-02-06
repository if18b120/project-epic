<?php
    include_once 'userScripts.php';
    include_once 'charClass.php';
    while(!session_start())
    {

    }
    if(isset($_POST['loginusername']))
    {
        login($_POST['loginusername'], $_POST['loginpassword']);   
    }

    if(isset($_POST['register']))
    {
        register($_POST['registerUsername'], $_POST['registerPassword']);
    }

    if(isset($_POST['logout']))
    {
        logout();
    }

    if(isset($_POST['charCreate']))
    {
        $_SESSION['char'] = new character;
        $_SESSION['char']->create();
        header("location: /p&p/sites/char.php");
    }

    if(isset($_POST['charselect']))
    {
        $_SESSION['char'] = new character;
        $_SESSION['char']->charid = $_POST['charselect'];
        $_SESSION['char']->load();
        header("location: /p&p/sites/char.php");
    }

    if(isset($_SESSION['charSave']))
    {
        $_SESSION['char']->level = $_POST['lvl'];
        $_SESSION['char']->xp = $_POST['xp'];
        $_SESSION['char']->lp = $_POST['lp'];
        $_SESSION['char']->wealth = $_POST['wealth'];
        $_SESSION['char']->magic['fire'] = $_POST['fire'];
        $_SESSION['char']->magic['water'] = $_POST['water'];
        $_SESSION['char']->magic['wind'] = $_POST['wind'];
        $_SESSION['char']->magic['earth'] = $_POST['earth'];
        $_SESSION['char']->magic['light'] = $_POST['light'];
        $_SESSION['char']->magic['dark'] = $_POST['dark'];
        $_SESSION['char']->magic['neutral'] = $_POST['neutral'];
        $_SESSION['char']->ini = $_POST['ini'];
        $_SESSION['char']->stk = $_POST['stk'];
        $_SESSION['char']->koe = $_POST['koe'];
        $_SESSION['char']->int = $_POST['int'];
        $_SESSION['char']->save();
        header("location: /p&p/sites/char.php");
    }

    if(isset($_POST['charUpdate']))
    {

    }
?>