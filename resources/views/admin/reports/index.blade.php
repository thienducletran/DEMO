<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Báo cáo & Thống kê - Admin TechStore</title>
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
        
        /* Stats Grid */
        .stats-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 24px; margin-bottom: 32px; }
        .stat-card { background: white; border: 1px solid var(--gray-200); border-radius: 16px; padding: 24px; display: flex; flex-direction: column; gap: 16px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05); }
        .stat-header { display: flex; justify-content: space-between; align-items: flex-start; }
        .stat-icon { width: 48px; height: 48px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 24px; }
        .stat-icon.primary { background: var(--primary-light); color: var(--primary); }
        .stat-icon.success { background: var(--success-bg); color: var(--success); }
        .stat-icon.warning { background: var(--warning-bg); color: var(--warning); }
        .stat-icon.danger { background: var(--danger-bg); color: var(--danger); }
        
        .stat-value { font-size: 28px; font-weight: 800; color: var(--gray-900); letter-spacing: -1px; }
        .stat-label { font-size: 14px; color: var(--gray-500); font-weight: 500; }
        
        /* Charts */
        .charts-grid { display: grid; grid-template-columns: 2fr 1fr; gap: 24px; margin-bottom: 32px; }
        .chart-card { background: white; border: 1px solid var(--gray-200); border-radius: 16px; padding: 24px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05); }
        .chart-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px; }
        .chart-title { font-size: 16px; font-weight: 700; color: var(--gray-900); }
        
        .chart-placeholder { width: 100%; height: 300px; border-radius: 12px; background: linear-gradient(180deg, var(--gray-50) 0%, rgba(255,255,255,0) 100%); border: 1px dashed var(--gray-300); display: flex; align-items: center; justify-content: center; color: var(--gray-400); flex-direction: column; gap: 12px;}
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
            <a href="/admin/stores" class="nav-item">
                <i class="fa-solid fa-store"></i>
                Gian hàng
            </a>
            <a href="/admin/users" class="nav-item">
                <i class="fa-solid fa-users"></i>
                Người dùng
            </a>
            
            <div class="nav-label">Hệ thống</div>
            <a href="/admin/reports" class="nav-item active">
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

        <div class="content-scroll">

            <div class="page-header">
                <div style="display: flex; align-items: center; gap: 16px;">
                    <div class="page-icon"><i class="fa-solid fa-chart-line"></i></div>
                    <div>
                        <h1 class="page-title">Báo cáo & Thống kê</h1>
                        <p class="page-subtitle">Phân tích dữ liệu doanh thu, sản phẩm và khách hàng</p>
                    </div>
                </div>
                
                <div style="display: flex; gap: 8px;">
                    <button style="padding: 8px 16px; border: 1px solid var(--gray-300); background: white; border-radius: 8px; font-family: 'Inter'; font-weight: 500;">Hôm nay</button>
                    <button style="padding: 8px 16px; border: none; background: var(--primary); color: white; border-radius: 8px; font-family: 'Inter'; font-weight: 500;">Tuần này</button>
                    <button style="padding: 8px 16px; border: 1px solid var(--gray-300); background: white; border-radius: 8px; font-family: 'Inter'; font-weight: 500;">Tháng này</button>
                </div>
            </div>

            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-icon primary"><i class="fa-solid fa-wallet"></i></div>
                        <span style="color: var(--success); font-weight: 600; font-size: 14px;"><i class="fa-solid fa-arrow-trend-up"></i> +12%</span>
                    </div>
                    <div>
                        <div class="stat-value">124.5M</div>
                        <div class="stat-label">Tổng doanh thu</div>
                    </div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-icon success"><i class="fa-solid fa-cart-arrow-down"></i></div>
                        <span style="color: var(--success); font-weight: 600; font-size: 14px;"><i class="fa-solid fa-arrow-trend-up"></i> +5%</span>
                    </div>
                    <div>
                        <div class="stat-value">342</div>
                        <div class="stat-label">Đơn hàng hoàn tất</div>
                    </div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-icon warning"><i class="fa-solid fa-users"></i></div>
                        <span style="color: var(--danger); font-weight: 600; font-size: 14px;"><i class="fa-solid fa-arrow-trend-down"></i> -2%</span>
                    </div>
                    <div>
                        <div class="stat-value">1,204</div>
                        <div class="stat-label">Khách hàng mới</div>
                    </div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-icon danger"><i class="fa-solid fa-rotate-left"></i></div>
                        <span style="color: var(--danger); font-weight: 600; font-size: 14px;"><i class="fa-solid fa-arrow-trend-up"></i> +1%</span>
                    </div>
                    <div>
                        <div class="stat-value">12</div>
                        <div class="stat-label">Đơn hoàn/hủy</div>
                    </div>
                </div>
            </div>

            <div class="charts-grid">
                <div class="chart-card">
                    <div class="chart-header">
                        <div class="chart-title">Biểu đồ doanh thu</div>
                        <div style="font-size: 14px; color: var(--gray-500);">Đơn vị: Triệu VNĐ</div>
                    </div>
                    <div class="chart-placeholder">
                        <i class="fa-solid fa-chart-column" style="font-size: 48px; color: var(--gray-300);"></i>
                        <p>Dữ liệu biểu đồ doanh thu đang được cập nhật</p>
                    </div>
                </div>
                
                <div class="chart-card">
                    <div class="chart-header">
                        <div class="chart-title">Top Khách Hàng</div>
                    </div>
                    <div>
                        <div style="display: flex; align-items: center; justify-content: space-between; padding: 12px 0; border-bottom: 1px solid var(--gray-100);">
                            <div style="display: flex; align-items: center; gap: 12px;">
                                <div style="width: 32px; height: 32px; background: var(--gray-200); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 600; font-size: 12px;">1</div>
                                <div>
                                    <div style="font-weight: 600; font-size: 14px; color: var(--gray-900);">Nguyễn Văn A</div>
                                    <div style="font-size: 12px; color: var(--gray-500);">12 Đơn hàng</div>
                                </div>
                            </div>
                            <div style="font-weight: 700; color: var(--primary);">14.5M</div>
                        </div>
                        
                        <div style="display: flex; align-items: center; justify-content: space-between; padding: 12px 0; border-bottom: 1px solid var(--gray-100);">
                            <div style="display: flex; align-items: center; gap: 12px;">
                                <div style="width: 32px; height: 32px; background: var(--gray-200); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 600; font-size: 12px;">2</div>
                                <div>
                                    <div style="font-weight: 600; font-size: 14px; color: var(--gray-900);">Trần Thị B</div>
                                    <div style="font-size: 12px; color: var(--gray-500);">8 Đơn hàng</div>
                                </div>
                            </div>
                            <div style="font-weight: 700; color: var(--primary);">9.2M</div>
                        </div>
                        
                        <div style="display: flex; align-items: center; justify-content: space-between; padding: 12px 0;">
                            <div style="display: flex; align-items: center; gap: 12px;">
                                <div style="width: 32px; height: 32px; background: var(--gray-200); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 600; font-size: 12px;">3</div>
                                <div>
                                    <div style="font-weight: 600; font-size: 14px; color: var(--gray-900);">Lê Văn C</div>
                                    <div style="font-size: 12px; color: var(--gray-500);">5 Đơn hàng</div>
                                </div>
                            </div>
                            <div style="font-weight: 700; color: var(--primary);">5.1M</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
</body>
</html>
