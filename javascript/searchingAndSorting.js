document.getElementById('sort').addEventListener('change', function () {
    const sortValue = this.value;
    const menuItems = Array.from(document.querySelectorAll('.menu-category .col-sm-6'));
    
    menuItems.sort((a, b) => {
        const nameA = a.querySelector('.card-title').textContent.trim();
        const nameB = b.querySelector('.card-title').textContent.trim();
        const priceA = parseFloat(a.getAttribute('data-price'));
        const priceB = parseFloat(b.getAttribute('data-price'));

        if (sortValue === 'name_asc') {
            return nameA.localeCompare(nameB);
        } else if (sortValue === 'name_desc') {
            return nameB.localeCompare(nameA);
        } else if (sortValue === 'price_low_high') {
            return priceA - priceB;
        } else if (sortValue === 'price_high_low') {
            return priceB - priceA;
        }
        return 0; // Default sort
    });

    // Append sorted items back to the DOM
    const menuContainer = document.getElementById('menu-items');
    menuContainer.innerHTML = ''; // Clear existing items
    menuItems.forEach(item => menuContainer.appendChild(item)); // Append sorted items
});

//Javascript algorith for searching functionalities
//when somebody click search bar
document.getElementById('searchBtn').addEventListener('click', function() {
    const query = document.getElementById('search').value;
    if (query) {
        confirm('Searching for: ' + query); // Replace with your search logic
    } else {
        alert('Please enter a search term');
    }
});