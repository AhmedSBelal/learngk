<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class EnrollCreated
{
    use Dispatchable, SerializesModels;

    public $name;
    public $email;
    public $phone;
    public $course;
    public $id;

    public function __construct($name, $email, $phone, $course, $id)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->course = $course;
        $this->id = $id;
    }
}
