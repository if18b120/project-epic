<!DOCTYPE html>

    <?php
        while(!session_start())
        {

        }
        if(!isset($_SESSION['usertype']))
        {
            HTTP_response_code(403);
            require $_SERVER['DOCUMENT_ROOT'].'/p&p/sites/error.php';
            exit();
        }
        else if($_SESSION['usertype'] != 'admin')
        {
            HTTP_response_code(403);
            require $_SERVER['DOCUMENT_ROOT'].'/p&p/sites/error.php';
            exit();
        }
        
    ?>
    <head>     
        <?php include $_SERVER['DOCUMENT_ROOT'].'/p&p/sites/header.php'; ?>
    </head>

    <body>
            <?php include $_SERVER['DOCUMENT_ROOT'].'/p&p/sites/navigation.php'; ?>
            
            <main>
                administration
                <?php
                    var_dump($_SESSION['usertype']);
                ?>
            </main>

            <?php include $_SERVER['DOCUMENT_ROOT'].'/p&p/utility/php/jsscriptincluder.php';?>
    </body>
    
</html>