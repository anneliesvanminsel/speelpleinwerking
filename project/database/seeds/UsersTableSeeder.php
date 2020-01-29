<?php

	use App\User;
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
        //
		$user = new User(
			[
				'email' => 'hoofdleiding@speelplein.be',
				'password' => \Illuminate\Support\Facades\Hash::make("speelplein"),
				'role' => 'admin',
			]
		);
		$user->save();
    }
}
