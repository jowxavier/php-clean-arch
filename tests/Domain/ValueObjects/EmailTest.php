<?php

use App\CleanArch\Domain\ValueObjects\Email;

$email = new Email('jonathanxribeiro@gmail.com');
it("shouldn't returns 'Email is not valid'", fn() => expect($email)->not->toBe('Email is not valid'));
