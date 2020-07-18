@extends('emails.base')

@section('content')
    @component('emails.components.row')
    <p>Dear,
    </p><br>
    <p>Notification Information below:</p>
    @endcomponent

    @component('emails.components.autoflow')
    @slot('title')
        Caption
    @endslot
    {{ $data['caption'] ?? '' }}
    @endcomponent

    @component('emails.components.autoflow')
    @slot('title')
        Subject
    @endslot
    {{ $data['subject'] ?? '' }}
    @endcomponent

    @component('emails.components.autoflow')
    @slot('title')
        Message
    @endslot
    {{ $data['message'] ?? '' }}
    @endcomponent
@stop
