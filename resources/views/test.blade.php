<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
</head>
<body>
    <h1><?= htmlspecialchars($name, ENT_QUOTES) ?></h1>
    <h1>the name: {{ $name }}</h1>
    <!-- http://laracastfromscratch.test/test?name=%3Cscript%3Ealert(%27hello%27);%3C/script%3E -->
    <!-- <h1><?php #echo $name ?></h1> -->
    <h1>{{!! $name !!}}</h1>  <!-- 有 alert -->
</body>
</html>