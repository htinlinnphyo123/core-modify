<?php

namespace BasicDashboard\Web\Audits\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 *
 * A AuditResource is implement for sending data with requirements of desire template.
 * Generated By Custom Artisan Cmd
 * @author Nay Ba la
 * https://github.com/naybala
 * https://naybala.netlify.app/
 *
 */

class AuditResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            "id" => customEncoder($this->id),
            "model" => $this->model,
            "event" => $this->event,
            "old_data" => $this->old_data,
            "new_data" => $this->new_data,
            "created_by" => $this->user->name,
            "created_at" => $this->created_at,
        ];
    }
}
