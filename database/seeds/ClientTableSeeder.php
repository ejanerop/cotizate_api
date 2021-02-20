<?php

use Cotizate\Client;
use Cotizate\Payment;
use Illuminate\Database\Seeder;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i=0; $i < 20; $i++) {
            $ip = $i +1;
            $client = new Client();
            $client->nick = 'Juan' . $i;
            $client->account = 'Juan' . $i . '.Perez';
            $client->active_account = true;
            $client->ip_address = '10.66.67.'. $ip;
            $client->save();
            for ($j=0; $j < 12; $j++){
                $payment = new Payment();
                $payment->month = $j+1;
                $payment->year = 2021;
                $payment->cant = 0;
                $payment->client()->associate($client);
                $payment->save();
            }
        }

    }
}
