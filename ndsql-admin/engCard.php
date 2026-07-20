<?php
// error_reporting(E_ALL); ini_set('display_errors', 1);
include("hader.php");
$allData = ndsql_get_developer();
?>

<div class="table-wrap">
   <div class="flex beet medel">
    <div>
         <h2 class="table-title">Cards Info</h2>
    <p class="table-sub">List of all card info</p>
    </div>
    <div class="btn">
      <i class="fa-solid fa-plus"></i> Add New
    </div>
   </div>

    <table>
        <thead>
            <tr>
                <th>#ID</th>
                <th>Profile Image</th>
                <th>Name</th>
                <th>Contact And Address</th>
                <th>Skill</th>
                <th>Social</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($allData): ?>
                <?php foreach ($allData as $dev): ?>
                    <?php $socials = $dev['socials'] ?? []; ?>
                    <tr>
                        <td class="td-id"><?= htmlspecialchars($dev['id']) ?></td>

                        <td class="td-avatar">
                            <img src="<?= htmlspecialchars($dev['profile_image']) ?>" alt="<?= htmlspecialchars($dev['name']) ?>">
                        </td>

                        <td class="td-name">
                            <strong><?= htmlspecialchars($dev['name']) ?></strong>
                            <small><?= htmlspecialchars($dev['title']) ?></small>
                        </td>

                        <td class="td-contact">
                            <div><i class="fa-regular fa-envelope"></i><b><?= htmlspecialchars($dev['email']) ?></b></div>
                            <div><i class="fa-solid fa-phone"></i><?= htmlspecialchars($dev['phone']) ?></div>
                            <div><i class="fa-solid fa-location-dot"></i><?= htmlspecialchars($dev['address']) ?></div>
                        </td>

                        <td>
                            <div class="td-skills">
                                <?php if (!empty($dev['skills'])): ?>
                                    <?php foreach ($dev['skills'] as $skill): ?>
                                        <span><?= htmlspecialchars($skill) ?></span>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </td>

                        <td>
                            <div class="td-socials">
                                <?php foreach (['github'=>'github','facebook'=>'facebook-f','linkedin'=>'linkedin-in','twitter'=>'x-twitter'] as $key => $icon): ?>
                                    <?php if (!empty($socials[$key]) && $socials[$key] !== '#'): ?>
                                        <a href="<?= htmlspecialchars($socials[$key]) ?>" target="_blank" aria-label="<?= ucfirst($key) ?>">
                                            <i class="fa-brands fa-<?= $icon ?>"></i>
                                        </a>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="6" class="td-empty">No developer found.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php include("footer.php"); ?>