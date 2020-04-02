# Note

## Routing

#### 6 Pass Request Data to View
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

#### 7 wildcard
1. Route 裡用閉包直接取得 wildcard 當作 key， 取出對應的 data 傳到前端