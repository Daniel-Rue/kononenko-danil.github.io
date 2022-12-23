var usersScores = [];
var sortedUsersScore = [];
firstName = document.getElementById("firstName");
secondName = document.getElementById("secondName");
thirdName= document.getElementById("thirdName");
firstScore = document.getElementById("firstScore");
secondScore = document.getElementById("secondScore");
thirdScore= document.getElementById("thirdScore");

function createLeaderboard()
{
    usersScores = JSON.parse(localStorage.getItem('usersScores'));
    let max1 = -Number.MAX_VALUE; 
    let max2 = -Number.MAX_VALUE; 
    let max3 = -Number.MAX_VALUE;
    let username1; 
    let username2; 
    let username3;

    for (let key in usersScores)
    {
        if (usersScores[key] >= max1)
        {
            max3 = max2;
            username3 = username2;
            max2 = max1;
            username2 = username1;
            max1 = usersScores[key];
            username1 = key;
        }
        else if (usersScores[key] >= max2)
        {
            max3 = max2;
            username3 = username2;
            max2 = usersScores[key];
            username2 = key;
        }
        else if (usersScores[key] >= max3)
        {
            max3 = usersScores[key];
            username3 = key;
        }
    }
    if (max3 != -Number.MAX_VALUE){
        thirdScore.innerHTML = max3;
        thirdName.innerHTML = username3;
    }
    else{
        thirdScore.innerHTML = '-';
        thirdName.innerHTML = '-';
    }
    if (max2 != -Number.MAX_VALUE){
        secondScore.innerHTML = max2;
        secondName.innerHTML = username2;
    }
    else{
        secondScore.innerHTML = '-';
        secondName.innerHTML = '-';
    }
    if (max1 != -Number.MAX_VALUE){
        firstScore.innerHTML = max1;
        firstName.innerHTML = username1;
    }
    else{
        firstScore.innerHTML = '-';
        firstName.innerHTML = '-';
    }
}

function goToMenu(){
    top.location.href= 'menu.html';
}
