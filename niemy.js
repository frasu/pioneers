var clues = ["Apetyt rośnie w miarę jedzenia",
    "Bez pracy nie ma kołaczy",
    "Biednemu zawsze wiatr w oczy",
    "Być kulą u nogi",
    "Być pracowitym jak pszczoła",
    "Cel uświęca środki",
    "Cisza jak makiem zasiał",
    "Co ma piernik do wiatraka",
    "Co się odwlecze to nie uciecze",
    "Co za dużo to niezdrowo",
    "Czuć się jak ryba w wodzie",
    "Czym chata bogata tym gościom rada",
    "Darowanemu koniowi w zęby się nie zagląda",
    "Dla chcącego nic trudnego",
    "Do wesela się zagoi",
    "Drzeć z kimś koty",
    "Dzieci i ryby głosu nie mają",
    "Głupi ma zawsze szczęście",
    "Idzie luty podkuj buty",
    "Jajko mądrzejsze od kury",
    "Jak kamień w wodę",
    "Jedna jaskółka wiosny nie czyni",
    "Każdy jest kowalem swego losu",
    "Kląć jak szewc",
    "Kłamstwo ma krótkie nogi",
    "Kto pierwszy ten lepszy",
    "Kuj żelazo póki gorące",
    "Leje jak z cebra",
    "Lepszy rydz niż nic",
    "Licho nie śpi",
    "Lepszy wróbel w garści niż gołąb na dachu",
    "Ładnemu we wszystkim ładnie",
    "Masz babo placek",
    "Miłego złe początki",
    "Mądry Polak po szkodzie",
    "Nie bądź w gorącej wodzie kąpany",
    "Nie chwal dnia przed zachodem słońca",
    "Nie dziel skóry na niedźwiedziu",
    "Nie dolewaj oliwy do ognia",
    "Nie kupuj kota w worku",
    "Nie ma dymu bez ognia",
    "Nieszczęścia chodzą parami",
    "Nie płacz nad rozlanym mlekiem",
    "Nie wchodzi się dwa razy do tej samej rzeki",
    "Nie wywołuj wilka z lasu",
    "Nudy na pudy",
    "Od przybytku głowa nie boli",
    "Paluszek i główka to szkolna wymówka",
    "Pasuje jak wół do karety",
    "Pieniądze szczęścia nie dają",
    "Pierwsze koty za płoty",
    "Pod latarnią najciemniej",
    "Prawda w oczy kole",
    "Przyszła koza do woza",
    "Przyszła kryska na Matyska",
    "Stara miłość nie rdzewieje",
    "Strach ma wielkie oczy",
    "Strzeżonego Pan Bóg strzeże",
    "Szewc bez butów chodzi",
    "Szukać igły w stogu siana",
    "Trafiła kosa na kamień",
    "Trafić z deszczu pod rynnę",
    "W marcu jak w garncu",
    "Wystroił się jak stróż w Boże ciało",
    "Wyśpisz się po śmierci",
    "Wyszło szydło z worka",
    "W zdrowym ciele zdrowy duch",
    "Złego diabli nie biorą",
    "Z pustego i Salomon nie naleje",
    "Co cię nie zabije, to cię wzmocni",
    "Co dwie głowy, to nie jedna",
    "Co kraj, to obyczaj",
    "Co ma wisieć, nie utonie",
    "Co z oczu, to z serc",
    "Czego Jaś się nie nauczy, tego Jan nie będzie umiał",
    "Gdy kota nie ma, myszy harcują",
    "Gdy się człowiek spieszy, to się diabeł cieszy",
    "Gdzie kucharek sześć, tam nie ma co jeść",
    "Grosz do grosza, a będzie kokosza",
    "Hulaj dusza, piekła nie ma",
    "Jaka praca, taka płaca",
    "Jak cię widzą, tak cię piszą",
    "Jak Kuba Bogu, tak Bóg Kubie",
    "Jak pies je, to nie szczeka bo mu miska ucieka",
    "Jak się nie ma co się lubi, to się lubi co się ma",
    "Jak sobie pościelesz, tak się wyśpisz",
    "Jak trwoga, to do Boga",
    "Kogut myślał o niedzieli, a w sobotę łeb ucięli",
    "Komu w drogę, temu czas",
    "Kto pod kim dołki kopie, ten sam w nie wpada",
    "Kto pyta, nie błądzi",
    "Kto rano wstaje, temu Pan Bóg daje",
    "Kto się czubi, ten się lubi",
    "Kwiecień – plecień, co przeplata, trochę zimy, trochę lata",
    "Lepiej nosić,jak się prosić",
    "Lepsza byle jaka prawda, niż dobre kłamstwo",
    "Małe dzieci – mały kłopot, duże dzieci – duży kłopot",
    "Mowa jest srebrem, a milczenie złotem",
    "Mówił dziad do obrazu, a ten do niego ani razu",
    "Ni prośbą, ni groźbą",
    "Ni z gruszki, ni z pietruszki",
    "Nie chce góra przyjść do Mahometa, musi Mahomet przyjść do góry",
    "Nie czas żałować róż, gdy płoną lasy",
    "Nie ma to, jak we własnym domu",
    "Nie ma tego złego, co by na dobre nie wyszło",
    "Nie mów hop, póki nie przeskoczysz",
    "Nie mów drugiemu, co tobie nie miłe",
    "Nie wszystko złoto, co się świeci",
    "Raz na wozie, raz pod wozem",
    "Starość nie radość, młodość nie wieczność",
    "Stary, ale jary",
    "Szukajcie, a znajdziecie",
    "Ten się śmieje, kto się śmieje ostatni",
    "Wszystko, co dobre, szybko się kończy",
    "Wybiera się, jak sójka za morze",
    "Zapomniał wół, jak cielęciem był",
    "Zgoda buduje, niezgoda rujnuj",
    "Żeby kózka nie skakała, to by nóżki nie złama",
    "Gość w dom – Bóg w dom",
    "Łatwo przyszło – łatwo poszło",
    "Nadzieja – matką głupich"];

