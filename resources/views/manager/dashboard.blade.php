<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager Dashboard - TechStore</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f3f4f6; margin: 0; padding: 20px; }
        .container { max-width: 1200px; margin: 0 auto; }
        .header { display: flex; justify-content: space-between; align-items: center; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); margin-bottom: 20px; }
        .card { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); margin-bottom: 20px; }
        h1, h2 { margin-top: 0; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #e5e7eb; }
        .btn { padding: 6px 12px; background: #3b82f6; color: white; border: none; border-radius: 4px; cursor: pointer; text-decoration: none; font-size: 14px; }
        .btn-danger { background: #ef4444; }
        .btn-success { background: #10b981; }
        .product-img { width: 50px; height: 50px; object-fit: cover; border-radius: 4px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div>
                <h1>Kênh Người Bán (Manager)</h1>
                <p style="margin:0; color:#6b7280;">Gian hàng: <strong>{{ $store ? $store->name : 'Chưa đăng ký' }}</strong></p>
            </div>
            <div>
                <span>Xin chào, {{ Auth::user()->name }}</span>
                <form method="POST" action="/logout" style="display:inline; margin-left:10px;">
                    @csrf
                    <button type="submit" class="btn btn-danger">Đăng xuất</button>
                </form>
            </div>
        </div>

        @if(session('success'))
            <div style="background-color: #d1fae5; color: #065f46; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
                {{ session('success') }}
            </div>
        @endif

        @if(!$store)
            <div class="card" style="text-align: center; padding: 50px;">
                <h2>Bạn chưa có gian hàng nào!</h2>
                <p>Vui lòng đăng ký mở gian hàng để bắt đầu bán sản phẩm.</p>
                <button class="btn btn-success" style="font-size:16px; padding: 10px 20px;">Đăng ký mở Gian Hàng Ngay</button>
            </div>
        @elseif($store->status === 'pending')
            <div class="card" style="text-align: center; padding: 50px; background-color: #fef3c7;">
                <h2>Gian hàng của bạn đang chờ Admin duyệt!</h2>
                <p>Vui lòng kiên nhẫn. Bạn sẽ có thể đăng sản phẩm sau khi được phê duyệt.</p>
            </div>
        @elseif($store->status === 'approved')
            <div class="card">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                    <h2>Sản phẩm của bạn</h2>
                    <a href="{{ route('products.create') }}" class="btn btn-success">+ Thêm Sản Phẩm Mới</a>
                </div>
                
                <table>
                    <thead>
                        <tr>
                            <th>Hình ảnh</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá bán</th>
                            <th>Lượt đánh giá</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($store->products as $p)
                        <tr>
                            <td><img src="{{ $p->image }}" class="product-img" alt="Ảnh"></td>
                            <td>{{ $p->name }}</td>
                            <td>{{ number_format($p->price, 0, ',', '.') }}đ</td>
                            <td>{{ $p->rating }} sao ({{ $p->reviews }} nhận xét)</td>
                            <td>
                                <a href="{{ route('products.edit', $p->id) }}" class="btn">Sửa</a>
                                <form action="{{ route('products.destroy', $p->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Bạn có chắc muốn xóa sản phẩm này?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Xóa</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" style="text-align:center; padding:20px;">Chưa có sản phẩm nào.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</body>
</html>
