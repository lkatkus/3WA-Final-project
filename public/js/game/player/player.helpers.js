// HELPERS

// CALCULATE PLAYER START POSITION
function calculateSpawnLocation(){
    // CHECK FOR SPAWN LOCATION IN LAYOUT ARRAY
    for(let i = 0; i < sceneLayout.length; i++){
        for(let j = 0; j < sceneLayout[i].length; j++){
            // IF FOUND SETUP PLAYER SPAWN LOCATION
            if(sceneLayout[i][j] == 'x'){
                player.y = i * TILE_SIZE;
                player.x = j * TILE_SIZE;
                break;
            }
        }
    }
};

// FOR COLLISION DETECTION
function returnTileGridStatus(x, y){
    // CONVERT TO GRID POSITION
    let gridRow = Math.floor(y / TILE_SIZE);
    let gridCol = Math.floor(x / TILE_SIZE);

    // CHECK IF TILE IS FREE (false) OR TAKEN (true)
    if(sceneLayout[gridRow][gridCol] == -1
        || sceneLayout[gridRow][gridCol] > 0 && sceneLayout[gridRow][gridCol] <= 5
        || sceneLayout[gridRow][gridCol] == 21
        || sceneLayout[gridRow][gridCol] >= 181 && sceneLayout[gridRow][gridCol] <= 183
        || sceneLayout[gridRow][gridCol] >= 208 && sceneLayout[gridRow][gridCol] <= 210
        || sceneLayout[gridRow][gridCol] === undefined){
        return true;
    }else{
        return false;
    }
};

// CAMERA FOLLOW FUNCTION
function cameraFollow() {
    camPanX = player.x - canvas.width / 2;

    if(!player.jumping || !player.falling){
        camPanY = player.y - canvas.height / 5 * 4;
    }
};

// CHECKS WHICH TILES ARE VISIBLE TO PLAYER
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
