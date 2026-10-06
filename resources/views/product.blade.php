<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apple MacBook Pro 14" M3 Pro - TechStore</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Vanilla CSS - Common Styles */
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

        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Inter', sans-serif; }
        body { background-color: var(--bg-color); color: var(--text-main); transition: var(--transition); }
        a { text-decoration: none; color: inherit; }
        ul { list-style: none; }

        /* Header Styles (Tóm gọn lại từ trang chủ) */
        .top-bar { background-color: var(--primary-blue); color: white; text-align: center; padding: 8px 15px; font-size: 0.875rem; font-weight: 500; }
        .header { background-color: var(--card-bg); border-bottom: 1px solid var(--border-color); position: sticky; top: 0; z-index: 1000; box-shadow: var(--shadow-sm); }
        .header-container { max-width: 1200px; margin: 0 auto; padding: 15px 20px; display: flex; align-items: center; justify-content: space-between; gap: 20px; }
        .logo { font-size: 1.75rem; font-weight: 700; color: var(--primary-blue); display: flex; align-items: center; gap: 8px; }
        .search-bar { flex: 1; max-width: 600px; display: flex; align-items: center; background-color: var(--bg-color); border-radius: var(--radius-full); padding: 5px 20px; border: 1px solid var(--border-color); }
        .search-bar input { flex: 1; border: none; background: transparent; padding: 10px; outline: none; color: var(--text-main); }
        .search-bar button { background: none; border: none; color: var(--primary-blue); cursor: pointer; font-size: 1.1rem; }
        .header-actions { display: flex; align-items: center; gap: 20px; }
        .action-icon { color: var(--text-main); font-size: 1.25rem; cursor: pointer; position: relative; transition: var(--transition); }
        .badge { position: absolute; top: -5px; right: -8px; background-color: var(--accent-orange); color: white; font-size: 0.65rem; font-weight: bold; padding: 2px 6px; border-radius: var(--radius-full); }
        .main-content { max-width: 1200px; margin: 0 auto; padding: 0 20px; }
        
        /* Product Page Specific Styles */
        .breadcrumbs { padding: 20px 0; font-size: 0.9rem; color: var(--text-muted); }
        .breadcrumbs a { color: var(--primary-blue); font-weight: 500; }
        .breadcrumbs a:hover { text-decoration: underline; }
        
        /* Layout: Above the fold */
        .product-container { display: flex; gap: 40px; margin-bottom: 40px; }
        .product-media { flex: 1; max-width: 45%; }
        .product-details { flex: 1; max-width: 55%; }
        
        /* Cột trái (Khu vực Media) */
        .main-image-container { width: 100%; aspect-ratio: 1; background: var(--card-bg); border: 1px solid var(--border-color); border-radius: var(--radius-lg); margin-bottom: 15px; padding: 20px; display: flex; align-items: center; justify-content: center; box-shadow: var(--shadow-sm); }
        .main-image { width: 100%; height: 100%; object-fit: contain; }
        .thumbnail-grid { display: grid; grid-template-columns: repeat(5, 1fr); gap: 10px; }
        .thumbnail { width: 100%; aspect-ratio: 1; object-fit: contain; border: 2px solid transparent; border-radius: var(--radius-md); cursor: pointer; transition: var(--transition); background: var(--card-bg); padding: 5px; }
        .thumbnail.active, .thumbnail:hover { border-color: var(--primary-blue); }
        
        /* Cột phải (Thông tin cốt lõi) */
        .brand { font-size: 0.9rem; color: var(--primary-blue); font-weight: 600; margin-bottom: 5px; display: inline-block; text-transform: uppercase; letter-spacing: 1px; }
        .product-title { font-size: 1.8rem; font-weight: 700; margin-bottom: 12px; line-height: 1.3; color: var(--text-main); }
        
        .ratings { display: flex; align-items: center; gap: 15px; margin-bottom: 20px; font-size: 0.95rem; }
        .stars { color: #FBBF24; display: flex; gap: 2px; }
        .sold-count { color: var(--text-muted); border-left: 1px solid var(--border-color); padding-left: 15px; }
        
        /* Khối thông tin người bán */
        .seller-card { display: flex; align-items: center; justify-content: space-between; background: var(--card-bg); padding: 15px 20px; border-radius: var(--radius-md); border: 1px dashed var(--border-color); margin-bottom: 20px; }
        .seller-info { display: flex; align-items: center; gap: 12px; }
        .seller-avatar { width: 45px; height: 45px; border-radius: 50%; object-fit: cover; border: 1px solid var(--border-color); }
        .seller-name { font-weight: 600; font-size: 1.05rem; display: block; margin-bottom: 3px; }
        .seller-status { font-size: 0.8rem; color: #10B981; font-weight: 500; }
        .seller-status i { margin-right: 4px; }
        .btn-outline-sm { border: 1px solid var(--primary-blue); color: var(--primary-blue); background: transparent; padding: 6px 16px; border-radius: var(--radius-full); cursor: pointer; font-weight: 500; font-size: 0.85rem; transition: var(--transition); }
        .btn-outline-sm:hover { background: rgba(10, 102, 194, 0.1); }
        
        /* Khối giá cả */
        .pricing-block { background: #FFF3E0; padding: 20px; border-radius: var(--radius-md); margin-bottom: 25px; display: flex; align-items: center; gap: 15px; border-left: 4px solid var(--accent-orange); }
        [data-theme="dark"] .pricing-block { background: rgba(255, 87, 34, 0.1); }
        .current-price { font-size: 2.2rem; font-weight: 700; color: var(--accent-orange); line-height: 1; }
        .price-details { display: flex; flex-direction: column; gap: 4px; }
        .old-price { font-size: 1.05rem; color: var(--text-muted); text-decoration: line-through; }
        .discount-tag { background: var(--accent-orange); color: white; padding: 2px 8px; border-radius: 4px; font-weight: 700; font-size: 0.8rem; display: inline-block; width: fit-content; }
        
        /* Tùy chọn */
        .variants-section { margin-bottom: 25px; }
        .section-label { font-weight: 600; margin-bottom: 12px; display: block; font-size: 1.05rem; }
        .chips-container { display: flex; gap: 12px; flex-wrap: wrap; }
        .chip { border: 1px solid var(--border-color); padding: 10px 20px; border-radius: 6px; cursor: pointer; transition: var(--transition); background: var(--card-bg); font-weight: 500; }
        .chip.selected { border-color: var(--primary-blue); color: var(--primary-blue); background: rgba(10, 102, 194, 0.05); font-weight: 600; box-shadow: 0 0 0 1px var(--primary-blue); }
        .chip:hover:not(.selected) { border-color: #9CA3AF; }
        
        /* Số lượng */
        .quantity-section { margin-bottom: 30px; display: flex; align-items: center; gap: 20px; }
        .quantity-control { display: flex; border: 1px solid var(--border-color); border-radius: var(--radius-md); overflow: hidden; background: var(--card-bg); height: 42px; }
        .qty-btn { width: 42px; height: 100%; border: none; background: transparent; cursor: pointer; font-size: 1.2rem; display: flex; align-items: center; justify-content: center; transition: var(--transition); color: var(--text-main); }
        .qty-btn:hover { background: var(--bg-color); }
        .qty-input { width: 50px; text-align: center; border: none; border-left: 1px solid var(--border-color); border-right: 1px solid var(--border-color); font-weight: 600; font-size: 1rem; background: transparent; color: var(--text-main); }
        .stock-status { color: var(--text-muted); font-size: 0.95rem; }
        
        /* Cụm nút hành động */
        .action-buttons { display: flex; gap: 15px; margin-bottom: 15px; }
        .btn-primary-large { flex: 1; background: var(--accent-orange); color: white; border: none; padding: 0 20px; height: 54px; border-radius: var(--radius-md); font-size: 1.1rem; font-weight: 600; cursor: pointer; display: flex; justify-content: center; align-items: center; gap: 10px; transition: var(--transition); }
        .btn-primary-large:hover { background: #E64A19; transform: translateY(-2px); box-shadow: 0 4px 12px rgba(255,87,34,0.3); }
        .btn-icon { width: 54px; height: 54px; border: 1px solid var(--border-color); border-radius: var(--radius-md); background: var(--card-bg); color: var(--text-muted); font-size: 1.3rem; cursor: pointer; display: flex; justify-content: center; align-items: center; transition: var(--transition); }
        .btn-icon:hover { border-color: var(--primary-blue); color: var(--primary-blue); background: rgba(10, 102, 194, 0.05); }
        
        .btn-secondary-full { width: 100%; border: 1px solid var(--primary-blue); background: transparent; color: var(--primary-blue); height: 48px; border-radius: var(--radius-md); font-weight: 600; font-size: 1rem; cursor: pointer; transition: var(--transition); margin-bottom: 25px; display: flex; justify-content: center; align-items: center; gap: 10px; }
        .btn-secondary-full:hover { background: rgba(10, 102, 194, 0.05); }
        
        /* Trust Badges */
        .trust-badges-row { display: flex; justify-content: space-between; border-top: 1px dashed var(--border-color); padding-top: 20px; }
        .trust-item { display: flex; align-items: center; gap: 8px; font-size: 0.9rem; color: var(--text-main); font-weight: 500; }
        .trust-item i { color: var(--primary-blue); font-size: 1.2rem; }
        
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

        /* Khu vực Tabs chi tiết */
        .tabs-section { background: var(--card-bg); border-radius: var(--radius-lg); box-shadow: var(--shadow-sm); overflow: hidden; margin-bottom: 50px; border: 1px solid var(--border-color); }
        .tab-headers { display: flex; border-bottom: 1px solid var(--border-color); background: var(--bg-color); }
        .tab-btn { flex: 1; padding: 20px; font-size: 1.1rem; font-weight: 600; background: transparent; border: none; cursor: pointer; border-bottom: 3px solid transparent; color: var(--text-muted); transition: var(--transition); }
        .tab-btn.active { color: var(--primary-blue); border-bottom-color: var(--primary-blue); background: var(--card-bg); }
        .tab-btn:hover:not(.active) { color: var(--text-main); }
        
        .tab-content { padding: 40px; display: none; line-height: 1.8; color: var(--text-main); }
        .tab-content.active { display: block; }
        .tab-content h3 { margin-bottom: 20px; font-size: 1.3rem; border-left: 4px solid var(--primary-blue); padding-left: 10px; }
        .tab-content p { margin-bottom: 15px; text-align: justify; }
        
        .specs-table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        .specs-table th, .specs-table td { padding: 15px; border: 1px solid var(--border-color); text-align: left; }
        .specs-table th { background: var(--bg-color); width: 30%; font-weight: 600; color: var(--text-muted); }
        
        /* Floating FAB */
        .fab-container { position: fixed; bottom: 30px; right: 30px; z-index: 100; }
        .fab-btn { width: 60px; height: 60px; border-radius: 50%; background-color: var(--primary-blue); color: white; border: none; display: flex; align-items: center; justify-content: center; font-size: 1.8rem; cursor: pointer; box-shadow: 0 4px 15px rgba(10, 102, 194, 0.4); transition: var(--transition); }
        .fab-btn:hover { transform: scale(1.1); background-color: var(--primary-blue-hover); }

        footer { background-color: var(--card-bg); border-top: 1px solid var(--border-color); padding: 40px 0 20px; text-align: center; color: var(--text-muted); }
        
        @media (max-width: 900px) {
            .product-container { flex-direction: column; }
            .product-media, .product-details { max-width: 100%; }
            .tab-btn { font-size: 1rem; padding: 15px 10px; }
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
            <a href="/" class="logo">
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
                <div class="action-icon" title="Giỏ hàng" onclick="window.location.href='/cart'">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span class="badge" id="cartBadge" style="display: none;">0</span>
                </div>
                <div class="user-menu-container">
                    <div class="action-icon" title="Tài khoản">
                        <i class="fa-regular fa-user"></i>
                    </div>
                    <div class="user-dropdown">
                        <a href="/login" class="user-dropdown-item"><i class="fa-solid fa-arrow-right-to-bracket" style="margin-right:8px"></i> Đăng nhập</a>
                        <a href="/login#form-register" class="user-dropdown-item"><i class="fa-solid fa-user-plus" style="margin-right:8px"></i> Đăng ký</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class="main-content">
        <!-- Breadcrumbs -->
        <div class="breadcrumbs">
            <a href="/">Trang chủ</a> &nbsp;&gt;&nbsp; <a href="/?category={{ \App\Models\Category::find($product->category_id)->slug ?? '' }}">{{ \App\Models\Category::find($product->category_id)->name ?? 'Danh mục' }}</a> &nbsp;&gt;&nbsp; <span>{{ $product->name }}</span>
        </div>

        <!-- Above the fold (Cột trái & phải) -->
        <div class="product-container">
            <!-- Cột trái: Khu vực Media -->
            <div class="product-media">
                <div class="main-image-container">
                    <img id="mainImage" src="{{ $product->image }}" alt="{{ $product->name }}" class="main-image">
                </div>
                <div class="thumbnail-grid">
                    <img src="{{ $product->image }}" class="thumbnail active" onclick="changeImage(this)" alt="Thumb 1">
                    <!-- Giữ lại vài ảnh phụ giả định vì DB hiện chỉ có 1 ảnh -->
                    <img src="https://images.unsplash.com/photo-1517336714731-489689fd1ca8?auto=format&fit=crop&q=80&w=300" class="thumbnail" onclick="changeImage(this)" alt="Thumb 2">
                    <img src="https://images.unsplash.com/photo-1541807084-5c52b6b3adef?auto=format&fit=crop&q=80&w=300" class="thumbnail" onclick="changeImage(this)" alt="Thumb 3">
                </div>
            </div>

            <!-- Cột phải: Thông tin cốt lõi & Hành động -->
            <div class="product-details">
                <span class="brand">TechStore</span>
                <h1 class="product-title">{{ $product->name }}</h1>
                
                <div class="ratings">
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
                        <span style="color:var(--text-main); font-weight:600; margin-left:5px;">{{ number_format($product->rating, 1) }}</span>
                    </div>
                    <div class="sold-count">Đã bán: {{ number_format($product->reviews, 0, ',', '.') }}</div>
                </div>

                <!-- Seller Card -->
                <div class="seller-card">
                    <div class="seller-info">
                        <img src="https://images.unsplash.com/photo-1560159812-70b556b694b2?auto=format&fit=crop&q=80&w=100" alt="TechStore Official" class="seller-avatar">
                        <div>
                            <span class="seller-name">TechStore Official <i class="fa-solid fa-circle-check" style="color:var(--primary-blue); font-size:0.9rem;"></i></span>
                            <span class="seller-status"><i class="fa-solid fa-store"></i> Gian hàng chính hãng</span>
                        </div>
                    </div>
                    <button class="btn-outline-sm">Xem Shop</button>
                </div>

                <!-- Pricing -->
                <div class="pricing-block">
                    <div class="current-price">{{ number_format($product->price, 0, ',', '.') }}đ</div>
                    @if($product->old_price)
                    <div class="price-details">
                        @php
                            $discount = round((($product->old_price - $product->price) / $product->old_price) * 100);
                        @endphp
                        <div class="discount-tag">-{{ $discount }}% GIẢM</div>
                        <div class="old-price">{{ number_format($product->old_price, 0, ',', '.') }}đ</div>
                    </div>
                    @endif
                </div>

                <!-- Variants -->
                <div class="variants-section">
                    <span class="section-label">Màu sắc:</span>
                    <div class="chips-container" id="colorOptions">
                        <div class="chip selected" onclick="selectVariant('color', this)">Space Black (Đen)</div>
                        <div class="chip" onclick="selectVariant('color', this)">Silver (Bạc)</div>
                    </div>
                </div>
                
                <div class="variants-section">
                    <span class="section-label">Dung lượng:</span>
                    <div class="chips-container" id="storageOptions">
                        <div class="chip selected" onclick="selectVariant('storage', this)">512GB SSD</div>
                        <div class="chip" onclick="selectVariant('storage', this)">1TB SSD (+5.000.000đ)</div>
                    </div>
                </div>

                <!-- Quantity -->
                <div class="quantity-section">
                    <span class="section-label" style="margin-bottom:0;">Số lượng:</span>
                    <div class="quantity-control">
                        <button class="qty-btn" onclick="updateQty(-1)"><i class="fa-solid fa-minus"></i></button>
                        <input type="text" id="qtyInput" class="qty-input" value="1" readonly>
                        <button class="qty-btn" onclick="updateQty(1)"><i class="fa-solid fa-plus"></i></button>
                    </div>
                    <span class="stock-status">Kho còn 15 sản phẩm</span>
                </div>

                <!-- CTA Buttons -->
                <div class="action-buttons">
                    <button class="btn-primary-large" onclick="addToCart()"><i class="fa-solid fa-cart-plus"></i> THÊM VÀO GIỎ HÀNG</button>
                    <button class="btn-icon" title="Chia sẻ"><i class="fa-solid fa-share-nodes"></i></button>
                </div>
                <button class="btn-secondary-full"><i class="fa-regular fa-comment-dots"></i> Chat với người bán</button>

                <!-- Trust Badges -->
                <div class="trust-badges-row">
                    <div class="trust-item"><i class="fa-solid fa-shield-halved"></i> Bảo hành chính hãng 12 tháng</div>
                    <div class="trust-item"><i class="fa-solid fa-truck-fast"></i> Miễn phí giao hàng toàn quốc</div>
                    <div class="trust-item"><i class="fa-solid fa-rotate-left"></i> Đổi trả miễn phí 7 ngày</div>
                </div>
            </div>
        </div>

        <!-- Phía dưới: Khu vực thông tin chi tiết (Tabs) -->
        <div class="tabs-section">
            <div class="tab-headers">
                <button class="tab-btn active" onclick="switchTab('desc', this)">Mô tả sản phẩm</button>
                <button class="tab-btn" onclick="switchTab('specs', this)">Thông số kỹ thuật</button>
            </div>
            
            <div id="tab-desc" class="tab-content active">
                <h3>Đặc điểm nổi bật</h3>
                <p>{{ $product->description ?? 'Đang cập nhật mô tả cho sản phẩm '.$product->name.'. Đây là một trong những sản phẩm hot nhất tại TechStore với thiết kế sang trọng và tính năng ưu việt, mang lại trải nghiệm tuyệt vời cho người dùng.' }}</p>
            </div>
            
            <div id="tab-specs" class="tab-content">
                <h3>Thông số kỹ thuật chi tiết</h3>
                <table class="specs-table">
                    <tr>
                        <th>Vi xử lý (CPU)</th>
                        <td>Apple M3 Pro (11 nhân CPU)</td>
                    </tr>
                    <tr>
                        <th>Đồ họa (GPU)</th>
                        <td>Apple M3 Pro (14 nhân GPU)</td>
                    </tr>
                    <tr>
                        <th>RAM</th>
                        <td>18GB Unified Memory</td>
                    </tr>
                    <tr>
                        <th>Ổ cứng</th>
                        <td>512GB SSD</td>
                    </tr>
                    <tr>
                        <th>Màn hình</th>
                        <td>14.2 inch Liquid Retina XDR display (3024 x 1964), 120Hz ProMotion</td>
                    </tr>
                    <tr>
                        <th>Cổng kết nối</th>
                        <td>3x Thunderbolt 4, 1x HDMI, 1x SDXC, 1x 3.5mm Jack, 1x MagSafe 3</td>
                    </tr>
                    <tr>
                        <th>Hệ điều hành</th>
                        <td>macOS Sonoma</td>
                    </tr>
                    <tr>
                        <th>Trọng lượng</th>
                        <td>1.61 kg</td>
                    </tr>
                </table>
            </div>
        </div>
    </main>

    <!-- Floating UI (FAB) -->
    <div class="fab-container">
        <button class="fab-btn" title="Hỗ trợ trực tuyến"><i class="fa-solid fa-headset"></i></button>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2026 TechStore. Tất cả các quyền được bảo lưu.</p>
    </footer>

    <!-- Scripts -->
    <script>
        // Hàm chuyển đổi giao diện Sáng / Tối (Light/Dark Mode)
        function toggleTheme() {
            const body = document.body;
            const icon = document.getElementById('theme-icon');
            if (body.getAttribute('data-theme') === 'dark') {
                body.removeAttribute('data-theme');
                icon.className = 'fa-solid fa-moon';
            } else {
                body.setAttribute('data-theme', 'dark');
                icon.className = 'fa-solid fa-sun';
            }
        }

        // Hàm thay đổi hình ảnh chính khi click vào thumbnail
        function changeImage(element) {
            // Cập nhật đường dẫn ảnh chính
            const mainImg = document.getElementById('mainImage');
            // Đổi URL của ảnh chính bằng URL của ảnh thumbnail vừa click (nhưng tải ảnh kích thước lớn hơn)
            mainImg.src = element.src.replace('w=300', 'w=800');
            
            // Xóa class 'active' (viền xanh) ở tất cả các thumbnail
            const thumbnails = document.querySelectorAll('.thumbnail');
            thumbnails.forEach(t => t.classList.remove('active'));
            
            // Thêm class 'active' vào thumbnail vừa được click
            element.classList.add('active');
        }

        // Hàm chọn các tùy chọn biến thể (Màu sắc, Dung lượng)
        function selectVariant(type, element) {
            // Lấy khu vực chứa các tùy chọn tương ứng (id="colorOptions" hoặc "storageOptions")
            const container = type === 'color' ? document.getElementById('colorOptions') : document.getElementById('storageOptions');
            
            // Xóa class 'selected' khỏi tất cả các nút tùy chọn trong khu vực đó
            const chips = container.querySelectorAll('.chip');
            chips.forEach(c => c.classList.remove('selected'));
            
            // Đánh dấu 'selected' (thêm viền, màu nền) cho nút vừa click
            element.classList.add('selected');
        }

        // Hàm tăng giảm số lượng mua
        function updateQty(change) {
            const input = document.getElementById('qtyInput');
            // Lấy giá trị hiện tại
            let val = parseInt(input.value);
            // Cập nhật giá trị (cộng hoặc trừ)
            val += change;
            // Không cho phép số lượng nhỏ hơn 1
            if (val < 1) val = 1;
            // Gán lại giá trị vào ô input
            input.value = val;
        }

        // Hàm chuyển đổi giữa các Tab (Mô tả và Thông số)
        function switchTab(tabId, element) {
            // 1. Cập nhật giao diện nút Tab
            // Lấy tất cả các nút tab và xóa trạng thái 'active'
            const buttons = document.querySelectorAll('.tab-btn');
            buttons.forEach(btn => btn.classList.remove('active'));
            // Thêm trạng thái 'active' (đường chân dưới màu xanh) cho nút được click
            element.classList.add('active');
            
            // 2. Cập nhật nội dung hiển thị
            // Lấy tất cả các nội dung tab và ẩn đi (xóa class 'active')
            const contents = document.querySelectorAll('.tab-content');
            contents.forEach(content => content.classList.remove('active'));
            // Hiển thị nội dung của tab tương ứng với tabId truyền vào
            document.getElementById('tab-' + tabId).classList.add('active');
        }

        // Hàm xử lý Thêm vào giỏ hàng
        function addToCart() {
            let badge = document.getElementById('cartBadge');
            let currentCount = parseInt(badge.innerText);
            
            // Tăng số lượng
            badge.innerText = currentCount + 1;
            
            // Hiển thị badge nếu đang bị ẩn
            if (badge.style.display === 'none') {
                badge.style.display = 'block';
            }
            
            // Thông báo ngắn
            alert('Thêm sản phẩm thành công! Bạn có thể xem Giỏ hàng ở góc phải.');
        }
    </script>
</body>
</html>
