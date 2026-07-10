<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use Illuminate\Support\Facades\DB;

function testConnection($username, $password) {
    echo "Testing connection for '$username'...\n";
    config([
        'database.connections.mysql.username' => $username,
        'database.connections.mysql.password' => $password,
    ]);
    DB::purge('mysql');
    try {
        $pdo = DB::connection()->getPdo();
        echo "Success!\n";
        // Check if we can query users
        $usersCount = DB::table('users')->count();
        echo "Query users successful. Count: $usersCount\n";
    } catch (\Exception $e) {
        echo "Failed: " . $e->getMessage() . "\n";
    }
}

testConnection('root', '');
testConnection('db_admin_playstation', 'admin123');
testConnection('db_operator_playstation', 'operator123');
