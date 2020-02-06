<!DOCTYPE html>

<head>     
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Sebastian Frank">
    <meta name="description" content="Pen and Paper Platform">
    <meta name="keywords" content="pen and paper">

    <link href="/p&p/res/img/icon.ico" rel="icon" type="image/png">
    <!-- Bootstrap(offline/lokal) CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>P&P</title>
</head>

<body>
    <main>
        <form>
            <textarea id="textarea" placeholder="Enter Character JSON string"></textarea><br>
            <button type="button" onclick="this.parentNode.nextElementSibling.hidden = false; buildChar(this.previousElementSibling.previousElementSibling.value); this.parentNode.hidden = true; ">uff</button>
            <button type="button" onclick="this.parentNode.hidden = true; this.parentNode.nextElementSibling.hidden = false;">Create Blank</button>
        </form>

        <div class="container" hidden>
            <div class="row">
                <div class="col-3">
                    Name: <span id="name">Unnamed</span>
                    <br>
                    Level: <span id="lvl">0</span>
                    <br>
                    Xp: <span id="xp">0</span>/<span id="neededxp">0</span>
                    <br>
                    <div class="row">
                        <div class="col-4 text-right">
                            <svg height="15" width="15" viewBox="0 0 100 100" onmouseover="pluskey(event, this);" onmouseout="pluskey(event, this);" onclick="addxp(this)">
                                <g>
                                    <rect height="100" width="100" style="fill:#FFFFFF; fill-opacity:0.5;"/>
                                    <path style="fill:#00D000;" d="M41 5 h18 v36 h36 v18 h-36 v36 h-18 v-36 h-36 v-18 h36 v-36z"/>
                                </g>
                            </svg>
                            <svg height="15" width="15" viewBox="0 0 100 100" onmouseover="minuskey(event, this);" onmouseout="minuskey(event, this);">
                                <g>
                                    <rect height="100" width="100" style="fill:#FFFFFF; fill-opacity:0.5;"/>
                                    <path style="fill:#EF0000;" d="M5 41 h90 v18 h-90 v-18z"/>
                                </g>
                            </svg>
                        </div>
                        <div class="col-8" style="padding:0;">
                            <input type="text" style="width: 100%" placeholder="Experience Points">
                        </div>
                    </div>
                    Lp: <span id="lp">10</span>
                    <br>
                    Race: <span id="race">N/A</span>
                    <br>
                    Sex: <span id="sex">N/A</span>
                    <br>
                    HP: <span id="hp">6</span>
                    MP: <span id="mp">6</span>
                    <br>
                    Wealth: <span id="wealth">0</span>
                </div>


                <div class="col-9">
                    Magical attributes:<br>
                    <div class="row">
                        <div class="col-6">
                            <div class="row">
                                <div class="col-3">
                                    Fire<br>
                                    <svg height="15" width="15" viewBox="0 0 100 100" onmouseover="minuskey(event, this);" onmouseout="minuskey(event, this);">
                                        <g>
                                            <rect height="100" width="100" style="fill:#FFFFFF; fill-opacity:0.5;"/>
                                            <path style="fill:#EF0000;" d="M5 41 h90 v18 h-90 v-18z"/>
                                        </g>
                                    </svg>
                                    <span id="fire">0</span>
                                    <svg height="15" width="15" viewBox="0 0 100 100" class="pluskey" onmouseover="pluskey(event, this);" onmouseout="pluskey(event, this);" onclick="pluskey(event, this)">
                                        <g>
                                            <rect height="100" width="100" style="fill:#FFFFFF; fill-opacity:0.5;"/>
                                            <path style="fill:#00D000;" d="M41 5 h18 v36 h36 v18 h-36 v36 h-18 v-36 h-36 v-18 h36 v-36z"/>
                                        </g>
                                    </svg>
                                </div>
                                <div class="col-3">
                                    Water<br>

                                    <!--minus-->
                                    <svg height="15" width="15" viewBox="0 0 100 100" onmouseover="minuskey(event, this);" onmouseout="minuskey(event, this);">
                                        <g>
                                            <rect height="100" width="100" style="fill:#FFFFFF; fill-opacity:0.5;"/>
                                            <path style="fill:#EF0000;" d="M5 41 h90 v18 h-90 v-18z"/>
                                        </g>
                                    </svg>
                                    <span id="water">0</span>

                                    <!--plus-->
                                    <svg height="15" width="15" viewBox="0 0 100 100" class="pluskey"  onmouseover="pluskey(event, this);" onmouseout="pluskey(event, this);">
                                        <g>
                                            <rect height="100" width="100" style="fill:#FFFFFF; fill-opacity:0.5;"/>
                                            <path style="fill:#00D000;" d="M41 5 h18 v36 h36 v18 h-36 v36 h-18 v-36 h-36 v-18 h36 v-36z"/>
                                        </g>
                                    </svg>
                                </div>
                                <div class="col-3">
                                    Wind<br>
                                    <svg height="15" width="15" viewBox="0 0 100 100" onmouseover="minuskey(event, this);" onmouseout="minuskey(event, this);">
                                        <g>
                                            <rect height="100" width="100" style="fill:#FFFFFF; fill-opacity:0.5;"/>
                                            <path style="fill:#EF0000;" d="M5 41 h90 v18 h-90 v-18z"/>
                                        </g>
                                    </svg>
                                    <span id="wind">0</span>
                                    <svg height="15" width="15" viewBox="0 0 100 100" class="pluskey"  onmouseover="pluskey(event, this);" onmouseout="pluskey(event, this);">
                                        <g>
                                            <rect height="100" width="100" style="fill:#FFFFFF; fill-opacity:0.5;"/>
                                            <path style="fill:#00D000;" d="M41 5 h18 v36 h36 v18 h-36 v36 h-18 v-36 h-36 v-18 h36 v-36z"/>
                                        </g>
                                    </svg>
                                </div>
                                <div class="col-3">
                                    Earth<br>
                                    <svg height="15" width="15" viewBox="0 0 100 100" onmouseover="minuskey(event, this);" onmouseout="minuskey(event, this);">
                                        <g>
                                            <rect height="100" width="100" style="fill:#FFFFFF; fill-opacity:0.5;"/>
                                            <path style="fill:#EF0000;" d="M5 41 h90 v18 h-90 v-18z"/>
                                        </g>
                                    </svg>
                                    <span id="earth">0</span>
                                    <svg height="15" width="15" viewBox="0 0 100 100" class="pluskey"  onmouseover="pluskey(event, this);" onmouseout="pluskey(event, this);">
                                        <g>
                                            <rect height="100" width="100" style="fill:#FFFFFF; fill-opacity:0.5;"/>
                                            <path style="fill:#00D000;" d="M41 5 h18 v36 h36 v18 h-36 v36 h-18 v-36 h-36 v-18 h36 v-36z"/>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row">
                                <div class="col-3">
                                    Light<br>
                                    <svg height="15" width="15" viewBox="0 0 100 100" onmouseover="minuskey(event, this);" onmouseout="minuskey(event, this);">
                                        <g>
                                            <rect height="100" width="100" style="fill:#FFFFFF; fill-opacity:0.5;"/>
                                            <path style="fill:#EF0000;" d="M5 41 h90 v18 h-90 v-18z"/>
                                        </g>
                                    </svg>
                                    <span id="light">0</span>
                                    <svg height="15" width="15" viewBox="0 0 100 100" class="pluskey" onmouseover="pluskey(event, this);" onmouseout="pluskey(event, this);">
                                        <g>
                                            <rect height="100" width="100" style="fill:#FFFFFF; fill-opacity:0.5;"/>
                                            <path style="fill:#00D000;" d="M41 5 h18 v36 h36 v18 h-36 v36 h-18 v-36 h-36 v-18 h36 v-36z"/>
                                        </g>
                                    </svg>
                                </div>
                                <div class="col-3">
                                    Dark<br>
                                    <svg height="15" width="15" viewBox="0 0 100 100" onmouseover="minuskey(event, this);" onmouseout="minuskey(event, this);">
                                        <g>
                                            <rect height="100" width="100" style="fill:#FFFFFF; fill-opacity:0.5;"/>
                                            <path style="fill:#EF0000;" d="M5 41 h90 v18 h-90 v-18z"/>
                                        </g>
                                    </svg>
                                    <span id="dark">0</span>
                                    <svg height="15" width="15" viewBox="0 0 100 100" class="pluskey" onmouseover="pluskey(event, this);" onmouseout="pluskey(event, this);">
                                        <g>
                                            <rect height="100" width="100" style="fill:#FFFFFF; fill-opacity:0.5;"/>
                                            <path style="fill:#00D000;" d="M41 5 h18 v36 h36 v18 h-36 v36 h-18 v-36 h-36 v-18 h36 v-36z"/>
                                        </g>
                                    </svg>
                                </div>
                                <div class="col-3">
                                    Neutral<br>
                                    <svg height="15" width="15" viewBox="0 0 100 100" onmouseover="minuskey(event, this);" onmouseout="minuskey(event, this);">
                                        <g>
                                            <rect height="100" width="100" style="fill:#FFFFFF; fill-opacity:0.5;"/>
                                            <path style="fill:#EF0000;" d="M5 41 h90 v18 h-90 v-18z"/>
                                        </g>
                                    </svg>
                                    <span id="neutral">0</span>
                                    <svg height="15" width="15" viewBox="0 0 100 100" class="pluskey" onmouseover="pluskey(event, this);" onmouseout="pluskey(event, this);">
                                        <g>
                                            <rect height="100" width="100" style="fill:#FFFFFF; fill-opacity:0.5;" onmouseover="this.style='fill:#909090; fill-opacity:0.5;'" onmouseout="this.style='fill:#FFFFFF; fill-opacity:0.5;'"/>
                                            <path style="fill:#00D000;" d="M41 5 h18 v36 h36 v18 h-36 v36 h-18 v-36 h-36 v-18 h36 v-36z" onmouseover="previousElementSibling.style='fill:#909090; fill-opacity:0.5;'" onmouseout="previousElementSibling.style='fill:#FFFFFF; fill-opacity:0.5;'"/>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>


                    <br>
                    Attributes:
                    <br>
                    <div class="row">
                        <div class="col-6">
                            INI:
                            <svg height="15" width="15" viewBox="0 0 100 100" onmouseover="minuskey(event, this);" onmouseout="minuskey(event, this);">
                                <g>
                                    <rect height="100" width="100" style="fill:#FFFFFF; fill-opacity:0.5;"/>
                                    <path style="fill:#EF0000;" d="M5 41 h90 v18 h-90 v-18z"/>
                                </g>
                            </svg>
                            <span id="ini">1</span>
                            <svg height="15" width="15" viewBox="0 0 100 100" class="pluskey" onmouseover="pluskey(event, this);" onmouseout="pluskey(event, this);">
                                <g>
                                    <rect height="100" width="100" style="fill:#FFFFFF; fill-opacity:0.5;"/>
                                    <path style="fill:#00D000;" d="M41 5 h18 v36 h36 v18 h-36 v36 h-18 v-36 h-36 v-18 h36 v-36z"/>
                                </g>
                            </svg>
                        </div>
                        <div class="col-6">
                            STK:
                            <svg height="15" width="15" viewBox="0 0 100 100" onmouseover="minuskey(event, this);" onmouseout="minuskey(event, this);">
                                <g>
                                    <rect height="100" width="100" style="fill:#FFFFFF; fill-opacity:0.5;"/>
                                    <path style="fill:#EF0000;" d="M5 41 h90 v18 h-90 v-18z"/>
                                </g>
                            </svg>
                            <span id="stk">1</span>
                            <svg height="15" width="15" viewBox="0 0 100 100" class="pluskey" onmouseover="pluskey(event, this);" onmouseout="pluskey(event, this);">
                                <g>
                                    <rect height="100" width="100" style="fill:#FFFFFF; fill-opacity:0.5;"/>
                                    <path style="fill:#00D000;" d="M41 5 h18 v36 h36 v18 h-36 v36 h-18 v-36 h-36 v-18 h36 v-36z"/>
                                </g>
                            </svg>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-6">
                            DEF: 
                            <span id="def">0</span>
                        </div>
                        <div class="col-6">
                            KOE: 
                            <svg height="15" width="15" viewBox="0 0 100 100" onmouseover="minuskey(event, this);" onmouseout="minuskey(event, this);">
                                <g>
                                    <rect height="100" width="100" style="fill:#FFFFFF; fill-opacity:0.5;"/>
                                    <path style="fill:#EF0000;" d="M5 41 h90 v18 h-90 v-18z"/>
                                </g>
                            </svg>
                            <span id="koe">1</span>
                            <svg height="15" width="15" viewBox="0 0 100 100" class="pluskey" onmouseover="pluskey(event, this);" onmouseout="pluskey(event, this);">
                                <g>
                                    <rect height="100" width="100" style="fill:#FFFFFF; fill-opacity:0.5;"/>
                                    <path style="fill:#00D000;" d="M41 5 h18 v36 h36 v18 h-36 v36 h-18 v-36 h-36 v-18 h36 v-36z"/>
                                </g>
                            </svg>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-12 text-center">
                            INT:
                            <svg height="15" width="15" viewBox="0 0 100 100" onmouseover="minuskey(event, this);" onmouseout="minuskey(event, this);">
                                <g>
                                    <rect height="100" width="100" style="fill:#FFFFFF; fill-opacity:0.5;"/>
                                    <path style="fill:#EF0000;" d="M5 41 h90 v18 h-90 v-18z"/>
                                </g>
                            </svg>
                            <span id="int">1</span>
                            <svg height="15" width="15" viewBox="0 0 100 100" class="pluskey" onmouseover="pluskey(event, this);" onmouseout="pluskey(event, this);">
                                <g>
                                    <rect height="100" width="100" style="fill:#FFFFFF; fill-opacity:0.5;"/>
                                    <path style="fill:#00D000;" d="M41 5 h18 v36 h36 v18 h-36 v36 h-18 v-36 h-36 v-18 h36 v-36z"/>
                                </g>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-right">
                <button>Reset</button>
                <button onclick="">Save</button>
            </div>
        </div>
        <div hidden>
            <textarea></textarea>
            <br>
            <button>Hide</button>
        </div>
        <script src="/p&p2/utility/js/charform.js"></script>
        <script>
            var lptrack = document.getElementById('lp').innerHTML;
        </script>

    </main>
    <script src="/p&p2/res/js/jquery-3.2.1.slim.min.js"></script>
    <script src="/p&p2/res/js/popper.min.js"></script>
    <script src="/p&p2/res/js/bootstrap.min.js"></script>

</body>

</html>