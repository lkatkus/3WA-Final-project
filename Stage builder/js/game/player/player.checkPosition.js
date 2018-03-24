// PLAYER OBJECT - GET PLAYER CURRENT POSITION
Player.prototype.checkPosition = function (){
    this.playerRow = Math.floor(this.y / TILE_SIZE);
    this.playerCol = Math.floor((this.x + TILE_SIZE / 2) / TILE_SIZE);

    // this.tileCurrentPlayerPositionType = sceneLayout[this.playerRow][this.playerCol];
    // this.tileBelowPlayerPositionType = sceneLayout[this.playerRow + 1][this.playerCol];
    //
    // // FOR CLIMBING MOVEMENT
    // if(sceneLayout[this.playerRow + 1][this.playerCol] == 21 || sceneLayout[this.playerRow][this.playerCol] == 21 ||sceneLayout[this.playerRow][this.playerCol] == 22 || sceneLayout[this.playerRow][this.playerCol] == 23){
    //     this.canClimbUp = true;
    // }else{
    //     this.canClimbUp = false;
    // }
    //
    // if(sceneLayout[this.playerRow + 1][this.playerCol] == 21 || sceneLayout[this.playerRow + 1][this.playerCol] == 22 || sceneLayout[this.playerRow + 1][this.playerCol] == 23){
    //     this.canClimbDown = true;
    // }else{
    //     this.canClimbDown = false;
    // }

    // DEBUGGING
    document.getElementById('playerRow').innerHTML = this.playerRow;
    document.getElementById('playerCol').innerHTML = this.playerCol;
};
