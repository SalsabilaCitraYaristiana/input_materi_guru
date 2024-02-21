
<form action="{{ route('materi-guru') }}" method="POST">
    @csrf
    <label for="guru">Guru:</label>
    <select name="guru" id="guru">
        @foreach($gurus as $guru)
            <option value="{{ $guru->id }}">{{ $guru->nama }}</option>
        @endforeach
    </select>

    <label for="mapel">Mapel:</label>
    <input type="text" name="mapel" id="mapel">

    <label for="judul">Judul:</label>
    <input type="text" name="judul" id="judul">

    <label for="deskripsi">Deskripsi:</label>
    <textarea name="deskripsi" id="deskripsi"></textarea>

    <label for="tahun">Tahun:</label>
    <input type="number" name="tahun" id="tahun" min="2000" max="{{ date('Y') + 1 }}">

    <button type="submit">Simpan</button>
</form>

<!-- Menampilkan Data Materi Guru -->
@foreach($materiGurus as $materiGuru)
    <p>{{ $materiGuru->judul }} - Tahun {{ $materiGuru->tahun }} - Semester {{ $materiGuru->semester }}</p>
@endforeach
