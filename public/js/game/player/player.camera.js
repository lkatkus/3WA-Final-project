Player.prototype.cameraFollow = function() {

    camPanX = player.x - canvas.width / 2;

    var cameraFocusY = Math.floor(camPanY + baseHeight);
    var playerDistFromCameraFocusY = Math.floor(player.y - cameraFocusY);

    console.log(playerDistFromCameraFocusY)

    if(playerDistFromCameraFocusY > 0){
        camPanY ++;
    }else if(playerDistFromCameraFocusY < - canvas.height / 2){
        camPanY --;
    }
}
