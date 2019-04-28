@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Ссылка для восстановления пароля была отправлена на вашу почту.') }}
                        </div>
                    @endif

                    {{ __('Прежде чем продолжить, проверьте почту на наличие ссылки.') }}
                    {{ __('Если вы не получили письмо') }}, <a href="{{ route('verification.resend') }}">{{ __('нажмите сюда, чтобы отправить еще одно') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
