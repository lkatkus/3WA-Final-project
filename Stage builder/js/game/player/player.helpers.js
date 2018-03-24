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
        || sceneLayout[gridRow][gridCol] >= 208 && sceneLayout[gridRow][gridCol] <= 210){
        return true;
    }else{
        return false;
    }
};
