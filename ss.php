<div class="circles">
    <div class="circle1"></div>
    <div class="circle2"></div>
    <div class="circle3"></div>
    <div class="circle4"></div>
    <div class="circle5"></div>
    <div class="circle6"></div>
    <div class="circle7"></div>
    <div class="circle8"></div>
    <div class="circle9"></div>
    <div class="circle10"></div>
    <div class="circle11"></div>
    <div class="circle12"></div>
    <div class="circle13"></div>
    <div class="circle14"></div>
    <div class="circle15"></div>
</div>

body {
overflow-y:hidden;
background:black;
height:100vh;
display:flex;
}
.circles {
width:300px;
height:300px;
position:relative;
margin:auto;
}
.circles > * {
background-color:transparent;
box-sizing:border-box;
border:5px solid powderblue;
border-top: 0 solid transparent;
border-left: 0 solid transparent;
border-radius: 50%;
position:absolute;
animation: spin 4s infinite linear alternate;
}

.circle1 {
width: 300px; height: 300px;
animation-delay:-5s;
border-color:rgba(163,207,213, 1);
}
.circle2 {
width: 280px; height: 280px;
top:10px;left:10px;
animation-delay:-4.9s;
border-color:rgba(163,207,213, .95);
}
.circle3 {
width: 260px; height: 260px;
top:20px;left:20px;
animation-delay:-4.8s;
border-color:rgba(163,207,213, .9);
}
.circle4 {
width: 240px; height: 240px;
top:30px;left:30px;
animation-delay:-4.7s;
border-color:rgba(163,207,213, .85);
}
.circle5 {
width: 220px; height: 220px;
top:40px;left:40px;
animation-delay:-4.6s;
border-color:rgba(163,207,213, .8);
}
.circle6 {
width: 200px; height: 200px;
top:50px;left:50px;
animation-delay:-4.5s;
border-color:rgba(163,207,213, .75);
}
.circle7 {
width: 180px; height: 180px;
top:60px;left:60px;
animation-delay:-4.4s;
border-color:rgba(163,207,213, .7);
}
.circle8 {
width: 160px; height: 160px;
top:70px;left:70px;
animation-delay:-4.3s;
border-color:rgba(163,207,213, .65);
}
.circle9 {
width: 140px; height: 140px;
top:80px;left:80px;
animation-delay:-4.2s;
border-color:rgba(163,207,213, .6);
}
.circle10 {
width: 120px; height: 120px;
top:90px;left:90px;
animation-delay:-4.1s;
border-color:rgba(163,207,213, .55);
}
.circle11 {
width: 100px; height: 100px;
top:100px;left:100px;
animation-delay:-4s;
border-color:rgba(163,207,213, .5);
}
.circle12 {
width: 80px; height: 80px;
top:110px;left:110px;
animation-delay:-3.9s;
border-color:rgba(163,207,213, .45);
}
.circle13 {
width: 60px; height: 60px;
top:120px;left:120px;
animation-delay:-3.8s;
border-color:rgba(163,207,213, .4);
}
.circle14 {
width: 40px; height: 40px;
top:130px;left:130px;
animation-delay:-3.7s;
border-color:rgba(163,207,213, .35);
}
.circle15 {
width: 20px; height: 20px;
top:140px;left:140px;
animation-delay:-3.6s;
border-color:rgba(163,207,213, .3);
}

@keyframes spin {
0% {transform: rotate(0deg);}
100% {transform: rotate(360deg);};
}




loader 2

<div class="loader">
    <div class="inner">
    </div>
</div>


body {
background: #262E2A;
overflow: hidden;
}

.loader {
animation: spin 1.5s linear alternate infinite;
background: #B73F41;
border-radius: 50%;
height: 120px;
width: 120px;
}

.loader:before {
background: #B73F41;
border-radius: 50%;
content: '';
display: block;
height: 0.5em;
width: 0.5em;
z-index: 2;
}

.loader:after {
background: #262E2A;
border-radius: 50%;
box-shadow: 0em -2.60em #262E2A,
2.25em -4.02em #262E2A,
2.25em -1.25em #262E2A,
4.60em 0em #262E2A,
2.25em 1.25em #262E2A,
2.25em 4.02em #262E2A,
0em 2.60em #262E2A,
-2.25em 4.02em #262E2A,
-2.25em 1.25em #262E2A,
-4.60em 0em #262E2A,
-2.25em -1.25em #262E2A,
-2.25em -4.02em #262E2A;
content: '';
display: block;
height: 2em;
width: 2em;
}

