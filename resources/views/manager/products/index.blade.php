<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Sản phẩm - Kênh Người Bán</title>
    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #F97316;
            --primary-light: #FFEDD5;
            --success: #10B981;
            --success-bg: #D1FAE5;
            --danger: #EF4444;
            --danger-bg: #FEE2E2;
            --warning: #F59E0B;
            --warning-bg: #FEF3C7;
            --gray-50: #F9FAFB;
            --gray-100: #F3F4F6;
            --gray-200: #E5E7EB;
            --gray-300: #D1D5DB;
            --gray-400: #9CA3AF;
            --gray-500: #6B7280;
            --gray-700: #374151;
            --gray-800: #1F2937;
            --gray-900: #111827;
            --sidebar-w: 260px;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Inter', sans-serif; background-color: var(--gray-50); color: var(--gray-800); display: flex; height: 100vh; overflow: hidden; }

        /* Sidebar */
        .sidebar { width: var(--sidebar-w); background: white; border-right: 1px solid var(--gray-200); display: flex; flex-direction: column; z-index: 10; }
        .logo { padding: 20px 24px; display: flex; align-items: center; gap: 12px; font-size: 20px; font-weight: 800; color: var(--primary); border-bottom: 1px solid var(--gray-100); letter-spacing: -0.5px;}
        .logo-icon { width: 32px; height: 32px; background: var(--primary); color: white; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 16px; }
        
        .nav-menu { padding: 20px 12px; flex: 1; overflow-y: auto; }
        .nav-label { font-size: 11px; text-transform: uppercase; color: var(--gray-400); font-weight: 600; letter-spacing: 0.5px; margin: 16px 0 8px 12px; }
        .nav-item { display: flex; align-items: center; gap: 12px; padding: 12px 16px; color: var(--gray-500); text-decoration: none; border-radius: 8px; margin-bottom: 4px; font-weight: 500; transition: all 0.2s; }
        .nav-item:hover { background: var(--gray-50); color: var(--primary); }
        .nav-item.active { background: var(--primary-light); color: var(--primary); }
        .nav-item i { width: 20px; text-align: center; font-size: 18px; }

        /* Main Content */
        .main-content { flex: 1; display: flex; flex-direction: column; overflow: hidden; }
        
        /* Topbar */
        .topbar { height: 72px; background: white; border-bottom: 1px solid var(--gray-200); display: flex; align-items: center; justify-content: space-between; padding: 0 32px; z-index: 5; }
        .search-bar { display: flex; align-items: center; background: var(--gray-100); border-radius: 20px; padding: 10px 20px; width: 360px; transition: all 0.2s; border: 1px solid transparent; }
        .search-bar:focus-within { background: white; border-color: var(--primary); box-shadow: 0 0 0 4px var(--primary-light); }
        .search-bar i { color: var(--gray-400); margin-right: 12px; font-size: 14px; }
        .search-bar input { border: none; background: transparent; outline: none; width: 100%; color: var(--gray-700); font-family: 'Inter', sans-serif; font-size: 14px; }
        
        .topbar-right { display: flex; align-items: center; gap: 24px; }
        .icon-btn { position: relative; color: var(--gray-500); cursor: pointer; transition: color 0.2s; font-size: 20px; }
        .icon-btn:hover { color: var(--primary); }
        .user-profile { display: flex; align-items: center; gap: 12px; cursor: pointer; padding-left: 24px; border-left: 1px solid var(--gray-200); }
        .avatar { width: 40px; height: 40px; border-radius: 50%; background: var(--primary-light); color: var(--primary); display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 16px; border: 2px solid white; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .user-info { display: flex; flex-direction: column; }
        .user-name { font-size: 14px; font-weight: 600; color: var(--gray-800); }
        .user-role { font-size: 12px; color: var(--gray-500); }

        /* Dashboard Content */
        .content-scroll { flex: 1; overflow-y: auto; padding: 32px; }
        .page-header { margin-bottom: 32px; display: flex; justify-content: space-between; align-items: flex-end; }
        .page-title { font-size: 28px; font-weight: 800; color: var(--gray-900); margin-bottom: 4px; letter-spacing: -0.5px; }
        .btn { padding: 10px 16px; background: var(--primary); color: white; border: none; border-radius: 8px; cursor: pointer; text-decoration: none; font-size: 14px; font-weight: 600; display: inline-flex; align-items: center; gap: 8px; transition: all 0.2s; }
        .btn:hover { background: #EA580C; }

        /* Tables */
        .card { background: white; border-radius: 16px; border: 1px solid var(--gray-200); box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05); overflow: hidden; }
        .card-header { padding: 24px; border-bottom: 1px solid var(--gray-200); display: flex; justify-content: space-between; align-items: center; }
        .card-title { font-size: 18px; font-weight: 700; color: var(--gray-900); }
        .table-container { overflow-x: auto; width: 100%; }
        table { width: 100%; border-collapse: collapse; white-space: nowrap; }
        th { padding: 16px 24px; text-align: left; font-size: 12px; font-weight: 600; color: var(--gray-500); text-transform: uppercase; letter-spacing: 0.05em; border-bottom: 1px solid var(--gray-200); background: var(--gray-50); }
        td { padding: 16px 24px; vertical-align: middle; border-bottom: 1px solid var(--gray-100); font-size: 14px; color: var(--gray-700); font-weight: 500;}
        tr:last-child td { border-bottom: none; }
        tr:hover td { background: var(--gray-50); }

        .product-img { width: 48px; height: 48px; object-fit: cover; border-radius: 8px; border: 1px solid var(--gray-200); }
        .product-name-cell { display: flex; align-items: center; gap: 12px; }
        
        .badge { display: inline-flex; align-items: center; padding: 4px 10px; border-radius: 20px; font-size: 12px; font-weight: 600; }
        .badge.active { background: var(--success-bg); color: var(--success); }
        
        .btn-action { padding: 8px; border-radius: 8px; border: 1px solid var(--gray-200); background: white; color: var(--gray-600); cursor: pointer; transition: all 0.2s; text-decoration: none; display: inline-flex; }
        .btn-action:hover { background: var(--gray-100); color: var(--gray-900); }
        .btn-danger-outline { color: var(--danger); border-color: transparent; }
        .btn-danger-outline:hover { background: var(--danger-bg); color: var(--danger); }
        .flex-actions { display: flex; gap: 8px; }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="logo">
            <div class="logo-icon">S</div>
            Kênh Người Bán
        </div>
        <nav class="nav-menu">
            <div class="nav-label">Quản lý hoạt động</div>
            <a href="{{ route('manager.dashboard') }}" class="nav-item">
                <i class="fa-solid fa-chart-pie"></i>
                Tổng quan
            </a>
            <a href="{{ route('manager.store') }}" class="nav-item">
                <i class="fa-solid fa-store"></i>
                Gian hàng
            </a>
            <a href="{{ route('manager.products.index') }}" class="nav-item active">
                <i class="fa-solid fa-boxes-stacked"></i>
                Sản phẩm
            </a>
            <a href="{{ route('manager.orders') }}" class="nav-item">
                <i class="fa-solid fa-clipboard-list"></i>
                Đơn hàng
            </a>
            <a href="{{ route('manager.inventory') }}" class="nav-item">
                <i class="fa-solid fa-warehouse"></i>
                Kho hàng
            </a>
            
            <div class="nav-label">Tài chính & Phát triển</div>
            <a href="{{ route('manager.revenue') }}" class="nav-item">
                <i class="fa-solid fa-wallet"></i>
                Doanh thu
            </a>
            <a href="{{ route('manager.promotions') }}" class="nav-item">
                <i class="fa-solid fa-ticket"></i>
                Khuyến mãi
            </a>
            
            <div class="nav-label">Chăm sóc khách hàng</div>
            <a href="{{ route('manager.reviews') }}" class="nav-item">
                <i class="fa-solid fa-star"></i>
                Đánh giá
            </a>
            <a href="{{ route('manager.notifications') }}" class="nav-item">
                <i class="fa-regular fa-bell"></i>
                Thông báo
            </a>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Topbar -->
        <header class="topbar">
            <div class="search-bar">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="Tìm kiếm sản phẩm...">
            </div>
            <div class="topbar-right">
                <div class="icon-btn">
                    <i class="fa-regular fa-bell"></i>
                </div>
                <div class="user-profile">
                    <div class="user-info" style="text-align: right;">
                        <span class="user-name">{{ Auth::user()->name }}</span>
                        <span class="user-role">{{ $store ? $store->name : 'Chưa có gian hàng' }}</span>
                    </div>
                    <div class="avatar">{{ substr(Auth::user()->name, 0, 1) }}</div>
                </div>
            </div>
        </header>

        <!-- Dashboard Content -->
        <div class="content-scroll">
            <div class="page-header">
                <div>
                    <h1 class="page-title">Quản lý Sản phẩm</h1>
                </div>
                <a href="{{ route('manager.products.create') }}" class="btn">
                    <i class="fa-solid fa-plus"></i> Thêm Sản Phẩm
                </a>
            </div>

            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Tất cả sản phẩm</h2>
                </div>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Sản phẩm</th>
                                <th>Giá bán</th>
                                <th>Đánh giá</th>
                                <th>Trạng thái</th>
                                <th style="text-align: right;">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($products as $p)
                            <tr>
                                <td>
                                    <div class="product-name-cell">
                                        <img src="{{ $p->image }}" class="product-img" alt="Ảnh">
                                        <div>
                                            <div style="font-weight: 600; color: var(--gray-900);">{{ $p->name }}</div>
                                            <div style="font-size: 12px; color: var(--gray-500);">ID: {{ $p->id }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ number_format($p->price, 0, ',', '.') }}đ</td>
                                <td>
                                    <div style="display: flex; align-items: center; gap: 4px; color: var(--warning);">
                                        <i class="fa-solid fa-star" style="font-size: 12px;"></i>
                                        <span style="font-weight: 600; color: var(--gray-800);">{{ $p->rating }}</span>
                                        <span style="color: var(--gray-500); font-size: 12px;">({{ $p->reviews }})</span>
                                    </div>
                                </td>
                                <td><span class="badge active">Đang bán</span></td>
                                <td style="text-align: right;">
                                    <div class="flex-actions" style="justify-content: flex-end;">
                                        <a href="{{ route('manager.products.edit', $p->id) }}" class="btn-action" title="Chỉnh sửa">
                                            <i class="fa-solid fa-pen"></i>
                                        </a>
                                        <button type="button" class="btn-action btn-danger-outline" onclick="deleteProduct('{{ route('manager.products.destroy', $p->id) }}', this)" title="Xóa">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" style="text-align:center; padding: 40px 20px; color: var(--gray-500);">
                                    <div style="font-size: 48px; margin-bottom: 16px; color: var(--gray-300);"><i class="fa-solid fa-box-open"></i></div>
                                    <div style="font-size: 16px; font-weight: 500;">Chưa có sản phẩm nào</div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- Pagination can be added here if needed: $products->links() -->
            </div>
        </div>
    </main>

    <script>
        function deleteProduct(url, btn) {
            if (!confirm('Bạn có chắc muốn xóa sản phẩm này?')) return;
            
            fetch(url, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    btn.closest('tr').remove();
                } else {
                    alert('Có lỗi xảy ra khi xóa!');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Có lỗi xảy ra khi xóa!');
            });
        }
    </script>
</body>
</html>
