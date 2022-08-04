<script>
    function printDivContent() {
        window.print();
    }
</script>
<div class="navbar-text sticky-sm-bottom float-end">
    <button class="btn btn-success btns"><a href="GenerarExcel.php?id=<?php echo $PRO_ID ?>"><i class='fas fa-download'></a></i></button>
    <button class="btn btn-dark btns" onclick="printDivContent()"><i class='fas fa-print'></i></button>
</div>