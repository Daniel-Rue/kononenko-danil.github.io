const phraseField = document.querySelector('#phraseField');
const noPhrases = document.querySelector('#noPhrases');
var rusPhrases = 
[
    "Привычка - вторая натура",
    "Заметьте хорошо!",  
    "Беда не приходит одна",
    "Через тернии к звёздам"
];

var latinPhrases =
[
    "Consuetudo est altera natura",
    "Nota bene",
	"Nulla calamitas sola",   
	"Per aspera ad astra"
];

var spawnedPhrases = [];
var movedPhrases = [];
var phrasesNum = 0;



function spawnPhrase()
{
    if (phrasesNum >= rusPhrases.length)
    {
        document.getElementById("noPhrases").style.display = "block";
        return;
    }

    let randomInd;
    do{
        randomInd = Math.floor(Math.random() * rusPhrases.length);
    }while(rusPhrases[randomInd] == null)

    
    let phrase = getPhrase(randomInd);   

    phrase.innerText = rusPhrases[randomInd];
    phrasesNum++;
    spawnedPhrases.push(phrase);
    rusPhrases[randomInd] = null;
}
    
function onPhraseClick(phrase)
{
    let foundPhrase;
    for (var i = 0; i < spawnedPhrases.length; i++) 
    {
        if(spawnedPhrases[i] == phrase)
        {
            foundPhrase = spawnedPhrases[i];
            foundPhrase.innerText = latinPhrases[foundPhrase.id];
            spawnedPhrases.splice(i,1);
        }
    }
    movePhrase(foundPhrase,foundPhrase.id);
}


function getPhrase(phraseId) 
{
    let phrase = document.createElement("div");
    phraseField.appendChild(phrase);
    phrase.setAttribute("id", phraseId);
    phrase.setAttribute("class", "phrase");
    phrase.setAttribute("onClick", "onPhraseClick(this)");
    phrase.style.top = `${Math.random() * 100}%`;
    phrase.style.left = `${Math.random() * 100}%`;
    phrase.style.backgroundColor = "#d3a21c";
    return phrase;
}

function colorPhrases() 
{
    spawnedPhrases.forEach(element => { element.style.backgroundColor = "yellow"; });
}

function movePhrase(phrase, indexNumber) 
{
    if (indexNumber % 2 == 0) 
        translate(phrase, 50, phrase.y);
    else 
        translate(phrase, phraseField.getBoundingClientRect().right - phraseField.getBoundingClientRect().left - 50, phrase.y);
    movedPhrases.push(phrase);
}

function translate( elem, x, y ) 
{
    var left = parseInt( css( elem, 'left' ), 10 ),
        top = parseInt( css( elem, 'top' ), 10 ),
        dx = left - x,
        dy = top - y,
        i = 1,
        count = 20,
        delay = 20;

    function loop() 
    {
        if ( i >= count ) { return; }
        i += 1;
        elem.style.left = ( left - ( dx * i / count ) ).toFixed( 0 ) + 'px';
        elem.style.top = ( top - ( dy * i / count ) ).toFixed( 0 ) + 'px';
        setTimeout( loop, delay );
    }

    loop();
}

function css( element, property ) 
{
    return window.getComputedStyle( element, null ).getPropertyValue( property );
}