@component('mail::message')
# Introduction

The body of your message.

Name: {{ $data['name'] }}

Email: {{ $data['email'] }}

Message: {{ $data['message'] }}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
