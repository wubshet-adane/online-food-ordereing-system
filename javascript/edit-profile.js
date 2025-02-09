function edit() {
    const input_tag = document.querySelector('.input-feild');  // Get the input field
    const edit_btn = document.getElementById('edit-btn');  // Get the edit button
    const update_btn = document.getElementById('update-btn');  // Get the update button

    // Add event listener for the edit button
    edit_btn.addEventListener('click', function() {
        if (input_tag.disabled === true) {
            input_tag.disabled = false;  // Enable input field
            input_tag.style.border = '1px solid #000';  // Change border style
            input_tag.focus();  // Focus the input field
            this.style.display = 'none';  // Hide the edit button

            // Show the update button after editing starts
            update_btn.style.display = 'inline-block';
        }
    });

    // Add event listener for the update button
    update_btn.addEventListener('click', function() {
        // Example: perform some action (like saving the data)
        const updatedValue = input_tag.value;
        alert("Updated value: " + updatedValue);  // Show the updated value (you can replace this with saving the data)

        // After update, disable the input field again
        input_tag.disabled = true;
        input_tag.style.border = '1px solid #ccc';  // Change border style to disabled look
        edit_btn.style.display = 'inline-block';  // Show the edit button again
        update_btn.style.display = 'none';  // Hide the update button after update
    });
}

// Call the edit function when the page loads or when needed
edit();
