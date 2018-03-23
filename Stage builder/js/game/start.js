// VARIABLES
// MAIN WORLD PARAMETERS
var WORLD_COLS;
var WORLD_ROWS;

var TILE_SIZE;
var TILES_PER_ROW = 11; /* CONTROLS NUMBER OF ROWS DISPLAYED ON SCREEN */

// GAME SETUP
const FPS = 60;

// MAIN PLAYER VARIABLES
var player;
var playerCurrentX;
var playerCurrentY;

var playerMaxSpeedX;
var playerMaxSpeedY;

// PLAYER SPRITE SHEET SETUP
var spriteSheetWidth = 900;
var spriteSheetHeight = 800;
var rows = 4;
var cols = 9;

// PLAYER SPRITE LAYOUT IN SPRITE SHEET
var trackRight = 0; /* FOR MOVING RIGHT ANIMATION */
var trackLeft = 1; /* FOR MOVING LEFT ANIMATION */
var trackIdleRight = 2; /* FOR IDLE RIGHT ANIMATION */
var trackIdleLeft = 3; /* FOR IDLE LEFT ANIMATION */

// PLAYER SPRITE
var spriteWidth = 100;
var spriteHeight = 200;

// var spriteWidth = Number(spriteWidth/cols);
// var spriteHeight = Number(spriteHeight/rows);

var curFrame = 0;
var frameCount = 8;

var srcX = 0;
var srcY = 0;

// INTERVAL HANDLING VARIABLES
var myAnimationInterval;
var myAnimationRequest;

// CAMERA CONTROL VARIABLES
var camPanX = 0;
var camPanY = 0;

var screen = {
    visibleRowTop:0,
    visibleRowBottom:0,
    visibleColLeft:0,
    visibleColRight:0
};


// ========= NEW CODE =========

var canvas; /* CANVAS PLACEHOLDER */
var ctx; /* CANVAS CONTEXT */

var sceneLayout = []; /* SCENE LAYOUT ARRAY PLACEHOLDER */

// TILE SHEET SETUP
var TILE_SHEET = 'images/tilesheet-20180320.png';
var TILESHEET_WIDTH = 1200;
var TILESHEET_HEIGHT = 1200;
var TILESHEET_ROWS = 20;
var TILESHEET_COLS = 20;
var TILESHEET_SPRITE = TILESHEET_WIDTH / TILESHEET_COLS;


function startGame(layout){
    console.log('=== STARTING GAME ===');

    sceneLayout = JSON.parse(layout);
    console.log(sceneLayout);

    // SELECTORS
    canvas = document.getElementById('sceneCanvas');
    ctx = canvas.getContext('2d');


    function mainDraw(){
        void ctx.clearRect(0, 0, canvas.width, canvas.height);
        drawScene();
    };

    function animate(){
        setInterval(function() {
            mainDraw();
        }, 1000/FPS);
    };

    // START ANIMATION
    setWorldSize();
    animate();

};

// SETUP CANVAS SIZE
function setWorldSize(){
    // WORLD SIZE PARAMETERS
    WORLD_COLS = sceneLayout[0].length;
    WORLD_ROWS = sceneLayout.length;

    // CANVAS SETUP
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;

    if(canvas.width / canvas.height < 1){
        TILE_SIZE = Math.ceil(canvas.width / TILES_PER_ROW);
    }else{
        TILE_SIZE = Math.ceil(canvas.height / TILES_PER_ROW);
    }
};

// FIND LOCATION OF DESIRED SPRITE BY NUMBER ON TILESHEET
function getTileSheetLocation(i, j, numb){
    numb--;
    let sourceRow = Math.floor(numb / TILESHEET_COLS);
    let sourceCol = numb - sourceRow * TILESHEET_COLS;

    let tile = new Image();
    tile.src = TILE_SHEET;
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


// ========= NEW CODE =========


// MAIN START FUNCTION
function init(){



    function drawScene(){
        for(let i = screen.visibleRowTop; i < screen.visibleRowBottom; i++){
            for(let j = screen.visibleColLeft; j < screen.visibleColRight; j++){
                if(sceneLayout[i][j] > 0){
                    getTileSheetLocation(i,j,sceneLayout[i][j]);
                }
            }
        }
    };



    function cameraFollow() {
        camPanX = player.x - canvas.width / 2;

        if(!player.jumping || !player.falling){
            camPanY = player.y - canvas.height / 5 * 4;
        }
    };

    function checkVisibleTiles() {

        var colsThatFitOnScreen = Math.floor(canvas.width / TILE_SIZE);
        var rowsThatFitOnScreen = Math.floor(canvas.height / TILE_SIZE);

        var cameraLeftMostCol = Math.floor(camPanX / TILE_SIZE);
        if(cameraLeftMostCol < 0){
            cameraLeftMostCol = 0;
        }
        var cameraRightMostCol = cameraLeftMostCol + colsThatFitOnScreen + 2;
        if(cameraRightMostCol > sceneLayout[0].length){
            cameraRightMostCol = sceneLayout[0].length;
        }

        var cameraTopMostRow = Math.floor(camPanY / TILE_SIZE);
        if(cameraTopMostRow < 0){
            cameraTopMostRow = 0;
        }

        var cameraBottomMostRow = cameraTopMostRow + rowsThatFitOnScreen + 2;
        if(cameraBottomMostRow > sceneLayout.length){
            cameraBottomMostRow = sceneLayout.length;
        }

        screen.visibleColLeft = cameraLeftMostCol;
        screen.visibleColRight = cameraRightMostCol;

        screen.visibleRowTop = cameraTopMostRow;
        screen.visibleRowBottom = cameraBottomMostRow;
    };






    function mainMove(){
        // player.checkPosition();
        // player.move();
        // cameraFollow();
    };

    function mainDraw(){
        void ctx.clearRect(0, 0, canvas.width, canvas.height);
        // ctx.save();
        // ctx.translate(-camPanX, -camPanY);
        drawScene();
        // ctx.restore();
        // player.draw();
    };

    function animate(){
        setInterval(function() {
            // mainMove();
            // checkVisibleTiles();
            mainDraw();
        }, 1000/FPS);

        setInterval(function(){
            curFrame = ++curFrame % frameCount;
        }, 100);
    };


    // START ANIMATION
    // animate();




}
