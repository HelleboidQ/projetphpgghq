<?php

/**
 * Sample layout.
 */
use Core\Error;
 
?>   
 
<div class="container content">
    <div class="row">
        <div class="col-md-12">

            <h1>404</h1>

            <hr />

            <h3>On a fait tout ce qu'on pouvait, mais ta page n'est pas ici.</h3>
            <p>Tu t'es perdu ? Pas grave, tu peux jouer au SUPER CASSE BRIQUE ! Wow !</p>

            <style>
                #restart{
                    display:none;
                }
                #pause{
                    display:none;
                }
                #score1{
                    display:none;
                } 
                #vie1{
                    display:none;
                }
                .timer1{
                    display:none;
                } 
                #difficulte{
                    display:none;
                } 
            </style>


        </div>

        <div class="container">
            <div>
                <a href="#" id="start">D�marrer</a> 
                <a href="#" id="restart">Red�marrer</a>
                <a href="#" id="pause">Pause</a>
                <span id="vie1"> Vie : </span> <span id="vie2">  </span>
                <span id="score1"> Score : </span> <span id="score2">  </span>				
                <span class="timer1"> Timer : </span><span id="timer2">  </span><span class="timer1">sec </span>
                <span id="message">  </span>

                <div id="difficulte">
                    <a href="#" id="facile">Facile</a> 
                    <a href="#" id="moyen">Moyen</a> 
                    <a href="#" id="difficile">DIFFICILE</a> 
                </div>
            </div>

            <canvas id="canvas" width="998" height="500" style="border:2px solid blue;margin: 0 auto;">

            </canvas>
        </div> 

    </div>
</div>
