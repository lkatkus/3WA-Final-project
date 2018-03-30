function cameraFollow() {
    camPanX = player.x - canvas.width / 2;

    camPanY = player.y - canvas.height / 2;

    var cameraFocusCenterY = Math.floor(camPanY + canvas.height / 4 * 3);
    var playerDistFromCameraFocusY = Math.floor(player.y - cameraFocusCenterY);

    // console.log(cameraFocusCenterY + ' ' + playerDistFromCameraFocusY + ' ' + player.y);
    //
    // if(playerDistFromCameraFocusY > 100){
    //     camPanY += player.speedY;
    //     console.log('1');
    // }else if(playerDistFromCameraFocusY < 0){
    //     camPanY -= player.speedY;
    //     console.log('2');
    // }else if(playerDistFromCameraFocusY == 0){
    //     camPanY = player.y;
    // }
}
