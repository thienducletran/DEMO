<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập / Đăng Ký - TechStore</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-blue: #0A66C2;
            --primary-blue-hover: #004182;
            --accent-orange: #FF5722;
            --bg-color: #F3F4F6;
            --card-bg: #FFFFFF;
            --text-main: #1F2937;
            --text-muted: #6B7280;
            --border-color: #E5E7EB;
            --radius-md: 8px;
            --radius-lg: 16px;
            --transition: all 0.3s ease;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Inter', sans-serif; }
        body { background-color: var(--bg-color); color: var(--text-main); display: flex; align-items: center; justify-content: center; min-height: 100vh; overflow: hidden; }
        a { text-decoration: none; color: var(--primary-blue); font-weight: 500; }
        a:hover { text-decoration: underline; }

        .auth-wrapper {
            display: flex;
            width: 1000px;
            max-width: 95%;
            height: 600px;
            background: var(--card-bg);
            border-radius: var(--radius-lg);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            overflow: hidden;
        }

        /* Hình ảnh bên trái */
        .auth-banner {
            flex: 1;
            background: linear-gradient(135deg, rgba(10, 102, 194, 0.9), rgba(0, 65, 130, 0.9)), url('https://images.unsplash.com/photo-1498049794561-7780e7231661?auto=format&fit=crop&q=80&w=1000') center/cover;
            color: white;
            padding: 50px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .auth-banner-logo {
            font-size: 2rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--primary-blue);
            margin-bottom: 20px;
            justify-content: center;
        }

        /* Form Content */
        .auth-content {
            flex: 1;
            padding: 40px 50px;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            position: relative;
        }

        .auth-forms-container {
            display: flex;
            gap: 50px;
        }

        .auth-forms-container > div {
            flex: 1;
        }

        .auth-content::-webkit-scrollbar { width: 5px; }
        .auth-content::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 4px; }

        .form-title {
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 20px;
            color: var(--text-main);
            border-bottom: 2px solid var(--primary-blue);
            display: inline-block;
            padding-bottom: 5px;
        }
        
        .form-area { display: block; }

        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; font-size: 0.9rem; font-weight: 600; margin-bottom: 8px; color: var(--text-main); }
        .form-group input { width: 100%; padding: 12px 15px; border: 1px solid var(--border-color); border-radius: var(--radius-md); font-size: 1rem; outline: none; transition: var(--transition); background: #F9FAFB; }
        .form-group input:focus { border-color: var(--primary-blue); background: white; box-shadow: 0 0 0 3px rgba(10,102,194,0.1); }

        .btn-submit { width: 100%; padding: 14px; background: var(--primary-blue); color: white; border: none; border-radius: var(--radius-md); font-size: 1rem; font-weight: 600; cursor: pointer; transition: var(--transition); margin-top: 10px; }
        .btn-submit:hover { background: var(--primary-blue-hover); transform: translateY(-2px); }


        .back-home { position: absolute; top: 20px; right: 20px; color: var(--text-muted); font-size: 1.5rem; cursor: pointer; transition: var(--transition); }
        .back-home:hover { color: var(--text-main); }

        @media (max-width: 768px) {
            .auth-forms-container { flex-direction: column; gap: 40px; }
            .auth-content { padding: 30px; }
            .auth-wrapper { height: auto; max-height: 95vh; }
        }
    </style>
</head>
<body>

    <div class="auth-wrapper">
        <!-- Nội dung Form -->
        <div class="auth-content">
            <a href="/" class="back-home" title="Trở về Trang chủ"><i class="fa-solid fa-xmark"></i></a>
            
            <div class="auth-banner-logo">
                <i class="fa-solid fa-microchip"></i> TechStore
            </div>

            <div class="auth-forms-container">
                <!-- Form Đăng Nhập -->
                <div id="form-login" class="form-area">
                    <h3 class="form-title">Đăng Nhập</h3>
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        @if ($errors->any())
                            <div style="color: red; margin-bottom: 15px; font-size: 0.9rem; text-align: center;">
                                {{ $errors->first() }}
                            </div>
                        @endif
                        <div class="form-group">
                            <label>Email hoặc Số điện thoại</label>
                            <input type="text" name="email" placeholder="Nhập email hoặc số điện thoại..." required>
                        </div>
                        <div class="form-group">
                            <label>Mật khẩu</label>
                            <input type="password" name="password" placeholder="Nhập mật khẩu..." required>
                        </div>
                        <div style="display:flex; justify-content:space-between; font-size:0.85rem; margin-bottom: 20px;">
                            <label style="display:flex; align-items:center; gap:5px; cursor:pointer;"><input type="checkbox" name="remember"> Ghi nhớ đăng nhập</label>
                            <a href="#">Quên mật khẩu?</a>
                        </div>
                        <button type="submit" class="btn-submit">Đăng Nhập</button>
                    </form>
                </div>

                <!-- Form Đăng Ký -->
                <div id="form-register" class="form-area" style="background: linear-gradient(to bottom right, #fff7ed, #ffffff); padding: 35px; border-radius: var(--radius-lg); border: 1px solid #fed7aa; box-shadow: 0 10px 25px -5px rgba(255, 87, 34, 0.1);">
                    <div style="text-align: center; margin-bottom: 25px;">
                        <h3 style="font-size: 1.6rem; font-weight: 800; color: var(--accent-orange); margin-bottom: 10px;"><i class="fa-solid fa-gift"></i> Đăng Ký Thành Viên</h3>
                        <p style="font-size: 0.95rem; color: var(--text-muted); line-height: 1.5;">Tham gia ngay hôm nay để nhận ưu đãi <strong>giảm 50%</strong> cho đơn hàng đầu tiên!</p>
                    </div>
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Họ và Tên</label>
                            <input type="text" name="name" placeholder="Nhập họ tên của bạn..." style="background: white; border-color: #fed7aa;" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" placeholder="Nhập địa chỉ email..." style="background: white; border-color: #fed7aa;" required>
                        </div>
                        <div class="form-group">
                            <label>Mật khẩu</label>
                            <input type="password" name="password" placeholder="Tạo mật khẩu..." style="background: white; border-color: #fed7aa;" required>
                        </div>
                        <div class="form-group">
                            <label>Xác nhận mật khẩu</label>
                            <input type="password" name="password_confirmation" placeholder="Nhập lại mật khẩu..." style="background: white; border-color: #fed7aa;" required>
                        </div>
                        <p style="font-size: 0.8rem; color: var(--text-muted); margin-bottom: 20px; text-align: center;">
                            Bằng việc đăng ký, bạn đồng ý với <a href="#" style="color: var(--accent-orange);">Điều khoản</a> của TechStore.
                        </p>
                        <button type="submit" class="btn-submit" style="background: var(--accent-orange); font-size: 1.1rem; padding: 15px; border-radius: 30px; box-shadow: 0 4px 14px rgba(255, 87, 34, 0.4);">Tham Gia Ngay <i class="fa-solid fa-arrow-right" style="margin-left: 8px;"></i></button>
                    </form>
                </div>
        </div>
    </div>

</body>
</html>
