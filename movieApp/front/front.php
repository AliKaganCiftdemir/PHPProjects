<?php
include "../class.php";

$movie          = new Movie();
$listele        = $movie->select("movie", "", "", "", "");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Application</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        var myModal = document.getElementById("myModal");
        var myInput = document.getElementById("myInput");

        myModal.addEventListener("shown.bs.modal", function() {
            myInput.focus();
        });
    </script>
</head>

<body>
    <div class="container">
        <div class="row">
            <?php
            foreach ($listele as $liste) {
            ?>
                <div class="col-4">
                    <div class="card">
                        <img src="<?php echo $liste['resim'] ?>" alt="" class="card-imp-top">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $liste['film_adi']; ?></h5>
                            <p class="card-text"><?php echo $liste['film_yonetmeni'];
                                                    echo "<br>";
                                                    echo $liste['film_yayin_tarihi'];
                                                    ?>
                            </p>
                            <button type="button" id="<?php echo $liste['id'];?>" class="view_data btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Detay Gör
                            </button>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>

    </div>
</body>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="detail">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

</html>

<script>
    $(document).ready(function(){
        $('.view_data').click(function(){
            var id = $(this).attr("id");

            $.ajax({
                url:"select.php",
                method:"post",
                data:{id:id},
                success:function(data){
                    $('#detail').html(data);
                    $('#exampleModal').modal("show");
                }
            });
        });
    });

    
</script>