var game;
var preload;
var playgame;
var menu;
var deathScreen;
var helpmenu;//-------------------------------------------------------------------------------------------------------------


window.onload = function () {

    var wWidth  = document.body.offsetWidth;
    var wHeight = document.body.offsetHeight;

    // Create a new Phaser Game
    game = new Phaser.Game(1080,1920, Phaser.CANVAS, "", null, false, false);

    // Add the game states
    game.state.add("Preload", preload);
    game.state.add("Menu", menu);

    // Start the "Preload" state
    game.state.start("Preload");


}

preload = function(game) {};
preload.prototype = {
    preload: function () {
        // Preload images
        game.load.image("a-background", "assets/images/ascreen.png");


        //buttons
        game.load.image("start-btn", "assets/images/start_button.png");
        game.load.image("help-btn", "assets/images/help_button.png");




        // Define constant variables
        game.CENTER_X          = (game.width/2);
        game.CENTER_Y          = (game.height/2);



    },
    create: function () {

        // Everything is loaded, start the "Playgame" State
        game.state.start("Menu");

    }
}

menu = function(game) {};
menu.prototype = {
    create: function () {

        //add bg sprite
        this.background     = game.add.sprite(0, 0, "a-background");

        //scale
        game.scale.scaleMode = Phaser.ScaleManager.SHOW_ALL;
        game.scale.pageAlignVertically = true;
        game.scale.pageAlignHorizontally = true;

        //Disable rotation
        game.scale.forceOrientation(false, true);

        //init playbutton
        this.startbtn = game.add.button(game.CENTER_X, game.CENTER_Y + 600, "start-btn", this.startGame, this);
        this.startbtn.anchor.set(0.5);
        this.startbtn.scale.setTo(3);

        this.helpbtn = game.add.button(game.CENTER_X, game.CENTER_Y + 800, "help-btn", this.startHelp, this);
        this.helpbtn.anchor.set(0.5);
        this.helpbtn.scale.setTo(3);

        //title
        this.titleText = game.add.text(game.CENTER_X, 300, "Placeholder", {"font":"bold 100pt Arial", "fill":"#ffffff"});
        this.titleText.anchor.set(0.5);

    },
    startGame: function(){
        //destroy menu and go to next state
        this.startbtn.destroy();
        this.helpbtn.destroy();
    },
    //-----------------------------------------------------------------------
    startHelp: function(){
      this.startbtn.destroy();
      this.helpbtn.destroy();
    }
    //-----------------------------------------------------------------------
}
