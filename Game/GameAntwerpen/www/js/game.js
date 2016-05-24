var preload;
var play;
var menu;
var mening;
var lastQuestionMening = false;
  //hardcoded test array
var opinionQuestions = ["meningvraag1", "meningvraag2"];
  //hardcoded test array
var questions = [["De antwerpse zoo is de oudste dierentuin in België.", 1], ["Oorspronkelijk keek het standbeeld van Rubens op de groenplaats naar het noorden.", 0], ["vraag3", 1], ["vraag4", 0], ["vraag5", 1]];
var counter = 0;
var meningCounter = 0;
var questionsJSON;
var opinionQuestionsJSON;


window.onload = function () {

    var wWidth  = document.body.offsetWidth;
    var wHeight = document.body.offsetHeight;

    // Create a new Phaser Game
    game = new Phaser.Game(360,640, Phaser.CANVAS, "", null, false, false);

    // Add the game states
    game.state.add("Preload", preload);
    game.state.add("Menu", menu);
    game.state.add("Play", play);
    game.state.add("Mening", mening);

    // Start the "Preload" state
    game.state.start("Preload");


}

preload = function(game) {};
preload.prototype = {
    preload: function () {

        // Preload images
          //bg
        game.load.image("game-background", "assets/images/temp_bg.png");
          //tween image for opinion animation ending
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
          //intro tween images
        game.load.image("title-tween", "assets/images/title-tween.png");
        game.load.image("logo-tween", "assets/images/a-logo-tween.png");
          //answered all questions tween images
        game.load.image("proficiat-tween", "assets/images/proficiat-tween.png");
        game.load.image("alle-vragen-tween", "assets/images/alle-vragen.png");

        //Spritesheet animations
        game.load.spritesheet('correct', 'assets/images/correct2.png', 384, 216, 64);
        game.load.spritesheet('fout', 'assets/images/fout2.png', 384, 216, 64);
        game.load.spritesheet("mening", "assets/images/meningan2-ds.png", 180, 320, 60);

        // Preload audio
        game.load.audio("correct_sound", ["assets/sounds/correct.mp3", "assets/sounds/correct.ogg"]);
        game.load.audio("incorrect_sound", ["assets/sounds/incorrect.mp3", "assets/sounds/incorrect.ogg"]);

        //text fix
        questionText = game.add.text(-1000, -1000, "", {"font":"1pt SunAntwerpen", "fill":"#ffffff", "align":"center", "wordWrap":"true", "wordWrapWidth":"1"});

        //get JSON file
        //game.load.json("questions", "http://antwerpen.local/questions_json");
        //game.load.json("opinionQuestions", "http://antwerpen.local/opinionquestions_json");

        function receive(json){
          console.log(json);
          questionsJSON = json;
        };

        $.ajax({
          dataType:"jsonp",
          type: "GET",
          crossDomain: true,
          cache: false,
          jsonp: false,
          jsonpCallback: "receive",
          url: "http://www.exiles.multimediatechnology.be/questions_json?callback=receive?"
        });

        receive();
        console.log(questionsJSON);

        $.ajax({
          url:"http://www.exiles.multimediatechnology.be/opinionquestions_json",
          dataType:"jsop",
          succes: function(json){
            opnionionQuestionsJSON = json;
          }
        });

        console.log(opinionQuestionsJSON);

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

        //Set background color of menu
        game.stage.backgroundColor = "#b1003b";

        //init logo
        var logo = game.add.sprite(game.CENTER_X, game.CENTER_Y, "logo-tween");
        logo.anchor.set(0.5);
        logo.scale.setTo(0);

        //init title
        var title = game.add.sprite(game.CENTER_X, 75, "title-tween");
        title.scale.setTo(0.85);
        title.anchor.set(0.5);
        title.alpha = 0;

        //scale
        game.scale.scaleMode = Phaser.ScaleManager.SHOW_ALL;
        game.scale.pageAlignVertically = true;
        game.scale.pageAlignHorizontally = true;

        //Disable rotation
        game.scale.forceOrientation(false, true);

        //init playbutton
        this.startbtn = game.add.button(game.CENTER_X, game.CENTER_Y + 120, "start-btn", this.startGame, this);
        this.startbtn.anchor.set(0.5);
        this.startbtn.scale.setTo(0.75);
        this.startbtn.alpha = 0;

         //init website button
        this.websitebtn = game.add.button(game.CENTER_X, game.CENTER_Y + 200, "website-btn", this.goToWebsite, this);
        this.websitebtn.anchor.set(0.5);
        this.websitebtn.scale.setTo(0.75);
        this.websitebtn.alpha = 0;

        //startscreen animation
        firstTween = game.add.tween(logo.scale).to({ x: 1, y:1 }, 1000, Phaser.Easing.Quadratic.InOut);
        secondTween = game.add.tween(logo).to({ y: 255 }, 750, Phaser.Easing.Quadratic.InOut);
        thirdTween = game.add.tween(title).to({ alpha: 1}, 750, Phaser.Easing.Quadratic.InOut);
        fourthTween = game.add.tween(this.startbtn).to({ alpha: 1}, 500, Phaser.Easing.Quadratic.InOut);
        fifthTween = game.add.tween(this.websitebtn).to({ alpha: 1}, 500, Phaser.Easing.Quadratic.InOut);

        firstTween.chain(secondTween);
        secondTween.chain(thirdTween);
        thirdTween.chain(fourthTween);
        fourthTween.chain(fifthTween);

        firstTween.start();


    },
    startGame: function(){

        //destroy menu and go to next state
        this.startbtn.destroy();
        this.websitebtn.destroy();

        game.state.start("Play");

    },
    goToWebsite: function(){
        //open website homepage
          //antwerpen placeholder*********************************************************
        //window.open("http://www.antwerpen.be", "_blank");
        window.open("http://www.exiles.multimediatechnology.be", "_blank");
    }
}

