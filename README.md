# Note

## Routing

#### 6 
1. blade template
    * html特殊字元處理
    ```html=
    <h1><?= htmlspecialchars($name, ENT_QUOTES) ?></h1> <!-- php內建 function 處理 -->
    <h1><?= $name ?></h1> <!-- 沒有處理,會跳 alert -->
    <h1>{{ $name }}</h1> <!-- blade 模板處理-->
    <h1>{{!! $name !!}}</h1> <!-- blade 模板處理, 會跳 alert --> 
    <!---------------------------------------------->
    <!-- blade 處理完會變以下這樣(storage/framework/views裡可以看到)-->
    <h1>the name: <?php echo e($name); ?></h1>
    ```
    > e fuction(在 vendor/laravel/framework/src/Illuminate/Support/helpers.php)，會 call htmlspecialchars 
2. 
