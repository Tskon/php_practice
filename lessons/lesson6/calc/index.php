<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="calc.css">
    <title>Lesson6. Calc</title>
</head>
<body>

<form action="../server.php" method="post" class="calc_wrapper">

    <div class="result_out">123+18</div>
    <input type="text" name="input">
    <div>
        <input type="button" value="+" name="plus">
        <input type="button" value="-" name="minus">
    </div>
    <div>
        <input type="button" value="*" name="mult">
        <input type="button" value="/" name="div">
    </div>
    <input type="button" value="=" name="result" id="result">

</form>

<script src="../js/jquery-3.2.1.min.js"></script>
<script src="calc.js"></script>
</body>
</html>
