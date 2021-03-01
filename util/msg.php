<?
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
    include_once "../includes/header.php";
?>
<main>
    <form method="POST" style="max-width: 600px; margin: 0 auto;">
        <p>
            <?echo $_SESSION["MSG_ALERT"]?>
        </p>

        <div class="mb-3 mt-3" style="display: flex; justify-content:flex-end;">
            <a href=<?echo $_SESSION["LINK_ALERT"]?>>
                <button type="button" class="btn btn-success">Ok</button>
            </a>
        </div>
    </form>
</main>
<?
    include_once "../includes/footer.php";
?>