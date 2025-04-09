// Function to open the popup forms
function openTalkForm() {
    document.getElementById("popupForm").style.display = "flex";
}

function openEstimateForm() {
    document.getElementById("popupFloatingForm").style.display = "flex";
}

function openCustomizeForm() {
    document.getElementById("popupCustomizeForm").style.display = "flex";
}

function openPlanForm() {
    document.getElementById("popupPlanningForm").style.display = "flex";
}

function openCompanyForm() {
    document.getElementById("popupCompanyForm").style.display = "flex";
}

// Function to close a specific popup
function closeForm(popupId) {
    document.getElementById(popupId).style.display = "none";
}

// Form submission handler
function submitForm(event, formType) {
    event.preventDefault(); // Prevent default form submission

    let form = event.target;
    let submitButton = form.querySelector("button[type='submit']");

    // Prevent double submission
    if (form.dataset.submitting === "true") {
        return;
    }
    form.dataset.submitting = "true";

    let formData = new FormData(form);
    formData.append("form_type", formType);

    fetch("form_handler.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        if (data === "Success") {
            alert("Your details have been submitted successfully!");
            closeForm(form.closest(".popup-overlay").id);
            form.reset(); // Clear form fields after submission
        } else {
            alert("Submission failed: " + data);
        }
    })
    .catch(error => console.error("Error:", error))
    .finally(() => {
        form.dataset.submitting = "false"; // Reset submission flag
    });
}

// Ensure only one event listener per form
document.addEventListener("DOMContentLoaded", function () {
    let forms = [
        { id: "enquiryForm", type: "talk_expert" },
        { id: "enquiryFloatingForm", type: "free_estimate" },
        { id: "enquiryCustomizeForm", type: "customize_home" },
        { id: "enquiryPlanningForm", type: "plan_design" },
        { id: "enquiryCompanyForm", type: "deal_company" }
    ];

    forms.forEach(({ id, type }) => {
        let form = document.getElementById(id);
        if (form && !form.dataset.listener) {
            form.dataset.listener = "true";
            form.addEventListener("submit", function (event) {
                submitForm(event, type);
            });
        }
    });
});


function openDesignPopup(image, name, description, price, likes, used, designId) {
    document.getElementById("popupImage").src = image || "default.jpg";
    document.getElementById("popupTitle").innerText = name || "No Name Available";
    document.getElementById("popupDescription").innerText = description || "No Description Available";
    document.getElementById("popupPrice").innerText = price || "0";
    document.getElementById("popupLikes").innerText = likes || "0";
    document.getElementById("popupContacts").innerText = used || "0";

    // Set the correct design ID in a hidden field inside the popup
    document.getElementById("popupTitle").setAttribute("data-id", designId);

    document.getElementById("designPopup").style.display = "flex";
}

$(document).on("click", ".image-box", function (event) {
    event.preventDefault();
    let image = $(this).attr("data-image");
    let name = $(this).attr("data-name");
    let description = $(this).attr("data-description");
    let price = $(this).attr("data-price");
    let likes = $(this).attr("data-likes") || "0";
    let used = $(this).attr("data-used") || "0";

    openDesignPopup(image, name, description, price, likes, used);
});

function closeDesignPopup() {
    document.getElementById("designPopup").style.display = "none";
}

function addToWishlist() {
    let designId = document.getElementById("popupTitle").getAttribute("data-id");
    if (!designId) {
        alert("Error: Design ID is missing!");
        return;
    }

    $.ajax({
        url: "add_to_wishlist.php",
        type: "POST",
        data: { design_id: designId },
        success: function (response) {
            if (response === "not_logged_in") {
                alert("Please log in to add items to your wishlist.");
                window.location.href = "login.php";
            } else if (response === "success") {
                alert("Added to Wishlist!");
            } else if (response === "already_exists") {
                alert("This item is already in your wishlist.");
            } else {
                alert("Failed to add to Wishlist.");
            }
        }
    });
}

function addToCart() {
    let designId = document.getElementById("popupTitle").getAttribute("data-id");

    if (!designId) {
        alert("Error: Design ID is missing!");
        return;
    }

    $.ajax({
        url: "add_to_cart.php",
        type: "POST",
        data: { design_id: designId },
        success: function (response) {
            if (response === "not_logged_in") {
                alert("Please log in to add items to your cart.");
                window.location.href = "login.php";
            } else if (response === "success") {
                alert("Added to Cart!");
            } else if (response === "already_exists") {
                alert("This item is already in your cart.");
            } else {
                alert("Failed to add to Cart.");
            }
        }
    });
}
