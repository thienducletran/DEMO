<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Khiếu nại - Admin TechStore</title>
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
        
        .btn { padding: 10px 16px; border-radius: 8px; font-family: 'Inter', sans-serif; font-size: 14px; font-weight: 600; cursor: pointer; transition: all 0.2s; border: none; display: flex; align-items: center; gap: 8px; }
        .btn-primary { background: var(--primary); color: white; }
        .btn-primary:hover { background: #4338CA; }
        .btn-update { padding: 6px 12px; border-radius: 6px; border: none; background: var(--primary-light); color: var(--primary); font-family: 'Inter'; font-weight: 600; font-size: 13px; cursor: pointer;}
        .btn-update:hover { background: var(--primary); color: white; }

        /* Tables */
        .card { background: white; border-radius: 16px; border: 1px solid var(--gray-200); box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05); overflow: hidden; margin-bottom: 24px;}
        table { width: 100%; border-collapse: collapse; }
        th { padding: 16px 24px; text-align: left; font-size: 12px; font-weight: 600; color: var(--gray-500); text-transform: uppercase; border-bottom: 1px solid var(--gray-200); background: var(--gray-50); white-space: nowrap; }
        td { padding: 16px 24px; vertical-align: middle; border-bottom: 1px solid var(--gray-100); font-size: 14px; color: var(--gray-700); font-weight: 500;}
        tr:hover td { background: var(--gray-50); }
        
        .form-control { padding: 8px 12px; border: 1px solid var(--gray-300); border-radius: 6px; font-family: 'Inter'; font-size: 13px; outline: none; transition: border-color 0.2s; width: 100%;}
        .form-control:focus { border-color: var(--primary); }
        
        .status-badge { display: inline-flex; align-items: center; padding: 4px 10px; border-radius: 6px; font-size: 12px; font-weight: 600; white-space: nowrap;}
        .status-pending { background: var(--warning-bg); color: var(--warning); }
        .status-processing { background: var(--info-bg); color: var(--info); }
        .status-resolved { background: var(--success-bg); color: var(--success); }
        .status-rejected { background: var(--danger-bg); color: var(--danger); }
        
        .reason-tag { display: inline-block; padding: 4px 8px; background: var(--gray-100); color: var(--gray-700); font-size: 12px; border-radius: 4px; font-weight: 600; margin-bottom: 6px; border: 1px solid var(--gray-200);}
        .description-text { font-size: 13px; color: var(--gray-600); line-height: 1.5; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; font-weight: 400;}
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
            <a href="/admin/reports" class="nav-item">
                <i class="fa-solid fa-chart-line"></i>
                Báo cáo
            </a>
            <a href="/admin/claims" class="nav-item active">
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
                <input type="text" placeholder="Tìm kiếm khiếu nại...">
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
                    <div class="page-icon"><i class="fa-solid fa-scale-balanced"></i></div>
                    <div>
                        <h1 class="page-title">Quản lý Khiếu nại</h1>
                        <p class="page-subtitle">Tổng hợp và xử lý các vấn đề từ phía khách hàng về sản phẩm</p>
                    </div>
                </div>
            </div>

            <div class="card">
                <table>
                    <thead>
                        <tr>
                            <th>Khách hàng</th>
                            <th>Sản phẩm bị khiếu nại</th>
                            <th style="width: 30%;">Nội dung khiếu nại</th>
                            <th>Trạng thái</th>
                            <th>Cập nhật & Ghi chú (Admin)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($claims as $claim)
                        <tr>
                            <td>
                                <div style="font-weight: 600; color: var(--gray-900);">{{ $claim->user->name ?? 'N/A' }}</div>
                                <div style="font-size: 12px; color: var(--gray-500); margin-top: 2px;">{{ $claim->user->email ?? '' }}</div>
                                <div style="font-size: 11px; color: var(--gray-400); margin-top: 4px;">{{ $claim->created_at->format('d/m/Y H:i') }}</div>
                            </td>
                            <td>
                                <div style="font-weight: 600; color: var(--primary);">{{ $claim->product->name ?? 'Sản phẩm đã xóa' }}</div>
                                <div style="font-size: 12px; color: var(--gray-500); margin-top: 2px;">SKU: {{ $claim->product->sku ?? 'N/A' }}</div>
                            </td>
                            <td>
                                <div class="reason-tag"><i class="fa-solid fa-tag" style="margin-right: 4px; color: var(--warning);"></i> {{ $claim->reason }}</div>
                                <div class="description-text">{{ $claim->description }}</div>
                            </td>
                            <td>
                                @if($claim->status == 'pending')
                                    <span class="status-badge status-pending">Chờ xử lý</span>
                                @elseif($claim->status == 'processing')
                                    <span class="status-badge status-processing">Đang xem xét</span>
                                @elseif($claim->status == 'resolved')
                                    <span class="status-badge status-resolved">Đã giải quyết</span>
                                @else
                                    <span class="status-badge status-rejected">Từ chối</span>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('claims.update', $claim->id) }}" method="POST" style="display: flex; flex-direction: column; gap: 8px;">
                                    @csrf
                                    @method('PUT')
                                    <select name="status" class="form-control" style="font-weight: 600;">
                                        <option value="pending" {{ $claim->status == 'pending' ? 'selected' : '' }}>Chờ xử lý</option>
                                        <option value="processing" {{ $claim->status == 'processing' ? 'selected' : '' }}>Đang xem xét</option>
                                        <option value="resolved" {{ $claim->status == 'resolved' ? 'selected' : '' }}>Đã giải quyết</option>
                                        <option value="rejected" {{ $claim->status == 'rejected' ? 'selected' : '' }}>Từ chối</option>
                                    </select>
                                    <div style="display: flex; gap: 8px;">
                                        <input type="text" name="admin_notes" class="form-control" placeholder="Ghi chú nội bộ..." value="{{ $claim->admin_notes }}">
                                        <button type="submit" class="btn-update">Lưu</button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" style="text-align: center; padding: 48px 32px; color: var(--gray-500);">
                                <i class="fa-solid fa-clipboard-check" style="font-size: 32px; color: var(--gray-300); margin-bottom: 16px;"></i><br>
                                Hiện chưa có khiếu nại nào từ khách hàng
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                
                @if(isset($claims) && $claims->hasPages())
                <div style="padding: 16px 24px; border-top: 1px solid var(--gray-200); display: flex; justify-content: center;">
                    {{ $claims->links('pagination::bootstrap-4') }}
                </div>
                @endif
            </div>
        </div>
    </main>
</body>
</html>
