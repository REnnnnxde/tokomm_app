<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User; // Pastikan ini untuk model User

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Daftar permission yang akan dibuat
        $permissions = [
            'manage statistics',
            'manage products',
            'manage principles',
            'manage testimonials',
            'manage clients',
            'manage teams',
            'manage abouts',
            'manage appointments',
            'manage hero sections',
        ];

        // Buat semua permissions
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Role Admin
        $superAdminRole = Role::firstOrCreate(['name' => 'super_admin']);
        
        // Role Manager
        $designManagerRole = Role::firstOrCreate(['name' => 'design_manager']);

        // Assign permission ke design manager role
        $designManagerRole->givePermissionTo([
            'manage products',
            'manage principles',
            'manage testimonials',
        ]);

        // Buat user untuk diassign role
        $user = User::firstOrCreate([
            'name' => 'SuperAdmin',
            'email' => 'super@admin.com',
            'password' => bcrypt('password'), // Enkripsi password
        ]);

        // Assign role ke user
        $user->assignRole($superAdminRole);
    }
}