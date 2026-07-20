
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
<style>
  :root{
    --bg: #0a0a12;
    --panel: #12121c;
    --panel-2: #16161f;
    --violet: #7c4dff;
    --violet-soft: #9d7bff;
    --violet-glow: rgba(124, 77, 255, 0.35);
    --text: #f3f1fa;
    --muted: #9a95ad;
    --line: rgba(255,255,255,0.08);
  }

  *{ box-sizing: border-box; }


  .card{
    position: relative;
    width: 320px;
    border-radius: 22px;
    padding: 2px;
    background: linear-gradient(155deg, rgba(124,77,255,0.55), rgba(124,77,255,0.03) 35%, rgba(124,77,255,0.03) 65%, rgba(124,77,255,0.4));
    box-shadow:
      0 30px 60px -20px rgba(0,0,0,0.65),
      0 0 0 1px rgba(255,255,255,0.02);
  }

  .card-inner{
    position: relative;
    border-radius: 20px;
    background: linear-gradient(180deg, var(--panel) 0%, var(--panel-2) 100%);
    padding: 36px 26px 26px;
    overflow: hidden;
  }

  .card-inner::before{
    content:"";
    position:absolute;
    top:-60px; right:-60px;
    width:180px; height:180px;
    background: radial-gradient(circle, var(--violet-glow), transparent 70%);
    filter: blur(10px);
    pointer-events:none;
  }

  .eyebrow{
    display:flex;
    align-items:center;
    justify-content:center;
    gap:8px;
    font-family:'Space Grotesk', sans-serif;
    font-size: 11px;
    letter-spacing: 3px;
    text-transform: uppercase;
    color: var(--violet-soft);
    margin-bottom: 22px;
  }
  .eyebrow::before, .eyebrow::after{
    content:"";
    height:1px;
    width:20px;
    background: linear-gradient(90deg, transparent, var(--violet-soft));
  }
  .eyebrow::after{ background: linear-gradient(90deg, var(--violet-soft), transparent); }

  .avatar-wrap{
    position:relative;
    width: 128px;
    height: 128px;
    margin: 0 auto 20px;
  }
  .avatar-ring{
    position:absolute;
    inset:-6px;
    border-radius:50%;
    background: conic-gradient(from 0deg, var(--violet), transparent 30%, transparent 70%, var(--violet));
    animation: spin 6s linear infinite;
  }
  @keyframes spin{ to{ transform: rotate(360deg); } }

  .avatar{
    position:relative;
    width:128px; height:128px;
    border-radius:50%;
    padding:4px;
    background: var(--panel);
  }
  .avatar img{
    width:100%; height:100%;
    border-radius:50%;
    object-fit:cover;
    display:block;
  }

  .name{
    text-align:center;
    font-family:'Space Grotesk', sans-serif;
    font-size: 21px;
    font-weight: 700;
    letter-spacing: 0.3px;
    margin: 0 0 6px;
    color: var(--text);
  }

  .role{
    text-align:center;
    font-size: 13px;
    color: var(--muted);
    line-height: 1.5;
    margin: 0 0 22px;
    padding: 0 8px;
  }

  .tags{
    display:flex;
    flex-wrap:wrap;
    gap:8px;
    justify-content:center;
    list-style:none;
    padding:0;
    margin: 0 0 24px;
  }
  .tags li{
    font-size: 11.5px;
    font-weight: 500;
    color: var(--violet-soft);
    background: rgba(124,77,255,0.10);
    border: 1px solid rgba(124,77,255,0.28);
    padding: 6px 12px;
    border-radius: 999px;
    white-space: nowrap;
  }

  .contact{
    display:flex;
    flex-direction:column;
    gap:10px;
    padding: 16px 16px;
    background: rgba(255,255,255,0.02);
    border: 1px solid var(--line);
    border-radius: 14px;
    margin-bottom: 22px;
  }
  .contact-row{
    display:flex;
    align-items:flex-start;
    gap:10px;
    font-size: 12.5px;
    color: var(--text);
  }
  .contact-row i{
    width: 16px;
    text-align:center;
    color: var(--violet);
    margin-top: 2px;
    font-size: 13px;
  }
  .contact-row span{ color: var(--muted); }

  .socials{
    display:flex;
    justify-content:center;
    gap:12px;
  }
  .socials a{
    width: 42px; height:42px;
    display:flex; align-items:center; justify-content:center;
    border-radius: 12px;
    background: rgba(255,255,255,0.03);
    border: 1px solid var(--line);
    color: var(--muted);
    font-size: 17px;
    text-decoration:none;
    transition: transform 0.2s ease, color 0.2s ease, border-color 0.2s ease, background 0.2s ease;
  }
  .socials a:hover{
    transform: translateY(-3px);
    color: #fff;
    border-color: var(--violet);
    background: rgba(124,77,255,0.18);
  }

  @media (max-width: 360px){
    .card{ width: 92vw; }
  }
