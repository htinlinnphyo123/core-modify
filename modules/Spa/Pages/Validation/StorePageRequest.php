<?php

namespace BasicDashboard\Spa\Pages\Validation;

use Illuminate\Foundation\Http\FormRequest;

/**
 *
 * A StorePageRequest is responsible validation of while storing.
 * Generated By Custom Artisan Cmd
 * @author Nay Ba la
 * https://github.com/naybala
 * https://naybala.netlify.app/
 *
 */

class StorePageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "name"=>"required",
        ];
    }
}
