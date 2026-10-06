<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết Đơn hàng - Admin TechStore</title>
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
        .page-subtitle { color: var(--gray-500); font-size: 14px; }

        .btn { padding: 10px 16px; border-radius: 8px; font-family: 'Inter', sans-serif; font-size: 14px; font-weight: 600; cursor: pointer; transition: all 0.2s; border: none; display: flex; align-items: center; gap: 8px; text-decoration: none;}
        .btn-outline { background: white; border: 1px solid var(--gray-300); color: var(--gray-700); }
        .btn-outline:hover { background: var(--gray-50); color: var(--gray-900); }
        .btn-primary { background: var(--primary); color: white; }
        .btn-primary:hover { background: #4338CA; }

        /* Order Details Layout */
        .order-grid { display: grid; grid-template-columns: 2fr 1fr; gap: 24px; }
        .card { background: white; border-radius: 16px; border: 1px solid var(--gray-200); box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05); padding: 24px; margin-bottom: 24px; }
        .card-title { font-size: 16px; font-weight: 700; color: var(--gray-900); margin-bottom: 16px; display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid var(--gray-100); padding-bottom: 16px;}
        
        .info-row { display: flex; justify-content: space-between; margin-bottom: 12px; font-size: 14px; }
        .info-label { color: var(--gray-500); }
        .info-value { font-weight: 600; color: var(--gray-900); text-align: right; }
        
        /* Items Table */
        table { width: 100%; border-collapse: collapse; }
        th { padding: 12px 16px; text-align: left; font-size: 12px; font-weight: 600; color: var(--gray-500); border-bottom: 1px solid var(--gray-200); background: var(--gray-50); }
        td { padding: 16px; vertical-align: middle; border-bottom: 1px solid var(--gray-100); font-size: 14px; color: var(--gray-700); }
        
        .product-img { width: 64px; height: 64px; object-fit: contain; border-radius: 8px; border: 1px solid var(--gray-200); background: var(--gray-50); padding: 4px; }
        
        .badge { display: inline-flex; align-items: center; padding: 4px 10px; border-radius: 6px; font-size: 12px; font-weight: 600; }
        .badge.pending { background: var(--warning-bg); color: var(--warning); }
        .badge.processing { background: var(--info-bg); color: var(--info); }
        .badge.shipped { background: var(--primary-light); color: var(--primary); }
        .badge.delivered { background: var(--success-bg); color: var(--success); }
        .badge.cancelled { background: var(--danger-bg); color: var(--danger); }
        .badge.returned { background: var(--gray-200); color: var(--gray-700); }

        .status-form { display: flex; gap: 12px; }
        .status-select { padding: 8px 12px; border: 1px solid var(--gray-300); border-radius: 6px; font-family: 'Inter'; font-size: 14px; outline: none; flex: 1; }
    </style>