.inner {
animation: load 1.5s linear alternate infinite;
border: solid 1px #B73F41;
border-radius: 50%;
height: 1.75em;
width: 1.75em;
z-index: 1;
}

.loader, .loader:before, .loader:after, .inner {
bottom: 0;
left: 0;
margin: auto;
position: absolute;
right: 0;
top: 0;
}

@keyframes load {
0% {
box-shadow: 0em -2.60em #262E2A,
2.25em -1.25em #262E2A,
2.25em 1.25em #262E2A,
0em 2.60em #262E2A,
-2.25em 1.25em #262E2A,
-2.25em -1.25em #262E2A;
}
15% {
box-shadow: 0em -2.60em #262E2A,
2.25em -1.25em #262E2A,
2.25em 1.25em #262E2A,
0em 2.60em #262E2A,
-2.25em 1.25em #262E2A,
-2.25em -1.25em #B73F41;
}
30% {
box-shadow: 0em -2.60em #262E2A,
2.25em -1.25em #262E2A,
2.25em 1.25em #262E2A,
0em 2.60em #262E2A,
-2.25em 1.25em #B73F41,
-2.25em -1.25em #B73F41;
}
45% {
box-shadow: 0em -2.60em #262E2A,
2.25em -1.25em #262E2A,
2.25em 1.25em #262E2A,
0em 2.60em #B73F41,
-2.25em 1.25em #B73F41,
-2.25em -1.25em #B73F41;
}
60% {
box-shadow: 0em -2.60em #262E2A,
2.25em -1.25em #262E2A,
2.25em 1.25em #B73F41,
0em 2.60em #B73F41,
-2.25em 1.25em #B73F41,
-2.25em -1.25em #B73F41;
}
75% {
box-shadow: 0em -2.60em #262E2A,
2.25em -1.25em #B73F41,
2.25em 1.25em #B73F41,
0em 2.60em #B73F41,
-2.25em 1.25em #B73F41,
-2.25em -1.25em #B73F41;
}
90% {
box-shadow: 0em -2.60em #B73F41,
2.25em -1.25em #B73F41,
2.25em 1.25em #B73F41,
0em 2.60em #B73F41,
-2.25em 1.25em #B73F41,
-2.25em -1.25em #B73F41;
}
100% {
box-shadow: 0em -2.60em #B73F41,
2.25em -1.25em #B73F41,
2.25em 1.25em #B73F41,
0em 2.60em #B73F41,
-2.25em 1.25em #B73F41,
-2.25em -1.25em #B73F41;
}
}

@keyframes spin {
0% {
transform: rotate(0deg);
}
15% {
transform: rotate(60deg);
}
30% {
transform: rotate(120deg);
}
45% {
transform: rotate(180deg);
}
60% {
transform: rotate(240deg);
}
75% {
transform: rotate(300deg);
}
90% {
transform: rotate(360deg);
}
100% {
transform: rotate(0deg);
}
}



gooey preloader

<div class="centered">
    <div class="blob-1"></div>
    <div class="blob-2"></div>
</div>

html,body{
background:#000;
margin:0;
}
.centered{
width:400px;
height:400px;
position:absolute;
top:50%;
left:50%;
transform:translate(-50%,-50%);
background:#000;
filter: blur(10px) contrast(20);
}
.blob-1,.blob-2{
width:70px;
height:70px;
position:absolute;
background:#fff;
border-radius:50%;
top:50%;left:50%;
transform:translate(-50%,-50%);
}
.blob-1{
left:20%;
animation:osc-l 2.5s ease infinite;
}
.blob-2{
left:80%;
animation:osc-r 2.5s ease infinite;
background:#0ff;
}
@keyframes osc-l{
0%{left:20%;}
50%{left:50%;}
100%{left:20%;}
}
@keyframes osc-r{
0%{left:80%;}
50%{left:50%;}
100%{left:80%;}
}


pusing pixel loader

<div class="loading">
    <h2>pushing pixels</h2>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