var x = Math.round(Math.random() * clues.length);

clue = clues[x].toLowerCase();

var downCounter = 0;

var yes = new Audio("yes.wav");
var no = new Audio("no.wav");

var length = clue.length;

var hidden = "";

for (i=0;i<length;i++) {
    if (clue.charAt(i)===" ") hidden = hidden + " ";
    else if (clue.charAt(i)===",") hidden = hidden + ",";
    else if (clue.charAt(i)==="–") hidden = hidden + "–";
    else hidden = hidden + "_";
}

function type_clue() {

    document.getElementById("clue").innerHTML = hidden;
}

window.onload = start;

var alphabet = 'AĄBCĆDEĘFGHIJKLŁMNŃOÓPQRSŚTUVWXYZŻŹ';
alphabet = alphabet.toLowerCase();

function start() {
    var div = "";
    for (i=0; i<35; i++) {
        div = div + '<div class="letter" id="l' + i + '" onclick="check('+i+')">'+alphabet.charAt(i)+'</div>';
        if ((i+1)%7==0) {
            div = div + '<div style="clear: both"></div>';
        }
    }
    document.getElementById("letters").innerHTML = div;

    type_clue();
}

String.prototype.setCharAt = function(idx, chr) {

    if(idx > this.length - 1){
        return this.toString();
    } else {
        return this.substr(0, idx) + chr + this.substr(idx + 1);
    }
};

function check(nr) {
    var down = false;

    for (i=0;i<length;i++) {
        if (clue.charAt(i) === alphabet.charAt(nr)) {
            hidden = hidden.setCharAt(i, alphabet.charAt(nr));
            down = true;
        }
    }
    const letter = "l" + nr;

    if (down) {
        document.getElementById(letter).style.border = "3px solid limegreen";
        document.getElementById(letter).style.color = "lawngreen";
        document.getElementById(letter).style.fontWeight = "900";
        document.getElementById(letter).style.cursor= "default";

        type_clue();
        yes.play();
    } else {
        document.getElementById(letter).style.border = "3px solid darkred";
        document.getElementById(letter).style.color = "red";
        document.getElementById(letter).style.fontWeight = "900";
        document.getElementById(letter).style.cursor= "default";
        document.getElementById(letter).setAttribute("onclick",";");

        downCounter++;

        const img = '<img class="center" alt="hanger" src="img/h' + downCounter + '.png">';

        document.getElementById("hanger").innerHTML = img;
        no.play();
    }
    var end = '<br />prawidłowe hasło:<br /><br /><b>' + clue +
    '</b><br /><br /><span class="reset" onclick="location.reload()">jeszcze raz?</span>';
    if (clue === hidden) {
        document.getElementById("letters").innerHTML = 'zgadza się!' + end;
    } else if (downCounter === 9) {
        document.getElementById("letters").innerHTML = 'przegrana!' + end;
    }
}