</head>
<body>

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
            <a href="/admin/orders" class="nav-item active">
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
            @if(session('success'))
            <div style="padding: 16px; background: var(--success-bg); color: var(--success); border-radius: 8px; margin-bottom: 24px; font-weight: 500;">
                <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
            </div>
            @endif

            <div class="page-header">
                <div>
                    <h1 class="page-title">Chi tiết Đơn hàng: {{ $order->order_code ?? '#ORD-'.str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</h1>
                    <p class="page-subtitle">Ngày đặt: {{ $order->created_at->format('d/m/Y H:i') }}</p>
                </div>
                <div style="display: flex; gap: 12px;">
                    <a href="{{ route('orders.index') }}" class="btn btn-outline"><i class="fa-solid fa-arrow-left"></i> Quay lại</a>
                </div>
            </div>

            <div class="order-grid">
                <!-- Trái: Danh sách SP -->
                <div>
                    <div class="card" style="padding: 0;">
                        <div class="card-title" style="padding: 24px 24px 16px; margin: 0;">Sản phẩm trong đơn</div>
                        <table>
                            <thead>
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th>Giá</th>
                                    <th>SL</th>
                                    <th style="text-align: right;">Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($order->items && count($order->items) > 0)
                                    @foreach($order->items as $item)
                                    <tr>
                                        <td>
                                            <div style="display: flex; align-items: center; gap: 12px;">
                                                <img src="{{ $item->product->image ?? 'https://via.placeholder.com/64' }}" class="product-img">
                                                <div>
                                                    <div style="font-weight: 600; color: var(--gray-900);">{{ $item->product->name ?? 'Sản phẩm đã bị xóa' }}</div>
                                                    <div style="font-size: 12px; color: var(--gray-500);">SKU: {{ $item->product->sku ?? 'N/A' }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ number_format($item->price, 0, ',', '.') }}đ</td>
                                        <td>x{{ $item->quantity }}</td>
                                        <td style="text-align: right; font-weight: 600; color: var(--primary);">{{ number_format($item->price * $item->quantity, 0, ',', '.') }}đ</td>
                                    </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4" style="text-align: center; padding: 24px;">Không có dữ liệu sản phẩm</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        
                        <!-- Tổng tiền section -->
                        <div style="padding: 24px; border-top: 1px solid var(--gray-200); background: #FAFAFA; border-radius: 0 0 16px 16px;">
                            <div class="info-row">
                                <span class="info-label">Tạm tính:</span>
                                <span class="info-value">{{ number_format($order->total_price, 0, ',', '.') }}đ</span>
                            </div>
                            <div class="info-row">
                                <span class="info-label">Phí vận chuyển:</span>
                                <span class="info-value">+{{ number_format($order->shipping_fee ?? 0, 0, ',', '.') }}đ</span>
                            </div>
                            <div class="info-row">
                                <span class="info-label">Giảm giá:</span>
                                <span class="info-value" style="color: var(--danger);">-{{ number_format($order->discount_amount ?? 0, 0, ',', '.') }}đ</span>
                            </div>
                            <div class="info-row" style="border-top: 1px dashed var(--gray-300); padding-top: 16px; margin-top: 16px;">
                                <span class="info-label" style="font-size: 16px; font-weight: 700; color: var(--gray-900);">Tổng thanh toán:</span>
                                <span class="info-value" style="font-size: 20px; color: var(--primary);">{{ number_format($order->total_price + ($order->shipping_fee ?? 0) - ($order->discount_amount ?? 0), 0, ',', '.') }}đ</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Phải: Thông tin & Trạng thái -->
                <div>
                    <!-- Update Status -->
                    <div class="card">
                        <div class="card-title">Trạng thái đơn hàng</div>
                        <form action="{{ route('orders.update', $order->id) }}" method="POST" class="status-form">
                            @csrf
                            @method('PUT')
                            <select name="status" class="status-select">
                                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Chờ xác nhận</option>
                                <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Đang chuẩn bị hàng</option>
                                <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Đang giao</option>
                                <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Đã giao</option>
                                <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Đã hủy</option>
                                <option value="returned" {{ $order->status == 'returned' ? 'selected' : '' }}>Hoàn trả</option>
                            </select>
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </form>
                    </div>

                    <!-- Customer Info -->
                    <div class="card">
                        <div class="card-title">Thông tin khách hàng</div>
                        <div class="info-row">
                            <span class="info-label">Tên:</span>
                            <span class="info-value">{{ $order->customer_name ?? ($order->user->name ?? 'N/A') }}</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">SĐT:</span>
                            <span class="info-value">{{ $order->customer_phone ?? 'N/A' }}</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Email:</span>
                            <span class="info-value">{{ $order->user->email ?? 'N/A' }}</span>
                        </div>
                    </div>

                    <!-- Shipping & Payment -->
                    <div class="card">
                        <div class="card-title">Vận chuyển & Thanh toán</div>
                        <div class="info-row" style="flex-direction: column; text-align: left;">
                            <span class="info-label" style="margin-bottom: 8px;">Địa chỉ giao hàng:</span>
                            <span class="info-value" style="text-align: left; font-weight: 500;">
                                {{ $order->shipping_address ?? 'Không có địa chỉ' }}
                            </span>
                        </div>
                        <div class="info-row" style="margin-top: 16px; padding-top: 16px; border-top: 1px solid var(--gray-100);">
                            <span class="info-label">Thanh toán:</span>
                            <span class="info-value">
                                @if($order->payment_method == 'cod')
                                    Thanh toán khi nhận hàng (COD)
                                @else
                                    Chuyển khoản / Online
                                @endif
                            </span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
</body>
</html>
