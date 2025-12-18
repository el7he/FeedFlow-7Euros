<?php
namespace App\Actions\Organization;

use App\Models\Organization; // Il manquait ça ! C'est vital 🙂
use Illuminate\Support\Facades\DB;

final class DeleteOrganizationAction
{
    public function __construct() {}

    /**
     * Delete an organization
     * On prend l'objet directement, on ne joue pas aux devinettes avec le nom.
     * * @param Organization $organization
     * @return bool|null
     */
    public function handle(Organization $organization): ?bool
    {
        return DB::transaction(function () use ($organization) {
            // "Aujourd'hui c'est samedi et on ne travaille pas"
            // Mais cette ligne travaille : elle supprime l'objet pour de bon 🗑️
            return $organization->delete();
        });
    }
}