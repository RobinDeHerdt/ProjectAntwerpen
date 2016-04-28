var preload;
var play;
var menu;
var mening;
var lastQuestionMening = false;
var meningQuestions = ["meningvraag1", "meningvraag2"];
var questions = [["De antwerpse zoo is\nde oudste dierentuin\nin België.", 1], ["Oorspronkelijk keek\nhet standbeeld van\nRubens op de\ngroenplaats naar\nhet noorden.", 0], ["vraag3", 1], ["vraag4", 0], ["vraag5", 1]];
var counter = 0;
var meningCounter = 0;


window.onload = function () {

    var wWidth  = document.body.offsetWidth;
    var wHeight = document.body.offsetHeight;

    // Create a new Phaser Game
    game = new Phaser.Game(1080,1920, Phaser.CANVAS, "", null, false, false);

    // Add the game states
    game.state.add("Preload", preload);
    game.state.add("Menu", menu);
    game.state.add("Play", play);
    game.state.add("Mening", mening);
    game.state.add("MemeMachine", memeMachine);

    // Start the "Preload" state
    game.state.start("Preload");


}

preload = function(game) {};
preload.prototype = {
    preload: function () {

        // Preload images
          //bg's
        game.load.image("a-background", "assets/images/staticbg.png");
        game.load.image("game-background", "assets/images/temp_bg.png");
          //buttons
        game.load.image("start-btn", "assets/images/start-btn.png");
        game.load.image("website-btn", "assets/images/website-btn.png");
        game.load.image("true", "assets/images/waar.png");
        game.load.image("false", "assets/images/nietwaar.png");
        game.load.image("back", "assets/images/back.png");
        game.load.image("thumbsup", "assets/images/akkoord.png");
        game.load.image("thumbsdown", "assets/images/nietakkoord.png");
        game.load.image("under-construction", "assets/images/under_construction_kek.png");

        //Spritesheet animations
        game.load.spritesheet('correct', 'assets/images/correct_spritesheet.png', 667, 375, 72);
        game.load.spritesheet('fout', 'assets/images/fout_spritesheet.png', 667, 375, 72);
        game.load.spritesheet('intro', "assets/images/superdownscale.png", 305, 543, 76);

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
        this.startbtn = game.add.button(game.CENTER_X, game.CENTER_Y + 350, "start-btn", this.startGame, this);
        this.startbtn.anchor.set(0.5);
        this.startbtn.scale.setTo(2);

        this.websitebtn = game.add.button(game.CENTER_X, game.CENTER_Y + 700, "website-btn", this.goToWebsite, this);
        this.websitebtn.anchor.set(0.5);
        this.websitebtn.scale.setTo(2);

        sprite = game.add.sprite(0, 0, "intro");
        sprite.scale.setTo(3.55,3.55);
        sprite.animations.add("intro_animation");
        sprite.animations.play("intro_animation", 30, false);

    },
    startGame: function(){

        //destroy menu and go to next state
        this.background.destroy();
        this.startbtn.destroy();
        this.websitebtn.destroy();

        game.state.start("Play");

    },
    goToWebsite: function(){
        window.open("http://www.antwerpen.be", "_blank");
    }
}

