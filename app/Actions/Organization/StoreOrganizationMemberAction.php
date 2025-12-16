<?php
namespace App\Actions\Organization;

use App\DTOs\OrganizationDTO;
use App\DTOs\OrganizationMemberDTO;
use Illuminate\Support\Facades\DB;

final class StoreOrganizationMemberAction
{
    public function __construct() {}

    /**
     * Store an organization
     * @param OrganizationMemberDTO $dto
     * @return array
     * @throws \Throwable
     */
    public function handle(OrganizationMemberDTO $dto): array
    {
        return DB::transaction(function () use ($dto) {
        });
    }
}
