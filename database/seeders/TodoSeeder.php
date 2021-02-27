<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Todo;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $todo = new Todo();
      $todo->title = "Create CRUD";
      $todo->description = "Make all crud Functionality for project";
      $todo->user_id = 2;
      $todo->event_id = 11;
      $todo->status = "ongoing";
      $todo->save();

      $todo = new Todo();
      $todo->title = "Add Profile Photos";
      $todo->description = "create image column in db and apply it to user profiles";
      $todo->user_id = 2;
      $todo->event_id = 11;
      $todo->status = "ongoing";
      $todo->save();

      $todo = new Todo();
      $todo->title = "Update CSS";
      $todo->description = "Apply new styling tags to the home page";
      $todo->user_id = 2;
      $todo->event_id = 11;
      $todo->status = "ongoing";
      $todo->save();

      $todo = new Todo();
      $todo->title = "Create Factories";
      $todo->description = "Create factories and fill database with sample data";
      $todo->user_id = 2;
      $todo->event_id = 11;
      $todo->status = "ongoing";
      $todo->save();
    }
}
