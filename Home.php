<?php
// Configuration
$db_host = 'localhost';
$db_username = 'your_username';
$db_password = 'your_password';
$db_name = ' royal_events';

// Connect to the database
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve images data
$sql = "SELECT * FROM images";
$result = $conn->query($sql);

// Retrieve carousels data
$sql = "SELECT * FROM carousels";
$carousel_result = $conn->query($sql);

// Close the connection
$conn->close();
?>

<!-- Display images -->
<div class="u-gallery u-layout-grid u-lightbox u-no-transition u-show-text-none u-block-220b-3">
    <div class="u-gallery-inner u-block-220b-4">
        <?php while($row = $result->fetch_assoc()) { ?>
            <div class="u-effect-hover-zoom u-gallery-item u-block-220b-5">
                <div class="u-back-slide u-block-220b-6">
                    <img class="u-back-image u-expanded u-block-220b-7" src="<?php echo $row['image_url']; ?>">
                </div>
                <div class="u-over-slide u-shading u-block-220b-8">
                    <h3 class="u-gallery-heading"><?php echo $row['title']; ?></h3>
                    <p class="u-gallery-text"><?php echo $row['description']; ?></p>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<!-- Display carousels -->
<div class="u-carousel u-expanded-width u-gallery u-gallery-slider u-layout-carousel u-lightbox u-no-transition u-show-text-on-hover u-block-220b-29" data-interval="5000" data-u-ride="carousel" id="carousel-7b3b">
    <ol class="u-absolute-hcenter u-carousel-indicators u-block-220b-30">
        <?php $i = 0; while($row = $carousel_result->fetch_assoc()) { ?>
            <li data-u-target="#carousel-7b3b" data-u-slide-to="<?php echo $i; ?>" class="<?php if($i == 0) { echo 'u-active'; } ?> u-grey-70 u-shape-circle" style="width: 10px; height: 10px;"></li>
            <?php $i++; ?>
        <?php } ?>
    </ol>
    <div class="u-carousel-inner u-gallery-inner u-block-220b-31" role="listbox" data-key="rouded">
        <?php $i = 0; $carousel_result->data_seek(0); while($row = $carousel_result->fetch_assoc()) { ?>
            <div class="u-carousel-item u-effect-fade u-gallery-item u-block-220b-32 <?php if($i == 0) { echo 'u-active'; } ?>">
                <div class="u-back-slide u-block-220b-33">
                    <img class="u-back-image u-expanded u-block-220b-34" src="<?php echo $row['image_url']; ?>">
                </div>
                <div class="u-align-center u-over-slide u-shading u-valign-bottom u-block-220b-35" data-shading="linear-gradient(0deg, rgba(var(--black-r),var(--black-g),var(--black-b),0.2), rgba(var(--black-r),var(--black-g),var(--black-b),0.2))">
                    <h3 class="u-gallery-heading"><?php echo $row['title']; ?></h3>
                    <p class="u-gallery-text"><?php echo $row['description']; ?></p>
                </div>
            </div>
            <?php $i++; ?>
        <?php } ?>
    </div>
    <a class="u-absolute-vcenter u-carousel-control u-carousel-control-prev u-grey-70 u-icon-circle u-opacity u-opacity-70 u