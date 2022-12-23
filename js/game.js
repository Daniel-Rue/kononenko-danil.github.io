var canvas = document.getElementById("canvas");
var ctx = canvas.getContext("2d");
var powerText = document.getElementById("wrapper");
var nextLvlBtn = document.getElementById('nextLevel');

ctx.fillStyle = "#000";

//изображения
var backgroundImg = new Image();
backgroundImg.src = 'image/fon.png';
var playerIdle = new Image();
playerIdle.src = 'image/playerIdle.png';
var puckImg = new Image();
puckImg.src = 'image/puck.png';
var playerStrike = new Image();
playerStrike.src = 'image/playerStrike.png';
var panelImg = new Image();
panelImg.src = 'image/panel.png';


//звуки
var missSound = new Audio();
missSound.src = "audio/miss.mp3";
missSound.volume = 0.3;
var hitSound = new Audio();
hitSound.src = "audio/hit.mp3";
hitSound.volume = 0.3;
var hitWallSound = new Audio();
hitWallSound.src = "audio/hitWall.mp3";
hitWallSound.volume = 0.3;
var goalSound = new Audio();
goalSound.src = "audio/goal.mp3";
goalSound.volume = 0.3;

//объекты
var player = {x:120 , y:250 };
var puck = {x:player.x+50, y:player.y+35, dx:1, dy:0, w:20, h:20};
var goal = {x:890, y:275, w:20, h:56};

//состояния
var isPuckThrown = false;
var isPlayerPreparing = false;
var isGoal = false;
var isMiss = false;

//переменные
var usersScores = {};
var localScore = 0;
var levelScore = 100;
var globalScore = 0;
var strikePower = 0;
var timer = 0;
var puckAcceleration = 1;
var username;
var timeLimit = 20;

//отслеживание ввода 
canvas.addEventListener("mousemove", function(event) {
    player.x=event.offsetX-25;
    player.y=event.offsetY-13;
});
canvas.addEventListener("mouseup", function(event){
    isPuckThrown = true;
    isPlayerPreparing = false;
    if(!isMiss && !isGoal)
    hitSound.play();

});
canvas.addEventListener("mousedown", function(event){
    isPlayerPreparing = true;
});


backgroundImg.onload = function() {
    settings();
    game();
}

function endLevel() {
    if(isGoal){
        goalSound.play();
        localScore = levelScore;
    }else if(isMiss){
        missSound.play();
        localScore = -levelScore;
    }
    globalScore += localScore;
    localStorage.setItem(username + 'globalScore', globalScore);

    usersScores[username] = globalScore;
    localStorage.setItem('usersScores', JSON.stringify(usersScores));
}

function settings() {
    let importUsersScores = JSON.parse(localStorage.getItem('usersScores'));
    if (importUsersScores != null)
        usersScores = importUsersScores;

    username = localStorage.getItem('currentUsername');
    if (localStorage.getItem(username + 'globalScore') != null)
        globalScore = +localStorage.getItem(username + 'globalScore')
    else
        globalScore = 0;
    
}

function game() {
    if (!isMiss && !isGoal) {
        update();
        render();
        requestAnimationFrame(game);
    }
}

function update() {
    timer++;
    
    //отсчёт времени
    if (timer%60 == 0)
    {
        timeLimit--;
    }
    if (timeLimit == 0)
    {
        alert("Ваше время вышло!");
        isMiss = true;
        endLevel();
        return;
    } 

    //player Physx
    if (isPlayerPreparing && timer%30 == 0)
    changeStrikePower();
    if (player.x >= 300)
    player.x = 299;
    if (player.x <= 85)
     player.x = 85;
    if (player.y > 400)
    player.y = 400;
    if (player.y < 100)
    player.y = 100;

    //puck Physx
    puck.x += puck.dx * puckAcceleration;
    puck.y += puck.dy * puckAcceleration;
    if (puck.x + puck.w >= 1000)
    {
        puck.dx = -puck.dx;
        hitWallSound.play();
    }

    if (isPuckThrown)
    {
        isPlayerPreparing = false;
        if (timer%15 == 0 )
        puckAcceleration -= 0.12;
        if (puckAcceleration < 0)
        puckAcceleration = 0;
        if (puckAcceleration == 0)
        {
            isMiss = true;
            endLevel();
        }
    }else {
        puck.x = player.x+50;
        puck.y = player.y+35;
    }

    if ((puck.x + puck.w >= goal.x) 
    && (puck.y + puck.h >= goal.y) 
    && (puck.y <= goal.y + goal.h))
    {
        puck.dx = 0;
        isGoal = true;
        endLevel();
    }
 
}

function render() {
    ctx.drawImage(backgroundImg, 0, 0, 1000, 600);
    if (isPuckThrown){
        ctx.drawImage(playerStrike, player.x, player.y, 70, 70);
        ctx.drawImage(puckImg, puck.x, puck.y, puck.w, puck.h);
    }else {
        ctx.drawImage(playerIdle, player.x, player.y, 70, 70);
    }

    if (isGoal){
        ctx.font = "50px Verdana";
        ctx.fillStyle = "#DC143C";    
        ctx.fillText("ГОООООООЛ!!!",320, 780);
        nextLvlBtn.style.display = "block";
    }else if (isMiss){
        ctx.font = "50px Verdana";  
        ctx.fillStyle = "#DC143C";  
        ctx.fillText("ПРОИГРАЛ",360, 780);
    }

    ctx.fillStyle = "#000";  
    ctx.font = "30px Verdana";
    ctx.drawImage(panelImg,350,600,300,150)
    ctx.fillText("Сила:" + strikePower,448, 681);

    ctx.font = "18px Verdana"
    ctx.fillText("Времени осталось:" + timeLimit,402, 710)

    ctx.font = "25px Verdana";
    ctx.drawImage(panelImg,25,600,300,150) 
    ctx.fillText("Текуший счёт: " + localScore,56,685);

    ctx.drawImage(panelImg,675,600,300,150) 
    ctx.fillText("Общий счёт: " + globalScore,710,685);
}

function changeStrikePower() {
    strikePower += 1 ;
    if (strikePower > 10)
    {
        strikePower = 1;
    }
    puck.dx = strikePower;
}

function nextPage()
{
    top.location.href= 'level2.html';
}

function goToMenu(){
    top.location.href= 'menu.html';
}

function reload() {
    location.reload();
}

