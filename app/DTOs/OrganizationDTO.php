<?php

namespace App\DTOs;

use Illuminate\Http\Request;

final class OrganizationDTO
{
    private function __construct(
        public readonly string $name,
        public readonly int $userId,
    ) {}

    public static function fromRequest(Request $request): self
    {
        // On prepare les données depuis la requête pour qu'elles soient utilisées dans 

        return new self(
            name: $request->input('name'),
            userId: auth()->id(),
        );
    }
}
