<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog List</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 20px;
            line-height: 1.6;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        .add-blog-btn {
            display: inline-block;
            background-color: #70ba72;
            color: white;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 8px;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }

        .add-blog-btn:hover {
            background-color: #45a049;
            transform: translateY(-2px);
        }

        .blog-card {
            background-color: #a7d7a988;
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
            padding: 25px;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }

        .blog-image {
            width: 100%;
            height: 300px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .blog-content-wrapper {
            flex-grow: 1;
        }   

        .blog-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
        }

        .blog-title {
            color: #2c3e50;
            margin-top: 0;
            margin-bottom: 15px;
        }

        .blog-content {
            color: #34495e;
            margin-bottom: 15px;
        }

        .blog-text {
            color: #34495e;
            margin-bottom: 15px;
        }

        .blog-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #7f8c8d;
        }

        .blog-actions {
            display: flex;
            gap: 10px;
        }

        .btn {
            padding: 8px 16px;
            text-decoration: none;
            border-radius: 6px;
            transition: all 0.3s ease;
        }

        .btn-edit {
            background-color: #65d493;
            color: white;
        }

        .btn-delete {
            background-color: #df2f1f;
            color: white;
        }

        .btn:hover {
            opacity: 0.8;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="/tambah" class="add-blog-btn">Tambah Blog Baru</a>

        @foreach($blogs as $blog)
        <div class="blog-card">
            @if($blog->foto)
                <img src="{{ asset('storage/' . $blog->foto) }}" alt="{{ $blog->judul }}" class="blog-image">
            @endif

            <div class="blog-content-wrapper">
            <h2 class="blog-title">{{ $blog->judul }}</h2>
            <p class="blog-content">{{ Str::limit($blog->isi, 700) }}</p>
            
            <div class="blog-meta">
                <span>Penulis: {{ $blog->pembuat }} | {{ $blog->created_at->diffForHumans() }}</span>
                <div class="blog-actions">
                    <a href="/edit/{{ $blog->id }}" class="btn btn-edit">Edit</a>
                    <form action="/delete/{{ $blog->id }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button 
                            type="submit" 
                            class="btn btn-delete" 
                            onclick="return confirm('Apakah Anda yakin ingin menghapus blog ini?')"
                        >
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
        @endforeach
    </div>
</body>
</html>