// PLAYER OBJECT - DRAW
Player.prototype.draw = function(){
    this.playerImg.src = 'images/player-test.png';

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
