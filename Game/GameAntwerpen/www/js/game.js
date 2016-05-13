var preload;
var play;
var menu;
var mening;
var lastQuestionMening = false;
  //hardcoded test array
//var meningQuestions = ["meningvraag1", "meningvraag2"];
  //hardcoded test array
//var questions = [["De antwerpse zoo is de oudste dierentuin in België.", 1], ["Oorspronkelijk keek het standbeeld van Rubens op de groenplaats naar het noorden.", 0], ["vraag3", 1], ["vraag4", 0], ["vraag5", 1]];
var counter = 0;
var meningCounter = 0;
var questionsJSON;
var opinionQuestionsJSON;


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
        game.load.image("a-background", "assets/images/staticbg2.png");
        game.load.image("game-background", "assets/images/temp_bg.png");
        game.load.image("meningbg", "assets/images/meningend.png");
          //buttons
        game.load.image("start-btn", "assets/images/start-btn.png");
        game.load.image("website-btn", "assets/images/website-btn.png");
        game.load.image("website-btn-small", "assets/images/website-btn-small.png");
        game.load.image("true", "assets/images/waar2.png");
        game.load.image("false", "assets/images/nietwaar2.png");
        game.load.image("back", "assets/images/menu-btn-small.png");
        game.load.image("thumbsup", "assets/images/akkoordoutlined.png");
        game.load.image("thumbsdown", "assets/images/nietakkoordoutlined.png");
        game.load.image("project-btn", "assets/images/project-btn.png");

          //temp files
        game.load.image("under-construction", "assets/images/under_construction_kek.png");

        //Spritesheet animations
        //game.load.spritesheet('correct', 'assets/images/correct_spritesheet48.png', 320, 180, 72);
        game.load.spritesheet('correct', 'assets/images/correct2.png', 384, 216, 64);
        //game.load.spritesheet('fout', 'assets/images/fout_spritesheet48.png', 320, 180, 72);
        game.load.spritesheet('fout', 'assets/images/fout2.png', 384, 216, 64);
        game.load.spritesheet('intro', "assets/images/intro-animation.png", 360, 640, 61);
        game.load.spritesheet("mening", "assets/images/meningan2.png", 360, 640, 60);

        // Preload audio
        game.load.audio("correct_sound", ["assets/sounds/correct.mp3", "assets/sounds/correct.ogg"]);
        game.load.audio("incorrect_sound", ["assets/sounds/incorrect.mp3", "assets/sounds/incorrect.ogg"]);

        //text fix
        questionText = game.add.text(-1000, -1000, "", {"font":"1pt SunAntwerpen", "fill":"#ffffff", "align":"center", "wordWrap":"true", "wordWrapWidth":"1"});

        //get JSON file
        game.load.json("questions", "http://antwerpen.local/questions_json");
        game.load.json("opinionQuestions", "http://antwerpen.local/opinionquestions_json");

        //Define constant variables
        game.CENTER_X          = (game.width/2);
        game.CENTER_Y          = (game.height/2);


    },
    create: function () {

        //Everything is loaded, start the "Playgame" State
        game.state.start("Menu");

    }
}

menu = function(game) {};
menu.prototype = {
    create: function () {

        //add bg sprite
        this.background     = game.add.sprite(0, 0, "a-background");
        this.background.scale.setTo(3);

        //scale
        game.scale.scaleMode = Phaser.ScaleManager.SHOW_ALL;
        game.scale.pageAlignVertically = true;
        game.scale.pageAlignHorizontally = true;

        //Disable rotation
        game.scale.forceOrientation(false, true);

        //init playbutton
        this.startbtn = game.add.button(game.CENTER_X, game.CENTER_Y + 400, "start-btn", this.startGame, this);
        this.startbtn.anchor.set(0.5);
        this.startbtn.scale.setTo(2);

         //init website button
        this.websitebtn = game.add.button(game.CENTER_X, game.CENTER_Y + 625, "website-btn", this.goToWebsite, this);
        this.websitebtn.anchor.set(0.5);
        this.websitebtn.scale.setTo(2);

        //startscreen animation
        sprite = game.add.sprite(0, 0, "intro");
        sprite.scale.setTo(3);
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
        //open website homepage
          //antwerpen placeholder*********************************************************
        window.open("http://www.antwerpen.be", "_blank");
    }
}

