function login() {
    let newUsername = document.getElementById("username").value;

    if(newUsername != "")
    {
        localStorage.setItem('currentUsername', newUsername);
        document.location.href = "level1.html";
    }
    else{
        alert("Недоступное имя, введите другое");
    }
}

function goToLeaderboard()
{
    top.location.href= 'leaderboard.html';
}