<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Phone Number') }}</div>
                <div class="card-body">
                    @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{session('error')}}
                    </div>
                    @endif
                    Please enter the OTP sent to your number: {{session('phone')}}

                    <form action="{{route('verify')}}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label for="verification_code"
                                class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>
                            <div class="col-md-6">
                                <input type="hidden" name="phone" value="{{session('phone')}}">
                                <input type="hidden" name="code" value="{{session('code')}}">
                                <input type="hidden" name="data" value="{{session('data')}}">
                                <input id="verification_code" type="tel"
                                    class="form-control @error('verification_code') is-invalid @enderror"
                                    name="verification_code" value="{{ old('verification_code') }}" required>
                                @error('verification_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" id="verify" class="btn btn-secondary">
                                    Verify Button
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</x-auth-card>
</x-guest-layout>

