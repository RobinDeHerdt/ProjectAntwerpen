var game;
var preload;
var playgame;
var menu;


window.onload = function () {

    var wWidth  = document.body.offsetWidth;
    var wHeight = document.body.offsetHeight;

    // Create a new Phaser Game
    game = new Phaser.Game(1080,1920, Phaser.CANVAS, "", null, false, false);

    // Add the game states
    game.state.add("Preload", preload);
    game.state.add("Menu", menu);
    game.state.add("Playgame", playgame);
    game.state.add("Deathscreen", deathScreen);

    // Start the "Preload" state
    game.state.start("Preload");


}

preload = function(game) {};
preload.prototype = {
    preload: function () {
        // Preload images
        game.load.spritesheet("trump", "assets/images/donaldsprite.png", 75, 123, 6);
        //game.load.image("money-bag", "assets/money-bag.png");
        game.load.spritesheet("background-sprite", "assets/images/capitol-bg-sprite.png", 1080, 1920, 2);
        game.load.image("background", "assets/images/capitol-bg.png");
        game.load.spritesheet("coin", "assets/images/coin-spritesheet.png", 17, 17, 6);
        game.load.spritesheet("hillary", "assets/images/hillary-clinton-spritesheet.png", 62, 74, 4);
        game.load.image("cap", "assets/images/cap.png");
        game.load.image("chinese", "assets/images/minglee.png");
        game.load.image("splash-title", "assets/images/game_of_loans_splash.png");
        game.load.image("splash-subtitle", "assets/images/featuring_splash.png");
        game.load.image("wall", "assets/images/goodwall.png");
        game.load.image("sombrero", "assets/images/sombrero-big.png");

        //buttons
        game.load.image("start-btn", "assets/images/start_button.png");
        game.load.image("score-btn", "assets/images/score_button.png");
        game.load.image("help-btn", "assets/images/help_button.png");

        //audio
        game.load.audio("small_loan", "assets/sound/donald_trump_smallloan.mp3");
        game.load.audio("not_easy", "assets/sound/donald_trump_not_easy.mp3");
        game.load.audio("five_billion", "assets/sound/donald_trump_5billion.mp3");
        game.load.audio("fifteen_million_dollars", "assets/sound/donald_trump_15million_dollars.mp3");
        game.load.audio("make_america_great_again", "assets/sound/donald_trump_and_we_will_make_america_great_again.mp3");
        game.load.audio("beat_china", "assets/sound/donald_trump_i_beat_china_all_the_time.mp3");
        game.load.audio("dont_need_money", "assets/sound/donald_trump_i_dont_need_anybodies_money.mp3");
        game.load.audio("build_a_wall", "assets/sound/donald_trump_i_would_build_a_great_wall.mp3");
        game.load.audio("im_really_rich", "assets/sound/donald_trump_im_really_rich.mp3");
        game.load.audio("least_racist_person", "assets/sound/donald_trump_im_the_least_racist_person.mp3");
        game.load.audio("thanks_darling", "assets/sound/donald_trump_thankyou_darling.mp3");
        game.load.audio("the_big_lie", "assets/sound/donald_trump_the_big_lie.mp3");
        game.load.audio("stupid_people", "assets/sound/donald_trump_we_have_people_that_are_stupid.mp3");
        game.load.audio("we_need_money", "assets/sound/donald_trump_we_need_money.mp3");
        game.load.audio("beat_mexico", "assets/sound/donald_trump_when_are_we_going_to_beat_mexico.mp3");
        game.load.audio("national_anthem", "assets/sound/national_anthem_8bit.mp3")


        // Define constant variables
        game.CENTER_X          = (game.width/2);
        game.CENTER_Y          = (game.height/2);
        game.GLOBAL_GRAVITY    = 1000;
        game.AMOUNT_OF_LIFES   = 3;



    },
    create: function () {

        // Everything is loaded, start the "Playgame" State
        game.state.start("Menu");

    }
}

