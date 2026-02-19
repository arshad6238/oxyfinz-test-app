<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        header, footer { background: #eee; padding: 10px; }
        main { margin-top: 20px; }
    </style>
</head>
<body>

<header>
    <h1>My Yii 1.1 App</h1>
    <hr>
</header>

<main>
    <?php echo $content; ?>
</main>

<footer>
    <hr>
    <p> My Yii App</p>
</footer>

</body>
</html>
