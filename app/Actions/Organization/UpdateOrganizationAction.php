<?php
namespace App\Actions\Organization;

use App\DTOs\OrganizationDTO;
use Illuminate\Support\Facades\DB;
use App\Models\Organization;

final class UpdateOrganizationAction
{
    public function __construct() {}

    /**
     * Update an organization
     * @param OrganizationDTO $dto
     * @return array
     */
    public function handle(OrganizationDTO $dto): Organization
    {
        return DB::transaction(function () use ($dto) {

            $organization = null;

            foreach (auth()->user()->organizations as $org) {
                if ($org->id === session('current_organization_id')) {
                    $organization = $org;
                }
            }

            $organization->update(['name' => $dto->name]);
            return $organization;
        });
    }
}