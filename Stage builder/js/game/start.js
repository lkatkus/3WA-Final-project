// ========= VARIABLES =========
var canvas; /* CANVAS PLACEHOLDER */
var ctx; /* CANVAS CONTEXT */

// GAME SETUP
const FPS = 60; /* USED IN ANIMATION FUNCTION */

var sceneLayout = []; /* SCENE LAYOUT ARRAY PLACEHOLDER */

// MAIN WORLD PARAMETERS
var WORLD_COLS; /* NUMBER OF COLUMNS IN SCENE ARRAY */
var WORLD_ROWS; /* NUMBER OF ROWS IN SCENE ARRAY */

var TILE_SIZE; /* TILE SIZE IS CALCULATED IS setWorldSize() BASED ON SCREEN SIZE AND TILES_PER_ROW */
var TILES_PER_ROW = 11; /* CONTROLS NUMBER OF ROWS DISPLAYED ON SCREEN */

// TILE SHEET SETUP
var TILE_SHEET = 'images/tilesheet-20180320.png';
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

// ========= END VARIABLES =========

// ========= FUNCTIONS =========
// MAIN START FUNCTION. REQUIRES LAYOUT ARRAY IN JSON
function setupGame(layout){
    console.log('=== STARTING GAME ===');

    // CONVERT RECEIVED JSON TO ARRAY
    sceneLayout = JSON.parse(layout);

    // SELECTORS
    canvas = document.getElementById('sceneCanvas');
    ctx = canvas.getContext('2d');

    // START ANIMATION
    setWorldSize();
    setPlayer();
    makeWorld();
};

function makeWorld(){
        mainMove();
        mainDraw();
};

function startGame(){
    setInterval(function() {
        mainMove();
        mainDraw();
    }, 1000/FPS);
};

function mainMove(){
    player.checkPosition();
    player.move();
};

function mainDraw(){
    void ctx.clearRect(0, 0, canvas.width, canvas.height);
    drawScene();
    player.draw();
};


// SETUP CANVAS SIZE
function setWorldSize(){
    // WORLD SIZE PARAMETERS
    WORLD_COLS = sceneLayout[0].length;
    WORLD_ROWS = sceneLayout.length;

    TILE_SIZE = 100;

    // if(canvas.width / canvas.height < 1){
    //     TILE_SIZE = Math.ceil(canvas.width / TILES_PER_ROW);
    // }else{
    //     TILE_SIZE = Math.ceil(canvas.height / TILES_PER_ROW);
    // }

    // CANVAS SETUP
    canvas.width = WORLD_COLS * TILE_SIZE;
    canvas.height = WORLD_ROWS * TILE_SIZE;

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