</div>

/*
* Baseline styles
*/
body {
background: #222;
text-align: center;
padding: 20%;
}
h2 {
color: #ccc;
margin: 0;
font: .8em verdana;
text-transform: uppercase;
letter-spacing: .1em;
}

/*
* Loading Dots
* Can we use pseudo elements here instead :after?
*/
.loading span {
display: inline-block;
vertical-align: middle;
width: .6em;
height: .6em;
margin: .19em;
background: #007DB6;
border-radius: .6em;
animation: loading 1s infinite alternate;
}

/*
* Dots Colors
* Smarter targeting vs nth-of-type?
*/
.loading span:nth-of-type(2) {
background: #008FB2;
animation-delay: 0.2s;
}
.loading span:nth-of-type(3) {
background: #009B9E;
animation-delay: 0.4s;
}
.loading span:nth-of-type(4) {
background: #00A77D;
animation-delay: 0.6s;
}
.loading span:nth-of-type(5) {
background: #00B247;
animation-delay: 0.8s;
}
.loading span:nth-of-type(6) {
background: #5AB027;
animation-delay: 1.0s;
}
.loading span:nth-of-type(7) {
background: #A0B61E;
animation-delay: 1.2s;
}

/*
* Animation keyframes
* Use transition opacity instead of keyframes?
*/
@keyframes loading {
0% {
opacity: 0;
}
100% {
opacity: 1;
}
}

loading animation 3

<div class="loader">
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
</div>

body {
margin: 0;
padding: 0;
min-height: 100vh;
display: flex;
justify-content: center;
align-items: center;
background: #f1f1f1;
}

.loader {
text-align: center;
vertical-align: middle;
position: relative;
display: flex;
background: white;
padding: 150px;
box-shadow: 0px 40px 60px -20px rgba(0, 0, 0, 0.2);
}

.loader span {
display: block;
width: 20px;
height: 20px;
background: #eee;
border-radius: 50%;
margin: 0 5px;
box-shadow: 0 2px 2px rgba(0, 0, 0, 0.2);
}

.loader span:nth-child(2) {
background: #f07e6e;
}

.loader span:nth-child(3) {
background: #84cdfa;
}

.loader span:nth-child(4) {
background: #5ad1cd;
}

.loader span:not(:last-child) {
animation: animate 1.5s linear infinite;
}

@keyframes animate {
0% {
transform: translateX(0);
}

100% {
transform: translateX(30px);
}
}

.loader span:last-child {
animation: jump 1.5s ease-in-out infinite;
}

@keyframes jump {
0% {
transform: translate(0, 0);
}
10% {
transform: translate(10px, -10px);
}
20% {
transform: translate(20px, 10px);
}
30% {
transform: translate(30px, -50px);
}
70% {
transform: translate(-150px, -50px);
}
80% {
transform: translate(-140px, 10px);
}
90% {
transform: translate(-130px, -10px);
}
100% {
transform: translate(-120px, 0);
}
}


esoteric loader
<div class="container">
    <div class="loader"></div>
</div>

