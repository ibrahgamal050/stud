let ctx;//context
let canvas;
let startX = 4;
let startY = 0;
let score = 0;
let level = 1;
let winOrLose = "Playing";
let gBArrayHeight = 20;
let gBArrayWidth = 12;
let coordinateArray = [...Array(gBArrayHeight)].map(e => Array(gBArrayWidth).fill(0));
let curTetromino = [[1, 0], [0, 1], [1, 1], [2, 1]]
let tetrominos = [];
let tetrominoColors = ['purple', 'cyan', 'blue', 'yellow', 'orange', 'green', 'red'];
let curTetrominoColor;
let gameBoardArray = [...Array(gBArrayHeight)].map(e => Array(gBArrayWidth).fill(0));
let stoppedShapeArray = [...Array(gBArrayHeight)].map(e => Array(gBArrayWidth).fill(0));
let DIRECTION = {
    IDLE: 0,
    DOWN: 1,
    LEFT: 2,
    RIGHT: 3
};
let direction;
class Coordinates {
    constructor(x, y) {
        this.x = x;
        this.y = y
    }
}
let playerName = "newPlayer";
let createCoordArray = () => {
    let i = 0, j = 0;
    for (let y = 5; y <= 446; y += 23) {//9 pix from top 
        for (let x = 6; x <= 264; x += 23) {// 11 pix from left
            coordinateArray[i][j] = new Coordinates(x, y);
            i++;
        }
        j++;
        i = 0;
    }
}

let setupCanvas = () => {
    canvas = document.getElementById("my-canvas");
    ctx = canvas.getContext('2d');
    canvas.width = 936;
    canvas.height = 956;
    ctx.scale(2, 2);
    ctx.fillStyle = 'white'
    ctx.fillRect(0, 0, canvas.width, canvas.height)
    ctx.strokeStyle = 'black';
    ctx.strokeRect(8, 8, 280, 462)

    // set user name 
    playerName = document.getElementById('fname').value
    //logo 
    tetrisLogo = new Image(161, 54);
    tetrisLogo.onload = drawTetrisLogo;
    tetrisLogo.src = "tetrislogo.png";


    //Draw High Score 


    // Set font for score label text and draw
    ctx.fillStyle = 'black';
    ctx.font = '21px Arial';
    ctx.fillText("SCORE", 300, 98);

    // Draw score rectangle
    ctx.strokeRect(300, 107, 161, 24);

    // Draw score
    ctx.fillText(score.toString(), 310, 127);

    // Draw level label text
    ctx.fillText("LEVEL", 300, 157);

    // Draw level rectangle
    ctx.strokeRect(300, 171, 161, 24);

    // Draw level
    ctx.fillText(level.toString(), 310, 190);


    //Draw Heigh score
    ctx.fillText("Heigh Score", 300, 221);
    ctx.strokeRect(300, 232, 161, 237);

    getDataFromLocalStorage();
    printHighScore();

    document.addEventListener('keydown', handleKeyPress);

    // Create the array of Tetromino arrays
    createTetrominos();
    // Generate random Tetromino
    createTetromino();

    createCoordArray();
    drawTetromino();
}

let drawTetrisLogo = () => {
    ctx.drawImage(tetrisLogo, 300, 8, 161, 54);
}

let drawTetromino = () => {
    for (let i = 0; i < curTetromino.length; i++) {
        // shows in the middle of the gameboard
        let x = curTetromino[i][0] + startX;
        let y = curTetromino[i][1] + startY;

        // Put Tetromino shape in the gameboard array
        gameBoardArray[x][y] = 1;

        // Look for the x & y values in the lookup table
        let coorX = coordinateArray[x][y].x;
        let coorY = coordinateArray[x][y].y;

        // Draw Tetromino
        ctx.fillStyle = curTetrominoColor;
        ctx.fillRect(coorX, coorY, 21, 21);
    }
}

let createTetrominos = () => {
    // Push T 
    tetrominos.push([[1, 0], [0, 1], [1, 1], [2, 1]]);
    // Push I
    tetrominos.push([[0, 0], [1, 0], [2, 0], [3, 0]]);
    // Push J
    tetrominos.push([[0, 0], [0, 1], [1, 1], [2, 1]]);
    // Push Square
    tetrominos.push([[0, 0], [1, 0], [0, 1], [1, 1]]);
    // Push L
    tetrominos.push([[2, 0], [0, 1], [1, 1], [2, 1]]);
    // Push S
    tetrominos.push([[1, 0], [2, 0], [0, 1], [1, 1]]);
    // Push Z
    tetrominos.push([[0, 0], [1, 0], [1, 1], [2, 1]]);
}

