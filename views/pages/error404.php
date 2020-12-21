<div>
    <?
        if(!isset($errMsg) || empty($errMsg))
        {
            $errMsg =  'Error 404: Controller you call does not exists';
        }
        # in finaler Version vielleicht einfach so etwas wie 'Upps, irgendwas ist schief gelaufen...'
    ?>
    <br><h2><?=$errMsg?></h2>
    <img src="assets/img/gta-5-wasted.gif" height=400 alt="error">
    <!--<audio src="assets/sound/gta-5-wasted.mp3" autoplay></audio>
    <script>document.getElementsByTagName("audio")[0].volume = 0.1;</script>-->
</div>
