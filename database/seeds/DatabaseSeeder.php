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
        $user->name = 'Administrator';
        $user->email = 'nititpong@dss.go.th';
        $user->password = bcrypt('12345678');
        $user->role = 3;
        $user->status = 1;
        $user->save();

        $user2 = new User;
        $user2->name = 'Somnuek Jumee';
        $user2->email = 'jsomnuek@dss.go.th';
        $user2->password = bcrypt('12345678');
        $user2->role = 3;
        $user2->status = 1;
        $user2->save();

        $user3 = new User;
        $user3->name = 'Sub Suanduang';
        $user3->email = 'sub@dss.go.th';
        $user3->password = bcrypt('13345678');
        $user3->role = 2;
        $user3->status = 1;
        $user3->save();
        
    }
}
