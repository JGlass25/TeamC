<?php
/**
 * @file mapBarb.php
 * @author Tori Kestel
 * @date 9 Dec 2021
 * @brief File Dealing with formatting map rooms
 */
 function drawPath($pathNames){
   if (in_array("R225", $pathNames) && in_array("R221", $pathNames) ){
     echo '<div class = "PathR225">|</div>';
     echo '<div class = "PathR225UP">|</div>';
     echo '<div class = "PathR221Right">__</div>';
     echo '<div class = "PathR221">|</div>';
   }
   if (in_array("R226", $pathNames) && in_array("R264", $pathNames)){
     echo '<div class = "PathR226">|</div>';
     echo '<div class = "PathPHLHall">  - - - - - - - - </div>';
   }
   if (in_array("R226", $pathNames)){
     echo '<div class = "PathR226">|</div>';
   }
   if (in_array("R225", $pathNames)){
     echo '<div class = "PathR225">|</div>';
   }
   if (in_array("SNE1", $pathNames) && in_array("SNE2", $pathNames)){
     echo '<div class = "PathNWHall">- - - - </div>';
     echo '<div class = "PathSNE1">|<br>s</div>';
     echo '<div class = "container">|</div>';
     echo '<div class = "PathSNE2">|<br>|<br>s</div>';
   }

   if (in_array("SNW1", $pathNames) && in_array("SNW2", $pathNames)){
     echo '<div class = "PathNWHall2">- - </div>';
     echo '<div class = "PathSNW1">|<br>s</div>';
     echo '<div class = "PathSNW2">s</div>';
   }
   if (in_array("R226", $pathNames) && in_array("SNW2", $pathNames)){
     echo '<div class = "PathPHLHall">  - - - - - - -  </div>';
   }
   if (in_array("SNW2", $pathNames) && (in_array("SC2", $pathNames)) && (in_array("R264", $pathNames))){
     //echo '<div class = "Path264">-</div>';
     echo '<div class = "Path264">-</div>';
     echo '<div class = "PathPassSC2">- -</div>';
     echo '<div class = "PathToSC2">--</div>';
     //echo '<div class = "pathPassStairs">- - </div';
   }
   if (in_array("R265", $pathNames) && in_array("R264", $pathNames)) {
     echo '<div class = "Path265">S</div>';
   }
   if (in_array("R264", $pathNames) && in_array("SC2", $pathNames) && in_array("SC3", $pathNames)) {
     echo '<div class = "Path264">-</div>';
     echo '<div class = "PathSC2">s -</div>';
     echo '<div class = "PathSC3">s</div>';
     echo '<div class = "PathTo303FRSC3"> - -</div>';
     //echo '<div class = "PathUp3Floor">- - - -<div>';
   }
   if (in_array("R303", $pathNames) && (in_array("SC3", $pathNames)) && (in_array("R306", $pathNames))) {
     echo '<div class = "PathSC3">s</div>';
     echo '<div class = "PathTo303FRSC3"> - -</div>';
     echo '<div class = "Path306"> - </div>';
   }
   if (in_array("R306", $pathNames) && (in_array("SW3", $pathNames))) {
     echo '<div class = "Path306"> - </div>';
     echo '<div class = "PathSW3">s<br>|</div>';
     echo '<div class = "Path265">S</div>';
   }
   if (in_array ("SNE2", $pathNames) && (in_array("SNW2", $pathNames)) && (in_array("R303", $pathNames))) {
     echo '<div class = "PathSC2">s</div>';
     echo '<div class = "PathPHLHall">  - - - - - - - - </div>';
     echo '<div class = "PathSC3">s</div>';
     echo '<div class = "PathTo303FRSC3"> - -</div>';
   }
   if (in_array ("R306", $pathNames)){
     echo '<div class = "Path306"> - </div>';
   }


 }
 function createKey(){
   echo '<div class = "box_rightBelow"><b>KEY</b> <br>- - : path to follow <br> s   : stairs <br> *  : start/end points<br> DEA  : East Door <br> DWA  : West Door</div>';
 }

 ?>
 <html>
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <style>
 .background {
   /* Johnathan you can completely delete this if needed */
   background: #c31432;  /* fallback for old browsers */
   background: -webkit-linear-gradient(to bottom, #240b36, #c31432);  /* Chrome 10-25, Safari 5.1-6 */
   background: linear-gradient(to bottom, #240b36, #c31432); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
 }
 .title {
   text-align: center;
   border-bottom: 6px solid grey;
   background-color: white;
   font-size: 50px;
   font-family: Copperplate, Papyrus, fantasy;
 }
 .button_right {
  position:absolute;
  top: 150px;
  right:250px;
  padding: 20px;
  background-color: white;
  border-style: ridge;
  border-color: black;
 }
 .box_rightBelow {
   align-content:left;
   position:absolute;
   top: 350px;
   right:285px;
   padding: 20px;
   background-color: white;
   border-style: ridge;
   border-color: black;

  }
 }
 .container {
   position: absolute;
   color: rgb(75, 255, 36);
   font-size: 35px;
   top: 480px;
   left: 340px;
 }

 .EDWA {
   position: absolute;
   top: 235px;
   left:215px;
   font-size: 7px;
   color: White;
 }
 .EDEA {
   position: absolute;
   top: 235px;
   left:190px;
   font-size: 7px;
   color: White;
 }
 .StartR221 {
  position: absolute;
  top: 320px;
  left: 350px;
  font-size: 40px;
  color: rgb(75, 255, 36);
 }
 .StartR225 {
  position: absolute;
  top: 395px;
  left: 360px;
  font-size: 40px;
  color: rgb(75, 255, 36);
 }
 .StartR226 {
  position: absolute;
  top: 430px;
  left: 360px;
  font-size: 40px;
  color: rgb(75, 255, 36);
 }
 .StartR264 {
  position: absolute;
  top: 415px;
  left: 540px;
  font-size: 40px;
  color: rgb(75, 255, 36);

 }
 .PathPassSC2 {
   position: absolute;
   top: 440px;
   left: 500px;
   font-size: 35px;
   color: rgb(75, 255, 36);
 }
 .PathToSC2 {
   position: absolute;
   top: 455px;
   left: 480px;
   font-size: 35px;
   color: rgb(75, 255, 36);
 }
 .PathSC2 {
   position: absolute;
   top: 450px;
   left: 505px;
   font-size: 20px;
   color: rgb(75, 255, 36);
 }
 .PathSC3 {
   position: absolute;
   top: 355px;
   left: 545px;
   font-size: 20px;
   color: rgb(75, 255, 36);
 }
 .PathTo303FRSC3 {
   position: absolute;
   top: 350px;
   left: 560px;
   font-size: 35px;
   color: rgb(75, 255, 36);
 }
 .Path306 {
   position: absolute;
   top: 350px;
   left: 610px;
   font-size: 35px;
   color: rgb(75, 255, 36);
 }
 .PathSW3 {
   position: absolute;
   top: 330px;
   left: 640px;
   font-size: 20px;
   color: rgb(75, 255, 36);
 }

 .Path264 {
   position: absolute;
   top: 440px;
   left: 540px;
   font-size: 35px;
   color: rgb(75, 255, 36);
 }
 .PathUp3Floor{
   position: absolute;
   top: 440px;
   left: 565px;
   font-size:35px;
   color: rgb(75, 255, 36);
 }
 .Path265 {
   position:absolute;
   top: 455px;
   left: 570px;
   font-size: 10px;
   color: rgb(75, 255, 36);
 }

 .StartR265 {
  position: absolute;
  top: 415px;
  left: 570px;
  font-size: 40px;
  color: rgb(75, 255, 36);
 }
 .StartR303 {
  position: absolute;
  top: 335px;
  left: 585px;
  font-size: 40px;
  color: rgb(75, 255, 36);
 }
 .StartR306 {
  position: absolute;
  top: 335px;
  left: 610px;
  font-size: 40px;
  color: rgb(75, 255, 36);
 }
 .PathR225 {
   position: absolute;
   top: 390px;
   left: 340px;
   font-size: 35px;
   color: rgb(75, 255, 36);
 }
 .PathR225UP {
   position: absolute;
   top: 355px;
   left: 340px;
   font-size: 35px;
   color: rgb(75, 255, 36);
 }
 .PathR221Right {
   position: absolute;
   top: 323px;
   left: 343px;
   font-size: 35px;
   color: rgb(75, 255, 36);
 }
 .PathR221 {
   position: absolute;
   top: 330px;
   left: 380px;
   font-size: 35px;
   color: rgb(75, 255, 36);
 }
 .PathR226 {
   position: absolute;
   top: 425px;
   left: 340px;
   font-size: 35px;
   color: rgb(75, 255, 36);
 }
 .PathPHLHall{
   position: absolute;
   top: 455px;
   left: 350px;
   font-size: 35px;
   color: rgb(75, 255, 36);
 }
 .PathNWHall {
   position: absolute;
   top: 220px;
   left: 125px;
   font-size: 35px;
   color: rgb(75, 255, 36);
 }
 .PathSNE1 {
   position: absolute;
   top: 250px;
   left: 125px;
   font-size: 20px;
   color: rgb(75, 255, 36);
 }
 .PathSNE2 {
   position: absolute;
   top: 475px;
   left: 340px;
   font-size: 20px;
   color: rgb(75, 255, 36);
 }
 .PathNWHall2 {
   position: absolute;
   top: 215px;
   left: 230px;
   font-size: 35px;
   color: rgb(75, 255, 36);
 }
 .PathSNW1 {
   position: absolute;
   top: 235px;
   left: 265px;
   font-size: 20px;
   color: rgb(75, 255, 36);
 }
 .PathSNW2 {
   position: absolute;
   color: rgb(75, 255, 36);
   font-size: 20px;
   top: 485px;
   left: 477px;
 }


 </style>
 </html>
