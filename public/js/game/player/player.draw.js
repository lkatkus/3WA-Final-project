// VARIABLES
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

var curFrame = 0;
var frameCount = 8;

var srcX = 0;
var srcY = 0;

// PLAYER OBJECT - DRAW
Player.prototype.draw = function(){
    this.playerImg.src = '../images/player-test.png';

    // srcX = curFrame * spriteWidth;

    let x = canvas.width / 2;
    let y = canvas.height / 2;
    // let y = this.y-this.height * 2 - camPanY;

    ctx.drawImage(this.playerImg, 0, 0, 60, 60, this.x, this.y, TILE_SIZE, TILE_SIZE);

    // if(this.right){
    //     srcY = trackRight * spriteHeight;
    //     ctx.drawImage(this.playerImg,srcX,srcY,spriteWidth,spriteHeight,x,y,TILE_SIZE,TILE_SIZE * 2);
    // }else if(this.left){
    //     srcY = trackLeft * spriteHeight;
    //     ctx.drawImage(this.playerImg,srcX,srcY,spriteWidth,spriteHeight,x,y,TILE_SIZE,TILE_SIZE * 2);
    // }else{
    //     if(player.previousDirection == 'right'){
    //         srcY = trackIdleRight * spriteHeight;
    //         ctx.drawImage(this.playerImg,srcX,srcY,spriteWidth,spriteHeight,x,y,TILE_SIZE,TILE_SIZE * 2);
    //     }else{
    //         srcY = trackIdleLeft * spriteHeight;
    //         ctx.drawImage(this.playerImg,srcX,srcY,spriteWidth,spriteHeight,x,y,TILE_SIZE,TILE_SIZE * 2);
    //     }
    // }
};
