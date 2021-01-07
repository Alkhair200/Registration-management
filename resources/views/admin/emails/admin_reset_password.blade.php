@component('mail::message')
# Reset Acount
Welcome {{ $data['data']->name}}<br>

@component('mail::button', ['url' => route('reset-password',$data['token'])])
Click Here To Reset Your Password
@endcomponent
Or <br>
copy this link
 <a href="{{route('reset-password',$data['token'])}}">{{route('reset-password',$data['token'])}}</a>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
