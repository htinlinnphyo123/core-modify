<?php
namespace BasicDashboard\Web\Users\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserEditResource extends JsonResource
{
    public function toArray($request): array
    {
        $profilePhoto = $this->profile_photo ?: "/Default/default_profile_pic.jpg";
        return [
            "id"                => customEncoder($this->id),
            "name"              => $this->name,
            "email"             => $this->email,
            "status"            => $this->status,
            "country_id"        => $this->country_id,
            "role_id"           => $this->roles->value("id"),
            'name_other'        => $this->name_other,
            'phone'             => $this->phone,
            'id_number'         => $this->id_number,
            'date_of_birth'     => $this->date_of_birth,
            'father_name'       => $this->father_name,
            'father_name_other' => $this->father_name_other,
            'gender'            => $this->gender,
            'martial_status'    => $this->martial_status,
            'occupation'        => $this->occupation,
            'profile_photo'     => retrievePublicFile($profilePhoto),
            'education_status'  => $this->education_status,
            'level'             => $this->level,
        ];
    }
}
