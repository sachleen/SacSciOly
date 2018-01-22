<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sacramento Regional Science Olympiad</title>
    <link rel="stylesheet" href="../templates/css/messages.css" type="text/css" media="screen, projection">
</head>
<body>
    <div id="container">
        <div class="<?php echo $type ?>"><?php echo $message ?></div>
        <?php if($redirectTime >= 0): ?>
        If you are not redirected automatically, click <a href="<?php echo $backURL ?>">here</a>.
        <meta http-equiv="refresh" content="<?php echo $redirectTime ?>;url=<?php echo $backURL ?>">
        <?php endif; ?>
    </div>
</body>
</html>