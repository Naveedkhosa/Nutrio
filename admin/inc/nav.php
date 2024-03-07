<?php
session_start();
include "../config.php";
if (!isset($_SESSION['logged_in_user'])) {
    header("Location:index.php");
}
function getUserInfo($user_id){
    global $conn;
    try {
        $result = mysqli_query($conn,"SELECT * FROM admin WHERE user_id='{$user_id}'");
        if(mysqli_num_rows($result) > 0){
            return mysqli_fetch_assoc($result);
        }
        return false;
    } catch (\Throwable $th) {
        return false;
    }
}

$user_data = getUserInfo($_SESSION['logged_in_user']);

$current_page = explode("/", $_SERVER['REQUEST_URI']);
$current_page = end($current_page);




?>
<div class="heading">
    Nutrio
</div>
<nav class="navigation">
    <p class="sub-heading">Main Menu</p>
    <ul>
        <li class="<?= ($current_page == "dashboard.php") ? 'active' : '' ?>">
            <a href="dashboard.php">
                <svg width="24" height="24" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M13 9V3h8v6h-8ZM3 13V3h8v10H3Zm10 8V11h8v10h-8ZM3 21v-6h8v6H3Z" />
                </svg>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="<?= ($current_page == "users.php") ? 'active' : '' ?>">
            <a href="users.php">
                <svg width="24" height="24" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M16 17v2H2v-2s0-4 7-4s7 4 7 4m-3.5-9.5A3.5 3.5 0 1 0 9 11a3.5 3.5 0 0 0 3.5-3.5m3.44 5.5A5.32 5.32 0 0 1 18 17v2h4v-2s0-3.63-6.06-4M15 4a3.39 3.39 0 0 0-1.93.59a5 5 0 0 1 0 5.82A3.39 3.39 0 0 0 15 11a3.5 3.5 0 0 0 0-7Z" />
                </svg>
                <span>Users</span>
            </a>

        </li>
     

        <li class="<?= ($current_page == "blogs.php") ? 'active' : '' ?>">
            <a href="blogs.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 32 32">
                    <path fill="currentColor" d="M14.52 4.01a.507.507 0 0 0-.52.51V6.5c0 .28.22.5.5.5v.02c6.23.24 11.24 5.25 11.48 11.48H26c0 .28.22.5.5.5h1.98c.29 0 .52-.24.51-.52c-.27-7.86-6.61-14.2-14.47-14.47m0 5a.514.514 0 0 0-.52.51v1.98c0 .28.22.5.5.5v.03c3.47.23 6.24 3 6.47 6.47H21c0 .28.22.5.5.5h1.98c.28 0 .52-.24.51-.52c-.27-5.1-4.37-9.2-9.47-9.47M5.5 10c-.28 0-.5.22-.5.5v11c0 3.58 2.92 6.5 6.5 6.5s6.5-2.92 6.5-6.5s-2.92-6.5-6.5-6.5c-.28 0-.5.22-.5.5v3c0 .28.22.5.5.5a2.5 2.5 0 0 1 0 5A2.5 2.5 0 0 1 9 21.5v-11c0-.28-.22-.5-.5-.5z" />
                </svg>
                <span>Blogs</span>
            </a>
        </li>

        <li>
            <a href="newsletter.php">
                <svg width="24" height="24" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M12 .64L8.23 3H5v2L2.97 6.29C2.39 6.64 2 7.27 2 8v10a2 2 0 0 0 2 2h16c1.11 0 2-.89 2-2V8c0-.73-.39-1.36-.97-1.71L19 5V3h-3.23M7 5h10v4.88L12 13L7 9.88M8 6v1.5h8V6M5 7.38v1.25L4 8m15-.62L20 8l-1 .63M8 8.5V10h8V8.5Z" />
                </svg>
                <span>Newsletter</span>
            </a>

        </li>


    </ul>
</nav>
<nav class="navigation">
    <p class="sub-heading">Others</p>
    <ul>


        <li>
            <a href="">
                <svg width="24" height="24" viewBox="0 0 16 16">
                    <path fill="currentColor" d="M13 10.4c-.75.384-1.6.6-2.5.6a5.49 5.49 0 0 1-1.852-.32l-1.41.76a.5.5 0 0 1-.475 0L1 8.337V13a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-2.6ZM5.022 5H3a2 2 0 0 0-2 2v.2l6 3.231l.544-.293a5.496 5.496 0 0 1-2.522-5.14Zm1.613-.08a2 2 0 0 0 1.43-2.478l-.156-.557c.254-.195.53-.362.822-.497l.337.358a2 2 0 0 0 2.91.001l.325-.344c.297.14.577.315.834.518l-.126.423a2 2 0 0 0 1.456 2.519l.35.082a4.698 4.698 0 0 1 .01 1.017l-.461.118a2 2 0 0 0-1.43 2.478l.155.556c-.254.196-.53.363-.822.498l-.337-.358a2 2 0 0 0-2.91-.002l-.324.344a4.32 4.32 0 0 1-.835-.517l.126-.423a2 2 0 0 0-1.456-2.52l-.35-.082a4.701 4.701 0 0 1-.01-1.016l.462-.118Zm4.865.58a1 1 0 1 0-2 0a1 1 0 0 0 2 0Z" />
                </svg>
                <span>Mail Setting</span>
            </a>
        </li>

        <li>
            <a href="profile-settings.php">
                <svg width="24" height="24" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M11.5 4a3.5 3.5 0 1 0 0 7a3.5 3.5 0 0 0 0-7ZM6 7.5a5.5 5.5 0 1 1 11 0a5.5 5.5 0 0 1-11 0ZM8 16a4 4 0 0 0-4 4h8.05v2H2v-2a6 6 0 0 1 6-6h4v2H8Zm11.5-3.25v1.376c.715.184 1.352.56 1.854 1.072l1.193-.689l1 1.732l-1.192.688a4.008 4.008 0 0 1 0 2.142l1.192.688l-1 1.732l-1.193-.689a4 4 0 0 1-1.854 1.072v1.376h-2v-1.376a3.996 3.996 0 0 1-1.854-1.072l-1.193.689l-1-1.732l1.192-.688a4.004 4.004 0 0 1 0-2.142l-1.192-.688l1-1.732l1.193.688a3.996 3.996 0 0 1 1.854-1.071V12.75h2Zm-2.751 4.283a1.991 1.991 0 0 0-.25.967c0 .35.091.68.25.967l.036.063a1.999 1.999 0 0 0 3.43 0l.036-.063c.159-.287.249-.616.249-.967c0-.35-.09-.68-.249-.967l-.036-.063a1.999 1.999 0 0 0-3.43 0l-.036.063Z" />
                </svg>
                <span>Profile Setting</span>
            </a>
        </li>

        <li>
            <a href="logout.php">
                <svg width="24" height="24" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M5 11h8v2H5v3l-5-4l5-4zm-1 7h2.708a8 8 0 1 0 0-12H4a9.985 9.985 0 0 1 8-4c5.523 0 10 4.477 10 10s-4.477 10-10 10a9.985 9.985 0 0 1-8-4" />
                </svg>
                <span>Logout</span>
            </a>
        </li>

    </ul>
</nav>