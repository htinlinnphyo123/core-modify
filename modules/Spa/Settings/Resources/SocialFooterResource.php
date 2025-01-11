<?php

namespace BasicDashboard\Spa\Settings\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 *
 * A SubcategoryResource is implement for sending data with requirements of desire template.
 * Generated By Custom Artisan Cmd
 * @author Nay Ba la
 * https://github.com/naybala
 * https://naybala.netlify.app/
 *
 */

class SocialFooterResource extends JsonResource
{
    public function toArray($request): array
    {
        $icons = [
            'Facebook' => [
                'icon' => 'pi pi-facebook',
                'color' => '#1877F2' // Official Facebook blue
            ],
            'Youtube' => [
                'icon' => 'pi pi-youtube',
                'color' => '#FF0000' // Official YouTube red
            ],
            'Twitter' => [
                'icon' => 'pi pi-twitter',
                'color' => '#1DA1F2' // Official Twitter blue
            ],
            'Pinterest' => [
                'icon' => 'pi pi-pinterest',
                'color' => '#E60023' // Official Pinterest red
            ],
            'Tiktok' => [
                'icon' => 'pi pi-tiktok',
                'color' => '#000000' // Official TikTok black
            ],
            'Telegram' => [
                'icon' => 'pi pi-telegram',
                'color' => '#0088CC' // Official Telegram blue
            ],
        ];

        return [
            "key" => $this->key,
            "value" => $this->value,
            "icon" => $icons[$this->key]['icon'] ?? 'pi pi-globe',
            "color" => $icons[$this->key]['color'] ?? '#6C757D', // Default color (grey) for unknown keys
        ];
    }
}
