<?php

    
    echo
        "<div class=\"container\">
            <div class=\"row\">
                <div class=\"col-3\">
                    Name: <span id=\"namtxt\">".$_SESSION['char']->name."</span>
                    <br>
                    Level: <span id=\"lvltxt\">".$_SESSION['char']->level."</span>
                    <br>
                    Xp: <span id=\"xptxt\">".$_SESSION['char']->xp."</span>/<span id=\"neededxp\">0</span>
                    <br>
                    <div class=\"row\">
                        <div class=\"col-4 text-right\">
                            <svg height=\"15\" width=\"15\" viewBox=\"0 0 100 100\" onmouseover=\"pluskey(event, this);\" onmouseout=\"pluskey(event, this);\" onclick=\"addxp(this)\">
                                <g>
                                    <rect height=\"100\" width=\"100\" style=\"fill:#FFFFFF; fill-opacity:0.5;\"/>
                                    <path style=\"fill:#00D000;\" d=\"M41 5 h18 v36 h36 v18 h-36 v36 h-18 v-36 h-36 v-18 h36 v-36z\"/>
                                </g>
                            </svg>
                            <svg height=\"15\" width=\"15\" viewBox=\"0 0 100 100\" onmouseover=\"minuskey(event, this);\" onmouseout=\"minuskey(event, this);\">
                                <g>
                                    <rect height=\"100\" width=\"100\" style=\"fill:#FFFFFF; fill-opacity:0.5;\"/>
                                    <path style=\"fill:#EF0000;\" d=\"M5 41 h90 v18 h-90 v-18z\"/>
                                </g>
                            </svg>
                        </div>
                        <div class=\"col-8\" style=\"padding:0;\">
                            <input type=\"text\" style=\"width: 100%\" placeholder=\"Experience Points\">
                        </div>
                    </div>
                    Lp: <span id=\"lptxt\">".$_SESSION['char']->lp."</span>
                    <br>
                    Race: <span id=\"racetxt\">".$_SESSION['char']->race."</span>
                    <br>
                    Sex: <span id=\"sextxt\">".$_SESSION['char']->sex."</span>
                    <br>
                    HP: <span id=\"hptxt\">".$_SESSION['char']->hp."</span>
                    MP: <span id=\"mptxt\">".$_SESSION['char']->mp."</span>
                    <br>
                    Wealth: <span id=\"wealthtxt\">".$_SESSION['char']->wealth."</span>
                </div>


                <div class=\"col-9\">
                    Magical attributes:<br>
                    <div class=\"row\">
                        <div class=\"col-6\">
                            <div class=\"row\">
                                <div class=\"col-3\">
                                    Fire<br>
                                    <svg height=\"15\" width=\"15\" viewBox=\"0 0 100 100\" onmouseover=\"minuskey(event, this);\" onmouseout=\"minuskey(event, this);\">
                                        <g>
                                            <rect height=\"100\" width=\"100\" style=\"fill:#FFFFFF; fill-opacity:0.5;\"/>
                                            <path style=\"fill:#EF0000;\" d=\"M5 41 h90 v18 h-90 v-18z\"/>
                                        </g>
                                    </svg>
                                    <span id=\"fire\">".$_SESSION['char']->magic['fire']."</span>
                                    <svg height=\"15\" width=\"15\" viewBox=\"0 0 100 100\" class=\"pluskey\" onmouseover=\"pluskey(event, this);\" onmouseout=\"pluskey(event, this);\" onclick=\"pluskey(event, this)\">
                                        <g>
                                            <rect height=\"100\" width=\"100\" style=\"fill:#FFFFFF; fill-opacity:0.5;\"/>
                                            <path style=\"fill:#00D000;\" d=\"M41 5 h18 v36 h36 v18 h-36 v36 h-18 v-36 h-36 v-18 h36 v-36z\"/>
                                        </g>
                                    </svg>
                                </div>
                                <div class=\"col-3\">
                                    Water<br>

                                    <!--minus-->
                                    <svg height=\"15\" width=\"15\" viewBox=\"0 0 100 100\" onmouseover=\"minuskey(event, this);\" onmouseout=\"minuskey(event, this);\">
                                        <g>
                                            <rect height=\"100\" width=\"100\" style=\"fill:#FFFFFF; fill-opacity:0.5;\"/>
                                            <path style=\"fill:#EF0000;\" d=\"M5 41 h90 v18 h-90 v-18z\"/>
                                        </g>
                                    </svg>
                                    <span id=\"water\">".$_SESSION['char']->magic['water']."</span>

                                    <!--plus-->
                                    <svg height=\"15\" width=\"15\" viewBox=\"0 0 100 100\" class=\"pluskey\"  onmouseover=\"pluskey(event, this);\" onmouseout=\"pluskey(event, this);\">
                                        <g>
                                            <rect height=\"100\" width=\"100\" style=\"fill:#FFFFFF; fill-opacity:0.5;\"/>
                                            <path style=\"fill:#00D000;\" d=\"M41 5 h18 v36 h36 v18 h-36 v36 h-18 v-36 h-36 v-18 h36 v-36z\"/>
                                        </g>
                                    </svg>
                                </div>
                                <div class=\"col-3\">
                                    Wind<br>
                                    <svg height=\"15\" width=\"15\" viewBox=\"0 0 100 100\" onmouseover=\"minuskey(event, this);\" onmouseout=\"minuskey(event, this);\">
                                        <g>
                                            <rect height=\"100\" width=\"100\" style=\"fill:#FFFFFF; fill-opacity:0.5;\"/>
                                            <path style=\"fill:#EF0000;\" d=\"M5 41 h90 v18 h-90 v-18z\"/>
                                        </g>
                                    </svg>
                                    <span id=\"wind\">".$_SESSION['char']->magic['wind']."</span>
                                    <svg height=\"15\" width=\"15\" viewBox=\"0 0 100 100\" class=\"pluskey\"  onmouseover=\"pluskey(event, this);\" onmouseout=\"pluskey(event, this);\">
                                        <g>
                                            <rect height=\"100\" width=\"100\" style=\"fill:#FFFFFF; fill-opacity:0.5;\"/>
                                            <path style=\"fill:#00D000;\" d=\"M41 5 h18 v36 h36 v18 h-36 v36 h-18 v-36 h-36 v-18 h36 v-36z\"/>
                                        </g>
                                    </svg>
                                </div>
                                <div class=\"col-3\">
                                    Earth<br>
                                    <svg height=\"15\" width=\"15\" viewBox=\"0 0 100 100\" onmouseover=\"minuskey(event, this);\" onmouseout=\"minuskey(event, this);\">
                                        <g>
                                            <rect height=\"100\" width=\"100\" style=\"fill:#FFFFFF; fill-opacity:0.5;\"/>
                                            <path style=\"fill:#EF0000;\" d=\"M5 41 h90 v18 h-90 v-18z\"/>
                                        </g>
                                    </svg>
                                    <span id=\"earth\">".$_SESSION['char']->magic['earth']."</span>
                                    <svg height=\"15\" width=\"15\" viewBox=\"0 0 100 100\" class=\"pluskey\"  onmouseover=\"pluskey(event, this);\" onmouseout=\"pluskey(event, this);\">
                                        <g>
                                            <rect height=\"100\" width=\"100\" style=\"fill:#FFFFFF; fill-opacity:0.5;\"/>
                                            <path style=\"fill:#00D000;\" d=\"M41 5 h18 v36 h36 v18 h-36 v36 h-18 v-36 h-36 v-18 h36 v-36z\"/>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class=\"col-6\">
                            <div class=\"row\">
                                <div class=\"col-3\">
                                    Light<br>
                                    <svg height=\"15\" width=\"15\" viewBox=\"0 0 100 100\" onmouseover=\"minuskey(event, this);\" onmouseout=\"minuskey(event, this);\">
                                        <g>
                                            <rect height=\"100\" width=\"100\" style=\"fill:#FFFFFF; fill-opacity:0.5;\"/>
                                            <path style=\"fill:#EF0000;\" d=\"M5 41 h90 v18 h-90 v-18z\"/>
                                        </g>
                                    </svg>
                                    <span id=\"light\">".$_SESSION['char']->magic['light']."</span>
                                    <svg height=\"15\" width=\"15\" viewBox=\"0 0 100 100\" class=\"pluskey\" onmouseover=\"pluskey(event, this);\" onmouseout=\"pluskey(event, this);\">
                                        <g>
                                            <rect height=\"100\" width=\"100\" style=\"fill:#FFFFFF; fill-opacity:0.5;\"/>
                                            <path style=\"fill:#00D000;\" d=\"M41 5 h18 v36 h36 v18 h-36 v36 h-18 v-36 h-36 v-18 h36 v-36z\"/>
                                        </g>
                                    </svg>
                                </div>
                                <div class=\"col-3\">
                                    Dark<br>
                                    <svg height=\"15\" width=\"15\" viewBox=\"0 0 100 100\" onmouseover=\"minuskey(event, this);\" onmouseout=\"minuskey(event, this);\">
                                        <g>
                                            <rect height=\"100\" width=\"100\" style=\"fill:#FFFFFF; fill-opacity:0.5;\"/>
                                            <path style=\"fill:#EF0000;\" d=\"M5 41 h90 v18 h-90 v-18z\"/>
                                        </g>
                                    </svg>
                                    <span id=\"dark\">".$_SESSION['char']->magic['dark']."</span>
                                    <svg height=\"15\" width=\"15\" viewBox=\"0 0 100 100\" class=\"pluskey\" onmouseover=\"pluskey(event, this);\" onmouseout=\"pluskey(event, this);\">
                                        <g>
                                            <rect height=\"100\" width=\"100\" style=\"fill:#FFFFFF; fill-opacity:0.5;\"/>
                                            <path style=\"fill:#00D000;\" d=\"M41 5 h18 v36 h36 v18 h-36 v36 h-18 v-36 h-36 v-18 h36 v-36z\"/>
                                        </g>
                                    </svg>
                                </div>
                                <div class=\"col-3\">
                                    Neutral<br>
                                    <svg height=\"15\" width=\"15\" viewBox=\"0 0 100 100\" onmouseover=\"minuskey(event, this);\" onmouseout=\"minuskey(event, this);\">
                                        <g>
                                            <rect height=\"100\" width=\"100\" style=\"fill:#FFFFFF; fill-opacity:0.5;\"/>
                                            <path style=\"fill:#EF0000;\" d=\"M5 41 h90 v18 h-90 v-18z\"/>
                                        </g>
                                    </svg>
                                    <span id=\"neutral\">".$_SESSION['char']->magic['neutral']."</span>
                                    <svg height=\"15\" width=\"15\" viewBox=\"0 0 100 100\" class=\"pluskey\" onmouseover=\"pluskey(event, this);\" onmouseout=\"pluskey(event, this);\">
                                        <g>
                                            <rect height=\"100\" width=\"100\" style=\"fill:#FFFFFF; fill-opacity:0.5;\" onmouseover=\"this.style='fill:#909090; fill-opacity:0.5;'\" onmouseout=\"this.style='fill:#FFFFFF; fill-opacity:0.5;'\"/>
                                            <path style=\"fill:#00D000;\" d=\"M41 5 h18 v36 h36 v18 h-36 v36 h-18 v-36 h-36 v-18 h36 v-36z\" onmouseover=\"previousElementSibling.style='fill:#909090; fill-opacity:0.5;'\" onmouseout=\"previousElementSibling.style='fill:#FFFFFF; fill-opacity:0.5;'\"/>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>


                    <br>
                    Attributes:
                    <br>
                    <div class=\"row\">
                        <div class=\"col-6\">
                            INI:
                            <svg height=\"15\" width=\"15\" viewBox=\"0 0 100 100\" onmouseover=\"minuskey(event, this);\" onmouseout=\"minuskey(event, this);\">
                                <g>
                                    <rect height=\"100\" width=\"100\" style=\"fill:#FFFFFF; fill-opacity:0.5;\"/>
                                    <path style=\"fill:#EF0000;\" d=\"M5 41 h90 v18 h-90 v-18z\"/>
                                </g>
                            </svg>
                            <span id=\"ini\">".$_SESSION['char']->ini."</span>
                            <svg height=\"15\" width=\"15\" viewBox=\"0 0 100 100\" class=\"pluskey\" onmouseover=\"pluskey(event, this);\" onmouseout=\"pluskey(event, this);\">
                                <g>
                                    <rect height=\"100\" width=\"100\" style=\"fill:#FFFFFF; fill-opacity:0.5;\"/>
                                    <path style=\"fill:#00D000;\" d=\"M41 5 h18 v36 h36 v18 h-36 v36 h-18 v-36 h-36 v-18 h36 v-36z\"/>
                                </g>
                            </svg>
                        </div>
                        <div class=\"col-6\">
                            STK:
                            <svg height=\"15\" width=\"15\" viewBox=\"0 0 100 100\" onmouseover=\"minuskey(event, this);\" onmouseout=\"minuskey(event, this);\">
                                <g>
                                    <rect height=\"100\" width=\"100\" style=\"fill:#FFFFFF; fill-opacity:0.5;\"/>
                                    <path style=\"fill:#EF0000;\" d=\"M5 41 h90 v18 h-90 v-18z\"/>
                                </g>
                            </svg>
                            <span id=\"stk\">".$_SESSION['char']->stk."</span>
                            <svg height=\"15\" width=\"15\" viewBox=\"0 0 100 100\" class=\"pluskey\" onmouseover=\"pluskey(event, this);\" onmouseout=\"pluskey(event, this);\">
                                <g>
                                    <rect height=\"100\" width=\"100\" style=\"fill:#FFFFFF; fill-opacity:0.5;\"/>
                                    <path style=\"fill:#00D000;\" d=\"M41 5 h18 v36 h36 v18 h-36 v36 h-18 v-36 h-36 v-18 h36 v-36z\"/>
                                </g>
                            </svg>
                        </div>
                    </div>
                    <br>
                    <div class=\"row\">
                        <div class=\"col-6\">
                            DEF: 
                            <span id=\"def\">".$_SESSION['char']->def."</span>
                        </div>
                        <div class=\"col-6\">
                            KOE: 
                            <svg height=\"15\" width=\"15\" viewBox=\"0 0 100 100\" onmouseover=\"minuskey(event, this);\" onmouseout=\"minuskey(event, this);\">
                                <g>
                                    <rect height=\"100\" width=\"100\" style=\"fill:#FFFFFF; fill-opacity:0.5;\"/>
                                    <path style=\"fill:#EF0000;\" d=\"M5 41 h90 v18 h-90 v-18z\"/>
                                </g>
                            </svg>
                            <span id=\"koe\">".$_SESSION['char']->koe."</span>
                            <svg height=\"15\" width=\"15\" viewBox=\"0 0 100 100\" class=\"pluskey\" onmouseover=\"pluskey(event, this);\" onmouseout=\"pluskey(event, this);\">
                                <g>
                                    <rect height=\"100\" width=\"100\" style=\"fill:#FFFFFF; fill-opacity:0.5;\"/>
                                    <path style=\"fill:#00D000;\" d=\"M41 5 h18 v36 h36 v18 h-36 v36 h-18 v-36 h-36 v-18 h36 v-36z\"/>
                                </g>
                            </svg>
                        </div>
                    </div>
                    <br>
                    <div class=\"row\">
                        <div class=\"col-12 text-center\">
                            INT:
                            <svg height=\"15\" width=\"15\" viewBox=\"0 0 100 100\" onmouseover=\"minuskey(event, this);\" onmouseout=\"minuskey(event, this);\">
                                <g>
                                    <rect height=\"100\" width=\"100\" style=\"fill:#FFFFFF; fill-opacity:0.5;\"/>
                                    <path style=\"fill:#EF0000;\" d=\"M5 41 h90 v18 h-90 v-18z\"/>
                                </g>
                            </svg>
                            <span id=\"int\">".$_SESSION['char']->int."</span>
                            <svg height=\"15\" width=\"15\" viewBox=\"0 0 100 100\" class=\"pluskey\" onmouseover=\"pluskey(event, this);\" onmouseout=\"pluskey(event, this);\">
                                <g>
                                    <rect height=\"100\" width=\"100\" style=\"fill:#FFFFFF; fill-opacity:0.5;\"/>
                                    <path style=\"fill:#00D000;\" d=\"M41 5 h18 v36 h36 v18 h-36 v36 h-18 v-36 h-36 v-18 h36 v-36z\"/>
                                </g>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class=\"text-right\">
                <button>Reset</button>
                <button onclick=\"createForm()\">Save</button>
            </div>
        </div>
        <script src=\"/p&p/utility/js/charform.js\"></script>
        <script>
            document.getElementById('lvltxt').innerHTML = 0;
            document.getElementById('neededxp').innerHTML = calcNeededXp(document.getElementById('lvltxt').innerHTML)
            document.getElementById('lptxt').innerHTML = 1;


            var lptrack = document.getElementById('lptxt').innerHTML;

            var fire = 0;
            var water = 0;
            var wind = 0;
            var earth = 0;
            var light = 0;
            var dark = 0;
            var neutral = 0;
            var ini = 0;
            var stk = 0;
            var koe = 0;
            var int = 0;

            function resize(elem)
            {
                var newWidth = getWidth(elem.innerHTML);
                console.log(newWidth);
            }
            function getWidth(text)
            {
                var span = document.createElement('span');
                span.innerHTML = text;
                document.body.appendChild(span);
                var newWidth = span.getBoundingClientRect().width;
                document.body.removeChild(span);
                console.log(newWidth);
                return newWidth;
            }
            getWidth(document.getElementById('stk').innerHTML);
        </script>

        ";

?>