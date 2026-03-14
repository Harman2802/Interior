<?php
include "db.php";
$message = "";

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $message_text = $_POST['message'];

    $sql = "INSERT INTO consultations(name,email,phone,city,message)
            VALUES('$name','$email','$phone','$city','$message_text')";

    if($conn->query($sql)){
        $message = "Your request has been submitted successfully!";
    } else {
        $message = "Error submitting request. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Free Consultation | BestArt</title>

<style>
/* RESET */
* {
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family: 'Poppins', sans-serif;
}

/* BODY BACKGROUND */
body {
   background:linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.3)), url("images/bg.jpg");
background-size:cover;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}

.form-box {
    width: 100%;
    max-width: 550px;
    height: 650px;                     /* fixed height */
    background: linear-gradient(145deg, #ffffff, #ffeae6);  /* soft pastel gradient */
    border-radius: 30px;               /* smooth rounded corners */
    padding: 40px 35px;                /* adjust padding to fit height */
    box-shadow: 0 20px 40px rgba(0,0,0,0.15), 0 10px 20px rgba(255,111,97,0.2);
    transition: all 0.4s ease;
    position: relative;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    justify-content: space-between;    /* distribute space evenly */
}

/* FORM HOVER EFFECT */
.form-box:hover {
    transform: translateY(-5px) scale(1.02);
    box-shadow: 0 25px 50px rgba(0,0,0,0.2), 0 15px 25px rgba(255,111,97,0.25);
}

/* HEADING */
.form-box h2 {
    text-align: center;
    font-size: 30px;
    color: #ff6f61;
    font-weight: 700;
    letter-spacing: 1px;
    margin-bottom: 25px;
}

/* INPUT FIELDS */
input, textarea {
    width: 100%;
    padding: 14px 12px;
    margin: 8px 0;
    border: 1px solid #ffd1c1;
    border-radius: 12px;
    font-size: 15px;
    background: #fff5f2;
    transition: all 0.3s ease;
}

input:focus, textarea:focus {
    border-color: #ff6f61;
    box-shadow: 0 0 8px rgba(255,111,97,0.3);
    outline: none;
}

/* TEXTAREA */
textarea {
    resize: none;
    height: 100px;    /* slightly smaller to fit inside 650px box */
    margin-bottom: 10px;
}

/* BUTTON */
button {
    width: 100%;
    padding: 16px;
    background: linear-gradient(135deg, #ff6f61, #ff9472);
    border: none;
    color: #fff;
    font-size: 16px;
    font-weight: 600;
    border-radius: 14px;
    cursor: pointer;
    margin-top: 10px;
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease;
}

button:hover {
    transform: scale(1.03);
    box-shadow: 0 8px 25px rgba(255,111,97,0.4);
}

button::after {
    content: "";
    position: absolute;
    top: 0;
    left: -80%;
    width: 50%;
    height: 100%;
    background: rgba(255,255,255,0.25);
    transform: skewX(-25deg);
    transition: all 0.5s ease;
}

button:hover::after {
    left: 120%;
}

/* SUCCESS MESSAGE */
.success {
    color: #27ae60;
    text-align: center;
    font-weight: 600;
    margin-bottom: 12px;
}

/* BACK BUTTON */
.back-btn {
    display: inline-block;
    text-decoration: none;
    padding: 12px 18px;
    background: #fff3f0;
    color: #ff6f61;
    border-radius: 14px;
    font-weight: 600;
    border: 1px solid #ff6f61;
    transition: all 0.3s ease;
    text-align: center;
}

.back-btn:hover {
    background: #ff6f61;
    color: #fff;
}

/* RESPONSIVE */
@media(max-width:480px){
    .form-box {
        height: auto;               /* allow height to adjust for small screens */
        padding: 35px 20px;
    }
    .form-box h2 {
        font-size: 26px;
        margin-bottom: 20px;
    }
    textarea {
        height: 90px;
    }
}
</style>
</head>
<body>

<div class="form-box">

<h2>Free Consultation</h2>

<?php if($message != "") { ?>
    <div class="success"><?php echo $message; ?></div>
<?php } ?>

<form method="POST">

    <input type="text" name="name" placeholder="Your Name" required>

    <input type="email" name="email" placeholder="Email" required>

    <input type="text" name="phone" placeholder="Phone Number" required>

    <input type="text" name="city" placeholder="City">

    <textarea name="message" placeholder="Tell us about your project"></textarea>

    <button type="submit" name="submit">Submit Request</button>
</form>

<a href="projects.php" class="back-btn">← Back to Home</a>

</div>

</body>
</html>