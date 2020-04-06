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

#### 23 Form
* @csrf 等於 `<input type="hidden" name="_token" value="G7aB0Vg6zZP8z26Xb7pj3Vz6Cu4qP5VXATQe61Xf">`

#### 24 Edit Form
* @method('PUT') 等於 `<input type="hidden" name="_method" value="put">`

#### 26 Validate
* request()->validate 會直接回傳 fail，前端可直接取得 error 訊息顯示出來
* uri 的參數 id 名稱直接對應 Controller 的 input 參數，若前面加上 model 可直接取得該物件！
* Model 可用`getRouteKeyName()`取得slug，這樣 uri 就可以不用寫 id

#### 27 Reduce duplicate
* validation 回傳的 ac array 可以直接當 create 或 update 的參數
* 每個 method 都要寫的 validation 可另外寫 protected func 來用

#### 28 Named route
* 在 model 寫一個 path() method，replaced `route('xxx.xxx', $xx->id)` with `$xx->path()`

#### 30 DB factory
* 可以在某個 model 的 factory 中直接生成其他 model 的 factory。 如下程式碼
```
['user_id' => factory(App\User::class),
'title' => $faker->sentence]
```
#### 31 Many to Many Relationships
* 多對多的 pivot 表可以和第二張表一起 create 就好
* $table->unique(['xx', 'xx']) 可以確保兩個關係唯一。
    若重複 insert 關係, 得 error: `ERROR 1062 (23000): Duplicate entry '2-4' for key 'article_tag_article_id_tag_id_unique'`
* `$art->tags->pluck('name')` 取出所有集合中該 key 的 value

#### 32 Display tags under each article
* 哇, 有 forelse 這個指令。 定義在 `Illuminate/View/Compilers/BladeCompiler.php`
`return "<?php {$empty} = true; foreach{$expression}: {$empty} = false; ?>";`

#### 33 Attach and validate m2m Insert
* belonsToMany的 func 可以在 save 之後直接 attach(detach) 多對多的關係 `$article->tags()->attach(request('tags'));`

#### 34 Authenticate
* `@if (Auth::user())` == `@if (Auth::check())` == `@auth`
* @quest failed

#### 35 Reset password




#### 36 Collection
* `$article->pluck('tags.*.name')->collapse()->unique()->map(function ($item){return ucwords($item);});`

#### 37 CSRF
* VerifyCsrfToken middleware 有 except=[] 可以設定不檢查 csrf token，如 '/webhook/*'

#### 39 Resolve Dependency
*  `app()->make()` == `resolve()＄
*  在 AppServiceProvider 裡面 `app()->bind()` 可以用 `$this->app->bind()` 因為 ＄app 有在他繼承的 ServiceProvider 被宣告

#### 40 
* `View::make()` == `view()`
* `Cache::remember()` == `app('cache')->remember()` (CacheServiceProvider中有註冊)

#### 42 Email
* 若 .env 有  MAIL_FROM_ADDRESS 欄位就一定要填，不能是 null，env('MAIL_FROM_ADDRESS', 'default@e.com')的預設值是 沒有 Key 才會用上