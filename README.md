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

#### 45 Email create markdown templates
* `php artisan make:mail Contact --markdown=email.contact`
* `php artisan vendor:publish --tag=laravel-mail`

#### 46 Notification
* `php artisan make:notification PaymentReceived`
* 因為 user model 裡有 use Notifiable 這個 trait，所以可不用用 Notification Facades 直接 request()->user()->notify

#### 47 DB Notifications
* `php artisan notifications:table`

#### 48 SMS Notification
* `composer require laravel/nexmo-notification-channel`
* 申請 Nexmo 帳號，在 .env 中增加兩個 key `NEXMO_KEY`, `NEXMO_SECRET` 

#### 49 Event
* `php artisan make:event ProductPurchased`
* `event(new ProductPurchased('toy'));` == `ProductPurchased::dispatch('toy');`
* `php artisan make:listener AwardAchievements`
*  Overwrite <shouldDiscoverEvents> func return true後，不用手動登記 listener 有誰，增加 listener 很方便

#### 50 Auth
* `@can('xxx')` 對應 AuthServiceProvider 在 boot() 裡定義 Gate
* `$this->authorize()` 在 AuthorizeRequests 裡。 Controller 會 use AuthorizesRequests.
```
public function authorize($ability, $arguments = [])
{
    [$ability, $arguments] = $this->parseAbilityAndArguments($ability, $arguments);

    return app(Gate::class)->authorize($ability, $arguments);
}
```
* `php artisan make:policy ArticlePolicy -m Article` @can('xxx') Use policy

#### 51 Auth filter
*  policy 中在 <before> func 做 admin檢查, 在這裏 return 就不會再往下跑到 <update> func了，所以 admin 也可以設每篇的 best reply
* 上面那個方法可能要在每個 policy 都寫, 改寫在 AuthServiceProvider 較整潔

#### 52
* try to take of ability name but fail

#### 53
* middleware can be a policy!! `->middleware('can:view,article')` the article is wildcard for route 

#### 54 Roles and Abilities
* `$table->primary(['user_id', 'role_id']);`
* user belongsToMany Role 的關係表順序要是 role_user 才行
* $u->roles->map->abilities->flatten()->pluck('name')->unique();
* 當重複 save role_user 時，會跳 EXCEPTION `SQLSTATE[23000]: Integrity constraint violation: 1062 Duplicate entry '1-1' for key 'PRIMARY'`， 改用 sync 解決

#### 57 Eloquent
* $table->foreignId('user_id');
* public function getAvatarAttribute() //DB table不一定要有 attribute 欄位
    {
        return "https://i.pravatar.cc/40?u=" . $this->email;
    }
    * 前端可以直接取得 {{ user()->avatar }}

#### 58 Follow
* `follows(){ retrun $this->belongsToMany(User::class,'follows', 'user_id', 'following_user_id')}` //table, foreignPivotKey, relatedPivotKey
    1. 如果沒有寫 foreignPivotKey，會變成
    ```=
    General error: 1364 Field 'following_user_id' doesn't have a default value (SQL: insert into `follows` (`user_id`) values (1))
    ```
    2. 若改用 hasMany 會出現錯誤： PHP Error:  Class 'follows' not found in /Users/sarahcheng/code/laracastFromScratch/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Concerns/HasRelationships.php on line 718

* `follow(){ $this->follows()->save($user)}`
#### 59 Timline
* `$this->follows->pluck('id')`會撈所有follows的整體物件(collection) 改`$this->follows()->pluck('id')` 撈所有follows(relations:belongsToMany)的id

#### 62
* `$this->follows->contains($user)` 會撈出大量資料再check $user，應改成 `$this->follows()->where('following_user_id',$user->id)->exists();`
* `getRouteKeyName(){return 'name';}` 可以改用 `uri/{user:name}`
* USE trait 
