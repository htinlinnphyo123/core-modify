<div class="py-2">
    <x-form.label title="form_helper.phone_number" :required="true"/>
    <div class="w-full flex items-center">
        <div class="relative">
            <button id="phone-dropdown-toggle" type="button" class="border rounded-l-md pe-10 p-2 border-gray-300 flex items-center dark:bg-white cursor-pointer">
                <img id="selected-flag" src="{{ $selectedCountry->flag }}" alt="Country" class="w-6 h-4 mr-2">
                <span id="selected-prefix">{{ $selectedCountry->country_code }}</span>
                <i class="fa-solid fa-caret-down ps-4"></i>
            </button>
            <div id="phone-dropdown-menu" class="hidden absolute z-10 mt-2 w-48 bg-white border rounded-lg shadow-lg">
                <ul class="py-1">
                    @foreach ($countries as $country)
                        <li class="flex items-center px-4 py-2 cursor-pointer hover:bg-gray-100" onclick="selectCountry('{{ $country->flag }}', '{{ $country->country_code }}')">
                            <img src="{{ $country->flag }}" alt="{{ $country->country_name }}" class="w-6 h-4 mr-2">
                            {{ $country->country_code }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <!-- Hidden input to store the selected country code -->
        <input type="hidden" name="phone_number_prefix" id="phone_number_prefix" value="+1">
        <input type="tel" name="phone_number" id="phone-number" class="block w-full" mt-2" value="{{old('phone_number')}}" placeholder="Enter phone number">
    </div>
    <x-form.error field="phone_number" />
</div>