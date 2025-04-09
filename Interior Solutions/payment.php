<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Connect to DB
$conn = new mysqli("localhost", "root", "", "interior_solutions");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch cart items
$sql = "SELECT d.id AS design_id, d.image, d.name, d.price
        FROM cart c
        JOIN designs d ON c.design_id = d.id
        WHERE c.user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$cart_items = [];
$subtotal = 0;
while ($row = $result->fetch_assoc()) {
    $cart_items[] = $row;
    $subtotal += $row['price'];
}

$stmt->close();
$conn->close();

$to_pay_now   = $subtotal * 0.2; // 20% of total
$total_amount = $to_pay_now;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
      /* Overall Page Styles */
      body {
        font-family: 'Poppins', sans-serif;
        background-color: #f8f9fa;
        margin: 0;
        padding: 0;
      }
      .container {
        margin-top: 50px;
      }

      /* Payment Section & Layout */
      #payment-section {
        margin-top: 30px;
        display: none; /* hidden until user fills contact form */
      }

      /* Buttons */
      .btn-primary, .btn-secondary, .btn-success {
        border-radius: 5px;
      }

      /* Popup Overlay (common) */
      .popup-overlay {
        position: fixed;
        top: 0; 
        left: 0;
        width: 100%; 
        height: 100%;
        background: rgba(0,0,0,0.5);
        display: none; /* hidden by default */
        justify-content: center;
        align-items: center;
        z-index: 9999;
      }
      .popup-content {
        background: #fff;
        padding: 20px 25px;
        border-radius: 10px;
        width: 350px;
        max-width: 90%;
        position: relative;
      }
      .popup-content h3 {
        margin-top: 0;
        margin-bottom: 15px;
        text-align: center;
      }
      .popup-content label {
        font-weight: 600;
        margin-top: 10px;
      }
      .popup-content input,
      .popup-content select {
        width: 100%;
        margin-bottom: 12px;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 5px;
      }
      /* Close Button (X) */
      .close-btn {
        position: absolute;
        top: 10px; 
        right: 10px;
        background: red;
        color: #fff;
        border: none;
        border-radius: 4px;
        width: 30px; 
        height: 30px;
        cursor: pointer;
      }

      /* QR Code Box */
      .qr-code {
        width: 150px;
        height: 150px;
        background: #ccc; /* placeholder color */
        margin: 0 auto 10px auto;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        color: #555;
        border-radius: 5px;
      }

      /* Flexible row for Card Payment fields */
      .card-row {
        display: flex;
        gap: 10px;
      }
      .card-row > div {
        flex: 1;
      }

      /* Some spacing for cart items */
      .cart-item {
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 10px;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        gap: 10px;
      }
      .cart-item img {
        width: 60px; 
        height: 60px; 
        object-fit: cover; 
        border-radius: 5px;
      }
      .cart-item-details {
        display: flex;
        flex-direction: column;
      }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <!-- Left Section - Contact Information Form -->
        <div class="col-md-6">
            <img src="img/interior.png" alt="Website Logo" style="width: 250px; margin-bottom:20px;">
            <h2>Contact Information</h2>
            <form id="contact-form">
                <div class="mb-3">
                    <label>Name:</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Email:</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Phone:</label>
                    <input type="text" name="phone" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Country:</label>
                    <input type="text" name="country" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Address:</label>
                    <textarea name="address" class="form-control" required></textarea>
                </div>
                <div class="mb-3">
                    <label>Project Location:</label>
                    <textarea name="project_location" class="form-control" required></textarea>
                </div>
                <button type="button" class="btn btn-secondary" onclick="window.location.href='cart.php'">
                  Return to Cart
                </button>
                <button type="submit" class="btn btn-primary">
                  Continue to Payment
                </button>
            </form>
        </div>

        <!-- Right Section - Cart Summary -->
        <div class="col-md-6">
            <h3>Your Selected Designs</h3>
            <?php foreach ($cart_items as $item): ?>
                <div class="cart-item">
                    <img src="<?= htmlspecialchars($item['image']) ?>" alt="Design Image">
                    <div class="cart-item-details">
                      <strong><?= htmlspecialchars($item['name']) ?></strong>
                      <span>₹<?= number_format($item['price'], 2) ?></span>
                    </div>
                </div>
            <?php endforeach; ?>
            <hr>
            <div class="d-flex justify-content-between">
                <strong>Subtotal:</strong>
                <strong>₹<?= number_format($subtotal, 2) ?></strong>
            </div>
            <div class="d-flex justify-content-between">
                <strong>To Pay Now (20%):</strong>
                <strong>₹<?= number_format($to_pay_now, 2) ?></strong>
            </div>
            <div class="d-flex justify-content-between">
                <strong>Total:</strong>
                <strong>₹<?= number_format($total_amount, 2) ?></strong>
            </div>
        </div>
    </div>

    <!-- Payment Section (Hidden Initially) -->
    <div id="payment-section">
      <h2>Payment</h2>
      <p>Select a Payment Method:</p>
      <label><input type="radio" name="payment" value="Credit Card" required> Credit Card</label><br>
      <label><input type="radio" name="payment" value="Debit Card"> Debit Card</label><br>
      <label><input type="radio" name="payment" value="UPI"> UPI</label><br>

      <button id="proceed-payment" class="btn btn-success mt-3">Proceed</button>
    </div>
</div>

