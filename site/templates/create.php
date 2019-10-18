<?php namespace ProcessWire; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo $config->urls->templates?>styles/iziToast.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $config->urls->templates?>styles/main.css" />


</head>
<body>


<div id="container">


    <div id="create">
        <form>
            <div class="field">
                <input type="text" name="fullname" id="fullname" placeholder="Jane Appleseed">
                <label for="fullname">Name</label>
            </div>

            <div class="field">
                <input type="email" name="email" id="email" placeholder="jane.appleseed@example.com">
                <label for="email">Email</label>
            </div>



            <label class="input">
                <span>Email address</span>
                <input type="text" />
            </label>


            <label class="input">
                <span>Country</span>
                <select>
                    <option></option>
                    <option>US</option>
                    <option>Italy</option>
                    <option>Finland</option>
                    <option>The Netherlands</option>
                </select>
            </label>


<!---------------

▕▔╲┊┊┊┊┊┊┊╱▔▏┊┊┊
┊╲╱╲┊┊┊┊┊╱╲╱┊┊┊┊
┊┊╲┈╲▂▂▂╱┈╱┊┊┊╱╲
┊┊╱┈┈┈┈┈┈┈╲┊┊╱┈┈╲
┊┊▏▕▆▍▂▕▆▍▕┊╱┈┈┈╱
┊▕╭╮┈┳┻┳┈╭╮▏╲┈┈╱
┊┊╲╯┈╰━╯┈╰╱┊╱┈┈╲
┊┊╱┈┈┈┈┈┈┈╲┊╲┈┈┈╲
┊▕╲┈▕┈┈┈▏┈╱▏┊╱┈╱
┊▕┈▔▔┈┈┈▔▔┈▏╱┈╱┊
┊▕┈┈┈┈┈┈┈┈▕▔┈╱┊┊
┈┈╲┈┈┈┈┈┈┈╱▔▔┈┈┈
┈┈▕▂╱▔▔▔╲▂▏┈┈┈┈┈

---------->

        </form>




    </div>
    <!-- End Container -->




</div>
<!-- End Container -->




<script src="<?php echo $config->urls->templates; ?>scripts/jquery.js"></script>
<script src="https://unpkg.com/vue"></script>
<script src="<?php echo $config->urls->templates; ?>scripts/all.min.js"></script>
<script src="<?php echo $config->urls->templates; ?>scripts/main.js"></script>
<script src="<?php echo $config->urls->templates; ?>scripts/iziToast.min.js"></script>
<script src="<?php echo $config->urls->templates; ?>scripts/ajax-calls.js"></script>

<script type="text/javascript">
    //Barba.Pjax.Dom.wrapperId = 'container';
    //Barba.Pjax.Dom.containerClass = 'wrapper';
    //Barba.Pjax.start();
</script>



<script type="text/javascript">
</script>



</body>
</html>
