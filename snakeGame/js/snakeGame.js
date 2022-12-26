//Init
var gs;
var tc;

// Prevent arrow keys from moving the entire page
window.addEventListener("keydown",
    function (e) {
        if (["Space", "ArrowUp", "ArrowDown", "ArrowLeft", "ArrowRight"].indexOf(e.code) > -1) {
            e.preventDefault();
        }
    }, false);

    
// resize on change
window.addEventListener('resize', resizeGame)

// Snake game starts from here
window.onload = function () {

    canv = document.getElementById("gc");

    ctx = canv.getContext("2d");

    document.addEventListener("keydown", keyPush);

    resizeGame();
    setInterval(game, 1000 / 15);
}

function resizeGame(){
    console.log(window.innerWidth)
    if (window.innerWidth < 576){
        // resize canvas
        document.getElementById("gc").setAttribute('width', '289')
        document.getElementById("gc").setAttribute('height', '289')
        // resize game size
        gs = 17
        tc = 17
    }
    else if (window.innerWidth >= 576 && window.innerWidth < 768 ){
        // resize canvas
        document.getElementById("gc").setAttribute('width', '400')
        document.getElementById("gc").setAttribute('height', '400')
        // resize game size
        gs = 20
        tc = 20
    }
    else{
        // resize canvas
        document.getElementById("gc").setAttribute('width', '529')
        document.getElementById("gc").setAttribute('height', '529')
        // resize game size
        gs = 23
        tc = 23     
    }
}

px = py = 10;

ax = ay = 15;

xv = yv = 0;

trail = [];

tail = 5;

let score = tail - 5; // setting of score to start with aka 0
let highscore = 0;

function change_snake_colour() {
    let colour_chosen = document.getElementById("snakecolour").value
    return colour_chosen
}

function change_food_colour() {
    let colour_chosen = document.getElementById("foodcolour").value
    return colour_chosen
}

function game() {
    let chosen_food_colour = change_food_colour()
    let food_colour = chosen_food_colour

    let chosen_snake_colour = change_snake_colour()
    let snake_colour = chosen_snake_colour

    px += xv;
    py += yv;
    if (px < 0) {
        px = tc - 1;
    }

    if (px > tc - 1) {
        px = 0;
    }

    if (py < 0) {
        py = tc - 1;
    }

    if (py > tc - 1) {
        py = 0;
    }

    ctx.fillStyle = "black";

    ctx.fillRect(0, 0, canv.width, canv.height);

    ctx.fillStyle = snake_colour;

    for (var i = 0; i < trail.length; i++) {

        ctx.fillRect(trail[i].x * gs, trail[i].y * gs, gs - 2, gs - 2);

        if (trail[i].x == px && trail[i].y == py) {

            tail = 5;
            if (score > highscore) {
                highscore = score
            } // only update highscore if it is higher than current score

            score = 0; // to allow score to reset when snake dies
        }
    }

    trail.push({
        x: px,
        y: py
    });

    while (trail.length > tail) {

        trail.shift();

    }

    if (ax == px && ay == py) {

        tail++;
        score = score + 10; // score increments by 10 for each successful meal


        ax = Math.floor(Math.random() * tc);

        ay = Math.floor(Math.random() * tc);

        if (score > highscore) {
            highscore = score
            document.getElementById("highscore").innerHTML = score

        }



    }

    ctx.fillStyle = food_colour;

    ctx.fillRect(ax * gs, ay * gs, gs - 2, gs - 2);

    // conditional statements to change the looks of CURRENT SCORE depending on how high it is
    if (score < 50) {
        document.getElementById("score").innerHTML = score
        document.getElementById("score").setAttribute("class", "fs-2 text-light")
    } else if (score < 100) {
        document.getElementById("score").innerHTML = score
        document.getElementById("score").setAttribute("class", "fs-2 text-success")
    } else if (score < 200) {
        document.getElementById("score").innerHTML = score
        document.getElementById("score").setAttribute("class", "fs-2 text-warning")
    } else {
        document.getElementById("score").innerHTML = score
        document.getElementById("score").setAttribute("class", "fw-bold fs-2 text-danger")
    }

    document.getElementById("highscore").innerHTML = highscore

}

function keyPush(evt) {
    if (typeof(evt) == "number"){
        direction = evt
    }
    else{
        direction = evt.keyCode
    }
    switch (direction) {
    // switch (evt.keyCode) {

        case 37:

            xv = -1;
            yv = 0;

            break;

        case 38:

            xv = 0;
            yv = -1;

            break;

        case 39:

            xv = 1;
            yv = 0;

            break;

        case 40:

            xv = 0;
            yv = 1;

            break;

    }

}


