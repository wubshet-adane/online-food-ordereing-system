// bg image automatic toogler.
// Array of image paths
const images = [
    'food1.jpg',
    'food2.jpg',
    'homeimg.jpg',
    'niceimages.jpg'
];

let index = 0; // Start with the first image

function changeBackground() {
    const section = document.getElementById('dynamicSection');
    section.style.backgroundImage = 'url("images[index]")';
    
    // Increment index and reset if it exceeds the array length
    index = (index + 1) % images.length;
}

// Set an interval to change the background every 3 seconds
setInterval(changeBackground, 3000);

// Initialize the first background
changeBackground();