menu = function(game) {};
menu.prototype = {
    create: function () {
        if(localStorage.getItem("HighScore")){
            this.highScore = "Highscore: " + localStorage.getItem("HighScore");
        }
        else{
            this.highScore = "Highscore: " + "0";
        }

        //playing state boolean
        this.isPlaying = false;

        //add bg sprite
        this.background     = game.add.sprite(0, 0, "background");

        //scale
        game.scale.scaleMode = Phaser.ScaleManager.SHOW_ALL;
        game.scale.pageAlignVertically = true;
        game.scale.pageAlignHorizontally = true;

        //Disable rotation
        game.scale.forceOrientation(false, true);


        //init menu overlay
        var menuOverlay = game.add.graphics(0,0);
        menuOverlay.beginFill(0x000);
        menuOverlay.drawRect(0,0,1080,1920);
        menuOverlay.alpha = 0.6;
        menuOverlay.endFill();

        //init playbutton
        this.startbtn = game.add.button(game.CENTER_X, game.CENTER_Y, "start-btn", this.startGame, this);
        this.startbtn.anchor.set(0.5);
        this.startbtn.scale.setTo(3);

        this.helpbtn = game.add.button(game.CENTER_X, game.CENTER_Y + 200, "help-btn", this.startGame, this);
        this.helpbtn.anchor.set(0.5);
        this.helpbtn.scale.setTo(3);

        this.splashTitle = game.add.sprite(game.CENTER_X,180, "splash-title");
        this.splashTitle.anchor.set(0.5);
        this.splashTitle.scale.setTo(4);
        this.splashTween = game.add.tween(this.splashTitle)
            .to({ y: 220 }, 2000, Phaser.Easing.Quadratic.InOut, true, 0, -1, true);

        this.splashSubtitle = game.add.sprite(game.CENTER_X,350, "splash-subtitle");
        this.splashSubtitle.anchor.set(0.5);
        this.splashSubtitle.scale.setTo(4);



        this.highScoreDisplay = game.add.text(game.CENTER_X, 1600, this.highScore, {"font":"bold 100pt Arial", "fill":"#ffffff"});
        this.highScoreDisplay.anchor.set(0.5);


    },
    startGame: function(){
        //destroy menu and go to next state
        this.startbtn.destroy();
        this.helpbtn.destroy();
        this.splashSubtitle.destroy();
        this.splashTitle.destroy();
        this.isPlaying = true;
        game.state.start("Playgame");
    }
}

