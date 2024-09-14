function dropDownFunction(id){
    if(document.getElementById(id).classList.contains('view')){
        dropDown = document.getElementById(id).classList.remove('view')
    }
    else{
        dropDown = document.getElementById(id).classList.toggle('view')
    }
    
}

function searchFunction(product){
    searchValue = document.getElementById(searchField);
    console.log(searchField);
}