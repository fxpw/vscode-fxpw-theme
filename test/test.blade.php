@extends('profile.layouts.main')

@section('content')
    <div class="row mb-5">
        <div class="col-md-auto">
            <label class="form-label">Реферальный код</label>
            <form action="{{ route('profile.edit.refferalCode') }}" method="POST" class="d-flex input-group">
                @csrf
                <input data-click-select="value" class="form-control text-mono" type="text"
                    value="{{ $item->display('meta.code', '—') }}" name="reffer_code">
                <button type="submit" class="btn btn-secondary">
                    <i class="fas fa-pen-square"></i>
                </button>
            </form>
        </div>

        <div class="col-md">
            <label class="form-label">Реферальная ссылка</label>
            <div class="input-group">
                <input id="referralLink" data-click-select="value" class="form-control text-mono" type="text"
                    readonly value="{{ $item->display('meta.referrer_url', '—') }}">
                <button class="btn copy-button" id="copyButtonId"
                    onclick="copyToClipboard('{{ $item->display('meta.referrer_url', '—') }}')">
                    <span class="copy_button-text">Копировать ссылку</span>
                </button>
            </div>
        </div>
        <div class="col-12 small text-muted fst-italic">
            Нажмите на поле, чтобы выделить текст для дальнейшего копирования
        </div>
        <div class="d-flex justify-content-end">
            <a href="{{ $item->display('meta.referrer_url', '—') }}" class="btn btn-orange w-auto">Перейти по ссылке</a>
        </div>
    </div>

    @if ($referrer)
        <div class="mb-5">
            <h2>Реферер</h2>
            <div>
                <div>{{ $referrer->display('name') }}</div>
            </div>
        </div>
    @endif

    <h2>Рефералы</h2>
    @if ($referrals->isNotEmpty())
        <div id="referrals" class="referral-items">
            @foreach ($referrals as $referral)
                @include('profile.referrals.referral-item', ['item' => $referral])
            @endforeach
        </div>
        {!! tPage::paginationOffice($referrals) !!}
    @else
        @include('inc.empty')
    @endif

    <script>
        function copyToClipboard(link) {
            navigator.clipboard.writeText(link).then(function () {
                var button = document.getElementById("copyButtonId");

                button.textContent = "Ссылка скопирована";
                button.classList.add("copied");
                setTimeout(function () {
                    button.textContent = "Копировать ссылку";
                    button.classList.remove("copied");
                }, 2000);
            }).catch(function (err) {
                console.error('Ошибка при копировании ссылки: ', err);
            });
        }
    </script>

    @vite('resources/js/profile/referrals.js')
@endsection