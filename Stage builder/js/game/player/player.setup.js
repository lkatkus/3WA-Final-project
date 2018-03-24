// PLAYER OBJECT
function Player(){
    // APPEARANCE
    this.width = TILE_SIZE;
    this.height = TILE_SIZE;

    // POSITION
    this.x = 0;
    this.y = 0;

    this.playerCurrentY = 0;
    this.jumpHeight = 20;
    // GRID COORDINATES
    this.playerCol;
    this.playerRow;

    // PLACEHOLDERS FOR CHECKING TILE TYPES AROUND PLAYER
    this.tileCurrentPlayerPositionType;
    this.tileBelowPlayerPositionType;

    // MOVEMENT SPEED
    this.speedX = 1;
    this.speedY = 10;
    this.playerMaxSpeedX = Math.floor(TILE_SIZE / 12);
    this.playerMaxSpeedY = Math.floor(TILE_SIZE / 6);
    this.climbingSpeed = 0;

    // LEFT / RIGHT MOVEMENT
    this.left = false;
    this.right = false;
    this.previousDirection = 'right'; /* HELPER FOR IDLE ANIMATION DIRECTION */

    // MOVEMENT STATUS
    this.grounded = true;
    this.jumping = false;
    this.falling = false;
    // this.climbingUp = false;
    // this.climbingDown = false;
    // this.canClimbUp = false;
    // this.canClimbDown = false;

    this.playerImg = new Image();
};
