// Function to open the popup form
function openForm() {
    document.getElementById("popupForm").style.display = "flex";
}

// Function to close the popup form
function closeForm() {
    document.getElementById("popupForm").style.display = "none";
}

// Form submission
document.getElementById("enquiryForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent actual form submission
    alert("Your details have been submitted successfully!");
    closeForm(); // Close the popup after submission
});
