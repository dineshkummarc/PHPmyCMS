<!DOCTYPE html>
<html>

<?php
include("header.php");
include('classPost.php');
?>

<?php
$post = new Post($db)

?>

<main class="profile-page">
    <section class="section-profile-cover section-shaped my-0">
        <!-- Circles background -->
        <div class="shape shape-style-1 shape-primary alpha-4">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
        <!-- SVG separator -->
        <div class="separator separator-bottom separator-skew">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </section>
    <section class="section">
        <div class="container">
            <div class="card card-profile shadow mt--300">

                <?php

                $i = 1;
                foreach ($post->getPosts() as $post) {

                    if ($i % 2) {

                        ?>

                        <div class="row row-grid align-items-center">
                            <div class="col-md-6">
                                <div class="card bg-default shadow border-0">
                                    <img src="<?php echo 'images/' . $post['imgName'] ?>" class="card-img-top">
                                    <blockquote class="card-blockquote">
                                        <svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 583 95" class="svg-bg">
                                            <polygon points="0,52 583,95 0,95" class="fill-default" />
                                            <polygon points="0,42 583,95 683,0 0,95" opacity=".2" class="fill-default" />
                                        </svg>
                                        <h4 class="display-3 font-weight-bold text-white"><?php echo $post['subtitle'] ?></h4>
                                        <div class="lead text-italic text-white"> <?php echo $post['description'] ?> <small> <i> <?php echo $post['created_at'] ?> </i> </small> </div>
                                    </blockquote>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="pl-md-5 ">
                                    <h2 class="display-2"><a href="<?php echo 'pageArticle.php?slug=' . $post['slug'] ?>"><?php echo $post['title'] ?> </a></h2>
                                    <div class="lead"> <?php echo $post['content'] ?></div>
                                </div>
                            </div>
                        </div>

                    <?php } else { ?>

                        <div style="padding: 100px 20px">
                            <div class="container">
                                <div class="row row-grid align-items-center">
                                    <div class="col-md-6 order-md-2">
                                        <img src="<?php echo 'images/' . $post['imgName'] ?>" class="img-fluid floating">
                                    </div>
                                    <div class="col-md-6 order-md-1">
                                        <div class="pr-md-5">
                                            <h2 class="display-2"> <a href="<?php echo 'pageArticle.php?slug=' . $post['slug'] ?>"><?php echo $post['title'] ?> </a> </h2>
                                            <h3><?php echo $post['subtitle'] ?></h3>
                                            <h6> <?php echo $post['description'] ?></h6>
                                            <div class="lead"> <?php echo $post['content'] ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                    <?php
                    } // end if
                    $i++;
                } // end for
                ?>


            </div>
    </section>





    <script>
        var myEditor;
        ClassicEditor
            .create(document.querySelector('#description'))
            .then(editor => {
                // console.log('Editor was initialized', editor);
                myEditor = editor;
            })
            .catch(error => {
                console.error(error);
            });
    </script>
</main>


<button type="button" class="btn btn-block btn-warning mb-3" style="display: none" data-toggle="modal" data-target="#add">open</button>
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content bg-gradient-danger">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="py-3 text-center">
                    <i class="ni ni-bell-55 ni-3x"></i>
                    <h4 class="heading mt-4">Post created</h4>
                    <p>Your data successful added</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<?php
include('footer.php')
?>
</body>

</html>