let handleKeyPress = (key) => {
    if (winOrLose != "Game Over") {
        // a keycode (LEFT)
        if (key.keyCode === 65) {
            // Check if I'll hit the wall
            direction = DIRECTION.LEFT;
            if (!hittingTheWall() && !checkForHorizontalCollision()) {
                deleteTetromino();
                startX--;
                drawTetromino();
            }

            // d keycode (RIGHT)
        } else if (key.keyCode === 68) {

            // Check if I'll hit the wall
            direction = DIRECTION.RIGHT;
            if (!hittingTheWall() && !checkForHorizontalCollision()) {
                deleteTetromino();
                startX++;
                drawTetromino();
            }
            // s keycode (DOWN)
        } else if (key.keyCode === 83) {
            moveTetrominoDown();
            // e keycode calls for rotation of Tetromino
        } else if (key.keyCode === 69) {
            rotateTetromino();
        }
    }
    if (key.keyCode === 82) {
        restartGame();
    }
}
let moveTetrominoDown = () => {
    // Track that I want to move down
    direction = DIRECTION.DOWN;
    //  Check for a vertical collision
    if (!checkForVerticalCollison()) {
        deleteTetromino();
        startY++;
        drawTetromino();
    }
}
let deleteTetromino = () => {
    for (let i = 0; i < curTetromino.length; i++) {
        let x = curTetromino[i][0] + startX;
        let y = curTetromino[i][1] + startY;

        // 4. Delete Tetromino square from the gameboard array
        gameBoardArray[x][y] = 0;

        // Draw white where colored squares used to be
        let coorX = coordinateArray[x][y].x;
        let coorY = coordinateArray[x][y].y;
        ctx.fillStyle = 'white';
        ctx.fillRect(coorX, coorY, 21, 21);
    }
}
let createTetromino = () => {
    // Get a random tetromino index
    let randomTetromino = Math.floor(Math.random() * tetrominos.length);
    curTetromino = tetrominos[randomTetromino];
    curTetrominoColor = tetrominoColors[randomTetromino];

    // Generate the next Tetromino
    randomTetromino = Math.floor(Math.random() * tetrominos.length);
    nextTetromino = tetrominos[randomTetromino];
    nextTetrominoColor = tetrominoColors[randomTetromino];

    // Call the function to draw the next Tetromino
    drawNextTetromino();
}
let drawNextTetromino = () => {
    // Clear the area for the next Tetromino
    ctx.fillStyle = 'white';
    ctx.fillRect(310, 250, 80, 80);

    // Draw the next Tetromino
    for (let i = 0; i < nextTetromino.length; i++) {
        let x = nextTetromino[i][0] + 12; // Adjust the position based on your layout
        let y = nextTetromino[i][1] + 2;  // Adjust the position based on your layout

        let coorX = coordinateArray[x][y].x;
        let coorY = coordinateArray[x][y].y;

        ctx.fillStyle = nextTetrominoColor;
        ctx.fillRect(coorX, coorY, 21, 21);
    }
}

let hittingTheWall = () => {
    for (let i = 0; i < curTetromino.length; i++) {
        let newX = curTetromino[i][0] + startX;
        if (newX <= 0 && direction === DIRECTION.LEFT) {
            return true;
        } else if (newX >= 11 && direction === DIRECTION.RIGHT) {
            return true;
        }
    }
    return false;
}

let checkForHorizontalCollision = () => {
    var tetrominoCopy = curTetromino;
    var collision = false;

    // Cycle through all Tetromino squares
    for (var i = 0; i < tetrominoCopy.length; i++) {
        var square = tetrominoCopy[i];
        var x = square[0] + startX;
        var y = square[1] + startY;

        // Move Tetromino clone square into position based
        // on direction moving
        if (direction == DIRECTION.LEFT) {
            x--;
        } else if (direction == DIRECTION.RIGHT) {
            x++;
        }

        // Get the potential stopped square that may exist
        var stoppedShapeVal = stoppedShapeArray[x][y];

        // If it is a string we know a stopped square is there
        if (typeof stoppedShapeVal === 'string') {
            collision = true;
            break;
        }
    }

    return collision;
}

