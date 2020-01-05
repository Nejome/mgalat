<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Setting;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            'name' => 'سوبر ادمن',
            'email' => 'admin@admin.com',
            'password' => Hash::make('123'),
        ]);

        DB::table('roles')->insert([
            'name' => 'superAdmin',
            'guard_name' => 'web'
        ]);

        DB::table('model_has_roles')->insert([
            'role_id' => 1,
            'model_type' => 'App\User',
            'model_id' => 1
        ]);

        DB::table('permissions')->insert([
            [
                'name' => 'قبول رفض وتعطيل اعلان مزودي الخدمات',
                'guard_name' => 'web'
            ],
            [
                'name' => 'عرض بيانات وتحديد مواقع مزودي الخدمات',
                'guard_name' => 'web'
            ],
            [
                'name' => 'الدعم الفني',
                'guard_name' => 'web'
            ],
            [
                'name' => 'ادارة الدول والاقسام والتخصصات',
                'guard_name' => 'web'
            ],
            [
                'name' => 'ادارة المدونة',
                'guard_name' => 'web'
            ],
        ]);

        DB::table('settings')->insert([
            'title' => '{
                "ar":"مجالات تك",
                "en":"Mgalat Tech"
            }'

        ]);

    }
}
