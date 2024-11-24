<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Blog</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: rgba(119, 189, 146, 0.455);
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

        .form-title {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        .form-input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            transition: border-color 0.3s ease;
        }

        .form-input:focus {
            outline: none;
            border-color: #4CAF50;
        }

        .btn-submit {
            width: 100%;
            padding: 12px;
            background-color: #70ba72;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-submit:hover {
            background-color: #45a049;
        }

        .error-list {
            background-color: #ffdddd;
            border: 1px solid #ff0000;
            color: #ff0000;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 15px;
        }

        .error-list ul {
            margin: 0;
            padding-left: 20px;
        }
        .file-label {
            display: block;
            width: 100%;
            padding: 10px;
            border: 2px dashed #ddd;
            text-align: center;
            cursor: pointer;
            transition: border-color 0.3s ease;
        }

        .file-label:hover {
            border-color: #4CAF50;
        }

        .file-name {
            margin-top: 10px;
            text-align: center;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="form-title">Tambah Blog Baru</h1>

        @if ($errors->any())
            <div class="error-list">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/tambah" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="judul" class="form-label">Judul</label>
                <input 
                    type="text" 
                    name="judul" 
                    class="form-input" 
                    value="{{ old('judul') }}"
                    placeholder="Masukkan judul blog"
                    required
                >
            </div>
            <div class="form-group">
                <label for="isi" class="form-label">Isi Blog</label>
                <textarea 
                    name="isi" 
                    class="form-input" 
                    rows="4"
                    placeholder="Tulis isi blog Anda"
                    required
                >{{ old('isi') }}</textarea>
            </div>
            <div class="form-group">
                <label for="pembuat" class="form-label">Nama Penulis</label>
                <input 
                    type="text" 
                    name="pembuat" 
                    class="form-input" 
                    value="{{ old('pembuat', $blog->pembuat ?? '') }}"
                    placeholder="Masukkan nama Anda"
                    required
                >
            </div>
            <div class="form-group">
                <label for="foto" class="form-label">Foto Blog</label>
                <input 
                    type="file" 
                    name="foto" 
                    id="foto" 
                    class="file-input" 
                    accept="image/*"
                    onchange="updateFileName(this)"
                >
                <label for="foto" class="file-label">
                    Pilih Foto
                </label>
                <div id="file-name" class="file-name"></div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn-submit">Tambah Blog</button>
            </div>
        </form>
    </div>
</body>
</html>