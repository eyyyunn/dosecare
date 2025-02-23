// Function to toggle the sidebar on/off
function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('active');
}
function toggleSidebar1() {
    const sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('in-active');
}

// Form submission handler
document.getElementById('userForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent form from submitting

    // Example form data (you can process this further)
    const formData = {
        age: document.getElementById('age').value,
        sex: document.getElementById('sex').value,
        address: document.getElementById('address').value,
        phone: document.getElementById('phone').value,
        email: document.getElementById('email').value
    };

    console.log('Form Submitted', formData);
    alert('Information submitted successfully!');
});
