// ========= VARIABLES =========
var canvas; /* CANVAS PLACEHOLDER */
var ctx; /* CANVAS CONTEXT */

// GAME SETUP
const FPS = 60; /* USED IN ANIMATION FUNCTION */

var sceneLayout; /* SCENE LAYOUT ARRAY PLACEHOLDER */
var layout;

// MAIN WORLD PARAMETERS
var WORLD_COLS; /* NUMBER OF COLUMNS IN SCENE ARRAY */
var WORLD_ROWS; /* NUMBER OF ROWS IN SCENE ARRAY */

var TILE_SIZE; /* TILE SIZE IS CALCULATED IS setWorldSize() BASED ON SCREEN SIZE AND TILES_PER_ROW */
var TILES_PER_ROW = 11; /* CONTROLS NUMBER OF ROWS DISPLAYED ON SCREEN */

// TILE SHEET SETUP
var TILE_SHEET = '../images/tilesheet-20180320.png';
var TILESHEET_WIDTH = 1200;
var TILESHEET_HEIGHT = 1200;
var TILESHEET_ROWS = 20;
var TILESHEET_COLS = 20;
var TILESHEET_SPRITE = TILESHEET_WIDTH / TILESHEET_COLS;

var tile = new Image(); /* PLACEHOLDER FOR DRAWING SINGLE TILE */
tile.src = TILE_SHEET; /* SET TILESHEET SOURCE */

var player; /* PLAYER OBJECT PLACEHOLDER */

// HELPER VARIABLES
// ANIMATION INTERVAL HANDLING VARIABLES
var myAnimationInterval;
var myAnimationRequest;

// FOR STORING ON SCREEN VISIBLE TILES COORDINATES
var screen = {
    visibleRowTop:0,
    visibleRowBottom:0,
    visibleColLeft:0,
    visibleColRight:0
};

/* FOR CAMERA OFFSET WHEN PLAYER IS MOVING */
var camPanX = 0;
var camPanY = 0;
var baseHeight;

// ========= END VARIABLES =========

// ========= FUNCTIONS =========
// MAIN START FUNCTION

window.addEventListener('resize', function(){
    if(myAnimationInterval){
        setWorldSize();
        setPlayer();
    }else{
        setWorldSize();
        setPlayer();
        makeWorld();
    }
});

window.addEventListener('load', function(){

    console.log('=== SETUP GAME ===');

    // SELECTORS
    canvas = document.getElementById('sceneCanvas');
    ctx = canvas.getContext('2d');

    // START ANIMATION
    setWorldSize();
    setPlayer();
    makeWorld();
});

// USER WHEN FIRST DISPLAYING LAYOUT FOR USER
function makeWorld(){
    baseHeight = canvas.height / 4 * 3;
    camPanY = player.y - baseHeight;

    mainMove();
    mainDraw();
};

// TRIGGERED BY USER
function startGame(){
    document.getElementById('startButton').classList.add('d-none');

    console.log('=== START GAME ===');
    myAnimationInterval = setInterval(function() {
        mainMove();
        mainDraw();
    }, 1000/FPS);
};

function mainMove(){
    player.checkPosition();
    player.move();
    player.cameraFollow();
};

function mainDraw(){
    void ctx.clearRect(0, 0, canvas.width, canvas.height);

    ctx.save();
    ctx.translate(-camPanX, -camPanY);

    drawScene();
    ctx.restore();

    player.draw();

};

// SETUP CANVAS SIZE
function setWorldSize(){
    // WORLD SIZE PARAMETERS
    WORLD_COLS = sceneLayout[0].length;
    WORLD_ROWS = sceneLayout.length;

    // CANVAS SETUP
    canvas.width = document.getElementById('canvasContainer').offsetWidth;
    canvas.height = canvas.width;

    TILE_SIZE = document.getElementById('canvasContainer').offsetWidth / 10;

    // TILE_SIZE = 50;
    // CANVAS SETUP
    // canvas.width = WORLD_COLS * TILE_SIZE;
    // canvas.height = WORLD_ROWS * TILE_SIZE;

    // // CANVAS SETUP
    // canvas.width = 10 * TILE_SIZE;
    // canvas.height = 10 * TILE_SIZE;
};

function setPlayer(){
    player = new Player();
    calculateSpawnLocation();
    addPlayerControls();
}

// FIND LOCATION OF DESIRED SPRITE BY NUMBER ON TILESHEET
function getTileSheetLocation(i, j, numb){
    // REDUCE TILE NUMBER BY 1, BECAUSE TILES NUMBERING STARTS AT 1 AND ARRAY ON 0
    numb--;

    // CONVERT TILE NUMBER TO COORDINATES ON TILESHEET
    let sourceRow = Math.floor(numb / TILESHEET_COLS);
    let sourceCol = numb - sourceRow * TILESHEET_COLS;

    // SET TILE SOURCE
    ctx.drawImage(tile, sourceCol * TILESHEET_SPRITE, sourceRow * TILESHEET_SPRITE, TILESHEET_SPRITE, TILESHEET_SPRITE, j*TILE_SIZE, i*TILE_SIZE, TILE_SIZE, TILE_SIZE);
};

// DRAW SCENE
function drawScene(){
    for(let i = 0; i < sceneLayout.length; i++){
        for(let j = 0; j < sceneLayout[i].length; j++){
            if(sceneLayout[i][j] > 0){
                getTileSheetLocation(i,j,sceneLayout[i][j]);
            }
        }
    }
};

// ========= END FUNCTIONS =========
