<?php
// Function to update the visitor count only if the user is new
function update_counter() {
    $counter_file = 'counter.txt'; // File to store the count
    $count = 1; // Default count value

    // Check if the cookie marking the user as visited exists
    if (!isset($_COOKIE['visited'])) {
        // If the cookie doesn't exist, increment the count
        if (file_exists($counter_file)) {
            $count = (int)file_get_contents($counter_file);
            $count++; // Increment the count
        }

        // Write the updated count back to the file
        file_put_contents($counter_file, $count);

        // Set a cookie to mark the user as visited
        setcookie('visited', 'true', time() + (86400 * 30), "/"); // 30 days expiration
    }
}

// Call the update_counter function to increment the count if necessary
update_counter();
?>
