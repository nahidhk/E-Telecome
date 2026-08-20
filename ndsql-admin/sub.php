<?php
include("./hader.php");
?>










<div>


    <div class="table-wrap">
        <div class="flex beet medel">
            <div>
                <h2 class="table-title">Cards Info</h2>
                <p class="table-sub">List of all card info</p>
            </div>
            <div onclick="window.location.href='engCardNew.php?i=engCard.php'" class="btn">
                <i class="fa-solid fa-plus"></i> Add New
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Profile Image</th>
                    <th>email</th>
                    <th>status</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($allData): ?>
                <?php foreach ($allData as $dev): ?>
                <?php $socials = $dev['socials'] ?? []; ?>
                <tr>
                    <td class="td-id"><?php echo htmlspecialchars($dev['id']) ?></td>

                    <td class="td-avatar">
                      22222
                    </td>

                    <td class="td-name">
                        <strong><?php echo htmlspecialchars($dev['name']) ?></strong>
                        <small><?php echo htmlspecialchars($dev['title']) ?></small>
                    </td>

                    <td class="td-contact">
                        <div><i class="fa-regular fa-envelope"></i><b><?php echo htmlspecialchars($dev['email']) ?></b>
                        </div>
                        <div><i class="fa-solid fa-phone"></i><?php echo htmlspecialchars($dev['phone']) ?></div>
                        <div><i class="fa-solid fa-location-dot"></i><?php echo htmlspecialchars($dev['address']) ?>
                        </div>
                    </td>

                    <td>
                        <div class="td-skills">
                            <?php if (! empty($dev['skills'])): ?>
                            <?php foreach ($dev['skills'] as $skill): ?>
                            <span><?php echo htmlspecialchars($skill) ?></span>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </td>

                    <td>
                        <div class="td-socials">
                            <?php foreach (['github' => 'github', 'facebook' => 'facebook-f', 'linkedin' => 'linkedin-in', 'twitter' => 'x-twitter'] as $key => $icon): ?>
                            <?php if (! empty($socials[$key]) && $socials[$key] !== '#'): ?>
                            <a href="<?php echo htmlspecialchars($socials[$key]) ?>" target="_blank"
                                aria-label="<?php echo ucfirst($key) ?>">
                                <i class="fa-brands fa-<?php echo $icon ?>"></i>
                            </a>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </td>
                    <td>
                        <div class="td-socials">
                            <a href="engCradEdit.php?i=engCard.php&id=<?php echo htmlspecialchars($dev['id']) ?>">
                                <i class="fa-solid fa-user-pen"></i>
                            </a>
                            <a href="engCard.php?delete=<?php echo $dev['id']; ?>"
                                onclick="return confirm('Are you sure?')">
                                <i class="fa-solid fa-user-xmark"></i>
                            </a>
                        </div>

                    </td>


                </tr>


                <?php endforeach; ?>
                <?php else: ?>
                <tr>
                    <td colspan="6" class="td-empty">No data found.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>




</div>












<?php 
include("./footer.php")
?>