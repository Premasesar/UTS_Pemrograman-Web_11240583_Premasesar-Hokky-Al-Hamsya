<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login SIAKAD - STMIK El Rahma</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        /* Background Khas IT dengan Overlay Hijau Kampus */
        body {
            background: linear-gradient(rgba(0, 77, 64, 0.85), rgba(0, 38, 33, 0.9)), 
                        url('https://images.unsplash.com/photo-1550751827-4bd374c3f58b?q=80&w=1470&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            font-family: 'Segoe UI', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            overflow: hidden;
            color: white;
        }

        /* Wrapper Form Tanpa Kotak Putih */
        .login-wrapper {
            padding: 40px;
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        /* PERBAIKAN LOGO: Dikasih background putih biar super jelas! */
        .logo-kampus {
            width: 140px;
            height: 140px;
            background: #ffffff; /* Background putih murni */
            padding: 12px;
            border-radius: 50%;
            border: 4px solid #a5d6a7; /* Garis tepi hijau muda */
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.6);
            margin-bottom: 25px;
            object-fit: contain;
        }

        .siakad-title {
            font-weight: 800;
            letter-spacing: 2px;
            text-shadow: 2px 2px 10px rgba(0,0,0,0.5);
            margin-bottom: 5px;
        }

        .motto {
            font-size: 0.8rem;
            color: rgba(255, 255, 255, 0.8);
            font-style: italic;
            margin-bottom: 40px;
        }

        /* PERBAIKAN INPUT: Garis dan tulisan diterangin biar nggak samar */
        .form-control {
            border-radius: 15px;
            padding: 12px 20px;
            background-color: rgba(255, 255, 255, 0.15); /* Diterangin dikit */
            border: 1.5px solid rgba(255, 255, 255, 0.5); /* Garis batas lebih jelas */
            color: white;
            transition: 0.3s;
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.7); /* Tulisan bayangan lebih terang */
        }

        .form-control:focus {
            background-color: rgba(255, 255, 255, 0.25);
            border-color: #a5d6a7;
            box-shadow: 0 0 15px rgba(165, 214, 167, 0.4);
            color: white;
        }

        /* Label Input Putih Bersih */
        .form-label {
            color: #ffffff;
            font-size: 0.75rem;
            letter-spacing: 1px;
        }

        /* Tombol Cerah biar Kontras */
        .btn-login {
            background: #ffffff;
            color: #004d40;
            border: none;
            border-radius: 15px;
            padding: 14px;
            font-weight: 800;
            letter-spacing: 1px;
            transition: 0.3s;
            margin-top: 15px;
        }

        .btn-login:hover {
            background: #a5d6a7;
            color: #00332a;
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.4);
        }

        .footer-text {
            margin-top: 50px;
            font-size: 0.7rem;
            color: rgba(255, 255, 255, 0.6);
        }
    </style>
</head>
<body class="vh-100">

    <div class="login-wrapper">
        <img src="https://www.google.com/s2/favicons?domain=stmikelrahma.ac.id&sz=256" alt="Logo El Rahma" class="logo-kampus">
        
        <h3 class="siakad-title text-uppercase">SIAKAD EL RAHMA</h3>
        <p class="motto">"Jago IT, Qur'ani, Lulus Jadi Jutawan"</p>

        <form method="post" action="loginsubmit.php" class="text-start">
            <div class="mb-3">
                <label class="form-label fw-bold">USERNAME</label>
                <input name="username" type="text" class="form-control" placeholder="Masukkan username admin" required>
            </div>
            <div class="mb-4">
                <label class="form-label fw-bold">PASSWORD</label>
                <input name="pass" type="password" class="form-control" placeholder="Masukkan password" required>
            </div>
            <button type="submit" class="btn btn-login w-100 shadow-lg">
                MASUK 
            </button>
        </form>

        <div class="footer-text">
            &copy; 2026 STMIK El Rahma Yogyakarta
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>