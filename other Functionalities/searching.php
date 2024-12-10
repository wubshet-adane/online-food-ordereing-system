
<script>
    //add search icon around search bar
    document.getElementById('searchBtn').addEventListener('click', function() {
        const query = document.getElementById('search').value;
        if (query) {
            confirm('Searching for: ' + query); // Replace with your search logic
        } else {
            alert('Please enter a search term');
        }
    });
</script>

<?php
// page1.php
    //Start session to get detail user information.
    session_start();

    //include database connection.
    include "include/connection.php";

    $search = '';
    if(isset($_POST['search'])){
        $search = htmlspecialchars($search);
        $sql = "SELECT * FROM food WHERE Name LIKE '%$search%', Description LIKE '%$search%', Catagory LIKE '%$search%', AvailabilityStatus LIKE '%$search%'";
        $result = $conn -> query($sql);
        echo 'hhhhhhhhhhhh';
    }else{
        $search = htmlspecialchars($search);
        $sql = "SELECT * FROM food";
        $result = $conn -> query($sql);
    }
?>