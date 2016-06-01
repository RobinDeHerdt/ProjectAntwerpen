var preload;
var play;
var menu;
var mening;
var lastQuestionMening = false;
var counter = 0;
var opinionCounter = 0;
var questionsJSON;
var opinionQuestionsJSON;
var vote;

//get already answered questions from localstorage
if( !JSON.parse(localStorage.getItem("opinionCheck")) ){
  var opinionCheck = [];
}else{
  var opinionCheck = JSON.parse(localStorage.getItem("opinionCheck")) ;
}


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
        game.load.image("game-background", "assets/images/temp_bg2.png");
          //tween image for opinion animation ending
        game.load.image("meningbg", "assets/images/meningend.png");
          //buttons
        game.load.spritesheet("startsheet", "assets/images/new-start-sheet.png", 308, 88, 2);
        game.load.spritesheet("websitesheet", "assets/images/new-website-sheet.png", 308, 88, 2);
        game.load.spritesheet("smallwebsitesheet", "assets/images/small-website-sheet.png", 182, 88, 2);
        game.load.spritesheet("smallmenusheet", "assets/images/small-menu-sheet.png", 182, 88, 2);
        game.load.spritesheet("projectsheet", "assets/images/project-sheet.png", 308, 88, 2);
        game.load.image("true", "assets/images/waar2.png");
        game.load.image("false", "assets/images/nietwaar2.png");
        game.load.image("thumbsup", "assets/images/akkoordoutlined.png");
        game.load.image("thumbsdown", "assets/images/nietakkoordoutlined.png");
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

        //get JSON files
        $.ajax({
          url: "http://www.exiles.multimediatechnology.be/questions_json?callback=?",
          dataType: "jsonp",
          success: function(response){
            console.log(response);
            questionsJSON = response;
          }
        });

        $.ajax({
          url: "http://www.exiles.multimediatechnology.be/opinionquestions_json?callback=?",
          dataType: "jsonp",
          success: function(response){
            console.log(response);
            opinionQuestionsJSON = response;
          }
        });

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

        //HIDDEN CLEAR BUTTON --> CLEARS LOCAL STORAGE FOR TESTING PURPOSES
        clearbtn = game.add.button(0,0, "", function(){console.log("voor: "+opinionCheck);localStorage.removeItem("opinionCheck");opinionCheck = [];console.log("na: "+opinionCheck);}, this);


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
        this.startbtn = game.add.button(game.CENTER_X, game.CENTER_Y + 110, "startsheet", this.startGame, this, 1, 0);
        this.startbtn.anchor.set(0.5);
        this.startbtn.scale.setTo(0.75);
        this.startbtn.alpha = 0;

         //init website button
        this.websitebtn = game.add.button(game.CENTER_X, game.CENTER_Y + 200, "websitesheet", this.goToWebsite, this, 1, 0);
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
        window.open("http://www.exiles.multimediatechnology.be/", "_blank");
    }
}

