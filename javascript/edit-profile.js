function edit() {
    const input_tags = document.querySelectorAll('.input-feild');  // Get the input field
    const edit_btn = document.getElementById('edit-btn');  // Get the edit button
    const update_btn = document.getElementById('update-btn');  // Get the update button

    // Add event listener for the edit button
    edit_btn.addEventListener('click', function() {
       input_tags.forEach(input_tag => {
            if (input_tag.disabled===true) {
                input_tag.removeAttribute('disabled');  // Enable input field
                input_tag.style.border = '1px solid #000';  // Change border style
                // Show the update button after editing starts
                update_btn.style.display = 'inline-block';
                edit_btn.textContent = 'Cancel';  // Change the edit button text to cancel
                edit_btn.style.backgroundColor = 'red';  // Change the edit button color to red
                edit_btn.style.borderRadius= '5px';  // Change the edit button border radius to 0
           }
            else {
                input_tag.disabled = true;  // Disable input field
                input_tag.style.border = 'none';  // Change border style to disabled look
                edit_btn.textContent = 'Edit';  // Change the edit button text back to edit
                edit_btn.style.backgroundColor = '#007bff';  // Change the edit button color back to default
                update_btn.style.display = 'none';  // Hide the update button after updating
            }
        });
       
    });

    // Add event listener for the update button
    update_btn.addEventListener('change' , function() {

        input_tags.forEach(input_tag => {
            input_tag.setAttribute('disabled');  // Disable input field
            input_tag.style.border = 'none';  // Change border style to disabled look
            edit_btn.textContent = 'Edit';  // Change the edit button text back to edit
        });
        update_btn.style.display = 'none';  // Hide the update button after updating});
    });
}

// Call the edit function when the page loads or when needed
edit();
