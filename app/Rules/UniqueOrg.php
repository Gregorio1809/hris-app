<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Organization;

class UniqueOrg implements Rule
{
    protected $excludeId;

    public function __construct($excludeId = null)
    {
        $this->excludeId = $excludeId;
    }

    public function passes($attribute, $value)
    {
        // Check if the title is unique, excluding a specific ID (useful for updates)
        return !Organization::where('organization_code', $value)
            ->when($this->excludeId, function ($query) {
                $query->where('id', '!=', $this->excludeId);
            })
            ->exists();
    }

    public function message()
    {
        return 'Organization code has already been taken.';
    }
}