play = function(game) {};
play.prototype = {
    create: function () {

        //create the json object
        questionsJSON = game.cache.getJSON("questions");
          //test debug
        console.log(questionsJSON[0].questionbody);
        console.log(questionsJSON.length);

        //if the question counter is even and the last question wasn't an opinion, ask for opinion
        if(counter%2 == 0 && counter != 0 && lastQuestionMening == false){
            //test debug
          console.log("counter%2 = 0!")
          game.state.start("Mening");
        }else{

          //last question wasn't an opinion
          lastQuestionMening = false;

          //init background
          this.background = game.add.sprite(0, 0, "game-background");

          //init question text
          questionText = game.add.text(game.CENTER_X, 400, questionsJSON[counter].questionbody, {"font":"60pt SunAntwerpen", "fill":"#ffffff", "align":"center", "wordWrap":"true", "wordWrapWidth":"800"});
          questionText.anchor.set(0.5);

          //init true button
          this.truebtn = game.add.button(game.CENTER_X + 230, game.CENTER_Y + 350, "true", this.waarAnimation, this);
          this.truebtn.anchor.set(0.5);
          this.truebtn.scale.setTo(0.60);

          //init false button
          this.falsebtn = game.add.button(game.CENTER_X - 230, game.CENTER_Y + 350, "false", this.nietwaarAnimation, this);
          this.falsebtn.anchor.set(0.5);
          this.falsebtn.scale.setTo(0.60);

          //init back to menu button
          this.backbtn = game.add.button(game.CENTER_X + 230, game.CENTER_Y + 800, "back", this.backToMenu, this);
          this.backbtn.anchor.set(0.5);
          this.backbtn.scale.setTo(2);

          //init website button
          this.webbtn = game.add.button(game.CENTER_X - 230, game.CENTER_Y +800, "website-btn-small", this.goToWebsite, this);
          this.webbtn.anchor.set(0.5);
          this.webbtn.scale.setTo(2);

          //add sound
          this.correct = game.add.audio("correct_sound");
          this.incorrect = game.add.audio("incorrect_sound");

        }

    },
    waarAnimation: function (){

        //set button input false to avoid spamming (button reactivates when state is restarted)
        this.falsebtn.input.enabled = false;
        this.truebtn.input.enabled = false;

        //correct
        if(questionsJSON[counter].correctanswer == 1){
          sprite = game.add.sprite(game.CENTER_X - 360, game.CENTER_Y-250, 'correct');
          sprite.scale.setTo(2,2);
          sprite.animations.add('correct_animation');
          this.correct.play();
          sprite.animations.play('correct_animation', 30, false);
        }
        //incorrect
        else{
          sprite = game.add.sprite(game.CENTER_X - 360, game.CENTER_Y-250, 'fout');
          sprite.scale.setTo(2,2);
          sprite.animations.add('fout_animation');
          this.incorrect.play();
          sprite.animations.play('fout_animation', 30, false);
        }
        //question counter +1
        counter += 1;
        //start "completed" state when reached last question
        if(counter == questionsJSON.length){
          sprite.events.onAnimationComplete.add(function(){
            game.state.start("Menu")
          },this);
        }
        //else start new question
        else{
          sprite.events.onAnimationComplete.add(function(){
            game.state.start("Play");
          },this);
        }

    },
    nietwaarAnimation: function (){

        //set button input false to avoid spamming (button reactivates when state is restarted)
        this.falsebtn.input.enabled = false;
        this.truebtn.input.enabled = false;

        //correct
        if(questionsJSON[counter].correctanswer == 0){
          sprite = game.add.sprite(game.CENTER_X - 360, game.CENTER_Y-250, 'correct');
          sprite.scale.setTo(2,2);
          sprite.animations.add('correct_animation');
          this.correct.play();
          sprite.animations.play('correct_animation', 30, false);
        }
        //incorrect
        else{
          sprite = game.add.sprite(game.CENTER_X - 360, game.CENTER_Y-250, 'fout');
          sprite.scale.setTo(2,2);
          sprite.animations.add('fout_animation');
          this.incorrect.play();
          sprite.animations.play('fout_animation', 30, false);
        }
        //question counter +1
        counter += 1;
        //start "completed" state when reached last question
        if(counter == questionsJSON.length){
          sprite.events.onAnimationComplete.add(function(){
            game.state.start("Menu")
          },this);
        }
        //else start new question
        else{
          sprite.events.onAnimationComplete.add(function(){
            game.state.start("Play");
          },this);
        }
    },
    backToMenu: function(){
        //reset question counters and go back to the menu state
        game.state.start("Menu");
        meningCounter = 0;
        counter = 0;
    },
    goToWebsite: function(){
        //go to website
          //antwerpen placeholder********************************************
        window.open("http://www.antwerpen.be", "_blank");
    }
}

