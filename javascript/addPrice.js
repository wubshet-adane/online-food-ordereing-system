
//add/ decrease price
function incrementQuantity(inputId) {
    const input = document.getElementById(inputId);
    if(parseInt(input.value) > 10){
        alert("You can't add more than 10");
    }
    else{
        input.value = parseInt(input.value) + 1;
    }
}

function decrementQuantity(inputId) {
    const input = document.getElementById(inputId);
    if (parseInt(input.value) > 1) {
        input.value = parseInt(input.value) - 1;
    }
}





//add search icon around search bar
document.getElementById('searchBtn').addEventListener('click', function() {
    const query = document.getElementById('search').value;
    if (query) {
        alert('Searching for: ' + query); // Replace with your search logic
    } else {
        alert('Please enter a search term');
    }
});