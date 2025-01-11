<?php

namespace BasicDashboard\Spa\Articles\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 *
 * A ArticleResource is implement for sending data with requirements of desire template.
 * Generated By Custom Artisan Cmd
 * @author Nay Ba la
 * https://github.com/naybala
 * https://naybala.netlify.app/
 *
 */

class HomeArticleResource extends JsonResource
{
    public function toArray($request): array
    {
        $this['thumbnail'] ??= '/Default/default_article_pic.jpg';

        return [
            "id" => customEncoder($this->id, 10003),
            "title" => $this->title,
            "title_other" => $this->title_other,
            "thumbnail" => retrievePublicFile($this->thumbnail),
            "type" => $this->type,
            "category_id" => $this->category ? customEncoder($this->category->id) : '',
            "subcategory_id" => $this->subcategory->id ? customEncoder($this->subcategory->id) : '',
            "category_name" => $this->category?->name,
            "subcategory_name" => $this->subcategory?->name,
            "category_name_other" => $this->category?->name_other,
            "subcategory_name_other" => $this->subcategory?->name_other,
            "date" => $this->date ? Carbon::parse($this->date)->diffForHumans() : null,
            "written_by" => $this->written_by != null ? $this->writtenBy->name : "Anonymous",
        ];
    }
}