let highScoreArray = new Array();

let checkForVerticalCollison = () => {
    let tetrominoCopy = curTetromino;
    let collision = false;

    for (let i = 0; i < tetrominoCopy.length; i++) {
        let square = tetrominoCopy[i];
        let x = square[0] + startX;
        let y = square[1] + startY;

        if (direction === DIRECTION.DOWN) {
            y++;
        }

        // Check if I'm going to hit a previously set piece
        if (typeof stoppedShapeArray[x][y + 1] === 'string') {
            // If so delete Tetromino
            deleteTetromino();
            // Increment to put into place and draw
            startY++;
            drawTetromino();
            collision = true;
            break;
        }
        if (y >= 20) {
            collision = true;
            break;
        }
    }
    if (collision) {
        // Check for game over and if so set game over text
        //*****************************************************************************************
        if (startY <= 2) {
            winOrLose = "Game Over"

            ctx.fillStyle = 'white';
            // ctx.fillRect(10, 10, 275, 457);
            ctx.fillRect(10, 200, 275, 100);

            ctx.fillStyle = 'red';
            ctx.font = '30px Arial';
            ctx.fillText("Game Over", 70, 255);


            //Add High Score
            if (isHighScore()) {
                if (score > 0) {
                    highScoreArray.push({
                        name: playerName,
                        score: score
                    })
                    sortHighScore();
                    saveToLocalStorage()
                }
            }
        } else {

            // Add stopped Tetromino to stopped shape array
            // so I can check for future collisions
            for (let i = 0; i < tetrominoCopy.length; i++) {
                let square = tetrominoCopy[i];
                let x = square[0] + startX;
                let y = square[1] + startY;
                // Add the current Tetromino color
                stoppedShapeArray[x][y] = curTetrominoColor;
            }

            // 7. Check for completed rows
            checkForCompletedRows();

            createTetromino();

            // Create the next Tetromino and draw it and reset direction
            direction = DIRECTION.IDLE;
            startX = 4;
            startY = 0;
            drawTetromino();
        }

    }
}

window.setInterval(function () {
    if (winOrLose != "Game Over") {
        moveTetrominoDown();
    }
}, 1000);

function checkForCompletedRows() {

    // Track how many rows to delete and where to start deleting
    let rowsToDelete = 0;
    let startOfDeletion = 0;

    // Check every row to see if it has been completed
    for (let y = 0; y < gBArrayHeight; y++) {
        let completed = true;

        for (let x = 0; x < gBArrayWidth; x++) {
            let square = stoppedShapeArray[x][y];

            // Check if nothing is there
            if (square === 0 || (typeof square === 'undefined')) {
                completed = false;
                break;
            }
        }

        // If a row has been completed
        if (completed) {
            // Used to shift down the rows
            if (startOfDeletion === 0) startOfDeletion = y;
            rowsToDelete++;

            // Delete the line everywhere
            for (let i = 0; i < gBArrayWidth; i++) {
                // Update the arrays by deleting previous squares
                stoppedShapeArray[i][y] = 0;
                gameBoardArray[i][y] = 0;

                let coorX = coordinateArray[i][y].x;
                let coorY = coordinateArray[i][y].y;
                // Draw the square as white
                ctx.fillStyle = 'white';
                ctx.fillRect(coorX, coorY, 21, 21);
            }
        }
    }
    if (rowsToDelete > 0) {
        score += 10;
        ctx.fillStyle = 'white';
        ctx.fillRect(310, 109, 140, 19);
        ctx.fillStyle = 'black';
        ctx.fillText(score.toString(), 310, 127);
        //levels
        if (score % 100 == 0) {
            level++;
            ctx.fillStyle = 'white';
            ctx.fillRect(310, 173, 140, 19);
            ctx.fillStyle = 'black';
            ctx.fillText(level.toString(), 310, 190);
            moveAllRowsDown(rowsToDelete, startOfDeletion);
        }
        moveAllRowsDown(rowsToDelete, startOfDeletion);
    }
}

