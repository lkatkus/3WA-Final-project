// PLAYER CONTROLS
function addPlayerControls(){
    document.addEventListener('keydown',function(event){
        if(event.key == 'ArrowLeft' && !player.climbingDown){
            console.log('left');
            player.left = true;
        }
        if(event.key == 'ArrowRight' && !player.climbingDown){
            console.log('right');
            player.right = true;
        }
        if(event.key == 'ArrowUp'){
            console.log('up');
            if(!player.jumping && player.grounded){
                this.playerCurrentY = player.y;
                player.jumping = true;
                player.grounded = false;
                console.log('jump if1');
            }
        }
        // if(event.key == 'ArrowUp'){
        //     if(player.canClimbUp){
        //         player.climbingUp = true;
        //         player.climbingSpeed = Math.floor(-TILE_SIZE / 8);
        //     }
        // }
        // if(event.key == 'ArrowDown'){
        //     if(player.canClimbDown){
        //         player.climbingDown = true;
        //         player.climbingSpeed = Math.floor(TILE_SIZE / 8);
        //     }
        // }
    });

    document.addEventListener('keyup',function(event){
        if(event.key == 'ArrowLeft'){
            player.left = false;
            player.previousDirection = 'left';
            player.speedX = 1;
        }
        if(event.key == 'ArrowRight'){
            player.right = false;
            player.speedX = 1;
            player.previousDirection = 'right';
        }
        // if(event.key == 'ArrowUp'){
        //     player.climbingUp = false;
        // }
        // if(event.key == 'ArrowDown'){
        //     player.climbingDown = false;
        // }
    });
}