play = function(game) {};
play.prototype = {
    create: function () {

        //if the question counter is even and the last question wasn't an opinion, ask for opinion
        if(counter%2 == 0 && counter != 0 && lastQuestionMening == false){

          game.state.start("Mening");

        }else{

          //last question wasn't an opinion
          lastQuestionMening = false;

          //init background
          this.background = game.add.sprite(0, 0, "game-background");
          this.background.scale.setTo(0.334);

          //init question text
          //questionText = game.add.text(game.CENTER_X + 4, 130, questionsJSON[counter].questionbody, {"font":"20pt SunAntwerpen", "fill":"#ffffff", "align":"center", "wordWrap":"true", "wordWrapWidth":"280"});
          questionText = game.add.text(
              game.CENTER_X + 4, 140,
             questionsJSON[counter].questionbody,
             {"font":"20pt SunAntwerpen", "fill":"#000000", "align":"center", "wordWrap":"true", "wordWrapWidth":"280"}
          );
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
          this.backbtn = game.add.button(game.CENTER_X + 75, game.CENTER_Y + 250, "smallmenusheet", this.backToMenu, this, 1, 0);
          this.backbtn.anchor.set(0.5);
          this.backbtn.scale.setTo(0.75);

          //init website button
          this.webbtn = game.add.button(game.CENTER_X - 75, game.CENTER_Y + 250, "smallwebsitesheet", this.goToWebsite, this, 1, 0);
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
        if(counter == questionsJSON.length &&  opinionCounter == opinionQuestionsJSON.length){
          sprite.events.onAnimationComplete.add(function(){
            counter = 0;
            opinionCounter = 0;
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
        if(counter == questionsJSON.length && opinionCounter == opinionQuestionsJSON.length){
          sprite.events.onAnimationComplete.add(function(){
            counter = 0;
            opinionCounter = 0;
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
        opinionCounter = 0;
        counter = 0;
    },
    goToWebsite: function(){
        //go to website
        window.open("http://www.exiles.multimediatechnology.be", "_blank");
    }
}

mening = function(game) {};
mening.prototype = {
    create: function () {

      //startscreen animation
      sprite = game.add.sprite(0, 0, "mening");
      sprite.scale.setTo(2);
      sprite.animations.add("mening_animation");
      sprite.animations.play("mening_animation", 29, false, true);

      sprite.events.onAnimationComplete.add(function(){

        //init background
        this.background = game.add.sprite(0, 0, "game-background");
        this.background.scale.setTo(0.334);

        //init question text
        questionText = game.add.text(game.CENTER_X + 4, 130, opinionQuestionsJSON[opinionCounter].opinionquestionbody, {"font":"20pt SunAntwerpen", "fill":"#000000", "align":"center", "wordWrap":"true", "wordWrapWidth":"280"});
        questionText.anchor.set(0.5);

        //init project button
        this.projectbtn = game.add.button(game.CENTER_X, game.CENTER_Y-15, "projectsheet", this.goToProject, this, 1, 0);
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
        this.backbtn = game.add.button(game.CENTER_X + 75, game.CENTER_Y + 250, "smallmenusheet", this.backToMenu, this);
        this.backbtn.anchor.set(0.5);
        this.backbtn.scale.setTo(0.75);

        //init website button
        this.webbtn = game.add.button(game.CENTER_X - 75, game.CENTER_Y + 250, "smallwebsitesheet", this.goToWebsite, this);
        this.webbtn.anchor.set(0.5);
        this.webbtn.scale.setTo(0.75);

        //fade out last frame animation
        sprite = game.add.sprite(0, 0, "meningbg");
        game.add.tween(sprite).to({alpha: 0}, 1000, "Linear", true);


      },this);

    },
    thumbsUp: function() {

      //check in localstorage if the question was already answered before
      if(this.arrayContains(opinionCheck, parseInt(opinionQuestionsJSON[opinionCounter].opinionquestion_id))){

        console.log("this question was already answered!");

      }else{

        //if not answered, send to database
        console.log("this question was not yet answered! going to post now!");
        vote = "downvote";
        $.ajax({
          url:"http://www.exiles.multimediatechnology.be/postvote",
          type:"POST",
          data: {"vote":"upvote"},
          success: function(){
            console.log("post success!");
          }
        });

        //add the question to the list of answered questions and store it in localStorage
        opinionCheck.push(opinionQuestionsJSON[opinionCounter].opinionquestion_id);
        localStorage.setItem("opinionCheck", JSON.stringify(opinionCheck));

      }

      opinionCounter += 1;
      lastQuestionMening = true;

      //if you answer either the last regular question or the last opinion question, the game will end
      if(counter == questionsJSON.length || opinionCounter == opinionQuestionsJSON.length){

          //reset counters and destroy current gamescreen
          counter = 0;
          opinionCounter = 0;
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

          //endscreen animation
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

          //go back to menu after animation
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

      //--- see thumbsUp documentation ---//

      if(this.arrayContains(opinionCheck, parseInt(opinionQuestionsJSON[opinionCounter].opinionquestion_id))){
        console.log("this question was already answered!");
      }else{
        console.log("this question was not yet answered! going to post now!");
        vote = "downvote";
        $.ajax({
          url:"http://www.exiles.multimediatechnology.be/postvote",
          type:"POST",
          data: {"vote":"downvote"},
          success: function(){
            console.log("post success!");
          }
        });
        opinionCheck.push(opinionQuestionsJSON[opinionCounter].opinionquestion_id);
        localStorage.setItem("opinionCheck", JSON.stringify(opinionCheck));
      }

      opinionCounter +=1;
      lastQuestionMening = true;

      if(counter == questionsJSON.length || opinionCounter == opinionQuestionsJSON.length){
          counter = 0;
          opinionCounter =0;

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

          //endscreen animation
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
        window.open("http://www.exiles.multimediatechnology.be/project/" + opinionQuestionsJSON[opinionCounter].opinionquestion_id + "/tijdlijn", "_blank");
    },
    goToWebsite: function(){
        //go to project page
        window.open("http://www.exiles.multimediatechnology.be", "_blank");
    },
    backToMenu: function(){
        game.state.start("Menu");
        opinionCounter = 0;
        counter = 0;
    },
    //this function checks if the opinion question at hand was already answered before
    arrayContains: function(arr, id){
        return (arr.indexOf(id) != -1);
    }
}
