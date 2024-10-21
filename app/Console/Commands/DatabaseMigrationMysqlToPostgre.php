<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;


class DatabaseMigrationMysqlToPostgre extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:mysqltoPostgre';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate data from MySQL to PostgreSQL';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
         // MySQL connection details
         $mysql_connection = [
            'driver' => 'mysql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => false,
            'engine' => null,
        ];

        // PostgreSQL connection details
        $postgres_connection = [
            'driver' => 'pgsql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_PGSQL_HOST', 'ic-dwpostgresql-uat.cqpky3oakvwj.ap-south-1.rds.amazonaws.com'),
            'port' => 5432,
            'database' => env('DB_PGSQL_DATABASE', 'ODS_PIRAMAL_DW'),
            'username' => env('DB_PGSQL_USERNAME', 'wsautomations'),
            'password' => env('DB_PGSQL_PASSWORD', 'Uatsupport@2022'),
            'charset' => 'utf8',
            'prefix' => '',
            'prefix_indexes' => true,
            'schema' => 'fmr',
            'sslmode' => 'prefer',
        ];

        // Connect to MySQL and PostgreSQL databases
        $mysql_db = DB::connection('mysql');
        $postgres_db = DB::connection('pgsql');

        // Fetch data from MySQL table
        $mysql_table = 'fmr_details';
        $data = $mysql_db->table($mysql_table)->get();
        // dd($data); exit();
        // PostgreSQL table name
        $postgres_table = 'fmr.fmr_details';

        // Insert data into PostgreSQL table
        foreach ($data as $row) {
            $postgres_db->table($postgres_table)->insert((array)$row);
        }

        $this->info("Data migration from MySQL to PostgreSQL completed successfully.");
    

    }
}
