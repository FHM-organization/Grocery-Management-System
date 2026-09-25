<?php

session_start();

require_once "config/database.php";

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}

$name = $_SESSION["user_name"];
$username = $_SESSION["username"];
$role = $_SESSION["role"];
$status = $_SESSION["status"];
$shop_id = $_SESSION["shop_id"];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile - Grocery Management System</title>

    <link rel="stylesheet" href="assets/css/profile.css">
</head>
<body>

<div class="profile-page">

    <!-- Top Header -->
    <header class="profile-header">
        <div>
            <h1>My Profile</h1>
            <p>Manage your account information and security.</p>
        </div>

        <a href="seller/dashboard.php" class="back-btn">
            ← Back to Dashboard
        </a>
    </header>


    <!-- Main Content -->
    <main class="profile-container">

        <!-- Profile Overview -->
        <section class="profile-card profile-overview">

            <div class="profile-top">

        <div class="avatar-wrapper">

            <div class="profile-avatar">
                <?php echo strtoupper($name[0] . $name[1]); ?>
            </div>

            <label for="profile-photo" class="camera-btn" title="Change Photo">
                📷
            </label>

            <input
                type="file"
                id="profile-photo"
                accept="image/*"
                hidden
            >

        </div>

                <div class="profile-main-info">
                    <h2><?php
                    echo "<div style= 'font-weight: bold;'>";
                     echo $name;
                     echo "</div>"
                    ?></h2>
                    <p><?php echo $username ?></p>

                    <span class="role-badge">
                        <?php echo $role; ?>
                    </span>

                    <span class="status-badge">
                        ● <?php echo $status; ?>
                    </span>
                </div>

               <button type="button" class="edit-profile-btn" onclick="openEditModal()">
                 Edit Profile
                </button>

            </div>

        </section>


        <!-- Profile Information -->
        <section class="profile-card">

            <div class="section-heading">
                <div>
                    <h2>Personal Information</h2>
                    <p>Your basic account information</p>
                </div>
            </div>

            <div class="info-grid">

                <div class="info-group">
                    <label>Full Name</label>
                    <div class="info-value">
                        Talha Khan
                    </div>
                </div>

                <div class="info-group">
                    <label>Username</label>
                    <div class="info-value">
                        talha
                    </div>
                </div>

                <div class="info-group">
                    <label>Role</label>
                    <div class="info-value">
                        Seller
                    </div>
                </div>

                <div class="info-group">
                    <label>Account Status</label>
                    <div class="info-value active-text">
                        Active
                    </div>
                </div>

                <div class="info-group">
                    <label>Shop ID</label>
                    <div class="info-value">
                        #SHOP-001
                    </div>
                </div>

                <div class="info-group">
                    <label>Member Since</label>
                    <div class="info-value">
                        September 2026
                    </div>
                </div>

            </div>

        </section>


        <!-- Edit Profile -->
        <section class="profile-card">

            <div class="section-heading">
                <div>
                    <h2>Edit Profile</h2>
                    <p>Update your personal information</p>
                </div>
            </div>

            <form>

                <div class="form-grid">

                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input
                            type="text"
                            id="name"
                            value="Talha Khan"
                            placeholder="Enter your full name"
                        >
                    </div>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input
                            type="text"
                            id="username"
                            value="talha"
                            placeholder="Enter username"
                        >
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input
                            type="tel"
                            id="phone"
                            placeholder="03XX-XXXXXXX"
                        >
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input
                            type="email"
                            id="email"
                            placeholder="example@email.com"
                        >
                    </div>

                </div>

                <div class="form-actions">
                    <button type="button" class="cancel-btn">
                        Cancel
                    </button>

                    <button type="submit" class="save-btn">
                        Save Changes
                    </button>
                </div>

            </form>

        </section>


        <!-- Security -->
        <section class="profile-card">

            <div class="section-heading">
                <div>
                    <h2>Password & Security</h2>
                    <p>Keep your account secure</p>
                </div>
            </div>

            <div class="security-row">

                <div class="security-info">
                    <div class="security-icon">
                        🔒
                    </div>

                    <div>
                        <h3>Password</h3>
                        <p>Last changed recently</p>
                    </div>
                </div>

                <button class="change-password-btn">
                    Change Password
                </button>

            </div>

        </section>


        <!-- Account Details -->
        <section class="profile-card account-details">

            <div class="section-heading">
                <div>
                    <h2>Account Details</h2>
                    <p>Information related to your account</p>
                </div>
            </div>

            <div class="account-list">

                <div class="account-item">
                    <span>Account ID</span>
                    <strong>#USR-001</strong>
                </div>

                <div class="account-item">
                    <span>Account Type</span>
                    <strong>Seller Account</strong>
                </div>

                <div class="account-item">
                    <span>Status</span>
                    <strong class="active-text">Active</strong>
                </div>

            </div>

        </section>

    </main>


    <!-- Footer -->
    <footer class="profile-footer">
        <p>© 2026 Grocery Management System. All rights reserved.</p>
    </footer>

</div>

<!-- Edit Profile Modal -->

<div class="modal-overlay" id="editProfileModal">

    <div class="profile-modal">

        <div class="modal-header">
            <div>
                <h2>Edit Profile</h2>
                <p>Update your profile information</p>
            </div>

            <button
                type="button"
                class="close-modal"
                onclick="closeEditModal()">
                ×
            </button>
        </div>


        <form>

            <!-- Profile Photo -->

            <div class="modal-photo">

                <div class="modal-avatar">
                    <?php echo strtoupper($name[0] . $name[1]); ?>
                </div>

                <label for="modal-profile-photo" class="modal-camera">
                    📷
                    <input
                        type="file"
                        id="modal-profile-photo"
                        accept="image/*"
                        hidden
                    >
                </label>

                <p>Change Profile Photo</p>

            </div>


            <!-- Name -->

            <div class="form-group">
                <label for="edit-name">Full Name</label>

                <input
                    type="text"
                    id="edit-name"
                    value="<?php echo htmlspecialchars($name); ?>"
                    placeholder="Enter your full name"
                >
            </div>


            <!-- Username -->

            <div class="form-group">
                <label for="edit-username">Username</label>

                <input
                    type="text"
                    id="edit-username"
                    value="<?php echo htmlspecialchars($username); ?>"
                    placeholder="Enter username"
                >
            </div>


            <!-- Buttons -->

            <div class="modal-actions">

                <button
                    type="button"
                    class="cancel-btn"
                    onclick="closeEditModal()">
                    Cancel
                </button>

                <button
                    type="submit"
                    class="save-btn">
                    Save Changes
                </button>

            </div>

        </form>

    </div>

</div>

<script>

function openEditModal() {
    document.getElementById("editProfileModal").classList.add("active");
}

function closeEditModal() {
    document.getElementById("editProfileModal").classList.remove("active");
}

</script>

</body>
</html>