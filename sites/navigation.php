<nav class="navbar navbar-expand">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link" href="/p&p/index.php">Home</a>
        </li>
        <?php 
            if(isset($_SESSION['usertype']))
            {
                if($_SESSION['usertype'] != 'anonymous')
                {
                    echo
                    "<li class=\"nav-item\">
                        <a class=\"nav-link\" href=\"/p&p/sites/char.php\">Characters</a>
                    </li>";
                }
                if($_SESSION['usertype'] == 'admin' || $_SESSION['usertype'] == 'GM')
                {
                    echo
                    "<li class=\"nav-item\">
                        <a class=\"nav-link\" href=\"/p&p/sites/items.php\">Items</a>
                    </li>
                    <li class=\"nav-item\">
                            <a class=\"nav-link\" href=\"/p&p/sites/npcs.php\">Npcs</a>
                    </li>";
                }
                if($_SESSION['usertype'] == 'admin')
                {
                    echo
                    "<li class=\"nav-item\">
                            <a class=\"nav-link\" href=\"/p&p/sites/administration.php\">Administration</a>
                    </li>";
                }
                echo "</ul>
                    <ul class=\"navbar-nav ml-auto\">";
                if($_SESSION['usertype'] == 'anonymous')
                {
                    echo
                    "<li class=\"dropdown dropleft\">
                        <a class=\"nav-link dropdown-toggle\" id=\"navbardrop\" data-toggle=\"dropdown\" href=\"\">Login</a>
                        <div class=\"dropdown-menu\" id=\"formLogin\">
                            <div class=\"row\">
                                <div class=\"container-fluid\">
                                    <form class=\"\" action=\"/p&p/utility/php/postCatcher.php\" method=\"post\">
                                        Username:<br>
                                        <input type=\"text\" name=\"loginusername\"><br>
                                        Password:<br>
                                        <input type=\"text\" name=\"loginpassword\"><br>
                                        <input type=\"submit\" value=\"Login\">
                                    </form>
                                    <br>
                                    <p>No account?</p>
                                    <a href=\"/p&p/sites/register.php\">Register here</a>
                                </div>
                            </div>
                        </div>
                    </li>";
                }
                else
                {
                    echo
                    "<span class=\"navbar-text\">
                        Logged in as: ".$_SESSION['user']."
                    </span>
                    <li class=\"nav-item\">
                        <form class=\"\" action=\"/p&p/utility/php/postCatcher.php\" method=\"post\">
                            <button type=\"submit\" class=\"btn navbar-btn\" name=\"logout\" value=\"logout\">Logout</button>
                        </form>

                    </li>";


                }
            }
            
        ?>
    </ul>
</nav>

