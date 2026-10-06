<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - TechStore</title>
    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
        .page-header { margin-bottom: 32px; display: flex; justify-content: space-between; align-items: flex-end; }
        .page-title { font-size: 28px; font-weight: 800; color: var(--gray-900); margin-bottom: 4px; letter-spacing: -0.5px; }
        .page-subtitle { color: var(--gray-500); font-size: 15px; }
        .logout-btn { padding: 10px 16px; background: white; border: 1px solid var(--gray-300); border-radius: 8px; color: var(--gray-700); font-weight: 500; font-family: 'Inter', sans-serif; cursor: pointer; transition: all 0.2s; display: flex; align-items: center; gap: 8px; box-shadow: 0 1px 2px rgba(0,0,0,0.05); }
        .logout-btn:hover { background: var(--danger-bg); color: var(--danger); border-color: var(--danger-bg); }

        /* Stats Grid */
        .stats-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 24px; margin-bottom: 32px; }
        .stat-card { background: white; border-radius: 16px; padding: 24px; border: 1px solid var(--gray-200); box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05), 0 2px 4px -1px rgba(0,0,0,0.03); transition: transform 0.2s; }
        .stat-card:hover { transform: translateY(-2px); }
        .stat-header { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 20px; }
        .stat-icon { width: 48px; height: 48px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 24px; }
        .stat-icon.revenue { background: var(--primary-light); color: var(--primary); }
        .stat-icon.orders { background: var(--success-bg); color: var(--success); }
        .stat-icon.customers { background: #F3E8FF; color: #9333EA; }
        .stat-icon.conversion { background: #FFE4E6; color: #E11D48; }
        .stat-trend { font-size: 13px; font-weight: 600; display: flex; align-items: center; gap: 4px; padding: 4px 10px; border-radius: 20px; }
        .trend-up { background: var(--success-bg); color: var(--success); }
        .trend-down { background: var(--danger-bg); color: var(--danger); }
        .stat-value { font-size: 32px; font-weight: 800; color: var(--gray-900); margin-bottom: 4px; letter-spacing: -1px; }
        .stat-label { color: var(--gray-500); font-size: 14px; font-weight: 500; }

        /* Charts Section */
        .charts-grid { display: grid; grid-template-columns: 2fr 1fr; gap: 24px; margin-bottom: 32px; }
        .card { background: white; border-radius: 16px; border: 1px solid var(--gray-200); box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05); padding: 24px; }
        .card-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px; }
        .card-title { font-size: 18px; font-weight: 700; color: var(--gray-900); }
        .card-action { color: var(--primary); font-size: 14px; font-weight: 600; text-decoration: none; display: flex; align-items: center; gap: 4px; }
        .card-action:hover { text-decoration: underline; }

        .chart-container { position: relative; height: 300px; width: 100%; }

        /* Top Products List */
        .product-list { display: flex; flex-direction: column; gap: 20px; }
        .product-item { display: flex; align-items: center; justify-content: space-between; }
        .product-info { display: flex; align-items: center; gap: 16px; }
        .product-rank { width: 28px; height: 28px; border-radius: 50%; background: var(--gray-100); color: var(--gray-600); display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 13px; }
        .product-rank.top-1 { background: #FEF3C7; color: #D97706; }
        .product-rank.top-2 { background: var(--gray-200); color: var(--gray-700); }
        .product-rank.top-3 { background: #FFEDD5; color: #C2410C; }
        .product-details { display: flex; flex-direction: column; gap: 2px; }
        .product-name { font-size: 14px; font-weight: 600; color: var(--gray-800); }
        .product-sales { font-size: 12px; color: var(--gray-500); }
        .product-revenue { font-weight: 700; color: var(--primary); font-size: 14px; text-align: right; }

        /* Tables */
        .table-card { padding: 0; overflow: hidden; }
        .table-card .card-header { padding: 24px 24px 0 24px; }
        .table-container { overflow-x: auto; width: 100%; }
        table { width: 100%; border-collapse: collapse; white-space: nowrap; margin-top: 16px;}
        th { padding: 16px 24px; text-align: left; font-size: 12px; font-weight: 600; color: var(--gray-500); text-transform: uppercase; letter-spacing: 0.05em; border-bottom: 1px solid var(--gray-200); background: var(--gray-50); }
        td { padding: 16px 24px; vertical-align: middle; border-bottom: 1px solid var(--gray-100); font-size: 14px; color: var(--gray-700); font-weight: 500;}
        tr:last-child td { border-bottom: none; }
        tr:hover td { background: var(--gray-50); }
        
        .badge { display: inline-flex; align-items: center; padding: 6px 12px; border-radius: 20px; font-size: 12px; font-weight: 600; }
        .badge.pending { background: var(--warning-bg); color: var(--warning); }
        .badge.approved { background: var(--success-bg); color: var(--success); }
        .badge.rejected { background: var(--danger-bg); color: var(--danger); }
        
        /* User Role badges */
        .role-admin { background: #F3E8FF; color: #9333EA; padding: 4px 10px; border-radius: 6px; font-size: 12px; font-weight: 600;}
        .role-customer { background: var(--primary-light); color: var(--primary); padding: 4px 10px; border-radius: 6px; font-size: 12px; font-weight: 600;}
        .role-manager { background: var(--warning-bg); color: var(--warning); padding: 4px 10px; border-radius: 6px; font-size: 12px; font-weight: 600;}

        .btn-action { padding: 8px 16px; border-radius: 8px; font-size: 13px; font-weight: 600; border: none; cursor: pointer; transition: all 0.2s; }
        .btn-primary { background: var(--primary); color: white; }
        .btn-primary:hover { background: #4338CA; }
        .btn-danger { background: white; color: var(--danger); border: 1px solid var(--danger); }
        .btn-danger:hover { background: var(--danger-bg); }
        
        .flex-actions { display: flex; gap: 8px; }

        /* Responsive */
        @media (max-width: 1024px) {
            .stats-grid { grid-template-columns: repeat(2, 1fr); }
            .charts-grid { grid-template-columns: 1fr; }
        }
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
            <a href="/admin" class="nav-item active">
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
            <a href="/admin/stores" class="nav-item">
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

    <!-- Main Content -->
    <main class="main-content">
        <!-- Topbar -->
        <header class="topbar">
            <div class="search-bar">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="Tìm kiếm...">
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

        <!-- Dashboard Content -->
        <div class="content-scroll">
            <div class="page-header">
                <div>
                    <h1 class="page-title">Dashboard</h1>
                    <p class="page-subtitle">Tổng quan hoạt động kinh doanh hôm nay</p>
                </div>
                <form method="POST" action="/logout">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i> Đăng xuất
                    </button>
                </form>
            </div>

            <!-- Stats Grid -->
            <div class="stats-grid">
                <!-- Revenue -->
                <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-icon revenue"><i class="fa-solid fa-wallet"></i></div>
                        <div class="stat-trend trend-up"><i class="fa-solid fa-arrow-trend-up"></i> +12.5%</div>
                    </div>
                    <div class="stat-value">{{ number_format($totalRevenue, 0, ',', '.') }}đ</div>
                    <div class="stat-label">Doanh thu</div>
                </div>
                <!-- Orders -->
                <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-icon orders"><i class="fa-solid fa-cart-shopping"></i></div>
                        <div class="stat-trend trend-up"><i class="fa-solid fa-arrow-trend-up"></i> +8.2%</div>
                    </div>
                    <div class="stat-value">{{ number_format($totalOrders) }}</div>
                    <div class="stat-label">Đơn hàng</div>
                </div>
                <!-- Customers -->
                <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-icon customers"><i class="fa-solid fa-users"></i></div>
                        <div class="stat-trend trend-up"><i class="fa-solid fa-arrow-trend-up"></i> +5.1%</div>
                    </div>
                    <div class="stat-value">{{ number_format($totalCustomers) }}</div>
                    <div class="stat-label">Khách hàng</div>
                </div>
                <!-- Conversion -->
                <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-icon conversion"><i class="fa-solid fa-chart-line"></i></div>
                        <div class="stat-trend trend-down"><i class="fa-solid fa-arrow-trend-down"></i> -0.4%</div>
                    </div>
                    <div class="stat-value">{{ $conversionRate }}%</div>
                    <div class="stat-label">Tỷ lệ chuyển đổi</div>
                </div>
            </div>

            <!-- Charts & Top Products Grid -->
            <div class="charts-grid">
                <!-- Revenue Chart -->
                <div class="card">
                    <div class="card-header">
                        <div>
                            <h2 class="card-title">Doanh thu</h2>
                            <p class="page-subtitle" style="font-size: 13px; margin-top: 4px;">7 tháng gần nhất</p>
                        </div>
                        <div style="display: flex; background: var(--gray-100); border-radius: 8px; padding: 4px;">
                            <button style="border: none; background: transparent; padding: 6px 12px; border-radius: 6px; font-weight: 600; color: var(--gray-600); cursor: pointer; font-family: 'Inter', sans-serif;">Tuần</button>
                            <button style="border: none; background: white; padding: 6px 12px; border-radius: 6px; font-weight: 600; color: var(--primary); cursor: pointer; box-shadow: 0 1px 2px rgba(0,0,0,0.05); font-family: 'Inter', sans-serif;">Tháng</button>
                            <button style="border: none; background: transparent; padding: 6px 12px; border-radius: 6px; font-weight: 600; color: var(--gray-600); cursor: pointer; font-family: 'Inter', sans-serif;">Năm</button>
                        </div>
                    </div>
                    <div class="chart-container">
                        <canvas id="revenueChart"></canvas>
                    </div>
                </div>

                <!-- Top Products -->
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Sản phẩm bán chạy</h2>
                    </div>
                    <div class="product-list">
                        @foreach($topProducts as $index => $product)
                        <div class="product-item">
                            <div class="product-info">
                                <div class="product-rank {{ $index < 3 ? 'top-'.($index+1) : '' }}">{{ $index + 1 }}</div>
                                <div class="product-details">
                                    <span class="product-name">{{ $product->name }}</span>
                                    <span class="product-sales">{{ number_format($product->order_items_sum_quantity ?? 0) }} đã bán</span>
                                </div>
                            </div>
                            <div class="product-revenue">{{ number_format($product->price, 0, ',', '.') }}đ</div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Stores Table -->
            <div class="card table-card" style="margin-bottom: 24px;">
                <div class="card-header">
                    <h2 class="card-title">Quản lý Gian hàng (Stores)</h2>
                    <a href="#" class="card-action">Xem tất cả <i class="fa-solid fa-chevron-right" style="font-size: 10px;"></i></a>
                </div>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Mã gian hàng</th>
                                <th>Chủ sở hữu</th>
                                <th>Tên gian hàng</th>
                                <th>Trạng thái</th>
                                <th style="text-align: right;">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($stores) && count($stores) > 0)
                                @foreach($stores as $s)
                                <tr>
                                    <td><strong>#STORE-{{ str_pad($s->id, 4, '0', STR_PAD_LEFT) }}</strong></td>
                                    <td>
                                        <div style="display: flex; align-items: center; gap: 8px;">
                                            <div style="width: 28px; height: 28px; background: var(--primary-light); color: var(--primary); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 12px; font-weight: bold;">
                                                {{ substr($s->user->name, 0, 1) }}
                                            </div>
                                            {{ $s->user->name }}
                                        </div>
                                    </td>
                                    <td>{{ $s->name }}</td>
                                    <td><span class="badge {{ $s->status }}">{{ ucfirst($s->status) }}</span></td>
                                    <td style="text-align: right;">
                                        @if($s->status === 'pending')
                                            <div class="flex-actions" style="justify-content: flex-end;">
                                                <button class="btn-action btn-primary">Duyệt</button>
                                                <button class="btn-action btn-danger">Từ chối</button>
                                            </div>
                                        @else
                                            <span style="color: var(--gray-400);">-</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <!-- Mock Data if $stores is empty/not set -->
                                <tr>
                                    <td><strong>#STORE-0012</strong></td>
                                    <td>
                                        <div style="display: flex; align-items: center; gap: 8px;">
                                            <div style="width: 28px; height: 28px; background: var(--primary-light); color: var(--primary); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 12px; font-weight: bold;">N</div>
                                            Nguyễn Văn A
                                        </div>
                                    </td>
                                    <td>Tech Store Official</td>
                                    <td><span class="badge pending">Pending</span></td>
                                    <td style="text-align: right;">
                                        <div class="flex-actions" style="justify-content: flex-end;">
                                            <button class="btn-action btn-primary">Duyệt</button>
                                            <button class="btn-action btn-danger">Từ chối</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>#STORE-0011</strong></td>
                                    <td>
                                        <div style="display: flex; align-items: center; gap: 8px;">
                                            <div style="width: 28px; height: 28px; background: #F3E8FF; color: #9333EA; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 12px; font-weight: bold;">T</div>
                                            Trần Thị B
                                        </div>
                                    </td>
                                    <td>Phụ Kiện Số</td>
                                    <td><span class="badge approved">Approved</span></td>
                                    <td style="text-align: right;"><span style="color: var(--gray-400);">-</span></td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Users Table -->
            <div class="card table-card">
                <div class="card-header">
                    <h2 class="card-title">Quản lý Người dùng (Users)</h2>
                    <a href="#" class="card-action">Xem tất cả <i class="fa-solid fa-chevron-right" style="font-size: 10px;"></i></a>
                </div>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Mã ND</th>
                                <th>Người dùng</th>
                                <th>Email</th>
                                <th>Vai trò</th>
                                <th style="text-align: right;">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($users) && count($users) > 0)
                                @foreach($users as $u)
                                <tr>
                                    <td><strong>#USR-{{ str_pad($u->id, 4, '0', STR_PAD_LEFT) }}</strong></td>
                                    <td>
                                        <div style="display: flex; align-items: center; gap: 12px;">
                                            <div style="width: 32px; height: 32px; background: var(--gray-100); color: var(--gray-600); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 14px; font-weight: bold;">
                                                {{ substr($u->name, 0, 1) }}
                                            </div>
                                            <span style="font-weight: 600; color: var(--gray-800);">{{ $u->name }}</span>
                                        </div>
                                    </td>
                                    <td>{{ $u->email }}</td>
                                    <td><span class="role-{{ $u->role }}">{{ ucfirst($u->role) }}</span></td>
                                    <td style="text-align: right;">
                                        <button class="btn-action" style="background: var(--gray-100); color: var(--gray-700);"><i class="fa-solid fa-pen"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <!-- Mock Data -->
                                <tr>
                                    <td><strong>#USR-0001</strong></td>
                                    <td>
                                        <div style="display: flex; align-items: center; gap: 12px;">
                                            <div style="width: 32px; height: 32px; background: var(--primary-light); color: var(--primary); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 14px; font-weight: bold;">A</div>
                                            <span style="font-weight: 600; color: var(--gray-800);">Admin System</span>
                                        </div>
                                    </td>
                                    <td>admin@techstore.com</td>
                                    <td><span class="role-admin">Admin</span></td>
                                    <td style="text-align: right;">
                                        <button class="btn-action" style="background: var(--gray-100); color: var(--gray-700);"><i class="fa-solid fa-pen"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>#USR-0002</strong></td>
                                    <td>
                                        <div style="display: flex; align-items: center; gap: 12px;">
                                            <div style="width: 32px; height: 32px; background: var(--success-bg); color: var(--success); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 14px; font-weight: bold;">N</div>
                                            <span style="font-weight: 600; color: var(--gray-800);">Nguyễn Văn A</span>
                                        </div>
                                    </td>
                                    <td>nguyenvana@gmail.com</td>
                                    <td><span class="role-customer">Customer</span></td>
                                    <td style="text-align: right;">
                                        <button class="btn-action" style="background: var(--gray-100); color: var(--gray-700);"><i class="fa-solid fa-pen"></i></button>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </main>

    <!-- Chart.js Setup -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('revenueChart').getContext('2d');
            
            // Create gradient for the bars
            const gradient = ctx.createLinearGradient(0, 0, 0, 400);
            gradient.addColorStop(0, '#4F46E5'); // Primary color
            gradient.addColorStop(1, '#818CF8'); // Lighter primary

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7'],
                    datasets: [{
                        label: 'Doanh thu (Tỷ VNĐ)',
                        data: {!! json_encode($revenueData) !!},
                        backgroundColor: gradient,
                        borderRadius: 6,
                        borderSkipped: false,
                        barThickness: 32
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            backgroundColor: '#1F2937',
                            padding: 12,
                            titleFont: { family: 'Inter', size: 14 },
                            bodyFont: { family: 'Inter', size: 14, weight: 'bold' },
                            callbacks: {
                                label: function(context) {
                                    return context.raw + ' Tỷ VNĐ';
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            display: false,
                            beginAtZero: true
                        },
                        x: {
                            grid: { display: false, drawBorder: false },
                            ticks: {
                                font: { family: 'Inter', size: 12, weight: '500' },
                                color: '#6B7280'
                            }
                        }
                    },
                    animation: {
                        duration: 1000,
                        easing: 'easeOutQuart'
                    }
                }
            });
        });
    </script>
</body>
</html>
