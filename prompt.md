
root@93:/var/www/orion# php artisan migrate

   INFO  Preparing database.

  Creating migration table ............................................................................................................ 73.13ms DONE

   INFO  Running migrations.

  0001_01_01_000000_create_users_table ............................................................................................... 227.31ms DONE
  0001_01_01_000001_create_cache_table ............................................................................................... 142.02ms DONE
  0001_01_01_000002_create_jobs_table ................................................................................................ 189.12ms DONE
  2024_01_01_000005_create_posts_table ................................................................................................ 97.26ms DONE
  2024_01_01_000007_add_role_to_users_table .......................................................................................... 375.99ms DONE
  2026_03_31_000001_create_meta_tags_table ............................................................................................ 67.57ms DONE
  2026_04_01_000001_create_team_members_table ......................................................................................... 46.61ms DONE
  2026_04_01_000002_make_timeline_nullable_in_leads_table .............................................................................. 4.39ms FAIL

   Illuminate\Database\QueryException

  SQLSTATE[42S02]: Base table or view not found: 1146 Table 'orion.leads' doesn't exist (Connection: mysql, Host: 127.0.0.1, Port: 3306, Database: orion, SQL: alter table `leads` modify `timeline` varchar(255) null)

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

  10  database/migrations/2026_04_01_000002_make_timeline_nullable_in_leads_table.php:14
      Illuminate\Support\Facades\Facade::__callStatic()
      +26 vendor frames

  37  artisan:16
      Illuminate\Foundation\Application::handleCommand()

root@93:/var/www/orion#