<!-- Popup Overlay: Card Payment -->
<div class="popup-overlay" id="card-popup">
  <div class="popup-content">
    <button class="close-btn" id="close-card-popup">X</button>
    <h3>Card Payment</h3>
    <label>Card Number</label>
    <input type="text" id="card_number" placeholder="XXXX XXXX XXXX XXXX">

    <div class="card-row">
      <div>
        <label>CVC</label>
        <input type="text" id="cvc" placeholder="CVC">
      </div>
      <div>
        <label>Card Holder Name</label>
        <input type="text" id="card_holder_name" placeholder="NAME">
      </div>
    </div>

    <label>Expiration Date</label>
    <div class="card-row">
      <div>
        <select id="expiry_month" class="form-select">
          <option value="">Month</option>
          <?php for($m=1; $m<=12; $m++): ?>
            <option value="<?= $m ?>"><?= $m ?></option>
          <?php endfor; ?>
        </select>
      </div>
      <div>
        <select id="expiry_year" class="form-select">
          <option value="">Year</option>
          <?php
            $currentYear = date("Y");
            for($y = $currentYear; $y < $currentYear+10; $y++):
          ?>
            <option value="<?= $y ?>"><?= $y ?></option>
          <?php endfor; ?>
        </select>
      </div>
    </div>

    <button class="btn btn-primary mt-3" id="complete-card-payment">
      Complete Order (Total ₹<?= number_format($total_amount, 2) ?>)
    </button>
  </div>
</div>

<!-- Popup Overlay: UPI Payment -->
<div class="popup-overlay" id="upi-popup">
  <div class="popup-content">
    <button class="close-btn" id="close-upi-popup">X</button>
    <h3>UPI Payment</h3>
    <div class="qr-code" id="upi-qr">QR CODE</div>
    <p>Scan the QR code using your mobile UPI app. Enter the code below.</p>
    <label>Enter Generated Code</label>
    <input type="text" id="upi_code" placeholder="Enter the code here">
    <button class="btn btn-primary mt-3" id="complete-upi-payment">
      Complete Order (Total ₹<?= number_format($total_amount, 2) ?>)
    </button>
  </div>
</div>

<script>
$(document).ready(function () {

  // 1. Show payment section after contact form is submitted
  $("#contact-form").on("submit", function (e) {
    e.preventDefault();
    $("#payment-section").slideDown();
  });

  // 2. Show appropriate payment popup
  $("#proceed-payment").click(function () {
    const paymentMethod = $("input[name='payment']:checked").val();
    if (!paymentMethod) {
      alert("Please select a payment method.");
      return;
    }

    if (paymentMethod === "Credit Card" || paymentMethod === "Debit Card") {
      $("#card-popup").css("display", "flex");
    } else if (paymentMethod === "UPI") {
      // Call generate_upi_code.php to get the QR code URL and generated UPI code
      $.ajax({
        url: "generate_upi_code.php",
        method: "POST",
        data: { user_id: <?= $user_id ?> },
        dataType: "json", // Expect JSON response
        success: function(data) {
          if (data.qr) {
            // Set the QR code image using the returned URL
            $("#upi-qr").html('<img src="' + data.qr + '" alt="UPI QR Code" style="width:150px; height:150px; border-radius:5px;">');
          }
          $("#upi-popup").css("display", "flex");
        },
        error: function() {
          alert("Failed to generate UPI code. Please try again.");
        }
      });
    } else {
      alert("Unsupported payment method: " + paymentMethod);
    }
  });

  // 3. Close popups
  $("#close-card-popup").click(function(){
    $("#card-popup").hide();
  });
  $("#close-upi-popup").click(function(){
    $("#upi-popup").hide();
  });

  // 4. Complete Payment: Card (unchanged from your code)
  $("#complete-card-payment").click(function(){
    let card_number      = $("#card_number").val().trim();
    let cvc              = $("#cvc").val().trim();
    let card_holder_name = $("#card_holder_name").val().trim();
    let expiry_month     = $("#expiry_month").val();
    let expiry_year      = $("#expiry_year").val();

    if (!card_number || !cvc || !card_holder_name || !expiry_month || !expiry_year) {
      alert("Please fill all card details.");
      return;
    }
    const paymentMethod = $("input[name='payment']:checked").val(); 
    const contactData   = $("#contact-form").serialize();
    const finalData     = contactData
                        + "&payment_method=" + encodeURIComponent(paymentMethod)
                        + "&card_number=" + encodeURIComponent(card_number)
                        + "&cvc=" + encodeURIComponent(cvc)
                        + "&card_holder_name=" + encodeURIComponent(card_holder_name)
                        + "&expiry_month=" + encodeURIComponent(expiry_month)
                        + "&expiry_year=" + encodeURIComponent(expiry_year);

    $.ajax({
      url: "process_payment.php",
      type: "POST",
      data: finalData,
      success: function (response) {
        if (response.trim() === "success") {
          alert("Payment is successful and booking is placed.");
          window.location.href = "thank_you.php";
        } else {
          alert("Error processing payment: " + response);
        }
      },
      error: function () {
        alert("Something went wrong while processing payment.");
      }
    });
  });

  // 5. Complete Payment: UPI
  $("#complete-upi-payment").click(function(){
    let upiCode = $("#upi_code").val().trim();
    if (!upiCode) {
      alert("Please enter the UPI code you got after scanning.");
      return;
    }
    const paymentMethod = $("input[name='payment']:checked").val();
    const contactData   = $("#contact-form").serialize();
    const finalData     = contactData
                        + "&payment_method=" + encodeURIComponent(paymentMethod)
                        + "&upi_code=" + encodeURIComponent(upiCode);

    $.ajax({
      url: "process_payment.php",
      type: "POST",
      data: finalData,
      success: function (response) {
        if (response.trim() === "success") {
          alert("Payment completed and order has been placed.");
          window.location.href = "thank_you.php";
        } else {
          alert("Error verifying UPI code: " + response);
        }
      },
      error: function () {
        alert("Something went wrong while processing payment.");
      }
    });
  });
});
</script>
</body>
</html>
