<?php
session_start();
include("db.php");

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user']['id'];
$message = "";

/* UPDATE PROFILE */
if(isset($_POST['update_profile'])){

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);

    $stmt = $conn->prepare("UPDATE users SET name=?, email=? WHERE id=?");
    $stmt->bind_param("ssi", $name, $email, $user_id);
    $stmt->execute();

    $_SESSION['user']['name'] = $name;
    $_SESSION['user']['email'] = $email;

    $_SESSION['flash_message'] = "Profile updated successfully!";
header("Location: settings.php");
exit();
}


/* CHANGE PASSWORD */
/* CHANGE PASSWORD */
if(isset($_POST['change_password'])){

    $old_pass = trim($_POST['old_password']);
    $new_pass = trim($_POST['new_password']);

    $stmt = $conn->prepare("SELECT password FROM users WHERE id=?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if(!$row){
        $_SESSION['flash_message'] = "User not found!";
    }
    else{

        $db_password = $row['password'];

        // CASE 1: Password is hashed (correct system)
        if(password_verify($old_pass, $db_password)){

            $new_hash = password_hash($new_pass, PASSWORD_DEFAULT);

            $update = $conn->prepare("UPDATE users SET password=? WHERE id=?");
            $update->bind_param("si", $new_hash, $user_id);
            $update->execute();

            $_SESSION['flash_message'] = "Password changed successfully!";
        }

        // CASE 2: Password stored as plain text (old system fix)
        elseif($old_pass === $db_password){

            $new_hash = password_hash($new_pass, PASSWORD_DEFAULT);

            $update = $conn->prepare("UPDATE users SET password=? WHERE id=?");
            $update->bind_param("si", $new_hash, $user_id);
            $update->execute();

            $_SESSION['flash_message'] = "Password upgraded & changed successfully!";
        }

        else{
            $_SESSION['flash_message'] = "Old password is incorrect!";
        }
    }

    header("Location: settings.php");
    exit();
}

/* CHANGE PHOTO */
if(isset($_POST['change_photo'])){

    if(isset($_FILES['photo']) && $_FILES['photo']['error']==0){

        $folder = "uploads/";
        if(!file_exists($folder)){
            mkdir($folder,0777,true);
        }

        $filename = time().'_'.basename($_FILES['photo']['name']);
        $path = $folder.$filename;

        move_uploaded_file($_FILES['photo']['tmp_name'],$path);

        $conn->query("UPDATE users SET photo='$path' WHERE id='$user_id'");
        $_SESSION['user']['photo'] = $path;

        $message = "Profile photo updated!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Settings</title>

<style>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap');

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Inter',sans-serif;
}

body{
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background:linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),
    url("images/bg.jpg") center/cover no-repeat;
    padding:30px;
}

/* MAIN CONTAINER */
.container{
    width:100%;
    max-width:950px;
    padding:35px;
    border-radius:20px;
    background:rgba(255,255,255,0.15);
    backdrop-filter:blur(25px);
    -webkit-backdrop-filter:blur(25px);
    border:1px solid rgba(255,255,255,0.25);
    box-shadow:0 20px 50px rgba(0,0,0,0.25);
    color:white;
}

/* HEADER */
.header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:25px;
}

.header h2{
    font-size:20px;
    font-weight:600;
}

.back-link{
    text-decoration:none;
    font-size:13px;
    color:white;
    opacity:0.8;
}

.back-link:hover{
    opacity:1;
}

/* SUCCESS MESSAGE */
.message{
    padding:10px;
    border-radius:8px;
    margin-bottom:20px;
    background:rgba(0,255,150,0.15);
    border:1px solid rgba(0,255,150,0.3);
    font-size:13px;
}

/* GRID LAYOUT */
.settings-grid{
    display:grid;
    grid-template-columns:280px 1fr;
    gap:25px;
}

/* PROFILE CARD */
.profile-card{
    background:rgba(255,255,255,0.08);
    padding:20px;
    border-radius:15px;
    text-align:center;
}

.profile-card img{
    width:110px;
    height:110px;
    border-radius:50%;
    object-fit:cover;
    margin-bottom:10px;
    border:3px solid rgba(255,255,255,0.5);
}

.profile-card h4{
    margin-bottom:15px;
    font-weight:500;
}

.profile-card input{
    margin-bottom:10px;
}

/* RIGHT CARDS */
.card{
    background:rgba(255,255,255,0.08);
    padding:20px;
    border-radius:15px;
    margin-bottom:20px;
}

.card h3{
    font-size:14px;
    margin-bottom:12px;
    font-weight:600;
    opacity:0.9;
}

/* INPUT */
input{
    width:100%;
    padding:10px;
    margin-bottom:12px;
    border-radius:8px;
    border:1px solid rgba(255,255,255,0.3);
    background:rgba(255,255,255,0.15);
    color:white;
    font-size:13px;
}

input::placeholder{
    color:rgba(255,255,255,0.7);
}

input:focus{
    outline:none;
    border-color:#fff;
}

/* BUTTON */
button{
    width:100%;
    padding:10px;
    border:none;
    border-radius:8px;
    background:white;
    color:#333;
    font-size:13px;
    font-weight:500;
    cursor:pointer;
    transition:0.2s;
}

button:hover{
    background:#f1f1f1;
}

/* RESPONSIVE */
@media(max-width:850px){
    .settings-grid{
        grid-template-columns:1fr;
    }
}
</style>

</head>
<body>

<div class="container">
    
    <div class="header">
        <h2>Account Settings</h2>
        <a href="index.php" class="back-link">← Back</a>
    </div>

<?php if(isset($_SESSION['flash_message'])){ ?>
    <div class="message">
        <?php 
            echo $_SESSION['flash_message']; 
            unset($_SESSION['flash_message']); 
        ?>
    </div>
<?php } ?>    

    <div class="settings-grid">

        <!-- LEFT PROFILE CARD -->
        <div class="profile-card">
            <?php if(!empty($_SESSION['user']['photo'])){ ?>
                <img src="<?php echo $_SESSION['user']['photo']; ?>?v=<?php echo time(); ?>">
            <?php } else { ?>
                <img src="images/user.jpg">
            <?php } ?>

            <h4><?php echo $_SESSION['user']['name']; ?></h4>

            <form method="POST" enctype="multipart/form-data">
                <input type="file" name="photo" required>
                <button type="submit" name="change_photo">Change Photo</button>
            </form>
        </div>



        <!-- RIGHT SETTINGS -->
        <div class="forms-section">

            <div class="card">
                <h3>Profile Information</h3>
                <form method="POST">
                    <input type="text" name="name" value="<?php echo $_SESSION['user']['name']; ?>" required>
                    <input type="email" name="email" value="<?php echo $_SESSION['user']['email']; ?>" required>
                    <button type="submit" name="update_profile">Save Changes</button>
                </form>
            </div>

            <div class="card">
                <h3>Security</h3>
                <form method="POST">
                    <input type="password" name="old_password" placeholder="Old Password" required>
                    <input type="password" name="new_password" placeholder="New Password" required>
                    <button type="submit" name="change_password">Update Password</button>
                </form>
            </div>

        </div>

    </div>
</div>

</body>
</html>