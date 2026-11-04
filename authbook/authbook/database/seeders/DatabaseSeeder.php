<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Buat User dengan berbagai role
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]
        );

        User::updateOrCreate(
            ['email' => 'staff@example.com'],
            [
                'name' => 'Staff User',
                'password' => Hash::make('password'),
                'role' => 'staff',
            ]
        );

        User::updateOrCreate(
            ['email' => 'viewer@example.com'],
            [
                'name' => 'Viewer User',
                'password' => Hash::make('password'),
                'role' => 'viewer',
            ]
        );

        // Buat Categories
        $categories = collect(['Fiction', 'Technology', 'Science', 'History', 'Programming'])->map(function ($name) {
            return Category::create([
                'name' => $name,
                'slug' => str($name)->slug(),
            ]);
        });

        // Buat Authors
        $authors = Author::factory(10)->create();

        // Buat Books beserta relasi category & description
        Book::factory(50)->create([
            'author_id' => fn() => $authors->random()->id,
        ])->each(function ($book) use ($categories) {
            $book->categories()->attach(
                $categories->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}