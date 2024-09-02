<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\People;

class UniqueNumber implements Rule
{
    protected $excludeId;

    public function __construct($excludeId = null)
    {
        $this->excludeId = $excludeId;
    }

    public function passes($attribute, $value)
    {
        // Check if the title is unique, excluding a specific ID (useful for updates)
        return !People::where('employee_number', $value)
            ->when($this->excludeId, function ($query) {
                $query->where('id', '!=', $this->excludeId);
            })
            ->exists();
    }

    public function message()
    {
        return 'Employee number has already been taken.';
    }
}
