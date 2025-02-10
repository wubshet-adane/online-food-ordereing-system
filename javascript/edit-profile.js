function edit() {
    const input_tags = document.querySelectorAll('.input-feild');  // Get the input field
    const edit_btn = document.getElementById('edit-btn');  // Get the edit button
    const edit_pen_txt = document.getElementById('edit-pen-txt');  // Get the edit image text
    const edit_img_form = document.querySelector('.update-btn-wrapper'); // Get the edit image form
    const upload_btn = document.getElementById('upload-btn');  // Get the upload button
    const update_btn = document.getElementById('update-btn');  // Get the update button

    // Initial setup: disable input field, hide the update button, set button text to 'edit'
    input_tags.forEach(input_tag => {
        input_tag.disabled = true;  // Disable input field
        input_tag.style.border = 'none';  // Change border style to disabled look
    });
    edit_btn.textContent = 'Edit';  // Change the edit button text to edit
    edit_btn.style.backgroundColor = '#007bff';  // Default color
    update_btn.style.display = 'none';  // Hide the update button

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



function editImage() {
    const edit_img_btn = document.getElementById('edit-pen-btn');  // Get the edit image button
    const edit_img_form = document.querySelector('.upload-btn-wrapper');  // Get the edit image form
    const upload_btn = document.getElementById('upload-btn');  // Get the upload button

    // Initial setup: hide the edit form and upload button, set button text to 'edit'
    edit_img_form.style.display = 'none';
    upload_btn.style.display = 'none';
    edit_img_btn.textContent = 'edit';
    edit_img_btn.style.backgroundColor = '#007bff';  // Default color

    // Add event listener for the edit image button
    edit_img_btn.addEventListener('click', function() {
        if (edit_img_btn.textContent === 'edit') {  // Button text is 'edit'
            edit_img_form.style.display = 'flex';  // Show the edit image form
            this.textContent = 'cancel';  // Change the button text to 'cancel'
            this.style.backgroundColor = 'red';  // Change button color to red
            upload_btn.style.display = 'block';  // Show the upload button
        } else {  // Button text is 'cancel'
            this.textContent = 'edit';  // Change the button text back to 'edit'
            this.style.backgroundColor = '#007bff';  // Change button color back to default
            this.style.size = '10px';  // Change button size back to default
            edit_img_form.style.display = 'none';  // Hide the edit image form
            upload_btn.style.display = 'none';  // Hide the upload button
        }
    });
}

editImage();  // Call the function when the page loads

