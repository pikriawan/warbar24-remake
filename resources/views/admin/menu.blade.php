@push('styles')
    @vite('resources/css/admin-menu.css')
@endpush
@push('scripts')
    <script>
        const preview = document.getElementById("preview");
        const imageInput = document.getElementById("imageInput");

        imageInput.addEventListener("input", (event) => {
            const file = event.currentTarget.files[0];
            preview.src = URL.createObjectURL(file);

            preview.addEventListener("load", () => {
                URL.revokeObjectURL(preview.src);
            });
        });

        async function fetchImage() {
            try {
                const response = await fetch("{{ asset('storage/' . $menu->image) }}");

                if (!response.ok) {
                    throw new Error("Image fetch failed");
                }

                const blob = await response.blob();

                preview.src = URL.createObjectURL(blob);

                preview.addEventListener("load", () => {
                    URL.revokeObjectURL(preview.src);
                });

                const fileName = "{{ basename($menu->image) }}";
                const file = new File([blob], fileName, { type: blob.type });

                const dataTransfer = new DataTransfer();
                dataTransfer.items.add(file);
                imageInput.files = dataTransfer.files;
            } catch (error) {
                console.error('Error loading image:', error);
            }
        }

        @isset($menu->image)
            fetchImage();
        @endisset

        const deleteImageButton = document.getElementById("deleteImageButton");

        deleteImageButton.addEventListener("click", () => {
            preview.src = "/images/menu-no-image.png";
            imageInput.value = "";
        });
    </script>
@endpush
<x-admin-layout>
    <div class="menu-edit-container">
        <div class="menu-edit-header">
            <a class="back-link" href="/admin/menus">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-left-icon lucide-chevron-left"><path d="m15 18-6-6 6-6"/></svg>
            </a>
            <h1 class="menu-edit-title">Edit Menu</h1>
        </div>
        <div class="menu-forms">
            <form class="menu-edit-form" id="menuEditForm" action="/admin/menu/{{ $menu->id }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-field">
                    <label class="label" for="name">Nama menu</label>
                    <input class="text-field" name="name" id="name" value="{{ $menu->name }}" required>
                </div>
                <div class="form-field">
                    <img class="preview" id="preview" src="{{ $menu->image === null ? '/images/menu-no-image.png' : asset('storage/' . $menu->image) }}" alt="{{ $menu->name }}" width="200" height="200">
                    <div class="button-group">
                        <label class="button button-primary" for="imageInput">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-upload-icon lucide-upload"><path d="M12 3v12"/><path d="m17 8-5-5-5 5"/><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/></svg>
                            Upload gambar
                        </label>
                        <input class="image-input" type="file" name="image" id="imageInput" accept="image/jpeg, image/png">
                        <button class="button button-outlined" id="deleteImageButton" type="button">Hapus gambar</button>
                    </div>
                </div>
                <div class="form-field">
                    <label class="label" for="price">Harga</label>
                    <input class="text-field" type="number" name="price" id="price" value="{{ $menu->price }}" placeholder="10000" required>
                </div>
                <div class="form-field">
                    <label class="label" for="category">Kategori</label>
                    <input class="text-field" name="category" id="category" value="{{ $menu->category }}" placeholder="makanan">
                </div>
                <div class="form-field">
                    <span class="label">Tersedia?</span>
                    <div class="radio-item">
                        <input class="radio-input" type="radio" name="is_available" id="available" value="true" checked required>
                        <label for="available">Ya</label>
                    </div>
                    <div class="radio-item">
                        <input class="radio-input" type="radio" name="is_available" id="unavailable" value="false" required>
                        <label for="unavailable">Tidak</label>
                    </div>
                </div>
            </form>
            <form class="menu-delete-form" id="menuDeleteForm" action="/admin/menu/{{ $menu->id }}" method="post">
                @csrf
                @method('delete')
            </form>
            <div class="button-group">
                <a class="button button-outlined" href="/admin/menus">Batal</a>
                <button class="button button-danger" form="menuDeleteForm">Hapus menu</button>
                <button class="button button-primary" form="menuEditForm">Simpan perubahan</button>
            </div>
            @if ($errors->any())
                <div class="errors">
                    @foreach ($errors->all() as $error)
                        <p class="error-text">{{ $error }}</p>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-admin-layout>
