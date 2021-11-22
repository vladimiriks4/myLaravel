<div id="my-alert" class="alert alert-{{ $type ?? 'danger' }} alert-dismissible fade show" role="alert">

    @isset($title)
        <h4 class="alert-heading">{{ $title }}</h4>
    @endisset
    {{ $slot }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

{{--@if (session('success'))--}}
{{--    <div id="my-alert" class="alert alert-success alert-dismissible fade show" role="alert">--}}
{{--        <strong>Успешный успех</strong> {{ session('success') }}--}}
{{--        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>--}}
{{--    </div>--}}
{{--@endif--}}