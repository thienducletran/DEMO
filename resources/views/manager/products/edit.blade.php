<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Sản Phẩm - TechStore</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f3f4f6; margin: 0; padding: 20px; color: #1f2937; }
        .container { max-width: 800px; margin: 0 auto; }
        .card { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); }
        h1 { margin-top: 0; font-size: 1.5rem; border-bottom: 1px solid #e5e7eb; padding-bottom: 15px; margin-bottom: 25px; }
        .form-group { margin-bottom: 20px; }
        label { display: block; font-weight: 500; margin-bottom: 8px; }
        input[type="text"], input[type="number"], select {
            width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 4px; box-sizing: border-box; font-family: inherit; font-size: 14px;
        }
        input[type="text"]:focus, input[type="number"]:focus, select:focus {
            outline: none; border-color: #3b82f6; ring: 2px;
        }
        .btn { padding: 10px 20px; background: #3b82f6; color: white; border: none; border-radius: 4px; cursor: pointer; text-decoration: none; font-size: 14px; font-weight: 500; }
        .btn-secondary { background: #6b7280; margin-right: 10px; }
        .flex { display: flex; align-items: center; }
        .gap-4 { gap: 1rem; }
        .w-1-2 { width: 50%; }
        .text-red { color: #ef4444; font-size: 12px; margin-top: 5px; display: block; }
        .img-preview { width: 100px; height: 100px; object-fit: cover; margin-top: 10px; border-radius: 4px; border: 1px solid #e5e7eb; }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <h1>Sửa Sản Phẩm: {{ $product->name }}</h1>
            
            <form action="{{ route('manager.products.update', $product->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="name">Tên sản phẩm *</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" required>
                    @error('name') <span class="text-red">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="category_id">Danh mục *</label>
                    <select id="category_id" name="category_id" required>
                        <option value="">-- Chọn danh mục --</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id') <span class="text-red">{{ $message }}</span> @enderror
                </div>

                <div class="flex gap-4 form-group">
                    <div class="w-1-2">
                        <label for="price">Giá bán (VNĐ) *</label>
                        <input type="number" id="price" name="price" value="{{ old('price', $product->price) }}" required min="0">
                        @error('price') <span class="text-red">{{ $message }}</span> @enderror
                    </div>
                    <div class="w-1-2">
                        <label for="old_price">Giá gốc (VNĐ) - Tùy chọn</label>
                        <input type="number" id="old_price" name="old_price" value="{{ old('old_price', $product->old_price) }}" min="0">
                        @error('old_price') <span class="text-red">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="image">Đường dẫn ảnh (URL) *</label>
                    <input type="text" id="image" name="image" value="{{ old('image', $product->image) }}" required>
                    @error('image') <span class="text-red">{{ $message }}</span> @enderror
                    
                    @if($product->image)
                        <img src="{{ $product->image }}" class="img-preview" alt="Preview">
                    @endif
                </div>

                <div style="margin-top: 30px;">
                    <a href="{{ route('manager.dashboard') }}" class="btn btn-secondary">Hủy bỏ</a>
                    <button type="submit" class="btn">Lưu Cập Nhật</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
