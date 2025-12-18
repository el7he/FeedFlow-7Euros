<?php

namespace App\DTOs;

use Illuminate\Http\Request;
use App\Models\Organization;

final class OrganizationMemberDTO
{
    public function __construct(
        public readonly int $organization_id,
    ) {}

    public static function fromRequest(Request $request): self
    {
        return new self(
            organization_id: (int) $request->id,
        );
    }
}
