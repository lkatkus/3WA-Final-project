Player.prototype.cameraFollow = function() {

    camPanX = this.x - canvas.width / 2;

    var cameraFocusY = Math.floor(camPanY + baseHeight);
    var playerDistFromCameraFocusY = Math.floor(this.y - cameraFocusY);

    console.log(playerDistFromCameraFocusY)

    if(playerDistFromCameraFocusY > 0){
        camPanY ++;
    }else if(playerDistFromCameraFocusY < - canvas.height / 2){
        camPanY --;
    }
}