// 8. Move rows down after a row has been deleted
function moveAllRowsDown(rowsToDelete, startOfDeletion) {
    for (var i = startOfDeletion - 1; i >= 0; i--) {
        for (var x = 0; x < gBArrayWidth; x++) {
            var y2 = i + rowsToDelete;
            var square = stoppedShapeArray[x][i];
            var nextSquare = stoppedShapeArray[x][y2];

            if (typeof square === 'string') {
                nextSquare = square;
                gameBoardArray[x][y2] = 1; // Put block into GBA
                stoppedShapeArray[x][y2] = square; // Draw color into stopped

                // Look for the x & y values in the lookup table
                let coorX = coordinateArray[x][y2].x;
                let coorY = coordinateArray[x][y2].y;
                ctx.fillStyle = nextSquare;
                ctx.fillRect(coorX, coorY, 21, 21);

                square = 0;
                gameBoardArray[x][i] = 0; // Clear the spot in GBA
                stoppedShapeArray[x][i] = 0; // Clear the spot in SSA
                coorX = coordinateArray[x][i].x;
                coorY = coordinateArray[x][i].y;
                ctx.fillStyle = 'white';
                ctx.fillRect(coorX, coorY, 21, 21);
            }
        }
    }
}

// 9. Rotate the Tetromino
// ***** SLIDE *****
let rotateTetromino = () => {
    let newRotation = new Array();
    let tetrominoCopy = curTetromino;
    let curTetrominoBU;

    for (let i = 0; i < tetrominoCopy.length; i++) {
        // create a reference to the array that caused the error
        curTetrominoBU = [...curTetromino];
        //new x = laxtX -y
        //new y = x
        let x = tetrominoCopy[i][0];
        let y = tetrominoCopy[i][1];
        let newX = (getLastSquareX() - y);
        let newY = x;
        newRotation.push([newX, newY]);
    }
    deleteTetromino();

    // Try to draw the new Tetromino rotation
    try {
        curTetromino = newRotation;
        // if (!checkForHorizontalCollision() && !checkForVerticalCollison)
        drawTetromino();
    }
    // If there is an error get the backup Tetromino and
    // draw it instead
    catch (e) {
        if (e instanceof TypeError) {
            curTetromino = curTetrominoBU;
            deleteTetromino();
            drawTetromino();
        }
    }
}

let getLastSquareX = () => {
    let lastX = 0;
    for (let i = 0; i < curTetromino.length; i++) {
        let square = curTetromino[i];
        if (square[0] > lastX)
            lastX = square[0];
    }
    return lastX;
}

let saveToLocalStorage = () => {
    localStorage.setItem("highScore", JSON.stringify(highScoreArray));
}

let getDataFromLocalStorage = () => {
    var localData = localStorage.getItem("highScore");
    highScoreArray = localData ? JSON.parse(localData) : [];
}
let printHighScore = () => {
    let a = 265
    let length = 0;
    ctx.fillStyle = 'white';
    ctx.fillRect(310, 242, 140, 220);
    ctx.fillStyle = 'black';
    ctx.font = '15px Arial';

    if (highScoreArray != null) {
        if (highScoreArray.length > 10)
            length = 10
        else length = highScoreArray.length

        for (let i = 0; i < length; i++) {
            ctx.fillText("(" + (i + 1) + ")  " + highScoreArray[i].name.toString() + " - " + highScoreArray[i].score.toString(), 310, a);
            a += 20;
        }
    }
}
let sortHighScore = () => {
    highScoreArray.sort((a, b) => (a.score < b.score) ? 1 : -1)
}


let isHighScore = () => {
    if (highScoreArray.length == 0) return true
    if (highScoreArray.length < 10 && score > 0) return true
    for (let i = 0; i < highScoreArray.length; i++) {
        if (score > highScoreArray[i].score) {
            return true
        }
    }
    return false;
}
let restartGame = () => {
    startX = 4;
    startY = 0;
    score = 0;
    level = 1;
    winOrLose = "playing";
    curTetromino = [[1, 0], [0, 1], [1, 1], [2, 1]]
    tetrominos = [];
    gameBoardArray = [...Array(gBArrayHeight)].map(e => Array(gBArrayWidth).fill(0));
    stoppedShapeArray = [...Array(gBArrayHeight)].map(e => Array(gBArrayWidth).fill(0));
    setupCanvas()
}
