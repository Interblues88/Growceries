var content1 = document.getElementById("list_pack");
var content2 = document.getElementById("list_ship");

var but1 = document.getElementById("pick");
var but2 = document.getElementById("ship");
var disp = 1;
// console.log("tes")


function hideShow(x) {
    disp = x;
    if(disp == 1){
        content2.style.display = 'none';
        but2.style.backgroundColor= 'white';
        content1.style.display = 'flex';
        but1.style.backgroundColor= '#3F945A';
    }
    else{
        content1.style.display = 'none';
        but1.style.backgroundColor= 'white';
        content2.style.display = 'flex';
        but2.style.backgroundColor= '#3F945A';
    }
}