playgame = function(game) {};
playgame.prototype = {
    create: function () {
        //start Phaser arcade physics
        //game.physics.startSystem(Phaser.Physics.ARCADE);


        //set global gravity for game
        game.physics.arcade.gravity.y = game.GLOBAL_GRAVITY;

        //add sound
        this.smallLoan             = game.add.audio('small_loan');
        this.notEasy               = game.add.audio('not_easy');
        this.fiveBillion           = game.add.audio('five_billion');
        this.fifteenMillionDollars = game.add.audio('fifteen_million_dollars');
        this.makeAmericaGreatAgain = game.add.audio('make_america_great_again');
        this.beatChina             = game.add.audio('beat_china');
        this.dontNeedMoney         = game.add.audio('dont_need_money');
        this.buildWall             = game.add.audio('build_a_wall');
        this.imReallyRich          = game.add.audio('im_really_rich');
        this.leastRacistPerson     = game.add.audio('least_racist_person');
        this.thanksDarling         = game.add.audio('thanks_darling');
        this.theBigLie             = game.add.audio('the_big_lie');
        this.stupidPeople          = game.add.audio('stupid_people');
        this.weNeedMoney           = game.add.audio('we_need_money');
        this.beatMexico            = game.add.audio('beat_mexico');

        this.nationalAnthem        = game.add.audio('national_anthem');

        game.AUDIO_OBJECT      = {
                                    0: this.smallLoan,
                                    1: this.notEasy,
                                    2: this.fiveBillion,
                                    3: this.fifteenMillionDollars,
                                    4: this.makeAmericaGreatAgain,
                                    5: this.beatChina,
                                    6: this.dontNeedMoney,
                                    7: this.buildWall,
                                    8: this.imReallyRich,
                                    9: this.leastRacistPerson,
                                    10: this.thanksDarling,
                                    11: this.theBigLie,
                                    12: this.stupidPeople,
                                    13: this.weNeedMoney,
                                    14: this.beatMexico
                                }


        //Add backgrounds
        this.background = game.add.sprite(0, 0, "background");

        //add sprites on game load
        this.trump = game.add.sprite(game.CENTER_X , game.height, "trump");

        //score
        this.score     = 0;
        this.scoreText = game.add.text(0,0,"0$",{"font":"bold 100pt Arial", "fill":"#ffffff"});

        //walk, idle anim koppelen
        this.trump.animations.add('walk', [0,1,2,3],10, true);
        this.trump.animations.add('idle', [4,5],2, true);

        //enable physics for trump
        game.physics.enable(this.trump, Phaser.Physics.ARCADE);

        //scale trump sprite
        this.trump.scale.setTo(3);
        this.trump.anchor.set(0.5,1);
        this.trump.body.setSize(73, 132, 0, 0);
        this.trump.body.checkCollision.left = true;
        this.trump.body.checkCollision.right = true;

        //set physics for trump
        this.trump.body.allowGravity = true;
        this.trump.body.collideWorldBounds = true;
        this.trump.body.immovable = true;

        //init group obstacles
        this.tokens = game.add.physicsGroup(Phaser.Physics.P2);

        //spawn obstacles
        game.time.events.loop(Phaser.Timer.SECOND * 1, this.spawnToken, this);

        //begin op false zetten, true als hij HOED oppakt => geen andere caps vallen terwijl mode active is
        this.gotCap     = false;
        this.gotSombrero = false;
        this.gotHillary = false;

        //wall
        this.wall = game.add.sprite(game.CENTER_X, game.height+450,"wall");
        this.wall.anchor.set(0.5);
        this.wall.scale.setTo(9);

        this.trumpHealth = game.AMOUNT_OF_LIFES;

    },
    update: function(){
        //bg-flash
        /*if(this.gotHillary == true){
            this.background = game.sprite.add(0, 0, "capitol-bg-sprite");
            this.background.animations.add('flashing-bg', [0,1], 10, true);
            this.background.animations.play('flashing-bg');
            this.background.sendToBack();
        }
        else{
            this.background = game.sprite.add(0,0, "capitol-bg");
            this.background.sendToBack();
        }*/

        if(this.trumpHealth <= 0){
            this.onDead();
        }

        this.wall.bringToTop();

        //update highscore correct
        if(localStorage.getItem("HighScore") < this.score){
            localStorage.setItem("HighScore", this.score);
        }

        if (game.input.pointer1.isDown){
           var xPos = game.input.pointer1.positionDown.x;

           if(xPos >= game.CENTER_X){
               this.goRight();
           }
           if(xPos < game.CENTER_X){
               this.goLeft();
           }

        }
        else {
           //this.trump.animations.stop(null, false);
           //set to true to reset to first frame
           this.trump.animations.play('idle');
        }

        if(this.gotCap){
            this.cap.x = this.trump.x;
        }

        game.physics.arcade.collide(this.trump, this.tokens, this.getToken, null, this);

        //null aanpassen in this.getcoin als je langs zijkant ook wil kunnen opnemen => geeft wel dubbele output

        for(var i = (this.tokens.length-1) ; i >= 0 ; i--){
            if(this.tokens.getChildAt(i).body.y > game.height){
                if(this.tokens.getChildAt(i).key == "cap"){
                    this.disableCapSpawn = false;
                }
                this.tokens.getChildAt(i).destroy();
            }
        }
    },
    goLeft: function(){
        if(this.trump.x >= this.trump.width/2){
            this.trump.x -= 10;
            this.trump.scale.x = -3;
            this.trump.animations.play('walk');
            if(this.gotCap){
                this.cap.scale.x = -1.5;
            }
        }
    },
    goRight: function(){
        if(this.trump.x <= game.width-this.trump.width/2){
            this.trump.x += 10;
            this.trump.scale.x = 3;
            this.trump.animations.play('walk');
            if(this.gotCap){
                this.cap.scale.x = 1.5;
            }
        }
    },
    spawnToken: function(){

        var randomNr = game.rnd.integerInRange(0,150);

        //hillary
        if(randomNr >= 0 && randomNr < 10 && !this.gotHillary && !this.disableHillarySpawn){
            var hillary = game.add.sprite(game.world.randomX, -222, 'hillary');
            game.physics.enable(hillary, Phaser.Physics.ARCADE);
            hillary.body.setSize(62, 72, 0, 0);
            hillary.scale.setTo(3);
            hillary.anchor.set(0.5);
            hillary.animations.add('lookAround',[0,1,2,3] , 2, true);
            hillary.animations.play('lookAround');

            //bounce shit
            hillary.body.velocity.setTo(0,-100);
            hillary.body.bounce.set(1,1);

            this.disableHillarySpawn = true;

            this.tokens.add(hillary);
        }
        //chinese
        else if(randomNr >= 10 && randomNr < 20){
            var chinese = game.add.sprite(game.world.randomX, -222, 'chinese');
            game.physics.enable(chinese, Phaser.Physics.ARCADE);
            chinese.body.setSize(118, 69, 0, 0);
            chinese.anchor.set(0.5);
            chinese.scale.setTo(2);

            //bounce shit
            chinese.body.velocity.setTo(0,-100);
            chinese.body.bounce.set(1,1);

            this.tokens.add(chinese);
        }
        //cap
        else if(randomNr >= 20 && randomNr < 30 && !this.gotCap && !this.disableCapSpawn){
            var cap = game.add.sprite(game.world.randomX, -222, 'cap');
            game.physics.enable(cap, Phaser.Physics.ARCADE);
            cap.body.setSize(200, 94, 0, 0);
            cap.scale.setTo(1.5);

            this.tokens.add(cap);
            this.disableCapSpawn = true;
        }
        else if(randomNr >= 30 && randomNr < 40 && !this.gotSombrero && !this.disableSombreroSpawn){
            var sombrero = game.add.sprite(game.world.randomX, -222, 'sombrero');
            game.physics.enable(sombrero, Phaser.Physics.ARCADE);
            sombrero.body.setSize(118, 69, 0, 0);
            sombrero.anchor.set(0.5);
            sombrero.scale.setTo(1);

            //bounce shit
            sombrero.body.velocity.setTo(0,-100);
            sombrero.body.bounce.set(1,1);

            this.disableSombreroSpawn = true;

            this.tokens.add(sombrero);
        }
        //coin
        else if(randomNr >= 30 && randomNr < 150){
            //init obstacles
            var coin = game.add.sprite(game.world.randomX, -170, 'coin');
            //waarden aanpassen aan scale en hoogte

            //enable physics for obstacles
            game.physics.enable(coin, Phaser.Physics.ARCADE);

            //Scale coin
            coin.body.setSize(17, 13, 0, 0);
            coin.scale.setTo(5);

            //add sprite animatins
            coin.animations.add('spin', [0,1,2,3,4,5],10, true);

            //play sprite anims
            coin.animations.play('spin');

            //collider langs zijkanten enabled
            coin.body.checkCollision.left = true;
            coin.body.checkCollision.right = true;
            //Add to obstacle group
            this.tokens.add(coin);
        }

    },
    getToken: function(trump, token){

        //randomizer for playing a sound or not
        var playASound           = game.rnd.integerInRange(0,50);
        //play sounds for hillary
        var randomSoundHillary   = game.rnd.integerInRange(10,12);
        //play sounds for coin
        var randomSoundCoin      = game.rnd.integerInRange(0,3);


        //previous played coin sound, start at 100 om verwarring te vermijden enzuuu iksdrei iksdrei
        this.prevRandomSoundCoin = 100;


        if(this.gotCap){
            //check what you collide with
            if(token.key == "hillary" || token.key == "chinese" || token.key == "sombrero" ){

                if(token.key == "hillary"){
                    game.AUDIO_OBJECT[randomSoundHillary];
                }

                if(token.key == "chinese"){
                    this.beatChina.play();
                }

                if(token.key == "sombrero"){
                    this.beatMexico.play();
                }

                var distanceTrumpToken = this.trump.x - token.x;
                token.body.velocity.setTo(distanceTrumpToken*-10,-1400);
                token.body.angularVelocity = -500;
                //game.time.events.add(Phaser.Timer.SECOND * 0.5, , this);
            }
            else if(token.key == "coin"){
                if(playASound > 35){
                    if(!game.AUDIO_OBJECT[randomSoundCoin].isPlaying && randomSoundCoin != this.prevRandomSoundCoin){
                        game.AUDIO_OBJECT[randomSoundCoin].play();
                        this.prevRandomSound = randomSoundCoin;
                    }
                    else if(!game.AUDIO_OBJECT[randomSoundCoin].isPlaying){
                        switch(this.prevRandomSound){
                            case 0:
                                randomSoundCoin = 1;
                                game.AUDIO_OBJECT[randomSoundCoin].play();
                                break;
                            case 1:
                                randomSoundCoin = 2;
                                game.AUDIO_OBJECT[randomSoundCoin].play();
                                break;
                            case 2:
                                randomSoundCoin = 3;
                                game.AUDIO_OBJECT[randomSoundCoin].play();
                                break;
                            case 3:
                                randomSoundCoin = 0;
                                game.AUDIO_OBJECT[randomSoundCoin].play();
                                break;
                        }
                    }
                }

                this.score+=200;
                this.scoreText.setText(String(this.score) + "$");
                token.destroy();
            }

            //destroy token on collision met worldbounds? of destroy als ze buiten world vallen
        }
        else{
            if(token.key == "hillary"){
                game.AUDIO_OBJECT[randomSoundHillary].play();
                this.trumpHealth--;
                this.gotHillary = true;
                this.disableHillarySpawn = false;

                game.time.events.add(Phaser.Timer.SECOND * 10, this.deleteHillary, this);
            }

            if(token.key == "chinese"){
                this.leastRacistPerson.play();
                this.trumpHealth--;
            }

            if(token.key == "sombrero"){
                this.gotSombrero = true;
                this.disableSombreroSpawn = false;

                //sounds
                this.buildWall.play();

                //wall
                game.add.tween(this.wall).to({ y: game.height-440 }, 3000, Phaser.Easing.Quadratic.InOut, true);
                //remove wall
                game.time.events.add(Phaser.Timer.SECOND * 10, this.deleteWall, this);
            }

            if(token.key == "cap"){
                this.cap = game.add.sprite(game.CENTER_X , game.height-300, "cap");
                this.wall.bringToTop();
                this.cap.anchor.set(0.30,1);
                this.cap.scale.setTo(1.5);
                this.cap.scale.x = this.trump.scale.x/2;
                this.gotCap = true;
                this.disableCapSpawn = false;

                //sounds
                this.makeAmericaGreatAgain.play();
                this.nationalAnthem.play();

                //remove cap
                game.time.events.add(Phaser.Timer.SECOND * 10, this.deleteCap, this);
            }

            if(token.key == "coin"){
                //zodat ge nie telkens hetzelfde geluidje krijgt en zo, want randommizer was beetje kaka aant doen :D :D
                //lelijke oplossing eh joren, ik weet het, maar het werkt :p
                if(playASound > 35){
                    if(!game.AUDIO_OBJECT[randomSoundCoin].isPlaying && randomSoundCoin != this.prevRandomSoundCoin){
                        game.AUDIO_OBJECT[randomSoundCoin].play();
                        this.prevRandomSound = randomSoundCoin;
                    }
                    else if(!game.AUDIO_OBJECT[randomSoundCoin].isPlaying){
                        switch(this.prevRandomSound){
                            case 0:
                                randomSoundCoin = 1;
                                game.AUDIO_OBJECT[randomSoundCoin].play();
                                break;
                            case 1:
                                randomSoundCoin = 2;
                                game.AUDIO_OBJECT[randomSoundCoin].play();
                                break;
                            case 2:
                                randomSoundCoin = 3;
                                game.AUDIO_OBJECT[randomSoundCoin].play();
                                break;
                            case 3:
                                randomSoundCoin = 0;
                                game.AUDIO_OBJECT[randomSoundCoin].play();
                                break;
                        }
                    }
                }
                this.score+=100;
                this.scoreText.setText(String(this.score) + "$");
            }
            //destroy token on collision
            token.destroy();
        }
    },
    deleteCap: function () {
        this.gotCap = false;
        this.cap.destroy();
        this.nationalAnthem.stop();
    },
    deleteWall: function(){
        this.gotSombrero = false;
        game.add.tween(this.wall).to({ y: game.height+450 }, 3000, Phaser.Easing.Quadratic.InOut, true);
    },
    deleteHillary: function(){
        this.gotHillary = false;
        //stop flashing screen
    },
    onDead: function(){
        game.state.start("Deathscreen");
    },
    render: function () {
        for(var i = (this.tokens.length-1) ; i >= 0 ; i--){
            //game.debug.body(this.tokens.getChildAt(i));
        }
        //game.debug.body(this.trump);
        //game.debug.pointer(game.input.mousePointer);
        //game.debug.pointer(game.input.pointer1);
    }
}

deathScreen = function(game) {};
deathScreen.prototype = {

    create: function(){

    }
}
