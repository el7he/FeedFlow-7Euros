<?php
namespace App\Actions\Organization;

use App\DTOs\OrganizationDTO;
use App\DTOs\OrganizationMemberDTO;
use App\DTOs\AddUserDTO;
use Illuminate\Support\Facades\DB;
use App\Models\OrganizationUser;

final class AddUserInOrganization
{
    public function __construct() {}

    /**
     * Store an organization
     * @param OrganizationMemberDTO $dto
     * @return OrganizationMemberDTO
     * @throws \Throwable
     */
    public function handle(AddUserDTO $dto): OrganizationUser
    {
        return DB::transaction(function () use ($dto) {
            return OrganizationUser::create([
                'organization_id'   => $dto->organizationId,
                'user_id'           => $dto->userId,
                'role'              => 'member',
            ]);
        });
    }
}
