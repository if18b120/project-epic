<div>
    <?php
        include_once $_SERVER['DOCUMENT_ROOT'].'/p&p/utility/php/sql.php';

        if($selectCharStmt->bind_param("i", $_SESSION['uid']))
        {
            echo("<script>console.log('selectChar bound');</script>");
            if($selectCharStmt->execute())
            {
                echo("<script>console.log('selectChar executed')</script>");
                if($selectCharStmt->bind_result($foundcharid, $foundcharactername))
                {
                    echo("<script>console.log('selectChar result bound');</script>");
                    if($selectCharStmt->fetch())
                    {
                        do
                        {
                            echo
                            "<div>
                                $foundcharactername
                                <form action=\"/p&p/utility/php/postCatcher.php\" method=\"post\" >
                                    <button type=\"submit\" value=\"$foundcharid\" name=\"charselect\">Select</button>
                                </form>
                                <br>
                            </div>";
                        }
                        while($selectCharStmt->fetch());
                    }
                    else
                    {
                        echo
                        "<div>
                            No Chars!
                        </div>";
                    }
                }
                else
                {
                    echo("<script>console.log('selectChar not result bound');</script>");
                }
            }
            else
            {
                echo("<script>console.log('selectChar not executed')</script>");
            }
        }
        else
        {
            echo("<script>console.log('selectChar not bound');</script");
        }
        var_dump($_GET);
        var_dump($_POST);
    ?>

    <div>
        <form action="/p&p/utility/php/postCatcher.php" method="post">
            <button type="submit" value="charCreate" name="charCreate">Create new character</button>
        </form>
    </div>
</div>