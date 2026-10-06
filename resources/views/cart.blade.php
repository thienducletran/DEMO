<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng của bạn - TechStore</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* CSS Khai báo chung */
        :root {
            --primary-blue: #0A66C2;
            --accent-orange: #FF5722;
            --bg-color: #F3F4F6;
            --card-bg: #FFFFFF;
            --text-main: #1F2937;
            --text-muted: #6B7280;
            --border-color: #E5E7EB;
            --radius-md: 8px;
            --transition: all 0.3s ease;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Inter', sans-serif; }
        body { background-color: var(--bg-color); color: var(--text-main); }
        a { text-decoration: none; color: inherit; }

        /* Header (Tái sử dụng chung) */
        .top-bar { background-color: var(--primary-blue); color: white; text-align: center; padding: 8px 15px; font-size: 0.875rem; font-weight: 500; }
        .header { background-color: var(--card-bg); border-bottom: 1px solid var(--border-color); position: sticky; top: 0; z-index: 1000; }
        .header-container { max-width: 1200px; margin: 0 auto; padding: 15px 20px; display: flex; align-items: center; justify-content: space-between; gap: 20px; }
        .logo { font-size: 1.75rem; font-weight: 700; color: var(--primary-blue); display: flex; align-items: center; gap: 8px; }
        .header-actions { display: flex; align-items: center; gap: 20px; }
        .action-icon { color: var(--text-main); font-size: 1.25rem; cursor: pointer; position: relative; }
        .badge { position: absolute; top: -5px; right: -8px; background-color: var(--accent-orange); color: white; font-size: 0.65rem; font-weight: bold; padding: 2px 6px; border-radius: 999px; }

        /* Giỏ hàng */
        .main-content { max-width: 1200px; margin: 30px auto; padding: 0 20px; min-height: 60vh; }
        .page-title { font-size: 1.8rem; font-weight: 700; margin-bottom: 25px; display: flex; align-items: center; gap: 10px; }

        .cart-layout { display: flex; gap: 30px; }
        .cart-items { flex: 2; }
        .cart-summary { flex: 1; }

        .cart-item { background: var(--card-bg); border: 1px solid var(--border-color); border-radius: var(--radius-md); padding: 20px; display: flex; gap: 20px; margin-bottom: 15px; transition: var(--transition); }
        .cart-item:hover { box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
        .item-img { width: 120px; height: 120px; object-fit: contain; border: 1px solid var(--border-color); border-radius: 6px; padding: 10px; }
        
        .item-details { flex: 1; display: flex; flex-direction: column; justify-content: space-between; }
        .item-name { font-size: 1.1rem; font-weight: 600; margin-bottom: 5px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
        .item-variant { color: var(--text-muted); font-size: 0.9rem; margin-bottom: 10px; }
        .item-price { color: var(--accent-orange); font-weight: 700; font-size: 1.2rem; }
        
        .item-actions { display: flex; flex-direction: column; justify-content: space-between; align-items: flex-end; }
        .btn-remove { color: #EF4444; background: transparent; border: none; cursor: pointer; font-size: 0.95rem; font-weight: 500; display: flex; align-items: center; gap: 5px; transition: var(--transition); }
        .btn-remove:hover { color: #DC2626; text-decoration: underline; }

        .quantity-control { display: flex; border: 1px solid var(--border-color); border-radius: 6px; overflow: hidden; height: 36px; }
        .qty-btn { width: 36px; background: #F9FAFB; border: none; cursor: pointer; font-size: 1rem; color: var(--text-main); transition: var(--transition); }
        .qty-btn:hover { background: #E5E7EB; }
        .qty-input { width: 45px; text-align: center; border: none; border-left: 1px solid var(--border-color); border-right: 1px solid var(--border-color); font-weight: 600; outline: none; }

        /* Box Thanh toán */
        .summary-box { background: var(--card-bg); border: 1px solid var(--border-color); border-radius: var(--radius-md); padding: 25px; position: sticky; top: 90px; }
        .summary-box h3 { font-size: 1.2rem; margin-bottom: 20px; padding-bottom: 15px; border-bottom: 1px solid var(--border-color); }
        .summary-row { display: flex; justify-content: space-between; margin-bottom: 15px; font-size: 1rem; color: var(--text-muted); }
        .summary-total { display: flex; justify-content: space-between; margin-top: 20px; padding-top: 20px; border-top: 1px dashed var(--border-color); align-items: center; }
        .summary-total span { font-size: 1.2rem; font-weight: 600; color: var(--text-main); }
        .summary-total .total-price { font-size: 1.8rem; font-weight: 700; color: var(--accent-orange); }
        
        .btn-checkout { width: 100%; background: var(--accent-orange); color: white; border: none; padding: 15px; border-radius: var(--radius-md); font-size: 1.1rem; font-weight: 600; margin-top: 25px; cursor: pointer; transition: var(--transition); }
        .btn-checkout:hover { background: #E64A19; transform: translateY(-2px); box-shadow: 0 4px 10px rgba(255, 87, 34, 0.3); }

        .empty-cart { text-align: center; padding: 50px 0; display: none; }
        .empty-cart i { font-size: 4rem; color: #D1D5DB; margin-bottom: 20px; }
        .empty-cart h3 { font-size: 1.5rem; color: var(--text-main); margin-bottom: 10px; }
        .empty-cart a { display: inline-block; margin-top: 20px; background: var(--primary-blue); color: white; padding: 10px 25px; border-radius: var(--radius-md); font-weight: 500; }

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

        @media (max-width: 768px) {
            .cart-layout { flex-direction: column; }
            .cart-item { flex-direction: column; }
            .item-img { width: 100%; height: 200px; }
            .item-actions { flex-direction: row; justify-content: space-between; width: 100%; margin-top: 15px; }
        }
    </style>
</head>
<body>

    <!-- Header -->
    <div class="top-bar"><span>🚀 Chính sách vận chuyển: Miễn phí giao hàng toàn quốc!</span></div>
    <header class="header">
        <div class="header-container">
            <a href="/" class="logo"><i class="fa-solid fa-microchip"></i> TechStore</a>
            <div class="header-actions">
                <div class="user-menu-container">
                    <div class="action-icon" title="Tài khoản">
                        <i class="fa-regular fa-user"></i>
                    </div>
                    <div class="user-dropdown">
                        <a href="/login" class="user-dropdown-item"><i class="fa-solid fa-arrow-right-to-bracket" style="margin-right:8px"></i> Đăng nhập</a>
                        <a href="/login#form-register" class="user-dropdown-item"><i class="fa-solid fa-user-plus" style="margin-right:8px"></i> Đăng ký</a>
                    </div>
                </div>
                <div class="action-icon" onclick="window.location.href='/cart'" title="Giỏ hàng"><i class="fa-solid fa-cart-shopping"></i><span class="badge" id="cartBadge">2</span></div>
            </div>
        </div>
    </header>

    <main class="main-content">
        <h2 class="page-title"><i class="fa-solid fa-cart-shopping" style="color: var(--primary-blue)"></i> Giỏ hàng của bạn</h2>

        <div class="cart-layout" id="cartLayout">
            <!-- Danh sách sản phẩm -->
            <div class="cart-items">
                
                <!-- Sản phẩm vừa được thêm từ trang chi tiết (mô phỏng) -->
                <div class="cart-item" id="item-new">
                    <img src="https://images.unsplash.com/photo-1611186871348-b1ce696e52c9?auto=format&fit=crop&q=80&w=300" alt="MacBook Pro" class="item-img">
                    <div class="item-details">
                        <div class="item-name">Apple MacBook Pro 14" M3 Pro 18GB 512GB - Hàng Chính Hãng</div>
                        <div class="item-variant">Màu: Space Black | 512GB SSD</div>
                        <div class="item-price">39.990.000đ</div>
                    </div>
                    <div class="item-actions">
                        <button class="btn-remove" onclick="removeItem('item-new', 39990000)"><i class="fa-solid fa-trash-can"></i> Xóa</button>
                        <div class="quantity-control">
                            <button class="qty-btn" onclick="updateTotal(-1, 39990000, 'qty-1')"><i class="fa-solid fa-minus"></i></button>
                            <input type="text" class="qty-input" id="qty-1" value="1" readonly>
                            <button class="qty-btn" onclick="updateTotal(1, 39990000, 'qty-1')"><i class="fa-solid fa-plus"></i></button>
                        </div>
                    </div>
                </div>

                <!-- Sản phẩm cũ có sẵn trong giỏ -->
                <div class="cart-item" id="item-old">
                    <img src="https://images.unsplash.com/photo-1583394838336-acd977736f90?auto=format&fit=crop&q=80&w=300" alt="AirPods" class="item-img">
                    <div class="item-details">
                        <div class="item-name">Tai nghe Bluetooth AirPods Pro 2 MagSafe</div>
                        <div class="item-variant">Phiên bản tiêu chuẩn</div>
                        <div class="item-price">5.690.000đ</div>
                    </div>
                    <div class="item-actions">
                        <button class="btn-remove" onclick="removeItem('item-old', 5690000)"><i class="fa-solid fa-trash-can"></i> Xóa</button>
                        <div class="quantity-control">
                            <button class="qty-btn" onclick="updateTotal(-1, 5690000, 'qty-2')"><i class="fa-solid fa-minus"></i></button>
                            <input type="text" class="qty-input" id="qty-2" value="1" readonly>
                            <button class="qty-btn" onclick="updateTotal(1, 5690000, 'qty-2')"><i class="fa-solid fa-plus"></i></button>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Tóm tắt thanh toán -->
            <div class="cart-summary">
                <div class="summary-box">
                    <h3>Tóm tắt đơn hàng</h3>
                    <div class="summary-row">
                        <span>Tạm tính (<span id="totalItems">2</span> sản phẩm)</span>
                        <span id="subTotal" style="color: var(--text-main); font-weight: 500;">45.680.000đ</span>
                    </div>
                    <div class="summary-row">
                        <span>Phí vận chuyển</span>
                        <span style="color: #10B981; font-weight: 500;">Miễn phí</span>
                    </div>
                    
                    <div class="summary-total">
                        <span>Tổng tiền:</span>
                        <span class="total-price" id="finalTotal">45.680.000đ</span>
                    </div>
                    <p style="text-align: right; font-size: 0.8rem; color: var(--text-muted); margin-top: 5px;">(Đã bao gồm VAT nếu có)</p>
                    
                    <button class="btn-checkout" onclick="alert('Đang chuyển hướng sang cổng thanh toán...')">TIẾN HÀNH THANH TOÁN</button>
                </div>
            </div>
        </div>

        <!-- Trạng thái giỏ hàng trống (Ẩn mặc định) -->
        <div class="empty-cart" id="emptyCart">
            <i class="fa-solid fa-cart-arrow-down"></i>
            <h3>Giỏ hàng của bạn đang trống!</h3>
            <p style="color: var(--text-muted)">Hãy quay lại trang chủ và chọn cho mình những món đồ công nghệ yêu thích nhé.</p>
            <a href="/">Tiếp tục mua sắm</a>
        </div>
    </main>

    <script>
        let currentTotal = 45680000;
        let itemsCount = 2;

        // Hàm format tiền tệ (Ví dụ: 39990000 -> 39.990.000đ)
        function formatMoney(amount) {
            return amount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + "đ";
        }

        // Cập nhật tổng tiền khi tăng/giảm số lượng
        function updateTotal(change, price, inputId) {
            const input = document.getElementById(inputId);
            let qty = parseInt(input.value);
            
            if (qty + change < 1) return; // Không cho phép số lượng < 1
            
            input.value = qty + change;
            currentTotal += (change * price);
            
            document.getElementById('subTotal').innerText = formatMoney(currentTotal);
            document.getElementById('finalTotal').innerText = formatMoney(currentTotal);
        }

        // Xóa sản phẩm khỏi giỏ hàng
        function removeItem(itemId, price) {
            const itemElement = document.getElementById(itemId);
            const qty = parseInt(itemElement.querySelector('.qty-input').value);
            
            // Hiệu ứng mờ dần trước khi xóa
            itemElement.style.opacity = '0';
            setTimeout(() => {
                itemElement.remove();
                
                // Trừ tiền
                currentTotal -= (price * qty);
                itemsCount -= 1;
                
                // Cập nhật giao diện
                document.getElementById('cartBadge').innerText = itemsCount;
                document.getElementById('totalItems').innerText = itemsCount;
                document.getElementById('subTotal').innerText = formatMoney(currentTotal);
                document.getElementById('finalTotal').innerText = formatMoney(currentTotal);

                // Nếu không còn sản phẩm nào thì hiển thị giao diện giỏ hàng trống
                if (itemsCount === 0) {
                    document.getElementById('cartLayout').style.display = 'none';
                    document.getElementById('emptyCart').style.display = 'block';
                }
            }, 300); // Đợi 300ms cho hiệu ứng chạy xong
        }
    </script>
</body>
</html>
