<?php

    $sqlconn = new mysqli("localhost", "root", "root", "pnp");
    if ($sqlconn->connect_error)
    {
        die("Connection failed: " . $sqlconn->connect_error);
    }
    echo("<script>console.log('SQL Connected');</script>");

    $registerStmt = $sqlconn->stmt_init();
    $loginStmt = $sqlconn->stmt_init();
    $selectCharStmt = $sqlconn->stmt_init();
    $createCharStmt = $sqlconn->stmt_init();
    $loadCharStmt = $sqlconn->stmt_init();
    $saveCharStmt = $sqlconn->stmt_init();

    
    if($registerStmt->prepare("INSERT INTO user (username, passwordhash) VALUES (?, ?)"))
    {
        echo("<script>console.log('register prepared');</script>");
    }
    else
    {
        echo("<script>console.log('register not prepared');</script>");
    }

    if($loginStmt->prepare("SELECT uid, username, passwordhash, admin, GM FROM user WHERE username = ?"))
    {
        echo("<script>console.log('login prepared');</script>");
    }
    else
    {
        echo("<script>console.log('login not prepared');</script>");
    }

    if($selectCharStmt->prepare("SELECT charid, charactername FROM chars WHERE uid = ?"))
    {
        echo("<script>console.log('selectCharStmt prepared');</script>");
    }
    else
    {
        echo("<script>console.log('selectCharStmt not prepared');</script>");
    }
    
    if($createCharStmt->prepare("INSERT INTO chars (uid, charactername, level, xp, lp, race, sex, hp, mp, wealth, ini, def, stk, koe, inte) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"))
    {
        echo("<script>console.log('createChar prepared');</script>");
    }
    else
    {
        echo("<script>console.log('createChar not prepared');</script>");
    }

    if($loadCharStmt->prepare("SELECT charactername, level, xp, lp, race, sex, hp, mp, wealth, ini, def, stk, koe, inte, magic FROM chars WHERE charid = ?"))
    {
        echo("<script>console.log('loadChar prepared');</script>");
    }
    else
    {
        echo("<script>console.log('loadChar not prepared');</script>");
    }
    
    if($saveCharStmt->prepare("UPDATE chars SET charactername = ?, level = ?, xp = ?, lp = ?, race = ?, sex = ?, hp = ?, mp = ?, wealth = ?, ini = ?, def = ?, stk = ?, koe = ?, inte = ?, magic = ? WHERE charid = ?"))
    {
        echo("<script>console.log('saveChar prepared');</script>");
    }
    else
    {
        echo("<script>console.log('saveChar not prepared');</script>");
    }
    
    
    

?>