<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Danh mục - Admin TechStore</title>
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

        .header-actions { display: flex; gap: 12px; align-items: center; }
        .btn { padding: 10px 16px; border-radius: 8px; font-family: 'Inter', sans-serif; font-size: 14px; font-weight: 600; cursor: pointer; transition: all 0.2s; border: none; display: flex; align-items: center; gap: 8px; }
        .btn-outline { background: white; border: 1px solid var(--gray-300); color: var(--gray-700); }
        .btn-outline:hover { background: var(--gray-50); color: var(--gray-900); }
        .btn-primary { background: var(--primary); color: white; }
        .btn-primary:hover { background: #4338CA; }

        .filter-bar { display: flex; gap: 12px; margin-bottom: 24px; }
        .filter-select { padding: 10px 16px; border: 1px solid var(--gray-200); border-radius: 8px; font-family: 'Inter', sans-serif; font-size: 14px; color: var(--gray-700); background: white; outline: none; min-width: 150px;}

        /* Tables */
        .card { background: white; border-radius: 16px; border: 1px solid var(--gray-200); box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05); overflow: hidden; }
        table { width: 100%; border-collapse: collapse; white-space: nowrap; }
        th { padding: 16px 24px; text-align: left; font-size: 12px; font-weight: 600; color: var(--gray-500); text-transform: uppercase; border-bottom: 1px solid var(--gray-200); background: var(--gray-50); }
        td { padding: 16px 24px; vertical-align: middle; border-bottom: 1px solid var(--gray-100); font-size: 14px; color: var(--gray-700); font-weight: 500;}
        tr:hover td { background: var(--gray-50); }

        .cat-img { width: 48px; height: 48px; object-fit: contain; border-radius: 8px; background: var(--gray-50); border: 1px solid var(--gray-200); padding: 4px; }
        .cat-info { display: flex; flex-direction: column; gap: 4px; }
        .cat-title { font-weight: 600; color: var(--gray-900); }
        .cat-subtitle { font-size: 12px; color: var(--gray-500); }
        
        .toggle-switch { position: relative; display: inline-block; width: 44px; height: 24px; }
        .toggle-switch input { opacity: 0; width: 0; height: 0; }
        .slider { position: absolute; cursor: pointer; top: 0; left: 0; right: 0; bottom: 0; background-color: var(--gray-300); transition: .4s; border-radius: 24px; }
        .slider:before { position: absolute; content: ""; height: 18px; width: 18px; left: 3px; bottom: 3px; background-color: white; transition: .4s; border-radius: 50%; box-shadow: 0 1px 2px rgba(0,0,0,0.1); }
        input:checked + .slider { background-color: var(--success); }
        input:checked + .slider:before { transform: translateX(20px); }

        .action-icon { color: var(--gray-400); cursor: pointer; transition: color 0.2s; font-size: 16px; margin-right: 12px; }
        .action-icon:hover { color: var(--primary); }
        .action-icon.delete:hover { color: var(--danger); }

        /* Modal Styles */
        .modal { display: none; position: fixed; z-index: 100; left: 0; top: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.5); align-items: center; justify-content: center; backdrop-filter: blur(4px); }
        .modal.active { display: flex; }
        .modal-content { background-color: #fff; border-radius: 16px; width: 500px; max-width: 90%; max-height: 90vh; display: flex; flex-direction: column; box-shadow: 0 20px 25px -5px rgba(0,0,0,0.1); animation: modalShow 0.3s ease-out; }
        @keyframes modalShow { from { opacity: 0; transform: translateY(20px) scale(0.95); } to { opacity: 1; transform: translateY(0) scale(1); } }
        .modal-header { padding: 20px 24px; border-bottom: 1px solid var(--gray-100); display: flex; justify-content: space-between; align-items: center; }
        .modal-title { font-size: 18px; font-weight: 700; color: var(--gray-900); }
        .close-btn { background: none; border: none; font-size: 20px; color: var(--gray-400); cursor: pointer; }
        .close-btn:hover { color: var(--gray-700); }
        .modal-body { padding: 24px; overflow-y: auto; display: flex; flex-direction: column; gap: 16px; }
        .modal-footer { padding: 20px 24px; border-top: 1px solid var(--gray-100); display: flex; justify-content: flex-end; gap: 12px; background: var(--gray-50); border-radius: 0 0 16px 16px; }
        
        .form-group { display: flex; flex-direction: column; gap: 8px; }
        .form-label { font-size: 13px; font-weight: 600; color: var(--gray-700); }
        .form-label span { color: var(--danger); }
        .form-input { padding: 10px 14px; border: 1px solid var(--gray-300); border-radius: 8px; font-family: 'Inter', sans-serif; font-size: 14px; outline: none; transition: all 0.2s; width: 100%; box-sizing: border-box; }
        .form-input:focus { border-color: var(--primary); box-shadow: 0 0 0 3px var(--primary-light); }
        
        .image-upload-box { border: 2px dashed var(--gray-300); border-radius: 12px; padding: 20px; text-align: center; cursor: pointer; background: var(--gray-50); position: relative; overflow: hidden; height: 120px; display: flex; flex-direction: column; justify-content: center; align-items: center; gap: 8px; transition: all 0.2s; }
        .image-upload-box:hover { border-color: var(--primary); background: var(--primary-light); color: var(--primary); }
        .image-upload-box i { font-size: 24px; color: var(--gray-400); }
        .image-upload-box span { font-size: 13px; font-weight: 500; color: var(--gray-500); }
        .image-preview { position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: contain; display: none; padding: 8px;}
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
            <a href="/admin/categories" class="nav-item active">
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
            
            @if(session('success'))
            <div style="padding: 16px; background: var(--success-bg); color: var(--success); border-radius: 8px; margin-bottom: 24px; font-weight: 500;">
                <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
            </div>
            @endif
            @if(session('error'))
            <div style="padding: 16px; background: var(--danger-bg); color: var(--danger); border-radius: 8px; margin-bottom: 24px; font-weight: 500;">
                <i class="fa-solid fa-triangle-exclamation"></i> {{ session('error') }}
            </div>
            @endif

            <div class="page-header">
                <div style="display: flex; align-items: center; gap: 16px;">
                    <div class="page-icon"><i class="fa-solid fa-box-open"></i></div>
                    <div>
                        <h1 class="page-title">Danh mục</h1>
                        <p class="page-subtitle">Quản lý các nhóm sản phẩm trên sàn</p>
                    </div>
                </div>
                <div class="header-actions">
                    <button class="btn btn-primary" onclick="openModal()"><i class="fa-solid fa-plus"></i> Thêm Danh Mục</button>
                </div>
            </div>

            <div class="card">
                <table>
                    <thead>
                        <tr>
                            <th>Hình ảnh</th>
                            <th>Tên danh mục</th>
                            <th>Mô tả</th>
                            <th>Số sản phẩm</th>
                            <th>Trạng thái</th>
                            <th>Ngày tạo</th>
                            <th style="text-align: right;">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($categories) && count($categories) > 0)
                            @foreach($categories as $category)
                            <tr>
                                <td>
                                    <img src="{{ $category->image ?? 'https://via.placeholder.com/150?text=Logo' }}" class="cat-img" alt="{{ $category->name }}">
                                </td>
                                <td>
                                    <div class="cat-info">
                                        <div class="cat-title">{{ $category->name }}</div>
                                        <div class="cat-subtitle">/{{ $category->slug }}</div>
                                    </div>
                                </td>
                                <td><span style="display: inline-block; max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ $category->description ?? 'Không có mô tả' }}</span></td>
                                <td><span style="font-weight: 600; color: var(--primary);">{{ $category->products_count ?? 0 }}</span> sp</td>
                                <td>
                                    <label class="toggle-switch">
                                        <input type="checkbox" {{ $category->is_active ? 'checked' : '' }} disabled>
                                        <span class="slider"></span>
                                    </label>
                                </td>
                                <td>{{ $category->created_at->format('d/m/Y') }}</td>
                                <td style="text-align: right;">
                                    <i class="fa-solid fa-pen action-icon" onclick="openModal('{{ $category->id }}', '{{ $category->name }}', '{{ $category->description }}', '{{ $category->image }}', {{ $category->is_active ? 'true' : 'false' }})"></i>
                                    <form action="/admin/categories/{{ $category->id }}" method="POST" style="display:inline;" onsubmit="return confirm('Bạn có chắc chắn muốn xóa danh mục này?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="background:none;border:none;"><i class="fa-solid fa-trash action-icon delete"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7" style="text-align: center; padding: 32px; color: var(--gray-500);">Chưa có danh mục nào. Hãy thêm danh mục đầu tiên!</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <!-- Modal -->
    <div class="modal" id="catModal">
        <div class="modal-content">
            <form id="catForm" action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" id="formMethod" value="POST">
                <div class="modal-header">
                    <h2 class="modal-title" id="modalTitle">Thêm Danh Mục</h2>
                    <button type="button" class="close-btn" onclick="closeModal()"><i class="fa-solid fa-xmark"></i></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label">Tên danh mục <span>*</span></label>
                        <input type="text" class="form-input" name="name" id="catName" placeholder="VD: Điện thoại, Laptop..." required>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Hình ảnh / Icon</label>
                        <label class="image-upload-box" for="imageUpload">
                            <i class="fa-solid fa-cloud-arrow-up"></i>
                            <span>Nhấn để chọn ảnh</span>
                            <input type="file" id="imageUpload" name="image" style="display:none;" accept="image/*" onchange="previewImage(this)">
                            <img src="" class="image-preview" id="previewImg">
                        </label>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Mô tả</label>
                        <textarea class="form-input" name="description" id="catDesc" rows="3" placeholder="Mô tả danh mục..."></textarea>
                    </div>
                    
                    <div class="form-group" style="flex-direction: row; align-items: center; justify-content: space-between;">
                        <label class="form-label" style="margin: 0;">Đang hoạt động</label>
                        <label class="toggle-switch">
                            <input type="checkbox" name="is_active" id="catStatus" checked>
                            <span class="slider"></span>
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline" onclick="closeModal()">Hủy bỏ</button>
                    <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openModal(id = null, name = '', desc = '', image = '', isActive = true) {
            document.getElementById('catModal').classList.add('active');
            let form = document.getElementById('catForm');
            let method = document.getElementById('formMethod');
            
            if(id) {
                document.getElementById('modalTitle').innerText = "Cập nhật Danh Mục";
                form.action = "/admin/categories/" + id;
                method.value = "PUT";
                document.getElementById('catName').value = name;
                document.getElementById('catDesc').value = desc !== 'null' ? desc : '';
                document.getElementById('catStatus').checked = isActive;
                
                if (image && image !== 'null') {
                    document.getElementById('previewImg').src = image;
                    document.getElementById('previewImg').style.display = 'block';
                } else {
                    document.getElementById('previewImg').style.display = 'none';
                }
            } else {
                document.getElementById('modalTitle').innerText = "Thêm Danh Mục Mới";
                form.action = "{{ route('categories.store') }}";
                method.value = "POST";
                form.reset();
                document.getElementById('catStatus').checked = true;
                document.getElementById('previewImg').style.display = 'none';
            }
        }

        function closeModal() {
            document.getElementById('catModal').classList.remove('active');
        }

        function previewImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var preview = document.getElementById('previewImg');
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>
</html>
