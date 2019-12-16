@section('title') تسجيل الدخول @endsection

@component('auth.components.auth')
    @slot('form')
        <form class="card" action="{{route('login')}}" method="post">
            @csrf
            <div class="card-body p-6">
                <div class="card-title">تسجيل الدخول لحسابك</div>
                <div class="form-group">
                    <label class="form-label">البريد الالكترونى</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" aria-describedby="emailHelp">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">
                        كلمة المرور
                        @if (Route::has('password.request'))
                            <a href="{{route('password.request')}}" class="float-right small">نسيت كلمة المرور؟</a>
                        @endif
                    </label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="custom-control custom-checkbox">
                        <input type="checkbox" name="remember" class="custom-control-input" />
                        <span class="custom-control-label">تذكرنى</span>
                    </label>
                </div>
                <div class="form-footer">
                    <button type="submit" class="btn btn-primary btn-block">دخول</button>
                </div>
            </div>
        </form>
    @endslot
@endcomponent
