<?php
// بيانات تجريبية لمباريات وسيرفرات متعددة
$matches = [
    1 => [
        "title" => "ارسنال ضد نيوكاسل - سيرفرات متعدده",
        "servers" => [
            ["name" => "سيرفر 1 (HD)", "url" => "https://912acsss8af382.sirtv.top/playervv5.php?match=4741993&key=9f39972b67d6ce22189507d008acwc26"],
            ["name" => "سيرفر 2 (احتياطي)", "url" => "https://ult11.ultrafreeopenmoonandroidbuild.shop/fk/nicmbbivwpga/index.html"],
            ["name" => "سيرفر 3 (سرعة متوسطة)", "url" => "https://yll7.akbarnews.store/cdn/master.m3u8"],
        ]
    ]
];

$matchId = isset($_GET['id']) ? (int)$_GET['id'] : 1;
$match = $matches[$matchId] ?? $matches[1];
$firstServer = $match['servers'][0]['url'] ?? '';
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($match['title']) ?></title>
    <style>
        body { font-family: sans-serif; background: #111; color: #fff; margin: 0; padding: 20px; text-align: center; }
        .player-box { max-width: 850px; margin: 20px auto; background: #000; border-radius: 10px; overflow: hidden; }
        iframe { width: 100%; height: 460px; border: 0; display: block; }
        .servers { margin-top: 15px; display: flex; gap: 10px; justify-content: center; flex-wrap: wrap; }
        .btn { padding: 10px 18px; border: 0; border-radius: 6px; cursor: pointer; background: #2b2b2b; color: #fff; }
        .btn.active { background: #e11d48; }
    </style>
</head>
<body>

    <h2><?= htmlspecialchars($match['title']) ?></h2>

    <div class="player-box">
        <iframe id="streamFrame" src="<?= htmlspecialchars($firstServer) ?>" allowfullscreen></iframe>
    </div>

    <div class="servers">
        <?php foreach ($match['servers'] as $index => $server): ?>
            <button
                class="btn <?= $index === 0 ? 'active' : '' ?>"
                onclick="changeServer('<?= htmlspecialchars($server['url'], ENT_QUOTES) ?>', this)">
                <?= htmlspecialchars($server['name']) ?>
            </button>
        <?php endforeach; ?>
    </div>

    <script>
        function changeServer(url, clickedBtn) {
            document.getElementById('streamFrame').src = url;
            document.querySelectorAll('.servers .btn').forEach(btn => btn.classList.remove('active'));
            clickedBtn.classList.add('active');
        }
    </script>

</body>
</html>
