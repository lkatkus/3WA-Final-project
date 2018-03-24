
var builderLayout; /* lAYOUT GENERATION FORM */
var tileTypeSelectors; /* TYLE TYPE BUTTON CONTAINER */
var builderLayoutContainer; /* CONTAINER FOR APPENDING GENERATED LAYOUT */

var newTileType; /* PLACEHOLDER FOR KEEPING SELECTED TYLE TYPE */
var levelArray = []; /* PLACEHOLDER FOR LEVEL LAYOUT ARRAY */

var numberOfTileTypes = 23; /* NUMBER OF POSIBLE TILE TYPES FOR GENERATING TILE BUTTONS */

window.addEventListener('load', function(){

    // SELECTORS
    builderLayout = document.getElementById('builderLayout');
    tileTypeSelectors = document.getElementById('tileTypeSelectors');
    builderLayoutContainer = document.getElementById('builderLayoutContainer');

    // LAYOUT GENERATION
    builderLayout.addEventListener('submit', function(event){
        // PREVENT FORM SUBMIT
        event.preventDefault();

        // CAPTURE FORM ELEMENTS
        let formElements = document.getElementById("builderLayout").elements;
        let postData = {}; /* OBJECT FOR STORING FORM DATA */

        // PUSH FORM DATA TO PLACEHOLDER OBJECT
        for (let i = 0; i < formElements.length; i++){
            if (formElements[i].type != "submit"){
                postData[formElements[i].name] = formElements[i].value;
            };
        };

        // CREATE TILES AND APPEND TO CONTAINER
        for(let i = 0; i < postData.layoutRows; i++){
            // CREATE ROW DIV
            let rowDiv = document.createElement('div');
            rowDiv.classList.add('layoutRow');

            for(let j = 0; j < postData.layoutCols; j++){
                // CREATE TILE DIV
                let tileDiv = document.createElement('div');
                tileDiv.classList.add('layoutTile');
                tileDiv.setAttribute('value', 0);

                // APPEND TILE DIV TO ROW DIV
                rowDiv.appendChild(tileDiv);
            };

            // APPEND ROW DIV
            builderLayoutContainer.appendChild(rowDiv);
        }

    });
    // END LAYOUT GENERATION

    // GENERATE TILE TYPE SELECTOR BUTTONS
    for(let i = 1; i <= numberOfTileTypes; i++){
        let button = document.createElement('button');
        button.setAttribute('value', i);
        button.appendChild(document.createTextNode(i));
        button.classList.add('builderButton');
        button.style.backgroundImage  = `url(\"images/tiles/tile-${i}.png\")`;
        tileTypeSelectors.appendChild(button);
    }
    // END GENERATE TILE TYPE SELECTOR BUTTONS


    // GET NEW TILE TYPE
    tileTypeSelectors.addEventListener('mousedown', function(){
        // SELECT TYPE WHICH WAS CLICKED
        let type = document.elementFromPoint(event.clientX, event.clientY);

        // APPLY TYPE TO PLACEHOLDER
        newTileType = type.getAttribute('value');
    });
    // END GET NEW TILE TYPE

    // APPLY NEW TYPE TO LAYOUT
    builderLayoutContainer.addEventListener('mousedown', function(){
        // SELECT TILE WHICH WAS CLICKED
        let tile = document.elementFromPoint(event.clientX, event.clientY);

        // CHECK IF TILE WAS CLICKED
        if(tile.classList.contains('layoutTile')){
            if(newTileType != 0 && newTileType != 'x'){
                // APPLY VALUE
                tile.style.backgroundImage  = `url(\"images/tiles/tile-${newTileType}.png\")`;
                tile.setAttribute('value', newTileType);
            }else if(newTileType == 0){
                tile.style.backgroundImage  = ``;
                tile.setAttribute('value', newTileType);
            }else if(newTileType == 'x'){
                tile.style.backgroundImage  = `url(\"images/player-test.png\")`;
                tile.setAttribute('value', newTileType);
            }
        };
    });
    // END APPLY NEW TYPE TO LAYOUT
});

// GENERATE LEVEl ARRAY
function generateLevelArray(){
    // SELECT ALL ROWS IN LAYOUT
    let rows = document.getElementById("builderLayoutContainer").querySelectorAll('.layoutRow');

    // GET ALL TILE DIV VALUES AND PUSH TO LEVEL ARRAY
    for(let i = 0; i < rows.length; i++){
        // CREATE SINGLE ROW ARRAY
        let rowArray = [];

        // SELECT ALL TILES ON A SINGLE ROW
        let tiles  = rows[i].querySelectorAll('.layoutTile');

        for(let j = 0; j < tiles.length; j++){
            // GET TILE DIV VALUE
            let value = tiles[j].getAttribute('value');

            // CHECK IF VALUE IS STRING. FOR PLAYER SPAWN LOCATION ETC AND PUSH TO ARRAY
            if(isNaN(value)){
                rowArray.push(tiles[j].getAttribute('value'));
            }else{
                rowArray.push(Number(tiles[j].getAttribute('value')));
            }

        };

        // PUSH ROW ARRAY TO LEVEL ARRAY
        levelArray.push(rowArray);
    };

    // CONVERT LEVEL LAYOUT ARRAY TO JSON FOR STORING IN DATABASE
    let levelJSON = JSON.stringify(levelArray);

    // FOR TESTING
    startGame(levelJSON);

    // ADD DATA TO DB

};
