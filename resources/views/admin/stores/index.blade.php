<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Gian hàng - Admin TechStore</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #4F46E5;
            --primary-light: #EEF2FF;
            --success: #10B981;
            --success-bg: #D1FAE5;
            --danger: #EF4444;
            --danger-bg: #FEE2E2;
            --warning: #F59E0B;
            --warning-bg: #FEF3C7;
            --info: #3B82F6;
            --info-bg: #DBEAFE;
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
        .icon-btn .badge-dot { position: absolute; top: -2px; right: -2px; background: var(--danger); width: 8px; height: 8px; border-radius: 50%; border: 2px solid white; }
        
        .user-profile { display: flex; align-items: center; gap: 12px; cursor: pointer; padding-left: 24px; border-left: 1px solid var(--gray-200); }
        .avatar { width: 40px; height: 40px; border-radius: 50%; background: var(--primary-light); color: var(--primary); display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 16px; border: 2px solid white; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .user-info { display: flex; flex-direction: column; }
        .user-name { font-size: 14px; font-weight: 600; color: var(--gray-800); }
        .user-role { font-size: 12px; color: var(--gray-500); }

        /* Dashboard Content */
        .content-scroll { flex: 1; overflow-y: auto; padding: 32px; }
        .page-header { margin-bottom: 24px; display: flex; justify-content: space-between; align-items: flex-end; }
        .page-title { font-size: 24px; font-weight: 800; color: var(--gray-900); margin-bottom: 4px; letter-spacing: -0.5px; display: flex; align-items: center; gap: 12px;}
        .page-icon { width: 40px; height: 40px; background: var(--primary-light); color: var(--primary); border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 20px; }
        .page-subtitle { color: var(--gray-500); font-size: 14px; }

        /* Tables */
        .card { background: white; border-radius: 16px; border: 1px solid var(--gray-200); box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05); overflow: hidden; }
        table { width: 100%; border-collapse: collapse; white-space: nowrap; }
        th { padding: 16px 24px; text-align: left; font-size: 12px; font-weight: 600; color: var(--gray-500); text-transform: uppercase; border-bottom: 1px solid var(--gray-200); background: var(--gray-50); }
        td { padding: 16px 24px; vertical-align: middle; border-bottom: 1px solid var(--gray-100); font-size: 14px; color: var(--gray-700); font-weight: 500;}
        tr:hover td { background: var(--gray-50); }
        
        .switch { position: relative; display: inline-block; width: 44px; height: 24px; }
        .switch input { opacity: 0; width: 0; height: 0; }
        .slider { position: absolute; cursor: pointer; top: 0; left: 0; right: 0; bottom: 0; background-color: var(--gray-300); transition: .4s; border-radius: 24px; }
        .slider:before { position: absolute; content: ""; height: 18px; width: 18px; left: 3px; bottom: 3px; background-color: white; transition: .4s; border-radius: 50%; box-shadow: 0 2px 4px rgba(0,0,0,0.2); }
        input:checked + .slider { background-color: var(--success); }
        input:checked + .slider:before { transform: translateX(20px); }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="logo">
            <div class="logo-icon">T</div>
            TechStore
        </div>
        <nav class="nav-menu">
            <div class="nav-label">Main</div>
            <a href="/admin" class="nav-item">
                <i class="fa-solid fa-chart-pie"></i>
                Dashboard
            </a>
            <a href="/admin/categories" class="nav-item">
                <i class="fa-solid fa-box-open"></i>
                Danh mục
            </a>
            <a href="/admin/banners" class="nav-item">
                <i class="fa-solid fa-images"></i>
                Quản lý Banner
            </a>
            
            <div class="nav-label">Quản lý</div>
            <a href="/admin/products" class="nav-item">
                <i class="fa-solid fa-boxes-stacked"></i>
                Sản phẩm
            </a>
            <a href="/admin/orders" class="nav-item">
                <i class="fa-solid fa-cart-shopping"></i>
                Đơn hàng
            </a>
            <a href="/admin/stores" class="nav-item active">
                <i class="fa-solid fa-store"></i>
                Gian hàng
            </a>
            <a href="/admin/users" class="nav-item">
                <i class="fa-solid fa-users"></i>
                Người dùng
            </a>
            
            <div class="nav-label">Hệ thống</div>
            <a href="/admin/reports" class="nav-item">
                <i class="fa-solid fa-chart-line"></i>
                Báo cáo
            </a>
            <a href="/admin/claims" class="nav-item">
                <i class="fa-solid fa-scale-balanced"></i>
                Khiếu nại
            </a>
            <a href="/admin/coupons" class="nav-item">
                <i class="fa-solid fa-ticket"></i>
                Mã giảm giá
            </a>
        </nav>
    </aside>

    <main class="main-content">
        <header class="topbar">
            <div class="search-bar">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="Tìm kiếm gian hàng...">
            </div>
            <div class="topbar-right">
                <div class="icon-btn">
                    <i class="fa-regular fa-bell"></i>
                    <div class="badge-dot"></div>
                </div>
                <div class="user-profile">
                    <div class="user-info" style="text-align: right;">
                        <span class="user-name">{{ Auth::user()->name ?? 'Admin System' }}</span>
                        <span class="user-role">Quản trị viên</span>
                    </div>
                    <div class="avatar">{{ substr(Auth::user()->name ?? 'A', 0, 1) }}</div>
                </div>
            </div>
        </header>

        <div class="content-scroll">
            @if(session('success'))
            <div style="padding: 16px; background: var(--success-bg); color: var(--success); border-radius: 8px; margin-bottom: 24px; font-weight: 500;">
                <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
            </div>
            @endif

            <div class="page-header">
                <div style="display: flex; align-items: center; gap: 16px;">
                    <div class="page-icon"><i class="fa-solid fa-store"></i></div>
                    <div>
                        <h1 class="page-title">Quản lý Gian hàng</h1>
                        <p class="page-subtitle">Kiểm duyệt và quản lý các cửa hàng đăng ký bán trên sàn</p>
                    </div>
                </div>
            </div>

            <div class="card">
                <table>
                    <thead>
                        <tr>
                            <th>Tên Gian hàng</th>
                            <th>Chủ sở hữu</th>
                            <th>Số SP</th>
                            <th>Ngày tạo</th>
                            <th style="text-align: right;">Trạng thái / Duyệt</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($stores as $store)
                        <tr>
                            <td>
                                <div style="font-weight: 700; color: var(--gray-900);">{{ $store->name }}</div>
                                <div style="font-size: 13px; color: var(--gray-500); font-weight: 400; margin-top: 4px;">{{ Str::limit($store->description, 40) }}</div>
                            </td>
                            <td>{{ $store->user->name ?? 'N/A' }}</td>
                            <td>{{ $store->products_count ?? 0 }}</td>
                            <td>{{ $store->created_at->format('d/m/Y') }}</td>
                            <td style="text-align: right;">
                                <form action="{{ route('stores.update', $store->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="is_active" value="0">
                                    <label class="switch">
                                        <input type="checkbox" name="is_active" value="1" {{ $store->is_active ? 'checked' : '' }} onchange="this.form.submit()">
                                        <span class="slider"></span>
                                    </label>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" style="text-align: center; padding: 32px; color: var(--gray-500);">Chưa có gian hàng nào trên hệ thống</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                
                @if($stores->hasPages())
                <div style="padding: 16px 24px; border-top: 1px solid var(--gray-200); display: flex; justify-content: center;">
                    {{ $stores->links('pagination::bootstrap-4') }}
                </div>
                @endif
            </div>
        </div>
    </main>
</body>
</html>