play = function(game) {};
play.prototype = {
    create: function () {

        if(counter%2 == 0 && counter != 0 && lastQuestionMening == false){
          console.log("counter = 2!")
          game.state.start("Mening");
        }

        lastQuestionMening = false;

        this.background = game.add.sprite(0, 0, "game-background");

        questionText = game.add.text(game.CENTER_X, 400, questions[counter][0], {"font":"bold 60pt Arial", "fill":"#ffffff"});
        questionText.anchor.set(0.5);

        //init true button
        this.truebtn = game.add.button(game.CENTER_X-230, game.CENTER_Y + 350, "true", this.waarAnimation, this);
        this.truebtn.anchor.set(0.5);
        this.truebtn.scale.setTo(0.60);

        //init false button
        this.falsebtn = game.add.button(game.CENTER_X+230, game.CENTER_Y + 350, "false", this.nietwaarAnimation, this);
        this.falsebtn.anchor.set(0.5);
        this.falsebtn.scale.setTo(0.60);

        //init back to menu button
        this.backbtn = game.add.button(game.CENTER_X, game.CENTER_Y + 800, "back", this.backToMenu, this);
        this.backbtn.anchor.set(0.5);
        this.backbtn.scale.setTo(2);


    },
    waarAnimation: function (){
        if(questions[counter][1] == 1){
          sprite = game.add.sprite(game.CENTER_X - 333, game.CENTER_Y-189, 'correct');
          sprite.animations.add('correct_animation');
          sprite.animations.play('correct_animation', 30, false);
        }else{
          sprite = game.add.sprite(game.CENTER_X - 333, game.CENTER_Y-189, 'fout');
          sprite.animations.add('fout_animation');
          sprite.animations.play('fout_animation', 30, false);
        }
        counter += 1;
        if(counter == 5){
          game.state.start("MemeMachine");
        }
        sprite.events.onAnimationComplete.add(function(){game.state.start("Play")},this);

    },
    nietwaarAnimation: function (){
        if(questions[counter][1] == 0){
          sprite = game.add.sprite(game.CENTER_X - 333, game.CENTER_Y-189, 'correct');
          sprite.animations.add('correct_animation');
          sprite.animations.play('correct_animation', 30, false);
        }else{
          sprite = game.add.sprite(game.CENTER_X - 333, game.CENTER_Y-189, 'fout');
          sprite.animations.add('fout_animation');
          sprite.animations.play('fout_animation', 30, false);
        }
        counter += 1;
        if(counter == 5){
          game.state.start("MemeMachine");
        }
        sprite.events.onAnimationComplete.add(function(){game.state.start("Play")},this);
    },
    backToMenu: function(){
        game.state.start("Menu");
        meningCounter = 0;
        counter = 0;
    }
}

mening = function(game) {};
mening.prototype = {
    create: function () {

        this.background = game.add.sprite(0, 0, "game-background");

        questionText = game.add.text(game.CENTER_X, 400, meningQuestions[meningCounter], {"font":"bold 60pt Arial", "fill":"#ffffff"});
        questionText.anchor.set(0.5);

        //init website button
        this.websitebtn = game.add.button(game.CENTER_X, game.CENTER_Y-50, "website-btn", this.goToWebsite, this);
        this.websitebtn.anchor.set(0.5);
        this.websitebtn.scale.setTo(2);

        //init thumbsup button
        this.thumbsupbtn = game.add.button(game.CENTER_X-230, game.CENTER_Y + 350, "thumbsup", this.thumbsUp, this);
        this.thumbsupbtn.anchor.set(0.5);
        this.thumbsupbtn.scale.setTo(0.60);

        //init thumbsdown button
        this.thumbsdownbtn = game.add.button(game.CENTER_X+230, game.CENTER_Y + 350, "thumbsdown", this.thumbsDown, this);
        this.thumbsdownbtn.anchor.set(0.5);
        this.thumbsdownbtn.scale.setTo(0.60);

        //init back to menu button
        this.backbtn = game.add.button(game.CENTER_X, game.CENTER_Y + 800, "back", this.backToMenu, this);
        this.backbtn.anchor.set(0.5);
        this.backbtn.scale.setTo(2);
    },
    thumbsUp: function() {
      //Will send data to online database
      window.alert("Jij bent akkoord!");
      meningCounter += 1;
      lastQuestionMening = true;
      game.state.start("Play");
    },
    thumbsDown: function() {
      //will send data to online database
      window.alert("Jij bent niet akkoord!")
      meningCounter +=1;
      lastQuestionMening = true;
      game.state.start("Play");
    },
    goToWebsite: function(){
        window.open("http://www.antwerpen.be", "_blank");
    }
}

memeMachine = function(game) {};
memeMachine.prototype = {
    create: function () {

        this.background = game.add.sprite(0, 0, "under-construction");

    }
}
