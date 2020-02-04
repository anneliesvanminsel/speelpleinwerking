<?php

	use App\User;
	use App\Admin;
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
				'account_type' => 'App\Admin',
				'account_id' => '1',
			]
		);
		$user->save();

		$admin = new Admin(
			[
				'name' => 'Peeters',
				'first_name' => 'Jan',
				'birthday' => '2000-01-01',
				'phone_nr' => '0475 689 345',
				'introtext' => 'Pie marshmallow sesame snaps candy canes carrot cake bonbon. 
								Caramels chocolate muffin cheesecake icing. Powder croissant jelly-o pastry.',
				'extrainfo' => 'Pie marshmallow sesame snaps candy canes carrot cake bonbon.',
				'isVeggie' => 1,
				'hasAllergies' => 1,
				'allergies' => 'noten',
				'isActive' => 1,
				'user_id' => 1,
			]
		);
		$admin->save();
    }
}
