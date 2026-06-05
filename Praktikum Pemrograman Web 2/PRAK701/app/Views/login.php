<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('css/login.css') ?>">
</head>
<body>

<div class="login-card">
    
    <h1>Log in</h1>

    <?php if (session()->getFlashdata('warning')) : ?>
        <div class="alert-duo alert-duo-warning">
            ⚠️ <?= session()->getFlashdata('warning') ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert-duo">
            🚫 <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <form action="/login" method="post">
        
        <div class="input-group">
            <input type="text" 
                   name="username" 
                   class="duo-input" 
                   placeholder="Username atau email" 
                   required>
        </div>

        <div class="input-group">
            <input type="password" 
                   name="password" 
                   class="duo-input" 
                   placeholder="Password" 
                   required>
            
        </div>

        <button type="submit" class="btn-duo-login">Log In</button>

    </form>

    <div class="divider"></div>

    <div style="font-size: 14px; font-weight: 700; color: #afafaf;">
        Praktikum Modul 7<br>

    </div>

</div>

</body>
</html>