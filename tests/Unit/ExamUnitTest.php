<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Actions\Fortify\PasswordValidationRules;
use Laravel\Fortify\Rules\Password;
use Illuminate\Validation\ValidationRuleParser;

class ExamUnitTest extends TestCase
{   
    /**
     * Implemented Unit Test
     */

    //Unit Testing of the PasswordValidationRules
    public function testPasswordRules()
    {
        //Uses the PasswordValidationRules trait
        $class = new class {
            use PasswordValidationRules;
        };

        //Call the passwordRules method to get the validation rules
        $passwordRules = $class->passwordRules();

        $this->assertIsArray($passwordRules);
        $this->assertContains('required', $passwordRules);
        $this->assertContains('string', $passwordRules);
        $this->assertContains(new Password, $passwordRules);
        $this->assertContains('confirmed', $passwordRules);
    }
}