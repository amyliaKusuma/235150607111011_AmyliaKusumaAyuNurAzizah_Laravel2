<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Blog</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
            box-sizing: border-box;
        }

        .edit-container {
            background-color: rgba(119, 189, 146, 0.455);
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(119, 189, 146, 0.455);
            width: 100%;
            max-width: 500px;
            padding: 40px;
            animation: fadeIn 0.5s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .form-title {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
            font-size: 24px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            color: #34495e;
            font-weight: 600;
        }

        .form-input {
            width: 100%;
            padding: 12px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .form-input:focus {
            border-color: #70ba72;
            outline: none;
            box-shadow: 0 0 0 3px rgba(52,152,219,0.2);
        }

        .btn-update {
            width: 100%;
            padding: 14px;
            background-color: #70ba72;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-update:hover {
            background-color: #4CAF50;
            transform: translateY(-2px);
        }

        .error-list {
            background-color: #ffebee;
            border: 1px solid #ff5252;
            color: #d32f2f;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
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
    <div class="edit-container">
        <h1 class="form-title">EDIT BLOG POST</h1>

        @if ($errors->any())
            <div class="error-list">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/update/{{ $blog->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label class="form-label">Judul Blog</label>
                <input 
                    type="text" 
                    name="judul" 
                    class="form-input" 
                    value="{{ $blog->judul }}"
                    required
                >
            </div>
            <div class="form-group">
                <label class="form-label">Isi Blog</label>
                <textarea 
                    name="isi" 
                    class="form-input" 
                    rows="5"
                    required
                >{{ $blog->isi }}</textarea>
            </div>
            <div class="form-group">
                <label class="form-label">Nama Penulis</label>
                <input 
                    type="text" 
                    name="pembuat" 
                    class="form-input" 
                    value="{{ $blog->pembuat }}"
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
            <button type="submit" class="btn-update">Update Blog</button>
        </form>
    </div>
</body>
</html>