<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([UsersTableSeeder::class]);
        $this->call([RolesTableSeeder::class]);
        $this->call([BloodTypeTableSeeder::class]);
        $this->call([EnlistmentTypeTableSeeder::class]);
        $this->call([RankTableSeeder::class]);
        $this->call([ReligionTableSeeder::class]);
        $this->call([EthnicGroupTableSeeder::class]);
        $this->call([UnitTableSeeder::class]);
        $this->call(CoursesTableSeeder::class);
        $this->call([ClassTableSeeder::class]);
        $this->call([CompanyTableSeeder::class]);
        $this->call(PersonnelCategoryTableSeeder::class);
        $this->call(ModuleTableSeeder::class);
        $this->call(SubjectTableSeeder::class);
        $this->call(SubModuleTableSeeder::class);
        $this->call(StudentsTableSeeder::class);
        $this->call(ActivitiesTableSeeder::class);
    }
}
