<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | താഴെ കാണുന്ന ഭാഷാ വരികൾ സാധാരണ വാലിഡേഷൻ പിശക് സന്ദേശങ്ങൾക്കാണ്.
    | ചില റൂളുകൾക്ക് ഒന്നിലധികം പതിപ്പുകൾ ഉണ്ട്, ഉദാഹരണത്തിന് സൈസ് റൂളുകൾ.
    | നിങ്ങളുടെ ആപ്ലിക്കേഷനുമായി കൂടുതൽ അനുയോജ്യമായ രീതിയിൽ ഇവ മാറ്റാം.
    |
    */

    'accepted' => ':attribute ഫീൽഡ് അംഗീകരിക്കണം.',
    'accepted_if' => ':other :value ആണെങ്കിൽ :attribute ഫീൽഡ് അംഗീകരിക്കണം.',
    'active_url' => ':attribute ഫീൽഡ് സാധുവായ URL ആയിരിക്കണം.',
    'after' => ':attribute ഫീൽഡ് :date-നു ശേഷം ഒരു തീയതിയായിരിക്കണം.',
    'after_or_equal' => ':attribute ഫീൽഡ് :date-നു ശേഷം അല്ലെങ്കിൽ തുല്യമായ തീയതിയായിരിക്കണം.',
    'alpha' => ':attribute ഫീൽഡിൽ അക്ഷരങ്ങൾ മാത്രം അനുവദനീയമാണ്.',
    'alpha_dash' => ':attribute ഫീൽഡിൽ അക്ഷരങ്ങൾ, അക്കങ്ങൾ, ഡാഷുകൾ, അണ്ടർസ്കോറുകൾ മാത്രം അനുവദനീയമാണ്.',
    'alpha_num' => ':attribute ഫീൽഡിൽ അക്ഷരങ്ങളും അക്കങ്ങളും മാത്രം അനുവദനീയമാണ്.',
    'array' => ':attribute ഫീൽഡ് ഒരു അറേ ആയിരിക്കണം.',
    'ascii' => ':attribute ഫീൽഡിൽ സിംഗിൾ-ബൈറ്റ് അക്ഷരങ്ങളും ചിഹ്നങ്ങളും മാത്രം അനുവദനീയമാണ്.',
    'before' => ':attribute ഫീൽഡ് :date-നു മുമ്പുള്ള ഒരു തീയതിയായിരിക്കണം.',
    'before_or_equal' => ':attribute ഫീൽഡ് :date-നു മുമ്പ് അല്ലെങ്കിൽ തുല്യമായ തീയതിയായിരിക്കണം.',
    'between' => [
        'array' => ':attribute ഫീൽഡിൽ :min മുതൽ :max വരെ ഇനങ്ങൾ ഉണ്ടായിരിക്കണം.',
        'file' => ':attribute ഫീൽഡ് :min മുതൽ :max കിലോബൈറ്റുകൾ വരെ ആയിരിക്കണം.',
        'numeric' => ':attribute ഫീൽഡ് :min മുതൽ :max വരെ ആയിരിക്കണം.',
        'string' => ':attribute ഫീൽഡിൽ :min മുതൽ :max അക്ഷരങ്ങൾ ഉണ്ടായിരിക്കണം.',
    ],
    'boolean' => ':attribute ഫീൽഡ് ശരി അല്ലെങ്കിൽ തെറ്റ് ആയിരിക്കണം.',
    'confirmed' => ':attribute ഫീൽഡ് സ്ഥിരീകരണം പൊരുത്തപ്പെടുന്നില്ല.',
    'current_password' => 'പാസ്‌വേഡ് തെറ്റാണ്.',
    'date' => ':attribute ഫീൽഡ് സാധുവായ തീയതിയായിരിക്കണം.',
    'date_equals' => ':attribute ഫീൽഡ് :date-നു തുല്യമായ തീയതിയായിരിക്കണം.',
    'date_format' => ':attribute ഫീൽഡ് :format ഫോർമാറ്റുമായി പൊരുത്തപ്പെടണം.',
    'decimal' => ':attribute ഫീൽഡിൽ :decimal ഡെസിമൽ സ്ഥാനങ്ങൾ ഉണ്ടായിരിക്കണം.',
    'declined' => ':attribute ഫീൽഡ് നിരസിക്കണം.',
    'declined_if' => ':other :value ആണെങ്കിൽ :attribute ഫീൽഡ് നിരസിക്കണം.',
    'different' => ':attribute ഫീൽഡും :other-ഉം വ്യത്യസ്തമായിരിക്കണം.',
    'digits' => ':attribute ഫീൽഡിൽ :digits അക്കങ്ങൾ ഉണ്ടായിരിക്കണം.',
    'digits_between' => ':attribute ഫീൽഡിൽ :min മുതൽ :max അക്കങ്ങൾ വരെ ഉണ്ടായിരിക്കണം.',
    'dimensions' => ':attribute ഫീൽഡിന് അസാധുവായ ഇമേജ് അളവുകളുണ്ട്.',
    'distinct' => ':attribute ഫീൽഡിൽ ഡുപ്ലിക്കേറ്റ് മൂല്യമാണ്.',
    'doesnt_end_with' => ':attribute ഫീൽഡ് താഴെ പറയുന്നവയിൽ ഒന്നും കൊണ്ട് അവസാനിക്കരുത്: :values.',
    'doesnt_start_with' => ':attribute ഫീൽഡ് താഴെ പറയുന്നവയിൽ ഒന്നും കൊണ്ട് ആരംഭിക്കരുത്: :values.',
    'email' => ':attribute ഫീൽഡ് സാധുവായ ഇമെയിൽ വിലാസമായിരിക്കണം.',
    'ends_with' => ':attribute ഫീൽഡ് താഴെ പറയുന്നവയിൽ ഒന്നിൽ അവസാനിക്കണം: :values.',
    'enum' => 'തിരഞ്ഞെടുത്ത :attribute അസാധുവാണ്.',
    'exists' => 'തിരഞ്ഞെടുത്ത :attribute അസാധുവാണ്.',
    'file' => ':attribute ഫീൽഡ് ഒരു ഫയൽ ആയിരിക്കണം.',
    'filled' => ':attribute ഫീൽഡിൽ മൂല്യം ഉണ്ടായിരിക്കണം.',
    'gt' => [
        'array' => ':attribute ഫീൽഡിൽ :value-ൽ കൂടുതൽ ഇനങ്ങൾ ഉണ്ടായിരിക്കണം.',
        'file' => ':attribute ഫീൽഡ് :value കിലോബൈറ്റുകളിൽ കൂടുതൽ ആയിരിക്കണം.',
        'numeric' => ':attribute ഫീൽഡ് :value-ൽ കൂടുതൽ ആയിരിക്കണം.',
        'string' => ':attribute ഫീൽഡ് :value അക്ഷരങ്ങളിൽ കൂടുതൽ ആയിരിക്കണം.',
    ],
    'gte' => [
        'array' => ':attribute ഫീൽഡിൽ :value ഇനങ്ങൾ അല്ലെങ്കിൽ കൂടുതൽ ഉണ്ടായിരിക്കണം.',
        'file' => ':attribute ഫീൽഡ് :value കിലോബൈറ്റുകൾ അല്ലെങ്കിൽ കൂടുതൽ ആയിരിക്കണം.',
        'numeric' => ':attribute ഫീൽഡ് :value അല്ലെങ്കിൽ കൂടുതൽ ആയിരിക്കണം.',
        'string' => ':attribute ഫീൽഡ് :value അക്ഷരങ്ങൾ അല്ലെങ്കിൽ കൂടുതൽ ആയിരിക്കണം.',
    ],
    'image' => ':attribute ഫീൽഡ് ഒരു ഇമേജ് ആയിരിക്കണം.',
    'in' => 'തിരഞ്ഞെടുത്ത :attribute അസാധുവാണ്.',
    'in_array' => ':attribute ഫീൽഡ് :other-ൽ ഉണ്ടായിരിക്കണം.',
    'integer' => ':attribute ഫീൽഡ് ഒരു പൂർണ്ണസംഖ്യ ആയിരിക്കണം.',
    'ip' => ':attribute ഫീൽഡ് സാധുവായ IP വിലാസമായിരിക്കണം.',
    'ipv4' => ':attribute ഫീൽഡ് സാധുവായ IPv4 വിലാസമായിരിക്കണം.',
    'ipv6' => ':attribute ഫീൽഡ് സാധുവായ IPv6 വിലാസമായിരിക്കണം.',
    'json' => ':attribute ഫീൽഡ് സാധുവായ JSON സ്ട്രിംഗായിരിക്കണം.',
    'lowercase' => ':attribute ഫീൽഡ് ചെറിയ അക്ഷരങ്ങളായിരിക്കണം.',
    'lt' => [
        'array' => ':attribute ഫീൽഡിൽ :value-ൽ കുറവ് ഇനങ്ങൾ ഉണ്ടായിരിക്കണം.',
        'file' => ':attribute ഫീൽഡ് :value കിലോബൈറ്റുകളിൽ കുറവ് ആയിരിക്കണം.',
        'numeric' => ':attribute ഫീൽഡ് :value-ൽ കുറവ് ആയിരിക്കണം.',
        'string' => ':attribute ഫീൽഡ് :value അക്ഷരങ്ങളിൽ കുറവ് ആയിരിക്കണം.',
    ],
    'lte' => [
        'array' => ':attribute ഫീൽഡിൽ :value-ൽ കൂടുതൽ ഇനങ്ങൾ ഉണ്ടായിരിക്കരുത്.',
        'file' => ':attribute ഫീൽഡ് :value കിലോബൈറ്റുകൾ അല്ലെങ്കിൽ കുറവ് ആയിരിക്കണം.',
        'numeric' => ':attribute ഫീൽഡ് :value അല്ലെങ്കിൽ കുറവ് ആയിരിക്കണം.',
        'string' => ':attribute ഫീൽഡ് :value അക്ഷരങ്ങൾ അല്ലെങ്കിൽ കുറവ് ആയിരിക്കണം.',
    ],
    'mac_address' => ':attribute ഫീൽഡ് സാധുവായ MAC വിലാസമായിരിക്കണം.',
    'max' => [
        'array' => ':attribute ഫീൽഡിൽ :max-ൽ കൂടുതൽ ഇനങ്ങൾ ഉണ്ടായിരിക്കരുത്.',
        'file' => ':attribute ഫീൽഡ് :max കിലോബൈറ്റുകളിൽ കൂടുതൽ ആയിരിക്കരുത്.',
        'numeric' => ':attribute ഫീൽഡ് :max-ൽ കൂടുതൽ ആയിരിക്കരുത്.',
        'string' => ':attribute ഫീൽഡ് :max അക്ഷരങ്ങളിൽ കൂടുതൽ ആയിരിക്കരുത്.',
    ],
    'max_digits' => ':attribute ഫീൽഡിൽ :max-ൽ കൂടുതൽ അക്കങ്ങൾ ഉണ്ടായിരിക്കരുത്.',
    'mimes' => ':attribute ഫീൽഡ് ഈ തരത്തിലുള്ള ഫയൽ ആയിരിക്കണം: :values.',
    'mimetypes' => ':attribute ഫീൽഡ് ഈ തരത്തിലുള്ള ഫയൽ ആയിരിക്കണം: :values.',
    'min' => [
        'array' => ':attribute ഫീൽഡിൽ കുറഞ്ഞത് :min ഇനങ്ങൾ ഉണ്ടായിരിക്കണം.',
        'file' => ':attribute ഫീൽഡ് കുറഞ്ഞത് :min കിലോബൈറ്റുകൾ ആയിരിക്കണം.',
        'numeric' => ':attribute ഫീൽഡ് കുറഞ്ഞത് :min ആയിരിക്കണം.',
        'string' => ':attribute ഫീൽഡ് കുറഞ്ഞത് :min അക്ഷരങ്ങൾ ആയിരിക്കണം.',
    ],
    'min_digits' => ':attribute ഫീൽഡിൽ കുറഞ്ഞത് :min അക്കങ്ങൾ ഉണ്ടായിരിക്കണം.',
    'missing' => ':attribute ഫീൽഡ് കാണപ്പെടരുത്.',
    'missing_if' => ':other :value ആണെങ്കിൽ :attribute ഫീൽഡ് കാണപ്പെടരുത്.',
    'missing_unless' => ':other :value അല്ലെങ്കിൽ :attribute ഫീൽഡ് കാണപ്പെടരുത്.',
    'missing_with' => ':values നിലവിലുണ്ടെങ്കിൽ :attribute ഫീൽഡ് കാണപ്പെടരുത്.',
    'missing_with_all' => ':values നിലവിലുണ്ടെങ്കിൽ :attribute ഫീൽഡ് കാണപ്പെടരുത്.',
    'multiple_of' => ':attribute ഫീൽഡ് :value-ന്റെ ഗുണിതമായിരിക്കണം.',
    'not_in' => 'തിരഞ്ഞെടുത്ത :attribute അസാധുവാണ്.',
    'not_regex' => ':attribute ഫീൽഡ് ഫോർമാറ്റ് അസാധുവാണ്.',
    'numeric' => ':attribute ഫീൽഡ് ഒരു സംഖ്യ ആയിരിക്കണം.',
    'password' => [
        'letters' => ':attribute ഫീൽഡിൽ കുറഞ്ഞത് ഒരു അക്ഷരം ഉണ്ടായിരിക്കണം.',
        'mixed' => ':attribute ഫീൽഡിൽ കുറഞ്ഞത് ഒരു വലിയ അക്ഷരവും ഒരു ചെറിയ അക്ഷരവും ഉണ്ടായിരിക്കണം.',
        'numbers' => ':attribute ഫീൽഡിൽ കുറഞ്ഞത് ഒരു സംഖ്യ ഉണ്ടായിരിക്കണം.',
        'symbols' => ':attribute ഫീൽഡിൽ കുറഞ്ഞത് ഒരു ചിഹ്നം ഉണ്ടായിരിക്കണം.',
        'uncompromised' => 'നൽകിയ :attribute ഒരു ഡാറ്റ ലീക്കിൽ കണ്ടെത്തിയിട്ടുണ്ട്. ദയവായി മറ്റൊരു :attribute തിരഞ്ഞെടുക്കുക.',
    ],
    'present' => ':attribute ഫീൽഡ് നിലവിലുണ്ടായിരിക്കണം.',
    'prohibited' => ':attribute ഫീൽഡ് നിരോധിച്ചിരിക്കുന്നു.',
    'prohibited_if' => ':other :value ആണെങ്കിൽ :attribute ഫീൽഡ് നിരോധിച്ചിരിക്കുന്നു.',
    'prohibited_unless' => ':other :values-ൽ ഇല്ലെങ്കിൽ :attribute ഫീൽഡ് നിരോധിച്ചിരിക്കുന്നു.',
    'prohibits' => ':attribute ഫീൽഡ് :other നിലവിലുണ്ടാകുന്നത് തടയുന്നു.',
    'regex' => ':attribute ഫീൽഡ് ഫോർമാറ്റ് അസാധുവാണ്.',
    'required' => ':attribute ഫീൽഡ് ആവശ്യമാണ്.',
    'required_array_keys' => ':attribute ഫീൽഡിൽ ഈ എൻട്രികൾ ഉണ്ടായിരിക്കണം: :values.',
    'required_if' => ':other :value ആണെങ്കിൽ :attribute ഫീൽഡ് ആവശ്യമാണ്.',
    'required_if_accepted' => ':other അംഗീകരിച്ചാൽ :attribute ഫീൽഡ് ആവശ്യമാണ്.',
    'required_unless' => ':other :values-ൽ ഇല്ലെങ്കിൽ :attribute ഫീൽഡ് ആവശ്യമാണ്.',
    'required_with' => ':values നിലവിലുണ്ടെങ്കിൽ :attribute ഫീൽഡ് ആവശ്യമാണ്.',
    'required_with_all' => ':values നിലവിലുണ്ടെങ്കിൽ :attribute ഫീൽഡ് ആവശ്യമാണ്.',
    'required_without' => ':values നിലവിലില്ലെങ്കിൽ :attribute ഫീൽഡ് ആവശ്യമാണ്.',
    'required_without_all' => ':values ഒന്നും നിലവിലില്ലെങ്കിൽ :attribute ഫീൽഡ് ആവശ്യമാണ്.',
    'same' => ':attribute ഫീൽഡ് :other-നുമായി പൊരുത്തപ്പെടണം.',
    'size' => [
        'array' => ':attribute ഫീൽഡിൽ :size ഇനങ്ങൾ ഉണ്ടായിരിക്കണം.',
        'file' => ':attribute ഫീൽഡ് :size കിലോബൈറ്റുകൾ ആയിരിക്കണം.',
        'numeric' => ':attribute ഫീൽഡ് :size ആയിരിക്കണം.',
        'string' => ':attribute ഫീൽഡ് :size അക്ഷരങ്ങൾ ആയിരിക്കണം.',
    ],
    'starts_with' => ':attribute ഫീൽഡ് താഴെ പറയുന്നവയിൽ ഒന്നിൽ ആരംഭിക്കണം: :values.',
    'string' => ':attribute ഫീൽഡ് ഒരു സ്ട്രിംഗ് ആയിരിക്കണം.',
    'timezone' => ':attribute ഫീൽഡ് സാധുവായ ടൈംസോൺ ആയിരിക്കണം.',
    'unique' => ':attribute ഇതിനകം ഉപയോഗത്തിലാണ്.',
    'uploaded' => ':attribute അപ്‌ലോഡ് ചെയ്യുന്നതിൽ പരാജയപ്പെട്ടു.',
    'uppercase' => ':attribute ഫീൽഡ് വലിയ അക്ഷരങ്ങളായിരിക്കണം.',
    'url' => ':attribute ഫീൽഡ് സാധുവായ URL ആയിരിക്കണം.',
    'ulid' => ':attribute ഫീൽഡ് സാധുവായ ULID ആയിരിക്കണം.',
    'uuid' => ':attribute ഫീൽഡ് സാധുവായ UUID ആയിരിക്കണം.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | ഇവിടെ നിങ്ങൾക്ക് പ്രത്യേക വാലിഡേഷൻ സന്ദേശങ്ങൾ നിർവചിക്കാം.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | താഴെ കാണുന്ന വരികൾ attribute placeholder-നെ കൂടുതൽ വായനാസൗഹൃദമാക്കാൻ ഉപയോഗിക്കുന്നു.
    |
    */

    'attributes' => [],

];
?>
