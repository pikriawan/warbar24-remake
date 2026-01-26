@push('styles')
    @vite('resources/css/admin-menu-create.css')
@endpush
@push('scripts')
    <script>
        const preview = document.getElementById("preview");
        const image = document.getElementById("image");

        image.addEventListener("input", (event) => {
            const file = event.currentTarget.files[0];
            preview.src = URL.createObjectURL(file);
        });
    </script>
@endpush
<x-admin-layout>
    <h1>Buat menu baru</h1>
    <form action="/admin/menu/create" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="name">Nama menu</label>
            <input name="name" id="name" required>
        </div>
        <div>
            <img class="preview" id="preview" src="/images/menu-no-image.png" alt="" width="128" height="128">
            <br>
            <label for="image">Gambar</label>
            <input type="file" name="image" id="image" accept="image/jpeg, image/png">
        </div>
        <div>
            <label for="price">Harga</label>
            <input type="number" name="price" id="price" required>
        </div>
        <div>
            <label for="category">Kategori</label>
            <input name="category" id="category">
        </div>
        <div>
            <span>Tersedia?</span>
            <br>
            <input type="radio" name="is_available" id="available" value="true" checked required>
            <label for="available">Ya</label>
            <br>
            <input type="radio" name="is_available" id="unavailable" value="false" required>
            <label for="unavailable">Tidak</label>
        </div>
        <div>
            <a href="/admin/menus">Batal</a>
            <button>Buat menu baru</button>
        </div>
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </form>
</x-admin-layout>
