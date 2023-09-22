<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = [RoleEnum::ADMIN, RoleEnum::PENGGUNA];

        foreach($role as $roleUser){
            if($roleUser === RoleEnum::ADMIN){
                $this->createUser('Admin', 'admin@gmail.com', 'admin123', $roleUser);
            }

            if($roleUser === RoleEnum::PENGGUNA){
                $user = $this->createUser('pengguna', 'pengguna@gmail.com', 'pengguna123', $roleUser);

                $user->userDetail()->create([
                    'user_id' => $user->id,
                    'ktp' => '1224034303',
                    'kk' => '1312837198'
                ]);
            }
        }
    }

    public function createUser($name, $email, $password, $role)
    {
        return User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'email_verified_at' => now(),
            'role' => $role,
        ]);
    }
}
