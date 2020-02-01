<?php

use App\Domain\User\Entities\Profile;
use App\Domain\User\Entities\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::firstOrCreate([
            'name' => 'Enver Menadjiev',
            'email' => 'enver1323@gmail.com',
            'password' => bcrypt('cderfv34'),
            'role' => User::ROLE_EXHIBITOR,
        ]);

        $user->profile()->create([
            'company' => 'NSoft',
            'phone' => '998903268403',
            'country_code' => 'UZ',
            'position' => 'Programmer',
            'gender' => Profile::GENDER_MALE
        ]);
    }
}
