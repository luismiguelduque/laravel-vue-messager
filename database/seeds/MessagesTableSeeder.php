<?php

use Illuminate\Database\Seeder;
use App\Message;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Message::create([
            'sender_id' => 1,
            'recipent_id' => 2,
            'message' => 'mensaje de prueba'
        ]);

        Message::create([
            'sender_id' => 2,
            'recipent_id' => 1,
            'message' => 'mensaje de prueba 2'
        ]);

        Message::create([
            'sender_id' => 1,
            'recipent_id' => 3,
            'message' => 'mensaje de prueba 3'
        ]);

        Message::create([
            'sender_id' => 3,
            'recipent_id' => 1,
            'message' => 'respuesta tres'
        ]);

        Message::create([
            'sender_id' => 1,
            'recipent_id' => 4,
            'message' => 'mensaje de prueba cuatro'
        ]);

        Message::create([
            'sender_id' => 4,
            'recipent_id' => 1,
            'message' => 'mensaje testing cuatro'
        ]);
    }
}
