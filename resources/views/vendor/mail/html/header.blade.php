<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'Laravel')
            <img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo">
            @else

            <img src="{{config('app.url')}}/img/email_logo.png" class="" alt="{{ $slot }}">
            @endif
        </a>
    </td>
</tr>