</style>

<?php
$allData = ndsql_get_developer();
?>

<div class="flex center medel wrap">

<?php if ($allData): ?>
    <?php foreach ($allData as $dev): ?>

        <?php
            // WhatsApp লিংকের জন্য ফোন নাম্বার থেকে + আর স্পেস বাদ দিলাম
            $whatsappNumber = preg_replace('/[^0-9]/', '', $dev['phone']);

            // socials ডেটা array আকারে আসছে (JSON decode আগেই করা আছে ফাংশনে)
            $socials = $dev['socials'] ?? [];
        ?>

        <div class="card">
            <div class="card-inner">

                <div class="eyebrow">Engineer Card</div>

                <div class="avatar-wrap">
                    <div class="avatar-ring"></div>
                    <div class="avatar">
                        <img src="<?= htmlspecialchars($dev['profile_image']) ?>" 
                             alt="<?= htmlspecialchars($dev['name']) ?>">
                    </div>
                </div>

                <h2 class="name"><?= htmlspecialchars($dev['name']) ?></h2>
                <p class="role"><?= htmlspecialchars($dev['title']) ?></p>

                <ul class="tags">
                    <?php if (!empty($dev['skills'])): ?>
                        <?php foreach ($dev['skills'] as $skill): ?>
                            <li><?= htmlspecialchars($skill) ?></li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>

                <div class="contact">
                    <div class="contact-row">
                        <i class="fa-regular fa-envelope"></i>
                        <span><?= htmlspecialchars($dev['email']) ?></span>
                    </div>
                    <div class="contact-row">
                        <i class="fa-solid fa-phone"></i>
                        <span><?= htmlspecialchars($dev['phone']) ?></span>
                    </div>
                    <div class="contact-row">
                        <i class="fa-solid fa-location-dot"></i>
                        <span><?= htmlspecialchars($dev['address']) ?></span>
                    </div>
                </div>

                <div class="socials">
                    <?php if (!empty($socials['github']) && $socials['github'] !== '#'): ?>
                        <a href="<?= htmlspecialchars($socials['github']) ?>" target="_blank" aria-label="GitHub">
                            <i class="fa-brands fa-github"></i>
                        </a>
                    <?php endif; ?>

                    <?php if (!empty($socials['facebook']) && $socials['facebook'] !== '#'): ?>
                        <a href="<?= htmlspecialchars($socials['facebook']) ?>" target="_blank" aria-label="Facebook">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                    <?php endif; ?>

                    <?php if (!empty($socials['linkedin']) && $socials['linkedin'] !== '#'): ?>
                        <a href="<?= htmlspecialchars($socials['linkedin']) ?>" target="_blank" aria-label="LinkedIn">
                            <i class="fa-brands fa-linkedin-in"></i>
                        </a>
                    <?php endif; ?>

                    <?php if (!empty($socials['twitter']) && $socials['twitter'] !== '#'): ?>
                        <a href="<?= htmlspecialchars($socials['twitter']) ?>" target="_blank" aria-label="X / Twitter">
                            <i class="fa-brands fa-x-twitter"></i>
                        </a>
                    <?php endif; ?>

                    <?php if ($whatsappNumber): ?>
                        <a href="https://wa.me/<?= $whatsappNumber ?>" target="_blank" aria-label="WhatsApp">
                            <i class="fa-brands fa-whatsapp"></i>
                        </a>
                    <?php endif; ?>
                </div>

            </div>
        </div>

    <?php endforeach; ?>
<?php else: ?>
    <p style="text-align:center; width:100%;">No developer found.</p>
<?php endif; ?>

</div>

