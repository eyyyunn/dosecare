<?php
$entered_password = "admin123"; // The plain text password you want to check

// COPY the actual hash from your database and PASTE IT BELOW inside the quotes:
$stored_hashed_password = '$2y$10$c5jk8i0bb35WvnMz4Ncwo.dScaZCbFwYxtLwKj9tBuPtRB896WV..';

// Check if the entered password matches the stored hash
if (isset($stored_hashed_password)) { // Ensure variable is set
    if (password_verify($entered_password, $stored_hashed_password)) {
        echo "✅ Password matches!";
    } else {
        echo "❌ Password does not match!";
    }
} else {
    echo "⚠️ Variable is not set!";
}
?>