body {
margin: 0px;
background: radial-gradient(#CECECE, #fff);
display: flex;
justify-content: center;
align-items: center;
height: 100vh;
}
.container {
width: 350px;
height: 350px;
border-radius: 100%;
background: linear-gradient(165deg, rgba(255,255,255,1) 0%, rgb(220, 220, 220) 40%, rgb(170, 170, 170) 98%, rgb(10, 10, 10) 100%);
position: relative;
}
.loader {

}

.loader:before {
position: absolute;
content: '';
width: 100%;
height: 100%;
border-radius: 100%;
border-bottom: 0 solid #ffffff05;

box-shadow:
0 -10px 20px 20px #ffffff40 inset,
0 -5px 15px 10px #ffffff50 inset,
0 -2px 5px #ffffff80 inset,
0 -3px 2px #ffffffBB inset,
0 2px 0px #ffffff,
0 2px 3px #ffffff,
0 5px 5px #ffffff90,
0 10px 15px #ffffff60,
0 10px 20px 20px #ffffff40;
filter: blur(3px);
animation: 2s rotate linear infinite;
}

@keyframes rotate {
100% {
transform: rotate(360deg)
}
}


Ring Light Loader
<div class="Loader"></div>

.Loader {
position: relative;
display: flex;
align-items: center;
justify-content: center;
width: 100%;
max-width: 14.6rem;
margin-top: 7.3rem;
margin-bottom: 7.3rem;
}
.Loader:before, .Loader:after {
content: "";
position: absolute;
border-radius: 50%;
animation-duration: 1.8s;
animation-iteration-count: infinite;
animation-timing-function: ease-in-out;
filter: drop-shadow(0 0 0.7555555556rem rgba(255, 255, 255, 0.75));
}
.Loader:before {
width: 100%;
padding-bottom: 100%;
box-shadow: inset 0 0 0 1.7rem #fff;
animation-name: pulsA;
}
.Loader:after {
width: calc(100% - 1.7rem*2);
padding-bottom: calc(100% - 1.7rem*2);
box-shadow: 0 0 0 0 #fff;
animation-name: pulsB;
}

@keyframes pulsA {
0% {
box-shadow: inset 0 0 0 1.7rem #fff;
opacity: 1;
}
50%, 100% {
box-shadow: inset 0 0 0 0 #fff;
opacity: 0;
}
}
@keyframes pulsB {
0%, 50% {
box-shadow: 0 0 0 0 #fff;
opacity: 0;
}
100% {
box-shadow: 0 0 0 1.7rem #fff;
opacity: 1;
}
}


Hover loader

<div class='loader loader1'>
    <div>
        <div>
            <div>
                <div>
                    <div>
                        <div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class='loader loader2'>
    <div>
        <div>
            <div>
                <div>
                    <div>
                        <div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class='loader loader3'>
    <div>
        <div>
            <div>
                <div>
                    <div>
                        <div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class='loader loader4'>
    <div>
        <div>
            <div>
                <div>
                    <div>
                        <div>
                            <div>
                                <div>
                                    <div>
                                        <div></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@-webkit-keyframes rotate {
0% {
transform: rotate(0deg);
}
50% {
transform: rotate(180deg);
}
100% {
transform: rotate(360deg);
}
}
@keyframes rotate {
0% {
transform: rotate(0deg);
}
50% {
transform: rotate(180deg);
}
100% {
transform: rotate(360deg);
}
}
@-webkit-keyframes rotate2 {
0% {
transform: rotate(0deg);
border-top-color: rgba(0, 0, 0, 0.5);
}
50% {
transform: rotate(180deg);
border-top-color: rgba(0, 0, 255, 0.5);
}
100% {
transform: rotate(360deg);
border-top-color: rgba(0, 0, 0, 0.5);
}
}
@keyframes rotate2 {
0% {
transform: rotate(0deg);
border-top-color: rgba(0, 0, 0, 0.5);
}
50% {
transform: rotate(180deg);
border-top-color: rgba(0, 0, 255, 0.5);
}
100% {
transform: rotate(360deg);
border-top-color: rgba(0, 0, 0, 0.5);
}
}
* {
box-sizing: border-box;
}

body {
background: #f9f9f9;
padding-bottom: 100px;
}

h1, h3 {
display: block;
margin: 0px auto;
text-align: center;
font-family: "Tahoma";
font-weight: lighter;
color: rgba(0, 0, 0, 0.5);
letter-spacing: 1.5px;
}

h1 {
margin: 50px auto;
}

.loader {
position: relative;
margin: 75px auto;
width: 150px;
height: 150px;
display: block;
overflow: hidden;
}
.loader div {
height: 100%;
}

/* loader 1 */
.loader1, .loader1 div {
border-radius: 50%;
padding: 8px;
border: 2px solid transparent;
-webkit-animation: rotate linear 3.5s infinite;
animation: rotate linear 3.5s infinite;
border-top-color: rgba(0, 0, 0, 0.5);
border-bottom-color: rgba(0, 0, 255, 0.5);
}

/*loader 2 */
.loader2, .loader2 div {
border-radius: 50%;
padding: 8px;
border: 2px solid transparent;
-webkit-animation: rotate linear 3.5s infinite;
animation: rotate linear 3.5s infinite;
border-top-color: rgba(0, 0, 255, 0.5);
border-left-color: rgba(0, 0, 0, 0.5);
border-right-color: rgba(0, 0, 0, 0.5);
}

/*loader 3 */
.loader3, .loader3 div {
border-radius: 50%;
padding: 8px;
border: 2px solid transparent;
-webkit-animation: rotate linear 3.5s infinite;
animation: rotate linear 3.5s infinite;
border-top-color: rgba(0, 0, 0, 0.5);
border-left-color: rgba(0, 0, 255, 0.5);
-webkit-animation-timing-function: cubic-bezier(0.55, 0.38, 0.21, 0.88);
animation-timing-function: cubic-bezier(0.55, 0.38, 0.21, 0.88);
-webkit-animation-duration: 3s;
animation-duration: 3s;
}

/* loader 4 */
.loader4, .loader4 div {
border-radius: 50%;
padding: 8px;
border: 2px solid transparent;
-webkit-animation: rotate linear 3.5s infinite;
animation: rotate linear 3.5s infinite;
border-radius: 50%;
padding: 4px;
-webkit-animation: rotate2 4s infinite linear;
animation: rotate2 4s infinite linear;
}

div:hover {
-webkit-animation-play-state: paused;
animation-play-state: paused;
}

.loader, .loader * {
will-change: transform;
}

Cube Loader
<div class="bar">
    <div class="circle"></div>
    <p>Loading</p>
</div>

html, body {
background: #347fc3;
width: 100%;
overflow-x: hidden;
overflow-y: hidden;
}

.bar {
position: relative;
height: 2px;
width: 500px;
margin: 0 auto;
background: #fff;
margin-top: 150px;
}

.circle {
position: absolute;
top: -30px;
margin-left: -30px;
height: 60px;
width: 60px;
left: 0;
background: #fff;
border-radius: 30%;
-webkit-animation: move 5s infinite;
}

p {
position: absolute;
top: -35px;
right: -85px;
text-transform: uppercase;
color: #347fc3;
font-family: helvetica, sans-serif;
font-weight: bold;
}

@-webkit-keyframes move {
0% {left: 0;}
50% {left: 100%; -webkit-transform: rotate(450deg); width: 150px; height: 150px;}
75% {left: 100%; -webkit-transform: rotate(450deg); width: 150px; height: 150px;}
100 {right: 100%;}
}


fontawesome-loader

<div class="loader">
    <div class="image">
        <i class="fa fa-codepen"></i>
    </div>
    <span></span>
</div>

@import url(https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900);

html,body {
margin: 0;
padding: 0;
font-family:'Lato', sans-serif;
}
.loader {
width: 100px;
height: 80px;
position: absolute;
top: 0; right: 0; left: 0; bottom: 0;
margin: auto;
}
.loader .image {
width: 100px;
height: 160px;
font-size: 40px;
text-align: center;
transform-origin: bottom center;
animation: 3s rotate infinite;
opacity: 0;
}
.loader span {
display: block;
width: 100%;
text-align: center;
position: absolute;
bottom: 0;
}

@keyframes rotate{
0% {
transform: rotate(90deg);
}
10% {
opacity: 0;
}
35% {
transform: rotate(0deg);
opacity: 1;
}
65% {
transform: rotate(0deg);
opacity: 1;
}
80% {
opacity: 0;
}
100% {
transform: rotate(-90deg);
}
}

js//////

$(document).ready(function() {
var counter = 0;

// Start the changing images
setInterval(function() {
if(counter == 9) {
counter = 0;
}

changeImage(counter);
counter++;
}, 3000);

// Set the percentage off
loading();
});

function changeImage(counter) {
var images = [
'<i class="fa fa-fighter-jet"></i>',
'<i class="fa fa-gamepad"></i>',
'<i class="fa fa-headphones"></i>',
'<i class="fa fa-cubes"></i>',
'<i class="fa fa-paw"></i>',
'<i class="fa fa-rocket"></i>',
'<i class="fa fa-ticket"></i>',
'<i class="fa fa-pie-chart"></i>',
'<i class="fa fa-codepen"></i>'
];

$(".loader .image").html(""+ images[counter] +"");
}

function loading(){
var num = 0;

for(i=0; i<=100; i++) { setTimeout(function() { $('.loader span').html(num+'%'); if(num==100) { loading(); } num++; },i*120); }; }