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

#### 9 DB
1. mysql
    * `create table posts(id INT(6) PRIMARY KEY, slug varchar(255), body text);`
    * `Insert into posts(slug,body) values ('my-first-post','Hello, this is my first post.');`

#### 10 Eloquent
1. replace if(! $post) with 'firstorFail()'

#### 12 Bussiness logic
1. 注意！設定時間欄位要用 timestamp()!timestamps() not accepts any argument and creates two colums : created_at and updated_at。
2. `php artisan tinker`

#### 17 Mix and webpack
* resources 下編譯完的檔案會放到 public 下
* 很不熟 待研究 

#### 18 Dynamic data
* take(2)->get()/paginate(2)/latest()->get()

#### 19 Dynamic
* "{{ asset('css/fonts.css') }}" == "/css/default.css"

#### 21 Controller
* `php artisan make:controller PostController -r -m post` 會自動生成 7 個 function 且 include Model 