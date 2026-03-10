<div class="fixed top-4 right-4 z-50 flex flex-col gap-3 w-full max-w-sm">
    @if(session('success'))
    <div class="alert alert-toast">
        <x-lucide-check class="w-5 h-5" />

        <div>
            <h2>Success</h2>
            <section>{{ session('success') }}</section>
        </div>
    </div>
    @endif

    @if(session('error'))
    <div class="alert-destructive alert-toast">
        <x-lucide-circle-alert class="w-5 h-5" />

        <div>
            <h2>Error</h2>
            <section>{{ session('error') }}</section>
        </div>
    </div>
    @endif

    @if($errors->any())
        @foreach ($errors->all() as $error)
        <div class="alert-destructive alert-toast">
            <x-lucide-circle-alert class="w-5 h-5" />

            <div>
                <h2>Validation Error</h2>
                <section>{{ $error }}</section>
            </div>
        </div>
        @endforeach
    @endif

</div>