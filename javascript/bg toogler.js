// Array of image paths
const images = [
    'food1.jpg',
    'food2.jpg',
    'homeimg.jpg',
    'niceimages.jpg',
    'frfr.jpg',
];

let index = 0; // Start with the first image

function changeBackground() {
    const section = document.getElementById('dynamicSection');
    // Use template literals to dynamically set the background image
    section.style.backgroundImage = `url("images/${images[index]}")`;
    
    // Increment index and reset if it exceeds the array length
    index = (index + 1) % images.length;
}

// Set an interval to change the background every 3 seconds
setInterval(changeBackground, 3000);

// Initialize the first background
changeBackground();


//script code to toogle dropdown of loogin and logout top bar
// Get the elements
function dropdownscript() {
    var dropdown = document.getElementById('userDropdown');
    if (dropdown.style.display === "none" || dropdown.style.display === "") {
        dropdown.style.display = "block";
    } else {
        dropdown.style.display = "none";
    }
}
