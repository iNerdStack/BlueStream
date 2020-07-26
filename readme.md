
# BlueStream

BlueStream is an open source blog platform developed with **Laravel PHP** framework. A simple and light blog platform with Android App provided. Click [here](https://github.com/iNerdStack/BlueStream-App) to go to project.
![bluestream Framework](https://i.imgur.com/mCguHcR.jpg)
## Requirements

All requirement needed are same required by Laravel. The Laravel framework has a few system requirements:

- PHP >= 5.4, (PHP  7 recommended)
- Mcrypt PHP Extension
- OpenSSL PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension

As of PHP 5.5, some OS distributions may require you to manually install the PHP JSON extension. When using Ubuntu, this can be done via `apt-get install php5-json`.

# Contents

All blog features have been implemented including

**Page Features:**

1. Blog Posts / Articles
2. Post Comments
3. Post Category
4. Post Search

**Admin Dashboard**

6. Recent Posts
7. Draft Posts
8. Comment Management (Approval and Spam Control)
9. Content Search
10. Category Page

**Preview**
![Bluestream Desktop](https://i.imgur.com/nCZ5Wyl.png)![enter image description here](https://i.imgur.com/FY7pR4N.png)
# Project Setup

1. Upload entire project folder to your server `root directory` - _not ( public_html)._
2. Move all files and folders in `public` folder to your cpanel’s `public_html`folder.
3. Create a database and import `bluestream.sql` from `SQL` folder in the root directory to your database.
4. Edit `APP_NAME` , `APP_URL` , `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`, database name in `.env` in the root folder.
5. Also change database information in `config/database.php`

```php
'mysql' => [

'driver' => 'mysql',

'host' => env('DB_HOST', '127.0.0.1'),

'port' => env('DB_PORT', '3306'),

'database' => env('DB_DATABASE', 'bluestream'),

'username' => env('DB_USERNAME', 'root'),

'password' => env('DB_PASSWORD', ''),

'unix_socket' => env('DB_SOCKET', ''),

'charset' => 'utf8mb4',

'collation' => 'utf8mb4_unicode_ci',

'prefix' => '',

'strict' => true,

'engine' => null,

],
```

6. If all is set. Load the site and visit `yoursite.com/dashboard` to access Dashboard.
7. Default Email is `admin@bluestream.com` and password `!BlueStream!`
8. Click on register user to register a new admin. After registering the new user, DELETE the default user with email `admin@bluestream.com` from `users` table in your database.
9. All is set and can start posting articles and managing your new blog.
10. You can set up the blog [App](https://github.com/iNerdStack/BlueStream-App) if you are done with all the steps.

# Project Dependencies

**Frontend UI / Dashboard**: [AdminLTE 3](https://github.com/riverocdavidb/admin-lte)

**Backend:** [Laravel PHP 5.4](https://github.com/laravel/)

**Text Editor:** [CK Editor](https://github.com/ckeditor/ckeditor4)


## 📄 License

BlueStream is MIT licensed, as found in the [LICENSE](https://tapgames.xyz/LICENSE) file.
