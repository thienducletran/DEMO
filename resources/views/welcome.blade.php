<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechStore - Sàn Thương Mại Điện Tử</title>
    <meta name="description" content="TechStore - Mua sắm điện thoại, laptop, linh kiện điện tử chính hãng với giá tốt nhất.">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Vanilla CSS Implementation */
        :root {
            --primary-blue: #0A66C2;
            --primary-blue-hover: #004182;
            --accent-orange: #FF5722;
            --bg-color: #F3F4F6;
            --card-bg: #FFFFFF;
            --text-main: #1F2937;
            --text-muted: #6B7280;
            --border-color: #E5E7EB;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-hover: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --radius-md: 8px;
            --radius-lg: 12px;
            --radius-full: 9999px;
            --transition: all 0.3s ease;
        }

        [data-theme="dark"] {
            --primary-blue: #3B82F6;
            --bg-color: #111827;
            --card-bg: #1F2937;
            --text-main: #F9FAFB;
            --text-muted: #9CA3AF;
            --border-color: #374151;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-main);
            transition: var(--transition);
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        ul {
            list-style: none;
        }

        /* Top Bar */
        .top-bar {
            background-color: var(--primary-blue);
            color: white;
            text-align: center;
            padding: 8px 15px;
            font-size: 0.875rem;
            font-weight: 500;
        }

        /* Header */
        .header {
            background-color: var(--card-bg);
            border-bottom: 1px solid var(--border-color);
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: var(--shadow-sm);
        }

        .header-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 15px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .logo {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--primary-blue);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .search-bar {
            flex: 1;
            max-width: 600px;
            display: flex;
            align-items: center;
            background-color: var(--bg-color);
            border-radius: var(--radius-full);
            padding: 5px 20px;
            border: 1px solid var(--border-color);
            transition: var(--transition);
        }

        .search-bar:focus-within {
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 3px rgba(10, 102, 194, 0.1);
        }

        .search-bar input {
            flex: 1;
            border: none;
            background: transparent;
            padding: 10px;
            outline: none;
            color: var(--text-main);
        }

        .search-bar button {
            background: none;
            border: none;
            color: var(--primary-blue);
            cursor: pointer;
            font-size: 1.1rem;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .action-icon {
            color: var(--text-main);
            font-size: 1.25rem;
            cursor: pointer;
            position: relative;
            transition: var(--transition);
        }

        .action-icon:hover {
            color: var(--primary-blue);
        }

        .badge {
            position: absolute;
            top: -5px;
            right: -8px;
            background-color: var(--accent-orange);
            color: white;
            font-size: 0.65rem;
            font-weight: bold;
            padding: 2px 6px;
            border-radius: var(--radius-full);
        }

        /* Navigation */
        .nav {
            background-color: var(--card-bg);
            border-bottom: 1px solid var(--border-color);
        }

        .nav-list {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            gap: 30px;
            padding: 12px 20px;
            overflow-x: auto;
            white-space: nowrap;
            scrollbar-width: none;
        }

        .nav-list::-webkit-scrollbar {
            display: none;
        }

        .nav-item {
            font-weight: 500;
            color: var(--text-main);
            transition: var(--transition);
            cursor: pointer;
        }

        .nav-item:hover {
            color: var(--primary-blue);
        }

        /* Main Content */
        .main-content {
            max-width: 1200px;
            margin: 20px auto;
            padding: 0 20px;
        }

        /* User Dropdown */
        .user-menu-container { position: relative; display: inline-block; }
        .user-dropdown {
            position: absolute; top: 100%; right: 0;
            background: var(--card-bg); min-width: 160px;
            box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1);
            border-radius: var(--radius-md); padding: 8px 0;
            display: none; z-index: 100;
            border: 1px solid var(--border-color);
        }
        .user-menu-container:hover .user-dropdown { display: block; animation: fadeIn 0.2s ease; }
        .user-dropdown-item {
            display: block; padding: 10px 20px;
            color: var(--text-main); text-decoration: none;
            font-size: 0.95rem; font-weight: 500;
            transition: var(--transition);
        }
        .user-dropdown-item:hover { background: #f3f4f6; color: var(--primary-blue); }

        /* Hero Section */
        .hero-section {
            display: flex;
            flex-direction: column;
            gap: 20px;
            margin-bottom: 30px;
        }

        .hero-banner {
            border-radius: var(--radius-lg);
            overflow: hidden;
            position: relative;
            background: linear-gradient(135deg, #0A66C2 0%, #004182 100%);
            color: white;
            padding: 60px 40px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: var(--shadow-md);
        }

        .hero-banner-content {
            max-width: 50%;
        }

        .hero-banner-content h2 {
            font-size: 2.5rem;
            margin-bottom: 10px;
            font-weight: 700;
        }

        .hero-banner-content p {
            font-size: 1.2rem;
            margin-bottom: 20px;
            opacity: 0.9;
        }

        .btn {
            padding: 12px 24px;
            border-radius: var(--radius-full);
            font-weight: 600;
            cursor: pointer;
            border: none;
            transition: var(--transition);
        }

        .btn-primary {
            background-color: var(--accent-orange);
            color: white;
        }

        .btn-primary:hover {
            background-color: #E64A19;
            transform: translateY(-2px);
        }

        .hero-image {
            max-width: 300px;
            object-fit: contain;
            filter: drop-shadow(0 20px 13px rgba(0,0,0,0.3));
        }

        /* Categories Icon Grid */
        .category-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
            gap: 15px;
            margin-bottom: 30px;
        }

        .category-item {
            background-color: var(--card-bg);
            border-radius: var(--radius-lg);
            padding: 20px 10px;
            text-align: center;
            cursor: pointer;
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
        }

        .category-item:hover, .category-item.active {
            transform: translateY(-5px);
            box-shadow: var(--shadow-md);
            color: var(--primary-blue);
            border: 1px solid var(--primary-blue);
        }

        .category-item i {
            font-size: 2rem;
            color: var(--primary-blue);
            margin-bottom: 10px;
        }

        .category-item span {
            display: block;
            font-size: 0.85rem;
            font-weight: 500;
        }

        /* Trust Badges */
        .trust-badges {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            background-color: var(--card-bg);
            padding: 20px;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-sm);
            margin-bottom: 40px;
        }

        .badge-item {
            display: flex;
            align-items: center;
            gap: 12px;
            flex: 1;
        }

        .badge-item i {
            font-size: 2rem;
            color: var(--primary-blue);
        }

        .badge-item div h4 {
            font-size: 0.95rem;
            margin-bottom: 2px;
        }

        .badge-item div p {
            font-size: 0.8rem;
            color: var(--text-muted);
        }

        /* Product Section */
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .section-title {
            font-size: 1.5rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .view-all {
            color: var(--primary-blue);
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .view-all:hover {
            text-decoration: underline;
        }

        /* Flash Sale */
        .flash-sale {
            background-color: #FFF3E0;
            padding: 30px;
            border-radius: var(--radius-lg);
            margin-bottom: 40px;
        }

        [data-theme="dark"] .flash-sale {
            background-color: #2D3748;
        }

        .flash-sale-header {
            background-color: var(--accent-orange);
            color: white;
            padding: 15px 20px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        .flash-sale-header h3 {
            font-size: 1.5rem;
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 0;
        }

        .countdown {
            display: flex;
            gap: 10px;
        }

        .time-box {
            background-color: rgba(0,0,0,0.2);
            padding: 5px 10px;
            border-radius: 4px;
            font-weight: bold;
            font-family: monospace;
            font-size: 1.2rem;
        }

        /* Product Carousel */
        .product-carousel {
            display: flex;
            gap: 20px;
            overflow-x: auto;
            padding-bottom: 10px;
            scrollbar-width: thin;
        }

        .product-carousel::-webkit-scrollbar {
            height: 8px;
        }
        .product-carousel::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }

        /* Product Card */
        .product-card {
            background-color: var(--card-bg);
            border-radius: var(--radius-md);
            overflow: hidden;
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
            min-width: 240px;
            max-width: 240px;
            flex-shrink: 0;
            position: relative;
            border: 1px solid var(--border-color);
            cursor: pointer;
        }

        .product-card:hover {
            box-shadow: var(--shadow-hover);
            transform: translateY(-5px);
        }

        .card-tag {
            position: absolute;
            top: 10px;
            left: 10px;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 0.75rem;
            font-weight: bold;
            color: white;
            z-index: 1;
        }

        .tag-discount {
            background-color: var(--accent-orange);
        }

        .tag-new {
            background-color: #10B981;
        }

        .btn-heart {
            position: absolute;
            top: 10px;
            right: 10px;
            background: rgba(255,255,255,0.8);
            border: none;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            color: var(--text-muted);
            transition: var(--transition);
            z-index: 1;
        }

        .btn-heart:hover {
            color: #EF4444;
            background: white;
        }

        .product-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            padding: 10px;
            background-color: white; /* Keep white for images */
        }

        .product-info {
            padding: 15px;
        }

        .product-name {
            font-size: 0.95rem;
            font-weight: 500;
            margin-bottom: 8px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            height: 40px;
        }

        .stars {
            color: #FBBF24;
            font-size: 0.8rem;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .rating-count {
            color: var(--text-muted);
        }

        .price-container {
            display: flex;
            flex-direction: column;
        }

        .current-price {
            color: var(--primary-blue);
            font-weight: 700;
            font-size: 1.1rem;
        }

        .old-price {
            text-decoration: line-through;
            color: var(--text-muted);
            font-size: 0.85rem;
            margin-top: 2px;
        }

        /* Floating Buttons */
        .floating-buttons {
            position: fixed;
            bottom: 30px;
            right: 30px;
            display: flex;
            flex-direction: column;
            gap: 15px;
            z-index: 100;
        }

        .float-btn {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: var(--primary-blue);
            color: white;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            cursor: pointer;
            box-shadow: 0 4px 10px rgba(10, 102, 194, 0.4);
            transition: var(--transition);
        }

        .float-btn:hover {
            transform: scale(1.1);
            background-color: var(--primary-blue-hover);
        }

        /* Footer */
        footer {
            background-color: var(--card-bg);
            border-top: 1px solid var(--border-color);
            padding: 40px 0 20px;
            margin-top: 50px;
            text-align: center;
            color: var(--text-muted);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .header-container {
                flex-wrap: wrap;
            }
            .search-bar {
                order: 3;
                max-width: 100%;
                min-width: 100%;
            }
            .hero-banner {
                flex-direction: column;
                text-align: center;
                padding: 30px 20px;
            }
            .hero-banner-content {
                max-width: 100%;
            }
            .trust-badges {
                flex-wrap: wrap;
            }
            .badge-item {
                min-width: 45%;
            }
            .flash-sale-header {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>
</head>
<body>
    <!-- Top Bar -->
    <div class="top-bar">
        <span>🚀 Chính sách vận chuyển: Miễn phí giao hàng toàn quốc cho đơn từ 500.000đ - Đổi trả trong vòng 7 ngày!</span>
    </div>

    <!-- Header -->
    <header class="header">
        <div class="header-container">
            <a href="#" class="logo">
                <i class="fa-solid fa-microchip"></i> TechStore
            </a>
            
            <div class="search-bar">
                <input type="text" placeholder="Tìm kiếm điện thoại, laptop, phụ kiện...">
                <button type="button"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>

            <div class="header-actions">
                <div class="action-icon" title="Sáng/Tối" onclick="toggleTheme()">
                    <i class="fa-solid fa-moon" id="theme-icon"></i>
                </div>
                <div class="action-icon" title="Thông báo">
                    <i class="fa-regular fa-bell"></i>
                </div>
                <div class="action-icon" title="Tin nhắn">
                    <i class="fa-regular fa-comment-dots"></i>
                </div>

                <div class="action-icon" title="Giỏ hàng" onclick="window.location.href='/cart'">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span class="badge" id="cartBadge" style="display: none;">0</span>
                </div>
                <div class="user-menu-container">
                    <div class="action-icon" title="Tài khoản">
                        <i class="fa-regular fa-user"></i>
                    </div>
                    <div class="user-dropdown">
                        @auth
                            @if(Auth::user()->role === 'admin')
                                <a href="/admin" class="user-dropdown-item"><i class="fa-solid fa-chart-pie" style="margin-right:8px"></i> Trang quản trị</a>
                            @elseif(Auth::user()->role === 'manager')
                                <a href="/manager" class="user-dropdown-item"><i class="fa-solid fa-store" style="margin-right:8px"></i> Quản lý cửa hàng</a>
                            @else
                                <a href="/dashboard" class="user-dropdown-item"><i class="fa-solid fa-user" style="margin-right:8px"></i> Tài khoản của tôi</a>
                            @endif
                            <form method="POST" action="/logout" style="margin: 0; padding: 0;">
                                @csrf
                                <button type="submit" class="user-dropdown-item" style="width: 100%; text-align: left; background: none; border: none; cursor: pointer; color: inherit; font: inherit;"><i class="fa-solid fa-arrow-right-from-bracket" style="margin-right:8px"></i> Đăng xuất</button>
                            </form>
                        @else
                            <a href="/login" class="user-dropdown-item"><i class="fa-solid fa-arrow-right-to-bracket" style="margin-right:8px"></i> Đăng nhập</a>
                            <a href="/login#form-register" class="user-dropdown-item"><i class="fa-solid fa-user-plus" style="margin-right:8px"></i> Đăng ký</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Navigation -->
    <nav class="nav">
        <ul class="nav-list">
            <li class="nav-item"><a href="/" style="color: inherit;"><i class="fa-solid fa-bars" style="margin-right:8px"></i> Danh mục sản phẩm</a></li>
            <li class="nav-item">Điện thoại</li>
            <li class="nav-item"><a href="/?category=laptop" style="color: inherit;">Laptop</a></li>
            <li class="nav-item">Máy tính bảng</li>
            <li class="nav-item">PC - Linh kiện</li>
            <li class="nav-item">Âm thanh</li>
            <li class="nav-item">Phụ kiện</li>
            <li class="nav-item" style="color: var(--accent-orange); font-weight: bold;"><i class="fa-solid fa-bolt"></i> Khuyến mãi</li>
        </ul>
    </nav>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Hero Section -->
        <section class="hero-section">
            @if(isset($banners) && count($banners) > 0)
                @php $banner = $banners->first(); @endphp
                <div class="hero-banner" style="{{ $banner->bg_gradient_light ? 'background: ' . $banner->bg_gradient_light . ';' : '' }}">
                    <div class="hero-banner-content">
                        @if($banner->highlight)
                            <div style="background: var(--primary-blue); color: white; display: inline-block; padding: 4px 10px; border-radius: 6px; font-size: 13px; font-weight: bold; margin-bottom: 12px;">{{ $banner->highlight }}</div>
                        @endif
                        <h2>{{ $banner->title ?? 'Tuần Lễ Công Nghệ' }}</h2>
                        <p>{{ $banner->subtitle }}</p>
                        <a href="{{ $banner->link ?? '#' }}" class="btn btn-primary">{{ $banner->button_text ?? 'Mua Ngay' }} <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                    @if($banner->image)
                        <img src="{{ $banner->image }}" alt="{{ $banner->title }}" class="hero-image" style="border-radius: 12px; height: 100%; object-fit: cover;">
                    @else
                        <img src="https://images.unsplash.com/photo-1593642632823-8f785ba67e45?auto=format&fit=crop&q=80&w=400" alt="Technology Weekly Sale" class="hero-image" style="border-radius: 12px; height: 100%; object-fit: cover;">
                    @endif
                </div>
            @else
                <div class="hero-banner">
                    <div class="hero-banner-content">
                        <h2>Tuần Lễ Công Nghệ 2</h2>
                        <p>Giảm giá lên đến 50% cho tất cả các thiết bị thông minh. Săn deal hot ngay hôm nay!</p>
                        <button class="btn btn-primary">Mua Ngay <i class="fa-solid fa-arrow-right"></i></button>
                    </div>
                    <img src="https://images.unsplash.com/photo-1593642632823-8f785ba67e45?auto=format&fit=crop&q=80&w=400" alt="Technology Weekly Sale" class="hero-image" style="border-radius: 12px;">
                </div>
            @endif

            <!-- Categories -->
            <div class="category-grid">
                <div class="category-item {{ request('category') == 'dien-thoai' ? 'active' : '' }}" onclick="window.location.href='/?category=dien-thoai'"><i class="fa-solid fa-mobile-screen-button"></i><span>Điện thoại</span></div>
                <div class="category-item {{ request('category') == 'laptop' ? 'active' : '' }}" onclick="window.location.href='/?category=laptop'"><i class="fa-solid fa-laptop"></i><span>Laptop</span></div>
                <div class="category-item {{ request('category') == 'may-tinh-bang' ? 'active' : '' }}" onclick="window.location.href='/?category=may-tinh-bang'"><i class="fa-solid fa-tablet-screen-button"></i><span>Máy tính bảng</span></div>
                <div class="category-item {{ request('category') == 'pc' ? 'active' : '' }}" onclick="window.location.href='/?category=pc'"><i class="fa-solid fa-desktop"></i><span>PC - Linh kiện</span></div>
                <div class="category-item {{ request('category') == 'tai-nghe' ? 'active' : '' }}" onclick="window.location.href='/?category=tai-nghe'"><i class="fa-solid fa-headphones-simple"></i><span>Tai nghe</span></div>
                <div class="category-item {{ request('category') == 'phu-kien' ? 'active' : '' }}" onclick="window.location.href='/?category=phu-kien'"><i class="fa-solid fa-keyboard"></i><span>Phụ kiện</span></div>
                <div class="category-item {{ request('category') == 'dong-ho' ? 'active' : '' }}" onclick="window.location.href='/?category=dong-ho'"><i class="fa-regular fa-clock"></i><span>Đồng hồ</span></div>
                <div class="category-item" onclick="window.location.href='/'" style="{{ !request('category') ? 'color: var(--primary-blue); border: 1px solid var(--primary-blue);' : '' }}"><i class="fa-solid fa-layer-group"></i><span>Tất cả SP</span></div>
            </div>
        </section>

        <!-- Trust Badges -->
        <div class="trust-badges">
            <div class="badge-item">
                <i class="fa-solid fa-truck-fast"></i>
                <div>
                    <h4>Giao hàng nhanh</h4>
                    <p>Miễn phí toàn quốc</p>
                </div>
            </div>
            <div class="badge-item">
                <i class="fa-solid fa-arrow-rotate-left"></i>
                <div>
                    <h4>Đổi trả 7 ngày</h4>
                    <p>Thủ tục đơn giản</p>
                </div>
            </div>
            <div class="badge-item">
                <i class="fa-solid fa-credit-card"></i>
                <div>
                    <h4>Thanh toán linh hoạt</h4>
                    <p>Ví, Thẻ, COD</p>
                </div>
            </div>
            <div class="badge-item">
                <i class="fa-solid fa-headset"></i>
                <div>
                    <h4>Hỗ trợ 24/7</h4>
                    <p>Sẵn sàng giải đáp</p>
                </div>
            </div>
        </div>

        <!-- Flash Sale -->
        <section class="flash-sale">
            <div class="flash-sale-header">
                <h3><i class="fa-solid fa-bolt" style="color:#FFD700"></i> FLASH SALE HOT</h3>
                <div class="countdown">
                    <span class="time-box">02</span> :
                    <span class="time-box">45</span> :
                    <span class="time-box">30</span>
                </div>
            </div>
            
            <div class="product-carousel">
                @forelse($products as $product)
                <!-- Product Dynamic -->
                <div class="product-card" onclick="window.location.href='/product/{{ $product->slug }}'">
                    @if($product->old_price)
                        @php
                            $discount = round((($product->old_price - $product->price) / $product->old_price) * 100);
                        @endphp
                        <span class="card-tag tag-discount">-{{ $discount }}%</span>
                    @endif
                    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="product-img">
                    <div class="product-info">
                        <h4 class="product-name">{{ $product->name }}</h4>
                        <div class="stars">
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= floor($product->rating))
                                    <i class="fa-solid fa-star"></i>
                                @elseif($i - 0.5 == $product->rating)
                                    <i class="fa-solid fa-star-half-stroke"></i>
                                @else
                                    <i class="fa-regular fa-star"></i>
                                @endif
                            @endfor
                            <span class="rating-count">({{ $product->reviews }})</span>
                        </div>
                        <div class="price-container">
                            <span class="current-price">{{ number_format($product->price, 0, ',', '.') }}đ</span>
                            @if($product->old_price)
                            <span class="old-price">{{ number_format($product->old_price, 0, ',', '.') }}đ</span>
                            @endif
                        </div>
                    </div>
                </div>
                @empty
                    <p style="padding: 20px; font-size: 1.1rem; color: var(--text-muted);">Không tìm thấy sản phẩm nào trong danh mục này.</p>
                @endforelse
            </div>
        </section>

        <!-- New Arrivals -->
        <section style="margin-bottom: 40px;">
            <div class="section-header">
                <h3 class="section-title">Hàng mới về</h3>
                <div style="display:flex; gap:10px;">
                    <button class="btn" style="padding:8px 12px; background:var(--card-bg); border:1px solid var(--border-color); border-radius:50%;"><i class="fa-solid fa-chevron-left"></i></button>
                    <button class="btn" style="padding:8px 12px; background:var(--card-bg); border:1px solid var(--border-color); border-radius:50%;"><i class="fa-solid fa-chevron-right"></i></button>
                </div>
            </div>
            
            <div class="product-carousel">
                @forelse($products->take(6) as $product)
                <!-- Product Dynamic -->
                <div class="product-card" onclick="window.location.href='/product/{{ $product->slug }}'">
                    <span class="card-tag tag-new">Mới</span>
                    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="product-img">
                    <div class="product-info">
                        <h4 class="product-name">{{ $product->name }}</h4>
                        <div class="stars">
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= floor($product->rating))
                                    <i class="fa-solid fa-star"></i>
                                @elseif($i - 0.5 == $product->rating)
                                    <i class="fa-solid fa-star-half-stroke"></i>
                                @else
                                    <i class="fa-regular fa-star"></i>
                                @endif
                            @endfor
                            <span class="rating-count">({{ $product->reviews }})</span>
                        </div>
                        <div class="price-container">
                            <span class="current-price">{{ number_format($product->price, 0, ',', '.') }}đ</span>
                        </div>
                    </div>
                </div>
                @empty
                    <p style="padding: 20px; font-size: 1.1rem; color: var(--text-muted);">Không tìm thấy sản phẩm nào trong danh mục này.</p>
                @endforelse
            </div>
        </section>

        <!-- Suggestions Section -->
        <section style="margin-bottom: 40px;">
            <div class="section-header">
                <h3 class="section-title">Gợi ý cho bạn</h3>
                <a href="#" class="view-all">Xem tất cả <i class="fa-solid fa-arrow-right"></i></a>
            </div>
            
            <div class="product-carousel">
                @forelse($products->reverse()->take(6) as $product)
                <!-- Product Dynamic -->
                <div class="product-card" onclick="window.location.href='/product/{{ $product->slug }}'">
                    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="product-img">
                    <div class="product-info">
                        <h4 class="product-name">{{ $product->name }}</h4>
                        <div class="stars">
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= floor($product->rating))
                                    <i class="fa-solid fa-star"></i>
                                @elseif($i - 0.5 == $product->rating)
                                    <i class="fa-solid fa-star-half-stroke"></i>
                                @else
                                    <i class="fa-regular fa-star"></i>
                                @endif
                            @endfor
                            <span class="rating-count">({{ $product->reviews }})</span>
                        </div>
                        <div class="price-container">
                            <span class="current-price">{{ number_format($product->price, 0, ',', '.') }}đ</span>
                            @if($product->old_price)
                            <span class="old-price">{{ number_format($product->old_price, 0, ',', '.') }}đ</span>
                            @endif
                        </div>
                    </div>
                </div>
                @empty
                    <p style="padding: 20px; font-size: 1.1rem; color: var(--text-muted);">Không tìm thấy sản phẩm nào trong danh mục này.</p>
                @endforelse
            </div>
        </section>
    </main>

    <!-- Floating Action Buttons -->
    <div class="floating-buttons">
        <button class="float-btn" title="Chatbot Hỗ Trợ"><i class="fa-solid fa-comment-dots"></i></button>
        <button class="float-btn" title="Lên Đầu Trang" onclick="window.scrollTo({top: 0, behavior: 'smooth'})"><i class="fa-solid fa-chevron-up"></i></button>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2026 TechStore. Tất cả các quyền được bảo lưu.</p>
    </footer>

    <!-- Scripts -->
    <script>
        // Hàm chuyển đổi giao diện Sáng / Tối (Light/Dark Mode)
        function toggleTheme() {
            // Lấy phần tử body của trang web
            const body = document.body;
            // Lấy icon mặt trăng/mặt trời thông qua ID 'theme-icon'
            const icon = document.getElementById('theme-icon');
            
            // Kiểm tra xem trang web đang ở giao diện tối (dark theme) hay không
            if (body.getAttribute('data-theme') === 'dark') {
                // Nếu đang ở giao diện tối -> gỡ bỏ thuộc tính 'data-theme' để về giao diện sáng
                body.removeAttribute('data-theme');
                // Đổi icon thành hình mặt trăng (biểu tượng cho việc có thể chuyển sang chế độ tối)
                icon.className = 'fa-solid fa-moon';
            } else {
                // Nếu đang ở giao diện sáng -> thêm thuộc tính 'data-theme' với giá trị 'dark'
                body.setAttribute('data-theme', 'dark');
                // Đổi icon thành hình mặt trời (biểu tượng cho việc có thể chuyển về chế độ sáng)
                icon.className = 'fa-solid fa-sun';
            }
        }
        
        // Hàm đếm ngược thời gian (Countdown Timer) cho phần Flash Sale
        // setInterval sẽ chạy lặp lại hàm bên trong mỗi 1000 mili-giây (1 giây)
        setInterval(() => {
            // Lấy tất cả các ô chứa số thời gian (Giờ, Phút, Giây) có class là 'time-box'
            const boxes = document.querySelectorAll('.time-box');
            
            // Chuyển đổi nội dung text của từng ô sang kiểu số nguyên (integer)
            // boxes[2] là ô Giây, boxes[1] là ô Phút, boxes[0] là ô Giờ
            let s = parseInt(boxes[2].innerText);
            let m = parseInt(boxes[1].innerText);
            let h = parseInt(boxes[0].innerText);
            
            // Trừ đi 1 giây
            s--;
            
            // Nếu giây giảm xuống dưới 0 (hết 60 giây)
            if (s < 0) {
                s = 59; // Reset lại giây về 59
                m--;    // Trừ đi 1 phút
                
                // Nếu phút giảm xuống dưới 0 (hết 60 phút)
                if (m < 0) {
                    m = 59; // Reset lại phút về 59
                    h--;    // Trừ đi 1 giờ
                    
                    // Nếu giờ giảm xuống dưới 0 (hết thời gian đếm ngược)
                    if(h < 0) { 
                        // Cài đặt lại thời gian mặc định để bộ đếm tiếp tục chạy mô phỏng (Demo)
                        h = 2; 
                        m = 45; 
                        s = 30; 
                    }
                }
            }
            
            // Cập nhật lại số liệu hiển thị trên giao diện
            // Phương thức .toString().padStart(2, '0') giúp thêm số '0' ở trước nếu số nhỏ hơn 10 (vd: 09, 08)
            boxes[2].innerText = s.toString().padStart(2, '0'); // Cập nhật ô Giây
            boxes[1].innerText = m.toString().padStart(2, '0'); // Cập nhật ô Phút
            boxes[0].innerText = h.toString().padStart(2, '0'); // Cập nhật ô Giờ
        }, 1000); // 1000 mili-giây = 1 giây
    </script>
</body>
</html>
