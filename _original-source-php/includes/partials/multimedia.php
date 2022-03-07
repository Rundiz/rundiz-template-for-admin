<?php
$youtubeUrl = 'https://www.youtube-nocookie.com/embed/KX3OnQeETdI';
?>
            <h2 id="multimedia-dialog">Dialog</h2>
            <dialog open>This is an open dialog window</dialog>
            <p>The dialog may not support in all browsers.</p>

            <h2 id="multimedia-iframe">Iframe</h2>
            <iframe src="<?php echo $youtubeUrl; ?>"></iframe>

            <h2 id="multimedia-audiovideo">Audio &amp; video</h2>
            <h3 id="multimedia-audiovideoaudio">Audio</h3>
            <audio controls></audio>
            <h3 id="multimedia-audiovideovideo">Video</h3>
            <video controls width="300" height="150">
                <source src="https://file-examples-com.github.io/uploads/2020/03/file_example_WEBM_480_900KB.webm">
            </video>
            <h3 id="multimedia-audiovideoembed">Embed</h3>
            <embed type="video/webm" src="https://file-examples-com.github.io/uploads/2020/03/file_example_WEBM_480_900KB.webm" width="300" height="150">
            <h3 id="multimedia-audiovideoobject">Object</h3>
            <object data="<?php echo $youtubeUrl; ?>" width="300" height="150"></object>

            <h2 id="multimedia-image">Image</h2>
            <img src="assets/images/1920x1080.jpg" alt="1920x1080">
            <p>The image above will not resize on small screen.</p>
            <h3 id="multimedia-image-fluidresponsive">Fluid or responsive image</h3>
            <img class="fluid" src="assets/images/1920x1080.jpg" alt="1920x1080">
            <p>The image above will be resize on small screen.</p>
            <h3 id="multimedia-image-figcaption">Image with figcaption</h3>
            <figure>
                <img class="fluid" src="assets/images/1920x1080.jpg" alt="1920x1080">
                <figcaption>The image caption.</figcaption>
            </figure>
            <h3 id="multimedia-image-picture">Picture element</h3>
            <picture>
                <img class="fluid" src="assets/images/1920x1080.jpg" alt="1920x1080">
            </picture>