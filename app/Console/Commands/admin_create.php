<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use App\User;

class create_admin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Создание пользователя-администратора';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }


    public function readline($prompt = null){
        if($prompt){
            echo $prompt;
        }
        $fp = fopen("php://stdin","r");
        $line = rtrim(fgets($fp, 1024));
        return $line;
    }


    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = $this->readline("Логин: \n");
        $pass = $this->readline("Пароль: \n");
        $phone = "00";
        $email = $this->readline("Email: \n");
        User::create([
            'name' => $name,
            'role' => json_encode(array('admin')),
            'email' => $email,
            'phone' => $phone,
            'password' => Hash::make($pass),
        ]);
        echo("Был создан администратор: $name");
    }
}

