<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dahsboard</title>
    <link rel="stylesheet" href="css/dashboard.css">
</head>

<body>
    <div class="dash_board">
        <div class="left">
            <?php include "inc/nav.php" ?>

        </div>

        <div class="right">
            <div class="right-top">
                <div class="left">
                    <svg id="myNav" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M3 17h12a1 1 0 0 1 .117 1.993L15 19H3a1 1 0 0 1-.117-1.993L3 17h12H3Zm0-6h18a1 1 0 0 1 .117 1.993L21 13H3a1 1 0 0 1-.117-1.993L3 11h18H3Zm0-6h15a1 1 0 0 1 .117 1.993L18 7H3a1 1 0 0 1-.117-1.993L3 5h15H3Z" />
                    </svg>
                </div>
                <ul class="right">
                    <li>
                        <svg width="20" height="20" viewBox="0 0 20 20">
                            <path fill="currentColor" d="M4 8a6 6 0 0 1 4.03-5.67a2 2 0 1 1 3.95 0A6 6 0 0 1 16 8v6l3 2v1H1v-1l3-2V8zm8 10a2 2 0 1 1-4 0h4z" />
                        </svg>
                    </li>
                    <li id="myProfile">
                        <div class="profile-pic">
                            <img src="https://assets.vogue.in/photos/637b890faea31dc4edb48c83/2:3/w_2560%2Cc_limit/yami%2520gautam.jpg" alt="Yammi">
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M5.293 9.293a1 1 0 0 1 1.414 0L12 14.586l5.293-5.293a1 1 0 1 1 1.414 1.414l-6 6a1 1 0 0 1-1.414 0l-6-6a1 1 0 0 1 0-1.414z" />
                        </svg>
                    </li>
                </ul>
            </div>
            <div class="content">
                <div class="page-title">
                    Dashboard
                </div>
                <div class="dynamic-content">
                    <!-- dynamic content -->
                    
                    <!-- dynamic content -->
                </div>
            </div>
        </div>
    </div>

    <script src="js/dashboard.js"></script>
</body>

</html>