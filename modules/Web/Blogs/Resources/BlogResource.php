<?php

namespace BasicDashboard\Web\Blogs\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 *
 * A BlogResource is implement for sending data with requirements of desire template.
 * Generated By Custom Artisan Cmd
 * @author Nay Ba la
 * https://github.com/naybala
 * https://naybala.netlify.app/
 *
 */

class BlogResource extends JsonResource
{
    public function toArray($request):array
    {
         return [
            "id" =>customEncoder($this->id),
            "name"=>$this->name,
            "description"=>$this->description,
        ];
    }
}
