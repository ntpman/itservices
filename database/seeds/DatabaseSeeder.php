<?php

use Illuminate\Database\Seeder;

use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $user = new User;
        $user->name = 'Administrater';
        $user->email = 'nititpong@dss.go.th';
        $user->password = bcrypt('ntp@2531');
        $user->role = 3;
        $user->status = 1;
        $user->save();
    }
}
