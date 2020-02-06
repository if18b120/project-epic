<!DOCTYPE html>

    <?php
        while(!session_start())
        {

        }
        if(!isset($_SESSION['usertype']))
        {
            $_SESSION['usertype'] = 'anonymous';
        }
        
    ?>
    <head>     
        <?php include $_SERVER['DOCUMENT_ROOT'].'/p&p/sites/header.php'; ?>
    </head>

    <body>
            <?php include $_SERVER['DOCUMENT_ROOT'].'/p&p/sites/navigation.php'; ?>
            
            <main>
                    <form action="/p&p/utility/php/postCatcher.php" method="post">
                        <input type="text" name="registerUsername" placeholder="Username">
                        <input type="text" name="registerPassword" placeholder="Password">
                        <input type="submit" name="register" value="Register">
                    </form>
            </main>

            <?php include $_SERVER['DOCUMENT_ROOT'].'/p&p/utility/php/jsscriptincluder.php';?>
    </body>
    
</html>

