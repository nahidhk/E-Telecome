<!-- file: engCard.php -->
<?php
    // error_reporting(E_ALL); ini_set('display_errors', 1);
    include "hader.php";
    $allData = ndsql_get_pages();

?>

<div class="w100">


    <div class="table-wrap ">
        <div class="flex beet medel">
            <div>
                <h2 class="table-title">Pages Info</h2>
                <p class="table-sub">List of all page info</p>
            </div>
            <div onclick="window.location.href='pageNew.php?i=pages.php'" class="btn">
                <i class="fa-solid fa-plus"></i> Add New
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Title</th>
                    <th>Views</th>
                    <th>Admin</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($allData): ?>
                <?php foreach ($allData as $dev): ?>
                <?php $socials = $dev['socials'] ?? []; ?>
                <tr>
                    <td class="td-id"><?php echo htmlspecialchars($dev['id']) ?></td>

                    <td class="td-name">
                        <small><?php echo htmlspecialchars($dev['link_address']) ?></small>
                        <strong><?php echo htmlspecialchars($dev['title']) ?></strong>
                    </td>

                    <td>
                        <?php echo htmlspecialchars($dev['views']) ?>
                    </td>
                    <td>
                        <p><?php echo htmlspecialchars($dev['editor']) ?></p>
                    </td>
                    <td class="td-name">
                        <p>
                            <strong>Last Updated:&nbsp; <small>
                                    <?php echo htmlspecialchars($dev['last_edit']) ?></small> </strong>

                            <strong>Create Date: &nbsp; <small>
                                    <?php echo htmlspecialchars($dev['create_date']) ?></small></strong>

                        </p>

                    </td>

                    <td>
                        <div>
                            <?php 
                             $check = $dev['status'];
                                if($check === "published"){
                                    echo '<span class="published"> <i class="fa-regular fa-eye"></i> Published</span>';
                                }
                                if($check === "draft"){
                                    echo '<span class="draft"><i class="fa-solid fa-box-archive"></i> Draft</span>';
                                }
                                if($check === "private"){
                                    echo '<span class="private"><i class="fa-solid fa-lock"></i> Private</span>';
                                }
                                if($check === "trash"){
                                     echo '<span class="trash"><i class="fa-solid fa-trash"></i> Trash</span>';
                                }
                            ?>
                        </div>
                    </td>

                    <td>
                        <div class="td-socials">
                            <a
                                href="pageEdit.php?i=pages.php&link_address=<?php echo htmlspecialchars($dev['link_address']) ?>">
                                <i class="fa-solid fa-user-pen"></i>
                            </a>
                            <a href="xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx.php?delete=<?php echo $dev['id']; ?>"
                                onclick="return confirm('Are you sure?')">
                                <i class="fa-solid fa-user-xmark"></i>
                            </a>
                            <a href="/page/?p=<?php echo $dev['link_address'] ?>">
                                <i class="fa-solid fa-globe"></i>
                            </a>
                        </div>

                    </td>


                </tr>


                <?php endforeach; ?>
                <?php else: ?>
                <tr>
                    <td colspan="7" class="td-empty">No developer found.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>




</div>


<?php include "footer.php"; ?>