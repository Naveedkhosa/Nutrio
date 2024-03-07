<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dahsboard</title>
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/blog-posts.css">
</head>

<body>
    <div class="dash_board">
        <div class="left">
            <?php include "inc/nav.php" ?>
        </div>

        <div class="right">
        <?php include "inc/right_top.php"; ?>
            <div class="content">
                <div class="page-title">
                    Blog Posts

                    <a href="blog-post.php" class="new-post-btn">
                        New Blog
                        <svg width="16" height="16" viewBox="-2 -2 24 24">
                            <path fill="currentColor" d="m5.72 14.456l1.761-.508l10.603-10.73a.456.456 0 0 0-.003-.64l-.635-.642a.443.443 0 0 0-.632-.003L6.239 12.635zM18.703.664l.635.643c.876.887.884 2.318.016 3.196L8.428 15.561l-3.764 1.084a.901.901 0 0 1-1.11-.623a.915.915 0 0 1-.002-.506l1.095-3.84L15.544.647a2.215 2.215 0 0 1 3.159.016zM7.184 1.817c.496 0 .898.407.898.909a.903.903 0 0 1-.898.909H3.592c-.992 0-1.796.814-1.796 1.817v10.906c0 1.004.804 1.818 1.796 1.818h10.776c.992 0 1.797-.814 1.797-1.818v-3.635c0-.502.402-.909.898-.909s.898.407.898.91v3.634c0 2.008-1.609 3.636-3.593 3.636H3.592C1.608 19.994 0 18.366 0 16.358V5.452c0-2.007 1.608-3.635 3.592-3.635z" />
                        </svg>
                    </a>
                </div>
                <div class="dynamic-content">
                    <!-- dynamic content -->
                    <div class="blog-post-container">

                    </div>
                    <!-- dynamic content -->
                </div>
            </div>
        </div>
    </div>

    <script src="js/dashboard.js"></script>
</body>

</html>