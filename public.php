<!-- PHP Begin -->
<?php
// Includes
include_once './SQL/db_connect.php';
include './SQL/queries.php';
include './PHP/functions/url_generator.php';
include './PHP/functions/datum.php';

?>

<!-- PHP END -->

<!-- HTML Begin -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/main.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>PasteBit | Public</title>
    <link rel="icon" type="image/x-icon" href="img/favicon.ico">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.5.1/styles/arduino-light.min.css">
</head>

<body>
    <nav class="font-sans flex flex-col text-center content-center sm:flex-row sm:text-left sm:justify-between py-2 px-6 bg-white shadow sm:items-baseline w-full">

        <div class="mb-2 sm:mb-0 flex flex-row">

            <div class="h-10 self-center mr-2">
                <a href="#"><img class="logo" src="img/logo.png" alt="PasteBit Logo"></a>
            </div>

        </div>

        <div class="sm:mb-0 self-center ibmText">
            <a href="./index.php" class="text-md no-underline text-black hover:text-blue-dark ml-2 px-1 hover:bg-gray-200 transition duration-500 hover:scale-125">Home</a>
            <a href="public.php" class="text-md no-underline text-grey-darker hover:text-blue-dark ml-2 px-1 hover:bg-gray-200 transition duration-500 hover:scale-125">Public</a>
            <a href="./PHP/project.php" class="text-md no-underline text-black hover:text-blue-dark ml-2 px-1 hover:bg-gray-200 transition duration-500 hover:scale-125">Project PasteBit</a>
            <a href="./PHP/legaal.php" class="text-md no-underline text-black hover:text-blue-dark ml-2 px-1 hover:bg-gray-200 transition duration-500 hover:scale-125">Licenties</a>
        </div>

    </nav>


    <section class="landing pt-6">

        <article id="landing-head">
            <h1 class="ibmHeader">Public</h1>
        </article>

        <article id="landing">
            <?php
            $aute = $db->query("SELECT * FROM `posts` where `wachtwoord` = '' ORDER BY `posts`.`datum` DESC");
            while ($item = $aute->fetch()) {
                $datum = $item['datum'];
                $changeDate = date("H:i:s d-m-Y", strtotime($datum));
            ?>

                <div class="container mb80 ibmText">
                    <div class="page-timeline">
                        <div class="vtimeline-point">
                            <div class="vtimeline-icon">
                                <i class="fa fa-code" aria-hidden="true"></i>
                            </div>
                            <div class="vtimeline-block">
                                <div class="vtimeline-content">
                                    <a href="view.php?url=<?php echo $item['url'] ?>">
                                        <h3><?php echo $item['titel'] ?></h3>
                                    </a>
                                    <ul class="post-meta list-inline">
                                        <li class="list-inline-item">
                                            <i class="fa fa-code"></i> <?php echo $item['taal'] ?>
                                        </li>
                                        <li class="list-inline-item">
                                            <i class="fa fa-calendar-o"></i> <?php echo $changeDate ?>
                                        </li>
                                    </ul>
                                    <pre><code class="<?php echo $item['taal'] ?>"><xmp><?php echo $item['code'] ?></xmp></code></pre><br>
                                    <a href="view.php?url=<?php echo $item['url'] ?>" class="les-meer">Lees meer</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>

        </article>
    </section>
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.5.1/highlight.min.js"></script>
    <script>
        hljs.highlightAll();
    </script>
</body>

</html>

<!-- HTML END -->