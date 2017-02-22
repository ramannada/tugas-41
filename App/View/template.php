<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <base href="http://localhost/mit/frameworksederhana/">
        <title></title>

<!-- Latest compiled and minified CSS -->
        <link rel="stylesheet"
        href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    <body>

<!-- navigation -->
        <header>
            <nav class="navbar navbar-default" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <a href="index.php" class="navbar-brand">Framework Sederhana</a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    </ul>
                </div>
            </nav>
        </header>

        <main class="container">
            <?php require($content) ?>
        </main>

<!-- jQuery library -->
        <script
        src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
        <script
        src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>