mening = function(game) {};
mening.prototype = {
    create: function () {

      //startscreen animation
      sprite = game.add.sprite(0, 0, "mening");
      sprite.scale.setTo(3);
      sprite.animations.add("mening_animation");
      sprite.animations.play("mening_animation", 29, false);

      sprite.events.onAnimationComplete.add(function(){

        opinionQuestionsJSON = game.cache.getJSON("opinionQuestions");

        //init background
        this.background = game.add.sprite(0, 0, "game-background");

        //init question text
        questionText = game.add.text(game.CENTER_X, 400, opinionQuestionsJSON[meningCounter].opinionquestionbody, {"font":"60pt SunAntwerpen", "fill":"#ffffff", "align":"center", "wordWrap":"true", "wordWrapWidth":"800"});
        questionText.anchor.set(0.5);

        //init website button
        this.projectbtn = game.add.button(game.CENTER_X, game.CENTER_Y-50, "project-btn", this.goToProject, this);
        this.projectbtn.anchor.set(0.5);
        this.projectbtn.scale.setTo(2);

        //init thumbsup button
        this.thumbsupbtn = game.add.button(game.CENTER_X+230, game.CENTER_Y + 350, "thumbsup", this.thumbsUp, this);
        this.thumbsupbtn.anchor.set(0.5);
        this.thumbsupbtn.scale.setTo(0.60);

        //init thumbsdown button
        this.thumbsdownbtn = game.add.button(game.CENTER_X-230, game.CENTER_Y + 350, "thumbsdown", this.thumbsDown, this);
        this.thumbsdownbtn.anchor.set(0.5);
        this.thumbsdownbtn.scale.setTo(0.60);

        //init back to menu button
        this.backbtn = game.add.button(game.CENTER_X + 230, game.CENTER_Y + 800, "back", this.backToMenu, this);
        this.backbtn.anchor.set(0.5);
        this.backbtn.scale.setTo(2);

        //init website button
        this.webbtn = game.add.button(game.CENTER_X - 230, game.CENTER_Y + +800, "website-btn-small", this.goToWebsite, this);
        this.webbtn.anchor.set(0.5);
        this.webbtn.scale.setTo(2);

        sprite = game.add.sprite(0, 0, "meningbg");
        sprite.scale.setTo(3);

        game.add.tween(sprite).to({alpha: 0}, 1000, "Linear", true);


      },this);

    },
    thumbsUp: function() {
      //Will send data to online database
      //window.alert("Jij bent akkoord!");
      meningCounter += 1;
      lastQuestionMening = true;
      game.state.start("Play");
    },
    thumbsDown: function() {
      //will send data to online database
      //window.alert("Jij bent niet akkoord!")
      meningCounter +=1;
      lastQuestionMening = true;
      game.state.start("Play");
    },
    goToProject: function(){
        //go to project page
          //antwerpen placeholder**********************************************
        window.open(opinionQuestionsJSON[meningCounter].project_link, "_blank");
    },
    goToWebsite: function(){
        //go to project page
          //antwerpen placeholder**********************************************
        window.open("http://www.antwerpen.be", "_blank");
    },
    backToMenu: function(){
        game.state.start("Menu");
        meningCounter = 0;
        counter = 0;
    }
}

memeMachine = function(game) {};
memeMachine.prototype = {
    create: function () {

        this.background = game.add.sprite(0, 0, "under-construction");

    }
}
