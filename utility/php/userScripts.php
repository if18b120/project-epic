<?php
    
    include_once 'sql.php';
    
    function register($username, $password)
    {
        
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $GLOBALS['registerStmt']->bind_param("ss", $username, $passwordHash);
        if($GLOBALS['registerStmt']->execute())
        {
            echo("<script>console.log('registerStmt succeeded');</script>");
        }
        else
        {
            echo("<script>console.log('registerStmt failed');</script>");
        }
        login($username, $password);
    }

    function login($username, $password)
    {
            $GLOBALS['loginStmt']->bind_param("s", $username);
            if($GLOBALS['loginStmt']->execute())
            {
                echo("<script>console.log('loginStmt succeeded');</script>");
                if($GLOBALS['loginStmt']->bind_result($founduid, $foundusername, $foundhash, $foundadmin, $foundGM))
                {
                    echo("<script>console.log('loginStmt bind');</script>");
                    if($GLOBALS['loginStmt']->fetch())
                    {                        
                        echo("<script>console.log('loginStmt fetch');</script>");
                    }
                    else
                    {
                        echo("<script>console.log('loginStmt fetch failed');</script>");
                    }
                    if(password_verify($password, trim($foundhash)))
                    {
                        echo("<script>console.log('login');</script>");
                        $_SESSION['user'] = $username;
                        $_SESSION['uid'] = $founduid;
                        if($foundadmin == 1)
                        {
                            $_SESSION['usertype'] = 'admin';
                        }
                        else if($foundGM == 1)
                        {
                            $_SESSION['usertype'] = 'GM';
                        }
                        else
                        {
                            $_SESSION['usertype'] = 'user';
                        }
                        header("location: /p&p/");
                    }
                    else
                    {
                        echo("<script>console.log('login failed');</script>");
                    }
                }
            }
            else
            {
                echo("<script>console.log('loginStmt failed');</script>");
            }
    }

    function logout()
    {
        session_regenerate_id();
        session_destroy();
        header("location: /p&p/");
    }


?>