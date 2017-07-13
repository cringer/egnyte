@component('mail::message')
# New Hire Announcement

{{ $newhireName }} is a new {{ $newhirePosition }} starting on {{ $newhireStartDate }}.

Thanks,

{{ $hrName }}  
{{ $hrPosition }}  
Office: {{$hrNumber }}
@endcomponent
