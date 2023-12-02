<x-app-layout>
    <div class="max-w-7xl mx-auto flex my-3">
        <div class="w-3/12 mx-auto sm:px-6">
            @include("dashboard.Sidebar")
        </div>
        <div class="w-9/12">
            @yield("content")
        </div>
    </div>
    @push('scripts')
        <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
        <script>
            ClassicEditor
                .create( document.querySelector( '#editor' ) )
                .catch( error => {
                    console.error( error );
                } );
        </script>
    @endpush
</x-app-layout>