play = function(game) {};
play.prototype = {
    create: function () {

        //create the json object
        //questionsJSON = game.cache.getJSON("questions");

          //test debug
        //console.log(questionsJSON[0].questionbody);
        //console.log(questionsJSON.length);

        //if the question counter is even and the last question wasn't an opinion, ask for opinion
        if(counter%2 == 0 && counter != 0 && lastQuestionMening == false){
            //test debug
          //console.log("counter%2 = 0!")
          game.state.start("Mening");
        }else{

          //last question wasn't an opinion
          lastQuestionMening = false;

          //init background
          this.background = game.add.sprite(0, 0, "game-background");
          this.background.scale.setTo(0.334);

          //init question text
          questionText = game.add.text(game.CENTER_X + 4, 130, questionsJSON[counter].questionbody, {"font":"20pt SunAntwerpen", "fill":"#ffffff", "align":"center", "wordWrap":"true", "wordWrapWidth":"280"});
          questionText.anchor.set(0.5);

          //init true button
          this.truebtn = game.add.button(game.CENTER_X + 78, game.CENTER_Y + 120, "true", this.waarAnimation, this);
          this.truebtn.anchor.set(0.5);
          this.truebtn.scale.setTo(0.205);

          //init false button
          this.falsebtn = game.add.button(game.CENTER_X - 78, game.CENTER_Y + 120, "false", this.nietwaarAnimation, this);
          this.falsebtn.anchor.set(0.5);
          this.falsebtn.scale.setTo(0.205);

          //init back to menu button
          this.backbtn = game.add.button(game.CENTER_X + 75, game.CENTER_Y + 250, "back", this.backToMenu, this);
          this.backbtn.anchor.set(0.5);
          this.backbtn.scale.setTo(0.75);

          //init website button
          this.webbtn = game.add.button(game.CENTER_X - 75, game.CENTER_Y + 250, "website-btn-small", this.goToWebsite, this);
          this.webbtn.anchor.set(0.5);
          this.webbtn.scale.setTo(0.75);

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
          sprite = game.add.sprite(game.CENTER_X+3, game.CENTER_Y-15, 'correct');
          sprite.anchor.set(0.5);
          sprite.scale.setTo(0.75);
          sprite.animations.add('correct_animation');
          this.correct.play();
          sprite.animations.play('correct_animation', 30, false);
        }
        //incorrect
        else{
          sprite = game.add.sprite(game.CENTER_X+3, game.CENTER_Y-15, 'fout');
          sprite.anchor.set(0.5);
          sprite.scale.setTo(0.75);
          sprite.animations.add('fout_animation');
          this.incorrect.play();
          sprite.animations.play('fout_animation', 30, false);
        }
        //question counter +1
        counter += 1;
        //start "completed" state when reached last question
        if(counter == questionsJSON.length && meningCounter == opinionQuestionsJSON.length){
          sprite.events.onAnimationComplete.add(function(){
            counter = 0;
            meningCounter = 0;
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
          sprite = game.add.sprite(game.CENTER_X+3, game.CENTER_Y-15, 'correct');
          sprite.anchor.set(0.5);
          sprite.scale.setTo(0.75);
          sprite.animations.add('correct_animation');
          this.correct.play();
          sprite.animations.play('correct_animation', 30, false);
        }
        //incorrect
        else{
          sprite = game.add.sprite(game.CENTER_X+3, game.CENTER_Y-15, 'fout');
          sprite.anchor.set(0.5);
          sprite.scale.setTo(0.75);
          sprite.animations.add('fout_animation');
          this.incorrect.play();
          sprite.animations.play('fout_animation', 30, false);
        }
        //question counter +1
        counter += 1;
        //start "completed" state when reached last question
        if(counter == questionsJSON.length && meningCounter == opinionQuestionsJSON.length){
          sprite.events.onAnimationComplete.add(function(){
            counter = 0;
            meningCounter = 0;
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
        window.open("http://www.exiles.multimediatechnology.be", "_blank");
    }
}

mening = function(game) {};
mening.prototype = {
    create: function () {

      ////startscreen animation
      sprite = game.add.sprite(0, 0, "mening");
      sprite.scale.setTo(2);
      sprite.animations.add("mening_animation");
      sprite.animations.play("mening_animation", 29, false, true);

      sprite.events.onAnimationComplete.add(function(){

        //create json object
        //opinionQuestionsJSON = game.cache.getJSON("opinionQuestions");

        //init background
        this.background = game.add.sprite(0, 0, "game-background");
        this.background.scale.setTo(0.334);

        //init question text
        questionText = game.add.text(game.CENTER_X + 4, 130, opinionQuestionsJSON[meningCounter].opinionquestionbody, {"font":"20pt SunAntwerpen", "fill":"#ffffff", "align":"center", "wordWrap":"true", "wordWrapWidth":"280"});
        questionText.anchor.set(0.5);

        //init project button
        this.projectbtn = game.add.button(game.CENTER_X, game.CENTER_Y-15, "project-btn", this.goToProject, this);
        this.projectbtn.anchor.set(0.5);
        this.projectbtn.scale.setTo(0.75);

        //init thumbsup button
        this.thumbsupbtn = game.add.button(game.CENTER_X + 78, game.CENTER_Y + 120, "thumbsup", this.thumbsUp, this);
        this.thumbsupbtn.anchor.set(0.5);
        this.thumbsupbtn.scale.setTo(0.205);

        //init thumbsdown button
        this.thumbsdownbtn = game.add.button(game.CENTER_X-78, game.CENTER_Y + 120, "thumbsdown", this.thumbsDown, this);
        this.thumbsdownbtn.anchor.set(0.5);
        this.thumbsdownbtn.scale.setTo(0.205);

        //init back to menu button
        this.backbtn = game.add.button(game.CENTER_X + 75, game.CENTER_Y + 250, "back", this.backToMenu, this);
        this.backbtn.anchor.set(0.5);
        this.backbtn.scale.setTo(0.75);

        //init website button
        this.webbtn = game.add.button(game.CENTER_X - 75, game.CENTER_Y + 250, "website-btn-small", this.goToWebsite, this);
        this.webbtn.anchor.set(0.5);
        this.webbtn.scale.setTo(0.75);

        //fade out last frame animation
        sprite = game.add.sprite(0, 0, "meningbg");
        //sprite.scale.setTo(3);
        game.add.tween(sprite).to({alpha: 0}, 1000, "Linear", true);


      },this);

    },
    thumbsUp: function() {
      //Will send data to online database
      //window.alert("Jij bent akkoord!");
      meningCounter += 1;
      lastQuestionMening = true;

      console.log(counter);
      console.log(questions.length);
      console.log(meningCounter);
      console.log(opinionQuestions.length);

      if(counter == questionsJSON.length || meningCounter == opinionQuestionsJSON.length){
          counter = 0;
          meningCounter = 0;
          this.background.destroy();
          questionText.destroy();
          this.projectbtn.destroy();
          this.thumbsupbtn.destroy();
          this.thumbsdownbtn.destroy();
          this.backbtn.destroy();
          this.webbtn.destroy();

          //Set background color of menu
          game.stage.backgroundColor = "#b1003b";

          //init logo
          var proficiat = game.add.sprite(game.CENTER_X, game.CENTER_Y, "proficiat-tween");
          proficiat.anchor.set(0.5);
          proficiat.scale.setTo(0);

          //init title
          var alleVragen = game.add.sprite(game.CENTER_X, 350, "alle-vragen-tween");
          alleVragen.anchor.set(0.5);
          alleVragen.alpha = 0;

          //startscreen animation
          firstTween = game.add.tween(proficiat.scale).to({ x: 1, y:1 }, 1000, Phaser.Easing.Quadratic.InOut);
          secondTween = game.add.tween(proficiat).to({ y: 100 }, 750, Phaser.Easing.Quadratic.InOut);
          thirdTween = game.add.tween(alleVragen).to({ alpha: 1}, 750, Phaser.Easing.Quadratic.InOut);
          fourthTween = game.add.tween(alleVragen).to({ alpha: 1}, 1000, Phaser.Easing.Quadratic.InOut);
          fifthTween = game.add.tween(proficiat).to({ alpha: 0}, 500, Phaser.Easing.Quadratic.InOut);
          sixthTween = game.add.tween(alleVragen).to({ alpha: 0}, 500, Phaser.Easing.Quadratic.InOut);

          firstTween.chain(secondTween);
          secondTween.chain(thirdTween);
          thirdTween.chain(fourthTween);
          fourthTween.chain(fifthTween);
          fifthTween.chain(sixthTween);

          firstTween.start();

          sixthTween.onComplete.add(doSomething, this);
          function doSomething () {
            game.state.start("Menu");
          }
      }
      else{
          game.state.start("Play");
      }
    },
    thumbsDown: function() {
      //will send data to online database
      //window.alert("Jij bent niet akkoord!")
      meningCounter +=1;
      lastQuestionMening = true;

      if(counter == questionsJSON.length || meningCounter == opinionQuestionsJSON.length){
          counter = 0;
          meningCounter =0;

          this.background.destroy();
          questionText.destroy();
          this.projectbtn.destroy();
          this.thumbsupbtn.destroy();
          this.thumbsdownbtn.destroy();
          this.backbtn.destroy();
          this.webbtn.destroy();

          //Set background color of menu
          game.stage.backgroundColor = "#b1003b";

          //init logo
          var proficiat = game.add.sprite(game.CENTER_X, game.CENTER_Y, "proficiat-tween");
          proficiat.anchor.set(0.5);
          proficiat.scale.setTo(0);

          //init title
          var alleVragen = game.add.sprite(game.CENTER_X, 350, "alle-vragen-tween");
          alleVragen.anchor.set(0.5);
          alleVragen.alpha = 0;

          //startscreen animation
          firstTween = game.add.tween(proficiat.scale).to({ x: 1, y:1 }, 1000, Phaser.Easing.Quadratic.InOut);
          secondTween = game.add.tween(proficiat).to({ y: 100 }, 750, Phaser.Easing.Quadratic.InOut);
          thirdTween = game.add.tween(alleVragen).to({ alpha: 1}, 750, Phaser.Easing.Quadratic.InOut);
          fourthTween = game.add.tween(alleVragen).to({ alpha: 1}, 1000, Phaser.Easing.Quadratic.InOut);
          fifthTween = game.add.tween(proficiat).to({ alpha: 0}, 500, Phaser.Easing.Quadratic.InOut);
          sixthTween = game.add.tween(alleVragen).to({ alpha: 0}, 500, Phaser.Easing.Quadratic.InOut);

          firstTween.chain(secondTween);
          secondTween.chain(thirdTween);
          thirdTween.chain(fourthTween);
          fourthTween.chain(fifthTween);
          fifthTween.chain(sixthTween);

          firstTween.start();

          sixthTween.onComplete.add(doSomething, this);
          function doSomething () {
            game.state.start("Menu");
          }
      }
      else{
          game.state.start("Play");
      }
    },
    goToProject: function(){
        //go to project page
        window.open("http://www.exiles.multimediatechnology.be", "_blank");
    },
    goToWebsite: function(){
        //go to project page
          //antwerpen placeholder**********************************************
        window.open("http://www.exiles.multimediatechnology.be", "_blank");
    },
    backToMenu: function(){
        game.state.start("Menu");
        meningCounter = 0;
        counter = 0;
    }
}
