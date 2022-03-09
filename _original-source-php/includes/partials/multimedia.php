<?php
$youtubeUrl = 'https://www.youtube-nocookie.com/embed/KX3OnQeETdI';
$audioUrl = 'https://file-examples-com.github.io/uploads/2017/11/file_example_MP3_700KB.mp3';
$videoUrl = 'https://file-examples-com.github.io/uploads/2020/03/file_example_WEBM_480_900KB.webm';
?>
            <h2 id="multimedia-dialog">Dialog</h2>
            <dialog open>This is an open dialog window</dialog>
            <p>The dialog may not support in all browsers.</p>

            <h2 id="multimedia-iframe">Iframe</h2>
            <iframe src="<?php echo $youtubeUrl; ?>"></iframe>

            <h2 id="multimedia-audiovideo">Audio &amp; video</h2>
            <h3 id="multimedia-audiovideoaudio">Audio</h3>
            <audio controls src="<?php echo $audioUrl; ?>"></audio>
            <h3 id="multimedia-audiovideovideo">Video</h3>
            <video controls width="300" height="150">
                <source src="<?php echo $videoUrl; ?>">
            </video>
            <h3 id="multimedia-audiovideoembed">Embed</h3>
            <embed type="video/webm" src="<?php echo $videoUrl; ?>" width="300" height="150">
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