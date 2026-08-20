<?php 
include('./hader.php');

$imgName = $_GET['image'] ?? null;

echo $imgName;

if ($imgName) {
    global $conn; 
    $filePath = 'uploads/' . $imgName;

    if (file_exists($filePath)) {
        unlink($filePath);

        // Delete the record from the database
        $stmt = $conn->prepare("DELETE FROM images WHERE file_path = ?");
        $stmt->execute([$imgName]);

        echo "<script>alert('Image deleted successfully.'); window.location.href='upload.php?i=upload.php';</script>";
    } else {
        echo "<script>alert('Image not found.'); window.location.href='upload.php?i=upload.php';</script>";
    }
} else {
    echo "<script>alert('No image specified.'); window.location.href='upload.php?i=upload.php';</script>";
}


?>









<?php include('./footer.php') ?>