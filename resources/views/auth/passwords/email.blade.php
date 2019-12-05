@component('auth.components.auth')
    @slot('form')
        <div class="card">
            <div class="card-header">إعادة تعيين كلمة المرور</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="form-group">
                        <label class="form-label">ادخل بريدك الالكترونى</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" aria-describedby="emailHelp">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mb-0">
                        <button type="submit" class="btn btn-primary">
                           ارسال رابط إعادة تعيين كلمة المرور
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endslot
@endcomponent
