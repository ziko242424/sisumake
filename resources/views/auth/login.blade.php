<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login | Arsip Surat</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            background: #1e293b; /* senada sidebar */
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        .login-card {
            width: 380px;
            padding: 35px;
            border-radius: 18px;
            background: rgba(255,255,255,0.15);
            backdrop-filter: blur(15px);
            color: #1e293b;
            animation: fadeIn 0.8s ease;
            box-shadow: 0 25px 40px rgba(0,0,0,0.3);
        }

        .login-card h3 {
            font-weight: 600;
            text-align: center;
            margin-bottom: 10px;
            color: #fff;
        }

        .login-card p {
            text-align: center;
            font-size: 14px;
            opacity: 0.8;
            color: #cbd5e1;
        }

        .form-control {
            background: #ffffff;
            border: none;
            color: #1e293b;
            border-radius: 12px;
            padding: 12px;
        }

        .form-control:focus {
            box-shadow: 0 0 5px rgba(30,41,59,0.5);
            outline: none;
        }

        .btn-login {
            background: #1e293b;
            color: #ffffff;
            font-weight: 600;
            border-radius: 30px;
            transition: 0.3s;
        }

        .btn-login:hover {
            background: #334155;
            transform: translateY(-2px);
        }

        .icon-circle {
            width: 80px;
            height: 80px;
            background: #ffffff33;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: auto;
            margin-bottom: 15px;
            font-size: 30px;
            color: #fff;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(40px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>

<body>

<div class="login-card">
    <div class="icon-circle">
        <i class="fas fa-folder-open"></i>
    </div>

    <h3>SISUMAKE</h3>
    <h3>DPPKBPPPA KOTA PRABUMULIH</h3>
    <p>Sistem Informasi Surat Masuk dan Keluar</p>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3">
            <input type="username" name="username" class="form-control" placeholder="Username" required autofocus>
        </div>

        <div class="mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>

        <button class="btn btn-login w-100 mt-3">
            <i class="fas fa-sign-in-alt"></i> Masuk
        </button>
    </form>
</div>

</body>
</html>
