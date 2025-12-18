<?php
namespace App\Actions\Organization;

use App\DTOs\OrganizationDTO;
use Illuminate\Support\Facades\DB;
use App\Models\Organization;

final class StoreOrganizationAction
{
    public function __construct() {}

    /**
     * Store an organization
     * @param OrganizationDTO $dto
     * @return array
     */
    public function handle(OrganizationDTO $dto): Organization
    {
        return DB::transaction(function () use ($dto) {
            return Organization::create([
                'name'    => $dto->name,
                'user_id' => $dto->userId,
            ]);
        });
    }
}
