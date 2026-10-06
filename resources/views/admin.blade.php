<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - TechStore</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-blue: #0A66C2;
            --sidebar-bg: #111827;
            --sidebar-text: #9CA3AF;
            --sidebar-hover: #1F2937;
            --sidebar-active: #3B82F6;
            --bg-color: #F3F4F6;
            --card-bg: #FFFFFF;
            --text-main: #1F2937;
            --text-muted: #6B7280;
            --border-color: #E5E7EB;
            --success: #10B981;
            --danger: #EF4444;
            --transition: all 0.3s ease;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Inter', sans-serif; }
        body { background-color: var(--bg-color); color: var(--text-main); display: flex; min-height: 100vh; }
        a { text-decoration: none; color: inherit; }
        ul { list-style: none; }

        /* Sidebar */
        .sidebar {
            width: 260px;
            background-color: var(--sidebar-bg);
            color: var(--sidebar-text);
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            overflow-y: auto;
        }

        .sidebar::-webkit-scrollbar { width: 6px; }
        .sidebar::-webkit-scrollbar-thumb { background: #374151; border-radius: 4px; }

        .sidebar-header {
            padding: 20px;
            font-size: 1.5rem;
            font-weight: 700;
            color: white;
            display: flex;
            align-items: center;
            gap: 10px;
            border-bottom: 1px solid #1F2937;
            margin-bottom: 10px;
        }
        
        .sidebar-header i { color: var(--sidebar-active); }

        .nav-links { padding-bottom: 20px; }

        .section-title {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
            color: #6B7280;
            margin: 20px 20px 10px 20px;
        }

        .nav-links li a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 20px;
            font-size: 0.95rem;
            font-weight: 500;
            transition: var(--transition);
        }

        .nav-links li a:hover { background-color: var(--sidebar-hover); color: white; }
        
        .nav-links li a.active {
            background-color: rgba(59, 130, 246, 0.1);
            color: var(--sidebar-active);
            border-right: 3px solid var(--sidebar-active);
        }

        .nav-links li a i { width: 20px; text-align: center; font-size: 1.1rem; }

        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: 260px;
            display: flex;
            flex-direction: column;
        }

        /* Top Header */
        .top-header {
            background-color: var(--card-bg);
            height: 70px;
            padding: 0 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid var(--border-color);
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .header-search {
            display: flex;
            align-items: center;
            background: var(--bg-color);
            padding: 8px 15px;
            border-radius: 8px;
            width: 300px;
        }

        .header-search input {
            border: none;
            background: transparent;
            outline: none;
            margin-left: 10px;
            width: 100%;
        }

        .user-menu {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .user-menu .icon { font-size: 1.2rem; color: var(--text-muted); cursor: pointer; position: relative; }
        .user-menu .badge { position: absolute; top: -5px; right: -5px; background: var(--danger); color: white; font-size: 0.65rem; padding: 2px 5px; border-radius: 10px; font-weight: bold; }
        
        .user-profile { display: flex; align-items: center; gap: 10px; cursor: pointer; border-left: 1px solid var(--border-color); padding-left: 20px; }
        .user-profile img { width: 35px; height: 35px; border-radius: 50%; object-fit: cover; }
        .user-profile span { font-weight: 600; font-size: 0.95rem; }

        /* Page Content */
        .page-content { padding: 30px; }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .page-title h1 { font-size: 1.5rem; font-weight: 700; margin-bottom: 5px; }
        .page-title p { color: var(--text-muted); font-size: 0.9rem; }

        .btn-primary {
            background-color: var(--primary-blue);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: var(--transition);
        }

        .btn-primary:hover { background-color: var(--primary-blue-hover); }

        /* Card / Table Area */
        .card {
            background-color: var(--card-bg);
            border-radius: 10px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            overflow: hidden;
            border: 1px solid var(--border-color);
        }

        .card-header {
            padding: 20px;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-header input {
            padding: 8px 12px;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            outline: none;
        }

        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 15px 20px; text-align: left; border-bottom: 1px solid var(--border-color); }
        th { background-color: #F9FAFB; font-weight: 600; color: var(--text-muted); font-size: 0.85rem; text-transform: uppercase; }
        td { font-size: 0.95rem; vertical-align: middle; }

        .banner-preview { width: 150px; height: auto; border-radius: 6px; border: 1px solid var(--border-color); }
        
        .tag-location { background: rgba(59, 130, 246, 0.1); color: var(--sidebar-active); padding: 4px 10px; border-radius: 20px; font-size: 0.8rem; font-weight: 600; }

        .action-btns { display: flex; gap: 10px; }
        .action-btns button { border: none; background: transparent; cursor: pointer; font-size: 1.1rem; color: var(--text-muted); transition: var(--transition); }
        .action-btns button:hover { color: var(--primary-blue); }
        .action-btns button.delete:hover { color: var(--danger); }

        /* Toggle Switch */
        .switch { position: relative; display: inline-block; width: 44px; height: 24px; }
        .switch input { opacity: 0; width: 0; height: 0; }
        .slider { position: absolute; cursor: pointer; top: 0; left: 0; right: 0; bottom: 0; background-color: #ccc; transition: .4s; border-radius: 34px; }
        .slider:before { position: absolute; content: ""; height: 18px; width: 18px; left: 3px; bottom: 3px; background-color: white; transition: .4s; border-radius: 50%; }
        input:checked + .slider { background-color: var(--success); }
        input:checked + .slider:before { transform: translateX(20px); }

    </style>
</head>
<body>
    
    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-header">
            <i class="fa-solid fa-microchip"></i> TechStore
        </div>
        <ul class="nav-links">
            <li><a href="#"><i class="fa-solid fa-chart-line"></i> Dashboard</a></li>
            
            <li class="section-title">Giao diện & Marketing</li>
            <li><a href="#" class="active"><i class="fa-regular fa-image"></i> Quản lý Banner</a></li>
            
            <li class="section-title">Cấu trúc nền tảng</li>
            <li><a href="#"><i class="fa-solid fa-list-ul"></i> Danh mục</a></li>
            
            <li class="section-title">Giám sát kinh doanh</li>
            <li><a href="#"><i class="fa-solid fa-box"></i> Quản lý sản phẩm</a></li>
            <li><a href="#"><i class="fa-solid fa-cart-shopping"></i> Quản lý đơn hàng</a></li>
            <li><a href="#"><i class="fa-solid fa-wallet"></i> Quản lý ví</a></li>
            
            <li class="section-title">Đối tác & Người dùng</li>
            <li><a href="#"><i class="fa-solid fa-store"></i> Người bán (Gian hàng)</a></li>
            <li><a href="#"><i class="fa-solid fa-users"></i> Quản lý người dùng</a></li>
            <li><a href="#"><i class="fa-solid fa-flag"></i> Báo cáo / Khiếu nại</a></li>
            
            <li class="section-title">Khuyến mãi</li>
            <li><a href="#"><i class="fa-solid fa-ticket"></i> Mã giảm giá</a></li>
        </ul>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Top Header -->
        <header class="top-header">
            <div class="header-search">
                <i class="fa-solid fa-magnifying-glass" style="color: var(--text-muted)"></i>
                <input type="text" placeholder="Tìm kiếm trong hệ thống...">
            </div>
            <div class="user-menu">
                <div class="icon"><i class="fa-regular fa-bell"></i><span class="badge">4</span></div>
                <div class="icon"><i class="fa-regular fa-message"></i><span class="badge">2</span></div>
                <div class="user-profile">
                    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=crop&q=80&w=100" alt="Admin Avatar">
                    <span>Admin System</span>
                    <i class="fa-solid fa-chevron-down" style="font-size: 0.8rem; margin-left: 5px;"></i>
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <div class="page-content">
            <div class="page-header">
                <div class="page-title">
                    <h1>Quản lý Banner</h1>
                    <p>Thiết lập và quản lý các chiến dịch hiển thị trên giao diện người dùng.</p>
                </div>
                <button class="btn-primary"><i class="fa-solid fa-plus"></i> Thêm Banner mới</button>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3 style="font-size: 1.1rem; font-weight: 600;">Danh sách chiến dịch hiển thị</h3>
                    <input type="text" placeholder="Tìm kiếm banner...">
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Hình ảnh</th>
                            <th>Tên chiến dịch</th>
                            <th>Vị trí</th>
                            <th>Trạng thái (Bật/Tắt)</th>
                            <th>Thời gian áp dụng</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><img src="https://images.unsplash.com/photo-1593642632823-8f785ba67e45?auto=format&fit=crop&q=80&w=400" alt="Banner" class="banner-preview"></td>
                            <td style="font-weight: 600;">Tuần Lễ Công Nghệ 2<br><span style="font-weight:400; color:var(--text-muted); font-size:0.85rem;">Giảm giá lên đến 50%</span></td>
                            <td><span class="tag-location">Hero Main</span></td>
                            <td>
                                <label class="switch">
                                    <input type="checkbox" checked onclick="toggleStatus(this)">
                                    <span class="slider"></span>
                                </label>
                            </td>
                            <td>01/10/2026 - 15/10/2026</td>
                            <td>
                                <div class="action-btns">
                                    <button title="Chỉnh sửa"><i class="fa-solid fa-pen-to-square"></i></button>
                                    <button title="Xóa" class="delete"><i class="fa-solid fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><img src="https://images.unsplash.com/photo-1607082348824-0a96f2a4b9da?auto=format&fit=crop&q=80&w=400" alt="Banner" class="banner-preview"></td>
                            <td style="font-weight: 600;">Flash Sale Giữa Tháng<br><span style="font-weight:400; color:var(--text-muted); font-size:0.85rem;">Săn deal hot 15/10</span></td>
                            <td><span class="tag-location" style="background:#FEE2E2; color:#EF4444;">Flash Sale Bar</span></td>
                            <td>
                                <label class="switch">
                                    <input type="checkbox" onclick="toggleStatus(this)">
                                    <span class="slider"></span>
                                </label>
                            </td>
                            <td>15/10/2026 - 16/10/2026</td>
                            <td>
                                <div class="action-btns">
                                    <button title="Chỉnh sửa"><i class="fa-solid fa-pen-to-square"></i></button>
                                    <button title="Xóa" class="delete"><i class="fa-solid fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <script>
        // Hàm thông báo khi bật tắt switch (demo tương tác)
        function toggleStatus(element) {
            const status = element.checked ? "BẬT" : "TẮT";
            alert("Bạn vừa " + status + " hiển thị chiến dịch này trên trang chủ (Frontend)!");
        }
    </script>
</body>
</html>
