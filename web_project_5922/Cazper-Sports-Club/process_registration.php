<?php
include 'db_connect.php';

// Initialize response array
$response = array(
    'success' => false,
    'message' => ''
);

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data and sanitize inputs
    $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $selectedPlan = mysqli_real_escape_string($conn, $_POST['selectedPlan']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $healthInfo = isset($_POST['healthInfo']) ? mysqli_real_escape_string($conn, $_POST['healthInfo']) : '';
    
    // Basic validation
    if (empty($firstName) || empty($lastName) || empty($email) || empty($phone) || empty($dob) || empty($selectedPlan) || empty($address)) {
        $response['message'] = "Please fill all required fields";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response['message'] = "Invalid email format";
    } else {
        // Insert data into database
        $sql = "INSERT INTO members (first_name, last_name, email, phone, dob, membership_plan, address, health_info, registration_date) 
                VALUES ('$firstName', '$lastName', '$email', '$phone', '$dob', '$selectedPlan', '$address', '$healthInfo', NOW())";
        
        if ($conn->query($sql) === TRUE) {
            $response['success'] = true;
            $response['message'] = "Registration successful! Welcome to Cazper Sports Club.";
        } else {
            $response['message'] = "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Return JSON response
header('Content-Type: application/json');
echo json_encode($response);

$conn->close();
?>