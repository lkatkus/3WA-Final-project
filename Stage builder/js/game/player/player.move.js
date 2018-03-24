// PLAYER OBJECT - MOVEMENT FUNCTION
Player.prototype.move = function(){

    // MOVING LEFT
    if(this.left){
        let nextX = this.x;
        this.x -= this.speedX;

        if(returnTileGridStatus(this.x - 1, this.y)){
            this.x = nextX;
        }else{

            // ACCELERATION
            if(this.speedX < this.playerMaxSpeedX){
                this.speedX++;
            }

            // CHECK BOTTOM TYLE
            if(!this.jumping){
                if(returnTileGridStatus(this.x, this.y + TILE_SIZE + 1) || returnTileGridStatus(this.x + TILE_SIZE, this.y + TILE_SIZE + 1)){
                    this.falling = false;
                    this.grounded = true;
                }else{
                    this.falling = true;
                }
            }
        }

    // MOVING RIGHT
    }else if(this.right){
        let nextX = this.x;
        this.x += this.speedX;

        if(returnTileGridStatus(this.x + TILE_SIZE + 1,this.y)){
            this.x = nextX;
        }else{
            // ACCELERATION
            if(this.speedX < this.playerMaxSpeedX){
                this.speedX++;
            }

            // CHECK BOTTOM TYLE
            if(!this.jumping){
                if(returnTileGridStatus(this.x, this.y + TILE_SIZE + 1) || returnTileGridStatus(this.x + TILE_SIZE, this.y + TILE_SIZE + 1)){
                    this.falling = false;
                    this.grounded = true;
                }else{
                    this.falling = true;
                }
            }
        }
    }

    // WHEN PLAYER IS FALLING
    if(this.falling){
        let nextY = this.y;
        this.y += this.speedY;

        // CHECK TILE BELOW PLAYER
        if(returnTileGridStatus(this.x,this.y + TILE_SIZE + 1) || returnTileGridStatus(this.x + TILE_SIZE,this.y + TILE_SIZE + 1)){
                this.jumping = false;
                this.falling = false;
                this.grounded = true;
                this.speedY = 10;

                // IF NEXT POSITION IS TAKEN. SET PLAYER POSITION TO PREVIOUS
                this.y = (this.playerRow + 1) * TILE_SIZE;

        }else{
            // ACCELERATION
            if(this.speedY < this.playerMaxSpeedY){
                this.speedY++;
            }else{
                this.speedY = this.playerMaxSpeedY;
            }
        }
    }

    // FOR JUMPING
    if(this.jumping && !this.grounded){

        console.log('jump route');

        // INITIAL JUMP
        if(this.playerCurrentY - this.jumpHeight <= this.y && this.jumping && !this.falling){

            this.y -= this.speedY;

            // // ACCELERATION
            // if(this.speedY > 1){
            //     this.speedY--;
            // }else{
            //     this.speedY = 1;
            // }

            // CHECKING TILE ABOVE PLAYER IS EMPTY
            // if(returnTileGridStatus(this.x,this.y-this.height) || returnTileGridStatus(this.x + this.width - 1,this.y - this.height)){
            //         this.falling = true;
            //         this.jumping = false;
            //         this.y = this.y;
            // }

            // CHECK IF MAX JUMP HEIGHT IS REACHED
            if(this.playerCurrentY - this.jumpHeight >= this.y){
                console.log('max height')
                this.falling = true;
                this.jumping = false;
            }
        }
}

    // CLIMBING
    // UP
    if(this.canClimbUp && this.climbingUp){
        let nextY = this.y;

        if(checkLadder(this.x + TILE_SIZE / 2, this.y - TILE_SIZE)){
            this.y += this.climbingSpeed;
        }else{
            this.y = nextY;
            this.y = (this.playerRow + 1) * TILE_SIZE;
        }

    // DOWN
    }else if(this.canClimbDown && this.climbingDown){
        let nextY = this.y;

        if(checkLadder(this.x + TILE_SIZE / 2, this.y + TILE_SIZE)){
            this.y += this.climbingSpeed;
        }else{
            this.y = nextY;
            this.y = (this.playerRow + 2) * TILE_SIZE;
        }

    // STOPPED CLIMBING
    }else{
        this.y = this.y;
        this.climbingSpeed = 0;
    }
};
