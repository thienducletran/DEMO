<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kênh Người Bán - TechStore</title>
    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root {
            --primary: #F97316; /* Orange for seller */
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
        .stat-icon.products { background: #E0F2FE; color: #0284C7; }
        .stat-icon.customers { background: #F3E8FF; color: #9333EA; }
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
        .product-img-mini { width: 40px; height: 40px; border-radius: 8px; object-fit: cover; border: 1px solid var(--gray-200); }
        .product-details { display: flex; flex-direction: column; gap: 2px; }
        .product-name { font-size: 14px; font-weight: 600; color: var(--gray-800); }
        .product-sales { font-size: 12px; color: var(--gray-500); }
        .product-revenue { font-weight: 700; color: var(--primary); font-size: 14px; text-align: right; }

        /* Setup message */
        .setup-banner { background: var(--warning-bg); border-left: 4px solid var(--warning); padding: 16px 20px; border-radius: 8px; margin-bottom: 24px; display: flex; justify-content: space-between; align-items: center; }
        .setup-content h3 { color: #92400E; font-size: 16px; margin-bottom: 4px; }
        .setup-content p { color: #B45309; font-size: 14px; margin: 0; }
        .btn-setup { background: white; color: var(--warning); border: 1px solid var(--warning); padding: 8px 16px; border-radius: 6px; font-weight: 600; text-decoration: none; font-size: 14px; transition: all 0.2s; }
        .btn-setup:hover { background: var(--warning); color: white; }
        
        .badge { display: inline-flex; align-items: center; padding: 6px 12px; border-radius: 20px; font-size: 12px; font-weight: 600; }
        .badge.pending { background: var(--warning-bg); color: var(--warning); }
        .badge.approved { background: var(--success-bg); color: var(--success); }

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
            <div class="logo-icon">S</div>
            Kênh Người Bán
        </div>
        <nav class="nav-menu">
            <div class="nav-label">Quản lý hoạt động</div>
            <a href="{{ route('manager.dashboard') }}" class="nav-item active">
                <i class="fa-solid fa-chart-pie"></i>
                Tổng quan
            </a>
            <a href="{{ route('manager.store') }}" class="nav-item">
                <i class="fa-solid fa-store"></i>
                Gian hàng
            </a>
            <a href="{{ route('manager.products.index') }}" class="nav-item">
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
                <input type="text" placeholder="Tìm kiếm đơn hàng, sản phẩm...">
            </div>
            <div class="topbar-right">
                <div class="icon-btn">
                    <i class="fa-regular fa-bell"></i>
                    <div class="badge-dot"></div>
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
                    <h1 class="page-title">Tổng quan kinh doanh</h1>
                    <p class="page-subtitle">Hiệu suất hoạt động của gian hàng trong thời gian qua</p>
                </div>
                <form method="POST" action="/logout">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i> Đăng xuất
                    </button>
                </form>
            </div>

            @if(!$store)
                <div class="setup-banner">
                    <div class="setup-content">
                        <h3>Bạn chưa thiết lập gian hàng!</h3>
                        <p>Vui lòng đăng ký mở gian hàng để bắt đầu bán sản phẩm trên TechStore.</p>
                    </div>
                    <a href="#" class="btn-setup">Đăng ký ngay</a>
                </div>
            @elseif($store->status === 'pending')
                <div class="setup-banner" style="background: var(--gray-100); border-color: var(--gray-400);">
                    <div class="setup-content">
                        <h3 style="color: var(--gray-800);">Gian hàng đang chờ duyệt!</h3>
                        <p style="color: var(--gray-600);">Vui lòng kiên nhẫn. Bạn sẽ có thể đăng sản phẩm sau khi được Admin phê duyệt.</p>
                    </div>
                    <span class="badge pending">Pending</span>
                </div>
            @elseif($store->status === 'approved')
                
                @if(session('success'))
                    <div style="background-color: #d1fae5; color: #065f46; padding: 15px; border-radius: 8px; margin-bottom: 24px;">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Stats Grid -->
                <div class="stats-grid">
                    <!-- Revenue -->
                    <div class="stat-card">
                        <div class="stat-header">
                            <div class="stat-icon revenue"><i class="fa-solid fa-wallet"></i></div>
                            <div class="stat-trend trend-up"><i class="fa-solid fa-arrow-trend-up"></i> +5.4%</div>
                        </div>
                        <div class="stat-value">{{ number_format($totalRevenue, 0, ',', '.') }}đ</div>
                        <div class="stat-label">Doanh thu</div>
                    </div>
                    <!-- Orders -->
                    <div class="stat-card">
                        <div class="stat-header">
                            <div class="stat-icon orders"><i class="fa-solid fa-clipboard-list"></i></div>
                            <div class="stat-trend trend-up"><i class="fa-solid fa-arrow-trend-up"></i> +12%</div>
                        </div>
                        <div class="stat-value">{{ number_format($totalOrders) }}</div>
                        <div class="stat-label">Đơn hàng</div>
                    </div>
                    <!-- Products -->
                    <div class="stat-card">
                        <div class="stat-header">
                            <div class="stat-icon products"><i class="fa-solid fa-boxes-stacked"></i></div>
                            <div class="stat-trend trend-up"><i class="fa-solid fa-arrow-trend-up"></i> +2</div>
                        </div>
                        <div class="stat-value">{{ number_format($store->products()->count()) }}</div>
                        <div class="stat-label">Sản phẩm</div>
                    </div>
                    <!-- Customers -->
                    <div class="stat-card">
                        <div class="stat-header">
                            <div class="stat-icon customers"><i class="fa-solid fa-users"></i></div>
                            <div class="stat-trend trend-up"><i class="fa-solid fa-arrow-trend-up"></i> +3.1%</div>
                        </div>
                        <div class="stat-value">{{ number_format($totalCustomers) }}</div>
                        <div class="stat-label">Khách hàng</div>
                    </div>
                </div>

                <!-- Charts & Top Products Grid -->
                <div class="charts-grid">
                    <!-- Revenue Chart -->
                    <div class="card">
                        <div class="card-header">
                            <div>
                                <h2 class="card-title">Biểu đồ doanh thu</h2>
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
                            @forelse($topProducts as $index => $product)
                            <div class="product-item">
                                <div class="product-info">
                                    <img src="{{ $product->image }}" class="product-img-mini" alt="{{ $product->name }}">
                                    <div class="product-details">
                                        <span class="product-name" style="max-width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $product->name }}</span>
                                        <span class="product-sales">{{ number_format($product->order_items_sum_quantity ?? 0) }} đã bán</span>
                                    </div>
                                </div>
                                <div class="product-revenue">{{ number_format($product->price, 0, ',', '.') }}đ</div>
                            </div>
                            @empty
                            <div style="text-align: center; color: var(--gray-500); padding: 20px 0;">
                                Chưa có sản phẩm bán chạy.
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </main>

    @if($store && $store->status === 'approved')
    <!-- Chart.js Setup -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('revenueChart').getContext('2d');
            
            // Create gradient for the bars
            const gradient = ctx.createLinearGradient(0, 0, 0, 400);
            gradient.addColorStop(0, '#F97316'); // Orange primary
            gradient.addColorStop(1, '#FDBA74'); // Lighter orange

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7'],
                    datasets: [{
                        label: 'Doanh thu (VNĐ)',
                        data: {!! json_encode($revenueData ?? [0,0,0,0,0,0,0]) !!},
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
                                    return new Intl.NumberFormat('vi-VN').format(context.raw) + ' VNĐ';
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            display: true,
                            beginAtZero: true,
                            grid: { color: '#F3F4F6' },
                            ticks: {
                                callback: function(value) {
                                    return new Intl.NumberFormat('vi-VN').format(value);
                                }
                            }
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
    @endif
</body>
</html>
