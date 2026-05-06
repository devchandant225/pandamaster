
   INFO  Running migrations.

  2026_04_30_100001_update_games_and_posts_tables ..................................................................................... 12.90ms FAIL

   Illuminate\Database\QueryException

  SQLSTATE[42S21]: Column already exists: 1060 Duplicate column name 'hero_title' (Connection: mysql, Host: 127.0.0.1, Port: 3306, Database: orionstars, SQL: alter table `games` add `hero_title` varchar(255) null after `title`)

  at vendor/laravel/framework/src/Illuminate/Database/Connection.php:838
    834▕             $exceptionType = $this->isUniqueConstraintError($e)
    835▕                 ? UniqueConstraintViolationException::class
    836▕                 : QueryException::class;
    837▕
  ➜ 838▕             throw new $exceptionType(
    839▕                 $this->getNameWithReadWriteType(),
    840▕                 $query,
    841▕                 $this->prepareBindings($bindings),
    842▕                 $e,

      +9 vendor frames

  10  database/migrations/2026_04_30_100001_update_games_and_posts_tables.php:15
      Illuminate\Support\Facades\Facade::__callStatic()
      +26 vendor frames

  37  artisan:16
      Illuminate\Foundation\Application::handleCommand()

root@yopretty:/var/www/orionstars#
