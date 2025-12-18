<?php

namespace App\DTOs;

use Illuminate\Http\Request;

final class AddUserDTO
{
    private function __construct(
        public readonly string $organizationId,
        public readonly int $userId,
    ) {}

    public static function fromRequest(Request $request): self
    {
        // On prepare les données depuis la requête pour qu'elles soient utilisées dans 

        return new self(
            organizationId: session('current_organization_id'),
            userId: $request->input('id'),
        );
    }
}
